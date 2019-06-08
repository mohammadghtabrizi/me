-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 09:40 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `me`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

UPDATE `activity` SET `id` = 8,`users_id` = 15,`request_id` = 118,`status` = 'pending',`CREATED_AT` = '2019-03-15 08:18:28',`UPDATED_AT` = '2019-03-15 08:18:28' WHERE `activity`.`id` = 8;
UPDATE `activity` SET `id` = 9,`users_id` = 15,`request_id` = 119,`status` = 'pending',`CREATED_AT` = '2019-03-15 12:51:40',`UPDATED_AT` = '2019-03-15 12:51:40' WHERE `activity`.`id` = 9;
UPDATE `activity` SET `id` = 10,`users_id` = 16,`request_id` = 120,`status` = 'pending',`CREATED_AT` = '2019-03-16 16:24:01',`UPDATED_AT` = '2019-03-16 16:24:01' WHERE `activity`.`id` = 10;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `address` text COLLATE utf8_persian_ci,
  `password` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `pic` varchar(100) COLLATE utf8_persian_ci NOT NULL DEFAULT 'def.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admins`
--

UPDATE `admins` SET `id` = 1,`name` = 'محمد',`lastname` = 'قهرمان تبریزی',`email` = 'm@gmail.com',`username` = 'mohammadght',`mobile` = '09120924699',`address` = 'پاشاز سبلان',`password` = '$2y$10$i0K5hJBY769Eiglz4KAW..9el6kj6RuzEzANgZc64Yj1ghPQUd2z.',`remember_token` = NULL,`pic` = 'defadminmenpicture.png',`created_at` = '2019-03-01 16:39:20',`updated_at` = '2019-05-27 08:11:29' WHERE `admins`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `BC_NAME` varchar(255) NOT NULL,
  `BC_SUBCATEGORYID` int(11) NOT NULL,
  `BC_DISPLAYSTATUS` int(1) NOT NULL DEFAULT '0',
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_category`
--

UPDATE `blog_category` SET `id` = 1,`BC_NAME` = 'ماشین های اداری',`BC_SUBCATEGORYID` = 0,`BC_DISPLAYSTATUS` = 0,`CREATED_AT` = '2019-03-25 09:37:25',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_category`.`id` = 1;
UPDATE `blog_category` SET `id` = 3,`BC_NAME` = 'کامپیوتر',`BC_SUBCATEGORYID` = 0,`BC_DISPLAYSTATUS` = 0,`CREATED_AT` = '2019-03-25 09:37:54',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_category`.`id` = 3;
UPDATE `blog_category` SET `id` = 4,`BC_NAME` = 'لپ تاپ',`BC_SUBCATEGORYID` = 0,`BC_DISPLAYSTATUS` = 0,`CREATED_AT` = '2019-03-25 09:38:03',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_category`.`id` = 4;
UPDATE `blog_category` SET `id` = 5,`BC_NAME` = 'موبایل',`BC_SUBCATEGORYID` = 0,`BC_DISPLAYSTATUS` = 0,`CREATED_AT` = '2019-03-25 09:38:09',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_category`.`id` = 5;
UPDATE `blog_category` SET `id` = 6,`BC_NAME` = 'شبکه',`BC_SUBCATEGORYID` = 0,`BC_DISPLAYSTATUS` = 0,`CREATED_AT` = '2019-03-25 09:38:15',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_category`.`id` = 6;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `idcomment` int(11) NOT NULL,
  `BC_COMMENT` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `BC_ANSWERCOMMENTID` int(11) NOT NULL DEFAULT '0',
  `BC_USERID` int(11) NOT NULL,
  `BC_POSTID` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `blog_comment`
--

