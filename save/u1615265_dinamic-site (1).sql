-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 22 2022 г., 16:06
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1615265_dinamic-site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(12) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `page` int(10) NOT NULL,
  `email` varchar(110) NOT NULL,
  `comment` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `status`, `page`, `email`, `comment`, `created_date`) VALUES
(2, 1, 27, 'ahdepc88@gmail.com', '<p>. At erat pellentesque adipiscing commodo elit at. Consectetur a erat nam at lectus urna duis convallis. Rhoncus est pellentesque elit ullamcorper dignissim. Non nisi est sit amet facilisis. Tellus orci ac auctor augue mauris augue neque gravida. Ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae. Mattis enim ut tellus elementum sagittis vitae et. Nec tincidunt praes</p>', '2021-05-27 21:17:42'),
(3, 1, 26, 'ah@gmail.com', 'Уже сейчас разработчики ExRay видят несколько сценариев использования аппарата в замкнутых затопленных пространствах:', '2021-05-27 21:21:40'),
(6, 1, 24, 'test22@gmail.com', '<p>В сети много руководств по PostgreSQL, которые описывают основные команды. Но при погружении глубже в работу возникают такие практические вопросы, для которых требуются продвинутые ко</p>', '2021-05-27 21:27:57'),
(7, 1, 24, 'test22@gmail.com', 'В сети много руководств по PostgreSQL, которые описывают основные команды. Но при погружении глубже в работу возникают такие практические вопросы, для которых требуются продвинутые ко', '2021-05-29 09:23:29'),
(8, 1, 20, 'test22@gmail.com', '<p>Мой блог - это блог сделаннный с целью обучения аудитории на платформе YouTube и заработка доволнительной карм</p><p>22222222</p>', '2021-05-29 09:23:49'),
(10, 1, 22, 'ahdepc88@gmail.com', 'Мой блог - это блог сделаннный с целью обучения аудитории на платформе YouTube и заработка доволнительной кармы))', '2021-05-29 12:05:27'),
(11, 1, 20, 'test11@gmail.com', '<p>Мой блог - это блог сделаннный с целью обучения аудитории на платформе YouTube и заработка доволнительной кар</p>', '2021-05-29 12:06:49'),
(12, 0, 20, 'test11@gmail.com', 'Мой блог - это блог сделаннный с целью обучения аудитории на платформе YouTube и заработка доволнительной кар', '2021-05-29 12:07:13'),
(13, 0, 20, 'test11@gmail.com', 'Мой блог - это блог сделаннный с целью обучения аудитории на платформе YouTube и заработка доволнительной кар', '2021-05-29 12:07:41'),
(14, 0, 20, 'test11@gmail.com', 'Мой блог - это блог сделаннный с целью обучения аудитории на платформе YouTube и заработка доволнительной кар', '2021-05-29 12:07:44');

-- --------------------------------------------------------

--
-- Структура таблицы `doc`
--

