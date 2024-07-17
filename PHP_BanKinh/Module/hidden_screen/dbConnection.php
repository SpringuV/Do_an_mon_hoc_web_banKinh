<?php 
    //Kết nối đến Server
    $conn=mysqli_connect("localhost","root","1Lyasttkq.") or die("Không tìm thấy máy chủ");
    //Tìm DB
    mysqli_select_db($conn,"web_73dctt26") or die("Không tìm thấy Database!");
?>