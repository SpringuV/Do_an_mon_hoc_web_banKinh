<div align="center">
    <span id="search_eror" class="red" ></span>
</div>
<div class="flex-shrink-0 p-0 mt-3">
    <ul class="list-unstyled ps-0">
        <!-- Lọc kết quả -->
        <div class="mb-1">
            <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyLocSP.php" method="GET">
                <label for="filter_pro" class="form-label">Lọc sản phẩm:</label> 
                <select id="filter_pro" name="filter_pro" style="width: 100%; margin-bottom: 10px;">
                    <option value= "DESC">Giá cao -> giá thấp</option>
                    <option value= "ASC">Giá thấp -> giá cao</option>
                </select>
                <button style="width: 100px;">Lọc</button>
            </form>
        </div>
        <li class="mb-1 ">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border collapsed justify-content-center" data-bs-toggle="collapse" data-bs-target="#orders-collapse1" aria-expanded="false">
            <strong>Loại sản phẩm</strong>
            </button>
            <div class="collapse" id="orders-collapse1">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li>
                        <form id="form-listItem" action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemLoaiSP.php">
                            <button class= "btn btn-ofMind" type="search" id="search_query" name="search_query" value="glass">Kính</button>  
                        </form>    
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemLoaiSP.php">
                            <button class= "btn btn-ofMind" type="search" id="search_query" name="search_query" value="watch">Đồng hồ</button>  
                        </form>  
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemLoaiSP.php">
                            <button class= "btn btn-ofMind" type="search" id="search_query" name="search_query" value="hat">Mũ</button>  
                        </form>     
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemLoaiSP.php">
                            <button class= "btn btn-ofMind" type="search" id="search_query" name="search_query" value="bags">Túi sách</button>  
                        </form>     
                    </li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border collapsed justify-content-center" data-bs-toggle="collapse" data-bs-target="#orders-collapse2" aria-expanded="false">
            <strong>Thương hiệu</strong>
            </button>
            <div class="collapse" id="orders-collapse2">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li >
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemHang.php" enctype="multipart/form-data">
                            <button class= "btn btn-ofMind"  type="search" id="search_query" name="search_query" value="Gucci">Gucci</button>  
                        </form>
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemHang.php" enctype="multipart/form-data">
                            <button class= "btn btn-ofMind"  type="search" id="search_query" name="search_query" value="Montblanc">Montblanc</button>  
                        </form>    
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemHang.php" enctype="multipart/form-data">
                            <button class= "btn btn-ofMind"  type="search" id="search_query" name="search_query" value="Licions">Licions</button>  
                        </form>
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemHang.php" enctype="multipart/form-data">
                            <button class= "btn btn-ofMind"  type="search" id="search_query" name="search_query" value="Cartier">Cartier</button>  
                        </form>
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemHang.php" enctype="multipart/form-data">
                            <button class= "btn btn-ofMind"  type="search" id="search_query" name="search_query" value="Oakley">Oakley</button>  
                        </form>
                    </li>
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemHang.php" enctype="multipart/form-data">
                            <button class= "btn btn-ofMind"  type="search" id="search_query" name="search_query" value="Chopard">Chopard</button>  
                        </form>    
                    <li>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyTimKiemHang.php" enctype="multipart/form-data">
                            <button class= "btn btn-ofMind"  type="search" id="search_query" name="search_query" value="Burberry">Burberry</button>  
                        </form>     
                    </li>
                </ul>
            </div>
        </li>
        
        <?php 
        // lấy user_id
            if(isset($_SESSION['user_id'])){
                $id_user = $_SESSION['user_id'];
                if(isset($_SESSION['role_user'])){
                    // lấy quyền người dùng
                    $role = $_SESSION['role_user'];
                    // nếu là admin thì sẽ được quyền thêm sửa xóa sản phẩm
                    if($role == 'admin'){ ?>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border collapsed justify-content-center" data-bs-toggle="collapse" data-bs-target="#orders-collapse3" aria-expanded="false">
                            <strong> Quản lý sản phẩm</strong>
                            </button>
                            <div class="collapse" id="orders-collapse3">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li ><a href="/PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/themSP.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Thêm sản phẩm</a></li>
                                    <li><a href="/PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/danhSachSP.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Danh sách sản phẩm</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border collapsed justify-content-center" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            <strong> Quản lý bài viết</strong>
                            </button>
                            <div class="collapse" id="orders-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="/PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/themBaiViet.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Thêm bài viết</a></li>
                                    <li><a href="/PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/danhSachBaiViet.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Danh sách bài viết</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php 
                    }
                }
        ?>
            <!-- Tất cả người dùng đều có thể coi được thông tin tài khoản -->
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border collapsed justify-content-center" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                <strong>Tài khoản &nbsp;</strong> {<?php echo $role;?>}
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Thông báo</a></li>
                            <li><a href='/PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/doiThongTin.php?user_id=<?php echo $id_user;?>' class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Thay đổi thông tin</a></li>
                            <li><a href='/PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/doiMatKhau.php?user_id=<?php echo $id_user;?>' class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Đổi mật khẩu</a></li>
                            <li><a href="/PHP_BanKinh/Module/hidden_screen/quanlytaikhoan/logout.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded justify-content-center">Đăng xuất</a></li>
                    </ul>
                </div>
            <?php
        } else {
            $id_user = "error_user_id";
        } ?>
        </li>
    </ul>
</div>