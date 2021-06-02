-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2017 年 05 月 12 日 06:28
-- 伺服器版本: 5.6.13
-- PHP 版本: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `invoices`
--
CREATE DATABASE IF NOT EXISTS `invoices` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `invoices`;

-- --------------------------------------------------------

--
-- 表的結構 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `EIN_number` varchar(15) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `discount` int(11) NOT NULL,
  `tax_rate` int(11) NOT NULL,
  `state` varchar(2) NOT NULL,
  `memo` text,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `m_uid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `sell` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `pic_path` varchar(200) DEFAULT NULL,
  `state` varchar(2) NOT NULL,
  `memo` text,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `goods_purchase`
--

CREATE TABLE IF NOT EXISTS `goods_purchase` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `job_uid` varchar(20) NOT NULL,
  `m_uid` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `tariff` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `memo` text,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `goods_sale`
--

CREATE TABLE IF NOT EXISTS `goods_sale` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `job_uid` varchar(20) NOT NULL,
  `c_uid` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `tariff` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `memo` text,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `gp_summary_table`
--

CREATE TABLE IF NOT EXISTS `gp_summary_table` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `gp_uid` int(11) NOT NULL,
  `g_uid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `gs_summary_table`
--

CREATE TABLE IF NOT EXISTS `gs_summary_table` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `gs_uid` int(11) NOT NULL,
  `g_p_switch` int(11) NOT NULL,
  `g_p_uid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(256) NOT NULL,
  `salesman` varchar(20) NOT NULL,
  `sales_phone` varchar(20) DEFAULT NULL,
  `state` varchar(2) NOT NULL,
  `memo` text,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `other_cost` int(11) NOT NULL,
  `goods_cost` int(11) NOT NULL,
  `p_number` int(11) NOT NULL,
  `state` varchar(2) NOT NULL,
  `memo` text,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `p_summary_table`
--

CREATE TABLE IF NOT EXISTS `p_summary_table` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `p_uid` int(11) NOT NULL,
  `g_uid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(300) NOT NULL,
  `regdate` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 轉存資料表中的資料 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `email`, `regdate`) VALUES
(1, 'jashliao', 'e99d3274dda52116e3cd47810a3ba56f', 'jash.liao@gmail.com', '2015-12-29 13:18:22'),
(8, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@asd.com', '2016-01-02 12:22:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
