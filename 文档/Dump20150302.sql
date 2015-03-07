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

 Date: 03/02/2015 23:04:26 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `comment_support`
-- ----------------------------
DROP TABLE IF EXISTS `comment_support`;
CREATE TABLE `comment_support` (
  `SUPPORT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMMENT_ID` int(11) NOT NULL,
  `SUPPORT_STATUS` int(11) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`SUPPORT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `comment_support`
-- ----------------------------
BEGIN;
INSERT INTO `comment_support` VALUES ('1', '9', '1', '1', '2015-01-06 23:36:38', null), ('2', '2', '0', '1', '2015-01-06 23:37:17', null), ('3', '11', '1', '1', '2015-01-10 21:08:38', null), ('6', '27', '1', '1', '2015-01-10 22:52:01', null), ('7', '26', '1', '1', '2015-01-10 22:52:19', null), ('9', '24', '1', '1', '2015-01-10 22:58:44', null);
COMMIT;

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
  `MESSAGE_STATUS` int(11) DEFAULT '0',
  PRIMARY KEY (`MESSAGE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `message`
-- ----------------------------
BEGIN;
INSERT INTO `message` VALUES ('1', 'hi, wish to meet u', '2015-01-02 00:38:59', '2', '1', '0'), ('2', 'test message1', '2015-01-02 00:42:54', '12', '1', '1'), ('3', 'hi, why?', '2015-01-02 00:43:22', '2', '1', '0'), ('4', 'i\'m gc', '2015-01-04 15:25:13', '1', '2', '0');
COMMIT;

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
  `LADTITUDE` decimal(10,6) DEFAULT NULL,
  `LONGITUDE` decimal(10,6) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `POSITION_DESC` varchar(100) DEFAULT NULL,
  `IS_ANONYMOUS` tinyint(4) DEFAULT NULL,
  `DISTANCE` int(11) DEFAULT NULL,
  `TUCAO_NUM` int(11) DEFAULT '0',
  PRIMARY KEY (`TOPIC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `topic`
-- ----------------------------
BEGIN;
INSERT INTO `topic` VALUES ('2', 'testTopic', '这是一个好话题', '2015-01-26 23:56:36', null, null, '1', '31.278520', '120.760390', null, null, '0', '0', '1');
COMMIT;

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
  `DISAGREE_NUM` int(11) DEFAULT '0',
  `DISTANCE` int(11) DEFAULT '0',
  PRIMARY KEY (`TUCAO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tucao`
-- ----------------------------
BEGIN;
INSERT INTO `tucao` VALUES ('1', '测试1', '这是测试吐槽呵呵', '0', '0', '0', '0', '8', '2', '0', '2014-11-29 01:32:01', '0', '1', '31.279579', '120.766414', 'nanjing', 'nanjinguniversity', '0', '0', '0'), ('2', '一个吐槽', '开颜是个大傻瓜', '0', '0', '0', '0', '0', '0', '0', '2015-01-05 23:28:42', '1', '2', '31.278520', '120.760390', '南京', '铁心桥', '0', '1', '0'), ('3', '天才在左', '天才在左，疯子在右，我在中间', '0', '0', '0', '0', '0', '1', '0', '2015-01-05 23:35:15', '0', '2', '31.278520', '120.760390', '南京', '软件大道', '0', '0', '1000'), ('4', '自由is best', '我是一条小鱼，自由自在的游在凉爽的马桶里', '0', '0', '0', '0', '0', '0', '0', '2015-01-05 23:38:38', '1', '3', '31.278520', '120.760390', '南京', '安德门', '0', '0', '0'), ('5', '说点啥呢', '好无聊，想找个mm聊聊天，屌丝就不要来啦', '0', '0', '0', '0', '0', '0', '0', '2015-01-05 23:41:21', '0', '2', '31.278520', '120.760390', '南京', '中国移动', '0', '0', '2000'), ('6', '街口那个大爷', '管着大家过马路不准骑车，真的好麻烦。有用么?', '0', '0', '0', '0', '0', '0', '0', '2015-01-05 23:42:47', '0', '1', '31.278420', '120.760352', '南京', '四岔路口', '0', '0', '2500'), ('7', '潜伏之赤途', '这个游戏特别好玩，有没有一样喜欢它的朋友啊', '0', '0', '0', '0', '0', '0', '0', '2015-01-05 23:44:34', '0', '1', '31.278420', '120.760352', '南京', '春江新城', '0', '0', '0'), ('8', '哎，好累', '如果工作可以不干，我宁愿少吃五个全家桶', '0', '0', '0', '0', '0', '0', '0', '2015-01-05 23:45:40', '0', '4', '31.278420', '120.760352', '南京', 'KFC', '0', '0', '0'), ('9', '', '测试发布吐槽1', '0', '0', '0', '0', '1', '0', '0', '2014-12-09 23:27:31', '0', '1', '31.278400', '120.760395', '南京', '天上人间', '0', '1', '0'), ('10', '', '测试发布吐槽2', '0', '0', '0', '0', '0', '0', '0', '2014-12-09 23:27:49', '0', '1', '31.278520', '118.760390', '南京', '天龙寺', '0', '0', '0'), ('11', 'testttt', 'testttttttt', '0', '0', '0', '0', '6', '1', '0', '2014-12-13 00:57:18', '0', '1', '100.000000', '200.000000', '未知', '某个地方', '0', '0', '100'), ('13', 'testTopic', '来自话题的吐槽', null, null, null, '2', '0', '0', '0', '2015-01-27 23:44:30', '0', '1', '31.278520', '120.760390', null, null, '0', '0', '0');
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
  `STATUS` int(11) DEFAULT '0',
  `SUPPORT_NUM` int(11) DEFAULT '0',
  `DISAGREE_NUM` int(11) DEFAULT '0',
  PRIMARY KEY (`COMMENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tucao_comment`
-- ----------------------------
BEGIN;
INSERT INTO `tucao_comment` VALUES ('1', '1', ' 测试评论1', '2014-12-14 11:45:41', '1', '0', '1', '0', '0'), ('2', '1', 'heheCOmment', '2014-12-15 11:46:05', '2', '0', '1', '0', '1'), ('3', '1', 'testcomment2', '2014-12-14 16:43:28', '2', '1', '0', '0', '0'), ('4', '1', 'testcomment3', '2014-12-14 16:44:01', '2', '0', '1', '0', '0'), ('5', '1', 'testcontent', '2014-12-16 00:10:00', '2', '0', '0', '0', '0'), ('6', '1', 'testcontent', '2014-12-16 00:11:00', '2', '0', '0', '0', '0'), ('7', '1', 'testcontent', '2014-12-16 00:15:52', '2', '0', '0', '0', '0'), ('8', '9', 'test comment', '2014-12-17 00:11:52', '2', '0', '0', '0', '0'), ('9', '6', '是啊，那个大爷好烦人的！', '2015-01-05 23:47:23', '4', '0', '0', '1', '0'), ('10', '6', '其实还好啊，毕竟大家都安全。', '2015-01-05 23:47:56', '3', '9', '0', '0', '0'), ('11', '5', 'mm在哪儿', '2015-01-05 23:48:31', '1', '0', '0', '1', '0'), ('12', '5', '一边玩去', '2015-01-05 23:48:51', '2', '11', '0', '0', '0'), ('24', '11', 'dsfasdfasdf', '2015-01-10 20:15:40', '1', '0', '0', '1', '0'), ('25', '1', 'testtttt', '2015-01-10 22:48:22', '1', '0', '0', '0', '0'), ('26', '1', 'testtttt', '2015-01-10 22:48:34', '1', '0', '0', '1', '0'), ('27', '19', 'testtttt', '2015-01-10 22:49:32', '1', '0', '0', '1', '0');
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
  `STATUS` int(11) DEFAULT '0',
  PRIMARY KEY (`SUPPORT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tucao_support`
-- ----------------------------
BEGIN;
INSERT INTO `tucao_support` VALUES ('3', '2', '0', '1', '2015-01-06 23:16:06', '0'), ('4', '3', '1', '1', '2015-01-06 23:21:22', '0'), ('5', '11', '1', '1', '2015-01-10 20:56:13', '0'), ('7', '13', '1', '1', '2015-01-10 22:57:20', '0');
COMMIT;

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
INSERT INTO `users` VALUES ('1', '1', 'gongchen', '15112345678', 'stevegc@163.com', '37e7ca4128db507b8e08ccb58eff3f9e', '2', '113', '0', '1', '', '2014-11-13 06:48:01'), ('2', '1', 'chenkaiyan', '15887654321', 'kayyan@126.com', '880f15fa6a37bde5dfcf8a17ee193e7b', '1', '5', '0', '2', null, '2014-11-13 06:57:16'), ('3', '0', 'wangchenghui', '13012345678', null, '880f15fa6a37bde5dfcf8a17ee193e7b', '0', '0', '0', '2', null, '2015-01-05 23:26:31'), ('4', '1', 'geyuhang', '13212345678', null, '880f15fa6a37bde5dfcf8a17ee193e7b', '0', '0', '0', '3', null, '2015-01-05 23:27:25'), ('12', '1', 'nick1', '15195911222', null, '880f15fa6a37bde5dfcf8a17ee193e7b', '0', '0', '0', '1', null, '2014-12-04 00:43:59'), ('13', '0', '22222b', '123134324', null, '880f15fa6a37bde5dfcf8a17ee193e7b', '0', '0', '0', '1', null, '2014-12-13 01:04:58');
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
