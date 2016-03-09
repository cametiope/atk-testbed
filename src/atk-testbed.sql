/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50627
 Source Host           : localhost
 Source Database       : atk-testbed

 Target Server Type    : MySQL
 Target Server Version : 50627
 File Encoding         : utf-8

 Date: 03/09/2016 15:49:44 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `AccessRights`
-- ----------------------------
DROP TABLE IF EXISTS `AccessRights`;
CREATE TABLE `AccessRights` (
  `node` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`node`,`action`,`group_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `accessrights_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `Groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `Groups`
-- ----------------------------
DROP TABLE IF EXISTS `Groups`;
CREATE TABLE `Groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `TestNode`
-- ----------------------------
DROP TABLE IF EXISTS `TestNode`;
CREATE TABLE `TestNode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `name2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `Users`
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `Users_Groups`
-- ----------------------------
DROP TABLE IF EXISTS `Users_Groups`;
CREATE TABLE `Users_Groups` (
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `testbed_M2MNode`
-- ----------------------------
DROP TABLE IF EXISTS `testbed_M2MNode`;
CREATE TABLE `testbed_M2MNode` (
  `playground_id` int(11) NOT NULL,
  `remotetable_id` int(11) NOT NULL,
  PRIMARY KEY (`playground_id`,`remotetable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `testbed_M2ONode`
-- ----------------------------
DROP TABLE IF EXISTS `testbed_M2ONode`;
CREATE TABLE `testbed_M2ONode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `m2o_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `testbed_O2MNode`
-- ----------------------------
DROP TABLE IF EXISTS `testbed_O2MNode`;
CREATE TABLE `testbed_O2MNode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `playground_id` int(11) NOT NULL,
  `o2m_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `testbed_O2ONode`
-- ----------------------------
DROP TABLE IF EXISTS `testbed_O2ONode`;
CREATE TABLE `testbed_O2ONode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `playground_id` int(11) DEFAULT NULL,
  `o2o_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `testbed_Playground`
-- ----------------------------
DROP TABLE IF EXISTS `testbed_Playground`;
CREATE TABLE `testbed_Playground` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Attribute` varchar(255) DEFAULT NULL,
  `BoolAttribute` int(1) unsigned DEFAULT '0',
  `CkAttribute` text,
  `ColorPickerAttribute` varchar(30) DEFAULT NULL,
  `CountryAttribute` varchar(100) DEFAULT NULL,
  `CreatedByAttribute` int(11) DEFAULT NULL,
  `CreateStampAttribute` datetime DEFAULT NULL,
  `CurrencyAttribute` float(10,2) DEFAULT NULL,
  `DateAttribute` date DEFAULT NULL,
  `DateTimeAttribute` datetime DEFAULT NULL,
  `DurationAttribute` int(11) DEFAULT NULL,
  `EmailAttribute` varchar(255) DEFAULT NULL,
  `FileAttribute` varchar(255) DEFAULT NULL,
  `FileWriterAttribute` text,
  `FlagAttribute` int(11) DEFAULT NULL,
  `FormatAttribute` varchar(255) DEFAULT NULL,
  `HiddenAttribute` varchar(255) DEFAULT NULL,
  `HtmlAttribute` text,
  `IpAttribute` varchar(20) DEFAULT NULL,
  `ListAttribute` varchar(20) DEFAULT NULL,
  `LiveTextPreviewAttributeMaster` varchar(255) DEFAULT NULL,
  `MultipleFileAttribute` text,
  `MultiSelectAttribute` text,
  `NumberAttribute` float(10,2) DEFAULT NULL,
  `PasswordAttribute` varchar(255) DEFAULT NULL,
  `RadioAttribute` varchar(255) DEFAULT NULL,
  `RadioDetailsAttribute` varchar(255) DEFAULT NULL,
  `RadioDetailsAttributeDetail2` varchar(255) DEFAULT NULL,
  `StateAttribute` varchar(255) DEFAULT NULL,
  `SwitchAttribute` int(1) unsigned NOT NULL DEFAULT '0',
  `TextAttribute` text,
  `TimeAttribute` time DEFAULT NULL,
  `TimeZoneAttribute` varchar(255) DEFAULT NULL,
  `UpdatedByAttribute` int(11) DEFAULT NULL,
  `UpdateStampAttribute` datetime DEFAULT NULL,
  `UrlAttribute` text,
  `WeekdayAttribute` int(11) DEFAULT NULL,
  `ManyToOneRelation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
