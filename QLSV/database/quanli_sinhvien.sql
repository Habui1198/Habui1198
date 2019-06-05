-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 05, 2019 lúc 07:30 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanli_sinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `MaSV` int(11) NOT NULL,
  `MaMH` int(11) NOT NULL,
  `TenMH` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`MaSV`, `MaMH`, `TenMH`, `Diem`) VALUES
(1621050106, 4080112, 'Tiếng Anh 1', 10),
(1621050106, 4080113, 'Tiếng Anh 2', 10),
(1621050106, 4080114, 'Tiếng Anh 3', 8),
(1621050106, 4080115, 'Tiếng Anh 4', 8),
(1621050106, 4080203, 'Cơ sở lập trình', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaLop` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenLop` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`) VALUES
('DCCTPM61A', 'Công nghệ phần mềm A K61'),
('DCCTPM61B', 'Công nghệ phần mềm B K61'),
('DCCTPM61C', 'Công nghệ phần mềm C K61'),
('DCCTPM61D', 'Công nghệ phần mềm D K61'),
('DCCTPM61E', 'Công nghệ phần mềm E K61');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMH` int(11) NOT NULL,
  `TenMH` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMH`, `TenMH`) VALUES
(4080112, 'Tiếng Anh 1'),
(4080113, 'Tiếng Anh 2'),
(4080114, 'Tiếng Anh 3'),
(4080115, 'Tiếng Anh 4'),
(4080203, 'Cơ sở lập trình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` int(11) NOT NULL,
  `HoTen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLop` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `HoTen`, `MaLop`, `GioiTinh`, `NgaySinh`) VALUES
(16210511, 'Trần Thị T', 'DCCTPM61C', 'Nữ', '1998-09-02'),
(16221111, 'Hoàng Thị Hiền', 'DCCTPM61D', 'Nữ', '1998-11-20'),
(1621050106, 'Bùi Văn Hà', 'DCCTPM61A', 'Nam', '1998-11-01'),
(1621050107, 'Nguyễn Văn B', 'DCCTPM61E', 'Nam', '1998-11-20'),
(1621050110, 'Trần Thị TT', 'DCCTPM61A', 'Nữ', '1998-10-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan`, `matkhau`) VALUES
('admin', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaSV`,`MaMH`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMH`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
