-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 生成日期: 2011 年 06 月 21 日 08:20
-- 服務器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 數據庫: `register`
-- 

-- --------------------------------------------------------

-- 
-- 表的結構 `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lasttime` datetime NOT NULL,
  `regtime` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 導出表中的數據 `user`
-- 

INSERT INTO `user` VALUES (1, 'admin', '123456', 'admin@vip.com', '0000-00-00 00:00:00', '0000-00-00');
INSERT INTO `user` VALUES (2, 'Allen', '123456', 'allen@vip.com', '0000-00-00 00:00:00', '0000-00-00');
