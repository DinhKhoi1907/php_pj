<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";

    if(isset($_POST["txtSL"]))
    {
        $sl = $_POST["txtSL"];

        if(is_nan($sl) == false)
        {
            $id = $_POST["hdID"];
            $gioHang = unserialize($_SESSION["GioHang"]);

            if($sl > 0)
            {
                //xử lý cập nhật số lượng mới

                $gioHang->update($id, $sl);
                $_SESSION["GioHang"] = serialize($gioHang);
            }else
            {
                if($sl == 0)
                {
                    $gioHang->delete($id);

                    $_SESSION["GioHang"] = serialize($gioHang);
                }
            }

            DataProvider::ChangeURL("../../index.php?a=5");
        }else
        {
            //nếu số lượng mới không là số thì không sử lý đá về trang quản lý giỏ hàng
            DataProvider::ChangeURL("../../index.php?a=5");
        }
    }else
    {
        DataProvider::changeURL("../../index.php?a=404");
    }
?>