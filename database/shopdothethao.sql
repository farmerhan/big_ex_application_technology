-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 15, 2022 lúc 01:18 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopdothethao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int(11) NOT NULL,
  `tong_tien` double NOT NULL,
  `ngay_dat_hang` timestamp NOT NULL DEFAULT current_timestamp(),
  `trang_thai_don_hang` enum('chua_thanh_toan','da_thanh_toan','dang_giao_hang','') NOT NULL,
  `hinh_thuc_thanh_toan` enum('truc_tiep','lien_ket_ngan_hang','','') NOT NULL,
  `ma_khach_hang` varchar(50) NOT NULL,
  `ngay_thanh_toan` timestamp NULL DEFAULT NULL,
  `dia_chi_giao_hang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `tong_tien`, `ngay_dat_hang`, `trang_thai_don_hang`, `hinh_thuc_thanh_toan`, `ma_khach_hang`, `ngay_thanh_toan`, `dia_chi_giao_hang`) VALUES
(23, 420, '2022-03-14 01:34:35', 'da_thanh_toan', 'truc_tiep', 'wilsonkylerkl@gmail.com', '2022-03-15 01:44:01', 'Los Angeles');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang_san_pham`
--

CREATE TABLE `don_hang_san_pham` (
  `ma_dh` int(11) NOT NULL,
  `thanh_tien` double NOT NULL,
  `so_luong_sp` int(11) NOT NULL,
  `kich_co` enum('S','M','L','XL','2XL','3XL','4XL') NOT NULL,
  `ma_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `don_hang_san_pham`
--

INSERT INTO `don_hang_san_pham` (`ma_dh`, `thanh_tien`, `so_luong_sp`, `kich_co`, `ma_sp`) VALUES
(23, 420, 3, 'S', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `do_the_thao`
--

CREATE TABLE `do_the_thao` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(200) NOT NULL,
  `gia_sp` double NOT NULL,
  `anh_chup` text NOT NULL,
  `url_san_pham` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `do_the_thao`
--

INSERT INTO `do_the_thao` (`ma_sp`, `ten_sp`, `gia_sp`, `anh_chup`, `url_san_pham`) VALUES
(1, 'Gildan 1800 Ultra Cotton Polo T-Shirt', 129, 'fc576254-d6f3-4707-a6a6-1a7ec1216e34.webp', 'cotton-polo-shirt'),
(2, 'Totenham T-Shirt', 89, 'c3c71434-5b0a-4812-8265-8603b02cf835.webp', 'tot-tshirt'),
(3, 'Liverpool T-Shirt', 100, '73d48e79-16a0-4c6a-bb4c-19417d4f50ed.webp', 'Liverpool-Shirt'),
(4, 'Barcelona T-Shirt', 140, 'fc-barcelona-2021-22-stadium-home-football-shirt-cCWxpm.jpg', 'barca-tshirt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gio_hang` int(11) NOT NULL,
  `ma_do_the_thao` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `kich_thuoc` enum('S','M','L','XL','2XL','3XL','4XL') NOT NULL,
  `gia` double NOT NULL,
  `ma_khach_hang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ten_kh` varchar(100) NOT NULL,
  `dia_chi` text NOT NULL,
  `so_dt` varchar(15) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ten_kh`, `dia_chi`, `so_dt`, `ngay_sinh`, `email`) VALUES
('wils', 'Los Angeles', '0123456789', NULL, 'wilsonkylerkl@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_quan_tri`
--

CREATE TABLE `nguoi_quan_tri` (
  `ten` varchar(100) NOT NULL,
  `so_dt` varchar(15) NOT NULL,
  `dia_chi` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoi_quan_tri`
--

INSERT INTO `nguoi_quan_tri` (`ten`, `so_dt`, `dia_chi`, `email`) VALUES
('abx', '0123456789', 'los angeles', 'wilsonkylerkl@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `email` varchar(50) NOT NULL,
  `mat_khau` varchar(20) NOT NULL,
  `phan_quyen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`email`, `mat_khau`, `phan_quyen`) VALUES
('wilsonkylerkl@gmail.com', '123456', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `fk_foreign_kh` (`ma_khach_hang`);

--
-- Chỉ mục cho bảng `don_hang_san_pham`
--
ALTER TABLE `don_hang_san_pham`
  ADD PRIMARY KEY (`ma_dh`,`ma_sp`),
  ADD KEY `fk_foreign_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `do_the_thao`
--
ALTER TABLE `do_the_thao`
  ADD PRIMARY KEY (`ma_sp`),
  ADD UNIQUE KEY `url_san_pham` (`url_san_pham`) USING HASH;

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gio_hang`,`ma_do_the_thao`),
  ADD KEY `fk_foreign_kh_gh` (`ma_khach_hang`),
  ADD KEY `fk_foreign_kh_sp` (`ma_do_the_thao`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `nguoi_quan_tri`
--
ALTER TABLE `nguoi_quan_tri`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `do_the_thao`
--
ALTER TABLE `do_the_thao`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_foreign_kh` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`email`);

--
-- Các ràng buộc cho bảng `don_hang_san_pham`
--
ALTER TABLE `don_hang_san_pham`
  ADD CONSTRAINT `fk_foreign_dh` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_foreign_kh_gh` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`email`),
  ADD CONSTRAINT `fk_foreign_kh_sp` FOREIGN KEY (`ma_do_the_thao`) REFERENCES `do_the_thao` (`ma_sp`);

--
-- Các ràng buộc cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD CONSTRAINT `fk_foreign_admin_tk` FOREIGN KEY (`email`) REFERENCES `nguoi_quan_tri` (`email`),
  ADD CONSTRAINT `fk_foreign_kh_tk` FOREIGN KEY (`email`) REFERENCES `khach_hang` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
