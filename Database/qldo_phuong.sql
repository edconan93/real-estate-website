-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2011 at 08:24 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qldo`
--

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

DROP TABLE IF EXISTS `dichvu`;
CREATE TABLE IF NOT EXISTS `dichvu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` text COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `chusohuu` int(11) DEFAULT NULL,
  `phuong` int(11) DEFAULT NULL,
  `quan` int(11) DEFAULT NULL,
  `tinh` int(11) DEFAULT NULL,
  `ngaydang` datetime DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `duong` text COLLATE utf8_unicode_ci,
  `rong` float DEFAULT NULL,
  `dai` float DEFAULT NULL,
  `tang` int(11) DEFAULT NULL,
  `sophongngu` int(11) DEFAULT NULL,
  `sophongtam` int(11) DEFAULT NULL,
  `giaban` float DEFAULT NULL,
  `donvitien` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `thoihantin` int(11) DEFAULT NULL,
  `loainha` int(11) DEFAULT NULL,
  `phaply` int(11) DEFAULT NULL,
  `huongnha` int(11) DEFAULT NULL,
  `khuyenmai` text COLLATE utf8_unicode_ci,
  `loaidv` int(11) DEFAULT NULL,
  `donvidv` int(11) DEFAULT NULL,
  `x` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `y` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khanang` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `sonha` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_thongtinnhadat_phuong` (`phuong`),
  KEY `fk_thongtinhnhadat_khachhang` (`chusohuu`),
  KEY `fk_thongtinnhaban_loainha` (`loainha`),
  KEY `fk_thongtinhnhaban_phaply` (`phaply`),
  KEY `FK_thongtinnhaban_huongnha` (`huongnha`),
  KEY `fk_thongtinnhaban_quan` (`quan`),
  KEY `fk_thongtinnhaban_tinh` (`tinh`),
  KEY `fk_dichvu_user` (`chusohuu`),
  KEY `fk_dichvu_loaidv` (`loaidv`),
  KEY `fk_dichvu` (`donvitien`),
  KEY `fk_dichvu_huong` (`huongnha`),
  KEY `fk_dichvu_loaicanho` (`loainha`),
  KEY `fk_dichvu_tinh` (`tinh`),
  KEY `fk_dichvu_quan` (`quan`),
  KEY `fk_dichvu_phuong` (`phuong`),
  KEY `fk_dichvu_phaply` (`phaply`),
  KEY `fk_dichvu_donvidv` (`donvidv`),
  KEY `fk_dichvu_khanang` (`khanang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`id`, `tieude`, `mota`, `chusohuu`, `phuong`, `quan`, `tinh`, `ngaydang`, `ngaycapnhat`, `duong`, `rong`, `dai`, `tang`, `sophongngu`, `sophongtam`, `giaban`, `donvitien`, `status`, `thoihantin`, `loainha`, `phaply`, `huongnha`, `khuyenmai`, `loaidv`, `donvidv`, `x`, `y`, `khanang`, `rank`, `sonha`) VALUES
