<div id="header-top">
    <div class="container">
        <div class="d-flex justify-content-end">
            <ul class="nav header-menu">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?a=2">CHÍNH SÁCH BÁN HÀNG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?a=3">HỆ THỐNG CỬA HÀNG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?a=4">VỀ MOJI</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="header-content">
    <div class="container">
        <div class="row">
            <div class="col-3 align-self-center">
                <a href="index.php"><img src="img/logo.png" alt="moji" width="130" height="60"></a>
            </div>
            <div class="col-5 align-self-center">
                <form action="index.php" method="get" class="align-self-center">
                    <div class="input-group">
                        <input type="hidden" name="a" value="10">
                        <input type="text" name="q" placeholder="Tìm kiếm sản phẩm" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-pink" type="submit"><b>Tìm kiếm</b></button>
                        </span>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tieuChi" checked value="Ten">Tên
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tieuChi" value="Loai">Loại
                        </label>
                    </div>
                    <div class="form-check-inline disabled">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tieuChi" value="Hang">Hãng
                        </label>
                    </div>
                    <div class="form-check-inline disabled">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tieuChi" value="Gia">Giá
                        </label>
                    </div>
                </form>
            </div>
            <div class="col-4 align-self-center">
                <ul class="nav ml-auto" id="header-content-menu">
                    <?php
                    if (isset($_SESSION["MaTaiKhoan"])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?a=14">Hello, <?php echo $_SESSION["TenHienThi"]; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modules/xlDangXuat.php">ĐĂNG XUẤT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?a=5"><img src="img/cart_icon.png" alt="" width="30"></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?a=6&sub=1">ĐĂNG NHẬP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?a=6&sub=2">ĐĂNG KÝ</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

</div>