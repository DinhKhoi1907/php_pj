<a href="index.php?c=2&a=3">
    <img src="images/new.png" alt="">
</a>
<div class="col-8 mx-auto">
    <div class="text-center">
        <form action="index.php" method="get" class="align-self-center">
            <div class="input-group">
                <input type="hidden" name="c" value="2">
                <input type="hidden" name="a" value="4">
                <input type="text" name="q" placeholder="Tìm kiếm sản phẩm" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-pink" type="submit"><b>Tìm kiếm</b></button>
                </span>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" checked value="TenSanPham">Tên sản phẩm
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="Gia">Giá
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="NgayNhap">Ngày nhập
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="LoaiSanPham">Loại sản phẩm
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tieuChi" value="MoTa">Mô tả
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
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày nhập</th>
            <th scope="col">Số lượng tồn</th>
            <th scope="col">Số lượng bán</th>
            <th scope="col">Số lượt xem</th>
            <th scope="col">Loại sản phẩm</th>
            <th scope="col">Hãng sản xuất</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT * FROM sanpham";
        $result = DataProvider::ExecuteQuery($sql);
        $i = 1;
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <tr>
                <th scope="row"><?php echo $i?></th>
                <td><?php echo $row["TenSanPham"]?></td>
                <td><img src="../images/<?php echo $row["HinhURL"]?>" alt="" width=30px></td>
                <td><?php echo $row["GiaSanPham"]?></td>
                <td><?php echo $row["NgayNhap"]?></td>
                <td><?php echo $row["SoLuongTon"]?></td>
                <td><?php echo $row["SoLuongBan"]?></td>
                <td><?php echo $row["SoLuocXem"]?></td>
                <td>
                    <?php 
                    $sqlz = "SELECT TenChiTietLoaiSanPham FROM chitietloaisanpham WHERE MaChiTietLoaiSanPham = ".$row["MaChiTietLoaiSanPham"];
                    $loaisanpham = DataProvider::ExecuteQuery($sqlz);
                    $loaisanpham = mysqli_fetch_array($loaisanpham);
                    echo $loaisanpham["TenChiTietLoaiSanPham"];
                    ?>
                </td>
                <td>
                    <?php 
                        $sqlz = "SELECT TenHangSanXuat FROM hangsanxuat WHERE MaHangSanXuat = ".$row["MaHangSanXuat"];
                        $hangsanxuat = DataProvider::ExecuteQuery($sqlz);
                        $hangsanxuat = mysqli_fetch_array($hangsanxuat);
                        echo $hangsanxuat["TenHangSanXuat"];
                    ?>
                </td>
                <td>
                    <?php 
                            if(strlen($row["MoTa"]) > 50)
                            {
                                $sMoTa = substr($row["MoTa"],0,20);
                                $sMoTaMore = substr($row["MoTa"],20); 
                            }
                            else{
                                $sMoTa = $row["MoTa"];
                                $sMoTaMore = "";
                            }   
                    ?>
                    <p>
                       <?php echo $sMoTa;?>
                    </p>
                </td>
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
                <td>
                    <div> <a href="pages/qlSanPham/xlKhoa.php?id=<?php echo $row["MaSanPham"];?>"><img src="images/lock.png" alt="" width=20></a>
                    <a href="index.php?c=2&a=2&id=<?php echo $row["MaSanPham"];?>"><img src="images/edit.png" alt="" width=20></a></div>
                </td>
            </tr>
            <?php
            $i++;
        }
    ?>
    </tbody>
</table>
