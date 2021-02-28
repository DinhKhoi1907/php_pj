<?php
require_once "libData/DataSource.php";
$db = new DataSource();

$tenHienThi = $_SESSION["TenHienThi"];
$diaChi = $_SESSION["DiaChi"];
$dienThoai = $_SESSION["DienThoai"];
$email = $_SESSION["Email"];
$id_user =  $_SESSION["MaTaiKhoan"];

?>
<div class="container">
    <div class="title">
        <a href="" class="h2">Thông tin cá nhân</a>
    </div>
    <div>
        <h5>Tên người dùng: <?php echo $_SESSION["TenHienThi"]; ?></h5>
        <h5>Địa chỉ: <?php echo $_SESSION["DiaChi"]; ?></h5>
        <h5>Điện thoại: <?php echo $_SESSION["DienThoai"]; ?></h5>
        <h5>Email: <?php echo $_SESSION["Email"]; ?></h5>
    </div>
    <div class="title">
        <a href="#" class="h2">Thay đổi thông tin cá nhân</a>
        <form action="modules/xlUpdate.php" method="POST" name="frmLogin" id="formAcount" onsubmit="return KiemTra()">
            <div>
                <span class="err" id="errPS"></span>
            </div>
            <div>
                <input type="text" value="<?php echo $tenHienThi; ?>" id="name" name="name" required>
            </div>
            <div>
                <input type="text" value="<?php echo $diaChi; ?>" id="add" name="add" required>
            </div>
            <div>
                <input type="text" value="<?php echo $dienThoai; ?>" id="tel" name="tel" required pattern="^[0-9_]{9,12}$" title="Số điện thoại chỉ gồm số và có độ dài hơn 9 số">
            </div>
            <div>
                <input type="email" value="<?php echo $email; ?>" name="mail" id="mail" disabled>
            </div>
            <div>
                <input type="password" id="ps" name="ps" placeholder="Nhập lại mật khẩu" pattern="^[A-Za-z0-9_]{5,24}$" title="Mật khẩu không có khoảng trắng và các ký tự đặc biệt, phải có độ dài từ 5-24">
            </div>
            <div>
                <input type="password" id="rps" name="rps" required placeholder="Nhập lại mật khẩu">
            </div>
            <div class="user-foot text-center">
                <button type="submit" class="btn-pink" id="btnUpdate">CẬP NHẬT LẠI THÔNG TIN TÀI KHOẢN</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        function KiemTra() {
            var co = true;
            var control = document.getElementById('ps');
            control1 = document.getElementById('rps');
            err = document.getElementById('errPS');
            if (control.value != control1.value) {
                co = false;
                err.innerHTML = "(*) Nhập lại mật khẩu không trùng với mật khẩu";
                control1.focus();
            } else {
                err.innnerHTML = "";
            }
            return co;
        }
    </script>
    <div class="title">
        <a href="#" class="h2">Sản phẩm đã yêu thích</a>
    </div>
    <div class="row">
        <?php
        $idUser = $_SESSION["MaTaiKhoan"];
        $query = "SELECT * FROM yeuthichsanpham JOIN sanpham ON sanpham.MaSanPham = yeuthichsanpham.id_sanpham and yeuthichsanpham.id_user = '$idUser' ";
        $whish_array = $db->select($query);
        if (!empty($whish_array)) {
            foreach ($whish_array as $key => $value) {
        ?>
                <div class="col">
                    <div class="card product-item">
                        <img class="card-img-top" src="images/<?php echo $whish_array[$key]["HinhURL"] ?>.jpg" alt="<?php echo $product_array[$key]["MoTa"]; ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $whish_array[$key]["TenSanPham"]; ?></h4>
                            <p class="card-text"><b>Giá: <span class="text-danger"><?php echo $whish_array[$key]["GiaSanPham"]; ?>đ</span></b></p>
                            <a href="index.php?a=8&id=<?php echo $whish_array[$key]["MaSanPham"]; ?>" class="btn btn-primary">CHI TIẾT</a>
                            <span data-pid="<?php echo $whish_array[$key]["id_sanpham"]; ?>" class="heart" onclick="removeFromWishlist(this)" title="Add to wish list"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart color-filled">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                                <img src="images/loading.gif" id="loader">
                            </span>
                            <span style="padding-left: 25px; color:gold; font-weight: bold">Yêu thích</span>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>