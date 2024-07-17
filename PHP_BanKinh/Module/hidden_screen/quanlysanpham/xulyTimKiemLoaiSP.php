<?php 
    
    session_start();
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
    
    // Xóa session của xulytimKiemHang.php nếu tồn tại
        if (isset($_SESSION['hang_SP'])) {
            unset($_SESSION['hang_SP']);
        }
        if (isset($_SESSION['name_pro'])) {
            unset($_SESSION['name_pro']);
        }
        if (isset($_SESSION['filter_pro'])) {
            unset($_SESSION['filter_pro']);
        }
    // Lấy các tham số từ form tìm kiếm

        // START LOẠI SẢN PHẨM
    $type_pro = isset($_GET['search_query']) ? $_GET['search_query']: '';
    if(!empty($type_pro)){
        $sql = "SELECT * FROM product WHERE type_pro LIKE '%$type_pro%'";
    } else {
        $sql = "SELECT * FROM product";
    }

    // Thuc hien truy van
    $result = $conn->query($sql);

    // kiem tra ket qua
    if($result->num_rows>0){
        // xuat ket qua
        $_SESSION['type_Pro'] = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        // Nếu không có kết quả thì xóa session 'hang_SP'
        unset($_SESSION['type_Pro']);
    }
        // END LOẠI SẢN PHẨM
    header("Location: /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/timKiemSP.php?search_query=".$type_pro);
    exit();
    mysqli_close($conn);
?>