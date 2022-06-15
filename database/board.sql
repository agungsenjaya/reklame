-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2022 at 05:50 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `board`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `judul`, `foto`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'biznet networks', 'img/brand/16548659191.png', 'biznet-networks', '2022-06-10 05:58:39', '2022-06-10 05:58:39'),
(2, 1, 'gojek indonesia', 'img/brand/16548659322.png', 'gojek-indonesia', '2022-06-10 05:58:52', '2022-06-10 05:58:52'),
(3, 1, 'softex indonesia', 'img/brand/16548659503.png', 'softex-indonesia', '2022-06-10 05:59:10', '2022-06-10 05:59:10'),
(4, 1, 'pt gudang garam tbk', 'img/brand/16548659684.png', 'pt-gudang-garam-tbk', '2022-06-10 05:59:28', '2022-06-10 06:00:05'),
(5, 1, 'pt surya madistrindo', 'img/brand/16548659925.png', 'pt-surya-madistrindo', '2022-06-10 05:59:52', '2022-06-10 05:59:52'),
(6, 1, 'aqua', 'img/brand/16548660446.png', 'aqua', '2022-06-10 06:00:44', '2022-06-10 06:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `nama`, `email`, `phone`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'agung senjaya', 'agungsenjaya813@gmail.com', NULL, 'percobaan pertama', '2022-06-05 02:39:31', '2022-06-05 02:39:31'),
(2, 'agung senjaya', 'agungsenjaya813@gmail.com', NULL, 'percobaan pesan', '2022-06-05 02:40:47', '2022-06-05 02:40:47'),
(3, 'hari tano', 'hari@sample.com', NULL, 'percobaan hary', '2022-06-05 02:41:29', '2022-06-05 02:41:29'),
(4, 'agung senjaya', 'agungsenjaya813@gmail.com', NULL, 'percobaan lagi dah', '2022-06-05 02:43:07', '2022-06-05 02:43:07');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(121, '2014_10_12_000000_create_users_table', 1),
(122, '2014_10_12_100000_create_password_resets_table', 1),
(123, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(124, '2019_08_19_000000_create_failed_jobs_table', 1),
(125, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(126, '2022_05_22_082026_create_sessions_table', 1),
(127, '2022_05_22_085850_create_reklames_table', 1),
(128, '2022_05_22_090130_create_contacts_table', 1),
(130, '2022_05_22_090500_create_brands_table', 1),
(131, '2022_05_22_090147_create_orders_table', 2),
(133, '2022_06_15_034635_create_portofolios_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reklame_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `biaya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reklame_id`, `user_id`, `kode`, `nama`, `email`, `phone`, `status`, `start_date`, `end_date`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'FmRO43hunsL4vY0F', 'pt alki jaya', NULL, NULL, 'yes', '2022-06-01', '2022-06-30', '800.000', '2022-06-02 12:17:40', '2022-06-03 08:41:31'),
(2, 2, 1, 'rkXtZYGYVPtUVhFL', 'yadi wijaya', 'yadi@sample.com', '8452244586', 'yes', '2022-06-23', '2022-08-12', '450.000', '2022-06-03 12:56:59', '2022-06-03 12:56:59');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portofolios`
--

CREATE TABLE `portofolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portofolios`
--

INSERT INTO `portofolios` (`id`, `user_id`, `judul`, `foto`, `content`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'pemasangan reklame daerah cisaat', 'img/portofolio/16552695271 - copy.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.<p style=\"text-align: center; \"><img style=\"width: 50%;\" data-filename=\"1 - Copy.png\" src=\"/img/portofolio/16552695270.png\"></p><p style=\"text-align: left;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.</p><p style=\"text-align: center;\"><img style=\"width: 600px;\" data-filename=\"1 - Copy (2).png\" src=\"/img/portofolio/16552695271.png\"></p><p style=\"text-align: left;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quis autem modi, velit nulla id dolorem quae, debitis dicta laborum odio ratione! Quos accusantium pariatur eius ab recusandae, fuga natus.<br></p></p>\n', 'pemasangan-reklame-daerah-cisaat', NULL, '2022-06-14 22:05:27', '2022-06-14 22:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `reklames`
--

CREATE TABLE `reklames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` json NOT NULL,
  `tipe` enum('portrait','landscape') COLLATE utf8mb4_unicode_ci NOT NULL,
  `arah` enum('utara','timur laut','timur','tenggara','selatan','barat daya','barat','barat laut') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('indoor','outdoor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` json NOT NULL,
  `alamat` json NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reklames`
--

INSERT INTO `reklames` (`id`, `user_id`, `judul`, `ukuran`, `tipe`, `arah`, `kategori`, `foto`, `alamat`, `content`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'reklame dekat yogya dept storea', '{\"tinggi\": \"1080\", \"panjang\": \"1349\"}', 'portrait', 'timur', 'outdoor', '[{\"id\": 1, \"url\": \"/storage/upload/reklame/01654097441.png\"}, {\"id\": 3, \"url\": \"/storage/upload/reklame/21654097442.png\"}, {\"id\": 5, \"url\": \"/storage/upload/reklame/41654097442.png\"}]', '{\"lat\": \"-6.92034458260062\", \"lng\": \"106.92898393698638\", \"alamat\": \"Jl. R. E. Martadinata No.26, Gunungparang, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111, Indonesia\"}', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?', 'reklame-dekat-yogya-dept-storea', NULL, '2022-06-01 08:30:44', '2022-06-02 11:04:01'),
(2, 1, 'reklame deket pasar induk cibadak', '{\"tinggi\": \"1080\", \"panjang\": \"1349\"}', 'landscape', 'selatan', 'indoor', '[{\"id\": 1, \"url\": \"/storage/upload/reklame/01654142185.png\"}, {\"id\": 3, \"url\": \"/storage/upload/reklame/21654142185.png\"}]', '{\"lat\": \"-6.888509984007335\", \"lng\": \"106.78036174508446\", \"alamat\": \"Jl. Siliwangi No.143, Sukamantri, Kec. Cibadak, Kabupaten Sukabumi, Jawa Barat 43351, Indonesia\"}', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?', 'reklame-deket-pasar-induk-cibadak', NULL, '2022-06-01 20:56:26', '2022-06-01 20:56:26'),
(3, 1, 'reklame daerah sukaraja', '{\"tinggi\": \"1080\", \"panjang\": \"1349\"}', 'landscape', 'barat daya', 'outdoor', '[{\"id\": 1, \"url\": \"/storage/upload/reklame/01654142944.png\"}, {\"id\": 3, \"url\": \"/storage/upload/reklame/21654142944.png\"}, {\"id\": 5, \"url\": \"/storage/upload/reklame/41654142944.png\"}]', '{\"lat\": \"-6.917445369373574\", \"lng\": \"106.97245947715646\", \"alamat\": \"Jl. Nasional III No.301, Pasirhalang, Kec. Sukaraja, Kabupaten Sukabumi, Jawa Barat 43192, Indonesia\"}', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?', 'reklame-daerah-sukaraja', NULL, '2022-06-01 21:09:06', '2022-06-01 21:09:06'),
(4, 1, 'reklame daerah cibatu', '{\"tinggi\": \"1080\", \"panjang\": \"1349\"}', 'portrait', 'tenggara', 'indoor', '[{\"id\": 1, \"url\": \"/storage/upload/reklame/01654143160.png\"}, {\"id\": 3, \"url\": \"/storage/upload/reklame/21654143160.png\"}]', '{\"lat\": \"-6.905169605421996\", \"lng\": \"106.88754890830947\", \"alamat\": \"Jl. Raya Cibatu Cisaat No.286, Nagrak, Kec. Cisaat, Kabupaten Sukabumi, Jawa Barat 43152, Indonesia\"}', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?', 'reklame-daerah-cibatu', NULL, '2022-06-01 21:12:41', '2022-06-02 11:03:50'),
(5, 1, 'reklame daerah kota sukabumi', '{\"tinggi\": \"1080\", \"panjang\": \"1349\"}', 'portrait', 'selatan', 'indoor', '[{\"id\": \"XJ7s\", \"url\": \"/storage/upload/reklame/01654193722.jpg\"}, {\"id\": \"ABlx\", \"url\": \"/storage/upload/reklame/11654193723.jpg\"}, {\"id\": \"YmxT\", \"url\": \"/storage/upload/reklame/21654193723.jpg\"}]', '{\"lat\": \"-6.556581915838741\", \"lng\": \"106.77530143868898\", \"alamat\": \"Pengadilan Agama Kota Bogor, Curugmekar, Kec. Bogor Bar., Kota Bogor, Jawa Barat, Indonesia\"}', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem optio cum tempore ad repudiandae sint nihil, sunt doloribus cupiditate numquam laudantium quod dolorem ipsum vel repellendus illum. Quisquam, placeat?', 'reklame-daerah-kota-sukabumi', NULL, '2022-06-02 11:15:25', '2022-06-02 11:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0r7stFltgoaNh8TdSODFOZYMImUrHmd40XHmqgTZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.39', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUmJHbUt5cmVvREEwQjVrbnFLZ21RRlZWNHZSbFRVa2FtQ0hyZDlZMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9wb3J0b2ZvbGlvL2VkaXQvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkdUhIanZTeVEwOE5NckdnTnVSZTduT3M0Y21SaUNsNDd4TkY5S2Y3cm5tLmdKTkZjZ0V4ZlciO30=', 1655271963);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'media adhi persada', 'info@mapkreatif.com', NULL, '$2y$10$uHHjvSyQ08NMrGgNuRe7nOs4cmRiCl47xNF9Kf7rnm.gJNFcgExfW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portofolios`
--
ALTER TABLE `portofolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reklames`
--
ALTER TABLE `reklames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portofolios`
--
ALTER TABLE `portofolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reklames`
--
ALTER TABLE `reklames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
