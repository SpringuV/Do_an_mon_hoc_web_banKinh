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
            <title>Chi Tiết Sản Phẩm</title>
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
                // xu ly truy vấn sản phẩm
                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                $user_id = $_SESSION['user_id'];
                $id_product = $_GET['id_pro'];
                $sql_query = "SELECT * FROM product WHERE idproduct= '$id_product'";
                $kqQuery = mysqli_query($conn, $sql_query);
                if($kqQuery->num_rows>0){
                    $data = $kqQuery->fetch_assoc();
                    // xu lý đường dẫn ảnh
                    $image_path = $data['image_pro'];
                    $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                    $image_pro = trim($relative_path);
                } else {
                    echo "Lỗi, Không tìm được sản phẩm";
                }
            ?>
            <div class="style_container">
                <div class="row" style="margin-top: 7%;">
                    <div class="col-lg-6">
                        <h3>Chi tiết sản phẩm</h3>
                        <img src="<?php echo $image_pro ?>" style="width: 100%;" alt="Ảnh sản phẩm">
                    </div>
                    <div class="col-lg-6">
                        <h2><?php echo $data['name_pro'] ?></h2>
                        <p style="margin-left: 8%; margin-top: 5px;"><b>Sản phẩm dành cho:</b> <?php echo $data['sex_pro']; ?></p>
                        <p style="margin-left: 8%;"><b>Thương hiệu:</b> <?php echo $data['manufacturer_pro']; ?></p>
                        <p style="margin-left: 8%;"><b>Giá bán:</b> <span style="color: blue; font-weight: bold;"><?php echo number_format($data['price_pro'],0, ',','.');?> </span>Đồng</p>
                        <form action="/PHP_BanKinh/Module/hidden_screen/quanlygiohang/xulyThemVaoGioHang.php" method="post" >
                            <input type="hidden" name ="user_id" value ="<?php echo $user_id ?>"/>
                            <input type="hidden" name ="id_product" value ="<?php echo $data['idproduct'] ?>"/>
                            <p style="margin-left: 8%;">Mua sản phẩm với số lượng: <input placeholder="Nhập số lượng" name="quantity" value="1" min="1" type="number"/></p>
                            <button style="width: 45%; margin-top: 5%;" id="submit">Thêm sản phẩm vào giỏ hàng</button>
                        </form>
                        <p style="margin-left: 8%;"><b>Mô tả:</b> <?php echo $data['decription_pro'] ?></p>
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