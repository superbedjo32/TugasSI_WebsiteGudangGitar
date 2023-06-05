-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 07:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `gitars`
--

CREATE TABLE `gitars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Gitar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stok` bigint(20) NOT NULL,
  `id_Jenis` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gitars`
--

INSERT INTO `gitars` (`id`, `Nama_Gitar`, `Stok`, `id_Jenis`, `created_at`, `updated_at`) VALUES
(1, 'Les Paul', 1, 1, '2023-05-26 12:23:19', '2023-06-03 17:30:48'),
(2, 'EB-4', 15, 2, '2023-06-03 02:34:57', '2023-06-03 17:31:03'),
(3, 'SG', 50, 1, '2023-06-03 17:03:46', '2023-06-03 17:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `gudangs`
--

CREATE TABLE `gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Gudang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat_Gudang` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gudangs`
--

INSERT INTO `gudangs` (`id`, `Nama_Gudang`, `Alamat_Gudang`, `created_at`, `updated_at`) VALUES
(1, 'anu', 'jl. hehe', '2023-06-03 04:10:28', '2023-06-03 10:53:22'),
(2, 'Gudang 01', 'jl. hehe', '2023-06-03 17:28:05', '2023-06-03 17:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `jenis__gitars`
--

CREATE TABLE `jenis__gitars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis__gitars`
--

INSERT INTO `jenis__gitars` (`id`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Gitar Elektrik', '2023-05-26 12:23:08', '2023-06-03 10:43:53'),
(2, 'Bass', '2023-06-03 02:34:31', '2023-06-03 10:44:00'),
(3, 'Akustik', '2023-06-03 10:44:10', '2023-06-03 10:44:10');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_05_26_134707_create_roles_table', 1),
(5, '2023_05_26_134708_create_users_table', 1),
(6, '2023_05_26_135145_create_jenis__gitars_table', 1),
(7, '2023_05_26_135259_create_gitars_table', 1),
(8, '2023_05_26_140043_create_gudangs_table', 1),
(9, '2023_05_26_140338_create_supirs_table', 1),
(10, '2023_05_26_140455_create_truks_table', 1),
(11, '2023_05_26_140456_create_outlets_table', 1),
(12, '2023_05_26_140457_create_rutes_table', 1),
(13, '2023_05_26_140755_create_pengirimen_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Outlet` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat_Outlet` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telp_Outlet` bigint(20) NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `Nama_Outlet`, `Alamat_Outlet`, `Telp_Outlet`, `id_users`, `created_at`, `updated_at`) VALUES
(1, 'Outlet 02', 'asdasd', 988909, 4, '2023-06-03 05:28:01', '2023-06-03 17:28:36'),
(2, 'annu', 'asasdas', 98, 4, '2023-06-03 05:28:50', '2023-06-03 05:28:50'),
(3, 'asda', 'asd', 988909123, 5, '2023-06-03 05:32:20', '2023-06-03 05:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `pengirimen`
--

CREATE TABLE `pengirimen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_Gitar` bigint(20) UNSIGNED NOT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Waktu_Pengiriman` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Supir` bigint(20) UNSIGNED NOT NULL,
  `id_Rute` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirimen`
--

INSERT INTO `pengirimen` (`id`, `id_users`, `id_Gitar`, `Jumlah`, `Waktu_Pengiriman`, `id_Supir`, `id_Rute`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 15, '2023-06-02', 1, 1, '2023-06-03 07:33:58', '2023-06-03 11:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'anu', '2023-06-03 04:23:48', '2023-06-03 10:27:08'),
(2, 'Pengguna', '2023-06-03 05:07:55', '2023-06-03 05:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `rutes`
--

CREATE TABLE `rutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_Gudang` bigint(20) UNSIGNED NOT NULL,
  `id_Outlet` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rutes`
--

INSERT INTO `rutes` (`id`, `id_Gudang`, `id_Outlet`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-06-03 05:47:58', '2023-06-03 09:24:48'),
(2, 2, 1, '2023-06-03 17:28:48', '2023-06-03 17:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `supirs`
--

CREATE TABLE `supirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Supir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat_Supir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telp_Supir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supirs`
--

INSERT INTO `supirs` (`id`, `Nama_Supir`, `Alamat_Supir`, `Telp_Supir`, `created_at`, `updated_at`) VALUES
(1, 'ad', 'sda', '2345', '2023-06-03 03:19:55', '2023-06-03 09:32:07'),
(2, 'anu', 'jl. hehe', '12834781924', '2023-06-03 03:47:33', '2023-06-03 03:47:33'),
(3, 'anu', 'jl. hehe', '12834781924', '2023-06-03 03:48:03', '2023-06-03 03:48:03'),
(4, 'anu', 'jl. hehe', '12834781924', '2023-06-03 03:49:14', '2023-06-03 03:49:14'),
(5, 'anu', 'jl.asss', '12834781924', '2023-06-03 03:49:54', '2023-06-03 03:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `truks`
--

CREATE TABLE `truks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nopol_Truk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Supir` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truks`
--

INSERT INTO `truks` (`id`, `Nopol_Truk`, `id_Supir`, `created_at`, `updated_at`) VALUES
(1, 'N 67 B', 1, '2023-06-03 03:45:46', '2023-06-03 09:12:26'),
(2, 'N 67 C', 2, '2023-06-03 03:52:28', '2023-06-03 08:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_role`, `created_at`, `updated_at`) VALUES
(4, 'nekochan', 'hehe@gmail.com', 'asu', 1, '2023-06-03 05:05:39', '2023-06-03 10:20:29'),
(5, 'santo', 'anu@gmail.com', 'qwe', 2, '2023-06-03 05:08:15', '2023-06-03 05:08:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gitars`
--
ALTER TABLE `gitars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gitars_id_jenis_foreign` (`id_Jenis`);

--
-- Indexes for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis__gitars`
--
ALTER TABLE `jenis__gitars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlets_id_users_foreign` (`id_users`);

--
-- Indexes for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengirimen_id_users_foreign` (`id_users`),
  ADD KEY `pengirimen_id_gitar_foreign` (`id_Gitar`),
  ADD KEY `pengirimen_id_supir_foreign` (`id_Supir`),
  ADD KEY `pengirimen_id_rute_foreign` (`id_Rute`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rutes`
--
ALTER TABLE `rutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutes_id_gudang_foreign` (`id_Gudang`),
  ADD KEY `rutes_id_outlet_foreign` (`id_Outlet`);

--
-- Indexes for table `supirs`
--
ALTER TABLE `supirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truks`
--
ALTER TABLE `truks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truks_id_supir_foreign` (`id_Supir`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gitars`
--
ALTER TABLE `gitars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gudangs`
--
ALTER TABLE `gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis__gitars`
--
ALTER TABLE `jenis__gitars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengirimen`
--
ALTER TABLE `pengirimen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supirs`
--
ALTER TABLE `supirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `truks`
--
ALTER TABLE `truks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gitars`
--
ALTER TABLE `gitars`
  ADD CONSTRAINT `gitars_id_jenis_foreign` FOREIGN KEY (`id_Jenis`) REFERENCES `jenis__gitars` (`id`);

--
-- Constraints for table `outlets`
--
ALTER TABLE `outlets`
  ADD CONSTRAINT `outlets_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD CONSTRAINT `pengirimen_id_gitar_foreign` FOREIGN KEY (`id_Gitar`) REFERENCES `gitars` (`id`),
  ADD CONSTRAINT `pengirimen_id_rute_foreign` FOREIGN KEY (`id_Rute`) REFERENCES `rutes` (`id`),
  ADD CONSTRAINT `pengirimen_id_supir_foreign` FOREIGN KEY (`id_Supir`) REFERENCES `supirs` (`id`),
  ADD CONSTRAINT `pengirimen_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `rutes`
--
ALTER TABLE `rutes`
  ADD CONSTRAINT `rutes_id_gudang_foreign` FOREIGN KEY (`id_Gudang`) REFERENCES `gudangs` (`id`),
  ADD CONSTRAINT `rutes_id_outlet_foreign` FOREIGN KEY (`id_Outlet`) REFERENCES `outlets` (`id`);

--
-- Constraints for table `truks`
--
ALTER TABLE `truks`
  ADD CONSTRAINT `truks_id_supir_foreign` FOREIGN KEY (`id_Supir`) REFERENCES `supirs` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
