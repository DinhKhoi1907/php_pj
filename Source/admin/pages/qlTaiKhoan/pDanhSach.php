<div class="col-8 mx-auto">
    <div class="text-center">
        <form action="index.php" method="get" class="align-self-center">
            <div class="input-group">
                <input type="hidden" name="c" value="1">
                <input type="hidden" name="a" value="3">
                <input type="text" name="q" placeholder="Tìm kiếm tài khoản" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-pink" type="submit"><b>Tìm kiếm</b></button>
                </span>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" checked value="TenHienThi">Tên hiển thị
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="TenDangNhap">Tên đăng nhập
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="diaChi">Địa chỉ
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="email">Email
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="loaitaikhoan">Loại tài khoản
                </label>
            </div>
        </form>
    </div>
    <br>
</div>
<table class="table table-bordered w-auto mx-auto">
    <thead class="thead-light text-center ">
        <tr>
            <th scope="col" >Mã tài khoản</th>
            <th scope="col">Tên đăng nhập</th>
            <th scope="col">Tên hiển thị</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Loại tài khoản</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DiaChi, t.DienThoai, t.Email, t.BiXoa, l.TenLoaiTaiKhoan 
        FROM taikhoan t, loaitaikhoan l
        WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan";
        $result = DataProvider::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <tr>
                <th><?php echo $row["MaTaiKhoan"];?></th>
                <td><?php echo $row["TenDangNhap"];?></td>
                <td><?php echo $row["TenHienThi"];?></td>
                <td><?php echo $row["DiaChi"];?></td>
                <td><?php echo $row["DienThoai"];?></td>
                <td><?php echo $row["Email"];?></td>
                <td>
                    <?php 
                    if($row["BiXoa"] == 0)
                    {
                        ?>
                            <img src="images/active.png" alt="">
                        <?php
                    }
                    else{
                        ?>
                            <img src="images/locked.png" alt="">
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo $row["TenLoaiTaiKhoan"]; ?></td>
                <td>
                    <a href="pages/qlTaiKhoan/xlKhoa.php?id=<?php echo $row["MaTaiKhoan"];?>"><img src="images/lock.png" alt=""></a>
                    <a href="index.php?c=1&a=2&id=<?php echo $row["MaTaiKhoan"];?>"><img src="images/edit.png" alt=""></a>
                </td>
            </tr>
            <?php
        }
    ?>
    </tbody>
</table>
