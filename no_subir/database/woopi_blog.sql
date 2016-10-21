/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : woopi_blog

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-10-21 18:24:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Humor', '1', '2016-10-12 15:26:15');
INSERT INTO `categories` VALUES ('2', 'Programacion', '1', '2016-10-12 00:00:00');
INSERT INTO `categories` VALUES ('3', 'Fotografía', '1', '2016-10-12 00:00:00');
INSERT INTO `categories` VALUES ('4', 'Farándula', '1', '2016-10-12 00:00:00');
INSERT INTO `categories` VALUES ('5', 'Test', '1', '2016-10-12 00:00:00');
INSERT INTO `categories` VALUES ('6', 'pepe', '1', '2016-10-14 00:00:00');

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
  `category_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', '1', '2016-10-13', 'Este es un ejemplo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse efficitur fringilla quam eu sollicitudin. Integer maximus, sem vitae gravida euismod, orci turpis dignissim augue, sit amet elementum lacus nisl ut mi. Nam feugiat id mi a gravida. Nunc vestibulum est consectetur, aliquet felis ac, dictum odio. Maecenas accumsan nunc eget tortor placerat semper. Aliquam et ornare purus. Mauris sed sapien et justo malesuada pellentesque. Morbi tincidunt lectus nibh, dictum tincidunt neque luctus sit amet. In varius gravida sem quis malesuada. Phasellus elit enim, congue et placerat et, dapibus tempus eros. Sed eleifend laoreet tellus, nec tincidunt ante feugiat eu. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse sit amet nibh sapien. Nunc non tincidunt erat. Nam non ante tortor.</p>\r\n<p>Vivamus sit amet sem semper, molestie leo gravida, eleifend odio. Cras id lorem nec orci venenatis volutpat. Nam rhoncus viverra diam, ut tempus lorem pharetra ac. Sed dolor justo, tincidunt et eleifend sit amet, finibus quis augue. Aenean cursus hendrerit turpis, ac vehicula nunc finibus in. Ut dignissim nisl ac lectus suscipit, vel cursus orci bibendum. Nam porttitor placerat tellus ut sollicitudin. Maecenas venenatis bibendum semper.</p>', '9437c5b6815ab796b6e1340403ef7dff7dd85b36.jpg', '1', '2016-10-12 15:26:15');
INSERT INTO `post` VALUES ('2', '1', '2016-10-12', 'Invasión de los extraterrestres', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse efficitur fringilla quam eu sollicitudin. Integer maximus, sem vitae gravida euismod, orci turpis dignissim augue, sit amet elementum lacus nisl ut mi. Nam feugiat id mi a gravida. Nunc vestibulum est consectetur, aliquet felis ac, dictum odio. Maecenas accumsan nunc eget tortor placerat semper. Aliquam et ornare purus. Mauris sed sapien et justo malesuada pellentesque. Morbi tincidunt lectus nibh, dictum tincidunt neque luctus sit amet. In varius gravida sem quis malesuada. Phasellus elit enim, congue et placerat et, dapibus tempus eros. Sed eleifend laoreet tellus, nec tincidunt ante feugiat eu. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse sit amet nibh sapien. Nunc non tincidunt erat. Nam non ante tortor.</p>\r\n<p>Vivamus sit amet sem semper, molestie leo gravida, eleifend odio. Cras id lorem nec orci venenatis volutpat. Nam rhoncus viverra diam, ut tempus lorem pharetra ac. Sed dolor justo, tincidunt et eleifend sit amet, finibus quis augue. Aenean cursus hendrerit turpis, ac vehicula nunc finibus in. Ut dignissim nisl ac lectus suscipit, vel cursus orci bibendum. Nam porttitor placerat tellus ut sollicitudin. Maecenas venenatis bibendum semper.</p>', '35980d8f006f5d2194629ed4fb94d93cb0287c0f.jpg', '1', '2016-10-12 00:00:00');
INSERT INTO `post` VALUES ('3', '1', '2016-10-12', 'Ciudad del futuro', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse efficitur fringilla quam eu sollicitudin. Integer maximus, sem vitae gravida euismod, orci turpis dignissim augue, sit amet elementum lacus nisl ut mi. Nam feugiat id mi a gravida. Nunc vestibulum est consectetur, aliquet felis ac, dictum odio. Maecenas accumsan nunc eget tortor placerat semper. Aliquam et ornare purus. Mauris sed sapien et justo malesuada pellentesque. Morbi tincidunt lectus nibh, dictum tincidunt neque luctus sit amet. In varius gravida sem quis malesuada. Phasellus elit enim, congue et placerat et, dapibus tempus eros. Sed eleifend laoreet tellus, nec tincidunt ante feugiat eu. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse sit amet nibh sapien. Nunc non tincidunt erat. Nam non ante tortor.</p>\r\n<p>Vivamus sit amet sem semper, molestie leo gravida, eleifend odio. Cras id lorem nec orci venenatis volutpat. Nam rhoncus viverra diam, ut tempus lorem pharetra ac. Sed dolor justo, tincidunt et eleifend sit amet, finibus quis augue. Aenean cursus hendrerit turpis, ac vehicula nunc finibus in. Ut dignissim nisl ac lectus suscipit, vel cursus orci bibendum. Nam porttitor placerat tellus ut sollicitudin. Maecenas venenatis bibendum semper.</p>', '4638d872f1e6e344ae80768124ed7a7bfa495359.jpg', '1', '2016-10-12 00:00:00');
INSERT INTO `post` VALUES ('4', '1', '2016-10-12', 'Terrorismo en la ciudad', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse efficitur fringilla quam eu sollicitudin. Integer maximus, sem vitae gravida euismod, orci turpis dignissim augue, sit amet elementum lacus nisl ut mi. Nam feugiat id mi a gravida. Nunc vestibulum est consectetur, aliquet felis ac, dictum odio. Maecenas accumsan nunc eget tortor placerat semper. Aliquam et ornare purus. Mauris sed sapien et justo malesuada pellentesque. Morbi tincidunt lectus nibh, dictum tincidunt neque luctus sit amet. In varius gravida sem quis malesuada. Phasellus elit enim, congue et placerat et, dapibus tempus eros. Sed eleifend laoreet tellus, nec tincidunt ante feugiat eu. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse sit amet nibh sapien. Nunc non tincidunt erat. Nam non ante tortor.</p>\r\n<p>Vivamus sit amet sem semper, molestie leo gravida, eleifend odio. Cras id lorem nec orci venenatis volutpat. Nam rhoncus viverra diam, ut tempus lorem pharetra ac. Sed dolor justo, tincidunt et eleifend sit amet, finibus quis augue. Aenean cursus hendrerit turpis, ac vehicula nunc finibus in. Ut dignissim nisl ac lectus suscipit, vel cursus orci bibendum. Nam porttitor placerat tellus ut sollicitudin. Maecenas venenatis bibendum semper.</p>', '11798a965b27c0dbe93f1d1d5a767b3987f6a8e7.jpg', '1', '2016-10-12 00:00:00');

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
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', 'Amsterdam');
INSERT INTO `tags` VALUES ('2', 'Washington');
INSERT INTO `tags` VALUES ('3', 'pepe');
INSERT INTO `tags` VALUES ('4', 'jose');
INSERT INTO `tags` VALUES ('5', 'londo');

-- ----------------------------
-- Table structure for tags_post
-- ----------------------------
DROP TABLE IF EXISTS `tags_post`;
CREATE TABLE `tags_post` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags_post
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'sdepietro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sergio', 'De Pietro', null, null, null, null, null, null);
