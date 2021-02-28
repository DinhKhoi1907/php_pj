<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["txtTen"]))
    {
        if(!isset($_GET["id"]))
        {
            DataProvider::ChangeURL("index.php?c=404");
        }
        $id = $_GET["id"];
        $ten = $_GET["txtTen"];
        $sql = "INSERT INTO chitietloaisanpham(TenChiTietLoaiSanPham,BiXoa,MaLoaiSanPham) values('$ten',0,$id)";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3&a=4&id=$id");
?>