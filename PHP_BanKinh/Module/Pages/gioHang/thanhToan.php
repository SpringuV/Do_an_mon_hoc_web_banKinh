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
            <title>Thanh toán</title>
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
                // lay du lieu tu form
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id_pro = $_POST['id_pro'];
                    $name_pro = $_POST['name_pro'];
                    $price_pro = $_POST['price_pro'];
                    $quantity = $_POST['quantity'];
                    $total = $_POST['total'];
                    $image_pro = $_POST['image_pro'];
                }
            ?>
            <div class="container">
                <div class="row" style="margin-top: 7%;">
                    <div class="col-lg-6">
                        <h4 align="center">Thông tin sản phẩm</h4>
                        <div style="margin-left: 10%;">
                            <p>Tên sản phẩm: <?php echo $name_pro; ?></p>
                            <p>Đơn giá: <?php echo number_format($price_pro, 0, ',', '.') ?> Đồng</p>
                            <img style="width: 400px;" src="<?php echo $image_pro; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php 
                            $id_user = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';
                            $sql_query = "SELECT * FROM users WHERE ma_user = '$id_user'";
                            $kqQuery = mysqli_query($conn, $sql_query);
                            if($kqQuery ->num_rows >0){
                                $data = $kqQuery->fetch_assoc();
                            }
                        ?>
                        <h4 align="center">Thông tin thanh toán</h4>
                        <div style="margin-right: 10%;">
                            <form action="/PHP_BanKinh/Module/hidden_screen/quanlygiohang/xulyThanhToan.php" method="post">
                                <div class="mb-2">
                                    <label for="name_user" class="form-label">Tên người đặt:</label> <input type="text" class="form-control" placeholder="Nhập tên người đặt" name="name_user" id="idName" value="<?php echo $data['user_name'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="address" class="form-label">Địa chỉ giao hàng:</label> 
                                    <input class="form-control" type="text" name="address" id ="address" placeholder="Nhập địa chỉ giao hàng" value="<?php echo $data['user_address']; ?>"/>
                                </div>
                                <div class="mb-2">
                                    <label for="user_email" class="form-label">Email:
                                    </label> <input type="email" class="form-control" placeholder="Nhập email" name="user_email"  id="user_email" value="<?php echo $data['user_email'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="user_phone" class="form-label">Số điện thoại:
                                    </label> <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="user_phone"  id="user_phone" value="<?php echo $data['user_phone'] ?>" required>
                                </div>
                                <input type="hidden" name="id_pro" value="<?php echo $id_pro; ?>"/>
                                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>"/>
                                <p>Mua với số lượng: <?php echo $quantity; ?></p>
                                <p>Tổng giá tiền: <?php echo number_format($total, 0, ',', '.') ?> Đồng</p>
                                <div align="center">
                                    <button style="width: 100px;" class="btn btn-primary">Đặt hàng</button>
                                </div>
                            </form>
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