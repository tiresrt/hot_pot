-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 25, 2023 lúc 08:55 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ict_hotpot`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `id_ban` int(11) NOT NULL,
  `so_ban` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ghichu` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `id_mon` bigint(20) NOT NULL,
  `sesid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name_mon` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gia_mon` double NOT NULL,
  `soluong` int(11) NOT NULL,
  `images` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id` int(11) NOT NULL,
  `sesis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_mon` int(11) NOT NULL,
  `name_mon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `dates` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tg` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `so_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gia` double NOT NULL,
  `thanhtien` double NOT NULL,
  `images` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ghichu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sodienthoai` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `ghichu` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `passwords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_mon`
--

CREATE TABLE `loai_mon` (
  `id_loai` int(11) NOT NULL,
  `name_loai` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ghichu` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_mon`
--

INSERT INTO `loai_mon` (`id_loai`, `name_loai`, `ghichu`) VALUES
(1, 'Khai vị', ''),
(2, 'Lẩu Hải Sản', ''),
(3, 'Lẩu Thái', ''),
(4, 'Lẩu Gà', ''),
(5, 'Khác', ''),
(6, 'Tráng miệng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `id_mon` bigint(20) NOT NULL,
  `name_mon` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_loai` int(11) NOT NULL,
  `gia_mon` double NOT NULL,
  `ghichu_mon` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `images` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tinhtrang` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`id_mon`, `name_mon`, `id_loai`, `gia_mon`, `ghichu_mon`, `images`, `tinhtrang`) VALUES
(1, 'Ốc móng tay xào rau muống', 1, 200000, NULL, 'menu1.png', 1),
(2, 'Nộm tai heo', 1, 70000, NULL, 'menu2.png', 1),
(3, 'Salad cà chua dưa chuột', 1, 50000, NULL, 'menu3.png', 1),
(4, 'Nem thính', 1, 50000, NULL, 'menu4.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `Name_admin` varchar(255) NOT NULL,
  `adminuser` varchar(155) NOT NULL,
  `adminpass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `Name_admin`, `adminuser`, `adminpass`, `level`) VALUES
(1, 'Ngan', 'Ngan', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Hoa', 'hoa', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri`
--

CREATE TABLE `vitri` (
  `id_vitri` int(11) NOT NULL,
  `Name_vitri` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ghichu` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id_ban`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_mon`
--
ALTER TABLE `loai_mon`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id_mon`);

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `vitri`
--
ALTER TABLE `vitri`
  ADD PRIMARY KEY (`id_vitri`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban`
--
ALTER TABLE `ban`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_mon`
--
ALTER TABLE `loai_mon`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `id_mon` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vitri`
--
ALTER TABLE `vitri`
  MODIFY `id_vitri` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
