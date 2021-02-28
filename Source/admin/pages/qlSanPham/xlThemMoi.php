<?php 
    include "../../../lib/DataProvider.php";
    $txtTen = $_POST["txtTen"];
    $cmbLoai = $_POST["cmbLoai"];
    $cmbHang = $_POST["cmbHang"];
    $uploadOk = 1;
    include "xlUpload.php";
    if($uploadOk == 1){
        $fHinh = $_FILES["fHinh"]['name'];
    }
    else{
        $fHinh = "errorUpload.png";
    }
    $txtGia = $_POST["txtGia"];
    $txtTon = $_POST["txtTon"];
    $txtMoTa = $_POST["txtMoTa"];
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $NgayNhap = date("Y-m=d H:i:s");
    $sql ="INSERT INTO sanpham(TenSanPham,HinhURL,GiaSanPham,SoLuongTon,MoTa,MaChiTietLoaiSanPham,NgayNhap,SoLuongBan,SoLuocXem,MaHangSanXuat) 
    values('$txtTen','$fHinh',$txtGia,$txtTon,'$txtMoTa',$cmbLoai,'$NgayNhap',0,0,$cmbHang)";
    DataProvider::ExecuteQuery($sql);
    DataProvider::ChangeURL("../../index.php?c=2");

?>
