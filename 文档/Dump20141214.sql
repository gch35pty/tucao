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

 Date: 12/15/2014 00:15:41 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tucao`
-- ----------------------------
BEGIN;
INSERT INTO `tucao` VALUES ('1', '测试1', '这是测试吐槽呵呵', '0', '0', '0', '0', '0', '2', '0', '2014-11-29 01:32:01', '0', '1', '118.766414', '31.969579', 'nanjing', 'nanjinguniversity', '0', '0', '0'), ('9', '', '测试发布吐槽1', null, null, null, null, '0', '0', '0', '2014-12-09 23:27:31', '0', '1', '118.760395', '31.968400', null, null, '0', '1', '0'), ('10', '', '测试发布吐槽2', null, null, null, null, '0', '0', '0', '2014-12-09 23:27:49', '0', '1', '118.760390', '31.968520', null, null, '0', null, '0'), ('11', 'testttt', 'testttttttt', null, null, null, null, '0', '0', '0', '2014-12-13 00:57:18', '0', '1', '100.000000', '200.000000', null, null, '0', null, '100');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tucao_comment`
-- ----------------------------
BEGIN;
INSERT INTO `tucao_comment` VALUES ('1', '1', ' 测试评论1', '2014-12-14 11:45:41', '1', '0'), ('2', '1', 'heheCOmment', '2014-12-15 11:46:05', '1', '1'), ('3', '2', 'testcomment2', '2014-12-14 16:43:28', '1', '0'), ('4', '1', 'testcomment3', '2014-12-14 16:44:01', '1', '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '1', 'gongchen', '15112345678', 'stevegc@163.com', '123456', '0', '0', '0', '1', '', '2014-11-13 06:48:01'), ('2', '1', 'chenkaiyan', '15887654321', 'kayyan@126.com', '123456', '1', '5', '0', '2', null, '2014-11-13 06:57:16'), ('12', '1', 'nick1', '15195911222', null, '880f15fa6a37bde5dfcf8a17ee193e7b', '0', '0', null, '1', null, '2014-12-04 00:43:59'), ('13', '0', '22222b', '123134324', null, '880f15fa6a37bde5dfcf8a17ee193e7b', '0', '0', null, '1', null, '2014-12-13 01:04:58');
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

-- ----------------------------
--  Function structure for `GETDISTANCE`
-- ----------------------------
DROP FUNCTION IF EXISTS `GETDISTANCE`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GETDISTANCE`(lat1 DOUBLE, lng1 DOUBLE, lat2 DOUBLE, lng2 DOUBLE) RETURNS double
    READS SQL DATA
    DETERMINISTIC
BEGIN
 
DECLARE RAD DOUBLE;
 
DECLARE EARTH_RADIUS DOUBLE DEFAULT 6378137;
 
DECLARE radLat1 DOUBLE;
 
DECLARE radLat2 DOUBLE;
 
DECLARE radLng1 DOUBLE;
 
DECLARE radLng2 DOUBLE;
 
DECLARE s DOUBLE;
 
SET RAD = PI() / 180.0;
 
SET radLat1 = lat1 * RAD;
 
SET radLat2 = lat2 * RAD;
 
SET radLng1 = lng1 * RAD;
 
SET radLng2 = lng2 * RAD;
 
SET s = 2*asin(sqrt(pow(sin((radLat1-radLat2)/2),2)+cos(radLat1)*cos(radLat2)*pow(sin((radLng1-radLng2)/2),2)))*EARTH_RADIUS;

#SET s = ACOS(COS(radLat1)*COS(radLat2)*COS(radLng1-radLng2)+SIN(radLat1)*SIN(radLat2))*EARTH_RADIUS;
 
SET s = ROUND(s * 10000) / 10000;
 
RETURN s;
 
END
 ;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
