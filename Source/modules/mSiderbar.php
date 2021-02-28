<div id="header-list">
    <div class="container">
        <div class="d-flex justify-content-center">
            <ul class="nav header-menu">
                <li>
                    <a class="nav-link" href="index.php?a=9">TẤT CẢ</a>
                </li>
                <?php
                $sql = "SELECT * FROM loaisanpham WHERE BiXoa = 0";
                $result = DataProvider::ExecuteQuery($sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="index.php?c=1" role="button" data-toggle="dropdown"><?php echo $row["TenLoaiSanPham"]; ?></a>
                        <div class="dropdown-menu header-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                            <?php
                            $sql = "SELECT * FROM chitietloaisanpham WHERE BiXoa = 0 AND MaLoaiSanPham = " . $row["MaLoaiSanPham"];
                            $resultz = DataProvider::ExecuteQuery($sql);
                            while ($rowz = mysqli_fetch_array($resultz)) {
                            ?>
                                <a href="index.php?a=7&sub=<?php echo $rowz["MaChiTietLoaiSanPham"]; ?>" class="dropdown-item nav-link"><?php echo $rowz["TenChiTietLoaiSanPham"] ?></a>
                                <div class="dropdown-divider"></div>
                            <?php
                            }
                            ?>

                        </div>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="index.php?c=1" role="button" data-toggle="dropdown">CÁC HÃNG SẢN XUẤT</a>
                    <div class="dropdown-menu header-menu" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                        <?php
                        $sql = "SELECT * FROM hangsanxuat WHERE BiXoa = 0";
                        $resultz = DataProvider::ExecuteQuery($sql);
                        while ($rowz = mysqli_fetch_array($resultz)) {
                        ?>
                            <a href="index.php?a=11&sub=<?php echo $rowz["MaHangSanXuat"]; ?>" class="dropdown-item nav-link"><?php echo $rowz["TenHangSanXuat"] ?></a>
                            <div class="dropdown-divider"></div>
                        <?php
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>