<?php
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    // Kiểm tra nếu tệp được tải lên mà không có lỗi
    if ( isset($_FILES['image_product_new']) && $_FILES['image_product_new']['error'] === UPLOAD_ERR_OK) {
        $article_id = $_POST['article_id'];
        $nameBaiViet = $_POST['nameBaiViet'];
        $content_article = $_POST['content_article'];
        // xử lý tệp ảnh
        $image_article = $_FILES['image_article'];
        $imageName = basename($image_article['name']);
        $imagePath = $_SERVER['DOCUMENT_ROOT'] ."/PHP_BanKinh/images/article/".$imageName;

        // Di chuyển tệp từ thư mục tạm thời đến đích
        if (move_uploaded_file($image_article['tmp_name'], $imagePath)) {
            $sql = "UPDATE article SET article_title='$nameBaiViet', article_image = '$imagePath', article_content = '$content_article' WHERE article_id = '$article_id'";
        } else {
            echo "Lỗi khi di chuyển tệp ảnh.";
        }
    } else {
        // Không có tệp ảnh mới, chỉ cập nhật thông tin bài viết
        $article_id = $_POST['article_id'];
        $nameBaiViet = $_POST['nameBaiViet'];
        $content_article = $_POST['content_article'];
        $sql = "UPDATE article SET article_title='$nameBaiViet',  article_content = '$content_article' WHERE article_id = '$article_id'";
    }
    //Thực hiện truy vấn
    if(mysqli_query($conn, $sql)){
        $message="Sửa bài viết thành công";
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/suaBaiViet.php?message=".urldecode($message) . "&id=". urlencode($article_id));
        exit();
    }else{
        $message= "Lỗi khi cập nhật bài viết!!!";
        echo "Lỗi khi cập nhật sản phẩm: " . mysqli_error($conn);
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/suaBaiViet.php?message=".urldecode($message). "&id=". urlencode($article_id));
        exit();
    }
    mysqli_close($conn);
?>