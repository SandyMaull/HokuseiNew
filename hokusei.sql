-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2021 at 06:52 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hokusei`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filosopi_contents`
--

CREATE TABLE `filosopi_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tampilan_id` int(10) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filosopi_contents`
--

INSERT INTO `filosopi_contents` (`id`, `tampilan_id`, `content`, `bagian`, `class`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sebuah gerbang untuk menunjukan bahwa itu adalah gerbang utama UKM HOKUSEI.', 'Gate torii (Gerbang)', '', '2020-09-05 08:02:22', '2020-10-17 09:49:27'),
(2, 1, 'Merah yang berarti semangat, warna ini juga mengartikan bahwa UKM HOKUSEI UTS sangatlah bersemangat untuk mengenalkan Ilmu Sastra dan Kebudayaan Jepang.', 'Warna Merah', '', '2020-09-05 08:03:37', '2020-10-17 09:49:27'),
(3, 1, 'Buku pada tengah logo bertujuan bahwa itulah icon sumber ilmu yang bisa kita dapat.', 'Buku', '', '2020-09-05 08:04:44', '2020-10-17 09:49:27'),
(4, 1, 'Seperti logo Universitas Teknologi Sumbawa sarang lebah ini menyimpan hal-hal yang baik untuk disimpan pada UKM Hokusei UTS.', 'Sarang Lebah', '', '2020-09-05 08:05:28', '2020-10-17 09:49:27'),
(5, 1, 'Dimaksudkan semua unsur logo tidak keluar dari visi misi Hokusei, dan harapannya UKM Hokusei ini dapat dilihat dari berbagai sudut pandang.', 'Lingkaran', '', '2020-09-05 08:06:06', '2020-10-17 09:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `filosopi_image`
--

CREATE TABLE `filosopi_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tampilan_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filosopi_image`
--

INSERT INTO `filosopi_image` (`id`, `tampilan_id`, `image`, `bagian`, `created_at`, `updated_at`) VALUES
(1, 1, 'img/hokusei-logo-fix.png', 'logo', '2020-09-05 08:08:25', '2020-09-05 08:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `header_contents`
--

CREATE TABLE `header_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tampilan_id` int(10) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_contents`
--

