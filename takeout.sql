/*
Navicat MySQL Data Transfer

Source Server         : dd
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : takeout

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-11 15:48:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for take_activites
-- ----------------------------
DROP TABLE IF EXISTS `take_activites`;
CREATE TABLE `take_activites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon_color` varchar(255) DEFAULT NULL,
  `_id` varchar(255) DEFAULT NULL,
  `_v` varchar(255) DEFAULT NULL,
  `icon_name` varchar(255) DEFAULT NULL,
  `llist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_activites
-- ----------------------------
INSERT INTO `take_activites` VALUES ('1', '满减优惠', '参加活动满减优惠', 'f07373', '', '0', '减', '2');
INSERT INTO `take_activites` VALUES ('2', '满减优惠', '满30减5，满60减8', 'f07373', null, null, '减', '1');
INSERT INTO `take_activites` VALUES ('3', '1111', '111', 'f07373', null, null, '减', '4');
INSERT INTO `take_activites` VALUES ('4', '2222', '222', 'f07373', null, null, '减', '5');

-- ----------------------------
-- Table structure for take_admin
-- ----------------------------
DROP TABLE IF EXISTS `take_admin`;
CREATE TABLE `take_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(30) NOT NULL COMMENT '管理员账号',
  `password` varchar(50) NOT NULL COMMENT '管理员密码',
  `create_time` int(11) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_admin
-- ----------------------------
INSERT INTO `take_admin` VALUES ('1', 'pxj', '866d7158740327d1ea59112c2aa116e5ac4f85be', '1558503961', '彭昕杰', '499191553@qq.com');
INSERT INTO `take_admin` VALUES ('2', 'ljs', '3192924a66e990854f6a9b01df84727ba9f34a29', '1558658761', '廖建山', '113664000@qq.com');
INSERT INTO `take_admin` VALUES ('3', 'zyx', '697b79bd739b9bcbc2fb68e55c9d02ea8a506c29', '1558752361', '张艺兴', '964581815@qq.com');
INSERT INTO `take_admin` VALUES ('11', 'ceshi8', '5f67ea9991744a45432175cac508884ddc23b1c8', '1559228495', 'ceshi88888', '11111234234@qq.com');

-- ----------------------------
-- Table structure for take_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `take_admin_role`;
CREATE TABLE `take_admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '管理员ID',
  `role_id` int(11) DEFAULT NULL COMMENT '角色ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_admin_role
-- ----------------------------
INSERT INTO `take_admin_role` VALUES ('1', '1', '1');
INSERT INTO `take_admin_role` VALUES ('2', '2', '2');
INSERT INTO `take_admin_role` VALUES ('3', '3', '8');
INSERT INTO `take_admin_role` VALUES ('6', '11', '8');

-- ----------------------------
-- Table structure for take_delivery_mode
-- ----------------------------
DROP TABLE IF EXISTS `take_delivery_mode`;
CREATE TABLE `take_delivery_mode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_solid` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `llist_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_delivery_mode
-- ----------------------------
INSERT INTO `take_delivery_mode` VALUES ('1', 'true', 'AIB专送', '1');
INSERT INTO `take_delivery_mode` VALUES ('2', 'true', 'AIBB专送', '4');
INSERT INTO `take_delivery_mode` VALUES ('3', 'true', 'AIBBB专送', '5');
INSERT INTO `take_delivery_mode` VALUES ('4', 'true', 'AIB专送', '6');
INSERT INTO `take_delivery_mode` VALUES ('5', 'true', 'AIB专送', '7');

-- ----------------------------
-- Table structure for take_foods
-- ----------------------------
DROP TABLE IF EXISTS `take_foods`;
CREATE TABLE `take_foods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `oldPrice` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sellCount` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_foods
-- ----------------------------
INSERT INTO `take_foods` VALUES ('1', '南瓜粥', '9.00', null, '甜粥', '91', '100', '主、辅料:水、大米、南瓜、冰糖等', '1');
INSERT INTO `take_foods` VALUES ('2', '红豆薏米美肤粥', '12.00', null, '甜粥', '86', '100', '美肤粥对皮肤有很好的保养作用', '1');
INSERT INTO `take_foods` VALUES ('3', '八宝酱菜', '4.00', null, null, '84', '100', '八宝酱菜八宝酱菜八宝酱菜八宝酱菜八宝酱菜', '1');
INSERT INTO `take_foods` VALUES ('4', '扁豆焖面', '14.00', null, null, '188', '96', null, '1');
INSERT INTO `take_foods` VALUES ('5', ' 葱花饼', '10.00', null, '葱花饼葱花饼葱花饼葱花饼', '124', '85', null, '1');
INSERT INTO `take_foods` VALUES ('6', '娃娃菜炖豆腐', '20.00', null, null, '43', '92', null, '2');
INSERT INTO `take_foods` VALUES ('7', '手撕包菜', '16.00', null, null, '29', '100', null, '2');
INSERT INTO `take_foods` VALUES ('8', '香酥黄金鱼/3条', '11.00', null, null, '15', '100', null, '2');
INSERT INTO `take_foods` VALUES ('9', '红枣山药粥', '29.00', '36.00', '红枣山药糙米粥,素材包,爽口莴笋丝,四川泡菜或八宝酱菜,配菜可备注', '17', '100', '红枣山药糙米粥,素材包,爽口莴笋丝,四川泡菜或八宝酱菜,配菜可备注', '3');
INSERT INTO `take_foods` VALUES ('10', '红豆粥', '14.00', '36.00', '红豆粥米粥,素材包,爽口莴笋丝,四川泡菜或八宝酱菜,配菜可备注', '17', '100', null, '3');
INSERT INTO `take_foods` VALUES ('11', '红枣山药糙米粥', '10.00', null, null, '81', '91', '红枣山药糙米粥红枣山药糙米粥红枣山药糙米粥', '3');
INSERT INTO `take_foods` VALUES ('12', '糊塌子', '10.00', null, null, '80', '93', '糊塌子糊塌子糊塌子糊塌子糊塌子糊塌子', '3');
INSERT INTO `take_foods` VALUES ('13', '田园蔬菜粥', '8.00', '10.00', null, '15', '100', null, '4');
INSERT INTO `take_foods` VALUES ('14', '八宝酱菜', '4.00', null, null, ' 84', '100', null, '5');
INSERT INTO `take_foods` VALUES ('15', '拍黄瓜', '9.00', null, null, '28', '100', null, '5');
INSERT INTO `take_foods` VALUES ('16', '红豆薏米粥套餐', '37.00', null, '红豆薏米粥,三鲜干蒸烧卖,拍黄瓜', '3', '100', null, '6');
INSERT INTO `take_foods` VALUES ('17', '皮蛋瘦肉粥套餐', '31.00', null, null, '12', '100', null, '6');
INSERT INTO `take_foods` VALUES ('18', '蜜瓜圣女萝莉杯', '6.00', null, null, '1', null, null, '7');
INSERT INTO `take_foods` VALUES ('19', '加多宝', '6.00', null, null, '7', '100', null, '7');
INSERT INTO `take_foods` VALUES ('20', '\"VC无限橙果汁', '8.00', '10.00', null, '15', '100', null, '7');
INSERT INTO `take_foods` VALUES ('21', '扁豆焖面', '14.00', null, null, '188', '96', null, '8');
INSERT INTO `take_foods` VALUES ('22', '葱花饼', '10.00', null, null, '124', '85', null, '8');
INSERT INTO `take_foods` VALUES ('23', '牛肉馅饼', '14.00', null, null, '114', '91', null, '8');
INSERT INTO `take_foods` VALUES ('24', '招牌猪肉白菜锅贴/10个', '17.00', null, null, '101', '78', null, '8');
INSERT INTO `take_foods` VALUES ('25', '糊塌子', '10.00', null, null, '80', '93', null, '8');
INSERT INTO `take_foods` VALUES ('26', '皮蛋瘦肉粥', '10.00', null, '咸粥', ' 229', '100', null, '9');
INSERT INTO `take_foods` VALUES ('27', '南瓜粥', '9.00', null, '甜粥', '91', '100', null, '9');
INSERT INTO `take_foods` VALUES ('28', '红豆薏米美肤粥', '12.00', null, '甜粥', '86', '86', null, '9');
INSERT INTO `take_foods` VALUES ('29', '红枣山药糙米粥', '10.00', null, null, '81', '91', null, '9');
INSERT INTO `take_foods` VALUES ('30', '鲜蔬菌菇粥', '11.00', null, '咸粥', '56', '100', null, '9');
INSERT INTO `take_foods` VALUES ('31', '田园蔬菜粥', '10.00', null, '咸粥', '33', '100', null, '9');

-- ----------------------------
-- Table structure for take_goods
-- ----------------------------
DROP TABLE IF EXISTS `take_goods`;
CREATE TABLE `take_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `llist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_goods
-- ----------------------------
INSERT INTO `take_goods` VALUES ('1', '优惠', 'https://fuss10.elemecdn.com/b/91/8cf4f67e0e8223931cd595dc932fepng.png', '1');
INSERT INTO `take_goods` VALUES ('2', '折扣', 'https://fuss10.elemecdn.com/0/6a/05b267f338acfeb8bd682d16e836dpng.png', '1');
INSERT INTO `take_goods` VALUES ('3', '香浓甜粥', null, '1');
INSERT INTO `take_goods` VALUES ('4', '营养咸粥', null, '1');
INSERT INTO `take_goods` VALUES ('5', '爽口凉菜', null, '1');
INSERT INTO `take_goods` VALUES ('6', '精选套餐', null, '1');
INSERT INTO `take_goods` VALUES ('7', '果拼果汁', null, '1');
INSERT INTO `take_goods` VALUES ('8', '小吃主食', null, '1');
INSERT INTO `take_goods` VALUES ('9', '特色粥品', null, '1');

-- ----------------------------
-- Table structure for take_index_category
-- ----------------------------
DROP TABLE IF EXISTS `take_index_category`;
CREATE TABLE `take_index_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_index_category
-- ----------------------------
INSERT INTO `take_index_category` VALUES ('1', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', '0元早餐0起送，每天都有新花样。', '单身推荐', '0');
INSERT INTO `take_index_category` VALUES ('2', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('3', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('4', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('5', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('6', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('7', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('8', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('9', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('10', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('11', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('12', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('13', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('14', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('15', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');
INSERT INTO `take_index_category` VALUES ('16', '/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg', null, '土豪推荐', '0');

-- ----------------------------
-- Table structure for take_license
-- ----------------------------
DROP TABLE IF EXISTS `take_license`;
CREATE TABLE `take_license` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catering_service_license_image` varchar(255) DEFAULT NULL,
  `business_license_image` varchar(255) DEFAULT NULL,
  `llist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_license
-- ----------------------------
INSERT INTO `take_license` VALUES ('1', '162d816cf909817.png', '162d816c82e9816.png', '3');
INSERT INTO `take_license` VALUES ('2', '162bcabb96f9264.jpg', '162bcabb9869263.jpg', '2');
INSERT INTO `take_license` VALUES ('3', null, null, '1');
INSERT INTO `take_license` VALUES ('4', '111', '111', '4');
INSERT INTO `take_license` VALUES ('5', '2222', '222', '5');
INSERT INTO `take_license` VALUES ('10', '1111', '2222', '39');
INSERT INTO `take_license` VALUES ('11', '/upload/20190529\\4d1a1dcac4789ba3b97eddfba77af745.jpg', '/upload/20190529\\68172984674a4cfcfbd176c6d3601988.png', '40');
INSERT INTO `take_license` VALUES ('17', '/upload/20190529\\5ba1ffbdc5e3c6ec726813d13f208ce2.png', '/upload/20190529\\2be46895379561b7d8f5bc1f0892f702.png', '41');
INSERT INTO `take_license` VALUES ('18', '/upload/20190529\\bd21ef9efc114d1b55b0e31ee6ed8c3f.jpg', '/upload/20190529\\3af65baf7ba07298d3b1d8a2675b76a6.png', '42');
INSERT INTO `take_license` VALUES ('21', '/upload/20190603\\bd7cc8c47de5399edf8177fb8710c5cc.jpg', '/upload/20190603\\3021e7c4c0ad638c0e365dd7277ad327.png', '45');

-- ----------------------------
-- Table structure for take_llist
-- ----------------------------
DROP TABLE IF EXISTS `take_llist`;
CREATE TABLE `take_llist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `_id` varchar(255) DEFAULT NULL,
  `geobash` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT '40.10038',
  `longitude` varchar(255) DEFAULT '116.36867',
  `description` varchar(255) DEFAULT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `float_delivery_free` varchar(255) DEFAULT NULL,
  `float_minimum_order_amount` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_new` varchar(255) DEFAULT NULL,
  `is_premium` varchar(255) DEFAULT NULL,
  `_v` varchar(255) DEFAULT NULL,
  `promotion_info` varchar(255) DEFAULT NULL,
  `rating` float(4,1) DEFAULT '0.0',
  `rating_count` varchar(255) DEFAULT '0',
  `recent_order_num` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_llist
-- ----------------------------
INSERT INTO `take_llist` VALUES ('1', '肯德基', '三饭叉烧er', '1232313124324', '快餐便当/简餐', null, '121.50146,31.38098', '40.10038', '116.36867', 'sad', '2120.1公里', '5', '20', 'fish.jpg', 'true', 'true', '0', '欢迎光临，用参高峰请提前下单，谢谢', '5.0', '961', '106', '1');
INSERT INTO `take_llist` VALUES ('2', 'test_shop', '广东省广州市海珠区马涌直街20号', '18320326523', '鲜花蛋糕/面包', null, '113.26166,23.09499', '23.09499', '113.26166', null, null, null, null, null, null, null, null, null, null, null, null, '1');
INSERT INTO `take_llist` VALUES ('3', 'test', '浙江省杭州市余杭区高教路阿里巴巴西溪园区2号楼', '111', '快餐便当/简餐', null, '120.022003,30.27817', '30.27817', '120.022003', null, null, null, null, null, null, null, null, null, null, null, null, '1');
INSERT INTO `take_llist` VALUES ('4', '二饭', '广东省广州市海珠区马涌直街20号', '18320326523', '鲜花蛋糕/面包', null, '121.50146,31.38098', '40.10038', '116.36867', 'sad', '2120.1公里', '5', '20', 'fish.jpg', 'true', 'true', '0', '欢迎光临，用参高峰请提前下单，谢谢', '4.7', '961', '106', '1');
INSERT INTO `take_llist` VALUES ('5', '三饭', '二饭爆浆', '11111111111', '0', null, '121.50146,31.38098', '40.10038', '116.36867', 'sad', '2120.1公里', '55', '20', 'fish.jpg', 'true', 'true', '0', '欢迎光临，用参高峰请提前下单，谢谢', '4.3', '961', '106', '1');
INSERT INTO `take_llist` VALUES ('6', '四饭', '四饭烧卖', '122222', '快餐便当/简餐', null, null, '40.10038', '116.36867', 'sad', '2120.1公里', '5', '20', 'fish.jpg', 'true', 'true', '0', '欢迎光临，用参高峰请提前下单，谢谢', '3.9', '961', '106', '1');
INSERT INTO `take_llist` VALUES ('7', '一饭', '一饭水饺', null, '快餐便当/简餐', null, null, null, null, 'sad', '2120.1公里', '5', '20', 'fish.jpg', 'true', 'true', '0', '欢迎光临，用参高峰请提前下单，谢谢', '1.0', '961', '106', '1');
INSERT INTO `take_llist` VALUES ('11', '一饭奶茶', '一饭', '11111111111', '1', null, null, '40.10038', '116.36867', '我是你爸爸', '212.5', '5', '5', '/upload/20190525\\5817c34464f7e7300aab153d11d17230.jpg', 'true', 'false', null, '我是你爸爸', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('12', '一饭肠粉', '一饭', '19985411158', '1', null, null, '40.10038', '116.36867', '我才是你爸爸', '251', '5', '5', '/upload/20190525\\f5a1e400ba87214ad1970db8626fca1a.png', 'true', 'true', null, '我才是你爸爸', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('13', '二饭双皮奶', '二饭', '15599482499', '1', null, null, '40.10038', '116.36867', '我都说是你爸爸', '215', '5', '5', '/upload/20190525\\97663c38874ad2fef0bbe14e8e6ad71a.jpg', 'true', 'true', null, '我都说是你爸爸', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('17', '测试用列3', '测试用列3', '13202411404', '0', null, null, '40.10038', '116.36867', '测试用列3', '251', '5', '100000000000', '/upload/20190526\\10e95c48710dce7220a83c739565f5c6.jpg', 'true', 'true', null, '测试用列3', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('18', '测试用例4', '测试用例4', '13202411404', '1', null, null, '40.10038', '116.36867', '5', '5', '5', '5', '/upload/20190526\\a7c585da7b69409f154f89150ebd86f8.png', 'true', 'true', null, '5', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('19', '测试用例5', '测试用例5', '13202411404', '1', null, null, '40.10038', '116.36867', '5', '5', '5', '5', '/upload/20190526\\a450895a52cbae821dab2e649f988102.jpg', 'true', 'true', null, '5', '0.0', '0', '0', '2');
INSERT INTO `take_llist` VALUES ('20', '测试用例6', '测试用例6', '13202411404', '0', null, null, '40.10038', '116.36867', '5', '5', '5', '5', '/upload/20190526\\0c4cbdc3d9cd91b0078eccc6658ac726.jpg', 'true', 'true', null, '5', '0.0', '0', '0', '2');
INSERT INTO `take_llist` VALUES ('21', '测试用例7', '测试用例7', '13202411404', '1', null, null, '40.10038', '116.36867', '555', '555', '55', '555', '/upload/20190526\\d8bddf9a0013980aa611be61275113f6.png', 'true', 'true', null, '555', '0.0', '0', '0', '2');
INSERT INTO `take_llist` VALUES ('22', '测试用例13', '测试用例13', '11111111111', '0', null, null, '40.10038', '116.36867', '1111', '11111', '1111', '11111', '/upload/20190527\\dea33edc2d6116212e75983c0496d8a3.jpg', 'true', 'true', null, '11111', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('24', '测试用例15', '测试用例15', '11111111111', '1', null, null, '40.10038', '116.36867', '11', '11', '11', '11', '/upload/20190527\\6c37f3fcdcc1734eccae721511a7a140.jpg', 'true', 'true', null, '111', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('36', '测试用例15', '测试用例15', '11111111111', '0', null, null, '40.10038', '116.36867', '1', '1', '1', '1', '/upload/20190529\\1d78acd7cf57cf277fdcd5c1ef293035.png', 'true', 'true', null, '1', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('40', '测试用例16', '111', '11111111111', '0', null, null, '40.10038', '116.36867', '1', '1', '1', '1', '/upload/20190529\\9aa114ef11e893b250f236ad8dcbd230.png', 'true', 'true', null, '1', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('41', '测试用例17', '11', '11111111111', '0', null, null, '40.10038', '116.36867', '11', '111', '111', '1222', '/upload/20190529\\ff9376e2c6bb047bd9989ef07316b3df.png', 'true', 'true', null, '11', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('42', 'aaaa', 'aaaaa', '11111111111', '0', null, null, '40.10038', '116.36867', '1', '111111', '1', '1', '/upload/20190529\\94275fa2c9a79ac30c34237d850a0764.png', 'true', 'true', null, '1', '0.0', '0', '0', '1');
INSERT INTO `take_llist` VALUES ('45', '测试用例21', '111111', '11111111111', '1', null, null, '40.10038', '116.36867', '11', '111', '111', '111', '/upload/20190603\\677d879472415897c1e53bf808198e06.png', 'true', 'true', null, '111', '0.0', '0', '0', '1');

-- ----------------------------
-- Table structure for take_login_pwd
-- ----------------------------
DROP TABLE IF EXISTS `take_login_pwd`;
CREATE TABLE `take_login_pwd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_login_pwd
-- ----------------------------
INSERT INTO `take_login_pwd` VALUES ('1', 'admin', '761a709789d5759ca7e18903ae67fe50cb8620f8', null);
INSERT INTO `take_login_pwd` VALUES ('3', 'madmi', '2b64b6704436827172d2d02be6fa51df0a82695f', null);
INSERT INTO `take_login_pwd` VALUES ('4', 'madmit', '2b64b6704436827172d2d02be6fa51df0a82695f', null);
INSERT INTO `take_login_pwd` VALUES ('5', 'admim', '4189c0867f4e3630b68846e97917be11183a705c', null);
INSERT INTO `take_login_pwd` VALUES ('16', 'admi', '45313f084f77c7cb82f7c3ecb746f8e2dad24427', null);
INSERT INTO `take_login_pwd` VALUES ('28', 'admin1', 'b31447514e5332a9c3424a50ad5c5ed46482cbc5', null);
INSERT INTO `take_login_pwd` VALUES ('33', 'user', '3287201837fbf37c82eeaef8f50944d53b8255e5', null);
INSERT INTO `take_login_pwd` VALUES ('45', null, '813787f4eb588751649638402784ccc798123651', '18127440968');
INSERT INTO `take_login_pwd` VALUES ('46', 'admiiii', '58b83f701b4e28c9d7b54812c1c455d4e9a57325', null);
INSERT INTO `take_login_pwd` VALUES ('52', 'xqh', '7175c639f3f1f51e29240005bd3e23ddf4f83510', null);
INSERT INTO `take_login_pwd` VALUES ('53', 'ljs', '3192924a66e990854f6a9b01df84727ba9f34a29', null);
INSERT INTO `take_login_pwd` VALUES ('54', 'lgs', '06ecdfb87c578be80dd91b3de91600104861bb27', null);
INSERT INTO `take_login_pwd` VALUES ('55', 'qw', 'e9041f2bf226f11d037ff84a78a9e19244ae6758', null);
INSERT INTO `take_login_pwd` VALUES ('56', null, '813787f4eb588751649638402784ccc798123651', '13202411404');
INSERT INTO `take_login_pwd` VALUES ('57', 'pxj', '866d7158740327d1ea59112c2aa116e5ac4f85be', null);
INSERT INTO `take_login_pwd` VALUES ('58', 'ceshi', 'b55bb2b6920d51d70e097ff936369858da897280', null);

-- ----------------------------
-- Table structure for take_role
-- ----------------------------
DROP TABLE IF EXISTS `take_role`;
CREATE TABLE `take_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_role
-- ----------------------------
INSERT INTO `take_role` VALUES ('1', '超级管理员');
INSERT INTO `take_role` VALUES ('2', '普通管理员');
INSERT INTO `take_role` VALUES ('3', '新手管理员');
INSERT INTO `take_role` VALUES ('7', '测试用例24');
INSERT INTO `take_role` VALUES ('8', '卖家');
INSERT INTO `take_role` VALUES ('9', 'cesdhi3');

-- ----------------------------
-- Table structure for take_role_rule
-- ----------------------------
DROP TABLE IF EXISTS `take_role_rule`;
CREATE TABLE `take_role_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL COMMENT '角色ID',
  `rule_id` int(11) DEFAULT NULL COMMENT '权限ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_role_rule
-- ----------------------------
INSERT INTO `take_role_rule` VALUES ('50', '7', '20');
INSERT INTO `take_role_rule` VALUES ('51', '7', '21');
INSERT INTO `take_role_rule` VALUES ('57', '8', '8');
INSERT INTO `take_role_rule` VALUES ('58', '8', '6');
INSERT INTO `take_role_rule` VALUES ('59', '8', '12');
INSERT INTO `take_role_rule` VALUES ('60', '8', '14');
INSERT INTO `take_role_rule` VALUES ('61', '2', '7');
INSERT INTO `take_role_rule` VALUES ('62', '2', '1');
INSERT INTO `take_role_rule` VALUES ('63', '2', '8');
INSERT INTO `take_role_rule` VALUES ('64', '2', '6');
INSERT INTO `take_role_rule` VALUES ('69', '2', '26');
INSERT INTO `take_role_rule` VALUES ('70', '2', '28');
INSERT INTO `take_role_rule` VALUES ('71', '3', '7');
INSERT INTO `take_role_rule` VALUES ('72', '3', '1');
INSERT INTO `take_role_rule` VALUES ('77', '3', '26');
INSERT INTO `take_role_rule` VALUES ('78', '3', '28');
INSERT INTO `take_role_rule` VALUES ('79', '9', '7');
INSERT INTO `take_role_rule` VALUES ('80', '9', '1');
INSERT INTO `take_role_rule` VALUES ('81', '9', '2');
INSERT INTO `take_role_rule` VALUES ('82', '9', '9');
INSERT INTO `take_role_rule` VALUES ('83', '9', '10');
INSERT INTO `take_role_rule` VALUES ('84', '9', '18');
INSERT INTO `take_role_rule` VALUES ('85', '9', '19');

-- ----------------------------
-- Table structure for take_rule
-- ----------------------------
DROP TABLE IF EXISTS `take_rule`;
CREATE TABLE `take_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '权限名称',
  `module` varchar(50) DEFAULT NULL COMMENT '请求模型',
  `controller` varchar(50) DEFAULT NULL COMMENT '请求控制器',
  `action` varchar(50) DEFAULT NULL COMMENT '请求方法',
  `parent_id` int(11) DEFAULT NULL COMMENT '父类ID 0是父类',
  `is_show` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示 1显示 0不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_rule
-- ----------------------------
INSERT INTO `take_rule` VALUES ('1', '角色管理', 'admin', 'Role', 'index', '7', '1');
INSERT INTO `take_rule` VALUES ('2', '角色添加', 'admin', 'Role', 'roadd', '7', '1');
INSERT INTO `take_rule` VALUES ('6', '商品管理', 'admin', 'goods', 'index', '8', '1');
INSERT INTO `take_rule` VALUES ('7', '角色权限', 'admin', 'Role', '#', '0', '1');
INSERT INTO `take_rule` VALUES ('8', '商品权限', 'admin', 'goods', '#', '0', '1');
INSERT INTO `take_rule` VALUES ('9', '管理员权限', 'admin', 'user', '#', '0', '1');
INSERT INTO `take_rule` VALUES ('10', '管理员列表', 'admin', 'user', 'index', '9', '1');
INSERT INTO `take_rule` VALUES ('11', '管理员添加', 'admin', 'user', 'uadd', '9', '1');
INSERT INTO `take_rule` VALUES ('12', '商品添加', 'admin', 'goods', 'gadd', '8', '1');
INSERT INTO `take_rule` VALUES ('14', '商品回收站', 'admin', 'goods', 'gdel', '8', '1');
INSERT INTO `take_rule` VALUES ('18', '权限', 'admin', 'rule', '#', '0', '1');
INSERT INTO `take_rule` VALUES ('19', '权限添加', 'admin', 'rule', 'ruadd', '18', '1');
INSERT INTO `take_rule` VALUES ('20', '测试用例1', 'admin', 'ceshi', '#', '0', '1');
INSERT INTO `take_rule` VALUES ('21', 'ceshi2', 'admin', 'ceshi', 'ceshi', '20', '1');
INSERT INTO `take_rule` VALUES ('22', '用户权限', 'admin', 'takeuser', '#', '0', '1');
INSERT INTO `take_rule` VALUES ('23', '用户管理', 'admin', 'takeuser', 'index', '22', '1');
INSERT INTO `take_rule` VALUES ('26', 'ceshi2', 'admin', 'ceshi', 'ceshi2', '0', '1');
INSERT INTO `take_rule` VALUES ('28', 'ceshi2', 'ceshi2', 'ceshi2', 'ceshi2', '26', '1');

-- ----------------------------
-- Table structure for take_shops
-- ----------------------------
DROP TABLE IF EXISTS `take_shops`;
CREATE TABLE `take_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `_id` varchar(255) DEFAULT NULL,
  `geobash` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_shops
-- ----------------------------
INSERT INTO `take_shops` VALUES ('4', '肯德基', '上海市宝山区淞宝路155弄18号星月国际商务广场1层', '1232313124324', '快餐便当/简餐', null, '121.50146,31.38098', null, null);

-- ----------------------------
-- Table structure for take_supports
-- ----------------------------
DROP TABLE IF EXISTS `take_supports`;
CREATE TABLE `take_supports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `icon_color` varchar(255) DEFAULT NULL,
  `icon_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `_id` varchar(255) DEFAULT NULL,
  `llist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_supports
-- ----------------------------
INSERT INTO `take_supports` VALUES ('1', '准时必达，超时秒赔', '999999', '准', '准时达', '', '1');
INSERT INTO `take_supports` VALUES ('2', '准时必达，超时秒赔', '57A9FF', '准', '准时达', null, '4');
INSERT INTO `take_supports` VALUES ('3', '准时必达，超时秒赔', '57A9FF', '准', '准时达', null, '5');
INSERT INTO `take_supports` VALUES ('6', '“已加入“外卖保”计划，食品安全有保障”', '999999', '保', '开发票', null, '4');
INSERT INTO `take_supports` VALUES ('7', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '准时达', null, '4');
INSERT INTO `take_supports` VALUES ('8', '“已加入“外卖保”计划，食品安全有保障”', null, '保', null, null, '1');
INSERT INTO `take_supports` VALUES ('9', '“已加入“外卖保”计划，食品安全有保障”', '', '保', '', '', '5');
INSERT INTO `take_supports` VALUES ('10', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '准时达', '', '1');
INSERT INTO `take_supports` VALUES ('11', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '准时达', '', '5');
INSERT INTO `take_supports` VALUES ('12', '准时必达，超时秒赔', '999999', '准', '准时达', '', '6');
INSERT INTO `take_supports` VALUES ('13', '“已加入“外卖保”计划，食品安全有保障”', '999999', '保', '开发票', '', '6');
INSERT INTO `take_supports` VALUES ('14', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', null, '6');
INSERT INTO `take_supports` VALUES ('15', '准时必达，超时秒赔', '999999', '准', '准时达', '', '7');
INSERT INTO `take_supports` VALUES ('16', '“已加入“外卖保”计划，食品安全有保障”', '999999', '保', '开发票', '', '7');
INSERT INTO `take_supports` VALUES ('17', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', '', '7');
INSERT INTO `take_supports` VALUES ('28', '准时必达，超时秒赔', '999999', '准', '准时达', null, '36');
INSERT INTO `take_supports` VALUES ('29', '已加入“外卖保”计划，食品安全有保障', '57A9FF', '保', '开发票', null, '36');
INSERT INTO `take_supports` VALUES ('30', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', null, '36');
INSERT INTO `take_supports` VALUES ('37', '准时必达，超时秒赔', '999999', '准', '准时达', null, '39');
INSERT INTO `take_supports` VALUES ('38', '已加入“外卖保”计划，食品安全有保障', '57A9FF', '保', '开发票', null, '39');
INSERT INTO `take_supports` VALUES ('39', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', null, '39');
INSERT INTO `take_supports` VALUES ('40', '准时必达，超时秒赔', '999999', '准', '准时达', null, '40');
INSERT INTO `take_supports` VALUES ('41', '已加入“外卖保”计划，食品安全有保障', '57A9FF', '保', '开发票', null, '40');
INSERT INTO `take_supports` VALUES ('42', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', null, '40');
INSERT INTO `take_supports` VALUES ('43', '准时必达，超时秒赔', '999999', '准', '准时达', null, '41');
INSERT INTO `take_supports` VALUES ('44', '已加入“外卖保”计划，食品安全有保障', '57A9FF', '保', '开发票', null, '41');
INSERT INTO `take_supports` VALUES ('45', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', null, '41');
INSERT INTO `take_supports` VALUES ('46', '准时必达，超时秒赔', '999999', '准', '准时达', null, '42');
INSERT INTO `take_supports` VALUES ('47', '已加入“外卖保”计划，食品安全有保障', '57A9FF', '保', '开发票', null, '42');
INSERT INTO `take_supports` VALUES ('48', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', null, '42');
INSERT INTO `take_supports` VALUES ('55', '准时必达，超时秒赔', '999999', '准', '准时达', null, '45');
INSERT INTO `take_supports` VALUES ('56', '已加入“外卖保”计划，食品安全有保障', '57A9FF', '保', '开发票', null, '45');
INSERT INTO `take_supports` VALUES ('57', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '外卖保', null, '45');

-- ----------------------------
-- Table structure for take_unknow
-- ----------------------------
DROP TABLE IF EXISTS `take_unknow`;
CREATE TABLE `take_unknow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `icon_color` varchar(255) DEFAULT NULL,
  `icon_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `_id` varchar(255) DEFAULT NULL,
  `recent_order_num` int(11) DEFAULT NULL,
  `rating_count` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `promotion_info` varchar(255) DEFAULT NULL,
  `tips` varchar(255) DEFAULT NULL,
  `opening_hours` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `llist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_unknow
-- ----------------------------
INSERT INTO `take_unknow` VALUES ('1', '该商家支持开发票，请在下单时填写好发票抬头', '999999', '票', '开发票', '', '444', '246', '4', '便靓正', '配送费约¥5', '09:00/21:30', '1', '2');
INSERT INTO `take_unknow` VALUES ('3', '已加入“外卖保”计划，食品安全有保障', '999999', '保', '外卖保', '', '820', '305', '4.2', '111', '配送费约¥5', '05:30/05:45', '1', '3');
INSERT INTO `take_unknow` VALUES ('4', '已加入“外卖保”计划，食品安全有保障', '999999', '保', '外卖保', '591bec73c2bbc84a6328a1e5', '615', '389', '1.6', '他依然有人有人有人有人有人', '配送费约¥5', '8:30/20:30', '0', '1');
INSERT INTO `take_unknow` VALUES ('5', '已加入“外卖保”计划，食品安全有保障', '999999', '保', '外卖保', '591bec73c2bbc84a6328a1e5', '615', '389', '1.6', '他依然有人有人有人有人有人', '配送费约¥5', '8:30/20:30', '0', '4');
INSERT INTO `take_unknow` VALUES ('6', '已加入“外卖保”计划，食品安全有保障', '999999', '保', '外卖保', '591bec73c2bbc84a6328a1e5', '615', '389', '1.6', '他依然有人有人有人有人有人', '配送费约¥5', '8:30/20:30', '0', '5');
