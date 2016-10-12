/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : woopi_blog

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-10-12 01:05:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `permission_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `section_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `user_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post
-- ----------------------------

-- ----------------------------
-- Table structure for sections
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `section_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` char(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES ('1', 'Ingreso al panel');
INSERT INTO `sections` VALUES ('2', 'ABM Pacientes');
INSERT INTO `sections` VALUES ('3', 'Especialidades');
INSERT INTO `sections` VALUES ('4', 'Especialistas');
INSERT INTO `sections` VALUES ('5', 'Calendarios');
INSERT INTO `sections` VALUES ('6', 'Administracion');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `email` char(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` char(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `name` char(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `last_name` char(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `gender_id` int(1) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `profile_image_ext` varchar(5) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `profile_back_ext` varchar(5) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'sdepietro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sergio', 'De Pietro', null, null, null, null, null, null);
