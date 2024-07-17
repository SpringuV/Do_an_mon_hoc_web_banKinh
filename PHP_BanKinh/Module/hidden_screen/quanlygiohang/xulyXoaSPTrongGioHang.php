<?php
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    if(isset($_GET['id_pro']) && isset($_GET['id_user'])){
        $id_pro = $_GET['id_pro'];
        $id_user = $_GET['id_user'];

        $sql_delete = "DELETE FROM cart WHERE cart_pro_id = '$id_pro' AND cart_user_id ='$id_user'";
        //Thực hiện truy vấn
        if(mysqli_query($conn, $sql_delete)){
            $message="Đã xóa sản phẩm có Mã sản phẩm là: " .$id_pro;
            header("Location: /PHP_BanKinh/Module/Pages/gioHang/gioHang.php?message=".urldecode($message));
            exit();
        }else{
            $message= "Xóa sản phẩm không thành công, lỗi khi cập nhật sản phẩm!!!";
            echo "Lỗi khi xóa sản phẩm: " . mysqli_error($conn);
            header("Location: /PHP_BanKinh/Module/Pages/gioHang/gioHang.php?message=".urldecode($message));
            exit();
        }
        mysqli_close($conn);
    }
?>