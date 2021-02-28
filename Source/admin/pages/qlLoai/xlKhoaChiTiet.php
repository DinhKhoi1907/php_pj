<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["idChiTiet"]))
    {
        $idChiTiet = $_GET["idChiTiet"];
        if(!isset($_GET["id"]))
        {
            DataProvider::ChangeURL("index.php?c=404");
        }
        $id = $_GET["id"];
        $sql = "UPDATE chitietloaisanpham SET BiXoa = 1 - BiXoa WHERE MaChiTietLoaiSanPham = $idChiTiet";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3&a=4&id=$id");
?>