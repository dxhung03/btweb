-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2024 lúc 06:18 PM
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
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
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
(12, 17, 7, 1, 139000),
(13, 18, 1, 1, 129000),
(14, 19, 1, 249, 129000),
(15, 20, 1, 199, 129000),
(16, 21, 56, 1, 390000),
(17, 21, 2, 1, 159000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `MaKH`, `full_name`, `company`, `address`, `email`, `website`, `phone`, `fax`, `created_at`, `note`) VALUES
(1, 0, 'a', 'a', '3123', 'a@gmail.com', 'a', '2311223', 'a', '2024-11-16 10:10:28', ''),
(2, 0, 'a', 'a', '3123', 'a@gmail.com', 'a', '2311223', 'a', '2024-11-16 10:13:25', ''),
(3, 0, 'a', 'a', 'a', 'a@gmail.com', 'a', '2311223', 'a', '2024-11-16 10:17:49', ''),
(4, 0, 'Do xuan hung', 'a', 'hà nội', 'a@gmail.com', 'a', '03213214221', 'a', '2024-11-16 15:39:06', 'hàng hết'),
(5, 0, 'Do xuan hung', 'a', 'a', 'lcs00024@omeie.com', 'a', '31231231231', 'a', '2024-11-16 17:17:30', 'hàng hết');

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
(17, 2, 0, '2024-11-16', 0, 1, 139000),
(18, 15, 0, '2024-11-16', 0, 1, 129000),
(19, 15, 0, '2024-11-16', 0, 249, 32121000),
(20, 15, 0, '2024-11-16', 0, 199, 25671000),
(21, 17, 0, '2024-11-17', 0, 2, 549000);

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
  `Sex` varchar(45) DEFAULT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Diachi`, `Phone`, `Email`, `Age`, `Sex`, `MaTK`) VALUES
(11, 'Do Xuan Hung', 'hà nội', '0373603096', 'lunglinh2x@gmail.com', 21, 'nam', 16),
(12, 'tran hoang son', 'hà nội', '03213214221', 'lcs00024@omeie.com', 21, 'nam', 17);

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
  `Avatar` longtext NOT NULL,
  `Mota` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaDM`, `TenSP`, `Gia`, `GiaKM`, `Soluong`, `Avatar`, `Mota`) VALUES
