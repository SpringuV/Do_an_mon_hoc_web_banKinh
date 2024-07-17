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
                <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <link href="/PHP_BanKinh/CSS/style.css"  rel="stylesheet">
            <title>Sửa bài viết</title>
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
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM article WHERE article_id = '$id'";
                    $kqQuery = mysqli_query($conn, $sql);
                }
            ?>
            <div class="style_container mt-3">
                <div class="row">
                    <div class="col-lg-2">
                        <?php 
                            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/menuLeft.php');
                        ?>
                    </div>
                    <div class="col-lg-10 ">
                        <form class="form" method="post" action="/PHP_BanKinh/Module/hidden_screen/quanlybaiviet/xulySuaBaiViet.php" enctype="multipart/form-data">
                            <h3 align="center">Sửa bài viết</h3>
                            <div>
                                <?php
                                    if (isset($_SESSION['error'])) {
                                        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                                        unset($_SESSION['error']);
                                    }
                                    if  (isset($_GET['message'])){
                                        echo '<p align="center" 
                                                    style="color: green; 
                                                    font-family: Arial, Helvetica, sans-serif;
                                                    font-style: italic;
                                                    font-weight: bold;">' . htmlspecialchars($_GET['message']) . '</p>';
                                    }
                                ?>
                            </div>
                            <?php
                                if($kqQuery->num_rows > 0){
                                    if($row = $kqQuery->fetch_assoc()){
                                        $id = $row['article_id'] ? $row['article_id']:'';
                                        $article_title = $row['article_title'] ? $row['article_title']:'';
                                        $article_content= $row["article_content"]? $row["article_content"]:'';
                                        // image
                                        $image_path = $row['article_image'];
                                        $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                                        $article_image = trim($relative_path);
                                        if (isset($_SESSION['error'])) {
                                            echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                                            unset($_SESSION['error']);
                                        }
                                    }
                                }
                            ?>
                            <div>
                                <label for="name_product" class="form-label">Mã bài viết:<span
                                    style="color: blue; margin-left: 20px; font-weight: bold; font-style: italic;" > <?php echo htmlspecialchars($id); ?></span>
                                    <input type="hidden" id="article_id" name="article_id" value="<?php echo htmlspecialchars($id); ?>">
                                </label>
                            </div>
                            <div class="mb-2">
                                <label for="name_product" class="form-label">Tiêu đề bài viết:<span
                                    class="red">*</span>
                                </label> <input type="text" class="form-control" placeholder="Nhập tiêu đề bài viết" minlength="25" name="nameBaiViet" maxlength="200" oninput="validateInputArticle()" id="nameBaiViet" value="<?php echo htmlspecialchars($article_title); ?>" required>
                                <small align="center" id="errorMessage" class="form-text error-message">Vui lòng nhập 25 - 200 kí tự!!</small>
                            </div>
                            <div class="mb-2">
                                <label for="image_article" class="form-label">Hình ảnh: <span
                                    class="red">*</span></label> 
                                <input type="file" name="image_article" id="image_product_new"/>
                                <div align="center">
                                <img id="preview" src="<?php echo htmlspecialchars($article_image); ?>">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="content_article" class="form-label">Nội dung bài viết:<span
                                    class="red">*</span></label> 
                                    <textarea  class="form-control" placeholder="Nhập nội dung bài viết" name="content_article"
                                    id="content_article" required><?php echo htmlspecialchars($article_content); ?></textarea>
                                    <script>
                                        CKEDITOR.replace('content_article');
                                    </script>
                            </div>
                            <div style="display: flex;">
                                <button type="submit" id="submit" class="btn btn-primary form-control">Sửa bài viết</button>
                                <a style="text-decoration: none;" id="submit" class="btn btn-primary form-control" href="/PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/danhSachBaiViet.php">Danh sách Bài Viết</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

    </html>
    <script type ="text/javascript" src="<?php  $_SERVER['DOCUMENT_ROOT']. '/PHP_BanKinh/javaScript/jquery.js'; ?>"></script>
    <script type ="text/javascript" src="<?php  $_SERVER['DOCUMENT_ROOT']. '/PHP_BanKinh/javaScript/function.js'; ?>"></script>
    <script type ="text/javascript" src="<?php  $_SERVER['DOCUMENT_ROOT']. '/PHP_BanKinh/javaScript/ckeditor.js'; ?>"></script>
    