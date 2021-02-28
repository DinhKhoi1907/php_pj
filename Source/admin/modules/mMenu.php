<nav class="navbar">
        <ul class="nav" id="menu">
            <li class="nav-item"><a class="nav-link text-white <?php 
                if($c == 1){echo "active";}else { echo ""; }?>"
                    href="index.php?c=1">Quản lý tài khoản</a>
            </li>
            <li class="nav-item"><a class="nav-link text-white
            <?php 
                if($c == 2){echo "active";}else { echo ""; }?>"
                href="index.php?c=2">Quản lý sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white 
                <?php 
                if($c == 3){echo "active";}else { echo ""; }?>"
                href="index.php?c=3">Quản lý loại</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white 
                <?php 
                if($c == 4){echo "active";}else { echo ""; }?>"
                href="index.php?c=4">Quản lý hãng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white
                <?php 
                if($c == 5){echo "active";}else { echo ""; }?>" 
                href="index.php?c=5">Quản lý đơn đặt hàng</a>
            </li>
        </ul>
</nav>
