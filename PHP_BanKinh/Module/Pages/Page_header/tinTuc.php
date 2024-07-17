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
            <title>Tin tức</title>
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
                $sql_article = "SELECT * FROM article";
                $kqQuery = mysqli_query($conn, $sql_article);
            ?>
            <div class="style_container">
                <div class="row" style="margin-top: 7%;">
                    <?php 
                        if($kqQuery ->num_rows >0){
                            while($row = $kqQuery->fetch_assoc()){ 
                                $id_article = $row['article_id'];
                                $image_path = $row['article_image'];
                                $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                                ?>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <a name="detail" href="/PHP_BanKinh/Module/Pages/Page_header/tinTucDetail.php?id=<?php echo $id_article?>"><img class="card-img-top custom-img-size" src="<?php echo trim($relative_path) ?>" ></a>
                                        <div class="card-body">
                                            <h5 for="detail" id="bottom" class="card-title" style="text-align: center;"><?php echo $row["article_title"] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }
                    ?>
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