<?php 
    
    session_start();
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
    
    // Xóa session của xulytimKiemHang.php nếu tồn tại
        if (isset($_SESSION['hang_SP'])) {
            unset($_SESSION['hang_SP']);
        }
        if (isset($_SESSION['type_Pro'])) {
            unset($_SESSION['type_Pro']);
        }
        if (isset($_SESSION['filter_pro'])) {
            unset($_SESSION['filter_pro']);
        }
    // Lấy các tham số từ form tìm kiếm
        // START LOẠI SẢN PHẨM
    $name_pro = isset($_GET['search_query']) ? $_GET['search_query']: '';
    if(!empty($name_pro)){
        $sql = "SELECT * FROM product WHERE name_pro LIKE '%$name_pro%'";
    } else {
        $_SESSION['error'] = "Không tìm thấy sản phẩm có tên: ".$name_pro;
    }

    // Thuc hien truy van
    $result = $conn->query($sql);

    // kiem tra ket qua
    if($result->num_rows>0){
        // xuat ket qua
        $_SESSION['name_pro'] = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        // Nếu không có kết quả thì xóa session 'name_pro'
        $_SESSION['error'] = "Không tìm thấy sản phẩm có tên: ".$name_pro.". Bạn có thể xem sản phẩm khác của chúng tôi!";
        unset($_SESSION['name_pro']);
    }
        // END LOẠI SẢN PHẨM
        header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/timKiemSP.php?search_query=".$name_pro);
    exit();
    mysqli_close($conn);
?>