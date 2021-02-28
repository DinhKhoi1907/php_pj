<?php
    if(!isset($_GET["id"]))
    {
        DataProvider::ChangeURL("index.php?c=404");
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM sanpham
    WHERE MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<div class="col-12 mx-auto">
<form action="pages/qlSanPham/xlCapNhat.php" method="post" enctype="multipart/form-data">
    <fieldset class="mx-auto border p-2 mx-auto col-5">
        <legend class="w-auto">Cập nhập thông tin sản phẩm</legend>
        <div class="containerReg">
            <span class="label1">Tên sản phẩm:</span>
            <input type="text" placeholder="Nhập tên sản phẩm" id="txtTen" name="txtTen" required value="<?php echo $row["TenSanPham"];?>">
            <span class="label1">Loại sản phẩm:</span>
            <select name="cmbLoai">
                <?php
                    $sql = "SELECT * FROM chitietloaisanpham WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row1=mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row1["MaChiTietLoaiSanPham"]; ?>" <?php if($row["MaChiTietLoaiSanPham"] == $row1["MaChiTietLoaiSanPham"]) echo "selected";?>>
                                <?php echo $row1["TenChiTietLoaiSanPham"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
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
            <textarea name="txtMoTa"><?php echo $row["MoTa"]; ?></textarea>
            <div>
                <input type="hidden" name="id" value="<?php echo $row["MaSanPham"];?>">
                <input type="hidden" name="HinhURL" value="<?php echo $row["HinhURL"];?>">
                <input type="submit" value="Cập nhật" class="bg-success text-white">
                </a>
            </div>
        </div>
        
    </fieldset>
</form>
</div>
