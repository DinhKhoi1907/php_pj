<h1 class="text-center text-danger col-12">
Quản lý chi tiết loại sản phẩm</h1>
<?php 

if(!isset($_GET["id"]))
{
    DataProvider::ChangeURL("index.php?c=404");
}
$id = $_GET["id"];
?>
<div class="col-12 mx-auto">
<form action="pages/qlLoai/xlThemMoiChiTiet.php" method="get">
    <fieldset class="mx-auto border p-2 mx-auto col-5">
        <legend class="w-auto">Thêm mới chi tiết loại sản phẩm</legend>
        <div class="containerReg">
            <span >Tên chi tiết loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen" required>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" value="Thêm mới" class="bg-success text-white">
        </div>
    </fieldset>
</form>
</div>