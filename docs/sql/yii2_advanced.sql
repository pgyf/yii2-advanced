/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : yii2_advanced

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-11-07 22:20:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yii2_action_log`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_action_log`;
CREATE TABLE `yii2_action_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `ip` bigint(20) NOT NULL DEFAULT '0',
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `action` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `table_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `old_data` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `app` smallint(6) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `action_log_index_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_action_log
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_admin`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_admin`;
CREATE TABLE `yii2_admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '账号',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `nickname` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '昵称',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'auth_key',
  `access_token` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'access_token',
  `created_uid` bigint(20) NOT NULL DEFAULT '0' COMMENT '创建人',
  `updated_uid` bigint(20) NOT NULL DEFAULT '0' COMMENT '更新人',
  `login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最近登录IP',
  `login_at` int(11) NOT NULL DEFAULT '0' COMMENT '最近登录时间',
  `deleted_at` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  `created_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '创建IP',
  `updated_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '更新IP',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '状态',
  `blocked_at` int(11) NOT NULL DEFAULT '0' COMMENT '锁定时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_unique_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员表';

-- ----------------------------
-- Records of yii2_admin
-- ----------------------------
INSERT INTO `yii2_admin` VALUES ('1', 'root', '$2y$13$CZnwZMiXt4T.DXkcjaeXtudk1.NX5.Tth5WJlZGVDYsvhw7piZBmS', '系统管理员', 'WIDJ0PFNHP91_m4xkA7ZCeBebvAGcz_Q', 'pzaj8pMejOxII0naI_d5GbU03IPh3NYV', '0', '0', '0', '0', '0', '1476112473', '1476112473', '0', '0', '0', '0');
INSERT INTO `yii2_admin` VALUES ('2', 'admin', '$2y$13$CZnwZMiXt4T.DXkcjaeXtudk1.NX5.Tth5WJlZGVDYsvhw7piZBmS', '管理员', 'cgz9I0c0E2TXLp-fD-P78GNv4viS42EA', 'Vid2d3BXgSDjpccHMI_FoZFYIaCsIkUA', '0', '0', '0', '0', '0', '1476112473', '1476112473', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `yii2_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_admin_log`;
CREATE TABLE `yii2_admin_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '路由',
  `description` text COLLATE utf8_unicode_ci COMMENT '描述',
  `created_at` int(11) NOT NULL COMMENT '操作时间',
  `uid` bigint(20) NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `created_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '操作IP',
  PRIMARY KEY (`id`),
  KEY `admin_log_index_uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员操作日志表';

