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
            <script type ="text/javascript" src="/PHP_BanKinh/javaScript/jquery.js"></script>
            <script type ="text/javascript" src="/PHP_BanKinh/javaScript/ckeditor.js"></script>
           <link href="/PHP_BanKinh/CSS/style.css"  rel="stylesheet">
            <title>Tìm Kiếm</title>
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
            <div class="style_container" style="margin-top: 6%;">
                <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <!-- start menu left -->
                        <?php
                            // hiển thị menu left
                            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/menuLeft.php');
                        ?>
                        <!-- end menu left -->
                    </div>
                    <!-- slider and product -->
                    <div class="col-lg-10">
                        <!-- product -->
                        <div class="row">
                        <?php
                        // lấy id người dùng
                            if(isset($_SESSION['user_id'])){
                                $user_id = $_SESSION['user_id'];
                            } else{
                                $user_id = "none";
                            }
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
        <script>
            function validateForm() {
                var searchQuery = document.getElementById("search_query").value;
                var errorSpan = document.getElementById("search_eror");

                if (searchQuery.trim() == "") {
                    errorSpan.textContent = "Vui lòng nhập từ khóa tìm kiếm.";
                    return false; // Ngăn form submit nếu có lỗi
                } else {
                    errorSpan.textContent = "";
                    return true; // Cho phép form submit nếu hợp lệ
                }
            }
        </script>
    </html>