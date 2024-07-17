<?php
    session_start();
    $username = $_POST['username'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $role = 'user';
    if($pass1 == $pass2){
        // create connect to database
        // $conn= mysqli_con($servername, $db_username, $db_password, $dbname);
        $conn=mysqli_connect("localhost","root","1Lyasttkq.");
                
        // kiểm tra kết nối
        if($conn->connect_error){
            die("Kết nối thất bại: " .$conn->connect_error);
        } else{
            //Chọn CSDL để làm việc
            mysqli_select_db($conn,"web_73dctt26") or die("Không tìm thấy CSDL");
            // create query
            $sql ="INSERT INTO users VALUES (null,'$username','$pass1', null, null, null, null, null)";
            $kqInsert=mysqli_query($conn,$sql);
            print_r($kqInsert);

            //query user_id để setup role
            $sql_query_role = "SELECT ma_user FROM users WHERE user_name = '$username' AND user_pass='$pass1'";
            $kqQuery = mysqli_query($conn, $sql_query_role);
            if($kqQuery->num_rows >0){
                if($row = $kqQuery->fetch_assoc()){
                    // insert quyền người dùng vào bảng roles
                    $user_role = $role;
                    $user_id = $row['ma_user'];
                    // tạo câu lệnh insert
                    $sql_insert_role ="INSERT INTO roles VALUES (null, '$user_id', '$user_role')";
                    mysqli_query($conn, $sql_insert_role);
                }
            }
            $_SESSION['error']= "Bạn đã đăng kí tài khoản thành công!";
            header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/register.php");
        }
    } else{
        $_SESSION['error'] = "Mật khẩu không khớp, vui lòng nhập lại";
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/register.php");
        exit();
    }
    mysqli_close($conn);
?>