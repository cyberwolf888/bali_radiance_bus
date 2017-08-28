-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Agu 2017 pada 12.57
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_radiance`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fee_kernet`
--

CREATE TABLE `fee_kernet` (
  `id` int(11) NOT NULL,
  `kernet_id` int(11) DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fee_sopir`
--

CREATE TABLE `fee_sopir` (
  `id` int(11) NOT NULL,
  `sopir_id` int(11) DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` varchar(10) NOT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `kmmeter` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `ket`, `status`, `kmmeter`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
('DK1000LK', 'mobil baru', 1, 500, '2017-08-18 05:08:11', '2017-08-18 05:23:41', 1, 1, NULL),
('DK1001K', 'mobil lama', 1, 1000, '2017-08-18 05:09:44', '2017-08-21 05:31:15', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kernet`
--

CREATE TABLE `kernet` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `no_hp` varchar(12) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kernet`
--

INSERT INTO `kernet` (`id`, `nama`, `no_hp`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'Nyoman', '0853736434', 1, '2017-08-18 05:52:15', '2017-08-18 05:53:41', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_03_054055_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'operator', 'Input Operator', 'User is the operator of a system', '2017-03-02 21:51:52', '2017-03-02 21:51:52'),
(2, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2017-03-02 21:51:52', '2017-03-02 21:51:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `kendaraan_id`, `service_date`, `total`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, '2017-08-03', 73000, '146b8736183d68296ec2a76157f19052.jpg', '2017-03-09 20:07:14', '2017-03-09 20:07:14'),
(3, 1, '2017-03-16', 100000, 'cf09a56182f8ffda31c082129a3b06ff.jpg', '2017-03-15 18:32:58', '2017-03-15 18:32:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `no_hp` varchar(12) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id`, `nama`, `no_hp`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'Wirawan S', '08684854', 1, '2017-08-18 05:43:41', '2017-08-18 05:53:07', 1, 1, NULL),
(2, 'Bedebah', '086737384', 1, '2017-08-18 05:50:07', '2017-08-18 05:50:07', 1, NULL, NULL),
(3, 'Made', '085737343465', 1, '2017-08-18 05:50:47', '2017-08-18 05:50:47', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kendaraan_id` varchar(50) NOT NULL DEFAULT '0',
  `supir_id` int(11) NOT NULL DEFAULT '0',
  `kernet_id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `tgl_jalan` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `durasi` int(2) DEFAULT NULL,
  `paket` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kendaraan_id`, `supir_id`, `kernet_id`, `nama`, `telp`, `tgl_jalan`, `tgl_kembali`, `durasi`, `paket`, `total`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'DK1000LK', 1, 1, 'I Made Hendra Wijaya', '082247464196', '2017-08-10', '2017-08-10', 1, '2', 4000000, 1, '2017-08-19 08:59:09', '2017-08-19 08:59:09', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `keterangan`, `total`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 1, 'Beli bensin', 100000, '2017-08-21 05:02:21', '2017-08-21 05:02:21', 1, NULL, NULL),
(2, 1, 'parkir', 50000, '2017-08-21 05:22:26', '2017-08-21 05:22:26', 1, NULL, NULL),
(3, 1, 'nyebrang', 400000, '2017-08-21 05:23:01', '2017-08-21 05:23:01', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `password`, `remember_token`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '085737343456', '$2y$10$Ga3rIFEmrG.8QsWkpHddrOgoxl6JhPfP4SY/CgCauTBnTpHzLpHTu', 'R9bLGjiMarkam2fnxqNQM2Li5f9yrbjbyRTzVYY87qi9LDpuZ5Ugxpkbnv8f', 1, 1, '2017-03-02 21:49:08', '2017-08-08 04:30:11'),
(2, 'Test Operator', 'operator@mail.com', '08573736483', '$2y$10$GVVx1dXRRaMCeqKxLOAxoesiIPHRtyVmed7lR9/ejUXa6iaBMDYXi', '3z61oCPJfrjy2nL58BdwN1DzU3bYkkqFPFcGsgKV293oIYP5RjIt5QiRwWEg', 2, 1, '2017-03-13 05:44:16', '2017-08-08 04:31:46'),
(3, 'Admin Test', 'admin2@mail.com', '085737343456', '$2y$10$2dAYQNTVNhDruggKIqRaTuZtAQETnhKAr2LLtNeBX30c/.ntRGzOG', NULL, 1, 1, '2017-03-14 19:21:49', '2017-03-14 19:21:49'),
(4, 'Operator Awesome', 'awesome@mail.com', '08474283728', '$2y$10$YgZeq5P7BJnIJvcLIJbLSORIW9i0XOWJ.RbniMjZ0d5AKFmH7Y.tW', 'RIgzVSlCTBElZPgrwG48uUmNF7XgYhwPL8kqvTl1UR8lRgH9NXl5UjumNPPs', 2, 1, '2017-03-14 19:25:49', '2017-03-14 19:29:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fee_kernet`
--
ALTER TABLE `fee_kernet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_sopir`
--
ALTER TABLE `fee_sopir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kernet`
--
ALTER TABLE `kernet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
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
-- AUTO_INCREMENT for table `fee_kernet`
--
ALTER TABLE `fee_kernet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_sopir`
--
ALTER TABLE `fee_sopir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kernet`
--
ALTER TABLE `kernet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
