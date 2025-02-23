-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2025 at 05:50 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `img`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bộ sưu tập thời trang công sở', 'storage/uploads/banners/1740244555-po02.webp', 1, '2025-02-14 06:20:50', '2025-02-22 10:20:15'),
(2, 'Bộ sưu tập thời trang hot trend', 'storage/uploads/banners/1740244540-po04.webp', 1, '2025-02-16 07:13:05', '2025-02-22 10:21:05'),
(3, 'Bộ sưu tập thời trang sang trọng', 'storage/uploads/banners/1740244568-po01.webp', 1, '2025-02-22 17:16:08', '2025-02-22 11:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang nữ', 'storage/uploads/categories/1739689516-secu01.png', 0, '2025-02-14 05:36:52', '2025-02-16 00:08:47'),
(4, 'Giày dép', 'storage/uploads/categories/1739689150-pro04_02.webp', 0, '2025-02-16 03:49:01', '2025-02-16 00:05:10'),
(5, 'Túi sách', 'storage/uploads/categories/1739678035-po09.webp', 1, '2025-02-16 03:53:55', '2025-02-15 20:56:57'),
(6, 'Phụ kiện', 'assets/default_account.png', 0, '2025-02-16 14:42:54', '2025-02-16 14:42:54'),
(7, 'Ngô ', 'storage/uploads/categories/1739717100-pro03_01.webp', 0, '2025-02-16 14:45:00', '2025-02-16 07:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img_thumbnail` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `overview` text NOT NULL,
  `content` longtext NOT NULL,
  `price` double(10,2) NOT NULL,
  `price_sale` double(10,2) NOT NULL,
  `is_sale` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_show_home` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `img_thumbnail`, `quantity`, `overview`, `content`, `price`, `price_sale`, `is_sale`, `is_active`, `is_show_home`, `created_at`, `updated_at`) VALUES
(3, 1, 'Siêu phẩm quần jeans', 'ngô-thị-hải-yến-InM37o', 'storage/uploads/products/1740241586-pro8.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 1100.00, 1000.00, 1, 1, 0, '2025-02-22 08:10:55', '2025-02-22 08:10:55'),
(4, 1, 'Áo thun nam', 'áo-thun-nam-sdtU8K', 'storage/uploads/products/1740241306-proo5.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 300.00, 200.00, 1, 0, 1, '2025-02-22 09:21:46', '2025-02-22 09:21:46'),
(5, 1, 'Áo thun cotton in hình độc đáo', 'áo-thun-cotton-in-hình-độc-đáo-evKwB4', 'storage/uploads/products/1740241371-pro03_01.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 150.00, 100.00, 1, 1, 1, '2025-02-22 09:22:51', '2025-02-22 09:22:51'),
(6, 1, 'Áo in hình đẹp', 'áo-in-hình-đẹp-xIuwwX', 'storage/uploads/products/1740241408-pro04_01.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 200.00, 180.00, 1, 1, 1, '2025-02-22 09:23:28', '2025-02-22 09:23:28'),
(7, 1, 'Siêu phẩm hot mùa hè', 'siêu-phẩm-hot-mùa-hè-a6m9H0', 'storage/uploads/products/1740241455-pro03_04.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 300.00, 260.00, 0, 1, 1, '2025-02-22 09:24:15', '2025-02-22 09:24:15'),
(8, 1, 'Áo độc lạ lạ lạ', 'áo-độc-lạ-lạ-lạ-DwD4YD', 'storage/uploads/products/1740241493-proo2.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 1100.00, 1000.00, 1, 1, 1, '2025-02-22 09:24:53', '2025-02-22 09:24:53'),
(9, 5, 'Quần jeans ', 'quần-jeans-34d6g5', 'storage/uploads/products/1740241564-pro06.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 1100.00, 1000.00, 0, 1, 1, '2025-02-22 09:26:04', '2025-02-22 09:26:04'),
(10, 4, 'Quần jeans cao cấp ', 'quần-jeans-cao-cấp-OdPmoK', 'storage/uploads/products/1740241693-pro7_2.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 900.00, 800.00, 1, 1, 1, '2025-02-22 09:28:13', '2025-02-22 09:28:13'),
(11, 1, 'Độc lạ miền Nam', 'độc-lạ-miền-nam-LlMsMA', 'storage/uploads/products/1740241724-proo3.webp', 14, 'dfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 'ácdvfbnmègthyjjhgfddfgbhnẻtyueghsssssssssssssssssssssssssdfgbhnẻtyueghsssssssssssssssssssssssss', 600.00, 500.00, 0, 1, 1, '2025-02-22 09:28:44', '2025-02-22 09:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `avatar`, `password`, `type`, `created_at`, `updated_at`) VALUES
(6, 'test', 'lamhdph45056@fpt.edu.vn', 'storage/uploads/users/1739492720-pro03_04.webp', '$2y$10$1apZUF34UNOaxZICyQnIbOUQQkMGLk0jdlj43P0Re5EdkXgc8Ktu6', 'user', '2025-02-14 00:25:20', '2025-02-14 08:25:51'),
(8, 'haiyen2203', 'ngohaiyen1237a6@gmail.xn--comm6-9d2b', 'storage/uploads/users/1739502301-avatar_post1.jpg', '$2y$10$7tNxh7xT/kVUSz7IR0ZGA.pPP4S0IABYzyRHVktBjVVbIrmTsloe2', 'user', '2025-02-14 03:05:01', '2025-02-14 08:26:40'),
(9, '123123', 'yennthph50871@gmail.com', 'null', '$2y$10$WcJ6pzOaIp2sbOePkJqenu7dD85wWO.t6TAWuJMvY1/n3DMsv.dVW', 'user', '2025-02-14 15:34:14', '2025-02-14 15:34:14'),
(10, 'yennth136', 'yennthph50871@gmail.com', 'null', '$2y$10$PtYecqoMqZcwV4kUTT2ZheH.oHJUk2kVHJSk5dp0ERIM3vNOTZpie', 'user', '2025-02-14 15:37:24', '2025-02-14 15:37:24'),
(11, 'testtt', 'ngohaiyen1237a6@gmail.com', 'storage/uploads/users/1739547593-pro04_02.webp', '$2y$10$jKpVyZaGM.at.DMSxHxP5egA/JgKBdbRUItEchB842zUlzX8PVod6', 'admin', '2025-02-14 15:39:53', '2025-02-16 07:21:49'),
(12, 'rter', 'yenc2e350871@gmail.com', 'storage/uploads/users/1739691564-secu01.png', '$2y$10$1tDDS95NCLnL9dy8VTP8e.TOBs2XXgSKq2ZCJW9GA0N0QKOriN5me', 'admin', '2025-02-14 15:40:45', '2025-02-16 07:21:43'),
(13, 'grhr', 'yenntg3r4eph50871@gmail.com', 'storage/uploads/users/1739673983-secu01.png', '$2y$10$1Qns46W67KON0vgBrd.6aOu64BLZ4nStfjGGI79Fn9HhveWiIA6i2', 'user', '2025-02-14 15:41:18', '2025-02-15 19:49:23'),
(14, 'haiyen2203', 'yenngohai451@gmail.com', 'storage/uploads/users/1739692930-secu01.png', '$2y$10$P8x9H1rpQ7rcrUXH86B/S.JRzQF8N3kPipztujbEuP4LRIKmKBjty', 'admin', '2025-02-16 08:02:10', '2025-02-16 08:02:10'),
(16, 'haiyen2203', 'yen222@gmail.com', 'storage/uploads/users/1739714487-secu02.png', '$2y$10$IjnxOWtilviI92onk5AWQuLn74lPWZRWAyMHy51n/94JcDMmMnU.2', 'admin', '2025-02-16 14:01:27', '2025-02-16 14:01:27'),
(17, 'yen223205', 'yennthph50871@gmail.comf', 'storage/uploads/users/1739715792-IMG_20231020_143145.jpg', '$2y$10$eIBo3x3MgFMs3Db1vaDTTOXs1lZ63rxVp.TvRnzvuiDeqEcvifgmO', 'user', '2025-02-16 14:23:12', '2025-02-16 14:23:12'),
(19, 'yen223205', 'yennthph50871@gmail.comdvfb', 'assets/default_account.png', '$2y$10$Vm.0z1YQ72mnKgACVSHyPufrolhlgpfohCYDI6JelF2guV7FtqTXm', 'admin', '2025-02-16 14:39:09', '2025-02-16 14:39:09'),
(20, 'ngothihaiyen1', 'yennthph5087qre1@gmail.com', 'assets/default_account.png', '$2y$10$VGZSZt5cngZy.lG7j5rj7.GlRHyrDS7VK1tjkRsTnUks4y3gJF7Om', 'user', '2025-02-16 15:27:47', '2025-02-16 15:27:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cate_Pro` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Cate_Pro` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
