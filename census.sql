/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.111
Source Server Version : 50552
Source Host           : 192.168.1.111:3306
Source Database       : census

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2019-01-21 17:19:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for census_admin
-- ----------------------------
DROP TABLE IF EXISTS `census_admin`;
CREATE TABLE `census_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `upwd` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of census_admin
-- ----------------------------
INSERT INTO `census_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- ----------------------------
-- Table structure for census_admin_session
-- ----------------------------
DROP TABLE IF EXISTS `census_admin_session`;
CREATE TABLE `census_admin_session` (
  `SESS_KEY` varchar(32) NOT NULL,
  `EXPIRY_DATE` bigint(20) NOT NULL,
  `SESS_VALUE` varchar(4000) NOT NULL,
  `LOGIN_DATE` datetime NOT NULL,
  `LOGIN_IP` bigint(20) NOT NULL,
  `UID` varchar(50) NOT NULL,
  PRIMARY KEY (`SESS_KEY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of census_admin_session
-- ----------------------------
INSERT INTO `census_admin_session` VALUES ('ndm97qv18rudcbnqoff0tqfa91', '1548069392', 'census|a:4:{s:16:\"left_menu_action\";s:18:\"visitor/page_title\";s:2:\"id\";s:1:\"1\";s:5:\"uname\";s:5:\"admin\";s:4:\"upwd\";s:32:\"e10adc3949ba59abbe56e057f20f883e\";}', '0000-00-00 00:00:00', '3232235901', '');

-- ----------------------------
-- Table structure for census_visit_log2019-01
-- ----------------------------
DROP TABLE IF EXISTS `census_visit_log2019-01`;
CREATE TABLE `census_visit_log2019-01` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `nb_visits` int(11) NOT NULL,
  `page_time` varchar(255) NOT NULL COMMENT '页面停留时间',
  `nb_os` varchar(255) NOT NULL,
  `nb_lang` varchar(255) NOT NULL,
  `nb_brower` varchar(255) NOT NULL,
  `nb_ip` varchar(255) NOT NULL,
  `resolution` varchar(255) NOT NULL COMMENT '设备分辨率',
  `device_type` varchar(255) NOT NULL COMMENT '设备类型',
  `referrer` varchar(255) NOT NULL COMMENT '访问来源',
  `request_url` varchar(255) NOT NULL COMMENT '页面url',
  `page_title` varchar(255) NOT NULL COMMENT '页面标题',
  `week` tinyint(4) NOT NULL COMMENT '星期几 0为星期日',
  `visit_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2019014 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of census_visit_log2019-01
-- ----------------------------
INSERT INTO `census_visit_log2019-01` VALUES ('2019011', '6', '1', '7', 'Windows 7', 'Simplified Chinese', 'Chrome(71.0)', '192.168.1.125', '1920x1080', '桌面端', 'http://app.census.com/Index/view?id=3', '/Index/view?id=6', 'view6', '0', '2019-01-20 11:40:03');
INSERT INTO `census_visit_log2019-01` VALUES ('2019012', '6', '1', '1', 'Windows 7', 'Simplified Chinese', 'Chrome(71.0)', '192.168.1.125', '1920x1080', '桌面端', 'http://app.census.com/Index/view?id=6', '/Index/view?id=6', 'view6', '1', '2019-01-21 11:40:05');
INSERT INTO `census_visit_log2019-01` VALUES ('2019013', '1', '1', '28', 'Windows 7', 'Simplified Chinese', 'Chrome(71.0)', '192.168.1.125', '1920x1080', '移动端', 'http://app.census.com/Index/view?id=6', '/Index/view?id=1', 'view1', '1', '2019-01-21 12:40:34');

-- ----------------------------
-- Table structure for test_data
-- ----------------------------
DROP TABLE IF EXISTS `test_data`;
CREATE TABLE `test_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test_data
-- ----------------------------
INSERT INTO `test_data` VALUES ('1', 'eric1');
INSERT INTO `test_data` VALUES ('2', 'eric2');
INSERT INTO `test_data` VALUES ('3', 'eric3');
INSERT INTO `test_data` VALUES ('4', 'eric4');
INSERT INTO `test_data` VALUES ('5', 'eric5');
INSERT INTO `test_data` VALUES ('6', 'eric6');
