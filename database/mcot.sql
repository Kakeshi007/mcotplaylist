/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mcot

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-17 16:02:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) NOT NULL,
  `uploaddaye` datetime DEFAULT NULL,
  `uploadby` int(11) DEFAULT NULL,
  `stationid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES ('0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `files` VALUES ('17', '5-centimeters-per-second-sky.png', '0000-00-00 00:00:00', '2', '3');
INSERT INTO `files` VALUES ('18', '04 วันเกิด (a day).mp3', '0000-00-00 00:00:00', '2', '3');
INSERT INTO `files` VALUES ('20', '06 ชมรัก.mp3', '0000-00-00 00:00:00', '2', '3');
INSERT INTO `files` VALUES ('22', 'ANGELS - เวทมนตร์ _ lookkonlek official [Lyric Audio] 192kbps.mp3', '0000-00-00 00:00:00', '2', '3');
INSERT INTO `files` VALUES ('23', 'Love Song - ฝุ่น (Big Ass).mp3', '0000-00-00 00:00:00', '2', '3');

-- ----------------------------
-- Table structure for `link`
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `description` varchar(128) DEFAULT NULL COMMENT 'คำอธิบาย',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES ('0', '0', '0');
INSERT INTO `link` VALUES ('1', 'https://apps5.mcot.net/stream998.aac', 'stream998');
INSERT INTO `link` VALUES ('2', 'https://apps4.mcot.net/stream108.aac', 'stream108');

-- ----------------------------
-- Table structure for `playlist`
-- ----------------------------
DROP TABLE IF EXISTS `playlist`;
CREATE TABLE `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playlist` varchar(128) DEFAULT NULL,
  `createby` int(11) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `stationid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `playlist` (`playlist`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of playlist
-- ----------------------------
INSERT INTO `playlist` VALUES ('1', 'เพลงบ้านนอก', '1', '2020-07-15 10:23:00', '2');
INSERT INTO `playlist` VALUES ('2', 'เพลงลูกกรุง', '1', '2020-07-16 12:24:00', '2');

-- ----------------------------
-- Table structure for `playlist_detail`
-- ----------------------------
DROP TABLE IF EXISTS `playlist_detail`;
CREATE TABLE `playlist_detail` (
  `playlistid` int(11) NOT NULL,
  `fileid` int(11) NOT NULL DEFAULT '0',
  `linkid` int(11) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`playlistid`,`fileid`,`linkid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of playlist_detail
-- ----------------------------
INSERT INTO `playlist_detail` VALUES ('1', '0', '1', '2');
INSERT INTO `playlist_detail` VALUES ('1', '19', '0', '1');
INSERT INTO `playlist_detail` VALUES ('1', '20', '0', null);
INSERT INTO `playlist_detail` VALUES ('2', '22', '0', null);
INSERT INTO `playlist_detail` VALUES ('2', '23', '0', null);
