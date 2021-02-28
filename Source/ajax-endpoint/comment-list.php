<?php
session_start();
require_once "../libConnect/db.php";

if (isset($_SESSION["id_sanpham"])) {
    $id_sanpham = $_SESSION["id_sanpham"];
} else {
    $id_sanpham = '';
}
$sql = "SELECT * FROM binhluan where id_sanpham = '$id_sanpham' ORDER BY id_parent_comment asc, id_comment asc ";

$result = mysqli_query($conn, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($record_set, $row);
}
mysqli_free_result($result);

mysqli_close($conn);
echo json_encode($record_set);
