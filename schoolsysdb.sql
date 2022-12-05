-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 ديسمبر 2022 الساعة 00:05
-- إصدار الخادم: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolsysdb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_id` bigint(20) NOT NULL,
  `stage_class_id` bigint(20) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `stage_id`, `stage_class_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'A1', 1, 1, 'here you will see notes about classroom', '2022-11-08 15:20:38', '2022-11-12 14:50:02'),
(2, 'A2', 1, 1, 'here you will see notes', '2022-11-08 15:21:19', '2022-11-08 15:21:19'),
(3, 'B1', 1, 2, 'here you will see notes', '2022-11-08 15:21:46', '2022-11-08 15:21:46'),
(4, 'B2', 1, 2, 'here you will see notes', '2022-11-08 15:22:13', '2022-11-08 15:22:13'),
(7, 'A3', 1, 1, 'here you will see notes about classroom', '2022-11-12 15:16:23', '2022-11-12 15:16:23'),
(8, 'B3', 1, 2, 'here you will see notes about classroom', '2022-11-12 15:17:41', '2022-11-12 15:17:41'),
(9, 'C1', 2, 3, 'here you will see notes', '2022-12-03 11:02:06', '2022-12-03 11:02:06');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `description`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 'الحروف الأبجدية', 'فى هذا الدرس سوف نتعلم الحروف الأبجدية', 7, '2022-11-17 22:00:23', '2022-11-18 12:09:01'),
(2, 'تعرف على الأرقام', 'فى هذا الدرس سوف نتعرف على الأرقام', 8, '2022-11-18 11:45:00', '2022-11-18 11:45:00');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_01_134430_create_stages_table', 1),
(6, '2022_11_02_143906_create_stage_classes_table', 1),
(7, '2022_11_05_225919_create_classrooms_table', 1),
(8, '2022_11_06_172331_create_students_table', 1),
(9, '2022_11_06_172934_create_myparents_table', 1),
(10, '2022_11_15_131827_create_teacher_classrooms_table', 2),
(11, '2022_11_15_165735_create_teachers_table', 2),
(12, '2022_11_15_170722_create_subjects_table', 2),
(13, '2022_11_17_224905_create_lessons_table', 3),
(14, '2022_11_17_225858_create_posts_table', 3),
(15, '2022_11_21_235910_create_session_tables_table', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `myparents`
--

CREATE TABLE `myparents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
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
-- بنية الجدول `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `auther` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `session_tables`
--

CREATE TABLE `session_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourth_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fifth_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `session_tables`
--

INSERT INTO `session_tables` (`id`, `day`, `first_session`, `second_session`, `third_session`, `fourth_session`, `fifth_session`, `classroom`, `created_at`, `updated_at`) VALUES
(1, 'السبت', 'لغة عربية', 'حساب', 'لغة انجليزية', 'لغة عربية', 'حاسب الى', 2, NULL, NULL),
(2, 'الأحد', 'حساب', 'تربية دينية', 'لغة عربية', 'عربي', 'عربي', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `stages`
--

INSERT INTO `stages` (`id`, `name_en`, `name_ar`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'primary school', 'المرحلة الإبتدائية', 'here you will see notes', '2022-11-08 15:18:19', '2022-11-08 15:18:19'),
(2, 'Middle school', 'المرحلة الإعدادية', 'here you will see notes about stage', '2022-11-12 15:34:24', '2022-11-12 15:34:24');

-- --------------------------------------------------------

--
-- بنية الجدول `stage_classes`
--

CREATE TABLE `stage_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `stage_classes`
--

INSERT INTO `stage_classes` (`id`, `name_en`, `name_ar`, `stage_id`, `created_at`, `updated_at`) VALUES
(1, 'Class A primary', 'الصف الأول الإبتدائي', 1, '2022-11-08 15:19:16', '2022-11-08 15:19:16'),
(2, 'Class B primary', 'الصف الثاني الإبتدائي', 1, '2022-11-08 15:20:01', '2022-11-08 15:20:01'),
(3, 'Class A Middle school', 'الصف الأول الإعدادى', 2, '2022-11-25 10:37:43', '2022-11-25 10:37:43');

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_id` bigint(20) NOT NULL,
  `stage_class_id` bigint(20) NOT NULL,
  `classroom_id` bigint(20) NOT NULL,
  `parent_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_blood` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `students`
--

INSERT INTO `students` (`id`, `name_ar`, `name_en`, `blood`, `image`, `religion`, `address`, `stage_id`, `stage_class_id`, `classroom_id`, `parent_name_ar`, `parent_name_en`, `parent_phone`, `parent_blood`, `parent_address`, `created_at`, `updated_at`) VALUES
(3, 'محمد على احمد', 'mohamed ali ahmed', 'O', NULL, 'muslim', 'بلبيس - شرقية', 1, 2, 4, 'على احمد على', 'ali ahmed ali', '01241125465', 'A+', 'بلبيس - شرقية', '2022-11-09 11:29:04', '2022-11-09 11:29:04'),
(9, 'محمد السيد على ', 'mohamed elsaid ali', 'AB', NULL, 'muslim', 'بلبيس - شرقية', 1, 1, 2, 'السيد على', 'elsaid ali', ' 0125436225', 'A', 'بلبيس - شرقية', '2022-11-12 11:53:39', '2022-11-12 11:53:39'),
(10, 'كربم محمد أحمد ', 'karim mohamed ahmed', 'A', NULL, 'muslim', 'بلبيس - شرقية ', 1, 2, 3, 'محمد أحمد على', 'mohamed ahmed ali', '01232155468', 'A+', 'بلبيس - شرقية', '2022-11-12 11:55:21', '2022-11-12 11:55:21'),
(12, 'محمود ابراهيم محمد ', 'mahmoud ibrahim mohamed', 'A', NULL, 'muslim', 'بلبيس - شرقية ', 1, 1, 1, 'ابراهيم محمد السيد', 'ibrahim  mohamed elsaid', '012101119875', 'O', 'بلبيس - شرقية', '2022-11-12 12:00:50', '2022-11-12 12:00:50'),
(13, 'السيد على السيد', 'said ali said', 'A', NULL, 'muslim', 'بلبيس - شرقية ', 1, 1, 2, 'على السيد', 'ali elsaid', '01210119388', 'O', 'بلبيس - شرقية ', '2022-11-12 12:03:40', '2022-11-12 12:03:40'),
(14, 'خالد على على', 'khalid ali ali', 'O', NULL, 'muslim', 'بلبيس - شرقية', 1, 1, 2, 'على على السيد', 'ali ali elsaid', '01210119377', 'O', 'بلبيس - شرقية ', '2022-11-12 12:05:05', '2022-11-12 12:10:11');

-- --------------------------------------------------------

--
-- بنية الجدول `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage_class_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `subjects`
--

INSERT INTO `subjects` (`id`, `name_ar`, `name_en`, `image`, `stage_class_id`, `created_at`, `updated_at`) VALUES
(7, 'اللغة العربية', 'Arabic language', '1668603637-Arabic language.jpg', 1, '2022-11-16 11:00:37', '2022-11-19 12:13:47'),
(8, 'حساب', 'Math', '1668603666-Math.jpg', 1, '2022-11-16 11:01:06', '2022-11-16 11:01:06'),
(10, 'اللغة الإنجليزية', 'English language', '', 2, '2022-11-19 12:11:07', '2022-11-19 12:11:07');

-- --------------------------------------------------------

--
-- بنية الجدول `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `teachers`
--

INSERT INTO `teachers` (`id`, `name_ar`, `name_en`, `subject_id`, `avatar`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'محمد على', 'mohamed ali', 7, NULL, 'mohamedali@gmail.com', 'بلبيس - شرقية', '0122544658', '2022-11-16 12:00:18', '2022-11-19 12:55:38'),
(3, 'أحمد موسى', 'Ahmed mussa', 8, NULL, 'ahmedmussa@gmail.com', 'بلبيس - شرقية', '0115424686', '2022-11-16 13:11:50', '2022-11-19 12:56:09');

-- --------------------------------------------------------

--
-- بنية الجدول `teacher_classrooms`
--

CREATE TABLE `teacher_classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) NOT NULL,
  `classroom_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `teacher_classrooms`
--

INSERT INTO `teacher_classrooms` (`id`, `teacher_id`, `classroom_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, NULL, NULL),
(9, 1, 2, NULL, NULL),
(10, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdo Mohamed', 'abdo@gmail.com', 'profile-pic.jpg', NULL, '$2y$10$VuzFWKiXOjkwiQ4VbBhVSuzTbs6MhKB9ip6/h2ywMp5x5yEnR2Oau', NULL, '2022-11-08 15:16:50', '2022-11-08 15:16:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myparents`
--
ALTER TABLE `myparents`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_tables`
--
ALTER TABLE `session_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage_classes`
--
ALTER TABLE `stage_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_classrooms`
--
ALTER TABLE `teacher_classrooms`
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
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `myparents`
--
ALTER TABLE `myparents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session_tables`
--
ALTER TABLE `session_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stage_classes`
--
ALTER TABLE `stage_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_classrooms`
--
ALTER TABLE `teacher_classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
