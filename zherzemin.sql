-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 11:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zherzemin`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title_en`, `title_ku`, `title_ar`, `description_en`, `description_ku`, `description_ar`, `body_en`, `body_ku`, `body_ar`, `cover`, `featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 1, 'testart', NULL, NULL, 'asldkfj', NULL, NULL, 'klj;alwkjdf', NULL, NULL, '/storage/images/ariticleimages/2023-02-19FJJu64RX0WvZsrnzDwy03WLzFsZkeDlhWjTttBSl.png', 1, NULL, '2023-02-19 18:03:51', '2023-02-19 18:03:51'),
(10, 1, 'asdfa', NULL, NULL, 'fafwef', NULL, NULL, 'awfeawef', NULL, NULL, NULL, 0, NULL, '2023-02-19 21:09:39', '2023-02-19 21:09:39'),
(11, 1, 'fawergqwhg', NULL, NULL, 'gqerghwe4r', NULL, NULL, 'se', NULL, NULL, NULL, 0, NULL, '2023-02-19 21:09:44', '2023-02-19 21:09:44'),
(12, 1, 'gf34ewgaserg', NULL, NULL, 'qerg', NULL, NULL, 'ergq34g', NULL, NULL, NULL, 0, NULL, '2023-02-19 21:09:50', '2023-02-19 21:09:50'),
(13, 1, 'jytik6ew', NULL, NULL, 'hhertjetghws', NULL, NULL, 'rhesr', NULL, NULL, NULL, 0, NULL, '2023-02-19 21:09:57', '2023-02-19 21:09:57'),
(14, 1, '34g', NULL, NULL, 'q34', NULL, NULL, 'aw4egq4weg', NULL, NULL, NULL, 0, NULL, '2023-02-19 21:10:03', '2023-02-19 21:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `article_profile`
--

CREATE TABLE `article_profile` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_profile`
--

