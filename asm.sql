-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 09:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Men', '2021-08-02 07:39:34', '2021-08-07 03:32:52'),
(2, 'Women', '2021-08-02 08:23:32', '2021-08-07 03:33:00'),
(3, 'Kids', '2021-08-02 08:23:46', '2021-08-07 03:33:10');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `number`, `address`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Ha Noi', 1200000, 1, '2021-08-03 14:28:00', '2021-08-03 14:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoices_details`
--

CREATE TABLE `invoices_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `unit_price` double UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Phinguyen', 'phinguyen.workk@gmail.com', '$2y$10$RSo3RYpuQYyKP2KhHilq1OycV8ZgneBRuEnLyhD2IuU0q0LbHt1ra', '2021-08-01 22:56:17', '2021-08-01 22:56:17');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2021_07_22_143423_create_logins_table', 1),
(15, '2021_07_23_145144_create_categories_table', 1),
(16, '2021_07_23_145651_create_products_table', 1),
(17, '2021_08_03_135525_create_invoices_table', 2),
(18, '2021_08_03_140452_create_invoices_details_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `quantity`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(15, 'Áo Polo nam Lacoste', 399000, '1628335626.jpg', 100, 'Áo polo chất liệu lacoste màu trơn. Dáng regular, cổ mở khuy, tay cộc CHẤT LIỆU 94% polyester 6% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng chất tẩy. Phơi trong bóng mát. Sấy khô ở nhiệt độ thấp. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 1, '2021-08-07 04:27:06', '2021-08-07 04:27:06'),
(19, 'Áo phông bé gái USA', 199000, '1628349902.jpg', 150, 'Áo phông chất liệu cotton USA in hình Dáng regular, cổ tròn, tay phồng. CHẤT LIỆU 100% cotton HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy thùng, chế độ nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 3, '2021-08-07 07:23:29', '2021-08-07 08:25:02'),
(20, 'Quần Jogger Kaki bé trai', 199000, '1628350235.jpg', 100, 'Quần jogger kaki chất liệu cotton co giãn, in hoạ tiết Dáng ôm, cạp bo , cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 3, '2021-08-07 07:24:52', '2021-08-07 08:30:35'),
(21, 'Áo phông bé trai USA', 199000, '1628350312.jpg', 1000, 'Áo phông chất liệu cotton USA in hình Dáng regular, cổ tròn, tay phồng. CHẤT LIỆU 100% cotton HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy thùng, chế độ nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 3, '2021-08-07 07:24:53', '2021-08-07 08:31:52'),
(22, 'Quần Sooc kaki nam họa tiết', 299000, '1628350430.jpg', 100, 'Quần soóc khaki chất liệu cotton co giãn, in hoạ tiết Dáng ôm, cạp thường, cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 1, '2021-08-07 07:26:14', '2021-08-07 08:33:50'),
(23, 'Áo sơ mi nam vải pha Linen', 299000, '1628350645.jpg', 100, 'Áo sơ mi chất liệu cotton USA in hình Dáng regular, cổ tròn, tay phồng. CHẤT LIỆU 100% cotton HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy thùng, chế độ nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 1, '2021-08-07 07:27:23', '2021-08-07 08:37:25'),
(24, 'Váy liền họa tiết', 199000, '1628350999.jpg', 100, 'Váy liền hoạt tiết', 3, '2021-08-07 07:27:23', '2021-08-07 08:43:19'),
(25, 'Quần kaki bé gái', 199000, '1628351041.jpg', 100, 'Quần soóc khaki chất liệu cotton co giãn, in hoạ tiết Dáng ôm, cạp thường, cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 3, '2021-08-07 07:27:56', '2021-08-07 08:44:01'),
(26, 'Áo phông nam Marvel', 299000, '1628351079.jpg', 150, 'Áo phông chất liệu cotton USA in hình Dáng regular, cổ tròn, tay phồng. CHẤT LIỆU 100% cotton HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy thùng, chế độ nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 1, '2021-08-07 07:27:56', '2021-08-07 08:44:39'),
(27, 'Quần jeans nam Slimfit', 399000, '1628352662.jpg', 100, 'Quần jean chất liệu  co giãn, in hoạ tiết dáng ôm, cạp thường, cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 1, '2021-08-07 07:28:41', '2021-08-07 09:11:02'),
(29, 'Áo sơ mi họa tiết', 199000, '1628352732.jpg', 200, 'Áo sơ mi chất liệu cotton USA in hình Dáng regular, cổ tròn, tay phồng. CHẤT LIỆU 100% cotton HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy thùng, chế độ nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 3, '2021-08-07 07:41:59', '2021-08-07 09:12:12'),
(31, 'Quần shorts nam', 299000, '1628352797.jpg', 1000, 'Quần soóc khaki chất liệu cotton co giãn, in hoạ tiết Dáng ôm, cạp thường, cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 1, '2021-08-07 07:57:00', '2021-08-07 09:13:17'),
(32, 'Áo Polo nữ USA', 299000, '1628352859.jpg', 100, 'Áo polo chất liệu lacoste màu trơn. Dáng regular, cổ mở khuy, tay cộc CHẤT LIỆU 94% polyester 6% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng chất tẩy. Phơi trong bóng mát. Sấy khô ở nhiệt độ thấp. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 2, '2021-08-07 08:10:24', '2021-08-07 09:14:19'),
(33, 'Quần Kaki nữ ống rộng', 250000, '1628352914.jpg', 100, 'Quần jean chất liệu  co giãn, in hoạ tiết dáng ôm, cạp thường, cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 2, '2021-08-07 08:11:05', '2021-08-07 09:15:14'),
(34, 'Quần dài nữ', 299000, '1628352972.jpg', 1000, 'Quần dài chất liệu  co giãn, in hoạ tiết dáng ôm, cạp thường, cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 2, '2021-08-07 09:16:12', '2021-08-07 09:16:12'),
(35, 'Quần giả váy kẻ Caro', 199000, '1628353038.jpg', 100, 'Quần giả váy  chất liệu cotton co giãn, in hoạ tiết Dáng ôm, cạp thường, cài cúc, túi chéo 2 bên. CHẤT LIỆU 98% cotton 2% spandex HƯỚNG DẪN SỬ DỤNG Giặt máy ở nhiệt độ thường. Không sử dụng hoá chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy khô, nhẹ nhàng. Là ở nhiệt độ thấp 110 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 2, '2021-08-07 09:17:18', '2021-08-07 09:17:18'),
(36, 'Áo phông nữ tay rủ', 199000, '1628353086.jpg', 100, 'Áo phông chất liệu cotton USA in hình Dáng regular, cổ tròn, tay phồng. CHẤT LIỆU 100% cotton HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy thùng, chế độ nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 2, '2021-08-07 09:18:06', '2021-08-07 09:18:06'),
(37, 'Áo ba lỗ nữ Slimfit', 199000, '1628353378.jpg', 100, 'Áo ba lỗ chất liệu cotton USA in hình Dáng regular, cổ tròn, tay phồng. CHẤT LIỆU 100% cotton HƯỚNG DẪN SỬ DỤNG Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa chất tẩy Có chứa clo. Phơi trong bóng mát. Sấy thùng, chế độ nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ c. Giặt với sản phẩm cùng màu. Không là lên chi tiết trang trí.', 2, '2021-08-07 09:22:58', '2021-08-07 09:22:58');

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
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `gender`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'phinguyen', 'phinguyen.workk@gmail.com', NULL, '0981794925', 'Nam Từ Liêm - Hà Nội', 1, 1, NULL, NULL, '2021-08-04 07:57:11'),
(4, 'Bá Phi 1', 'baphi209@gmail.com', NULL, '0981794925', '213 Phương Canh - Phương Canh  - Nam Từ Liêm', 1, 1, NULL, '2021-08-02 03:54:43', '2021-08-05 06:33:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logins_email_unique` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices_details`
--
ALTER TABLE `invoices_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
