
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
                // connection db
                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                // start phan trang
                    // so san pham co tren moi trang
                    $productPerPage = 9;
                    // xac dinh vị trí trang hiện tại, mặc định là trang 1
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    // tính offset (vị trí bắt đầu của sản phẩm trong câu truy vấn)
                    $offset = ($current_page - 1)*$productPerPage;

                    // câu truy vấn để lấy dữ liệu sản phẩm theo trang
                    $sql = "SELECT * FROM article LIMIT $offset, $productPerPage";
                    $kqQuery = mysqli_query($conn, $sql);
                // end phan trang
            ?>
            <div class="style_container">
                    <table class="table">
                        <thead>
                            <tr align="center">
                            <th scope="col">Mã Bài Viết</th>
                            <th scope="col">Tên Bài Viết</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <!-- kiem tra va hien thi du lieu -->
                        <tbody>
                            <?php
                                if($kqQuery->num_rows > 0){
                                    while($row = $kqQuery->fetch_assoc()){
                                        echo "<tr>";
                                        echo    '<td align="center">'.$row["article_id"].'</td>';
                                        echo    '<td align="center">'.$row["article_title"]."</td>";
                                        // Chuyển đổi đường dẫn tệp hệ thống thành URL tương đối
                                        $image_path = $row['article_image'];
                                        $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                                        echo    '<td align="center"><img src="'.trim($relative_path).'" alt="Image" style="width: 200px; height: auto;"></td>';
                                        echo    "<td align='center'><a class='btn btn-warning' style='margin-bottom: 5px' href='/PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/suaBaiViet.php?id={$row["article_id"]}'>Sửa</a>
                                                                    <a class='btn btn-danger'style='margin-bottom: 5px' href='/PHP_BanKinh/Module/hidden_screen/quanlybaiviet/xoaBaiViet.php?id={$row["article_id"]}'>Xóa</a>
                                                </td>";
                                        echo "</tr>";
                                        
                                    }
                                } else{
                                    echo "<tr><td colspan='9'> Không tìm thấy dữ liệu </td></tr>";
                                }        
                            ?>
                        </tbody>
                    </table>
                    <?php 
                        // tính số trang hiện tại
                        $sqlCount = "SELECT COUNT(*) AS total FROM article";
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
                <div align="center">
                    <a href="themBaiViet.php" type="submit" class="btn btn-primary">Thêm mới bài viết</a>
                </div>
            </div>
        </body>
    </html>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/jquery.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/function.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/ckeditor.js"></script>