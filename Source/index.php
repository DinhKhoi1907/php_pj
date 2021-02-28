<?php
session_start();
include "lib/DataProvider.php";
$_SESSION["path"] = $_SERVER["REQUEST_URI"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Quà tặng và phụ kiện</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/styleWishlist.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:700,800&display=swap" rel="stylesheet">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/wishlist.js"></script>
</head>

<body>
	<header id="header">
		<?php
		include "modules/mHeader.php";
		include "modules/mSiderbar.php";
		?>
	</header>
	<main class="main">
		<?php
		$a = 1;
		if (isset($_GET["a"]) == true)
			$a = $_GET["a"];
		switch ($a) {
			case 1:
				include "pages/pIndex.php";
				break;
			case 2:
				include "pages/pChinhSachBanHang.php";
				break;
			case 3:
				include "pages/pHeThongCuaHang.php";
				break;
			case 4:
				include "pages/pVeMoji.php";
				break;
			case 5:
				include "pages/GioHang/pIndex.php";
				break;
			case 6:
				include "pages/TaoTaiKhoan/pIndex.php";
				break;
			case 7:
				include "pages/SanPhamTheoLoai/pIndex.php";
				break;
			case 8:
				include "pages/pChiTiet.php";
				break;
			case 9:
				include "pages/pTatCa.php";
				break;
			case 10:
				include "pages/pSearch.php";
				break;
			case 11:
				include "pages/SanPhamTheoHang/pIndex.php";
				break;
			case 13:
				include "pages/pSilder3.php";
				break;
			case 14:
				include "modules/profileUser.php";
				break;
			default:
				include "pages/pError.php";
				break;
		}
		?>
	</main>
	<BR></BR>
	<footer>
		<?php include "modules/mFooter.php"; ?>
	</footer>
	<script type="text/javascript" src="js/wishlist.js"></script>
</body>

</html>