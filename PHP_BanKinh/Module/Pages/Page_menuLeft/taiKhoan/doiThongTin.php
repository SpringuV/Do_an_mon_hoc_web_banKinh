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
            <title>Thay đổi thông tin</title>
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
            <div class="container mt-3">
                <div class="row justify-content-center" style="margin-top: 7%;">
                    <div class="col-lg-3">
                        <!-- start menu left -->
                        <?php
                            // hiển thị menu left
                            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/menuLeft.php');
                        ?>
                        <!-- end menu left  -->
                    </div>
                    <div class="col-lg-9">
                        <form class="form" method="post" action="/PHP_BanKinh/Module/hidden_screen/quanlytaikhoan/xulyThayDoiThongTin.php" enctype="multipart/form-data">
                            <h3 align="center">Thay đổi thông tin người dùng</h3>
                            <?php 
                                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                            ?>
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

                                    if(isset($_GET['user_id'])){
                                        $id = $_GET['user_id'];
                                        $sql = "SELECT * FROM users WHERE ma_user = '$id'";
                                        $kqQuery = mysqli_query($conn, $sql);
                                    }
                                    if($kqQuery->num_rows > 0){
                                        if($row = $kqQuery->fetch_assoc()){
                                            $id = $row['ma_user'] ? $row['ma_user']:'';
                                            $userAddress = $row['user_address'] ? $row['user_address']:'';
                                            $userEmail = $row['user_email'] ? $row['user_email'] : '';
                                            $userPhone= $row["user_phone"] ? $row["user_phone"]:'';
                                            $userSex = $row['user_sex']? $row['user_sex']:'';
                                            // image
                                            $image_path = $row['user_image'];
                                            $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                                            $userImage = trim($relative_path);
                                            if (isset($_SESSION['error'])) {
                                                echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                                                unset($_SESSION['error']);
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <div>
                                <label for="name_product" class="form-label">Mã người dùng:<span
                                    style="color: blue; margin-left: 20px; font-weight: bold; font-style: italic;" > <?php  echo htmlspecialchars($id); ?></span>
                                    <input type="hidden" id="id_user" name="id_user" value="<?php echo htmlspecialchars($id); ?>">
                                </label>
                            </div>
                            <div class="mb-2">
                                <label for="address" class="form-label">Địa chỉ:<span
                                    class="red">*</span>
                                </label> <input type="text" class="form-control" value="<?php echo htmlspecialchars($userAddress)?>" name="address" id="address" required>
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email:<span
                                    class="red">*</span>
                                </label> <input type="email" class="form-control" value="<?php echo htmlspecialchars($userEmail)?>" name="email" id="email" required>
                            </div>
                            <div class="mb-2">
                                <label for="user_sex" class="form-label">Giới tính:</label> 
                                    <select id="user_sex" name="user_sex">
                                        <option value="Nam" <?php if($userSex == "Nam") echo 'selected'; ?>>Nam</option>
                                        <option value="Nữ" <?php if($userSex == "Nữ") echo 'selected'; ?>>Nữ</option>
                                    </select>
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Số điện thoại:<span
                                    class="red">*</span>
                                </label> <input type="text" class="form-control" value="<?php echo htmlspecialchars($userPhone)?>" name="phone" id="phone" required>
                            </div>
                            <div class="mb-2">
                            <label for="image" class="form-label">Ảnh đại diện:</label> 
                            <input type="file" name="image" id="image_product_new"/>
                            <div align="center">
                                <img id="preview" src="<?php echo htmlspecialchars($userImage); ?>">
                            </div>
                        </div>
                            <!-- flex sắp xếp các phần tử con bên trong theo một cách linh hoạt, các phần tử con của nó (các mục flex) sẽ được sắp xếp theo dòng hoặc cột dựa trên các thuộc tính khác của Flexbox -->
                            <div style="display: flex;">
                                <button type="submit" id="submit" class="btn btn-primary form-control">Thay đổi</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/jquery.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/function.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/ckeditor.js"></script>
    