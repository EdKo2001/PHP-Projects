-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 02 2020 г., 12:55
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `updated-blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `topic` varchar(255) NOT NULL,
  `published` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `preview`, `description`, `topic`, `published`, `created_at`) VALUES
(31, 'Title', 'Author1', '1595590220_', '<p>&nbsp;</p>', 'Films', 1, '2020-07-24 14:25:38'),
(33, '1', '', '', '<p>&nbsp;</p>', 'Games', 1, '2020-07-24 14:57:06'),
(34, '2', '', '', '<p>&nbsp;</p>', 'Movies', 1, '2020-07-24 14:57:09'),
(35, '3', '', '', '<p>&nbsp;</p>', 'Sport', 1, '2020-07-24 14:57:13'),
(36, '4', '', '', '<p>&nbsp;</p>', 'Music', 1, '2020-07-24 14:57:16'),
(38, 'Как сорвать бабло и выбваться в топ', 'эд', '', '<p>Как сорвать бабло и выбваться в топ Как сорвать бабло и выбваться в топКак сорвать бабло и выбваться в топ</p><p>Как сорвать бабло и выбваться в топ Как сорвать бабло и выбваться в топКак сорвать бабло и выбваться в топКак сорвать бабло и выбваться в топ</p><p>Как сорвать бабло и выбваться в топtre</p><figure class=\"table\"><table><tbody><tr><td>rete</td><td>rter</td><td>er</td></tr><tr><td>ter</td><td>te</td><td>etr</td></tr><tr><td>te</td><td>rt</td><td>ert</td></tr></tbody></table></figure><ul><li>фывыфвфывф</li><li>ыф</li><li>в</li><li>фыв</li><li>фы</li></ul>', 'Films', 1, '2020-07-24 23:21:44'),
(39, 'new', '', '', '', 'Movies', 1, '2020-07-25 11:08:27'),
(40, '2', '', '', '23423423423423423', 'Movies', 1, '2020-07-25 11:10:20'),
(41, 'еучеу', '', '', '<p><strong><img src=\"https://i.pinimg.com/236x/98/2b/01/982b012530231e444573cc35bdeed3cd.jpg\" alt=\"\" width=\"262\" height=\"262\" /></strong></p>\r\n<p><strong>уцкцукцууцкцук</strong></p>', 'Movies', 1, '2020-07-25 14:14:28');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(16, 'Movies', ''),
(17, 'Films', ''),
(18, 'Music', ''),
(19, 'Sport', ''),
(20, 'Games', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
