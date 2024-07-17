<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    // lấy thông tin từ form
    if($user_id == "none"){
        $message = "Bạn cần phải đăng nhập";
        header("Location: /PHP_BanKinh/Module/homePage.php?message=".urldecode($message)."");
        exit();
    } else {
        // lấy value từ form
        $productCode = $_POST['id_product'];
        $quantity = $_POST['quantity'];
        // query người dùng đã chọn sản phẩm
        $sql_select ="SELECT cart_pro_id, cart_user_id FROM cart WHERE cart_pro_id ='$productCode' AND cart_user_id ='$user_id'";
        // nếu người dùng đã thêm sản phẩm vào giỏ hàng, chỉ cập nhật số lượng
        if(mysqli_query($conn, $sql_select)-> num_rows > 0){
            // query số lượng
            $sql_soLuong = "SELECT cart_quantity FROM cart WHERE cart_pro_id ='$productCode'";
            $kq_quantity = mysqli_query($conn,$sql_soLuong);
            if($kq_quantity ->num_rows >0){
                $row_quantity = $kq_quantity->fetch_assoc();
                $total_quantity = $row_quantity['cart_quantity'];
            }
            // cập nhật lại số lượng
            $quantity += $total_quantity;
            $sql_add_cart = "UPDATE cart SET cart_quantity ='$quantity' WHERE cart_user_id ='$user_id' AND cart_pro_id ='$productCode'";
        } else { // chưa thêm sản phẩm vào giỏ hàng, add thông tin
            $sql_add_cart = "INSERT INTO cart VALUE(null, '$productCode', '$user_id', '$quantity')";
        }
        if(mysqli_query($conn, $sql_add_cart)){
            $message = "Đã thêm sản phẩm vào giỏ hàng!";
        } else {
            $message = "Lỗi khi thêm sản phẩm vào giỏ hàng";
        }
    }
}
    header("Location: /PHP_BanKinh/Module/homePage.php?message=".urldecode($message)."");
    exit();
    mysqli_close($conn);
?>
