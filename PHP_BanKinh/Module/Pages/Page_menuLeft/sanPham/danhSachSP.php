
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
                crossorigin="anonymous"></script>
            <link href="/PHP_BanKinh/CSS/style.css"  rel="stylesheet">
            <title>Danh sách sản phẩm</title>
        </head>
        <body>
            <!-- start header -->
            <?php
                session_start();
                // Hiển thị thông tin người dùng đã đăng nhập
                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/header.php');
            ?>
            <!-- end header -->
            <?php
                // connect db
                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                // start phan trang
                    // so san pham co tren moi trang
                    $productPerPage = 5;
                    // xac dinh vị trí trang hiện tại, mặc định là trang 1
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    // tính offset (vị trí bắt đầu của sản phẩm trong câu truy vấn)
                    $offset = ($current_page - 1)*$productPerPage;

                    // câu truy vấn để lấy dữ liệu sản phẩm theo trang
                    $sql = "SELECT * FROM product LIMIT $offset, $productPerPage";
                    $kqQuery = mysqli_query($conn, $sql);
                // end phan trang
            ?>
            
            <div class="style_container">
                <div>
                    <?php
                        if  (isset($_GET['message'])){
                            echo '<p onclick="toggleContent()" id="text" align="center" 
                                        style="color: Green; 
                                        font-family: Arial, Helvetica, sans-serif;
                                        font-style: italic;
                                        font-weight: bold;">' . htmlspecialchars($_GET['message']) . '</p>';
                        }
                    ?>
                </div>
                <form name="frm_themhang" method="post" action="/PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/suaSP.php" enctype="multipart/form-data">
                    <table class="table">
                        <thead>
                            <tr align="center">
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Loại sản phẩm</th>
                            <th scope="col">Hãng</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <!-- kiem tra va hien thi du lieu -->
                        <tbody>
                            <?php
                                if($kqQuery->num_rows > 0){
                                    while($row = $kqQuery->fetch_assoc()){
                                        echo "<tr align='center'>";
                                        echo    '<td>'.$row["idproduct"].'</td>';
                                        echo    '<td>'.$row["name_pro"]."</td>";
                                        echo    '<td>'.$row["sex_pro"]."</td>";
                                        echo    '<td>'.$row["type_pro"]."</td>";
                                        echo    '<td>'.$row["manufacturer_pro"]."</td>";
                                        echo    '<td>'.$row["price_pro"].'</td>';
                                        // Chuyển đổi đường dẫn tệp hệ thống thành URL tương đối
                                        $image_path = $row['image_pro'];
                                        $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                                        echo    '<td><img src="'.trim($relative_path).'" alt="Image" style="width: auto;object-fit: cover; height: 150px; "></td>';
                                        echo    '<td>'.$row["quantity_pro"]."</td>";
                                        echo    '<td style="width: 35%;" class ="product-decription">'.$row["decription_pro"]."</td>";
                                        echo    "<td align='center'><a class='btn btn-warning' style='margin-bottom: 5px' href='suaSP.php?id={$row["idproduct"]}'>Sửa</a>
                                                                    <a class='btn btn-danger'style='margin-bottom: 5px' href='/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyXoaSP.php?id={$row["idproduct"]}'>Xóa</a>
                                                </td>";
                                        echo "</tr>";
                                    }
                                } else{
                                    echo "<tr align='center'><td colspan='9'> Không tìm thấy dữ liệu </td></tr>";
                                }  
                            ?>
                        </tbody>
                    </table>
                    <?php 
                        // tính số trang hiện tại
                        $sqlCount = "SELECT COUNT(*) AS total FROM product";
                        $resultCount = $conn->query($sqlCount);
                        $rowCount = $resultCount->fetch_assoc();
                        $totalProducts = $rowCount['total'];
                        $totalPages = ceil($totalProducts/$productPerPage);
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
                </form>
                <div align="center">
                    <a href="themSP.php" type="submit" class="btn btn-primary">Thêm mới sản phẩm</a>
                </div>
            </div>
        </body>
    </html>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/jquery.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/function.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/ckeditor.js"></script>