(1, 5, 'Áo Đấu Câu Lạc Bộ Real Madrid Sân Nhà 2024-20', 149000, 129000, 0, 'picture/1i8xoM2.jpeg', 'Hãy thể hiện niềm đam mê của bạn với đội bóng vĩ đại Real Madrid bằng bộ áo đấu chính thức mùa giải 2024/25. Với thiết kế tinh tế và hiện đại, áo mang đến sự thoải mái tối đa cho người mặc, phù hợp cho cả việc chơi thể thao và các hoạt động hàng ngày.'),
(2, 5, 'Áo Tottenham Home Kit 2024/25', 180000, 159000, 9, 'picture/eJNZ64Y.jpeg', 'Khám phá bộ áo đấu chính thức của Tottenham Hotspur cho mùa giải 2024/25. Với thiết kế hiện đại và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(3, 5, 'Áo Liverpool Home Kit 2024/25', 160000, 139000, 10, 'picture/eQByM69.jpeg', 'Hãy thể hiện tình yêu với Liverpool FC qua bộ áo đấu chính thức mùa giải 2024/25. Với thiết kế ấn tượng và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(4, 5, 'Áo Dortmund Home Kit 2024/25', 150000, 129000, 10, 'picture/L6bE5e7.jpeg', 'Khám phá bộ áo đấu chính thức của Borussia Dortmund cho mùa giải 2024/25. Với thiết kế nổi bật và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(5, 5, 'Áo Chelsea Home Kit 2024/25', 140000, 119000, 10, 'picture/WUdUp6d.jpeg', 'Khám phá bộ áo đấu chính thức của Chelsea FC cho mùa giải 2024/25. Với thiết kế sắc nét và phong cách thể thao, áo đấu này không chỉ mang lại sự thoải mái mà còn thể hiện niềm tự hào của người hâm mộ.'),
(6, 2, 'Áo Bóng Chuyền HĐDT', 100000, 99999, 10, 'picture/NMZlZyy.jpeg', 'Khám phá bộ áo bóng chuyền HĐDT, được thiết kế đặc biệt cho những người yêu thích môn thể thao này. Với kiểu dáng hiện đại và màu sắc nổi bật, áo sẽ giúp bạn tự tin hơn khi thi đấu.\r\n\r\n'),
(7, 2, 'Áo Bóng Chuyền Nữ HĐDT', 140000, 139000, 10, 'picture/ZB5yRBd.jpeg', 'Khám phá bộ áo bóng chuyền HĐDT, thiết kế dành riêng cho nữ với phong cách trẻ trung và năng động. Áo không chỉ mang lại sự thoải mái mà còn giúp bạn tự tin hơn khi thi đấu'),
(9, 2, 'Áo bóng chuyển nữ HDDT', 150000, 149000, 50, 'picture/zJEJoFG.jpeg', 'Bộ trang phục bóng chuyền gồm áo thể thao ngắn tay màu vàng nổi bật với hai sọc chéo màu xanh, thiết kế thoáng mát và cổ áo trắng tạo điểm nhấn, phù hợp cho các hoạt động thể thao như bóng chuyền hoặc tập luyện. Kết hợp với quần thể thao màu đen dài đến giữa đùi, bộ trang phục mang lại sự thoải mái và dễ dàng vận động.'),
(11, 2, 'Bộ Trang Phục Bóng Chuyền Màu Trắng-Xanh Kèm ', 150000, 129999, 50, 'picture/StVhIQU.jpeg', 'Bộ trang phục bóng chuyền gồm áo thể thao màu trắng với các chi tiết xanh ở vai và viền, mang phong cách hiện đại và năng động. Thiết kế ngắn tay và thoáng mát, áo có kiểu dáng trẻ trung, phù hợp cho các buổi tập luyện hay thi đấu.'),
(12, 4, 'Áo thi đấu Buriram United Esports', 150000, 129999, 50, 'picture/sg-11134202-7rd5a-lwsbz6ogkajte7.jpg', 'Áo thi đấu Buriram United Esports phiên bản chính thức. Áo có màu đen chủ đạo, thiết kế hiện đại với các chi tiết hoạ tiết đường kẻ màu sắc nổi bật. Logo Buriram United và Yamaha được in nổi bật trên ngực áo, thể hiện sự mạnh mẽ và đẳng cấp của đội tuyển. Chất liệu vải thoáng mát, co giãn, phù hợp cho việc tập luyện và thi đấu thể thao.\r\n\r\nSản phẩm chính hãng, thích hợp cho các fan hâm mộ và những người yêu thích thể thao điện tử.'),
(13, 4, 'Áo thi đấu PUBG phiên bản đặc biệt', 140000, 129999, 50, 'picture/sg-11134201-7r9c4-llq2vwy9f6w903.jpg', 'Áo thi đấu PUBG phiên bản đặc biệt, thiết kế cá tính và phong cách với tông màu xanh lá và đen mạnh mẽ. Logo PUBG được in nổi bật ở phía trước ngực. Cổ áo kiểu chữ V với viền trắng tạo điểm nhấn tinh tế. Tay áo có in quốc kỳ Việt Nam, thể hiện tinh thần yêu nước và niềm tự hào của game thủ.\r\n\r\nChất liệu vải cao cấp, thoáng mát và co giãn tốt, giúp người mặc cảm thấy thoải mái khi vận động hay thi đấu. Phù hợp cho các fan của tựa game PUBG và người yêu thích eSports.'),
(14, 3, 'Áo bóng rổ Miami Heat phiên bản đặc biệt', 160000, 145000, 50, 'picture/10_1668428405.jpg', 'Áo bóng rổ Miami Heat phiên bản đặc biệt, với thiết kế màu đen chủ đạo và logo Miami in phong cách độc đáo với nhiều màu sắc rực rỡ. Số áo \"3\" nổi bật ở phía trước, thể hiện tinh thần của đội bóng và người chơi nổi tiếng. Áo được trang bị thêm logo của Nike và các nhãn hiệu tài trợ khác.\r\n\r\nChất liệu vải thể thao cao cấp, thoáng khí, tạo cảm giác thoải mái và thoát mồ hôi tốt khi chơi thể thao. Phù hợp cho các fan hâm mộ đội bóng Miami Heat hoặc những người yêu thích phong cách thời trang thể thao cá tính.'),
(15, 4, 'Áo thi đấu WACK Gaming phiên bản 2019', 150000, 129000, 50, 'picture/sg-11134201-7qvfg-lfmd4imw6jqff7.jpg', 'Áo thi đấu WACK Gaming phiên bản 2019 với thiết kế nổi bật và mạnh mẽ, tông màu chủ đạo là đen và vàng cùng các chi tiết hình học sắc nét. Phía trước áo in logo WACK Gaming với biểu tượng điều khiển game, thể hiện sự cá tính và tinh thần eSports. Mặt sau áo có tên \"PLAYER\" và nhiều logo của các đối tác tài trợ, bao gồm Discord và FIFA.\r\n\r\nChất liệu vải co giãn, thoáng mát, phù hợp cho việc chơi game hoặc tập luyện thể thao. Áo thích hợp cho các game thủ chuyên nghiệp và những ai yêu thích thương hiệu WACK Gaming.'),
(16, 6, 'Áo Đội Tuyển Anh Trắng (Replica)', 250000, 239000, 50, 'picture/Ao-doi-tuyen-anh-trang-0.jpg', 'Mô tả sản phẩm: Áo đội tuyển quốc gia Anh với thiết kế cổ tim màu xanh navy nổi bật, được làm từ chất liệu thoáng mát, co giãn tốt, phù hợp cho cả luyện tập thể thao và thời trang thường ngày. Logo đội tuyển thêu sắc nét trên ngực trái.\r\nChất liệu: Vải polyester cao cấp, thoáng khí và hút ẩm tốt.\r\nMàu sắc: Trắng phối xanh navy.\r\nKích thước: Đầy đủ các size S, M, L, XL, XXL (vui lòng chọn size khi đặt hàng).\r\nBộ sản phẩm bao gồm: 1 áo và 1 đôi vớ thể thao đồng bộ.\r\nĐặc điểm nổi bật:\r\nThiết kế tinh tế với logo đội tuyển Anh thêu nổi bật.\r\nPhần tay áo phối sọc nhỏ, tạo điểm nhấn hiện đại.\r\nChất liệu bền đẹp, thích hợp cho người yêu thích bóng đá hoặc sưu tầm áo đấu.'),
(17, 6, 'Áo Đội Tuyển Bỉ - Sân Nhà 2024 (Replica)', 250000, 239000, 50, 'picture/Ao-doi-tuyen-bi-san-nha-1.jpg', 'Mô tả sản phẩm: Áo đấu đội tuyển quốc gia Bỉ phiên bản sân nhà 2024, mang màu đỏ đậm quyền lực kết hợp với các chi tiết màu vàng kim loại và đen tinh tế. Logo đội tuyển Bỉ được thêu chính xác trên ngực trái, kèm theo biểu tượng Adidas bên ngực phải, mang lại phong cách thể thao chuyên nghiệp.\r\nChất liệu: Vải polyester cao cấp với công nghệ thoáng khí AEROREADY, đảm bảo sự thoải mái tối đa trong mọi hoạt động.\r\nMàu sắc: Đỏ phối vàng kim và đen.\r\nKích thước: Đầy đủ các size S, M, L, XL, XXL (vui lòng chọn size khi đặt hàng).\r\nĐặc điểm nổi bật:\r\nThiết kế hiện đại, đậm phong cách Bỉ với họa tiết hình học in chìm trên thân áo.\r\nTay áo phối đen tạo điểm nhấn mạnh mẽ.\r\nPhù hợp cho cả cổ động viên và người chơi thể thao.\r\nSản phẩm lý tưởng cho:\r\nNgười hâm mộ đội tuyển Bỉ.\r\nSưu tầm áo đấu bóng đá.\r\nDùng trong các trận đấu giao hữu hoặc các hoạt động thể thao ngoài trời.'),
(18, 6, 'Áo Đội Tuyển Bồ Đào Nha - Sân Nhà (Replica)', 250000, 239000, 50, 'picture/Ao-doi-tuyen-bo-dau-nha-do-0.jpg', 'Mô tả sản phẩm: Áo đấu đội tuyển quốc gia Bồ Đào Nha phiên bản sân nhà, nổi bật với màu đỏ truyền thống kết hợp với các chi tiết màu xanh lá cây đặc trưng. Logo đội tuyển được thêu trên ngực trái, mang đến vẻ chuyên nghiệp và phong cách đẳng cấp.\r\nChất liệu: Vải polyester cao cấp, thoáng khí, co giãn tốt và bền đẹp.\r\nMàu sắc: Đỏ phối xanh lá cây.\r\nKích thước: Đầy đủ các size S, M, L, XL, XXL (vui lòng chọn size khi đặt hàng).\r\nBộ sản phẩm bao gồm: 1 áo và 1 đôi vớ thể thao đồng bộ.\r\nĐặc điểm nổi bật:\r\nThiết kế cổ tim thời trang, thoải mái khi mặc.\r\nCác chi tiết thêu nổi bật và sắc nét, phù hợp cho người hâm mộ đội tuyển Bồ Đào Nha.\r\nChất liệu dễ giặt sạch, không nhăn, giữ form tốt.\r\nSản phẩm lý tưởng cho:\r\nCổ động viên đội tuyển Bồ Đào Nha.\r\nNgười chơi thể thao hoặc tham gia các hoạt động ngoại khóa.\r\nSưu tầm các mẫu áo đấu độc đáo.'),
(19, 6, 'Áo Đội Tuyển Bồ Đào Nha - Sân Khách', 250000, 239000, 50, 'picture/Ao-doi-tuyen-bo-dau-nha-san-khach-1.jpg', 'Áo Đội Tuyển Bồ Đào Nha - Sân Khách (Màu Trắng Xanh)\r\nMô tả sản phẩm: Áo đấu đội tuyển Bồ Đào Nha phiên bản sân khách, nổi bật với họa tiết vẽ tay màu xanh độc đáo trên nền trắng, mang phong cách hiện đại và khác biệt.\r\nThiết kế:\r\nCổ tròn phối đen, tạo điểm nhấn thanh lịch.\r\nPhần thân áo với họa tiết xanh lam in chìm lấy cảm hứng từ lịch sử và văn hóa.\r\nLogo đội tuyển Bồ Đào Nha thêu sắc nét trên ngực trái.\r\nBiểu tượng Nike được thêu tinh tế ở ngực phải.\r\nChất liệu: Polyester cao cấp, thoáng khí, ứng dụng công nghệ Dri-FIT giúp hút ẩm tốt.\r\nPhụ kiện đi kèm: 1 đôi vớ đồng bộ.\r\nKích thước: S, M, L, XL, XXL.\r\nPhù hợp cho: Cổ động viên đội tuyển Bồ Đào Nha, mặc thường ngày hoặc chơi thể thao'),
(20, 6, ' Áo Đội Tuyển Bồ Đào Nha - Trắng Xanh Đậm', 250000, 239000, 50, 'picture/Ao-doi-tuyen-bo-dau-nha-trang-0.jpg', 'Mô tả sản phẩm: Phiên bản áo đấu sân khách màu trắng với họa tiết xanh đậm đặc trưng, thiết kế tối giản nhưng vẫn hiện đại và phong cách.\r\nThiết kế:\r\nCổ áo bo tròn phối xanh navy.\r\nHọa tiết xanh đậm in nổi trên thân áo.\r\nLogo đội tuyển Bồ Đào Nha thêu nổi bật, sắc nét.\r\nVạt áo được cắt may tỉ mỉ, đảm bảo thoải mái khi vận động.\r\nChất liệu: Vải tổng hợp polyester mềm mại, thoáng khí.\r\nPhụ kiện đi kèm: 1 đôi vớ thể thao phối màu đồng bộ.\r\nKích thước: Đa dạng size từ S đến XXL.\r\nSử dụng: Luyện tập, cổ vũ bóng đá, hoặc mặc thời trang thường ngày.'),
(21, 6, 'Áo Đội Tuyển Brazil - Sân Khách ', 250000, 239000, 50, 'picture/Ao-doi-tuyen-brazil-xanh-0.jpg', 'Mô tả sản phẩm: Áo đấu sân khách của đội tuyển Brazil với tông màu xanh dương đậm phối sọc ngang, toát lên phong cách cổ điển nhưng không kém phần hiện đại.\r\nThiết kế:\r\nCổ tim phối xanh nhạt, tạo vẻ trẻ trung.\r\nPhần tay áo bo nhẹ, đảm bảo sự thoải mái khi vận động.\r\nLogo đội tuyển Brazil được thêu tinh xảo trên ngực trái.\r\nCác sọc ngang in chìm tạo chiều sâu và điểm nhấn cho sản phẩm.\r\nChất liệu: Vải thun co giãn 4 chiều, thoáng mát.\r\nPhụ kiện đi kèm: 1 đôi vớ thể thao xanh đồng bộ.\r\nKích thước: Đầy đủ size S, M, L, XL, XXL.\r\nPhù hợp: Fan đội tuyển Brazil, thích hợp mặc trong các buổi cổ vũ hoặc sưu tầm.'),
(22, 6, 'Áo Đội Tuyển Hà Lan - Sân Nhà', 250000, 239000, 50, 'picture/Ao-doi-tuyen-ha-lan-cam-0.jpg', 'Mô tả sản phẩm: Phiên bản áo đấu sân nhà của đội tuyển Hà Lan với tông cam rực rỡ, biểu tượng của niềm tự hào bóng đá Hà Lan.\r\nThiết kế:\r\nCổ tròn phối xanh navy, nổi bật trên nền cam chủ đạo.\r\nPhần tay áo và thân áo được bo nhẹ, tạo sự ôm vừa vặn.\r\nLogo đội tuyển Hà Lan in nổi bật, sắc nét.\r\nChất liệu co giãn nhẹ, phù hợp với mọi vận động.\r\nChất liệu: Polyester cao cấp, thoáng khí, độ bền cao.\r\nPhụ kiện đi kèm: 1 đôi vớ màu cam đồng bộ.\r\nKích thước: S, M, L, XL, XXL.\r\nÝ nghĩa: Tôn vinh màu sắc và phong cách đặc trưng của đội tuyển Hà Lan.'),
(23, 5, 'Áo Đấu Ajax Amsterdam - Sân Nhà', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lptlchdi61br21.webp', 'Mô tả: Áo thi đấu chính thức của CLB Ajax Amsterdam được thiết kế theo phong cách truyền thống với sọc đỏ nổi bật ở giữa, kết hợp hai bên màu trắng tinh tế. Phần cổ tròn và tay áo bo nhẹ tạo cảm giác thoải mái.\r\nĐặc điểm nổi bật:\r\nLogo CLB Ajax được in nổi sắc nét ở ngực trái, tạo điểm nhấn thương hiệu.\r\nNhà tài trợ Ziggo được in chính giữa áo, màu sắc đồng bộ với thiết kế tổng thể.\r\nChất liệu polyester thoáng khí, thấm hút mồ hôi, phù hợp cho các hoạt động thể thao hoặc mặc hằng ngày.\r\nĐi kèm: Quần trắng có logo CLB, tạo sự đồng bộ hoàn hảo.\r\n'),
(24, 5, 'Áo Thi Đấu CLB Paris Saint-Germain (PSG)', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lqn58yr027yq22.webp', 'Mô tả: Áo thi đấu của PSG với gam màu đen chủ đạo mang đến sự mạnh mẽ, huyền bí. Điểm nhấn đặc biệt là hai dải sọc đỏ và xanh chạy dọc giữa áo, đại diện cho quốc kỳ Pháp.\r\nĐặc điểm nổi bật:\r\nLogo PSG được in sắc nét ở ngực trái.\r\nNhà tài trợ Accor Live Limitless nằm chính giữa, màu trắng nổi bật trên nền đen.\r\nThiết kế hiện đại, đường may tinh xảo giúp ôm vừa cơ thể, tạo cảm giác vừa vặn khi mặc.\r\nChất liệu co giãn tốt, thoải mái khi vận động.\r\nĐi kèm: Quần đen có logo PSG in sắc nét.\r\n'),
(25, 5, 'Áo Thi Đấu CLB Real Madrid (Đen - Vàng)', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lqpn9zitw0r697.webp', 'Mô tả: Áo thi đấu Real Madrid phiên bản đặc biệt với màu đen mạnh mẽ kết hợp viền vàng sang trọng, mang lại cảm giác tinh tế và đẳng cấp.\r\nĐặc điểm nổi bật:\r\nLogo Real Madrid được in ở ngực trái với độ chi tiết cao.\r\nLogo tài trợ Emirates Fly Better màu vàng nổi bật, hài hòa với thiết kế.\r\nPhần viền cổ và tay áo phối màu vàng tạo điểm nhấn hiện đại.\r\nChất liệu vải mềm mại, thông thoáng, phù hợp cho cả vận động và mặc thường ngày.\r\nĐi kèm: Quần đen có sọc vàng, tạo phong cách đồng bộ.'),
(26, 5, 'Áo Thi Đấu CLB Bayern Munich (Đỏ - Đen)', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lrdamed34sk9c9.webp', 'Mô tả: Áo đấu chính thức của Bayern Munich với họa tiết độc đáo dạng caro đỏ và đen, tạo hiệu ứng bắt mắt. Thiết kế này đại diện cho sự quyết liệt và tinh thần chiến đấu của đội bóng.\r\nĐặc điểm nổi bật:\r\nLogo Bayern Munich in rõ nét, kết hợp nhà tài trợ Telekom (T-Mobile) nằm giữa áo.\r\nHọa tiết in sắc nét, chất liệu vải mịn, thấm hút mồ hôi tốt.\r\nĐường chỉ may chắc chắn, đảm bảo độ bền cao khi sử dụng.\r\nĐi kèm: Quần đen với logo CLB Bayern Munich in ở bên hông.'),
(27, 5, 'Áo Thi Đấu Real Madrid (Xanh Đen)', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lrdgpnmu646110.webp', 'Mô tả: Phiên bản áo đấu sân khách của Real Madrid mang màu xanh đen hiện đại, phối họa tiết gợn sóng độc đáo, mang đến cảm giác thời trang và năng động.\r\nĐặc điểm nổi bật:\r\nLogo Real Madrid và logo FIFA được in chính xác, chi tiết.\r\nLogo Respect ở tay áo tượng trưng cho tinh thần fair play.\r\nThiết kế tay áo ngắn với đường may tinh xảo, chất liệu mềm nhẹ, tạo sự thoải mái.\r\nĐi kèm: Quần đen đồng bộ, in logo CLB sắc nét.'),
(28, 5, 'Áo Thi Đấu CLB Arsenal (Trắng - Họa Tiết Đỏ X', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lsqswbnxgm1le9.webp', 'Mô tả: Áo đấu Arsenal mùa giải mới mang phong cách phá cách với nền trắng chủ đạo, kết hợp họa tiết đỏ và xanh độc đáo, làm nổi bật sự trẻ trung và hiện đại.\r\nĐặc điểm nổi bật:\r\nLogo Arsenal được in rõ ràng ở ngực trái.\r\nNhà tài trợ Emirates Fly Better nổi bật với màu đen tương phản.\r\nChất liệu vải mềm mại, co giãn tốt, thích hợp cho mọi loại vận động.\r\nĐi kèm: Quần xanh với logo Arsenal, đồng bộ với thiết kế áo.'),
(29, 5, 'Áo Thi Đấu CLB Manchester City (Xanh Nhạt)', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lubwgkysvfa705.webp', 'Mô tả: Áo thi đấu của Manchester City với màu xanh nhạt làm chủ đạo, được phối họa tiết vẽ tay độc đáo, tạo cảm giác tươi mới và đầy năng lượng.\r\nĐặc điểm nổi bật:\r\nLogo CLB và nhà tài trợ Etihad Airways được in sắc nét, nổi bật trên nền áo.\r\nChất liệu co giãn, thoáng khí, mang lại cảm giác dễ chịu khi mặc.\r\nKiểu dáng trẻ trung, phù hợp cho cả nam và nữ.\r\nĐi kèm: Quần xanh đậm với logo Manchester City.'),
(30, 5, 'Áo Thi Đấu Đội Tuyển Croatia (Caro Đỏ Trắng)', 250000, 239000, 50, 'picture/vn-11134207-7r98o-lww9jd75dsd7f0@resize_w900_nl.webp', 'Mô tả: Áo đấu chính thức của đội tuyển Croatia với thiết kế caro đỏ-trắng đặc trưng, thể hiện niềm tự hào dân tộc.\r\nĐặc điểm nổi bật:\r\nLogo đội tuyển quốc gia Croatia in ở ngực trái, tạo dấu ấn độc đáo.\r\nPhom dáng thoải mái, phù hợp với mọi vóc dáng.\r\nChất liệu cao cấp, không gây kích ứng da, phù hợp cho cả vận động mạnh.\r\nĐi kèm: Quần trắng đơn giản, hài hòa với thiết kế áo.'),
(31, 7, 'Bộ Quần Áo Egan Kira (Màu Đỏ)', 200000, 190000, 50, 'picture/quan-ao-egan-kira-do-0_large.jpg', 'Mô tả: Bộ quần áo thể thao Egan Kira màu đỏ với thiết kế đơn giản mà ấn tượng. Phần vai phối màu xanh ngọc tạo điểm nhấn nổi bật trên nền đỏ, thể hiện sự năng động và tinh thần thể thao mạnh mẽ.\r\nĐặc điểm nổi bật:\r\nÁo cổ tim hiện đại, may viền gọn gàng, tăng sự thoải mái khi vận động.\r\nLogo Egan in sắc nét ở ngực trái, tạo dấu ấn thương hiệu.\r\nChất liệu cao cấp, thoáng khí, thấm hút mồ hôi tốt.\r\nQuần đỏ đồng bộ với chi tiết logo nhỏ gọn, tạo sự hài hòa.\r\nPhù hợp với: Các môn thể thao như bóng đá, bóng rổ, hoặc mặc thường ngày.'),
(32, 7, 'Bộ Quần Áo Egan Kira (Màu Kem)', 200000, 190000, 50, 'picture/quan-ao-egan-kira-kem-0_large.jpg', 'Mô tả: Thiết kế thanh lịch với màu kem làm chủ đạo, phối họa tiết vai đen và cam mạnh mẽ. Đây là lựa chọn lý tưởng cho những ai yêu thích phong cách tinh tế.\r\nĐặc điểm nổi bật:\r\nPhần họa tiết vai phối màu nổi bật, mang lại cảm giác trẻ trung và năng động.\r\nChất liệu mềm mại, không gây kích ứng da.\r\nQuần đen đồng bộ, dáng vừa vặn, thoải mái khi vận động.\r\nPhù hợp với: Luyện tập hàng ngày, thi đấu, hoặc các hoạt động dã ngoại.\r\n'),
(33, 7, 'Bộ Quần Áo Egan Kira (Trắng - Hồng)', 200000, 190000, 50, 'picture/quan-ao-egan-kira-trang-hong-0_large.jpg', 'Mô tả: Bộ quần áo Egan Kira màu trắng phối hồng tinh tế, mang lại sự trẻ trung và hiện đại. Thiết kế này phù hợp cho cả nam và nữ yêu thích phong cách nhẹ nhàng.\r\nĐặc điểm nổi bật:\r\nPhần vai phối màu hồng pastel, tạo điểm nhấn mềm mại.\r\nChất liệu thấm hút mồ hôi tốt, giữ cơ thể luôn khô thoáng.\r\nQuần đen với kiểu dáng thể thao, dễ dàng phối hợp với các loại áo khác.\r\nPhù hợp với: Các hoạt động thể thao và mặc thường ngày.'),
(34, 7, 'Bộ Quần Áo Egan Kira (Trắng - Xanh Dương)', 200000, 190000, 50, 'picture/quan-ao-cv-400-trang_large.jpg', 'Mô tả: Bộ quần áo thể thao với nền trắng kết hợp xanh dương và xanh lá cây, mang phong cách tươi trẻ và đầy sức sống.\r\nĐặc điểm nổi bật:\r\nPhần vai được phối họa tiết xanh độc đáo, tạo cảm giác năng động.\r\nChất liệu nhẹ, mềm, thoáng khí, phù hợp cho các hoạt động ngoài trời.\r\nQuần xanh navy tối màu, mang lại sự đồng bộ và tính thẩm mỹ cao.\r\nPhù hợp với: Mặc tập luyện hoặc trong các buổi giao lưu thể thao.'),
(35, 7, 'Bộ Quần Áo Egan Kira (Xanh Ngọc)', 200000, 190000, 50, 'picture/quan-ao-egan-kira-xanh-ngoc-0_large.jpg', 'Mô tả: Màu xanh ngọc trẻ trung, phối họa tiết cam nổi bật ở phần vai và tay áo. Bộ trang phục này toát lên phong cách thể thao và hiện đại.\r\nĐặc điểm nổi bật:\r\nChất liệu polyester cao cấp, độ co giãn tốt, thoải mái khi vận động.\r\nÁo cổ tim với đường may chắc chắn, giữ phom dáng tốt sau nhiều lần giặt.\r\nQuần xanh ngọc đồng bộ, giúp tổng thể trang phục hài hòa hơn.\r\nPhù hợp với: Các hoạt động thể thao chuyên nghiệp và không chuyên.'),
(36, 7, 'Bộ Quần Áo CV 400 (Cam)', 200000, 190000, 50, 'picture/quan-ao-cv-400-cam_large.jpg', 'Mô tả: Bộ quần áo CV 400 màu cam sáng với thiết kế họa tiết cách điệu, mang đến phong cách thời trang nổi bật và tràn đầy năng lượng.\r\nĐặc điểm nổi bật:\r\nÁo phối họa tiết in chìm phía trước, tạo chiều sâu cho thiết kế.\r\nPhần cổ và tay áo được bo viền đen, tăng thêm điểm nhấn cá tính.\r\nQuần xanh đậm phối viền cam, đồng bộ với áo.\r\nPhù hợp với: Mặc đi tập gym, thi đấu thể thao hoặc mặc nhóm.'),
(37, 7, 'Bộ Quần Áo CV 400 (Hồng)', 200000, 190000, 50, 'picture/quan-ao-cv-400-hong_large.jpg', 'Mô tả: Thiết kế ngọt ngào với màu hồng pastel phối họa tiết in chìm, phù hợp cho những ai yêu thích phong cách thể thao nữ tính nhưng không kém phần năng động.\r\nĐặc điểm nổi bật:\r\nChất liệu vải cao cấp, co giãn 4 chiều, ôm sát cơ thể mà vẫn thoải mái.\r\nHọa tiết nhẹ nhàng nhưng nổi bật, tôn lên cá tính riêng.\r\nQuần xanh đậm với chi tiết hồng tinh tế ở bên hông.\r\nPhù hợp với: Mặc đi chơi, tập luyện hoặc làm đồng phục nhóm.'),
(38, 7, 'Bộ Quần Áo CV 400 (Kem)', 200000, 190000, 50, 'picture/quan-ao-cv-400-kem_large.jpg', 'Mô tả: Bộ quần áo CV 400 với màu kem nền nã, phù hợp cho những ai yêu thích phong cách thể thao lịch lãm và nhẹ nhàng.\r\nĐặc điểm nổi bật:\r\nÁo phối họa tiết cam và đen ở vai, mang lại vẻ ngoài cuốn hút.\r\nChất liệu nhẹ, mát, không gây bết dính khi tập luyện.\r\nQuần xanh đậm phối chi tiết kem, hài hòa với tổng thể trang phục.\r\nPhù hợp với: Các hoạt động ngoài trời hoặc tập luyện thể dục thể thao.\r\n'),
(39, 7, 'Bộ Quần Áo CV 400 (Trắng)', 200000, 190000, 50, 'picture/quan-ao-cv-400-trang_large.jpg', 'Mô tả: Sự kết hợp giữa trắng và các chi tiết xanh lá/xanh navy mang lại sự trẻ trung và năng động cho bộ quần áo thể thao này.\r\nĐặc điểm nổi bật:\r\nHọa tiết in chìm mang tính thẩm mỹ cao.\r\nThiết kế thoáng mát, phù hợp với các hoạt động đòi hỏi vận động nhiều.\r\nQuần xanh navy phối chi tiết xanh lá, tạo cảm giác khỏe khoắn.\r\nPhù hợp với: Đồng phục nhóm, đội bóng hoặc mặc thường ngày.'),
(40, 2, 'Bộ Quần Áo Bóng Chuyền Nam Bulbal Lineage (Và', 300000, 290000, 50, 'picture/BO-QUAN-AO-BONG-CHUYEN-NAM-BULBAL-LINEAGE-VANG-1-scaled.jpg', 'Mô tả: Bộ quần áo bóng chuyền Bulbal Lineage màu vàng kết hợp ombre xanh đầy năng lượng, mang phong cách trẻ trung, mạnh mẽ. Thiết kế đường viền đen tại cổ và tay áo tạo điểm nhấn hài hòa.\r\nĐặc điểm nổi bật:\r\nChất liệu vải cao cấp thoáng khí, co giãn 4 chiều.\r\nÁo dáng cổ tim, đường may chắc chắn, không gây kích ứng da.\r\nQuần xanh đậm đồng bộ, thiết kế tối giản nhưng không kém phần thời trang.\r\nPhù hợp với: Tập luyện bóng chuyền hoặc mặc thể thao thường ngày.'),
(41, 2, 'Bộ Quần Áo Bóng Chuyền Nam Bulbal Lineage (Tr', 300000, 290000, 50, 'picture/BO-QUAN-AO-BONG-CHUYEN-NAM-BULBAL-LINEAGE-TRANG-1-scaled.jpg', 'Mô tả: Mẫu thiết kế với gam màu trắng chủ đạo, phối các chi tiết xanh navy và viền cổ đỏ mang phong cách lịch lãm, thanh thoát. Đây là sản phẩm lý tưởng cho những người chơi bóng chuyền yêu thích sự tinh tế.\r\nĐặc điểm nổi bật:\r\nLogo Bulbal in sắc nét, gia công cẩn thận, bền màu.\r\nChất liệu vải thoáng mát, thấm hút mồ hôi hiệu quả.\r\nQuần xanh đậm dễ phối đồ, mang lại sự đồng bộ.\r\nPhù hợp với: Các giải đấu bóng chuyền hoặc tập luyện thể thao.\r\n'),
(42, 2, 'Bộ Quần Áo Bóng Chuyền Nam Bulbal Lineage (Xa', 300000, 290000, 50, 'picture/BO-QUAN-AO-BONG-CHUYEN-NAM-BULBAL-LINEAGE-XANH-NGOC-1-scaled.jpg', 'Mô tả: Thiết kế gam màu xanh ngọc mát mẻ phối ombre xanh đậm đầy phong cách, thể hiện tinh thần thể thao và hiện đại.\r\nĐặc điểm nổi bật:\r\nPhần thân áo in họa tiết chìm, tạo chiều sâu cho thiết kế.\r\nÁo cổ tim với viền xanh navy tạo điểm nhấn trẻ trung.\r\nQuần xanh navy phối hợp đồng bộ, chất liệu thoáng khí, nhẹ nhàng.\r\nPhù hợp với: Các hoạt động thể thao ngoài trời và trong nhà.'),
(43, 2, 'Bộ Quần Áo Bóng Chuyền Nữ Bulbal Baro (Đỏ)', 300000, 290000, 50, 'picture/BO-QUAN-AO-BONG-CHUYEN-NU-BULBAL-BARO-DO-1-scaled.jpg', 'Mô tả: Bộ đồ thể thao nữ Bulbal Baro màu đỏ với thiết kế trẻ trung, phối vai xanh navy tạo sự nổi bật. Đây là lựa chọn hoàn hảo cho các bạn nữ yêu thích sự năng động và khỏe khoắn.\r\nĐặc điểm nổi bật:\r\nChất liệu vải co giãn tốt, mềm mại, không gây kích ứng.\r\nÁo dáng ôm nhẹ, tôn dáng cơ thể, phù hợp với nhiều vóc dáng.\r\nQuần xanh navy dáng vừa vặn, thoải mái khi vận động.\r\nPhù hợp với: Tập luyện thể thao, chơi bóng chuyền hoặc hoạt động thường ngày.\r\n'),
(44, 2, 'Bộ Quần Áo Bóng Chuyền Nữ Bulbal Baro (Kem)', 300000, 290000, 50, 'picture/BO-QUAN-AO-BONG-CHUYEN-NU-BULBAL-BARO-KEM-1-scaled.jpg', 'Mô tả: Thiết kế gam màu kem tinh tế phối với vai đen, sản phẩm toát lên vẻ thanh lịch và phong cách thời trang hiện đại.\r\nĐặc điểm nổi bật:\r\nHọa tiết in chìm sắc nét trên thân áo, mang lại sự độc đáo.\r\nCổ tim được bo viền đen, tăng thêm sự hiện đại.\r\nQuần đen đồng bộ, chi tiết viền cam nổi bật, mang lại sự năng động.\r\nPhù hợp với: Thi đấu, luyện tập thể thao, hoặc mặc đồng phục nhóm.'),
(45, 3, 'Áo NBA All-Star', 350000, 329000, 50, 'picture/293_1659423673.jpg', 'Mô tả: Áo bóng rổ NBA All-Star với gam màu xanh ngọc nổi bật, họa tiết bóng rổ, ngôi sao cùng con số 23 ấn tượng, dành riêng cho các fan yêu thích phong cách cổ điển và năng động.\r\nĐặc điểm nổi bật:\r\nChất liệu vải lưới thể thao thoáng khí, thấm hút mồ hôi tốt.\r\nThiết kế họa tiết độc đáo, mang tinh thần của các trận đấu All-Star.\r\nLogo NBA Classic được in ở góc dưới, đảm bảo chất lượng và phong cách.\r\nPhù hợp với: Chơi bóng rổ, mặc thường ngày, hoặc sưu tầm.\r\n'),
(46, 3, ' Áo NBA Phoenix Suns', 350000, 329000, 50, 'picture/2551_1691849162.jpg', 'Mô tả: Thiết kế độc đáo với họa tiết mô phỏng cảnh hoàng hôn The Valley đặc trưng của đội bóng Phoenix Suns. Số áo 35 và logo đội bóng in sắc nét.\r\nĐặc điểm nổi bật:\r\nVải cao cấp mềm mại, nhẹ nhàng, không gây khó chịu khi vận động.\r\nHọa tiết chuyển màu gradient kết hợp logo PayPal của nhà tài trợ.\r\nĐường chỉ may chắc chắn, giữ dáng áo lâu bền.\r\nPhù hợp với: Người chơi bóng rổ chuyên nghiệp hoặc các fan hâm mộ của Phoenix Suns.\r\n'),
(47, 3, 'Áo NBA Utah Jazz ', 350000, 329000, 50, 'picture/3448_1659432749.jpg', 'Mô tả: Áo bóng rổ Utah Jazz với thiết kế lấy cảm hứng từ những ngọn núi, kết hợp màu sắc tím, cam và xanh độc đáo. Đây là phiên bản kỷ niệm của đội bóng, dành cho các tín đồ của Jazz.\r\nĐặc điểm nổi bật:\r\nChất liệu lưới thể thao co giãn, bền đẹp.\r\nLogo Hardwood Classic thể hiện tính biểu tượng của thiết kế.\r\nThiết kế không tay, dễ dàng phối hợp với áo lót tay dài.\r\nPhù hợp với: Các trận đấu hoặc mặc hàng ngày.'),
(48, 3, 'Áo NBA Vancouver Grizzlies', 350000, 329000, 50, 'picture/5108_1691924355.jpg', 'Mô tả: Thiết kế đậm chất cổ điển của Vancouver Grizzlies với gam màu xanh dương phối trắng, điểm nhấn là logo đội bóng và họa tiết tribal độc đáo trên vai áo.\r\nĐặc điểm nổi bật:\r\nVải lưới thoáng mát, thích hợp với mọi điều kiện thời tiết.\r\nLogo Grizzlies sắc nét, thể hiện tinh thần chiến đấu của đội bóng.\r\nPhần viền cổ in họa tiết độc đáo, mang phong cách vintage.\r\nPhù hợp với: Fan sưu tầm các mẫu áo cổ điển hoặc người chơi bóng rổ.'),
(49, 3, 'Áo NBA Los Angeles Lakers', 350000, 329000, 50, 'picture/4807_1659515389.jpg', 'Mô tả: Mẫu áo Lakers màu xanh nhạt, thiết kế hoài cổ với số 8 nổi bật, gợi nhớ đến những năm tháng đỉnh cao của đội bóng.\r\nĐặc điểm nổi bật:\r\nChất liệu nhẹ, thoáng khí, thích hợp cho cả chơi bóng rổ và mặc thường ngày.\r\nLogo Hardwood Classic và NBA đảm bảo chất lượng chính hãng.\r\nThiết kế cổ điển, dễ phối đồ, phù hợp với mọi phong cách.\r\nPhù hợp với: Fan của Los Angeles Lakers và các hoạt động thể thao.'),
(51, 3, 'Áo NBA Miami Heat', 350000, 329000, 50, 'picture/5717_1668426678.jpg', 'Mô tả: Lấy cảm hứng từ phong cách Miami Vice, áo bóng rổ Miami Heat mang tông màu neon rực rỡ, logo hiện đại với phong cách retro độc đáo.\r\nĐặc điểm nổi bật:\r\nHọa tiết phối màu neon, tạo sự nổi bật và cuốn hút.\r\nChất liệu thoáng mát, giữ cơ thể khô thoáng khi vận động.\r\nSố 14 in rõ nét, mang lại cảm giác trẻ trung.\r\nPhù hợp với: Người yêu thích phong cách retro hoặc các fan của Miami Heat.'),
(52, 3, 'Áo NBA Los Angeles Lakers ', 350000, 329000, 50, 'picture/5922_1712740041.jpg', 'Mô tả: Áo bóng rổ màu tím với số 24 biểu tượng, tưởng nhớ huyền thoại của Lakers. Thiết kế mang phong cách hoài cổ, thể hiện sự tôn trọng với lịch sử đội bóng.\r\nĐặc điểm nổi bật:\r\nVải lưới mềm mại, tạo cảm giác thoải mái khi mặc.\r\nHọa tiết in chìm tinh tế trên toàn bộ thân áo.\r\nThiết kế vừa vặn, phù hợp với mọi dáng người.\r\nPhù hợp với: Fan của Lakers hoặc sưu tầm áo bóng rổ đặc biệt.'),
(53, 3, 'Áo NBA Portland Trail Blazers', 350000, 329000, 50, 'picture/8054_1668166264.jpg', 'Mô tả: Thiết kế đậm chất Oregon với gam màu nâu độc đáo, logo \"Oregon\" và số 0 tạo sự khác biệt, đại diện cho Portland Trail Blazers.\r\nĐặc điểm nổi bật:\r\nHọa tiết sọc ngang trên thân áo, tạo cảm giác khỏe khoắn.\r\nChất liệu cao cấp, đảm bảo độ bền lâu dài.\r\nLogo NBA Classic in ở viền áo, tăng tính thẩm mỹ.\r\nPhù hợp với: Các trận đấu và hoạt động ngoài trời.'),
(54, 3, 'Áo NBA Detroit Pistons', 350000, 329000, 50, 'picture/9472_1667223836.jpg', 'Mô tả: Áo bóng rổ Detroit Pistons với gam màu xanh ngọc nổi bật, logo đội bóng in chi tiết và số 33 huyền thoại. Đây là mẫu áo lý tưởng dành cho các fan yêu thích Pistons.\r\nĐặc điểm nổi bật:\r\nChất liệu cao cấp thoáng khí, giữ cơ thể mát mẻ khi vận động.\r\nLogo Pistons in lớn ở mặt trước, thể hiện tinh thần đội bóng.\r\nViền áo màu vàng và đỏ tạo điểm nhấn hoàn hảo.\r\nPhù hợp với: Fan Pistons, sưu tầm hoặc mặc trong các trận đấu bóng rổ.'),
(55, 4, 'Áo Đấu Free Fire EVOS', 400000, 390000, 50, 'picture/sg-11134201-7qvg8-lgeyb108ihmd2e.jpg', 'Mô tả: Áo đấu chính thức của đội tuyển EVOS Free Fire, với gam màu xanh trắng mạnh mẽ và hình ảnh biểu tượng hổ EVOS ấn tượng. Thiết kế phù hợp cho các game thủ chuyên nghiệp hoặc người hâm mộ thể thao điện tử.\r\nĐặc điểm nổi bật:\r\nChất liệu vải polyester cao cấp, thoáng khí, thấm hút mồ hôi.\r\nHọa tiết logo EVOS sắc nét in trước ngực, thiết kế trẻ trung.\r\nPhù hợp cho cả luyện tập và tham gia sự kiện eSports.\r\nPhù hợp với: Fan của EVOS hoặc người yêu thích Free Fire.'),
(56, 4, 'Áo Đấu Team Heretics', 400000, 390000, 49, 'picture/sg-11134201-7rd74-lxb7oj677u9557.jpg', 'Mô tả: Áo đấu chính thức của Team Heretics, thiết kế sang trọng với sự kết hợp của màu đen và vàng. Biểu tượng logo San Miguel và Red Bull tạo điểm nhấn đậm chất chuyên nghiệp.\r\nĐặc điểm nổi bật:\r\nChất liệu cao cấp, mềm mại và dễ chịu khi vận động.\r\nLogo và họa tiết in chất lượng cao, không phai màu sau nhiều lần giặt.\r\nCổ tròn viền vàng, mang lại sự thoải mái khi mặc.\r\nPhù hợp với: Các buổi thi đấu eSports, sưu tầm, hoặc fan của Team Heretics.'),
(57, 4, 'Áo Đấu Gen.G', 400000, 390000, 50, 'picture/sg-11134201-7rdyl-m0jyvhoky1vm8b.jpg', 'Mô tả: Áo đấu eSports của Gen.G với gam màu trắng phối vàng tối giản nhưng nổi bật. Phù hợp cho các game thủ và người hâm mộ yêu thích phong cách chuyên nghiệp.\r\nĐặc điểm nổi bật:\r\nThiết kế cổ tròn hiện đại, đường chỉ may chắc chắn.\r\nChất liệu thấm hút mồ hôi, mang lại cảm giác thoải mái.\r\nLogo Gen.G và các nhà tài trợ được in sắc nét.\r\nPhù hợp với: Fan của Gen.G và các giải đấu eSports lớn'),
(58, 4, 'Áo Đấu Nexplay EVOS', 400000, 390000, 50, 'picture/sg-11134201-7rdyu-lzlsp5n1peno19.jpg', 'Mô tả: Thiết kế đặc sắc với gam màu trắng xám và họa tiết mảng màu độc đáo, biểu tượng đội tuyển Nexplay EVOS được in nổi bật trước ngực.\r\nĐặc điểm nổi bật:\r\nChất liệu thấm hút mồ hôi tốt, phù hợp cho cả luyện tập và thi đấu.\r\nLogo và họa tiết được in bằng công nghệ cao, bền màu.\r\nPhần cổ tim ôm sát, mang lại cảm giác thoải mái.\r\nPhù hợp với: Fan của Nexplay EVOS và các hoạt động eSports.'),
(59, 4, 'Áo Đấu Bacon Time', 400000, 390000, 50, 'picture/sg-11134202-7rd6a-lva80egml4vdda.jpg', 'Mô tả: Áo đấu đội tuyển Bacon Time với màu trắng chủ đạo phối viền hồng ngọt ngào, logo Bacon Time và NaRaYa in sắc nét.\r\nĐặc điểm nổi bật:\r\nVải lưới nhẹ, mềm mại, giúp giữ cơ thể luôn thoáng mát.\r\nThiết kế viền cổ tròn màu hồng nổi bật, dễ phối đồ.\r\nLogo nhà tài trợ như Red Bull, Burger King được in sắc nét.\r\nPhù hợp với: Fan của Bacon Time hoặc mặc đi chơi, đi sự kiện.\r\n'),
(60, 4, 'Áo Đấu Mobile Legends Biznet', 400000, 390000, 50, 'picture/sg-11134202-7rdwa-m1hzhzamd3jzef.jpg', 'Mô tả: Áo đấu chính thức cho giải đấu Mobile Legends, với gam màu vàng nổi bật và họa tiết đường nét độc đáo. Logo Biznet và các nhà tài trợ được in trước ngực, phù hợp cho các giải đấu lớn.\r\nĐặc điểm nổi bật:\r\nChất liệu polyester thoáng mát, co giãn 4 chiều.\r\nThiết kế cổ tim phối viền đen tinh tế.\r\nTùy chỉnh số áo và tên người chơi ở mặt sau.\r\nPhù hợp với: Các giải đấu Mobile Legends, đồng phục team gaming hoặc sưu tầm.\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `TenTK` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `TenTK`, `Password`) VALUES
(1, 'admin', '123456'),
(16, 'user', '123456'),
(17, 'user1', '123456');

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
(2, 2, 2),
(3, 2, 4),
(4, 2, 6),
(5, 2, 8),
(6, 2, 10),
(7, 2, 12),
(8, 2, 14),
(9, 2, 15),
(10, 2, 16),
(11, 2, 17);

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
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `MaFooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `Maquyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `taikhoan_quyen`
--
ALTER TABLE `taikhoan_quyen`
  MODIFY `IDTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
