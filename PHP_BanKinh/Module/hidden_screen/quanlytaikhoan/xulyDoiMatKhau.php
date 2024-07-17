<?php
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    $user_id = isset($_POST['id_user']) ?$_POST['id_user']:''; 
    $old_pass = isset($_POST['old_pass']) ?$_POST['old_pass']:''; 
    $new_pass_1 = isset($_POST['new_pass_1']) ?$_POST['new_pass_1']:''; 
    $new_pass_2 = isset($_POST['new_pass_2']) ?$_POST['new_pass_2']:''; 

    // check old_passs
    $sql = "SELECT user_pass FROM users WHERE ma_user = '$user_id'";
    $kqQuery = mysqli_query($conn, $sql);
    if($kqQuery->num_rows > 0){
        if($row = $kqQuery->fetch_assoc()){
            $pass_db = $row['user_pass'] ? $row['user_pass']:'';
            if($old_pass == $pass_db){
                // thuc hien truy van doi mat khau
                $sql_doiMK = "UPDATE users SET user_pass ='$new_pass_1' WHERE ma_user = '$user_id'";
            } else {
                $message= "Không thành công, Vui lòng nhập đúng mật khẩu cũ!!!";
                header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/doiMatKhau.php?message=".urldecode($message) ."&user_id=". urlencode($user_id));
                exit();
            }
        }
    }else{
        $message= "Không thành công, không tìm thấy id người dùng !!!";
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/doiMatKhau.php?message=".urldecode($message) ."&user_id=". urlencode($user_id));
        exit();
    }
    
    //Thực hiện truy vấn
    if(mysqli_query($conn, $sql_doiMK)){
        $message="Đổi mật khẩu thành công";
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/doiMatKhau.php?message=".urldecode($message) ."&user_id=". urlencode($user_id));
        exit();
    }else{
        $message= "Không thành công, lỗi khi đổi mật khẩu !!!";
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/doiMatKhau.php?message=".urldecode($message) ."&user_id=". urlencode($user_id));
        exit();
    }
    mysqli_close($conn);
?>