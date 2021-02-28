<?php

//index.php
include "lib/DataProvider.php";
include('config.php');
$db = new DataProvider();

require_once "libData/DataSource.php";
$db_handle = new DataSource();
$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if (isset($_GET['code'])) {
    if (isset($_SESSION['access_token'])) {
        $access_token = $_SESSION['access_token'];
    } else {
        $access_token = $facebook_helper->getAccessToken();

        $_SESSION['access_token'] = $access_token;

        $facebook->setDefaultAccessToken($_SESSION['access_token']);
    }

    $_SESSION['user_id'] = '';
    $_SESSION['user_name'] = '';
    $_SESSION['user_email_address'] = '';
    $_SESSION['user_image'] = '';

    $graph_response = $facebook->get("/me?fields=name,email", $access_token);

    $facebook_user_info = $graph_response->getGraphUser();

    if (!empty($facebook_user_info['id'])) {
        $_SESSION['user_image'] = 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture';
    }

    if (!empty($facebook_user_info['name'])) {
        $_SESSION['user_name'] = $facebook_user_info['name'];
    }

    if (!empty($facebook_user_info['email'])) {
        $_SESSION['user_email_address'] = $facebook_user_info['email'];
    }
} else {
    // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost:8080/web1-project/Source/facebook.php', $facebook_permissions);

    // Render Facebook login button
    $facebook_login_url = '<div align="center"><a href="' . $facebook_login_url . '"><img src="php-login-with-facebook.gif" /></a></div>';
}



?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP Login using Google Account</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <br />
        <h2 text-align="center">PHP Login using Google Account</h2>
        <br />
        <div class="panel panel-default">
            <?php
            if (isset($facebook_login_url)) {
                echo $facebook_login_url;
            } else {


                echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                echo '<h3><b>Name :</b> ' . $_SESSION['user_name'] . '</h3>';
                echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';

                // lưu session 
                $_SESSION["TenHienThi"] = $_SESSION['user_name'];
                $_SESSION["MaTaiKhoan"] = $_SESSION['user_id'];;
                $_SESSION["MaLoaiTaiKhoan"] = 1;
                $_SESSION["DienThoai"] = '';
                $_SESSION["Email"] = $_SESSION["user_email_address"];
                $_SESSION["DiaChi"] = '';

                // thêm vào cơ sở dữ liệu
                $id =  $_SESSION["MaTaiKhoan"];
                $name = $_SESSION["TenHienThi"];
                $loai = 1;
                $phone = $_SESSION["DienThoai"];
                $add = $_SESSION["DiaChi"];
                $mail = $_SESSION["Email"];
                $sqlID = "SELECT * from TaiKhoan where TenHienThi = '$name'";
                $result = $db_handle->select($sqlID);
                if ($result == null) {
                    $sql = "INSERT INTO taikhoan(MaTaiKhoan, TenHienThi, DiaChi, DienThoai, Email, MaLoaiTaiKhoan)
                    VALUES ('$id', '$name', '$add', '$phone', '$mail', '$loai')";
                    DataProvider::ExecuteQuery($sql);
                    DataProvider::ChangeURL("../Source/index.php");
                }
                DataProvider::ChangeURL("../Source/index.php");
            }
            ?>
        </div>
    </div>
</body>

</html>