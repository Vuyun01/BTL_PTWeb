-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 04:29 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'vu', 'vu111@gmail.com', 'vutran', '0192023a7bbd73250516f069df18b500', 0),
(2, 'admin', 'admin@gmail.com', 'admin', '0192023a7bbd73250516f069df18b500', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`) VALUES
(1, 'Acer'),
(2, 'Dell'),
(3, 'Panasonic'),
(4, 'Sony'),
(5, 'Apple'),
(8, 'Huawei'),
(10, 'Xiaomi'),
(11, 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `Id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`Id`, `productId`, `sessionId`, `productName`, `price`, `quantity`, `image`) VALUES
(55, 42, '5kj7oqua0605lif11hrkj8097m', 'Laptop Acer Aspire 2020', '21790000', 1, '9f43fef7cc.jpg'),
(56, 41, 'ldii369gmhvqi66vtdsob6itjl', 'MacBook Air 2021 pro ', '29300000', 1, '26779d8dff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(11, 'Laptop'),
(12, 'Thiết bị gia dụng'),
(13, 'Đồng hồ thông minh'),
(15, 'Accessories'),
(16, 'Smartphone'),
(21, 'Beauty &amp; Care'),
(22, 'Linh tinh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`Id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(5, 'Anh', 'asda', 'Ha Noi', 'AU', '2121', '0372222211', 'vu123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'johnathan', '123 Hall Way, New York', 'New York', 'AU', '44231', '223429112', 'johnathan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'hanna', '21 South Town, New York', 'New York', 'AU', '98227', '+611928883412', 'hanna121@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'admin', 'ha noi', 'Ha Noi', 'VN', '2121', '+61372222211', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`Id`, `name`, `email`, `phone`, `content`) VALUES
(8, 'hanna', 'hanna121@gmail.com', '1928883412', ' i dont get anything about this'),
(9, 'vuuuu', 'vuu111111@gmail.com', '+61372222211', ' anahnahaha asdasd'),
(12, 'Ha', 'ha121@gmail.com', '1392000222', ' Chúng tôi luôn đặt dịch vụ khách hàng lên hàng đầu. Nhằm cải thiện dịch vụ tốt hơn, việc triển khai hỗ trợ kỹ thuật trực tuyến là điểu cần thiết, giúp cho khách hàng yên tâm sử dụng sản phẩm của chúng tôiChúng tôi luôn đặt dịch vụ khách hàng lên hàng đầu. Nhằm cải thiện dịch vụ tốt hơn, việc triển khai hỗ trợ kỹ thuật trực tuyến là điểu cần thiết, giúp cho khách hàng yên tâm sử dụng sản phẩm của chúng tôi'),
(13, 'admin', 'admin@gmail.com', '+61372222211', ' TẠI SAO NÊN MUA HÀNG CỦA CHÚNG TÔI?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `Id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `cusId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`Id`, `productId`, `productName`, `cusId`, `quantity`, `image`, `price`, `date`, `status`) VALUES
(73, 41, 'MacBook Air 2021 pro ', 8, 1, '26779d8dff.jpg', '29300000', '2021-12-17 02:41:10', 2),
(74, 16, 'Iphone 13 256G Promax', 8, 1, '7cede46e0d.jpg', '39000000', '2021-12-17 02:41:10', 2),
(75, 25, 'Apple Watch 2021 pro', 8, 1, 'bfa1a20032.jpg', '8200000', '2021-12-17 02:41:10', 2),
(76, 13, 'Tủ lạnh Panasonic Inverter 170 lít', 8, 1, '3b5dbf5e83.png', '22830000', '2021-12-17 02:41:10', 2),
(77, 37, 'Máy ảnh Sony Z81', 8, 2, '2462852236.jpg', '15200000', '2021-12-17 02:41:10', 2),
(78, 15, 'Laptop gaming Acer', 8, 1, '6079a73538.jpg', '26500000', '2021-12-17 02:41:10', 2),
(79, 23, 'Sạc dự phòng Xiaomi 20000W', 8, 2, '6643ba9a1a.jpg', '2580000', '2021-12-17 02:41:10', 2),
(80, 38, 'Tivi Huawei 2020', 8, 2, '902a486e0b.jpg', '26800000', '2021-12-17 02:41:10', 2),
(81, 16, 'Iphone 13 256G Promax', 5, 1, '7cede46e0d.jpg', '39000000', '2021-12-17 02:48:55', 2),
(82, 32, 'Apple Watch 2019 V21', 8, 2, '7a449ebf00.jpg', '15000000', '2021-12-17 02:50:38', 2),
(83, 44, 'Tivi Sony 50inch IJ23 Full Led 4k', 8, 2, '1f7e3cbd43.jpg', '33200000', '2021-12-17 03:24:23', 0),
(84, 32, 'Apple Watch 2019 V21', 5, 1, '7a449ebf00.jpg', '7500000', '2021-12-23 03:14:50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandID`, `description`, `type`, `price`, `image`) VALUES
(12, 'Máy ảnh Sony 60C', 15, 4, '<p>Khe cắm thẻ nhớ SD / SDHC / SDXC ,18MP APS-C CMOS cảm biến, 3.0 \"Clear View Vari-Angle LCD, Dải ISO 100-6400, Chế độ phim Full HD w / Manual Exposure</p>', 1, '9800000', 'be0c6ebad2.jpg'),
(13, 'Tủ lạnh Panasonic Inverter 170 lít', 12, 3, '<p><span>C&ocirc;ng suất ti&ecirc;u thụ ~ 1.04 kW/ng&agrave;y Chất liệu cửa tủ lạnh Mặt K&iacute;nh D&ograve;ng điện 220V/50Hz/1.5A Trọng lượng 73 Kg K&iacute;ch thước 1680x 686x 695 mm</span></p>', 0, '22830000', '3b5dbf5e83.png'),
(14, 'Tủ lạnh Toshiba Z3C8 240L', 12, 11, '<p><span>C&ocirc;ng nghệ tiết kiệm điện Inverter Chỉnh nhiệt độ Thủ c&ocirc;ng L&agrave;m lạnh nhanh C&oacute; Lấy đ&aacute; ngo&agrave;i Kh&ocirc;ng Dung t&iacute;ch Từ 300-450 l&iacute;t</span></p>', 0, '19340000', '8707a76b06.png'),
(15, 'Laptop gaming Acer', 11, 1, '<p><span>Acer Aspire 7 2020 A715 42G&nbsp;t&iacute;ch hợp card đồ họa NVIDIA GTX1650 4GB GDDR6, l&agrave; laptop chơi game tốt nhất ph&acirc;n kh&uacute;c.</span></p>', 1, '26500000', '6079a73538.jpg'),
(16, 'Iphone 13 256G Promax', 16, 5, '<p>Si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple</p>', 0, '39000000', '7cede46e0d.jpg'),
(20, 'Laptop Xiaomi pro v2021', 11, 10, '<p>Được n&acirc;ng cấp v&agrave; cải tiến mang đến tốc độ xử l&yacute; đ&aacute;ng kinh ngạc trong hầu hết mọi t&aacute;c vụ, được đ&aacute;nh gi&aacute; l&agrave; nhanh hơn đến&nbsp;70%&nbsp;so với thế hệ tiền nhiệm</p>', 1, '32990000', '3ec3effbf6.jpg'),
(21, 'Dell Inspire 2020 C8721', 11, 2, '<p>Sở hữu&nbsp;4 nh&acirc;n 8 luồng&nbsp;được t&iacute;ch hợp th&ecirc;m&nbsp;4 l&otilde;i xử l&yacute; Willow Cove&nbsp;với c&ocirc;ng nghệ&nbsp;10 nm SuperFin&nbsp;cung cấp l&agrave;m việc cao hơn&nbsp;20%&nbsp;so với thế hệ trước,&nbsp;cải thiện tuổi thọ pin.</p>', 1, '24000000', 'e6ea3f8ef9.jpg'),
(22, 'Lồi cơm điện N82 ', 12, 11, '<p><span>Thiết kế đẹp mắt, dễ d&agrave;ng sử dụng v&agrave; chất lượng cơm nấu ra ngon l&agrave; những ưu điểm m&agrave; nồi cơm điện n&agrave;y mang đến.</span></p>', 1, '2400000', '15f102bf46.jpg'),
(23, 'Sạc dự phòng Xiaomi 20000W', 15, 10, '<p><span>thiết kế đẹp mắt, dễ d&agrave;ng sử dụng v&agrave; hiệu năng l&ecirc;n đến 20000W gi&uacute;p sạc hiệu quả</span></p>', 0, '1290000', '6643ba9a1a.jpg'),
(24, 'Máy xay sinh tố Toshi', 12, 11, '<p><span>Thiết kế m&agrave;u trắng, ghi đơn giản mang đến vẻ đẹp sang trọng. Với t&ocirc;ng m&agrave;u trắng s&aacute;ng rất ph&ugrave; hợp cho nhiều kh&ocirc;ng gian bếp nội thất thiết kế hiện đại ng&agrave;y nay</span></p>', 1, '3290000', '80c01fa332.png'),
(25, 'Apple Watch 2021 pro', 13, 5, '<p>&nbsp;Apple Watch Series 7 l&agrave; phi&ecirc;n bản smartwatch ho&agrave;n thiện, tập hợp tất cả những g&igrave; người d&ugrave;ng cần.</p>', 0, '8200000', 'bfa1a20032.jpg'),
(26, 'Xiaomi Watch 2020 N92', 13, 10, '<p><span>Thiết kế lại ho&agrave;n to&agrave;n m&agrave;n h&igrave;nh gi&uacute;p giảm tới 40% diện t&iacute;ch phần viền, tạo th&agrave;nh một m&agrave;n h&igrave;nh tr&agrave;n viền đầy quyến rũ, nơi bạn xem được nhiều nội dung hơn, h&igrave;nh ảnh hấp dẫn hơn.</span></p>', 1, '4600000', 'de5084354e.jpg'),
(27, 'Xiaomi Watch limit 2019 C6A21', 13, 10, '<p><span>Thiết kế lại giao diện của m&aacute;y t&iacute;nh, đồng hồ bấm giờ, b&agrave;n ph&iacute;m Qwerty v&agrave; nhiều ứng dụng kh&aacute;c để tận dụng lợi thế của m&agrave;n h&igrave;nh lớn, gi&uacute;p bạn sử dụng đồng hồ trực quan v&agrave; dễ d&agrave;ng hơn bao giờ hết</span></p>', 0, '4100000', 'd76625b1a0.jpg'),
(28, 'Camera 360 H82', 22, 4, '<p><span>Camera quay quét wifi Full 2K 4MP,</span><span>&nbsp;H&ocirc;̀ng ngoại 10m</span><span>, Hỗ trợ t&iacute;nh năng theo d&otilde;i th&ocirc;ng minh</span><span>&nbsp;,Phát hi&ecirc;̣n chuy&ecirc;̉n đ&ocirc;̣ng th&ocirc;ng minh</span><span>&nbsp;,Tích hợp Micro và Loa &ndash; H&ocirc;̃ trợ đàm thoại 2 chi&ecirc;̀u</span><span>&nbsp;,H&ocirc;̃ trợ khe cắm thẻ nhớ đ&ecirc;́n 256GB.</span></p>', 1, '1400000', 'bb36707a09.jpg'),
(29, 'Laptop Acer 2019', 11, 1, '<p><span>Card đồ họa t&iacute;ch hợp</span><strong>&nbsp;Iris Xe Graphics&nbsp;</strong><span>tăng khả năng đồ họa mang đến chất lượng h&igrave;nh ảnh sắc n&eacute;t, cho&nbsp;người d&ugrave;ng trải nghiệm chơi game tốc độ cao m&agrave; vẫn đảm bảo mượt m&agrave;, &iacute;t giật lag</span></p>', 1, '24000000', '4a348a5251.jpg'),
(32, 'Apple Watch 2019 V21', 13, 5, '<p><span>Apple Watch Series 6 giờ đ&acirc;y đ&atilde; bổ sung th&ecirc;m phi&ecirc;n bản m&agrave;u đỏ cực chất. Được l&agrave;m từ chất liệu nh&ocirc;m c&oacute; khả năng t&aacute;i chế 100%</span></p>', 0, '7500000', '7a449ebf00.jpg'),
(33, 'Camera 360 Sony', 22, 4, '<p><span>Độ ph&acirc;n giải Full 2K 4MP mang đến cho người d&ugrave;ng những trải nghiệm h&igrave;nh ảnh sắc n&eacute;t.</span></p>', 1, '2300000', '79dc915915.jpg'),
(34, 'Loa laptop ASB K8', 15, 3, '<p><span>Extra Bass t&acirc;n tiến gi&uacute;p bạn c&oacute; trải nghiệm tốt hơn đặc biệt với những bản nhạc EDM. Loa c&ograve;n được t&iacute;ch hợp với bluetooth 5.0 gi&uacute;p bạn c&oacute; thể kết nối với nhiều d&ograve;ng thiết bị.</span></p>', 1, '1300000', '31f88dc3e1.jpg'),
(35, 'Loa bluetooth H89C2', 15, 8, '<p><span>Trong những bữa tiệc, đặc biệt l&agrave; tiệc ngo&agrave;i trời, &acirc;m nhạc dường như l&agrave; điều kh&ocirc;ng thể thiếu. Chiếc loa bluetooth Sanag X6 gi&uacute;p bạn t&acirc;n hưởng những giai điệu những bản nhạc một c&aacute;ch trọn vẹn nhất. Thiết kế nhỏ gọn, hợp thời trang với nhiều m&agrave;u sắc bạn c&oacute; thể tho&aacute;i mai lựa chọn. Với c&ocirc;ng nghệ&nbsp;</span></p>', 0, '3500000', '1f10137272.jpg'),
(36, 'Loa bluetooth B2Z4', 15, 8, '<p><span>Đơn giản, gọn nhẹ chỉ</span><strong>&nbsp;0.4 kg,</strong><span>&nbsp;đi k&egrave;m&nbsp;</span><strong>d&acirc;y treo&nbsp;</strong><span>cho bạn dễ d&agrave;ng đeo v&agrave;o cổ tay của m&igrave;nh hoặc treo m&oacute;c v&agrave;o balo mang theo khi đi chơi, du lịch, đi học,... Chất liệu vỏ nhựa c&oacute; th&ecirc;m lớp</span><strong>&nbsp;UV coating&nbsp;</strong><span>cho độ bền cao, chống trầy xước, l&agrave;m sạch nhẹ nh&agrave;ng.</span></p>', 1, '1800000', '1c1aa427c0.jpg'),
(37, 'Máy ảnh Sony Z81', 15, 4, '<p><span>Sony sử dụng c&ocirc;ng nghệ xử l&yacute; ảnh tốt nhất với khả năng chống rung hiện đại gi&uacute;p bạn sẽ c&oacute; những tấm ảnh chất lượng hơn v&agrave; chinh phục mọi ng&oacute;c ng&aacute;ch</span></p>', 0, '7600000', '2462852236.jpg'),
(38, 'Tivi Huawei 2020', 12, 8, '<p><span>Sở hữu thiết kế đơn giản tinh tế, kh&ocirc;ng chỉ n&acirc;ng tầm kh&ocirc;ng gian sống hiện đại m&agrave; c&ograve;n g&acirc;y ấn tượng với những t&iacute;nh năng m&agrave; n&oacute; mang lại cho cuộc sống của bạn.</span></p>', 0, '13400000', '902a486e0b.jpg'),
(39, 'Điều hòa panasonic C8', 12, 3, '<p>C&ocirc;ng suất 1 HP th&iacute;ch hợp sử dụng cho ph&ograve;ng c&oacute; diện t&iacute;ch dưới 15m2</p>\r\n<p>C&ocirc;ng nghệ Inverter gi&uacute;p m&aacute;y vận h&agrave;nh &ecirc;m, giảm ồn, tiết kiệm điện</p>\r\n<p>Chế độ l&agrave;m lạnh Powerful gi&uacute;p căn ph&ograve;ng m&aacute;t lạnh ngay tức</p>', 1, '3700000', '4b0ac5c66c.jpg'),
(40, 'Laptop Dell Convers 2020', 11, 2, '<p><span>Người d&ugrave;ng c&oacute; thể y&ecirc;n t&acirc;m mở h&agrave;ng chục layer cho việc thiết kế, h&agrave;ng loạt tab hay ứng dụng c&ugrave;ng l&uacute;c v&agrave; chuyển đổi qua lại nhờ sự đa nhiệm</span></p>', 1, '27800000', 'ab94f08e70.jpg'),
(41, 'MacBook Air 2021 pro ', 11, 5, '<p>C&oacute; hiệu năng nhanh hơn tới 3 lần so với hầu hết c&aacute;c laptop chạy Windows c&oacute; mặt tr&ecirc;n thị trường. Ngo&agrave;i ra, theo c&ocirc;ng bố của Cupertino Macbook Air M1 2021 256GB sẽ c&oacute; tốc độ hơn 9 lần so với c&aacute;c phi&ecirc;n bản Air cũ.</p>', 0, '29300000', '26779d8dff.jpg'),
(42, 'Laptop Acer Aspire 2020', 11, 1, '<p>Laptop Aspire 2020 t&iacute;ch hợp Card đồ họa NVIDIA GTX 1650 4GB DDR6 phi&ecirc;n bản n&acirc;ng cấp năm 2021, l&agrave; laptop chơi game tốt nhất ph&acirc;n kh&uacute;c</p>', 1, '21790000', '9f43fef7cc.jpg'),
(44, 'Tivi Sony 50inch IJ23 Full Led 4k', 12, 4, '<p><span>Xem h&igrave;nh ảnh 8K c&oacute; chiều s&acirc;u, tự nhi&ecirc;n v&agrave; ch&acirc;n thực. Bộ xử l&yacute; đột ph&aacute; sử dụng dữ liệu ph&acirc;n t&iacute;ch g&oacute;c nh&igrave;n của người để ph&acirc;n t&iacute;ch ch&eacute;o v&agrave; tối ưu h&oacute;a h&agrave;ng trăm ngh&igrave;n yếu tố trong chớp mắt</span></p>', 0, '16600000', '1f7e3cbd43.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderImage` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `sliderImage`, `type`) VALUES
(7, 'slider 1', '2fc5ee0e8b.jpg', 1),
(8, 'slider 2', 'c940e4509f.png', 1),
(9, 'slider 3', '60f4e3a202.jpg', 1),
(11, 'slider 5', 'a538eeeeee.jpg', 1),
(12, 'slider 6', '1c0bda3c4a.jpg', 0),
(14, 'slider 8', '47584618c0.png', 0),
(15, 'slider 8', '122b6aaef6.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
