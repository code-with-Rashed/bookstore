-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 10:58 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `image`, `password`) VALUES
(1, 'Maruf', 'admin@gmail.com', '2975000e9948a15a758da84fef96c1f9.jpg', '$2y$10$lb3hTjTXMp7PtvAwAfd25uhGF/W8BDrSS6oWlrofqH5DvLhKvC6FS');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`) VALUES
(3, 'a3bdb88a36eaa715f41e0f0abd16efdb.jpg', 'http://localhost/books_store/admin/add/banner'),
(4, '742b3c53cf39b766d82164b9aeaac525.jpg', 'http://localhost/books_store/admin/add/banner'),
(5, '1e20528a81f0984b8424e529bec0a17c.jpg', 'http://localhost/books_store/admin/add/banner'),
(12, '78914b8a05c992f9d6b8cfd961aa88a2.jpg', 'http://localhost/books_store/admin/banners');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(5) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `price`, `description`, `date`, `status`) VALUES
(1, 'বিদূরিত হোক অসত্যের কালোমেঘ', 280, '<p><strong>লেখক :</strong> মাওলানা আব্দুল গাফফার শাহপুরী</p><p><strong>বিষয় :</strong> ইসলামি গবেষণা, সমালোচনা ও প্রবন্ধফিলিস্তিনি</p><p>মুসলিমদের ওপর দখলদার ইহুদিদের নির্বিচারজুলুম-নির্যাতন এবং দখলদারদের বিরুদ্ধে ফিলিস্তিনি মুক্তিযোদ্ধাদেরএই প্রতিরোধযুদ্ধ নতুন কোনো ঘটনা নয়। এটা তো উসমানি খেলাফতেরপতন-পরবর্তী ফিলিস্তিনে ইহুদি অনুপ্রবেশের পরের প্রতিদিনের ঘটনা।ফিলিস্তিনিরা তো জন্ম থেকেই নিপীড়নের শিকার। তাই তো তারা আজন্মপ্রতিরোধযোদ্ধা।</p><p>এহেন পরিস্থিতিতে দিলের গভীর থেকে বারবার মনে হচ্ছিল সংক্ষিপ্ত তবে সারগর্ভ আলোচনাসমৃদ্ধ এমন একটি বই লিপিবদ্ধ হওয়া উচিত, যাতে থাকবে ফিলিস্তিনের সংক্ষিপ্ত ইতিহাস, ইহুদিদের ফিলিস্তিন দখল, তার ঐতিহাসিক প্রেক্ষাপট, ফিলিস্তিনে খ্রিষ্টানদের স্বার্থ, চলমান জুলুম-নিপীড়নে কুফরি বিশ্ব ও মুসলিমবিশ্বের ভূমিকা, ফিলিস্তিনি মুসলিমদের ভয়ংকর ভবিষ্যৎ ও আমাদের করণীয় সম্পর্কে। এই সকল বিষয় বিবেচনা করেই বক্ষ্যমাণ বইটি সাজানো হয়েছে।</p><p>সম্মানিত পাঠক! আসুন নিকট অতীত ও বর্তমানের তিনজন বিদগ্ধ মনীষীর কলমে ফিলিস্তিন ও তার অধিবাসীদের জানি নতুন করে!</p>', '2023-12-15', 1),
(2, 'ফিলিস্তিন সংকট', 300, '<p><strong>লেখক :</strong> মাওলানা আব্দুল গাফফার শাহপুরী</p><p><strong>বিষয় :</strong> ইসলামি গবেষণা, সমালোচনা ও প্রবন্ধফিলিস্তিনি</p><p>মুসলিমদের ওপর দখলদার ইহুদিদের নির্বিচারজুলুম-নির্যাতন এবং দখলদারদের বিরুদ্ধে ফিলিস্তিনি মুক্তিযোদ্ধাদেরএই প্রতিরোধযুদ্ধ নতুন কোনো ঘটনা নয়। এটা তো উসমানি খেলাফতেরপতন-পরবর্তী ফিলিস্তিনে ইহুদি অনুপ্রবেশের পরের প্রতিদিনের ঘটনা।ফিলিস্তিনিরা তো জন্ম থেকেই নিপীড়নের শিকার। তাই তো তারা আজন্মপ্রতিরোধযোদ্ধা।</p><p>এহেন পরিস্থিতিতে দিলের গভীর থেকে বারবার মনে হচ্ছিল সংক্ষিপ্ত তবে সারগর্ভ আলোচনাসমৃদ্ধ এমন একটি বই লিপিবদ্ধ হওয়া উচিত, যাতে থাকবে ফিলিস্তিনের সংক্ষিপ্ত ইতিহাস, ইহুদিদের ফিলিস্তিন দখল, তার ঐতিহাসিক প্রেক্ষাপট, ফিলিস্তিনে খ্রিষ্টানদের স্বার্থ, চলমান জুলুম-নিপীড়নে কুফরি বিশ্ব ও মুসলিমবিশ্বের ভূমিকা, ফিলিস্তিনি মুসলিমদের ভয়ংকর ভবিষ্যৎ ও আমাদের করণীয় সম্পর্কে। এই সকল বিষয় বিবেচনা করেই বক্ষ্যমাণ বইটি সাজানো হয়েছে।</p><p>সম্মানিত পাঠক! আসুন নিকট অতীত ও বর্তমানের তিনজন বিদগ্ধ মনীষীর কলমে ফিলিস্তিন ও তার অধিবাসীদের জানি নতুন করে!</p>', '2023-12-15', 1),
(3, 'আল-ওয়ালা ওয়াল বারা', 300, '<p><strong>লেখক :</strong> মাওলানা আব্দুল গাফফার শাহপুরী</p><p><strong>বিষয় :</strong> ইসলামি গবেষণা, সমালোচনা ও প্রবন্ধফিলিস্তিনি</p><p>মুসলিমদের ওপর দখলদার ইহুদিদের নির্বিচারজুলুম-নির্যাতন এবং দখলদারদের বিরুদ্ধে ফিলিস্তিনি মুক্তিযোদ্ধাদেরএই প্রতিরোধযুদ্ধ নতুন কোনো ঘটনা নয়। এটা তো উসমানি খেলাফতেরপতন-পরবর্তী ফিলিস্তিনে ইহুদি অনুপ্রবেশের পরের প্রতিদিনের ঘটনা।ফিলিস্তিনিরা তো জন্ম থেকেই নিপীড়নের শিকার। তাই তো তারা আজন্মপ্রতিরোধযোদ্ধা।</p><p>এহেন পরিস্থিতিতে দিলের গভীর থেকে বারবার মনে হচ্ছিল সংক্ষিপ্ত তবে সারগর্ভ আলোচনাসমৃদ্ধ এমন একটি বই লিপিবদ্ধ হওয়া উচিত, যাতে থাকবে ফিলিস্তিনের সংক্ষিপ্ত ইতিহাস, ইহুদিদের ফিলিস্তিন দখল, তার ঐতিহাসিক প্রেক্ষাপট, ফিলিস্তিনে খ্রিষ্টানদের স্বার্থ, চলমান জুলুম-নিপীড়নে কুফরি বিশ্ব ও মুসলিমবিশ্বের ভূমিকা, ফিলিস্তিনি মুসলিমদের ভয়ংকর ভবিষ্যৎ ও আমাদের করণীয় সম্পর্কে। এই সকল বিষয় বিবেচনা করেই বক্ষ্যমাণ বইটি সাজানো হয়েছে।</p><p>সম্মানিত পাঠক! আসুন নিকট অতীত ও বর্তমানের তিনজন বিদগ্ধ মনীষীর কলমে ফিলিস্তিন ও তার অধিবাসীদের জানি নতুন করে!</p>', '2023-12-15', 1),
(4, 'হে যুবক! জান্নাত তোমার প্রতীক্ষায়', 500, '<p><strong>লেখক :</strong> মাওলানা আব্দুল গাফফার শাহপুরী</p><p><strong>বিষয় :</strong> ইসলামি গবেষণা, সমালোচনা ও প্রবন্ধফিলিস্তিনি</p><p>মুসলিমদের ওপর দখলদার ইহুদিদের নির্বিচারজুলুম-নির্যাতন এবং দখলদারদের বিরুদ্ধে ফিলিস্তিনি মুক্তিযোদ্ধাদেরএই প্রতিরোধযুদ্ধ নতুন কোনো ঘটনা নয়। এটা তো উসমানি খেলাফতেরপতন-পরবর্তী ফিলিস্তিনে ইহুদি অনুপ্রবেশের পরের প্রতিদিনের ঘটনা।ফিলিস্তিনিরা তো জন্ম থেকেই নিপীড়নের শিকার। তাই তো তারা আজন্মপ্রতিরোধযোদ্ধা।</p><p>এহেন পরিস্থিতিতে দিলের গভীর থেকে বারবার মনে হচ্ছিল সংক্ষিপ্ত তবে সারগর্ভ আলোচনাসমৃদ্ধ এমন একটি বই লিপিবদ্ধ হওয়া উচিত, যাতে থাকবে ফিলিস্তিনের সংক্ষিপ্ত ইতিহাস, ইহুদিদের ফিলিস্তিন দখল, তার ঐতিহাসিক প্রেক্ষাপট, ফিলিস্তিনে খ্রিষ্টানদের স্বার্থ, চলমান জুলুম-নিপীড়নে কুফরি বিশ্ব ও মুসলিমবিশ্বের ভূমিকা, ফিলিস্তিনি মুসলিমদের ভয়ংকর ভবিষ্যৎ ও আমাদের করণীয় সম্পর্কে। এই সকল বিষয় বিবেচনা করেই বক্ষ্যমাণ বইটি সাজানো হয়েছে।</p><p>সম্মানিত পাঠক! আসুন নিকট অতীত ও বর্তমানের তিনজন বিদগ্ধ মনীষীর কলমে ফিলিস্তিন ও তার অধিবাসীদের জানি নতুন করে!</p>', '2023-12-15', 1),
(6, 'ঈমান ভঙ্গের কারণ', 200, '<p><strong>লেখক :</strong> মাওলানা আব্দুল গাফফার শাহপুরী</p><p><strong>বিষয় :</strong> ইসলামি গবেষণা, সমালোচনা ও প্রবন্ধফিলিস্তিনি</p><p>মুসলিমদের ওপর দখলদার ইহুদিদের নির্বিচারজুলুম-নির্যাতন এবং দখলদারদের বিরুদ্ধে ফিলিস্তিনি মুক্তিযোদ্ধাদেরএই প্রতিরোধযুদ্ধ নতুন কোনো ঘটনা নয়। এটা তো উসমানি খেলাফতেরপতন-পরবর্তী ফিলিস্তিনে ইহুদি অনুপ্রবেশের পরের প্রতিদিনের ঘটনা।ফিলিস্তিনিরা তো জন্ম থেকেই নিপীড়নের শিকার। তাই তো তারা আজন্মপ্রতিরোধযোদ্ধা।</p><p>এহেন পরিস্থিতিতে দিলের গভীর থেকে বারবার মনে হচ্ছিল সংক্ষিপ্ত তবে সারগর্ভ আলোচনাসমৃদ্ধ এমন একটি বই লিপিবদ্ধ হওয়া উচিত, যাতে থাকবে ফিলিস্তিনের সংক্ষিপ্ত ইতিহাস, ইহুদিদের ফিলিস্তিন দখল, তার ঐতিহাসিক প্রেক্ষাপট, ফিলিস্তিনে খ্রিষ্টানদের স্বার্থ, চলমান জুলুম-নিপীড়নে কুফরি বিশ্ব ও মুসলিমবিশ্বের ভূমিকা, ফিলিস্তিনি মুসলিমদের ভয়ংকর ভবিষ্যৎ ও আমাদের করণীয় সম্পর্কে। এই সকল বিষয় বিবেচনা করেই বক্ষ্যমাণ বইটি সাজানো হয়েছে।</p><p>সম্মানিত পাঠক! আসুন নিকট অতীত ও বর্তমানের তিনজন বিদগ্ধ মনীষীর কলমে ফিলিস্তিন ও তার অধিবাসীদের জানি নতুন করে!</p>', '2023-12-19', 1),
(7, 'এসো ঈমান মেরামত করি', 340, '<p><strong>লেখক :</strong> মাওলানা আব্দুল গাফফার শাহপুরী</p><p><strong>বিষয় :</strong> ইসলামি গবেষণা, সমালোচনা ও প্রবন্ধফিলিস্তিনি</p><p>মুসলিমদের ওপর দখলদার ইহুদিদের নির্বিচারজুলুম-নির্যাতন এবং দখলদারদের বিরুদ্ধে ফিলিস্তিনি মুক্তিযোদ্ধাদেরএই প্রতিরোধযুদ্ধ নতুন কোনো ঘটনা নয়। এটা তো উসমানি খেলাফতেরপতন-পরবর্তী ফিলিস্তিনে ইহুদি অনুপ্রবেশের পরের প্রতিদিনের ঘটনা।ফিলিস্তিনিরা তো জন্ম থেকেই নিপীড়নের শিকার। তাই তো তারা আজন্মপ্রতিরোধযোদ্ধা।</p><p>এহেন পরিস্থিতিতে দিলের গভীর থেকে বারবার মনে হচ্ছিল সংক্ষিপ্ত তবে সারগর্ভ আলোচনাসমৃদ্ধ এমন একটি বই লিপিবদ্ধ হওয়া উচিত, যাতে থাকবে ফিলিস্তিনের সংক্ষিপ্ত ইতিহাস, ইহুদিদের ফিলিস্তিন দখল, তার ঐতিহাসিক প্রেক্ষাপট, ফিলিস্তিনে খ্রিষ্টানদের স্বার্থ, চলমান জুলুম-নিপীড়নে কুফরি বিশ্ব ও মুসলিমবিশ্বের ভূমিকা, ফিলিস্তিনি মুসলিমদের ভয়ংকর ভবিষ্যৎ ও আমাদের করণীয় সম্পর্কে। এই সকল বিষয় বিবেচনা করেই বক্ষ্যমাণ বইটি সাজানো হয়েছে।</p><p>সম্মানিত পাঠক! আসুন নিকট অতীত ও বর্তমানের তিনজন বিদগ্ধ মনীষীর কলমে ফিলিস্তিন ও তার অধিবাসীদের জানি নতুন করে!</p>', '2023-12-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books_image`
--

