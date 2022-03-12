-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 12, 2022 lúc 04:42 PM
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
  `trang_thai_don_hang` enum('chua_thanh_toan','da_thanh_toan','','') NOT NULL,
  `so_luong_sp` int(11) NOT NULL,
  `hinh_thuc_thanh_toan` enum('truc_tiep','lien_ket_ngan_hang','','') NOT NULL,
  `ma_khach_hang` int(11) NOT NULL,
  `kich_co` enum('S','M','L','XL','2XL','3XL','4XL') NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ngay_thanh_toan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `tong_tien`, `ngay_dat_hang`, `trang_thai_don_hang`, `so_luong_sp`, `hinh_thuc_thanh_toan`, `ma_khach_hang`, `kich_co`, `ma_sp`, `ngay_thanh_toan`) VALUES
(4, 196, '2022-03-12 09:38:45', 'da_thanh_toan', 2, 'truc_tiep', 2, 'M', 4, '2022-03-12 09:38:45'),
(5, 98, '2022-03-12 10:08:09', 'da_thanh_toan', 1, 'truc_tiep', 2, 'M', 4, '2022-03-12 09:38:45');

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
  `ma_khach_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`ma_gio_hang`, `ma_do_the_thao`, `so_luong`, `kich_thuoc`, `gia`, `ma_khach_hang`) VALUES
(8, 4, 2, 'S', 140, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dia_chi` text NOT NULL,
  `mat_khau` varchar(20) NOT NULL,
  `so_dt` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_kh`, `email`, `dia_chi`, `mat_khau`, `so_dt`) VALUES
(2, 'wils', 'wilsonkylerkl@gmail.com', '3213', '123456', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_quan_tri`
--

CREATE TABLE `nguoi_quan_tri` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mat_khau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoi_quan_tri`
--

INSERT INTO `nguoi_quan_tri` (`id`, `ten`, `email`, `mat_khau`) VALUES
(1, 'abx', 'wilsonkylerkl@gmail.com', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`);

--
-- Chỉ mục cho bảng `do_the_thao`
--
ALTER TABLE `do_the_thao`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gio_hang`,`ma_do_the_thao`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `nguoi_quan_tri`
--
ALTER TABLE `nguoi_quan_tri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `do_the_thao`
--
ALTER TABLE `do_the_thao`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nguoi_quan_tri`
--
ALTER TABLE `nguoi_quan_tri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
