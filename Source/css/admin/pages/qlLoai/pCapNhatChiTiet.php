<h1 class="text-center text-danger col-12">
Quản lý chi tiết loại sản phẩm</h1>
<?php
    if(!isset($_GET["id"]))
    {
        DataProvider::ChangeURL("index.php?c=404");
    }
    $id = $_GET["id"];
    if(!isset($_GET["idChiTiet"]))
    {
        DataProvider::ChangeURL("index.php?c=404");
    }
    $idChiTiet = $_GET["idChiTiet"];
    $sql = "SELECT * FROM chitietloaisanpham WHERE MaChiTietLoaiSanPham =$idChiTiet";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result); 
?>
<div class="col-12 mx-auto">
<form action="pages/qlLoai/xlCapNhatChiTiet.php" method="get">
    <fieldset class="mx-auto border p-2 mx-auto col-5">
        <legend class="w-auto">Cập nhập thông tin chi tiết loại sản phẩm</legend>
        <div class="containerReg">
            <span>Tên chi tiết loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenChiTietLoaiSanPham"];?>" required>
            <input type="hidden" name="idChiTiet" value="<?php echo $row["MaChiTietLoaiSanPham"]; ?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" value="Cập nhật" class="bg-success text-white">
        </div>
        <i id="errTen"></i>
    </fieldset>
</form>
</div>
