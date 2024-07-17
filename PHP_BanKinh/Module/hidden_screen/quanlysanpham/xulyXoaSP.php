<?php
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    //sql xoa sp
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM product WHERE idproduct='$id'";
        //Thực hiện truy vấn
        if(mysqli_query($conn, $sql)){
            $message="Đã xóa thành công sản phẩm có Mã sản phẩm là: " .$id;
            header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/danhSachSP.php?message=".urldecode($message));
            exit();
        } else{
            $message= "Xóa sản phẩm không thành công, lỗi khi cập nhật sản phẩm!!!";
            header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/suaSP.php?message=".urldecode($message));
            exit();
        }
        mysqli_close($conn);
    }
?>