-- ----------------------------
-- Records of yii2_admin_log
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_admin_login`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_admin_login`;
CREATE TABLE `yii2_admin_login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '账号',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `user_agent` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'user_agent',
  `success` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否成功',
  `app` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '应用',
  `ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '登录IP',
  `created_at` int(11) NOT NULL COMMENT '登录时间',
  `device` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '设备',
  PRIMARY KEY (`id`),
  KEY `admin_login_index_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员登录表';

-- ----------------------------
-- Records of yii2_admin_login
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_admin_menu`;
CREATE TABLE `yii2_admin_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `label` varchar(128) NOT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `route` varchar(256) NOT NULL DEFAULT '',
  `icon` varchar(128) NOT NULL DEFAULT '',
  `order` bigint(20) DEFAULT '0',
  `data` text,
  `description` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `yii2_admin_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `yii2_admin_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii2_admin_menu
-- ----------------------------
INSERT INTO `yii2_admin_menu` VALUES ('1', 'backend-rbac', '权限管理', null, '/rbac/assignment/index', 'user', '1', null, '基于角色的访问控制');
INSERT INTO `yii2_admin_menu` VALUES ('2', 'backend-system', '系统管理', null, '#', 'arrows', '0', null, '系统管理');
INSERT INTO `yii2_admin_menu` VALUES ('3', 'backend-system-settings', '设置', '2', '/site/settings', 'bug', '0', null, '设置');

-- ----------------------------
-- Table structure for `yii2_auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_assignment`;
CREATE TABLE `yii2_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `yii2_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_auth_assignment
-- ----------------------------
INSERT INTO `yii2_auth_assignment` VALUES ('admin', '2', '1448081197');
INSERT INTO `yii2_auth_assignment` VALUES ('superAdmin', '1', '1448081174');

-- ----------------------------
-- Table structure for `yii2_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_item`;
CREATE TABLE `yii2_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `yii2_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `yii2_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_auth_item
-- ----------------------------
INSERT INTO `yii2_auth_item` VALUES ('/*', '2', null, null, null, '1448080969', '1448080969');
INSERT INTO `yii2_auth_item` VALUES ('/admin/*', '2', null, null, null, '1448080207', '1448080207');
INSERT INTO `yii2_auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/captcha', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/error', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/login', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/logout', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/cache/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/cache/flush-cache', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/cache/flush-cache-key', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/cache/flush-cache-tag', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/cache/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/debug/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/gii/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/site/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/site/captcha', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/site/error', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/site/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/site/login', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/site/logout', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/site/settings', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/user/*', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/user/create', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/user/delete', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/user/index', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/user/update', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('/user/view', '2', null, null, null, '1467797758', '1467797758');
INSERT INTO `yii2_auth_item` VALUES ('admin', '1', '管理员', null, null, '1448081096', '1448081096');
INSERT INTO `yii2_auth_item` VALUES ('superAdmin', '1', '超级管理员', null, null, '1448081039', '1448081039');

-- ----------------------------
-- Table structure for `yii2_auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_item_child`;
CREATE TABLE `yii2_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `yii2_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii2_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_auth_item_child
-- ----------------------------
INSERT INTO `yii2_auth_item_child` VALUES ('admin', '/*');
INSERT INTO `yii2_auth_item_child` VALUES ('superAdmin', '/*');

-- ----------------------------
-- Table structure for `yii2_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_auth_rule`;
CREATE TABLE `yii2_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_key_storage_item`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_key_storage_item`;
CREATE TABLE `yii2_key_storage_item` (
  `key` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `create_user` bigint(20) NOT NULL DEFAULT '0',
  `update_user` bigint(20) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `idx_key_storage_item_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_key_storage_item
-- ----------------------------
INSERT INTO `yii2_key_storage_item` VALUES ('frontend.maintenance', '1', '前台维护模式', '2', '2', '1467780750', '1467785371');
INSERT INTO `yii2_key_storage_item` VALUES ('backend.theme-skin', 'skin-blue', '后台皮肤', '2', '2', '1467780750', '1474907574');
INSERT INTO `yii2_key_storage_item` VALUES ('backend.layout-fixed', '0', '后台固定布局', '2', '2', '1467780750', '1467784791');
INSERT INTO `yii2_key_storage_item` VALUES ('backend.layout-boxed', '0', '后台框布局', '2', '2', '1467780750', '1467787439');
INSERT INTO `yii2_key_storage_item` VALUES ('backend.layout-collapsed-sidebar', '0', '后台隐藏侧边栏', '2', '2', '1467780750', '1467786830');
INSERT INTO `yii2_key_storage_item` VALUES ('backend.layout-sidebar-mini', '0', '后台迷你侧边栏', '1', '1', '1467808569', '1467808581');

-- ----------------------------
-- Table structure for `yii2_migration`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_migration`;
CREATE TABLE `yii2_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii2_migration
-- ----------------------------
INSERT INTO `yii2_migration` VALUES ('m000000_000000_base', '1446133226');
INSERT INTO `yii2_migration` VALUES ('m130524_201442_init', '1446372681');
INSERT INTO `yii2_migration` VALUES ('m140602_111327_create_menu_table', '1446281013');
INSERT INTO `yii2_migration` VALUES ('m140506_102106_rbac_init', '1446372682');
INSERT INTO `yii2_migration` VALUES ('m160321_160629_create_module_table', '1458576858');
INSERT INTO `yii2_migration` VALUES ('m160529_145625_key_storage_item', '1464534924');
INSERT INTO `yii2_migration` VALUES ('m160712_035418_create_log_table', '1468855776');
INSERT INTO `yii2_migration` VALUES ('m160927_152235_create_admin_table', '1476112473');

-- ----------------------------
-- Table structure for `yii2_module`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_module`;
CREATE TABLE `yii2_module` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci,
  `notice` int(11) DEFAULT '0',
  `order_num` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT '0',
  `create_user` bigint(20) NOT NULL DEFAULT '0',
  `update_user` bigint(20) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_ip` bigint(20) NOT NULL DEFAULT '0',
  `update_ip` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_module
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_system_log`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_system_log`;
CREATE TABLE `yii2_system_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `level` int(11) DEFAULT NULL COMMENT '等级',
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类别',
  `log_time` int(11) DEFAULT NULL COMMENT '日志时间',
  `prefix` text COLLATE utf8_unicode_ci COMMENT '前缀',
  `message` text COLLATE utf8_unicode_ci COMMENT '消息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统日志表';

-- ----------------------------
-- Records of yii2_system_log
-- ----------------------------

-- ----------------------------
-- Table structure for `yii2_user`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_user`;
CREATE TABLE `yii2_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `create_form_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_aouth_app` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_app` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_device` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_user` bigint(20) NOT NULL DEFAULT '0',
  `update_user` bigint(20) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_ip` bigint(20) NOT NULL DEFAULT '0',
  `update_ip` bigint(20) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '0',
  `login_ip` bigint(20) NOT NULL DEFAULT '0',
  `login_time` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_user
-- ----------------------------
INSERT INTO `yii2_user` VALUES ('1', '100', 'admini', null, null, '$2y$13$CZnwZMiXt4T.DXkcjaeXtudk1.NX5.Tth5WJlZGVDYsvhw7piZBmS', 'PwOCgkheRBcsFT1j2FiKVDLTpCuxL-wb', '', '', '0', '0', '0', '0', '0', '1446372681', '1446372681', '0', '0', '10', '0', '0', '0');
INSERT INTO `yii2_user` VALUES ('2', '99', 'admin', null, null, '$2y$13$tWO8oFeN7upi5I9Df7F9Se0xqODznKpFMtDeSXOzCwZSJUegW84iO', 'hblhO8UAo9U7LNUtnADmpzZGXcAm3YGZ', '', '', '0', '0', '0', '0', '2', '1446372681', '1475944437', '0', '0', '10', '2130706433', '1478525208', '0');

-- ----------------------------
-- Table structure for `yii2_user_login`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_user_login`;
CREATE TABLE `yii2_user_login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `success` smallint(6) NOT NULL DEFAULT '0',
  `app` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ip` bigint(20) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `device` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_login_index_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_user_login
-- ----------------------------
INSERT INTO `yii2_user_login` VALUES ('137', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1469714600', 'computer');
INSERT INTO `yii2_user_login` VALUES ('138', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1469715870', 'computer');
INSERT INTO `yii2_user_login` VALUES ('139', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1469716154', 'computer');
INSERT INTO `yii2_user_login` VALUES ('140', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1469717693', 'computer');
INSERT INTO `yii2_user_login` VALUES ('141', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1469934519', 'computer');
INSERT INTO `yii2_user_login` VALUES ('142', 'admin', '1111111', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '0', 'admin', '2130706433', '1470068474', 'computer');
INSERT INTO `yii2_user_login` VALUES ('143', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1470068484', 'computer');
INSERT INTO `yii2_user_login` VALUES ('144', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1470123302', 'computer');
INSERT INTO `yii2_user_login` VALUES ('145', 'admin', '111111', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '0', 'admin', '2130706433', '1470129494', 'computer');
INSERT INTO `yii2_user_login` VALUES ('146', 'admin', '1111111', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '0', 'admin', '2130706433', '1470129596', 'computer');
INSERT INTO `yii2_user_login` VALUES ('147', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1470129612', 'computer');
INSERT INTO `yii2_user_login` VALUES ('148', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1470279796', 'computer');
INSERT INTO `yii2_user_login` VALUES ('149', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1474902102', 'computer');
INSERT INTO `yii2_user_login` VALUES ('150', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1474983792', 'computer');
INSERT INTO `yii2_user_login` VALUES ('151', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1475166364', 'computer');
INSERT INTO `yii2_user_login` VALUES ('152', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1475943894', 'computer');
INSERT INTO `yii2_user_login` VALUES ('153', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1475944396', 'computer');
INSERT INTO `yii2_user_login` VALUES ('154', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1476020057', 'computer');
INSERT INTO `yii2_user_login` VALUES ('155', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1476112203', 'computer');
INSERT INTO `yii2_user_login` VALUES ('156', 'admin', '000000', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '0', 'admin', '2130706433', '1478525199', 'computer');
INSERT INTO `yii2_user_login` VALUES ('157', 'admin', '******', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1', 'admin', '2130706433', '1478525208', 'computer');

-- ----------------------------
-- Table structure for `yii2_user_profile`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_user_profile`;
CREATE TABLE `yii2_user_profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `nickname` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` smallint(6) NOT NULL DEFAULT '0',
  `birthday` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `update_user` bigint(20) NOT NULL,
  `update_time` int(11) NOT NULL,
  `update_ip` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_profile_unique_user_id` (`user_id`),
  CONSTRAINT `user_profile_fk_user` FOREIGN KEY (`user_id`) REFERENCES `yii2_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_user_profile
-- ----------------------------
INSERT INTO `yii2_user_profile` VALUES ('1', '1', '系统管理员', '', '0', '0', '', '0', '2015', '0');
INSERT INTO `yii2_user_profile` VALUES ('2', '2', '管理员', '', '1', '0', '', '2', '1475944437', '2130706433');

-- ----------------------------
-- Table structure for `yii2_user_token`
-- ----------------------------
DROP TABLE IF EXISTS `yii2_user_token`;
CREATE TABLE `yii2_user_token` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verifies` smallint(6) NOT NULL DEFAULT '0',
  `expires_time` int(11) NOT NULL,
  `verifies_time` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_token_unique_token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii2_user_token
-- ----------------------------
