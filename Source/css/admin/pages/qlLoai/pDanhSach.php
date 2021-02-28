<h1 class="text-center text-danger col-12">
Quản lý loại sản phẩm</h1>
<a href="index.php?c=3&a=3">
        <img src="images/new.png" alt="">
</a>
<div class="col-8 mx-auto">
    <div class="text-center">
        <form action="index.php" method="get" class="align-self-center">
            <div class="input-group">
                <input type="hidden" name="c" value="3">
                <input type="hidden" name="a" value="7">
                <input type="text" name="q" placeholder="Tìm kiếm tên loại sản phẩm" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-pink" type="submit"><b>Tìm kiếm</b></button>
                </span>
            </div>
        </form>
    </div>
    <br>
</div>
<div class="col-12">
<table class="table table-bordered w-auto mx-auto">
        <thead class="thead-light text-center">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên loại sản phẩm</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM loaisanpham";
            $result = DataProvider::ExecuteQuery($sql);
            $i = 1;
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $row["TenLoaiSanPham"];?></td>
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
                    <a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row["MaLoaiSanPham"];?>"><img src="images/lock.png" alt=""></a>
                    <a href="index.php?c=3&a=2&id=<?php echo $row["MaLoaiSanPham"];?>"><img src="images/edit.png" alt=""></a>
                    <a href="index.php?c=3&a=4&id=<?php echo $row["MaLoaiSanPham"];?>"><img src="images/new.png" alt=""></a>
                    </td>
                </tr>
                <?php
                $i++;
            }
        ?>
        </tbody>
</table>
</div>
