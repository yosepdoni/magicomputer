-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 02:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_magicomputer_sintang`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `id_produk` int(4) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `harga` int(8) NOT NULL,
  `total` int(8) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pengguna`, `id_produk`, `nama_produk`, `kategori`, `jumlah`, `harga`, `total`, `gambar`) VALUES
(267, 16, 67, 'XIAOMI REDMIBOOK 15 - I3 1115G4', 'Laptop Consumer', 1, 5400000, 5400000, 'redmibook15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `surel` varchar(50) NOT NULL,
  `sandi` char(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `peran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `surel`, `sandi`, `nama`, `telepon`, `alamat`, `peran`) VALUES
(16, 'yosepdoni2905@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Yosep Doni Saputra', '+6285753613718', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK TIMUR, TANJUNG HILIR, Jl. Paralel Tol belakang kantor lurah kontrakan biru nomor 4', 'user'),
(18, 'yosepdoni11@gmail.com', '314450613369e0ee72d0da7f6fee773c', 'Yosep Doni Saputra', '+6285753613718', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK TIMUR, DALAM BUGIS, ASDAS', 'admin'),
(19, 'erwin@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Erwin', '+6285715231512', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK TENGGARA, BANSIR DARAT, Serdam', 'user'),
(20, 'daniel@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Daniel', '+6285752005641', 'KALIMANTAN BARAT, KABUPATEN MEMPAWAH, SUNGAI KUNYIT, BUKIT BATU, Rumah nomor 15', 'user'),
(21, 'suhendra@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Suhendra Antonius', '+6285171647703', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK SELATAN, KOTA BARU, gang usaha bersama 1 rumah nomor 3', 'user'),
(22, 'yunita18@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Yunita Yeni', '+6285828659690', 'KALIMANTAN BARAT, KABUPATEN SEKADAU, SEKADAU HILIR, PENITI, jalan sanggau', 'user'),
(23, 'Gerry@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Gerry Christopher', '+6289528523075', 'KALIMANTAN BARAT, KABUPATEN SANGGAU, TAYAN HILIR, PULAU TAYAN UTARA, Rumah warna nomor 13', 'user'),
(24, 'Bima@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Adi Bima', '+6285753613718', 'KALIMANTAN BARAT, KABUPATEN SINTANG, KETUNGAU HILIR, RATU DAMAI, rumah a', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `id_produk` int(4) NOT NULL,
  `penilaian` int(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_pengguna`, `id_produk`, `penilaian`, `keterangan`) VALUES
(67, 16, 67, 4, 'mantap banget');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `id_produk` int(4) NOT NULL,
  `no_resi` varchar(15) NOT NULL,
  `daftar_pesanan` text NOT NULL,
  `pembayaran` int(8) NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `ekspedisi` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status_kirim` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pengguna`, `id_produk`, `no_resi`, `daftar_pesanan`, `pembayaran`, `bukti_bayar`, `tanggal`, `ekspedisi`, `alamat`, `status_kirim`) VALUES
