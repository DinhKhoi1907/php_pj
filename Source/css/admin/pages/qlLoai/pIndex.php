<?php 
    $a = 1;
    if(isset($_GET["a"]))
        $a = $_GET["a"];
    switch($a)
    {
        case 1:
            include "pages/qlLoai/pDanhSach.php";
            break;
        case 2:
            include "pages/qlLoai/pCapNhat.php";
            break;
        case 3:
            include "pages/qlLoai/pThemMoi.php";
            break;
        case 4:
            include "pages/qlLoai/pChiTietLoaiSanPham.php";
            break;
        case 5:
            include "pages/qlLoai/pCapNhatChiTiet.php";
            break;
        case 6:
            include "pages/qlLoai/pThemMoiChiTiet.php";
            break;
        case 7:
            include "pages/qlLoai/pSearch.php";
            break;
        default:
            include "pages/Error.php";
            break;
    }
?>
