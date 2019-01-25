/*
MySQL Data Transfer
Source Host: localhost
Source Database: honey
Target Host: localhost
Target Database: honey
Date: 27.12.2018 11:28:39
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for main
-- ----------------------------
DROP TABLE IF EXISTS `main`;
CREATE TABLE `main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `main` VALUES ('1', 'Вася', 'vasya@mail.ru', 'Сообщение от Василия Пупкина');
INSERT INTO `main` VALUES ('2', 'Петя', 'petr@mail.ru', 'Сообщение от Петра Пупкина');
INSERT INTO `main` VALUES ('3', 'Саша', 'sasha@mail.ru', 'Сообщение от Александра Пупкина');
INSERT INTO `main` VALUES ('4', 'Галя', 'galya@mail.ru', 'Сообщение от Галины Пупкиной');
