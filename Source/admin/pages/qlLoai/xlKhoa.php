<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql ="SELECT * FROM chitietloaisanpham WHERE MaLoaiSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            $sql = "UPDATE chitietloaisanpham SET BiXoa = 1 - BiXoa WHERE MaLoaiSanPham = $id";
            DataProvider::ExecuteQuery($sql);
        }
        $sql = "UPDATE loaisanpham SET BiXoa = 1 - BiXoa WHERE MaLoaiSanPham = $id";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3");
?>