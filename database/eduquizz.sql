-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 02:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduquizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `tutorial_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `level_id`, `title`, `description`, `order`, `tutorial_link`, `created_at`, `updated_at`) VALUES
(1, 1, 'ما البرنامج؟', NULL, 1, 'https://youtu.be/YFg6yuoanh8?si=ueOYQ8uTLHRkBMy4', '2025-02-27 10:56:07', '2025-02-27 11:04:37'),
(2, 1, 'المتغيرات والثوابت', NULL, 2, 'https://youtu.be/KccBPbOW4AE?si=a-qqO4EOBD4KtAYa', '2025-03-06 06:49:00', '2025-03-06 06:49:00'),
(3, 3, 'إدخال البيانات', NULL, 1, 'https://youtu.be/1d4aM-Ft1pU?si=ozh9Wg7JYO9zbsYF', '2025-03-06 07:01:13', '2025-03-06 07:01:24'),
(4, 3, 'المعاملات في بايثون', NULL, 2, 'https://youtu.be/eA-oxAmjf54?si=43tcUtVdVCQ_pdoN', '2025-03-06 07:02:07', '2025-03-06 07:02:07'),
(5, 3, 'الرسم باستخدام البرمجة', NULL, 3, 'https://youtu.be/vJ5Say2lAVQ?si=4Kz7sXKSAddoF-EM', '2025-03-06 07:02:49', '2025-03-06 07:02:49'),
(6, 5, 'المعاملات المنطقية في بايثون', NULL, 1, 'https://youtu.be/nZBpaRlu7T0?si=GWAwM1V0a5Ru3Waw', '2025-03-06 07:07:50', '2025-03-06 07:07:50'),
(7, 5, 'الجمل الشرطية في بايثون', NULL, 2, 'https://youtu.be/nDuMi8YB4Co?si=hbTQsNoadkXjwkMG', '2025-03-06 07:08:05', '2025-03-06 07:08:05'),
(8, 5, 'اتخاذ القرارت', NULL, 3, 'https://youtu.be/4GSBLqHtaDQ?si=_cA1VdiTO2EZ0hVi', '2025-03-06 07:08:20', '2025-03-06 07:08:20'),
(9, 5, 'الجمل الشرطية المتداخلة', NULL, 4, 'https://youtu.be/qPbnog9UKH8?si=vPCaNjbohZhc3Pm4', '2025-03-06 07:08:30', '2025-03-06 07:08:30'),
(10, 6, 'الحلقات', NULL, 1, 'https://youtu.be/-WYz4-ICS94?si=ydgmtvqHU0RtZjZr', '2025-03-06 07:09:08', '2025-03-06 07:09:08'),
(11, 6, 'الحلقات المتداخلة', NULL, 2, 'https://youtu.be/uZFW13cKwN0?si=oaG6rqy6gJzFHTq5', '2025-03-06 07:09:18', '2025-03-06 07:09:18'),
(12, 6, 'الدوال', NULL, 3, 'https://youtu.be/GLYqSg5C4w8?si=40VMTHRuCkSOgIuQ', '2025-03-06 07:09:28', '2025-03-06 07:09:28'),
(13, 6, 'جداول بيانات إكسل في بايثون', NULL, 4, 'https://youtu.be/gUwwEWRqIY0?si=pQ2ccGmLYk7Fgfxd', '2025-03-06 07:09:38', '2025-03-06 07:09:38'),
(14, 7, 'القوائم وصفوف البيانات', NULL, 1, 'https://youtu.be/zfIVZPD-HfY?si=6y3Ea7SoLhl5hXMh', '2025-03-06 07:10:23', '2025-03-06 07:10:23'),
(15, 7, 'المكتبات البرمجية', NULL, 2, 'https://youtu.be/Z7pdpOFGFa4?si=mQ-X97vog_AAqqWy', '2025-03-06 07:10:36', '2025-03-06 07:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_user`
--

