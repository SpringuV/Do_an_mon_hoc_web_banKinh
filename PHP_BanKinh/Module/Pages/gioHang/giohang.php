<?php 
    session_start();
?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
        <link href="/PHP_BanKinh/CSS/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Trang giỏ hàng</title>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] .'/PHP_BanKinh/Module/Pages/header.php'; ?>
        <?php 
            // connect db
            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_BanKinh/Module/hidden_screen/dbConnection.php');
                // lấy user_id
                $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';
                // truy van
                $sql_query_cart = "SELECT p.idproduct, p.name_pro, p.sex_pro, p.type_pro, p.manufacturer_pro, p.image_pro, p.price_pro, p.decription_pro, p.quantity_pro, c.cart_quantity, c.cart_user_id, c.cart_pro_id FROM product as p
                JOIN cart as c  
                WHERE c.cart_pro_id = p.idproduct AND c.cart_user_id = '$user_id'";
                $kqQuery = mysqli_query($conn, $sql_query_cart);
        ?>
        <div class="style_container">
            <div class="row md-5" style="display: flex; flex-direction: column;">
                <div class="site-blocks-table">
                    <h3 align="center" style="margin-top: 2px;">Giỏ hàng của tôi</h3>
                    <table class="table">
                        <thead>
                            <tr align="center">
                                <th>Tên Sản Phẩm</th>
                                <th>Ảnh Sản Phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Hãng</th>
                                <th>Giá tiền</th>
                                <th>Số Lượng</th>
                                <th>Tổng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($kqQuery -> num_rows >0){
                                while($row = $kqQuery->fetch_assoc()){
                                    echo '<tr align="center" class="cart-item">';
                                        echo '<td style="width: 300px;">' . $row['name_pro'] . '</td>';
                                        // Chuyển đổi đường dẫn tệp hệ thống thành URL tương đối
                                        $image_path = $row['image_pro'];
                                        $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $image_path);
                                        echo '<td> <img src="' . trim($relative_path).'" style="max-width: 250px; max-height: 200px"></td>';
                                        echo '<td>' . $row['type_pro'] . '</td>';
                                        echo '<td>' . $row['manufacturer_pro'] . '</td>';
                                        echo '<td>' . number_format($row['price_pro'],0, ',','.') . ' Đồng</td>'; // số 0 là không muốn có số thập phân
                                        echo '<td id ="quantity">'.$row['cart_quantity'].'</td>';
                                        echo '<input type="hidden" name="id_product" value="' . $row['idproduct'] . '">';
                                        echo '<td>'.number_format($row['price_pro']*$row['cart_quantity'], 0, ',', '.').' Đồng</td>';
                                        echo '<td><a class="btn btn-danger" href="/PHP_BanKinh/Module/hidden_screen/quanlygiohang/xulyXoaSPTrongGioHang.php?id_pro='.$row['idproduct'].'&id_user='.$row['cart_user_id'].'">Xóa</a><br>
                                        <div class="btn-paypal" style="display:flex;justify-content: center; text-align:center; margin-top: 5px;">
                                            <form action="/PHP_BanKinh/Module/Pages/gioHang/thanhToan.php" method="post" style="display:flex;">
                                                <input type="hidden" name="id_pro" value="'.$row['idproduct'].'">
                                                <input type="hidden" name="name_pro" value="'.$row['name_pro'].'">
                                                <input type="hidden" name="price_pro" value="'.$row['price_pro'].'">
                                                <input type="hidden" name="quantity" value="'.$row['cart_quantity'].'">
                                                <input type="hidden" name="total" value="'.$row['price_pro']*$row['cart_quantity'].'">
                                                <input type="hidden" name="image_pro" value="'.trim($relative_path).'">
                                                <button class="btn btn-success">Thanh toán</button>
                                            </form>
                                        </div>
                                        </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="8" class="text-center">Giỏ hàng của bạn trống!</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </body>
    </html>