INSERT INTO `header_contents` (`id`, `tampilan_id`, `content`, `bagian`, `created_at`, `updated_at`) VALUES
(1, 1, 'Documentasi Kegiatan UKM Hokusei saat event \"Japanese Speech Contest\" pada tahun 2017', 'head', '2020-09-05 06:59:55', '2020-10-14 19:52:10'),
(2, 1, 'Hokusei', 'HeaderImages-H1', NULL, '2020-10-14 19:52:10'),
(3, 1, 'にほん の ぶんがく の せかい', 'HeaderImages-H3', NULL, '2020-10-14 19:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `header_image`
--

CREATE TABLE `header_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tampilan_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resize` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_image`
--

INSERT INTO `header_image` (`id`, `tampilan_id`, `image`, `bagian`, `resize`, `created_at`, `updated_at`) VALUES
(1, 1, 'img/1602698526_5f873d1e054b8.jpg', 'first', 'img/resize_slider/1602698526_5f873d1e054b8.jpg', '2020-09-05 06:19:52', '2020-10-14 12:26:41'),
(22, 1, 'img/1602698500_5f873d04d79b4.jpg', 'slide', 'img/resize_slider/1602698500_5f873d04d79b4.jpg', '2020-10-14 11:01:40', '2020-10-14 11:01:40'),
(23, 1, 'img/1602698501_5f873d051353b.jpg', 'slide', 'img/resize_slider/1602698501_5f873d051353b.jpg', '2020-10-14 11:01:41', '2020-10-14 11:01:41'),
(24, 1, 'img/1602698501_5f873d052de02.jpg', 'slide', 'img/resize_slider/1602698501_5f873d052de02.jpg', '2020-10-14 11:01:41', '2020-10-14 11:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2020_09_02_000000_create_tampilan_table', 1),
(27, '2020_09_02_100000_create_header_image_table', 1),
(28, '2020_09_02_200000_create_header_contents_table', 1),
(29, '2020_09_02_300000_create_sejarah_image_table', 1),
(30, '2020_09_02_400000_create_sejarah_contents_table', 1),
(31, '2020_09_02_500000_create_filosopi_image_table', 1),
(32, '2020_09_02_600000_create_filosopi_contents_table', 1),
(33, '2020_09_02_700000_create_struktur_pengurus_table', 1),
(34, '2014_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_contents`
--

CREATE TABLE `sejarah_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tampilan_id` int(10) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sejarah_contents`
--

INSERT INTO `sejarah_contents` (`id`, `tampilan_id`, `content`, `bagian`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hokusei adalah salah satu UKM di Universitas Teknologi Sumbawa yang berbasis bahasa jepang, Hokusei didirikan tanggal 5 Desember 2016 dibawah naungan Universitas sebagai UKM', 'sejarah', '2020-09-05 07:06:40', '2020-10-17 09:49:27'),
(2, 1, 'Mempelajari dan mengaplikasikan Ilmu Sastra dan Kebudayaan Jepang serta mengenalkannya kepada masyarakat', 'visi', '2020-09-05 07:07:39', '2020-10-17 09:49:27'),
(3, 1, 'Mempelajari Ilmu Sastra dan kebudayaan Jepang', 'misi', '2020-09-05 07:08:21', '2020-10-17 09:49:27'),
(4, 1, 'Meningkatkan Kreatifitas dalam Ilmu Sastra dan Kebudayaan Jepang', 'misi', '2020-09-05 07:08:47', '2020-10-17 09:49:27'),
(5, 1, 'Mengenalkan Kebudayaan Jepang kepada Masyarakat', 'misi', '2020-09-05 07:09:13', '2020-10-17 09:49:27'),
(6, 1, 'Mengaplikasikan Ilmu Sastra dan Kebudayaan Jepang sehingga berguna bagi Masyarakat', 'misi', '2020-09-05 07:09:46', '2020-10-17 09:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_image`
--

CREATE TABLE `sejarah_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tampilan_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resize` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sejarah_image`
--

INSERT INTO `sejarah_image` (`id`, `tampilan_id`, `image`, `bagian`, `resize`, `created_at`, `updated_at`) VALUES
(1, 1, 'img/1602951123_5f8b17d33569e.JPG', 'kaichou', 'img/resize_slider/1602951123_5f8b17d33569e.JPG', '2020-09-05 07:11:33', '2020-10-17 09:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_pengurus`
--

CREATE TABLE `struktur_pengurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tampilan_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_pengurus`
--

INSERT INTO `struktur_pengurus` (`id`, `tampilan_id`, `nama`, `jabatan`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Azrial Abizard', 'Kaichou', 'img/Pengurus/BPH/kaichou.png', NULL, NULL),
(2, 1, 'Lilis Suryani', 'Hisho', 'img/Pengurus/dummy.png', NULL, NULL),
(3, 1, 'Ika Widia Arisma', 'Kaikei', 'img/Pengurus/dummy.png', NULL, NULL),
(4, 1, 'Sandy Maulana', 'K-KOMINFO', 'img/Pengurus/KOMINFO/kadiv.png', NULL, NULL),
(5, 1, 'Ardila Tri Yuli Yanti', 'K-PSDM', 'img/Pengurus/PSDM/kadiv.png', NULL, NULL),
(6, 1, 'Muhammad Rizky', 'K-PENDIDIKAN', 'img/Pengurus/Pendidikan/kadiv.png', NULL, NULL),
(7, 1, 'Yusuf Nasih Ulwan', 'K-KEBUDAYAAN', 'img/Pengurus/Kebudayaan/kadiv.jpeg', NULL, NULL),
(8, 1, 'Fernando Saputra', 'K-KEWIRAUSAHAAN', 'img/Pengurus/dummy.png', NULL, NULL),
(9, 1, 'Ro’if Jamaaludin Pramudia ', 'KEBUDAYAAN', 'img/Pengurus/Kebudayaan/Kebudayaan-1.jpeg', NULL, NULL),
(10, 1, 'Ajie Try Purnomo', 'KEBUDAYAAN', 'img/Pengurus/Kebudayaan/Kebudayaan-2.jpeg', NULL, NULL),
(12, 1, 'M Noor Al-Fizan', 'KEBUDAYAAN', 'img/Pengurus/Kebudayaan/Kebudayaan-3.jpeg', NULL, NULL),
(13, 1, 'Muhammad Yusuf Karim', 'KOMINFO', 'img/Pengurus/dummy.png', NULL, NULL),
(14, 1, 'Ade Wahyu', 'KOMINFO', 'img/Pengurus/dummy.png', NULL, NULL),
(15, 1, 'Muhammad Azzam Al-Fauzie', 'KOMINFO', 'img/Pengurus/dummy.png', NULL, NULL),
(16, 1, 'La Ode Muhammad Rahman', 'PSDM', 'img/Pengurus/dummy.png', NULL, NULL),
(17, 1, 'Aldiansyah', 'PSDM', 'img/Pengurus/dummy.png', NULL, NULL),
(18, 1, 'Ahmad Fadlur Rahman', 'PSDM', 'img/Pengurus/dummy.png', NULL, NULL),
(19, 1, 'Panji Akbar Samudra', 'KEWIRAUSAHAAN', 'img/Pengurus/dummy.png', NULL, NULL),
(20, 1, 'Khaidir Arbabul Bashair', 'KEWIRAUSAHAAN', 'img/Pengurus/dummy.png', NULL, NULL),
(21, 1, 'Irsan Aprilianto', 'KEWIRAUSAHAAN', 'img/Pengurus/dummy.png', NULL, NULL),
(22, 1, 'Khairunissa Salsabillah Putri', 'PENDIDIKAN', 'img/Pengurus/dummy.png', NULL, NULL),
(23, 1, 'Laily Khoirunnisa El Noor', 'PENDIDIKAN', 'img/Pengurus/dummy.png', NULL, NULL),
(24, 1, 'Siti Nuraisah A.M', 'PENDIDIKAN', 'img/Pengurus/dummy.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tampilan`
--

CREATE TABLE `tampilan` (
  `id` int(10) UNSIGNED NOT NULL,
  `halaman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tampilan`
--

INSERT INTO `tampilan` (`id`, `halaman`, `link`, `published`, `created_at`, `updated_at`) VALUES
(1, 'beranda', '/', 1, '2020-09-05 06:14:25', '2020-09-05 06:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', 'admin@hokusei.uts.ac.id', NULL, '$2y$10$IlTVU9jsiXcYaoZJQiRbQ.qHum1CE/CqoVY52udOjEwnIemqBmsh2', NULL, '2021-11-12 22:51:33', '2021-11-12 22:51:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filosopi_contents`
--
ALTER TABLE `filosopi_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filosopi_contents_tampilan_id_foreign` (`tampilan_id`);

--
-- Indexes for table `filosopi_image`
--
ALTER TABLE `filosopi_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filosopi_image_tampilan_id_foreign` (`tampilan_id`);

--
-- Indexes for table `header_contents`
--
ALTER TABLE `header_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `header_contents_tampilan_id_foreign` (`tampilan_id`);

--
-- Indexes for table `header_image`
--
ALTER TABLE `header_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `header_image_tampilan_id_foreign` (`tampilan_id`);

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
-- Indexes for table `sejarah_contents`
--
ALTER TABLE `sejarah_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sejarah_contents_tampilan_id_foreign` (`tampilan_id`);

--
-- Indexes for table `sejarah_image`
--
ALTER TABLE `sejarah_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sejarah_image_tampilan_id_foreign` (`tampilan_id`);

--
-- Indexes for table `struktur_pengurus`
--
ALTER TABLE `struktur_pengurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `struktur_pengurus_tampilan_id_foreign` (`tampilan_id`);

--
-- Indexes for table `tampilan`
--
ALTER TABLE `tampilan`
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
-- AUTO_INCREMENT for table `filosopi_contents`
--
ALTER TABLE `filosopi_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `filosopi_image`
--
ALTER TABLE `filosopi_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_contents`
--
ALTER TABLE `header_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `header_image`
--
ALTER TABLE `header_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sejarah_contents`
--
ALTER TABLE `sejarah_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sejarah_image`
--
ALTER TABLE `sejarah_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `struktur_pengurus`
--
ALTER TABLE `struktur_pengurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tampilan`
--
ALTER TABLE `tampilan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filosopi_contents`
--
ALTER TABLE `filosopi_contents`
  ADD CONSTRAINT `filosopi_contents_tampilan_id_foreign` FOREIGN KEY (`tampilan_id`) REFERENCES `tampilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `filosopi_image`
--
ALTER TABLE `filosopi_image`
  ADD CONSTRAINT `filosopi_image_tampilan_id_foreign` FOREIGN KEY (`tampilan_id`) REFERENCES `tampilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `header_contents`
--
ALTER TABLE `header_contents`
  ADD CONSTRAINT `header_contents_tampilan_id_foreign` FOREIGN KEY (`tampilan_id`) REFERENCES `tampilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `header_image`
--
ALTER TABLE `header_image`
  ADD CONSTRAINT `header_image_tampilan_id_foreign` FOREIGN KEY (`tampilan_id`) REFERENCES `tampilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sejarah_contents`
--
ALTER TABLE `sejarah_contents`
  ADD CONSTRAINT `sejarah_contents_tampilan_id_foreign` FOREIGN KEY (`tampilan_id`) REFERENCES `tampilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sejarah_image`
--
ALTER TABLE `sejarah_image`
  ADD CONSTRAINT `sejarah_image_tampilan_id_foreign` FOREIGN KEY (`tampilan_id`) REFERENCES `tampilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `struktur_pengurus`
--
ALTER TABLE `struktur_pengurus`
  ADD CONSTRAINT `struktur_pengurus_tampilan_id_foreign` FOREIGN KEY (`tampilan_id`) REFERENCES `tampilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
