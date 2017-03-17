-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2017 年 03 月 16 日 18:23
-- 伺服器版本: 5.5.54-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `m_num` int(50) NOT NULL AUTO_INCREMENT,
  `rest_name` varchar(10) NOT NULL,
  `kind` varchar(100) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `menu_picture` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`m_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- 資料表的匯出資料 `menu`
--

INSERT INTO `menu` (`m_num`, `rest_name`, `kind`, `unit_price`, `menu_picture`, `date`) VALUES
(56, '快樂餐館', '滷肉飯', 35, 'pork_rice.jpg', '2017-03-10 10:03:26'),
(57, '快樂餐館', '肉羹飯', 50, 'meat_soup.jpg', '2017-03-10 10:04:54'),
(58, '快樂餐館', '燙青菜', 30, 'vegetables.jpg', '2017-03-10 10:05:52'),
(59, '快樂餐館', '滷蛋', 10, 'egg.jpg', '2017-03-10 10:06:20'),
(60, '快樂餐館', '貢丸湯', 20, 'meatball_soup.jpg', '2017-03-10 10:06:20'),
(61, '清一色牛肉麵', '牛肉麵', 150, 'beef_noodles.jpg', '2017-03-10 14:50:53'),
(62, '八方雲集', '招牌鍋貼10入', 45, 'fried_dumpling.jpg', '2017-03-10 14:53:52'),
(63, '八方雲集', '招牌水餃10入', 50, 'Dumpling.jpg', '2017-03-10 14:53:52');

-- --------------------------------------------------------

--
-- 資料表結構 `menu_order`
--

CREATE TABLE IF NOT EXISTS `menu_order` (
  `num` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `rest_name` varchar(20) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `pay` int(3) NOT NULL DEFAULT '0' COMMENT '0=未付款,1=已付款,9=歷史訂餐',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

--
-- 資料表的匯出資料 `menu_order`
--

INSERT INTO `menu_order` (`num`, `name`, `rest_name`, `kind`, `price`, `date`, `pay`) VALUES
(71, 'Arod', '快樂餐館', '滷肉飯', 85, '2017-03-10 10:07:36', 9),
(72, 'Arod', '快樂餐館', '肉羹飯', 85, '2017-03-10 10:07:36', 9),
(78, 'Arod', '快樂餐館', '貢丸湯', 20, '2017-03-13 12:01:51', 1),
(79, 'Peter', '快樂餐館', '燙青菜', 75, '2017-03-13 12:08:15', 0),
(80, 'Peter', '快樂餐館', '滷肉飯', 75, '2017-03-13 12:08:15', 0),
(81, 'Peter', '快樂餐館', '滷蛋', 75, '2017-03-13 12:08:15', 0),
(82, 'Keven', '快樂餐館', '肉羹飯', 50, '2017-03-13 12:08:49', 1),
(86, 'Love', '快樂餐館', '滷肉飯', 65, '2017-03-13 13:36:34', 0),
(87, 'Love', '快樂餐館', '燙青菜', 65, '2017-03-13 13:36:34', 0),
(91, 'Jone', '快樂餐館', '滷肉飯', 85, '2017-03-16 15:27:08', 0),
(92, 'Jone', '快樂餐館', '肉羹飯', 85, '2017-03-16 15:27:08', 0),
(94, 'Amy', '快樂餐館', '肉羹飯', 50, '2017-03-16 15:28:04', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `num` int(5) NOT NULL AUTO_INCREMENT,
  `photo` varchar(50) NOT NULL,
  `text` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- 資料表的匯出資料 `photo`
--

INSERT INTO `photo` (`num`, `photo`, `text`, `date`) VALUES
(146, '1488763202.jpg', '20160306test1', '0000-00-00 00:00:00'),
(147, '1488766316.jpg', '20160306', '0000-00-00 00:00:00'),
(148, '1488769542.jpg', '20160306-01', '0000-00-00 00:00:00'),
(149, '1488774169.jpg', '20160306-002', '0000-00-00 00:00:00'),
(150, '1488778497.jpg', '20160306-003', '0000-00-00 00:00:00'),
(151, '1488780352.jpg', '20160306-004', '0000-00-00 00:00:00'),
(152, '1488782725.jpg', '20160306-005', '0000-00-00 00:00:00'),
(153, '1488782981.jpg', '20160306-006', '0000-00-00 00:00:00'),
(154, '1488783304.jpg', '20160306-007', '0000-00-00 00:00:00'),
(155, '1488784642.jpg', '20160306-008', '2017-03-06 15:17:22'),
(156, '1488790922.jpg', '20160306-009', '2017-03-06 17:02:02'),
(157, '1488792291.jpg', '20160306-011', '2017-03-06 17:24:51'),
(161, '1488793735.jpg', '20160306-012', '2017-03-06 17:48:55'),
(162, '1488794337.jpg', '20160306-012', '2017-03-06 17:58:57'),
(163, '1488849035.jpg', '20160307-001', '2017-03-07 09:10:35'),
(164, '1488849549.jpg', '20160307-002', '2017-03-07 09:19:09'),
(168, '1488851770.jpg', '20160307-003', '2017-03-07 09:56:10'),
(169, '1489052339.jpg', '123', '2017-03-09 17:38:59'),
(170, '1489052388.jpg', '123', '2017-03-09 17:39:48'),
(171, '1489108370.jpg', '123', '2017-03-10 09:12:50');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `num` int(3) NOT NULL AUTO_INCREMENT,
  `rest_name` varchar(10) NOT NULL,
  `rest_kind` varchar(20) NOT NULL,
  `rest_tel` int(10) NOT NULL,
  `rest_picture` varchar(100) NOT NULL,
  `rest_open` int(3) NOT NULL DEFAULT '0' COMMENT '1=開單,0=關閉',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 資料表的匯出資料 `restaurant`
--

INSERT INTO `restaurant` (`num`, `rest_name`, `rest_kind`, `rest_tel`, `rest_picture`, `rest_open`) VALUES
(19, '快樂餐館', '便當', 23237899, 'menu.jpg', 1),
(20, '清一色牛肉麵', '麵', 23581199, 'beefnoodles_one.jpg', 0),
(21, '八方雲集', '其他', 23776318, '8.jpg', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant_kind`
--

CREATE TABLE IF NOT EXISTS `restaurant_kind` (
  `num` int(5) NOT NULL AUTO_INCREMENT,
  `rest_kind` varchar(20) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 資料表的匯出資料 `restaurant_kind`
--

INSERT INTO `restaurant_kind` (`num`, `rest_kind`) VALUES
(1, '便當'),
(2, '麵'),
(3, '其他'),
(17, '測試2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
