<?php
include "../../../lib/DataProvider.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT count(*) FROM sanpham WHERE MaHangSanXuat = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    if ($row[0] == 0) {
        $sql = "DELETE FROM hangsanxuat WHERe MaHangSanXuat = $id";
    } else {
        $sql = "UPDATE hangsanxuat SET BiXoa = 1 - BiXoa WHERE MaHangSanXuat = $id";
    }
    DataProvider::ExecuteQuery($sql);
}
DataProvider::ChangeURL("../../index.php?c=4");
