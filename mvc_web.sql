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
(12, 'Thi???t b??? gia d???ng'),
(13, '?????ng h??? th??ng minh'),
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
(12, 'Ha', 'ha121@gmail.com', '1392000222', ' Ch??ng t??i lu??n ?????t d???ch v??? kh??ch h??ng l??n h??ng ?????u. Nh???m c???i thi???n d???ch v??? t???t h??n, vi???c tri???n khai h??? tr??? k??? thu???t tr???c tuy???n l?? ??i???u c???n thi???t, gi??p cho kh??ch h??ng y??n t??m s??? d???ng s???n ph???m c???a ch??ng t??iCh??ng t??i lu??n ?????t d???ch v??? kh??ch h??ng l??n h??ng ?????u. Nh???m c???i thi???n d???ch v??? t???t h??n, vi???c tri???n khai h??? tr??? k??? thu???t tr???c tuy???n l?? ??i???u c???n thi???t, gi??p cho kh??ch h??ng y??n t??m s??? d???ng s???n ph???m c???a ch??ng t??i'),
(13, 'admin', 'admin@gmail.com', '+61372222211', ' T???I SAO N??N MUA H??NG C???A CH??NG T??I?');

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
(76, 13, 'T??? l???nh Panasonic Inverter 170 l??t', 8, 1, '3b5dbf5e83.png', '22830000', '2021-12-17 02:41:10', 2),
(77, 37, 'M??y ???nh Sony Z81', 8, 2, '2462852236.jpg', '15200000', '2021-12-17 02:41:10', 2),
(78, 15, 'Laptop gaming Acer', 8, 1, '6079a73538.jpg', '26500000', '2021-12-17 02:41:10', 2),
(79, 23, 'S???c d??? ph??ng Xiaomi 20000W', 8, 2, '6643ba9a1a.jpg', '2580000', '2021-12-17 02:41:10', 2),
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
(12, 'M??y ???nh Sony 60C', 15, 4, '<p>Khe c???m th??? nh??? SD / SDHC / SDXC ,18MP APS-C CMOS c???m bi???n, 3.0 \"Clear View Vari-Angle LCD, D???i ISO 100-6400, Ch??? ????? phim Full HD w / Manual Exposure</p>', 1, '9800000', 'be0c6ebad2.jpg'),
(13, 'T??? l???nh Panasonic Inverter 170 l??t', 12, 3, '<p><span>C&ocirc;ng su???t ti&ecirc;u th??? ~ 1.04 kW/ng&agrave;y Ch???t li???u c???a t??? l???nh M???t K&iacute;nh D&ograve;ng ??i???n 220V/50Hz/1.5A Tr???ng l?????ng 73 Kg K&iacute;ch th?????c 1680x 686x 695 mm</span></p>', 0, '22830000', '3b5dbf5e83.png'),
(14, 'T??? l???nh Toshiba Z3C8 240L', 12, 11, '<p><span>C&ocirc;ng ngh??? ti???t ki???m ??i???n Inverter Ch???nh nhi???t ????? Th??? c&ocirc;ng L&agrave;m l???nh nhanh C&oacute; L???y ??&aacute; ngo&agrave;i Kh&ocirc;ng Dung t&iacute;ch T??? 300-450 l&iacute;t</span></p>', 0, '19340000', '8707a76b06.png'),
(15, 'Laptop gaming Acer', 11, 1, '<p><span>Acer Aspire 7 2020 A715 42G&nbsp;t&iacute;ch h???p card ????? h???a NVIDIA GTX1650 4GB GDDR6, l&agrave; laptop ch??i game t???t nh???t ph&acirc;n kh&uacute;c.</span></p>', 1, '26500000', '6079a73538.jpg'),
(16, 'Iphone 13 256G Promax', 16, 5, '<p>Si&ecirc;u ph???m ???????c mong ch??? nh???t ??? n???a cu???i n??m 2021 ?????n t??? Apple</p>', 0, '39000000', '7cede46e0d.jpg'),
(20, 'Laptop Xiaomi pro v2021', 11, 10, '<p>???????c n&acirc;ng c???p v&agrave; c???i ti???n mang ?????n t???c ????? x??? l&yacute; ??&aacute;ng kinh ng???c trong h???u h???t m???i t&aacute;c v???, ???????c ??&aacute;nh gi&aacute; l&agrave; nhanh h??n ?????n&nbsp;70%&nbsp;so v???i th??? h??? ti???n nhi???m</p>', 1, '32990000', '3ec3effbf6.jpg'),
(21, 'Dell Inspire 2020 C8721', 11, 2, '<p>S??? h???u&nbsp;4 nh&acirc;n 8 lu???ng&nbsp;???????c t&iacute;ch h???p th&ecirc;m&nbsp;4 l&otilde;i x??? l&yacute; Willow Cove&nbsp;v???i c&ocirc;ng ngh???&nbsp;10 nm SuperFin&nbsp;cung c???p l&agrave;m vi???c cao h??n&nbsp;20%&nbsp;so v???i th??? h??? tr?????c,&nbsp;c???i thi???n tu???i th??? pin.</p>', 1, '24000000', 'e6ea3f8ef9.jpg'),
(22, 'L???i c??m ??i???n N82 ', 12, 11, '<p><span>Thi???t k??? ?????p m???t, d??? d&agrave;ng s??? d???ng v&agrave; ch???t l?????ng c??m n???u ra ngon l&agrave; nh???ng ??u ??i???m m&agrave; n???i c??m ??i???n n&agrave;y mang ?????n.</span></p>', 1, '2400000', '15f102bf46.jpg'),
(23, 'S???c d??? ph??ng Xiaomi 20000W', 15, 10, '<p><span>thi???t k??? ?????p m???t, d??? d&agrave;ng s??? d???ng v&agrave; hi???u n??ng l&ecirc;n ?????n 20000W gi&uacute;p s???c hi???u qu???</span></p>', 0, '1290000', '6643ba9a1a.jpg'),
(24, 'M??y xay sinh t??? Toshi', 12, 11, '<p><span>Thi???t k??? m&agrave;u tr???ng, ghi ????n gi???n mang ?????n v??? ?????p sang tr???ng. V???i t&ocirc;ng m&agrave;u tr???ng s&aacute;ng r???t ph&ugrave; h???p cho nhi???u kh&ocirc;ng gian b???p n???i th???t thi???t k??? hi???n ?????i ng&agrave;y nay</span></p>', 1, '3290000', '80c01fa332.png'),
(25, 'Apple Watch 2021 pro', 13, 5, '<p>&nbsp;Apple Watch Series 7 l&agrave; phi&ecirc;n b???n smartwatch ho&agrave;n thi???n, t???p h???p t???t c??? nh???ng g&igrave; ng?????i d&ugrave;ng c???n.</p>', 0, '8200000', 'bfa1a20032.jpg'),
(26, 'Xiaomi Watch 2020 N92', 13, 10, '<p><span>Thi???t k??? l???i ho&agrave;n to&agrave;n m&agrave;n h&igrave;nh gi&uacute;p gi???m t???i 40% di???n t&iacute;ch ph???n vi???n, t???o th&agrave;nh m???t m&agrave;n h&igrave;nh tr&agrave;n vi???n ?????y quy???n r??, n??i b???n xem ???????c nhi???u n???i dung h??n, h&igrave;nh ???nh h???p d???n h??n.</span></p>', 1, '4600000', 'de5084354e.jpg'),
(27, 'Xiaomi Watch limit 2019 C6A21', 13, 10, '<p><span>Thi???t k??? l???i giao di???n c???a m&aacute;y t&iacute;nh, ?????ng h??? b???m gi???, b&agrave;n ph&iacute;m Qwerty v&agrave; nhi???u ???ng d???ng kh&aacute;c ????? t???n d???ng l???i th??? c???a m&agrave;n h&igrave;nh l???n, gi&uacute;p b???n s??? d???ng ?????ng h??? tr???c quan v&agrave; d??? d&agrave;ng h??n bao gi??? h???t</span></p>', 0, '4100000', 'd76625b1a0.jpg'),
(28, 'Camera 360 H82', 22, 4, '<p><span>Camera quay que??t wifi Full 2K 4MP,</span><span>&nbsp;H&ocirc;??ng ngoa??i 10m</span><span>, H??? tr??? t&iacute;nh n??ng theo d&otilde;i th&ocirc;ng minh</span><span>&nbsp;,Pha??t hi&ecirc;??n chuy&ecirc;??n ??&ocirc;??ng th&ocirc;ng minh</span><span>&nbsp;,Ti??ch h????p Micro va?? Loa &ndash; H&ocirc;?? tr???? ??a??m thoa??i 2 chi&ecirc;??u</span><span>&nbsp;,H&ocirc;?? tr???? khe c????m the?? nh???? ??&ecirc;??n 256GB.</span></p>', 1, '1400000', 'bb36707a09.jpg'),
(29, 'Laptop Acer 2019', 11, 1, '<p><span>Card ????? h???a t&iacute;ch h???p</span><strong>&nbsp;Iris Xe Graphics&nbsp;</strong><span>t??ng kh??? n??ng ????? h???a mang ?????n ch???t l?????ng h&igrave;nh ???nh s???c n&eacute;t, cho&nbsp;ng?????i d&ugrave;ng tr???i nghi???m ch??i game t???c ????? cao m&agrave; v???n ?????m b???o m?????t m&agrave;, &iacute;t gi???t lag</span></p>', 1, '24000000', '4a348a5251.jpg'),
(32, 'Apple Watch 2019 V21', 13, 5, '<p><span>Apple Watch Series 6 gi??? ??&acirc;y ??&atilde; b??? sung th&ecirc;m phi&ecirc;n b???n m&agrave;u ????? c???c ch???t. ???????c l&agrave;m t??? ch???t li???u nh&ocirc;m c&oacute; kh??? n??ng t&aacute;i ch??? 100%</span></p>', 0, '7500000', '7a449ebf00.jpg'),
(33, 'Camera 360 Sony', 22, 4, '<p><span>????? ph&acirc;n gi???i Full 2K 4MP mang ?????n cho ng?????i d&ugrave;ng nh???ng tr???i nghi???m h&igrave;nh ???nh s???c n&eacute;t.</span></p>', 1, '2300000', '79dc915915.jpg'),
(34, 'Loa laptop ASB K8', 15, 3, '<p><span>Extra Bass t&acirc;n ti???n gi&uacute;p b???n c&oacute; tr???i nghi???m t???t h??n ?????c bi???t v???i nh???ng b???n nh???c EDM. Loa c&ograve;n ???????c t&iacute;ch h???p v???i bluetooth 5.0 gi&uacute;p b???n c&oacute; th??? k???t n???i v???i nhi???u d&ograve;ng thi???t b???.</span></p>', 1, '1300000', '31f88dc3e1.jpg'),
(35, 'Loa bluetooth H89C2', 15, 8, '<p><span>Trong nh???ng b???a ti???c, ?????c bi???t l&agrave; ti???c ngo&agrave;i tr???i, &acirc;m nh???c d?????ng nh?? l&agrave; ??i???u kh&ocirc;ng th??? thi???u. Chi???c loa bluetooth Sanag X6 gi&uacute;p b???n t&acirc;n h?????ng nh???ng giai ??i???u nh???ng b???n nh???c m???t c&aacute;ch tr???n v???n nh???t. Thi???t k??? nh??? g???n, h???p th???i trang v???i nhi???u m&agrave;u s???c b???n c&oacute; th??? tho&aacute;i mai l???a ch???n. V???i c&ocirc;ng ngh???&nbsp;</span></p>', 0, '3500000', '1f10137272.jpg'),
(36, 'Loa bluetooth B2Z4', 15, 8, '<p><span>????n gi???n, g???n nh??? ch???</span><strong>&nbsp;0.4 kg,</strong><span>&nbsp;??i k&egrave;m&nbsp;</span><strong>d&acirc;y treo&nbsp;</strong><span>cho b???n d??? d&agrave;ng ??eo v&agrave;o c??? tay c???a m&igrave;nh ho???c treo m&oacute;c v&agrave;o balo mang theo khi ??i ch??i, du l???ch, ??i h???c,... Ch???t li???u v??? nh???a c&oacute; th&ecirc;m l???p</span><strong>&nbsp;UV coating&nbsp;</strong><span>cho ????? b???n cao, ch???ng tr???y x?????c, l&agrave;m s???ch nh??? nh&agrave;ng.</span></p>', 1, '1800000', '1c1aa427c0.jpg'),
(37, 'M??y ???nh Sony Z81', 15, 4, '<p><span>Sony s??? d???ng c&ocirc;ng ngh??? x??? l&yacute; ???nh t???t nh???t v???i kh??? n??ng ch???ng rung hi???n ?????i gi&uacute;p b???n s??? c&oacute; nh???ng t???m ???nh ch???t l?????ng h??n v&agrave; chinh ph???c m???i ng&oacute;c ng&aacute;ch</span></p>', 0, '7600000', '2462852236.jpg'),
(38, 'Tivi Huawei 2020', 12, 8, '<p><span>S??? h???u thi???t k??? ????n gi???n tinh t???, kh&ocirc;ng ch??? n&acirc;ng t???m kh&ocirc;ng gian s???ng hi???n ?????i m&agrave; c&ograve;n g&acirc;y ???n t?????ng v???i nh???ng t&iacute;nh n??ng m&agrave; n&oacute; mang l???i cho cu???c s???ng c???a b???n.</span></p>', 0, '13400000', '902a486e0b.jpg'),
(39, '??i???u h??a panasonic C8', 12, 3, '<p>C&ocirc;ng su???t 1 HP th&iacute;ch h???p s??? d???ng cho ph&ograve;ng c&oacute; di???n t&iacute;ch d?????i 15m2</p>\r\n<p>C&ocirc;ng ngh??? Inverter gi&uacute;p m&aacute;y v???n h&agrave;nh &ecirc;m, gi???m ???n, ti???t ki???m ??i???n</p>\r\n<p>Ch??? ????? l&agrave;m l???nh Powerful gi&uacute;p c??n ph&ograve;ng m&aacute;t l???nh ngay t???c</p>', 1, '3700000', '4b0ac5c66c.jpg'),
(40, 'Laptop Dell Convers 2020', 11, 2, '<p><span>Ng?????i d&ugrave;ng c&oacute; th??? y&ecirc;n t&acirc;m m??? h&agrave;ng ch???c layer cho vi???c thi???t k???, h&agrave;ng lo???t tab hay ???ng d???ng c&ugrave;ng l&uacute;c v&agrave; chuy???n ?????i qua l???i nh??? s??? ??a nhi???m</span></p>', 1, '27800000', 'ab94f08e70.jpg'),
(41, 'MacBook Air 2021 pro ', 11, 5, '<p>C&oacute; hi???u n??ng nhanh h??n t???i 3 l???n so v???i h???u h???t c&aacute;c laptop ch???y Windows c&oacute; m???t tr&ecirc;n th??? tr?????ng. Ngo&agrave;i ra, theo c&ocirc;ng b??? c???a Cupertino Macbook Air M1 2021 256GB s??? c&oacute; t???c ????? h??n 9 l???n so v???i c&aacute;c phi&ecirc;n b???n Air c??.</p>', 0, '29300000', '26779d8dff.jpg'),
(42, 'Laptop Acer Aspire 2020', 11, 1, '<p>Laptop Aspire 2020 t&iacute;ch h???p Card ????? h???a NVIDIA GTX 1650 4GB DDR6 phi&ecirc;n b???n n&acirc;ng c???p n??m 2021, l&agrave; laptop ch??i game t???t nh???t ph&acirc;n kh&uacute;c</p>', 1, '21790000', '9f43fef7cc.jpg'),
(44, 'Tivi Sony 50inch IJ23 Full Led 4k', 12, 4, '<p><span>Xem h&igrave;nh ???nh 8K c&oacute; chi???u s&acirc;u, t??? nhi&ecirc;n v&agrave; ch&acirc;n th???c. B??? x??? l&yacute; ?????t ph&aacute; s??? d???ng d??? li???u ph&acirc;n t&iacute;ch g&oacute;c nh&igrave;n c???a ng?????i ????? ph&acirc;n t&iacute;ch ch&eacute;o v&agrave; t???i ??u h&oacute;a h&agrave;ng tr??m ngh&igrave;n y???u t??? trong ch???p m???t</span></p>', 0, '16600000', '1f7e3cbd43.jpg');

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