(2, 'Bán căn hộ the everich Q11 gia rẻ vào ở ngay', 'qua ngon', 2, 4, 4, 2, '2010-02-03 00:00:00', NULL, 'truong chinh', 10, 25, 17, 3, 4, 32085000, 1, 2, 10, 2, 1, 1, 'Tặng nội thất vào ở ngay', 1, 2, NULL, NULL, NULL, NULL, '100/100'),
(3, 'Cần bán căn hộ Era Town Block B1 tầng 16, 67m2 giá 1,035 tỷ', NULL, 2, 4, 3, 2, '2010-02-04 00:00:00', NULL, 'lac long quan', 7, 9, 10, 3, 2, 123214, 1, 0, 12, 2, 1, 2, NULL, 1, 1, NULL, NULL, NULL, NULL, '100/100'),
(4, 'Bán căn hộ Khánh Hội 3', '<p>abc</p>', 2, 14, 9, 1, '2011-07-09 01:27:33', '0000-00-00 00:00:00', 'Nguyễn Trãi', 15, 5, 5, 5, 5, 100000000, 2, -1, 15, 1, 8, 8, 'Tặng nội thất vào ở ngay', 1, 1, '0', '0', 1, 0, '5'),
(7, 'Cần mua gấp 1 căn nhà', '<p>Mua gấp</p>', 2, 23, 25, 1, '2011-07-09 01:37:44', '0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 100000000000, 2, 1, 15, 1, 1, 1, '', 2, 1, '0', '0', 1, 0, ''),
(8, 'Cần bán nhà gấp 1 căn nhà ', '<p>Cần b&aacute;n nh&agrave; gấp 1 căn nh&agrave; </p>', 4, 15, 9, 1, '2011-07-10 09:48:02', '0000-00-00 00:00:00', 'Nguyễn Trãi', 15, 5, 0, 0, 0, 100000000000, 2, 0, 15, 1, 8, 5, 'không có', 1, 1, '0', '0', 1, 0, '32'),
(9, 'Cần cho  thuê nhà gấp', '<p>Cần cho&nbsp; thu&ecirc; nh&agrave; gấp</p>', 4, 17, 9, 1, '2011-07-10 10:40:36', '0000-00-00 00:00:00', 'Lê Văn Việt', 15, 5, 0, 0, 0, 100000000000, 2, 1, 15, 1, 1, 1, 'không có', 3, 1, '0', '0', 1, 0, '179/9'),
(10, 'Bán biệt thự The Garland, Q9. Giá bán 9,8tỷ', '<p>Cần b&aacute;n biệt thự The Garland do tập đo&agrave;n VinaCapital l&agrave;m chủ đầu tư.<br />\r\n<br />\r\nBiệt thự nằm trong khu quy hoạch đồng bộ, d&acirc;n tr&iacute; cao với vị tr&iacute; chiến lược giao thong thuận lợi:</p>\r\n<p>- C&aacute;ch trung t&acirc;m Quận 1 khoảng 7km.<br />\r\n-&nbsp; Kế cận trung t&acirc;m đ&ocirc; thị mới Thủ Thi&ecirc;m, Q.2.<br />\r\n- Nằm gần ng&atilde; tư đường Xa Lộ V&agrave;nh Đai Trong (lộ giới 67m) v&agrave; đường Li&ecirc;n Phường (lộ giới 30m).<br />\r\n- Gần đường cao tốc Vũng T&agrave;u &ndash; Long Th&agrave;nh (lộ giới 120m).<br />\r\n- Gần Khu C&ocirc;ng Nghệ Cao, Trường Đại Học Kinh Tế, v&agrave; c&aacute;c dự &aacute;n tương lai như khu TDTT Rạch Chiếc, s&acirc;n golf&hellip;<br />\r\nDiện t&iacute;ch khu&ocirc;n vi&ecirc;n rộng 293m2, diện t&iacute;ch x&acirc;y dựng 310m2, &nbsp;1 trệt + 2  lầu, với 3 mặt tiền đường, view nh&igrave;n s&ocirc;ng tho&aacute;ng m&aacute;t, trong l&agrave;nh. Kh&ocirc;ng  gian sống b&ecirc;n trong được thiết kế một c&aacute;ch khoa học, hợp l&yacute; tạo n&ecirc;n sự  linh họat, tiện &iacute;ch. Mặt trước của biệt thự được thiết h&igrave;nh khối ấn  tượng bằng c&aacute;c chất liệu hiện đại tạo vẻ sang trọng cho ng&ocirc;i nh&agrave; giữa  một kh&ocirc;ng gian thi&ecirc;n nhi&ecirc;n h&agrave;i h&ograve;a. Mặt sau của ng&ocirc;i nh&agrave; với lớp k&iacute;nh  phủ đầy v&agrave; cao mang &aacute;nh s&aacute;ng thi&ecirc;n nhi&ecirc;n tr&agrave;n ngập căn nh&agrave; .<br />\r\nHạ tầng kỹ thuật ho&agrave;n chỉnh v&agrave; hiện đại:<br />\r\n- Hệ thống giao th&ocirc;ng nội bộ trải b&ecirc; t&ocirc;ng nhựa.<br />\r\n- Hệ thống cấp điện, c&aacute;p viễn th&ocirc;ng, ADSL, truyền h&igrave;nh c&aacute;p.<br />\r\n- Hệ thống nước sinh hoạt: nước m&aacute;y th&agrave;nh phố.<br />\r\n- Hệ thống chiếu s&aacute;ng c&ocirc;ng cộng, c&ocirc;ng vi&ecirc;n c&acirc;y xanh.<br />\r\n- Hệ thống xử l&yacute; nước thải.<br />\r\nGi&aacute; b&aacute;n 9,8tỷ đ&atilde; bao gồm VAT v&agrave; tặng to&agrave;n bộ nội thất cao cấp, sang trọng, đầy đủ đến mức chỉ cần đem vali v&agrave;o l&agrave; ở ngay.<br />\r\nB&agrave;n giao to&agrave;n bộ biệt thự v&agrave;o Qu&yacute; 2/2011. Li&ecirc;n hệ Duy Tr&acirc;m 0904.516.045 để đi xem vị tr&iacute;.</p>', 2, 17, 9, 1, '2011-07-10 00:00:00', '0000-00-00 00:00:00', 'Nguyễn Xiền', 20, 10, 2, 5, 5, 9800000000, 2, 1, 15, 1, 8, 5, 'Khuyến mãi :Tặng toàn bộ nội thất cao cấp và sang trọng', 1, 1, '0', '0', 1, 1, '32'),
(11, 'Phố liên kế MT Bến Mễ Cốc, P.1, Q.8 ', '<p>B&aacute;n 2 căn nh&agrave; liền nhau (c&oacute; thể b&aacute;n từng căn một) thuộc khu nh&agrave; phố li&ecirc;n  kế MT Bến Mễ Cốc, P.15, Q.8. Đối diện ĐL Đ&ocirc;ng T&acirc;y. Cạnh dự &aacute;n KDC Rạch  L&agrave;o. DT mỗi căn 95m2 (5x19m). 1 trệt, 2 lầu. Nh&agrave; mới x&acirc;y năm 2011, giao  th&ocirc;. Đường nội bộ 6m. Tiện mở văn ph&ograve;ng, kinh doanh ... Gi&aacute; 2,8 tỷ/căn.  T&igrave;nh trạng hợp đồng, đ&atilde; thanh to&aacute;n 70%. Bao thủ tục sang t&ecirc;n giấy tờ.  LH:0989.353.828 A.Học</p>', 2, 27, 8, 1, '2011-07-10 00:00:00', '0000-00-00 00:00:00', 'Phạm Thế Hiển', 15, 10, 3, 0, 0, 2800000, 2, 1, 15, 2, 7, 5, '', 1, 1, '0', '0', 1, 1, '21'),
(12, 'Căn hộ Sông Đà Riverside', '<table class="propertydetailstable">\r\n    <tbody>\r\n        <tr class="alt">\r\n        </tr>\r\n        <tr class="alt">\r\n            <td colspan="4">\r\n            <div style="margin: 0in 0in 0pt; background: white"><span style="font-size: small;"><br />\r\n            </span></div>\r\n            <span style="font-size: small;">\r\n            <div style="margin: 0in 0in 0pt; background: none repeat scroll 0% 0% white;"><b><span style="color: rgb(1, 53, 103);">Căn hộ S&ocirc;ng Đ&agrave; Riverside, gi&aacute; gốc chủ đầu tư từ 13,9 triệu đồng/m2 &ndash; LH 0906 766 088</span></b></div>\r\n            </span>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);">  c&oacute; vị tr&iacute; nằm tr&ecirc;n mặt tiền Quốc lộ 13 c&oacute; lộ giới 60m, c&aacute;ch trung t&acirc;m  quận 1, Tp.HCM khoảng 8km, gần chợ đầu mối Tam B&igrave;nh, trung t&acirc;m h&agrave;nh  ch&iacute;nh quận Thủ Đức, gần s&acirc;n golf 200ha v&agrave; bệnh viện quốc tế Việt Nam &ndash;  Singapore</span></span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">Dự &aacute;n </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);"> do CTCP Đầu tư ph&aacute;t triển S&ocirc;ng Đ&agrave; (SIC) l&agrave;m chủ đầu tư </span><span style="color: rgb(52, 52, 52);">v&agrave; đơn vị li&ecirc;n kết đầu tư l&agrave; C&ocirc;ng ty Cổ phần Quốc tế An Vui . </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);"> c&oacute; quy m&ocirc; 5 block chung cư cao 25 tầng nằm tr&ecirc;n khối đế thương mại dịch vụ; 2 tầng hầm (1 hầm ch&igrave;m + 1 hầm nổi).</span></span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">Diện t&iacute;ch khu đất  x&acirc;y dựng dự &aacute;n 28.168m2, mật độ x&acirc;y dựng kh&aacute; thấp 23,55%. Tổng diện t&iacute;ch  s&agrave;n 169.156m2, trong đ&oacute; s&agrave;n thương mại 7.926m2, s&agrave;n </span></span><span style="color: rgb(52,52,52); font-size: 16pt"><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a><span style="font-size: small;">103.068m2. Tổng số </span><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a></span><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">của dự &aacute;n </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);"> 1.160 căn (c&oacute; 24 căn penthouse nằm tầng 25).</span></span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">Căn hộ </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);">  c&oacute; gi&aacute; thấp nhất từ 13,9 triệu đồng/m2 (chưa c&oacute; VAT), mức gi&aacute; cao nhất  l&agrave; 15,2 triệu đồng/m2 (chưa c&oacute; VAT). T&ugrave;y theo vị tr&iacute;&nbsp;mỗi loại </span></span><span style="color: rgb(52,52,52); font-size: 16pt"><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a></span><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">c&oacute; gi&aacute; kh&aacute;c nhau.</span></span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Phương thức thanh to&aacute;n linh hoạt:</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 1: trong v&ograve;ng 07 ng&agrave;y kể từ ng&agrave;y giữ chỗ (bao gồm tiền giữ chỗ)&nbsp;15% . K&yacute; HĐ g&oacute;p vốn.</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 2: Xong phần hầm ch&igrave;m (th&aacute;ng 06/2011) , 10% , K&yacute; HĐ</span><span style="font-size: 16pt"><a href="http://thegioicanho.com/tim-mua/"><span style="font-size: small;"> mua </span></a></span><span style="font-size: small;">b&aacute;n</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 3: Xong th&ocirc; tầng 5 (th&aacute;ng 09/2011), 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 4: Xong th&ocirc; tầng 10 (th&aacute;ng 12/2011), 10% </span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 5: Xong th&ocirc; tầng 15 (th&aacute;ng 03/2012), TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 6: Xong th&ocirc; tầng 20 (th&aacute;ng 06/2012), TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 7: Xong th&ocirc; tầng 25 (th&aacute;ng 10/2012), TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 8: Ho&agrave;n thiện xong từ tầng 12 đến tầng 25 (th&aacute;ng 06/2013); TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 9: Nhận b&agrave;n giao </span><span style="font-size: 16pt"><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a></span><span style="font-size: small;">(Qu&yacute; IV/2013); TT 10%+ 2% (ph&iacute; bảo tr&igrave;).</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 10: Nhận chủ quyền ; TT 5% ( sổ hồng)</span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;">&nbsp;</span></div>\r\n            <div style="text-align: justify; margin: 5pt 0in"><span style="font-size: small;"><i>Tìm hiểu th&ecirc;m th&ocirc;ng tin v&agrave; đặt</i></span><i><span style="font-size: 16pt"><a href="http://thegioicanho.com/tim-mua/"><span style="font-size: small;"> mua </span></a></span></i></div>\r\n            <span style="font-size: small;">\r\n            <div style="text-align: justify; margin: 5pt 0in;"><i>căn h&ocirc;̣ <b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b>, vui l&ograve;ng li&ecirc;n hệ:</i></div>\r\n            </span><span style="font-size: smaller;">\r\n            <div style="text-align: justify; margin: 5pt 0in;">&nbsp;</div>\r\n            </span><span style="font-size: small;">                 </span>\r\n            <div style="text-align: justify; margin: 5pt 0in"><span style="font-size: small;"><b>Trần Thanh Nam</b> (bộ phận Kinh doanh dự &aacute;n)</span></div>\r\n            <div style="text-align: justify; margin: 5pt 0in"><span style="font-size: small;">Mobile:<b> 0906 766 088</b></span></div>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 2, 84, 2, 1, '2011-07-11 00:00:00', '0000-00-00 00:00:00', 'Bình Phú', 7, 10, 8, 2, 0, 13900000, 2, 2, 15, 2, 1, 9, '', 1, 1, '0', '0', 1, 1, '32'),
(13, 'Căn hộ Petroland mark Q2 giá gốc CĐT', '<p>Cần b&aacute;n <a href="http://thegioicanho.com/san-giao-dich/">căn hộ </a>cao cấp Petrovietnam landmark gi&aacute; gốc&nbsp; CĐT.</p>\r\n<p>Diện t&iacute;ch : 94-101-150 m2&nbsp; .Từ 2-3pn với gi&aacute; cả v&agrave; phương thức thanh to&aacute;n linh hoạt.</p>\r\n<p>Tiến độ : Đ&atilde; xong phần th&ocirc;</p>\r\n<p>Gi&aacute; : 20,3_23tr/m2&nbsp;</p>\r\n<p>Toạ lạc tr&ecirc;n trục đường đại lộ đ&ocirc;ng t&acirc;y trung t&acirc;m quận 2. Đ&acirc;y l&agrave; trục  giao th&ocirc;ng ch&iacute;nh v&agrave;o khu đ&ocirc; thị mới thủ thi&ecirc;m.Với nhiều tiện &iacute;ch l&acirc;n cận  huy tựu cộng đồng d&acirc;n cư m&ocirc;i trường sống hiện đại.</p>\r\n<p>LH : Hồng Phấn 0909.146.055 để được lựa chọn v&agrave; sở hữu <a href="http://thegioicanho.com/san-giao-dich/">căn hộ </a>với vị tr&iacute; đẹp &amp; gi&aacute; cả tốt nhất.</p>', 2, 84, 2, 1, '2011-07-11 00:00:00', '0000-00-00 00:00:00', 'Đỗ Xuân Hợp', 10, 10, 15, 2, 2, 2300000, 2, 1, 15, 2, 8, 1, '', 1, 1, '0', '0', 1, 1, '43');

-- --------------------------------------------------------

--
-- Table structure for table `dichvuvip`
--

DROP TABLE IF EXISTS `dichvuvip`;
CREATE TABLE IF NOT EXISTS `dichvuvip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddichvu` int(11) DEFAULT NULL,
  `noidung` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayguitin` date DEFAULT NULL,
  `ngaynangcap` date DEFAULT NULL,
  `thoihan` int(11) DEFAULT NULL COMMENT 'ngaydang: thoi diem tin vip duoc kich hoat\nthoihan: so ngay ton tai',
  `status` int(11) DEFAULT NULL COMMENT '0: disable\n1: avalable\n2: removed',
  PRIMARY KEY (`id`),
  KEY `fk_vip_dichvu` (`iddichvu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dichvuvip`
--

INSERT INTO `dichvuvip` (`id`, `iddichvu`, `noidung`, `ngayguitin`, `ngaynangcap`, `thoihan`, `status`) VALUES
(1, 7, 'Cần mua nhà gấp', '2011-07-09', '0000-00-00', 2, 0),
(2, 7, 'Cần mua nhà gấp', '2011-07-09', '0000-00-00', 1, 0),
(3, 7, 'Thanh toán trực tiếp tại văn phòng', '2011-07-09', '0000-00-00', 90, 0),
(4, 7, 'Thanh toán trực tiếp tại văn phòng', '2011-07-09', '2011-07-09', 270, 0),
(5, 7, 'Thanh toán trực tiếp tại văn phòng', '2011-07-10', '2011-07-10', 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dichvu_tienich`
--

DROP TABLE IF EXISTS `dichvu_tienich`;
CREATE TABLE IF NOT EXISTS `dichvu_tienich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcanho` int(11) DEFAULT NULL,
  `idtienich` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_canhotienich_canho` (`idcanho`),
  KEY `fk_canhotienich_tienich` (`idtienich`),
  KEY `fk_vdtienich_tienich` (`idtienich`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `dichvu_tienich`
--

INSERT INTO `dichvu_tienich` (`id`, `idcanho`, `idtienich`) VALUES
(15, 4, 7),
(16, 4, 8),
(17, 7, 2),
(18, 7, 5),
(19, 7, 8),
(20, 8, 2),
(21, 8, 5),
(22, 8, 8),
(23, 9, 2),
(24, 9, 5),
(25, 9, 8),
(26, 10, 2),
(27, 10, 3),
(28, 10, 4),
(29, 10, 5),
(30, 10, 6),
(31, 10, 8),
(32, 11, 2),
(33, 11, 3),
(34, 11, 5),
(35, 11, 6),
(36, 11, 8),
(43, 13, 1),
(44, 13, 2),
(45, 13, 5),
(46, 13, 7),
(47, 13, 8),
(48, 12, 1),
(49, 12, 2),
(50, 12, 4),
(51, 12, 5),
(52, 12, 7),
(53, 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `donvidichvu`
--

DROP TABLE IF EXISTS `donvidichvu`;
CREATE TABLE IF NOT EXISTS `donvidichvu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `donvidichvu`
--

INSERT INTO `donvidichvu` (`id`, `ten`) VALUES
(1, 'm²'),
(2, 'Tổng diện tích'),
(3, 'Tháng');

-- --------------------------------------------------------

--
-- Table structure for table `donvitien`
--

DROP TABLE IF EXISTS `donvitien`;
CREATE TABLE IF NOT EXISTS `donvitien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tigia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `donvitien`
--

INSERT INTO `donvitien` (`id`, `ten`, `tigia`) VALUES
(1, 'USD', 22000),
(2, 'VND', 1),
(3, 'SJC', 38000000);

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu`
--

DROP TABLE IF EXISTS `gioithieu`;
CREATE TABLE IF NOT EXISTS `gioithieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung1` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gioithieu`
--


-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE IF NOT EXISTS `hinhanh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text COLLATE utf8_unicode_ci,
  `iddichvu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hinhanh_thongtinnhadat` (`iddichvu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `path`, `iddichvu`) VALUES
(6, 'images/upload/2/Picture_House/3344432.jpg', 4),
(7, 'images/upload/2/Picture_House/9715583.png', 4),
(8, 'images/upload/2/Picture_House/3390201.png', 4),
(9, 'images/upload/4/Picture_House/6367193.png', 8),
(10, 'images/upload/4/Picture_House/7790841.png', 8),
(11, 'images/upload/4/Picture_House/311894.jpg', 8),
(12, 'images/upload/4/Picture_House/5575873.png', 9),
(13, 'images/upload/4/Picture_House/443121.png', 9),
(14, 'images/upload/2/Picture_House/953553noibat4.jpg', 10),
(15, 'images/upload/2/Picture_House/845185noibat4_1.jpg', 10),
(16, 'images/upload/2/Picture_House/142457noibat4_2.jpg', 10),
(17, 'images/upload/2/Picture_House/466950noibat4_3.jpg', 10),
(18, 'images/upload/2/Picture_House/293549noibat3.jpg', 11),
(19, 'images/upload/2/Picture_House/951661noibat1_1.JPG', 11),
(20, 'images/upload/2/Picture_House/778748noibat4.jpg', 12),
(21, 'images/upload/2/Picture_House/291474noibat4_1.jpg', 12),
(22, 'images/upload/2/Picture_House/287964noibat4_2.jpg', 12),
(23, 'images/upload/2/Picture_House/827302noibat4_3.jpg', 12),
(24, 'images/upload/2/Picture_House/99427noibat4_4.jpg', 12),
(25, 'images/upload/2/Picture_House/557953noibat3.jpg', 13),
(26, 'images/upload/2/Picture_House/396729noibat3_1.jpg', 13),
(27, 'images/upload/2/Picture_House/495148noibat3_2.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `huongnha`
--

DROP TABLE IF EXISTS `huongnha`;
CREATE TABLE IF NOT EXISTS `huongnha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `huongnha`
--

INSERT INTO `huongnha` (`id`, `ten`) VALUES
(1, 'Đông'),
(2, 'Tây'),
(3, 'Nam'),
(4, 'Bắc'),
(5, 'Đông Bắc'),
(6, 'Đông Nam'),
(7, 'Tây Bắc'),
(8, 'Tây Nam'),
(9, 'Không xác định');

-- --------------------------------------------------------

--
-- Table structure for table `khanang`
--

DROP TABLE IF EXISTS `khanang`;
CREATE TABLE IF NOT EXISTS `khanang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `khanang`
--

INSERT INTO `khanang` (`id`, `ten`) VALUES
(1, 'Thấp'),
(2, 'Cao'),
(3, 'Trung bình'),
(4, 'Đã mua 1'),
(5, 'Đã mua 2'),
(6, 'Đã bán 1'),
(7, 'Đã bán 2');

-- --------------------------------------------------------

--
-- Table structure for table `khenthuong`
--

DROP TABLE IF EXISTS `khenthuong`;
CREATE TABLE IF NOT EXISTS `khenthuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `loai` int(11) DEFAULT NULL,
  `thuong` text,
  `ngay` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_khenthuong_user` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `khenthuong`
--

INSERT INTO `khenthuong` (`id`, `iduser`, `loai`, `thuong`, `ngay`) VALUES
(1, 3, 1, 'tew', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kientruc`
--

DROP TABLE IF EXISTS `kientruc`;
CREATE TABLE IF NOT EXISTS `kientruc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8_unicode_ci NOT NULL,
  `chitiet1` text COLLATE utf8_unicode_ci NOT NULL,
  `chitiet2` text COLLATE utf8_unicode_ci NOT NULL,
  `chitiet3` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh1` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh2` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh3` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh4` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydangtin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kientruc`
--

INSERT INTO `kientruc` (`id`, `name`, `noidung`, `chitiet`, `chitiet1`, `chitiet2`, `chitiet3`, `hinhanh1`, `hinhanh2`, `hinhanh3`, `hinhanh4`, `ngaydangtin`) VALUES
(1, '7 lưu ý để nhà bạn được chiếu sáng hoàn hảo', 'Chiếu sáng là một trong những yếu tố quan trọng đặc biệt để bạn thể hiện vẻ đẹp của ngôi nhà, của nội thất trong không gian nhà bạn. Mọi hoạt động của bạn trong nhà, những điều bạn cần ở không gian của ngôi nhà đều liên quan đến ánh sáng. Vì vậy, bạn nên q', '1. Xác định rõ ràng mục đích chiếu sáng\r\n\r\nNếu là chiếu sáng để làm việc, bạn cần tập trung vào khu vực không gian ngồi làm việc của mình. Nếu là chiếu sáng cho môi trường trong phòng, bạn cần chọn ánh sáng sao cho mọi thứ trong phòng được thấy rõ nhất. Theo đó, điều đầu tiên bạn có thể nghĩ đến là lựa chọn cách chiếu sáng. Mỗi căn phòng trong nhà bạn đều cần có một cách chiếu sáng thích hợp, và hãy linh hoạt trong lựa chọn cách thức chiếu sáng để có được những căn phòng như ý.', '2. Cung cấp ánh sáng cho không gian ngoài nhà đảm bảo an ninh\r\n\r\nLối đi bộ trong sân vườn, hàng rào quanh nhà, lối vào trước nhà đều cần được thắp sáng. Nếu không chú trọng đến ánh sáng ngoài nhà, rất có thể là nguyên nhân làm cho nhà bạn bị đột nhập dễ dàng. Nếu bạn sử dụng ánh sáng quá mạnh sẽ gây lãng phí tiền của, làm ảnh hưởng đến những người hàng xóm xung quanh. Bạn nên xem xét chú trọng bố trí các loại đèn nền đặt ở nền của sân vườn, tại các góc nhà, cách bố trí này vừa tiết kiệm, lại có thể làm "nản lòng" những kẻ lạ mặt. Các bóng đèn chiếu sáng ngoài nhà ngoài việc đảm bảo an ninh cho nhà bạn, còn làm cho nhà bạn trở nên cuốn hút, nổi bật hơn.\r\n\r\n3. Sử dụng đèn có đế gắn tường cho trang trí ngoài nhà\r\n\r\nChiếu sáng ngoài nhà cho những tác dụng rất thực tế, và cũng giúp làm bật lên vẻ đẹp vốn có của ngôi nhà. Đèn gắn tường có thể làm cho các bức tường ngoài nhà trở nên hấp dẫn hơn, tạo nên điểm nhấn phía ngoài cho ngôi nhà về đêm. Có 2 loại đèn gắn tường là đèn upward chiếu từ trên xuống, và đèn downward chiếu từ dưới lên. Ngoài tác dụng làm sáng bề mặt tường, loại đèn gắn tường còn giúp chiếu sáng các họa tiết kiến trúc, và các hốc tường phía ngoài nhà.', '4. Sử dụng nhiều nguồn sáng để chiếu sáng cho một không gian\r\n    \r\nVới các căn phòng như phòng bếp, phòng ngủ, và phòng khách, sử dụng nhiều nguồn sáng giúp cho không gian trong phòng trở nên sinh động hơn. Trong phòng bếp, ánh sáng ở quầy bếp có thể giúp nhiều cho bạn khi làm các việc trong bếp như nấu ăn, rửa bát, lau dọn... Đối với phòng khách, đặt các đèn để sàn gần ghế ngồi, ghế nằm có thể giúp bạn có thêm ánh sáng để đọc sách. Với phòng tắm, ánh sáng ở vị trí gương soi có thể giúp giảm bóng hình các vật dụng, làm tăng độ sáng trong phòng tắm.', '5. Với trần cao hoặc căn phòng trang trí theo phong cách hiện đại có thể sử dụng các loại đèn âm trần, đèn hốc tường\r\n\r\nCác đèn âm trần có thể là một lựa chọn rất tuyệt vời để thắp sáng cho không gian trong nhà của bạn. Loại đèn này thường được kết hợp với bộ điều khiển ánh sáng, chúng được bố trí thành một hàng giúp ánh sáng trong phòng trở nên linh hoạt. Tuy được bố trí âm trần nhưng nhờ chụp đèn kim loại, chúng vẫn có thể  thắp sáng cho cả một căn phòng.\r\n\r\n6. Trong các phòng có trẻ nhỏ, cần được quan tâm chiếu sáng ban đêm đặc biệt\r\n\r\nBạn không nên nghĩ rằng khi trẻ em đi ngủ thì không cần đến việc chiếu sáng. Chiếu sáng ban đêm trong phòng bé có thể giúp bé giảm bớt sợ hãi, và cũng có thể giúp bố mẹ dễ dàng kiểm soát giấc ngủ cho trẻ. Các đèn thường dùng cho phòng trẻ có thể là đèn có đế gắn tường, đèn bàn, với ánh sáng vừa phải giúp thắp sáng phòng trẻ về đêm để trẻ ngủ say hơn.\r\n\r\n\r\n\r\nLục Bảo\r\n\r\n(Theo Archi News)', '1.jpg', '1_1.jpg', '1_2.jpg', '1_3.jpg', '2011-07-12'),
(2, 'Biệt thự ngoại ô phong cách sống cho gia đình hiện đại', 'Không gian trong lành cùng với cỏ cây và hoa lá.', 'Không bị làm phiền bởi khói xe và bụi nên nhiều gia chủ có xu hướng lựa chọn biệt thự ngoại ô làm nơi sinh sống của cả gia đình bởi chẳng có gì lý tưởng bằng việc trở về nhà của mình, hít thở bầu không khí trong lành, cùng những người thân yêu tán bộ trên những bãi cỏ, dưới con đường với những hàng cây xanh. Trong khi đó, bên trong căn biệt thự là cả một không gian sống tiện nghi, sang trọng và cũng rất ấm cúng.\r\n \r\nChính giữa một khoảng không xanh bát ngát của cỏ và cây là một dãy nhà được phân chia công năng rõ ràng là điểm dễ nhận thấy ở những khu biệt thự ngoại ô hiện nay. Diện tích xây dựng đối với các không gian sinh hoạt chỉ chiếm nhiều nhất là 10 – 20% tổng diện tích khuôn viên.', 'Ánh sáng và gió tự nhiên cũng được tận dụng khéo léo qua thiết kế để gia chủ ít khi phải bật máy lạnh và tận hưởng trọn vẹn không khí thoáng mát trong lành của thiện nhiên.\r\n\r\nCác không gian riêng tư được thiết kế rất tinh tế để chủ nhân có thể trải nghiệm được cuộc sống đích thực trong khi đó những không gian sinh hoạt chung như phòng khách, bếp ăn, phòng giải trí…lại mang tính kết nối và rộng mở giống như hầu hết thiết kế của những ngôi biệt thự vườn hiện đại.', 'Trong thiết kế không gian, biệt thự ngoại ô hay nói cách khác là “nhà ở phong cách đồng quê” thường không chú trọng tạo ra các phòng rộng mà ưu tiên tạo độ thoáng với nhiều cửa sổ. Những ô cửa được bố trí một cách khéo léo đã hoàn thành tốt nhiệm vụ lưu thông không khí và cung cấp đầy đủ ánh sáng cho mọi không gian trong nhà.', 'Đồng thời chính những “cửa trời” này đã góp phần mang lại cảm giác “hoàn toàn thiên nhiên” khi mọi góc nhìn từ trong biệt thự đều hướng ra khung cảnh xanh mát, tươi đẹp bên ngoài. Mặt tiền của biệt thự được thiết kế theo hình thức mái dốc cùng những hiên nghỉ thoáng, rộng, nơi mà chủ nhà có thể bố trí ghế nghỉ, sắp xếp những chậu cây, hoa yêu thích với mỗi mùa là mỗi sắc mỗi hương đặc trưng.\r\n\r\nChính những hương sắc này là chất xúc tác tuyệt vời nhất tạo cho người sử dụng những cảm xúc khác nhau và giúp họ luôn cảm nhận một cách chân thực nhất sự vận động tinh tế của cả không gian và thời gian.\r\n\r\nChính vì vậy sẽ không ngoa khi nói rằng, một căn biệt thự mang đậm nét lãng mạn theo phong cách đồng quê sẽ là phép giải tối ưu cho bài toán về không gian sinh hoạt, đồng thời cũng là không gian nghỉ ngơi thư giãn hoàn hảo cho cả gia đình sau một ngày học tập và làm việc mệt mỏi. Hình ảnh về ngôi nhà xinh xắn trong một không gian thoáng đãng và tươi mát với phòng khách, bếp ăn rộng rãi; 3 phòng ngủ tiêu chuẩn; khu vực giải trí mở ra thiên nhiên; nội thất đơn giản không có các design phức tạp, không trang trí cầu kỳ và ít sự ngăn cản về thị giác; không có sự mặc định giới hạn không gian…vẫn đang là mơ ước của rất nhiều người.\r\n \r\nGiữa cái rộng lớn của cảnh quan chung, nghệ thuật cảnh quan sân vườn dành cho mỗi căn biệt thự ngoại ô sẽ là một điểm nhấn đặc biệt và là một khoảng riêng tư và lắng đọng cho chủ nhân. Đường vào dẫn lối bởi thảm cỏ trải dài và được điểm xuyết những khóm hoa đa sắc màu cùng những tán cây xanh tỏa tạo nên một khu vườn hoàn hảo. Hãy để những căn nhà nơi ngoại ô hoàn thiện giấc mơ về tổ ấm yên bình của bạn và hãy đến với cuộc sống ngoại ô như đến với món quà bạn tự thưởng cho mình và gia đình sau những giờ phút căng thẳng mệt mỏi lo toan cho cuộc sống.\r\n\r\nPhạm Hương\r\n(Theo báo Đô Thị)', '2.jpg', '2_1.jpg', '2_2.jpg', '2_3.jpg', '2011-07-05'),
(3, 'Những lời khuyên cho ngôi nhà mùa hè', 'Vào mùa hè, căn nhà sẽ cần một số những thay đổi nhất định để có thể phục vụ tốt hơn cho cuộc sống của gia đình bạn, vậy đâu là những thứ cần thay đổi?', 'Nếu như bạn muốn ngôi nhà trở nên “thân thiện” hơn trong mùa hè, điều đầu tiên bạn nên chú ý tới ánh sáng, ánh nắng chói chang có thể sẽ làm cho bạn và các thành viên khác trong gia đình cảm thấy khó chịu.\r\n\r\nGiải pháp cho vấn đề này không phải là đóng kín cửa sổ mà nên là hạn chế ánh nắng chiếu trực tiếp vào không gian bên trong ngôi nhà bằng các loại rèm cửa, mành che hoặc film màu cách nhiệt…', 'Bộ sofa êm ái ấm áp của mùa đông cũng sẽ cần một bộ cánh mới cho mùa hè, bạn hãy sử dụng các loại vải bọc bằng chất liệu thoáng mát, mỏng, nhẹ để phù hợp với thời tiết hoặc nếu có điều kiện thì bộ bàn ghế làm bằng gỗ hay mây tre sẽ là lựa chọn lý tưởng cho ngôi nhà vào mùa hè.\r\n\r\nĐối với phòng bếp, không gian thường gây ra sự phiền tóai nhiều nhất trong những ngày hè nóng nực cần phải được dọn dẹp gọn gàng và lau chùi thường xuyên. Một phòng bếp thoáng mát, sạch sẽ cũng góp phần hạ nhiệt không nhỏ cho ngôi nhà.\r\n\r\nBạn hãy cất những tấm thảm trang trí sàn, đôi chân của bạn cần được thư giãn nhiều hơn khi tiếp xúc trực tiếp với sàn nhà bởi dù chỉ là đặt chân lên những tấm thảm thôi cũng sẽ gây ít nhiều khó chịu.', 'Gối ôm hay những chiếc gối trang trí trên ghế sofa trong phòng khách cũng là những thứ bạn nên tạm cất đi trong những ngày hè nóng nực bởi sự bừa bộn sẽ chỉ làm tăng thêm cảm giác ngột ngạt mà thôi.\r\n\r\nMột vài chậu cây xanh tươi tốt được đem vào trong không gian sống không đơn giản chỉ là giải pháp trang trí hữu hiệu mà nó còn góp phần làm tăng độ ẩm trong nhà, xua bớt đi sự oi bức', 'Chiếc quạt trần cũng là vật dụng bạn nên sắm cho không gian sống của mình bởi tác dụng làm mát khá hiệu quả mà nó mang lại. Khác với quạt bàn, quạt trần không làm mát cục bộ, gió tản sẽ không gây cảm giác mệt mỏi cho người dùng khi sử dụng trong thời gian dài.\r\n\r\nHùng Cường\r\n\r\n(Theo báo Đô Thị)', '3.jpg', '3_1.jpg', '3_2.jpg', '', '2011-07-07'),
(4, 'Nội thất phòng ngủ hiện đại', 'Độ cao của các món đồ nội thất ngày càng thấp hơn thậm chí là sát xuống sàn nhà, điều này tạo phong cách đơn giản, hiện đại, tiện dụng... Xu hướng này được các nhà thiết kế nội thất hiện nay quan tâm chú ý phát triển.', 'Không chỉ có vẻ bề ngòai thanh thoát, sang trọng, hiện đại, phong cách nội thất thấp sàn còn mang đến sự thuận tiện khi sử dụng. Kiểu thiết kế này sẽ mang đến thuận tiện cho người sử dụng khi làm vệ sinh phòng bởi bạn sẽ không mất nhiều công sức và thời gian vì mọi đồ vật hầu hết ở dạng trơn và không hề có gầm.', 'Trong phòng ngủ được thiết kế theo phong cách hiện đại không chỉ có giường được hạ thấp xuống mà toàn bộ các vật dụng nội thất trong phòng ngủ cũng thường đồng bộ và được hạ thấp xuống mặt sàn như hệ thống cửa sổ, rèm cửa, đèn ngủ, tủ kệ...\r\n \r\nNếu như phong cách cổ điển thường cầu kỳ về chi tiết, gầm cao và cần không gian lớn để sắp đặt thì phong cách nội thất thấp sàn được xem là thân thiện, trẻ trung, hiện đại và tạo nhiều khoảng trống cho không gian sinh hoạt.', 'Tủ kệ không có chân, thiết kế đơn giản, hay các loại gối lười, gối tựa được đặt ngay trên sàn gỗ hoặc thảm phòng ngủ để tạo ra khu vực nghỉ ngơi, thư giãn thay cho bàn ghế.\r\n\r\nVì là phong cách khá đơn giản nên cần đến sự sáng tạo của người thiết kế để không gian nội thất trở nên bớt đơn điệu nhàm chán, thiếu sức sống. Bạn cần lưu ý loại bỏ những vật dụng không cần thiết để tạo ra một khoảng không gian sinh hoạt thoáng và rộng tối đa. Đường nét, bố cục, màu sắc cũng cần được phối hợp hoàn hảo tạo nên độ sang trọng, trang nhã của đồ vật.', 'Đối với việc chiếu sáng cho phòng ngủ, các thiết bị phải được lắp đặt sao cho hài hòa và làm nổi bật vẻ đẹp của nội thất. Sẽ không còn ý nghĩa nếu như ánh sáng không được thiết kế hợp lý, đồng bộ, thậm chí còn làm cho căn phòng trở nên buồn tẻ, đơn điệu.\r\n\r\nPhong cách phòng ngủ hiện đại chỉ sử dụng 3 màu chủ đạo gồm màu nền, màu tạo ấn tượng và điểm nhấn. Thông thường, màu trắng luôn xuất hiện với tư cách là màu nền, đen, vàng, đỏ sẽ là màu gây ấn tượng độc đáo, màu tạo điểm nhấn có thể là xanh lá, xanh da trời hoặc tím.\r\n\r\nHùng Cường\r\n\r\n(Theo báo Đô Thị)', '4.jpg', '4_1.jpg', '4_2.jpg', '', '2011-07-19'),
(5, 'Thiết kế biệt thự nhà vườn diện tích 250m2', 'Tôi có 1 mảnh đất nằm trong ngõ rộng 900m2, chiều rộng 30m, chiều dài 30m. Tôi định xây 1 biệt thự nhà vườn 2 tầng diện tích khoảng 250m2.', 'Yêu cầu:\r\n\r\nTầng 1 gồm 1 phòng ngủ, 1 phòng khách có phòng thờ, 1 phòng chơi. Nhà bếp riêng biệt với nhà chính. Gara xe ở ngoài nhà.\r\n\r\nTầng 2 có 2 phòng ngủ, 1 phòng khách. Tôi định xây trong năm nay.\r\n\r\nTrả lời:\r\n\r\nThiết kế ngôi nhà theo phong cách biệt thự nhà vườn hiện đại, hình khối tỷ lệ. Không gian chức năng được bố trí linh hoạt tiện dụng với 4 hướng tiếp cận ngôi nhà làm cho ngôi nhà thân thiện và hài hòa với cảnh quan sân vườn.Cụ thể các không gian chức năng được bố trí như sau:', 'Tầng 1 gồm: phòng khách, phòng chơi, phòng thờ, phòng ngủ bố mẹ và bếp.\r\n', 'Hướng tiếp cận chính vào phòng khách và 3 lối tiếp cận phụ qua bếp, phòng ngủ bố mẹ và hành lang giao thông chính. Bếp được tách riêng và có lối tiếp cận riêng nhưng vẫn đảm bảo sự thống nhất về bố cục kiến trúc và giao thông bên trong nhà, thuận tiện và mạch lạc với hành lang giao thông chính trong nhà.\r\n\r\nPhòng chơi được bố trí bên cạnh phòng khách được tách chia không gian với phòng khách bởi 1 vách ngăn lửng làm cho cả không gian phòng khách và phòng chơi đảm bảo sự thông thoáng với vách kính lớn mang ánh sáng tự nhiên vào trong phòng.\r\n\r\nCầu thang bố trí ngay sau kệ ti vi phòng khách giúp dễ định hướng hệ thống giao thông của ngôi nhà.\r\n\r\nTầng 2 gồm: phòng sinh hoạt chung và 2 phòng ngủ.', 'Hai phòng ngủ được bố trí riêng về 1 phía đem lại sự yên tĩnh cần thiết đối với phòng sinh hoạt chung. Phòng sinh hoạt chung được bố trí ra phía ngoài gần với sân mái tạo không gian đẹp khi gia đình tụ họp.\r\nThiết kế dựa vào giả thiết của chủ nhà và giả thiết của chúng tôi về khu đất nên không tránh khỏi một số vấn đề chưa được hợp lý. Để có được ngôi nhà đẹp và hoàn hảo hơn, anh chị liên hệ với công ty để được tư vấn kỹ lưỡng hơn với mức đầu tư chi phí hợp lý.\r\n\r\nChúc bạn có được ngôi nhà đẹp như ý!\r\n\r\nKTS Vương Tiến Luyến\r\nCông ty CP kiến trúc Tiên Phong\r\n\r\n(Theo Archi News)\r\n\r\n', '5.jpg', '5_1,jpg', '5_2.jpg', '5_3.jpg', '2011-07-08'),
(6, 'Để nhà bớt chật', 'Những thiết kế mở với khoảng không gian thông thoáng làm tăng khả năng giao thoa giữa các khu vực trong nhà là lời khuyên hữu ích của KTS dành cho những gia đình sở hữu một căn hộ có diện tích “khiêm tốn”.', '1. Thiết kế không gian: Xu hướng mở\r\n\r\nBên cạnh việc sử dụng nội thất nhỏ gọn, tiện lợi và đa năng thì xu hướng thiết kế mở đã dần chứng minh được tính ưu việt của mình đối với không gian chật hẹp. Xu hướng thiết kế này thường hạn chế tối đa việc sử dụng các vách cứng để ngăn chia không gian, thay cho những bức vách nặng nề là những vách lửng hoặc vách ngăn hờ để tạo cho không gian cảm giác mềm mại, thân thiện mà vẫn phân chia rạch ròi các khu vực chức năng sử dụng.', 'Khu vực phòng khách, phòng sinh hoạt chung hoặc cả phòng ăn thường được ưu tiên một khoảng không gian thoáng đãng nhất định trong căn hộ, nơi có tầm nhìn ra bên ngoài hoặc gần hành lang, cửa sổ...Ngoài ra cũng có thể tạo không gian mở cho căn hộ theo cách hình thức như: Kết hợp phòng khách “3 trong 1” (tiếp khách, sinh hoạt chung, nghe nhạc hay đọc sách…); Nối kết phòng ăn và phòng khách bằng tiểu cảnh tạo một cái gạch nối nhẹ nhàng ở khoảng giữa nhà hoặc tận dụng hệ thống tủ kệ trang trí, một quầy bar ngăn hờ giữa gian bếp nhỏ và nơi tiếp khách.', 'Với những vách ngăn như những lam cửa kéo, một hệ thống rèm cửa linh động... bạn cũng có thể làm không gian căn hộ có độ linh hoạt lớn: có thể là một không gian đóng hoặc một không gian mở tùy theo ý thích của mình: cần một không gian rộng mở, khi tất cả các lam cửa được mở rộng hoặc các rèm cửa được cuốn lên, cả căn hộ là một không gian xuyên suốt tận hưởng chung ánh sáng và gió; khi gia đình có khách hoặc cần sự yên tĩnh, một chốn riêng tư các hệ thống rèm cửa này sẽ được lần lượt buông xuống...\r\n\r\n2. Nội thất: Sự đơn giản có ý thức\r\n\r\nHiện đại nhưng đơn giản thậm chí tối giản đang ngày càng trở thành xu hướng thiết kế nội thất phổ biến ở các căn hộ diện tích nhỏ. Phong cách này dễ làm đẹp và tạo được môi trường nghỉ ngơi thư giãn thật sự. Hầu hết đồ nội thất trong căn hộ được thiết kế với nhiều chức năng kết hợp để tận dụng không gian. Một bộ salon nơi phòng khách có thể được kếp hợp cùng lúc hai chức năng: nơi tiếp khách chỗ ngồi đọc sách vào ban ngày và chỗ ngủ vào ban đêm.', 'Hệ thống tủ treo trên tường sẽ giúp gia đình tận dụng tối đa không gian để sách vở, đồ trang trí, vật dụng nhỏ đồng thời đó là cách mở rộng diện tích sàn nhà. Việc sử dụng những loại đồ nội thất liên hoàn gồm bàn ghế, giường tủ... theo cùng một chất liệu, một màu sắc... cần được khuyến khích. Đối với phòng ngủ quá chật chúng ta có thể thiết kế tủ âm tường, ngăn kéo dưới giường làm chỗ chứa đồ, dùng tủ đứng để chứ góc học tập hay kết hợp giường tầng làm chỗ ngủ và sinh hoạt khi nhà có trẻ nhỏ.\r\n\r\nMai Hà\r\n\r\n(Theo Đô Thị)', '6.jpg', '6_1.jpg', '6_2.jpg', '', '2011-07-12'),
(7, 'Chiếu sáng theo không gian', 'Tôi đang làm nhà sắp đi vào giai đoạn hoàn thiện. Tôi muốn mỗi phòng có thể bố trí đèn trang trí và chiếu sáng tuỳ tính chất sử dụng, nhưng băn khoăn không biết làm vậy có sai gì về phong thuỷ không?', 'Một ngôi nhà sẽ đạt được sự hài hoà nếu được tổ chức chiếu sáng đúng mức. Có hai nguyên tắc phong thuỷ khi bố trí đèn là chiếu sáng cân bằng âm dương và chiếu sáng hài hoà ngũ hành. Các không gian thuần âm hay thuần dương trong nhà sẽ được bổ trợ tốt hơn nhờ năng lượng ánh sáng. Cụ thể là các vị trí có nhiều đường thẳng, mặt phẳng vuông vức thì thiên về tính dương. Theo tính chất sử dụng thì phòng của nam thanh niên, phòng bé trai hoặc phòng làm việc cũng là những phòng có tính dương nhiều, cần phải được chiếu sáng bổ sung thêm tính âm, đó là các nguồn sáng dịu, vùng sáng tạo ra cong hoặc uốn lượn, ánh sáng khuyếch tán để giảm độ chói trực tiếp. Tính chất phòng càng “cứng” thì càng nên dùng ánh sáng “mềm” để cân bằng khí trở lại. Trong khi đó các phòng có đường nét cong, tròn, vật liệu mềm mại (hoặc phòng của bé gái, phòng nữ giới cư ngụ) ánh sáng bố trí nên tránh “âm thịnh dương suy” quá, tức là bổ sung yếu tố ấm áp, dùng ánh sáng vàng và tươi.', 'Cần lưu ý, trong nhà thuần tuý để ở luôn cần bổ sung phần tĩnh và âm nhiều hơn so với công trình công cộng hoặc thương mại (vốn cần phần thuần dương và động). Do đó, tính chất chiếu sáng nhà ở không thể “học hỏi” kiểu nơi công cộng (đèn pha chói lọi, chớp tắt hoặc đèn nhiều màu tương phản… đều không phù hợp với trường khí nhà ở) mà cần phải là những ánh sáng gián tiếp, ánh sáng được lọc và khuyếch tán nhờ chụp, nhờ máng. Bên cạnh đó, lối chiếu sáng mờ ảo, lung linh như kiểu “thắp nến” của nhà hàng quán xá vốn là chốn ẩm thực, thiên về tính thư giãn, trong khi nhà ở vẫn cần tính dương trong các sinh hoạt hàng ngày. Việc dùng ánh sáng thuần âm chỉ nên áp dụng vào phòng thờ, những góc thư giãn tĩnh lặng và một vài thời điểm trong sinh hoạt như lúc tiệc thân mật hay góc nghỉ ngơi riêng tư, phòng của người già.\r\n \r\nCó thể căn cứ vào tính chất ngũ hành của không gian mà điều chỉnh chiếu sáng. Trong những căn phòng hình vuông, nhiều cửa vuông (tính thổ) cũng như phòng khách và sinh hoạt chung, cần phân bố ánh sáng vừa tập trung vừa phân tán, phối hợp ánh sáng trắng (kim) và ánh sáng vàng (hoả), các góc nhà dùng đèn điểm ánh sáng vàng để tương sinh (hoả sinh thổ).\r\n \r\nTrong phòng trẻ em (mang tính mộc) nên dùng đèn có hình dáng vui mắt, uốn lượn theo dạng thuỷ, để thuỷ dưỡng mộc. Những cặp ánh sáng tương phản nhau như vàng – tím, xanh – đỏ (thuỷ – hoả) giúp kích thích trí tưởng tượng và tạo sự hưng phấn tốt cho trẻ.\r\n \r\nĐối với phòng ăn là nơi tiếp nạp năng lượng (tính thuỷ và mộc) có thể dùng đèn có tính tròn và vòm cong (mang tính kim) kết hợp ánh sáng tự nhiên để tạo tương sinh với thuỷ mộc, tốt hơn cho không gian ẩm thực. Cách chiếu sáng cần tập trung, rõ ràng nhưng không chói quá.\r\n \r\nKhông gian tâm linh (như phòng thờ, nơi thiền định) vốn thuộc về hoả, và các chiếu sáng điểm (như nến, đèn rọi, đèn bóng nhỏ) tạo ánh sáng đỏ và vàng, cam (hoả – thổ) sẽ rất phù hợp để tạo trường khí tôn nghiêm. Không gian giao thông và khoảng trống trong nhà như cầu thang, hành lang, giếng trời… cần chú ý yếu tố rõ ràng và ổn định cả ban ngày lẫn ban đêm. Có thể kết hợp chiếu sáng theo mảng với chiếu sáng điểm nhấn tại các góc thay đổi hướng.\r\n \r\n(Theo SGTT)', '', '', '7.jpg', '', '', '', '2011-07-20'),
(8, 'Nhà đẹp nhờ treo tranh', 'Để có những bức tranh đẹp, phù hợp với ngôi nhà thì không phải điều đơn giản.', 'Việc tìm được những bức tranh ưng ý không dễ dàng, trình bày chúng như thế nào lại là một bài tóan khó. Sau khi đã có trong tay những bức tranh như ý, công việc của bạn sẽ là sắp xếp để trang trí cho các căn phòng hoặc tạo thành những bộ sưu tập như ý cho ngôi nhà.', 'Nếu việc treo một bức tranh vẽ thật lớn giữa bức tường như ở phòng khách - sinh hoạt chung, phòng ăn, phòng phủ như thường thấy không mất nhiều công sức thì việc trình bày những bộ sưu tập tranh hoặc tập hợp những bức tranh theo nhiều chủ đề khác nhau thật sự là công trình sáng tạo nghệ thuật.\r\n\r\nVới những bức tranh có cùng kích thước hoặc cùng chủ đề bạn có thể trình bày theo kiểu dàn hàng ngang hoặc xếp dọc theo các tường nhà. Cách làm này khá đơn giản tuy nhiên cũng dễ tạo sự nhàm chán vì đi theo lối mòn.', 'Nếu bạn ưa thích sự mạo hiểm và không ngại sự phá cách, bạn có thể làm việc theo cảm hứng bằng cách bắt đầu từ một tờ giấy phác họa. Ở đó sẽ đưa ra nhiều cách bố trí, sắp xếp và những phương án khác nhau cho tất cả bức tranh sẵn có và không cùng một kích thước nào, miễn sao trông mọi thứ thật ăn khớp.\r\n\r\nTuy nhiên dù có phá cách đến đâu thì bạn cũng nên tuân thủ những qui tắc cơ bản về cách tập hợp màu sắc, đường nét như cách sử sụng một màu đen hoặc trắng cho khung tranh, hoặc những bộ sưu tập tranh có cùng tông màu xanh, nâu - đen hoặc đen - trắng...\r\n\r\nChỗ của những bức tranh không chỉ là ở trên tường nhà, có một cách trang trí tranh khá mới mẻ và lạ mắt bạn có thể áp dụng là bố trí tranh trên... kệ.', 'Đây là cách giới hạn việc trang trí tranh ở một vị trí nhất định trong nhà hoặc trên những bức tường quá rộng để tạo ra một góc nhìn đẹp có điểm nhấn, tránh sự dàn trải không cần thiết.\r\n\r\nBạn có sắm hoặc tự thiết kế những chiếc kệ nhỏ, đơn giản trên các bức tường sao cho phù hợp với kích thước các bức tranh cần treo hoặc tận dụng các gờ tường, đầu tủ để làm thành một góc trưng bày tranh.\r\n\r\nSẽ thật là tuyệt vời nếu bạn có thể vừa treo vừa đặt tranh trên kệ để tạo ra những góc nhìn lạ, sự kết hợp này sẽ khiến cho bộ sưu tập của bạn thêm phần ấn tượng và hấp dẫn, tăng giá trị thẩm mỹ của những bức tranh mà bạn có.', '8.jpg', '8_1.jpg', '8_2.jpg', '8_3.jpg', '2011-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `idlevel` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idlevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`idlevel`, `ten`, `chitiet`) VALUES
(1, 'Level1', 'Nhân viên cấp bậc 1'),
(2, 'Level2', 'Nhân viên cấp bậc 2'),
(3, 'VIP', 'Tài khoản VIP'),
(4, 'Normal', 'Tài khoản thường'),
(5, 'Không có level', 'Không có level');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

DROP TABLE IF EXISTS `lienhe`;
CREATE TABLE IF NOT EXISTS `lienhe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ngayguitin` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoten`, `sdt`, `email`, `diachi`, `noidung`, `ngayguitin`, `status`) VALUES
(1, 'Hồ Sơn Lâm', '0976 937 118', 'sieudangf2@yahoo.com', 'tp Hồ Chí Minh', '', '0000-00-00', 0),
(2, 'Nguyễn Thị Tuyết Phượng', '0976 937 118', 'phuong.nguyentuyet@yahoo.com', 'tp Hồ Chí Minh', '', '2011-07-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaidichvu`
--

DROP TABLE IF EXISTS `loaidichvu`;
CREATE TABLE IF NOT EXISTS `loaidichvu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `loaidichvu`
--

INSERT INTO `loaidichvu` (`id`, `ten`) VALUES
(1, 'Cần bán'),
(2, 'Cần mua'),
(3, 'Cho thuê'),
(4, 'Cần cho thuê');

-- --------------------------------------------------------

--
-- Table structure for table `loainha`
--

DROP TABLE IF EXISTS `loainha`;
CREATE TABLE IF NOT EXISTS `loainha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `loainha`
--

INSERT INTO `loainha` (`id`, `ten`) VALUES
(1, 'Biệt thự'),
(2, 'Căn hộ chung cư'),
(3, 'Căn hộ cao cấp'),
(4, 'Nhà phố'),
(5, 'Văn phòng cho thuê');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_quyenhan`
--

DROP TABLE IF EXISTS `nhanvien_quyenhan`;
CREATE TABLE IF NOT EXISTS `nhanvien_quyenhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idquyenhan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nhanvien_quyenhan_quyenhan` (`idquyenhan`),
  KEY `fk_nhanvien_quyenhan_nhanvien` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nhanvien_quyenhan`
--


-- --------------------------------------------------------

--
-- Table structure for table `phongthuy`
--

DROP TABLE IF EXISTS `phongthuy`;
CREATE TABLE IF NOT EXISTS `phongthuy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `ChiTiet` text COLLATE utf8_unicode_ci NOT NULL,
  `ChiTiet1` text COLLATE utf8_unicode_ci NOT NULL,
  `ChiTiet2` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh1` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDangTin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `phongthuy`
--

INSERT INTO `phongthuy` (`id`, `Name`, `NoiDung`, `ChiTiet`, `ChiTiet1`, `ChiTiet2`, `HinhAnh1`, `HinhAnh`, `NgayDangTin`) VALUES
(1, 'Năm yếu tố tự nhiên trong Phong thủy', 'Áp dụng những yếu tố phong thủy vào trang trí, sắp xếp nhà cửa là điều không hề đơn giản nếu ta không nắm rõ ý nghĩa và quy luật của chúng.', 'Phong thủy đã có từ rất lâu trong trang trí và sắp xếp nhà ở đối với người Việt và nó đã trở thành xu hướng áp dụng phổ biến trong trang trí nhà ở hiện nay, mục đích của phong thủy là để duy trì năng lượng, hạn chế điểm xấu, đón luồng khí tốt, tài lộc và may mắn vào nhà. Tất cả mọi người đều tin rằng nếu bố trí mọi thứ đúng chỗ của nó theo phong thủy thì cuộc sống sẽ tràn đầy năng lượng tích cực.\r\n\r\nPhong thủy bao gồm rất nhiều yếu tố, trong đó được bao hàm trong 5 yếu tố tự nhiên xung quanh đời sống con người bao gồm: gỗ, lửa, nước, đất và kim loại. Cùng với nó, để duy trì tính lưu động của Phong thủy trong nhà thì tất cả năm yếu tố này sẽ cần phải được sử dụng ở cùng một không gian, tạo thành một vòng tròn hoàn hảo và sẽ nhẹ nhàng hơn khi đưa chúng vào giống như một hình thức trang trí.\r\n\r\nĐể hiểu cụ thể, hãy sử dụng phòng khách làm ví dụ cho việc sử dụng năm yếu tố của Phong Thủy trong nhà. Kết hợp giữa việc trang trí với việc áp dụng một trong năm yếu tố phong thủy cho căn một cách đơn giản và hiệu quả nhất có thể phù hợp với bất kỳ không gian dù nhỏ hay lớn:\r\n', 'Gỗ\r\n\r\nGỗ tạo sức mạnh trong sáng tạo và sự phát triển, đại diện cho sự sinh sôi, lớn lên, linh hoạt và nhạy cảm.\r\n\r\nChất liệu gỗ thường thấy trong nhà ở thông qua nhiều vai trò, chức năng khác nhau, trong phòng khách có thể dùng gỗ cho kệ ti vi, tủ, kệ hay thậm chí chỉ là một chậu tiểu cảnh nhỏ ở góc nhà, lọ hoa trên bàn với để trang trí, tạo không gian xanh sinh động và tươi mắt.\r\n\r\nNgoài ra, việc bố trí cây xanh cũng có tác dụng điều hòa không khí trong phòng, tạo bầu không khí thoải mái, thoáng đãng nhất.\r\n\r\nLửa\r\n\r\nSử dụng yếu tố "Hỏa" trong nội thất là cách để giúp tăng sự phấn khích. Khi sử dụng quá nhiều yếu tố "Hỏa" sẽ khiến người cư ngụ có cảm giác bực bội, tức giận, ngược lại khi có quá ít, sẽ khiến mọi thứ trở nên hời hợt, thiếu cảm hứng.\r\n\r\nCó rất nhiều cách để mang năng lượng của lửa theo phong thuỷ vào phòng khách mà bạn có thể thực hiện được như sử dụng màu sắc (đỏ, cam, vàng đậm, màu gạch nung) cho nội thất, sơn tường, thảm, rèm….hay hình dáng của đô vật (tam giác, góc nhọn, hình chop).\r\n\r\nNhưng sự lựa chọn đơn giản nhất có lẽ là đèn và những ngọn nến trang trí, nến sẽ mang lửa vào nhà một cách hoàn hảo và có thêm nét lung linh, ấm áp cho căn phòng.\r\n\r\nKim loại\r\n\r\nYếu tố này xuất hiện nhiều trong cuộc sống hàng ngày của các gia đình những vật dụng trang trí, nội thất bằng kim loại có rất nhiều ví dụ như tác phẩm điêu khắc bằng bạc, đồng, sắt. inox… hoặc thậm chí là vàng.\r\n\r\nSự hiện diện của vật liệu bằng kim loại trong một không gian sống sẽ cho ta cảm giác gọn gàng, ngăn nắp... Nhưng khi quá nhiều, sẽ hình thành sự vô định, không có khả năng kiểm soát bản thân. Và nếu ngược lại, cảm giác dễ nhận thấy là sự lạnh lẽo và thiếu tập trung.\r\n\r\nNước\r\n\r\nSự cân bằng trong việc sử dụng yếu tố Thủy sẽ mang tới cảm giác hứng thú, sự sâu sắc trong suy nghĩ và hành động. Ngày nay nước được đưa vào không gian sống nhiều hơn với nhiều hình thức và mục đích chung là trang trí, làm đẹp, đặc biệt là ở phòng khách.\r\n\r\nCách thiết kế tiểu cảnh nước với những đài phun nước nhỏ, bể cá, mảng tường nước chảy róc rách…tạo một không gian sinh động, hài hòa với thiên nhiên.\r\n\r\nĐất\r\n\r\nTheo phong thủy, yếu tố "Thổ" ảnh hưởng tới sức khỏe, tạo cảm giác yên ổn và cân bằng. Khi sử dụng quá nhiều trong không gian sống, con người sẽ rơi vào tình trạng nặng nề trong cảm xúc, buồn tẻ, uể oải.\r\n\r\nCòn ngược lại, người cư ngụ sẽ có cảm giác bối rối, hỗn loạn và không tập trung. Yếu tố "Thổ" sẽ đến với ngôi nhà của bạn thông qua những hình ảnh về mặt đất, phiến đá, với những gam màu như nâu, xanh hay cát, những hình khối vuông và chữ nhật, bề mặt mỏng và phẳng đơn cử như những bức tranh phong cảnh.\r\n\r\nMai Hà\r\n\r\n(Theo Đô Thị)', '', '1.jpg', '1_1.jpg', '2011-07-19'),
(2, 'Bếp nấu không nên thẳng cửa chính', 'Phong thủy học cho rằng bếp nấu nhìn thẳng ra cửa chính và phía sau bếp nấu có cửa sổ đều không tốt, vì chủ yếu là sợ gió thổi từ cửa vào hoặc từ cửa sổ vào bếp.', 'Kỵ gió: phong thủy học truyền thống nói phải cầu “tàng phong tụ khí” tức là phải tránh gió để tụ được khí, vì vậy tối kỵ gió thổi bếp đặc biệt tránh gió!\r\n\r\nHãy bỏ qua quan niệm phong thủy không nói đến mà chỉ nói đến việc bố trí sắp đặt đồ dùng trong nhà bếp thì việc đặt bếp nhà thẳng ra cửa chính hoặc đặt bếp cạnh cửa sổ cũng đã không tiện rồi.\r\n\r\nVì rằng nếu bếp ga hoặc bếp dầu bị gió thổi tắt thì mùi dầu mùi ga cũng đã gây độc hại biết nhường nào.', 'Còn nếu như bếp đun bằng than củi, một khi gió to thổi lửa liếm ra 4 phía có khi còn gây ra hỏa hoạn.\r\n\r\nNói tóm lại dù nhìn từ góc độ phong thủy học hoặc là từ góc độ an toàn cho nhà bếp đều nên tránh đặt bếp nơi có gió.\r\n\r\nNói cụ thể là cần chú ý 2 điểm sau: cửa chiếu thẳng vào bếp nấu; bếp không nên đặt cạnh cửa sổ, đặc biệt là không đặt cạnh cửa sổ có mặt trời phía tây chiếu vào\r\n\r\n2. Kỵ nước: theo quan niệm của phong thủy học thì “hỏa” khí của bếp nóng không thể dung hòa với “thủy” … mát lạnh của nước, chính là cái gọi là “thủy hỏa bất tương dung”, như vậy là xung khắc bếp nấu.\r\n\r\nPhong thủy học truyền thống cũng có quan niệm “bếp nấu kỵ nước” thế thì bếp cuối cùng phải tránh nước như thế nào đây?\r\n\r\nBiện pháp để bếp tránh được nước có 3 điểm sau:\r\n\r\nTránh đặt bếp nhìn về hướng bắc: vì rằng hướng bắc là phương vị thủy đang vượng, mà thủy khắc hỏa vì vậy không có lợi cho bếp.\r\n\r\nTránh đặt bếp lên trên rãnh, mương, đường nước.\r\n\r\nTránh không để bếp kẹp giữa 2 thứ có mang theo “thủy” như máy giặt, tủ lạnh, bồn chậu rửa bát ..v..v\r\n\r\nchúng đều thuộc loại đồ dùng có liên quan đến nước, vì vậy không để bếp kẹp giữa các đồ vật này.\r\n\r\n3. Bếp đặt tọa hung hướng cát: nói như vậy có nghĩa là bếp đặt lên hướng dữ nhưng cửa bếp phải nhìn về hướng lành vì rằng như trong “Kim quang đẩu lâm kinh” đã nói: “cửa bếp là nơi đưa củi vào đáy nồi đốt,, phải đặt nó quay về hướng lành, như thế nhanh có phúc”.\r\n\r\nCần chú ý bếp đặt “tọa cát hướng cát” không bằng “tọa hung hướng cát” nghĩa là bếp đặt lên hướng lành nhìn về hướng lành không bằng đặt lên hướng dữ nhìn về hướng lành,\r\n\r\n4. Không nên đặt bếp sát phòng ngủ: phong thủy học cho rằng nhà bếp cần cách xa phòng ngủ, chủ yếu là vì bếp nóng bức, khói dầu mỡ nhiều, người hít phải nhiều dễ ảnh hưởng đến sức khỏe, có hại.\r\n\r\nĐể tránh những vấn đề nói ở trên cần chú ý điểm sau:\r\n\r\nBếp không đặt chiếu thẳng với cửa nhà\r\n\r\nBếp không để sát với giường ngủ\r\n\r\n5. Bếp hợp vệ sinh\r\n\r\nNói chung người phương đông rất coi trọng ăn uống nhưng không coi trọng đến vệ sinh môi trường của nhà bếp, luôn chất rất nhiều thứ không cần thiết trong nhà bếp, thậm chí làm cho bếp hẹp lại, tối tăm và ẩm ướt...\r\n\r\nNgoài ra môi trường vệ sinh của nhà bếp kém sẽ ảnh hưởng đến hứng thú của người nấu đồ ăn thức uống. Vì thế mà ảnh hưởng đến hứng thú ẩm thực của cả nhà.\r\n\r\nCho dù là căn nhà có phong thủy rất tốt, nhưng nếu môi trường vệ sinh của nhà bếp quá kém thì sẽ ảnh hưởng rất lớn đến cuộc sống của gia đình.\r\n\r\nKTS Vũ Quang Định\r\nCông ty CP ASPACE\r\n\r\n(Theo Đô Thị)', '', '2.jpg', '2_1.jpg', '2011-07-25'),
(3, 'Mệnh gia chủ và giường ngủ tương xứng theo phong thủy', 'Giường ngủ là nơi dùng để nghỉ ngơi và nằm ngủ, cho nên cần sắp đặt sao cho hợp với phương vị của mình có vậy mới nghỉ ngơi thư thái và ngủ ngon giấc, sau khi thức dậy thấy tinh thần khoan khoái dễ chịu. đây là...', 'Phong thủy học cho rằng mệnh đông tứ nên ngủ ở giường đông tứ, còn mệnh tây tứ nên ngủ ở giường tây tứ. kết hợp giường và mệnh với nhau như thế thì vui vẻ phấn khởi, mọi sự tốt lành.\r\n\r\nNgược lại, nếu mệnh đông tứ mà ngủ ở giường tây tứ hay là mệnh tây tứ ngủ ở giường đông tứ, như vậy giường và mệnh không hợp nhau thì hung nhiều, cát ít, tai nạn bệnh tật liên miên.', 'Giường đặt ở hướng đông tứ gọi là giường đông tứ, còn đặt ở hướng tây tứ thì gọi là giường tây tứ.\r\n\r\nNgười thuộc ngũ hành thủy, môc, hỏa đều là mệnh đông tứ, giường ngủ đặt ở hướng đông, đông nam và bắc là được bởi vì đây đều là hướng tốt lành của bản mệnh.\r\n\r\nGiường ngủ là nơi nghỉ ngơi và nằm ngủ cho nên đặt ở sao phục vị của bản mệnh mới được, vì sao phục vị có nghĩa là tĩnh tại bất động. bây giờ xin liệt kê sao phục vị các mệnh dưới đây:\r\n\r\nMệnh chấn mộc, giường ngủ nên đặt ở sao cho phục vị hướng đông.\r\n\r\nMệnh tốn mộc, giường ngủ nên đặt ở sao phục vị hướng đông nam.\r\n\r\nMệnh ly hỏa, giường ngủ nên đặt ở sao phục vị hướng nam.\r\n\r\nMệnh khảm thủy, giường ngủ nên đặt ở sao phục vị hướng bắc.\r\n\r\nĐể tiện tham khảo sao phục vị các mệnh xin lần lượt biểu thị chấn, tốn, khảm, ly.\r\n\r\nTrên đây đã trình bày giường đông tứ thuộc mệnh đông tứ, bây giờ xin trình bày giường tây tứ thuộc mệnh tây tứ.', 'Người thuộc mệnh kim và thổ trong ngũ hành đều là mệnh tây tứ, giường ngủ nên đặt ở hướng đông bắc, tây bắc, tây nam và tây là được vì đây đều là những hướng tốt lành của bản mệnh.\r\n\r\nDưới đây xin liệt kê các sao phục vị của mệnh tây tứ.\r\n\r\nMệnh khôn thổ, giường ngủ nên đặt ở sao phục vị hướng tây nam.\r\n\r\nMệnh cấn thổ, giường ngủ nên đặt ở sao phục vị hướng hướng đông bắc.\r\n\r\nMệnh càn kim, giường ngủ nên đặt ở sao phục vị hướng tây bắc.\r\n\r\nMệnh đoài kim, giường ngủ nên đặt ở sao phục vị hướng tây.\r\n\r\nBiểu đồ lựa chọn cát hung của 8 ngôi sao để các bạn tham khảo:\r\n\r\n4 cát tinh (tốt giảm dần):\r\n\r\nCát tinh 1: sinh khí (sao tốt nhất)\r\n\r\nCát tinh 2: thiên y (tốt nhì)\r\n\r\nCát tinh 3: diên niên (tốt ba)\r\n\r\nCát tinh 4: phục vị (tốt bốn)\r\n\r\n4 hung tinh (xấu tăng dần):\r\n\r\nHung tinh 1: họa hại (ngũ)\r\n\r\nHung tinh 2: lục sát (lục)\r\n\r\nHung tinh 3: ngũ quỷ (thất)\r\n\r\nHung tinh 4: tuyệt mệnh (bát)\r\n\r\nKTS Vũ Quang Định\r\nCông ty CP ASPACE\r\n\r\n(Theo báo Đô Thị)', '3.jpg', '3_1.jpg', '2011-01-12'),
(4, '4 biểu tượng phong thủy mang đến sức khỏe và tuổi thọ', 'Theo phong thủy, có một số con vật, cây cối được xem như biểu tượng cho sức khỏe và trường thọ.', 'Theo truyền thuyết dân gian, nai được tin là loài vật duy nhất có khả năng tìm ra loại nấm bất tử và có thể sống khá lâu năm. Từ đó, theo phong thủy, nai được xem như là biểu tượng của sức khỏe và tuổi thọ.\r\n\r\nCon ve\r\n\r\nĐây cũng được xem là loại vật tượng trưng cho sự bất tử. Những chú ve được làm từ chất liệu đá quý hay ngọc bích thường được chôn cùng với người chết với niềm tin chúng sẽ giúp người chết có được cuộc sống sung túc ở thế giới bên kia.\r\n\r\nNgoài ra, ve còn được xem như là biểu tượng của hạnh phúc và tuổi trẻ. Theo phong thủy, người trẻ tuổi hay gặp khó khăn trong công việc nên đặt 1 chú ve bằng đá trong phòng làm việc của mình.\r\n\r\nCây thông\r\n\r\nNgười châu Á thường xem thông như là một biểu tượng của sức khỏe và tuổi thọ vì chúng luôn luôn xanh tươi và có thể sống đến 1.000 năm tuổi. Các nhà phong thủy tin rằng, thông là loài cây có khả năng hóa giải được "tà khí" xâm nhập vào nhà bạn.\r\n\r\nNgoài ra, cây thông còn được tượng trưng cho tình bằng hữu thắm thiết. Chúng đại diện cho những người luôn luôn sát cánh bên bạn ngay cả nhũng lúc khó khăn.\r\n ', '\r\nTre hoặc trúc\r\n\r\nTre được xem là biểu tượng của tuổi thọ vì chúng có sức sống dẻo dai, có khả năng thích nghi cao với điều kiện thời tiết khắc nghiệt. Đây là loại cây được tin là có nhiều "năng lực” nhất; thân tre được ứng dụng nhiều trong phong thủy.\r\n\r\nNhững chiếc chuông gió hoặc ống sáo được làm từ tre hoặc trúc dùng hóa giải "tà khí" trong nhà bạn. Việc trang trí các vật dụng bằng ống tre với sợi chỉ đỏ cũng là cách hữu hiệu giúp hóa sát chiêu tài.\r\n(Theo kientruc)', '', '4.jpg', '4_1.jpg', '2011-07-11'),
(5, ' Bố trí phòng ăn theo phong phủy', 'Phòng ăn là nơi quan trọng để các thành viên trong gia đình tiếp xúc với nhau hàng ngày. Một phòng ăn có phong thủy tốt không những có thể quy tụ tâm sức của các thành viên gia đình, mà còn có khả năng chiêu dẫn tài lộc.', 'Đối với văn hóa Á Đông thì bố trí phòng ăn là điều vô cùng quan trọng, cả nhà mỗi ngày ít nhất đều cùng nhau ăn một bữa cơm tại phòng ăn giúp gia đình luôn yên ấm, chan hòa.\r\n\r\n- Cách cục\r\n\r\nTheo góc độ phong thủy học, phòng ăn của bạn cũng giống như các phòng khác, cách cục nên vuông vắn, ngay ngắn, không nên để các góc khuyết hoặc lồi ra. Hình chữ nhật hoặc vuông là cách cục tốt nhất, cũng nên trang hoàng một cách giản dị nhẹ nhàng.\r\n\r\n- Vị trí\r\n\r\nPhòng ăn nên lập tại phòng khách hoặc phòng bếp, hoặc ở tại trung tâm nhà. Bố trí nhu vậy có thể thăng thêm sự quan hệ tốt đẹp giữa cha mẹ và con cái. Phòng ăn rất kỵ lập tại nơi mà trên tầng 2 là nhà vệ sinh, bởi như thế vận khí tốt của phòng ăn sẽ bị khắc chế.\r\n\r\n- Trang hoàng\r\n\r\nNăng lượng mang lại cho toàn thể gia đình có thể nói phần lớn là từ các đồ ăn. Phòng ăn chính là nơi mọi người đi vào và ăn uống đồ ăn, cho nên nó căn bản có quan hệ rất lớn đến sự giàu có lớn của một gia đình.', '- Vị trí xấu\r\n\r\nPhòng ăn nên đặt tại vị trí trung tâm của nhà, nhưng lại không nên để đối diện trực tiếp với cửa trước cũng như cửa sau. Cũng có một số điểm cần lưu ý để tránh.\r\n\r\nVí dụ như các nhà thiết kế cao tầng thì phòng ăn không nên để ở tầng trên cao; tại phòng ăn các bên tường không nên mở các cửa đối diện với nhau, bởi khí đi vào cửa này ngay lập tức lại theo cửa kia thoát đi, sẽ không đạt tiêu chuẩn tụ khí, bất lợi cho khí vận của chủ nhà.\r\n\r\nNên tránh tận dụng các không gian gần nhà vệ sinh để làm phòng ăn của gia đình, nếu như không còn cách nào khác, thì nên cố gắng tránh xa bàn ăn.\r\n\r\n- Hòa hợp âm dương\r\n\r\nCần bố trí phòng ăn sao cho cân bằng giữa hai yếu tố âm dương, song lại phải nhấn mạnh đến yếu tố Dương của không gian. Theo tiêu chuẩn của Kinh Dịch là tỷ lệ Âm/Dương là 2/3. Để tăng gia được khí dương, ảnh ông bà tổ tiên đã mất, hoặc các đồ vật bằng xương, da thú là âm khí rất nặng không nên bày ở phòng ăn.\r\n\r\nÂm khí quá nặng sẽ hại đến vận khí của chủ nhà. Mặt khác, cũng nên lưu ý nếu Dương quá thịnh cũng dễ dẫn đến sự bất hòa trong gia đình.\r\n\r\n- Mũi tên độc\r\n\r\nMũi nhọn sắc của nhà cùng trụ cột xà sẽ tạo ra sát khí, nên dùng các đồ gia cụ và chậu cảnh để hóa giải các góc nhọn này, đồng thời nên tránh ngồi dưới xà đè, như nếu không thể tránh khỏi có thể dùng hai cây sáo trúc treo bằng dây đỏ hai bên xà. Có thể dùng đèn để chiếu sáng hóa giải sát khí.\r\n\r\nTuy nhiên cũng lưu ý các bạn khi dùng các biện pháp hóa giải cần ntham khảo ý kiến các nhà chuyên môn. Để tránh phạm sai lầm khi dùng. Bởi trên thực tế có nhiều kỹ thuật đã không được phép công khai hoặc rất khó để thực hiện.\r\n\r\n- Chọn bàn ăn\r\n\r\nHình dáng kiểu cách của bàn ăn có ý nghĩa phong thủy rất quan trọng. Bàn ăn tốt nhất là hình tròn hoặc hình bầu dục, như thế có thể tránh được các góc nhọn sắc của bàn. Nó cũng tượng trưng cho gia nghiệp hưng phong và đoàn kết. Như nếu sử dụng bàn ăn hình vuông, chữ nhật thì nên tránh không để người ngồi vào chỗ góc của bàn, tránh sát Khí xung xạ.\r\n\r\n- Phương vị cát\r\n\r\nMỗi thành viên trong gia đình nên hướng mặt bốn hướng tốt của bản mệnh mỗi người khi ăn, nếu được cả vị trí ngồi càng tốt. Nên ưu tiên cho người có quyết định tới toàn bộ gia đình.\r\n\r\nCha mẹ nên ngồi tại vị trí Diên Niên, bởi đó là đại biểu cho sự êm ấm lâu dài của gia đình. Con cái còn học tập thì nên quay về phục vị hoặc Sinh Khí thì có hiệu quả Văn Xương. Những người già nên quay về Thiên Y tất sẽ bảo toàn sức khỏe.\r\n\r\n- Gương kính\r\n\r\nTại phòng ăn nên bố trí lắp kính ở vị trí thích hợp một tấm gương lớn soi thấy bàn ăn, nó phản chiếu thức ăn tại bàn tạo ra hiệu ứng giàu có. Tuy nhiên có một lưu ý đó là tại phòng ăn độc lập. Còn nếu tại phòng ăn liền bếp tốt nhất không nên lắp gương kính. Tránh bị tai nạn ngoài ý hoặc hỏa hoạn.\r\n\r\n- Vật cát tường\r\n\r\nTại phòng ăn hợp nhất là bày tượng Tam Đa – Phúc Lộc Thọ - nó tượng trưng cho sức khỏe và trường thọ. Ngoài ra, các tranh về hoa quả, đồ ăn. Cũng mang lại vận Khí tốt. Quả quất đại biểu giàu sang, quả đào biểu hiện sức khỏe sống lâu, lựu đại biểu đông con nhiều cháu.\r\n\r\n- Dụng cụ ăn\r\n\r\nNgười Việt cùng một số nước Á Đông có thói quan dùng đũa gỗ, tre để ăn, chúng ta nên phát huy điều này, hạn chế dùng dao nĩa theo cách ăn của người phương tây, tránh bị xung xạ. Sẽ có người đặt câu hỏi tại sao người phương tây vẫn dùng dao nĩa lại vẫn giàu có.\r\n\r\nTheo quan điểm của phong thủy học phương Tây thuộc hành Kim, thể chất con người ở đó cũng mang nhiều kim tính, phù hợp với các dụng cụ ăn bằng kim loại. Còn phương Đông thuộc về Mộc nên thể chất người Á Đông kỵ bị Kim khắc nên không hợp với đồ ăn bằng kim loại.\r\n\r\nTrên thực tế thức ăn của người Tây Âu gồm nhiều thịt nên dùng dao nĩa để cắt xé rất hợp, ngược lại thức ăn của người Á Đông nhiều ngũ cốc thực vật ăn đũa phù hợp hơn.\r\n\r\nBát ăn nên dùng các hình trang trí như Rồng – thăng tiến phú quý; Biển Bức – Phúc lộc; Quả Đào – Trường thọ khỏe mạnh. Người Á Đông có thói quen sau khi ăn xong uống nước trà, để giảm trừ những vị béo, ngọt, mùi …của thức ăn còn dư.\r\n(Theo blogphongthuy)', '', '5.jpg', '5_1.jpg', '2011-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `phuong`
--

DROP TABLE IF EXISTS `phuong`;
CREATE TABLE IF NOT EXISTS `phuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `idquan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_phuong_quan` (`idquan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=324 ;

--
-- Dumping data for table `phuong`
--

INSERT INTO `phuong` (`id`, `ten`, `idquan`) VALUES
(1, 'BÌNH THỌ', 24),
(2, 'TRƯỜNG THỌ', 24),
(3, 'LINH CHIỂU', 24),
(4, ' LINH TRUNG', 24),
(5, 'LINH TÂY', 24),
(6, 'LINH XUÂN', 24),
(7, ' LINH ĐÔNG', 24),
(8, 'HIỆP BÌNH CHÁNH', 24),
(9, 'HIỆP BÌNH PHƯỚC', 24),
(10, 'TAM BÌNH', 24),
(11, 'TAM PHÚ', 24),
(12, ' BÌNH CHIỂU', 24),
(13, 'CÁC XÃ PHƯỜNG KHÁC', 24),
(14, 'HIỆP PHÚ', 9),
(15, 'TĂNG NHƠN PHÚ A', 9),
(16, 'TĂNG NHƠN PHÚ B', 9),
(17, 'LONG THẠNH MỸ', 9),
(18, 'PHƯỚC LONG A', 9),
(19, 'PHƯỚC LONG B', 9),
(20, 'TÂN PHÚ', 9),
(21, 'PHƯỚC BÌNH', 9),
(22, 'CÁC XÃ PHƯỜNG KHÁC', 9),
(23, 'Không xác định', 25),
(24, 'Phường 1', 8),
(25, 'Phường 2', 8),
(26, 'Phường 3', 8),
(27, 'Phường 4', 8),
(28, 'Phường 5', 8),
(29, 'Phường 6', 8),
(30, 'Phường 7', 8),
(66, 'Phường 8', 8),
(67, 'Phường 9', 8),
(68, 'Phường 10', 8),
(69, 'Phường 11', 8),
(70, 'Phường 12', 8),
(71, 'Phường 13', 8),
(72, 'Phường 14', 8),
(73, 'Phường 15', 8),
(74, 'An Khánh', 2),
(75, 'An Lợi Đông', 2),
(76, 'An Phú', 2),
(77, 'Bình An', 2),
(78, 'Bình Khánh', 2),
(79, 'Bình Trưng Đông', 2),
(80, 'Bình Trưng Tây', 2),
(81, 'Cát Lái', 2),
(82, 'Thành Mỹ Lợi', 2),
(83, 'Thảo Điền', 2),
(84, 'Thủ Thiêm', 2),
(87, 'Bến Nghé', 1),
(88, 'Bến Thành', 1),
(89, 'Cô Giang', 1),
(92, 'Cầu Ông Lãnh', 1),
(93, 'Đa Cao', 1),
(94, 'Cầu Kho', 1),
(95, 'Nguyễn Thái Bình', 1),
(98, 'Nguyễn Cư Triinh', 1),
(99, 'Phạm Ngũ Lão', 1),
(101, 'Tân Đình', 1),
(102, 'Phường 1', 3),
(103, 'Phường 2', 3),
(104, 'Phường 3', 3),
(105, 'Phường 4', 3),
(106, 'Phường 5', 3),
(107, 'Phường 6', 3),
(108, 'Phường 7', 3),
(109, 'Phường 8', 3),
(110, 'Phường 9', 3),
(111, 'Phường 10', 3),
(112, 'Phường 11', 3),
(113, 'Phường 12', 3),
(114, 'Phường 13', 3),
(115, 'Phường 14', 3),
(116, 'Phường 1', 4),
(117, 'Phường 2', 4),
(118, 'Phường 3', 4),
(119, 'Phường 4', 4),
(120, 'Phường 5', 4),
(121, 'Phường 6', 4),
(122, 'Phường 7', 4),
(123, 'Phường 8', 4),
(124, 'Phường 9', 4),
(125, 'Phường 10', 4),
(126, 'Phường 11', 4),
(127, 'Phường 12', 4),
(128, 'Phường 13', 4),
(129, 'Phường 14', 4),
(130, 'Phường 15', 4),
(131, 'Phường 1', 5),
(132, 'Phường 2', 5),
(133, 'Phường 3', 5),
(134, 'Phường 4', 5),
(135, 'Phường 5', 5),
(136, 'Phường 6', 5),
(137, 'Phường 7', 5),
(138, 'Phường 8', 5),
(139, 'Phường 9', 5),
(140, 'Phường 10', 5),
(141, 'Phường 11', 5),
(142, 'Phường 12', 5),
(143, 'Phường 13', 5),
(144, 'Phường 14', 5),
(145, 'Phường 15', 5),
(146, 'Phường 1', 6),
(147, 'Phường 2', 6),
(148, 'Phường 3', 6),
(149, 'Phường 4', 6),
(150, 'Phường 5', 6),
(151, 'Phường 6', 6),
(152, 'Phường 7', 6),
(153, 'Phường 8', 6),
(154, 'Phường 9', 6),
(155, 'Phường 10', 6),
(156, 'Phường 11', 6),
(157, 'Phường 12', 6),
(158, 'Phường 13', 6),
(159, 'Phường 14', 6),
(180, 'Bình Thuận', 7),
(181, 'Phú Mỹ', 7),
(182, 'Phú Thuận', 7),
(183, 'Tân Hưng', 7),
(184, 'Tân Phong', 7),
(185, 'Tân Phú', 7),
(186, 'Tân Kiểng', 7),
(187, 'Tân Quy', 7),
(188, 'Tân Thuận Đông', 7),
(189, 'Tân Thuận Tây', 7),
(190, 'Long Bình', 9),
(191, 'Long Phước', 9),
(192, 'Long Trương', 9),
(193, 'Phú Hữu', 9),
(194, 'Trường Thạnh', 9),
(195, 'Phường 1', 10),
(196, 'Phường 2', 10),
(197, 'Phường 3', 10),
(198, 'Phường 4', 10),
(199, 'Phường 5', 10),
(200, 'Phường 6', 10),
(201, 'Phường 7', 10),
(202, 'Phường 8', 10),
(203, 'Phường 9', 10),
(204, 'Phường 10', 10),
(205, 'Phường 11', 10),
(206, 'Phường 12', 10),
(207, 'Phường 13', 10),
(208, 'Phường 14', 10),
(209, 'Phường 15', 10),
(212, 'Phường 1', 11),
(213, 'Phường 2', 11),
(214, 'Phường 3', 11),
(215, 'Phường 4', 11),
(216, 'Phường 5', 11),
(217, 'Phường 6', 11),
(218, 'Phường 7', 11),
(219, 'Phường 8', 11),
(220, 'Phường 9', 11),
(221, 'Phường 10', 11),
(222, 'Phường 11', 11),
(223, 'Phường 12', 11),
(224, 'Phường 13', 11),
(225, 'Phường 14', 11),
(226, 'Phường ', 11),
(227, 'Phường 16', 11),
(228, 'An Phú Đông', 12),
(229, 'Đông Hưng Thuận', 12),
(230, 'Hiệp Thành', 12),
(231, 'Tân Chánh Hiệp', 12),
(232, 'Tân Thới Hiệp', 12),
(233, 'Tân Thới Nhất', 12),
(234, 'Thạnh Lộc', 12),
(235, 'Thạnh Xuân', 12),
(236, 'Thới An', 12),
(237, 'Trung Mỹ Tây', 12),
(238, 'An Lạc ', 14),
(239, 'An Lạc A', 14),
(240, 'Bình Hưng Hòa', 14),
(241, 'Bình Hưng Hòa A', 14),
(242, 'Bình Hưng Hòa B', 14),
(243, 'Bình Trị Đông', 14),
(244, 'Bình Trị Đông A', 14),
(245, 'Bình Trị Đông B', 14),
(246, 'Tân Tạo', 14),
(247, 'Tân Tạo A', 14),
(248, 'Hòa Thạnh', 23),
(249, 'Hiệp Tân', 23),
(250, 'Phú Thạnh', 23),
(251, 'Phú Thọ Hòa', 23),
(252, 'Phú Trung', 23),
(253, 'Sơn Kỳ', 23),
(254, 'Tân Thành', 23),
(257, 'Tân Thới Hòa', 23),
(258, 'Tân Quý', 23),
(259, 'Tân Sơn Nhì', 23),
(260, 'Tây Thạnh', 23),
(261, 'Tân Túc', 13),
(262, 'An Phú Tây', 13),
(263, 'Bình Chánh', 13),
(264, 'Bình Hưng', 13),
(265, 'Bình Lợi', 13),
(266, 'Đa Phước', 13),
(267, 'Hưng Long', 13),
(268, 'Lê Minh Xuân', 13),
(269, 'Phạm Văn Hai', 13),
(270, 'Phong Phú', 13),
(271, 'Quy Đức', 13),
(272, 'Tân Kiên', 13),
(273, 'Tân Nhựt', 13),
(274, 'Tân Quý Tây', 13),
(275, 'Vĩnh Lộc A', 13),
(276, 'Vĩnh Lộc B', 13),
(277, 'Cẩn Thạnh', 16),
(278, 'An Thới Đông', 16),
(279, 'Bình Khánh', 16),
(280, 'Long Hòa', 16),
(281, 'Lý Nhơn', 16),
(282, 'Tam Thôn Hiệp', 16),
(283, 'Thạnh An', 16),
(284, 'Củ Chi', 17),
(285, 'An Nhơn Tây', 17),
(286, 'An Phú', 17),
(287, 'Bình Mỹ', 17),
(288, 'Hòa Phú', 17),
(289, 'Nhuận Đức', 17),
(290, 'Phạm Văn Cọi', 17),
(291, 'Phước Hiệp', 17),
(292, 'Phước Thạnh', 17),
(293, 'Phước Hòa Đông', 17),
(294, 'Phú Mỹ Hưng', 17),
(295, 'Tân An Hội', 17),
(296, 'Tân Phú Trung', 17),
(297, 'Tân Thạnh Đông', 17),
(298, 'Tân Thạnh Tây', 17),
(299, 'Tân Thông Hội', 17),
(300, 'Thái Mỹ', 17),
(301, 'Trung An', 17),
(302, 'Trung Lập Hạ', 17),
(303, 'Trung Lập Thượng', 17),
(304, 'Phước Vĩnh An', 17),
(305, 'Hóc Môn', 19),
(306, 'Bá Điểm', 17),
(307, 'Đông Thạnh', 19),
(308, 'Nhị Bình', 19),
(309, 'Tân Hiệp', 19),
(310, 'Tân Thới Nhì', 19),
(311, 'Tân Xuân', 19),
(312, 'Thời Tam Thôn', 19),
(313, 'Trung Chánh', 19),
(314, 'Xuân Thới Đông', 19),
(315, 'Xuân Thới Sơn', 19),
(316, 'Xuân Thới Thượng', 19),
(317, 'Nhà Bè', 20),
(318, 'Hiệp Phước', 20),
(319, 'Long Thới', 20),
(320, 'Nhơn Đức', 20),
(321, 'Phú Xuân', 20),
(322, 'Phước Kiểng', 20),
(323, 'Phước Lộc', 20);

-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

DROP TABLE IF EXISTS `quan`;
CREATE TABLE IF NOT EXISTS `quan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `idtinh` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_quan_tinh` (`idtinh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `quan`
--

INSERT INTO `quan` (`id`, `ten`, `idtinh`) VALUES
(1, 'Quận 1', 1),
(2, 'Quận 2', 1),
(3, 'Quận 3', 1),
(4, 'Quận 4', 1),
(5, 'Quận 5', 1),
(6, 'Quận 6', 1),
(7, 'Quận 7', 1),
(8, 'Quận 8', 1),
(9, 'Quận 9', 1),
(10, 'Quận 10', 1),
(11, 'Quận 11', 1),
(12, 'Quận 12', 1),
(13, 'Huyện Bình Chánh', 1),
(14, 'Quận Bình Tân', 1),
(15, 'Quận Bình Thạnh', 1),
(16, 'Huyện Cần Giờ', 1),
(17, 'Huyện Củ Chi', 1),
(18, 'Quận Gò Vấp', 1),
(19, 'Huyện Hóc Môn', 1),
(20, 'Huyện Nhà Bè', 1),
(21, 'Quận Phú Nhuận', 1),
(22, 'Quận Tân Bình', 1),
(23, 'Quận Tân Phú', 1),
(24, 'Quận Thủ Đức', 1),
(25, 'Không xác định', 10);

-- --------------------------------------------------------

--
-- Table structure for table `quangcao`
--

DROP TABLE IF EXISTS `quangcao`;
CREATE TABLE IF NOT EXISTS `quangcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chusohuu` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ngaydang` date DEFAULT NULL,
  `sothang` int(11) DEFAULT NULL COMMENT 'thoi han la so thang quang cao ton tai',
  `hinhanh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(300) NOT NULL,
  `status` tinyint(11) DEFAULT NULL COMMENT 'status: 1-available, 0-disable, -1-remove',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quangcao`
--

INSERT INTO `quangcao` (`id`, `chusohuu`, `sdt`, `email`, `diachi`, `ngaydang`, `sothang`, `hinhanh`, `link`, `status`) VALUES
(1, 'NGUYỄN ĐỨC THỊNH', '0934100286', 'ducthinh100286@yahoo.com', '36/15 Bình Giã, P.13, Q.Tân Bình', '2011-07-13', 2, 'ad1.swf', 'http://localhost/real_estate/Source/admin/', 1),
(2, 'TRẦN TỐNG SANG', '045463465', 'kakalili@yahoo.com', '36/15 Bình Giã, P.13, Q.Tân Bình', '2011-05-14', 1, 'ad2.swf', 'http://localhost/real_estate/Source/', 0),
(3, 'ĐỖ THỊ THỦY PHƯƠNG', '09236565432', 'phuong.dothi@gmail.com', '36/15 Bình Giã, P.13, Q.Tân Bình', '2011-06-14', 1, 'ad_noimage.jpg', 'sdf sd fsd fsd fsd fsdf sdf sdf s', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quyenhansudung`
--

DROP TABLE IF EXISTS `quyenhansudung`;
CREATE TABLE IF NOT EXISTS `quyenhansudung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quyenhansudung`
--

INSERT INTO `quyenhansudung` (`id`, `ten`, `chitiet`) VALUES
(1, 'Được xuất sang exel', NULL),
(2, 'Được phép xóa thông tin', NULL),
(3, 'Chọn thay đổi khả năng mua', NULL),
(4, 'Chọn thay đổi khả năng bán', NULL),
(5, 'Tổng hợp thu chi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ten`) VALUES
(1, 'Admin'),
(2, 'Khách hàng'),
(3, 'Nhân viên'),
(4, 'Quản lý'),
(5, 'Kế toán');

-- --------------------------------------------------------

--
-- Table structure for table `thuchi`
--

DROP TABLE IF EXISTS `thuchi`;
CREATE TABLE IF NOT EXISTS `thuchi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sotien` float NOT NULL,
  `donvi` int(11) DEFAULT NULL,
  `congviec` text COLLATE utf8_unicode_ci,
  `ngay` date DEFAULT NULL,
  `nhanvien` int(11) DEFAULT NULL,
  `loai` bit(1) DEFAULT NULL COMMENT 'loai 0: thu\nloai 1: chi',
  PRIMARY KEY (`id`),
  KEY `fk_thuchi_user` (`nhanvien`),
  KEY `fk_thuchi_donvi` (`donvi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `thuchi`
--

INSERT INTO `thuchi` (`id`, `sotien`, `donvi`, `congviec`, `ngay`, `nhanvien`, `loai`) VALUES
(2, 10000000, 2, 'Đăng quảng cáo', '2011-07-11', 11, b'0'),
(3, 5432, 2, 'rweqr', '2011-07-12', 3, b'1'),
(4, 5432, 2, 'rweqr', '2011-07-17', 3, b'1'),
(5, 100000, 2, 'thủ tục pháp lý', '2011-07-04', 3, b'0'),
(6, 135000000, 2, 'mua nhà', '2011-07-20', 11, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tienich`
--

DROP TABLE IF EXISTS `tienich`;
CREATE TABLE IF NOT EXISTS `tienich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tienich`
--

INSERT INTO `tienich` (`id`, `ten`) VALUES
(1, 'Đầy đủ tiện nghi'),
(2, 'Chỗ đậu xe hơi'),
(3, 'Sân vườn'),
(4, 'Hồ bơi'),
(5, 'Gần công viên'),
(6, 'Khu dân trí cao'),
(7, 'Gần bệnh viện '),
(8, 'An ninh');

-- --------------------------------------------------------

--
-- Table structure for table `tinh`
--

DROP TABLE IF EXISTS `tinh`;
CREATE TABLE IF NOT EXISTS `tinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tinh`
--

INSERT INTO `tinh` (`id`, `ten`) VALUES
(1, 'TP Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'Bình Dương'),
(4, 'Bình Thuận'),
(5, 'Cần Thơ'),
(6, 'Đà Nẵng'),
(7, 'Đăk Lăk'),
(8, 'Đồng Nai'),
(9, 'Lâm Đồng'),
(10, 'Vũng Tàu'),
(11, 'Không xác định');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangphaply`
--

DROP TABLE IF EXISTS `tinhtrangphaply`;
CREATE TABLE IF NOT EXISTS `tinhtrangphaply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tinhtrangphaply`
--

INSERT INTO `tinhtrangphaply` (`id`, `ten`) VALUES
(1, 'Chủ quyền tư nhân'),
(2, 'Đang hợp thức hoá'),
(3, 'Giấy tay'),
(4, 'Giấy tờ hợp lệ'),
(5, 'Hợp đồng'),
(6, 'Không xác định'),
(7, 'Sổ đỏ'),
(8, 'Sổ hồng');

-- --------------------------------------------------------

--
-- Table structure for table `tuyendung`
--

DROP TABLE IF EXISTS `tuyendung`;
CREATE TABLE IF NOT EXISTS `tuyendung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name1` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `noidung1` text COLLATE utf8_unicode_ci NOT NULL,
  `name2` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `noidung2` text COLLATE utf8_unicode_ci NOT NULL,
  `name3` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `noidung3` text COLLATE utf8_unicode_ci NOT NULL,
  `name4` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `noidung4` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tuyendung`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` bit(1) NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt2` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1:admin 2:user 3:NV 4:QL 5:KT',
  `level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taikhoan_role` (`role`),
  KEY `fk_taikhoan_level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `hoten`, `gioitinh`, `diachi`, `sdt1`, `sdt2`, `role`, `level`, `status`, `ngaycapnhat`, `ip`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e', 'admin@yahoo.com', 'Administrator', b'1', '36/15 Bình Giã, P.13, Q.Tân Bình, Tp.HCM', '0934100286', '', 1, 0, 1, NULL, NULL),
(2, 'e10adc3949ba59abbe56e057f20f883e', 'phuc0903@gmail.com', 'TRẦN THỊ KIM DUNG', b'0', 'fsadf', '1224324232', '', 2, 3, 1, NULL, NULL),
(3, 'e10adc3949ba59abbe56e057f20f883e', 'thinh.nguyenduc2@gameloft.com', 'NGUYỄN ĐỨC THỊNH', b'1', '36/15 Bình Giã, P.13, Q.Tân Bình, Tp.HCM', '0934.100286', NULL, 3, 1, 1, '2011-07-14 15:32:46', NULL),
(4, 'e10adc3949ba59abbe56e057f20f883e', 'lam.hoson@gameloft.com', 'HỒ SƠN LÂM', b'1', '123 Hồng Đào Phố Thị, Hà Nội', '01234567672', '', 4, 0, 1, '2011-07-10 00:00:00', NULL),
(5, 'e10adc3949ba59abbe56e057f20f883e', 'phuong.dothithuy@yahoo.com', 'ĐỖ THỊ THỦY PHƯƠNG', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 5, 0, 1, '2011-07-27 15:40:10', NULL),
(6, 'e10adc3949ba59abbe56e057f20f883e', 'ducthinh100286@yahoo.com', 'CAO THÁI SƠN', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 1, 1, '2011-07-27 15:40:10', NULL),
(7, 'e10adc3949ba59abbe56e057f20f883e', 'xinkute@yahoo.com', 'JOHN HONG', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 1, 1, '2011-07-27 15:40:10', NULL),
(8, 'e10adc3949ba59abbe56e057f20f883e', 'khunglongcon2011@yahoo.com', 'LINDA TRẦN', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 2, 4, 1, '2011-07-27 15:40:10', NULL),
(9, 'e10adc3949ba59abbe56e057f20f883e', 'phamthimydiem@yahoo.com', 'MR. PHẠM VĂN HAI', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 2, 3, 1, '2011-07-27 15:40:10', NULL),
(10, 'e10adc3949ba59abbe56e057f20f883e', '111Yhac_ii@yahoo.com', 'TRIỆU MẪN', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 2, 1, '2011-07-27 15:40:10', NULL),
(11, 'e10adc3949ba59abbe56e057f20f883e', 'tatataa.cye@yahoo.com', 'TRẦN THỊ THÚY PHƯƠNG', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 2, 1, '2011-07-27 15:40:10', NULL),
(12, 'e10adc3949ba59abbe56e057f20f883e', '45hh44_DD@yahoo.com', 'THÚY KIỀU', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 2, 4, 1, '2011-07-27 15:40:10', NULL),
(13, 'e10adc3949ba59abbe56e057f20f883e', 'thuy.dongphuong@yahoo.com', 'NGUYỄN THÁI HỌC', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 5, 0, 1, '2011-07-27 15:40:10', NULL),
(14, 'e10adc3949ba59abbe56e057f20f883e', 'nhahangdongkhanh@yahoo.com', 'TRẦN THỊ MỸ ÁI', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 1, 1, '2011-07-27 15:40:10', NULL),
(15, 'e10adc3949ba59abbe56e057f20f883e', '__DD_DD@yahoo.com', 'KARATIMO MISSIBLE', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 4, 0, 1, '2011-07-27 15:40:10', NULL),
(18, 'e10adc3949ba59abbe56e057f20f883e', 'hoaphuonhtit@gmail.com', 'VŨ HÒA PHƯƠNG', b'0', '', '0976 937 118', '', 4, 5, 1, '2011-07-10 00:00:00', ''),
(19, 'ab1804ca6a4c0ac004f9236d52547e69', 'sieudangf2@yahoo.com', 'HỒ SƠN LÂM', b'1', 'Trường CHinh', '1234567890', '', 2, 4, 1, '2011-07-10 00:00:00', '192.168.1.22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `fk_dichvu` FOREIGN KEY (`donvitien`) REFERENCES `donvitien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_donvidv` FOREIGN KEY (`donvidv`) REFERENCES `donvidichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_huong` FOREIGN KEY (`huongnha`) REFERENCES `huongnha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_khanang` FOREIGN KEY (`khanang`) REFERENCES `khanang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_loaicanho` FOREIGN KEY (`loainha`) REFERENCES `loainha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_loaidv` FOREIGN KEY (`loaidv`) REFERENCES `loaidichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_phaply` FOREIGN KEY (`phaply`) REFERENCES `tinhtrangphaply` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_phuong` FOREIGN KEY (`phuong`) REFERENCES `phuong` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_quan` FOREIGN KEY (`quan`) REFERENCES `quan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_tinh` FOREIGN KEY (`tinh`) REFERENCES `tinh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_user` FOREIGN KEY (`chusohuu`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dichvuvip`
--
ALTER TABLE `dichvuvip`
  ADD CONSTRAINT `fk_vip_dichvu` FOREIGN KEY (`iddichvu`) REFERENCES `dichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dichvu_tienich`
--
ALTER TABLE `dichvu_tienich`
  ADD CONSTRAINT `fk_canhotienich_canho` FOREIGN KEY (`idcanho`) REFERENCES `dichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdtienich_tienich` FOREIGN KEY (`idtienich`) REFERENCES `tienich` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_hinhanh_thongtinnhadat` FOREIGN KEY (`iddichvu`) REFERENCES `dichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD CONSTRAINT `fk_khenthuong_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhanvien_quyenhan`
--
ALTER TABLE `nhanvien_quyenhan`
  ADD CONSTRAINT `fk_nhanvien_quyenhan_nhanvien` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhanvien_quyenhan_quyenhan` FOREIGN KEY (`idquyenhan`) REFERENCES `quyenhansudung` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `fk_phuong_quan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quan`
--
ALTER TABLE `quan`
  ADD CONSTRAINT `fk_quan_tinh` FOREIGN KEY (`idtinh`) REFERENCES `tinh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `thuchi`
--
ALTER TABLE `thuchi`
  ADD CONSTRAINT `fk_thuchi_donvi` FOREIGN KEY (`donvi`) REFERENCES `donvitien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thuchi_user` FOREIGN KEY (`nhanvien`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
