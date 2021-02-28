<div class="col-8 mx-auto">
    <div class="text-center">
        <form action="index.php" method="get" class="align-self-center">
            <div class="input-group">
                <input type="hidden" name="c" value="5">
                <input type="hidden" name="a" value="3">
                <input type="text" name="q" placeholder="Tìm kiếm đơn đặt hàng" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-pink" type="submit"><b>Tìm kiếm</b></button>
                </span>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" checked value="NgayLap">Ngày lập
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="KhachHang">Khách hàng
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="TinhTrang">Tình trạng
                </label>
            </div>
        </form>
    </div>
    <br>
</div>
<table class="table table-bordered w-auto mx-auto">
        <thead class="thead-light text-center">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã đơn đặt hàng</th>
                <th scope="col">Ngày lập</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang
            FROM dondathang d, taikhoan t, tinhtrang tt WHERE d.MaTaiKhoan = t.MaTaiKhoan and d.MaTinhTrang = tt.MaTinhTrang
            ORDER BY d.MaTinhTrang, d.NgayLap";
            $result = DataProvider::ExecuteQuery($sql);
            $i = 1;
            while($row = mysqli_fetch_array($result))
            {
                $c = "";
                switch($row["MaTinhTrang"])
                {
                    case 2:
                        $c = "classGiaoHang";
                        break;
                    case 3:
                        $c = "classThanhToan";
                        break;
                    case 4:
                        $c = "classHuy";
                        break;
                }
                ?>
                    <tr class="<?php echo $c;?>">
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row["MaDonDatHang"]; ?></td>
                        <td><?php echo $row["NgayLap"]; ?></td>
                        <td><?php echo $row["TenHienThi"]; ?></td>
                        <td><?php echo $row["TenTinhTrang"]; ?></td>
                        <td>
                            <a href="index.php?c=5&a=2&id=<?php echo $row["MaDonDatHang"]; ?>">
                                <img src="images/edit.png" alt="">
                            </a>
                        </td>
                    </tr>
            <?php
            }
        ?>
        </tbody>
</table>