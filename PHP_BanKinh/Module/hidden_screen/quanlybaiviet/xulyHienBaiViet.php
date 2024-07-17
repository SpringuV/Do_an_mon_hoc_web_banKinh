<?php
    // connect db
    include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');

    $id_article = isset($_GET['id'])? $_GET['id']:'';
    $sql = "SELECT * FROM article WHERE article_id = '$id_article'";

    $kqQuery = mysqli_query($conn, $sql);
    if($kqQuery ->num_rows >0){
        $_SESSION['tinTuc'] = $kqQuery->fetch_all(MYSQLI_ASSOC);
        header('Location: /PHP_BanKinh/Module/Pages/Page_header/tinTucDetail.php');
        exit();
    } else {
        $message = "Không hiện được bài viết";
        header('Location: /PHP_BanKinh/Module/Pages/Page_header/tinTuc.php?message='.urlencode($message));
        exit();
    }
    mysqli_close($conn);
?>