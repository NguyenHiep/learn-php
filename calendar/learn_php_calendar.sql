/*
Navicat MySQL Data Transfer

Source Server         : 192.168.56.129
Source Server Version : 50627
Source Host           : localhost:3306
Source Database       : learn_php_calendar

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2017-08-24 09:25:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of events
-- ----------------------------
