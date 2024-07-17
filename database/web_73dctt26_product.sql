-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: web_73dctt26
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `idproduct` int NOT NULL AUTO_INCREMENT,
  `name_pro` varchar(55) DEFAULT NULL,
  `sex_pro` varchar(45) DEFAULT NULL,
  `type_pro` varchar(45) DEFAULT NULL,
  `manufacturer_pro` varchar(45) DEFAULT NULL,
  `price_pro` int DEFAULT NULL,
  `image_pro` varchar(255) DEFAULT NULL,
  `decription_pro` varchar(2000) DEFAULT NULL,
  `quantity_pro` int DEFAULT NULL,
  PRIMARY KEY (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (48,'Gọng kính Nam OAKLEY 0OX3245 32450355','Nam','Kính','Oakley',3088000,'C:/xampp/htdocs/PHP_BanKinh/images/product/1_d72caee7cb4c427d9c835a1385c4ed35_master.webp','Oakley là một trong những thương hiệu hàng đầu về thiết kế sản phẩm và thể thao trên toàn thế giới. Thương hiệu này được thành lập tại California (Mỹ) vào năm 1975 và được các vận động viên hàng đầu thế giới lựa chọn để sử dụng trong các giải đấu thể thao chuyên nghiệp. Sản phẩm mắt kính của Oakley là sự giao thoa hài hoà giữa cuộc sống và thể thao, được thiết kế với sự kết hợp tuyệt vời giữa công nghệ, khoa học, nghệ thuật.\r\n\r\nOakley được nhiều người biết đến với các công nghệ tròng kính tối tân, sáng tạo riêng biệt cho từng môn thể thao, trong đó phải kể đến công nghệ PRIZM™. Bằng cách điều chỉnh bước sóng của từng gam màu, công nghệ PRIZM™ không chỉ làm sắc nét các chi tiết về hình ảnh mà còn hé mở ra vô vàn sắc thái mới mà đôi mắt bình thường không nhìn thấy.\r\n\r\nHiện nay, Oakley đã trở thành một trong những thương hiệu hàng đầu trong ngành công nghiệp thể thao và đang nỗ lực để vượt qua những giới hạn của sự đổi mới khi tích hợp các công nghệ hiện đại vào sản phẩm của mình.',100),(49,'Gọng Kính Nam GUCCI GG0018OA 002','Nam','Kính','Gucci',3720000,'C:/xampp/htdocs/PHP_BanKinh/images/product/gg0018oa_002.webp','Được sáng lập vào năm 1921 bởi Guccio Gucci ở Ý, Gucci đã dần trở thành một thương hiệu nổi tiếng trên toàn thế giới. Bí quyết thành công của Gucci chính là nét hài hoà qua sự kết hợp của các sản phẩm. Bằng nghệ thuật xử lý da điêu luyện cùng tính đồng bộ trong sáng tạo sản phẩm, Gucci đã chinh phục được những khách hàng khó tính nhất.',100),(51,'Kính Mát Unisex AMO AMO41603 C1','Cả hai','Kính','Montblanc',100000,'C:/xampp/htdocs/PHP_BanKinh/images/product/2_6d622166bc554d6bbe33e72fa8a39ca3_large.webp','Thương hiệu kính AMO được biết đến tại châu Á nhờ chất liệu cao cấp và quy trình chế tác thủ công tỉ mỉ bằng tay, cho ra đời những chiếc kính bền bỉ, tiện dụng và sành điệu phù hợp với mọi phong cách và lứa tuổi. Ngày nay, AMO đang nhanh chóng trở thành cơn sốt trong giới yêu thời trang. Thiết kế vừa vặn với nhiều hình dáng gương mặt, khi đeo tạo sự hài hòa, cân đối giữa hai bên thái dương, mắt và sóng mũi. Từng sản phẩm của AMO được gia công tỉ mỉ và sắc sảo đến từng chi tiết nhằm duy trì tuổi thọ và tính thẩm mỹ lâu dài',10),(52,'Gọng Kính Nam BURBERRY 0BE1380 100354','Nam','Kính','Burberry',6393000,'C:/xampp/htdocs/PHP_BanKinh/images/product/0be1287td_100255.webp','Bubberry được thành lập bởi Thomas Bubberry - một người bán vải tại Anh - vào năm ông 21 tuổi. Năm 1879, Burberry sử dụng quy trình sản xuất bí mật để tạo ra một chất liệu vải không bị rách, chịu được mưa gió mà vẫn thoáng mát gọi là \"gabardine\". Những chiếc áo mưa bằng vải gabardine đầu tiên của Burberry xuất hiện vào đầu thế kỷ 20. Năm 1891, hãng có cửa hàng đầu tiên tại Anh',100),(59,'ajshduaSDH UHdu hud hqwu d','Nam','Kính','Gucci',10000,'C:/xampp/htdocs/PHP_BanKinh/images/product/Screenshot (32).png','adfsadfsadf',1),(60,'asdjfhdsjfh h wh df ad ew ','Nam','Kính','Cartier',200000000,'C:/xampp/htdocs/PHP_BanKinh/images/product/Screenshot (33).png','asjhdjhf ihwihe ie iwei hwei ',29),(61,'kính mắt sdjofaidsho fiioahdoih oah ','Nam','Kính','Chopard',200000,'C:/xampp/htdocs/PHP_BanKinh/images/product/Screenshot (33).png','asdsad',2),(62,'AJHGDAs gAHSGD HDGHGasg hgas hgsa','Nam','Kính','Montblanc',400000,'C:/xampp/htdocs/PHP_BanKinh/images/product/Screenshot (45).png','asdkasjdkasd',20),(63,'ewhheifhi iwasd ads we ewe ew ew ','Nam','Kính','Oakley',300000,'C:/xampp/htdocs/PHP_BanKinh/images/product/Screenshot (33).png','200000',20),(64,'qwieurio qoiqweuo iueqweoi uowieqeu ','Nam','Kính','Oakley',3000000,'C:/xampp/htdocs/PHP_BanKinh/images/product/Screenshot (33).png','qowieuro iqoiwe uoiqwue iouqwe',3);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-17 18:38:34
