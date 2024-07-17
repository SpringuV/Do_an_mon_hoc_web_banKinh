<?php 
    session_start();
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
    // Xóa session của xulytimKiemHang.php nếu tồn tại
    if (isset($_SESSION['type_Pro'])) {
        unset($_SESSION['type_Pro']);
    }
    if (isset($_SESSION['name_pro'])) {
        unset($_SESSION['name_pro']);
    }
    if (isset($_SESSION['filter_pro'])) {
        unset($_SESSION['filter_pro']);
    }
    // Lấy các tham số từ form tìm kiếm
        // START HÃNG SẢN PHẨM
    $hang = isset($_GET['search_query']) ? $_GET['search_query']: '';
    if(!empty($hang)){
        $sql = "SELECT * FROM product WHERE manufacturer_pro LIKE '%$hang%'";
    } else {
        $sql = "SELECT * FROM product";
    }

    // Thuc hien truy van
    $result = $conn->query($sql);

    // kiem tra ket qua
    if($result->num_rows>0){
        // xuat ket qua
        $_SESSION['hang_SP'] = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        // Nếu không có kết quả thì xóa session 'hang_SP'
        unset($_SESSION['hang_SP']);
    }
    // END HÃNG SẢN PHẨM
    header("Location:  /PHP_BanKinh/Module/Pages/Page_menuLeft/sanPham/timKiemSP.php?search_query=".$hang);
    exit();
    mysqli_close($conn);
?>