-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 04:39 PM
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
(47, 'Andre Cahyadi', 'Denny', 'Perancangan & penerapan sistem e-voting di Unika Atma Jaya', '', '', '', '', 'proposal', '201804560017', '201842321312');

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
('1234567891', 'Koordinator TA', 'koordinator@gmail.com', '085213214322', '', '$2y$10$2PzN9fMi6g/v5L9AfShLvONtq6mQsJAgGQjXgk2UOgelxt1ARjh2i', 2),
('201842321312', 'Denny', 'denny@gmail.com', '084231231231', '', '$2y$10$hqVhvc2vY0Ufw8SiWNi4xuAjBSwH9XTQ0EmubrThY1kqw/6FZQ3oO', 1),
('31231232131', 'Julius Bata', 'bata@mail.com', '08424212312', '', '$2y$10$GAT627QXCh3FEFjYFrCf/.w25jIV2Vl.6pQHfpu44rTdzVX3bprAm', 2),
('789010123', 'Sri Mulyanti', 'sri@gmail.com', '085232324212', '', '$2y$10$fofwvmM4yeHgcNNYGUEUH.S8giVEOHb05/j0BughO/9gDhTX2ufNe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penguji` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `jam` varchar(10) DEFAULT NULL,
  `ruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_mahasiswa`, `mahasiswa`, `judul`, `penguji`, `jenis`, `hari`, `bulan`, `tahun`, `jam`, `ruang`) VALUES
(7, '201804560012', 'Billy Timporok', 'Sistem Informasi Manajemen Tugas Akhir', 'Julius Bata', 'proposal', 'Rabu', 'Maret', '2022', '10:15', ''),
(8, '201804560012', 'Billy Timporok', '', '', 'skripsi', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `mahasiswa` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_mahasiswa`, `mahasiswa`, `judul`, `nilai`, `jenis`) VALUES
(1, '201804560012', 'Billy Timporok', 'Sistem Informasi Manajemen Tugas Akhir', '90', 'proposal');

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
(16, '543212345', '201804560012', 'Billy Timporok', '1641636548_6392a016bf906487b082.pdf', 'proposal', 'menunggu', 'secondary', NULL, 'dasasddas'),
(17, '543212345', '201804560012', 'Billy Timporok', '1641636599_56e0833b3bf0ad47dba8.pdf', 'skripsi', 'menunggu', 'secondary', NULL, 'sdasdasdads');

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
(29, 'Andre Cahyadi', 'Perancangan & penerapan sistem e-voting di Unika Atma Jaya', 'Perancangan & penerapan sistem e-voting di Unika Atma JayaPerancangan & penerapan sistem e-voting di Unika Atma JayaPerancangan & penerapan sistem e-voting di Unika Atma JayaPerancangan & penerapan sistem e-voting di Unika Atma Jaya', 'Selamat pagi pak, apakah bapak bersedia menjadi dosen pembimbing saya?. Terimakasih pak ', '', 'proposal', 'diterima', 'success', 'disabled', '201842321312', '201804560017');

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
('2018023123', 'dasd dadas dasdsa', 'jefasd@mail.com', '0812313123', '$2y$10$nIpX9WkWqEsqOaA4Y/B86epaKNFqdOLdsWwie58/b0ZqiNOfklzlm', 3),
('201804560004', 'kevin kurniawan', 'kevin@mail.com', '08525252252', '$2y$10$dn7xmMjsdc/N2S0Kh.lFwuW/vCyJsXtio8IvPkvGS0LvExDt02ZZi', 3),
('201804560012', 'Billy Timporok', 'billy@gmail.com', '085232414354', '$2y$10$t0.IV5r6u3YJN7pGQtqf5u1gnDZC9SwvW1v2q9CcyinC14siETQ9i', 3),
('201804560013', 'Jevon Adelwin Hura', 'jevon@gmail.com', '085218720488', '$2y$10$Im3CFS0uc2zb9i40aARnFeKk4BGxqx4o41MaXbU4Ylt4Bph0IWFHG', 3),
('201804560017', 'Andre Cahyadi', 'andre@mail.com', '0812321242123', '$2y$10$WPKdfW6jeqMBox0gIn8.OueL6z7wP5uSOiy3nuEnfqyqlFBR4dfli', 3),
('23122323213123', 'testeqqw', 'ashia@maildasda1.com', '08121223123122', '$2y$10$wJRP9mIF7dI/qBaFk8bSEeEfq.6mq2Fy2rI7zepLftc3cP1AtZ3qS', 3),
('231231231', 'test', 'haha@mail.com', '930123133', '$2y$10$0F6DnhpirLXoRxa8gzXcM.c7T09F1KNImjXlUoFXfDzc9Avv1JgaG', 3),
('231231313', 'andre cahyadi', 'andre.201804560013@studen', '0842313123', '$2y$10$6SJhtTcML9CouFaU/Z8bY.aeArojMI3uZVqJv9toKBXBupoT.kV1S', 3),
('31123231', 'testewqw', 'hsas@mail.com', '082123123', '$2y$10$h5o0ZAPIobd1FonHgdqque5rINEEED7q0XYdWmeGcY9Rk9BeJurUK', 3),
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
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `fk_id_nilai_mhs` (`id_mahasiswa`);

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
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_request_mhs`
--
ALTER TABLE `tb_request_mhs`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `fk_id_nilai_mhs` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
