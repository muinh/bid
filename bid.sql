-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2017 at 06:34 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.11-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bid.loc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` smallint(8) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `title`) VALUES
(1, 'concert', 'Концерти'),
(2, 'theater', 'Театри'),
(3, 'disco', 'Дискотеки'),
(4, 'movie', 'Кіно'),
(5, 'seminar', 'Семінари'),
(6, 'kids', 'Для дітей'),
(7, 'quest', 'Квести'),
(8, 'sports', 'Спорт');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `bid` int(11) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `category_id`, `title`, `description`, `image`, `date`, `place`, `city`, `price`, `bid`, `is_published`, `is_featured`) VALUES
(1, 6, 'Лига Смеха Финал', 'В новом сезоне комедийного шоу команды нашли своих наставников, с которыми выйдут на сцену. Вас будут развлекать 6 сборных: Стояновка (Молдова), Винницкие (Винница), Трио разные и ведущая (Киев), Крупа (Днепр), Де Ришелье (Одесса) и Минипанки (Украина). Смотрите вторую игру Чемпионата Украины по юмору 2017 онлайн на 1+1.', 'event2.jpg', '2017-09-08', 'МЦКИ', 'Киев', '170.00', 7, 1, 1),
(2, 3, 'Камера №138', 'Из Камеры №138 планировался побег, но заключенному не удалось осуществить задуманное, и он был казнен. Вы попадаете в эту камеру сразу после него. Получится ли у вас сбежать за 60 минут? Ведь только час ваши подельники смогут отвлекать охрану?', 'event1.jpg', '2017-10-01', 'Гидропарк', 'Киев', '100.00', 3, 1, 1),
(3, 1, 'Poets of the fall', 'Какой ассоциативный ряд возникает у вас в голове, когда вы слышите слово "осень"? Дождь, слякоть, опавшие листья, промокшие ботинки, меланхолия, задумчивые поглядывания в окно с едва сдавленным звуком "Эх...". Однако, у киевлян с осенью есть еще одна ассоциация - финская рок-группа Poets Of The Fall, которая в очередной раз заедет в столицу, чтобы сыграть хиты, которые слышал каждый школьник почти десять лет назад.Какой ассоциативный ряд возникает у вас в голове, когда вы слышите слово "осень"? Дождь, слякоть, опавшие листья, промокшие ботинки, меланхолия, задумчивые поглядывания в окно с едва сдавленным звуком "Эх...". Однако, у киевлян с осенью есть еще одна ассоциация - финская рок-группа Poets Of The Fall, которая в очередной раз заедет в столицу, чтобы сыграть хиты, которые слышал каждый школьник почти десять лет назад.Какой ассоциативный ряд возникает у вас в голове, когда вы слышите слово "осень"? Дождь, слякоть, опавшие листья, промокшие ботинки, меланхолия, задумчивые поглядывания в окно с едва сдавленным звуком "Эх...". Однако, у киевлян с осенью есть еще одна ассоциация - финская рок-группа Poets Of The Fall, которая в очередной раз заедет в столицу, чтобы сыграть хиты, которые слышал каждый школьник почти десять лет назад.', 'event3.jpg', '2017-11-01', 'Дворец Спорта', 'Киев', '350.00', 15, 1, 1),
(4, 2, 'Виталик', 'Представьте себе мужчину: уверенного, делового, серьезного, накачанного, мачо. Это Виталик.\r\nА теперь представьте неидеального, закомплексованого сорокалетнего «парня» из Мариуполя, который живет по съемным квартирам в Киеве, работает журналистом, ищет смысл жизни, деньги, заботу, любовь и вдохновение...Представили? Так знайте - это тоже Виталик.\r\nВпервые на столичной сцене, да и вообще на сцене - пьеса украинского драматурга Виталия Ченского. Поставил спектакль главный режиссер Дикого театра - Максим Голенко, известный своими спектаклями «Вий 2.0.», «ПопыМентыБаблоБабы» и «Афродизиак».\r\nПожалуй, это один из самых жестких и жизненных спектаклей Дикого, ведь на бэкграунде жизни Виталика происходят судьбоносные события в стране.', 'event4.jpg', '2017-10-20', 'Дикий театр', 'Киев', '190.00', 12, 1, 1),
(5, 4, 'Hurts', 'Британцы Тео Хатчкрафт и Адам Андерсон, которые образуют поп-дуэт Hurts, давно стали любимцами украинской публики. Начиная с первого робкого концерта в Crystal Hall, парни доросли до уровня Дворца Спорта и стадионов в нашей стране. Тео и Адам возвращаются в Украину с двумя концертами - в Киеве и Львове - для того, чтобы представить свой новый альбом.', 'no-image.jpg', '2017-12-11', 'Дворец Спорта', 'Киев', '260.00', 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1503299093),
('m170820_094547_create_category_table', 1503299101),
('m170821_071528_category', 1503299764),
('m170821_072326_category', 1503300477),
('m170821_072326_create_category_table', 1503327807),
('m170821_094147_create_event_table', 1503345949),
('m170821_141239_create_order_table', 1503345950),
('m170821_141251_create_customer_table', 1503345950),
('m170821_141401_create_cart_table', 1503345951),
('m170822_095441_create_customer_table', 1503395796),
('m170823_201433_add_is_featured_column_to_event_table', 1503519364),
('m170823_201727_drop_is_featured_column_to_event_table', 1503519635),
('m170823_202610_add_is_featured_column_to_event_table', 1503519996),
('m170824_080718_create_event_table', 1503562267),
('m170824_081302_create_event_table', 1503562404),
('m170911_173335_create_order_table', 1505152525),
('m170911_175828_create_order_items_table', 1505153018),
('m170911_191016_create_order_table', 1505157665),
('m170911_192007_create_customer_table', 1505157666),
('m170911_192234_create_event_table', 1505157782),
('m170917_104408_create_user_table', 1505645203),
('m170917_171602_create_user_table', 1505668604),
('m171028_234028_create_user_table', 1509234198),
('m171029_110240_create_user_details_table', 1509275479);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `quantity`, `amount`, `status`, `name`, `email`, `phone`, `address`, `created_at`, `modified_at`) VALUES
(50, 1, 2, '270.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:09:16', '2017-11-02 23:09:16'),
(51, 1, 1, '190.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:11:26', '2017-11-02 23:11:26'),
(52, 1, 3, '690.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:18:40', '2017-11-02 23:18:40'),
(53, 1, 1, '190.00', 0, 'Петро', 'dassdas@asd', 121414, 'daasdsad', '2017-11-02 23:19:47', '2017-11-02 23:19:47'),
(54, 1, 1, '100.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:20:11', '2017-11-02 23:20:11'),
(55, 1, 1, '260.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:24:07', '2017-11-02 23:24:07'),
(56, 1, 1, '350.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:27:08', '2017-11-02 23:27:08'),
(57, 1, 1, '170.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:37:22', '2017-11-02 23:37:22'),
(58, 1, 1, '100.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:38:33', '2017-11-02 23:38:33'),
(59, 1, 1, '260.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:41:48', '2017-11-02 23:41:48'),
(60, 1, 1, '100.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:42:30', '2017-11-02 23:42:30'),
(61, 1, 1, '100.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:52:19', '2017-11-02 23:52:19'),
(62, 1, 2, '520.00', 0, NULL, NULL, NULL, NULL, '2017-11-02 23:58:04', '2017-11-02 23:58:04'),
(63, 1, 5, '1070.00', 0, NULL, NULL, NULL, NULL, '2017-11-03 00:01:52', '2017-11-03 00:01:52'),
(64, 1, 1, '190.00', 0, NULL, NULL, NULL, NULL, '2017-11-03 00:02:38', '2017-11-03 00:02:38'),
(65, 1, 2, '360.00', 0, NULL, NULL, NULL, NULL, '2017-11-03 00:14:28', '2017-11-03 00:14:28'),
(66, 1, 2, '450.00', 0, NULL, NULL, NULL, NULL, '2017-11-03 00:19:53', '2017-11-03 00:19:53'),
(67, 1, 1, '170.00', 0, NULL, NULL, NULL, NULL, '2017-11-03 11:00:31', '2017-11-03 11:00:31'),
(68, NULL, 1, '100.00', 0, '', '', NULL, '', '2017-11-03 11:22:52', '2017-11-03 11:22:52'),
(69, NULL, 1, '100.00', 0, 'Дмитро', 'asdd@asdasd', 14140, 'ffsdf', '2017-11-03 11:23:17', '2017-11-03 11:23:17'),
(70, NULL, 1, '100.00', 0, 'Asd', 'asds@asdassg', 123123, 'asd', '2017-11-03 11:23:48', '2017-11-03 11:23:48'),
(71, NULL, 1, '190.00', 0, '123', '123@asdasd.com', 123, '1', '2017-11-03 11:25:20', '2017-11-03 11:25:20'),
(72, NULL, 1, '190.00', 0, '', '', NULL, '', '2017-11-03 11:35:29', '2017-11-03 11:35:29'),
(73, 1, 1, '170.00', 0, NULL, NULL, NULL, NULL, '2017-11-03 14:01:26', '2017-11-03 14:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `quantity`, `amount`) VALUES
(42, 50, 2, 'Камера №138', '100.00', 1, '100.00'),
(43, 50, 1, 'Лига Смеха Финал', '170.00', 1, '170.00'),
(44, 51, 4, 'Виталик', '190.00', 1, '190.00'),
(45, 52, 3, 'Poets of the fall', '350.00', 1, '350.00'),
(46, 52, 1, 'Лига Смеха Финал', '170.00', 2, '340.00'),
(47, 53, 4, 'Виталик', '190.00', 1, '190.00'),
(48, 54, 2, 'Камера №138', '100.00', 1, '100.00'),
(49, 55, 5, 'Hurts', '260.00', 1, '260.00'),
(50, 56, 3, 'Poets of the fall', '350.00', 1, '350.00'),
(51, 57, 1, 'Лига Смеха Финал', '170.00', 1, '170.00'),
(52, 58, 2, 'Камера №138', '100.00', 1, '100.00'),
(53, 59, 5, 'Hurts', '260.00', 1, '260.00'),
(54, 60, 2, 'Камера №138', '100.00', 1, '100.00'),
(55, 61, 2, 'Камера №138', '100.00', 1, '100.00'),
(56, 62, 5, 'Hurts', '260.00', 2, '520.00'),
(57, 63, 2, 'Камера №138', '100.00', 1, '100.00'),
(58, 63, 3, 'Poets of the fall', '350.00', 1, '350.00'),
(59, 63, 1, 'Лига Смеха Финал', '170.00', 1, '170.00'),
(60, 63, 5, 'Hurts', '260.00', 1, '260.00'),
(61, 63, 4, 'Виталик', '190.00', 1, '190.00'),
(62, 64, 4, 'Виталик', '190.00', 1, '190.00'),
(63, 65, 4, 'Виталик', '190.00', 1, '190.00'),
(64, 65, 1, 'Лига Смеха Финал', '170.00', 1, '170.00'),
(65, 66, 3, 'Poets of the fall', '350.00', 1, '350.00'),
(66, 66, 2, 'Камера №138', '100.00', 1, '100.00'),
(67, 67, 1, 'Лига Смеха Финал', '170.00', 1, '170.00'),
(68, 68, 2, 'Камера №138', '100.00', 1, '100.00'),
(69, 69, 2, 'Камера №138', '100.00', 1, '100.00'),
(70, 70, 2, 'Камера №138', '100.00', 1, '100.00'),
(71, 71, 4, 'Виталик', '190.00', 1, '190.00'),
(72, 72, 4, 'Виталик', '190.00', 1, '190.00'),
(73, 73, 1, 'Лига Смеха Финал', '170.00', 1, '170.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isAdmin` char(1) COLLATE utf8_unicode_ci DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `isAdmin`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `last_name`, `date_of_birth`, `phone`, `city`, `address`) VALUES
(1, 'admin', 'rsRdAdFeeJ2Dfhz4n7-XhvvBySjk1L6-', '$2y$13$ENrmoUrd2E9WaQ9SyPsqneu4SCsC60qAx1ddfOeEgL/4UNR1FBoTW', NULL, '1', 'dmytropopov.ua@gmail.com', 10, 1509235245, 1509702365, 'Дмитро', 'Попов', '1991-04-29', '+38 097 039 90 03', 'Киев', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_order_id` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` smallint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `c_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
