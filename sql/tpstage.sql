/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : tpstage

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2018-07-14 17:39:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` varchar(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` char(32) NOT NULL COMMENT '密码',
  `sex` enum('男','女') NOT NULL DEFAULT '男' COMMENT '性别',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `weixin` varchar(60) NOT NULL DEFAULT '' COMMENT '微信号',
  `login_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `add_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', '超级管理员', '96e79218965eb72c92a549dd5a330112', '男', 'admin@163.com', '123456', '7', '2130706433', '2018-07-14 17:07:15', '1', null, '2018-07-14 17:24:18');

-- ----------------------------
-- Table structure for tp_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_group`;
CREATE TABLE `tp_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则","隔开',
  `add_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of tp_auth_group
-- ----------------------------
INSERT INTO `tp_auth_group` VALUES ('1', '总管理员', '1', '1,2,3,4,5,6,7,15,16,17,8,21,22,23,9,18,19,20,10,24,25,26,12,13,14,31', '2018-07-11 19:04:07', '2018-07-14 17:34:21');
INSERT INTO `tp_auth_group` VALUES ('4', '网站管理员', '0', '2,3,4,5', '2018-07-11 19:17:41', '2018-07-14 17:25:31');

-- ----------------------------
-- Table structure for tp_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_group_access`;
CREATE TABLE `tp_auth_group_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  `add_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of tp_auth_group_access
-- ----------------------------
INSERT INTO `tp_auth_group_access` VALUES ('1', '1', '1', null, null);

-- ----------------------------
-- Table structure for tp_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_rule`;
CREATE TABLE `tp_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `icon` char(30) NOT NULL COMMENT '字体图标',
  `sort` tinyint(4) NOT NULL DEFAULT '99' COMMENT '排序',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否为菜单',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_pid` (`name`,`pid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of tp_auth_rule
-- ----------------------------
INSERT INTO `tp_auth_rule` VALUES ('1', '首页', 'Backend/Index/index', '{status}=1', '0', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('2', '系统管理', 'Backend/System/index', '', '0', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('3', '系统配置', 'Backend/System/index', '', '2', '&#xe62e;', '100', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('4', '系统配置', 'Backend/System/index', '', '3', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('5', '屏蔽词', 'Backend/System/outWord', '', '3', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('6', '管理员', 'Backend/Admin/index', '', '2', '&#xe62d;', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('7', '管理员', 'Backend/Admin/index', '', '6', '', '100', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('8', '权限管理', 'Backend/AdminRule/index', '', '6', '', '98', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('9', '角色管理', 'Backend/AdminGroup/index', '', '6', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('10', '角色关联', 'Backend/AdminAccess/index', '', '6', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('12', 'Demo', 'Backend/Demo/index', '', '0', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('13', 'Demo', 'Backend/Demo/index', '', '12', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('14', '表单', 'Backend/Demo/index', '', '13', '', '99', '1', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('15', '管理员-添加', 'Backend/Admin/add', '', '7', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('16', '管理员-修改', 'Backend/Admin/update', '', '7', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('17', '管理员-删除', 'Backend/Admin/del', '', '7', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('18', '角色管理-添加', 'Backend/AdminGroup/add', '', '9', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('19', '角色管理-修改', 'Backend/AdminGroup/update', '', '9', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('20', '角色管理-删除', 'Backend/AdminGroup/del', '', '9', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('21', '权限管理-添加', 'Backend/AdminRule/add', '', '8', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('22', '权限管理-修改', 'Backend/AdminRule/update', '', '8', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('23', '权限管理-删除', 'Backend/AdminRule/del', '', '8', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('24', '角色关联-添加', 'Backend/AdminAccess/add', '', '10', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('25', '角色关联-修改', 'Backend/AdminAccess/update', '', '10', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('26', '角色关联-删除', 'Backend/AdminAccess/del', '', '10', '', '99', '0', '1', null, null);
INSERT INTO `tp_auth_rule` VALUES ('31', '图片上传', 'Backend/Upload/webUpload', '', '0', '', '99', '0', '1', null, null);
