-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 07:36 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_an`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `level`) VALUES
(8, 'truong quang viet', 'truongvietbg@gmail.com', '01659334045', 'fcea920f7412b5da7be0cf42b8c93759', 1),
(9, 'lê lan anh', 'lananh@gmail.com', '12345678', 'fcea920f7412b5da7be0cf42b8c93759', 2),
(10, 'nguyen van an', 'nguyenvanan@gmail.com', '01659334045', 'fcea920f7412b5da7be0cf42b8c93759', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`, `slug`) VALUES
(11, 'Thời Trang Nữ', 'thoi-trang-nu'),
(12, 'Chân Váy', 'chan-vay'),
(13, 'Aó Khoác Nữ', 'ao-khoac-nu'),
(14, 'Aó Sơ Mi Nữ', 'ao-so-mi-nu');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`) VALUES
(7, 'truong quang viet', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'nguyen van a', 'nguyenvana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(2, 'Cách chọn áo sơ mi nữ đẹp giúp che khuyết điểm cơ thể hiệu quả', '../../../public/uploads/news/1530672179.tin1.jpg', '<p>C&ugrave;ng tham khảo một số c&aacute;ch chọn &aacute;o&nbsp;sơ mi&nbsp;vừa đẹp thời trang lại hợp d&aacute;ng người v&agrave; che được khuyết điểm cơ thể bạn nh&eacute;!</p>\r\n\r\n<p><strong>&Aacute;o&nbsp;</strong><strong>sơ mi&nbsp;</strong><strong>cho người b&eacute;o</strong></p>\r\n\r\n<p>Những c&ocirc; n&agrave;ng&nbsp;<a href=\"http://whiskeysales.com/need-and-significance-of-soccer-jerseys/\">c&oacute;</a>&nbsp;th&acirc;n h&igrave;nh mập mạp, mũm mĩm thường cảm thấy kh&ocirc;ng tự tin khi diện &aacute;o&nbsp;sơ mi. Bởi họ lo sợ những chiếc &aacute;o&nbsp;sơ mi&nbsp;sẽ l&agrave;m lộ khuyết điểm th&acirc;n h&igrave;nh tr&ograve;n lẳn, bụng to, bắp tay to của m&igrave;nh. Để khắc phục được những khuyết điểm nay, những người c&oacute; th&acirc;n h&igrave;nh mập mạp n&ecirc;n chọn &aacute;o&nbsp;sơ mi&nbsp;d&aacute;ng su&ocirc;ng, kh&ocirc;ng qu&aacute; &ocirc;m s&aacute;t để vừa thoải m&aacute;i lại vừa giấu d&aacute;ng nh&eacute;!</p>\r\n\r\n<p><img alt=\"\" src=\"/dulich/public/uploads/images/cach-chon-ao-so-mi-nu-dep-giup-che-khuyet-diem-co-the-hieu-qua.jpg\" style=\"height:583px; width:400px\" /></p>\r\n\r\n<p>&Aacute;o&nbsp;sơ mi&nbsp;su&ocirc;ng d&aacute;ng high &ndash; low vạt&nbsp;<a href=\"http://www.wholesalejerseys1.com/tag/hunter-cervenka-limited-jersey\">Hunter Cervenka limited jersey</a>&nbsp;sau d&agrave;i hơn vạt trước l&agrave; một style&nbsp;<a href=\"http://www.eclecticbrain.net/hughesinstruments/2012/03/31/the-craze-for-manchester-united-football-shirts/\">l&yacute;</a>&nbsp;tưởng d&agrave;nh cho những n&agrave;ng b&eacute;o. Kiểu &aacute;o su&ocirc;ng, tay lỡ n&agrave;y v&ugrave;a đẹp, trẻ trung, s&agrave;nh điệu lại tạo cảm gi&aacute;c nguwoif bạn thon gọn hơn rất nhiều.</p>\r\n\r\n<p>&Aacute;o&nbsp;sơ mi&nbsp;d&aacute;ng d&agrave;i su&ocirc;ng đơn giản nhưng lại cực k&igrave; ph&ugrave; hợp với những người b&eacute;o bụng. Với kiểu &aacute;o n&agrave;y, bạn ho&agrave;n to&agrave;n c&oacute; thể chọn những gam m&agrave;u s&aacute;ng m&agrave; kh&ocirc;ng phải lo ngại về th&acirc;n h&igrave;nh qu&aacute; khổ của m&igrave;nh.</p>\r\n\r\n<p>Một kiểu &aacute;o&nbsp;sơ mi&nbsp;kh&aacute;c cũng ph&ugrave; hợp với những người b&eacute;o c&oacute; bụng to l&agrave; &aacute;o&nbsp;sơ mipeplum. Phần bụng được chiết eo cao v&agrave; hơi x&ograve;e ở dưới sẽ gi&uacute;p bạn che đươc những ngẫn mỡ bụng đ&aacute;ng gh&eacute;t. Bạn c&oacute; thể thắt th&ecirc;m một chiếc thắt lưng bản nhỏ để tạo điểm nhấn gi&uacute;p chiếc eo của m&igrave;nh thon gọn hơn. Chất liệu ren nửa k&iacute;n đ&aacute;o, nửa sexy sẽ gi&uacute;p bạn khoe được v&ograve;ng một đầy đặn &ndash; ưu điểm của những n&agrave;ng mập m&agrave; v&atilde;n che được bắp tay to rất hiệu quả.</p>\r\n\r\n<p>Với những&nbsp;người y&ecirc;u&nbsp;th&iacute;ch phong c&aacute;ch đơn giản, h&atilde;y chọn chiếc &aacute;o&nbsp;sơ mi&nbsp;ổ tr&ograve;n d&aacute;ng su&ocirc;ng bo gấu tay v&agrave; gấu &aacute;o. Khi bo gấu như vậy, chiếc &aacute;o sẽ tạo ra độ phồng tự nhi&ecirc;n ở bụng v&agrave; tay gi&uacute;p bạn kh&ocirc;ng c&ograve;n ngại ng&ugrave;ng về th&acirc;n h&igrave;nh mũm mĩm c&uacute;ng như<a href=\"http://www.cheapnfljerseys4.com/\">http://www.cheapnfljerseys4.com</a>&nbsp;bắp tay to của m&igrave;nh nữa rồi.</p>\r\n\r\n<p><strong>Chọn &aacute;o&nbsp;</strong><strong>sơ mi&nbsp;</strong><strong>cho người gầy, thấp b&eacute;</strong></p>\r\n\r\n<p>Kh&ocirc;ng chỉ người b&eacute;o mới kh&oacute; chọn &aacute;o&nbsp;sơ mi, ngay cả những cổ n&agrave;ng c&oacute; v&oacute;c d&aacute;ng gầy g&ograve;, thấp b&eacute; cũng cảm thấy l&uacute;ng t&uacute;ng để l&agrave;m sao chọn được một chiếc &aacute;o so mi thật đẹp v&agrave; hợp d&aacute;ng của m&igrave;nh.</p>\r\n\r\n<p><em>Với những c&ocirc; n&agrave;ng c&oacute; v&oacute;c d&aacute;ng nhỏ b&eacute;, gầy g&ograve;, chọn &aacute;o</em><em>&nbsp;</em><em>sơ mi</em><em>&nbsp;</em><em>kẻ sọc to m&agrave;u s&aacute;ng vừa gi&uacute;p bạn tr&ocirc;ng cao hơn lại vừa tr&ocirc;ng c&oacute; da c&oacute; thịt hơn.</em></p>\r\n\r\n<p>Về m&agrave;u s&aacute;c, bạn n&ecirc;n chọn những m&agrave;u s&aacute;ng hoặc trung t&iacute;nh thay v&igrave; những m&agrave;u tối. Những chiếc &aacute;o&nbsp;sơ mi&nbsp;trắng hoặc s&aacute;ng m&agrave;u sẽ gi&uacute;p bạn ăn gian về c&acirc;n nặng hơn đấy!</p>\r\n\r\n<p><em>Lưu &yacute; với chỉ một chi tiết nhỏ l&agrave; cổ &aacute;o h&igrave;nh trụ, kho&eacute;t&nbsp;<a href=\"http://www.wholesalejerseys1.com/\">http://www.wholesalejerseys1.com</a>&nbsp;chữ V s&acirc;u cũng gi&uacute;p bạn tạo cảm gi&aacute;c th&acirc;n h&igrave;nh bạn c&acirc;n đối v&agrave; cao r&aacute;o hơn rất nhiều.</em></p>\r\n\r\n<p><em>Bạn cũng c&oacute; thể lựa chọn những chiếc &aacute;o</em><em>&nbsp;</em><em>sơ mi</em><em>&nbsp;</em><em>kẻ caro bản to v&agrave; m&agrave;u sắc tươi s&aacute;ng, trang nh&atilde; để tr&ocirc;ng mập mạp v&agrave; mũm mĩm hơn nh&eacute;!</em></p>\r\n', '2018-07-04 02:43:14', '2018-07-04 02:43:14'),
(3, 'Cách chọn áo phông nam mùa hè phù hợp dáng người', '../../../public/uploads/news/../../../public/uploads/news/../../../public/uploads/news/1530672548.cach-chon-ao-phong-nam-mua-he.jpg', '<p><strong>C&aacute;c bạn nam c&oacute; th&acirc;n h&igrave;nh c&acirc;n đối</strong></p>\r\n\r\n<p>C&aacute;c bạn nam c&oacute; th&acirc;n h&igrave;nh n&agrave;y th&igrave; việc lựa chọn &aacute;o ph&ocirc;ng kh&aacute; dễ d&agrave;ng. C&aacute;c bạn c&oacute; thể mặc c&aacute;c loại &aacute;o kh&aacute;c nhau như c&oacute; cổ, cổ tim, cổ Đức&hellip; C&aacute;c bạn chỉ cần chọn loại &aacute;o vừa vặn th&acirc;n h&igrave;nh l&agrave; được. Bạn cũng hạn chế c&aacute;c loại &aacute;o b&oacute; s&aacute;t hoặc loại &aacute;o rộng th&ugrave;ng th&igrave;nh nh&eacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"/dulich/public/uploads/images/hehe.PNG\" style=\"height:616px; width:831px\" /></p>\r\n\r\n<h3><strong>Bạn nam thấp, b&eacute;o</strong></h3>\r\n\r\n<p>C&aacute;c bạn nam thấp, b&eacute;o thường chọn c&aacute;c loại &aacute;o ph&ocirc;ng rộng để che đi chiếc bụng to của m&igrave;nh. Ngo&agrave;i ra, c&aacute;c bạn c&oacute; thể mặc c&aacute;c loại &aacute;o ph&ocirc;ng c&oacute; họa tiết sọc dọc để mang lại cảm gi&aacute;c cao hơn nhiều.</p>\r\n\r\n<p><img alt=\"\" src=\"/dulich/public/uploads/images/cach-chon-ao-phong-nam-mua-he-3.jpg\" style=\"height:640px; width:640px\" /></p>\r\n\r\n<h3><strong>Bạn nam cao, gầy</strong></h3>\r\n\r\n<p>C&aacute;c bạn nam cao v&agrave; gầy c&oacute; thể tham khảo&nbsp;<a href=\"http://seven.com.vn/thoi-trang-nam/nguyen-tac-phoi-do-cho-ban-nam-gay-tro-nen-banh-bao-hon.html\"><strong>nguy&ecirc;n tắc phối đồ cho bạn nam gầy&nbsp;</strong></a>để lựa chọn loại quần &aacute;o ph&ugrave; hợp nhất. Lời khuy&ecirc;n của seven.com.vn l&agrave; bạn n&ecirc;n mặc c&aacute;c loại &aacute;o m&agrave;u s&aacute;ng như m&agrave;u trắng, cam, v&agrave;ng, xanh&hellip; Bạn cũng n&ecirc;n chọn &aacute;o vừa vặn cơ thể để tr&aacute;nh &aacute;o b&oacute; s&aacute;t hoặc cơ thể bơi trong &aacute;o. Những chiếc &aacute;o sọc ngang cũng l&agrave; lựa chọn ho&agrave;n hảo cho c&aacute;c bạn nam gầy.</p>\r\n\r\n<p><img alt=\"\" src=\"/dulich/public/uploads/images/cach-chon-ao-phong-nam-mua-he.jpg\" style=\"height:868px; width:580px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2018-07-04 07:13:47', '2018-07-04 07:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(6, 7, 650000, 1, '01659334045', 'lục nam- bắc giang', 'd3d3d3d', '2018-06-29 14:36:31', '2018-06-29 14:36:31'),
(8, 7, 650000, 1, '01659334045', 'lục nam- bắc giang', '3e4e4e4e', '2018-06-30 04:35:58', '2018-06-30 04:35:58'),
(9, 7, 650000, 1, '01659334045', 'lục nam- bắc giang', 'wwww', '2018-07-03 16:06:27', '2018-07-03 16:06:27'),
(10, 7, 180000, 1, '123456789', 'lục nam- bắc giang', 'giao hang nhanh', '2018-07-10 10:04:21', '2018-07-10 10:04:21'),
(11, 8, 1270000, 1, '123456', 'ha noi', 'ok', '2018-07-10 10:04:23', '2018-07-10 10:04:23'),
(14, 8, 320000, 0, '123456', 'ha noi', 'fef', '2018-07-13 08:11:36', '0000-00-00 00:00:00'),
(21, 9, 640000, 0, '123456', 'ha noi', '', '2018-07-13 19:37:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `oder_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `pro_id`, `oder_id`, `qty`, `price`, `color`, `created_at`, `updated_at`) VALUES
(8, 61, 6, 1, 650000, '', '2018-07-02 17:00:00', '0000-00-00 00:00:00'),
(10, 61, 8, 1, 650000, '', '2018-07-02 17:00:00', '0000-00-00 00:00:00'),
(11, 61, 9, 1, 650000, '', '2018-07-03 07:32:21', '0000-00-00 00:00:00'),
(12, 62, 10, 1, 180000, '', '2018-07-03 16:06:12', '0000-00-00 00:00:00'),
(13, 62, 11, 1, 180000, '', '2018-07-10 10:02:49', '0000-00-00 00:00:00'),
(14, 64, 11, 2, 320000, '', '2018-07-10 10:02:49', '0000-00-00 00:00:00'),
(15, 65, 11, 1, 450000, '', '2018-07-10 10:02:49', '0000-00-00 00:00:00'),
(21, 64, 14, 1, 320000, '', '2018-07-13 08:11:36', '0000-00-00 00:00:00'),
(31, 64, 21, 2, 320000, ' hồng', '2018-07-13 19:37:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `pro_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `hot` tinyint(4) DEFAULT '1',
  `active` tinyint(4) DEFAULT '1',
  `description` longtext COLLATE utf8_unicode_ci,
  `size` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `pro_name`, `slug`, `qty`, `image`, `price`, `hot`, `active`, `description`, `size`, `color`, `pay`) VALUES