UPDATE `blog_comment` SET `idcomment` = 1,`BC_COMMENT` = 'عالی بود',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 17,`BC_POSTID` = 1,`CREATED_AT` = '2019-03-25 12:49:05',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_comment`.`idcomment` = 1;
UPDATE `blog_comment` SET `idcomment` = 2,`BC_COMMENT` = 'بد بود',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 17,`BC_POSTID` = 1,`CREATED_AT` = '2019-03-25 12:49:08',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_comment`.`idcomment` = 2;
UPDATE `blog_comment` SET `idcomment` = 3,`BC_COMMENT` = 'متوسط بود',`BC_ANSWERCOMMENTID` = 17,`BC_USERID` = 17,`BC_POSTID` = 1,`CREATED_AT` = '2019-03-25 12:49:39',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_comment`.`idcomment` = 3;
UPDATE `blog_comment` SET `idcomment` = 4,`BC_COMMENT` = 'سالم بود',`BC_ANSWERCOMMENTID` = 17,`BC_USERID` = 17,`BC_POSTID` = 1,`CREATED_AT` = '2019-03-25 12:49:42',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_comment`.`idcomment` = 4;
UPDATE `blog_comment` SET `idcomment` = 5,`BC_COMMENT` = 'مخالف بودم',`BC_ANSWERCOMMENTID` = 17,`BC_USERID` = 17,`BC_POSTID` = 1,`CREATED_AT` = '2019-03-25 12:49:44',`UPDATED_AT` = '0000-00-00 00:00:00' WHERE `blog_comment`.`idcomment` = 5;
UPDATE `blog_comment` SET `idcomment` = 6,`BC_COMMENT` = 'متن وبلاگ عالی بود',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 18,`BC_POSTID` = 2,`CREATED_AT` = '2019-03-26 07:57:06',`UPDATED_AT` = '2019-03-26 07:57:06' WHERE `blog_comment`.`idcomment` = 6;
UPDATE `blog_comment` SET `idcomment` = 7,`BC_COMMENT` = 'متن وبلاگ عالی بود',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 18,`BC_POSTID` = 2,`CREATED_AT` = '2019-03-26 07:57:48',`UPDATED_AT` = '2019-03-26 07:57:48' WHERE `blog_comment`.`idcomment` = 7;
UPDATE `blog_comment` SET `idcomment` = 8,`BC_COMMENT` = 'j',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 18,`BC_POSTID` = 2,`CREATED_AT` = '2019-03-26 09:38:51',`UPDATED_AT` = '2019-03-26 09:38:51' WHERE `blog_comment`.`idcomment` = 8;
UPDATE `blog_comment` SET `idcomment` = 9,`BC_COMMENT` = 'س',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 18,`BC_POSTID` = 2,`CREATED_AT` = '2019-03-26 09:38:58',`UPDATED_AT` = '2019-03-26 09:38:58' WHERE `blog_comment`.`idcomment` = 9;
UPDATE `blog_comment` SET `idcomment` = 10,`BC_COMMENT` = 'بلاگ مطلب مناسب دارد',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 18,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-26 09:40:09',`UPDATED_AT` = '2019-03-26 09:40:09' WHERE `blog_comment`.`idcomment` = 10;
UPDATE `blog_comment` SET `idcomment` = 11,`BC_COMMENT` = 'بلاگ مطلب مناسب دارد',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 18,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-26 09:40:16',`UPDATED_AT` = '2019-03-26 09:40:16' WHERE `blog_comment`.`idcomment` = 11;
UPDATE `blog_comment` SET `idcomment` = 12,`BC_COMMENT` = 'بلاگ مطلب مناسب دارد',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 18,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-26 09:40:25',`UPDATED_AT` = '2019-03-26 09:40:25' WHERE `blog_comment`.`idcomment` = 12;
UPDATE `blog_comment` SET `idcomment` = 13,`BC_COMMENT` = 'مخالفم',`BC_ANSWERCOMMENTID` = 11,`BC_USERID` = 18,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-26 12:23:48',`UPDATED_AT` = '2019-03-26 12:23:48' WHERE `blog_comment`.`idcomment` = 13;
UPDATE `blog_comment` SET `idcomment` = 14,`BC_COMMENT` = 'موافقم',`BC_ANSWERCOMMENTID` = 11,`BC_USERID` = 18,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-26 12:24:31',`UPDATED_AT` = '2019-03-26 12:24:31' WHERE `blog_comment`.`idcomment` = 14;
UPDATE `blog_comment` SET `idcomment` = 15,`BC_COMMENT` = 'نمیدونم',`BC_ANSWERCOMMENTID` = 11,`BC_USERID` = 18,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-26 12:24:50',`UPDATED_AT` = '2019-03-26 12:24:50' WHERE `blog_comment`.`idcomment` = 15;
UPDATE `blog_comment` SET `idcomment` = 16,`BC_COMMENT` = 'مطلب بسیار \r\n\r\nمناسب بوده برای همین من موافقم',`BC_ANSWERCOMMENTID` = 10,`BC_USERID` = 18,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-26 12:27:03',`UPDATED_AT` = '2019-03-26 12:27:03' WHERE `blog_comment`.`idcomment` = 16;
UPDATE `blog_comment` SET `idcomment` = 17,`BC_COMMENT` = 'عالی بود',`BC_ANSWERCOMMENTID` = 7,`BC_USERID` = 18,`BC_POSTID` = 2,`CREATED_AT` = '2019-03-26 13:06:33',`UPDATED_AT` = '2019-03-26 13:06:33' WHERE `blog_comment`.`idcomment` = 17;
UPDATE `blog_comment` SET `idcomment` = 18,`BC_COMMENT` = 'سگ تو روحت حسن باد',`BC_ANSWERCOMMENTID` = 9,`BC_USERID` = 19,`BC_POSTID` = 2,`CREATED_AT` = '2019-03-27 10:35:31',`UPDATED_AT` = '2019-03-27 10:35:31' WHERE `blog_comment`.`idcomment` = 18;
UPDATE `blog_comment` SET `idcomment` = 19,`BC_COMMENT` = 'سلام\r\nبکنیبایهبیخهخیبهبه',`BC_ANSWERCOMMENTID` = 10,`BC_USERID` = 19,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-27 10:42:08',`UPDATED_AT` = '2019-03-27 10:42:08' WHERE `blog_comment`.`idcomment` = 19;
UPDATE `blog_comment` SET `idcomment` = 20,`BC_COMMENT` = 'سکمبنتشسگبی\r\nکمیتلکیبام',`BC_ANSWERCOMMENTID` = 10,`BC_USERID` = 19,`BC_POSTID` = 3,`CREATED_AT` = '2019-03-27 10:44:11',`UPDATED_AT` = '2019-03-27 10:44:11' WHERE `blog_comment`.`idcomment` = 20;
UPDATE `blog_comment` SET `idcomment` = 21,`BC_COMMENT` = 'سلام.متن خوبی بود',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 20,`BC_POSTID` = 5,`CREATED_AT` = '2019-03-28 09:42:42',`UPDATED_AT` = '2019-03-28 09:42:42' WHERE `blog_comment`.`idcomment` = 21;
UPDATE `blog_comment` SET `idcomment` = 22,`BC_COMMENT` = 'به تو چه آخه.تو چی می فهمی',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 20,`BC_POSTID` = 5,`CREATED_AT` = '2019-03-28 09:43:02',`UPDATED_AT` = '2019-03-28 09:43:02' WHERE `blog_comment`.`idcomment` = 22;
UPDATE `blog_comment` SET `idcomment` = 23,`BC_COMMENT` = 'تو برو گاوتو بچرون',`BC_ANSWERCOMMENTID` = 0,`BC_USERID` = 20,`BC_POSTID` = 5,`CREATED_AT` = '2019-03-28 09:43:19',`UPDATED_AT` = '2019-03-28 09:43:19' WHERE `blog_comment`.`idcomment` = 23;
UPDATE `blog_comment` SET `idcomment` = 24,`BC_COMMENT` = 'خیلی ممنون',`BC_ANSWERCOMMENTID` = 21,`BC_USERID` = 20,`BC_POSTID` = 5,`CREATED_AT` = '2019-03-28 09:44:09',`UPDATED_AT` = '2019-03-28 09:44:09' WHERE `blog_comment`.`idcomment` = 24;
UPDATE `blog_comment` SET `idcomment` = 25,`BC_COMMENT` = 'برو بابا',`BC_ANSWERCOMMENTID` = 21,`BC_USERID` = 20,`BC_POSTID` = 5,`CREATED_AT` = '2019-03-28 09:45:06',`UPDATED_AT` = '2019-03-28 09:45:06' WHERE `blog_comment`.`idcomment` = 25;

