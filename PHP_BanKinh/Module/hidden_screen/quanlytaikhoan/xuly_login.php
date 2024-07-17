<?php
    session_start();
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    // nhận dữ liệu từ form đăng nhập
    $nameuser = $_POST['username'];
    $pass = $_POST['password'];
    // create query
    $sql ="SELECT * FROM users WHERE user_name ='$nameuser' AND user_pass='$pass'";
    $kqQuery=mysqli_query($conn,$sql);

    if($kqQuery->num_rows > 0){
        if($row = $kqQuery->fetch_assoc()){
            $_SESSION['user'] = $nameuser;
            $_SESSION['user_id'] = $row['ma_user'];
            header('Location: /PHP_BanKinh/Module/homePage.php');
            exit();
        }
    } else{
        // sai mat khau hoac ten dang nhap khong dung
        $_SESSION['error']= "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng nhập lại!";
        header('Location: /PHP_BanKinh/Module/Pages/login.php');
    }
    $conn->close();
?>