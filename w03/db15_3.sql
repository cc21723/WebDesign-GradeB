-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-08-01 10:26:22
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db15_3`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL COMMENT '片名',
  `level` int(1) UNSIGNED NOT NULL COMMENT '分級',
  `length` int(10) UNSIGNED NOT NULL DEFAULT 90 COMMENT '片長',
  `ondate` date NOT NULL COMMENT '上映日期',
  `publish` text NOT NULL COMMENT '出版商',
  `director` text NOT NULL COMMENT '導演',
  `trailer` text NOT NULL COMMENT '預告影片',
  `poster` text NOT NULL COMMENT '電影海報',
  `intro` text NOT NULL COMMENT '簡介',
  `sh` int(1) UNSIGNED NOT NULL COMMENT '顯示',
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '院線片01', 1, 120, '2025-08-02', '院線片01發行商', '院線片01導演', '03B01v.mp4', '03B01.png', '院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01院線片01', 1, 22),
(2, '院線片02', 1, 90, '2025-08-01', '院線片02發行商', '院線片02導演', '03B02v.mp4', '03B02.png', '院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02院線片02', 1, 23),
(3, '院線片03', 1, 120, '2025-08-01', '院線片03發行商', '院線片03導演', '03B03v.mp4', '03B03.png', '院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03院線片03', 1, 24),
(4, '院線片04', 1, 90, '2025-08-01', '院線片04發行商', '院線片04導演', '03B04v.mp4', '03B04.png', '院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04院線片04', 1, 25),
(5, '院線片05', 1, 90, '2025-07-31', '院線片05發行商', '院線片05導演', '03B05.mp4', '03B05.png', '5555555555555555555555555555555555555555555555555', 1, 26),
(7, '院線片06', 1, 120, '2025-07-31', '院線片06發行商', '院線片06導演', '03B06v.mp4', '03B06.png', '院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06院線片06', 1, 27);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` text NOT NULL COMMENT '電影名稱',
  `date` date NOT NULL COMMENT '日期',
  `session` text NOT NULL COMMENT '場次',
  `tickets` int(10) UNSIGNED NOT NULL COMMENT '票數',
  `seats` text NOT NULL COMMENT '座位',
  `no` text NOT NULL COMMENT '訂單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `movie`, `date`, `session`, `tickets`, `seats`, `no`) VALUES
(1, '院線片02', '2025-08-01', '16:00~18:00', 2, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '202508010001'),
(3, '院線片02', '2025-08-01', '16:00~18:00', 2, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '202508010003'),
(4, '院線片03', '2025-08-01', '16:00~18:00', 2, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '202508010004'),
(5, '院線片02', '2025-08-02', '16:00~18:00', 3, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"7\";i:2;s:1:\"8\";}', '202508010005'),
(6, '院線片06', '2025-08-01', '22:00~24:00', 3, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";}', '202508010006'),
(7, '院線片05', '2025-08-02', '18:00~20:00', 1, 'a:1:{i:0;s:1:\"2\";}', '202508010007'),
(8, '院線片04', '2025-08-03', '14:00~16:00', 3, 'a:3:{i:0;s:1:\"7\";i:1;s:1:\"9\";i:2;s:1:\"8\";}', '202508010008'),
(9, '院線片05', '2025-08-02', '18:00~20:00', 4, 'a:4:{i:0;s:1:\"2\";i:1;s:1:\"7\";i:2;s:2:\"12\";i:3;s:2:\"17\";}', '202508010009'),
(10, '院線片06', '2025-08-01', '20:00~22:00', 2, 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', '202508010010'),
(11, '院線片03', '2025-08-03', '16:00~18:00', 2, 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}', '202508010011'),
(12, '院線片03', '2025-08-03', '18:00~20:00', 2, 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}', '202508010012'),
(13, '院線片02', '2025-08-03', '18:00~20:00', 2, 'a:2:{i:0;s:2:\"18\";i:1;s:2:\"19\";}', '202508010013'),
(14, '院線片02', '2025-08-01', '18:00~20:00', 2, 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"2\";}', '202508010014'),
(15, '院線片04', '2025-08-01', '20:00~22:00', 3, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";}', '202508010015');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL COMMENT '圖片名稱',
  `img` text NOT NULL COMMENT '圖片',
  `sh` int(1) UNSIGNED NOT NULL COMMENT '顯示',
  `rank` int(10) UNSIGNED NOT NULL COMMENT '排序',
  `ani` int(1) UNSIGNED NOT NULL COMMENT '動畫效果'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '預告片01', '03A01.jpg', 1, 1, 2),
(2, '預告片02', '03A02.jpg', 0, 2, 1),
(3, '預告片03', '03A03.jpg', 1, 3, 1),
(4, '預告片04', '03A04.jpg', 1, 4, 3),
(5, '預告片05', '03A05.jpg', 1, 5, 3),
(6, '預告片06', '03A06.jpg', 1, 6, 1),
(7, '預告片07', '03A07.jpg', 1, 7, 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
