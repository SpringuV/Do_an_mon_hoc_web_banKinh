<?php
session_start();
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id_pro = $_POST['id_pro'];
        $id_user = $_POST['id_user'];
        $sql_purchase = "DELETE FROM cart WHERE cart_pro_id = '$id_pro' AND cart_user_id ='$id_user'";
        print_r($sql_purchase);
        //Thực hiện truy vấn
        if(mysqli_query($conn, $sql_purchase)){
            $message="Đặt hàng thành công!";
            header("Location: /PHP_BanKinh/Module/Pages/gioHang/gioHang.php?message=".urldecode($message));
            exit();
        }else{
            $message= "Không đặt được hàng";
            header("Location: /PHP_BanKinh/Module/Pages/gioHang/gioHang.php?message=".urldecode($message));
            exit();
        }
        mysqli_close($conn);
    }
?>