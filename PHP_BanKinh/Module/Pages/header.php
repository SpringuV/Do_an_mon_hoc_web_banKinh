<!-- Header -->
    <!-- navbar start -->
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/PHP_BanKinh/Module/homePage.php">
                    <img src="/PHP_BanKinh/images/logo/logo.png" alt="Logo" height="50px" class="d-inline-block align-text-top"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item rounded">
                        <a class="nav-link" aria-current="page" href="/PHP_BanKinh/Module/homePage.php">Trang chủ</a>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="/PHP_BanKinh/Module/Pages/Page_header/tinTuc.php">Tin tức</a>
                    </li>
                    <li class="nav-item dropdown rounded">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sản phẩm</a>
                    <ul class="dropdown-menu " style="justify-content:center;">
                        <li><a class="dropdown-item" href="#">Kính</a></li>
                        <li><a class="dropdown-item" href="#">Đồng Hồ</a></li>

                            <!-- <li><hr class="dropdown-divider"></li> -->
                        <li><a class="dropdown-item" href="#">Mũ</a></li>
                        <li><a class="dropdown-item" href="#">Túi sách</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown rounded">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Chính sách</a>
                        <ul class="dropdown-menu">
                        <!-- <li><hr class="dropdown-divider"></li> -->
                        <li><a class="dropdown-item" href="/PHP_BanKinh/Module/Pages/Page_header/chinhSachThanhToan.php">Chính sách thanh toán</a></li>
                        <li><a class="dropdown-item" href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                    <!-- start search name product-->
                        <form class="d-flex mr-2"  role="search" action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemNamePro.php" method="get">
                            <input class="form-control me-2" type="search" id="search_query" name="search_query" placeholder="Tìm tên sản phẩm" aria-label="Search">
                            <button class="btn btn-outline-success" width="100px" type="submit" onclick="return validateForm()">Tìm kiếm</button>
                        </form>
                        <!-- end search name product-->
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                        <a href="/PHP_BanKinh/Module/Pages/login.php" class="btn btn-primary btn-block justify-content-center">Đăng nhập </a>
                    <?php } else { ?>
                    <div id="autoHide">
                        <?php echo "<h6 style='margin-right: 10px;'>Welcome, "  .$_SESSION['user'] . "!</h6>";?> 
                    </div>
                    <div>
                        <a href="/PHP_BanKinh/Module/Pages/gioHang/giohang.php" class="btn d-flex mr-2" style="background-color: #00802b; color: white; text-decoration: none;">Giỏ hàng</a>
                    </div>
                    <?php } ?>
                    
            </div>
        </div>
        </nav>
    </div>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/jquery.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/function.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/ckeditor.js"></script>
    <!-- end navbar -->
    <!-- end header -->