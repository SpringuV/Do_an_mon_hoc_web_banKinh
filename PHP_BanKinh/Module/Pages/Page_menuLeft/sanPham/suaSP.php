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
            <title>Sửa sản phẩm</title>
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

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM product WHERE idproduct = '$id'";
                    $kqQuery = mysqli_query($conn, $sql);
                }
            ?>
            <div class="style_container mt-3">
                <div class="row">
                    <form class="form" method="post" action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulySuaSP.php" enctype="multipart/form-data">
                        <h3 align="center">Sửa sản phẩm bán hàng</h3>
                        <div>
                            <?php
                            // hien loi neu co
                                if (isset($_SESSION['error'])) {
                                    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                                    unset($_SESSION['error']);
                                }
                                if  (isset($_GET['message'])){
                                    echo '<p align="center" 
                                                style="color: red; 
                                                font-family: Arial, Helvetica, sans-serif;
                                                font-style: italic;
                                                font-weight: bold;">' . htmlspecialchars($_GET['message']) . '</p>';
                                }
                            ?>
                        </div>
                        <div>
                            <?php
                                if($kqQuery->num_rows > 0){
                                    if($row = $kqQuery->fetch_assoc()){
                                        $id = $row['idproduct'] ? $row['idproduct']:'';
                                        $name_pro = $row['name_pro'] ? $row['name_pro']:'';
                                        $sex_pro = $row['sex_pro'] ? $row['sex_pro'] : '';
                                        $type_pro= $row["type_pro"] ? $row["type_pro"]:'';
                                        $manufacturer_pro= $row["manufacturer_pro"]? $row["manufacturer_pro"]:'';
                                        $price_pro = $row['price_pro']? $row['price_pro']:'';
                                        // image
                                        $image_path = $row['image_pro'];
                                        $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                                        $image_pro = trim($relative_path);

                                        $quantity_pro= $row["quantity_pro"]? $row["quantity_pro"]:'';
                                        $decription_pro= $row["decription_pro"] ? $row["decription_pro"]:'';
                                        if (isset($_SESSION['error'])) {
                                            echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                                            unset($_SESSION['error']);
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <div>
                            <label for="name_product" class="form-label">Mã sản phẩm<span
                                style="color: blue; margin-left: 20px; font-weight: bold; font-style: italic;" > <?php echo htmlspecialchars($id); ?></span>
                                <input type="hidden" id="id_product" name="id_product" value="<?php echo htmlspecialchars($id); ?>">
                            </label>
                        </div>
                        <div class="mb-2">
                            <label for="name_product" class="form-label">Tên sản phẩm<span
                                class="red">*</span>
                            </label> <input type="text" class="form-control" value="<?php echo htmlspecialchars($name_pro); ?>" name="name_product"
                                id="name_product" required>
                        </div>
                        <div class="mb-2">
                            <label for="sex_product" class="form-label">Sản phẩm dành cho: <span
                                class="red">*</span></label> 
                                <select id="sex_product" name="sex_product">
                                    <option value="Nam"  <?php if($sex_pro == 'Nam') echo 'selected'; ?> >Nam</option>
                                    <option value="Nữ"  <?php if($sex_pro == 'Nữ') echo 'selected'; ?> >Nữ</option>
                                    <option value="Cả hai"  <?php if($sex_pro == 'Cả hai') echo 'selected'; ?> >Cả hai</option>
                                </select>
                        </div>
                        <div class="mb-2">
                            <label for="type_product" class="form-label">Loại sản phẩm: <span
                                class="red">*</span></label> 
                                <select id="type_product" name="type_product">
                                    <option value="Kính" <?php if($type_pro == 'Kính') echo 'selected'; ?> >Kính</option>
                                    <option value="Đồng hồ" <?php if($type_pro == 'Đồng hồ') echo 'selected'; ?> >Đồng hồ</option>
                                    <option value="Mũ" <?php if($type_pro == 'Mũ') echo 'selected'; ?> >Mũ</option>
                                    <option value="Túi sách" <?php if($type_pro == 'Túi sách') echo 'selected'; ?> >Túi sách</option>
                                </select>
                        </div>
                        <div class="mb-2">
                            <label for="manufacturer_product" class="form-label">Hãng sản xuất: <span
                                class="red">*</span></label> 
                                <select id="manufacturer_product" name="manufacturer_product">
                                    <option value="Gucci" <?php if($manufacturer_pro == 'Gucci') echo 'selected'; ?> >Gucci</option>
                                    <option value="Montblanc" <?php if($manufacturer_pro == 'Montblanc') echo 'selected'; ?> >Montblanc</option>
                                    <option value="Licions" <?php if($manufacturer_pro == 'Licions') echo 'selected'; ?> >Licions</option>
                                    <option value="Cartier" <?php if($manufacturer_pro == 'Cartier') echo 'selected'; ?> >Cartier</option>
                                    <option value="Oakley" <?php if($manufacturer_pro == 'Oakley') echo 'selected'; ?> >Oakley</option>
                                    <option value="Chopard" <?php if($manufacturer_pro == 'Chopard') echo 'selected'; ?> >Chopard</option>
                                    <option value="Burberry" <?php if($manufacturer_pro == 'Burberry') echo 'selected'; ?> >Burberry</option>
                                </select>
                        </div>
                        <div class="mb-2">
                            <label for="price_product" class="form-label">Giá bán sản phẩm: <span
                                class="red">*</span></label> 
                            <input type="number" name="price_product" id ="price_product" value="<?php echo htmlspecialchars($price_pro); ?>" step="1000"/>
                        </div>
                        <div class="mb-2">
                            <label for="quantity_product" class="form-label">Số lượng sản phẩm: <span
                                class="red">*</span></label> 
                            <input type="number" name="quantity_product" id ="quantity_product" value="<?php echo htmlspecialchars($quantity_pro); ?>" step="1"/>
                        </div>
                        <div class="mb-2">
                            <label for="image_product" class="form-label">Hình ảnh: <span
                                class="red">*</span></label> 
                            <input type="file" name="image_product_new" id="image_product_new"/>
                            <div align="center">
                                <img id="preview" src="<?php echo htmlspecialchars($image_pro); ?>">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="decription_product" class="form-label">Mô tả sản phẩm<span
                                class="red">*</span></label> 
                                <textarea  class="form-control" name="decription_product"
                                id="decription_product" required><?php echo htmlspecialchars($decription_pro); ?></textarea>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary form-control">Sửa sản phẩm</button>
                    </form>
                    <form class="form" method="get" action="/PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/danhSachSP.php">
                            <button type="submit" id="submit" class="btn btn-primary form-control">Danh sách sản phẩm</button>
                    </form>
                </div>
            </div>
        </body>

    </html>
    <script type ="text/javascript" src="<?php  $_SERVER['DOCUMENT_ROOT']. '/PHP_BanKinh/javaScript/jquery.js'; ?>"></script>
    <script type ="text/javascript" src="<?php  $_SERVER['DOCUMENT_ROOT']. '/PHP_BanKinh/javaScript/function.js'; ?>"></script>
    <script type ="text/javascript" src="<?php  $_SERVER['DOCUMENT_ROOT']. '/PHP_BanKinh/javaScript/ckeditor.js'; ?>"></script>
    