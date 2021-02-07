-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2021 at 07:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rizkybaru_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_13_073529_create_transaksi_tanki_table', 1),
(5, '2021_01_13_073540_create_transaksi_galon_table', 1),
(6, '2021_01_13_073557_create_transaksi_jerigen_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_galon`
--

CREATE TABLE `transaksi_galon` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_transaksi` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_galon`
--

INSERT INTO `transaksi_galon` (`id`, `tgl_transaksi`, `harga_satuan`, `qty`, `total_harga`, `id_user`, `created_at`, `updated_at`) VALUES
(22, '04-02-2021', 9999, 1, 9999, 1, '2021-02-03 10:09:52', '2021-02-03 10:09:52'),
(23, '05-01-2021', 5000, 1, 5000, 1, '2021-02-03 22:40:22', '2021-02-03 22:40:22'),
(24, '04-02-2021', 5000, 2, 10000, 1, '2021-02-05 07:57:24', '2021-02-05 07:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jerigen`
--

CREATE TABLE `transaksi_jerigen` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_transaksi` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_jerigen`
--

INSERT INTO `transaksi_jerigen` (`id`, `tgl_transaksi`, `harga_satuan`, `qty`, `total_harga`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '03-02-2021', 5000, 3, 15000, 2, '2021-02-03 09:15:32', '2021-02-03 09:15:32'),
(2, '03-02-2021', 5500, 4, 9000, 2, '2021-02-03 09:15:53', '2021-02-03 22:06:18'),
(3, '04-02-2021', 5000, 1, 5000, 1, '2021-02-03 22:06:37', '2021-02-03 22:06:37'),
(4, '01-01-2021', 5000, 2, 10000, 1, '2021-02-04 05:00:17', '2021-02-04 05:00:17'),
(5, '11-02-2021', 9999, 2, 19998, 1, '2021-02-05 07:57:36', '2021-02-05 07:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tanki`
--

CREATE TABLE `transaksi_tanki` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_transaksi` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengantar` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_tanki`
--

INSERT INTO `transaksi_tanki` (`id`, `tgl_transaksi`, `nama_pengantar`, `harga_satuan`, `id_user`, `created_at`, `updated_at`) VALUES
(2, '05-02-2021', 'tatang suhendra', 400000, 1, '2021-02-03 22:34:40', '2021-02-03 22:34:40'),
(3, '04-02-2021', 'asep herman', 450000, 1, '2021-02-03 22:35:51', '2021-02-03 22:35:51'),
(4, '19-02-2021', 'suryono', 450000, 1, '2021-02-05 07:57:54', '2021-02-05 07:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `alamat`, `no_tlp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '-', '-', 'super@admin.com', NULL, '$2y$10$LyBR5cRy90IR26MwoKNLI.bcGyfMlE.mTYVjRePn2dK3PZ6T6SSNy', 'Jz3HoT9LS54pOn7cUFKvRgNhe8JoQ7F0h4kp6jkbiS17sbBJcA8KKSatq0DV', '2021-02-02 20:28:54', '2021-02-02 20:28:54'),
(2, 'riski', 'cibiru, Bandung', '08333144343', 'riski@yahoo.com', NULL, '$2y$10$6E3ieqHU19uhfysp8JOh6eckgM6.uWO5xsHGJmEaJ0VTna8RXhyiy', NULL, '2021-02-03 09:39:40', '2021-02-03 09:39:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transaksi_galon`
--
ALTER TABLE `transaksi_galon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi_jerigen`
--
ALTER TABLE `transaksi_jerigen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_tanki`
--
ALTER TABLE `transaksi_tanki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_galon`
--
ALTER TABLE `transaksi_galon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transaksi_jerigen`
--
ALTER TABLE `transaksi_jerigen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_tanki`
--
ALTER TABLE `transaksi_tanki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
