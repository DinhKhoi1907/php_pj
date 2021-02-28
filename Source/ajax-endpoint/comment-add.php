<?php
session_start();
require_once "../libConnect/db.php";

$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
if (isset($_SESSION["TenHienThi"])) {
    $commentSenderName = $_SESSION["TenHienThi"];
} else {
    $commentSenderName = 'Vo danh';
}
if (isset($_SESSION["id_sanpham"])) {
    $id_sanpham = $_SESSION["id_sanpham"];
}else{
    $id_sanpham = '';
}


$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO binhluan(id_parent_comment,comment,name_comment,id_sanpham,date) VALUES ('" . $commentId . "','" . $comment . "','" . $commentSenderName . "', '" . $id_sanpham . "','" . $date . "')";

$result = mysqli_query($conn, $sql);

if (!$result) {
    $result = mysqli_error($conn);
}
echo $result;