INSERT INTO `article_profile` (`article_id`, `profile_id`) VALUES
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 3),
(14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_sponser`
--

CREATE TABLE `article_sponser` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `sponser_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_sponser`
--

INSERT INTO `article_sponser` (`article_id`, `sponser_id`) VALUES
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES
(8, 5),
(9, 1),
(9, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title_en`, `title_ku`, `title_ar`, `description_en`, `description_ku`, `description_ar`, `body_en`, `body_ku`, `body_ar`, `start_date`, `cover`, `featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 1, 'Evetst', NULL, NULL, 'alkjsdf', NULL, NULL, 'kjaoidf', NULL, NULL, '2023-02-19 18:04:00', NULL, 0, NULL, '2023-02-19 18:04:59', '2023-02-19 18:04:59'),
(5, 1, 'evttst2', NULL, NULL, 'ioajsdqj;okwj', NULL, NULL, '[oijda[foiha[ior', NULL, NULL, '2023-02-19 18:07:00', '/storage/images/eventimages/2023-02-19MBFYmDDwcb5BeZApHJeyTMPH4Q4HijnGVGIWMTKn.webp', 1, NULL, '2023-02-19 18:07:12', '2023-02-19 18:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `event_profile`
--

CREATE TABLE `event_profile` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_sponser`
--

CREATE TABLE `event_sponser` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `sponser_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_tag`
--

CREATE TABLE `event_tag` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

CREATE TABLE `exhibitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibitions`
--

INSERT INTO `exhibitions` (`id`, `user_id`, `title_en`, `title_ku`, `title_ar`, `description_en`, `description_ku`, `description_ar`, `body_en`, `body_ku`, `body_ar`, `start_date`, `cover`, `featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 1, 'extest', NULL, NULL, 'lkajsfd;', NULL, NULL, 'kelan', NULL, NULL, '2023-02-19', '/storage/images/exhibitionimages/2023-02-19gqRpF0BA62WBvV30wnlfecJBUd4hR9uCxp6Rr3QI.webp', 1, NULL, '2023-02-19 18:22:20', '2023-02-19 18:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_profile`
--

CREATE TABLE `exhibition_profile` (
  `exhibition_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_sponser`
--

CREATE TABLE `exhibition_sponser` (
  `exhibition_id` bigint(20) UNSIGNED NOT NULL,
  `sponser_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibition_sponser`
--

INSERT INTO `exhibition_sponser` (`exhibition_id`, `sponser_id`) VALUES
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_tag`
--

CREATE TABLE `exhibition_tag` (
  `exhibition_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibition_tag`
--

INSERT INTO `exhibition_tag` (`exhibition_id`, `tag_id`) VALUES
(6, 1);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_20_215755_create_articles_table', 1),
(6, '2023_01_20_215815_create_events_table', 1),
(7, '2023_01_20_215828_create_exhibitions_table', 1),
(8, '2023_01_20_220007_create_tags_table', 1),
(9, '2023_01_20_220022_create_sponsers_table', 1),
(10, '2023_01_20_220036_create_profiles_table', 1),
(11, '2023_01_20_220216_create_article_tag_table', 1),
(12, '2023_01_20_220251_create_article_sponser_table', 1),
(13, '2023_01_20_220325_create_article_profile_table', 1),
(14, '2023_01_20_220345_create_event_tag_table', 1),
(15, '2023_01_20_220409_create_event_sponser_table', 1),
(16, '2023_01_20_220433_create_event_profile_table', 1),
(17, '2023_01_20_220505_create_exhibition_tag_table', 1),
(18, '2023_01_20_220524_create_exhibition_sponser_table', 1),
(19, '2023_01_20_220602_create_exhibition_profile_table', 1),
(20, '2023_01_20_220634_create_social_profile_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialmedias` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`socialmedias`)),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `image`, `description`, `socialmedias`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mr.Sarkaw', NULL, 'am kwra zor ma7bwba, page y meme w shty haia la FB w insta w amana, zor ziraka la taknalojya w full stack developer a', NULL, NULL, '2023-02-18 20:04:23', '2023-02-18 20:04:23'),
(2, 'asd', NULL, 'jlakjsd', NULL, NULL, '2023-02-18 20:05:23', '2023-02-18 20:05:23'),
(3, 'awat', NULL, 'afwewas;dlfj', NULL, NULL, '2023-02-18 20:08:06', '2023-02-18 20:46:05'),
(4, 'asdfas', NULL, 'asdf', NULL, '2023-02-18 20:45:44', '2023-02-18 20:45:39', '2023-02-18 20:45:44'),
(5, 'asad', NULL, '2er2', NULL, NULL, '2023-02-18 20:46:32', '2023-02-18 20:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `social_profile`
--

CREATE TABLE `social_profile` (
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `social_media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsers`
--

CREATE TABLE `sponsers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsers`
--

INSERT INTO `sponsers` (`id`, `name`, `image`, `url`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hustulers Uni', NULL, 'hustelersuniversity.com', NULL, '2023-02-18 19:19:53', '2023-02-18 19:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name_en`, `name_kr`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'TagG', NULL, NULL, NULL, '2023-02-18 19:19:04', '2023-02-18 19:19:04'),
(2, 'TopG', NULL, NULL, NULL, '2023-02-18 19:19:08', '2023-02-18 19:19:08'),
(3, 'Andrew', NULL, NULL, NULL, '2023-02-18 19:19:14', '2023-02-18 19:19:14'),
(4, 'tate', NULL, NULL, NULL, '2023-02-18 19:19:19', '2023-02-18 19:19:19'),
(5, 'tristian', NULL, NULL, NULL, '2023-02-18 19:19:31', '2023-02-18 19:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bzhai Xoman', 'bzhaixoman', NULL, NULL, '$2y$10$.Ep3BRlH7ctKIjGvaJIs7e/.i50Bo/Y7emBx5pqL6Hextf1peMh6y', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_profile`
--
ALTER TABLE `article_profile`
  ADD PRIMARY KEY (`article_id`,`profile_id`),
  ADD KEY `article_profile_article_id_index` (`article_id`),
  ADD KEY `article_profile_profile_id_index` (`profile_id`);

--
-- Indexes for table `article_sponser`
--
ALTER TABLE `article_sponser`
  ADD PRIMARY KEY (`article_id`,`sponser_id`),
  ADD KEY `article_sponser_article_id_index` (`article_id`),
  ADD KEY `article_sponser_sponser_id_index` (`sponser_id`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `article_tag_article_id_index` (`article_id`),
  ADD KEY `article_tag_tag_id_index` (`tag_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_profile`
--
ALTER TABLE `event_profile`
  ADD PRIMARY KEY (`event_id`,`profile_id`),
  ADD KEY `event_profile_event_id_index` (`event_id`),
  ADD KEY `event_profile_profile_id_index` (`profile_id`);

--
-- Indexes for table `event_sponser`
--
ALTER TABLE `event_sponser`
  ADD PRIMARY KEY (`event_id`,`sponser_id`),
  ADD KEY `event_sponser_event_id_index` (`event_id`),
  ADD KEY `event_sponser_sponser_id_index` (`sponser_id`);

--
-- Indexes for table `event_tag`
--
ALTER TABLE `event_tag`
  ADD PRIMARY KEY (`event_id`,`tag_id`),
  ADD KEY `event_tag_event_id_index` (`event_id`),
  ADD KEY `event_tag_tag_id_index` (`tag_id`);

--
-- Indexes for table `exhibitions`
--
ALTER TABLE `exhibitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition_profile`
--
ALTER TABLE `exhibition_profile`
  ADD PRIMARY KEY (`exhibition_id`,`profile_id`),
  ADD KEY `exhibition_profile_exhibition_id_index` (`exhibition_id`),
  ADD KEY `exhibition_profile_profile_id_index` (`profile_id`);

--
-- Indexes for table `exhibition_sponser`
--
ALTER TABLE `exhibition_sponser`
  ADD PRIMARY KEY (`exhibition_id`,`sponser_id`),
  ADD KEY `exhibition_sponser_exhibition_id_index` (`exhibition_id`),
  ADD KEY `exhibition_sponser_sponser_id_index` (`sponser_id`);

--
-- Indexes for table `exhibition_tag`
--
ALTER TABLE `exhibition_tag`
  ADD PRIMARY KEY (`exhibition_id`,`tag_id`),
  ADD KEY `exhibition_tag_exhibition_id_index` (`exhibition_id`),
  ADD KEY `exhibition_tag_tag_id_index` (`tag_id`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsers`
--
ALTER TABLE `sponsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exhibitions`
--
ALTER TABLE `exhibitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsers`
--
ALTER TABLE `sponsers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
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
