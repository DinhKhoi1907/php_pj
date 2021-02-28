<?php 
    session_start();
    include "../lib/DataProvider.php";

    if(!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] !=2)
    {
        DataProvider::ChangeURL("../index.php");
    }
    $c = 0;
    if(isset($_GET["c"]))
        $c = $_GET["c"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phân hệ quản lý</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <header class="container-fluid">
        <div class="row" id="header">
            <div class="col-12 bg-danger text-white">
                <a href="index.php">
                    <h1 class="h1 text-center">Hệ thống quản lý sản phẩm MOJI</h1>
                </a>
            </div>
        </div>
        <div class="row bg-info" id="menu">
            <div class="col-8" >
                <?php 
                    include "modules/mMenu.php";
                ?>
            </div>
           
            <div class="col-4 text-right text-white" >
                <?php
                    include "modules/mLogin.php";
                ?>
            </div>
        </div>
    </header>
    <main class="container-fluid bg-white">
    <div class="row" id="content">
            <?php
                switch($c)
                {
                    case 0:
                        include "pages/pIndex.php";
                        break;
                    case 1:
                        include "pages/qlTaiKhoan/pIndex.php";
                        break;
                    case 2:
                        include "pages/qlSanPham/pIndex.php";
                        break;
                    case 3:
                        include "pages/qlLoai/pIndex.php";
                        break;
                    case 4:
                        include "pages/qlHang/pIndex.php";
                        break;
                    case 5:
                        include "pages/qlDonDatHang/pIndex.php";
                        break;
                    default:
                        include "pages/pError.php";
                        break;
                }
            ?>
        </div>
    </main>
    <footer class="container-fluid">
        <div class="row" id="footer">
            <div class="col-12 bg-primary text-center text-white">
                &copy; Design by student of FIT - HCMUS
            </div>
        </div>
    </footer>
</body>
</html>