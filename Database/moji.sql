-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2021 lúc 07:22 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `moji`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_comment` int(255) NOT NULL,
  `id_parent_comment` int(255) DEFAULT NULL,
  `comment` varchar(500) NOT NULL,
  `name_comment` varchar(255) NOT NULL,
  `id_sanpham` int(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_comment`, `id_parent_comment`, `comment`, `name_comment`, `id_sanpham`, `date`) VALUES
(4, 0, '  San pham xau', 'DinhKhoi1907', 29, '2021-01-09 14:08:27.000000'),
(16, 0, '', 'DinhKhoi1907', 29, '2021-01-09 18:28:15.000000'),
(17, 0, '  123', 'DinhKhoi1907', 29, '2021-01-09 19:05:29.000000'),
(18, 0, 'Dinhkhoi1907\r\n', 'DinhKhoi1907', 29, '2021-01-09 19:05:57.000000'),
(19, 0, '  asdadas', 'DinhKhoi1907', 29, '2021-01-09 19:11:27.000000'),
(20, 4, '  123', 'DinhKhoi1907', 29, '2021-01-09 19:18:44.000000'),
(21, 4, 'MinhLuan', 'DinhKhoi1907', 29, '2021-01-09 19:19:10.000000'),
(22, 0, '  123123123', 'DinhKhoi1907', 29, '2021-01-09 19:20:56.000000'),
(23, 4, '  123', 'DinhKhoi1907', 29, '2021-01-09 19:21:09.000000'),
(24, 22, '  hay', 'DinhKhoi1907', 29, '2021-01-09 19:23:13.000000'),
(25, 24, '  cccc\r\n', 'DinhKhoi1907', 29, '2021-01-09 20:23:37.000000'),
(26, 22, 'hayhayhay\r\n  ', 'DinhKhoi1907', 29, '2021-01-09 20:23:47.000000'),
(27, 0, '  hay qua', 'minhluan', 29, '2021-01-09 20:25:41.000000'),
(28, 27, 'hay cc  ', 'minhluan', 29, '2021-01-09 20:34:00.000000'),
(29, 20, '123123  ', 'minhluan', 29, '2021-01-09 20:36:26.000000'),
(30, 25, 'tyufff', 'minhluan', 29, '2021-01-09 20:39:04.000000'),
(31, 0, '1', 'minhluan', 29, '2021-01-09 20:39:17.000000'),
(32, 31, '2\r\n', 'minhluan', 29, '2021-01-09 20:39:25.000000'),
(33, 32, '3', 'minhluan', 29, '2021-01-09 20:39:31.000000'),
(34, 33, '4', 'minhluan', 29, '2021-01-09 20:39:37.000000'),
(35, 34, '5', 'minhluan', 29, '2021-01-09 20:39:46.000000'),
(36, 0, 'Sản phẩm rất đẹp\r\n', 'DinhKhoi1907', 2, '2021-01-10 00:07:17.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdondathang`
--

CREATE TABLE `chitietdondathang` (
  `MaChiTietDonDatHang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdondathang`
--

INSERT INTO `chitietdondathang` (`MaChiTietDonDatHang`, `SoLuong`, `GiaBan`, `MaDonDatHang`, `MaSanPham`) VALUES
('06012100100', 3, 90000, '060121001', 4),
('06012100200', 1, 130000, '060121002', 3),
('16121900100', 5, 50500, '161219001', 1),
('16121900200', 2, 50500, '161219002', 1),
('22121900100', 1, 50000, '221219001', 51),
('22121900101', 1, 85000, '221219001', 52),
('22121900200', 1, 150000, '221219002', 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietloaisanpham`
--

CREATE TABLE `chitietloaisanpham` (
  `MaChiTietLoaiSanPham` int(11) NOT NULL,
  `TenChiTietLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiSanPham` int(11) NOT NULL,
  `BiXoa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietloaisanpham`
--

INSERT INTO `chitietloaisanpham` (`MaChiTietLoaiSanPham`, `TenChiTietLoaiSanPham`, `MaLoaiSanPham`, `BiXoa`) VALUES
(11, 'Gấu bông cute xinh đẹp đáng yêu', 1, 0),
(12, 'Gối chữ U', 1, 0),
(21, 'Túi đeo', 2, 0),
(22, 'Balo', 2, 0),
(31, 'Dụng cụ học tập', 3, 0),
(32, 'Sổ vở', 3, 0),
(41, 'Phụ kiện điện thoại', 4, 0),
(42, 'Máy làm tóc', 4, 0),
(51, 'Quần áo', 5, 0),
(52, 'Phụ kiện', 5, 0),
(61, 'Đồ gia dụng', 6, 0),
(62, 'Dụng cụ nhà bếp', 6, 0),
(71, 'Gương lược', 7, 0),
(72, 'Đựng mỹ phẩm', 7, 0),
(81, 'Chiết mỹ phẩm/Bình xịt', 8, 0),
(82, 'Bọc hộ chiếu', 8, 0),
(91, 'Đồ chơi', 9, 0),
(92, 'Đồ thú cưng', 9, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `TongThanhTien` int(11) DEFAULT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDonDatHang`, `NgayLap`, `TongThanhTien`, `MaTaiKhoan`, `MaTinhTrang`) VALUES
('060121001', '2021-01-06 14:32:06', 270000, 1, 4),
('060121002', '2021-01-06 19:15:54', 130000, 1, 1),
('161219001', '2019-12-16 17:15:18', 252500, 1, 2),
('161219002', '2019-12-16 17:19:43', 101000, 1, 2),
('221219001', '2019-12-22 18:34:11', 85000, 1, 2),
('221219002', '2019-12-22 19:16:08', 150000, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'MOJI', 'logo.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'Gấu bông và gối', 0),
(2, 'Túi ví', 0),
(3, 'Văn phòng phẩm', 0),
(4, 'Điện tử & Điện thoại', 0),
(5, 'Phụ kiện thời trang', 0),
(6, 'Đồ gia dụng', 0),
(7, 'Trang điểm', 0),
(8, 'Du lịch', 0),
(9, 'Đồ chơi', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaSanPham` int(11) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `SoLuongTon` int(11) DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL,
  `SoLuocXem` int(11) DEFAULT NULL,
  `MoTa` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0,
  `MaChiTietLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuocXem`, `MoTa`, `BiXoa`, `MaChiTietLoaiSanPham`, `MaHangSanXuat`) VALUES
(1, 'Chăn mền kèm gối gấu bông We bare bears Cospl', 'webarebear', 50500, '2019-12-15 00:00:00', 50, 39, 25, 'Gấu trắng phim hoạt hình We bare bear', 0, 11, 1),
(2, 'Gấu bông MJ lớn Mèo má hồng nằm 60cm', 'meomahong', 380000, '2019-12-15 00:00:00', 60, 13, 8, 'Mèo đầu to eo thon', 0, 11, 1),
(3, 'Gấu bông MJ ấm tay Khủng long mập há miệng 25', 'khunglongmap', 130000, '2019-12-15 00:00:00', 44, 16, 3, 'Khủng long miệng rất to', 0, 11, 1),
(4, 'Gấu bông MJ Cún Shiba mập cosplay 20cm - Mix', 'shibamap', 90000, '2019-12-15 00:00:00', 40, 18, 7, 'Cún shiba mập siêu dễ thương', 0, 11, 1),
(5, 'Gấu bông chữ U có mũ Stitch Sleepy tai dài ca', 'stitchsleepy', 220000, '2019-12-15 00:00:00', 50, 39, 1, 'Phim hoạt hình stitch', 0, 12, 1),
(6, 'Gấu bông chữ U Animals phối màu có tai cute', 'uanimal', 140000, '2019-12-15 00:00:00', 60, 16, 360, 'Đeo cổ thoải mái', 0, 12, 1),
(7, 'Gấu bông chữ U Fruit Watermelon Dưa hấu kèm b', 'uwatermelon', 160000, '2019-12-15 00:00:00', 45, 16, 5, 'Trái dưa hấu màu anh đào', 0, 12, 1),
(8, 'Gấu bông chữ U Black Rabbit - Đen', 'ublackrabbit', 160000, '2019-12-15 00:00:00', 40, 39, 199, 'Thỏ đen kuro kuro', 0, 12, 1),
(9, 'Túi đeo chéo vải Stitch Baby ôm người 8x13x24', 'tui deo cheo', 190000, '2019-12-15 00:00:00', 50, 13, 358, 'Túi đeo stitch dễ thương', 0, 21, 1),
(10, 'Túi đeo vải Space Moon 34x38', 'spacemoon', 120000, '2019-12-15 00:00:00', 60, 16, 199, 'Không gian và mặt trăng', 0, 21, 1),
(11, 'Túi đeo vải Little Xương rồng Cactus 34x38', 'littlecatus', 120000, '2019-12-15 00:00:00', 45, 39, 264, 'Cây xương rồng nhỏ màu xanh', 0, 21, 1),
(12, 'Túi đeo vải Snoopy nằm bẹp 35x39 - Trắng', 'snoopy', 140000, '2019-12-15 00:00:00', 40, 13, 199, 'Cún Snoopy dễ thương nằm', 0, 21, 1),
(13, 'Balo vải 3 PUBG Battle Grounds rằn ri 14x33x4', 'pubg', 300000, '2019-12-15 00:00:00', 50, 16, 264, 'Winner Winner Chicken Dinner', 0, 22, 1),
(14, 'Balo vải dù thêu Fruit Avocado Trái bơ/ Dưa h', 'avocadowatermelon', 320000, '2019-12-15 00:00:00', 60, 39, 361, 'Bơ đang là xu thế', 0, 22, 1),
(15, 'Balo vải Sesame Street want cookies 13x29x40', 'sesamestreet', 270000, '2019-12-15 00:00:00', 45, 13, 199, 'Cây mè bên dường', 0, 22, 1),
(16, 'Balo vải Maple Leaves 12x29x38 - Đen', 'mappleleaves', 300000, '2019-12-15 00:00:00', 40, 16, 264, 'Lá phong giống lá cần', 0, 22, 1),
(17, 'Bút viết Vegetable Defense cartoon - Mix', 'vegetabledefense', 25000, '2019-12-15 00:00:00', 50, 39, 199, 'Rau củ nhưng giống trái dâu or trái cà', 0, 31, 1),
(18, 'Bút viết Fruit Mango Cartoon cute - Mix', 'fruitmango', 25000, '2019-12-15 00:00:00', 60, 13, 358, 'Đây là trái xoài', 0, 31, 1),
(19, 'Bút viết Little Monster - Mix', 'littlemonster', 25000, '2019-12-15 00:00:00', 45, 16, 264, 'Quỷ nhỏ ', 0, 31, 1),
(20, 'Hộp bút MJ hologram Hamster flowers love 8x22', 'hologramhamster', 90000, '2019-12-15 00:00:00', 40, 39, 200, 'Chuột hamster ú nu ', 0, 31, 1),
(21, 'Sổ vở B5 MJ giấy đen Hamster Mouse Art Good L', 'hamsterden', 30000, '2019-12-15 00:00:00', 50, 13, 264, 'Chuột hamster extra dễ thương', 0, 32, 1),
(22, 'Sổ vở kế hoạch 100 days My Shirley Mouse Slog', 'kehoach100day', 110000, '2019-12-15 00:00:00', 60, 16, 358, 'Vở có 100 ngày fill đầy', 0, 32, 1),
(23, 'Sổ vở cao cấp bọc da nhiều mèo activities 14x', 'nhieumeo', 60000, '2019-12-15 00:00:00', 45, 39, 264, 'So many cat so cute', 0, 32, 1),
(24, 'Sổ vở từ vựng MJ Dinosaur art little friends ', 'dinisaurart', 25000, '2019-12-15 00:00:00', 40, 13, 199, 'Khủng long nhỏ bé dễ thương', 0, 32, 1),
(25, 'Ốp điện thoại Khủng long mập phun lửa', 'opkhunglong', 40000, '2019-12-15 00:00:00', 50, 16, 199, 'Mập nhưng vẫn hot', 0, 41, 1),
(26, 'Mojipop Mèo may mắn cute - Mix', 'mjphienhien', 20000, '2019-12-15 00:00:00', 60, 39, 376, 'Mèo ú đáng yêu', 0, 41, 1),
(27, 'Mojipop Starbucks Coffee Logo - Xanh rêu', 'mjpstarbuck', 20000, '2019-12-15 00:00:00', 45, 13, 199, 'Starkbuck mắc lắm', 0, 41, 1),
(28, 'Mojipop Siêu nhân Captain America basic - Đỏ', 'opcap', 20000, '2019-12-15 00:00:00', 40, 16, 199, 'Avenger Assemble!', 0, 41, 1),
(29, 'Lược giúp sấy tóc Cat Funny How are you doing', 'stcatfunny', 40000, '2019-12-15 00:00:00', 50, 39, 466, 'Lược chứ không phải máy sấy', 0, 42, 1),
(30, 'Lược giúp sấy tóc Color cán tai gấu - Mix', 'stcolor', 70000, '2019-12-15 00:00:00', 60, 13, 199, 'Đây cũng là lược', 0, 42, 1),
(31, 'Lược giúp sấy tóc Bobo cán chân mèo', 'stbobo', 70000, '2019-12-15 00:00:00', 45, 16, 203, 'Đây vẫn là lược', 0, 42, 1),
(32, 'Lược giúp sấy tóc Bobo Three lines - Mix', 'stbobothreeline', 60000, '2019-12-15 00:00:00', 40, 39, 359, 'Chỉ có lược', 0, 42, 1),
(33, 'Bộ quần áo hình thú Cat Belly - Đen - L', 'qacatbelly', 340000, '2019-12-15 00:00:00', 50, 13, 264, 'Mèo siêu to', 0, 51, 1),
(34, 'Bộ quần áo hình thú Cá mập răng lớn - Xanh in', 'qacamap', 360000, '2019-12-15 00:00:00', 60, 16, 199, 'Cá mập siêu cute', 0, 51, 1),
(35, 'Bộ quần áo hình thú Cat cute - Trắng', 'qacatcute', 290000, '2019-12-15 00:00:00', 45, 39, 358, 'Mèo siêu Omo', 0, 51, 1),
(36, 'Bộ quần áo hình thú Adventure Time Finn Smile', 'qaadventuretime', 320000, '2019-12-15 00:00:00', 40, 13, 199, 'Finn tóc vàng đẹp trai', 0, 51, 1),
(37, 'Quần chip MJ lưới Fruit Strawberry Dâu lớn - ', 'chipstrawberry', 50000, '2019-12-15 00:00:00', 50, 16, 1, 'Đỏ mặt', 0, 52, 1),
(38, 'Quần chip MJ lưới Fruit Avocado Trái bơ Carto', 'chipavocado', 50000, '2019-12-15 00:00:00', 60, 39, 358, 'Xanh mặt', 0, 52, 1),
(39, 'Quần chip MJ lưới Fruit Cherry thắt nơ - Hồng', 'chipcherryno', 50000, '2019-12-15 00:00:00', 45, 13, 264, 'Nơ cute', 0, 52, 1),
(40, 'Quần chip MJ lưới Star thắt nơ - Đen', 'chipstarno', 55000, '2019-12-15 00:00:00', 40, 16, 200, 'Quân chip...', 0, 52, 1),
(41, 'Ly cốc sứ Cat Fish Good Weather nổi cao cấp 4', 'lycatfish', 175000, '2019-12-15 00:00:00', 50, 39, 358, 'Cat trong nước nhưng không phải fish', 0, 61, 1),
(42, 'Bình nước giữ nhiệt Think Different cao cấp 5', 'binhthinkdifferent', 200000, '2019-12-15 00:00:00', 60, 13, 356, 'Do the same', 0, 61, 1),
(43, 'Bình nước giữ nhiệt Children Bear cute 400ml ', 'binhchildrenbear', 150000, '2019-12-15 00:00:00', 44, 16, 201, 'Bé gấu đáng yêu', 0, 61, 1),
(44, 'Ly cốc sứ Khủng long Little Dino Im Hungry 35', 'lylittedino', 120000, '2019-12-15 00:00:00', 40, 39, 356, 'Khủng long đói rồi', 0, 61, 1),
(45, 'Hộp cơm nhựa Little Dinosaur art funny 8x10x1', 'comlittedino', 100000, '2019-12-15 00:00:00', 50, 13, 264, 'Ăn cơm khủng long', 0, 62, 1),
(46, 'Hộp cơm lò vi sóng Khủng long baby cute 2 tần', 'combabydino', 90000, '2019-12-15 00:00:00', 60, 18, 200, 'Có thể bỏ vào lò vi sóng', 0, 62, 1),
(47, 'Hộp cơm nhựa I love Corn 2 tầng 8x9x16 - Cà r', 'comilovecorn', 60000, '2019-12-15 00:00:00', 45, 39, 264, 'Thích ăn bắp cũng thích ăn cà rốt', 0, 62, 1),
(48, 'Hộp cơm nhựa I love Bean 2 tầng 8x9x16 - Xanh', 'comilovebean', 60000, '2019-12-15 00:00:00', 40, 13, 199, 'Đậu xanh', 0, 62, 1),
(49, 'Gương gập để bàn Sunny day 15x21 - Mix', 'guongsunnyday', 50000, '2019-12-15 00:00:00', 50, 18, 356, 'Gương nắng đẹp', 0, 71, 1),
(50, 'Gương gập để bàn Leaves always collection 15x', 'guongleavesalways', 50000, '2019-12-15 00:00:00', 60, 39, 1, 'Nhiều lá lắm luôn', 0, 71, 1),
(51, 'Gương gập để bàn Forever I will love you endl', 'guongforever', 50000, '2019-12-15 00:00:00', 44, 13, 1, 'Really', 0, 71, 1),
(52, 'Gương cầm tay Heart Strawberry Rainbow Moon t', 'guongheartstraw', 85000, '2019-12-15 00:00:00', 39, 18, 1, 'Trái dâu có hình trái tim', 0, 71, 1),
(53, 'Hộp đựng mỹ phẩm Gấu nâu\'face có quai 11x18x2', 'mpgaunau', 180000, '2019-12-15 00:00:00', 50, 39, 356, 'Đựng mỹ phẩm có con gấu rất xinh', 0, 72, 1),
(54, 'Hộp đựng trang sức Basic Color cao cấp 8x17x2', 'tsnbasiccolor', 190000, '2019-12-15 00:00:00', 60, 13, 264, 'Cái này dùng đựng trang sức', 0, 72, 1),
(55, 'Túi đựng mỹ phẩm trong suốt MZ Baby Shark x W', 'mpbabyshark', 85000, '2019-12-15 00:00:00', 45, 18, 200, 'Do Do Do Do', 0, 72, 1),
(56, 'Túi đựng mỹ phẩm trong suốt MZ Vô Diện activi', 'mpvodien', 85000, '2019-12-15 00:00:00', 40, 39, 356, 'Ăn ăn ăn ăn', 0, 72, 1),
(57, 'Bộ chiết mỹ phẩm Shirley Mouse - Mix', 'cmpshirley', 75000, '2019-12-15 00:00:00', 50, 13, 264, 'Chỉ biết mickey, jerry', 0, 81, 1),
(58, 'Dụng cụ pha chiết mỹ phẩm Malian có nắp - Mix', 'cmpmalian', 45000, '2019-12-15 00:00:00', 60, 18, 200, 'Malian là ai', 0, 81, 1),
(59, 'Bộ chiết mỹ phẩm Little Forest - Mix', 'cmplittleforest', 75000, '2019-12-15 00:00:00', 45, 39, 356, 'Khu rừng nhỏ xíu, Bé Lâm đó', 0, 81, 1),
(60, 'Bộ chiết mỹ phẩm Art mini Slogan set3 - Mix', 'cpartmini', 50000, '2019-12-15 00:00:00', 40, 13, 264, 'SLOGAN là gì', 0, 81, 1),
(61, 'Passport bọc hộ chiếu MZ idol BTS cartoon Foo', 'passportbts', 95000, '2019-12-15 00:00:00', 50, 18, 200, 'Lên nan sky ơi', 0, 82, 1),
(62, 'Passport bọc hộ chiếu MZ BMO 10x14 - Mix', 'passportbmo', 95000, '2019-12-15 00:00:00', 60, 39, 356, 'Advanture time', 0, 82, 1),
(63, 'Passport bọc hộ chiếu MZ Supreme x Jordan 10x', 'passportsupreme', 95000, '2019-12-15 00:00:00', 45, 13, 264, 'Hai hãng này có chơi chung', 0, 82, 1),
(64, 'Passport bọc hộ chiếu MZ Ice bear Donut 10x14', 'passporticebear', 95000, '2019-12-15 00:00:00', 40, 18, 200, 'Gấu nghiêm túc', 0, 82, 1),
(65, 'Đồ chơi máy game cầm tay mini Máy bay phản lự', 'maybay', 60000, '2019-12-15 00:00:00', 50, 39, 356, 'Có game bắn máy bay', 0, 91, 1),
(66, 'Đồ chơi máy game cầm tay mini Steering dùng p', 'steering', 60000, '2019-12-15 00:00:00', 60, 18, 265, 'Có game đua xe', 0, 91, 1),
(67, 'Đồ chơi boardgame Bom lắc - Mix', 'bomlac', 160000, '2019-12-15 00:00:00', 45, 13, 200, 'Đánh bom với valak', 0, 91, 1),
(68, 'Đồ chơi boardgame U Lầy - Mix', 'ulay', 70000, '2019-12-15 00:00:00', 40, 39, 356, 'Uno phiên bản lầy', 0, 91, 1),
(69, 'Mũ nón thú cưng bờm Sư tử', 'mubomsutu', 70000, '2019-12-15 00:00:00', 50, 18, 264, 'Mũ nón thú cưng bờm Sư tử siêu xinh đẹp', 0, 92, 1),
(70, 'Mũ nón thú cưng tai Thỏ - Trắng', 'mutaitho', 90000, '2019-12-15 00:00:00', 60, 13, 200, 'Mũ nón thú cưng tai Thỏ - Trắng siêu xinh đẹp', 0, 92, 1),
(71, 'Bánh mì', 'carousel', 123123, '2019-12-16 03:34:56', 123, 0, 16, '123', 0, 11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenHienThi` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 0,
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  `Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DiaChi`, `DienThoai`, `Email`, `BiXoa`, `MaLoaiTaiKhoan`, `Code`) VALUES
(1, 'ndhuy', 'ndhuy', 'Đức Huy', '227 - Nguyễn Văn Cừ - Q.5', '01234567890', 'ndhuy@gmail.com', 0, 1, ''),
(5, 'admin', '$2y$10$Y9O.wrZ6mRZL7mQjrIlh3Ob7kVktimvlU8X1Xgzn6tM96q6Kqb8.O', 'Admin website', 'Baby Shop', '0909123456', 'admin@babyshop.vn', 0, 2, ''),
(68, 'phamdinhkhoi', '$2y$10$2ejFW/nL.MeuN4Wm3I7cvu62YY/kX5KjiA1mZuBxaP61mTiK.EyJG', 'DinhKhoi1907', 'tan phu, tp hcm', '0356936816', 'phamdinhkhoi19071999@gmail.com', 0, 1, ''),
(69, 'minhluan', '$2y$10$mltpX53pr2njYREKR6FIc.V0DclwevJKD0tbFnYJ5bXcTuZTcp5we', 'minhluan', 'tan phu, tp hcm', '0356936816', 'phamdinhkhoi19071999@gmail.com', 0, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Đặt hàng'),
(2, 'Đang giao hàng'),
(3, 'Thanh toán'),
(4, 'Hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeuthichsanpham`
--

CREATE TABLE `yeuthichsanpham` (
  `id` int(255) NOT NULL,
  `id_sanpham` int(255) NOT NULL,
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `yeuthichsanpham`
--

INSERT INTO `yeuthichsanpham` (`id`, `id_sanpham`, `id_user`) VALUES
(3, 1, 68),
(5, 3, 68),
(7, 6, 69),
(8, 1, 69),
(9, 2, 69),
(10, 3, 69),
(11, 4, 69),
(12, 5, 69),
(13, 23, 68),
(14, 29, 68);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD PRIMARY KEY (`MaChiTietDonDatHang`),
  ADD KEY `fk_ChiTietDonDatHang_DonDatHang1_idx` (`MaDonDatHang`),
  ADD KEY `fk_ChiTietDonDatHang_SanPham1_idx` (`MaSanPham`);

--
-- Chỉ mục cho bảng `chitietloaisanpham`
--
ALTER TABLE `chitietloaisanpham`
  ADD PRIMARY KEY (`MaChiTietLoaiSanPham`),
  ADD KEY `FK_CTLoaiSanPham_LoaiSanPham` (`MaLoaiSanPham`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDonDatHang`),
  ADD KEY `fk_DonDatHang_TaiKhoan1_idx` (`MaTaiKhoan`),
  ADD KEY `fk_DonDatHang_TinhTrang1_idx` (`MaTinhTrang`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `FK_SanPham_CTLoaiSanPham` (`MaChiTietLoaiSanPham`),
  ADD KEY `FK_SanPham_HangSanXuat` (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD KEY `fk_TaiKhoan_LoaiTaiKhoan_idx` (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`MaTinhTrang`);

--
-- Chỉ mục cho bảng `yeuthichsanpham`
--
ALTER TABLE `yeuthichsanpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_comment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `chitietloaisanpham`
--
ALTER TABLE `chitietloaisanpham`
  MODIFY `MaChiTietLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `yeuthichsanpham`
--
ALTER TABLE `yeuthichsanpham`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD CONSTRAINT `fk_ChiTietDonDatHang_DonDatHang1` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ChiTietDonDatHang_SanPham1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitietloaisanpham`
--
ALTER TABLE `chitietloaisanpham`
  ADD CONSTRAINT `FK_CTLoaiSanPham_LoaiSanPham` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`);

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `fk_DonDatHang_TaiKhoan1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DonDatHang_TinhTrang1` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SanPham_CTLoaiSanPham` FOREIGN KEY (`MaChiTietLoaiSanPham`) REFERENCES `chitietloaisanpham` (`MaChiTietLoaiSanPham`),
  ADD CONSTRAINT `FK_SanPham_HangSanXuat` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_TaiKhoan_LoaiTaiKhoan` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
