-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- �D��: localhost
-- �ͦ����: 2011 �~ 05 �� 30 �� 13:49
-- �A�Ⱦ�����: 5.0.45
-- PHP ����: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- �ƾڮw: `guestbook`
-- 

-- --------------------------------------------------------

-- 
-- �����c `info`
-- 

CREATE TABLE `info` (
  `id` int(11) NOT NULL auto_increment COMMENT '�d���ۼWid',
  `name` varchar(16) NOT NULL COMMENT '�d���W��',
  `content` text NOT NULL COMMENT '�o�G���e',
  `content_time` varchar(14) NOT NULL COMMENT '�o�G�ɶ�',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- �ɥX�����ƾ� `info`
-- 

INSERT INTO `info` VALUES (5, '�i�T', '���֤j�a�`��ּ֡G�^', '2010-02-18 15:');
INSERT INTO `info` VALUES (6, '���|', '���j�a���~�F', '2010-02-19 15:');
INSERT INTO `info` VALUES (7, '����', '�e�h�s�~�����ֵ��j�a', '1266571304');
INSERT INTO `info` VALUES (13, 'user', '', '1304426422');
INSERT INTO `info` VALUES (9, '�o�ͪ�', '���Ƥj�T��', '1266572080');

-- --------------------------------------------------------

-- 
-- �����c `reply`
-- 

CREATE TABLE `reply` (
  `id` int(11) NOT NULL auto_increment COMMENT '�ۼWid',
  `info_id` varchar(11) NOT NULL COMMENT '�d��id',
  `reply` text NOT NULL COMMENT '�^�_���e',
  `reply_time` varchar(14) NOT NULL COMMENT '�^�_�ɶ�',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- �ɥX�����ƾ� `reply`
-- 

INSERT INTO `reply` VALUES (3, '5', '���¼��߰ѻP', '2010-02-17 19:');
INSERT INTO `reply` VALUES (4, '6', '�P��', '2010-02-18 19:');
INSERT INTO `reply` VALUES (6, '9 ', '��������', '1266572999');
