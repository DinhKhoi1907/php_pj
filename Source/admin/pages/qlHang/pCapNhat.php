<?php
    if(!isset($_GET["id"]))
    {
        DataProvider::ChangeURL("index.php?c=404");
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM hangsanxuat WHERE MaHangSanXuat =$id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<div class="col-12 mx-auto">
<form action="pages/qlHang/xlCapNhat.php" method="get" onsubmit="return KiemTra();">
    <fieldset class="mx-auto border p-2 mx-auto col-5">
        <legend class="w-auto">Cập nhập thông tin hãng sản xuất</legend>
        <div class="containerReg">
            <span>Tên hãng sản xuất:</span>
            <input  type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenHangSanXuat"];?>" required>
            <input type="hidden" name="id" value="<?php echo $row["MaHangSanXuat"]; ?>">
            <input type="submit" value="Cập nhật" class="bg-success text-white">
        </div>
        <i id="errTen"></i>
    </fieldset>
</form>
</div>