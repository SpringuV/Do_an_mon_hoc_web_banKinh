<?php 
    session_start();
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    // Xóa session của xulytimKiem nếu tồn tại
    unset($_SESSION['hang_SP'], $_SESSION['type_Pro'], $_SESSION['name_pro'], $_SESSION['filter_pro']);

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['filter_pro'])) {
        $filter = $_GET['filter_pro'];
        // sql lọc sản phẩm
        switch ($filter) {
            case 'DESC':
                $sql_query = "SELECT * FROM product ORDER BY price_pro DESC";
                break;
            case 'ASC':
                $sql_query = "SELECT * FROM product ORDER BY price_pro ASC";
                break;
            default:
                $sql_query = "SELECT * FROM product";
                break;
        }
        $kqQuery = mysqli_query($conn, $sql_query);
        if($kqQuery->num_rows >0){
            // xuat ket qua
            $_SESSION['filter_pro'] = $kqQuery->fetch_all(MYSQLI_ASSOC);
        } else{
            $_SESSION['filter_pro'] = [];
        }
    }   
    // end lọc sản phẩm
    header("Location: /PHP_BanKinh/Module/homePage.php");
    exit();
    mysqli_close($conn);
?>
