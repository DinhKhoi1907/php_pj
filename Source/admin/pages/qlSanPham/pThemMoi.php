<div class="col-12 mx-auto">
<form action="pages/qlSanPham/xlThemMoi.php" method="post" enctype="multipart/form-data">
    <fieldset class="mx-auto border p-2 mx-auto col-5">
        <legend class="w-auto">Thêm sản phẩm mới</legend>
        <div class="containerReg">
            <span class="label1">Tên sản phẩm:</span>
            <input type="text" placeholder="Nhập tên sản phẩm" id="txtTen" name="txtTen" required>
            <span class="label1">Loại sản phẩm</span>
            <select name="cmbLoai">
                <?php
                    $sql = "SELECT * FROM chitietloaisanpham WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row["MaChiTietLoaiSanPham"]; ?>"><?php echo $row["TenChiTietLoaiSanPham"]; ?></option>
                        <?php
                    }
                ?>
            </select>
            <br>
            <br>
            <span class="label1">Hãng sản xuất:</span>
            <select name="cmbHang">
                <?php
                    $sql = "SELECT * FROM hangsanxuat WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"]; ?></option>
                        <?php
                    }
                ?>
            </select>
            <br>
            <br>
            <span class="label1">Hình</span>
            <input type="file" name="fHinh">
            <img src="../images/<?php echo $row["HinhURL"]; ?>" width="75" alt="">
    
            <span class="label1">Giá:</span>
            <input type="number" placeholder="Nhập giá" name="txtGia" id="txtGia" required
            value="<?php echo $row["GiaSanPham"];?>" title="Giá chỉ gồm số">

            <span class="label1">Số lượng tồn</span>
            <input type="number" placeholder="Nhập số lượng tồn" name="txtTon" id="txtTon" required  value="<?php echo $row["SoLuongTon"];?>" title="Số lượng chỉ gồm số">

            <span class="label1">Mô tả</span>
            <textarea name="txtMoTa"></textarea>
            <div>
                <input type="hidden" name="id" value="<?php echo $row["MaSanPham"];?>">
                <input type="submit" value="Thêm mới" class="bg-success text-white">
            </div>
        </div>
    </fieldset>
</form>
</div>