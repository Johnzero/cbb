/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : thinkcmf

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-02-06 15:05:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_access
-- ----------------------------
DROP TABLE IF EXISTS `sp_access`;
CREATE TABLE `sp_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `g` varchar(20) NOT NULL COMMENT '项目',
  `m` varchar(20) NOT NULL COMMENT '模块',
  `a` varchar(20) NOT NULL COMMENT '方法',
  KEY `groupId` (`role_id`),
  KEY `gma` (`g`,`m`,`a`,`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_access
-- ----------------------------
INSERT INTO `sp_access` VALUES ('2', 'Admin', 'Content', 'default');
INSERT INTO `sp_access` VALUES ('2', 'Admin', 'Setting', 'default');
INSERT INTO `sp_access` VALUES ('2', 'Admin', 'Setting', 'password');
INSERT INTO `sp_access` VALUES ('2', 'Admin', 'Setting', 'password_post');
INSERT INTO `sp_access` VALUES ('2', 'Admin', 'Setting', 'userdefault');
INSERT INTO `sp_access` VALUES ('2', 'Admin', 'User', 'userinfo');
INSERT INTO `sp_access` VALUES ('2', 'Admin', 'User', 'userinfo_post');
INSERT INTO `sp_access` VALUES ('2', 'Api', 'Guestbookadmin', 'delete');
INSERT INTO `sp_access` VALUES ('2', 'Api', 'Guestbookadmin', 'index');
INSERT INTO `sp_access` VALUES ('2', 'Comment', 'Commentadmin', 'check');
INSERT INTO `sp_access` VALUES ('2', 'Comment', 'Commentadmin', 'delete');
INSERT INTO `sp_access` VALUES ('2', 'Comment', 'Commentadmin', 'index');

