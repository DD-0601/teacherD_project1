-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Aug 02, 2024, 08:28 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `expstore`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `addbook`
-- 

CREATE TABLE `addbook` (
  `addressid` int(10) NOT NULL auto_increment COMMENT '地址ID',
  `setdefault` tinyint(1) NOT NULL default '0' COMMENT '預設收件人',
  `emailid` int(10) NOT NULL COMMENT '會員編號',
  `cname` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '收件者姓名',
  `mobile` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '收件者電話',
  `myzip` varchar(10) collate utf8_unicode_ci default NULL COMMENT '郵遞區號',
  `address` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '收件地址',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`addressid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `addbook`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `carousel`
-- 

CREATE TABLE `carousel` (
  `caro_id` int(3) NOT NULL auto_increment COMMENT '輪播編號',
  `caro_title` varchar(50) collate utf8_unicode_ci default NULL COMMENT '輪播標題',
  `caro_content` varchar(100) collate utf8_unicode_ci default NULL COMMENT '輪播內容介紹',
  `caro_online` tinyint(1) NOT NULL default '1' COMMENT '上下架',
  `caro_sort` int(3) NOT NULL COMMENT '輪播排序',
  `caro_pic` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '輪播圖檔名稱',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`caro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `carousel`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `cart`
-- 

CREATE TABLE `cart` (
  `cartid` int(10) NOT NULL auto_increment COMMENT '購物車編號',
  `emailid` int(10) default NULL COMMENT '會員編號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `qty` int(3) NOT NULL COMMENT '產品數量',
  `orderid` varchar(30) collate utf8_unicode_ci default NULL COMMENT '訂單編號',
  `status` tinyint(4) NOT NULL default '1' COMMENT '訂單處理狀態',
  `ip` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '訂購者的IP',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '加入購物車時間',
  PRIMARY KEY  (`cartid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `cart`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `city`
-- 

CREATE TABLE `city` (
  `AutoNo` int(10) NOT NULL auto_increment COMMENT '城市編號',
  `Name` varchar(150) collate utf8_unicode_ci NOT NULL COMMENT '城市名稱',
  `cityOrder` tinyint(2) NOT NULL COMMENT '標記',
  `State` smallint(6) NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`AutoNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

-- 
-- 列出以下資料庫的數據： `city`
-- 

INSERT INTO `city` VALUES (1, '臺北市', 0, 0);
INSERT INTO `city` VALUES (2, '基隆市', 0, 0);
INSERT INTO `city` VALUES (3, '新北市', 0, 0);
INSERT INTO `city` VALUES (4, '宜蘭縣', 0, 0);
INSERT INTO `city` VALUES (5, '新竹市', 0, 0);
INSERT INTO `city` VALUES (6, '新竹縣', 0, 0);
INSERT INTO `city` VALUES (7, '桃園市', 0, 0);
INSERT INTO `city` VALUES (8, '苗栗縣', 0, 0);
INSERT INTO `city` VALUES (9, '台中市', 0, 0);
INSERT INTO `city` VALUES (10, '彰化縣', 0, 0);
INSERT INTO `city` VALUES (11, '南投縣', 0, 0);
INSERT INTO `city` VALUES (12, '雲林縣', 0, 0);
INSERT INTO `city` VALUES (13, '嘉義市', 0, 0);
INSERT INTO `city` VALUES (14, '嘉義縣', 0, 0);
INSERT INTO `city` VALUES (15, '台南市', 0, 0);
INSERT INTO `city` VALUES (16, '高雄市', 0, 0);
INSERT INTO `city` VALUES (17, '南海諸島', 0, 0);
INSERT INTO `city` VALUES (18, '澎湖縣', 0, 0);
INSERT INTO `city` VALUES (19, '屏東縣', 0, 0);
INSERT INTO `city` VALUES (20, '台東縣', 0, 0);
INSERT INTO `city` VALUES (21, '花蓮縣', 0, 0);
INSERT INTO `city` VALUES (22, '金門縣', 0, 0);
INSERT INTO `city` VALUES (23, '連江縣', 0, 0);

-- --------------------------------------------------------

-- 
-- 資料表格式： `hot`
-- 

CREATE TABLE `hot` (
  `h_id` int(3) NOT NULL auto_increment COMMENT '熱銷商品流水號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `h_sort` int(3) default NULL COMMENT '熱銷商品排名',
  PRIMARY KEY  (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `hot`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `emailid` int(11) NOT NULL auto_increment COMMENT 'email流水號',
  `email` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT 'email帳號',
  `pw1` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '密碼',
  `active` tinyint(1) NOT NULL default '1' COMMENT '是否啟動',
  `cname` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '中文姓名',
  `tssn` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '身份證字號',
  `birthday` date NOT NULL COMMENT '生日',
  `imgname` varchar(20) collate utf8_unicode_ci default NULL COMMENT '相片檔名',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`emailid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `member`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `multiselect`
-- 

CREATE TABLE `multiselect` (
  `msid` int(5) NOT NULL auto_increment COMMENT '多功能選擇ID',
  `mslevel` int(2) NOT NULL COMMENT '多功能選擇層級',
  `msuplink` int(4) NOT NULL COMMENT '上層連結',
  `opcode` varchar(10) collate utf8_unicode_ci default NULL COMMENT '外掛參數',
  `msname` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '多功能選擇名稱',
  `msort` int(11) default NULL COMMENT '各功能列表排序',
  `url1` varchar(200) collate utf8_unicode_ci default NULL COMMENT '外掛網址1',
  `url2` varchar(200) collate utf8_unicode_ci default NULL COMMENT '外掛網址2',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  `update_date` varchar(50) collate utf8_unicode_ci default NULL COMMENT '修改日期',
  PRIMARY KEY  (`msid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

-- 
-- 列出以下資料庫的數據： `multiselect`
-- 

INSERT INTO `multiselect` VALUES (1, 1, 0, NULL, '付款方式', 0, NULL, NULL, '2023-08-11 17:46:53', '2023-08-17 03:42:28');
INSERT INTO `multiselect` VALUES (2, 1, 0, NULL, '訂單處理狀態', 0, NULL, NULL, '2023-08-11 17:52:29', '2023-08-17 03:42:41');
INSERT INTO `multiselect` VALUES (3, 2, 1, NULL, '貨到付款', 1, NULL, NULL, '2023-08-11 17:55:45', '2023-08-17 03:43:37');
INSERT INTO `multiselect` VALUES (4, 2, 1, NULL, '信用卡付款', 2, NULL, NULL, '2023-08-11 17:55:45', '2023-08-17 03:43:54');
INSERT INTO `multiselect` VALUES (5, 2, 1, NULL, '銀行轉帳', 3, NULL, NULL, '2023-08-11 17:55:45', '2023-08-17 03:44:37');
INSERT INTO `multiselect` VALUES (6, 2, 1, NULL, '電子支付', 4, NULL, NULL, '2023-08-11 17:55:45', '2023-08-17 03:44:51');
INSERT INTO `multiselect` VALUES (7, 2, 2, NULL, '處理中', 1, NULL, NULL, '2023-08-11 18:06:42', '2023-08-17 03:45:03');
INSERT INTO `multiselect` VALUES (8, 2, 2, NULL, '待出貨', 2, NULL, NULL, '2023-08-11 18:06:42', '2023-08-17 03:45:32');
INSERT INTO `multiselect` VALUES (9, 2, 2, NULL, '運送中', 3, NULL, NULL, '2023-08-11 18:06:42', '2023-08-17 03:45:45');
INSERT INTO `multiselect` VALUES (10, 2, 2, NULL, '收貨完成', 4, NULL, NULL, '2023-08-11 18:06:42', '2023-08-17 03:46:10');
INSERT INTO `multiselect` VALUES (11, 2, 2, NULL, '退貨中', 5, NULL, NULL, '2023-08-11 18:06:42', '2023-08-17 03:46:24');
INSERT INTO `multiselect` VALUES (12, 2, 2, NULL, '已關閉訂單', 6, NULL, NULL, '2023-08-11 18:06:42', '2023-08-17 03:46:35');
INSERT INTO `multiselect` VALUES (13, 2, 2, NULL, '無效訂單', 7, NULL, NULL, '2023-08-11 18:06:42', '2023-08-17 05:39:26');
INSERT INTO `multiselect` VALUES (14, 2, 2, NULL, '訂單確認', 8, NULL, NULL, '2023-08-18 14:13:47', '2023-10-23 12:37:36');
INSERT INTO `multiselect` VALUES (15, 2, 2, NULL, '平台出貨', 9, NULL, NULL, '2023-08-18 14:13:47', '2023-10-25 08:29:31');
INSERT INTO `multiselect` VALUES (34, 1, 0, NULL, '付款處理狀態', 0, NULL, NULL, '2023-08-11 17:52:29', '2023-08-17 03:42:41');
INSERT INTO `multiselect` VALUES (35, 2, 34, NULL, '侍貨到付款', 1, NULL, NULL, '2023-08-11 17:55:45', '2023-10-25 08:39:12');
INSERT INTO `multiselect` VALUES (36, 2, 34, NULL, '完成付款', 2, NULL, NULL, '2023-08-11 17:55:45', '2023-10-25 08:39:12');
INSERT INTO `multiselect` VALUES (37, 2, 34, NULL, '未完成付款', 3, NULL, NULL, '2023-08-11 17:55:45', '2023-10-25 08:39:12');
INSERT INTO `multiselect` VALUES (38, 2, 34, NULL, '貨到付款已完成', 4, NULL, NULL, '2023-08-11 17:55:45', '2023-10-25 08:39:12');

-- --------------------------------------------------------

-- 
-- 資料表格式： `product`
-- 

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL auto_increment COMMENT '產品編號',
  `classid` int(3) NOT NULL COMMENT '產品類別',
  `p_name` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '產品名稱',
  `p_intro` varchar(200) collate utf8_unicode_ci default NULL COMMENT '產品簡介',
  `p_price` int(11) default NULL COMMENT '產品單價',
  `p_open` tinyint(1) NOT NULL default '1' COMMENT '上架',
  `p_content` text collate utf8_unicode_ci COMMENT '產品詳細規格',
  `p_date` timestamp NULL default CURRENT_TIMESTAMP COMMENT '產品輸入日期',
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- 
-- 列出以下資料庫的數據： `product`
-- 

INSERT INTO `product` VALUES (1, 1, 'Campos Superior Blend', 'Caramelly & Rich Blend. Sweet like Butterscotch. Flavours like Red Fruit & Apricot.', 480, 1, 'ABOUT OUR SUPERIOR BLEND\r\nCampos Superior is our signature, quintessential coffee blend. It’s what we’ve proudly served in our cafes since day one. Combining fresh high-quality specialty coffees from our coffee producing partners in Ethiopia, Kenya and Colombia, this full-bodied coffee is carefully roasted to deliver sweet caramel, butterscotch and milk chocolate flavours to your cup.\r\n\r\nWe pride ourselves in our Superior Blend tasting consistent and even as we continue to grow, we still spend hours everyday cupping and analysing it to ensure it tastes just right, every single time.', '2024-08-02 15:28:01');
INSERT INTO `product` VALUES (2, 1, 'Dark City', 'Balanced & Hearty. Sweet like Belgian Chocolate. Flavours like Forest Fruits.', 480, 1, 'ABOUT THIS ESPRESSO COFFEE\r\nOne of our darker roasts with kick. It blends sweet chocolate and forest fruits. Refined and handsome.\r\n\r\nAnother rich blend, but more on the cocoa side of the flavour wheel and roasted a touch darker than our usual Australian style roast. Bold but smooth; strong but not bitter.', '2024-08-02 15:43:04');
INSERT INTO `product` VALUES (3, 1, 'Roma Espresso Blend', 'Strong & Bold. Sweet like Molasses. Flavours like Chocolate Milk.', 480, 1, 'ABOUT THIS ESPRESSO COFFEE\r\nHere it is!  Our darkest roast by far.  This is our expert Australian take on a Southern Italian style of roasting and blending to give the biggest impact in the cup.  As always, we use the finest Arabican coffee beans.  However, to add an extra big Italian punch to your cup, we have added a sprinkling of high quality Robusta coffee.  Robusta is an entirely different species of coffee delivering more caffeine, bigger dark chocolate flavours, and a thicker Crema.\r\n\r\nVery Italian…Enjoy black or with milk. You’ll be woken up by a big coffee with dark chocolate and molasses flavours.', '2024-08-02 15:47:20');
INSERT INTO `product` VALUES (4, 1, 'Campos Subscription', 'Our freshly roasted coffee delivered right to your door', 480, 1, 'About our coffee subscription\r\nOur Campos Coffee Subscription will deliver coffee right to your door every week, fortnight or month. Become a Coffee of the Month member and you will receive a new Single Origin specialty coffee selected from prime producing regions across the globe.\r\n\r\nMan and woman in kitchen opening box of coffee\r\n\r\n \r\n\r\nCoffee of the Month\r\nAs a Coffee of the Month member, you receive a new single origin specialty coffee selected from one of the prime producing regions of the world.\r\n\r\nThe coffee is roasted fresh on the due date and shipped in the afternoon. Each coffee is analysed by the Cupping Crew at our roastery. The coffee arrives with a write-up on the farm.\r\n\r\nOften these are high ranked auction lots from the Cup of Excellence competitions or exclusive micro-lots from prestigious farms. Whatever you receive, we make sure what we give to the club is well researched, well tested and well worth your while!', '2024-08-02 15:50:01');
INSERT INTO `product` VALUES (5, 1, 'Decaf Espresso', 'Syrupy & Bold. Sweet like Malt Chocolate. Flavours like Real Coffee.', 500, 1, 'ABOUT THIS DECAF COFFEE\r\nWho said decaf can’t taste good? We love delivering a great decaf and we take this product very seriously by adopting a fully natural process. The caffeine is gently removed by using a derivative from sugar cane mixed with mountain water to deliver the very best taste in every cup.\r\n\r\nChocolatey goodness with milk.  Enjoyed black, you’ll have real coffee flavours with caramelly sweetness too.', '2024-08-02 15:51:44');
INSERT INTO `product` VALUES (6, 1, 'Organic Espresso Blend', 'Creamy & Balanced. Sweet like Honey. Flavours like Chocolate Orange.', 500, 1, 'ABOUT THIS ORGANIC ESPRESSO COFFEE\r\nA crisp fruity blend of carefully selected coffee beans from Certified Organic farms. Well rounded with a sweet red fruit finish.\r\n\r\nThis delicious blend combines 100% Certified Organic beans from Colombia, Ethiopia and Peru for a solid, sweet espresso with a red fruit finish.\r\n\r\nInformation\r\nFarm\r\nCertified Organic Farms\r\nOrigin\r\nColombia, Ethiopia, Peru\r\nAltitude\r\n1400-2400m\r\nCertifications\r\nAll certified organic farms\r\nCupping Notes\r\nCreamy & Balanced. Sweet like Honey. Flavours like Chocolate Orange.', '2024-08-02 15:53:44');
INSERT INTO `product` VALUES (7, 1, 'Blade Runner Blend', 'Juicy & Vibrant. Sweet like Toffee. Flavours like Tropical Fruit.', 500, 1, 'ABOUT THIS COFFEE\r\nBlade Runner has been roasted in a unique way to be enjoyed as either a filter or espresso.\r\n\r\nIt has a brighter, juicier profile much like you would find in many leading coffee bars in Scandinavia.\r\n\r\nNot the usual rich chocolates and caramels you would expect to find, but a delicious foray into a new style of coffee blend for us.\r\n\r\nINFORMATION\r\nCountry\r\nKenyan and Ethiopian\r\nTasting Notes\r\nJuicy & Vibrant. Sweet like Toffee. Flavours like Tropical Fruit.\r\nRoast\r\nScandinavian Roast', '2024-08-02 15:55:21');
INSERT INTO `product` VALUES (8, 1, 'King St', 'Sweet like Shortbread. Flavours like Malted Chocolate & Plum.', 480, 1, 'ABOUT THIS COFFEE\r\nNamed after the main drag in Newtown, the neighbourhood where it all began for Campos, this is one seriously smooth blend\r\n\r\nSweet like shortbread with layered flavour notes of plum and dried fruit when enjoyed black, this blend is truly something special. With milk, it is creamy and balanced with delicious, malted chocolate notes.\r\n\r\nKing St is a blend which includes some the of the best South and Central American Arabica specialty coffee beans, sourced by our experts and carefully roasted and blended to deliver eclectic flavour.\r\n\r\nInformation\r\nOrigin\r\nCentral & South America\r\nTasting Notes\r\nCreamy & Balanced Blend. Sweet Like Shortbread. Flavours Like Malted Chocolate & Plum.\r\nProcess\r\nWashed\r\nRoast\r\nEspresso', '2024-08-02 15:57:45');

-- --------------------------------------------------------

-- 
-- 資料表格式： `product_img`
-- 

CREATE TABLE `product_img` (
  `img_id` int(11) NOT NULL auto_increment COMMENT '圖檔編號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `img_file` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT '圖檔名稱',
  `sort` int(2) NOT NULL COMMENT '圖片順序',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

-- 
-- 列出以下資料庫的數據： `product_img`
-- 

INSERT INTO `product_img` VALUES (1, 1, 'small01_Superior_500g_Beans_Front-1-300x300.webp', 1, '2024-08-02 15:40:15');
INSERT INTO `product_img` VALUES (2, 1, 'big01_Superior_500g_Beans_Front-1.png', 2, '2024-08-02 15:41:21');
INSERT INTO `product_img` VALUES (3, 2, 'small02_Dark-City_500g_Blend_Front-300x300.webp', 1, '2024-08-02 15:43:48');
INSERT INTO `product_img` VALUES (4, 2, 'big02_Dark-City_500g_Blend_Front.png', 2, '2024-08-02 15:44:06');
INSERT INTO `product_img` VALUES (5, 3, 'small03_Roma_500g_Blend_Front-300x300.webp', 1, '2024-08-02 15:47:58');
INSERT INTO `product_img` VALUES (6, 3, 'big03_Roma_500g_Blend_Front.png', 2, '2024-08-02 15:48:17');
INSERT INTO `product_img` VALUES (7, 4, 'small04_Campos-Subscription-300x300.webp', 1, '2024-08-02 15:50:21');
INSERT INTO `product_img` VALUES (8, 4, 'big04_Campos-Subscription.png', 2, '2024-08-02 15:50:41');
INSERT INTO `product_img` VALUES (9, 5, 'small05_Decaf_500g_Blend_Front-300x300.webp', 1, '2024-08-02 15:52:07');
INSERT INTO `product_img` VALUES (10, 5, 'big05_Decaf_500g_Blend_Front.png', 2, '2024-08-02 15:52:26');
INSERT INTO `product_img` VALUES (11, 6, 'small06_Organic_500g_Blend_Front-300x300.webp', 1, '2024-08-02 15:54:07');
INSERT INTO `product_img` VALUES (12, 6, 'big06_Organic_500g_Blend_Front.png', 2, '2024-08-02 15:54:22');
INSERT INTO `product_img` VALUES (13, 7, 'small07_Blade-Runner_500g_Blend_Front-300x300.webp', 1, '2024-08-02 15:55:41');
INSERT INTO `product_img` VALUES (14, 7, 'big07_Blade-Runner_500g_Blend_Front.png', 2, '2024-08-02 15:55:55');
INSERT INTO `product_img` VALUES (15, 8, 'small08_King-St_500g_Blend_Front-300x300.webp', 1, '2024-08-02 15:58:08');
INSERT INTO `product_img` VALUES (16, 8, 'big08_King-St_500g_Blend_Front.png', 2, '2024-08-02 15:58:25');

-- --------------------------------------------------------

-- 
-- 資料表格式： `pyclass`
-- 

CREATE TABLE `pyclass` (
  `classid` int(3) NOT NULL auto_increment COMMENT '產品類別',
  `level` int(2) NOT NULL COMMENT '所在層級',
  `fonticon` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '字型圖示',
  `cname` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '類別名稱',
  `sort` int(3) NOT NULL COMMENT '列表排序',
  `uplink` int(3) NOT NULL COMMENT '上層連結',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '建立時間與更新時間',
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=132 ;

-- 
-- 列出以下資料庫的數據： `pyclass`
-- 

INSERT INTO `pyclass` VALUES (1, 1, 'fa-solid fa-mug-saucer', '手工烘焙咖啡豆', 1, 0, '2024-08-02 14:34:53');
INSERT INTO `pyclass` VALUES (2, 1, 'fa-solid fa-capsules', '咖啡膠囊', 2, 0, '2024-08-02 14:34:53');
INSERT INTO `pyclass` VALUES (3, 1, 'fa-solid fa-object-ungroup', '組合商品', 3, 0, '2024-08-02 14:34:53');
INSERT INTO `pyclass` VALUES (21, 2, 'fa-file', '辦公用品', 1, 9, '2024-08-02 14:43:10');
INSERT INTO `pyclass` VALUES (22, 2, 'fa-file', '創意美術', 2, 9, '2024-08-02 14:43:10');
INSERT INTO `pyclass` VALUES (23, 2, 'fa-file', '粉餅(蕊)/蜜粉/蜜粉/海綿', 3, 9, '2024-08-02 14:43:10');
INSERT INTO `pyclass` VALUES (120, 2, 'fa-solid fa-chevron-right', '淺中度烘焙', 1, 1, '2024-08-02 14:57:35');
INSERT INTO `pyclass` VALUES (126, 2, 'fa-solid fa-chevron-right', '沖泡杯壺', 1, 4, '2024-08-02 15:03:09');
INSERT INTO `pyclass` VALUES (125, 2, 'fa-solid fa-chevron-right', '咖啡豆+其它', 3, 3, '2024-08-02 15:02:09');
INSERT INTO `pyclass` VALUES (124, 2, 'fa-solid fa-chevron-right', '咖啡豆+氣密罐', 2, 3, '2024-08-02 15:01:50');
INSERT INTO `pyclass` VALUES (123, 2, 'fa-solid fa-chevron-right', '咖啡豆+杯子', 1, 3, '2024-08-02 15:01:14');
INSERT INTO `pyclass` VALUES (122, 2, 'fa-solid fa-chevron-right', '中深度烘焙', 3, 1, '2024-08-02 14:57:07');
INSERT INTO `pyclass` VALUES (121, 2, 'fa-solid fa-chevron-right', '中度烘焙', 2, 1, '2024-08-02 14:56:27');
INSERT INTO `pyclass` VALUES (118, 1, 'fa-solid fa-flask', '咖啡器具', 4, 0, '2024-08-02 14:38:35');
INSERT INTO `pyclass` VALUES (119, 1, 'fa-solid fa-bag-shopping', '周邊商品', 5, 0, '2024-08-02 14:40:59');
INSERT INTO `pyclass` VALUES (127, 2, 'fa-solid fa-chevron-right', '咖啡濾紙', 2, 4, '2024-08-02 15:03:30');
INSERT INTO `pyclass` VALUES (128, 2, 'fa-solid fa-chevron-right', '品牌造型杯', 1, 5, '2024-08-02 15:04:38');
INSERT INTO `pyclass` VALUES (129, 2, 'fa-solid fa-chevron-right', '造型收納包', 2, 5, '2024-08-02 15:04:58');
INSERT INTO `pyclass` VALUES (130, 2, 'fa-solid fa-chevron-right', '品牌飾品', 3, 5, '2024-08-02 15:05:22');
INSERT INTO `pyclass` VALUES (131, 2, 'fa-solid fa-chevron-right', '雀巢咖啡機相容膠囊', 1, 2, '2024-08-02 15:20:33');

-- --------------------------------------------------------

-- 
-- 資料表格式： `town`
-- 

CREATE TABLE `town` (
  `townNo` bigint(20) NOT NULL auto_increment COMMENT '鄕鎮市編號',
  `Name` varchar(150) collate utf8_unicode_ci NOT NULL COMMENT '鄕鎮市名稱',
  `Post` varchar(10) collate utf8_unicode_ci NOT NULL COMMENT '郵遞區號',
  `State` smallint(6) NOT NULL COMMENT '狀態',
  `AutoNo` int(10) NOT NULL COMMENT '上層城市編號連結',
  PRIMARY KEY  (`townNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=374 ;

-- 
-- 列出以下資料庫的數據： `town`
-- 

INSERT INTO `town` VALUES (1, '中正區', '100', 0, 1);
INSERT INTO `town` VALUES (2, '大同區', '103', 0, 1);
INSERT INTO `town` VALUES (3, '中山區', '104', 0, 1);
INSERT INTO `town` VALUES (4, '松山區', '105', 0, 1);
INSERT INTO `town` VALUES (5, '大安區', '106', 0, 1);
INSERT INTO `town` VALUES (6, '萬華區', '108', 0, 1);
INSERT INTO `town` VALUES (7, '信義區', '110', 0, 1);
INSERT INTO `town` VALUES (8, '士林區', '111', 0, 1);
INSERT INTO `town` VALUES (9, '北投區', '112', 0, 1);
INSERT INTO `town` VALUES (10, '內湖區', '114', 0, 1);
INSERT INTO `town` VALUES (11, '南港區', '115', 0, 1);
INSERT INTO `town` VALUES (12, '文山區', '116', 0, 1);
INSERT INTO `town` VALUES (13, '仁愛區', '200', 0, 2);
INSERT INTO `town` VALUES (14, '信義區', '201', 0, 2);
INSERT INTO `town` VALUES (15, '中正區', '202', 0, 2);
INSERT INTO `town` VALUES (16, '中山區', '203', 0, 2);
INSERT INTO `town` VALUES (17, '安樂區', '204', 0, 2);
INSERT INTO `town` VALUES (18, '暖暖區', '205', 0, 2);
INSERT INTO `town` VALUES (19, '七堵區', '206', 0, 2);
INSERT INTO `town` VALUES (20, '萬里區', '207', 0, 3);
INSERT INTO `town` VALUES (21, '金山區', '208', 0, 3);
INSERT INTO `town` VALUES (22, '板橋區', '220', 0, 3);
INSERT INTO `town` VALUES (23, '汐止區', '221', 0, 3);
INSERT INTO `town` VALUES (24, '深坑區', '222', 0, 3);
INSERT INTO `town` VALUES (25, '石碇區', '223', 0, 3);
INSERT INTO `town` VALUES (26, '瑞芳區', '224', 0, 3);
INSERT INTO `town` VALUES (27, '平溪區', '226', 0, 3);
INSERT INTO `town` VALUES (28, '雙溪區', '227', 0, 3);
INSERT INTO `town` VALUES (29, '貢寮區', '228', 0, 3);
INSERT INTO `town` VALUES (30, '新店區', '231', 0, 3);
INSERT INTO `town` VALUES (31, '坪林區', '232', 0, 3);
INSERT INTO `town` VALUES (32, '烏來區', '233', 0, 3);
INSERT INTO `town` VALUES (33, '永和區', '234', 0, 3);
INSERT INTO `town` VALUES (34, '中和區', '235', 0, 3);
INSERT INTO `town` VALUES (35, '土城區', '236', 0, 3);
INSERT INTO `town` VALUES (36, '三峽區', '237', 0, 3);
INSERT INTO `town` VALUES (37, '樹林區', '238', 0, 3);
INSERT INTO `town` VALUES (38, '鶯歌區', '239', 0, 3);
INSERT INTO `town` VALUES (39, '三重區', '241', 0, 3);
INSERT INTO `town` VALUES (40, '新莊區', '242', 0, 3);
INSERT INTO `town` VALUES (41, '泰山區', '243', 0, 3);
INSERT INTO `town` VALUES (42, '林口區', '244', 0, 3);
INSERT INTO `town` VALUES (43, '蘆洲區', '247', 0, 3);
INSERT INTO `town` VALUES (44, '五股區', '248', 0, 3);
INSERT INTO `town` VALUES (45, '八里區', '249', 0, 3);
INSERT INTO `town` VALUES (46, '淡水區', '251', 0, 3);
INSERT INTO `town` VALUES (47, '三芝區', '252', 0, 3);
INSERT INTO `town` VALUES (48, '石門區', '253', 0, 3);
INSERT INTO `town` VALUES (49, '宜蘭市', '260', 0, 4);
INSERT INTO `town` VALUES (50, '頭城鎮', '261', 0, 4);
INSERT INTO `town` VALUES (51, '礁溪鄉', '262', 0, 4);
INSERT INTO `town` VALUES (52, '壯圍鄉', '263', 0, 4);
INSERT INTO `town` VALUES (53, '員山鄉', '264', 0, 4);
INSERT INTO `town` VALUES (54, '羅東鎮', '265', 0, 4);
INSERT INTO `town` VALUES (55, '三星鄉', '266', 0, 4);
INSERT INTO `town` VALUES (56, '大同鄉', '267', 0, 4);
INSERT INTO `town` VALUES (57, '五結鄉', '268', 0, 4);
INSERT INTO `town` VALUES (58, '冬山鄉', '269', 0, 4);
INSERT INTO `town` VALUES (59, '蘇澳鎮', '270', 0, 4);
INSERT INTO `town` VALUES (60, '南澳鄉', '272', 0, 4);
INSERT INTO `town` VALUES (61, '釣魚台列嶼', '290', 0, 4);
INSERT INTO `town` VALUES (62, '新竹市(東區)', '300', 0, 5);
INSERT INTO `town` VALUES (63, '竹北市', '302', 0, 6);
INSERT INTO `town` VALUES (64, '湖口鄉', '303', 0, 6);
INSERT INTO `town` VALUES (65, '新豐鄉', '304', 0, 6);
INSERT INTO `town` VALUES (66, '新埔鎮', '305', 0, 6);
INSERT INTO `town` VALUES (67, '關西鎮', '306', 0, 6);
INSERT INTO `town` VALUES (68, '芎林鄉', '307', 0, 6);
INSERT INTO `town` VALUES (69, '寶山鄉', '308', 0, 6);
INSERT INTO `town` VALUES (70, '竹東鎮', '310', 0, 6);
INSERT INTO `town` VALUES (71, '五峰鄉', '311', 0, 6);
INSERT INTO `town` VALUES (72, '橫山鄉', '312', 0, 6);
INSERT INTO `town` VALUES (73, '尖石鄉', '313', 0, 6);
INSERT INTO `town` VALUES (74, '北埔鄉', '314', 0, 6);
INSERT INTO `town` VALUES (75, '峨眉鄉', '315', 0, 6);
INSERT INTO `town` VALUES (76, '中壢區', '320', 0, 7);
INSERT INTO `town` VALUES (77, '平鎮區', '324', 0, 7);
INSERT INTO `town` VALUES (78, '龍潭區', '325', 0, 7);
INSERT INTO `town` VALUES (79, '楊梅區', '326', 0, 7);
INSERT INTO `town` VALUES (80, '新屋區', '327', 0, 7);
INSERT INTO `town` VALUES (81, '觀音區', '328', 0, 7);
INSERT INTO `town` VALUES (82, '桃園區', '330', 0, 7);
INSERT INTO `town` VALUES (83, '龜山區', '333', 0, 7);
INSERT INTO `town` VALUES (84, '八德區', '334', 0, 7);
INSERT INTO `town` VALUES (85, '大溪區', '335', 0, 7);
INSERT INTO `town` VALUES (86, '復興區', '336', 0, 7);
INSERT INTO `town` VALUES (87, '大園區', '337', 0, 7);
INSERT INTO `town` VALUES (88, '蘆竹區', '338', 0, 7);
INSERT INTO `town` VALUES (89, '竹南鎮', '350', 0, 8);
INSERT INTO `town` VALUES (90, '頭份市', '351', 0, 8);
INSERT INTO `town` VALUES (91, '三灣鄉', '352', 0, 8);
INSERT INTO `town` VALUES (92, '南庄鄉', '353', 0, 8);
INSERT INTO `town` VALUES (93, '獅潭鄉', '354', 0, 8);
INSERT INTO `town` VALUES (94, '後龍鎮', '356', 0, 8);
INSERT INTO `town` VALUES (95, '通霄鎮', '357', 0, 8);
INSERT INTO `town` VALUES (96, '苑裡鎮', '358', 0, 8);
INSERT INTO `town` VALUES (97, '苗栗市', '360', 0, 8);
INSERT INTO `town` VALUES (98, '造橋鄉', '361', 0, 8);
INSERT INTO `town` VALUES (99, '頭屋鄉', '362', 0, 8);
INSERT INTO `town` VALUES (100, '公館鄉', '363', 0, 8);
INSERT INTO `town` VALUES (101, '大湖鄉', '364', 0, 8);
INSERT INTO `town` VALUES (102, '泰安鄉', '365', 0, 8);
INSERT INTO `town` VALUES (103, '銅鑼鄉', '366', 0, 8);
INSERT INTO `town` VALUES (104, '三義鄉', '367', 0, 8);
INSERT INTO `town` VALUES (105, '西湖鄉', '368', 0, 8);
INSERT INTO `town` VALUES (106, '卓蘭鎮', '369', 0, 8);
INSERT INTO `town` VALUES (107, '中區', '400', 0, 9);
INSERT INTO `town` VALUES (108, '東區', '401', 0, 9);
INSERT INTO `town` VALUES (109, '南區', '402', 0, 9);
INSERT INTO `town` VALUES (110, '西區', '403', 0, 9);
INSERT INTO `town` VALUES (111, '北區', '404', 0, 9);
INSERT INTO `town` VALUES (112, '北屯區', '406', 0, 9);
INSERT INTO `town` VALUES (113, '西屯區', '407', 0, 9);
INSERT INTO `town` VALUES (114, '南屯區', '408', 0, 9);
INSERT INTO `town` VALUES (115, '太平區', '411', 0, 9);
INSERT INTO `town` VALUES (116, '大里區', '412', 0, 9);
INSERT INTO `town` VALUES (117, '霧峰區', '413', 0, 9);
INSERT INTO `town` VALUES (118, '烏日區', '414', 0, 9);
INSERT INTO `town` VALUES (119, '豐原區', '420', 0, 9);
INSERT INTO `town` VALUES (120, '后里區', '421', 0, 9);
INSERT INTO `town` VALUES (121, '石岡區', '422', 0, 9);
INSERT INTO `town` VALUES (122, '東勢區', '423', 0, 9);
INSERT INTO `town` VALUES (123, '和平區', '424', 0, 9);
INSERT INTO `town` VALUES (124, '新社區', '426', 0, 9);
INSERT INTO `town` VALUES (125, '潭子區', '427', 0, 9);
INSERT INTO `town` VALUES (126, '大雅區', '428', 0, 9);
INSERT INTO `town` VALUES (127, '神岡區', '429', 0, 9);
INSERT INTO `town` VALUES (128, '大肚區', '432', 0, 9);
INSERT INTO `town` VALUES (129, '沙鹿區', '433', 0, 9);
INSERT INTO `town` VALUES (130, '龍井區', '434', 0, 9);
INSERT INTO `town` VALUES (131, '梧棲區', '435', 0, 9);
INSERT INTO `town` VALUES (132, '清水區', '436', 0, 9);
INSERT INTO `town` VALUES (133, '大甲區', '437', 0, 9);
INSERT INTO `town` VALUES (134, '外埔區', '438', 0, 9);
INSERT INTO `town` VALUES (135, '大安區', '439', 0, 9);
INSERT INTO `town` VALUES (136, '彰化市', '500', 0, 10);
INSERT INTO `town` VALUES (137, '芬園鄉', '502', 0, 10);
INSERT INTO `town` VALUES (138, '花壇鄉', '503', 0, 10);
INSERT INTO `town` VALUES (139, '秀水鄉', '504', 0, 10);
INSERT INTO `town` VALUES (140, '鹿港鎮', '505', 0, 10);
INSERT INTO `town` VALUES (141, '福興鄉', '506', 0, 10);
INSERT INTO `town` VALUES (142, '線西鄉', '507', 0, 10);
INSERT INTO `town` VALUES (143, '和美鎮', '508', 0, 10);
INSERT INTO `town` VALUES (144, '伸港鄉', '509', 0, 10);
INSERT INTO `town` VALUES (145, '員林市', '510', 0, 10);
INSERT INTO `town` VALUES (146, '社頭鄉', '511', 0, 10);
INSERT INTO `town` VALUES (147, '永靖鄉', '512', 0, 10);
INSERT INTO `town` VALUES (148, '埔心鄉', '513', 0, 10);
INSERT INTO `town` VALUES (149, '溪湖鎮', '514', 0, 10);
INSERT INTO `town` VALUES (150, '大村鄉', '515', 0, 10);
INSERT INTO `town` VALUES (151, '埔鹽鄉', '516', 0, 10);
INSERT INTO `town` VALUES (152, '田中鎮', '520', 0, 10);
INSERT INTO `town` VALUES (153, '北斗鎮', '521', 0, 10);
INSERT INTO `town` VALUES (154, '田尾鄉', '522', 0, 10);
INSERT INTO `town` VALUES (155, '埤頭鄉', '523', 0, 10);
INSERT INTO `town` VALUES (156, '溪州鄉', '524', 0, 10);
INSERT INTO `town` VALUES (157, '竹塘鄉', '525', 0, 10);
INSERT INTO `town` VALUES (158, '二林鎮', '526', 0, 10);
INSERT INTO `town` VALUES (159, '大城鄉', '527', 0, 10);
INSERT INTO `town` VALUES (160, '芳苑鄉', '528', 0, 10);
INSERT INTO `town` VALUES (161, '二水鄉', '530', 0, 10);
INSERT INTO `town` VALUES (162, '南投市', '540', 0, 11);
INSERT INTO `town` VALUES (163, '中寮鄉', '541', 0, 11);
INSERT INTO `town` VALUES (164, '草屯鎮', '542', 0, 11);
INSERT INTO `town` VALUES (165, '國姓鄉', '544', 0, 11);
INSERT INTO `town` VALUES (166, '埔里鎮', '545', 0, 11);
INSERT INTO `town` VALUES (167, '仁愛鄉', '546', 0, 11);
INSERT INTO `town` VALUES (168, '名間鄉', '551', 0, 11);
INSERT INTO `town` VALUES (169, '集集鎮', '552', 0, 11);
INSERT INTO `town` VALUES (170, '水里鄉', '553', 0, 11);
INSERT INTO `town` VALUES (171, '魚池鄉', '555', 0, 11);
INSERT INTO `town` VALUES (172, '信義鄉', '556', 0, 11);
INSERT INTO `town` VALUES (173, '竹山鎮', '557', 0, 11);
INSERT INTO `town` VALUES (174, '鹿谷鄉', '558', 0, 11);
INSERT INTO `town` VALUES (175, '斗南鎮', '630', 0, 12);
INSERT INTO `town` VALUES (176, '大埤鄉', '631', 0, 12);
INSERT INTO `town` VALUES (177, '虎尾鎮', '632', 0, 12);
INSERT INTO `town` VALUES (178, '土庫鎮', '633', 0, 12);
INSERT INTO `town` VALUES (179, '褒忠鄉', '634', 0, 12);
INSERT INTO `town` VALUES (180, '東勢鄉', '635', 0, 12);
INSERT INTO `town` VALUES (181, '臺西鄉', '636', 0, 12);
INSERT INTO `town` VALUES (182, '崙背鄉', '637', 0, 12);
INSERT INTO `town` VALUES (183, '麥寮鄉', '638', 0, 12);
INSERT INTO `town` VALUES (184, '斗六市', '640', 0, 12);
INSERT INTO `town` VALUES (185, '林內鄉', '643', 0, 12);
INSERT INTO `town` VALUES (186, '古坑鄉', '646', 0, 12);
INSERT INTO `town` VALUES (187, '莿桐鄉', '647', 0, 12);
INSERT INTO `town` VALUES (188, '西螺鎮', '648', 0, 12);
INSERT INTO `town` VALUES (189, '二崙鄉', '649', 0, 12);
INSERT INTO `town` VALUES (190, '北港鎮', '651', 0, 12);
INSERT INTO `town` VALUES (191, '水林鄉', '652', 0, 12);
INSERT INTO `town` VALUES (192, '口湖鄉', '653', 0, 12);
INSERT INTO `town` VALUES (193, '四湖鄉', '654', 0, 12);
INSERT INTO `town` VALUES (194, '元長鄉', '655', 0, 12);
INSERT INTO `town` VALUES (195, '嘉義市(東區)', '600', 0, 13);
INSERT INTO `town` VALUES (196, '番路鄉', '602', 0, 14);
INSERT INTO `town` VALUES (197, '梅山鄉', '603', 0, 14);
INSERT INTO `town` VALUES (198, '竹崎鄉', '604', 0, 14);
INSERT INTO `town` VALUES (199, '阿里山鄉', '605', 0, 14);
INSERT INTO `town` VALUES (200, '中埔鄉', '606', 0, 14);
INSERT INTO `town` VALUES (201, '大埔鄉', '607', 0, 14);
INSERT INTO `town` VALUES (202, '水上鄉', '608', 0, 14);
INSERT INTO `town` VALUES (203, '鹿草鄉', '611', 0, 14);
INSERT INTO `town` VALUES (204, '太保市', '612', 0, 14);
INSERT INTO `town` VALUES (205, '朴子市', '613', 0, 14);
INSERT INTO `town` VALUES (206, '東石鄉', '614', 0, 14);
INSERT INTO `town` VALUES (207, '六腳鄉', '615', 0, 14);
INSERT INTO `town` VALUES (208, '新港鄉', '616', 0, 14);
INSERT INTO `town` VALUES (209, '民雄鄉', '621', 0, 14);
INSERT INTO `town` VALUES (210, '大林鎮', '622', 0, 14);
INSERT INTO `town` VALUES (211, '溪口鄉', '623', 0, 14);
INSERT INTO `town` VALUES (212, '義竹鄉', '624', 0, 14);
INSERT INTO `town` VALUES (213, '布袋鎮', '625', 0, 14);
INSERT INTO `town` VALUES (214, '中西區', '700', 0, 15);
INSERT INTO `town` VALUES (215, '東區', '701', 0, 15);
INSERT INTO `town` VALUES (216, '南區', '702', 0, 15);
INSERT INTO `town` VALUES (217, '北區', '704', 0, 15);
INSERT INTO `town` VALUES (218, '安平區', '708', 0, 15);
INSERT INTO `town` VALUES (219, '安南區', '709', 0, 15);
INSERT INTO `town` VALUES (220, '永康區', '710', 0, 15);
INSERT INTO `town` VALUES (221, '歸仁區', '711', 0, 15);
INSERT INTO `town` VALUES (222, '新化區', '712', 0, 15);
INSERT INTO `town` VALUES (223, '左鎮區', '713', 0, 15);
INSERT INTO `town` VALUES (224, '玉井區', '714', 0, 15);
INSERT INTO `town` VALUES (225, '楠西區', '715', 0, 15);
INSERT INTO `town` VALUES (226, '南化區', '716', 0, 15);
INSERT INTO `town` VALUES (227, '仁德區', '717', 0, 15);
INSERT INTO `town` VALUES (228, '關廟區', '718', 0, 15);
INSERT INTO `town` VALUES (229, '龍崎區', '719', 0, 15);
INSERT INTO `town` VALUES (230, '官田區', '720', 0, 15);
INSERT INTO `town` VALUES (231, '麻豆區', '721', 0, 15);
INSERT INTO `town` VALUES (232, '佳里區', '722', 0, 15);
INSERT INTO `town` VALUES (233, '西港區', '723', 0, 15);
INSERT INTO `town` VALUES (234, '七股區', '724', 0, 15);
INSERT INTO `town` VALUES (235, '將軍區', '725', 0, 15);
INSERT INTO `town` VALUES (236, '學甲區', '726', 0, 15);
INSERT INTO `town` VALUES (237, '北門區', '727', 0, 15);
INSERT INTO `town` VALUES (238, '新營區', '730', 0, 15);
INSERT INTO `town` VALUES (239, '後壁區', '731', 0, 15);
INSERT INTO `town` VALUES (240, '白河區', '732', 0, 15);
INSERT INTO `town` VALUES (241, '東山區', '733', 0, 15);
INSERT INTO `town` VALUES (242, '六甲區', '734', 0, 15);
INSERT INTO `town` VALUES (243, '下營區', '735', 0, 15);
INSERT INTO `town` VALUES (244, '柳營區', '736', 0, 15);
INSERT INTO `town` VALUES (245, '鹽水區', '737', 0, 15);
INSERT INTO `town` VALUES (246, '善化區', '741', 0, 15);
INSERT INTO `town` VALUES (247, '大內區', '742', 0, 15);
INSERT INTO `town` VALUES (248, '山上區', '743', 0, 15);
INSERT INTO `town` VALUES (249, '新市區', '744', 0, 15);
INSERT INTO `town` VALUES (250, '安定區', '745', 0, 15);
INSERT INTO `town` VALUES (251, '新興區', '800', 0, 16);
INSERT INTO `town` VALUES (252, '前金區', '801', 0, 16);
INSERT INTO `town` VALUES (253, '苓雅區', '802', 0, 16);
INSERT INTO `town` VALUES (254, '鹽埕區', '803', 0, 16);
INSERT INTO `town` VALUES (255, '鼓山區', '804', 0, 16);
INSERT INTO `town` VALUES (256, '旗津區', '805', 0, 16);
INSERT INTO `town` VALUES (257, '前鎮區', '806', 0, 16);
INSERT INTO `town` VALUES (258, '三民區', '807', 0, 16);
INSERT INTO `town` VALUES (259, '楠梓區', '811', 0, 16);
INSERT INTO `town` VALUES (260, '小港區', '812', 0, 16);
INSERT INTO `town` VALUES (261, '左營區', '813', 0, 16);
INSERT INTO `town` VALUES (262, '仁武區', '814', 0, 16);
INSERT INTO `town` VALUES (263, '大社區', '815', 0, 16);
INSERT INTO `town` VALUES (264, '岡山區', '820', 0, 16);
INSERT INTO `town` VALUES (265, '路竹區', '821', 0, 16);
INSERT INTO `town` VALUES (266, '阿蓮區', '822', 0, 16);
INSERT INTO `town` VALUES (267, '田寮區', '823', 0, 16);
INSERT INTO `town` VALUES (268, '燕巢區', '824', 0, 16);
INSERT INTO `town` VALUES (269, '橋頭區', '825', 0, 16);
INSERT INTO `town` VALUES (270, '梓官區', '826', 0, 16);
INSERT INTO `town` VALUES (271, '彌陀區', '827', 0, 16);
INSERT INTO `town` VALUES (272, '永安區', '828', 0, 16);
INSERT INTO `town` VALUES (273, '湖內區', '829', 0, 16);
INSERT INTO `town` VALUES (274, '鳳山區', '830', 0, 16);
INSERT INTO `town` VALUES (275, '大寮區', '831', 0, 16);
INSERT INTO `town` VALUES (276, '林園區', '832', 0, 16);
INSERT INTO `town` VALUES (277, '鳥松區', '833', 0, 16);
INSERT INTO `town` VALUES (278, '大樹區', '840', 0, 16);
INSERT INTO `town` VALUES (279, '旗山區', '842', 0, 16);
INSERT INTO `town` VALUES (280, '美濃區', '843', 0, 16);
INSERT INTO `town` VALUES (281, '六龜區', '844', 0, 16);
INSERT INTO `town` VALUES (282, '內門區', '845', 0, 16);
INSERT INTO `town` VALUES (283, '杉林區', '846', 0, 16);
INSERT INTO `town` VALUES (284, '甲仙區', '847', 0, 16);
INSERT INTO `town` VALUES (285, '桃源區', '848', 0, 16);
INSERT INTO `town` VALUES (286, '那瑪夏區', '849', 0, 16);
INSERT INTO `town` VALUES (287, '茂林區', '851', 0, 16);
INSERT INTO `town` VALUES (288, '茄萣區', '852', 0, 16);
INSERT INTO `town` VALUES (289, '東沙', '817', 0, 17);
INSERT INTO `town` VALUES (290, '南沙', '819', 0, 17);
INSERT INTO `town` VALUES (291, '馬公市', '880', 0, 18);
INSERT INTO `town` VALUES (292, '西嶼鄉', '881', 0, 18);
INSERT INTO `town` VALUES (293, '望安鄉', '882', 0, 18);
INSERT INTO `town` VALUES (294, '七美鄉', '883', 0, 18);
INSERT INTO `town` VALUES (295, '白沙鄉', '884', 0, 18);
INSERT INTO `town` VALUES (296, '湖西鄉', '885', 0, 18);
INSERT INTO `town` VALUES (297, '屏東市', '900', 0, 19);
INSERT INTO `town` VALUES (298, '三地門鄉', '901', 0, 19);
INSERT INTO `town` VALUES (299, '霧臺鄉', '902', 0, 19);
INSERT INTO `town` VALUES (300, '瑪家鄉', '903', 0, 19);
INSERT INTO `town` VALUES (301, '九如鄉', '904', 0, 19);
INSERT INTO `town` VALUES (302, '里港鄉', '905', 0, 19);
INSERT INTO `town` VALUES (303, '高樹鄉', '906', 0, 19);
INSERT INTO `town` VALUES (304, '鹽埔鄉', '907', 0, 19);
INSERT INTO `town` VALUES (305, '長治鄉', '908', 0, 19);
INSERT INTO `town` VALUES (306, '麟洛鄉', '909', 0, 19);
INSERT INTO `town` VALUES (307, '竹田鄉', '911', 0, 19);
INSERT INTO `town` VALUES (308, '內埔鄉', '912', 0, 19);
INSERT INTO `town` VALUES (309, '萬丹鄉', '913', 0, 19);
INSERT INTO `town` VALUES (310, '潮州鎮', '920', 0, 19);
INSERT INTO `town` VALUES (311, '泰武鄉', '921', 0, 19);
INSERT INTO `town` VALUES (312, '來義鄉', '922', 0, 19);
INSERT INTO `town` VALUES (313, '萬巒鄉', '923', 0, 19);
INSERT INTO `town` VALUES (314, '崁頂鄉', '924', 0, 19);
INSERT INTO `town` VALUES (315, '新埤鄉', '925', 0, 19);
INSERT INTO `town` VALUES (316, '南州鄉', '926', 0, 19);
INSERT INTO `town` VALUES (317, '林邊鄉', '927', 0, 19);
INSERT INTO `town` VALUES (318, '東港鄉', '928', 0, 19);
INSERT INTO `town` VALUES (319, '琉球鄉', '929', 0, 19);
INSERT INTO `town` VALUES (320, '佳冬鄉', '931', 0, 19);
INSERT INTO `town` VALUES (321, '新園鄉', '932', 0, 19);
INSERT INTO `town` VALUES (322, '枋寮鄉', '940', 0, 19);
INSERT INTO `town` VALUES (323, '枋山鄉', '941', 0, 19);
INSERT INTO `town` VALUES (324, '春日鄉', '942', 0, 19);
INSERT INTO `town` VALUES (325, '獅子鄉', '943', 0, 19);
INSERT INTO `town` VALUES (326, '車城鄉', '944', 0, 19);
INSERT INTO `town` VALUES (327, '牡丹鄉', '945', 0, 19);
INSERT INTO `town` VALUES (328, '恆春鎮', '946', 0, 19);
INSERT INTO `town` VALUES (329, '滿州鄉', '947', 0, 19);
INSERT INTO `town` VALUES (330, '臺東市', '950', 0, 20);
INSERT INTO `town` VALUES (331, '綠島鄉', '951', 0, 20);
INSERT INTO `town` VALUES (332, '蘭嶼鄉', '952', 0, 20);
INSERT INTO `town` VALUES (333, '延平鄉', '953', 0, 20);
INSERT INTO `town` VALUES (334, '卑南鄉', '954', 0, 20);
INSERT INTO `town` VALUES (335, '鹿野鄉', '955', 0, 20);
INSERT INTO `town` VALUES (336, '關山鎮', '956', 0, 20);
INSERT INTO `town` VALUES (337, '海端鄉', '957', 0, 20);
INSERT INTO `town` VALUES (338, '池上鄉', '958', 0, 20);
INSERT INTO `town` VALUES (339, '東河鄉', '959', 0, 20);
INSERT INTO `town` VALUES (340, '成功鎮', '961', 0, 20);
INSERT INTO `town` VALUES (341, '長濱鄉', '962', 0, 20);
INSERT INTO `town` VALUES (342, '太麻里鄉', '963', 0, 20);
INSERT INTO `town` VALUES (343, '金峰鄉', '964', 0, 20);
INSERT INTO `town` VALUES (344, '大武鄉', '965', 0, 20);
INSERT INTO `town` VALUES (345, '達仁鄉', '966', 0, 20);
INSERT INTO `town` VALUES (346, '花蓮市', '970', 0, 21);
INSERT INTO `town` VALUES (347, '新城鄉', '971', 0, 21);
INSERT INTO `town` VALUES (348, '秀林鄉', '972', 0, 21);
INSERT INTO `town` VALUES (349, '吉安鄉', '973', 0, 21);
INSERT INTO `town` VALUES (350, '壽豐鄉', '974', 0, 21);
INSERT INTO `town` VALUES (351, '鳳林鎮', '975', 0, 21);
INSERT INTO `town` VALUES (352, '光復鄉', '976', 0, 21);
INSERT INTO `town` VALUES (353, '豐濱鄉', '977', 0, 21);
INSERT INTO `town` VALUES (354, '瑞穗鄉', '978', 0, 21);
INSERT INTO `town` VALUES (355, '萬榮鄉', '979', 0, 21);
INSERT INTO `town` VALUES (356, '玉里鎮', '981', 0, 21);
INSERT INTO `town` VALUES (357, '卓溪鄉', '982', 0, 21);
INSERT INTO `town` VALUES (358, '富里鄉', '983', 0, 21);
INSERT INTO `town` VALUES (359, '金沙鎮', '890', 0, 22);
INSERT INTO `town` VALUES (360, '金湖鎮', '891', 0, 22);
INSERT INTO `town` VALUES (361, '金寧鄉', '892', 0, 22);
INSERT INTO `town` VALUES (362, '金城鎮', '893', 0, 22);
INSERT INTO `town` VALUES (363, '烈嶼鄉', '894', 0, 22);
INSERT INTO `town` VALUES (364, '烏坵鄉', '896', 0, 22);
INSERT INTO `town` VALUES (365, '南竿鄉', '209', 0, 23);
INSERT INTO `town` VALUES (366, '北竿鄉', '210', 0, 23);
INSERT INTO `town` VALUES (367, '莒光鄉', '211', 0, 23);
INSERT INTO `town` VALUES (368, '東引鄉', '212', 0, 23);
INSERT INTO `town` VALUES (371, '新竹市(北區)', '300', 0, 5);
INSERT INTO `town` VALUES (372, '新竹市(香山區)', '300', 0, 5);
INSERT INTO `town` VALUES (373, '嘉義市(西區)', '600', 0, 13);

-- --------------------------------------------------------

-- 
-- 資料表格式： `uorder`
-- 

CREATE TABLE `uorder` (
  `orderid` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '訂單編號',
  `emailid` int(10) NOT NULL COMMENT '會員編號',
  `addressid` int(10) NOT NULL COMMENT '收件人編號',
  `howpay` tinyint(4) NOT NULL default '1' COMMENT '如何付款',
  `paystatus` int(5) default NULL COMMENT '付款狀態',
  `status` tinyint(1) NOT NULL default '1' COMMENT '訂單處理狀態',
  `remark` varchar(200) collate utf8_unicode_ci default NULL COMMENT '備註',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '訂單時間',
  PRIMARY KEY  (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- 
-- 列出以下資料庫的數據： `uorder`
-- 

