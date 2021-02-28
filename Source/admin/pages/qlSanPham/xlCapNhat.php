<?php
    include "../../../lib/DataProvider.php";
    if(isset($_POST["id"]));
    {
        $id = $_POST["id"];
        $txtTen = $_POST["txtTen"];
        $cmbLoai = $_POST["cmbLoai"];
        $uploadOk = 1;
        include "xlUpload.php";
        if($uploadOk == 1){
            $fHinh = $_FILES["fHinh"]['name'];
        }
        else{
            $fHinh = $_POST["HinhURL"];
        }
        $txtGia = $_POST["txtGia"];
        $txtTon = $_POST["txtTon"];
        $txtMoTa = $_POST["txtMoTa"];
        $sql ="UPDATE sanpham SET TenSanPham = '$txtTen', HinhURL = '$fHinh', GiaSanPham = $txtGia,
        SoLuongTon = $txtTon, MoTa = '$txtMoTa',MaChiTietLoaiSanPham= $cmbLoai
        WHERE MaSanPham = '$id'";
        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=2");
    }
?>