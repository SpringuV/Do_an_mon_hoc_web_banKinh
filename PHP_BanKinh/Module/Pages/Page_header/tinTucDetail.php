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
            <title>Chi Tiết Tin Tức</title>
        </head> 
        <body>
            <!-- start header -->
                <div class="positon_fixed_header">
                    <?php
                        session_start();
                        // Hiển thị thông tin người dùng đã đăng nhập
                        include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/header.php');
                    ?>
                </div>
            <!-- end header -->
            <!-- start content -->
            <?php
                // connect db
                // xu ly hien bai viet
                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                $id_article = isset($_GET['id'])? $_GET['id']:'';
                $sql = "SELECT * FROM article WHERE article_id = '$id_article'";
                $kqQuery = mysqli_query($conn, $sql);
                // if(isset($_SESSION['tinTuc']) && !empty($_SESSION['tinTuc'])){
                //     $article = $_SESSION['tinTuc'];
                // } else {
                //     $article = "Error";
                // }
            ?>
            <div class="style_container">
                <div class="row" style="margin-top: 6%;">
                    <div class="col-lg-9" style="border-right: 1px solid gray;">
                        <?php 
                            if($kqQuery ->num_rows>0){
                                $article = $kqQuery->fetch_assoc();
                                $article_title = $article['article_title'];
                                $article_content = $article['article_content'];
                                // xu ly anh
                                $imagePath = $article['article_image'];
                                $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/', "/PHP_BanKinh/", $imagePath);
                                $article_image = trim($relative_path);
                                ?>
                                <h1><?php echo $article_title ?></h1>
                                <div style="justify-content: center;"><img style="max-width: 90%;" src="<?php echo $article_image ?>"/></div>
                                <div>
                                    <p >
                                        <?php echo $article_content ?>
                                    </p>
                                </div>
                        <?php }
                        ?>
                    </div>
                    
                    <div class="col-lg-3">
                        <h3>Danh Mục Bài Viết</h3>
                        <div class="listBaiViet">
                            <div class="insideList">
                                <a href="/PHP_BanKinh/Module/Pages/Page_header/tinTuc.php" style="text-decoration: none; color: black;">Tin Tức</a><br/>
                            </div>
                            <div class="insideList">
                                <a>Mẹo hay với kính</a><br/>
                            </div>
                            <div class="insideList">
                                <a>Bí quyết chăm sóc mắt</a><br/>
                            </div>
                            <div class="insideList">
                                <a>Tư vấn chọn kính</a><br/>
                            </div>
                            <div class="insideList">
                                <a>Lifestyle</a><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->
            <!-- start footer -->
                <?php
                    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/footer.php');
                ?>
            <!-- end footer -->
        </body>
        <script type ="text/javascript" src="/PHP_BanKinh/javaScript/jquery.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/function.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/ckeditor.js"></script>
    </html>