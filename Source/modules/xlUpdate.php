<?php
session_start();
include "../lib/DataProvider.php";
$id_user = $_SESSION["MaTaiKhoan"];


if (isset($_POST["name"]) && isset($_POST["add"]) && isset($_POST["ps"]) && isset($_POST["tel"])) {
    $name = $_POST["name"];
    $add = $_POST["add"];
    $ps = $_POST["ps"];
    $dt = $_POST["tel"];


    $passHash = password_hash($ps, PASSWORD_DEFAULT);
    $sqlUpdate = "UPDATE taikhoan set TenHienThi = '$name', DiaChi = '$add', MatKhau = '$passHash', DienThoai = '$dt' where MaTaiKhoan = '$id_user' ";
    DataProvider::ExecuteQuery($sqlUpdate);

    session_destroy();

    DataProvider::ChangeURL("../index.php");
}
