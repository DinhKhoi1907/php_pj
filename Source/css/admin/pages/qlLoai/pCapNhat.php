<h1 class="text-center text-danger col-12">
Quản lý loại sản phẩm</h1>
<?php
    if(!isset($_GET["id"]))
    {
        DataProvider::ChangeURL("index.php?c=404");
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM loaisanpham WHERE MaLoaiSanPham =$id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<div class="col-12 mx-auto">
<form action="pages/qlLoai/xlCapNhat.php" method="get">
    <fieldset class="mx-auto border p-2 mx-auto col-5">
        <legend class="w-auto">Cập nhập thông tin loại sản phẩm</legend>
        <div class="containerReg">
            <span>Tên loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenLoaiSanPham"];?>" required>
            <input type="hidden" name="id" value="<?php echo $row["MaLoaiSanPham"]; ?>">
            <input type="submit" value="Cập nhật" class="bg-success text-white">
        </div>
    </fieldset>
</form>
</div>