-- ----------------------------
-- Table structure for sp_ad
-- ----------------------------
DROP TABLE IF EXISTS `sp_ad`;
CREATE TABLE `sp_ad` (
  `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL,
  `ad_content` text,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  PRIMARY KEY (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_ad
-- ----------------------------
INSERT INTO `sp_ad` VALUES ('1', '一', '', '1');

-- ----------------------------
-- Table structure for sp_asset
-- ----------------------------
DROP TABLE IF EXISTS `sp_asset`;
CREATE TABLE `sp_asset` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `unique` varchar(14) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `filepath` varchar(200) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `meta` text,
  `suffix` varchar(50) DEFAULT NULL,
  `download_times` int(6) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_asset
-- ----------------------------

-- ----------------------------
-- Table structure for sp_comments
-- ----------------------------
DROP TABLE IF EXISTS `sp_comments`;
CREATE TABLE `sp_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_table` varchar(100) NOT NULL COMMENT '评论内容所在表，不带表前缀',
  `post_id` int(11) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL COMMENT '原文地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL COMMENT '评论内容',
  `type` smallint(1) NOT NULL DEFAULT '1' COMMENT '评论类型；1实名评论',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `path` varchar(500) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`post_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `comment_parent` (`parentid`),
  KEY `table_id_status` (`post_table`,`post_id`,`status`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_comments
-- ----------------------------
INSERT INTO `sp_comments` VALUES ('1', 'posts', '1', 'index.php?g=&amp;m=article&amp;a=index&amp;id=1', '1', '0', 'admin', 'wangsong12332@sina.com', '2015-01-08 10:45:30', 'asdasd', '1', '0', '0-1', '1');
INSERT INTO `sp_comments` VALUES ('2', 'posts', '2', 'index.php?g=&amp;m=article&amp;a=index&amp;id=2', '3', '0', 'test', 'wangsong123327212126@126.com', '2015-01-14 14:18:39', 'asd', '1', '0', '0-2', '1');

-- ----------------------------
-- Table structure for sp_common_action_log
-- ----------------------------
DROP TABLE IF EXISTS `sp_common_action_log`;
CREATE TABLE `sp_common_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip',
  PRIMARY KEY (`id`),
  KEY `user_object_action` (`user`,`object`,`action`),
  KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_common_action_log
-- ----------------------------
INSERT INTO `sp_common_action_log` VALUES ('1', '1', 'posts1', 'Portal-Article-do_like', '3', '1420685114', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('2', '1', 'posts1', 'Portal-Article-index', '1', '1420685127', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('3', '0', 'posts1', 'Portal-Article-index', '1', '1420685138', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('4', '0', 'posts2', 'Portal-Article-index', '6', '1421218604', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('5', '3', 'posts2', 'Portal-Article-index', '78', '1421222654', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('6', '3', 'posts2', 'Portal-Article-do_like', '4', '1421216305', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('7', '3', 'posts', 'Portal-Article-index', '10', '1421222594', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('8', '3', 'posts37', 'Portal-Article-index', '1', '1421220889', '0.0.0.0');
INSERT INTO `sp_common_action_log` VALUES ('9', '4', 'posts2', 'Portal-Article-index', '1', '1421395205', '0.0.0.0');

-- ----------------------------
-- Table structure for sp_company
-- ----------------------------
DROP TABLE IF EXISTS `sp_company`;
CREATE TABLE `sp_company` (
  `id` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `location` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `tel` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `contact` varchar(100) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `ctel` varchar(50) DEFAULT NULL COMMENT '生日',
  `email` varchar(100) DEFAULT NULL COMMENT '个性签名',
  `code` varchar(50) NOT NULL COMMENT '最后登录ip',
  `code_pic` varchar(100) NOT NULL COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `group` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `group_pic` varchar(100) DEFAULT NULL COMMENT '用户角色id',
  `authorize` int(10) unsigned zerofill DEFAULT NULL,
  `tip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sp_company
-- ----------------------------

-- ----------------------------
-- Table structure for sp_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `sp_guestbook`;
CREATE TABLE `sp_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL COMMENT '留言者姓名',
  `email` varchar(100) NOT NULL COMMENT '留言者邮箱',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `msg` text NOT NULL COMMENT '留言内容',
  `createtime` datetime NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_guestbook
-- ----------------------------
INSERT INTO `sp_guestbook` VALUES ('1', 'zero', 'wangson@12.com', '123123', 'asdfasf', '2015-01-08 11:09:51', '1');

-- ----------------------------
-- Table structure for sp_links
-- ----------------------------
DROP TABLE IF EXISTS `sp_links`;
CREATE TABLE `sp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT '',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_links
-- ----------------------------

-- ----------------------------
-- Table structure for sp_menu
-- ----------------------------
DROP TABLE IF EXISTS `sp_menu`;
CREATE TABLE `sp_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `data` char(50) NOT NULL COMMENT '额外参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) DEFAULT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `parentid` (`parentid`),
  KEY `model` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=589 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_menu
-- ----------------------------
INSERT INTO `sp_menu` VALUES ('239', '0', 'Admin', 'Setting', 'default', '', '0', '1', '设置', 'cogs', '', '0');
INSERT INTO `sp_menu` VALUES ('51', '0', 'Admin', 'Content', 'default', '', '0', '1', '内容管理', 'th', '', '10');
INSERT INTO `sp_menu` VALUES ('245', '51', 'Portal', 'AdminTerm', 'index', '', '0', '1', '分类管理', '', '', '2');
INSERT INTO `sp_menu` VALUES ('299', '260', 'Api', 'Oauthadmin', 'setting', '', '1', '1', '第三方登陆', 'leaf', '', '4');
INSERT INTO `sp_menu` VALUES ('252', '239', 'Admin', 'Setting', 'userdefault', '', '0', '1', '个人信息', '', '', '0');
INSERT INTO `sp_menu` VALUES ('253', '252', 'Admin', 'User', 'userinfo', '', '1', '1', '修改信息', '', '', '0');
INSERT INTO `sp_menu` VALUES ('254', '252', 'Admin', 'Setting', 'password', '', '1', '1', '修改密码', '', '', '0');
INSERT INTO `sp_menu` VALUES ('260', '0', 'Admin', 'Extension', 'default', '', '0', '1', '扩展工具', 'cloud', '', '30');
INSERT INTO `sp_menu` VALUES ('262', '260', 'Admin', 'Slide', 'default', '', '1', '1', '幻灯片', '', '', '1');
INSERT INTO `sp_menu` VALUES ('264', '262', 'Admin', 'Slide', 'index', '', '1', '1', '幻灯片管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('265', '260', 'Admin', 'Ad', 'index', '', '1', '1', '网站广告', '', '', '2');
INSERT INTO `sp_menu` VALUES ('268', '262', 'Admin', 'Slidecat', 'index', '', '1', '1', '幻灯片分类', '', '', '0');
INSERT INTO `sp_menu` VALUES ('270', '260', 'Admin', 'Link', 'index', '', '0', '1', '友情链接', '', '', '3');
INSERT INTO `sp_menu` VALUES ('277', '51', 'Portal', 'AdminPage', 'index', '', '1', '1', '页面管理', '', '', '3');
INSERT INTO `sp_menu` VALUES ('301', '300', 'Portal', 'AdminPage', 'recyclebin', '', '1', '1', '页面回收', '', '', '1');
INSERT INTO `sp_menu` VALUES ('302', '300', 'Portal', 'AdminPost', 'recyclebin', '', '1', '1', '文章回收', '', '', '0');
INSERT INTO `sp_menu` VALUES ('300', '51', 'Admin', 'Recycle', 'default', '', '1', '1', '回收站', '', '', '4');
INSERT INTO `sp_menu` VALUES ('284', '239', 'Admin', 'Setting', 'site', '', '1', '1', '网站信息', '', '', '0');
INSERT INTO `sp_menu` VALUES ('285', '51', 'Portal', 'AdminPost', 'index', '', '1', '1', '文章管理', '', '', '1');
INSERT INTO `sp_menu` VALUES ('286', '0', 'User', 'Indexadmin', 'default', '', '1', '1', '用户管理', 'group', '', '0');
INSERT INTO `sp_menu` VALUES ('287', '289', 'User', 'Indexadmin', 'index', '', '1', '1', '本站用户', 'leaf', '', '0');
INSERT INTO `sp_menu` VALUES ('288', '289', 'User', 'Oauthadmin', 'index', '', '1', '1', '第三方用户', 'leaf', '', '0');
INSERT INTO `sp_menu` VALUES ('289', '286', 'User', 'Indexadmin', 'default1', '', '1', '1', '用户组', '', '', '0');
INSERT INTO `sp_menu` VALUES ('290', '286', 'User', 'Indexadmin', 'default3', '', '1', '1', '管理组', '', '', '0');
INSERT INTO `sp_menu` VALUES ('291', '290', 'Admin', 'Rbac', 'index', '', '1', '1', '角色管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('292', '290', 'Admin', 'User', 'index', '', '1', '1', '管理员', '', '', '0');
INSERT INTO `sp_menu` VALUES ('293', '0', 'Admin', 'Menu', 'default', '', '1', '1', '菜单管理', 'list', '', '0');
INSERT INTO `sp_menu` VALUES ('294', '293', 'Admin', 'Navcat', 'default1', '', '1', '1', '前台菜单', '', '', '0');
INSERT INTO `sp_menu` VALUES ('295', '294', 'Admin', 'Nav', 'index', '', '1', '1', '菜单管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('296', '294', 'Admin', 'Navcat', 'index', '', '1', '1', '菜单分类', '', '', '0');
INSERT INTO `sp_menu` VALUES ('297', '293', 'Admin', 'Menu', 'index', '', '1', '1', '后台菜单', '', '', '0');
INSERT INTO `sp_menu` VALUES ('298', '239', 'Admin', 'Setting', 'clearcache', '', '1', '1', '清除缓存', '', '', '1');
INSERT INTO `sp_menu` VALUES ('319', '260', 'Admin', 'Backup', 'default', '', '1', '1', '备份管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('480', '292', 'Admin', 'User', 'delete', '', '1', '0', '删除管理员', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('479', '292', 'Admin', 'User', 'edit', '', '1', '0', '管理员编辑', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('478', '292', 'Admin', 'User', 'add', '', '1', '0', '管理员添加', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('477', '245', 'Portal', 'AdminTerm', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('476', '245', 'Portal', 'AdminTerm', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('475', '245', 'Portal', 'AdminTerm', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('474', '268', 'Admin', 'Slidecat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('473', '268', 'Admin', 'Slidecat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('472', '268', 'Admin', 'Slidecat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('471', '264', 'Admin', 'Slide', 'delete', '', '1', '0', '删除幻灯片', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('470', '264', 'Admin', 'Slide', 'edit', '', '1', '0', '编辑幻灯片', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('469', '264', 'Admin', 'Slide', 'add', '', '1', '0', '添加幻灯片', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('467', '291', 'Admin', 'Rbac', 'member', '', '1', '0', '成员管理', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('465', '291', 'Admin', 'Rbac', 'authorize', '', '1', '0', '权限设置', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('464', '291', 'Admin', 'Rbac', 'roleedit', '', '1', '0', '编辑角色', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('463', '291', 'Admin', 'Rbac', 'roledelete', '', '1', '1', '删除角色', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('462', '291', 'Admin', 'Rbac', 'roleadd', '', '1', '1', '添加角色', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('458', '302', 'Portal', 'AdminPost', 'restore', '', '1', '0', '文章还原', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('457', '302', 'Portal', 'AdminPost', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('456', '285', 'Portal', 'AdminPost', 'move', '', '1', '0', '批量移动', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('455', '285', 'Portal', 'AdminPost', 'check', '', '1', '0', '文章审核', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('454', '285', 'Portal', 'AdminPost', 'delete', '', '1', '0', '删除文章', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('452', '285', 'Portal', 'AdminPost', 'edit', '', '1', '0', '编辑文章', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('451', '285', 'Portal', 'AdminPost', 'add', '', '1', '0', '添加文章', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('450', '301', 'Portal', 'AdminPage', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('449', '301', 'Portal', 'AdminPage', 'restore', '', '1', '0', '页面还原', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('448', '277', 'Portal', 'AdminPage', 'delete', '', '1', '0', '删除页面', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('446', '277', 'Portal', 'AdminPage', 'edit', '', '1', '0', '编辑页面', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('445', '277', 'Portal', 'AdminPage', 'add', '', '1', '0', '添加页面', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('444', '296', 'Admin', 'Navcat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('443', '296', 'Admin', 'Navcat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('442', '296', 'Admin', 'Navcat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('441', '295', 'Admin', 'Nav', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('440', '295', 'Admin', 'Nav', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('439', '295', 'Admin', 'Nav', 'add', '', '1', '0', '添加菜单', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('436', '297', 'Admin', 'Menu', 'export_menu', '', '1', '0', '菜单备份', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('434', '297', 'Admin', 'Menu', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('433', '297', 'Admin', 'Menu', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('432', '297', 'Admin', 'Menu', 'lists', '', '1', '0', '所有菜单', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('430', '270', 'Admin', 'Link', 'delete', '', '1', '0', '删除友情链接', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('429', '270', 'Admin', 'Link', 'edit', '', '1', '0', '编辑友情链接', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('428', '270', 'Admin', 'Link', 'add', '', '1', '0', '添加友情链接', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('424', '319', 'Admin', 'Backup', 'download', '', '1', '0', '下载备份', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('423', '319', 'Admin', 'Backup', 'del_backup', '', '1', '0', '删除备份', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('422', '319', 'Admin', 'Backup', 'import', '', '1', '0', '数据备份导入', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('421', '319', 'Admin', 'Backup', 'restore', '', '1', '1', '数据还原', '', '', '0');
INSERT INTO `sp_menu` VALUES ('420', '265', 'Admin', 'Ad', 'delete', '', '1', '0', '删除广告', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('419', '265', 'Admin', 'Ad', 'edit', '', '1', '0', '编辑广告', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('418', '265', 'Admin', 'Ad', 'add', '', '1', '0', '添加广告', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('496', '319', 'Admin', 'Backup', 'index', '', '1', '1', '数据备份', '', '', '0');
INSERT INTO `sp_menu` VALUES ('497', '418', 'Admin', 'Ad', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('498', '419', 'Admin', 'Ad', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('499', '428', 'Admin', 'Link', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('500', '429', 'Admin', 'Link', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('501', '536', 'Admin', 'Menu', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('502', '434', 'Admin', 'Menu', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('503', '439', 'Admin', 'Nav', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('504', '440', 'Admin', 'Nav', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('505', '442', 'Admin', 'Navcat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('506', '443', 'Admin', 'Navcat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('507', '445', 'Portal', 'AdminPage', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('508', '446', 'Portal', 'AdminPage', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('509', '451', 'Portal', 'AdminPost', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('510', '452', 'Portal', 'AdminPost', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('511', '462', 'Admin', 'Rbac', 'roleadd_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('512', '464', 'Admin', 'Rbac', 'roleedit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('513', '465', 'Admin', 'Rbac', 'authorize_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('514', '284', 'Admin', 'Setting', 'site_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `sp_menu` VALUES ('515', '254', 'Admin', 'Setting', 'password_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `sp_menu` VALUES ('516', '469', 'Admin', 'Slide', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('517', '470', 'Admin', 'Slide', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('518', '472', 'Admin', 'Slidecat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('519', '473', 'Admin', 'Slidecat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('520', '475', 'Portal', 'AdminTerm', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('521', '476', 'Portal', 'AdminTerm', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('522', '478', 'Admin', 'User', 'add_post', '', '1', '0', '添加提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('523', '479', 'Admin', 'User', 'edit_post', '', '1', '0', '编辑提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('524', '253', 'Admin', 'User', 'userinfo_post', '', '1', '0', '修改信息提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('525', '299', 'Api', 'Oauthadmin', 'setting_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('526', '533', 'Admin', 'Mailer', 'index', '', '1', '1', 'SMTP配置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('527', '526', 'Admin', 'Mailer', 'index_post', '', '1', '0', '提交配置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('528', '533', 'Admin', 'Mailer', 'active', '', '1', '1', '邮件模板', '', '', '0');
INSERT INTO `sp_menu` VALUES ('529', '528', 'Admin', 'Mailer', 'active_post', '', '1', '0', '提交模板', '', '', '0');
INSERT INTO `sp_menu` VALUES ('533', '239', 'Admin', 'Mailer', 'default', '', '1', '1', '邮箱配置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('536', '297', 'Admin', 'Menu', 'add', '', '1', '0', '添加菜单', '', '', '0');
INSERT INTO `sp_menu` VALUES ('546', '496', 'Admin', 'Backup', 'index_post', '', '1', '0', '提交数据备份', '', '', '0');
INSERT INTO `sp_menu` VALUES ('547', '270', 'Admin', 'Link', 'listorders', '', '1', '0', '友情链接排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('548', '297', 'Admin', 'Menu', 'listorders', '', '1', '0', '后台菜单排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('549', '295', 'Admin', 'Nav', 'listorders', '', '1', '0', '前台导航排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('550', '277', 'Portal', 'AdminPage', 'listorders', '', '1', '0', '页面排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('551', '285', 'Portal', 'AdminPost', 'listorders', '', '1', '0', '文章排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('552', '264', 'Admin', 'Slide', 'listorders', '', '1', '0', '幻灯片排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('553', '245', 'Portal', 'AdminTerm', 'listorders', '', '1', '0', '文章分类排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('554', '51', 'Api', 'Guestbookadmin', 'index', '', '1', '1', '所有留言', '', '', '0');
INSERT INTO `sp_menu` VALUES ('555', '554', 'Api', 'Guestbookadmin', 'delete', '', '1', '0', '删除网站留言', '', '', '0');
INSERT INTO `sp_menu` VALUES ('557', '51', 'Comment', 'Commentadmin', 'index', '', '1', '1', '评论管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('559', '557', 'Comment', 'Commentadmin', 'delete', '', '1', '0', '删除评论', '', '', '0');
INSERT INTO `sp_menu` VALUES ('560', '557', 'Comment', 'Commentadmin', 'check', '', '1', '0', '评论审核', '', '', '0');
INSERT INTO `sp_menu` VALUES ('561', '287', 'User', 'Indexadmin', 'ban', '', '1', '0', '拉黑会员', '', '', '0');
INSERT INTO `sp_menu` VALUES ('562', '287', 'User', 'Indexadmin', 'cancelban', '', '1', '0', '启用会员', '', '', '0');
INSERT INTO `sp_menu` VALUES ('563', '288', 'User', 'Oauthadmin', 'delete', '', '1', '0', '第三方用户解绑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('564', '284', 'Admin', 'Route', 'index', '', '1', '0', '路由列表', '', '', '0');
INSERT INTO `sp_menu` VALUES ('565', '284', 'Admin', 'Route', 'add', '', '1', '0', '路由添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('566', '565', 'Admin', 'Route', 'add_post', '', '1', '0', '路由添加提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('567', '284', 'Admin', 'Route', 'edit', '', '1', '0', '路由编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('568', '567', 'Admin', 'Route', 'edit_post', '', '1', '0', '路由编辑提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('569', '284', 'Admin', 'Route', 'delete', '', '1', '0', '路由删除', '', '', '0');
INSERT INTO `sp_menu` VALUES ('572', '284', 'Admin', 'Route', 'ban', '', '1', '0', '路由禁止', '', '', '0');
INSERT INTO `sp_menu` VALUES ('573', '284', 'Admin', 'Route', 'open', '', '1', '0', '路由启用', '', '', '0');
INSERT INTO `sp_menu` VALUES ('574', '284', 'Admin', 'Route', 'listorders', '', '1', '0', '路由排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('588', '260', 'Admin', 'Plugin', 'index', '', '1', '1', '插件管理', '', '', '0');

-- ----------------------------
-- Table structure for sp_nav
-- ----------------------------
DROP TABLE IF EXISTS `sp_nav`;
CREATE TABLE `sp_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `target` varchar(50) DEFAULT NULL,
  `href` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(6) DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_nav
-- ----------------------------
INSERT INTO `sp_nav` VALUES ('1', '1', '0', '首页', '', 'home', '', '1', '0', '0-1');
INSERT INTO `sp_nav` VALUES ('2', '1', '0', '走进微赢', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"1\";}}', '', '1', '0', '0-2');
INSERT INTO `sp_nav` VALUES ('3', '1', '0', '品牌动态', '_blank', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"2\";}}', '', '1', '0', '0-3');

-- ----------------------------
-- Table structure for sp_nav_cat
-- ----------------------------
DROP TABLE IF EXISTS `sp_nav_cat`;
CREATE TABLE `sp_nav_cat` (
  `navcid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `remark` text,
  PRIMARY KEY (`navcid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_nav_cat
-- ----------------------------
INSERT INTO `sp_nav_cat` VALUES ('1', '主导航', '1', '主导航');

-- ----------------------------
-- Table structure for sp_oauth_user
-- ----------------------------
DROP TABLE IF EXISTS `sp_oauth_user`;
CREATE TABLE `sp_oauth_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `from` varchar(20) NOT NULL COMMENT '用户来源key',
  `name` varchar(30) NOT NULL COMMENT '第三方昵称',
  `head_img` varchar(200) NOT NULL COMMENT '头像',
  `uid` int(20) NOT NULL COMMENT '关联的本站用户id',
  `create_time` datetime NOT NULL COMMENT '绑定时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `login_times` int(6) NOT NULL COMMENT '登录次数',
  `status` tinyint(2) NOT NULL,
  `access_token` varchar(60) NOT NULL,
  `expires_date` int(12) NOT NULL COMMENT 'access_token过期时间',
  `openid` varchar(40) NOT NULL COMMENT '第三方用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_oauth_user
-- ----------------------------

-- ----------------------------
-- Table structure for sp_options
-- ----------------------------
DROP TABLE IF EXISTS `sp_options`;
CREATE TABLE `sp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_options
-- ----------------------------
INSERT INTO `sp_options` VALUES ('1', 'member_email_active', '{\"title\":\"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.\",\"template\":\"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\\"http:\\/\\/www.thinkcmf.com\\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\\"\\\" href=\\\"http:\\/\\/#link#\\\" target=\\\"_self\\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>\"}', '1');
INSERT INTO `sp_options` VALUES ('2', 'site_options', '{\"site_name\":\"ThinkCMF\\u5185\\u5bb9\\u7ba1\\u7406\\u6846\\u67b6\",\"site_host\":\"http:\\/\\/localhost\\/\",\"site_root\":\"\\/\",\"site_tpl\":\"simplebootx\",\"site_adminstyle\":\"bluesky\",\"site_icp\":\"\",\"site_admin_email\":\"wangsong12332@sina.com\",\"site_admin_tel\":\"+8655122323123\",\"site_tongji\":\"\",\"site_copyright\":\"\",\"site_seo_title\":\"\\u5fae\\u8d62\\u751f\\u7269\\u79d1\\u6280\\u6709\\u9650\\u516c\\u53f8\",\"site_seo_keywords\":\"\\u5fae\\u8d62\\u751f\\u7269\\u79d1\\u6280\\u6709\\u9650\\u516c\\u53f8\",\"site_seo_description\":\"\\u5fae\\u8d62\\u751f\\u7269\\u79d1\\u6280\\u6709\\u9650\\u516c\\u53f8\",\"urlmode\":\"0\",\"html_suffix\":\"\"}', '1');
INSERT INTO `sp_options` VALUES ('3', 'cmf_settings', '{\"banned_usernames\":\"\"}', '1');

-- ----------------------------
-- Table structure for sp_plugins
-- ----------------------------
DROP TABLE IF EXISTS `sp_plugins`;
CREATE TABLE `sp_plugins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL COMMENT '插件名，英文',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '插件名称',
  `description` text COMMENT '插件描述',
  `type` tinyint(2) DEFAULT '0' COMMENT '插件类型, 1:网站；8;微信',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1开启；',
  `config` text COMMENT '插件配置',
  `hooks` varchar(255) DEFAULT NULL COMMENT '实现的钩子;以“，”分隔',
  `author` varchar(50) DEFAULT '' COMMENT '插件作者',
  `version` varchar(20) DEFAULT '' COMMENT '插件版本号',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '插件安装时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of sp_plugins
-- ----------------------------

-- ----------------------------
-- Table structure for sp_posts
-- ----------------------------
DROP TABLE IF EXISTS `sp_posts`;
CREATE TABLE `sp_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned DEFAULT '0' COMMENT '发表者id',
  `post_keywords` varchar(150) NOT NULL COMMENT 'seo keywords',
  `post_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'post创建日期，永久不变，一般不显示给用户',
  `post_content` longtext COMMENT 'post内容',
  `post_title` text COMMENT 'post标题',
  `post_excerpt` text COMMENT 'post摘要',
  `post_status` int(2) DEFAULT '1' COMMENT 'post状态，1已审核，0未审核',
  `comment_status` int(2) DEFAULT '1' COMMENT '评论状态，1允许，0不允许',
  `post_modified` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'post更新时间，可在前台修改，显示给用户',
  `post_content_filtered` longtext,
  `post_parent` bigint(20) unsigned DEFAULT '0' COMMENT 'post的父级post id,表示post层级关系',
  `post_type` int(2) DEFAULT NULL,
  `post_mime_type` varchar(100) DEFAULT '',
  `comment_count` bigint(20) DEFAULT '0',
  `smeta` text COMMENT 'post的扩展字段，保存相关扩展属性，如缩略图；格式为json',
  `post_hits` int(11) DEFAULT '0' COMMENT 'post点击数，查看数',
  `post_like` int(11) DEFAULT '0' COMMENT 'post赞数',
  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶 1置顶； 0不置顶',
  `recommended` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐 1推荐 0不推荐',
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_date` (`post_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_posts
-- ----------------------------
INSERT INTO `sp_posts` VALUES ('2', '1', '微赢简介1', '2015-01-15 15:36:20', '<p style=\"text-align: center;\"><img alt=\"\" src=\"http://localhost/data/upload/ueditor/20150113/54b4e09fbd7c3.jpg\" style=\"border-top-right-radius: 0px; border: 0px; width: 580px; height: 380px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; text-align: center; font-size: 14px; color: rgb(175, 143, 117); text-indent: 2em; line-height: 24px; font-family: Arial, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">千人齐聚羊城，探讨中国美业界2015年发展走向</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; text-align: justify; font-size: 14px; color: rgb(134, 143, 152); text-indent: 2em; line-height: 24px; font-family: Arial, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">告别2014，展望2015。2015年1月12日，由全国工商联美容化妆品业商会、广东省美容美发行业协会共同举办的“中国化妆品领袖高峰论坛”于广州东方宾馆举行。当日有千名美业界权威人士出席，思埠集团董事长吴召国、思埠传媒事业群总裁马锐、思埠网络事业群总裁王丰、思埠无纺制品公司总裁伍勇等一行领导亲临现场，思埠集团董事长吴召国更为现场嘉宾带来主题演讲——《最初的梦想》。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; text-align: justify; font-size: 14px; color: rgb(134, 143, 152); text-indent: 2em; line-height: 24px; font-family: Arial, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">本次峰会以“中国精神中国力量”为主题，分为高端渠道篇、营销策略篇、主题演讲篇、国际视野篇。现场嘉宾围绕“如何把中国化妆品带向世界舞台”、“购物中心风口下有哪些品牌机会”、“国产化妆品的品牌新征途发展前景”、“洋为中用，走向世界”等问题展开对话。气氛十分活跃，各业界权威人士纷纷建言献策，展现了中国美业界进取、创新和实干的风采。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; text-align: justify; font-size: 14px; color: rgb(134, 143, 152); text-indent: 2em; line-height: 24px; font-family: Arial, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">在主题演讲篇环节中，思埠集团董事长吴召国演讲了《最初的梦想》，讲述了2014年思埠的发展历程和自己的五个梦想：有自己的大厦、将广告打到央视春晚、产品有知名度且有一线明星代言、到北京人民大会堂举办思埠年会和一定要做一个上市公司。而此时此刻，这些梦想均已实现。当谈到2015年思埠集团的发展规划时，吴召国表示今后将和国内顶尖的护肤、彩妆品牌合作，帮助他们进入微商，提供一个完美的平台让中国护肤品牌做大做强，走出国门，共同铸就一流民族品牌，2015年的思埠将成为汇集生产、研发、销售为一体的平台，成为中国最好的销售平台。演讲结束后，思埠集团被授予为“微商指定教学基地”，思埠集团董事长吴召国被授予“中国化妆品领袖主席团品牌副主席”称号，这是业界对思埠集团一直以来努力的肯定。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; text-align: justify; font-size: 14px; color: rgb(134, 143, 152); text-indent: 2em; line-height: 24px; font-family: Arial, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">当晚，美业界各权威人士还出席了由思埠集团赞助的中国化妆品领袖高峰论坛答谢晚宴。在晚宴中，思埠集团荣膺“年会特殊贡献大奖”和“爱心企业奖”，以表彰思埠集团在过去一年引导美妆消费、社会服务中的贡献。思埠集团也将一如既往精心为亚洲女性肌肤研制开发每款产品，严抓产品品质，打造出可以与国际大牌相媲美的国民品牌，推动民族化妆品行业的崛起！</p><p><br/></p>', '微赢简介', '微赢简介微赢简介微赢简介微赢简介微赢简介微赢简介微赢简介微赢简介微赢简介微赢简介', '1', '1', '2015-01-13 15:34:49', null, '0', null, '', '1', '{\"thumb\":\"54b4caf067993.jpg\",\"photo\":[{\"url\":\"54b4cadad17fa.jpg\",\"alt\":\"slider0\"},{\"url\":\"54b4cae700320.jpg\",\"alt\":\"slider2\"}]}', '3', '1', '0', '0');
INSERT INTO `sp_posts` VALUES ('29', '1', ' 阿萨德发', '2015-01-14 15:32:57', null, '阿萨德发', '阿萨德发', '1', '1', '2015-01-14 15:32:51', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('30', '1', '123', '2015-01-14 15:33:00', null, '1213', '123123123', '1', '1', '2015-01-14 15:32:58', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('31', '1', '撒旦法师', '2015-01-14 15:33:05', null, '从自行车', '啊阿萨德', '1', '1', '2015-01-14 15:33:01', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('32', '1', ' 阿萨德发', '2015-01-14 15:33:10', null, 'V字形啊所发生的', '阿萨德发生后', '1', '1', '2015-01-14 15:33:06', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('33', '1', '12312', '2015-01-14 15:33:16', null, '发达输入法额2 ', '1231231', '1', '1', '2015-01-14 15:33:11', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('34', '1', '在V字形成', '2015-01-14 15:33:22', null, '自行车V字形成', ' 在V字形成v', '1', '1', '2015-01-14 15:33:17', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('35', '1', '沙发松岛枫', '2015-01-14 15:33:27', null, '121', '阿萨德发斯蒂芬', '1', '1', '2015-01-14 15:33:23', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('36', '1', '1231', '2015-01-14 15:33:30', null, '13123', '13123', '1', '1', '2015-01-14 15:33:27', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('37', '1', '发生的 阿萨德发', '2015-01-14 15:33:36', null, '次在V字', ' 大法师', '1', '1', '2015-01-14 15:33:31', null, '0', null, '', '0', '{\"thumb\":\"\"}', '1', '0', '0', '0');
INSERT INTO `sp_posts` VALUES ('28', '1', 'testtest', '2015-01-14 15:30:47', '<p>testtest</p>', 'test', 'testtest', '1', '1', '2015-01-14 15:30:39', null, '0', null, '', '0', '{\"thumb\":\"\"}', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for sp_role
-- ----------------------------
DROP TABLE IF EXISTS `sp_role`;
CREATE TABLE `sp_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '角色名称',
  `pid` smallint(6) DEFAULT NULL COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_role
-- ----------------------------
INSERT INTO `sp_role` VALUES ('1', '超级管理员', '0', '1', '拥有网站最高管理员权限！', '1329633709', '1329633709', '0');
INSERT INTO `sp_role` VALUES ('2', '教育厅', null, '1', '教育厅', '0', '0', '0');

-- ----------------------------
-- Table structure for sp_role_user
-- ----------------------------
DROP TABLE IF EXISTS `sp_role_user`;
CREATE TABLE `sp_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_role_user
-- ----------------------------

-- ----------------------------
-- Table structure for sp_route
-- ----------------------------
DROP TABLE IF EXISTS `sp_route`;
CREATE TABLE `sp_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_route
-- ----------------------------

-- ----------------------------
-- Table structure for sp_slide
-- ----------------------------
DROP TABLE IF EXISTS `sp_slide`;
CREATE TABLE `sp_slide` (
  `slide_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slide_cid` bigint(20) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_pic` varchar(255) DEFAULT NULL,
  `slide_url` varchar(255) DEFAULT NULL,
  `slide_des` varchar(255) DEFAULT NULL,
  `slide_content` text,
  `slide_status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(10) DEFAULT '0',
  PRIMARY KEY (`slide_id`),
  KEY `slide_cid` (`slide_cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_slide
-- ----------------------------

-- ----------------------------
-- Table structure for sp_slide_cat
-- ----------------------------
DROP TABLE IF EXISTS `sp_slide_cat`;
CREATE TABLE `sp_slide_cat` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_idname` varchar(255) NOT NULL,
  `cat_remark` text,
  `cat_status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  KEY `cat_idname` (`cat_idname`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_slide_cat
-- ----------------------------

-- ----------------------------
-- Table structure for sp_terms
-- ----------------------------
DROP TABLE IF EXISTS `sp_terms`;
CREATE TABLE `sp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `slug` varchar(200) DEFAULT '',
  `taxonomy` varchar(32) DEFAULT NULL COMMENT '分类类型',
  `description` longtext COMMENT '分类描述',
  `parent` bigint(20) unsigned DEFAULT '0' COMMENT '分类父id',
  `count` bigint(20) DEFAULT '0' COMMENT '分类文章数',
  `path` varchar(500) DEFAULT NULL COMMENT '分类层级关系路径',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `list_tpl` varchar(50) DEFAULT NULL COMMENT '分类列表模板',
  `one_tpl` varchar(50) DEFAULT NULL COMMENT '分类文章页模板',
  `listorder` int(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_terms
-- ----------------------------
INSERT INTO `sp_terms` VALUES ('1', '走进微赢', '', 'article', '走进微赢', '0', '0', '0-1', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `sp_terms` VALUES ('3', '品牌动态', '', 'article', '品牌动态', '0', '0', '0-3', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `sp_terms` VALUES ('4', '微赢商学院', '', 'article', '微赢商学院', '0', '0', '0-4', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `sp_terms` VALUES ('5', '会员中心', '', 'article', '会员中心', '0', '0', '0-5', '', '', '', 'list', 'article', '0', '1');

-- ----------------------------
-- Table structure for sp_term_relationships
-- ----------------------------
DROP TABLE IF EXISTS `sp_term_relationships`;
CREATE TABLE `sp_term_relationships` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'posts表里文章id',
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`tid`),
  KEY `term_taxonomy_id` (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_term_relationships
-- ----------------------------
INSERT INTO `sp_term_relationships` VALUES ('1', '1', '2', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('2', '2', '1', '0', '1');
INSERT INTO `sp_term_relationships` VALUES ('3', '28', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('4', '29', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('5', '30', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('6', '31', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('7', '32', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('8', '33', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('9', '34', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('10', '35', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('11', '36', '1', '0', '0');
INSERT INTO `sp_term_relationships` VALUES ('12', '37', '1', '0', '0');

-- ----------------------------
-- Table structure for sp_users
-- ----------------------------
DROP TABLE IF EXISTS `sp_users`;
CREATE TABLE `sp_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；sp_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `role_id` smallint(6) DEFAULT NULL COMMENT '用户角色id',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `user_type` smallint(1) DEFAULT '1' COMMENT '用户类型，1:admin ;2:会员',
  `authorize` text,
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_users
-- ----------------------------
INSERT INTO `sp_users` VALUES ('1', 'admin', 'c535018ee946e10adc3949ba59abbe56e057f20f883e89af', 'admin', 'wangsong12332@sina.com', '', null, '0', null, null, '0.0.0.0', '2015-01-16 15:33:16', '2015-01-07 04:24:04', '', '1', '1', '0', '1', null);
INSERT INTO `sp_users` VALUES ('2', '汪松', 'c535018ee946202cb962ac59075b964b07152d234b7089af', '', 'wangsong1233276@sina.com', '', null, '0', null, null, '0.0.0.0', '2015-01-08 11:14:27', '0000-00-00 00:00:00', '', '1', '2', '0', '1', null);
INSERT INTO `sp_users` VALUES ('3', 'test', 'c535018ee946c415b069d516eace04d5a76b242150b589af', 'test', 'wangsong123327212126@126.com', '', null, '0', null, null, '0.0.0.0', '2015-01-13 15:43:14', '2015-01-13 15:43:14', '', '1', null, '0', '2', null);
INSERT INTO `sp_users` VALUES ('4', 'zero', 'c535018ee946e10adc3949ba59abbe56e057f20f883e89af', 'zero', 'wangsong121113327212126@126.com', '', null, '0', null, null, '0.0.0.0', '2015-01-16 15:38:02', '2015-01-15 15:46:46', '', '1', null, '0', '2', '<p style=\"text-align: center;\"><img src=\"http://localhost/data/upload/ueditor/20150116/54b8bf095270e.png\" title=\"logo.png\" alt=\"logo.png\"/></p>');

-- ----------------------------
-- Table structure for sp_user_favorites
-- ----------------------------
DROP TABLE IF EXISTS `sp_user_favorites`;
CREATE TABLE `sp_user_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '收藏内容的标题',
  `url` varchar(255) DEFAULT NULL COMMENT '收藏内容的原文地址，不带域名',
  `description` varchar(500) DEFAULT NULL COMMENT '收藏内容的描述',
  `table` varchar(50) DEFAULT NULL COMMENT '收藏实体以前所在表，不带前缀',
  `object_id` int(11) DEFAULT NULL COMMENT '收藏内容原来的主键id',
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_user_favorites
-- ----------------------------
INSERT INTO `sp_user_favorites` VALUES ('1', '1', 'asda', '/index.php?g=portal&amp;m=article&amp;a=index&amp;id=1', null, 'posts', '1', '1420685119');
INSERT INTO `sp_user_favorites` VALUES ('2', '3', '微赢简介', '/old/index.php?g=portal&amp;m=article&amp;a=index&amp;id=2', null, 'posts', '2', '1421216305');
