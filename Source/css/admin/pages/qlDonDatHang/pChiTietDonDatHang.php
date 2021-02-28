<?php
    if(!isset($_GET["id"]))
    {
        DataProvider::ChangeURL("index.php?c=404");
    }
    $id = $_GET["id"];
    $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.TongThanhTien, t.TenHienThi, t.DiaChi, t.DienThoai, tt.MaTinhTrang, tt.TenTinhTrang
    FROM dondathang d, taikhoan t, tinhtrang tt
    WHERE d.MaTaiKhoan = t.MaTaiKhoan and d.MaTinhTrang = tt.MaTinhTrang and d.MaDonDatHang = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<div class="col-12">
<fieldset class="mx-auto border p-2 mx-auto col-5">
    <legend class="w-auto">Thông tin đơn đặt hàng</legend>
    <div class="row">
        <span class="col-4">Mã đơn đặt hàng:</span>
        <span><?php echo $row["MaDonDatHang"];?></span>
    </div>
  
    <div class="row">
        <span class="col-4">Ngày đặt hàng</span>
        <?php echo $row["NgayLap"];?>
    </div>
    <div class="row">
        <span class="col-4">Tên khách hàng</span>
        <?php echo $row["TenHienThi"];?>
    </div>
    <div class="row">
        <span class="col-4">Số điện thoại</span>
        <?php echo $row["DienThoai"];?>
    </div>
    <div class="row">
        <span class="col-4">Địa chỉ giao hàng</span>
        <?php echo $row["DiaChi"];?>
    </div>
    <div class="row">
        <span class="col-4">Tổng thành tiền</span>
        <?php echo $row["TongThanhTien"];?>
    </div>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id;?>" class="btnGiaoHang">
        <button class="bg-success text-white">Giao hàng</button>
    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php  echo $id;?>" class="btnThanhToan">
        <button class="bg-secondary text-white">Thanh toán</button>

    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=4&id=<?php  echo $id;?>" class="btnHuy">
        <button class="bg-danger text-white">Hủy đơn hàng</button>
    </a>
        <button class="bg-info text-white" onclick="inDonHang()">In đơn hàng</button>
</fieldset>
<h2 class="text-center">Chi tiết đơn hàng</h2>
<table class="table table-bordered w-auto mx-auto">
        <thead class="thead-light text-center">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá bán</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM chitietdondathang c, sanpham s
            WHERE c.MaSanPham = s.MaSanPham and c.MaDonDatHang = $id";
            $result = DataProvider::ExecuteQuery($sql);
            $i = 1;
            while($row = mysqli_fetch_array($result))
            {
                
                ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row["TenSanPham"]; ?></td>
                        <td>
                            <img src="../images/<?php echo $row["HinhURL"];?>" height="35">
                        </td>
                        <td><?php echo $row["SoLuong"]; ?></td>
                        <td><?php echo $row["GiaBan"]; ?></td>
                    </tr>
            <?php
            }
        ?>
        </tbody>
</table>
<script>
function inDonHang() {
  window.print();
}
</script>
</div>
