-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 02:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkatan3_belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama_anggota`, `telepon`, `email`, `alamat`) VALUES
(1, 'Admin', '0895635929627', 'admin@gmail.com', 'jl.menendbeikdbnheoideolde'),
(5, 'Encok', '020202020', 'encok@gmail.com', 'djddjdjdjdj'),
(6, 'Tilek', '73928209923', 'tilek@gmail.com', 'dadadada'),
(10, 'Kare', '5454545545', 'kare@gmail.com', 'djddjdjdjdj');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `id_kategori`, `nama_buku`, `penerbit`, `tahun`, `pengarang`, `created_at`, `updated_at`) VALUES
(9, 4, 'I To You', 'Lala Land Co.', '2020', 'Pake Nanya', '2024-10-15 07:15:21', '2024-10-15 07:49:27'),
(11, 6, 'Art of Parting', 'Lala Land Co.', '1990', 'Supaya Rajin', '2024-10-15 07:21:24', '2024-10-15 07:49:16'),
(12, 3, 'The Way of Trying', 'Lala Land Co.', '2007', 'Supaya Sehat', '2024-10-15 07:25:23', '2024-10-15 07:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `id_peminjaman`, `id_buku`) VALUES
(7, 5, 9),
(8, 6, 9),
(9, 7, 12),
(10, 8, 9),
(11, 8, 11),
(12, 8, 12),
(13, 9, 9),
(14, 10, 11),
(15, 10, 9),
(16, 11, 12),
(17, 12, 12),
(18, 13, 12),
(19, 13, 11),
(20, 13, 9),
(21, 14, 11),
(22, 14, 12),
(23, 14, 9),
(24, 16, 9),
(25, 16, 11),
(26, 18, 11),
(27, 18, 12),
(28, 21, 11),
(29, 23, 9);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(3, 'Comedy', '2024-10-15 02:06:50', '2024-10-15 02:10:51'),
(4, 'Non-Fiction', '2024-10-15 02:07:15', '2024-10-15 02:10:46'),
(5, 'Horror', '2024-10-15 02:10:58', '2024-10-15 02:10:58'),
(6, 'Bibliografi', '2024-10-15 02:11:09', '2024-10-15 02:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'Entry', '2024-10-15 04:13:23', '2024-10-15 04:14:28'),
(3, 'Junior', '2024-10-15 04:13:39', '2024-10-15 04:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_anggota`, `kode_buku`, `tgl_pinjam`, `tgl_kembali`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 'PJM/181024/001', '2024-10-17', '2024-10-25', 'Di Pinjam', '2024-10-18 01:31:31', '2024-10-18 01:54:42', 1),
(9, 5, 'PJM/181024/009', '2024-10-18', '2024-10-19', 'Di Pinjam', '2024-10-18 01:31:43', '2024-10-18 01:58:30', 1),
(10, 6, 'PJM/181024/010', '2024-10-19', '2024-10-20', 'Di Kembalikan', '2024-10-18 01:32:01', '2024-10-21 07:32:50', 1),
(11, 5, 'PJM/181024/011', '2024-10-18', '2024-10-19', 'Di Pinjam', '2024-10-18 01:58:59', '2024-10-18 02:03:11', 1),
(12, 5, 'PJM/181024/012', '2024-10-18', '2024-10-19', 'Di Kembalikan', '2024-10-18 02:02:07', '2024-10-21 07:35:53', 0),
(13, 6, 'PJM/181024/013', '2024-10-19', '2024-10-20', 'Di Kembalikan', '2024-10-18 02:02:24', '2024-10-21 07:34:49', 1),
(14, 1, 'PJM/181024/014', '2024-10-20', '2024-10-23', 'Di Pinjam', '2024-10-18 02:08:17', '2024-10-18 02:08:17', 0),
(16, 10, 'PJM/211024/016', '2024-10-22', '2024-10-23', 'Di Pinjam', '2024-10-21 02:52:40', '2024-10-21 02:52:40', 0),
(18, 10, 'PJM/211024/018', '2024-10-18', '2024-10-21', 'Di Kembalikan', '2024-10-21 04:42:19', '2024-10-21 07:38:38', 0),
(21, 10, 'PJM/211024/021', '2024-10-21', '2024-10-22', 'Di Pinjam', '2024-10-21 07:04:58', '2024-10-21 07:04:58', 0),
(23, 5, 'PJM/211024/022', '2024-10-18', '2024-10-22', 'Di Kembalikan', '2024-10-21 07:40:01', '2024-10-21 07:40:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `denda` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_peminjaman`, `status`, `denda`, `created_at`, `updated_at`) VALUES
(3, 10, 1, 1000000, '2024-10-21 07:32:50', '2024-10-21 07:32:50'),
(4, 13, 1, 1000000, '2024-10-21 07:34:49', '2024-10-21 07:34:49'),
(5, 12, 1, 2000000, '2024-10-21 07:35:53', '2024-10-21 07:35:53'),
(6, 18, 0, 0, '2024-10-21 07:38:38', '2024-10-21 07:38:38'),
(7, 23, 0, 0, '2024-10-21 07:40:56', '2024-10-21 07:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `jenis_kelamin`, `telepon`) VALUES
(1, 'Adminlah', 'admin@gmail.com', '3252d89d93bfb1327e2d3aae9187b565dac6d085', 'Perempuan', '0895635929627'),
(22, 'Semut', 'semut@gmail.com', '43314a00b4732c4e16204ac24ab1a432338c87d2', 'Laki-laki', '545454554587878'),
(25, 'Pare', '', 'fa940d55e0970d54866efbf6b32ce856e5fd7d16', 'Perempuan', '8787887878');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
