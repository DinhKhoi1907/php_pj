<?php
session_start();
require_once "../libData/DataSource.php";
$db_handle = new DataSource();
if (! empty($_POST["p_id"])) {
    $memberId = $_SESSION["MaTaiKhoan"];
        $sql = "INSERT INTO yeuthichsanpham (id_sanpham, id_user) VALUES (?, ?)";
        $paramType = 'ii';
        $paramValue = array(
            $_POST["p_id"],
            $memberId
        );
        $whishlist_id = $db_handle->insert($sql, $paramType, $paramValue);
        echo $whishlist_id;
    exit();
}
?>