-- --------------------------------------------------------

--
-- Table structure for table `blog_files`
--

CREATE TABLE `blog_files` (
  `id` int(11) NOT NULL,
  `bf_idpost` int(11) NOT NULL,
  `bf_source` varchar(255) NOT NULL,
  `bf_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_files`
--

UPDATE `blog_files` SET `id` = 1,`bf_idpost` = 1,`bf_source` = 'test.jpg',`bf_default` = 1,`created_at` = '2019-01-09 15:56:33',`updated_at` = '0000-00-00 00:00:00' WHERE `blog_files`.`id` = 1;
UPDATE `blog_files` SET `id` = 2,`bf_idpost` = 2,`bf_source` = 'test2.jpg',`bf_default` = 1,`created_at` = '2019-01-09 15:56:33',`updated_at` = '0000-00-00 00:00:00' WHERE `blog_files`.`id` = 2;
UPDATE `blog_files` SET `id` = 3,`bf_idpost` = 3,`bf_source` = 'test.jpg',`bf_default` = 1,`created_at` = '2019-01-15 15:35:24',`updated_at` = '0000-00-00 00:00:00' WHERE `blog_files`.`id` = 3;
UPDATE `blog_files` SET `id` = 4,`bf_idpost` = 4,`bf_source` = 'test2.jpg',`bf_default` = 1,`created_at` = '2019-01-15 15:35:24',`updated_at` = '0000-00-00 00:00:00' WHERE `blog_files`.`id` = 4;
UPDATE `blog_files` SET `id` = 5,`bf_idpost` = 5,`bf_source` = 'test.jpg',`bf_default` = 1,`created_at` = '2019-01-15 15:35:34',`updated_at` = '0000-00-00 00:00:00' WHERE `blog_files`.`id` = 5;
UPDATE `blog_files` SET `id` = 6,`bf_idpost` = 1,`bf_source` = 'test.jpg',`bf_default` = 0,`created_at` = '2019-01-09 15:56:33',`updated_at` = '0000-00-00 00:00:00' WHERE `blog_files`.`id` = 6;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `BP_TITLE` varchar(255) NOT NULL,
  `BP_DESS` varchar(255) NOT NULL,
  `BP_DESL` text,
  `BP_USERID` int(11) NOT NULL,
  `BP_CATID` int(11) NOT NULL,
  `BP_BESTPOST` int(11) NOT NULL,
  `BP_VIEWED` int(11) NOT NULL,
  `BP_DISPLAYSTATUS` int(1) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

UPDATE `blog_post` SET `id` = 1,`BP_TITLE` = 'مطلب1 ',`BP_DESS` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. ک',`BP_DESL` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',`BP_USERID` = 17,`BP_CATID` = 5,`BP_BESTPOST` = 1,`BP_VIEWED` = 370,`BP_DISPLAYSTATUS` = 2,`CREATED_AT` = '2019-01-09 00:00:00',`UPDATED_AT` = '2019-06-07 18:41:41' WHERE `blog_post`.`id` = 1;
UPDATE `blog_post` SET `id` = 2,`BP_TITLE` = 'مطلب 2',`BP_DESS` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. ک',`BP_DESL` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',`BP_USERID` = 17,`BP_CATID` = 3,`BP_BESTPOST` = 1,`BP_VIEWED` = 182,`BP_DISPLAYSTATUS` = 2,`CREATED_AT` = '2019-01-16 00:00:00',`UPDATED_AT` = '2019-06-07 18:38:32' WHERE `blog_post`.`id` = 2;
UPDATE `blog_post` SET `id` = 3,`BP_TITLE` = 'مطلب 3',`BP_DESS` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. ک',`BP_DESL` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',`BP_USERID` = 17,`BP_CATID` = 4,`BP_BESTPOST` = 1,`BP_VIEWED` = 113,`BP_DISPLAYSTATUS` = 2,`CREATED_AT` = '2019-01-16 00:00:00',`UPDATED_AT` = '2019-06-07 18:39:02' WHERE `blog_post`.`id` = 3;
UPDATE `blog_post` SET `id` = 4,`BP_TITLE` = 'مطلب 4',`BP_DESS` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. ک',`BP_DESL` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',`BP_USERID` = 17,`BP_CATID` = 6,`BP_BESTPOST` = 1,`BP_VIEWED` = 37,`BP_DISPLAYSTATUS` = 2,`CREATED_AT` = '2019-01-16 00:00:00',`UPDATED_AT` = '2019-06-07 18:39:06' WHERE `blog_post`.`id` = 4;
UPDATE `blog_post` SET `id` = 5,`BP_TITLE` = 'مطلب 5',`BP_DESS` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. ک',`BP_DESL` = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.\r\n\r\nلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',`BP_USERID` = 17,`BP_CATID` = 1,`BP_BESTPOST` = 0,`BP_VIEWED` = 49,`BP_DISPLAYSTATUS` = 0,`CREATED_AT` = '2019-01-16 00:00:00',`UPDATED_AT` = '2019-06-07 19:08:43' WHERE `blog_post`.`id` = 5;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tag`
--

CREATE TABLE `blog_post_tag` (
  `id` int(11) NOT NULL,
  `btc_postid` int(11) NOT NULL,
  `btc_tagid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_tag`
--

UPDATE `blog_post_tag` SET `id` = 1,`btc_postid` = 1,`btc_tagid` = 1,`created_at` = '2019-01-09 16:15:04',`updated_at` = '2019-01-09 16:15:04' WHERE `blog_post_tag`.`id` = 1;
UPDATE `blog_post_tag` SET `id` = 2,`btc_postid` = 1,`btc_tagid` = 2,`created_at` = '2019-01-09 16:15:04',`updated_at` = '2019-01-09 16:15:04' WHERE `blog_post_tag`.`id` = 2;
UPDATE `blog_post_tag` SET `id` = 3,`btc_postid` = 2,`btc_tagid` = 3,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 3;
UPDATE `blog_post_tag` SET `id` = 4,`btc_postid` = 2,`btc_tagid` = 2,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 4;
UPDATE `blog_post_tag` SET `id` = 5,`btc_postid` = 3,`btc_tagid` = 1,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 5;
UPDATE `blog_post_tag` SET `id` = 6,`btc_postid` = 3,`btc_tagid` = 2,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 6;
UPDATE `blog_post_tag` SET `id` = 7,`btc_postid` = 4,`btc_tagid` = 3,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 7;
UPDATE `blog_post_tag` SET `id` = 8,`btc_postid` = 4,`btc_tagid` = 4,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 8;
UPDATE `blog_post_tag` SET `id` = 9,`btc_postid` = 5,`btc_tagid` = 1,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 9;
UPDATE `blog_post_tag` SET `id` = 10,`btc_postid` = 5,`btc_tagid` = 2,`created_at` = '2019-01-23 16:28:27',`updated_at` = '2019-01-23 16:28:27' WHERE `blog_post_tag`.`id` = 10;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` int(11) NOT NULL,
  `BT_VALUE` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_tag`
--

UPDATE `blog_tag` SET `id` = 1,`BT_VALUE` = 'پرینتر',`created_at` = '2018-12-29 16:51:51',`updated_at` = NULL WHERE `blog_tag`.`id` = 1;
UPDATE `blog_tag` SET `id` = 2,`BT_VALUE` = 'شارژ کارتریج',`created_at` = '2018-12-29 16:51:51',`updated_at` = NULL WHERE `blog_tag`.`id` = 2;
UPDATE `blog_tag` SET `id` = 3,`BT_VALUE` = 'تعمیرات لپ تاپ',`created_at` = '2018-12-29 16:51:51',`updated_at` = NULL WHERE `blog_tag`.`id` = 3;
UPDATE `blog_tag` SET `id` = 4,`BT_VALUE` = 'کامپیوتر',`created_at` = '2018-12-29 16:51:51',`updated_at` = NULL WHERE `blog_tag`.`id` = 4;

-- --------------------------------------------------------

--
-- Table structure for table `header_title`
--

CREATE TABLE `header_title` (
  `id` int(11) NOT NULL,
  `namepage` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `meta_descripyion` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_persian_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `me_request`
--

CREATE TABLE `me_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `typerequest` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `daterequest` varchar(255) DEFAULT NULL,
  `timerequest` varchar(255) DEFAULT NULL,
  `address` text,
  `requestid` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `userid` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `me_request`
--

UPDATE `me_request` SET `id` = 119,`name` = 'سعید',`lastname` = 'اکرمی',`mobile` = '09141083645',`typerequest` = '2',`city` = '2',`daterequest` = '1397-12-25 16:21:40',`timerequest` = '2',`address` = NULL,`requestid` = 'RQE01119',`status` = '1',`userid` = 0,`created_at` = '2019-03-15 12:51:40',`updated_at` = '2019-03-15 12:51:40' WHERE `me_request`.`id` = 119;
UPDATE `me_request` SET `id` = 121,`name` = 'محمد',`lastname` = 'تبریزی',`mobile` = '09120332533',`typerequest` = '1',`city` = '1',`daterequest` = '1397-12-26 20:29:14',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01121',`status` = 'pending',`userid` = 17,`created_at` = '2019-03-16 16:59:14',`updated_at` = '2019-03-16 16:59:14' WHERE `me_request`.`id` = 121;
UPDATE `me_request` SET `id` = 122,`name` = 'محمد',`lastname` = 'تبریزی',`mobile` = '09120332533',`typerequest` = '1',`city` = '1',`daterequest` = '1397-12-26 20:29:14',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01121',`status` = 'pending',`userid` = 17,`created_at` = '2019-03-16 16:59:14',`updated_at` = '2019-03-16 16:59:14' WHERE `me_request`.`id` = 122;
UPDATE `me_request` SET `id` = 123,`name` = 'محمد',`lastname` = 'تبریزی',`mobile` = '09121234123',`typerequest` = '1',`city` = '1',`daterequest` = '1397-12-27 20:35:23',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01123',`status` = 'pending',`userid` = 18,`created_at` = '2019-03-16 17:05:23',`updated_at` = '2019-03-16 17:05:23' WHERE `me_request`.`id` = 123;
UPDATE `me_request` SET `id` = 124,`name` = 'محمد',`lastname` = 'تبریزی',`mobile` = '09121234123',`typerequest` = '1',`city` = '1',`daterequest` = '1397-12-27 20:35:23',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01123',`status` = 'pending',`userid` = 18,`created_at` = '2019-03-16 17:05:23',`updated_at` = '2019-03-16 17:05:23' WHERE `me_request`.`id` = 124;
UPDATE `me_request` SET `id` = 127,`name` = 'مرتضی',`lastname` = 'علیپور',`mobile` = '09148983292',`typerequest` = '1',`city` = '1',`daterequest` = '1398-01-09 15:37:05',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01127',`status` = 'pending',`userid` = 20,`created_at` = '2019-03-28 11:07:05',`updated_at` = '2019-03-28 11:07:05' WHERE `me_request`.`id` = 127;
UPDATE `me_request` SET `id` = 138,`name` = 'محمد',`lastname` = 'تبریزی',`mobile` = '09120924699',`typerequest` = '1',`city` = '2',`daterequest` = '1398-01-12 21:12:26',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01138',`status` = 'pending',`userid` = 21,`created_at` = '2019-03-31 16:42:26',`updated_at` = '2019-03-31 16:42:26' WHERE `me_request`.`id` = 138;
UPDATE `me_request` SET `id` = 139,`name` = 'حسن',`lastname` = 'همتی تیرآبادی',`mobile` = '09146660041',`typerequest` = '3',`city` = '2',`daterequest` = '1398-01-12 21:17:49',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01139',`status` = 'pending',`userid` = 22,`created_at` = '2019-03-31 16:47:49',`updated_at` = '2019-03-31 16:47:49' WHERE `me_request`.`id` = 139;
UPDATE `me_request` SET `id` = 140,`name` = 'یوسف',`lastname` = 'شهیدی',`mobile` = '09123196578',`typerequest` = '2',`city` = '2',`daterequest` = '1398-01-13 14:08:22',`timerequest` = '1',`address` = 'پاساژ سبلان',`requestid` = 'RQE01140',`status` = 'pending',`userid` = 23,`created_at` = '2019-04-01 09:38:22',`updated_at` = '2019-04-01 09:38:22' WHERE `me_request`.`id` = 140;
UPDATE `me_request` SET `id` = 141,`name` = 'مرتضی',`lastname` = 'علیپور',`mobile` = '09374035603',`typerequest` = '1',`city` = '1',`daterequest` = '1398-01-30 15:34:53',`timerequest` = '1',`address` = NULL,`requestid` = 'RQE01141',`status` = 'pending',`userid` = 16,`created_at` = '2019-04-18 11:04:53',`updated_at` = '2019-04-18 11:04:53' WHERE `me_request`.`id` = 141;

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

UPDATE `migrations` SET `id` = 1,`migration` = '2018_12_10_194000_create_smsirlaravel_log_table',`batch` = 1 WHERE `migrations`.`id` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `newsletters`
--

UPDATE `newsletters` SET `id` = 2,`email` = 'test@tes.ir',`CREATED_AT` = '2019-03-28 08:47:24',`UPDATED_AT` = '2019-03-28 08:47:24' WHERE `newsletters`.`id` = 2;
UPDATE `newsletters` SET `id` = 3,`email` = 'mortazaalipoor99@gmail.com',`CREATED_AT` = '2019-03-28 09:39:01',`UPDATED_AT` = '2019-03-28 09:39:01' WHERE `newsletters`.`id` = 3;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smsirlaravel_logs`
--

CREATE TABLE `smsirlaravel_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `response` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smsirlaravel_logs`
--

UPDATE `smsirlaravel_logs` SET `id` = 1,`from` = NULL,`to` = '09374035603',`message` = 'test1',`status` = 0,`response` = ' سامانه پیامکی شما تایید نشده است',`created_at` = '2019-03-28 11:07:06',`updated_at` = '2019-03-28 11:07:06' WHERE `smsirlaravel_logs`.`id` = 1;
UPDATE `smsirlaravel_logs` SET `id` = 2,`from` = NULL,`to` = '09120924699',`message` = 'test2',`status` = 0,`response` = ' سامانه پیامکی شما تایید نشده است',`created_at` = '2019-03-28 11:07:06',`updated_at` = '2019-03-28 11:07:06' WHERE `smsirlaravel_logs`.`id` = 2;
UPDATE `smsirlaravel_logs` SET `id` = 3,`from` = '30004747470459',`to` = '09120924699',`message` = 'test1',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:18:32',`updated_at` = '2019-03-31 15:18:32' WHERE `smsirlaravel_logs`.`id` = 3;
UPDATE `smsirlaravel_logs` SET `id` = 4,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سافمانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:18:32',`updated_at` = '2019-03-31 15:18:32' WHERE `smsirlaravel_logs`.`id` = 4;
UPDATE `smsirlaravel_logs` SET `id` = 5,`from` = '30004747470459',`to` = '09120924699',`message` = 'test1',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:27:52',`updated_at` = '2019-03-31 15:27:52' WHERE `smsirlaravel_logs`.`id` = 5;
UPDATE `smsirlaravel_logs` SET `id` = 6,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سافمانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:27:52',`updated_at` = '2019-03-31 15:27:52' WHERE `smsirlaravel_logs`.`id` = 6;
UPDATE `smsirlaravel_logs` SET `id` = 7,`from` = '30004747470459',`to` = '09120924699',`message` = 'مشترک عزیز با سلام  درخواست شما با موفقیت ثبت گردید',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:32:53',`updated_at` = '2019-03-31 15:32:53' WHERE `smsirlaravel_logs`.`id` = 7;
UPDATE `smsirlaravel_logs` SET `id` = 8,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سافمانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:32:53',`updated_at` = '2019-03-31 15:32:53' WHERE `smsirlaravel_logs`.`id` = 8;
UPDATE `smsirlaravel_logs` SET `id` = 9,`from` = '30004747470459',`to` = '09120924699',`message` = 'مشترک عزیز با سلام \\r درخواست شما با موفقیت ثبت گردید',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:43:55',`updated_at` = '2019-03-31 15:43:55' WHERE `smsirlaravel_logs`.`id` = 9;
UPDATE `smsirlaravel_logs` SET `id` = 10,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سافمانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:43:55',`updated_at` = '2019-03-31 15:43:55' WHERE `smsirlaravel_logs`.`id` = 10;
UPDATE `smsirlaravel_logs` SET `id` = 11,`from` = '30004747470459',`to` = '09120924699',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09120924699و رمز عبور شما :PAEI133',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:59:19',`updated_at` = '2019-03-31 15:59:19' WHERE `smsirlaravel_logs`.`id` = 11;
UPDATE `smsirlaravel_logs` SET `id` = 12,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 15:59:19',`updated_at` = '2019-03-31 15:59:19' WHERE `smsirlaravel_logs`.`id` = 12;
UPDATE `smsirlaravel_logs` SET `id` = 13,`from` = '30004747470459',`to` = '09120924699',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09120924699و رمز عبور شما :PAEI134',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:01:59',`updated_at` = '2019-03-31 16:01:59' WHERE `smsirlaravel_logs`.`id` = 13;
UPDATE `smsirlaravel_logs` SET `id` = 14,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:01:59',`updated_at` = '2019-03-31 16:01:59' WHERE `smsirlaravel_logs`.`id` = 14;
UPDATE `smsirlaravel_logs` SET `id` = 15,`from` = '30004747470459',`to` = '09120924699',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09120924699و رمز عبور شما :PAEI136',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:08:42',`updated_at` = '2019-03-31 16:08:42' WHERE `smsirlaravel_logs`.`id` = 15;
UPDATE `smsirlaravel_logs` SET `id` = 16,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:08:42',`updated_at` = '2019-03-31 16:08:42' WHERE `smsirlaravel_logs`.`id` = 16;
UPDATE `smsirlaravel_logs` SET `id` = 17,`from` = '30004747470459',`to` = '09120924699',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09120924699و رمز عبور شما :PAEI137',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:10:10',`updated_at` = '2019-03-31 16:10:10' WHERE `smsirlaravel_logs`.`id` = 17;
UPDATE `smsirlaravel_logs` SET `id` = 18,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:10:10',`updated_at` = '2019-03-31 16:10:10' WHERE `smsirlaravel_logs`.`id` = 18;
UPDATE `smsirlaravel_logs` SET `id` = 19,`from` = '30004747470459',`to` = '09120924699',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09120924699و رمز عبور شما :PAEI138شما می توانید با ورود به حساب کاربری خود از وضعیت درخواست خود مطلع شوید',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:42:34',`updated_at` = '2019-03-31 16:42:34' WHERE `smsirlaravel_logs`.`id` = 19;
UPDATE `smsirlaravel_logs` SET `id` = 20,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:42:34',`updated_at` = '2019-03-31 16:42:34' WHERE `smsirlaravel_logs`.`id` = 20;
UPDATE `smsirlaravel_logs` SET `id` = 21,`from` = '30004747470459',`to` = '09120924699',`message` = 'محمدتبریزیعزیزبه باشگاه مشتریان امداد آی تی خوش آمدید جهت استفاده از امکانت و تخفیفات ویژه به حساب کاربری خود در وب سایت ما مراجعه کنیدhttp://emdadit.com',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:42:36',`updated_at` = '2019-03-31 16:42:36' WHERE `smsirlaravel_logs`.`id` = 21;
UPDATE `smsirlaravel_logs` SET `id` = 22,`from` = '30004747470459',`to` = '09146660041',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09146660041و رمز عبور شما :PAEI139شما می توانید با ورود به حساب کاربری خود از وضعیت درخواست خود مطلع شوید',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:47:51',`updated_at` = '2019-03-31 16:47:51' WHERE `smsirlaravel_logs`.`id` = 22;
UPDATE `smsirlaravel_logs` SET `id` = 23,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:47:51',`updated_at` = '2019-03-31 16:47:51' WHERE `smsirlaravel_logs`.`id` = 23;
UPDATE `smsirlaravel_logs` SET `id` = 24,`from` = '30004747470459',`to` = '09146660041',`message` = 'حسن همتی تیرآبادی عزیزبه باشگاه مشتریان امداد آی تی خوش آمدید جهت استفاده از امکانت و تخفیفات ویژه به حساب کاربری خود در وب سایت ما مراجعه کنیدhttp://emdadit.com',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-03-31 16:47:53',`updated_at` = '2019-03-31 16:47:53' WHERE `smsirlaravel_logs`.`id` = 24;
UPDATE `smsirlaravel_logs` SET `id` = 25,`from` = '30004747470459',`to` = '09123196578',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09123196578و رمز عبور شما :PAEI140شما می توانید با ورود به حساب کاربری خود از وضعیت درخواست خود مطلع شوید',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-04-01 09:38:26',`updated_at` = '2019-04-01 09:38:26' WHERE `smsirlaravel_logs`.`id` = 25;
UPDATE `smsirlaravel_logs` SET `id` = 26,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-04-01 09:38:26',`updated_at` = '2019-04-01 09:38:26' WHERE `smsirlaravel_logs`.`id` = 26;
UPDATE `smsirlaravel_logs` SET `id` = 27,`from` = '30004747470459',`to` = '09123196578',`message` = 'یوسف شهیدی عزیزبه باشگاه مشتریان امداد آی تی خوش آمدید جهت استفاده از امکانت و تخفیفات ویژه به حساب کاربری خود در وب سایت ما مراجعه کنیدhttp://emdadit.com',`status` = 1,`response` = 'ارسال با موفقیت انجام گردید',`created_at` = '2019-04-01 09:38:31',`updated_at` = '2019-04-01 09:38:31' WHERE `smsirlaravel_logs`.`id` = 27;
UPDATE `smsirlaravel_logs` SET `id` = 28,`from` = '30004747470459',`to` = '09374035603',`message` = 'مشترک عزیز با سلام،درخواست شما با موفقیت ثبت گردیدنام کاربری :09374035603و رمز عبور شما :PAEI141شما می توانید با ورود به حساب کاربری خود از وضعیت درخواست خود مطلع شوید',`status` = 0,`response` = 'را در هدر درخواست ارسال کنید x-sms-ir-secure-token ',`created_at` = '2019-04-18 11:04:58',`updated_at` = '2019-04-18 11:04:58' WHERE `smsirlaravel_logs`.`id` = 28;
UPDATE `smsirlaravel_logs` SET `id` = 29,`from` = '30004747470459',`to` = '09120924699',`message` = 'درخواست جدیدی در سامانه ثبت شد.',`status` = 0,`response` = 'را در هدر درخواست ارسال کنید x-sms-ir-secure-token ',`created_at` = '2019-04-18 11:04:58',`updated_at` = '2019-04-18 11:04:58' WHERE `smsirlaravel_logs`.`id` = 29;
UPDATE `smsirlaravel_logs` SET `id` = 30,`from` = '30004747470459',`to` = '09374035603',`message` = 'مرتضی علیپور عزیزبه باشگاه مشتریان امداد آی تی خوش آمدید جهت استفاده از امکانت و تخفیفات ویژه به حساب کاربری خود در وب سایت ما مراجعه کنیدhttp://emdadit.com',`status` = 0,`response` = 'را در هدر درخواست ارسال کنید x-sms-ir-secure-token ',`created_at` = '2019-04-18 11:04:59',`updated_at` = '2019-04-18 11:04:59' WHERE `smsirlaravel_logs`.`id` = 30;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(11) NOT NULL,
  `points` int(10) DEFAULT '0',
  `newsletters` tinyint(1) NOT NULL DEFAULT '1',
  `nameplace` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postalcode` varchar(10) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userpicture` varchar(255) NOT NULL DEFAULT 'def.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

UPDATE `users` SET `id` = 14,`name` = 'محمد',`lastname` = 'تبریزی',`password` = '$2y$10$6NwEuvSCNiyuhAuC3bwmlOIOxWJecW2ih4MufxzfCyeBf71w42OO.',`email` = 'ms@gmail.com',`mobile` = '09120924690',`points` = 0,`newsletters` = 1,`nameplace` = '',`state` = '',`city` = '',`postalcode` = '',`address1` = '',`address2` = '',`CREATED_AT` = '2019-03-31 16:27:52',`remember_token` = NULL,`UPDATED_AT` = '2019-03-15 09:38:12',`userpicture` = 'def.png' WHERE `users`.`id` = 14;
UPDATE `users` SET `id` = 15,`name` = 'سعید',`lastname` = 'اکرمی',`password` = '$2y$10$aZyM45jaJ9Sjup4I9y50huCBBARU6PwpMgAuzffKJ.G3hfEWYt002',`email` = NULL,`mobile` = '09141083645',`points` = NULL,`newsletters` = 1,`nameplace` = '',`state` = '',`city` = '',`postalcode` = '',`address1` = '',`address2` = '',`CREATED_AT` = '2019-03-15 12:51:40',`remember_token` = NULL,`UPDATED_AT` = '2019-03-15 12:51:40',`userpicture` = 'def.png' WHERE `users`.`id` = 15;
UPDATE `users` SET `id` = 16,`name` = 'محمد',`lastname` = 'تبریزی',`password` = '$2y$10$bquGqrgc.MjQwqiXyh4v3uUITSPZu1RcN4gdfd6MWkA7uflhaYThK',`email` = NULL,`mobile` = '09374035603',`points` = NULL,`newsletters` = 1,`nameplace` = '',`state` = '',`city` = '',`postalcode` = '',`address1` = '',`address2` = '',`CREATED_AT` = '2019-03-16 16:24:01',`remember_token` = NULL,`UPDATED_AT` = '2019-03-16 16:24:01',`userpicture` = 'def.png' WHERE `users`.`id` = 16;
UPDATE `users` SET `id` = 17,`name` = 'محمد',`lastname` = 'تبریزی',`password` = '$2y$10$ZRwr07V4Ed7vJHcXfd13uOmk/Eabl3YAC3V1w1IqtuL9NfhWF2Gw2',`email` = NULL,`mobile` = '09120332533',`points` = 0,`newsletters` = 1,`nameplace` = '',`state` = '',`city` = '',`postalcode` = '',`address1` = '',`address2` = '',`CREATED_AT` = '2019-03-16 16:58:19',`remember_token` = NULL,`UPDATED_AT` = '2019-03-16 16:58:19',`userpicture` = 'def.png' WHERE `users`.`id` = 17;
UPDATE `users` SET `id` = 18,`name` = 'حسن',`lastname` = 'همتی تیرآبادی',`password` = '$2y$10$iD63jsZDFJtXGCR1FhheB.rGzTAdybqs9RxDASf4Aleyj2GplPZai',`email` = 'm@gmail.com',`mobile` = '09121234123',`points` = 0,`newsletters` = 0,`nameplace` = 'تحلیل',`state` = 'آذربایجان شرقی',`city` = 'تبریزی',`postalcode` = '1234567890',`address1` = 'خیابان امام خمینی پاشاز',`address2` = NULL,`CREATED_AT` = '2019-03-27 14:25:21',`remember_token` = '05kT7ffyMEc6ROSfiNyBICZE3qCyPba6iQd0soD0Hlk6j6Li7npO0Ev3UmyZ',`UPDATED_AT` = '2019-03-25 10:32:52',`userpicture` = 'def.png' WHERE `users`.`id` = 18;
UPDATE `users` SET `id` = 19,`name` = 'علی',`lastname` = 'تبریزی',`password` = '$2y$10$fnASxvSGqQ0nD.DaFC3O4OOoXm8lKWAfEdyY5k5RSxoY1f7dUbcHy',`email` = 'mohammad@gmail.com',`mobile` = '09120924698',`points` = 0,`newsletters` = 1,`nameplace` = NULL,`state` = NULL,`city` = NULL,`postalcode` = NULL,`address1` = NULL,`address2` = NULL,`CREATED_AT` = '2019-03-27 10:37:06',`remember_token` = 'rydUmKijIT06uXfGUrnrdekgFgM8TaBlz6xmB6E3y8rysRIPGOjUBoSsHfWD',`UPDATED_AT` = '2019-03-27 10:06:21',`userpicture` = 'def.png' WHERE `users`.`id` = 19;
UPDATE `users` SET `id` = 20,`name` = 'مرتضی',`lastname` = 'علیپور',`password` = '$2y$10$S7OPGmfoPBDeqkkd6KROde6kuWUGvU.DnTsOXWTflFNti.PDCNevW',`email` = NULL,`mobile` = '09148983292',`points` = 0,`newsletters` = 1,`nameplace` = NULL,`state` = NULL,`city` = NULL,`postalcode` = NULL,`address1` = NULL,`address2` = NULL,`CREATED_AT` = '2019-03-28 15:32:30',`remember_token` = '6qku6WCHfenq3jKKpZIPIFTgL6jJX2qtmJHrIdHd0KuihU2LgfxR7gjA8uVo',`UPDATED_AT` = '2019-03-28 15:32:30',`userpicture` = 'def.png' WHERE `users`.`id` = 20;
UPDATE `users` SET `id` = 21,`name` = 'محمد',`lastname` = 'تبریزی',`password` = '$2y$10$N4SvXi/e/SHGYQys8sSVb.tnvp8v6QgvZrgUIKZ7WKt9yB0HaxOmi',`email` = 'mohammad.gh.tabrizi@gmail.com',`mobile` = '09120924699',`points` = 0,`newsletters` = 1,`nameplace` = NULL,`state` = NULL,`city` = NULL,`postalcode` = NULL,`address1` = NULL,`address2` = NULL,`CREATED_AT` = '2019-03-31 16:44:29',`remember_token` = 'VIF2piRGUo0VZ9VYy7Lb5DubcbTt7zN57vdoqc2LdTfiYgpY1ZwpwVYGX1v3',`UPDATED_AT` = '2019-03-31 16:28:59',`userpicture` = 'def.png' WHERE `users`.`id` = 21;
UPDATE `users` SET `id` = 22,`name` = 'حسن',`lastname` = 'همتی تیرآبادی',`password` = '$2y$10$75ck1GZc/480416kyh7AduG3d95qRuahRdYgODCi2hKPWtNnxq5By',`email` = NULL,`mobile` = '09146660041',`points` = 0,`newsletters` = 1,`nameplace` = NULL,`state` = NULL,`city` = NULL,`postalcode` = NULL,`address1` = NULL,`address2` = NULL,`CREATED_AT` = '2019-03-31 16:47:49',`remember_token` = NULL,`UPDATED_AT` = '2019-03-31 16:47:49',`userpicture` = 'def.png' WHERE `users`.`id` = 22;
UPDATE `users` SET `id` = 23,`name` = 'یوسف',`lastname` = 'شهیدی',`password` = '$2y$10$B4T0fvogwa0M9kjnu2CD2OqTg3bSToDJ39EXgeFk54GXH//xxti.K',`email` = NULL,`mobile` = '09123196578',`points` = 0,`newsletters` = 1,`nameplace` = NULL,`state` = NULL,`city` = NULL,`postalcode` = NULL,`address1` = NULL,`address2` = NULL,`CREATED_AT` = '2019-04-01 13:18:49',`remember_token` = 'PqJiKH3nVBYVaptccODHQgFxjjWKhv0GKq5BgMgsBeMJgNeiGU2dkVFQyevM',`UPDATED_AT` = '2019-04-01 09:38:22',`userpicture` = 'def.png' WHERE `users`.`id` = 23;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `blog_files`
--
ALTER TABLE `blog_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_tag`
--
ALTER TABLE `blog_post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_title`
--
ALTER TABLE `header_title`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namepage` (`namepage`);

--
-- Indexes for table `me_request`
--
ALTER TABLE `me_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `smsirlaravel_logs`
--
ALTER TABLE `smsirlaravel_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blog_files`
--
ALTER TABLE `blog_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_post_tag`
--
ALTER TABLE `blog_post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `header_title`
--
ALTER TABLE `header_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_request`
--
ALTER TABLE `me_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smsirlaravel_logs`
--
ALTER TABLE `smsirlaravel_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
