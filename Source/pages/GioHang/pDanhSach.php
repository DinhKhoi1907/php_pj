<div class="container">
    <br>
    <h1 class="text-center">Quản lý giỏ hàng</h1>
    <div class="row">
        <div class="cart-page col-12">
            <table class="table table-cart text-center">
                <thead>
                    <tr>
                        <th width="10%">Sản phẩm</th>
                        <th width="35%">Mô tả</th>
                        <th width="15%">Đơn giá</th>
                        <th width="5%">Số lượng</th>
                        <th width="15%">Tổng</th>
                        <th width="10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $tongGia = 0;
                    if(isset($_SESSION["GioHang"]))
                    {
                        $soSanPham = count($gioHang->listProduct);

                        for($i = 0; $i < $soSanPham; $i++)
                        {
                            $id = $gioHang->listProduct[$i]->id;
                            $sql = "SELECT * FROM sanpham WHERE MaSanPham = $id";

                            $result = DataProvider::ExecuteQuery($sql);
                            $row = mysqli_fetch_array($result);
                            ?>

                            <form name="frmGioHang" action="pages/GioHang/xlCapNhatGioHang.php" method="post">
                                <tr>
                                    <td><img src="images/<?php echo $row["HinhURL"]; ?>.jpg" width="50"></td>
                                    <td>
                                        <?php echo $row["TenSanPham"]; ?>
                                    </td>
                                    <td><?php echo $row["GiaSanPham"] ?></td>
                                    <td>
                                        <input type="number" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->num; ?>" class="w-100" />
                                        <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                                    </td>
                                    <td><?php echo $tongGia = $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;?></td>

                                    <td>
                                        <input type="submit" value="Cập nhật" class="btn-pink"/>
                                    </td>
                                </tr>
                            </form>
                            <?php 
                        }
                    }
                    $_SESSION["TongGia"] = $tongGia;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <a href="pages/GioHang/xlDatHang.php" class="col-5">
            <div class="user-foot text-center">
                <button type="submit" class="btn-pink" id="btnsignin">ĐẶT HÀNG</button>
            </div>
        </a>
    </div>
    
</div>