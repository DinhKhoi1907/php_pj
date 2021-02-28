<div class="col-12 mx-auto">
    <form action="pages/qlHang/xlThemMoi.php" method="get" onsubmit="return Kiemtra();">
    <fieldset class="mx-auto border p-2 mx-auto col-5">
        <legend class="w-auto">Thêm mới hãng sản xuất</legend>
        <div class="containerReg">
            <span>Tên hãng sản xuất:</span>
            <input type="text" name="txtTen" id="txtTen" required>
            <input type="submit" value="Thêm mới" class="bg-success text-white">
        </div>
        <i id="errTen"></i>
    </fieldset>
    </form>
</div>