<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $a = $_GET["a"];
        $sql = "UPDATE dondathang SET MaTinhTrang = $a WHERE MaDonDatHang = $id";
        DataProvider::ExecuteQuery($sql);
        if($a == 4)
        {
            $sql = "SELECT MaSanPham, SoLuong from chitietdondathang WHERE MaDonDatHang = $id";
            $result = DataProvider::ExecuteQuery($sql);
            while($row =mysqli_fetch_array($result))
            {
                $soLuong = $row["SoLuong"];
                $maSanPham = $row["MaSanPham"];
                $sql = "UPDATE sanpham Set SoLuongTon = SoLuongTon + $soLuong WHERE MaSanPham = $maSanPham";
                DataProvider::ExecuteQuery($sql);
            }
        }
    }
    DataProvider::ChangeURL("../../index.php?c=5");
?>