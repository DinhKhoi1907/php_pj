<?php
session_start();
require_once "../libData/DataSource.php";
$db_handle = new DataSource();
if (! empty($_POST["p_id"])) {
    $memberId = $_SESSION["MaTaiKhoan"];
    $query = "DELETE FROM yeuthichsanpham WHERE id_sanpham = ? AND id_user = ?";
    $paramType = 'ii';
    $paramValue = array(
        $_POST["p_id"],
        $memberId
    );
    $affectedRows = $db_handle->delete($query, $paramType, $paramValue);
    echo $affectedRows;
}
exit();
