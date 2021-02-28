<div></div>
<h1 class="text-center text-danger col-12">
Quản lý chi tiết loại sản phẩm</h1>
<?php 
    if(!isset($_GET["id"]))
    {
        DataProvider::ChangeURL("index.php?c=404");
    }
    $id = $_GET["id"];
?>
<a href="index.php?c=3&a=6&id=<?php echo $id;?>">
        <img src="images/new.png" alt="">
</a>
<table class="table table-bordered w-auto mx-auto">
        <thead class="thead-light text-center">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên chi tiết loại sản phẩm</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $sql = "SELECT * FROM chitietloaisanpham WHERE MaLoaiSanPham =".$id;
            $result = DataProvider::ExecuteQuery($sql);
            $i = 1;
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $row["TenChiTietLoaiSanPham"]?></td>
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
                    <a href="pages/qlLoai/xlKhoaChiTiet.php?id=<?php echo $id;?>&idChiTiet=<?php echo $row["MaChiTietLoaiSanPham"];?>"><img src="images/lock.png" alt=""></a>
                    <a href="index.php?c=3&a=5&id=<?php echo $id;?>&idChiTiet=<?php echo $row["MaChiTietLoaiSanPham"];?>"><img src="images/edit.png" alt=""></a>
                    </td>
                </tr>
                <?php
                $i++;
            }
        ?>
        </tbody>
</table>