-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 03:04 PM
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
-- Table structure for table `eco_system`
--

CREATE TABLE `eco_system` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eco_system`
--

INSERT INTO `eco_system` (`id`, `logo`, `project`, `name`, `created_at`, `updated_at`) VALUES
(1, '4908637be07333b1928441226af6f15e.png', 'p1', 'some name', '2024-06-04 17:11:56', '2024-06-04 17:11:56'),
(3, 'a1d6593d0841cbed5b2e24fe136f7bed.png', 'p1', 'some name', '2024-06-04 17:15:00', '2024-06-04 17:15:00');

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
  `logo` varchar(255) NOT NULL,
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

--
-- Dumping data for table `funding_round`
--

INSERT INTO `funding_round` (`id`, `logo`, `project`, `created_on`, `rounds`, `partners`, `investors`, `raised`, `category`, `created_at`, `updated_at`) VALUES
(1, '76d73e831773f9a4d724e4d54056e97d.png', 'name', '2024-06-04', 1, 'partner1', 12, 'test', 'test', '2024-06-04 18:29:46', '2024-06-04 18:29:46'),
(3, '3d2dd09ec7a2ff6473ba72346f575957.png', 'name', '2024-06-04', 1, 'partner1', 12, 'test', 'test', '2024-06-04 18:30:12', '2024-06-04 18:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `ido_ieo`
--

CREATE TABLE `ido_ieo` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `project` varchar(255) NOT NULL,
  `backed_by` varchar(255) NOT NULL,
  `partners` varchar(255) NOT NULL,
  `coin_token_sale_partner` varchar(255) NOT NULL,
  `audits` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ido_ieo`
--

INSERT INTO `ido_ieo` (`id`, `logo`, `project`, `backed_by`, `partners`, `coin_token_sale_partner`, `audits`, `created_at`, `updated_at`) VALUES
(1, '684cffdb2cb2c388908cce12f73e1ddc.png', 'name', '1000', 'category', '12', 'test1,test2', '2024-06-04 18:16:23', '2024-06-04 18:16:23'),
(3, '09525a5bc15a145265490b8add70af96.png', 'name', '1000', 'category', '12', 'test1,test2', '2024-06-04 18:16:33', '2024-06-04 18:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `killer_project`
--

CREATE TABLE `killer_project` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `project` varchar(255) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `killer_project`
--

INSERT INTO `killer_project` (`id`, `logo`, `project`, `activities`, `created_at`, `updated_at`) VALUES
(5, '38f6813a739624be508efd703cdb7c5f.png', 'p1', 'some activivty 1', '2024-06-04 16:31:59', '2024-06-04 16:31:59'),
(6, '99f081c5e0fad073037f58fa6ffaefad.png', 'p1', 'some activivty 1', '2024-06-04 16:32:05', '2024-06-04 16:32:05'),
(7, '53527320ab17da032eac40b8ccb23471.png', 'p1', 'some activivty 1', '2024-06-04 16:34:01', '2024-06-04 16:34:01');

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
  `logo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `investors` text DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `max_supply` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_listing`
--

INSERT INTO `new_listing` (`id`, `logo`, `name`, `created_on`, `investors`, `category`, `network`, `max_supply`, `created_at`, `updated_at`) VALUES
(1, 'ead647d4f8f275401cec30d6ded366a4.png', 'name', '2024-06-02', '[\"b75ae04a22e75032151a3f44091ce92a.png\",\"b75ae04a22e75032151a3f44091ce92a.png\",\"b75ae04a22e75032151a3f44091ce92a.png\"]', 'category', 'network', 100, '2024-06-02 16:46:45', '2024-06-02 16:46:45'),
(3, 'c121646f416951017e27415addba5867.png', 'name1', '2024-06-02', '[\"70836530b0000c1ef57c67dac2524c88.png\",\"61935abde5d64395e50f0b8aa6873ff5.png\",\"392c14cc96256f05e8d7f51cc6869bd9.png\"]', 'category', 'network', 100, '2024-06-02 16:48:52', '2024-06-04 14:40:31'),
(4, '115aaf42e3537d6d8f9e71e27ee4f8ee.png', 'name', '2024-06-02', '[\"62fc1bc6568e9fe4a678393a3a4047c7.png\",\"c32044e500a0dc4d45d3c1e3c967ca3c.png\",\"d5300921393c96161a3446f45c30b43d.png\"]', 'category', 'network', 100, '2024-06-02 16:57:30', '2024-06-02 16:57:30');

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
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_project`
--

INSERT INTO `new_project` (`id`, `project`, `category`, `total_raise`, `round`, `investors`, `created_at`, `updated_at`, `logo`) VALUES
(1, 'name', 'category', '1000', '12', 'test1,test2', '2024-06-04 16:21:25', '2024-06-04 16:21:25', '74f4c4278aeeeab32f21a7be602846cf.png');

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
-- Table structure for table `unusual_activity`
--

CREATE TABLE `unusual_activity` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `project` varchar(255) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unusual_activity`
--

INSERT INTO `unusual_activity` (`id`, `logo`, `project`, `activities`, `created_at`, `updated_at`) VALUES
(1, 'a1d85b2d8d90d97af0915afc61786633.png', 'p1', 'some activivty 1', '2024-06-02 12:26:55', '2024-06-02 12:26:55'),
(2, 'ca1468269d3ca68d96cb36cc66bf021d.png', 'p2', 'some activivty 2', '2024-06-02 12:27:49', '2024-06-02 12:49:19'),
(3, '23e7a9c8b369fafa9890af56c711f181.png', 'p3', 'some activivty 3', '2024-06-02 12:28:18', '2024-06-02 12:51:48');

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
-- Indexes for table `eco_system`
--
ALTER TABLE `eco_system`
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
-- Indexes for table `killer_project`
--
ALTER TABLE `killer_project`
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
-- Indexes for table `unusual_activity`
--
ALTER TABLE `unusual_activity`
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
-- AUTO_INCREMENT for table `eco_system`
--
ALTER TABLE `eco_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funding_round`
--
ALTER TABLE `funding_round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ido_ieo`
--
ALTER TABLE `ido_ieo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `killer_project`
--
ALTER TABLE `killer_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_listing`
--
ALTER TABLE `new_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_project`
--
ALTER TABLE `new_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unusual_activity`
--
ALTER TABLE `unusual_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
