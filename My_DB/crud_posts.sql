-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 02:40 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_posts`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Thể thao', NULL, NULL),
(2, 'Kinh Tế', NULL, NULL),
(3, 'Âm nhạc', NULL, NULL),
(4, 'Điện ảnh', NULL, NULL),
(5, 'Showbiz', NULL, NULL);

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2018_10_23_125438_create_categories_table', 1),
(16, '2018_10_23_142734_create_types_table', 1),
(17, '2018_10_24_155937_create_table_posts', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_type`, `title`, `content`, `created_at`, `updated_at`) VALUES
(4, 4, 'Post 4', 'iNXl1sZ7ZoRkodCJC4E8qzIpjDw7HOufJgFV84dPLqumgtPF9g2RHJ5fvMOiqMt9NYCNf5LB57ZCPSmhp7ZY7IgToxInxnePqkFF4Y62pFeHjP9tt6yGUqM4', NULL, NULL),
(5, 4, 'Post 5', 'zJr4Hqz8MU9v8ilEpemcrhUvNaTr8FyDCC9BxpZUa2CrS4GoUW3JjNUdyXHJ1KwFwsXfOVmYvZg7UsDYs9pBUoYwbUIUoJMAbwsCqxRczq2pcqxdapy9Df4JBKVOSfgyhmfsvZyBRLUv', NULL, NULL),
(6, 3, 'Trung thu cùng người ấy', 'You may also use the create method to save a new model in a single line. The inserted model instance will be returned to you from the method. However, before doing so, you will need to specify either a fillable or guarded attribute on the model, as all Eloquent models protect against mass-assignment.You may also use the create method to save a new model in a single line. The inserted model instance will be returned to you from the method. However, before doing so, you will need to specify either a fillable or guarded attribute on the model, as all Eloquent models protect against mass-assignment.You may also use the create method to save a new model in a single line. The inserted model instance will be returned to you from the method. However, before doing so, you will need to specify either a fillable or guarded attribute on the model, as all Eloquent models protect against mass-assignment.', '2018-10-26 11:03:25', '2018-10-26 11:03:25'),
(7, 4, 'Listening To Music', 'You may also use the create method to save a new model in a single line. The inserted model instance will be returned to you from the method. However, before doing so, you will need to specify either a fillable or guarded attribute on the model, as all Eloquent models protect against mass-assignment.You may also use the create method to save a new model in a single line. The inserted model instance will be returned to you from the method. However, before doing so, you will need to specify either a fillable or guarded attribute on the model, as all Eloquent models protect against mass-assignment.You may also use the create method to save a new model in a single line. The inserted model instance will be returned to you from the method. However, before doing so, you will need to specify either a fillable or guarded attribute on the model, as all Eloquent models protect against mass-assignment.', '2018-10-26 11:04:28', '2018-10-26 11:04:28'),
(8, 1, 'Test Title', 'Let\'s say I have:\r\n\r\nTable A Table B Table C Table D\r\n\r\nTable A has a foreign key in Table B Table B has a foreign key in Table C And Table C has a foreign key in Table D\r\n\r\nHow to delete from Table D to Table B in sequence with Laravel? Would you use a Transaction?\r\n\r\nThis did not happen to me yet but I need to be prepared as I will have multiple tables like this very soon.\r\n\r\nThank you.', '2018-10-26 11:06:53', '2018-10-26 11:06:53'),
(9, 1, 'Test Title 1', 'I\'m trying to make update form, that is going to retrieve the data for the specific ID selected, and fill in the form, so its going to be available for updating.\r\n\r\nWhen I click edit on the specific entry (Product in my case), it takes me to the edit_product_view, but states the error \"Trying to get property of non-object\" for every variable that I use in set_values of the form elements.I\'m trying to make update form, that is going to retrieve the data for the specific ID selected, and fill in the form, so its going to be available for updating.\r\n\r\nWhen I click edit on the specific entry (Product in my case), it takes me to the edit_product_view, but states the error \"Trying to get property of non-object\" for every variable that I use in set_values of the form elements.', '2018-10-26 13:15:42', '2018-10-26 13:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `id_category`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bóng Đá', NULL, NULL),
(3, 2, 'Chứng Khoán', NULL, NULL),
(4, 5, 'Sao Việt', NULL, NULL),
(5, 5, 'Sao Hàn', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_id_type_foreign` (`id_type`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_id_category_foreign` (`id_category`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
