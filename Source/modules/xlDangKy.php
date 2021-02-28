<?php
ob_start();
//composer autoload
session_start();
require_once '../vendor/autoload.php';
include "../lib/DataProvider.php";
include "../middleware/function.php";

if (isset($_POST["us"])) {
    $us = $_POST["us"];
    $ps = $_POST["ps"];
    $name = $_POST["name"];
    $add = $_POST["add"];
    $tel = $_POST["tel"];
    $mail = $_POST["mail"];

    $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '$us'";
    $result = DataProvider::ExecuteQuery($sql);
    $user = mysqli_fetch_array($result);

    if ($user != null) {
        $_SESSION["error"] = 'tai khoan da ton tai trong he thong';
        DataProvider::ChangeURL("../index.php?a=6&sub=2");
    } else {
        $code = strtoupper(bin2hex(random_bytes(4)));
        $passHash = password_hash($ps, PASSWORD_DEFAULT);
        $sql = "INSERT INTO taikhoan(TenDangNhap, MatKhau, TenHienThi, DiaChi, DienThoai, Email, MaLoaiTaiKhoan, code)
                    VALUES ('$us', '$passHash', '$name', '$add', '$tel', '$mail', 1, '$code')";

        DataProvider::ExecuteQuery($sql);


        sendEmail($mail, 'Kích hoạt tài khoản', 'Vui lòng click vào link <a href="http:/localhost:8080/web1-project/Source/middleware/activeCode.php?TenDangNhap=' . $us . '&code=' . $code . '">Kích hoạt tài khoản</a>');

        $_SESSION['activeCode'] = 'Vui lòng xác nhận tài khoản thông qua email: ' . $mail . ' vừa đăng kí';
        DataProvider::ChangeURL("../index.php?a=6&sub=1");
        ob_flush();
    }
}
