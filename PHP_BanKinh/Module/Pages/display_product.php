<?php
    
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
    // start phan trang
        // so san pham co tren moi trang
        $productPerPage = 8;
        // xac dinh vị trí trang hiện tại, mặc định là trang 1
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        // tính offset (vị trí bắt đầu của sản phẩm trong câu truy vấn)
        $offset = ($current_page - 1)*$productPerPage;
        $searchKey = isset($_GET['search_query']) ? $_GET['search_query'] : '';
        // câu truy vấn để lấy dữ liệu sản phẩm theo trang
        if (isset($_SESSION['hang_SP']) && !empty($_SESSION['hang_SP'])) {
            $products = $_SESSION['hang_SP'];
            $totalProducts = count($products);
            $products = array_slice($products, $offset, $productPerPage);
            unset($_SESSION['hang_SP']);
        }else if(isset($_SESSION['type_Pro']) && !empty($_SESSION['type_Pro'])){
            $products = $_SESSION['type_Pro'];
            $totalProducts = count($products);
            $products = array_slice($products, $offset, $productPerPage);
            unset($_SESSION['type_Pro']);
        } else if(isset($_SESSION['filter_pro']) && !empty($_SESSION['filter_pro'])){
            $products = $_SESSION['filter_pro'];
            $totalProducts = count($products);
            $products = array_slice($products, $offset, $productPerPage);
            unset($_SESSION['filter_pro']);
        } else if(isset($_SESSION['name_pro']) && !empty($_SESSION['name_pro'])){
            $products = $_SESSION['name_pro'];
            $totalProducts = count($products);
            $products = array_slice($products, $offset, $productPerPage);
            
            echo '<div class="mb-1" align="center" style="color: green;">';
                echo '<h1 style="color:black;"><strong>Tìm kiếm</strong></h1>';
                echo '<h6>Kết quả tìm kiếm cho "<span style="color:blue;">'.$searchKey.'</span>", sau đây là kết quả:</h6>';
            echo '</div>';
            unset($_SESSION['name_pro']);
        }
        else {
            // Nếu không có kết quả tìm kiếm thì hiển thị tất cả sản phẩm
            $sql = "SELECT * FROM product LIMIT $offset, $productPerPage";
            $result = $conn->query($sql);
            $products = $result->fetch_all(MYSQLI_ASSOC);
            $sqlCount = "SELECT COUNT(*) AS total FROM product";
            $resultCount = $conn->query($sqlCount);
            $rowCount = $resultCount->fetch_assoc();
            $totalProducts = $rowCount['total'];
            echo '<div class="mb-1" align="center">';
                if (isset($_SESSION['error'])) {
                    echo "<h6 style='color:red'>" . $_SESSION['error'] . "</h6>";
                    unset($_SESSION['error']);
                }
            echo '</div>';
        }
        $totalPages = ceil($totalProducts / $productPerPage);   
        
    // hiển thị sản phẩm
    if (!empty($products)) {
        echo '<div class="row mt-4 text-center">';
        foreach ($products as $row) {
            $image_path = $row['image_pro'];
            $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/', "/PHP_BanKinh/", $image_path);
            $id_pro = $row['idproduct']; ?>
            <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="/PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/chiTietSanPham.php?id_pro=<?php echo $row['idproduct']?>"><img class="card-img-top  custom-img-size" src="<?php echo trim($relative_path)?>"></a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="/PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/chiTietSanPham.php?id_pro=<?php echo $row['idproduct']?>"> <?php echo $row["name_pro"] ?></a></h5>
                            <h6>Loại Sản Phẩm: <?php echo $row["type_pro"] ?></h6>
                            <h6>Hãng: <?php echo $row["manufacturer_pro"] ?></h6>
                            <h6>Giá bán: <span style="color: green;"><?php echo number_format($row["price_pro"], 0, ',', '.')?></span>Đồng</h6>
                            <form action="/PHP_BanKinh/Module/hidden_screen/quanlygiohang/xulyThemVaoGioHang.php" method="post">
                                <input type="hidden" name ="user_id" value ="<?php echo $user_id ?>"/>
                                <input type="hidden" name ="id_product" value ="<?php echo $id_pro ?>"/>
                                <input type="hidden" name ="quantity" value ="1"/>
                                <button  class="btn btn-primary" id="addPro">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>
        <?php
        }
        echo '</div>';
    } else {
        echo '<h3 align="center" style="font-size: large; font-weight: bold, 200; color: red;">Không có sản phẩm để hiển thị!</h3>';
    }

    // Hiển thị link phân trang
    echo '<div class="row">';
        echo '<nav aria-label="Page navigation example">';
            echo "<ul class='pagination justify-content-center'>";
                // nút trang trước
                $previousPage = $current_page - 1;
                echo '<li class = "page-item '.($current_page == 1 ? "disabled": ""). '">';
                echo '<a class = "page-link" href="?page='.$previousPage.'" tabindex="-1">Trang trước</a>';
                echo '</li>';
                // các nút số trang
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item '.($current_page == $i ? "active": ""). '">';
                    echo '<a class="page-link" href="?page='.$i.'">'.$i.'</a>';
                    echo '</li>';
                }
                // nút trang tiếp theo
                $nextPage = $current_page + 1;
                echo '<li class = "page-item '.($current_page == $totalPages ? "disabled": ""). '">';
                echo '<a class = "page-link" href="?page='.$nextPage.'">Trang tiếp</a>';
                echo '</li>';
            echo "</ul>";
        echo '</nav>';
    echo '</div>';
    // Đóng kết nối
    $conn->close();         
?>