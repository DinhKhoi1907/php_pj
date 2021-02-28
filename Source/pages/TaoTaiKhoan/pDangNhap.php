<div class="user-wrapper">
    <div class="user-nav">
        <a href="index.php?a=6&sub=1" class="active float-left">ĐĂNG NHẬP</a>
        <a href="index.php?a=6&sub=2" class="float-left">ĐĂNG KÝ</a>
        <a href="index.php?a=6&sub=3" class="float-left">QUÊN MẬT KHẨU</a>
        <a href="index.php?a=6&sub=4" class="float-left">LOGIN WITH FACEBOOK</a>

    </div>
    <?php
    if (isset($_GET["err"])) {
    ?>
        <div>
            <span class="err">(*)Tên đăng nhập hoặc mật khẩu không đúng</span>
        </div>
    <?php
    }
    ?>
    <!-- Thong bao loi Error -->
    <?php
    if (isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
    } else {
        $error = null;
    }
    ?>

    <?php if ($error != null) { ?>
        <div class="alert alert-danger container" role="alert">
            <?php echo $error; ?>
        </div>
    <?php
    }
    ?>
    <!-- Thong bao active qua gmail dang ki -->
    <?php
    if (isset($_SESSION["activeCode"])) {
        $active = $_SESSION["activeCode"];
    } else {
        $active = null;
    }
    ?>

    <?php if ($active != null) { ?>
        <div class="alert alert-success container" role="alert">
            <?php echo $active; ?>
        </div>
    <?php
    }
    ?>

    <!-- thong bao reset mat khau -->
    <?php
    if (isset($_SESSION["resetPass"])) {
        $resetPass = $_SESSION["resetPass"];
    } else {
        $resetPass = null;
    }
    ?>
    <?php if ($resetPass != null) { ?>
        <div class="alert alert-success container" role="alert">
            <?php echo $resetPass; ?>
        </div>
    <?php
    }
    ?>
    <!-- thong bao reset mat khau -->
    <?php
    if (isset($_SESSION["resetPassWork"])) {
        $resetPassWork = $_SESSION["resetPassWork"];
    } else {
        $resetPassWork = null;
    }
    ?>
    <?php if ($resetPassWork != null) { ?>
        <div class="alert alert-success container" role="alert">
            <?php echo $resetPassWork; ?>
        </div>
    <?php
    }
    ?>
    <form action="modules/xlDangNhap.php" method="POST" name="frmLogin" id="formAcount">
        <div>
            <input type="text" placeholder="Nhập tên đăng nhập" id="us" name="txtUS" required pattern="^[A-Za-z0-9_]{5,24}$" title="Tên đăng nhập không có khoảng trắng và các ký tự đặc biệt, phải có độ dài từ 5-24">
        </div>
        <div>
            <input type="password" id="ps" name="txtPS" required placeholder="Nhập mật khẩu" pattern="^[A-Za-z0-9_]{5,24}$" title="Mật khẩu không có khoảng trắng và các ký tự đặc biệt, phải có độ dài từ 5-24">
        </div>
        <div class="user-foot text-center">
            <button type="submit" class="btn-pink" id="btnsignin">ĐĂNG NHẬP</button>
        </div>
    </form>
</div>
<?php
unset($_SESSION['error']);
unset($_SESSION['activeCode']);
unset($_SESSION['resetPass']);
unset($_SESSION['resetPassWork']);
?>