-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 03:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_revisi` varchar(255) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `komentar_mhs` varchar(255) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `id_dosen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `mahasiswa`, `dosen`, `judul`, `file`, `file_revisi`, `komentar`, `komentar_mhs`, `jenis`, `id_mahasiswa`, `id_dosen`) VALUES
(28, 'Billy Timporok', 'Ferdian Aditya', 'Analisis Perancangan UI & UX pada Aplikasi XYZ', '1639202515_e0bae9a7a49600862f58.pdf', '1639197649_98b39cf7873fdc245f04.pdf', '   oke billl, diterima', '  berikut lampiran BAB 1 saya kak', 'proposal', '201804560012', '543212345'),
(29, 'Billy Timporok', 'Ferdian Aditya', 'Analisis Perancangan UI & UX pada Aplikasi XYZ', '', '', '', ' Selamat pagi kak ini file saya', 'proposal', '201804560012', '543212345'),
(36, 'Billy Timporok', 'Ferdian Aditya', 'Analisis Perancangan UI & UX pada Aplikasi XYZ', '', '', ' baik billy', '', 'proposal', '201804560012', '543212345'),
(42, 'Billy Timporok', 'Ferdian Aditya', 'Analisis Perancangan UI & UX pada Aplikasi XYZ', '', '', '', '', 'skripsi', '201804560012', '543212345'),
(43, 'Jevon Adelwin Hura', 'Ferdian Aditya', 'Sistem Informasi Manajemen Tugas Akhir', '', '', '', '', 'proposal', '201804560013', '543212345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `info` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id`, `nama_dosen`, `email`, `no_hp`, `info`, `password`, `role_id`) VALUES
('1234567891', 'Koordinator TA', 'koordinator@gmail.com', '085213214322', '', '$2y$10$2PzN9fMi6g/v5L9AfShLvONtq6mQsJAgGQjXgk2UOgelxt1ARjh2i', 1),
('201842321312', 'Denny', 'denny@gmail.com', '084231231231', '', '$2y$10$hqVhvc2vY0Ufw8SiWNi4xuAjBSwH9XTQ0EmubrThY1kqw/6FZQ3oO', 2),
('543212345', 'Ferdian Aditya', 'ferdian@gmail.com', '085212321123', '', '$2y$10$ZV.5Amk0VgqIgaKzLnYWAO6LfUqbs57BelT7NU5F9zMOJ5W.Ncn36', 2),
('789010123', 'Sri Mulyanti', 'sri@gmail.com', '085232324212', '', '$2y$10$fofwvmM4yeHgcNNYGUEUH.S8giVEOHb05/j0BughO/9gDhTX2ufNe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `jam` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_mahasiswa`, `mahasiswa`, `jenis`, `hari`, `bulan`, `tahun`, `jam`) VALUES
(3, '201804560012', 'Billy Timporok', 'proposal', 'Jumat', 'Februari', '2022', '13:56'),
(4, '201804560012', 'Billy Timporok', 'skripsi', 'Senin', 'Juni', '2021', '14:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_dosen` varchar(20) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_bg` varchar(50) NOT NULL,
  `pesan_dosen` varchar(255) DEFAULT NULL,
  `pesan_mahasiswa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `id_dosen`, `id_mahasiswa`, `mahasiswa`, `file`, `jenis`, `status`, `status_bg`, `pesan_dosen`, `pesan_mahasiswa`) VALUES
(11, '543212345', '201804560012', 'Billy Timporok', '1640263082_fd63159f73d20824d4e0.rar', 'proposal', 'Berkas lengkap dan sudah diterima.', 'success', 'maaf, belum lengkap', 'dasdadadsdad'),
(13, '543212345', '201804560012', 'Billy Timporok', '1640263149_64c18b920021701c5f22.rar', 'skripsi', 'Berkas lengkap dan sudah diterima.', 'success', 'sudah lengkap.', 'asddasasd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request_mhs`
--

CREATE TABLE `tb_request_mhs` (
  `id_request` int(11) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tentang_judul` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `pesan_dosen` varchar(255) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_class` varchar(10) NOT NULL,
  `disabled` varchar(10) NOT NULL,
  `id_dosen` varchar(20) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_request_mhs`
--

INSERT INTO `tb_request_mhs` (`id_request`, `mahasiswa`, `judul`, `tentang_judul`, `pesan`, `pesan_dosen`, `jenis`, `status`, `status_class`, `disabled`, `id_dosen`, `id_mahasiswa`) VALUES
(12, 'Billy Timporok', 'Analisis Perancangan UI & UX pada Aplikasi XYZ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusantium quia fuga voluptates adipisci id suscipit corrupti dolorum velit voluptate aliquid quae dolores veniam animi, repudiandae architecto laudantium consequatur ipsa.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusantium quia fuga voluptates adipisci id suscipit corrupti dolorum velit voluptate aliquid quae dolores veniam animi, repudiandae architecto laudantium consequatur ipsa.', '', 'proposal', 'diterima', 'success', 'disabled', '543212345', '201804560012'),
(24, 'Billy Timporok', 'Analisis Perancangan UI & UX pada Aplikasi XYZ', 'Analisis Perancangan UI & UX pada Aplikasi XYZAnalisis Perancangan UI & UX pada Aplikasi XYZAnalisis Perancangan UI & UX pada Aplikasi XYZ', 'apakah bapak bersedia ?', ' baik, saya bersedia', 'skripsi', 'diterima', 'success', 'disabled', '543212345', '201804560012'),
(25, 'Jevon Adelwin Hura', 'Sistem Informasi Manajemen Tugas Akhir', 'formasi Manajemen Tugas Akhirformasi Manajemen Tugas Akhir', 'formasi Manajemen Tugas Akhirformasi Manajemen Tugas Akhirformasi Manajemen Tugas Akhirformasi Manajemen Tugas Akhirformasi Manajemen Tugas Akhirformasi Manajemen Tugas Akhirformasi Manajemen Tugas Akhir', '', 'proposal', 'diterima', 'success', 'disabled', '543212345', '201804560013');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` varchar(20) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_user`, `email`, `no_hp`, `password`, `role_id`) VALUES
('0979123122323', 'juangga rizki hura', 'anggas.201804560013@stude', '08312321323', '$2y$10$2VW0gP3Og7PD9nylMATIKOqb.KP3yySk93Y80dnrVQigsCPW3v1pW', 3),
('201804560012', 'Billy Timporok', 'billy@gmail.com', '085232414354', '$2y$10$t0.IV5r6u3YJN7pGQtqf5u1gnDZC9SwvW1v2q9CcyinC14siETQ9i', 3),
('201804560013', 'Jevon Adelwin Hura', 'jevon@gmail.com', '085218720488', '$2y$10$Im3CFS0uc2zb9i40aARnFeKk4BGxqx4o41MaXbU4Ylt4Bph0IWFHG', 3),
('231231313', 'andre cahyadi', 'andre.201804560013@studen', '0842313123', '$2y$10$6SJhtTcML9CouFaU/Z8bY.aeArojMI3uZVqJv9toKBXBupoT.kV1S', 3),
('312231312', 'kevin kurniawan', 'kevin.201804560013@studen', '08218012812', '$2y$10$4arhDEet19U2RGjzqRMZM.neiR/R.ldTXQBju1yBZtszDg0U4os16', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `fk_id_dosen` (`id_dosen`),
  ADD KEY `fk_id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `tb_request_mhs`
--
ALTER TABLE `tb_request_mhs`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `fk_req_dosen` (`id_dosen`),
  ADD KEY `fk_req_mhs` (`id_mahasiswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_request_mhs`
--
ALTER TABLE `tb_request_mhs`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `fk_id_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_request_mhs`
--
ALTER TABLE `tb_request_mhs`
  ADD CONSTRAINT `fk_req_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_req_mhs` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
