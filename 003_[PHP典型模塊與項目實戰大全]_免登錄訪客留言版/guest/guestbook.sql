-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 生成日期: 2011 年 05 月 30 日 13:49
-- 服務器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 數據庫: `guestbook`
-- 

-- --------------------------------------------------------

-- 
-- 表的結構 `info`
-- 

CREATE TABLE `info` (
  `id` int(11) NOT NULL auto_increment COMMENT '留言自增id',
  `name` varchar(16) NOT NULL COMMENT '留言名稱',
  `content` text NOT NULL COMMENT '發佈內容',
  `content_time` varchar(14) NOT NULL COMMENT '發佈時間',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- 導出表中的數據 `info`
-- 

INSERT INTO `info` VALUES (5, '張三', '祝福大家節日快樂：）', '2010-02-18 15:');
INSERT INTO `info` VALUES (6, '李四', '給大家拜年了', '2010-02-19 15:');
INSERT INTO `info` VALUES (7, '王五', '送去新年的祝福給大家', '1266571304');
INSERT INTO `info` VALUES (13, 'user', '', '1304426422');
INSERT INTO `info` VALUES (9, '發生的', '份數大幅的', '1266572080');

-- --------------------------------------------------------

-- 
-- 表的結構 `reply`
-- 

CREATE TABLE `reply` (
  `id` int(11) NOT NULL auto_increment COMMENT '自增id',
  `info_id` varchar(11) NOT NULL COMMENT '留言id',
  `reply` text NOT NULL COMMENT '回復內容',
  `reply_time` varchar(14) NOT NULL COMMENT '回復時間',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 導出表中的數據 `reply`
-- 

INSERT INTO `reply` VALUES (3, '5', '謝謝熱心參與', '2010-02-17 19:');
INSERT INTO `reply` VALUES (4, '6', '感謝', '2010-02-18 19:');
INSERT INTO `reply` VALUES (6, '9 ', '必須飛飛', '1266572999');
