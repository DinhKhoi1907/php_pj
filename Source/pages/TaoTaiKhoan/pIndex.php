<?php
    $sub = 1;

    if (isset($_GET["sub"]))
        $sub = $_GET["sub"];

    switch ($sub)
    {
        case 1:
            include "pages/TaoTaiKhoan/pDangNhap.php";
        break;
        
        case 2:
            include "pages/TaoTaiKhoan/pDangKy.php";
        break;
        
        case 3:
            include "pages/TaoTaiKhoan/pReset.php";
        break;
        case 4: 
            include "pages/TaoTaiKhoan/pFacebook.php";
            break;
        default:
            DataProvider::ChangeURL("index.php?a=404");
        break;
    }
