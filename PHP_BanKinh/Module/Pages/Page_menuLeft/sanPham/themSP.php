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
            <title>Thêm sản phẩm</title>
        </head>
        <body>
            <!-- start header -->
            <?php
                session_start();
                // Hiển thị thông tin người dùng đã đăng nhập
                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/header.php');
            ?>
            <!-- end header -->
            <div class="style_container mt-3">
                <div class="row">
                    <div class="col-lg-2">
                        <?php 
                            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/Pages/menuLeft.php');
                        ?>
                    </div>
                    <div class="col-lg-10 mr-3 ml-3">
                        <form class="form" method="post" action="/PHP_BanKinh/Module/hidden_screen/quanlysanpham/xulyThem.php" enctype="multipart/form-data">
                            <h3 align="center   ">Thêm sản phẩm bán hàng</h3>
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
                            <div class="mb-2">
                                <label for="name_product" class="form-label">Tên sản phẩm:<span
                                    class="red">*</span>
                                </label> <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" minlength="25" name="name_product" maxlength="50" oninput="validateInput()" id="idName" required>
                                <small align="center" id="errorMessage" class="form-text error-message">Vui lòng nhập 25 - 50 kí tự!!</small>
                            </div>
                            <div class="mb-2">
                                <label for="sex_product" class="form-label">Sản phẩm dành cho: <span
                                    class="red">*</span></label> 
                                    <select id="sex_pro" name="sex_product">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Cả hai">Cả hai</option>
                                    </select>
                            </div>
                            <div class="mb-2">
                                <label for="type_product" class="form-label">Loại sản phẩm: <span
                                    class="red">*</span></label> 
                                    <select id="type_pro" name="type_product">
                                        <option value="Kính">Kính</option>
                                        <option value="Đồng hồ">Đồng hồ</option>
                                        <option value="Mũ">Mũ</option>
                                        <option value="Túi sách">Túi sách</option>
                                    </select>
                            </div>
                            <div class="mb-2">
                                <label for="manufacturer_product" class="form-label">Hãng sản xuất: <span
                                    class="red">*</span></label> 
                                    <select id="manufacturer_pro" name="manufacturer_product">
                                        <option value="Gucci">Gucci</option>
                                        <option value="Montblanc">Montblanc</option>
                                        <option value="Licions">Licions</option>
                                        <option value="Cartier">Cartier</option>
                                        <option value="Oakley">Oakley</option>
                                        <option value="Chopard">Chopard</option>
                                        <option value="Burberry">Burberry</option>
                                    </select>
                            </div>
                            <div class="mb-2">
                                <label for="price_product" class="form-label">Giá bán sản phẩm: <span
                                    class="red">*</span></label> 
                                <input type="number" name="price_product" id ="price_pro" placeholder="Nhập giá bán" step="1000"/>
                            </div>
                            <div class="mb-2">
                                <label for="quantity_product" class="form-label">Số lượng sản phẩm: <span
                                    class="red">*</span></label> 
                                <input type="number" name="quantity_product" id ="quantity_pro" placeholder="Nhập số lượng" step="1"/>
                            </div>
                            <div class="mb-2">
                                <label for="image_product" class="form-label">Hình ảnh: <span
                                    class="red">*</span></label> 
                                <input type="file" name="image_product" id="image_product_new" required/>
                                <img id="preview" src="#">
                            </div>
                            <div class="mb-2">
                                <label for="decription_product" class="form-label">Mô tả sản phẩm<span
                                    class="red">*</span></label> 
                                    <textarea  class="form-control" placeholder="Nhập mô tả sản phẩm" name="decription_product"
                                    id="decription_pro" required></textarea>
                            </div>
                            <div style="display: flex;">
                                <button type="submit" id="submit" class="btn btn-primary form-control">Thêm mới</button>
                                <a style="text-decoration: none;" id="submit" class="btn btn-primary form-control" href="/PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/danhSachSP.php">Danh sách sản phẩm</a>
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
    