-- phpMyAdmin SQL Dump
-- version 5.0.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2019 at 01:59 AM
-- Server version: 8.0.18-0ubuntu0.19.10.1
-- PHP Version: 7.3.12-1+ubuntu19.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkrth`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `toko` varchar(45) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `spek` varchar(45) DEFAULT NULL,
  `satuan` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int(12) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `status_gudang` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `qty`, `toko`, `harga`, `spek`, `satuan`, `tanggal`, `id_user`, `id_kegiatan`, `id_jenis`, `id_gudang`, `status_gudang`) VALUES
(1, 'Kursi', 1000, 'Toko Kursi', 2000000, 'Kayu', 'Buah', '2019-11-08', 5, 1, 2, 2, 0),
(2, 'Cat', 1000, 'Toko cat', 1000000, 'Merah', 'pcs', '2019-11-08', 5, 1, 1, NULL, 1),
(3, 'Meja', 750, 'Merdeka', 20000000, 'kayu baru', 'buah', '2019-11-25', 5, 1, 1, NULL, 0),
(4, 'Meja', 800, 'Merdeka2', 20000000, 'kayu baru', 'Buah', '2019-11-25', 6, 1, 1, NULL, 1),
(5, 'Tong Sampah', 500, 'Toko Matahari', 20000000, 'plastic', 'Buah', '2019-12-12', 6, 1, 1, NULL, 0),
(6, 'Pot Bungga', 1000, 'Toko Matahari', 3000000, 'plastic', 'Buah', '2019-12-13', 6, 1, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama`) VALUES
(2, 'Perternakan Kota'),
(5, 'Pertanian'),
(10, 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama`) VALUES
(1, 'Gudang Perak 2'),
(2, 'Gudang Perak 1');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `toko` varchar(45) NOT NULL,
  `id_request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_barang`, `tanggal`, `harga`, `qty`, `status`, `toko`, `id_request`) VALUES
(2, 2, '2019-12-10', 1000000, 1100, '0', 'Toko cat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama`) VALUES
(1, 'Asset'),
(2, 'Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama`, `id_bidang`) VALUES
(1, 'Perawatan2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `jadwal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `jadwal`, `id_barang`, `keterangan`, `status`) VALUES
(1, '2019-11-08', 2, 'asd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `nama_req` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `nama_req`, `tanggal`, `id_user`, `id_kegiatan`, `id_barang`, `qty`, `status`) VALUES
(1, 'Tata Kota Bulan Desember', '2019-11-24', 1, 1, 2, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rusak`
--

CREATE TABLE `rusak` (
  `id_rusak` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rusak`
--

INSERT INTO `rusak` (`id_rusak`, `status`, `id_barang`, `id_kegiatan`, `keterangan`, `tanggal`) VALUES
(1, NULL, 1, 1, 'Kursi Rusak', '2019-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` int(11) NOT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `tipe` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `telepon` int(11) DEFAULT NULL,
  `roles` varchar(45) DEFAULT NULL,
  `password` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `jabatan`, `nip`, `telepon`, `roles`, `password`, `status`) VALUES
(1, 'franata', 'Franata Mahardika Rosandi', 'Ketua Dinas Sosial', '12377700002', NULL, 'admin', '$2y$10$EMCF7EXGxKsVJOEmoROnkeT1cVFu/sj3iarQJvBgLjkI55JVIDuya', 1),
(3, 'admin', 'Admin Dkrth', 'admin', '111234567890', NULL, 'admin', '$2y$10$WjBpPJhw2g/txOTjVGbjROd3XPaqIZx3pDEae/1bJIrV2qk7buLd6', 1),
(4, 'gudang', 'user gudang', 'admin gudang', '1234567890', NULL, 'gudang', '$2y$10$5Ow19xmHfBaj1GZgI8qZDuXmLbCGzTLIiKRdfUTyhiHBiixiZzEni', 1),
(5, 'Kegiatan1', 'Kegiatan 1', 'Admin', '1234567890', NULL, 'kegiatan', '$2y$10$nig0Ch0hXVQ9IdbP6AHiYeRa1nGer5xIkBsAjn7qs1uvjIlx5qUei', 1),
(6, 'Kegiatan2', 'Kegiatan 2', 'Admin', '1234567890', NULL, 'kegiatan', '$2y$10$RNA..fmvjM9iPS1vzmZzdeIYmDXaEG65ad5G/j2mqd9uklI0ifYau', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_request` (`id_request`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rusak`
--
ALTER TABLE `rusak`
  ADD PRIMARY KEY (`id_rusak`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rusak`
--
ALTER TABLE `rusak`
  MODIFY `id_rusak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`id_request`) REFERENCES `request` (`id_request`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`);

--
-- Constraints for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `rusak`
--
ALTER TABLE `rusak`
  ADD CONSTRAINT `rusak_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `rusak_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);

--
-- Constraints for table `spk`
--
ALTER TABLE `spk`
  ADD CONSTRAINT `spk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `spk_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `spk_ibfk_3` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

