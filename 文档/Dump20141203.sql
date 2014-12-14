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

 Date: 12/03/2014 22:39:23 PM
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
  `TITLE` varchar(100) NOT NULL,
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
  `LADTITUDE` decimal(10,0) DEFAULT NULL,
  `LONGITUDE` decimal(10,0) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `POSITION_DESC` varchar(100) DEFAULT NULL,
  `TUCAO_STATUS` int(11) DEFAULT '0',
  `DISAGREE_NUM` int(11) DEFAULT NULL,
  PRIMARY KEY (`TUCAO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `CREATE_TIME` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USER_ID_UNIQUE` (`USER_ID`),
  UNIQUE KEY `REG_PHONE_NUM_UNIQUE` (`REG_PHONE_NUM`),
  UNIQUE KEY `REG_EMAIL_UNIQUE` (`REG_EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
