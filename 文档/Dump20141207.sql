/*
 Navicat Premium Data Transfer

 Source Server         : gcMysql
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost
 Source Database       : tucao

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : utf-8

 Date: 12/07/2014 14:42:04 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `MESSAGE_ID` int(11) NOT NULL,
  `CONTENT` varchar(200) DEFAULT NULL,
  `CREATE_TIME` datetime DEFAULT NULL,
  `SEND_USER` int(11) DEFAULT NULL,
  `RECEIVE_USER` int(11) DEFAULT NULL,
  `MESSAGE_STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`MESSAGE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `share`
-- ----------------------------
DROP TABLE IF EXISTS `share`;
CREATE TABLE `share` (
  `SHARE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT` varchar(200) DEFAULT NULL,
  `TUCAO_ID` int(11) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `SHARE_DEST` int(11) DEFAULT NULL,
  `SHARE_STATUS` int(11) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SHARE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `topic`
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `TOPIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TOPIC_TITLE` varchar(100) DEFAULT NULL,
  `TOPIC_CONTENT` text,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `END_TIME` timestamp NULL DEFAULT NULL,
  `HAS_PIC` tinyint(4) DEFAULT NULL,
  `CREATE_USER` int(11) DEFAULT NULL,
  `LADTITUDE` decimal(10,0) DEFAULT NULL,
  `LONGITUDE` decimal(10,0) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `POSITION_DESC` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TOPIC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tucao`
-- ----------------------------
DROP TABLE IF EXISTS `tucao`;
CREATE TABLE `tucao` (
  `TUCAO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) DEFAULT NULL,
  `CONTENT` text NOT NULL,
  `HAS_PIC` tinyint(4) DEFAULT NULL,
  `SOURCE` tinyint(4) DEFAULT NULL,
  `FATHER_ID` int(11) DEFAULT NULL,
  `TOPIC_ID` int(11) DEFAULT NULL,
  `COMMENT_NUM` int(11) DEFAULT '0',
  `SUPPORT_NUM` int(11) DEFAULT '0',
  `SHARE_NUM` int(11) DEFAULT '0',
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ANONYMOUS` tinyint(4) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `LADTITUDE` decimal(10,6) DEFAULT NULL,
  `LONGITUDE` decimal(10,6) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `POSITION_DESC` varchar(100) DEFAULT NULL,
  `TUCAO_STATUS` int(11) DEFAULT '0',
  `DISAGREE_NUM` int(11) DEFAULT NULL,
  `DISTANCE` int(11) DEFAULT '0',
  PRIMARY KEY (`TUCAO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tucao`
-- ----------------------------
BEGIN;
INSERT INTO `tucao` VALUES ('1', '测试1', '这是测试吐槽呵呵', '0', '0', '0', '0', '0', '0', '0', '2014-11-29 01:32:01', '0', '1', '100.123456', '100.123456', 'nanjing', 'nanjinguniversity', '0', '0', '0'), ('3', '', '测试发布吐槽1', null, null, null, null, '0', '0', '0', '2014-12-07 11:25:10', '0', '1', '123.232400', '124.234200', null, null, '0', null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `tucao_comment`
-- ----------------------------
DROP TABLE IF EXISTS `tucao_comment`;
CREATE TABLE `tucao_comment` (
  `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TUCAO_ID` int(11) NOT NULL,
  `COMMENT_CONTENT` varchar(200) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `COMMENT_USER` int(11) DEFAULT NULL,
  `REPLY_COMMENT` int(11) DEFAULT NULL,
  PRIMARY KEY (`COMMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tucao_pic`
-- ----------------------------
DROP TABLE IF EXISTS `tucao_pic`;
CREATE TABLE `tucao_pic` (
  `PIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PIC_SRC` varchar(100) DEFAULT NULL,
  `SMALL_PIC_SRC` varchar(100) DEFAULT NULL,
  `TUCAO_ID` int(11) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LENGTH` int(11) DEFAULT NULL,
  `WIDTH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PIC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tucao_support`
-- ----------------------------
DROP TABLE IF EXISTS `tucao_support`;
CREATE TABLE `tucao_support` (
  `SUPPORT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TUCAO_ID` int(11) NOT NULL,
  `SUPPORT_STATUS` int(11) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SUPPORT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GENDER` tinyint(4) DEFAULT '0',
  `NICK_NAME` varchar(50) DEFAULT NULL,
  `REG_PHONE_NUM` varchar(50) DEFAULT NULL,
  `REG_EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `LEVEL` int(11) DEFAULT '0',
  `SCORE` int(11) DEFAULT '0',
  `USER_STATUS` int(11) DEFAULT NULL,
  `DEFAULT_PIC` int(11) DEFAULT NULL,
  `HEAD_PIC` varchar(100) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USER_ID_UNIQUE` (`USER_ID`),
  UNIQUE KEY `REG_PHONE_NUM_UNIQUE` (`REG_PHONE_NUM`),
  UNIQUE KEY `REG_EMAIL_UNIQUE` (`REG_EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '1', 'gongchen', '15112345678', 'stevegc@163.com', '123456', '0', '0', '0', '1', '', '2014-11-13 06:48:01'), ('2', '1', 'chenkaiyan', '15887654321', 'kayyan@126.com', '123456', '1', '5', '0', '2', null, '2014-11-13 06:57:16'), ('12', '1', 'nick1', '15195911222', null, '880f15fa6a37bde5dfcf8a17ee193e7b', '0', '0', null, '1', null, '2014-12-04 00:43:59');
COMMIT;

-- ----------------------------
--  Table structure for `users_relation`
-- ----------------------------
DROP TABLE IF EXISTS `users_relation`;
CREATE TABLE `users_relation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ATTENTION_USER_ID` int(11) NOT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ATTENTION_STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
