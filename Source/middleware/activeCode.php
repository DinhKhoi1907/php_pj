<?php
session_start();
include "../lib/DataProvider.php";

$us = $_GET['TenDangNhap'];
$code = $_GET['code'];

$sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '$us' and code = '$code'";
$result = DataProvider::ExecuteQuery($sql);
$user = mysqli_fetch_array($result);


if ($user) {
    if ($user['TenDangNhap'] == $us) {
        if ($user["Code"] == $code) {
            // cap nhat lai code = null, xac nhan active thanh cong
            $sql = "UPDATE taikhoan set code = NULL WHERE TenDangNhap = '$us' ";
            DataProvider::ExecuteQuery($sql);

            $_SESSION["MaTaiKhoan"] = $user["MaTaiKhoan"];
            $_SESSION["TenDangNhap"] = $user["TenDangNhap"];
            $_SESSION["DienThoai"] = $user["DienThoai"];
            $_SESSION["DiaChi"] = $user["DiaChi"];
            $_SESSION["Email"] = $user["Email"];
            $_SESSION["MaLoaiTaiKhoan"] = 1;
            $_SESSION["TenHienThi"] = $user["TenHienThi"];
            if ($user["MaLoaiTaiKhoan"] == 2) {
                DataProvider::ChangeURL("../admin/index.php");
            } else {
                DataProvider::ChangeURL("../index.php");
            }
        } else {
            $error = 'Mã kích hoạt không hợp lệ';
        }
    } else {
        $error = 'Tài khoản đã kích hoạt';
    }
} else {
    $error = 'Tài khoản không tồn tại';
}