(255, 19, 55, 'JP0603460634', 'LENOVO IDEAPAD SLIM 3i IP 3-14ITL6 J2ID (Laptop Consumer), 1x Rp6,700,000', 6735000, 'pay.jpg', '2023-10-18', 'J&T Express', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK TENGGARA, BANSIR DARAT, Serdam', 'Dalam perjalanan'),
(256, 20, 54, '', 'ASUS VIVOBOOK 14X M1403QA RYZEN 5 5600H (Laptop Consumer), 2x Rp8,000,000', 16035000, 'pay.jpg', '2023-10-18', 'J&T Express', 'KALIMANTAN BARAT, KABUPATEN MEMPAWAH, SUNGAI KUNYIT, BUKIT BATU, Rumah nomor 15', 'Dikirim'),
(257, 21, 53, '', 'Apple Macbook Air 13inch M1 2021 (Laptop Consumer), 1x Rp11,700,000', 11735000, 'pay.jpg', '2023-10-18', 'Ninja Express', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK SELATAN, KOTA BARU, gang usaha bersama 1 rumah nomor 3', 'Dikirim'),
(258, 22, 57, '', 'HP 14S EM0014AU RYZEN 3 7320U (Laptop Consumer), 1x Rp6,400,000', 6435000, 'pay.jpg', '2023-10-30', 'SiCepat Ekspres', 'KALIMANTAN BARAT, KABUPATEN SEKADAU, SEKADAU HILIR, PENITI, jalan sanggau', 'Dikirim'),
(260, 24, 52, '', 'Hp Asus (Android), 1x Rp4,500,000', 4535000, 'css.png', '2023-10-19', '', 'KALIMANTAN BARAT, KABUPATEN SINTANG, KETUNGAU HILIR, RATU DAMAI, rumah a', 'dibatalkan'),
(265, 16, 60, 'JP0509390642', 'XIAOMI REDMIBOOK 15 - I3 1115G4 (Laptop Consumer), 3x Rp5,400,000.<br> MSI Modern 14 C5M Ryzen 7 5825U (Laptop Consumer), 1x Rp9,100,000', 25335000, 'IMG_20230416_023724.jpg', '2023-10-27', 'Ninja Express', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK TIMUR, TANJUNG HILIR, Jl. Paralel Tol belakang kantor lurah kontrakan biru nomor 4', 'diterima'),
(266, 23, 51, '0', 'ASUS ROG (Laptop Gaming), 1x Rp19,500,000', 19535000, 'css.png', '2023-11-02', 'J&T Express', 'KALIMANTAN BARAT, KABUPATEN SANGGAU, TAYAN HILIR, PULAU TAYAN UTARA, Rumah warna nomor 13', 'Dikirim'),
(267, 16, 60, 'dasasdasdasd', 'XIAOMI REDMIBOOK 15 - I3 1115G4 (Laptop Consumer), 2x Rp5,400,000.<br> MSI Modern 14 C5M Ryzen 7 5825U (Laptop Consumer), 1x Rp9,100,000', 19935000, 'fltr.png', '2023-11-07', 'Ninja Express', 'KALIMANTAN BARAT, KOTA PONTIANAK, PONTIANAK TIMUR, TANJUNG HILIR, Jl. Paralel Tol belakang kantor lurah kontrakan biru nomor 4', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(4) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok` int(2) NOT NULL,
  `terjual` int(2) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(8) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `stok`, `terjual`, `kategori`, `deskripsi`, `harga`, `gambar`) VALUES
(50, 'ASUS E402', 0, 5, 'Laptop Consumer', 'Asus E402 adalah salah varian laptop seri VivoBook yang didesain untuk penggunaan sehari-hari. Dengan harga yang terjangkau, laptop satu ini sangat pas untuk para pelajar dan mahasiswa. Laptop ini memiliki layar seluas 14 inci, penyimpanan yang cukup besar, dan kinerja komputasi yang tidak terlalu mengecewakan. Jika berbicara tentang performa, laptop kelas low-end ini memang didesain agar dapat menjalankan tugas-tugas komputasi dasar saja seperti mengetik, browsing, hingga streaming.', 4000000, 'fg.png'),
(51, 'ASUS ROG', 8, 15, 'Laptop Gaming', 'ini adalah laptop yang dikenal untuk bermain game sangat lancar ditahun 2023', 19500000, 'ASUS_ROG.jpg'),
(52, 'Hp Asus', 6, 18, 'Android', 'Laptop yang umum digunakan untuk bekerja dibidang akuntansi, dengan laptop acer Aspire One pekerjaan yang berkaitan dengan word excel power point, dapat segera diselesaikan dengan cepat,\r\nram 6 ssd 128, processor amd', 4500000, 'zenfone_m1.jpg'),
(53, 'Apple Macbook Air 13inch M1 2021', 18, 2, 'Laptop Consumer', 'Macbook Air M1 13inch produksi 2020 Spec :\r\ntersedia 8/256 dan 8/512\r\nChip M1\r\nlayar 13.3 inch\r\nDua port Thunderbolt/USB 4\r\nMagic Keyboard berlampu latar\r\n\r\nMacbook Air M2 13inch produksi 2022 Spec :\r\ntersedia 8/256 dan 8/512\r\nChip Terbaru M2\r\nlayar 13,6 Inch\r\nDua port Thunderbolt / USB 4 dengan dukungan untuk pengisian daya, DisplayPort, Thunderbolt 3 (hingga 40 Gbps), USB 4 hingga 40 Gbps), USB 3.1 Gen 2 (hingga 10 Gbps)\r\nMacOS Monterey', 11700000, 'aple mac book.jpg'),
(54, 'ASUS VIVOBOOK 14X M1403QA RYZEN 5 5600H', 11, 3, 'Laptop Consumer', 'Military grade : US MIL-STD 810H military-grade standard\r\nTouch Panel : N/A\r\nDisplay : 14.0-inch WUXGA (1920 x 1200) 16:10 aspect ratio LED Backlit IPS-level Panel 300nits 45% NTSC color gamut Anti-glare display\r\nScreen-to-body ratio : 86 ％\r\n\r\nProcessor : AMD Ryzen™ 5 5600H Mobile Processor (6-core/12-thread, 19MB cache, up to 4.2 GHz max boost)\r\nIntergrated GPU : AMD Radeon™ Vega 7 Graphics\r\nTotal System Memory : 8GB DDR4 on board , Upgradeable up to 16GB\r\nOn board memory : 8GB DDR4 on board\r\nStorage : 512GB M.2 NVMe™ PCIe® 3.0 SSD\r\n\r\nHow to upgrade memory : Upgradable - Need to remove bottom/top case\r\nExpansion Slot(includes used) :\r\n1x DDR4 SO-DIMM slot\r\n1x M.2 2280 PCIe 3.0x4\r\n\r\nOptical Drive : N/A\r\nFront-facing camera : 720p HD camera With privacy shutter\r\nWireless : Wi-Fi 6(802.11ax) (Dual band) 2*2 + Bluetooth 5\r\nKeyboard type : Backlit Chiclet Keyboard\r\nNumberPad :N/A\r\nScreenPad™ : N/A\r\nFingerPrint : FingerPrint\r\n\r\nI/O ports :\r\n1x USB 2.0 Type-A\r\n1x USB 3.2 Gen 1 Type-C\r\n2x USB 3.2 Gen 1 Type-A\r\n1x HDMI 1.4\r\n1x 3.5mm Combo Audio Jack\r\n1x DC-in\r\n\r\nAudio :\r\nSonicMaster\r\nBuilt-in speaker\r\nBuilt-in array microphone\r\nVoice control : with Cortana and Alexa voice-recognition support\r\n\r\nAC Adapter : ø4.5, 90W AC Adapter, Output: 19V DC, 4.74A, 90W, Input: 100~240V AC 50/60Hz universal\r\nBattery : 50WHrs, 3S1P, 3-cell Li-ion\r\nReplaceable Battery : No\r\nDimension (WxHxD) : 31.71 x 22.20 x 1.99 ~ 1.99 cm\r\nWeight (with Battery) : 1.60 kg\r\nWeight (without Battery) : 1.22 kg\r\nIncluded in the Box : Backpack', 8000000, 'vivobok.png'),
(55, 'LENOVO IDEAPAD SLIM 3i IP 3-14ITL6 J2ID', 4, 3, 'Laptop Consumer', 'Processor : Intel Core i3-1115G4 (2C / 4T, 3.0 / 4.1GHz, 6MB)\r\n\r\nType Grafis : Integrated Intel UHD Graphics\r\n\r\nChipset : Intel SoC Platform\r\n\r\nPenyimpanan : 512GB SSD M.2 2280 PCIe 3.0x4 NVMe\r\nStorage Support\r\nModel with 38Wh battery: up to two drives, 1x 2.5\" HDD + 1x M.2 SSD\r\n2.5\" HDD up to 1TB\r\nM.2 2242 SSD up to 512GB\r\nM.2 2280 SSD up to 512GB\r\n\r\nMemory RAM : 8GB Soldered DDR4-3200, dual-channel capable. Up to 16GB (8GB soldered + 8GB SO-DIMM) DDR4-3200 offering\r\n\r\nUkuran Layar : 14\" FHD (1920x1080) TN 250nits Anti-glare, 45% NTSC\r\n\r\nKeyboard : Backlit, English\r\n\r\nCard Reader : 4-in-1 Card Reader\r\n\r\nAudio Chip : High Definition (HD) Audio, Realtek ALC3287 codec\r\n\r\nSpeakers : Stereo speakers, 1.5W x2, Dolby Audio\r\n\r\nCamera : HD 720p with Privacy Shutter\r\n\r\nMicrophone : 2x, Array\r\n\r\nWLAN + Bluetooth : 11ac, 2x2 + BT5.0\r\n\r\nStandard Ports:\r\n1x USB 2.0\r\n1x USB 3.2 Gen 1\r\n1x USB-C 3.2 Gen 1 (support data transfer only)\r\n1x HDMI 1.4b\r\n1x Card reader\r\n1x Headphone / microphone combo jack (3.5mm)\r\n1x Power connector\r\n\r\nBattery : Integrated 38Wh\r\n\r\nPower Adapter : 65W Round Tip (2-pin, Wall-mount)\r\n\r\nCase Color : Arctic Grey\r\n\r\nWeight : Starting at 1.41 kg (3.1 lbs)\r\n\r\nOS : Windows 11 Home + Office Home Student 2021\r\n\r\nWarranty : 2Y Premium Care -IPENTRY (ESS) (5WS0X58233)', 6700000, 'lenovo ideapad.jpg'),
(57, 'HP 14S EM0014AU RYZEN 3 7320U', 10, 2, 'Laptop Consumer', 'Variant :\r\nEM0014AU : Silver (Backlite Keyboard)\r\nEM0032AU : Black (Non Backlite Keyboard)\r\nEM0033AU : Gold (Backlite Keyboard)\r\n+Screen Protect : Include Screen Protector\r\n\r\nSpesifikasi :\r\n• Prosesor : AMD Ryzen™ 3-7320U Quad Core processor 2.40 GHz Up to 4.1GHz CPU Cores 4, Threads\r\n• Memory : 8GB LPDDR5 (onboard)\r\n• Storage : 512 GB PCIe® NVMe™ M.2 SSD\r\n• Display : 14\" diagonal,FHD (1920 x 1080), Antiglare SVA 250 nits\r\n• Graphics : AMD Radeon™ 610M\r\n• Operating System : Windows 11 Home\r\n• Office : Home and Student 2021\r\n\r\n• Ports :\r\n1 SuperSpeed USB Type-C® 5Gbps signaling rate;\r\n2 SuperSpeed USB Type-A 5Gbps signaling rate;\r\n1 HDMI 1.4b;\r\n1 AC smart pin;\r\n1 headphone/microphone combo\r\n\r\n• Expansion Slots : 1 multi-format SD media card reader\r\n• Audio Features : Dual speakers\r\n• Webcam : HP True Vision 1080p FHD camera with temporal noise reduction and integrated dual array digital microphones\r\n• Keyboard : Full-size, backlit, natural silver keyboard\r\n• Wireless : Realtek RTL8822CE 802.11a/b/g/n/ac (2x2) Wi-Fi® and Bluetooth® 5 combo\r\n• Battery Type : 3-cell, 41 Wh Li-ion\r\n• Dimensions Without Stand (W X D X H) : 32.4 x 22.5 x 1.79 cm', 6400000, 'hp14s.jpg'),
(60, 'MSI Modern 14 C5M Ryzen 7 5825U', 0, 5, 'Laptop Consumer', 'Modern 14 C5M-0033ID - 16GB\r\n\r\nWarna : Classic Black\r\nDisplay : 14\" FHD (1920*1080), IPS-Level,Thin Bezel\r\nCamera : HD type (30fps@720p)\r\nVGA, V-RAM : AMD Radeon™ Graphics\r\nCPU : Ryzen 7 5825U\r\nKeyboard : Single backlight KB (White)\r\nMemory : DDR IV 8GB / DDR IV 16GB (3200MHz)\r\nStorage : 512GB NVMe PCIe Gen3x4 SSD\r\nWLAN : AMD Wi-Fi 6E RZ608 + BT5.1\r\nOS : Windows11 Home\r\nBattery : 3 cell, 39.3Whr\r\nI/O Ports :\r\n1x Type-C USB3.2 Gen2 with PD charging\r\n1x Type-A USB3.2 Gen2\r\n1x (4K @ 30Hz) HDMI\r\n1x Micro SD Card Reader\r\n2x Type-A USB2.0\r\n\r\nWarranty : 2 years\r\nWeight (w/ battery) : 1.4 kg\r\nDimension (WxDxH) : 223 x 319.9 x 19.35 mm\r\nBundle : MSI Sleeve Bag_GP\r\n\r\nCooler Boost: Solusi termal khusus, Cooler Boost bekerja dengan meminimalisir panas dan memaksimalkan aliran udara untuk performa yang maksimal.\r\n\r\nThin Bezel IPS-Level Panel: Design bezel yang tipis dan dibekali dengan layar IPS-level panel untuk menghadirkan akurasi warna yang lebih tajam.\r\n\r\nUltra Light: Laptop ultra portable dengan bobot hanya 1.4 kg dan tebal hanya 19.35mm.\r\n\r\nHi-Res Audio: Benamkan diri Anda dalam musik dan nikmati kualitas suara premium dengan Hi-Resolution.\r\n\r\nMSI Center: Fitur pintar yang dapat membantu untuk mengontrol dan menyesuaikan laptop MSI sesuai kebutuhan anda.\r\n\r\nMilitary-Grade Durability: Sudah memenuhi standar militer MIL-STD-810G untuk keandalan dan ketahanan.', 9100000, 'MSI Modern 14 C5M Ryzen 7 5825U.jpg'),
(67, 'XIAOMI REDMIBOOK 15 - I3 1115G4', 4, 5, 'Laptop Consumer', 'SSD 256GB bawaan nya (SEGEL)\r\nSSD 512GB CUSTOM (bawaan 256gb di custom menjadi 512gb/1tb) dan TIDAK SEGEL. CUSTOM hanya bisa claim melalui seller ya. Terima kasih\r\n\r\nSpesifikasi :\r\n\r\n- Prosessor : Intel Core i3 1115G4\r\n- Memory : 8 GB DDR4\r\n- Storage : 512 GB SSD\r\n- Graphics : Intel UHD Graphics\r\n- Display : 15.6 inch 1920x1080 FHD\r\n- OS : Windows 10 Home\r\n\r\nGaransi Resmi XIAOMI 2 Tahun\r\n\r\n\r\nKET BUNDLE :', 5400000, 'redmibook15.jpg'),
(68, 'LAPTOP AXIOO SLIMBOOK 14 S1 RYZEN 5 3500', 9, 0, 'Laptop Consumer', 'Processor : AMD RYZEN 5 3500u\r\nMemory : 8GB dual channel (terdapat 1 slot ram kosong bisa di tambah)\r\nStorage : 256 SSD (terdapat 1 slot ssd kosong bisa di tambah)\r\nGraphics : VEGA 8\r\nOperating System : Windows 10 PRO\r\nDisplay : 14.0\" FHD\r\n\r\nKelengkapan : Unit Laptop, Dus Laptop, Charger Laptop, Kartu Garansi,Sleve Axioo\r\n\r\nGaransi 5 hari tukar unit baru\r\nGaransi Resmi Axioo Indonesia 1 Tahun\r\n\r\n\r\nVARIAN BUNDLING HEMAT :\r\n\r\n+ANTIGORES : mendapatkan laptop dan anti gores layar dan belakang layar agar laptop tidak\r\nlecet2 dan free cleaning kit (free instalasi).\r\n\r\n+FLASHDISK : mendapatkan laptop dan flashdisk 16gb dari sandisk ORIGINAL.\r\n\r\n+CARBONSLVCASE : mendapatkan laptop dan sleevecase carbon original bahan tebal dan waterproof warna brown, blue, grey.\r\n\r\n+OFFICE365 1 atau 3 THN : mendapatkan laptop dan office 365 resmi original masa berlaku 1 atau 3 tahun microsoft product key letter of certification.non retail pack, tinggal masukan code product key langsung aktif', 5450000, 'LAPTOP AXIOO SLIMBOOK.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
