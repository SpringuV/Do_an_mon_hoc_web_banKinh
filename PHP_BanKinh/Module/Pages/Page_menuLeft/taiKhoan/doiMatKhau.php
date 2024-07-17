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
            <title>Đổi mật khẩu</title>
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
                        <form id="changePassWord" class="form" method="post" action="/PHP_BanKinh/Module/hidden_screen/quanlytaikhoan/xulyDoiMatKhau.php" enctype="multipart/form-data">
                            <h3 align="center">Đổi mật khẩu người dùng</h3>
                            <?php 
                                include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                            ?>
                            <div id="hide">
                                <?php
                                    if  (isset($_GET['message'])){
                                        echo '<p align="center"
                                                    style="color: green; 
                                                    font-family: Arial, Helvetica, sans-serif;
                                                    font-style: italic;
                                                    font-weight: bold;">' . htmlspecialchars($_GET['message']) . '</p>';
                                    }
                                    if(isset($_GET['user_id'])){
                                        $id = $_GET['user_id'];
                                    }
                                ?>
                               
                            </div>
                            <div>
                                <label for="id_user" class="form-label">Mã người dùng:<span
                                    style="color: blue; margin-left: 20px; font-weight: bold; font-style: italic;" > <?php  echo htmlspecialchars($id); ?></span></label>
                                    <input type="hidden" id="id_user" name="id_user" value="<?php echo htmlspecialchars($id); ?>">
                            </div>
                            <div class="mb-2">
                                <label for="old_pass" class="form-label">Mật khẩu cũ:<span
                                    class="red">*</span>
                                </label> <input placeholder="Nhập mật khẩu cũ" type="password" class="form-control" name="old_pass" id="old_pass" required>
                            </div>
                            <div class="mb-2">
                                <label for="new_pass_1" class="form-label">Mật khẩu mới:<span
                                    class="red">*</span>
                                </label> <input placeholder="Nhập mật khẩu mới" type="password" class="form-control" name="new_pass_1" id="new_pass_1" required>
                            </div>
                            <div class="mb-2">
                                <label for="new_pass_2" class="form-label">Nhập lại mật khẩu mới:<span
                                    class="red">*</span>
                                </label> <input placeholder="Nhập lại mật khẩu mới" type="password" class="form-control" name="new_pass_2" id="new_pass_2" required>
                                
                            </div>
                            <p align="center" style="color: red; font-family: Arial, Helvetica, sans-serif; font-style: italic; font-weight: bold;" id="errorMessage_pass"></p>
                            <!-- flex sắp xếp các phần tử con bên trong theo một cách linh hoạt, các phần tử con của nó (các mục flex) sẽ được sắp xếp theo dòng hoặc cột dựa trên các thuộc tính khác của Flexbox -->
                            <div style="display: flex;">
                                <button type="submit" id="submit" class="btn btn-primary form-control">Thay đổi</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <script>
         document.getElementById('changePassWord').addEventListener('submit', function(event) {
            // Lấy giá trị của hai trường mật khẩu
            var pass1 = document.getElementById('new_pass_1').value;
            var pass2 = document.getElementById('new_pass_2').value;

            // So sánh hai mật khẩu
            if (pass1 !== pass2) {
                // Nếu không khớp, hiển thị thông báo lỗi và ngăn form gửi đi
                event.preventDefault();
                document.getElementById('errorMessage_pass').textContent = 'Mật khẩu nhập lại không khớp. Vui lòng thử lại.';
            } else {
                // Nếu khớp, cho phép form gửi đi và không làm gì thêm
                document.getElementById('errorMessage_pass').textContent = '';
            }
        });

        // Thực hiện sau khi trang được tải xong
        window.onload = function() {
            setTimeout(function() {
                // Ẩn thông báo bằng cách thêm lớp 'hidden'
                document.getElementById('hide').classList.add('hidden');
            }, 3000);
        };
    </script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/jquery.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/function.js"></script>
    <script type ="text/javascript" src="/PHP_BanKinh/javaScript/ckeditor.js"></script>