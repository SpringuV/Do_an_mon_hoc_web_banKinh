<?php
  session_start();
?>
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
            <title>Đăng Nhập</title>
        </head>
        <body>
          <div class="container">
          <main class=" form-signin w-50 m-auto">
            <form class="text-center" method="post" action="/PHP_BanKinh/Module/hidden_screen/quanlytaikhoan/xuly_login.php">
              <img class="mb-2 mt-5" src="/PHP_BanKinh/images/logo/logo.png"
                height="60">
              <h1 class="h3 mb-2 fw-normal">GLASS LUXURY</h1>
              <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }
              ?>
              <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="username"
                  placeholder="Nhập tên đăng nhập" name="username" required> <label
                  for="username">Tên đăng nhập</label>
              </div>
              
              <div class="form-floating mt-2 mb-2">
                <input type="password" class="form-control" id="password"
                  placeholder="Nhập mật khẩu" name="password" required> <label
                  for="password">Mật khẩu</label>
              </div>
              <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Đăng nhập</button>
               <p>Bạn chưa có tài khoản? Hãy đăng kí <?php echo'<a href="/PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/register.php">tại đây</a>';?></p>
              
              <p class="mt-3 mb-2 text-body-secondary">&copy; 2017–2024</p>
            </form>
          </main>
        </div>
    </body>
    </html>