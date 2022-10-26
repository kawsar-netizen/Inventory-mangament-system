-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 02:09 PM
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
  `id` int(11) NOT NULL,
  `br_name` varchar(50) NOT NULL,
  `br_address` text NOT NULL,
  `location` int(11) DEFAULT 1 COMMENT '1 = rural\r\n2 = urban',
  `br_type` int(11) DEFAULT 4 COMMENT '1:sub-branch,2:head-office,3:agent,4:branch',
  `br_code` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `br_name`, `br_address`, `location`, `br_type`, `br_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UTTARA', '', 1, 4, 7093, 1, NULL, NULL),
(2, 'BARISAL', '', 1, 4, 7112, 1, NULL, NULL),
(3, 'MORELGANJ', 'BAGERHAT', 1, 4, 7110, 1, NULL, NULL),
(4, 'HEAD OFFICE', 'Motijeel', 1, 2, 7106, 1, NULL, NULL),
(5, 'SYLHET', 'Sylhet', 1, 4, 7105, 1, NULL, NULL),
(6, 'HEMAYET PUR', 'hemayetpur', 1, 4, 7091, 1, NULL, NULL),
(7, 'BANGLA BAZAR', '', 1, 4, 7078, 1, NULL, NULL),
(8, 'GULSHAN', 'Gulshan', 1, 4, 7090, 1, NULL, NULL),
(9, 'DHANMONDI', '', 1, 4, 7089, 1, NULL, NULL),
(10, 'ISLAMPUR', 'Sylhet', 1, 4, 7084, 1, NULL, NULL),
(11, 'JUBILEE ROAD', 'Chittagong', 1, 4, 7107, 1, NULL, NULL),
(12, 'KHULNA', 'Khulna', 1, 4, 7072, 1, NULL, NULL),
(13, 'NARAYANGANJ', 'Narayangonj', 1, 4, 7074, 1, NULL, NULL),
(14, 'DINAJPUR', 'Dinajpur', 1, 4, 9710, 1, NULL, NULL),
(15, 'AGRABAD', 'Chittagong', 1, 4, 7102, 1, NULL, NULL),
(16, 'PRINCIPAL', 'Dhaka', 1, 4, 7098, 1, NULL, NULL),
(17, 'MIRPUR', 'Dhaka', 1, 4, 7092, 1, NULL, NULL),
(18, 'MOTIJHEEL', 'Dhaka', 1, 4, 7096, 1, NULL, NULL),
(19, 'EPZ', 'Chittagong', 1, 4, 9812, 1, NULL, NULL),
(20, 'RAJSHAHI', 'Rajshahi', 1, 4, 7079, 1, NULL, NULL),
(21, 'BOGRA', '', 1, 4, 7103, 1, NULL, NULL),
(22, 'VELA NAGAR', 'Narsingdi', 1, 4, 7109, 1, NULL, NULL),
(23, 'GAZIPUR', 'Gazipur', 1, 4, 7099, 1, NULL, NULL),
(24, 'BHATIARY', 'Chittagong', 1, 4, 7101, 1, NULL, NULL),
(25, 'BANANI', 'Dhaka', 1, 4, 7088, 1, NULL, NULL),
(26, 'PRAGATI SARANI', 'Dhaka', 1, 4, 9853, 1, NULL, NULL),
(27, 'TAKERHAT', 'Madaripur', 1, 4, 7073, 1, NULL, NULL),
(28, 'PANTHA PATH', 'Selim Center,19/2 West Panthapath,Dhaka', 1, 4, 9864, 1, NULL, NULL),
(29, 'FENI', '', 1, 4, 9960, 1, NULL, NULL),
(30, 'FALTITA', 'Bagerhat', 1, 4, 9967, 1, NULL, NULL),
(31, 'KALIGANJ', 'KALIGANJ', 1, 4, 10184, 1, NULL, NULL),
(32, 'SHIBU MARKET', '', 1, 4, 7075, 1, NULL, NULL),
(33, 'KHATUNGANJ', 'Chittagong', 1, 4, 9876, 1, NULL, NULL),
(34, 'MAINAMATI', '', 1, 4, 7070, 1, NULL, NULL),
(35, 'BASHUNDHARA MAHILA', '', 1, 4, 10019, 1, NULL, NULL),
(36, 'KATAKHALI', '', 1, 4, 7113, 1, NULL, NULL),
(37, 'LABONCHORA', '', 1, 4, 9639, 1, NULL, NULL),
(38, 'KERANIGANJ', 'dhaka', 1, 4, 7095, 1, NULL, NULL),
(39, 'SARBOLOKKHONA', '', 1, 4, 7077, 1, NULL, NULL),
(40, 'NASIRABAD', 'Chittagong', 1, 4, 7104, 1, NULL, NULL),
(41, 'FATIKCHARI', '', 1, 4, 7071, 1, NULL, NULL),
(42, 'MALIGRAM', '', 1, 4, 9873, 1, NULL, NULL),
(43, 'SATKHIRA', '', 1, 4, 7081, 1, NULL, NULL),
(44, 'ADDA BAZAR', '', 1, 4, 10021, 1, NULL, NULL),
(45, 'COMILLA', '', 1, 4, 10022, 1, NULL, NULL),
(46, 'MAWNA', '', 1, 4, 7100, 1, NULL, NULL),
(47, 'JIBAN NAGAR', '', 1, 4, 10023, 1, NULL, NULL),
(48, 'BHOLA', 'Bhola', 1, 4, 10024, 1, NULL, NULL),
(49, 'VOMRA', 'Vomra', 1, 4, 7083, 1, NULL, NULL),
(50, 'KHARABAD BAINTOLA', 'kharabad baintola', 1, 4, 10025, 1, NULL, NULL),
(51, 'CHALAKCHAR', '', 1, 4, 9903, 1, NULL, NULL),
(52, 'MADHUNA GHAT', '', 1, 4, 7066, 1, NULL, NULL),
(53, 'BABURHAT', '', 1, 4, 7076, 1, NULL, NULL),
(54, 'GHONAPARA', '', 1, 4, 7086, 1, NULL, NULL),
(55, 'MOUCHAK', '', 1, 4, 9660, 1, NULL, NULL),
(56, 'HASNABAD', '', 1, 4, 9747, 1, NULL, NULL),
(57, 'NATORE', '', 1, 4, 10028, 1, NULL, NULL),
(58, 'ASHULIA', '', 1, 4, 7087, 1, NULL, NULL),
(59, 'CHUK NAGAR', '', 1, 4, 7108, 1, NULL, NULL),
(60, 'NAZIPUR', 'NAOGAON', 1, 4, 10031, 1, NULL, NULL),
(61, 'SHYAM NAGAR', '', 1, 4, 7082, 1, NULL, NULL),
(62, 'BIRGANJ', '', 1, 4, 10033, 1, NULL, NULL),
(63, 'NAWABPUR', '', 1, 4, 7097, 1, NULL, NULL),
(64, 'ABDULLAHPUR', 'Dhaka', 1, 4, 10018, 1, NULL, NULL),
(65, 'JESSORE', '', 1, 4, 7085, 1, NULL, NULL),
(66, 'BHULTA', '', 1, 4, 10050, 1, NULL, NULL),
(67, 'RANGPUR', 'Rangpur', 1, 4, 7080, 1, NULL, NULL),
(68, 'KUSHTIA', 'KUSHTIA', 1, 4, 10065, 1, NULL, NULL),
(69, 'MOHAKHALI', '', 1, 4, 10070, 1, NULL, NULL),
(70, 'BANARI PARA', '', 1, 4, 10071, 1, NULL, NULL),
(71, 'RAMGANJ', '', 1, 4, 10090, 1, NULL, NULL),
(72, 'BABU BAZAR', '', 1, 4, 10091, 1, NULL, NULL),
(73, 'MEHENDIGANJ', 'Barisal', 1, 4, 10102, 1, NULL, NULL),
(74, 'AMIN BAZAR', '', 1, 4, 10104, 1, NULL, NULL),
(75, 'MYMENSINGH', '', 1, 4, 10110, 1, NULL, NULL),
(76, 'BHANDARIA', '', 1, 4, 10212, 1, NULL, NULL),
(77, 'PALASHBARI', '', 1, 4, 10238, 1, NULL, NULL),
(78, 'KDA C/A', '', 1, 4, 10239, 1, NULL, NULL),
(79, 'IMAMGANJ', '', 1, 4, 7094, 1, NULL, NULL),
(80, 'Khan Jahan Ali Mazar', '', 1, 4, 10273, 1, NULL, NULL),
(81, 'HATIRPUL SUB', 'Hatirpul, Dhaka', 1, 4, 10278, 1, NULL, NULL),
(82, 'SBAC CORPORATE', '', 1, 4, 10312, 1, NULL, NULL),
(83, 'Yousuf Market Sub Branch', '', 1, 4, 10327, 1, NULL, NULL),
(84, 'Pacchor Sub Branch', '', 1, 4, 10328, 1, NULL, NULL),
(85, 'Muladi Sub br', '', 1, 4, 10329, 1, NULL, NULL),
(86, 'Gopalpur Sub Br', '', 1, 4, 10331, 1, NULL, NULL),
(87, 'DIGRAJ', '', 1, 4, 7111, 1, NULL, NULL),
(88, 'Trunk Road Sub Branch', 'Shiraji Bhaban Holding: 356, Trunk Road, Word No: 10, Feni Pourosova, Feni.', 1, 4, 10337, 1, NULL, NULL),
(89, 'Laxmipur Sub Branch', '', 1, 4, 10338, 1, NULL, NULL),
(90, 'Borura Sub Branch', 'Kazi Tower, 502 Borura Uttar Bazar, Barura, Cumilla.', 1, 4, 10339, 1, NULL, NULL),
(91, 'Thermax Shilpo Sub Branch', 'Thermax Yarn Dyed Fabrics Ltd. Compound, Karardi, Putia, Shibpur, Narsingdi.', 1, 4, 10340, 1, NULL, NULL),
(92, 'Rayenda Bazar Sub Branch', '', 1, 4, 10343, 1, NULL, NULL),
(93, 'Gopalganj Sub Br', '', 1, 4, 10344, 1, NULL, NULL),
(94, 'Dhania Sub Br', '', 1, 4, 10345, 1, NULL, NULL),
(95, 'Reazuddin Bazar Sub Br.', '', 1, 4, 10348, 1, NULL, NULL),
(96, 'Jatrabari Sub Branch', '', 1, 4, 10350, 1, NULL, NULL),
(97, 'Kalaroa Sub', '', 1, 4, 10351, 1, NULL, NULL),
(98, 'Tejgaon Link Road Branch ', '', 1, 4, 10362, 1, NULL, NULL),
(99, 'Pirganj Sub Branch', '', 1, 4, 10390, 1, NULL, NULL),
(100, 'LOHAGARA', '', 1, 4, 10395, 1, NULL, NULL),
(101, 'Indira Road Sub', '', 1, 4, 10396, 1, NULL, NULL),
(102, 'BENAPOLE', '', 1, 4, 10413, 1, NULL, NULL),
(103, 'Madhabdi Sub Branch', '', 1, 4, 10493, 1, NULL, NULL),
(104, 'Dupchanchia Sub ', '', 1, 4, 10498, 1, NULL, NULL),
(105, 'Bagerhat Sub Branch', 'Mitha Pukur Par, Standard Bank Building (1st floor), Bagerhat Sadar, Bagerhat.', 1, 4, 10543, 1, NULL, NULL),
(106, 'Mongla Sub', '', 1, 4, 10565, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches_old`
--

