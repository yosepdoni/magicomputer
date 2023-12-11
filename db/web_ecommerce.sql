-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2023 pada 13.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_product` int(15) NOT NULL,
  `nm_product` varchar(50) NOT NULL,
  `category` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_product`, `nm_product`, `category`, `qty`, `price`, `total`) VALUES
(27, 5, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000),
(28, 5, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000),
(29, 5, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000),
(30, 5, 1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 1, 15139000, 15139000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id_order` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `products` varchar(100) NOT NULL,
  `price_total` int(15) NOT NULL,
  `payment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_product` int(15) NOT NULL,
  `nm_product` varchar(50) NOT NULL,
  `category` varchar(15) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(15) NOT NULL,
  `nm_product` varchar(50) NOT NULL,
  `category` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `price` int(15) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `nm_product`, `category`, `description`, `price`, `img`) VALUES
(1, 'ASUS ROG STRIX-G G513IC RYZEN 7-4800H 8GB 512GB RT', 'Laptop Gaming', 'ASUS ROG Strix-G G513IC-R735B7G-O11 (Eclipse Grey)\r\n\r\nFREE OFFICE HOME & STUDENT 2019 ORIGINAL PERMANEN\r\n\r\n• Processor : AMD Ryzen™ 7 4800H Processor 2.9 GHz (8M Cache, up to 4.2 GHz)\r\n• Memori : 8 GB DDR4 3200MHz\r\n• Grafis : NVIDIA® GeForce RTX3050 Laptop GPU 4GB GDDR6\r\n• Layar : 15.6\" LED-backlit FHD (1920x1080) Anti-Glare IPS-level 144Hz 250 nits Screen to Body • Ratio : 87% sRGB 62,5% NTSC 45%\r\n• Storage : 512GB M.2 NVMe™ PCIe® 3.0 SSD\r\n• Keyboard : Backlit Chiclet Keyboard Per-Key RGB\r\n• Wireless Network : Wi-Fi 6 (802.11ax)+Bluetooth 5.1 (Dual band) 2*2\r\n\r\n• Interfaces :\r\n1x 3.5mm Combo Audio Jack\r\n1x HDMI 2.0b\r\n3x USB 3.2 Gen 1 Type-A\r\n1x USB 3.2 Gen 1 Type-C support DisplayPort / power delivery\r\n\r\n• Sistem Operasi : Windows 10 Home + Microsoft Office Home & Student 2019\r\n• Batteray : 56WHrs, 4S1P, 4-cell Li-ion\r\n• Dimension : 35.4 x 25.9 x 2.26\r\n• Berat : 3.0 kg\r\n• Colour : Black Metal\r\n• Included : ROG Bagpack\r\n\r\nWarranty 2 Years By ASUS Indonesia + ASUS VIP Perfect Warranty', 15139000, 'ASUS_ROG.JPG'),
(2, 'Apple iPhone X', 'Apple', 'hp kelas', 8000000, 'iphone_x.jpg'),
(3, 'Samsung A50', 'Android', 'ope banget breee', 3000000, 'samsung_a50.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_usr` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_usr`, `email`, `nama`, `password`, `telp`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `level`) VALUES
(5, 'yosepdoni2905@gmail.com', 'Yosep Doni Saputra', '314450613369e0ee72d0da7f6fee773c', '+6285821807128', 'Kalimantan Barat', 'Sintang', 'Ketungau Hilir', 'Ratu Damai', 'bjbj', 'user'),
(6, 'yosepdoni11@gmail.com', 'Yosep Doni admin', '314450613369e0ee72d0da7f6fee773c', '6285821807128', 'KALIMANTAN BARAT', 'KABUPATEN SINTANG', 'KETUNGAU HILIR', 'RATU DAMAI', 'yg paling lengkap dek', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_usr` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
