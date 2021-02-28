<div class="user-wrapper">
    <div class="user-nav">
        <a href="index.php?a=6&sub=1" class="float-left">ĐĂNG NHẬP</a>
        <a href="index.php?a=6&sub=2" class="float-left">ĐĂNG KÝ</a>
        <a href="index.php?a=6&sub=3" class="float-left active">QUÊN MẬT KHẨU</a>
        <a href="index.php?a=6&sub=4" class="float-left">LOGIN WITH FACEBOOK</a>
    </div>
    <!-- Thong bao tai khoan ton tai trong he thong -->
    <?php
    if (isset($_SESSION["errorReset"])) {
        $errorReset = $_SESSION["errorReset"];
    } else {
        $errorReset = null;
    }
    ?>

    <?php if ($errorReset != null) { ?>
        <div class="alert alert-danger container" role="alert">
            <?php echo $errorReset; ?>
        </div>
    <?php
    }
    ?>
    <!-- Mat khau khong khop -->
    <?php
    if (isset($_SESSION["errorPass"])) {
        $errorPass = $_SESSION["errorPass"];
    } else {
        $errorPass = null;
    }
    ?>

    <?php if ($errorPass != null) { ?>
        <div class="alert alert-danger container" role="alert">
            <?php echo $errorPass; ?>
        </div>
    <?php
    }
    ?>
    <form action="modules/xlReset.php" method="POST" name="frmLogin" id="formAcount">
        <div>
            <input type="text" placeholder="Nhập tên đăng nhập" id="us" name="username" required pattern="^[A-Za-z0-9_]{5,24}$" title="Tên đăng nhập không có khoảng trắng và các ký tự đặc biệt, phải có độ dài từ 5-24">
        </div>
        <div>
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="mail" id="mail" placeholder="Nhập email" required>
        </div>
        <div>
            <input type="password" placeholder="Nhập mật khẩu mới" id="ps" name="passNew" required pattern="^[A-Za-z0-9_]{5,24}$" title="Mật khẩu không có khoảng trắng và các ký tự đặc biệt, phải có độ dài từ 5-24">
        </div>
        <div>
            <input type="password" id="psNew" name="rePassNew" required placeholder="Nhập lại mật khẩu mới" pattern="^[A-Za-z0-9_]{5,24}$">
        </div>
        <div class="user-foot text-center">
            <button type="submit" class="btn-pink" id="btnReset">ĐỔI MẬT KHẨU</button>
        </div>
    </form>
</div>
<?php
unset($_SESSION['errorReset']);
unset($_SESSION['errorPass']);
?>