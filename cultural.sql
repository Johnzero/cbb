/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50540
Source Host           : 127.0.0.1:3306
Source Database       : cultural

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-03-09 10:26:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cultural_access
-- ----------------------------
DROP TABLE IF EXISTS `cultural_access`;
CREATE TABLE `cultural_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `g` varchar(20) NOT NULL COMMENT '项目',
  `m` varchar(20) NOT NULL COMMENT '模块',
  `a` varchar(20) NOT NULL COMMENT '方法',
  KEY `groupId` (`role_id`),
  KEY `gma` (`g`,`m`,`a`,`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_access
-- ----------------------------

-- ----------------------------
-- Table structure for cultural_ad
-- ----------------------------
DROP TABLE IF EXISTS `cultural_ad`;
CREATE TABLE `cultural_ad` (
  `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL,
  `ad_content` text,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  PRIMARY KEY (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_ad
-- ----------------------------

-- ----------------------------
-- Table structure for cultural_asset
-- ----------------------------
DROP TABLE IF EXISTS `cultural_asset`;
CREATE TABLE `cultural_asset` (
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
-- Records of cultural_asset
-- ----------------------------

-- ----------------------------
-- Table structure for cultural_comments
-- ----------------------------
DROP TABLE IF EXISTS `cultural_comments`;
CREATE TABLE `cultural_comments` (
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_comments
-- ----------------------------
INSERT INTO `cultural_comments` VALUES ('1', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 11:07:07', 'asdasd', '1', '0', '0-1', '0');
INSERT INTO `cultural_comments` VALUES ('2', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 11:08:11', 'asd', '1', '0', '0-2', '1');
INSERT INTO `cultural_comments` VALUES ('3', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 11:10:24', 'asdf', '1', '0', '0-3', '1');
INSERT INTO `cultural_comments` VALUES ('4', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 11:12:22', 'asdf', '1', '0', '0-4', '1');
INSERT INTO `cultural_comments` VALUES ('5', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 11:20:57', 'asdasd', '1', '0', '0-5', '1');
INSERT INTO `cultural_comments` VALUES ('6', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 11:36:34', 'asdasd', '1', '0', '0-6', '1');
INSERT INTO `cultural_comments` VALUES ('7', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 14:25:18', 'asaa', '1', '0', '0-7', '1');
INSERT INTO `cultural_comments` VALUES ('8', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 14:40:57', 'asdfasdf', '1', '0', '0-8', '1');
INSERT INTO `cultural_comments` VALUES ('9', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 15:01:46', 'sdfsdf', '1', '0', '0-9', '1');
INSERT INTO `cultural_comments` VALUES ('10', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 15:05:39', '12312', '1', '0', '0-10', '1');
INSERT INTO `cultural_comments` VALUES ('11', 'posts', '0', '://', '2', '0', 'zero', 'wangsong1233276@126.com', '2015-01-30 15:06:05', 'asdfas', '1', '0', '0-11', '1');

-- ----------------------------
-- Table structure for cultural_company
-- ----------------------------
DROP TABLE IF EXISTS `cultural_company`;
CREATE TABLE `cultural_company` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `location` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `tel` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `contact` varchar(100) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `ctel` varchar(50) DEFAULT NULL COMMENT '生日',
  `email` varchar(100) DEFAULT NULL COMMENT '个性签名',
  `code` varchar(50) NOT NULL COMMENT '最后登录ip',
  `code_pic` varchar(100) NOT NULL COMMENT '最后登录时间',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `group` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `group_pic` varchar(100) DEFAULT NULL COMMENT '用户角色id',
  `authorize` int(10) unsigned NOT NULL DEFAULT '0',
  `tip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of cultural_company
-- ----------------------------
INSERT INTO `cultural_company` VALUES ('10', '2', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54dd55eb91374.jpg', '1423795407', '2222', '54dd64cc8dc3a.jpg', '1', null);
INSERT INTO `cultural_company` VALUES ('11', '4', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('12', '5', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('13', '6', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('14', '7', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54efe086d008c.jpg', '1425006732', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('15', '8', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('16', '9', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('17', '10', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('18', '11', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('19', '12', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('20', '13', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('21', '14', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('22', '15', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('23', '16', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('24', '17', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);
INSERT INTO `cultural_company` VALUES ('25', '18', '公司名称', '公司详细地址', '123123123', '联系人姓名', '123123123', 'wangsong123327212126@126.com', '123123', '54d86043ac834.jpg', '1423466580', '2222', '54d8604a270ed.jpg', '0', null);

-- ----------------------------
-- Table structure for cultural_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `cultural_guestbook`;
CREATE TABLE `cultural_guestbook` (
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
-- Records of cultural_guestbook
-- ----------------------------
INSERT INTO `cultural_guestbook` VALUES ('1', 'sdfsdf', '阿萨德发', 'asfa', 'fsdfs', '2015-02-10 14:52:31', '1');

-- ----------------------------
-- Table structure for cultural_links
-- ----------------------------
DROP TABLE IF EXISTS `cultural_links`;
CREATE TABLE `cultural_links` (
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
-- Records of cultural_links
-- ----------------------------
INSERT INTO `cultural_links` VALUES ('1', 'http://www.thinkcmf.com', 'ThinkCMF', '', '_blank', '', '1', '0', '', '0');

-- ----------------------------
-- Table structure for cultural_menu
-- ----------------------------
DROP TABLE IF EXISTS `cultural_menu`;
CREATE TABLE `cultural_menu` (
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
) ENGINE=MyISAM AUTO_INCREMENT=576 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_menu
-- ----------------------------
INSERT INTO `cultural_menu` VALUES ('239', '0', 'Admin', 'Setting', 'default', '', '0', '1', '设置', 'cogs', '', '0');
INSERT INTO `cultural_menu` VALUES ('51', '0', 'Admin', 'Content', 'default', '', '0', '1', '内容管理', 'th', '', '10');
INSERT INTO `cultural_menu` VALUES ('245', '51', 'Portal', 'AdminTerm', 'index', '', '0', '1', '分类管理', '', '', '2');
INSERT INTO `cultural_menu` VALUES ('299', '260', 'Api', 'Oauthadmin', 'setting', '', '1', '1', '第三方登陆', 'leaf', '', '4');
INSERT INTO `cultural_menu` VALUES ('252', '239', 'Admin', 'Setting', 'userdefault', '', '0', '1', '个人信息', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('253', '252', 'Admin', 'User', 'userinfo', '', '1', '1', '修改信息', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('254', '252', 'Admin', 'Setting', 'password', '', '1', '1', '修改密码', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('260', '0', 'Admin', 'Extension', 'default', '', '0', '1', '扩展工具', 'cloud', '', '30');
INSERT INTO `cultural_menu` VALUES ('262', '260', 'Admin', 'Slide', 'default', '', '1', '1', '幻灯片', '', '', '1');
INSERT INTO `cultural_menu` VALUES ('264', '262', 'Admin', 'Slide', 'index', '', '1', '1', '幻灯片管理', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('265', '260', 'Admin', 'Ad', 'index', '', '1', '1', '网站广告', '', '', '2');
INSERT INTO `cultural_menu` VALUES ('268', '262', 'Admin', 'Slidecat', 'index', '', '1', '1', '幻灯片分类', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('270', '260', 'Admin', 'Link', 'index', '', '0', '1', '友情链接', '', '', '3');
INSERT INTO `cultural_menu` VALUES ('277', '51', 'Portal', 'AdminPage', 'index', '', '1', '1', '页面管理', '', '', '3');
INSERT INTO `cultural_menu` VALUES ('301', '300', 'Portal', 'AdminPage', 'recyclebin', '', '1', '1', '页面回收', '', '', '1');
INSERT INTO `cultural_menu` VALUES ('302', '300', 'Portal', 'AdminPost', 'recyclebin', '', '1', '1', '文章回收', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('300', '51', 'Admin', 'Recycle', 'default', '', '1', '1', '回收站', '', '', '4');
INSERT INTO `cultural_menu` VALUES ('284', '239', 'Admin', 'Setting', 'site', '', '1', '1', '网站信息', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('285', '51', 'Portal', 'AdminPost', 'index', '', '1', '1', '文章管理', '', '', '1');
INSERT INTO `cultural_menu` VALUES ('286', '0', 'User', 'Indexadmin', 'default', '', '1', '1', '用户管理', 'group', '', '0');
INSERT INTO `cultural_menu` VALUES ('287', '289', 'User', 'Indexadmin', 'index', '', '1', '1', '本站用户', 'leaf', '', '0');
INSERT INTO `cultural_menu` VALUES ('288', '289', 'User', 'Oauthadmin', 'index', '', '1', '1', '第三方用户', 'leaf', '', '0');
INSERT INTO `cultural_menu` VALUES ('289', '286', 'User', 'Indexadmin', 'default1', '', '1', '1', '用户组', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('290', '286', 'User', 'Indexadmin', 'default3', '', '1', '1', '管理组', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('291', '290', 'Admin', 'Rbac', 'index', '', '1', '1', '角色管理', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('292', '290', 'Admin', 'User', 'index', '', '1', '1', '管理员', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('293', '0', 'Admin', 'Menu', 'default', '', '1', '1', '菜单管理', 'list', '', '0');
INSERT INTO `cultural_menu` VALUES ('294', '293', 'Admin', 'Navcat', 'default1', '', '1', '1', '前台菜单', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('295', '294', 'Admin', 'Nav', 'index', '', '1', '1', '菜单管理', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('296', '294', 'Admin', 'Navcat', 'index', '', '1', '1', '菜单分类', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('297', '293', 'Admin', 'Menu', 'index', '', '1', '1', '后台菜单', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('298', '239', 'Admin', 'Setting', 'clearcache', '', '1', '1', '清除缓存', '', '', '1');
INSERT INTO `cultural_menu` VALUES ('319', '260', 'Admin', 'Backup', 'default', '', '1', '1', '备份管理', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('480', '292', 'Admin', 'User', 'delete', '', '1', '0', '删除管理员', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('479', '292', 'Admin', 'User', 'edit', '', '1', '0', '管理员编辑', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('478', '292', 'Admin', 'User', 'add', '', '1', '0', '管理员添加', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('477', '245', 'Portal', 'AdminTerm', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('476', '245', 'Portal', 'AdminTerm', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('475', '245', 'Portal', 'AdminTerm', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('474', '268', 'Admin', 'Slidecat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('473', '268', 'Admin', 'Slidecat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('472', '268', 'Admin', 'Slidecat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('471', '264', 'Admin', 'Slide', 'delete', '', '1', '0', '删除幻灯片', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('470', '264', 'Admin', 'Slide', 'edit', '', '1', '0', '编辑幻灯片', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('469', '264', 'Admin', 'Slide', 'add', '', '1', '0', '添加幻灯片', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('467', '291', 'Admin', 'Rbac', 'member', '', '1', '0', '成员管理', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('465', '291', 'Admin', 'Rbac', 'authorize', '', '1', '0', '权限设置', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('464', '291', 'Admin', 'Rbac', 'roleedit', '', '1', '0', '编辑角色', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('463', '291', 'Admin', 'Rbac', 'roledelete', '', '1', '1', '删除角色', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('462', '291', 'Admin', 'Rbac', 'roleadd', '', '1', '1', '添加角色', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('458', '302', 'Portal', 'AdminPost', 'restore', '', '1', '0', '文章还原', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('457', '302', 'Portal', 'AdminPost', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('456', '285', 'Portal', 'AdminPost', 'move', '', '1', '0', '批量移动', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('455', '285', 'Portal', 'AdminPost', 'check', '', '1', '0', '文章审核', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('454', '285', 'Portal', 'AdminPost', 'delete', '', '1', '0', '删除文章', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('452', '285', 'Portal', 'AdminPost', 'edit', '', '1', '0', '编辑文章', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('451', '285', 'Portal', 'AdminPost', 'add', '', '1', '0', '添加文章', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('450', '301', 'Portal', 'AdminPage', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('449', '301', 'Portal', 'AdminPage', 'restore', '', '1', '0', '页面还原', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('448', '277', 'Portal', 'AdminPage', 'delete', '', '1', '0', '删除页面', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('446', '277', 'Portal', 'AdminPage', 'edit', '', '1', '0', '编辑页面', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('445', '277', 'Portal', 'AdminPage', 'add', '', '1', '0', '添加页面', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('444', '296', 'Admin', 'Navcat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('443', '296', 'Admin', 'Navcat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('442', '296', 'Admin', 'Navcat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('441', '295', 'Admin', 'Nav', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('440', '295', 'Admin', 'Nav', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('439', '295', 'Admin', 'Nav', 'add', '', '1', '0', '添加菜单', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('436', '297', 'Admin', 'Menu', 'export_menu', '', '1', '0', '菜单备份', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('434', '297', 'Admin', 'Menu', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('433', '297', 'Admin', 'Menu', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('432', '297', 'Admin', 'Menu', 'lists', '', '1', '0', '所有菜单', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('430', '270', 'Admin', 'Link', 'delete', '', '1', '0', '删除友情链接', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('429', '270', 'Admin', 'Link', 'edit', '', '1', '0', '编辑友情链接', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('428', '270', 'Admin', 'Link', 'add', '', '1', '0', '添加友情链接', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('424', '319', 'Admin', 'Backup', 'download', '', '1', '0', '下载备份', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('423', '319', 'Admin', 'Backup', 'del_backup', '', '1', '0', '删除备份', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('422', '319', 'Admin', 'Backup', 'import', '', '1', '0', '数据备份导入', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('421', '319', 'Admin', 'Backup', 'restore', '', '1', '1', '数据还原', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('420', '265', 'Admin', 'Ad', 'delete', '', '1', '0', '删除广告', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('419', '265', 'Admin', 'Ad', 'edit', '', '1', '0', '编辑广告', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('418', '265', 'Admin', 'Ad', 'add', '', '1', '0', '添加广告', '', '', '1000');
INSERT INTO `cultural_menu` VALUES ('496', '319', 'Admin', 'Backup', 'index', '', '1', '1', '数据备份', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('497', '418', 'Admin', 'Ad', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('498', '419', 'Admin', 'Ad', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('499', '428', 'Admin', 'Link', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('500', '429', 'Admin', 'Link', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('501', '536', 'Admin', 'Menu', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('502', '434', 'Admin', 'Menu', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('503', '439', 'Admin', 'Nav', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('504', '440', 'Admin', 'Nav', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('505', '442', 'Admin', 'Navcat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('506', '443', 'Admin', 'Navcat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('507', '445', 'Portal', 'AdminPage', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('508', '446', 'Portal', 'AdminPage', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('509', '451', 'Portal', 'AdminPost', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('510', '452', 'Portal', 'AdminPost', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('511', '462', 'Admin', 'Rbac', 'roleadd_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('512', '464', 'Admin', 'Rbac', 'roleedit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('513', '465', 'Admin', 'Rbac', 'authorize_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('514', '284', 'Admin', 'Setting', 'site_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('515', '254', 'Admin', 'Setting', 'password_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('516', '469', 'Admin', 'Slide', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('517', '470', 'Admin', 'Slide', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('518', '472', 'Admin', 'Slidecat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('519', '473', 'Admin', 'Slidecat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('520', '475', 'Portal', 'AdminTerm', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('521', '476', 'Portal', 'AdminTerm', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('522', '478', 'Admin', 'User', 'add_post', '', '1', '0', '添加提交', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('523', '479', 'Admin', 'User', 'edit_post', '', '1', '0', '编辑提交', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('524', '253', 'Admin', 'User', 'userinfo_post', '', '1', '0', '修改信息提交', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('525', '299', 'Api', 'Oauthadmin', 'setting_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('526', '533', 'Admin', 'Mailer', 'index', '', '1', '1', 'SMTP配置', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('527', '526', 'Admin', 'Mailer', 'index_post', '', '1', '0', '提交配置', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('528', '533', 'Admin', 'Mailer', 'active', '', '1', '1', '邮件模板', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('529', '528', 'Admin', 'Mailer', 'active_post', '', '1', '0', '提交模板', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('533', '239', 'Admin', 'Mailer', 'default', '', '1', '1', '邮箱配置', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('536', '297', 'Admin', 'Menu', 'add', '', '1', '0', '添加菜单', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('546', '496', 'Admin', 'Backup', 'index_post', '', '1', '0', '提交数据备份', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('547', '270', 'Admin', 'Link', 'listorders', '', '1', '0', '友情链接排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('548', '297', 'Admin', 'Menu', 'listorders', '', '1', '0', '后台菜单排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('549', '295', 'Admin', 'Nav', 'listorders', '', '1', '0', '前台导航排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('550', '277', 'Portal', 'AdminPage', 'listorders', '', '1', '0', '页面排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('551', '285', 'Portal', 'AdminPost', 'listorders', '', '1', '0', '文章排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('552', '264', 'Admin', 'Slide', 'listorders', '', '1', '0', '幻灯片排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('553', '245', 'Portal', 'AdminTerm', 'listorders', '', '1', '0', '文章分类排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('554', '51', 'Api', 'Guestbookadmin', 'index', '', '1', '1', '所有留言', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('555', '554', 'Api', 'Guestbookadmin', 'delete', '', '1', '0', '删除网站留言', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('557', '51', 'Comment', 'Commentadmin', 'index', '', '1', '1', '评论管理', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('559', '557', 'Comment', 'Commentadmin', 'delete', '', '1', '0', '删除评论', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('560', '557', 'Comment', 'Commentadmin', 'check', '', '1', '0', '评论审核', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('561', '287', 'User', 'Indexadmin', 'ban', '', '1', '0', '拉黑会员', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('562', '287', 'User', 'Indexadmin', 'cancelban', '', '1', '0', '启用会员', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('563', '288', 'User', 'Oauthadmin', 'delete', '', '1', '0', '第三方用户解绑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('564', '284', 'Admin', 'Route', 'index', '', '1', '0', '路由列表', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('565', '284', 'Admin', 'Route', 'add', '', '1', '0', '路由添加', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('566', '565', 'Admin', 'Route', 'add_post', '', '1', '0', '路由添加提交', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('567', '284', 'Admin', 'Route', 'edit', '', '1', '0', '路由编辑', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('568', '567', 'Admin', 'Route', 'edit_post', '', '1', '0', '路由编辑提交', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('569', '284', 'Admin', 'Route', 'delete', '', '1', '0', '路由删除', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('572', '284', 'Admin', 'Route', 'ban', '', '1', '0', '路由禁止', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('573', '284', 'Admin', 'Route', 'open', '', '1', '0', '路由启用', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('574', '284', 'Admin', 'Route', 'listorders', '', '1', '0', '路由排序', '', '', '0');
INSERT INTO `cultural_menu` VALUES ('575', '0', 'Admin', 'Company', 'index', '', '1', '1', '企业认证', '', '', '0');

-- ----------------------------
-- Table structure for cultural_nav
-- ----------------------------
DROP TABLE IF EXISTS `cultural_nav`;
CREATE TABLE `cultural_nav` (
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_nav
-- ----------------------------
INSERT INTO `cultural_nav` VALUES ('1', '1', '0', '首页', '', '/', '', '1', '0', '0-1');
INSERT INTO `cultural_nav` VALUES ('4', '1', '0', '电商头条', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"3\";}}', '', '1', '0', '0-4');
INSERT INTO `cultural_nav` VALUES ('5', '1', '0', '电商资讯', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"4\";}}', '', '1', '0', '0-5');
INSERT INTO `cultural_nav` VALUES ('6', '1', '0', '行业数据', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"5\";}}', '', '1', '0', '0-6');
INSERT INTO `cultural_nav` VALUES ('7', '1', '0', '电商案列', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"6\";}}', '', '1', '0', '0-7');
INSERT INTO `cultural_nav` VALUES ('8', '1', '0', '人物观点', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"7\";}}', '', '1', '0', '0-8');

-- ----------------------------
-- Table structure for cultural_nav_cat
-- ----------------------------
DROP TABLE IF EXISTS `cultural_nav_cat`;
CREATE TABLE `cultural_nav_cat` (
  `navcid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `remark` text,
  PRIMARY KEY (`navcid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_nav_cat
-- ----------------------------
INSERT INTO `cultural_nav_cat` VALUES ('1', '主导航', '1', '主导航');

-- ----------------------------
-- Table structure for cultural_oauth_user
-- ----------------------------
DROP TABLE IF EXISTS `cultural_oauth_user`;
CREATE TABLE `cultural_oauth_user` (
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
-- Records of cultural_oauth_user
-- ----------------------------

-- ----------------------------
-- Table structure for cultural_options
-- ----------------------------
DROP TABLE IF EXISTS `cultural_options`;
CREATE TABLE `cultural_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_options
-- ----------------------------
INSERT INTO `cultural_options` VALUES ('1', 'member_email_active', '{\"title\":\"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.\",\"template\":\"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\\"http:\\/\\/www.thinkcmf.com\\\">ThinkCMF<\\/a><br\\/><br\\/>&nbcultural; &nbcultural;<strong>---------------<\\/strong><br\\/>&nbcultural; &nbcultural;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbcultural; &nbcultural;<strong>---------------<\\/strong><br\\/><br\\/>&nbcultural; &nbcultural; \\u5c0a\\u656c\\u7684<culturalan style=\\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/culturalan>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbcultural; &nbcultural; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbcultural; &nbcultural; <a title=\\\"\\\" href=\\\"http:\\/\\/#link#\\\" target=\\\"_self\\\">http:\\/\\/#link#<\\/a><br\\/>&nbcultural; &nbcultural; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbcultural; &nbcultural; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbcultural; &nbcultural; \\u6b64\\u81f4<br\\/>&nbcultural; &nbcultural; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>\"}', '1');
INSERT INTO `cultural_options` VALUES ('2', 'site_options', '{\"site_name\":\"\\u5b89\\u5fbd\\u6587\\u60e0\\u7f51\",\"site_host\":\"http:\\/\\/wangsong.com\\/\",\"site_root\":\"\\/\",\"site_tpl\":\"default\",\"site_adminstyle\":\"admin\",\"site_icp\":\"\",\"site_admin_email\":\"wangsong1233276@sina.com\",\"site_tongji\":\"\",\"site_copyright\":\"\",\"site_seo_title\":\"\\u5b89\\u5fbd\\u6587\\u5316\\u7535\\u5546\\u8054\\u76df\\u5b98\\u65b9\\u7f51\\u7ad9\",\"site_seo_keywords\":\"\",\"site_seo_description\":\"\\u5b89\\u5fbd\\u6587\\u5316\\u7535\\u5546\\u8054\\u76df\\u5b98\\u65b9\\u7f51\\u7ad9\",\"urlmode\":\"2\",\"html_suffix\":\".html\"}', '1');
INSERT INTO `cultural_options` VALUES ('3', 'cmf_settings', '{\"banned_usernames\":\"\"}', '1');

-- ----------------------------
-- Table structure for cultural_posts
-- ----------------------------
DROP TABLE IF EXISTS `cultural_posts`;
CREATE TABLE `cultural_posts` (
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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_posts
-- ----------------------------
INSERT INTO `cultural_posts` VALUES ('1', '1', '阿里巴巴 头条 资本市场', '2015-01-30 09:17:39', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><span class=\"text-hxzhu\" label=\"虎嗅注\" style=\"box-sizing: border-box; color: rgb(128, 0, 0); font-family: kaiti, 楷体_GB2312, SimKai;\">虎嗅注：</span><span class=\"text-remarks\" label=\"备注\" style=\"box-sizing: border-box; font-family: kaiti, 楷体_GB2312, SimKai;\">下图是阿里巴巴（BABA）最近五日的股价表现，用“断崖式跌落”来描述并不过分。这是阿里股价去泡沫化的开始吗？本文是尹生价值线的分析。</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><span class=\"img-center-box\" style=\"box-sizing: border-box; display: block;\"><img id=\"loading_i5isqvjy\" src=\"http://localhost/data/upload/ueditor/2015013009172454cadba4607a2.jpg\" title=\"1422575540601692.jpg\" alt=\"屏幕快照 2015-01-30 上午7.49.52_meitu_1.jpg\" datatime=\"1422575540584\" attachid=\"104710\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto;\"/></span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">在与中国国家工商总局就“假货”问题进行公开辩论的炮火中，阿里巴巴发布了<a href=\"http://www.huxiu.com/article/107548/1.html\" target=\"_self\" style=\"box-sizing: border-box; color: rgb(66, 139, 202); text-decoration: none; transition: all 0.2s; -webkit-transition: all 0.2s; background-color: transparent;\">2014年最后一个季度的财报</a>，显示该公司增长放缓的趋势并没有明显扭转的迹象——</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">尽管总收入仍然保持40%的增长，但增长速度放缓的趋势似乎已难以阻挡：在过去的11个季度中，这个季度的增长速度倒数第二，仅比2014年第一季度高出一个百分点。零售平台的交易额表现要好一些，增长仍然有49%，和上一季度增长率一样，但过去四个季度的增长率都在50%以下，这在过去三年中是不寻常的变化。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">而在阿里巴巴管理层引以为傲的移动端，也并非没有阴影——在该季度，移动端交易额占全部零售平台交易额的41.5%，较上一季度的35.8%有较大提高，但移动端收入占全部零售平台收入的比例为30.2%，只比上一季度的29.1%稍有提高。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">另外一个值得关注的指标，是具有风向标作用的第四季度的交易额增长势头也出现放缓，在这个季度增长率为49%，而在2012年和2013年的同一季度，该比例分别为62%和53%。众所周知，每年的第四季度是阿里巴巴的旺季，世人瞩目的双十一就在这个季度中，该季度的成交最为活跃。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">在这个季度，该公司净利润出现了28%的下滑，这应验了尹生（微信公号jia-zhi-xian）在之前的福布斯中文网专栏文章《阿里巴巴盈利或进入宽幅震荡期》中的提醒，未来宽幅震荡也可能还会继续。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">接下来，我采取和阿里巴巴的盈利模式最有可比性的谷歌与百度，以及经过调整后的亚马逊作为其估值的参照对象——调整后，这4家公司的毛利率都在60%以上：</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">过去四个季度，阿里巴巴的营收是114亿美元，同比增长44%；谷歌的营收是648亿美元，同比增长14%；亚马逊转换为与阿里巴巴可比的营收为314亿美元，同比增长22.7%；百度的营收为79亿美元，同比增长53.6%。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">需要说明的是：亚马逊的服务收入与阿里巴巴有可比性，因此在换算时只需将非服务收入进行换算，我的做法是在非服务销售额中扣除非服务的销售成本，其中的服务收入毛利率采用的是谷歌的毛利率。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">按照过去四个季度的PSG（经过增长率调整的市值销售收入比）和PE（市盈率），阿里巴巴、谷歌、亚马逊和百度的PSG分别0.44，0.38，0.2和0.18，阿里巴巴、谷歌和百度的PE分别为62倍，26倍和34倍（目前亚马逊的盈利水平不具备可比性）。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">这也就是说，如果按照和谷歌、亚马逊、百度相同的PSG，阿里巴巴的估值分别为：1906亿美元，1003亿美元和903亿美元；如果按照和谷歌、百度相同的PE，则阿里巴巴的估值分别为：910亿美元和1190亿美元。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">显然，无论采用哪一种指标和哪一个参照对象，阿里巴巴的高估都已经非常明显。实际上，如果考虑到阿里巴巴所面临的更多的不确定性（来自支付宝股权、政策风险、独特的管理架构等），则还应对其估值给予同其风险相匹配的折扣，而目前的股价显然并没有反应这方面的风险。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">此外，<strong style=\"box-sizing: border-box;\">该公司独特的模式所决定的诱人盈利水平，显然让长期期待亚马逊改善盈利却一次次落空的投资者眼前一亮，转而对其进行追捧，而在类似的情绪激励下，很容易产生泡沫，因此投资者应该对这次的事件可能会成为去泡沫化的诱因怀有警惕。</strong></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">在阿里巴巴上市之前，我曾在《阿里与支付宝新协议如何影响估值》一文中，估计其估值区间介于1000～1600亿美元之间，而且可能会靠近1600亿美元的上限进行定价。看空的风险在于：支付宝股权回购比预期乐观，海外增长超预期，和政府达成一致，进入更多的公共服务领域，比如之前和12306的合作。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">即便这次它与政府部门的辩论以协商告终（这很有可能），但其所带来的变化也可能是结构性的：这次事件将彻底促使各方面去正视“假货”这样的话题，不宜再存有侥幸，运营的成本可能会有所上升，而营收的增长可能进一步受损。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Simsun,sans-self&#39;; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><span class=\"text-remarks\" label=\"备注\" style=\"box-sizing: border-box; font-family: kaiti, 楷体_GB2312, SimKai;\">若想阅读更多尹生的互联网相关领域的价值研究文章，请订阅尹生的微信公号价值线（jia-zhi-xian）</span></p><p><span style=\"box-sizing: border-box;\">文章为作者独立观点，不代表虎嗅网立场</span></p><p><br/></p>', '断崖式跌落，阿里股价去泡沫化的开始？', '最新财报显示，阿里增长放缓的趋势并没有明显扭转的迹象', '1', '1', '2015-01-30 09:16:47', null, '0', null, '', '0', '{\"thumb\":\"54cadbaed3db9.jpg\"}', '209', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('37', '1', '阿里巴巴', '2015-02-24 17:54:57', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/arcade.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-full wp-image-31457\" src=\"http://wangsong.com/data/upload/ueditor/2015022405545654ec4a705918f.jpg\" alt=\"arcade\" width=\"1024\" height=\"692\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a><br style=\"box-sizing: content-box;\"/>【咕噜网编译】 没有游戏币了？没关系，用手机续命吧。日本两家最大的电子游戏厅昨日宣布将给店内的游戏机广泛引入电子支付系统，这一系统预计会在今年年底之前启用。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">日本最大游戏厅连锁店之一Taito Station将从今年五月起在它们东京城郊的一家门店率先设立电子支付终端。据《日经新闻》表示，这家公司将在2016年5月之前把这一服务扩展到另外40家门店，随后会被扩展到它们在全国的100多家门店。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">这种便捷化的高科技手段可能会逐渐取代现有的投币系统——这一系统从1973年进入日本至今已有超过40年的历史。采用电子化支付系统将让Taito消耗大约10亿日元（约合人民币5200万元）的成本——不过这不仅仅是为了玩家的便利而做出的举动。由于大多数游戏只支持100日元的游戏币，游戏厅从去年4月以来日本消费税大涨而利润大跌，而采用电子支付手段可以改变这一局面。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">此外，新系统还可以让游戏厅采用多样化的收费方式，比方说让每天的不同时段收取的费用各不相同——这有点像Uber的阶梯式收费系统；并且可以给那些不怎么热门的游戏打折推广，而热门游戏则在黄金时段提高价格，以增加店面营收。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">Taito的电子终端将支持日本最热门的电子货币服务：Suica/Pasmo卡、Edy卡、Edy卡和Nanaco卡。用户可以用实体卡来充值续费，也可以用相对应的手机App来付费。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">via: techinasia</p><p><br/></p>', '告别投币——日本最大游戏厅将引入电子支付系统', '告别投币——日本最大游戏厅将引入电子支付系统', '1', '1', '2015-02-24 17:53:34', null, '0', null, '', '0', '{\"thumb\":\"\"}', '2', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('38', '1', '小米 咕噜', '2015-02-24 17:55:19', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/all-devices2-720x410.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-full wp-image-31417\" src=\"http://wangsong.com/data/upload/ueditor/2015022405551754ec4a85718fe.jpg\" alt=\"all-devices2-720x410\" width=\"720\" height=\"410\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">【咕噜网编译】 一款供专业医学研究人员使用的图片分享平台Figure 1正式登陆印度市场。这款应用可以把医学专家与医学院的学生联系在一起，并让他们共同讨论、分享医疗领域的内容。印度是Figure 1进入的第一个亚洲市场。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">可能你对这些医学方面的产品并不是很了解。事实上，Figure 1最初发布于2013年，已经登陆了48个国家。公司表示，该平台的图片每天被浏览超过150万次。它在美国和英国最受医学人士的欢迎，Figure 1希望它也可以受到印度230万医学相关人士的青睐。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“图片对于医学界来说非常重要，人们从医学图片上可以学到超多知识。Figure 1将在保护隐私的前提下，为印度医学专家提供一个观摩、分享、交流医学发现的平台，”在加拿大多伦多的一个重症监护病房（ICU）构想出了这一概念的医学专家约书亚·兰迪（Joshua Landy）表示。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">这家公司已经与印度的律师进行了一些合作，来确保这个平台符合印度的隐私法律法规。在分享图片的时候，医生可以增加备注和标签，以方便人们搜索。他们还可以调整图片的观看权限。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">Figure 1通过自动检测并屏蔽人脸的方式保护被摄者隐私。用户还可以手动对图片进行模糊处理，以防止露出可以判断病患身份的部位。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">除了在印度市场发布这款App之外，这家公司还顺势推出了Ambassador以及Fellows项目，为医学、护理、牙科方面的学生进行指导。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">在国内市场，似乎还没有与Figure 1功能接近的医学图片分享类产品。不过在医学领域，丁香园已经出品了一系列值得一用的移动app，如丁香客、用药助手等。希望此类产品可以越来越多，进一步推动医学产业的发展。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">via: techinasia</p><p><br/></p>', '学图片分享平台Figure 1登陆印度 国内暂无类似产品', '学图片分享平台Figure 1登陆印度 国内暂无类似产品', '1', '1', '2015-02-24 17:54:59', null, '0', null, '', '0', '{\"thumb\":\"\"}', '17', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('39', '1', '咕噜', '2015-02-24 17:55:42', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\"><a href=\"http://www.cngulu.com/\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; box-sizing: content-box;\">【咕噜头条】</a>1.滴滴快的合并案最快于今日宣布&nbsp;</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">2月14日上午消息，据消息人士透露，滴滴快合并的消息最快将于今日宣布。至此，盛传多日的滴滴快的并购或将公之于众，而关于合并方式、持股比例的细节信息也将一并有了答案。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/x_large1.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-medium wp-image-31442\" src=\"http://wangsong.com/data/upload/ueditor/2015022405554054ec4a9cf01c7.jpg\" alt=\"______.x_large\" width=\"300\" height=\"190\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">日前有媒体报道称，中国最大的两家移动打车应用快的打车和滴滴打车正在深入谈判合并事宜，但合作尚未最后敲定。合并交易后将结束双方日益升级的用户争夺战，创造一个在打车和专车市场具有主导地位的公司，市值将达60亿美元。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">昨日投行知情人士曾对新浪科技表示，滴滴和快的合并应该是两家100%换股的方式，另外合并后双方将保持独立发展。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">2.情人节三成人送电子产品 60后送礼最豪爽</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">日前，记者向500名30~60岁市民展开情人节送礼调查，超七成人表示会送礼。当中，有三成选择送新潮电子产品，如某几款知名品牌手机。值得关注的是，60后比70后、80后豪爽，70后比80后讲求实际，60后的礼物价格多数在3000元以上。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/20141214144118.png\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-medium wp-image-31441\" src=\"http://wangsong.com/data/upload/ueditor/2015022405554154ec4a9d85ac7.png\" alt=\"20141214144118\" width=\"300\" height=\"249\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">在送给伴侣的礼物中，超过三成受访者首选送品牌手机，或新潮电子产品如品牌按摩椅等；其次是日用品、家具，如床品、家居摆设等；再次是购物券、礼金卡；最为寻常的情人节礼物——巧克力、鲜花反而在该次调查中垫底，仅有38人选择该项，不到一成。调查还发现，在不同年龄层中，60后比70后、80后豪爽，70后比80后讲求实际。60后的礼物价格多数在3000元以上，如购买上万元的春节旅游套餐、数千元的情侣体检套餐等。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">3.三星Galaxy S6或将预装微软应用</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">2月14日凌晨消息，据科技博客Sam Mobile最新报道，<span id=\"usstock_MSFT\" style=\"box-sizing: content-box;\">微软</span><span id=\"quote_MSFT\" style=\"box-sizing: content-box;\"></span>可能会将其应用预装在三星Galaxy S6上，这很可能将是今年最受欢迎的Android智能手机。该博客称其已收到有关三星计划的消息，预计该公司将移除自己的所有应用，转而提供下载选择，但微软的应用则将预装在Galaxy S6上，其中可能包括移动版微软Office、 OneNote、OneDrive和Skype等。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/17860665620541043920.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-medium wp-image-31443\" src=\"http://wangsong.com/data/upload/ueditor/2015022405554154ec4a9db3162.jpg\" alt=\"17860665620541043920\" width=\"300\" height=\"225\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">如果这一报道属实，则对微软来说将是个重大消息。自一年前萨提亚·纳德拉(Satya Nadella)接任微软CEO以来，他一直都在强调一个事实，即微软将把业务扩大至自身平台以外。过去几个月中，微软已针对iOS和Android平台发布了多个应用，如用于iPhone的Outlook。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">但业界人士指出，Galaxy S6预装微软的应用对该公司来说无疑是很有利的，但三星为何会这样做则令人感到疑惑。三星将在3月1日正式发布这款新机型。</p><p><br/></p>', '咕噜头条：滴滴快的或今日宣布牵手 情人节60后最豪爽', '咕噜头条：滴滴快的或今日宣布牵手 情人节60后最豪爽', '1', '1', '2015-02-24 17:55:31', null, '0', null, '', '0', '{\"thumb\":\"\"}', '4', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('40', '1', '咕噜', '2015-02-24 17:56:00', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\"><a href=\"http://www.cngulu.com/\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; box-sizing: content-box;\">【咕噜头条】</a>1.广州最大P2P盛融在线陷兑付危机</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">广州累计成交量最大的P 2P平台盛融在线11日晚间发布公告，要求对提现2000元以上的客户进行限制。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/87071397540622844.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-medium wp-image-31244\" src=\"http://wangsong.com/data/upload/ueditor/2015022405555854ec4aae7b2b1.jpg\" alt=\"87071397540622844\" width=\"300\" height=\"220\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">盛融在线于2010年10月正式上线，属P 2P行业内的老平台之一，一度成交量在全国排名第一。据网贷之家数据显示，截至2015年2月10日，盛融在线总成交量为126 .63亿元，待收本息共计达9 .21亿元。其中，待收的投资人达10837人，人均待收金额为8 .5万元。盛融在线对相关数据表示不清楚。对于做出提现限制，盛融在线副总范斌对南都记者表示，主要系一个制造业以及一个金融业项目出现逾期，再加上平台此前系统问题，以及盛融在线C E O刘志军致投资人的一封信，导致投资人紧张，进而出现挤兑。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">2.网信办开展“婚恋网站严重违规失信”专项整治</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">近日，针对一些婚恋网站屡现违法违规和严重失信行为的问题，为依法打击网上婚恋网站乱象，维护群众合法权益，促进网络诚信建设制度化，国家网信办联合有关部门在全国范围内启动开展“婚恋网站严重违规失信”专项整治工作。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/600_c17fa460-899f-4268-b4b9-848883f94b58.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-medium wp-image-31425\" src=\"http://wangsong.com/data/upload/ueditor/2015022405555854ec4aaea98ec.jpg\" alt=\"600_c17fa460-899f-4268-b4b9-848883f94b58\" width=\"300\" height=\"274\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">国家网信办有关负责人介绍，此次专项整治工作将清理、查处、关闭一批违法违规和严重失信的婚恋网站，遏止婚恋网站违规失信乱象。突出“三个坚决查处”：一是利用婚恋网站涉嫌实施有组织诈骗行为的团伙坚决查处；二是利用婚恋网站涉嫌实施卖淫嫖娼行为的团伙坚决查处；三是婚恋网站涉嫌弄虚作假、不正当运营、纵容严重违规失信行为发生的坚决查处。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">3.我国去年移动支付金额22.6万亿 连续2年超100%增长</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">据数据显示，2014年，全国共发生电子支付业务333.33亿笔，金额1404.65万亿元，同比分别增长29.28%和30.65%。其中，移动支付业务45.24亿笔，金额22.59万亿元，同比分别增长170.25%和134.30%。而2013年，全国共发生电子支付业务257.83亿笔，金额1075.16万亿元，同比分别增长27.40%和29.46%。其中，移动支付业务16.74亿笔，金额9.64万亿元，同比分别增长212.86%和317.56%。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/201402191017428179.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-medium wp-image-31426\" src=\"http://wangsong.com/data/upload/ueditor/2015022405555854ec4aaed86f7.jpg\" alt=\"201402191017428179\" width=\"300\" height=\"225\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">中国社会科学院金融研究所所长助理杨涛向记者分析称，移动支付业务快速发展得益于几个条件：第一，从需求角度来看，网络经济的发展带动了消费需求，移动端支付的发展也助力了消费的增长。第二，从供给角度来看，高新技术的发展，移动技术创新都带给了移动支付飞速发展的动力，互联网支付机构飞速发展，传统银行也纷纷发展无卡支付业务。第三，银行卡支付需要场景和终端，而移动支付随着市场发展随时随地可支付，速度和便捷性非传统支付可比。第四，目前监管部门对支付行业的标准正逐渐推进，法律环境在规范化，移动支付有了法律保障，发展环境更为良好。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p><br/></p>', '咕噜头条：P2P盛融在线陷兑付危机 网信办整治婚恋网站', '咕噜头条：P2P盛融在线陷兑付危机 网信办整治婚恋网站', '1', '1', '2015-02-24 17:55:44', null, '0', null, '', '0', '{\"thumb\":\"\"}', '6', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('41', '1', '微信', '2015-02-24 17:56:20', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a title=\"咕噜网\" href=\"http://www.cngulu.com/\" target=\"_blank\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; box-sizing: content-box;\">【咕噜网消息】</a>知道刘嘉玲为什么此前发自己的素颜照吗？其实那是嘉玲面膜的营销策划，主要在微信朋友圈内刷屏推广。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">在微信朋友圈卖面膜绝非只有嘉玲面膜一家。事实上，微信朋友圈已经成为了“微商”的新渠道。但是，这种新商业渠道也面临着类似“传销”的质疑，以及目前监管的缺失。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2014/01/%E5%BE%AE%E4%BF%A1%E7%90%86%E8%B4%A2%E9%80%9A%E9%A6%96%E6%97%A5%E4%B8%8A%E7%BA%BF%E9%81%AD%E6%8B%A5%E5%A0%B5-%E4%B8%93%E5%AE%B6%E5%91%BC%E5%90%81%E7%90%86%E6%80%A7%E7%90%86%E8%B4%A2.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"aligncenter size-full wp-image-18471\" src=\"http://wangsong.com/data/upload/ueditor/2015022405561854ec4ac2a2c1a.jpg\" alt=\"微信理财通首日上线遭拥堵  专家呼吁理性理财\" width=\"400\" height=\"223\" style=\"border: none; vertical-align: middle; box-sizing: content-box; max-width: 600px; float: center !important; height: auto !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">明星效应爆棚</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">有人在你的朋友圈里卖面膜吗？或许你经常会听到：“我一大学同学卖面膜天天刷屏，好想拉黑。”</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">但当刘嘉玲也在微博微信晒自拍照时，不少网友表示被震撼到了。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“微商渠道，说得形象一点，就有点像广州话说的‘走鬼’，即摆地摊的。其运营成本很低，吸引了很多人参与进来。且这个市场目标规模已经渐成气候，1个‘走鬼’一天可能只卖出几件货，但100万个‘走鬼’产生的销售，就是很大的生意了。”韩后董事副总裁肖荣燊如是说。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">深圳触电电子商务创始人龚文祥此前向媒体更是直言，微信卖货(面膜为主)的信息流已经占到整个微信朋友圈的三分之一左右。微商80%是卖面膜的，而80%的微商是女性，这其中的80%以家庭妇女为主。龚文祥此前估计微商已达到千万规模，如果据此计算，在微信上卖面膜的个人卖家已经达到800万。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">刘嘉玲创立的嘉玲面膜，想做的生意就是朋友圈生意。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">但嘉玲并非首个吃螃蟹者。从相关企业公布的代理数字看，去年微信最火的面膜俏十岁，其“微商”就有两三百万人。十几位官方合作伙伴购买俏十岁货品后，再进行分销，几乎每个官方合作伙伴下面对接的经营者就有几万人。面膜微商思埠一家旗下微商就超过百万人；有很多个人微商，一个人旗下就有10万下线。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">为什么是面膜先热</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">小小的面膜正在通过微信朋友圈，以极快的速度贴上中国女性的脸庞。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">那么，为什么是面膜？</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">中国化妆品市场营销研究专家冯建军告诉南都记者，这一新兴电子商务业态已经热了很久了。而之所以热，是因为微商业态主要通过移动端朋友圈，关系营销非常浓厚。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“整个化妆品微商界，目前真正在这个系统里成功的还不多。大家都想做老大。一年销售过10亿元的还是凤毛麟角。2013年底才开始兴起，目前北京的俏十岁和广州的思埠是绝对的龙头。这些品牌可以说用1年时间走了人家十几年的路，已引发一些外界侧目，看到挣钱效应了。”在冯建军看来，微商正在造就富豪，“我身边一个朋友做某日化的微商生意，销售价格是138元，他63元给总代，一代73元，特约88元，一件赚50元。”</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">当然，面膜成为微商营销的大热点，与其市场保有量大、大部分女性都用过面膜以及使用频次高有关，其他护肤品一瓶能用几个月，但面膜则是一次一张。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">此外，在韩后等企业看来，国家对这块渠道进驻没有税费，微信也尚未收后台费用，也是造成新面膜品牌更倾向于微商渠道的客观原因。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">生意还得回归生意</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“我买过朋友推荐的面膜，还不错，就是贵到爆，后来我果断转淘宝了，比朋友卖的便宜一半。”这是广州一位曾经的微商面膜品牌消费者的说法。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">很显然，微商渠道价格偏贵是其转向“淘宝”即传统电商渠道的主要原因。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">当然，对于那些致力于通过微信卖面膜致富的电商人来说，可能面临的问题远不止价格因素。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“嘉玲面膜一开始打刘嘉玲明星牌，势头很好，但与俏十岁和思埠还不在一个平台上，最近传闻发展没那么好，股权已经转让了。”广州一位资深日化专家对南都记者表示。不过，对于这种说法，一位嘉玲面膜的微商代理指责称，这一说法是对嘉玲面膜的恶意攻击。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">公开资料显示，在嘉玲面膜创立3个月后，数字王国集团于2014年12月公告，拟以3.125亿元收购嘉玲国际51%股权。倘若嘉玲国际没有达到2015年目标溢利，收购价则可予调减。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">而主管韩后电子商务项目的肖荣燊则称，一个面膜品牌靠明星效应并非长远之计。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“短期来说势头还行，但长期来说，不看好名人效应。走微商渠道的面膜最终能否活得好，还是要看产品质量和市场营销，即生意还是要回归生意本身。”据肖荣燊透露，韩后目前也在做这块，但在是否规模化运作的问题上，还是保持谨慎态度。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“我们不希望做得很夸张，让大家盲目地去发展下线。目前做得好的，大都是采用击鼓传花的方式去发展分销，但大家慢慢会发现，一旦消费者不买账，最后货都压在了最小的代理身上。”肖荣燊进一步指出。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">商机背后也含隐忧</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">一片面膜值多少钱？消费者看到的可能是50元，但在创业者眼中，却可以是百万、上千万甚至数亿元。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">事实上，在嘉玲面膜出现之前，诸如百雀羚、韩束等品牌已进入微商渠道。目前国内走微商渠道的面膜品牌企业已经有上百个，普遍没有规模。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">如果说规模不是问题的话，那商业模式的问题则值得深究。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">据了解，目前，化妆品微商也分“流派”，一派是类直销模式，强调人与人的交流，靠不断发展下线获取下家的利润来生存，这种模式存在非常大的风险，一些品牌几个月的功夫就出现在了微信上售卖；另一派则是类似代理商的模式或者说贸易模式，加盟的个体户都是以实现微信渠道销售为目的，而不是以发展下线赚取下线差价为目的。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">而前一种模式，被部分传统日化企业和专家视为“与国家一些规定相左”。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“部分微商实际上是变相的传销。无店铺经营，多层次分销。国家规定直销的分销不可以超过3次，超过了就有传销的嫌疑。在这种模式下，一个面膜微商品牌，首先会在全国招15个战略合作伙伴，在下面设一级、二级、三级代理，有的还会再加一个天使代理。”冯建军表示。“这种模式很类似传销中的金字塔结构，塔尖是那些总代、一代、二代，他们手中往往没有产品销售，只做分销；塔基则是那些在一线销售的三代和特约或天使代理，这些品牌一旦质量或营销出了问题，往往会积压大量产品。”</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">易观国际电子商务高级分析师卓塞君接受南都记者采访时表示，正规的微商面膜品牌通常会有微店，有完整的产品体系，其产品是经过注册、合规合法的产品，注重产品的实际销售。而一些不正规的微商面膜品牌，往往没有明确的产品生产信息，产品质量差，且以发展下线为主要目的。这类品牌最终会被淘汰。“如果说被骗一次在所难免，但你肯定不愿被骗N次。”</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">正规军未来潜力几何</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">但微商毕竟是时代的产物，是移动互联崛起的产物。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">南都记者在采访中注意到，尽管也有业内企业称，现在讨论面膜微商市场究竟能有多大商机还为时过早，但多数受访者依旧对微商渠道抱有美好的想象。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">由于大多数的面膜微商只是一个营销场所，不是一个交易场所，缺失统计数据。此外，没有管控举措，进出比较自由，也是导致这个新兴产业数据缺乏的一大因素。不过，卓塞君还是从整个电子商务发展的角度给出了以下分析：“微商是基于微信流量产生的商品交易平台。整体微商市场预计300亿元左右，日化市场我们预测规模在10亿-20亿元之间，面膜是日化微商市场最大的一块，分到面膜的市场约在10亿元。”</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">卓塞君认为，随着微信与京东进一步合作，基于商店、店铺的营销将更加精准化推送，届时，微信的商业变现将向精准化、大数据推导的方向走。而这也意味着未来的基于微信的微商商业模式会更加精准推送。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">而在肖荣燊看来，诸如思埠、俏十岁等品牌经过大半年的爆发式增长后，后续增速或会有所放缓。但肖荣燊还是预计，未来面膜在微商和电商的销售占比会变为1：1。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">对此冯建军也有同感，在其看来，整个行业的沉淀还是不够，未来线上、线下会是5：5开。而电商和微商应该在3：5。微商对线下有影响，但对电商的影响更大。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">采写：南都记者&nbsp;马建忠&nbsp;&nbsp;南都制图:林军明</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">数字</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">微商80%是卖面膜的，而80%的微商是女性，这其中的80%以家庭妇女为主。预计在微信上卖面膜的个人卖家已经达到800万。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">2014年的面膜微商市场火爆异常。有资料显示，大大小小的面膜品牌在近两年间增长了4倍。面膜从几年前的功效型产品已经变成了护肤的快消品。面膜市场的体量也在逐级增大，中国面膜市场规模已达100亿元左右，目前正以每年约30%的速度增长。</p><p><br/></p>', '微信朋友圈卖的最火的为什么是面膜？', '微信朋友圈卖的最火的为什么是面膜？', '1', '1', '2015-02-24 17:56:03', null, '0', null, '', '0', '{\"thumb\":\"\"}', '3', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('42', '1', '魅族 360 小米', '2015-02-24 17:56:47', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/2011081811422372144.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"aligncenter size-full wp-image-31402\" src=\"http://wangsong.com/data/upload/ueditor/2015022405564554ec4add0f2d0.jpg\" alt=\"2011081811422372144\" width=\"900\" height=\"562\" style=\"border: none; vertical-align: middle; box-sizing: content-box; max-width: 600px; float: center !important; height: auto !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a title=\" 魅族、360剑指小米 小米楚歌四面\" href=\"http://www.cngulu.com/\" target=\"_blank\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; box-sizing: content-box;\">【咕噜网消息】</a>2月9日，魅族宣布获6.5亿美元战略投资，其中阿里巴巴集团领投5.9亿美元，海通开元基金也将投资魅族6000万美元。在牵手阿里前，魅族刚刚“搭上”海尔。由于面临共同的对手和威胁：“小米圈子”，铁三角的结盟可谓“水到渠成”。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">魅族创始人黄章和小米创始人雷军曾是“好基友”，后因雷军“知道得（魅族）太多”后，另起炉灶做手机，让黄章觉得被朋友背后插了一刀。此后二人多次公开骂战。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“铁三角”的合作并不排外，其他手机和硬件公司都可以加入进来。据称，和小米“很铁”的美的，也已经加入了阿里云平台。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">另一边，2月12日消息，由酷派和360合资成立的公司已经确认由周鸿祎担任CEO，郭德英担任董事长一职，新公司将在年后3月31日正式运营。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">360负责新手机业务的副总裁潘志勇在360无线上表示，将推出新手机，周鸿祎现场开玩笑称：“360的人不玩期货，不打白条，未来也不会这么玩儿”。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">分析人士称，周鸿祎暗示360做手机不会做期货，顺道揶揄小米。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">近年来，小米发展迅猛，从成立至今基本“无往不胜”。而此番，魅族联合阿里、海尔，360与酷派剑锋都直指小米。小米和小米的生态圈将面对巨大的竞争压力，其处境可谓是四面楚歌。</p><p><br/></p>', '魅族、360剑指小米 小米楚歌四面', '魅族、360剑指小米 小米楚歌四面', '1', '1', '2015-02-24 17:56:22', null, '0', null, '', '0', '{\"thumb\":\"\"}', '124', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('32', '1', '2015年中国A股上市互联网企业发展情况预测', '2015-02-24 17:52:14', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">随着互联网业务的高速发展，特别是以云计算为代表的新一轮产业革新浪潮的推进，IDC(互联网数据中心)市场正进入快速增长期。根据美国著名IT行业市场研究分析机构IDC发布的《中国互联网数据中心服务市场2012年至2016预测与分析》报告显示，预计未来几年中国IDC市场的复合增长率(CAGR)将达25.5%。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">金光闪闪的前景吸引了诸多A股公司加速将“数据技术变现”。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">咕噜大数据挖掘通过与国内众多应用分发平台、渠道、广告联盟及数据机构保持合作关系，汇聚了大量的移动互联网用户行为、渠道分析、用户留存等数据。我们针对2015年中国A股上市互联网企业发展情况进行预测。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/hypersnap407.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-full wp-image-31488\" src=\"http://wangsong.com/data/upload/ueditor/2015022405521254ec49cc9a31a.jpg\" alt=\"hypersnap407\" width=\"1188\" height=\"834\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">(咕噜大数据制图，点击查看大图)</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">1月21日发布的《2014移动互联网数据报告》显示：2014年，我国移动智能终端用户规模达10.6亿，较2013年增长231.7%，增速远超全球同期市场。而安卓与iOS平台用户比例约为7:3，其中，安卓平台主要机型小米和三星分居第一和第二位，中国本土手机品牌正在崛起。移动互联网网民近6成为男性，80后中青年是移动网民的主力军，90后青少年也逐渐成为新生力量。从用户使用习惯分析，大屏幕移动设备越来越受网民青睐，使用4-5英寸屏幕设备的用户增长最快，iOS用户对操作系统的更新行为更加积极。而对于运营商的选择，安卓用户更倾向于选择中国移动，iOS用户则青睐中国联通。在接入网络方式方面，Wi-Fi上网用户占比最大，并且有越来越多的用户转向4G网络，使得上网环境得到明显改善，加速移动互联网的深层演进。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">咕噜大数据挖掘指出，2015年，拥有数据资源和数据技术服务能力的公司将有望率先分享大数据变现蛋糕。而在应用领域中，金融、交通、医疗和教育是最有望率先实现大数据规模运用的细分领域。随着移动互联网度过了需求集中于通讯与社交方面的“萌芽期”和以购物与娱乐为代表的“初步发展期”，迈入到“高速发展期”。出行、医疗、教育、餐饮等与生活密切相关的细分领域应用纷纷涌现，多元化生活服务为用户带来极大便利，线上与线下联动（O2O）渐成趋势。而典型应用的不断涌现，也让O2O行业迎来用户增长与资本市场融资双重热潮。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">附件：2014年2月13日-2015年2月13日中国A股上市互联网企业涨跌幅度。</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">乐视网 2015年2月13日收盘总市值649.15亿，过去一年涨跌幅度为54.65%。<br style=\"box-sizing: content-box;\"/>腾信股份 2015年2月13日收盘总市值93.84亿，过去一年涨跌幅度为368.17%<br style=\"box-sizing: content-box;\"/>焦点科技 2015年2月13日收盘总市值92.03亿，过去一年涨跌幅度为39.68%<br style=\"box-sizing: content-box;\"/>生意宝 2015年2月13日收盘总市值184.40亿，过去一年涨跌幅度为195.81<br style=\"box-sizing: content-box;\"/>人民网 2015年2月13日收盘总市值294.89亿，过去一年涨跌幅度为22.62%<br style=\"box-sizing: content-box;\"/>三六五网 2015年2月13日收盘总市值104.03亿，过去一年涨跌幅度为77.28%<br style=\"box-sizing: content-box;\"/>三五互联 2015年2月13日收盘总市值48.57亿，过去一年涨跌幅度为31.57%<br style=\"box-sizing: content-box;\"/>顺网科技 2015年2月13日收盘总市值87.64亿，过去一年涨跌幅度为7.21%<br style=\"box-sizing: content-box;\"/>昆仑万维 2015年2月13日收盘总市值188.86亿，过去一年涨跌幅度为176.89%<br style=\"box-sizing: content-box;\"/>京天利 2015年2月13日收盘总市值86.23亿，过去一年涨跌幅度为641.33%<br style=\"box-sizing: content-box;\"/>中青宝 2015年2月13日收盘总市值75.79亿，过去一年涨跌幅度为-1.19%<br style=\"box-sizing: content-box;\"/>东方财富 2015年2月13日收盘总市值498.96亿，过去一年涨跌幅度为300.10%<br style=\"box-sizing: content-box;\"/>游族网络 2015年2月13日收盘总市值136.12亿，过去一年涨跌幅度为-38.49%</p><p><br/></p>', '2015年中国A股上市互联网企业发展情况预测', '2015年中国A股上市互联网企业发展情况预测', '1', '1', '2015-02-24 17:51:45', null, '0', null, '', '0', '{\"thumb\":\"\"}', '5', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('33', '1', '滴滴 快的', '2015-02-24 17:52:36', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a title=\"没有红包的滴滴、快的 你还会用吗？\" href=\"http://www.cngulu.com/\" target=\"_blank\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; box-sizing: content-box;\">【咕噜网消息】</a>昨日，情人节的浪漫气息中，滴滴、快的这两家曾经水火不容的打车软件公司宣布“闪婚”。这让很多网友惊呼：“又相信爱情了。”然而，对于滴滴、快的合并，人们更关注滴滴、快的合并后打车是否还会有补贴、红包。没有了红包的滴滴、快的打车软件，你还会用吗？</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/U7716P1DT20150213163511.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"aligncenter size-full wp-image-31482\" src=\"http://wangsong.com/data/upload/ueditor/2015022405523454ec49e2838cf.jpg\" alt=\"U7716P1DT20150213163511\" width=\"550\" height=\"361\" style=\"border: none; vertical-align: middle; box-sizing: content-box; max-width: 600px; float: center !important; height: auto !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">两大对头为何会合并？</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">投资界人士指出，滴滴快的合并很大程度上是背后资本驱动。目前滴滴、快的均已经获得了好几轮的融资，各方的创始团队所持股份比例下降，资本方在其中获得很大的话语权。资本讲究的是套现盈利，在两家竞争难分高下，且持续烧钱补贴的大环境中，合并无疑是不错的选择。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">快的内部知情人士透露，由于在合并之前，双方陷入了非理性的消耗战，导致上市希望渺茫。在合并后，IPO计划则会提上日程。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">打车还继续发红包吗？</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">从打车大战到专车大战，滴滴、快的不间断通过微信、支付宝、微博等各自渠道发放打车、专车的代金券。两家合并了，让用户格外挂心的一件事是：你们合并了，还发红包吗？</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">合并后的新公司总裁柳青表示，虽然补贴还会持续，但失去了对手的刺激，打车软件的补贴力度预计会减少。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">合并是否涉嫌垄断？</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">根据易观国际最新发布的《中国打车APP市场季度监测报告2014年第4季度》数据显示，截至2014年12月，中国打车APP累计账户规模达1.72亿。其中快的打车、滴滴打车分别以56.5%、43.3%的比例占据中国打车APP市场累计账户份额领先位置。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">根据《反垄断法》，如果一家公司市场份额超过二分之一，或两家合并后超过三分之二，会被推定具有市场支配地位。但《反垄断法》针对的是滥用支配地位，如拒绝交易、限制交易、搭售等行为。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">根据《反垄断法》规定，是否违法，具体要看双方合并后经营中是否存在“垄断行为”，而不是合并后的“垄断状态”。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">移动支付端口如何接入？</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">从“封杀”事件可以看出，支付宝和微信支付之间的利益争夺尤为激烈。目前用户仍然无法在微信里打开淘宝网店链接，或是从淘宝网店上打开来自微信网店的二维码链接，微信朋友圈里只能看见滴滴红包，难见快的红包。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">而从移动支付来看，滴滴打车接入的是微信支付，快的打车接入的是支付宝，移动入口的争夺涉及很多利益，如何分配和平衡，将成为合并后管理团队面临的一大考验。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">恶性的大规模持续烧钱的竞争不可持续。伴随两家公司合并，轰轰烈烈的补贴大战或将宣告终结。然而，<strong style=\"box-sizing: content-box;\">双方合并后存在的问题是，化干戈为玉帛，结束了烧钱补贴，是否能给用户的体验带来显著的提升？</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">很多司机、用户都表示，补贴、红包少了会减少使用打车软件的次数。若不能提升用户体验，市场占有份额再高，也难免会造成用户的流失，毕竟大部分用户都会更愿意使用高补贴的打车应用软件。</p><p><br/></p>', '没有红包的滴滴、快的 你还会用吗？', '没有红包的滴滴、快的 你还会用吗？', '1', '1', '2015-02-24 17:52:16', null, '0', null, '', '0', '{\"thumb\":\"\"}', '3', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('34', '1', '需求饱和2014年我国电压力锅销量下降一成', '2015-02-24 17:52:57', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">家电消费网报道&nbsp;&nbsp;昨天，家电调研公司奥维云网发布的监测数据显示，2014年电压力锅市场整体销售量2500万台，零售额93亿元，较2013年分别下降10.4%和6.6%。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">家电分析师柴翠翠对家电消费网表示，这是因为去年小家电市场出现需求饱和、产品同质化、恶性价格竞争和成本上升等问题，导致行业一直难以寻找产业升级的突破口。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/%E7%94%B5%E5%8E%8B%E5%8A%9B%E9%94%85.png\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"aligncenter size-full wp-image-31467\" src=\"http://wangsong.com/data/upload/ueditor/2015022405525654ec49f84f5d5.png\" alt=\"电压力锅\" width=\"636\" height=\"602\" style=\"border: none; vertical-align: middle; box-sizing: content-box; max-width: 600px; float: center !important; height: auto !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">监测数据显示，电压力锅市场品牌集中度持续走高，主要体现在美的、九阳和苏泊尔三大品牌垄断市场的局面依旧，三大品牌的零售量份额从2013年的79.6%增长到2014年的83.1%。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">零售单价上，2014年零售单价411元，同比去年单价基本持平。从电压力锅市场各价格段零售比重分布看，300-400元的中端电压力锅产品最受消费者欢迎，且呈进一步增长的态势。其零售量份额达33.8%，同比增长1.4%。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">据了解，2014年下半年开始，电压力锅借力IH饭煲东风，开始新一轮产业提速，IH电压力锅初露锋芒。尽管IH技术切入速度较快，但其体量小的现状仍然不足以改变电压力锅行业下滑的颓势。预计到2015年效果将会显现出来。</p><p><br/></p>', '需求饱和2014年我国电压力锅销量下降一成', '需求饱和2014年我国电压力锅销量下降一成', '1', '1', '2015-02-24 17:52:44', null, '0', null, '', '0', '{\"thumb\":\"\"}', '1', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('35', '1', '《华尔街日报》确认苹果公司正在开发电动汽车', '2015-02-24 17:53:15', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2015/02/tim-cook.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"alignnone size-full wp-image-31452\" src=\"http://wangsong.com/data/upload/ueditor/2015022405531454ec4a0a21b70.jpg\" alt=\"tim cook\" width=\"1200\" height=\"813\" style=\"border: none; vertical-align: middle; max-width: 600px; box-sizing: content-box; height: auto !important; float: center !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">【咕噜网编译】 彭博新闻2月14日引自《华尔街日报》的消息称苹果公司正在开发自家的电动汽车。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">这一项目的代号为“泰坦”，设计理念近似于小型休旅车。这家总部位于加州库比蒂诺的公司已经指派了数百人来开发这款交通工具。据知情人士透露，苹果公司的一些高管已经前往奥地利与一些高端汽车品牌制造商进行了碰面，这表示它们可能不仅仅是想推出一款车型。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">苹果公司已经拥有了管理海量供应链的经验，并且具备了进入电动汽车市场的技术。这家公司一直在为它们的iPhone、iPad和Mac研究电池技术。它们于2012年发布的地图系统也可以被用于导航。去年，苹果引入了CarPlay车载系统，它整合了iTunes、地图、讯息和其他功能。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">开发汽车这个想法已经萦绕在苹果公司脑海中很久了。苹果高级营销副总裁菲尔·席勒于2012年在法庭证词中表示，苹果高管在第一款iPhone2007年上市之前就讨论过开发汽车的主意。J Crew集团负责人兼苹果董事会成员Mickey Drexler于2012年也表示苹果联合创始人之一史蒂夫·乔布斯也曾希望打造一款汽车。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">苹果发言人Tom Neumayr拒绝对此发表评论。《金融时报》于周五早些时候透露苹果公司正在为它们全新的研究实验室招聘汽车行业的专家。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"box-sizing: content-box;\">相爱相杀特斯拉</strong></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">硅谷还有其他一些公司正在造车。谷歌正在打造一款自动驾驶汽车。特斯拉公司更不用说，它们已经挖去了至少150名苹果公司的前员工，这一数字要比它们从任何其他公司那里挖角的数量都要高。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“从设计理念来讲，苹果跟我们非常接近，”特斯拉联合创始人兼CEO伊隆·马斯克最近在采访中告诉彭博商业周刊。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">马斯克还说，苹果一直想招募特斯拉的员工，它们设定了25万美元的签约费以及60%的提薪幅度。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“苹果正在非常努力地从特斯拉这边招人，”他说。“但是到目前为止，它们的成效并不显著。”</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">据《华尔街日报》报道，iPhone产品设计副总裁Steve Zadesky便是“泰坦”电动汽车项目的负责人，他于16年前从福特汽车加入了苹果。在福特，他当了三年的工程师。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">在过去的两年里，苹果公司还从福特那里请来了Haran Arasaratnam来当电池工程师。今年一月，苹果公司还从瑞典汽配公司Autoliv那里招来了Robert Gough。他在过去的四年里一直在研究与雷达、主动安全传感器相关的技术。</p><p><br/></p>', '《华尔街日报》确认苹果公司正在开发电动汽车', '《华尔街日报》确认苹果公司正在开发电动汽车', '1', '1', '2015-02-24 17:52:59', null, '0', null, '', '0', '{\"thumb\":\"\"}', '1', '0', '0', '0');
INSERT INTO `cultural_posts` VALUES ('36', '1', '百度宣布转型成功：移动搜索收入首超PC', '2015-02-24 17:53:32', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a title=\"咕噜网\" href=\"http://www.cngulu.com/\" target=\"_blank\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; box-sizing: content-box;\">【咕噜网消息】</a>经历过前期快速增长后，移动搜索在百度的营收中又有了新的定位。百度于昨日发布的2014财年四季度和全年未经审计的财报显示，该公司移动收入在总营收中占比42%，具体到去年12月，其移动搜索收入首次超过PC端。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.cngulu.com/wp-content/uploads/2013/11/%E7%A7%BB%E5%8A%A8%E6%90%9C%E7%B4%A2.jpg\" class=\"centerclass\" style=\"color: red; font-family: 微软雅黑, Arial, HELVETICA; text-align: center; display: inherit; box-sizing: content-box;\"><img class=\"aligncenter size-full wp-image-15055\" src=\"http://wangsong.com/data/upload/ueditor/2015022405533054ec4a1a80ab9.jpg\" alt=\"移动搜索\" width=\"365\" height=\"300\" style=\"border: none; vertical-align: middle; box-sizing: content-box; max-width: 600px; float: center !important; height: auto !important;\"/></a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">据悉，百度去年四季度总营收为140.5亿元，同比增长47.5%；净利润32.29亿元，同比增长16%。去年总营收和净利润分别同比增长53.6%和25.4%。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">值得注意的是，百度去年三季度移动端流量就已超过PC端。而从去年整个财年来看，百度移动收入占比一季度到四季度分别为25%、30%、36%以及42%，呈现快速上涨态势。另可以看出，从去年三季度开始百度就已经符合移动公司的标准。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">业内人士分析，百度移动端营收的增长是其发力移动端、增大移动市场投入的结果。据其财报显示，由于移动产品和服务支出的增长，百度去年四季度销售、总务和行政支出为35.24亿元，同比增长89.2%，而去年全年销售、总务和行政支出为103.82亿元，同比增长100.7%。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">百度董事长兼首席执行官李彦宏表示，在去年12月来自于移动端的搜索营收首次超过了PC端。“我们已经成功地从以PC为中心的公司过渡为一家以移动为先的公司。”</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; word-wrap: break-word; box-sizing: content-box; line-height: 27px; text-indent: 2em; font-family: 微软雅黑, 黑体, Tahoma, Verdana, 宋体; color: rgb(34, 34, 34); white-space: normal; background-color: rgb(255, 255, 255);\">“目前移动搜索的流量变现率低于PC，在移动端流量日益增长的情况下，百度的业绩短期会受到影响，但从长期来看，移动变现率将在全年呈现上涨态势。”百度首席财务官李昕晢表示。业内分析人士认为，日前百度的直达号、百度钱包、百度金融等围绕连接服务与人的业务均是配合移动战略而来。</p><p><br/></p>', '百度宣布转型成功：移动搜索收入首超PC', '百度宣布转型成功：移动搜索收入首超PC', '1', '1', '2015-02-24 17:53:17', null, '0', null, '', '0', '{\"thumb\":\"\"}', '4', '0', '0', '0');

-- ----------------------------
-- Table structure for cultural_role
-- ----------------------------
DROP TABLE IF EXISTS `cultural_role`;
CREATE TABLE `cultural_role` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_role
-- ----------------------------
INSERT INTO `cultural_role` VALUES ('1', '超级管理员', '0', '1', '拥有网站最高管理员权限！', '1329633709', '1329633709', '0');

-- ----------------------------
-- Table structure for cultural_role_user
-- ----------------------------
DROP TABLE IF EXISTS `cultural_role_user`;
CREATE TABLE `cultural_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_role_user
-- ----------------------------

-- ----------------------------
-- Table structure for cultural_route
-- ----------------------------
DROP TABLE IF EXISTS `cultural_route`;
CREATE TABLE `cultural_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_route
-- ----------------------------

-- ----------------------------
-- Table structure for cultural_slide
-- ----------------------------
DROP TABLE IF EXISTS `cultural_slide`;
CREATE TABLE `cultural_slide` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_slide
-- ----------------------------
INSERT INTO `cultural_slide` VALUES ('1', '1', '1', '54c9f1aa0df5d.jpg', '/', '', '', '1', '0');
INSERT INTO `cultural_slide` VALUES ('2', '1', '2', '54c9f2e1ba482.jpg', '/', '', '', '1', '0');
INSERT INTO `cultural_slide` VALUES ('3', '1', '3', '54c9f2f67674b.jpg', '/', '', '', '1', '0');
INSERT INTO `cultural_slide` VALUES ('4', '2', '1', '54ed61622643f.png', 'http://www.aliresearch.com/', '', '', '1', '0');
INSERT INTO `cultural_slide` VALUES ('5', '2', '2', '54ed6170f40a0.png', 'http://www.aliresearch.com/', '', '', '1', '0');
INSERT INTO `cultural_slide` VALUES ('6', '2', '3', '54ed617e4e35a.png', 'http://www.aliresearch.com/', '', '', '1', '0');
INSERT INTO `cultural_slide` VALUES ('7', '2', '4', '54ed618e4fa75.png', 'http://www.aliresearch.com/', '', 'http://www.aliresearch.com/', '1', '0');

-- ----------------------------
-- Table structure for cultural_slide_cat
-- ----------------------------
DROP TABLE IF EXISTS `cultural_slide_cat`;
CREATE TABLE `cultural_slide_cat` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_idname` varchar(255) NOT NULL,
  `cat_remark` text,
  `cat_status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  KEY `cat_idname` (`cat_idname`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_slide_cat
-- ----------------------------
INSERT INTO `cultural_slide_cat` VALUES ('1', '首页幻灯片', 'sliders', '', '1');
INSERT INTO `cultural_slide_cat` VALUES ('2', '精彩视界', 'jcsj', '', '1');

-- ----------------------------
-- Table structure for cultural_terms
-- ----------------------------
DROP TABLE IF EXISTS `cultural_terms`;
CREATE TABLE `cultural_terms` (
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_terms
-- ----------------------------
INSERT INTO `cultural_terms` VALUES ('3', '电商资讯', '', 'article', '', '0', '0', '0-3', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('4', '文化产业', '', 'article', '', '0', '0', '0-4', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('19', '电商专题', '', 'article', '', '3', '0', '0-3-19', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('13', '联盟空间', '', 'article', '', '0', '0', '0-13', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('14', '电商新闻', '', 'article', '', '3', '0', '0-3-14', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('15', '行业数据', '', 'article', '', '3', '0', '0-3-15', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('16', '人物观点', '', 'article', '', '3', '0', '0-3-16', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('17', '典型案例', '', 'article', '', '3', '0', '0-3-17', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('18', '电商干货', '', 'article', '', '3', '0', '0-3-18', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('20', '文产新闻', '', 'article', '', '4', '0', '0-4-20', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('21', '文化企业', '', 'article', '', '4', '0', '0-4-21', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('22', '项目对接', '', 'article', '', '4', '0', '0-4-22', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('23', '文化活动', '', 'article', '', '4', '0', '0-4-23', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('24', '联盟简介', '', 'article', '', '13', '0', '0-13-24', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('25', '联盟动态', '', 'article', '', '13', '0', '0-13-25', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('26', '政策法规', '', 'article', '', '13', '0', '0-13-26', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('27', '联盟公告', '', 'article', '', '13', '0', '0-13-27', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('28', '联盟文库', '', 'article', '', '13', '0', '0-13-28', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `cultural_terms` VALUES ('29', '联盟服务', '', 'article', '', '13', '0', '0-13-29', '', '', '', 'list', 'article', '0', '1');

-- ----------------------------
-- Table structure for cultural_term_relationships
-- ----------------------------
DROP TABLE IF EXISTS `cultural_term_relationships`;
CREATE TABLE `cultural_term_relationships` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'posts表里文章id',
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`tid`),
  KEY `term_taxonomy_id` (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_term_relationships
-- ----------------------------
INSERT INTO `cultural_term_relationships` VALUES ('1', '1', '3', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('2', '2', '0', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('3', '3', '0', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('4', '4', '0', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('5', '6', '4', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('6', '7', '4', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('7', '8', '4', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('8', '9', '5', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('9', '10', '7', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('10', '11', '5', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('11', '32', '16', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('12', '33', '14', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('13', '34', '14', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('14', '35', '3', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('15', '36', '16', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('16', '37', '3', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('17', '38', '16', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('18', '39', '16', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('19', '40', '3', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('20', '41', '18', '0', '1');
INSERT INTO `cultural_term_relationships` VALUES ('21', '42', '18', '0', '1');

-- ----------------------------
-- Table structure for cultural_users
-- ----------------------------
DROP TABLE IF EXISTS `cultural_users`;
CREATE TABLE `cultural_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；cultural_password加密',
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
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_users
-- ----------------------------
INSERT INTO `cultural_users` VALUES ('1', 'admin', 'b2ae6c1adb1821232f297a57a5a743894a0e4a801fc321cd', 'admin', 'wangsong1233276@sina.com', '', null, '0', null, null, '127.0.0.1', '2015-03-02 10:24:13', '2015-01-28 08:41:21', '', '1', '1', '0', '1');
INSERT INTO `cultural_users` VALUES ('2', 'zero', 'b2ae6c1adb18e10adc3949ba59abbe56e057f20f883e21cd', '汪汪', 'wangsong1233276@126.com', '1', '54dd64df780e3.jpg', '1', '0000-00-00', 'asdf', '0.0.0.0', '2015-02-12 08:38:38', '2015-01-29 10:50:44', '', '1', null, '0', '2');
INSERT INTO `cultural_users` VALUES ('6', 'test12', 'b2ae6c1adb18e10adc3949ba59abbe56e057f20f883e21cd', 'test12', 'wangsssong123327212126@126.com', '', null, '0', null, null, '0.0.0.0', '2015-02-11 16:54:41', '2015-02-11 16:54:41', '', '1', null, '0', '2');
INSERT INTO `cultural_users` VALUES ('5', 'test1', 'b2ae6c1adb1853c4ce4cac232ecf93696f0fcd517fbe21cd', '', 'aa@sina.com', '', null, '0', null, null, '0.0.0.0', '2015-02-06 09:09:21', '0000-00-00 00:00:00', '', '1', '1', '0', '1');
INSERT INTO `cultural_users` VALUES ('7', 'test2', 'b2ae6c1adb18e10adc3949ba59abbe56e057f20f883e21cd', '111', 'wa@ssf.com', 'asdf', '54e0382e88012.jpg', '0', '0000-00-00', 'asdf', '127.0.0.1', '2015-02-27 10:27:20', '2015-02-11 17:12:10', '', '1', null, '0', '2');
INSERT INTO `cultural_users` VALUES ('8', 'test3', 'b2ae6c1adb18e10adc3949ba59abbe56e057f20f883e21cd', 'test3', 'wa@sinsdfsdfa.com', '', null, '0', null, null, '0.0.0.0', '2015-02-13 11:07:13', '2015-02-13 11:07:13', '', '1', null, '0', '2');

-- ----------------------------
-- Table structure for cultural_user_favorites
-- ----------------------------
DROP TABLE IF EXISTS `cultural_user_favorites`;
CREATE TABLE `cultural_user_favorites` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cultural_user_favorites
-- ----------------------------
