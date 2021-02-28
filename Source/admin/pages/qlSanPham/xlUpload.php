<?php
$target_dir = "../../../images/";
$target_file = $target_dir . basename($_FILES["fHinh"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fHinh"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
if ($_FILES["fHinh"]["size"] > 500000) {
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
if ($uploadOk == 0) {
} else {
    if (file_exists($target_file)) {
        $uploadOk = 1;
    }
    else {
        move_uploaded_file($_FILES["fHinh"]["tmp_name"], $target_file);
    }
}
?>