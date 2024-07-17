<?php
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    // Kiểm tra nếu tệp được tải lên mà không có lỗi
    if ( isset($_FILES['image_product_new']) && $_FILES['image_product_new']['error'] === UPLOAD_ERR_OK) {
        $id = $_POST['id_product'];
        $name_product = $_POST['name_product'];
        $type_product =$_POST['type_product'];
        $sex_product = $_POST['sex_product'];
        $manufacturer_product = $_POST['manufacturer_product'];
        $price_product = $_POST['price_product'];
        $quantity_product = $_POST['quantity_product'];
        $decription_product = $_POST['decription_product'];
        // xử lý tệp ảnh
        $image_product = $_FILES['image_product_new'];
        $imageName = basename($image_product['name']);
        $imagePath = $_SERVER['DOCUMENT_ROOT'] ."/PHP_BanKinh/images/product/".$imageName;

        // Di chuyển tệp từ thư mục tạm thời đến đích
        if (move_uploaded_file($image_product['tmp_name'], $imagePath)) {
            $sql = "UPDATE product SET name_pro='$name_product', sex_pro='$sex_product', type_pro='$type_product', manufacturer_pro = '$manufacturer_product', price_pro = '$price_product',image_pro = '$imagePath', decription_pro = '$manufacturer_product',quantity_pro = '$quantity_product' WHERE idproduct = '$id'";
        } else {
            echo "Lỗi khi di chuyển tệp ảnh.";
        }
        // dong ket noi
        // $stmt->close();
    } else {
        // Không có tệp ảnh mới, chỉ cập nhật thông tin sản phẩm
        $id = $_POST['id_product'];
        $name_product = $_POST['name_product'];
        $type_product =$_POST['type_product'];
        $sex_product = $_POST['sex_product'];
        $manufacturer_product = $_POST['manufacturer_product'];
        $price_product = $_POST['price_product'];
        $quantity_product = $_POST['quantity_product'];
        $decription_product = $_POST['decription_product'];
        
        $sql = "UPDATE product SET name_pro='$name_product', sex_pro='$sex_product', type_pro='$type_product', manufacturer_pro = '$manufacturer_product', price_pro = '$price_product', decription_pro = '$decription_product',quantity_pro = '$quantity_product'  WHERE idproduct = '$id'";
    }
    //Thực hiện truy vấn
    if(mysqli_query($conn, $sql)){
        $message="Sửa sản phẩm thành công";
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/suaSP.php?message=".urldecode($message) . "&id=". urlencode($id));
        exit();
    }else{
        $message= "Sửa sản phẩm không thành công, lỗi khi cập nhật sản phẩm!!!";
        echo "Lỗi khi cập nhật sản phẩm: " . mysqli_error($conn);
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/suaSP.php?message=".urldecode($message));
        exit();
    }
    mysqli_close($conn);
?>