CREATE TABLE `doc` (
  `id` int(12) NOT NULL,
  `title` varchar(125) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doc`
--

INSERT INTO `doc` (`id`, `title`, `content`, `created`) VALUES
(1, 'Диванный эксперт', '<p>фцв цв цв</p><h1>ЦВ ФЦв Ф Цв</h1><p>&nbsp;</p><p>Цв Цв ФЦв&nbsp;</p><ul><li>фцвфцв</li><li>фцвфцв</li><li>фцвфцв</li></ul><p>фцвфцвфцвфв</p><ol><li>фцвф</li><li>фцвфцв<ol><li>вцв</li><li>фвфыв</li></ol></li><li>фывфыв</li><li>&nbsp;</li></ol>', '2021-04-26 19:39:46'),
(2, 'фыйцйцвйвйв', '<p>фыыйыс</p>', '2021-04-26 19:40:42'),
(3, 'Третья документация', '<h2>Основы третеье йдокументации</h2><p>Это обычный параграфф</p><ul><li>Это просто список</li><li>второй пункт списка<ul><li>подсписок</li><li>подсписок-2</li></ul></li></ul>', '2021-04-26 20:07:19'),
(4, 'AndreiTest', '<p>аукп ука ука укп</p>', '2021-04-26 20:07:51');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id_group`, `name`) VALUES
(1, 'КМ-1'),
(2, 'КМ-2');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_topic` int(12) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_topic`, `created_date`) VALUES
(20, 50, 'PHP или Django?', '1620237923_test1.jpg', '<p>sdfsd</p>', 1, 15, '2021-05-05 21:05:23'),
(21, 50, 'Как вам дается ООП в PHP?', '1620237940_test1.jpg', '<p>Никак)))</p>', 1, 15, '2021-05-05 21:05:40'),
(22, 50, 'Хочу ролики по:', '1620377595_test1.jpg', '<p>третья статья</p>', 1, 18, '2021-05-05 21:07:26'),
(23, 50, 'При решении сложных задач трудно поместить решение в один запрос (хотя, многие стараются так сделать). В таких случаях удобно помещать какие-либо промежуточные данные во временную таблицу, для использования их в дальнейшем.', '1620239962_second.png', '<p>При решении сложных задач трудно поместить решение в один запрос (хотя, многие стараются так сделать). В таких случаях удобно помещать какие-либо промежуточные данные во вр<i>е</i>менную таблицу, для использования их в дальнейшем.</p><p>&nbsp;</p><p>При решении сложных задач трудно поместить решение в один запрос (хотя, многие стараются так сделать). В таких случаях удобно помещать какие-либо промежуточные данные во вр<i>е</i>менную таблицу, для использования их в дальнейшем.</p>', 1, 15, '2021-05-05 21:38:37'),
(24, 50, '15 полезных команд PostgreSQL', '1620374705_PostgreSQL.png', '<p>В сети много руководств по PostgreSQL, которые описывают основные команды. Но при погружении глубже в работу возникают такие практические вопросы, для которых требуются продвинутые команды.</p><p>Такие команды, или <a href=\"https://ru.wikipedia.org/wiki/%D0%A1%D0%BD%D0%B8%D0%BF%D0%BF%D0%B5%D1%82\">сниппеты</a>, редко описаны в документации. Рассмотрим несколько на примерах, полезных как для разработчиков, так и для администраторов баз данных.</p>', 1, 18, '2021-05-07 11:05:05'),
(26, 51, 'Запись от TEST пользователя', '1621268311_test1.jpg', '<p>По словам разработчиков, синий цвет выбран вполне осознанно. Он способен проникать дальше, чем световое излучение с другой длиной волны.<br><br>Модем бесперебойно передает сигналы на расстояние 50 — 100 м на глубине до 6 тыс. метров. Именно этот прибор от Hydromea лег в основу нового подводного дрона.<br><br>&nbsp;</p><h2>Зачем дрону такая связь</h2><p><br>Разработка подводного дрона — более сложная задача, чем создание наземных или воздушных автономных систем.<br><br>Какие есть варианты обеспечения связью под водой?<br><br>&nbsp;</p><ul><li>Радиоволны, но их дальность не очень велика.</li><li>Звуковые волны слишком медленные, нельзя быть уверенным в их надежности.</li><li>Проводное соединение. На сегодня это самый распространенный вариант. Но и у него есть минусы, включая лимит на радиус перемещения.</li></ul><p><br>Есть несколько сфер, в которых просто необходимо применение подводных беспроводных роботов для получения важных сведений:<br><br>&nbsp;</p><ul><li>подводные исследования;</li><li>морской энергетический сектор;</li><li>строительство и ремонт водных объектов.</li></ul><p><br>Уже сейчас разработчики ExRay видят несколько сценариев использования аппарата в замкнутых затопленных пространствах:<br><br>&nbsp;</p><ul><li>в плотинах гидроэлектростанций;</li><li>закрытых водных путях;</li><li>балластных цистерн на судах.</li><li>&nbsp;</li></ul>', 1, 17, '2021-05-17 19:18:31'),
(27, 50, 'Новая статья', '1621881949_second.png', '<p>пагинация, постраничная навигация, pagination, pagination php,<br>easy pagination, пагинация на php</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ornare massa eget egestas purus. Nunc consequat interdum varius sit amet mattis vulputate enim. Nunc mi ipsum faucibus vitae aliquet nec. Arcu odio ut sem nulla pharetra diam sit. Ultricies lacus sed turpis tincidunt id aliquet risus. Sit amet est placerat in egestas. Erat pellentesque adipiscing commodo elit at. Quis commodo odio aenean sed. Proin libero nunc consequat interdum varius.</p><p>At volutpat diam ut venenatis tellus. Sit amet volutpat consequat mauris nunc congue nisi vitae suscipit. Nisi est sit amet facilisis magna etiam tempor. Interdum velit euismod in pellentesque massa placerat. Ut morbi tincidunt augue interdum velit euismod. Sed elementum tempus egestas sed. Scelerisque in dictum non consectetur a erat. Sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque eu. Habitant morbi tristique senectus et. At consectetur lorem donec massa sapien faucibus et. Praesent tristique magna sit amet. Enim ut tellus elementum sagittis vitae et leo. Elit pellentesque habitant morbi tristique senectus. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi.</p><p>Mi bibendum neque egestas congue quisque egestas diam. Vitae tortor condimentum lacinia quis vel eros donec ac. At erat pellentesque adipiscing commodo elit at. Consectetur a erat nam at lectus urna duis convallis. Rhoncus est pellentesque elit ullamcorper dignissim. Non nisi est sit amet facilisis. Tellus orci ac auctor augue mauris augue neque gravida. Ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae. Mattis enim ut tellus elementum sagittis vitae et. Nec tincidunt praesent semper feugiat. Lacus vel facilisis volutpat est. Fringilla ut morbi tincidunt augue. Condimentum mattis pellentesque id nibh tortor id aliquet lectus proin. Suspendisse interdum consectetur libero id faucibus. Ut diam quam nulla porttitor massa. Sit amet facilisis magna etiam tempor orci. Aenean et tortor at risus. At consectetur lorem donec massa sapien faucibus. Risus feugiat in ante metus dictum at. Ultrices neque ornare aenean euismod.</p>', 1, 17, '2021-05-24 21:45:49'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 16:32:59'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 17:18:56'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 17:20:32'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 17:22:28'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 17:24:45'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 17:24:53'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 17:31:28'),
(0, 59, '32tyuiop', '1653158877_CuD17uFH30c.jpg', '<p>40b=r=9bnir0=</p>', 1, 15, '2022-05-20 18:27:07');

-- --------------------------------------------------------

--
-- Структура таблицы `predmeti`
--

CREATE TABLE `predmeti` (
  `id_predmet` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `predmeti`
--

INSERT INTO `predmeti` (`id_predmet`, `name`) VALUES
(1, 'История'),
(2, 'Биология'),
(3, 'Информатика'),
(4, 'Русский язык'),
(5, 'Английский язык');

-- --------------------------------------------------------

--
-- Структура таблицы `prepadovateli`
--

CREATE TABLE `prepadovateli` (
  `id_prepadovatel` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) DEFAULT NULL,
  `dateofbirtday` date NOT NULL,
  `pasport` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prepadovateli`
--

INSERT INTO `prepadovateli` (`id_prepadovatel`, `surname`, `firstname`, `secondname`, `dateofbirtday`, `pasport`, `phone`) VALUES
(1, 'Иванов', 'Дмитрий', 'Михайлович', '2022-05-10', '1234567890', '12345678901'),
(2, 'Сидоров', 'Алексей', 'Александрович', '2022-05-03', '1234567890', '12345678901');

-- --------------------------------------------------------

--
-- Структура таблицы `sdacha_ekzamenov`
--

CREATE TABLE `sdacha_ekzamenov` (
  `id_sdacha` int(11) NOT NULL,
  `semestr` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_predmet` int(11) NOT NULL,
  `kol_vo_chasov` int(11) NOT NULL,
  `id_prepadovatel` int(11) NOT NULL,
  `ocenka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sdacha_ekzamenov`
--

INSERT INTO `sdacha_ekzamenov` (`id_sdacha`, `semestr`, `id_student`, `id_predmet`, `kol_vo_chasov`, `id_prepadovatel`, `ocenka`) VALUES
(1, 1, 1, 1, 1, 1, 3),
(2, 1, 2, 2, 2, 2, 5),
(3, 1, 3, 3, 2, 1, 3),
(4, 1, 4, 3, 2, 2, 5),
(5, 1, 1, 4, 3, 1, 0),
(6, 1, 2, 4, 3, 1, 3),
(7, 2, 3, 5, 3, 2, 3),
(8, 2, 4, 1, 32, 1, 3),
(9, 2, 1, 3, 32, 1, 3),
(10, 2, 2, 3, 231, 2, 3),
(11, 2, 3, 2, 232, 1, 2),
(12, 2, 4, 5, 3, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_student` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `photo` text,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) DEFAULT NULL,
  `dateofbirtday` date NOT NULL,
  `pasport` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id_student`, `id_group`, `photo`, `surname`, `firstname`, `secondname`, `dateofbirtday`, `pasport`, `phone`) VALUES
(1, 1, NULL, 'кися1', 'кися11', 'кися111', '2022-05-10', '1234567890', '12345678901'),
(2, 1, NULL, 'кися2', 'кися22', 'кися222', '2022-05-03', '1234567890', '12345678901'),
(3, 2, NULL, 'кися3', 'кися33', 'кися333', '2022-05-17', '123423', '21312312'),
(4, 2, NULL, 'кися4', 'кися44', 'кися444', '2022-05-10', '213232', '123123123');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(12) NOT NULL,
  `name` varchar(121) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(15, 'php', 'Some about php'),
(16, 'uncategory', '...'),
(17, 'О жизни IT', 'Как протекает ручей спокойствия и безмятежен в IT'),
(18, 'Top topics', 'Категория для вывода статей в горизонтальное слайдшоу на главной странице.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(55, 0, '1234567', '1234567@yandex.ru', '$2y$10$Mxkhl0TgG3OaQZMKp0FqmuCFjzHIoOCZvPyLG59uQbGxc1qoom0MS', '2022-05-17 14:14:41'),
(56, 1, 'lol', 'lol@gmail.com', '$2y$10$uUG.z.klJ3QnaY6tR/umFO..cROtm7OMwySZn5Wn8JXbSMKBt1cI.', '2022-05-17 14:28:43'),
(57, 1, 'nek', 'nikitka@gmail.com', '$2y$10$dUPs4JHYLpDaMrqNfNlMburgfaquagGnuRYhuP3XORsfWC0If9USK', '2022-05-17 14:30:10'),
(58, 1, 'lol', 'rere@gmail.cmi', '$2y$10$n6aWAOyINx8BYn/Q.x0N/ePRXVXPwBe1Vfp1mDr/IoBlu8TRbvVmK', '2022-05-17 14:32:45'),
(59, 1, 'abc', 'abc@ya.ru', '$2y$10$zmzuNIixjbmGpiJ7ttqbdOlfwx3P3/d91XrmZ3BFdTdYlqEQl67nK', '2022-05-17 14:34:23'),
(60, 0, 'oy', 'oy@gmail.com', '$2y$10$lm.vZ1Iup0.0p/D.lshOAuaZXoLkBzhz9D3hOhWbHolz.TKuWuwJu', '2022-05-17 16:11:41'),
(61, 0, 'fuck', 'fuck@gmail.com', '$2y$10$Dso99/rLy6hAFFHQBR07Se/tp1hyXdM2ulftPGsCMQ7WkbWhvAm/y', '2022-05-17 18:43:47'),
(62, 0, '3232', 'you@gmail.com', '$2y$10$.NOtvNEjYSP0XjkLwwnV0ujdv12vzOxkF07pPHCDdQsQLPTn5cnw2', '2022-05-17 18:51:52'),
(63, 0, 'reak', 'reak@gmail.com', '$2y$10$SnYBB59yMMSn7MoDz2o/z.tso0CarkqH5Z2v/2mTxg0N162TETNpi', '2022-05-17 19:00:50'),
(64, 0, 'df', 'df@gmail.com', '$2y$10$YfMP5XbQVfic.uY/o8QSbeEakr8pSyp02rQ4LNPuv55BYIZ5SvWva', '2022-05-17 19:18:21'),
(65, 0, 'ytre', 'rtyu@gmail.com', '$2y$10$5KLIvc.QOVUJ64H/wr3Hm.h61DXgzkkhp2mdsQLHxeb6bqHjiuJ9O', '2022-05-17 19:25:20'),
(66, 0, 're', 're@gmail.com', '$2y$10$1qDzSU.i34sYiBvRyo.jD.6jSkWdREZYuJx46Z7LXZsCmVu/2u53.', '2022-05-18 13:34:56'),
(67, 0, 'what', 'what@gmail.com', '$2y$10$h3ThM4eeGVM0a8hr704SL.xk20oUNpeHgyQTHQ2Pg2oXmO5L4uCii', '2022-05-20 10:41:56'),
(68, 0, '23232', '323232@gmail.com', '$2y$10$FuUjLJTqHqZixdGXxETcI.J45xKm/q0cu7cBlbAbIe9Olg7M/64rq', '2022-05-20 10:44:00'),
(69, 0, '3232', '3232kamar@gmail.com', '$2y$10$pS.ATuAwsuZ132aP4lTknOoCcnHZFiPuhBAkc7dEoAu9Om8jFtmh6', '2022-05-20 12:20:40'),
(70, 0, '333kr-hj r', 'ntnmt@gmail.com', '$2y$10$Y/hVTcd2sIA3uVy5NP5atO/uvvz/vX3Bp4.JZwdUIiv2Sh93Zk/ui', '2022-05-20 12:23:35'),
(71, 0, 'q0intb', 'qeott@gmail.com', '$2y$10$iaUD9wlpSt6uvjyI2I6vpON22NTajNjxVXWB1LDQvEvmLm.nChJmm', '2022-05-20 12:49:59'),
(72, 0, 'qwerty', 'qwerty@gmail.com', '$2y$10$ArIq3Am5MDdc.wKLU1fh8Oq3Bh.GitAHpAGnVAoFT70m9ZUSWWP.q', '2022-05-20 15:14:42'),
(73, 0, 'mkw]opmr', 'ki@gmail.com', '$2y$10$2uDTVohXxN4mP0nb4hNI9eeFZHk1FsBbxRUFjEETeQmvBJyEd/Zxa', '2022-05-20 18:15:46'),
(74, 0, 'Kost', 'kost@gmail.com', '$2y$10$LcPACYF8.IlFQhK1JMPFG.mj.owY6JdeeBBdHteUJgpn2RiNeEyBe', '2022-05-20 22:55:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Индексы таблицы `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id_predmet`);

--
-- Индексы таблицы `prepadovateli`
--
ALTER TABLE `prepadovateli`
  ADD PRIMARY KEY (`id_prepadovatel`);

--
-- Индексы таблицы `sdacha_ekzamenov`
--
ALTER TABLE `sdacha_ekzamenov`
  ADD PRIMARY KEY (`id_sdacha`),
  ADD KEY `id_predmet` (`id_predmet`),
  ADD KEY `id_prepadovatel` (`id_prepadovatel`),
  ADD KEY `id_student` (`id_student`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `id_group` (`id_group`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `predmeti`
--
ALTER TABLE `predmeti`
  MODIFY `id_predmet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `prepadovateli`
--
ALTER TABLE `prepadovateli`
  MODIFY `id_prepadovatel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sdacha_ekzamenov`
--
ALTER TABLE `sdacha_ekzamenov`
  MODIFY `id_sdacha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sdacha_ekzamenov`
--
ALTER TABLE `sdacha_ekzamenov`
  ADD CONSTRAINT `sdacha_ekzamenov_ibfk_2` FOREIGN KEY (`id_predmet`) REFERENCES `predmeti` (`id_predmet`),
  ADD CONSTRAINT `sdacha_ekzamenov_ibfk_3` FOREIGN KEY (`id_prepadovatel`) REFERENCES `prepadovateli` (`id_prepadovatel`),
  ADD CONSTRAINT `sdacha_ekzamenov_ibfk_4` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
