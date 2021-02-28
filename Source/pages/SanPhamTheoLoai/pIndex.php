<?php
require_once "libData/DataSource.php";
$db_handle = new DataSource();

if (isset($_SESSION["MaTaiKhoan"])) {
	$idUser = $_SESSION["MaTaiKhoan"];
} else {
	$idUser = null;
}
$query = "SELECT * FROM yeuthichsanpham JOIN sanpham ON yeuthichsanpham.id_sanpham = sanpham.MaSanPham and yeuthichsanpham.id_user = '$idUser' ORDER BY yeuthichsanpham.id_sanpham ASC";

$whish_array = $db_handle->select($query);
$whish_array_pid = array();
if (!empty($whish_array)) {
	foreach ($whish_array as $z => $value) {
		$whish_array_pid[] = $whish_array[$z]['id_sanpham'];
	}
}
?>
<div class="container">
	<?php
	if (isset($_GET["sub"]))
		$sub = $_GET["sub"];
	else {
		DataProvider::ChangeURL("index.php?a=404");
	}
	$sql = "SELECT tenchitietloaisanpham FROM chitietloaisanpham WHERE BiXoa = 0 AND MaChiTietLoaiSanPham = " . $sub;
	$productName_array = $db_handle->select(($sql));
	if ($productName_array == null) { ?>
		<h2>Sản phẩm không tồn tại</h2>
		<?php } else {
		foreach ($productName_array as $key => $value) {
		?>
			<div class="title">
				<a href="#" class="h2"><?php echo $productName_array[$key]["tenchitietloaisanpham"]; ?></a>
			</div>
		<?php
		}
		?>
		<div class="row">
			<?php
			$sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaChiTietLoaiSanPham = " . $sub;
			$product_array = $db_handle->select(($sql));
			if (!empty($product_array)) {
				foreach ($product_array as $key => $value) {
			?>
					<div class="col-3">
						<div class="card product-item">
							<img class="card-img-top" src="images/<?php echo $product_array[$key]["HinhURL"] ?>.jpg" alt="<?php echo $product_array[$key]["MoTa"]; ?>">
							<div class="card-body">
								<h4 class="card-title"><?php echo $product_array[$key]["TenSanPham"]; ?></h4>
								<p class="card-text"><b>Giá: <span class="text-danger"><?php echo $product_array[$key]["GiaSanPham"]; ?>đ</span></b></p>
								<a href="index.php?a=8&id=<?php echo $product_array[$key]["MaSanPham"]; ?>" class="btn btn-primary">CHI TIẾT</a>
								<?php if (in_array($product_array[$key]["MaSanPham"], $whish_array_pid)) { ?>

									<span data-pid="<?php echo $product_array[$key]["MaSanPham"]; ?>" class="heart" onclick="removeFromWishlist(this)" title="Remove from wishlist"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart color-filled">
											<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
										</svg><img src="images/loading.gif" id="loader">
									</span>
									<span style="padding-left: 25px; color:gold; font-weight: bold">Yêu thích</span>
								<?php } else { ?>

									<span data-pid="<?php echo $product_array[$key]["MaSanPham"]; ?>" class="heart" onclick="addToWishlist(this)" title="Add to wishlist"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart">
											<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
										</svg><img src="images/loading.gif" id="loader">
									</span>
									<span style="padding-left: 25px; color:gold; font-weight: bold">Yêu thích</ơ>
									<?php } ?>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	<?php } ?>
</div>