CREATE TABLE `branches_old` (
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
-- Dumping data for table `branches_old`
--

INSERT INTO `branches_old` (`id`, `br_name`, `br_address`, `location`, `br_type`, `br_code`, `status`, `created_at`, `updated_at`) VALUES
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
(13, 5, 'Scanner', '2', NULL, NULL, NULL),
(14, 6, 'Office Stetionery', '2', NULL, NULL, NULL),
(15, 6, 'Printing Stationery', '2', NULL, NULL, NULL),
(16, 6, 'Security Stationery', '2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_entries`
--

CREATE TABLE `product_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1:asset,2:inventory',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0:requisition,1:product_entry',
  `brand_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchased_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_entries`
--

INSERT INTO `product_entries` (`id`, `item_category_id`, `product_category_id`, `branch_id`, `name`, `type`, `status`, `brand_no`, `model_no`, `quantity`, `purchased_name`, `purchase_date`, `warranty_date`, `tag_no`, `entry_by`, `created_at`, `updated_at`) VALUES
(1, 8, 3, 2, '32\" Do-it-all Smart UHD 4K Flat Wi-fi Monitor', '1', '1', 'Samsung', 'LS32AM700UWXXL', '4', NULL, '2022-08-18', '5', 'monitor-33', 'Master Admin', NULL, NULL),
(2, 2, 12, NULL, 'EXECUTIVE CHAIR ST- BLACK REX- 610', NULL, NULL, 'OTOB', 'CSEP006FRAA010', '6', NULL, NULL, '9', NULL, 'Master Admin', NULL, NULL),
(3, 8, 4, 4, 'FBX50C  Bluetooth & 2.4G Wireless KB', '1', '1', 'A4TECH', 'FBX50C', '5', NULL, '2022-10-07', '8', 'keyboard-34', 'Master Admin', NULL, NULL),
(4, 5, 8, 2, 'ZZap NC20 Banknote Counter', '1', '1', 'ZZap', 'NC20', '1', NULL, '2022-09-27', '12', 'bnknote-2', 'Master Admin', NULL, NULL),
(5, 2, 5, 2, 'HATIL Sofa Moseley-281', '1', '1', 'HATIL', 'HCL-201', '1', NULL, '2022-10-11', '15', 'sofa-3', 'Master Admin', NULL, NULL),
(6, 2, 6, NULL, 'Abul Kauser Samer', NULL, NULL, 'Otobi', 'CSEP006FRAA010', '2', NULL, NULL, '7', NULL, 'SBAC Head office', NULL, NULL);

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
  `requested_from` int(10) NOT NULL COMMENT 'requested from user id',
  `requested_to` int(10) NOT NULL COMMENT 'requested to user id',
  `requisition_current_status` int(10) NOT NULL COMMENT '1 = Pending, \r\n2 = Received,\r\n3 = Canceled,\r\n4 = Delivered',
  `status_by_branch_manager` int(10) NOT NULL DEFAULT 0 COMMENT '1 = accept\r\n2 = decline',
  `status_by_head_office` int(10) NOT NULL DEFAULT 0 COMMENT '1 = accept\r\n2 = decline',
  `requisition_decline_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_requisitions`
--

INSERT INTO `product_requisitions` (`id`, `item_category_id`, `product_category_id`, `inventory_product_id`, `branch_id`, `brand`, `model`, `quantity`, `warranty`, `requisition_request_date`, `requested_from`, `requested_to`, `requisition_current_status`, `status_by_branch_manager`, `status_by_head_office`, `requisition_decline_reason`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 4, 10, 'ZZap', 'NC20', 2, 12, '2022-10-19', 9, 3, 3, 2, 0, 'henlo', NULL, NULL),
(2, 8, 3, 1, 10, 'Samsung', 'LS32AM700UWXXL', 4, 5, '2022-10-19', 2, 3, 4, 1, 1, NULL, NULL, NULL),
(3, 2, 12, 2, 1, 'OTOBI', 'CSEP006FRAA010', 5, 9, '2022-10-19', 8, 4, 2, 1, 0, NULL, NULL, NULL),
(4, 2, 5, 5, 10, 'HATIL', 'HCL-201', 15, 15, '2022-10-26', 9, 3, 3, 1, 2, 'amnei', NULL, '2022-10-26 11:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_status`
--

CREATE TABLE `requisition_status` (
  `id` int(10) NOT NULL,
  `status_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_status`
--

INSERT INTO `requisition_status` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2022-10-17 07:12:23', '2022-10-17 07:12:23'),
(2, 'Received', '2022-10-17 07:12:23', '2022-10-17 07:12:23'),
(3, 'Canceled', '2022-10-17 07:13:20', '2022-10-17 07:13:20'),
(4, 'Delivered', '2022-10-17 07:13:20', '2022-10-17 07:13:20');

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
(1, 4, 1, 'Master Admin', NULL, 'master@gmail.com', '01413470120', NULL, '$2y$10$3M.QaY1Q.q1nvXLwJ6smS.8zyOteEI8.rn6GtwH6jLooVNBe3EJRu', NULL, NULL, NULL),
(2, 10, 4, 'Kawsar Khan', 'Branch User', 'kawsarkhan@gmail.com', NULL, NULL, '$2y$10$/tzDKwtansjW50EbJyEnNeyZu00hScBnsn8xCDt5xr4eONJeS8IBu', NULL, NULL, NULL),
(3, 10, 3, 'Samer', 'Branch Manager', 'samer@gmail.com', NULL, NULL, '$2y$10$YJMQvgdHQHQPJNZs/gAm9.E9X3lwW2a1NgC1dQEI.IXDYU.gfBY7m', NULL, NULL, NULL),
(4, 1, 3, 'Sinat', 'Branch Manager', 'sinat@gmail.com', '01875510694', NULL, '$2y$10$o2VGC0ffOC1tayAHjyyAtOmmNT8LnJugprW0yWwrSdDZxaVstRWW2', NULL, NULL, NULL),
(6, 1, 4, 'Maliha Rahman', 'Branch User', 'maliha@gmail.com', '01512470120', NULL, '$2y$10$rLcaz2qMVl2wVkzDm/Npk.reB4RBPeJ4zLtj4jgB.UZuUIKqT9QEa', NULL, NULL, NULL),
(7, 4, 2, 'SBAC Head office', 'Super User', 'hdadmin@gmail.com', '01512470124', NULL, '$2y$10$vLNyME.MjGUszCXf4PLN9.nPNqWgLFsHn1X1DTU/kwJCd03Rq7WEm', NULL, NULL, NULL),
(8, 1, 4, 'Jamil Hasan', 'Branch User', 'jamil@gmail.com', '0121470125', NULL, '$2y$10$zBEhdxVkzb0Psh7pIhA6lOUlm5b2ptU1nOku46TsXFPc4iB0H2EeW', NULL, NULL, NULL),
(9, 10, 4, 'Habibur Rahman', 'Branch User', 'habibur@gmail.com', '01411250125', NULL, '$2y$10$TeqAXkg6L.OZsBWfRQUx8OHpMr4wpHbmxqKtD71rPvwxPZ/EaYyV.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_old`
--

CREATE TABLE `users_old` (
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
-- Dumping data for table `users_old`
--

INSERT INTO `users_old` (`id`, `branch_id`, `role_id`, `name`, `type`, `email`, `contact_phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Master Admin', NULL, 'admin@gmail.com', '01413470120', NULL, '$2y$10$3M.QaY1Q.q1nvXLwJ6smS.8zyOteEI8.rn6GtwH6jLooVNBe3EJRu', NULL, NULL, NULL),
(2, 3, 2, 'Kawsar Khan', NULL, 'kawsarkhan@gmail.com', NULL, NULL, '$2y$10$/tzDKwtansjW50EbJyEnNeyZu00hScBnsn8xCDt5xr4eONJeS8IBu', NULL, NULL, NULL),
(3, 1, 4, 'Samer', 'Branch User', 'samer@gmail.com', NULL, NULL, '$2y$10$YJMQvgdHQHQPJNZs/gAm9.E9X3lwW2a1NgC1dQEI.IXDYU.gfBY7m', NULL, NULL, NULL),
(4, 1, 3, 'Sinat', 'Manager', 'sinat@gmail.com', '01875510694', NULL, '$2y$10$o2VGC0ffOC1tayAHjyyAtOmmNT8LnJugprW0yWwrSdDZxaVstRWW2', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches_old`
--
ALTER TABLE `branches_old`
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
  ADD KEY `product_entries_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_requisitions`
--
ALTER TABLE `product_requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_status`
--
ALTER TABLE `requisition_status`
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
-- Indexes for table `users_old`
--
ALTER TABLE `users_old`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `branches_old`
--
ALTER TABLE `branches_old`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_entries`
--
ALTER TABLE `product_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_requisitions`
--
ALTER TABLE `product_requisitions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requisition_status`
--
ALTER TABLE `requisition_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_old`
--
ALTER TABLE `users_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `br_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches_old` (`id`);

--
-- Constraints for table `users_old`
--
ALTER TABLE `users_old`
  ADD CONSTRAINT `users_forign_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_old_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches_old` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
