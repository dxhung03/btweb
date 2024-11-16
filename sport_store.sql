-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2024 lúc 11:36 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sport_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `MaBanner` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Avatar` varchar(500) NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`MaBanner`, `Name`, `Avatar`, `MaTK`) VALUES
(4, 'banner 1', 'picture/7d714e8e-ec8d-44a9-9b8a-60ca6a29a6c4.webp', 0),
(5, 'banner 2', 'picture/d8b7cfd2-c4dc-46b8-b101-92f206481c04.webp', 0),
(6, 'banner 3', 'picture/DALL·E 2024-11-11 13.03.09 - A sleek and modern sportswear shop website banner inspired by the layout and colors of a sports shop. Use blue and red highlights similar to the provi.webp', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `MaCTDH` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `Soluong` int(11) DEFAULT NULL,
  `Gia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`MaCTDH`, `MaDH`, `MaSP`, `Soluong`, `Gia`) VALUES
(1, 6, 2, 1, 159000),
(2, 7, 1, 1, 129000),
(3, 8, 7, 1, 139000),
(4, 9, 7, 1, 139000),
(5, 10, 14, 1, 145000),
(6, 11, 14, 1, 145000),
(7, 12, 14, 1, 145000),
(8, 13, 14, 1, 145000),
(9, 14, 7, 1, 139000),
(10, 15, 14, 1, 145000),
(11, 16, 7, 2, 139000),
(12, 17, 7, 1, 139000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `company`, `address`, `email`, `website`, `phone`, `fax`, `created_at`) VALUES
(1, 'a', 'a', '3123', 'a@gmail.com', 'a', '2311223', 'a', '2024-11-16 10:10:28'),
(2, 'a', 'a', '3123', 'a@gmail.com', 'a', '2311223', 'a', '2024-11-16 10:13:25'),
(3, 'a', 'a', 'a', 'a@gmail.com', 'a', '2311223', 'a', '2024-11-16 10:17:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `Ten` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `Ten`) VALUES
(1, 'Áo bóng đá'),
(2, 'Áo bóng chuyền'),
(3, 'Áo bóng rổ'),
(4, 'Áo game'),
(5, 'Áo câu lạc bộ'),
(6, 'Áo đội tuyển quốc gia'),
(7, 'Áo bóng đá không logo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Ngaydat` date NOT NULL,
  `Trangthai` tinyint(1) NOT NULL COMMENT '0 là đã giao,1 đã hủy',
  `Soluong` int(11) NOT NULL,
  `Dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaTK`, `MaSP`, `Ngaydat`, `Trangthai`, `Soluong`, `Dongia`) VALUES
(4, 2, 0, '2024-11-13', 0, 4, 576000),
(5, 2, 0, '2024-11-13', 0, 1, 159000),
(6, 2, 0, '2024-11-13', 0, 1, 159000),
(7, 2, 0, '2024-11-13', 0, 1, 129000),
(8, 2, 0, '2024-11-14', 0, 1, 139000),
(9, 2, 0, '2024-11-14', 0, 1, 139000),
(10, 2, 0, '2024-11-14', 0, 1, 145000),
(11, 2, 0, '2024-11-14', 0, 1, 145000),
(12, 2, 0, '2024-11-14', 0, 1, 145000),
(13, 2, 0, '2024-11-14', 0, 1, 145000),
(14, 2, 0, '2024-11-14', 0, 1, 139000),
(15, 2, 0, '2024-11-16', 0, 1, 145000),
(16, 2, 0, '2024-11-16', 0, 2, 278000),
(17, 2, 0, '2024-11-16', 0, 1, 139000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `MaFooter` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Avatar` varchar(500) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `Chinhsach` varchar(500) DEFAULT NULL,
  `Thuonghieu` varchar(500) DEFAULT NULL,
  `Lienhe` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `footer`
--

INSERT INTO `footer` (`MaFooter`, `Name`, `Avatar`, `MaTK`, `Chinhsach`, `Thuonghieu`, `Lienhe`) VALUES
(1, 'footer 1', 'picture/logo.png', 0, 'Chính sách bảo mật thông tin                                      Chính sách bảo hành và đổi trả                                  Chính sách giao nhận hàng', 'Thương hiệu HDDT', 'Email: ab@gmail.com                                                Điện thoại: 000000000                                                  Địa Chỉ: Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Soluong` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGH`, `MaTK`, `MaSP`, `Soluong`) VALUES
(1, 1, 2, '1'),
(2, 1, 7, '1'),
(18, 2, 6, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(45) NOT NULL,
  `Diachi` varchar(45) NOT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sex` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Diachi`, `Phone`, `Email`, `Age`, `Sex`) VALUES
(1, 'nguyen van a', 'ha noi', '000000000', 'a@gmail.com', 21, 'nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `Maquyen` int(11) NOT NULL,
  `Tenquyen` varchar(45) DEFAULT NULL,
  `Mota` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`Maquyen`, `Tenquyen`, `Mota`) VALUES
(1, 'admin', 'dùng quản trị trang admin'),
(2, 'customer', 'dành cho khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `MaDM` int(11) NOT NULL,
  `TenSP` varchar(45) NOT NULL,
  `Gia` float NOT NULL,
  `GiaKM` float DEFAULT NULL,
  `Soluong` int(11) NOT NULL,
  `Soluotmua` int(11) NOT NULL,
  `Avatar` longtext NOT NULL,
  `Mota` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaDM`, `TenSP`, `Gia`, `GiaKM`, `Soluong`, `Soluotmua`, `Avatar`, `Mota`) VALUES
(1, 1, 'Áo Đấu Câu Lạc Bộ Real Madrid Sân Nhà 2024-20', 149000, 129000, 200, 0, 'picture/1i8xoM2.jpeg', 'Hãy thể hiện niềm đam mê của bạn với đội bóng vĩ đại Real Madrid bằng bộ áo đấu chính thức mùa giải 2024/25. Với thiết kế tinh tế và hiện đại, áo mang đến sự thoải mái tối đa cho người mặc, phù hợp cho cả việc chơi thể thao và các hoạt động hàng ngày.'),
(2, 1, 'Áo Tottenham Home Kit 2024/25', 180000, 159000, 10, 0, 'picture/eJNZ64Y.jpeg', 'Khám phá bộ áo đấu chính thức của Tottenham Hotspur cho mùa giải 2024/25. Với thiết kế hiện đại và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(3, 1, 'Áo Liverpool Home Kit 2024/25', 160000, 139000, 10, 0, 'picture/eQByM69.jpeg', 'Hãy thể hiện tình yêu với Liverpool FC qua bộ áo đấu chính thức mùa giải 2024/25. Với thiết kế ấn tượng và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(4, 1, 'Áo Dortmund Home Kit 2024/25', 150000, 129000, 10, 0, 'picture/L6bE5e7.jpeg', 'Khám phá bộ áo đấu chính thức của Borussia Dortmund cho mùa giải 2024/25. Với thiết kế nổi bật và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(5, 1, 'Áo Chelsea Home Kit 2024/25', 140000, 119000, 10, 0, 'picture/WUdUp6d.jpeg', 'Khám phá bộ áo đấu chính thức của Chelsea FC cho mùa giải 2024/25. Với thiết kế sắc nét và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(6, 2, 'Áo Bóng Chuyền HĐDT', 100000, 99999, 10, 0, 'picture/NMZlZyy.jpeg', 'Khám phá bộ áo bóng chuyền HĐDT, được thiết kế đặc biệt cho những người yêu thích môn thể thao này. Với kiểu dáng hiện đại và màu sắc nổi bật, áo sẽ giúp bạn tự tin hơn khi thi đấu.\r\n\r\n'),
(7, 2, 'Áo Bóng Chuyền Nữ HĐDT', 140000, 139000, 10, 0, 'picture/ZB5yRBd.jpeg', 'Khám phá bộ áo bóng chuyền HĐDT, thiết kế dành riêng cho nữ với phong cách trẻ trung và năng động. Áo không chỉ mang lại sự thoải mái mà còn giúp bạn tự tin hơn khi thi đấu'),
(9, 2, 'Áo bóng chuyển nữ HDDT', 150000, 149000, 50, 0, 'picture/zJEJoFG.jpeg', 'Bộ trang phục bóng chuyền gồm áo thể thao ngắn tay màu vàng nổi bật với hai sọc chéo màu xanh, thiết kế thoáng mát và cổ áo trắng tạo điểm nhấn, phù hợp cho các hoạt động thể thao như bóng chuyền hoặc tập luyện. Kết hợp với quần thể thao màu đen dài đến giữa đùi, bộ trang phục mang lại sự thoải mái và dễ dàng vận động.'),
(11, 2, 'Bộ Trang Phục Bóng Chuyền Màu Trắng-Xanh Kèm ', 150000, 129999, 50, 0, 'picture/StVhIQU.jpeg', 'Bộ trang phục bóng chuyền gồm áo thể thao màu trắng với các chi tiết xanh ở vai và viền, mang phong cách hiện đại và năng động. Thiết kế ngắn tay và thoáng mát, áo có kiểu dáng trẻ trung, phù hợp cho các buổi tập luyện hay thi đấu.'),
(12, 4, 'Áo thi đấu Buriram United Esports', 150000, 129999, 50, 0, 'picture/sg-11134202-7rd5a-lwsbz6ogkajte7.jpg', 'Áo thi đấu Buriram United Esports phiên bản chính thức. Áo có màu đen chủ đạo, thiết kế hiện đại với các chi tiết hoạ tiết đường kẻ màu sắc nổi bật. Logo Buriram United và Yamaha được in nổi bật trên ngực áo, thể hiện sự mạnh mẽ và đẳng cấp của đội tuyển. Chất liệu vải thoáng mát, co giãn, phù hợp cho việc tập luyện và thi đấu thể thao.\r\n\r\nSản phẩm chính hãng, thích hợp cho các fan hâm mộ và những người yêu thích thể thao điện tử.'),
(13, 4, 'Áo thi đấu PUBG phiên bản đặc biệt', 140000, 129999, 50, 0, 'picture/sg-11134201-7r9c4-llq2vwy9f6w903.jpg', 'Áo thi đấu PUBG phiên bản đặc biệt, thiết kế cá tính và phong cách với tông màu xanh lá và đen mạnh mẽ. Logo PUBG được in nổi bật ở phía trước ngực. Cổ áo kiểu chữ V với viền trắng tạo điểm nhấn tinh tế. Tay áo có in quốc kỳ Việt Nam, thể hiện tinh thần yêu nước và niềm tự hào của game thủ.\r\n\r\nChất liệu vải cao cấp, thoáng mát và co giãn tốt, giúp người mặc cảm thấy thoải mái khi vận động hay thi đấu. Phù hợp cho các fan của tựa game PUBG và người yêu thích eSports.'),
(14, 3, 'Áo bóng rổ Miami Heat phiên bản đặc biệt', 160000, 145000, 50, 0, 'picture/10_1668428405.jpg', 'Áo bóng rổ Miami Heat phiên bản đặc biệt, với thiết kế màu đen chủ đạo và logo Miami in phong cách độc đáo với nhiều màu sắc rực rỡ. Số áo \"3\" nổi bật ở phía trước, thể hiện tinh thần của đội bóng và người chơi nổi tiếng. Áo được trang bị thêm logo của Nike và các nhãn hiệu tài trợ khác.\r\n\r\nChất liệu vải thể thao cao cấp, thoáng khí, tạo cảm giác thoải mái và thoát mồ hôi tốt khi chơi thể thao. Phù hợp cho các fan hâm mộ đội bóng Miami Heat hoặc những người yêu thích phong cách thời trang thể thao cá tính.'),
(15, 4, 'Áo thi đấu WACK Gaming phiên bản 2019', 150000, 129000, 50, 0, 'picture/sg-11134201-7qvfg-lfmd4imw6jqff7.jpg', 'Áo thi đấu WACK Gaming phiên bản 2019 với thiết kế nổi bật và mạnh mẽ, tông màu chủ đạo là đen và vàng cùng các chi tiết hình học sắc nét. Phía trước áo in logo WACK Gaming với biểu tượng điều khiển game, thể hiện sự cá tính và tinh thần eSports. Mặt sau áo có tên \"PLAYER\" và nhiều logo của các đối tác tài trợ, bao gồm Discord và FIFA.\r\n\r\nChất liệu vải co giãn, thoáng mát, phù hợp cho việc chơi game hoặc tập luyện thể thao. Áo thích hợp cho các game thủ chuyên nghiệp và những ai yêu thích thương hiệu WACK Gaming.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `TenTK` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `MaKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `TenTK`, `Password`, `MaKH`) VALUES
(1, 'admin', '123456', 0),
(2, 'user', '123456', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_quyen`
--

CREATE TABLE `taikhoan_quyen` (
  `IDTK` int(11) NOT NULL,
  `Maquyen` int(11) DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_quyen`
--

INSERT INTO `taikhoan_quyen` (`IDTK`, `Maquyen`, `MaTK`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`MaBanner`,`Name`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`MaCTDH`),
  ADD KEY `MaDH` (`MaDH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Chỉ mục cho bảng `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`MaFooter`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`Maquyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Chỉ mục cho bảng `taikhoan_quyen`
--
ALTER TABLE `taikhoan_quyen`
  ADD PRIMARY KEY (`IDTK`),
  ADD UNIQUE KEY `IDTK` (`MaTK`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `MaBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `MaFooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `Maquyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan_quyen`
--
ALTER TABLE `taikhoan_quyen`
  MODIFY `IDTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `chitiet_donhang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `chitiet_donhang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
