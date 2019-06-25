/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : oopmvc

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2015-01-07 03:25:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `students`
-- ----------------------------
-- DROP TABLE IF EXISTS `students`;
-- CREATE TABLE `students` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `fullname` varchar(100) DEFAULT NULL,
--   `address` varchar(255) DEFAULT NULL,
--   `phone` varchar(20) DEFAULT NULL,
--   `photo` varchar(255) DEFAULT NULL,
--   `classname` varchar(100) DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
-- INSERT INTO `students` VALUES ('14', 'Modi Bixa 1', '61 Le Van Si - Hoa Minh -Lien Chieu', '+84123456789', '142057575862770.jpg', '04T2');
-- INSERT INTO `students` VALUES ('15', 'Modi bixa 2', '61 Le Van Si - Hoa Minh -Lien Chieu', '+84123456789', '142057577628814.jpg', '04T1');
-- INSERT INTO `students` VALUES ('16', 'Modi bixa 3', '61 Le Van Si - Hoa Minh -Lien Chieu', '+84123456789', '142057579643359.jpg', '04T2');
-- INSERT INTO `students` VALUES ('17', 'Modi Bixa 4', '61 Le Van Si - Hoa Minh -Lien Chieu', '+84123456789', '142057582214441.jpg', '04T2');



DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` INT(11) NOT NULL,
  `username` varchar(30) DEFAULT NOT NULL,
  `password` varchar(10) DEFAULT NOT NULL,
  `email` varchar(50) DEFAULT NOT NULL,
  `fullname` varchar(50) DEFAULT NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `users` (username, password, email, fullname) VALUES ('Admin', '1', 'nkh1111202@gmail.com', 'Khánh Hà');

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(1000) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  FOREIGN KEY fk_user(`user_id`)
  REFERENCES `users`(`id`)
  ON UPDATE CASCADE
  ON DELETE RESTRICT
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


-- INSERT INTO `blogs` (title, content, user_id) VALUES ('Mongo Schema convention', 'clean code', 19);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
    
  FOREIGN KEY fk_user(`user_id`)
  REFERENCES `users`(`id`)
  ON UPDATE CASCADE
  ON DELETE RESTRICT,
    
  FOREIGN KEY fk_blog(`blog_id`)
  REFERENCES `blogs`(`id`)
  ON UPDATE CASCADE
  ON DELETE RESTRICT,
    
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `reactions`;
CREATE TABLE `reactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `reaction` boolean DEFAULT NULL,
    
  FOREIGN KEY fk_user(`user_id`)
  REFERENCES `users`(`id`)
  ON UPDATE CASCADE
  ON DELETE RESTRICT,
    
  FOREIGN KEY fk_blog(`blog_id`)
  REFERENCES `blogs`(`id`)
  ON UPDATE CASCADE
  ON DELETE RESTRICT,
    
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
