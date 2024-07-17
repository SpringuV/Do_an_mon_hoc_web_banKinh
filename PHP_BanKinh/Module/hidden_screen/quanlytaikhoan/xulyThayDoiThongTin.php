<?php
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    // Kiểm tra nếu tệp được tải lên mà không có lỗi
    if ( isset($_FILES['user_image']) && $_FILES['user_image']['error'] === UPLOAD_ERR_OK) {
        $user_id = $_POST['id_user'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $user_sex =$_POST['user_sex'];
        $phone = $_POST['phone'];
        // xử lý tệp ảnh
        $user_image = $_FILES['user_image'];
        $imageName = basename($user_image['name']);
        $imagePath =  $_SERVER['DOCUMENT_ROOT'] ."/PHP_BanKinh/images/avatar/".$imageName;

        // Di chuyển tệp từ thư mục tạm thời đến đích
        if (move_uploaded_file($user_image['tmp_name'], $imagePath)) {
            $sql = "UPDATE users SET user_address='$address', user_email='$email', user_phone='$phone', user_image = '$imagePath', user_sex = '$user_sex' WHERE ma_user = '$user_id'";
        } else {
            echo "Lỗi khi di chuyển tệp ảnh.";
        }
    } else {
        // Không có tệp ảnh mới, chỉ cập nhật thông tin người dùng
        $user_id = $_POST['id_user'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $user_sex =$_POST['user_sex'];
        $phone = $_POST['phone'];
        $sql = "UPDATE users SET user_address='$address', user_email='$email', user_phone='$phone',user_sex = '$user_sex' WHERE ma_user = '$user_id'";
    }
    //Thực hiện truy vấn
    if(mysqli_query($conn, $sql)){
        $message="Cập nhật thông tin thành công";
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/taiKhoan/doiThongTin.php?message=".urldecode($message) . "&user_id=". urlencode($user_id));
        exit();
    }else{
        $message= "Không thành công, lỗi khi cập nhật thông tin !!!";
        header("Location: /PHP_BanKinh/Module/hidden_screen/quanlytaikhoan/doiThongTin.php?message=".urldecode($message));
        exit();
    }
    mysqli_close($conn);
?>