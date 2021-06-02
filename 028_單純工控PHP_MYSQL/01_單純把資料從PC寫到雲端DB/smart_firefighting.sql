-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2016 年 06 月 05 日 09:54
-- 伺服器版本: 5.6.13
-- PHP 版本: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `smart_firefighting`
--
CREATE DATABASE IF NOT EXISTS `smart_firefighting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smart_firefighting`;

-- --------------------------------------------------------

--
-- 表的結構 `all_data`
--

CREATE TABLE IF NOT EXISTS `all_data` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `device_id` varchar(30) NOT NULL,
  `value` varchar(30) NOT NULL,
  `years` int(6) DEFAULT NULL,
  `months` int(6) DEFAULT NULL,
  `days` int(6) DEFAULT NULL,
  `hours` int(6) DEFAULT NULL,
  `minutes` int(6) DEFAULT NULL,
  `seconds` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
