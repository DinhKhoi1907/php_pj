<div class="text-center">
<h1>Lỗi người dùng</h1>
<span class="text-danger">
<?php
    if(isset($_GET["id"]))
    {
        switch ($_GET["id"])
        {
            case 1:
                echo "Tên đăng nhập và mật khẩu không tồn tại";
                ?>
                <br>
                <a href="index.php">Bấm vào đây để trở về trang chủ</a>
                <?php
                break;
            case 2:
                echo "Giỏ hàng không có sản phẩm, đặt hàng thất bại ";
                ?>
                <br>
                <a href="index.php">Bấm vào đây để trở về trang chủ</a>
                <?php
                break;
        }
    }
?>
</span>
</div>
