<div class="container">
	<?php
	if (isset($_GET["sub"]))
		$sub = $_GET["sub"];
	else {
		DataProvider::ChangeURL("index.php?a=404");
	}
	$sql = "SELECT TenHangSanXuat FROM hangsanxuat WHERE BiXoa = 0 AND MaHangSanXuat = " . $sub;
	$result = DataProvider::ExecuteQuery($sql);
	while ($row = mysqli_fetch_array($result)) {
	?>
		<div class="title">
			<a href="#" class="h2"><?php echo $row["TenHangSanXuat"]; ?></a>
		</div>
	<?php
	}
	?>
	<div class="row">
		<?php
		$sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaHangSanXuat = " . $sub;
		$result = DataProvider::ExecuteQuery($sql);
		while ($row = mysqli_fetch_array($result)) {
		?>
			<div class="col-3">
				<div class="card product-item">
					<img class="card-img-top" src="images/<?php echo $row["HinhURL"] ?>.jpg" alt="<?php echo $row["MoTa"]; ?>">
					<div class="card-body">
						<h4 class="card-title"><?php echo $row["TenSanPham"]; ?></h4>
						<p class="card-text"><b>Giá: <span class="text-danger"><?php echo $row["GiaSanPham"]; ?>đ</span></b></p>
						<a href="index.php?a=8&id=<?php echo $row["MaSanPham"]; ?>" class="btn btn-primary">CHI TIẾT</a>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>