CREATE TABLE `books_image` (
  `id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumbnail` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_image`
--

INSERT INTO `books_image` (`id`, `books_id`, `image`, `thumbnail`) VALUES
(1, 2, '9bda3c20af8cbc7eb7ed8a47c0787cd9.jpg', 1),
(2, 3, '501ff712500cdc23294df1cd92ab350b.png', 1),
(3, 4, '64ef263447705bd254ab9609a0bbfe95.jpeg', 1),
(4, 1, 'c48fd18fc599c527d967822cdea36bd4.jpg', 1),
(5, 6, 'ad0c2c79d9c832944e7a5d54a769e606.jpg', 1),
(6, 7, 'ca6ad4231ad9c2ac0739640f93c8a407.jpg', 1),
(8, 1, '8869d0cd6a802f0fbc5556b4e77b2c5f.jpg', 0),
(9, 1, '3e9ff5e614ad445988d15163a4064aef.jpg', 0),
(10, 1, 'f2d0cf8dead93767aef16dd3bd6ff8b1.jpg', 0),
(11, 2, '8260ec8c9059fcbb2fc9623c6163f179.jpg', 0),
(12, 2, '137249e6169794eb3180df9ac9a592db.jpg', 0),
(13, 2, '0f2b9c00d94e6d03695d58f860d4ace0.jpg', 0),
(14, 3, 'f4f9be29aac21fe6e0eed87977084a22.jpg', 0),
(15, 3, '9d6af79e02c685125caa5f3e18e18efa.jpg', 0),
(16, 3, '8515577a080fd54a69540ea59d316c12.jpg', 0),
(17, 4, 'cc2983ffb55cd8df0fab2b4bb8fab76b.jpg', 0),
(18, 4, '9022ffbe79eb037ed03e0ec85d62d9e8.jpg', 0),
(19, 4, '38827bf8b38fcdc1d8856a0f9b47b742.jpg', 0),
(20, 6, 'e9e01cba80f4d504ceba9abc1739bd6a.jpg', 0),
(21, 6, '1070525b06b812779fa02e13e1c73f7e.jpg', 0),
(22, 6, '7ddfec470ef3a7b7d4d62d03cf9d6924.jpg', 0),
(23, 7, '20a5911f9cf2805886c803ca0a5d7d6b.jpg', 0),
(24, 7, 'a4fe6576c50145f068fe78408899ec7e.jpg', 0),
(25, 7, '1e1de9ca1cd68d96a2a190ef45ecdf49.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `telegram` varchar(15) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `iframe_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`id`, `address`, `email`, `phone`, `whatsapp`, `telegram`, `twitter`, `facebook`, `instagram`, `iframe_link`) VALUES
(1, 'Dewbog madrasa , Casara , Narayanganj , Bangladesh', 'nibras@mail.com', '01811180289', '01921041385', '01921041385', 'https://twitter.com', 'https://facebook.com', 'https://instagram.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29245.285523717197!2d90.5047864!3d23.6164989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b10812a520a3:0x6d3af4457bec4c90!2sNarayanganj!5e0!3m2!1sen!2sbd!4v1662255831694!5m2!1sen!2sbd');