(61, 13, 'ÁO KHOÁC BLAZER NỮ MẪU MỚI', 'ao-khoac-blazer-nu-mau-moi', 10, '1530125868.aokhoacblazer.jpg', 650000, 1, 1, '<p>C&aacute;c xu hướng thời trang năm nay kh&ocirc;ng ghi dấu những thiết kế n&agrave;o thực sự qu&aacute; đột ph&aacute; v&agrave; lạ mắt, nhưng tất cả đều mang chung &acirc;m hưởng cổ điển của những năm 70 &ndash; thanh lịch v&agrave; rất thời thượng. Những thiết kế nổi bật của m&ugrave;a đ&ocirc;ng năm nay đều mang n&eacute;t thoải m&aacute;i, thư gi&atilde;n v&agrave; mang chất sang chảnh của những chất liệu thời trang cao cấp.</p>\r\n', 'M, L ,XL', 'Đỏ, Vàng', 5),
(62, 14, 'SƠ MI NỮ TAY BÚP SEN', 'so-mi-nu-tay-bup-sen', 40, '1530146223.product-370-variation-120x120 (1).jpg', 180000, 1, 1, '<p>Đ&acirc;y l&agrave; kiểu &aacute;o sơ mi m&agrave; hầu hết bạn nữ n&agrave;o cũng c&oacute; trong tủ đồ với chất liệu ch&iacute;nh l&agrave; cotton thấm h&uacute;t mồ h&ocirc;i. Kiểu &aacute;o sơ mi d&aacute;ng cơ bản khi mặc sẽ &ocirc;m vừa vặn với d&aacute;ng người, gi&uacute;p khơi gợi những điểm nổi bật tr&ecirc;n cơ thể. Nhưng nếu bạn nữ kh&ocirc;ng c&oacute; được th&acirc;n h&igrave;nh như &yacute; th&igrave; kiểu &aacute;o sơ mi n&agrave;y lại ch&iacute;nh l&agrave; thủ phạm tố c&aacute;o khuyết điểm cơ thể của bạn. &Aacute;o c&oacute; d&aacute;ng cổ bẻ cơ bản, với ba loại cổ tay cho d&aacute;ng &aacute;o n&agrave;y l&agrave; tay d&agrave;i, tay lửng v&agrave; ngắn tay, c&oacute; học kh&ocirc;ng c&oacute; phần c&uacute;c ngay gấu tay &aacute;o.</p>\r\n', 'M, L ,XL', 'xanh, hồng', 3),
(64, 14, 'ÁO SƠ MI CỘT NƠ TAY NGẮN THỜI TRANG', 'ao-so-mi-cot-no-tay-ngan-thoi-trang', 20, '1530439392.product-372-2.jpg', 320000, 1, 1, '<p>Đ&acirc;y l&agrave; kiểu &aacute;o sơ mi m&agrave; hầu hết bạn nữ n&agrave;o cũng c&oacute; trong tủ đồ với chất liệu ch&iacute;nh l&agrave; cotton thấm h&uacute;t mồ h&ocirc;i. Kiểu &aacute;o sơ mi d&aacute;ng cơ bản khi mặc sẽ &ocirc;m vừa vặn với d&aacute;ng người, gi&uacute;p khơi gợi những điểm nổi bật tr&ecirc;n cơ thể. Nhưng nếu bạn nữ kh&ocirc;ng c&oacute; được th&acirc;n h&igrave;nh như &yacute; th&igrave; kiểu &aacute;o sơ mi n&agrave;y lại ch&iacute;nh l&agrave; thủ phạm tố c&aacute;o khuyết điểm cơ thể của bạn. &Aacute;o c&oacute; d&aacute;ng cổ bẻ cơ bản, với ba loại cổ tay cho d&aacute;ng &aacute;o n&agrave;y l&agrave; tay d&agrave;i, tay lửng v&agrave; ngắn tay, c&oacute; học kh&ocirc;ng c&oacute; phần c&uacute;c ngay gấu tay &aacute;o.</p>\r\n', 'M, L ,XL', 'Tím, hồng', 1),
(65, 12, 'CHÂN VÁY XÒE VINTAGE PHỐI NÚT', 'chan-vay-xoe-vintage-phoi-nut', 99, '1530807211.product-423-variation-2-480x480.jpg', 450000, 1, 1, '<p>Đối với những t&iacute;n đồ thời trang, việc kết hợp gi&agrave;y v&agrave; trang phục sao cho hợp cạ l&agrave; một điều v&ocirc; c&ugrave;ng quan trọng. Tuy nhi&ecirc;n, việc sở hữu h&agrave;ng loạt kiểu gi&agrave;y kh&aacute;c nhau v&agrave; h&agrave;ng t&aacute; bộ v&aacute;y thuộc đủ loại phong c&aacute;ch đ&ocirc;i l&uacute;c sẽ khiến bạn bối rối trong việc mix-match. Để tr&aacute;nh việc phải đứng trước gương h&agrave;ng chục ph&uacute;t băn khoăn xem n&ecirc;n đi đ&ocirc;i gi&agrave;y n&agrave;o với kiểu v&aacute;y n&agrave;o, bạn c&oacute; thể tham khảo những combo dưới đ&acirc;y để vận dụng cho m&igrave;nh.</p>\r\n', 'M, L ,XL', 'Đen,Đỏ', 1),
(66, 12, 'VÁY BÚT CHÌ NỮ THUẦN MÀU', 'vay-but-chi-nu-thuan-mau', 20, '1530807398.product-422-variation-120x120.png', 800000, 0, 1, '<p>Đối với những t&iacute;n đồ thời trang, việc kết hợp gi&agrave;y v&agrave; trang phục sao cho hợp cạ l&agrave; một điều v&ocirc; c&ugrave;ng quan trọng. Tuy nhi&ecirc;n, việc sở hữu h&agrave;ng loạt kiểu gi&agrave;y kh&aacute;c nhau v&agrave; h&agrave;ng t&aacute; bộ v&aacute;y thuộc đủ loại phong c&aacute;ch đ&ocirc;i l&uacute;c sẽ khiến bạn bối rối trong việc mix-match. Để tr&aacute;nh việc phải đứng trước gương h&agrave;ng chục ph&uacute;t băn khoăn xem n&ecirc;n đi đ&ocirc;i gi&agrave;y n&agrave;o với kiểu v&aacute;y n&agrave;o, bạn c&oacute; thể tham khảo những combo dưới đ&acirc;y để vận dụng cho m&igrave;nh.</p>\r\n', 'M, L ,XL', 'xanh, đỏ', 0),
(67, 12, 'CHÂN VÁY LEN XÒE', 'chan-vay-len-xoe', 10, '1530813713.product-424-variation-2-480x480 (1).jpg', 680000, 1, 1, '<p>Đối với những t&iacute;n đồ thời trang, việc kết hợp gi&agrave;y v&agrave; trang phục sao cho hợp cạ l&agrave; một điều v&ocirc; c&ugrave;ng quan trọng. Tuy nhi&ecirc;n, việc sở hữu h&agrave;ng loạt kiểu gi&agrave;y kh&aacute;c nhau v&agrave; h&agrave;ng t&aacute; bộ v&aacute;y thuộc đủ loại phong c&aacute;ch đ&ocirc;i l&uacute;c sẽ khiến bạn bối rối trong việc mix-match. Để tr&aacute;nh việc phải đứng trước gương h&agrave;ng chục ph&uacute;t băn khoăn xem n&ecirc;n đi đ&ocirc;i gi&agrave;y n&agrave;o với kiểu v&aacute;y n&agrave;o, bạn c&oacute; thể tham khảo những combo dưới đ&acirc;y để vận dụng cho m&igrave;nh.</p>\r\n', 'M, L ,XL', 'xanh, nâu', 0),
(68, 13, 'ÁO KHOÁC KAKI XẾP LY THỜI TRANG', 'ao-khoac-kaki-xep-ly-thoi-trang', 22, '1530813867.product-406-variation-120x120.jpg', 650000, 1, 1, '<p>C&aacute;c xu hướng thời trang năm nay kh&ocirc;ng ghi dấu những thiết kế n&agrave;o thực sự qu&aacute; đột ph&aacute; v&agrave; lạ mắt, nhưng tất cả đều mang chung &acirc;m hưởng cổ điển của những năm 70 &ndash; thanh lịch v&agrave; rất thời thượng. Những thiết kế nổi bật của m&ugrave;a đ&ocirc;ng năm nay đều mang n&eacute;t thoải m&aacute;i, thư gi&atilde;n v&agrave; mang chất sang chảnh của những chất liệu thời trang cao cấp.</p>\r\n', 'M, L ,XL', 'tím, cam', 0),
(69, 13, 'ÁO KHOÁC MÙA ĐÔNG', 'ao-khoac-mua-dong', 12, '1530814081.product-416-variation-2-480x480.jpg', 90000, 1, 1, '<p>C&aacute;c xu hướng thời trang năm nay kh&ocirc;ng ghi dấu những thiết kế n&agrave;o thực sự qu&aacute; đột ph&aacute; v&agrave; lạ mắt, nhưng tất cả đều mang chung &acirc;m hưởng cổ điển của những năm 70 &ndash; thanh lịch v&agrave; rất thời thượng. Những thiết kế nổi bật của m&ugrave;a đ&ocirc;ng năm nay đều mang n&eacute;t thoải m&aacute;i, thư gi&atilde;n v&agrave; mang chất sang chảnh của những chất liệu thời trang cao cấp.</p>\r\n', 'M, L ,XL', 'tím, vàng', 0),
(70, 14, 'SƠ MI VOAN NỮ CÁCH ĐIỆU', 'so-mi-voan-nu-cach-dieu', 100, '1530814221.product-371-variation-2-480x480.jpg', 220000, 1, 1, '<p>Đ&acirc;y l&agrave; kiểu &aacute;o sơ mi m&agrave; hầu hết bạn nữ n&agrave;o cũng c&oacute; trong tủ đồ với chất liệu ch&iacute;nh l&agrave; cotton thấm h&uacute;t mồ h&ocirc;i. Kiểu &aacute;o sơ mi d&aacute;ng cơ bản khi mặc sẽ &ocirc;m vừa vặn với d&aacute;ng người, gi&uacute;p khơi gợi những điểm nổi bật tr&ecirc;n cơ thể. Nhưng nếu bạn nữ kh&ocirc;ng c&oacute; được th&acirc;n h&igrave;nh như &yacute; th&igrave; kiểu &aacute;o sơ mi n&agrave;y lại ch&iacute;nh l&agrave; thủ phạm tố c&aacute;o khuyết điểm cơ thể của bạn. &Aacute;o c&oacute; d&aacute;ng cổ bẻ cơ bản, với ba loại cổ tay cho d&aacute;ng &aacute;o n&agrave;y l&agrave; tay d&agrave;i, tay lửng v&agrave; ngắn tay, c&oacute; học kh&ocirc;ng c&oacute; phần c&uacute;c ngay gấu tay &aacute;o.</p>\r\n', 'M, L ,XL', 'trắng, đen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pro_img`
--

CREATE TABLE `pro_img` (
  `id` int(11) NOT NULL,
  `links` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pro_img`
--

INSERT INTO `pro_img` (`id`, `links`, `pro_id`) VALUES
(135, '20180627205748112759626.jpg', 61),
(136, '201806272057481192109691.jpg', 61),
(137, '20180628023703552787921.jpg', 62),
(138, '2018062802370396631192.jpg', 62),
(141, '201807011203131046189766.jpg', 64),
(142, '20180701120313522634289.jpg', 64),
(143, '201807051813311141369735.jpg', 65),
(144, '20180705181332493659108.jpg', 65),
(145, '201807051816382144634459.jpg', 66),
(146, '20180705181638156723750.jpg', 66),
(147, '20180705200153321831297.jpg', 67),
(148, '201807052001531164510066.jpg', 67),
(149, '201807052004271488524326.jpg', 68),
(150, '20180705200801158059047.jpg', 69),
(151, '20180705201021334474204.jpg', 70);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`) VALUES
(13, 'slide 22', '../../../public/uploads/slides/1530603414.slide-1140x350.jpg'),
(14, 'slide 2', '1530603427._slide-3.jpg'),
(15, 'slide 3', '1530603463.slide-2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `oder_id` (`oder_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `pro_img`
--
ALTER TABLE `pro_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pro_img`
--
ALTER TABLE `pro_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`oder_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`ID`);

--
-- Constraints for table `pro_img`
--
ALTER TABLE `pro_img`
  ADD CONSTRAINT `pro_img_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
