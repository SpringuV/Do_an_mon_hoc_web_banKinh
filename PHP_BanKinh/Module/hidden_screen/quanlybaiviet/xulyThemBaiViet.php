<!-- Thêm sản phẩm -->

<?php
    session_start();
    // connection db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    // Kiểm tra nếu tệp được tải lên mà không có lỗi
    if ($_FILES['image_article']['error'] === UPLOAD_ERR_OK) {
        $title_baiViet = $_POST["nameBaiViet"];
        $content = mysqli_real_escape_string($conn, $_POST['content_article']);
        // xử lý tệp ảnh
        $image_article = $_FILES["image_article"];
        $imageName = basename($image_article['name']);
        $imagePath = $_SERVER['DOCUMENT_ROOT'] ."/PHP_BanKinh/images/article/".$imageName;
        
        // Di chuyển tệp từ thư mục tạm thời đến đích
        if (move_uploaded_file($image_article['tmp_name'], $imagePath)) {
            $sql = "INSERT INTO article VALUES (null, '$title_baiViet', '$content', '$imagePath')";
            //Thực hiện truy vấn
            $kqThemSP = mysqli_query($conn, $sql);
            if($kqThemSP > 0){
                $message="Thêm bài viết mới thành công";
                header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/themBaiViet.php?message=".urldecode($message));
                exit();
            }else{
                $message= "Lỗi khi thêm bài viết mới !!!";
                header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/baiViet/themBaiViet.php?message=".urldecode($message));
                exit();
            }
            
        } else {
            echo "Lỗi khi di chuyển tệp.";
        }
        // dong ket noi
        // $stmt->close();
    } else {
        echo "Lỗi khi tải lên tệp: " . $_FILES['image_product']['error'];
    }
    mysqli_close($conn);
?>