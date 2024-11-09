-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2024 lúc 07:33 AM
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
  `Avatar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Ten` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Ngaydat` date NOT NULL,
  `Trangthai` tinyint(1) NOT NULL COMMENT '0: Delivered, 1: Cancelled',
  `Soluong` int(11) NOT NULL,
  `Dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `MaFooter` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Avatar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGH`, `MaTK`, `MaSP`, `Soluong`) VALUES
(6, 1, 5, 2),
(10, 1, 1, 150);

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(45) NOT NULL,
  `Gia` float NOT NULL,
  `GiaKM` float DEFAULT NULL,
  `Soluong` int(11) NOT NULL,
  `Soluotmua` int(11) NOT NULL,
  `Avatar` longtext NOT NULL,
  `Mota` varchar(1000) DEFAULT NULL,
  `Danhmuc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `GiaKM`, `Soluong`, `Soluotmua`, `Avatar`, `Mota`, `Danhmuc`) VALUES
(1, 'Áo Đấu Câu Lạc Bộ Real Madrid Sân Nhà 2024-20', 149000, 129000, 200, 0, 'http://localhost/baitaplonweb/picture/1i8xoM2.jpeg', 'Hãy thể hiện niềm đam mê của bạn với đội bóng vĩ đại Real Madrid bằng bộ áo đấu chính thức mùa giải 2024/25. Với thiết kế tinh tế và hiện đại, áo mang đến sự thoải mái tối đa cho người mặc, phù hợp cho cả việc chơi thể thao và các hoạt động hàng ngày.', 'Áo bóng đá'),
(2, 'Áo Tottenham Home Kit 2024/25', 180000, 159000, 10, 0, 'http://localhost/baitaplonweb/picture/eJNZ64Y.jpeg', 'Khám phá bộ áo đấu chính thức của Tottenham Hotspur cho mùa giải 2024/25. Với thiết kế hiện đại và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.', 'Áo bóng đá'),
(3, 'Áo Liverpool Home Kit 2024/25', 160000, 139000, 10, 0, 'http://localhost/baitaplonweb/picture/eQByM69.jpeg', 'Hãy thể hiện tình yêu với Liverpool FC qua bộ áo đấu chính thức mùa giải 2024/25. Với thiết kế ấn tượng và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.', 'Áo bóng đá'),
(4, 'Áo Dortmund Home Kit 2024/25', 150000, 129000, 10, 0, 'http://localhost/baitaplonweb/picture/L6bE5e7.jpeg', 'Khám phá bộ áo đấu chính thức của Borussia Dortmund cho mùa giải 2024/25. Với thiết kế nổi bật và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.', 'Áo bóng đá'),
(5, 'Áo Chelsea Home Kit 2024/25', 140000, 119000, 10, 0, 'http://localhost/baitaplonweb/picture/WUdUp6d.jpeg', 'Khám phá bộ áo đấu chính thức của Chelsea FC cho mùa giải 2024/25. Với thiết kế sắc nét và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.', 'Áo bóng đá'),
(6, 'Áo Bóng Chuyền HĐDT', 100000, 99999, 10, 0, 'http://localhost/baitaplonweb/picture/NMZlZyy.jpeg', 'Khám phá bộ áo bóng chuyền HĐDT, được thiết kế đặc biệt cho những người yêu thích môn thể thao này. Với kiểu dáng hiện đại và màu sắc nổi bật, áo sẽ giúp bạn tự tin hơn khi thi đấu.\r\n\r\n', 'Áo bóng chuyền'),
(7, 'Áo Bóng Chuyền Nữ HĐDT', 140000, 139000, 10, 0, 'http://localhost/baitaplonweb/picture/StVhIQU.jpeg', 'Khám phá bộ áo bóng chuyền HĐDT, thiết kế dành riêng cho nữ với phong cách trẻ trung và năng động. Áo không chỉ mang lại sự thoải mái mà còn giúp bạn tự tin hơn khi thi đấu', 'Áo bóng chuyền');

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
(1, 'abc', 'abc', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_quyen`
--

CREATE TABLE `taikhoan_quyen` (
  `IDTK` int(11) NOT NULL,
  `Maquyen` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`MaBanner`,`Name`);

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
  ADD PRIMARY KEY (`IDTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `MaBanner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `MaFooter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `Maquyen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taikhoan_quyen`
--
ALTER TABLE `taikhoan_quyen`
  MODIFY `IDTK` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
