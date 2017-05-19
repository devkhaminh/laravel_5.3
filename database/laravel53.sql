-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2017 at 06:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel53`
--

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Đồ Nữ', 'do-nu', 100, 0, 'Đồ nữ', 'đồ nữ', NULL, NULL),
(2, 'Đồ Nam', 'do-nam', 100, 0, 'Đồ nam', 'đồ nam', NULL, NULL),
(10, 'Áo Nữ', 'ao-nu', 10, 1, 'Áo nữ', 'áo nữ', NULL, NULL),
(11, 'Quần Nữ', 'quan-nu', 10, 1, 'Quần nữ', 'quần nữ', NULL, NULL),
(12, 'Đầm Nữ', 'dam-nu', 10, 1, 'đầm', 'đầm', NULL, NULL),
(13, 'Váy Nữ', 'vay-nu', 10, 1, 'Váy', 'váy', NULL, NULL),
(14, 'Giày Nữ', 'giay-nu', 10, 1, 'Gàiy', 'giày', NULL, NULL),
(15, 'Son', 'son-nu', 10, 1, 'son', 'son', NULL, NULL),
(18, 'Túi Xách', 'tui-xach-nu', 10, 1, 'túi xách', 'túi xách', NULL, NULL),
(20, 'Áo Nam', 'ao-nam', 10, 2, 'Áo nam', 'áo nam', NULL, NULL),
(21, 'Quần Nam', 'quan-nam', 10, 2, 'quần nam', 'quần nam', NULL, NULL),
(22, 'Giày Nam', 'giay-nam', 10, 2, 'Giày nam', 'giày nam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_14_051827_create_cates_table', 1),
(4, '2017_05_14_052451_create_products_table', 1),
(5, '2017_05_14_053437_create_product_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'Áo dài', 'ao-dai', 500000, '<p>vsvsdv</p>\r\n', '<p>sdvsv</p>\r\n', 'ao-dai-voan-to-hong-151001 (1).jpg', 'nữ', 'nữ', 2, 10, '2017-05-18 09:42:14', '2017-05-18 09:42:14'),
(2, 'Áo tăm', 'ao-tam', 6000000, '<p>sdvsdv</p>\r\n', '<p>svdvs</p>\r\n', '1429859279-ukklbikini4_hnav.jpg', 'nữ', 'nữ', 2, 10, '2017-05-18 09:42:47', '2017-05-18 09:42:47'),
(3, 'Giày đá bóng', 'giay-da-bong-nam', 500000, '<p>sdvv</p>\r\n', '<p>svdv</p>\r\n', 'giay-da-bong-san-co-nhan-tao-nike.jpg', 'nam', 'sdvsv', 2, 22, '2017-05-18 09:54:46', '2017-05-18 09:54:46'),
(4, 'Áo đá bóng', 'ao-da-bong-nam', 3000000, '<p>sdvvsv</p>\r\n', '<p>sdvsvs</p>\r\n', 'arsenal_do_re1.jpg', 'nam', 'nam', 2, 20, '2017-05-18 09:55:57', '2017-05-18 09:55:57'),
(5, 'Túi Gucci', 'tui-gucci', 40000000, '<p>&acirc;v&aacute;vavvsdvs</p>\r\n', '<p>svdvdsv</p>\r\n', 'dIfimy1s.jpg', 'nữ', 'dsvv', 2, 18, '2017-05-18 09:57:05', '2017-05-18 09:57:05'),
(6, 'Quần jean nữ', 'quan-jean-nu', 6000000, '<p>svdvdsvsd</p>\r\n', '<p>sdvsvdv</p>\r\n', '1.jpg', 'nữ', 'ewvewv', 2, 11, '2017-05-18 19:56:25', '2017-05-18 19:56:25'),
(7, 'Đầm Ngắn', 'dam-ngan', 200000, '<p>buhbh</p>\r\n', '<p>nibib</p>\r\n', '2.jpg', 'nữ', 'vsdvs', 2, 12, '2017-05-18 20:02:40', '2017-05-18 20:02:40'),
(8, 'Váy Ngắn', 'vay-ngan', 30000, '<p>dvv</p>\r\n', '<p>sdvsvds</p>\r\n', '3.jpg', 'nữ', 'vsv', 2, 13, '2017-05-18 20:03:22', '2017-05-18 20:03:22'),
(9, 'Giày đen', 'giay-den', 1000000, '<p>fdf df&nbsp;</p>\r\n', '<p>d dfd&nbsp;</p>\r\n', '44.jpg', 'nữ', 'fdfd', 2, 14, '2017-05-18 20:04:08', '2017-05-18 20:04:08'),
(10, 'Son hồng', 'son-hong', 300000, '<p>dsc hsjb</p>\r\n', '<p>cndsjcnskdv</p>\r\n', '5.jpg', 'nữ', 'db', 2, 15, '2017-05-18 20:04:39', '2017-05-18 20:04:39'),
(11, 'Quần jean nam', 'quan-jean-nam', 1000000, '<p>dsvsdv</p>\r\n', '<p>sdvsdv</p>\r\n', '6.jpg', 'nam', 'dfbd', 2, 21, '2017-05-18 20:05:18', '2017-05-18 20:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'vai-ao-dai-lua.jpg', 1, NULL, NULL),
(2, 'images.jpg', 1, NULL, NULL),
(3, 'download.jpg', 2, NULL, NULL),
(4, 'AT2U1034.jpg', 2, NULL, NULL),
(5, 'download (2).jpg', 3, NULL, NULL),
(6, 'download (1).jpg', 3, NULL, NULL),
(7, '8477_636041806267666304_HasThumb_Thumb.jpg', 4, NULL, NULL),
(8, 'Tui_xach_Lemino_Le22085.jpg', 5, NULL, NULL),
(9, '11.jpg', 6, NULL, NULL),
(10, '22.jpg', 7, NULL, NULL),
(11, '33.jpg', 8, NULL, NULL),
(12, '4.jpg', 9, NULL, NULL),
(13, '55.png', 10, NULL, NULL),
(14, '666.jpg', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'minh', '$2y$10$saCaIusdUfNRyMm7BkVHXOnLoHOD1IhawGJ7Tc6ZZ0oBu4vufeZ86', 'minh@gmail.com', 1, 'uVkxg2l4s71yM3hC9fFoBL5prf2uL3W1SWXgzl2K3qgqQY4KZmKpmGpfSx27', '2017-05-17 22:55:35', '2017-05-19 02:00:38'),
(4, 'adm', '$2y$10$3N6RUyegsVWI5d1wQBcqqejRq8NxGBkMhqlqC2t48PdGtydbrrLpq', 'user@minhit.com', 2, 'Z4QOeL7rcGD0fiypyEduyF2FfLlaCWpfGv70YJiKiOV4enKvihkpCwwOgqVG', '2017-05-18 00:44:39', '2017-05-19 02:05:38'),
(5, 'admin thường', '$2y$10$gYI2wVic1dBHZ499lWYCX.jdnEuWyfFz/PPoYxoNgIucE5hQ2L7zS', 'admin@admin.com', 1, 'nM7pLUhMWRcwQDor0TsAfvnOiJgn4xqRkBvzzEBy', '2017-05-18 01:47:23', '2017-05-18 01:47:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
