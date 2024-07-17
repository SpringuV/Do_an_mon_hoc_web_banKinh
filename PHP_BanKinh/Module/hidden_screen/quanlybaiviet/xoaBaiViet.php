<?php
    // connection db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
    //sql xoa sp
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM article WHERE article_id='$id'";
        //Thực hiện truy vấn
        if(mysqli_query($conn, $sql)){
            $message="Đã xóa thành công bài viết có Mã bài viết là: " .$id;
            header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/danhSachBaiViet.php?message=".urldecode($message));
            exit();
        }else{
            $message= "Xóa sản phẩm không thành công, lỗi khi cập nhật sản phẩm!!!";
            echo "Lỗi khi cập nhật sản phẩm: " . mysqli_error($conn);
            header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/danhSachBaiViet.php?message=".urldecode($message));
            exit();
        }
        mysqli_close($conn);
    }
    
?>