-- --------------------------------------------------------

--
-- Table structure for table `favicon`
--

CREATE TABLE `favicon` (
  `id` int(11) NOT NULL,
  `favicon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favicon`
--

INSERT INTO `favicon` (`id`, `favicon`) VALUES
(1, '873adc339474e4971348036307ee27a5.png');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`) VALUES
(1, '352cb4f756e8aea2698a925f6ddd52ae.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `datetime`) VALUES
(1, 'Rashed alam', 'rashed@gmail.com', 'How can i help you', 'Please i am a web developer', 0, '2023-12-19 09:29:45'),
(2, 'Arfat is lam', 'arafat@gmail.com', 'Hello', 'Hello how are you', 0, '2023-12-19 09:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `books_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp_imo` varchar(11) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `datetime` varchar(40) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `books_id`, `name`, `phone`, `email`, `whatsapp_imo`, `address`, `datetime`, `status`) VALUES
(2, 2, 'Arafat islam', '01860491334', 'arafat@gmail.com', '01860491387', 'Narayanganj', '26/12/2023 - 05-09-15 PM', 0),
(3, 6, 'Raihan islam', '01921083234', 'raihan@gmail.com', '01921083214', 'Dhaka', '26/12/2023 - 05-16-21 PM', 0),
(4, 4, 'Mujahid islam', '01811180982', '', '', 'Jamalpur', '26/12/2023 - 05-17-47 PM', 0),
(5, 7, 'Afia islam', '015734562', 'afia@gmail.com', '015734562', 'Cadpur', '26/12/2023 - 05-25-37 PM', 0),
(7, 2, 'affan sekh', '01920138421', 'customer@gmail.com', '01920138421', 'Narayanganj , Bangladesh', '04/01/2024 - 10-41-52 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `data`) VALUES
(1, '<p><strong>Here is privacy policy .</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charge`
--

CREATE TABLE `shipping_charge` (
  `id` int(11) NOT NULL,
  `charge` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_charge`
--

INSERT INTO `shipping_charge` (`id`, `charge`) VALUES
(1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `data`) VALUES
(1, '<p><strong>Here is Terms &amp; Conditions.</strong></p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_image`
--
ALTER TABLE `books_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_id` (`books_id`);

--
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favicon`
--
ALTER TABLE `favicon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_id` (`books_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books_image`
--
ALTER TABLE `books_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favicon`
--
ALTER TABLE `favicon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_image`
--
ALTER TABLE `books_image`
  ADD CONSTRAINT `books_image_ibfk_1` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
