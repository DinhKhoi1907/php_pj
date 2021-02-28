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
        $ten = $_GET["txtTen"];
        $sql = "UPDATE chitietloaisanpham SET TenChiTietLoaiSanPham = '$ten' WHERE MaChiTietLoaiSanPham = $idChiTiet";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3&a=4&id=$id");
?>