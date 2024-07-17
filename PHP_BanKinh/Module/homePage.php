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
            <title>Trang chủ</title>
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
            <!-- Kiểm tra quyền của người dùng -->
            <?php
                // lấy id người dùng
                if(isset($_SESSION['user_id'])){
                    $user_id = $_SESSION['user_id'];
                    // connect db
                    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                    $sql_query_role = "SELECT * FROM roles WHERE role_user_id = '$user_id'";
                    $kqQuery = mysqli_query($conn, $sql_query_role);
                    if($kqQuery -> num_rows >0){
                        $data = $kqQuery->fetch_assoc();
                        //tạo session với role của người dùng
                        $_SESSION['role_user'] = $data['role_name'];
                    }
                    mysqli_close($conn);
                } else{
                    $user_id = '';
                    unset($_SESSION['role_user']);
                }
            ?>
            <!-- start content -->
            <div class="style_container">
                <div class="row justify-content-center" style="margin-top: 8%;">
                    <div class="col-lg-2 ">
                        <!-- start menu left -->
                        <?php
                            // hiển thị menu left
                            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/menuLeft.php');
                        ?>
                        <!-- end menu left  -->
                    </div>
                    <!-- slider and product -->
                    <div class="col-lg-10">
                    <div>
                        <!-- start slider -->
                        <div class="row">
                            <?php
                                // hiển thị menu left
                                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/slide.php');
                            ?>
                        </div>
                        <!-- end slider -->
                    </div>
                        <!-- start product -->
                        <div>
                        <?php
                            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/display_product.php');        
                        ?>
                        </div>
                        <!-- end product -->
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