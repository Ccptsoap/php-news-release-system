/*
Navicat MySQL Data Transfer

Source Server         : news
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : news

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-06-07 23:34:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ctext` text,
  `ctime` datetime DEFAULT NULL,
  `cuser` varchar(100) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '好漂亮啊，怎么能这么厉害呢？', '2018-01-04 16:03:35', 'wen', '10');
INSERT INTO `comment` VALUES ('2', '这个新闻是什么啊，不行啊，这个。', '2018-01-04 16:03:37', 'wen', '10');
INSERT INTO `comment` VALUES ('3', '终于弄完了呢！', '2018-01-06 13:20:22', 'wen', '10');
INSERT INTO `comment` VALUES ('4', '再来一次', '2018-01-06 13:21:29', 'wen', '10');
INSERT INTO `comment` VALUES ('5', 'again', '2018-01-06 13:26:45', 'wen', '10');
INSERT INTO `comment` VALUES ('6', '我是沙发哦！耶Y', '2018-01-06 13:30:25', 'wen', '9');
INSERT INTO `comment` VALUES ('7', '哈 我又是沙发！！！', '2018-01-06 15:41:25', 'wen', '2');
INSERT INTO `comment` VALUES ('8', '为什么没换行呢？', '2018-01-06 16:21:37', 'wen', '12');
INSERT INTO `comment` VALUES ('9', '哈哈，完美', '2018-01-06 17:07:59', 'wen', '12');
INSERT INTO `comment` VALUES ('10', 'wa', '2018-01-07 10:02:01', '222', '12');
INSERT INTO `comment` VALUES ('11', '随便吧', '2018-01-13 09:18:08', 'abc', '12');

-- ----------------------------
-- Table structure for news
-- ----------------------------
/*DROP TABLE IF EXISTS `news`;*/
CREATE TABLE `news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `cre_date` datetime DEFAULT NULL,
  `click` int(11) DEFAULT '0',
  `category` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '请问', '地方', '2018-01-03 02:31:41', '1', '体育新闻');
INSERT INTO `news` VALUES ('2', '撒旦', '许地方', '2018-01-03 02:38:39', '664', '经济新闻');
INSERT INTO `news` VALUES ('3', '水电费', '规划', '2018-01-03 02:41:17', '2', '时政新闻');
INSERT INTO `news` VALUES ('5', '浮点数', '吃v不放过', '2018-01-03 03:06:03', '0', '体育新闻');
INSERT INTO `news` VALUES ('6', '水电费', '建行卡', '2018-01-03 03:06:54', '666', '国际新闻');
INSERT INTO `news` VALUES ('9', '法国货', '规划', '2018-01-03 03:09:22', '2', '国际新闻');
INSERT INTO `news` VALUES ('10', '该回家', '滑稽', '2018-01-03 03:09:46', '24', '国际新闻');
INSERT INTO `news` VALUES ('12', '我回家了', '文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本\r\n文本文本文本文本文本文本文本文本文本\r\n文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本\r\n文本文本文本文本文本文本文本文本文本\r\n文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本\r\n文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本\r\n文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本\r\n文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本\r\n\r\n\r\n文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本\r\n\r\n文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本', '2018-01-06 15:01:07', '33', '军事新闻');
INSERT INTO `news` VALUES ('13', 'TEST', '第1行\r\n第2行\r\n第3行\r\n第4行\r\n第5行\r\n第6行\r\n第7行\r\n第8行第8行第8行\r\n第9行\r\n第10行\r\n第11行', '2018-01-06 16:24:12', '26', '军事新闻');
INSERT INTO `news` VALUES ('25', 'fgh', 'fgh', '2018-01-07 01:06:24', '0', '国际新闻');
INSERT INTO `news` VALUES ('26', '1111', '11111', '2018-01-07 10:06:27', '0', '时政新闻');

-- ----------------------------
-- Table structure for recycle
-- ----------------------------
DROP TABLE IF EXISTS `recycle`;
CREATE TABLE `recycle` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `cre_date` datetime DEFAULT NULL,
  `click` int(11) DEFAULT '0',
  `category` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recycle
-- ----------------------------
INSERT INTO `recycle` VALUES ('9', '电视里看见饭', '的说法交流空间可怜虫\r\n进来的\r\n都放假了', '2018-01-13 09:12:50', '1', '国际新闻');

-- ----------------------------
-- Table structure for root
-- ----------------------------
DROP TABLE IF EXISTS `root`;
CREATE TABLE `root` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of root
-- ----------------------------
INSERT INTO `root` VALUES ('1', 'admin', '123');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('17', 'zhengmingyuan', '123456', '12345124@qq.com');
INSERT INTO `user` VALUES ('16', 'dsf', 'sdf', 'asd@sda.com');
INSERT INTO `user` VALUES ('15', 'qwe', 'qwe', 'asd@sda.com');
INSERT INTO `user` VALUES ('14', 'sdf ', 'sdf', 'zmy@zmy');
INSERT INTO `user` VALUES ('18', 'wen', '123', 'b824@outlook.com');
INSERT INTO `user` VALUES ('20', '222', '2222', '123@qq');
INSERT INTO `user` VALUES ('21', 'wang', 'wang', '1223@qq.com');
