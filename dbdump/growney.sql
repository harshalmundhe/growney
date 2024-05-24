-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 12:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `growney`
--

-- --------------------------------------------------------

--
-- Table structure for table `echo_system`
--

CREATE TABLE `echo_system` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funding_round`
--

CREATE TABLE `funding_round` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `rounds` int(255) NOT NULL,
  `partners` varchar(255) NOT NULL,
  `investors` int(11) NOT NULL,
  `raised` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ido_ieo`
--

CREATE TABLE `ido_ieo` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `backed_by` varchar(255) NOT NULL,
  `partners` varchar(255) NOT NULL,
  `coin_token_sale_partner` varchar(255) NOT NULL,
  `audits` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_listing`
--

CREATE TABLE `new_listing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `investors` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `max_supply` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_project`
--

CREATE TABLE `new_project` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `total_raise` varchar(255) NOT NULL,
  `round` varchar(255) NOT NULL,
  `investors` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('test7@test.com', '', '2024-05-24 15:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tranding_killer_projects`
--

CREATE TABLE `tranding_killer_projects` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unusual_activity`
--

CREATE TABLE `unusual_activity` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test test', 'test@test.com', NULL, '$2y$12$xa2buQPj./KyeU2No4JD5e6cXwn5uLW2JUNFo8vaaKGyPTnX8TYTC', NULL, '2024-05-23 23:14:21', '2024-05-23 23:14:21'),
(2, 'test1 test', 'test1@test.com', NULL, '$2y$12$CEwA6bCw.bVto7axJKhbQOqn7x.wN/n2HceBYZ6pjy0KeQUroVtKi', NULL, '2024-05-23 23:27:02', '2024-05-23 23:27:02'),
(3, 'test2 test', 'test2@test.com', NULL, '$2y$12$VEM1mN43z1WRvBp521RZ7.DYsE5K7T8Oli1/w8Dg0rQTpXb1h7xim', NULL, '2024-05-23 23:28:46', '2024-05-23 23:28:46'),
(4, 'test4 test', 'test4@test.com', NULL, '$2y$12$EJf/KtuZFsavImXudBhHeu/CMPr2m3qVuEA/99PAENZtg43gXJSv2', NULL, '2024-05-23 23:40:22', '2024-05-23 23:40:22'),
(5, 'test5 test', 'test5@test.com', NULL, '$2y$12$e6NIJ.0.tDoRFIys3yWQCe7Cv.QATSVA5.oh3T7QYNH6q4xfsrmq.', NULL, '2024-05-23 23:41:40', '2024-05-23 23:41:40'),
(6, 'test6 test', 'test6@test.com', NULL, '$2y$12$X421vYSL1e3tNhzja3k8Wewxu90GHxY.5GKEwIS51PLiMyVjUqSVS', NULL, '2024-05-23 23:44:20', '2024-05-23 23:44:20'),
(7, 'test7 test', 'test7@test.com', NULL, '$2y$12$VferjxddfGG/w0r/s9VRLeDrqwknBLdahPWbNfau.aCijLJr3INkq', NULL, '2024-05-23 23:46:13', '2024-05-24 15:44:56'),
(8, 'test8 test', 'test8@test.com', NULL, '$2y$12$P1SU.jZmm/a7yWsXp0nS6Ozo/gd5M4B4bWsMYTTJw/rvjL7Cus4xq', NULL, '2024-05-24 07:12:04', '2024-05-24 07:12:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `echo_system`
--
ALTER TABLE `echo_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `funding_round`
--
ALTER TABLE `funding_round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ido_ieo`
--
ALTER TABLE `ido_ieo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_listing`
--
ALTER TABLE `new_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_project`
--
ALTER TABLE `new_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tranding_killer_projects`
--
ALTER TABLE `tranding_killer_projects`
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
-- AUTO_INCREMENT for table `echo_system`
--
ALTER TABLE `echo_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funding_round`
--
ALTER TABLE `funding_round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ido_ieo`
--
ALTER TABLE `ido_ieo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_listing`
--
ALTER TABLE `new_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_project`
--
ALTER TABLE `new_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tranding_killer_projects`
--
ALTER TABLE `tranding_killer_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
