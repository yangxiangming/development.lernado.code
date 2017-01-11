/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50541
Source Host           : 127.0.0.1:3306
Source Database       : org_example

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2014-04-12 13:36:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for example_users
-- ----------------------------
DROP TABLE IF EXISTS `example_users`;
CREATE TABLE `example_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_key` varchar(255) NOT NULL DEFAULT '' COMMENT '用户key',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '用户邮箱',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户等级(0普通用户;1网站会员;2管理员)',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '数据状态(0正常;1失效)',
  `insert_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '数据添加时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '数据更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户数据表';

-- ----------------------------
-- Records of example_users
-- ----------------------------
INSERT INTO `example_users` VALUES ('1', 'A_54B36DC91764E_15108559 ', 'yangxiangming', 'yangxiangming@live.com', 'MTIzNDU2', '2', '0', '2014-12-29 15:01:43', '2014-12-29 15:01:43');