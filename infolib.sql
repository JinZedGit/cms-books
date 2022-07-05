-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране:  5 юли 2022 в 15:21
-- Версия на сървъра: 10.4.22-MariaDB
-- Версия на PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `infolib`
--

-- --------------------------------------------------------

--
-- Структура на таблица `authors`
--

CREATE TABLE `authors` (
  `author_id` int(5) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(74, 'Сюзан Колинс'),
(75, 'Уилям Голдинг'),
(76, 'Дъглас Адамс');

-- --------------------------------------------------------

--
-- Структура на таблица `fields`
--

CREATE TABLE `fields` (
  `field_id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `fields`
--

INSERT INTO `fields` (`field_id`, `field_name`) VALUES
(1, 'Алегория'),
(2, 'Хумор'),
(6, 'Фантастика');

-- --------------------------------------------------------

--
-- Структура на таблица `resources`
--

CREATE TABLE `resources` (
  `res_id` int(8) NOT NULL,
  `res_title` varchar(255) NOT NULL,
  `res_publisher` varchar(255) NOT NULL,
  `res_bibliography` varchar(255) NOT NULL,
  `res_size` int(5) NOT NULL,
  `res_year` int(4) NOT NULL,
  `res_issb` int(13) NOT NULL,
  `res_keywords` varchar(255) NOT NULL,
  `res_image` text NOT NULL,
  `res_file` text NOT NULL,
  `res_author` int(11) NOT NULL,
  `res_type` int(11) NOT NULL,
  `res_field` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `resources`
--

INSERT INTO `resources` (`res_id`, `res_title`, `res_publisher`, `res_bibliography`, `res_size`, `res_year`, `res_issb`, `res_keywords`, `res_image`, `res_file`, `res_author`, `res_type`, `res_field`) VALUES
(8, 'The Hunger Games', 'Bard', 'Главната героиня, шестнадесетгодишната Катнис Евърдийн, живее в постапокалиптичен свят, където правителство, наречено Капитола, има силата да управлява след различни катаклизми. Правителството организира ежегодно телевизионно състезание, наречено „Игрите ', 374, 2011, 2147483647, 'деца, глад, жътва, игри', 'igrite-na-glada-30.jpg', 'thg.pdf', 74, 1, 6);

-- --------------------------------------------------------

--
-- Структура на таблица `roles`
--

CREATE TABLE `roles` (
  `role_id` int(9) NOT NULL,
  `role_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'reader'),
(2, 'editor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Структура на таблица `types`
--

CREATE TABLE `types` (
  `type_id` int(3) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `types`
--

INSERT INTO `types` (`type_id`, `type_name`) VALUES
(1, 'Книга'),
(2, 'Сборник\r\n');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(9) NOT NULL,
  `user_login` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_family` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_name`, `user_family`, `user_email`, `user_pass`, `user_role`) VALUES
(2, 'i.iliev', 'Илиян', 'Илиев', 'i.iliev@unibit.bg', '1234', 3);

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Индекси за таблица `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Индекси за таблица `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `res_author` (`res_author`),
  ADD KEY `res_type` (`res_type`),
  ADD KEY `res_field` (`res_field`);

--
-- Индекси за таблица `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Индекси за таблица `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `res_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`res_author`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`res_type`) REFERENCES `types` (`type_id`),
  ADD CONSTRAINT `resources_ibfk_3` FOREIGN KEY (`res_field`) REFERENCES `fields` (`field_id`);

--
-- Ограничения за таблица `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
