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
            <div class="style_container">
                <div class="row"">
                    <div style="width: 80%; margin: 5% 10% 3% 10%">
                        <p>
                            <div><h2>Chính sách thanh toán</h2></div>
                            <div>
                                Phương thức thanh toán
                                <p>Mắt Việt cung cấp phương thức thanh toán linh hoạt để khách hàng có thể thuận tiện nhất: thanh toán khi nhận hàng (COD / Cash On Delivery), thanh toán bằng thẻ tín dụng, thẻ ghi nợ (Visa/ Mastercard) hoặc thanh toán bằng thẻ ATM nội địa.</p>    
                            </div>
                            <div>Hướng dẫn chi tiết cách thức thanh toán</div>

                            <div>
                                1. Thanh toán khi nhận hàng (COD /Cash On Delivery)
                                <p>Là cách thanh toán dễ dàng nhất, đặc biệt khi quý khách không quen với các hình thức thanh toán trực tuyến.
                                Ngay sau khi nhận được đơn hàng, Mắt Việt sẽ xác nhận với quý khách qua điện thoại, tiến hành thực hiện đơn hàng và giao hàng trong thời gian quy định. Chi phí giao hàng sẽ được thông báo với quý khách trong quá trình đặt hàng. </p>
                            </div>
                            <div>
                                2. Thanh toán bằng thẻ tín dụng / ATM / Thẻ ATM nội địa
                                <p>Mắt Việt liên kết với VNPay để cung cấp giải pháp thanh toán không tiền mặt (cashless) thuận tiện nhất cho quý khách hàng và đảm bảo bảo mật thông tin. Toàn bộ thông tin thanh toán của quý khách phía Mắt Việt sẽ không can thiệp và sẽ xác nhận thanh toán thành công thông qua VNPay. Đơn hàng của quý khách sẽ được nhân viên chăm sóc khách hàng của Mắt Việt gọi điện thoại để xác nhận lại thông tin sau khi Mắt Việt xác nhận thông tin thanh toán thành công từ VNPay.</p>
                            </div>
                            <div>
                                3. Thanh toán chuyển khoản
                                <p>Quý khách hàng có thể thanh toán cho Mắt Việt bằng phương thức chuyển khoản:<br>
                                    Số tài khoản: 19999999999<br>
                                    Ngân hàng: Vietinbank - CN HCM<br>
                                    Tên thụ hưởng: CÔNG TY TNHH GLASS LUXURY GROUP<br>
                                    Ngay sau khi nhận được đơn hàng, Mắt Việt sẽ kiểm tra giao dịch thanh toán. Nếu giao dịch thành công, Mắt Việt sẽ tiến hành thực hiện đơn hàng ngay và giao hàng trong thời gian quy định.
                                </p>
                            </div>
                            <div>
                                4. Thời gian hoàn tiền
                                <p>Mắt Việt Group trân trọng thông báo chính sách hoàn tiền cho khách hàng trong trường hợp phát sinh lỗi giao dịch, máy cà thẻ, quét QR,... <br>
                                Mắt Việt cam kết hoàn tiền lại cho quý khách hàng trong vòng 14 - 30 ngày làm việc kể từ khi nhận được yêu cầu hoàn tiền hợp lệ. Để được hoàn tiền, quý khách vui lòng cung cấp đúng thông tin chuyển khoản:<br>

                                Tên chủ tài khoản: [Tên chủ tài khoản của quý khách].<br>
                                Số tài khoản: [Số tài khoản của quý khách].<br>
                                Ngân hàng: [Tên ngân hàng của quý khách].<br>
                                Chi nhánh: [Chi nhánh của ngân hàng].<br>
                                Xin lưu ý rằng thông tin chuyển khoản cần phải chính xác và không được thay đổi sau khi đã xác nhận thông tin hoàn tiền. Mắt Việt sẽ không chịu trách nhiệm đối với bất kỳ sai sót nào nếu thông tin chuyển khoản được cung cấp không đúng.<br>
                                </p>
                            </div>
                        </p>
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