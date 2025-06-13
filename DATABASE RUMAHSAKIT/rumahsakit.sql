-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 10:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama_dokter`, `spesialis`) VALUES
(1, 'Dr. Ahmad', 'Umum'),
(2, 'Dr. Sari', 'Anak'),
(3, 'Dr. Rina', 'Gigi'),
(4, 'dr. Yarika', 'Geriatri/Lansia');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `jam_kunjungan` time NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `status` enum('proses','diterima','ditolak') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `user_id`, `nama`, `tgl_lahir`, `alamat`, `no_hp`, `keluhan`, `tanggal_kunjungan`, `jam_kunjungan`, `dokter_id`, `status`) VALUES
(4, 8, 'Silviana', '1995-04-15', 'batu ceper', '089812345678', 'demam, batuk dan pilek', '2025-06-05', '13:20:00', 1, 'diterima'),
(5, 9, 'Shanaya Elshanum', '2004-04-17', 'Bandung', '089812345678', 'Sakit gigi belakang', '2025-06-10', '22:00:00', 3, 'diterima'),
(7, 10, 'Husni', '1779-10-04', 'Tangerang', '08977234567', 'Pusing dan sering sakit pinggang', '2025-06-17', '12:20:00', 1, 'proses'),
(8, 10, 'Ridho Rizky', '2009-11-17', 'Tangerang', '082133554466', 'Panas sudah 3 hari, dan muntah-muntah', '2025-06-19', '13:30:00', 2, 'proses'),
(9, 12, 'Sumiyati', '1887-11-09', 'Darussalam 1', '082133554466', 'Cek asam urat, dan sering sakit kaki', '2025-06-10', '10:00:00', 4, 'ditolak'),
(10, 13, 'Bayu', '2003-02-20', 'Kutabumi', '08984985081', 'Pilek batuk', '2025-06-14', '10:30:00', 1, 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pasien') NOT NULL DEFAULT 'pasien',
  `nama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `nama`, `created_at`) VALUES
(3, 'admin', '$2y$10$hKfUAxQGuVHN3mVhMMXJIezIvfwnbNRvyjhPcxkLdHIEYzgnF2LLS', 'admin', 'admin', '2025-06-05 10:04:34'),
(8, 'pasien1', '$2y$10$ymZUDKnwOTgdJtDXQMC.BOOZvAcWYsybunjKA5vRqqq2L1kKG0sl6', 'pasien', 'Silviana', '2025-06-05 13:03:33'),
(9, 'pasien2', '$2y$10$OsXuCoXJdZ1fv5XmGSpSUuXGgsILKO3agPrDpdA//AjoDpDdneVQy', 'pasien', 'Shanaya Elshanum', '2025-06-06 01:12:18'),
(12, 'pasien4', '$2y$10$bQf0g4QiN8pCK/Heri3ZreHAynfk76/4Dh5gL4dj6LeLWFRFSruo2', 'pasien', 'Sumiyati', '2025-06-06 02:47:29'),
(13, 'pasien6', '$2y$10$tk8GVn5WICUU41uYVMFbRuCuDHeiT9O4hV9yOtvl4e6r.ibJOhEVi', 'pasien', 'Bayu', '2025-06-06 09:23:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
