<div class="remain_top fixed-top col-12">
    <div class="row logo login">
        <div class="col-lg-10 logo col-6"><span><a href="./index_project1.php">Coffee Club</a></span></div>
        <div class="col-lg-2 login col-6">
            <?php
            //讀取後台購物車數量，$_SERVER['REMOTE_ADDR']取得使用者ip
            $SQLstring = "SELECT * FROM cart
            WHERE orderid is NULL
            AND ip='" . $_SERVER['REMOTE_ADDR'] . "'";
            $cart_rs = $link->query($SQLstring);
            ?>
            <p>
            <?php if (isset($_SESSION['login'])) { ?>
                <a class="sign" href="javascript:void(0);" onclick="btn_confirmLink('是否確定登出？','./include/logout.php')">會員登出</a>
            <?php } else { ?>
                <a href="./login.php" id="signIn" class="sign">會員登入</a>
            <?php } ?>
                <a href="./register.php" id="signUp" class="sign">註冊</a><a #id="cart_link" href="./cart.php"><i id="cart_icon" class="fa-solid fa-cart-shopping"><span class="badge text-bg-warning"><?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?></span></i></a>
            </p>
        </div>
    </div>
    <div class="row nav">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- 注意：連結本地檔案時，路徑要以取用模組的檔案位置為基準，而不是模組本身的位置，所以這裡的連結是設跟index同一層的位置 -->
                    <a class="navbar-brand" href="./index_project1.php"><i class='bx bxs-coffee-bean'></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index_project1.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Locations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Franchise</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Items
                                </a>
                                <?php
                                //列出nav產品類別第一層
                                $SQLstring = "SELECT * FROM pyclass
                                WHERE level=1
                                ORDER BY sort";
                                $pyclass01 = $link->query($SQLstring);
                                $i = 1; //控制編號順序
                                ?>

                                <ul class="dropdown-menu">
                                    <?php
                                    while ($pyclass01_Rows = $pyclass01->fetch()) { ?>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="./products.php?classid=<?php echo $pyclass01_Rows['classid']; ?>&level=<?php echo $pyclass01_Rows['level']; ?>"><em class="<?php echo $pyclass01_Rows['fonticon']; ?>"></em><?php echo $pyclass01_Rows['cname']; ?></a>
                                            <?php
                                            //列出nav產品類別第二層
                                            // 建立查詢條件
                                            $SQLstring = sprintf(
                                                "SELECT * FROM pyclass
                                                WHERE level=2
                                                AND uplink=%d
                                                ORDER BY sort",
                                                $pyclass01_Rows['classid']
                                            );
                                            // 實際做查詢
                                            $pyclass02 = $link->query($SQLstring);
                                            ?>
                                            <ul class="dropdown-menu">
                                                <?php while ($pyclass02_Rows = $pyclass02->fetch()) { //實際撈出資料
                                                ?>
                                                    <li><a class="dropdown-item " href="./products.php?classid=<?php echo $pyclass02_Rows['classid']; ?>"><em class="<?php echo $pyclass02_Rows['fonticon']; ?>"></em><?php echo $pyclass02_Rows['cname']; ?></a></li>
                                                    <!-- 設定網頁連結 &傳送類別ID &撈資料庫icon &撈資料庫第二層類別名稱 -->
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex" id="search" action="./products.php" method="get" role="search">
                            <input class="form-control me-2" type="text" name="search_name" id="search_name" placeholder="Search" aria-label="Search" value="<?php echo (isset($_GET['search_name'])) ? $_GET['search_name'] : ''; ?>" required>
                            <button class="btn btn_magnifying_glass" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>