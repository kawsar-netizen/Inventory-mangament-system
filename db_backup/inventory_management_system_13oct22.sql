-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 11:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `br_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1:rural,2:unrural',
  `br_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1:sub-branch,2:head-office,3:agent,4:branch',
  `br_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `br_name`, `br_address`, `location`, `br_type`, `br_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jamalpur', 'Koyra Bazar', '1', '1', '102', 1, NULL, NULL),
(2, 'Head Office', 'Doinik Bangla more, Dhaka', '2', '2', '104', 1, NULL, NULL),
(3, 'Dhanmondi', 'Dhanmondi 27', '2', '4', '107', 1, NULL, NULL),
(4, 'Islampur', 'Islampur road, Dhaka', '2', '4', '105', 1, NULL, NULL),
(5, 'Laalbagh', 'Laalbagh fort road, Dhaka', '2', '4', '106', 1, NULL, NULL);

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
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valuation` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`, `valuation`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Furniture', 50, 1, NULL, NULL),
(5, 'Electronics', 70, 1, NULL, NULL),
(6, 'Office Accessories', 55, 1, NULL, NULL),
(7, 'Land/Building', 88, 1, NULL, NULL),
(8, 'IT Equipment', 75, 1, NULL, NULL),
(9, 'Crockeries', 41, 1, NULL, NULL);

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
(5, '2022_09_25_074633_create_item_categories_table', 1),
(6, '2022_09_25_083739_create_product_cagegories_table', 1),
(7, '2022_09_25_083841_create_product_entries_table', 1),
(8, '2022_09_25_084000_create_branches_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1:asset,2:inventory',
  `product_category_valuation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `item_category_id`, `name`, `type`, `product_category_valuation`, `created_at`, `updated_at`) VALUES
(3, 8, 'Monitor', '1', '78', NULL, NULL),
(4, 8, 'Keyboard', '1', '70', NULL, NULL),
(5, 2, 'Sofa', '1', '49', NULL, NULL),
(6, 2, 'Table', '1', '48', NULL, NULL),
(7, 5, 'CCTV camera', '2', NULL, NULL, NULL),
(8, 5, 'Banknote counter', '1', '70', NULL, NULL),
(9, 5, 'Coffee Machine', '2', NULL, NULL, NULL),
(10, 5, 'Printer', '1', '62', NULL, NULL),
(12, 2, 'Revolving chair', '1', '50', NULL, NULL),
(13, 5, 'Scanner', '2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_entries`
--

CREATE TABLE `product_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1:asset,2:inventory',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0:requisition,1:product_entry',
  `brand_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchased_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_entries`
--

INSERT INTO `product_entries` (`id`, `item_category_id`, `product_category_id`, `branch_id`, `name`, `type`, `status`, `brand_no`, `model_no`, `quantity`, `purchased_name`, `purchase_date`, `warranty_date`, `tag_no`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 8, 3, 2, '32\" Do-it-all Smart UHD 4K Flat Wi-fi Monitor', '1', '1', 'Samsung', 'LS32AM700UWXXL', '4', NULL, '2022-08-18', '5', 'monitor-33', 'Master Admin', NULL, NULL),
(2, 2, 12, 3, 'EXECUTIVE CHAIR ST- BLACK REX- 610', '1', '1', 'OTOBI', 'CSEP006FRAA010', '6', NULL, '2022-10-04', '9', 'chair-25', 'Master Admin', NULL, NULL),
(3, 8, 4, 4, 'FBX50C  Bluetooth & 2.4G Wireless KB', '1', '1', 'A4TECH', 'FBX50C', '5', NULL, '2022-10-07', '8', 'keyboard-34', 'Master Admin', NULL, NULL),
(4, 5, 8, 2, 'ZZap NC20 Banknote Counter', '1', '1', 'ZZap', 'NC20', '1', NULL, '2022-09-27', '12', 'bnknote-2', 'Master Admin', NULL, NULL),
(5, 2, 5, 2, 'HATIL Sofa Moseley-281', '1', '1', 'HATIL', 'HCL-201', '1', NULL, '2022-10-11', '15', 'sofa-3', 'Master Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_requisitions`
--

CREATE TABLE `product_requisitions` (
  `id` int(100) NOT NULL,
  `item_category_id` int(100) DEFAULT NULL,
  `product_category_id` int(100) DEFAULT NULL,
  `inventory_product_id` int(100) DEFAULT NULL,
  `branch_id` int(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `warranty` int(10) DEFAULT NULL,
  `requisition_request_date` date DEFAULT NULL,
  `requested_to` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(100) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL COMMENT 'active = 1,deactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', '1', '2022-10-04 06:42:27', '2022-10-04 06:42:27'),
(2, 'Super User', '1', '2022-10-04 06:43:20', '2022-10-04 06:43:20'),
(3, 'Branch Manager', '1', '2022-10-04 06:43:20', '2022-10-04 06:43:20'),
(4, 'Branch User', '1', '2022-10-04 06:46:56', '2022-10-04 06:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch_id`, `role_id`, `name`, `type`, `email`, `contact_phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Master Admin', 'Manager', 'admin@gmail.com', '01413470120', NULL, '$2y$10$3M.QaY1Q.q1nvXLwJ6smS.8zyOteEI8.rn6GtwH6jLooVNBe3EJRu', NULL, NULL, NULL),
(2, 3, 2, 'Kawsar Khan', NULL, 'kawsarkhan@gmail.com', NULL, NULL, '$2y$10$/tzDKwtansjW50EbJyEnNeyZu00hScBnsn8xCDt5xr4eONJeS8IBu', NULL, NULL, NULL),
(3, 4, 4, 'Samer', NULL, 'samer@gmail.com', NULL, NULL, '$2y$10$YJMQvgdHQHQPJNZs/gAm9.E9X3lwW2a1NgC1dQEI.IXDYU.gfBY7m', NULL, NULL, NULL),
(4, 2, 4, 'Sinat', 'Manager', 'sinat@gmail.com', '01875510694', NULL, '$2y$10$o2VGC0ffOC1tayAHjyyAtOmmNT8LnJugprW0yWwrSdDZxaVstRWW2', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cagegories_item_category_id_foreign` (`item_category_id`);

--
-- Indexes for table `product_entries`
--
ALTER TABLE `product_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_entries_item_category_id_foreign` (`item_category_id`),
  ADD KEY `product_entries_product_category_id_foreign` (`product_category_id`),
  ADD KEY `br_foreign` (`branch_id`);

--
-- Indexes for table `product_requisitions`
--
ALTER TABLE `product_requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_ibfk_1` (`branch_id`),
  ADD KEY `users_forign_1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_entries`
--
ALTER TABLE `product_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_requisitions`
--
ALTER TABLE `product_requisitions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_cagegories_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_entries`
--
ALTER TABLE `product_entries`
  ADD CONSTRAINT `br_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_forign_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
