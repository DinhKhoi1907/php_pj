<div class="col-12 mx-auto">
    <div>
        <form action="pages/qlTaiKhoan/xlCapNhat.php" method="get">
        <fieldset class="mx-auto border p-2 mx-auto col-5">
            <legend class="w-auto">Cập nhập thông tin tài khoản</legend>
            <?php 
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];
                    $sql = "SELECT TenDangNhap, MaLoaiTaiKhoan FROM taikhoan WHERE MaTaiKhoan = $id";
                    $result = DataProvider::ExecuteQuery($sql);
                    $row = mysqli_fetch_array($result);
                    $TenDangNhap = $row["TenDangNhap"];
                    $MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"];
                }
            ?>
            <div class="containerReg">
                <div>
                    <span>Tên đăng nhập: <?php echo $TenDangNhap;?></span>
                </div>
                <br>
                <div>
                <span>Loại tài khoản:</span>
                    <select name="cmbLoaiTaiKhoan">
                        <?php
                            $sql = "SELECT * FROM loaitaikhoan";
                            $result = DataProvider::ExecuteQuery($sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                if($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
                                    echo "<option value=".$row["MaLoaiTaiKhoan"]." selected>".$row["TenLoaiTaiKhoan"]."</option>";
                                else
                                    echo "<option value='".$row["MaLoaiTaiKhoan"]."'>".$row["TenLoaiTaiKhoan"]."</option>";
                            }
                        ?>
                    </select>
                <div>
                    <br>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" value="Cập nhật" class="bg-success text-white">   
                <a href="javascript:window.history.back(-1);">
                                <button class="bg-danger text-white" >Hủy bỏ</button>
                </a>
            </div>
        </fieldset>
        </form>
    </div>
</div>
