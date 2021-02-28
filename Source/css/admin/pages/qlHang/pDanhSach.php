<a href="index.php?c=4&a=3">
        <img src="images/new.png" alt="">
</a>
<div class="col-9 mx-auto">
    <div class="text-center">
        <form action="index.php" method="get" class="align-self-center">
            <div class="input-group">
                <input type="hidden" name="c" value="4">
                <input type="hidden" name="a" value="4">
                <input type="text" name="q" placeholder="Tìm kiếm hãng sản xuất" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-pink" type="submit"><b>Tìm kiếm</b></button>
                </span>
            </div>
        </form>
    </div>
    <br>
</div>
<div class="text-center col-12">
    <table class="table table-bordered w-auto mx-auto">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên hãng sản xuất</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM hangsanxuat";
                $result = DataProvider::ExecuteQuery($sql);
                $i = 1;
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i?></th>
                        <td><?php echo $row["TenHangSanXuat"]?></td>
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
                        <a href="pages/qlHang/xlKhoa.php?id=<?php echo $row["MaHangSanXuat"];?>"><img src="images/lock.png" alt=""></a>
                        <a href="index.php?c=4&a=2&id=<?php echo $row["MaHangSanXuat"];?>"><img src="images/edit.png" alt=""></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            ?>
            </tbody>
    </table>
</div>