CREATE TABLE `lesson_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `subject_id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'الصف الأول متوسط - الفصل الأول', 1, '2025-02-27 10:06:57', '2025-03-06 06:41:05'),
(3, 1, 'الصف الأول متوسط - الفصل الثاني', 2, '2025-03-06 06:44:38', '2025-03-06 06:44:38'),
(5, 1, 'الصف الثاني متوسط - الفصل الأول', 3, '2025-03-06 06:45:32', '2025-03-06 06:45:32'),
(6, 1, 'الصف الثاني متوسط - الفصل الثاني', 4, '2025-03-06 06:45:40', '2025-03-06 06:45:40'),
(7, 1, 'الصف الثالث متوسط - الفصل الأول', 5, '2025-03-06 06:45:52', '2025-03-06 06:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Subject', 1, 'd6c67770-c18d-420a-a8bc-4c31b98b5ed0', 'subjects', 'python-blog-image-700x394', 'python-blog-image-700x394.jpg', 'image/jpeg', 'public', 'public', 47778, '[]', '[]', '[]', '[]', 1, '2025-02-27 09:54:42', '2025-02-27 09:54:42');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_13_140731_create_media_table', 1),
(6, '2025_02_15_103626_create_subjects_table', 1),
(7, '2025_02_18_121812_create_chapters_table', 1),
(8, '2025_02_27_100656_create_levels_table', 1),
(9, '2025_02_27_100712_create_lessons_table', 1),
(10, '2025_02_27_100724_create_questions_table', 1),
(11, '2025_02_27_100739_create_question_options_table', 1),
(12, '2025_03_05_082056_create_placement_test_questions_table', 2),
(13, '2025_03_05_082103_create_placement_test_options_table', 2),
(14, '2025_03_06_070927_create_lesson_user_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `placement_test_options`
--

CREATE TABLE `placement_test_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placement_test_options`
--

INSERT INTO `placement_test_options` (`id`, `question_id`, `option`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'لغة البشر', 0, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(2, 1, 'لغة الترميز', 0, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(3, 1, 'لغة الجسد', 0, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(4, 1, 'لغة الآلة', 1, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(5, 2, 'ألا يبدأ برقم', 0, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(6, 2, 'أن يبدأ بحرف أو شرطة سفلية', 0, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(7, 2, 'حالة الحروف الإنجليزية مهمة', 0, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(8, 2, 'جميع ما سبق', 1, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(9, 3, 'System.out.println(\'مرحبًا بالعالم!\')', 0, '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(10, 3, 'print(\'مرحبًا بالعالم!\')', 1, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(11, 3, 'console.log(\'مرحبًا بالعالم!\')', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(12, 3, 'System println(\'مرحبًا بالعالم!\')', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(13, 4, 'المعاملات المنطقية', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(14, 4, 'معاملات الإسناد', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(15, 4, 'المعاملات الرياضية', 1, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(16, 4, 'المعاملات الشرطية', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(17, 5, 'print', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(18, 5, 'if', 1, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(19, 5, 'for', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(20, 5, 'input', 0, '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(21, 6, 'if x % 2 == 0: print(\'زوجي\') else: print(\'فردي\')', 1, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(22, 6, 'if x % 2 != 0: print(\'زوجي\') else: print(\'فردي\')', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(23, 6, 'if x / 2 == 0: print(\'زوجي\') else: print(\'فردي\')', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(24, 6, 'if x // 2 != 0: print(\'زوجي\') else: print(\'فردي\')', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(25, 7, 'وسائط', 1, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(26, 7, 'معاملات', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(27, 7, 'متغيرات', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(28, 7, 'لا شيء', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(29, 8, 'صح', 1, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(30, 8, 'خطأ', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(31, 9, 'القوائم قابلة للتغيير، بينما الصفوف غير قابلة للتغيير', 1, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(32, 9, 'الصفوف تُستخدم مع الأعداد فقط', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(33, 9, 'القوائم تأخذ عناصر نصية فقط', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(34, 9, 'الصفوف أسرع ولكنها تستهلك ذاكرة أكثر', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(35, 10, 'يتم تغيير العنصر الثاني إلى 4', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(36, 10, 'يتم إنشاء عنصر جديد في الصف بعد العنصر الثاني', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(37, 10, 'يحدث خطأ لأن الصفوف غير قابلة للتغيير', 1, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(38, 10, 'يتم حذف العنصر الأول واستبداله بـ 4', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(39, 11, 'scipy', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(40, 11, 'numpy', 1, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(41, 11, 'tkinter', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(42, 11, 'json', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(43, 12, 'تُرجع عددًا عشريًا بين 1 و 10', 0, '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(44, 12, 'تُرجع عددًا صحيحًا عشوائيًا بين 1 و 10', 1, '2025-03-05 05:35:01', '2025-03-05 05:35:01'),
(45, 12, 'تُحدد الرقم الأكبر بين 1 و 10', 0, '2025-03-05 05:35:01', '2025-03-05 05:35:01'),
(46, 12, 'تُنشئ قائمة بأرقام عشوائية', 0, '2025-03-05 05:35:01', '2025-03-05 05:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `placement_test_questions`
--

CREATE TABLE `placement_test_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `level` enum('easy','medium','hard') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placement_test_questions`
--

INSERT INTO `placement_test_questions` (`id`, `question`, `level`, `created_at`, `updated_at`) VALUES
(1, 'هي اللغة الوحيدة التي يفهمها الحاسب:', 'easy', '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(2, 'من الشروط الواجب توفرها في اسم المتغير:', 'easy', '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(3, 'أي من الخيارات التالية يستخدم لطباعة الجملة \'مرحبًا بالعالم!\' في لغة بايثون؟', 'easy', '2025-03-05 05:34:58', '2025-03-05 05:34:58'),
(4, 'تستخدم لإجراء العمليات الحسابية: الجمع، الطرح، الضرب، والقسمة:', 'easy', '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(5, 'أي جملة تستخدم لاتخاذ القرارات؟', 'medium', '2025-03-05 05:34:59', '2025-03-05 05:34:59'),
(6, 'أي من العبارات التالية تعني \'إذا كان العدد زوجيًا اطبع (زوجي)، وإلا اطبع (فردي)\'؟', 'medium', '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(7, 'المتغيرات التي يمكن الإعلان عنها في الدالة تسمى', 'medium', '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(8, 'توفر جميع لغات البرمجة تقريباً بنية تحكم تسمى حلقة (loop) :', 'medium', '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(9, 'ما الفرق بين القوائم (Lists) والصفوف (Tuples)؟', 'hard', '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(10, 'ما هي النتيجة المتوقعة عند تنفيذ my_tuple = (1, 2, 3); my_tuple[1] = 4؟', 'hard', '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(11, 'أي مكتبة تُستخدم لمعالجة البيانات الضخمة وحساب العمليات الرياضية المعقدة بكفاءة؟', 'hard', '2025-03-05 05:35:00', '2025-03-05 05:35:00'),
(12, 'ما الذي تقوم به الدالة random.randint(1,10)؟', 'hard', '2025-03-05 05:35:00', '2025-03-05 05:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `question_number` int(11) NOT NULL,
  `type` enum('multiple_choice','true_false') NOT NULL,
  `question` text NOT NULL,
  `correct_answer` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `lesson_id`, `question_number`, `type`, `question`, `correct_answer`, `created_at`, `updated_at`) VALUES
(10, 1, 1, 'multiple_choice', 'قائمة من التعليمات يتم اتباعها خطوة بخطوة لحل مشكلة معينة :', 1, '2025-03-06 06:50:27', '2025-03-06 06:50:27'),
(11, 1, 2, 'true_false', 'لغات برمجة تعد ذات مستوى أعلى من لغة الآلة:', 1, '2025-03-06 06:50:45', '2025-03-06 06:50:45'),
(12, 1, 3, 'multiple_choice', 'هو نوع من أنواع المخططات البيانية يستخدم لتمثيل الخوارزمية ويعرض الخطوات التي تحتاج الى اتباعها بالترتيب الصحيح:', 1, '2025-03-06 06:51:38', '2025-03-06 06:51:38'),
(13, 1, 4, 'multiple_choice', 'ما هي آخر مرحلة من مراحل إنشاء البرنامج؟', 1, '2025-03-06 06:52:56', '2025-03-06 06:52:56'),
(14, 1, 5, 'multiple_choice', 'بماذا يستخدم هذا الأمر ؟ (()length = int (input', 1, '2025-03-06 06:56:10', '2025-03-06 06:56:10'),
(15, 1, 6, 'multiple_choice', 'هي اللغة الوحيدة التي يفهمها الحاسب:', 1, '2025-03-06 06:57:02', '2025-03-06 06:57:02'),
(16, 1, 7, 'multiple_choice', 'يقوم الحاسب بقراءة التعليمات المقدمة له بلغة الآلة وهي اللغة الوحيدة التي يفهمها الحاسب وتتكون من:', 1, '2025-03-06 06:58:47', '2025-03-06 06:58:47'),
(17, 1, 8, 'multiple_choice', 'لغة برمجة بايثون هي لغة عالمية:', 1, '2025-03-06 06:59:29', '2025-03-06 06:59:29'),
(18, 2, 1, 'true_false', 'من الشروط التي يجب توفرها في اسم المتغير أن يبدأ برقم:', 0, '2025-03-08 08:56:09', '2025-03-08 08:56:09'),
(19, 2, 2, 'multiple_choice', 'لا يعتبر من المتغيرات الصحيحة:', 1, '2025-03-08 08:57:18', '2025-03-08 08:57:18'),
(20, 2, 3, 'true_false', 'المتغيرات النصية في لغة بايثون تسمى سلسلة نصية:', 1, '2025-03-08 08:57:31', '2025-03-08 08:57:31'),
(21, 2, 4, 'multiple_choice', 'مكان محجوز في ذاكرة جهاز الحاسب ُيستخدم لتخزين قيمة يتم إدخالها :', 1, '2025-03-08 08:57:58', '2025-03-08 08:57:58'),
(22, 2, 5, 'multiple_choice', 'من الشروط الواجب توفرها في اسم المتغير:', 1, '2025-03-08 08:58:52', '2025-03-08 08:58:52'),
(23, 2, 6, 'multiple_choice', 'لتعيين قيمة لأحد المتغيرات نستخدم علامة:', 1, '2025-03-08 08:59:15', '2025-03-08 08:59:15'),
(24, 2, 7, 'true_false', 'يقتصر استخدام المتغيرات على الأرقام فقط:', 0, '2025-03-08 08:59:30', '2025-03-08 08:59:30'),
(25, 2, 8, 'multiple_choice', 'المتغيرات التي تخزن النص تسمى متغيرات من نوع:', 1, '2025-03-08 09:00:38', '2025-03-08 09:00:38'),
(26, 2, 9, 'true_false', 'تستخدم التعليقات لإضافة تلميحات حول التعليمات البرمجية ولا تعد من خطوات البرمجة:', 1, '2025-03-08 09:00:49', '2025-03-08 09:00:49'),
(27, 2, 10, 'multiple_choice', 'يمكن إضافة ما تريده من تعليقات بأن نستخدم في بداية العبارة علامة:', 1, '2025-03-08 09:01:29', '2025-03-08 09:01:29'),
(28, 2, 11, 'multiple_choice', 'عند استخدام المتغيرات النصية يجب كتابة النص بين علامتي:', 1, '2025-03-08 09:02:02', '2025-03-08 09:02:02'),
(29, 2, 12, 'true_false', 'الثوابت هي متغيرات بقيم ثابتة لا تتغير أبدًا:', 1, '2025-03-08 09:02:13', '2025-03-08 09:02:13'),
(30, 3, 1, 'true_false', 'تستخدم ( input() ) لإدخال البيانات', 1, '2025-03-08 09:07:33', '2025-03-08 09:07:33'),
(31, 3, 2, 'true_false', 'البيانات المنطقية (Boolean - bool) تخزن القيم  true أو false', 1, '2025-03-08 09:07:46', '2025-03-08 09:08:06'),
(32, 3, 3, 'true_false', 'يجب ترك مسافة و فراغ عند كتابة السطر البرمجي', 0, '2025-03-08 09:08:24', '2025-03-08 09:08:24'),
(33, 3, 4, 'true_false', 'نوع البيانات هو تصنيف لأنواع مختلفة من البيانات', 1, '2025-03-08 09:08:57', '2025-03-08 09:08:57'),
(34, 3, 5, 'true_false', 'لا يمكن كتابة الرسالة النصية في دالة الإدخال input())', 0, '2025-03-08 09:09:07', '2025-03-08 09:09:07'),
(35, 3, 6, 'multiple_choice', 'اي من الخيارات التالية يستخدم لطباعة الجملة \"مرحبًا بالعالم!\" في لغة بايثون؟', 1, '2025-03-08 09:09:59', '2025-03-08 09:09:59'),
(36, 3, 7, 'multiple_choice', 'اي من الخيارات التالية يستخدم لتخزين str :', 1, '2025-03-08 09:10:32', '2025-03-08 09:10:32'),
(37, 3, 8, 'multiple_choice', 'اي من الخيارات التالية يستخدم لتخزين Int :', 1, '2025-03-08 09:10:58', '2025-03-08 09:10:58'),
(38, 3, 9, 'multiple_choice', 'اي من الخيارات التالية يستخدم لتخزين float:', 1, '2025-03-08 09:11:25', '2025-03-08 09:11:25'),
(39, 6, 1, 'multiple_choice', 'أي من التالي هو معامل منطقي في بايثون؟', 1, '2025-03-09 07:30:51', '2025-03-09 07:30:51'),
(40, 6, 2, 'multiple_choice', 'ما ناتج False or True؟', 1, '2025-03-09 07:31:23', '2025-03-09 07:31:23'),
(41, 6, 3, 'multiple_choice', 'ما نتيجة not False؟', 1, '2025-03-09 07:31:41', '2025-03-09 07:31:41'),
(42, 6, 4, 'true_false', 'and تعطي True فقط إذا كان كلا الطرفين True', 1, '2025-03-09 07:32:26', '2025-03-09 07:32:26'),
(43, 6, 5, 'true_false', 'or تعطي False فقط إذا كان كلا الطرفين False', 1, '2025-03-09 07:32:40', '2025-03-09 07:32:40'),
(44, 6, 6, 'true_false', 'not True تعطي True', 0, '2025-03-09 07:33:02', '2025-03-09 07:33:02'),
(45, 10, 1, 'true_false', 'توفر جميع لغات البرمجة تقريباً بنية تحكم تسمى حلقة ( loop ) :', 1, '2025-03-09 07:33:58', '2025-03-09 07:33:58'),
(46, 10, 2, 'true_false', 'تسمح لك دالة ( loop ) بتنفيذ سطر واحد أو مجموعة من المقاطع البرمجية عدة مرات :', 1, '2025-03-09 07:34:08', '2025-03-09 07:34:08'),
(47, 10, 3, 'true_false', 'يدعم بايثون نوعي من الحلقات حلقة for وحلقة while :', 1, '2025-03-09 07:34:28', '2025-03-09 07:34:28'),
(48, 10, 4, 'multiple_choice', 'من أنواع الحلقات تستخدم لتكرار مجموعة من الأوامر لعدد محدد من المرات :', 1, '2025-03-09 07:35:20', '2025-03-09 07:35:20'),
(49, 10, 5, 'true_false', '- يكون عدد التكرارات محددا يف قيم دالة النطاق (()range):', 1, '2025-03-09 07:35:30', '2025-03-09 07:35:30'),
(50, 10, 6, 'true_false', 'المسافة البادئة لعبارات if الشرطية ليس امرا مهم في البايثون:', 0, '2025-03-09 07:35:44', '2025-03-09 07:35:44'),
(51, 10, 7, 'true_false', 'دالة (()range) تستخدم مع الحلقة لتحديد عدد التكرارات :', 1, '2025-03-09 07:35:52', '2025-03-09 07:35:52'),
(52, 10, 8, 'true_false', 'يسمى المتغير الذي يحسب التكرار العداد (counter):', 1, '2025-03-09 07:36:01', '2025-03-09 07:36:01'),
(53, 10, 9, 'true_false', 'في  دالة النطاق يبدأ العداد بالعد من 0 يزيد بمقدار 1 و ينتهي العد قبل الوصول إلى الرقم المحدد :', 1, '2025-03-09 07:36:11', '2025-03-09 07:36:11'),
(54, 10, 10, 'true_false', 'القيمة الثالثة في دالة النطاق يسمى الخطوة (the step):', 1, '2025-03-09 07:36:21', '2025-03-09 07:36:21'),
(55, 10, 11, 'true_false', 'تستخدم حلقة for عند معرفة عدد التكرارات المراد قبل بداية التكرار :', 1, '2025-03-09 07:36:52', '2025-03-09 07:36:52'),
(56, 10, 12, 'true_false', 'تستخدم حلقة while عندما لا يكون عدد التكرارات معروفاً سابقا:', 1, '2025-03-09 07:37:02', '2025-03-09 07:37:02'),
(57, 10, 13, 'true_false', 'طالما أن  حالة الشرط صحيحة يف حلقة while فإن الحلقة تتكرر وتفحص بعد كل تكرار للتأكد من صحتها :', 1, '2025-03-09 07:37:11', '2025-03-09 07:37:11'),
(58, 10, 14, 'true_false', 'إذا كانت حالة الشرط خطأ يف حلقة while يف البداية فلن يتم تنفيذ الحلقة عىل الاطلاق:', 1, '2025-03-09 07:37:19', '2025-03-09 07:37:19'),
(59, 10, 15, 'true_false', 'إذا لم يصبح شرط حلقة while خطأ فسينتهي بك الأمر بحلقة النهائية (loop infinite)', 1, '2025-03-09 07:37:29', '2025-03-09 07:37:29'),
(60, 10, 16, 'true_false', 'تنهي عبارة الإيقاف الحلقة التي تحتوي عليها وينتقل البرنامج إلى السطر التواجد بعد الحلقة :', 1, '2025-03-09 07:37:52', '2025-03-09 07:37:52'),
(61, 14, 1, 'multiple_choice', 'ما هو نوع البيانات الذي يُستخدم لتخزين مجموعة من القيم القابلة للتغيير في بايثون؟', 1, '2025-03-09 07:39:59', '2025-03-09 07:39:59'),
(62, 14, 2, 'multiple_choice', 'أي مما يلي يُستخدم للوصول إلى العنصر الأخير في القائمة؟', 1, '2025-03-09 07:41:16', '2025-03-09 07:41:16'),
(63, 14, 3, 'multiple_choice', 'ما الفرق بين القوائم (Lists) والصفوف (Tuples)؟', 1, '2025-03-09 07:41:56', '2025-03-09 07:41:56'),
(64, 14, 4, 'multiple_choice', 'ما هي الدالة التي تُستخدم لإضافة عنصر إلى نهاية القائمة؟', 1, '2025-03-09 07:42:25', '2025-03-09 07:42:25'),
(65, 14, 5, 'multiple_choice', 'أي من العمليات التالية يمكن تنفيذها على القوائم ولكن ليس على الصفوف؟', 1, '2025-03-09 07:42:59', '2025-03-09 07:42:59'),
(66, 15, 1, 'multiple_choice', 'ما هي وظيفة المكتبات البرمجية في بايثون؟', 1, '2025-03-10 15:32:46', '2025-03-10 15:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `option_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(33, 10, 'مقطع برمجي', 0, '2025-03-06 06:50:27', '2025-03-06 06:50:27'),
(34, 10, 'مدخلات', 0, '2025-03-06 06:50:27', '2025-03-06 06:50:27'),
(35, 10, 'خوارزمية', 1, '2025-03-06 06:50:27', '2025-03-06 06:50:27'),
(36, 10, 'مخطط الانسياب', 0, '2025-03-06 06:50:27', '2025-03-06 06:50:27'),
(37, 12, 'مقطع برمجي', 0, '2025-03-06 06:51:38', '2025-03-06 06:51:38'),
(38, 12, 'مدخلات', 0, '2025-03-06 06:51:38', '2025-03-06 06:51:38'),
(39, 12, 'خوارزمية', 0, '2025-03-06 06:51:38', '2025-03-06 06:51:38'),
(40, 12, 'مخطط الانسياب', 1, '2025-03-06 06:51:39', '2025-03-06 06:51:39'),
(41, 13, 'تحديد المشكلة', 0, '2025-03-06 06:52:56', '2025-03-06 06:52:56'),
(42, 13, 'كتابة البرنامج بلغة البرمجة', 1, '2025-03-06 06:52:56', '2025-03-06 06:52:56'),
(43, 13, 'كتابة خطوات الخوارزمية', 0, '2025-03-06 06:52:56', '2025-03-06 06:52:56'),
(44, 13, 'رسم المخطط الانسيابي', 0, '2025-03-06 06:52:56', '2025-03-06 06:52:56'),
(45, 14, 'تمكين المستخدم من إدخال قيمة', 1, '2025-03-06 06:56:10', '2025-03-06 06:56:10'),
(46, 14, 'تمكين المستخدم من إخراج قيمة', 0, '2025-03-06 06:56:10', '2025-03-06 06:56:10'),
(47, 14, 'تحويل بين أنواع العمليات', 0, '2025-03-06 06:56:10', '2025-03-06 06:56:10'),
(48, 14, 'كل ما ذكر صحيح', 0, '2025-03-06 06:56:10', '2025-03-06 06:56:10'),
(49, 15, 'لغة البشر', 0, '2025-03-06 06:57:02', '2025-03-06 06:57:02'),
(50, 15, 'لغة الترميز', 0, '2025-03-06 06:57:03', '2025-03-06 06:57:03'),
(51, 15, 'لغة الجسد', 0, '2025-03-06 06:57:03', '2025-03-06 06:57:03'),
(52, 15, 'لغة الآلة', 1, '2025-03-06 06:57:03', '2025-03-06 06:57:03'),
(53, 16, '1 و 0', 1, '2025-03-06 06:58:47', '2025-03-06 06:58:47'),
(54, 16, '2 و 3', 0, '2025-03-06 06:58:47', '2025-03-06 06:58:47'),
(55, 16, '4 و 5', 0, '2025-03-06 06:58:47', '2025-03-06 06:58:47'),
(56, 16, '6 و 7', 0, '2025-03-06 06:58:47', '2025-03-06 06:58:47'),
(57, 17, 'عالية المستوى', 0, '2025-03-06 06:59:29', '2025-03-06 06:59:29'),
(58, 17, 'مفتوحة المصدر', 0, '2025-03-06 06:59:30', '2025-03-06 06:59:30'),
(59, 17, 'سهلة التعلم', 0, '2025-03-06 06:59:30', '2025-03-06 06:59:30'),
(60, 17, 'جميع ما سبق', 1, '2025-03-06 06:59:30', '2025-03-06 06:59:30'),
(61, 19, 'Name', 0, '2025-03-08 08:57:18', '2025-03-08 08:57:18'),
(62, 19, 'Fname', 0, '2025-03-08 08:57:18', '2025-03-08 08:57:18'),
(63, 19, '2Name', 1, '2025-03-08 08:57:18', '2025-03-08 08:57:18'),
(64, 19, 'Name2', 0, '2025-03-08 08:57:18', '2025-03-08 08:57:18'),
(65, 21, 'الخوارزمية', 0, '2025-03-08 08:57:59', '2025-03-08 08:57:59'),
(66, 21, 'المتغيرات', 1, '2025-03-08 08:57:59', '2025-03-08 08:57:59'),
(67, 21, 'الثوابت', 0, '2025-03-08 08:57:59', '2025-03-08 08:57:59'),
(68, 21, 'التعليمات', 0, '2025-03-08 08:57:59', '2025-03-08 08:57:59'),
(69, 22, 'ألا يبدأ برقم', 0, '2025-03-08 08:58:52', '2025-03-08 08:58:52'),
(70, 22, 'أن يبدأ بحرف أو شرطة سفلية', 0, '2025-03-08 08:58:52', '2025-03-08 08:58:52'),
(71, 22, 'حالة الحروف الإنجليزية مهمة', 0, '2025-03-08 08:58:52', '2025-03-08 08:58:52'),
(72, 22, 'جميع ما سبق', 1, '2025-03-08 08:58:52', '2025-03-08 08:58:52'),
(73, 23, '+', 0, '2025-03-08 08:59:15', '2025-03-08 08:59:15'),
(74, 23, '/', 0, '2025-03-08 08:59:15', '2025-03-08 08:59:15'),
(75, 23, '=', 1, '2025-03-08 08:59:15', '2025-03-08 08:59:15'),
(76, 23, '&', 0, '2025-03-08 08:59:15', '2025-03-08 08:59:15'),
(77, 25, 'Double', 0, '2025-03-08 09:00:38', '2025-03-08 09:00:38'),
(78, 25, 'String', 1, '2025-03-08 09:00:38', '2025-03-08 09:00:38'),
(79, 25, 'Int', 0, '2025-03-08 09:00:38', '2025-03-08 09:00:38'),
(80, 25, 'Float', 0, '2025-03-08 09:00:38', '2025-03-08 09:00:38'),
(81, 27, '*', 0, '2025-03-08 09:01:29', '2025-03-08 09:01:29'),
(82, 27, '#', 1, '2025-03-08 09:01:29', '2025-03-08 09:01:29'),
(83, 27, '%', 0, '2025-03-08 09:01:29', '2025-03-08 09:01:29'),
(84, 27, '@', 0, '2025-03-08 09:01:29', '2025-03-08 09:01:29'),
(85, 28, '-   -', 0, '2025-03-08 09:02:02', '2025-03-08 09:02:02'),
(86, 28, '/   /', 0, '2025-03-08 09:02:02', '2025-03-08 09:02:02'),
(87, 28, '\"   \"', 1, '2025-03-08 09:02:02', '2025-03-08 09:02:02'),
(88, 28, '*   *', 0, '2025-03-08 09:02:02', '2025-03-08 09:02:02'),
(89, 35, 'System.out.println (\"مرحبًا بالعالم!\");', 0, '2025-03-08 09:09:59', '2025-03-08 09:09:59'),
(90, 35, 'print(\"مرحبًا بالعالم!\")', 1, '2025-03-08 09:09:59', '2025-03-08 09:09:59'),
(91, 35, 'console.log(مرحبًا بالعالم!\");', 0, '2025-03-08 09:09:59', '2025-03-08 09:09:59'),
(92, 35, 'System println (\"مرحبًا بالعالم!\");', 0, '2025-03-08 09:09:59', '2025-03-08 09:09:59'),
(93, 36, 'قيم عشرية', 0, '2025-03-08 09:10:32', '2025-03-08 09:10:32'),
(94, 36, 'قيم صحيحة', 0, '2025-03-08 09:10:32', '2025-03-08 09:10:32'),
(95, 36, 'رموز', 0, '2025-03-08 09:10:32', '2025-03-08 09:10:32'),
(96, 36, 'نصوص', 1, '2025-03-08 09:10:32', '2025-03-08 09:10:32'),
(97, 37, 'قيم عشرية', 0, '2025-03-08 09:10:58', '2025-03-08 09:10:58'),
(98, 37, 'قيم صحيحة', 1, '2025-03-08 09:10:58', '2025-03-08 09:10:58'),
(99, 37, 'رموز', 0, '2025-03-08 09:10:58', '2025-03-08 09:10:58'),
(100, 37, 'نصوص', 0, '2025-03-08 09:10:58', '2025-03-08 09:10:58'),
(101, 38, 'قيم عشرية', 1, '2025-03-08 09:11:25', '2025-03-08 09:11:25'),
(102, 38, 'قيم صحيحة', 0, '2025-03-08 09:11:25', '2025-03-08 09:11:25'),
(103, 38, 'نصوص', 0, '2025-03-08 09:11:25', '2025-03-08 09:11:25'),
(104, 38, 'رموز', 0, '2025-03-08 09:11:25', '2025-03-08 09:11:25'),
(105, 39, '+', 0, '2025-03-09 07:30:51', '2025-03-09 07:30:51'),
(106, 39, 'and', 1, '2025-03-09 07:30:51', '2025-03-09 07:30:51'),
(107, 39, '*', 0, '2025-03-09 07:30:51', '2025-03-09 07:30:51'),
(108, 39, '=', 0, '2025-03-09 07:30:51', '2025-03-09 07:30:51'),
(109, 40, 'False', 0, '2025-03-09 07:31:23', '2025-03-09 07:31:23'),
(110, 40, 'True', 1, '2025-03-09 07:31:23', '2025-03-09 07:31:23'),
(111, 40, 'None', 0, '2025-03-09 07:31:23', '2025-03-09 07:31:23'),
(112, 40, 'خطأ برمجي', 0, '2025-03-09 07:31:23', '2025-03-09 07:31:23'),
(113, 41, 'True', 1, '2025-03-09 07:31:41', '2025-03-09 07:31:41'),
(114, 41, 'False', 0, '2025-03-09 07:31:41', '2025-03-09 07:31:41'),
(115, 41, '0', 0, '2025-03-09 07:31:41', '2025-03-09 07:31:41'),
(116, 41, 'خطأ برمجي', 0, '2025-03-09 07:31:41', '2025-03-09 07:31:41'),
(117, 48, 'for', 1, '2025-03-09 07:35:20', '2025-03-09 07:35:20'),
(118, 48, 'For..Next', 0, '2025-03-09 07:35:20', '2025-03-09 07:35:20'),
(119, 48, 'while', 0, '2025-03-09 07:35:20', '2025-03-09 07:35:20'),
(120, 48, 'Do..while', 0, '2025-03-09 07:35:20', '2025-03-09 07:35:20'),
(121, 61, 'Tuple', 0, '2025-03-09 07:39:59', '2025-03-09 07:39:59'),
(122, 61, 'List', 1, '2025-03-09 07:39:59', '2025-03-09 07:39:59'),
(123, 61, 'String', 0, '2025-03-09 07:39:59', '2025-03-09 07:39:59'),
(124, 61, 'Dictionary', 0, '2025-03-09 07:39:59', '2025-03-09 07:39:59'),
(125, 62, 'list[0]', 0, '2025-03-09 07:41:16', '2025-03-09 07:41:16'),
(126, 62, 'list[-1]', 1, '2025-03-09 07:41:16', '2025-03-09 07:41:16'),
(127, 62, 'list[Last]', 0, '2025-03-09 07:41:16', '2025-03-09 07:41:16'),
(128, 62, 'list.end()', 0, '2025-03-09 07:41:16', '2025-03-09 07:41:16'),
(129, 63, 'القوائم قابلة للتغيير، بينما الصفوف غير قابلة للتغيير', 1, '2025-03-09 07:41:56', '2025-03-09 07:41:56'),
(130, 63, 'الصفوف تُستخدم مع الأعداد فقط', 0, '2025-03-09 07:41:56', '2025-03-09 07:41:56'),
(131, 63, 'القوائم تأخذ عناصر نصية فقط', 0, '2025-03-09 07:41:56', '2025-03-09 07:41:56'),
(132, 63, 'الصفوف أسرع ولكنها تستهلك ذاكرة أكثر', 0, '2025-03-09 07:41:56', '2025-03-09 07:41:56'),
(133, 64, 'insert()', 0, '2025-03-09 07:42:25', '2025-03-09 07:42:25'),
(134, 64, 'append()', 1, '2025-03-09 07:42:25', '2025-03-09 07:42:25'),
(135, 64, 'extend()', 0, '2025-03-09 07:42:25', '2025-03-09 07:42:25'),
(136, 64, 'add()', 0, '2025-03-09 07:42:25', '2025-03-09 07:42:25'),
(137, 65, 'التكرار عبر العناصر', 0, '2025-03-09 07:42:59', '2025-03-09 07:42:59'),
(138, 65, 'حساب الطول باستخدام len()', 0, '2025-03-09 07:42:59', '2025-03-09 07:42:59'),
(139, 65, 'تعديل القيم بعد إنشائها', 1, '2025-03-09 07:42:59', '2025-03-09 07:42:59'),
(140, 65, 'الوصول إلى العناصر باستخدام الفهارس', 0, '2025-03-09 07:42:59', '2025-03-09 07:42:59'),
(141, 66, 'تُستخدم لحفظ البيانات فقط', 0, '2025-03-10 15:32:46', '2025-03-10 15:32:46'),
(142, 66, 'توفر وظائف إضافية لتسهيل البرمجة', 1, '2025-03-10 15:32:46', '2025-03-10 15:32:46'),
(143, 66, 'تمنع تنفيذ الأكواد غير الآمنة', 0, '2025-03-10 15:32:46', '2025-03-10 15:32:46'),
(144, 66, 'تستخدم فقط مع البيانات النصية', 0, '2025-03-10 15:32:46', '2025-03-10 15:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'مدخل إلى لغة بايثون', 'تعلم أساسيات لغة البرمجة بايثون من الصفر حتى الاحتراف', '2025-02-27 09:54:42', '2025-02-27 09:54:42');

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
  `role` enum('admin','user') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$QUeimtxWnpYdJn0b1Eap2.0BhKqLpGtJfVj5reWsPxE/.zDgli7Ym', 'admin', NULL, '2025-02-27 09:53:53', '2025-02-27 09:53:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_level_id_foreign` (`level_id`);

--
-- Indexes for table `lesson_user`
--
ALTER TABLE `lesson_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_user_user_id_foreign` (`user_id`),
  ADD KEY `lesson_user_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `levels_subject_id_order_unique` (`subject_id`,`order`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placement_test_options`
--
ALTER TABLE `placement_test_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placement_test_options_question_id_foreign` (`question_id`);

--
-- Indexes for table `placement_test_questions`
--
ALTER TABLE `placement_test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_options_question_id_foreign` (`question_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lesson_user`
--
ALTER TABLE `lesson_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `placement_test_options`
--
ALTER TABLE `placement_test_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `placement_test_questions`
--
ALTER TABLE `placement_test_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_user`
--
ALTER TABLE `lesson_user`
  ADD CONSTRAINT `lesson_user_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `placement_test_options`
--
ALTER TABLE `placement_test_options`
  ADD CONSTRAINT `placement_test_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `placement_test_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
