<!-- Thêm sản phẩm -->

<?php
    session_start();
    // connection db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    // Kiểm tra nếu tệp được tải lên mà không có lỗi
    if ($_FILES['image_product']['error'] === UPLOAD_ERR_OK) {
        $name_product = $_POST["name_product"];
        //echo $tenhang;
        $sex_product = $_POST["sex_product"];
        $type_product = $_POST["type_product"];
        $manufacturer_product = $_POST["manufacturer_product"];
        $price_product = $_POST["price_product"];
        $quantity_product = $_POST["quantity_product"];
        $decription_product = $_POST["decription_product"];
        // xử lý tệp ảnh
        $image_product = $_FILES["image_product"];
        $imageName = basename($image_product['name']);
        $imagePath = $_SERVER['DOCUMENT_ROOT'] ."/PHP_BanKinh/images/product/".$imageName;
        
        // Di chuyển tệp từ thư mục tạm thời đến đích
        if (move_uploaded_file($image_product['tmp_name'], $imagePath)) {
            $sql = "INSERT INTO product VALUES (null, '$name_product', '$sex_product', '$type_product', '$manufacturer_product', '$price_product', '$imagePath', '$decription_product', '$quantity_product')";
            //Thực hiện truy vấn
            $kqThemSP = mysqli_query($conn, $sql);
            if($kqThemSP > 0){
                $message="Thêm sản phẩm thành công";
                header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/themSP.php?message=".urldecode($message));
                exit();
            }else{
                $message= "Thêm sản phẩm không thành công !!!";
                header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/themSP.php?message=".urldecode($message));
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