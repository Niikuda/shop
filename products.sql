-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Окт 08 2026 г., 16:49
-- Версия сервера: 8.0.40
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `draft`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `description` text NOT NULL,
  `RAM` int DEFAULT '0',
  `disc` int NOT NULL DEFAULT '0',
  `screen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `processor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `camera` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `battery` int NOT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `nfc` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `brand`, `model`, `category_id`, `description`, `RAM`, `disc`, `screen`, `processor`, `camera`, `battery`, `img`, `price`, `discount`, `nfc`) VALUES
(1, 'Poco', 'F4', 1, 'Poco F4', 8, 128, '{\"diagonal\":\"6.67\",\"technology\":\"AMOLED\",\"rate\":\"120\",\"features\":\"no\"}', 'Snapdragon 870', '{\"main\":\"64\",\"wide\":\"8\",\"telephoto\":\"no\",\"macro\":\"2\"}', 4500, 'phone7_hassselblad.png', 444, 0, 0),
(2, 'Xiaomi', 'Xiaomi 13 Pro', 1, 'DESC XIAOIMI', 12, 256, '{\"diagonal\":\"6.73\",\"technology\":\"AMOLED\",\"rate\":\"120\",\"features\":\"HDR10+\"}', 'Snapdragon 8 Gen 2', '{\"main\":\"50\",\"wide\":\"50\",\"telephoto\":\"50\",\"macro\":\"no\"}', 4820, 'phone2_xiaomi.jpg', 400, 0, 0),
(3, 'Samsung', 'Samsung Galaxy S23 Ultra', 1, '', 12, 256, '{\"diagonal\":\"6.8\",\"technology\":\"Dynamic AMOLED 2X\",\"rate\":\"120\",\"features\":\"\"}', 'Snapdragon 8 Gen 2', '{\"main\":\"200\",\"wide\":\"12\",\"telephoto\":\"10\",\"macro\":\"10\"}', 5000, 'phone3_google.png', 203, 0, 0),
(4, 'Poco', 'F4', 1, 'Описание Poco F4', 8, 256, '{\"diagonal\":\"6.67\",\"technology\":\"AMOLED\",\"rate\":\"120\",\"features\":\"\"}', 'Snapdragon 870', '{\"main\":\"64\",\"wide\":\"8\",\"telephoto\":\"\",\"macro\":\"2\"}', 4500, 'phone1_poco.png', 400, 1, 1),
(5, 'Poco', 'F4', 1, '', 8, 256, '{\"diagonal\":\"6.67\",\"technology\":\"AMOLED\",\"rate\":\"120\",\"features\":\"\"}', 'Snapdragon 870', '{\"main\":\"64\",\"wide\":\"8\",\"telephoto\":\"\",\"macro\":\"2\"}', 4500, 'phone1_poco.png', 400, 30, 1),
(6, 'Xiaomi', '13 Pro', 0, '', 12, 256, '{\"diagonal\":6.73,\"technology\":\"AMOLED\",\"rate\":120,\"features\":\"\"}', 'Snapdragon 8 Gen 2', '{\"main\":50,\"wide\":50,\"telephoto\":50,\"macro\":null}', 4820, 'phone2_xiaomi.jpg', 400, 0, 1),
(7, 'Xiaomi', 'Mi 11', 0, '', 8, 256, '{\"diagonal\":6.81,\"technology\":\"AMOLED\",\"rate\":120,\"features\":\"\"}', 'Snapdragon 888', '{\"main\":108,\"wide\":13,\"telephoto\":null,\"macro\":5}', 4600, 'phone2_xiaomi.jpg', 400, 30, 1),
(8, 'Google', 'Pixel 7 Pro', 0, '', 12, 512, '{\"diagonal\":6.7,\"technology\":\"LTPO AMOLED\",\"rate\":120,\"features\":\"\"}', 'Tensor G2', '{\"main\":50,\"wide\":12,\"telephoto\":48,\"macro\":null}', 5000, 'phone3_google.png', 100, 0, 1),
(9, 'Google', 'Pixel 6a', 0, '', 6, 128, '{\"diagonal\":6.1,\"technology\":\"OLED\",\"rate\":60,\"features\":\"\"}', 'Tensor', '{\"main\":12.2,\"wide\":12,\"telephoto\":null,\"macro\":null}', 4410, 'phone3_google.png', 450, 0, 1),
(10, 'Realme', 'Realme GT 2 Pro', 0, '', 12, 256, '{\"diagonal\":6.7,\"technology\":\"AMOLED\",\"rate\":120,\"features\":\"\"}', 'Snapdragon 8 Gen 1', '{\"main\":50,\"wide\":50,\"telephoto\":null,\"macro\":3}', 5000, 'phone4_realme.png', 450, 60, 1),
(11, 'Vivo', 'X90 Pro', 0, '', 12, 256, '{\"diagonal\":\"6.78\",\"technology\":\"AMOLED\",\"rate\":\"120\",\"features\":\"\"}', 'Dimensity 9200', '{\"main\":\"50\",\"wide\":\"50\",\"telephoto\":\"\",\"macro\":\"\"}', 4870, 'phone5_vivo.png', 850, 0, 1),
(12, 'Apple', '15 Pro', 0, '', 512, 128, '{\"diagonal\":6.1,\"technology\":\"Super Retina XDR\",\"rate\":120,\"features\":\"\"}', 'A17 Pro', '{\"main\":48,\"wide\":12,\"telephoto\":12,\"macro\":null}', 3100, 'phone6_apple.jpg', 120, 0, 1),
(13, 'Apple', '14', 0, '', 12, 128, '{\"diagonal\":6.1,\"technology\":\"Super Retina XDR\",\"rate\":120,\"features\":\"\"}', 'A15 Bionic', '{\"main\":12,\"wide\":12,\"telephoto\":null,\"macro\":null}', 3279, 'phone6_apple.jpg', 900, 40, 1),
(14, 'Hasselblad', 'OnePlus 11 5G', 1, '', 16, 256, '{\"diagonal\":\"6.7\",\"technology\":\"AMOLED\",\"rate\":\"120\",\"features\":\"\"}', 'Snapdragon 8 Gen 2', '{\"main\":\"50\",\"wide\":\"48\",\"telephoto\":\"32\",\"macro\":\"\"}', 5000, 'phone7_hassselblad.png', 630, 0, 1),
(15, 'Samsung', 'Galaxy S23 Ultra', 1, '', 12, 1024, '{\"diagonal\":\"6.8\",\"technology\":\"Dynamic AMOLED 2X\",\"rate\":\"120\",\"features\":\"\"}', 'Snapdragon 8 Gen 2', '{\"main\":\"200\",\"wide\":\"12\",\"telephoto\":\"10\",\"macro\":\"\"}', 5000, 'phone8_samsung.jpg', 140, 50, 1),
(16, 'Samsung', 'Galaxy A54 5G', 0, '', 6, 256, '{\"diagonal\":6.4,\"technology\":\"Super AMOLED\",\"rate\":120,\"features\":\"\"}', 'Exynos 1380', '{\"main\":50,\"wide\":12,\"telephoto\":null,\"macro\":5}', 5000, 'phone8_samsung.jpg', 400, 0, 1),
(17, 'Nokia', 'G60 5G', 0, '', 6, 128, '{\"diagonal\":6.58,\"technology\":\"IPS LCD\",\"rate\":120,\"features\":\"\"}', 'Snapdragon 695', '{\"main\":50,\"wide\":5,\"telephoto\":null,\"macro\":null}', 4500, 'nokia.webp', 230, 0, 1),
(29, 'Vivo999', 'X90 Pro999', 0, 'test', 12999, 256999, '{\"diagonal\":\"6.78999\",\"technology\":\"AMOLED999\",\"rate\":\"120999\",\"features\":\"test\"}', 'Dimensity 9200999', '{\"main\":\"50999\",\"wide\":\"50999\",\"telephoto\":\"test\",\"macro\":\"test\"}', 4870999, 'nokia.webp', 999, 0, 0),
(30, 'new', 'New name', 0, 'new', 44, 44, '{\"diagonal\":\"44\",\"technology\":\"new\",\"rate\":\"44\",\"features\":\"new\"}', '44', '{\"main\":\"44\",\"wide\":\"44\",\"telephoto\":\"44\",\"macro\":\"44\"}', 44, 'phone5_vivo.png', 444, 0, 0),
(31, 'test', 'test', 1, 'test', 33, 33, '{\"diagonal\":\"33\",\"technology\":\"test\",\"rate\":\"33\",\"features\":\"test\"}', '33', '{\"main\":\"33\",\"wide\":\"33\",\"telephoto\":\"33\",\"macro\":\"33\"}', 33, 'nokia.webp', 333, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
