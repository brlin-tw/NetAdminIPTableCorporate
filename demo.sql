-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 09 日 12:00
-- 服务器版本: 5.5.28
-- PHP 版本: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `Vdragon_NetAdminIPTableCorporate`
--

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `ID` varchar(20) NOT NULL DEFAULT '',
  `reply_id` varchar(20) NOT NULL DEFAULT '',
  `message` varchar(100) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reply_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`,`reply_id`,`time`,`reply_time`),
  KEY `reply_id` (`reply_id`,`reply_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `feedback`
--

INSERT INTO `feedback` (`ID`, `reply_id`, `message`, `time`, `reply_time`) VALUES
('', 'ff', '123', '2013-01-09 11:51:25', '2012-12-24 02:05:19'),
('', 'ff', '1234', '2013-01-09 11:52:22', '2012-12-24 02:05:19'),
('', 'vdragon', '1234', '2013-01-09 08:15:40', '2012-12-31 05:12:16'),
('', 'Ｖ字龍', '喵', '2013-01-09 08:51:09', '2013-01-09 08:37:08'),
('', 'Ｖ字龍', '喵', '2013-01-09 08:58:42', '2013-01-09 08:37:08');

-- --------------------------------------------------------

--
-- 表的结构 `ips`
--

CREATE TABLE IF NOT EXISTS `ips` (
  `ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `used` int(11) NOT NULL,
  `func` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ports` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `ip` (`ip`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ips`
--

INSERT INTO `ips` (`ip`, `used`, `func`, `ports`, `owner`, `place`) VALUES
('140.121.80.1', 1, '測試用主機', '80', 'Vdragon', 'IND'),
('140.121.80.2', 1, 'web server', '80', 'Vdragon', 'no idea'),
('140.121.80.22', 0, NULL, NULL, NULL, NULL),
('140.121.80.3', 1, 'demo', '80', 'pika1021', '131'),
('140.121.80.4', 0, NULL, NULL, NULL, NULL),
('140.121.80.5', 1, 'web server', '80', 'Vdragon', 'no idea'),
('140.121.80.6', 0, NULL, NULL, NULL, NULL),
('140.121.80.7', 0, NULL, NULL, NULL, NULL),
('140.121.80.8', 0, NULL, NULL, NULL, NULL),
('140.121.80.9', 0, NULL, NULL, NULL, NULL),
('140.121.80.10', 0, NULL, NULL, NULL, NULL),
('140.121.80.11', 1, '電腦營 2012', '80, 22', 'user', 'no idea'),
('140.121.80.12', 0, NULL, NULL, NULL, NULL),
('140.121.80.13', 0, NULL, NULL, NULL, NULL),
('140.121.80.14', 0, NULL, NULL, NULL, NULL),
('140.121.80.15', 1, 'web server++', '80', 'Vdragon', 'no idea'),
('140.121.80.16', 0, NULL, NULL, NULL, NULL),
('140.121.80.17', 0, NULL, NULL, NULL, NULL),
('140.121.80.18', 0, NULL, NULL, NULL, NULL),
('140.121.80.19', 0, NULL, NULL, NULL, NULL),
('140.121.80.20', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `messager`
--

CREATE TABLE IF NOT EXISTS `messager` (
  `ID` varchar(20) NOT NULL DEFAULT '',
  `message` varchar(100) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `messager`
--

INSERT INTO `messager` (`ID`, `message`, `time`) VALUES
('ff', 'ffff', '2012-12-24 02:02:18'),
('ff', 'ffff', '2012-12-24 02:05:19'),
('ffff', 'fffffff', '2012-12-24 02:05:52'),
('vdragon', '123', '2012-12-31 05:12:16'),
('vdragon', 'sadfsd', '2012-12-31 05:14:45'),
('vdragon', '1234', '2012-12-31 05:25:18'),
('vdragon', '1234', '2012-12-31 05:27:14'),
('vdragon', '1234', '2012-12-31 05:29:36'),
('Vdragon', '123', '2013-01-07 01:07:10'),
('Vdragon', '測試留言板留言（登入狀態）', '2013-01-09 08:40:21'),
('Ｖ字龍', '有人在嗎？在的話喵一下', '2013-01-09 08:37:08');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '帳號名稱',
  `passwd` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '帳號密碼',
  `mail` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '電子郵件地址',
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連絡電話',
  `display_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='使用者資料';

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`name`, `passwd`, `mail`, `phone`, `display_name`) VALUES
('pika1021', '$6$nyanyanyanyanyan$Ja4P9JqArbCn4KrUI18rrhoPK83blfqOOiF3H.wTv3jxJW923iar0g9GVD6VNrAGOiQs30xL4a1p7Ov/gG5PW1', 'pika1021@gmail.com', '+8869202340', NULL),
('user', '$6$nyanyanyanyanyan$5otm6pE5FsiXe2.XKRgFjNM2Ju.QyKZzQuTOkkPaEnGKCGhETohQtPs3pGXKsOM/dQwmsbEfvl08fFcsKhTBA/', '', '', '測試使用者'),
('Vdragon', '$6$nyanyanyanyanyan$Ja4P9JqArbCn4KrUI18rrhoPK83blfqOOiF3H.wTv3jxJW923iar0g9GVD6VNrAGOiQs30xL4a1p7Ov/gG5PW1', 'pika1021@gmail.com', '+8869202340', NULL);

--
-- 限制导出的表
--

--
-- 限制表 `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`reply_id`, `reply_time`) REFERENCES `messager` (`ID`, `time`);

--
-- 限制表 `ips`
--
ALTER TABLE `ips`
  ADD CONSTRAINT `ips_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
