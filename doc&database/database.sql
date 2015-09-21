-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- 主机: sql311.ithks.com
-- 生成日期: 2015 年 01 月 12 日 01:58
-- 服务器版本: 5.6.21-70.1
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ithks_13697862_liam`
--

-- --------------------------------------------------------

--
-- 表的结构 `admininfo`
--

CREATE TABLE IF NOT EXISTS `admininfo` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `adminpwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lasttime` varchar(30) DEFAULT NULL,
  `is_super` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adminid`),
  UNIQUE KEY `adminname` (`adminname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `admininfo`
--

INSERT INTO `admininfo` (`adminid`, `adminname`, `adminpwd`, `lasttime`, `is_super`) VALUES
(1, 'zhulin', '123', '2015年01月11日23時33分27秒', 1),
(8, 'kefu001', '123456', '2015年01月11日16時50分35秒', 0),
(10, 'sysadmin', '123456', '2015年01月12日13時29分53秒', 1);

-- --------------------------------------------------------

--
-- 表的结构 `bookinfo`
--

CREATE TABLE IF NOT EXISTS `bookinfo` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(200) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `introduce` text NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `sysl` int(11) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80131 ;

--
-- 转存表中的数据 `bookinfo`
--

INSERT INTO `bookinfo` (`bookid`, `bookname`, `ISBN`, `introduce`, `publisher`, `sysl`) VALUES
(10001, 'JAVA學習教程', '45124565255454235', '旗標出版社', '', 20),
(10004, 'C#程序設計第四冊', '123334', '廣東教育出版社', '', 19),
(10005, 'C#程序設計第三冊', '1233', '廣東教育出版社', '', 20),
(10006, 'C#程序設計第二冊', '123', '廣東教育出版社', '', 20),
(10007, 'C#程序設計第一冊（英文版）', '1231', '廣東教育出版社', '', 20),
(10008, 'JAVA快速學習', '1233345', '人民教育出版社', '', 20),
(10013, 'C#筆記', '201412010001', '朝陽科技大學', '', 20),
(10014, 'C#筆記2', '201412010002', '朝陽科技大學', '', 20),
(10015, 'C#筆記3', '201412010003', '朝陽科技大學', '', 20),
(10016, 'C#筆記4', '201412010004201412', '朝陽科技大學', '', 20),
(80001, '鸟哥的Linux私房菜基础学习篇（第三版）', '', '', '', 20),
(80002, '数学分析（下册）', '', '', '', 20),
(80003, '超越CSS：Web设计艺术精髓（修订版）', '', '', '', 20),
(80004, 'Javascript Dom 编程艺术（第2版）', '', '', '', 20),
(80005, 'C++黑客编程揭秘与防范', '', '', '', 20),
(80006, 'Web前端黑客技术揭秘', '', '', '', 20),
(80007, 'Head Frist PHP&MySQL(中文版）', '', '', '', 20),
(80008, 'Java夜未眠', '', '', '', 20),
(80009, '数学分析（上册）', '', '', '', 20),
(80010, '个体软件过程与编码规范', '', '', '', 20),
(80011, 'javascript高级程序设计（第3版）', '', '', '', 20),
(80012, '移动应用开发技术', '', '', '', 20),
(80013, 'C语言从入门到精通', '', '', '', 20),
(80014, '全真模拟与考前冲刺——二级C语言', '', '', '', 20),
(80015, '视频学C#', '', '', '', 20),
(80016, '程序员2010精华本', '', '', '', 20),
(80017, 'Java学习笔记', '', '', '', 20),
(80018, 'Android开发实战经典', '', '', '', 20),
(80019, 'JSP应用开发技术', '', '', '', 20),
(80020, 'Java Web开发实战经典', '', '', '', 20),
(80021, 'C++面向对象程序开发', '', '', '', 20),
(80022, '全国计算机等级考试——二级C语言程序设计', '', '', '', 20),
(80023, '全国计算机等级考试——C语言程序设计（2011年版）', '', '', '', 20),
(80024, '数据结构（C语言版）', '', '', '', 20),
(80025, '数据结构（第3版）', '', '', '', 20),
(80026, '全国计算机等级考试教程 二级C语言', '', '', '', 20),
(80027, '基于工作过程的Java程序设计', '', '', '', 20),
(80028, 'C++程序设计基础（第4版上）', '', '', '', 20),
(80029, '计算机网络基础', '', '', '', 20),
(80030, '电子商务基础（第3版）', '', '', '', 20),
(80031, 'Android任务驱动式教程', '', '', '', 20),
(80032, 'Visual C++6.0应用案例教程', '', '', '', 20),
(80033, 'VC++程序设计基础教程', '', '', '', 20),
(80034, 'C++程序设计（第2版）', '', '', '', 20),
(80035, 'Java EE项目应用开发', '', '', '', 20),
(80036, '实用计算机英语', '', '', '', 20),
(80037, '网络数据库技术 PHP+MySQL', '', '', '', 20),
(80038, 'C语言程序设计', '', '', '', 20),
(80039, '高质量程序设计指南C++/C语言', '', '', '', 20),
(80040, 'C语言实例教程', '', '', '', 20),
(80041, 'XML编程与应用教程', '', '', '', 20),
(80042, 'Android（中文版）', '', '', '', 20),
(80043, '锋利的jQuery（第二版）', '', '', '', 20),
(80044, 'C++ Primer中文版', '', '', '', 20),
(80045, 'Head Frist Ajax（中文版）', '', '', '', 20),
(80046, '黑客攻防从入门到精通', '', '', '', 20),
(80047, 'Node.js开发指南', '', '', '', 20),
(80048, 'Effective C++（中文版）', '', '', '', 20),
(80049, '离散数学', '', '', '', 20),
(80050, 'ACM-ICPC程序设计系列基础训练题解', '', '', '', 20),
(80051, '概率论与数理统计（理工类.高职高专版.第三版）', '', '', '', 20),
(80052, '黑客与画家', '', '', '', 20),
(80053, 'HTML5程序设计（第二版）', '', '', '', 20),
(80054, '精通CSS高级Web标准解决方案（第2版）', '', '', '', 20),
(80055, '程序员的自我修养——连接装载与库', '', '', '', 20),
(80056, 'HTML5和CSS3实例教程', '', '', '', 20),
(80057, '代码的未来', '', '', '', 20),
(80058, 'C语言常见问题集（白皮版）', '', '', '', 20),
(80059, 'C语言标准与实现（白皮版）', '', '', '', 20),
(80060, 'Ajax基础讲义（白皮版）', '', '', '', 20),
(80061, 'SQL sever数据库教程（上）（白皮版）', '', '', '', 20),
(80062, '数学建模中的计算机程序设计基础（白皮版）', '', '', '', 20),
(80063, '实用数学算法（选讲）（白皮版）', '', '', '', 20),
(80064, '数据库与应用——MySQL（白皮版）', '', '', '', 20),
(80065, 'SQL sever数据库教程（下）（白皮版）', '', '', '', 20),
(80066, 'UNIX网络编程（第1卷）', '', '', '', 20),
(80067, '实战突击C#项目开发案例整合', '', '', '', 20),
(80068, 'C程序设计教程', '', '', '', 20),
(80069, 'HTML5+CSS3从入门到精通', '', '', '', 20),
(80070, 'C++编程思想', '', '', '', 20),
(80071, '实战突击Visual C++项目开发案例整合', '', '', '', 20),
(80072, 'Linux系统与网络管理教程', '', '', '', 20),
(80073, 'UNIX环境高级编程（第2版）', '', '', '', 20),
(80074, 'Java开发实战经典', '', '', '', 20),
(80075, '具体数学计算机科学基础（第2版）', '', '', '', 20),
(80076, '疯狂Android讲义（第2版）', '', '', '', 20),
(80077, 'TCP/IP详解卷二：实现', '', '', '', 20),
(80078, '实战突击JavaWeb项目整合开发', '', '', '', 20),
(80079, 'Linux C编程从初学到精通', '', '', '', 20),
(80080, 'Borland传奇', '', '', '', 20),
(80081, '数学建模', '', '', '', 20),
(80082, '暗时间', '', '', '', 20),
(80083, 'HTML5', '', '', '', 20),
(80084, '数学建模教程', '', '', '', 20),
(80085, '基于工作任务的JavaWeb应用教程', '', '', '', 20),
(80086, 'C#程序设计项目实训教程', '', '', '', 20),
(80087, 'C程序设计（第三版）', '', '', '', 20),
(80088, '全国计算机等级考试二级教程——公共基础知识（2011年版）', '', '', '', 20),
(80089, 'Java程序设计案例教程', '', '', '', 20),
(80090, 'C++程序设计基础（第4版下）', '', '', '', 20),
(80091, '白帽子讲Web安全', '', '', '', 20),
(80092, '敏捷软件开发原则、模式与实践', '', '', '', 20),
(80093, '计算机程序的构造和解释', '', '', '', 20),
(80094, 'TCP/IP详解卷一：实现', '', '', '', 20),
(80095, 'Java从入门到精通', '', '', '', 20),
(80096, 'Linux配置与管理（白皮版）', '', '', '', 20),
(80097, 'JavaWeb组件技术（白皮版）', '', '', '', 20),
(80098, '计算机英语（白皮版）', '', '', '', 20),
(80099, '基于MVC的javascript Web富应用开发', '', '', '', 20),
(80100, '逻辑思维训练500题（白金版）', '', '', '', 20),
(80101, '渐进增强的Web设计', '', '', '', 20),
(80102, '深入解析Mac OS X&ios操作系统', '', '', '', 20),
(80103, '离散数学及其应用（原书第6版）', '', '', '', 20),
(80104, '代码大全——两届Softw are Jolt Award震撼大奖得主！软件开发世界的地图', '', '', '', 20),
(80105, 'Android和PHP开发最佳实践', '', '', '', 20),
(80106, '逻辑思维2册套装', '', '', '', 20),
(80107, 'ASP.NET从入门到精通（第三版）', '', '', '', 20),
(80108, '餐巾纸的背面', '', '', '', 20),
(80109, 'C#高级编程（第8版）', '', '', '', 20),
(80110, 'Java程序性能优化——让你的Java程序更快更稳定', '', '', '', 20),
(80111, 'Head Frist HTML与CSS、XHTML（中文版）', '', '', '', 20),
(80112, '响应式Web设计实践', '', '', '', 20),
(80113, '奇思妙想15位计算机天才及其重大发现', '', '', '', 20),
(80114, 'Android和PHP开发最佳实践', '', '', '', 20),
(80115, '深入解析Mac OS X & iOS操作系统', '', '', '', 20),
(80116, 'Java程序性能优化——让你的Java程序更快、更稳定', '', '', '', 20),
(80117, '代码大全', '', '', '', 20),
(80118, '如何阅读一本书', '', '', '', 20),
(80119, '渐进增强的Web设计', '', '', '', 20),
(80120, 'ASP.NET从入门到精通（第3版）（附光盘1张）', '', '', '', 20),
(80121, '深入浅出Node.js', '', '', '', 20),
(80122, '《餐巾纸的背面》', '', '', '', 20),
(80123, '基于MVC的JavaScript Web富应用开发', '', '', '', 20),
(80124, '离散数学及其应用（原书第6版）', '', '', '', 20),
(80125, 'C#高级编程（第8版）', '1111111111111111', 'C#高级编程（第8版）', '朝陽科技大學', 20),
(80126, '批判性思维工具（原书第3版）', '', '', '', 20),
(80127, '象形5000——象形英语单词书', '', '', '', 20),
(80128, '罗辑思维2册套装', '', '', '', 20),
(80129, '逻辑思维训练500题（白金版） ', '', '', '', 20),
(80130, '电商战略之电商2.0（精装版）', '', '', '', 20);

-- --------------------------------------------------------

--
-- 表的结构 `borrowinfo`
--

CREATE TABLE IF NOT EXISTS `borrowinfo` (
  `borrowID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `bookid` int(11) NOT NULL,
  `borrowTime` int(11) NOT NULL,
  `borrowTimes` int(11) NOT NULL DEFAULT '0',
  `status` varchar(30) NOT NULL DEFAULT '待審核',
  `remarks` text,
  `returnTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`borrowID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `borrowinfo`
--

INSERT INTO `borrowinfo` (`borrowID`, `username`, `bookid`, `borrowTime`, `borrowTimes`, `status`, `remarks`, `returnTime`) VALUES
(27, 'test2', 80016, 1420883327, 0, '已歸還', '宅急送 20150101100255', 1421747327),
(26, 'test2', 10004, 1420875541, 1, '已結案', '宅急送 編號2：201452452155 書籍遺失，已處理完畢', 1422603541);

-- --------------------------------------------------------

--
-- 表的结构 `loginhistory`
--

CREATE TABLE IF NOT EXISTS `loginhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `logintime` datetime NOT NULL,
  `loginip` varchar(50) NOT NULL,
  `loginAddress` varchar(200) DEFAULT NULL,
  `logintype` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `loginhistory`
--

INSERT INTO `loginhistory` (`id`, `username`, `logintime`, `loginip`, `loginAddress`, `logintype`) VALUES
(2, '10127021', '2015-01-08 21:04:25', '114.35.103.27', '台湾省', 'Web'),
(28, 'systest', '2015-01-12 14:29:09', '210.63.211.8', '', 'Web'),
(27, 'systest', '2015-01-11 17:52:59', '210.63.211.8', '台湾省', 'Web'),
(26, 'systest', '2015-01-11 17:26:23', '210.63.211.8', '', 'Web'),
(25, 'systest', '2015-01-11 16:47:10', '210.63.211.8', '台湾省', 'Web');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8  COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8  COLLATE utf8_bin NOT NULL,
  `newstime` datetime NOT NULL,
  `isShow` int(11) NOT NULL DEFAULT '1',
  `lasttime` datetime NOT NULL,
  `times` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=120 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `newstime`, `isShow`, `lasttime`, `times`) VALUES
(86, '網站正式開始測試啦！', '<p>\r\n	hi，各位E-LIB的粉絲：\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;日安！<img src="http://chuliam.sxisa.org/editor/plugins/emoticons/images/0.gif" border="0" alt="" />E-LIB服務團隊正在加緊時間完善中，現在基本功能已經實現，在面向大眾進行測試，如果您在使用過程中又發現任何bug,請及時反饋，謝謝您的配合！E-LIB感謝有您的一路支持！\r\n</p>\r\n<p align="right">\r\n	E-LIB 2014.11.30\r\n</p>\r\n<p align="right">\r\n	<br />\r\n</p>', '2014-11-30 11:40:40', 1, '2015-01-09 12:03:33', 20755),
(118, '測試翻頁1', '<p>\r\n	測試\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '2015-01-11 17:49:49', 1, '2015-01-11 17:49:49', 0),
(92, '聯繫我們||聯繫E-LIB', '<p>\r\n	<span style="color:#000000;font-size:16px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tel:02-88888 總機</span> \r\n</p>\r\n<p>\r\n	<span style="color:#000000;font-size:16px;"><span style="font-size:16px;line-height:24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>Tel:02-88882 分機</span> \r\n</p>\r\n<p>\r\n	<span style="color:#000000;font-size:16px;"><span style="font-size:16px;line-height:24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>Tel:02-88886&nbsp;</span><span style="color:#000000;font-size:16px;">分機</span> \r\n</p>\r\n<p>\r\n	<span style="color:#000000;font-size:16px;"><span style="font-size:16px;line-height:24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>Tel:02-88889&nbsp;</span><span style="color:#000000;font-size:16px;">分機</span> \r\n</p>\r\n<p>\r\n	<span style="color:#000000;font-size:16px;"><span style="font-size:16px;line-height:24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>Mail:e-lib@e-lib.com&nbsp;</span> \r\n</p>\r\n<p>\r\n	<span style="color:#000000;font-size:16px;"><span style="font-size:16px;line-height:24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>Mail:service@e-lib.com&nbsp;</span> \r\n</p>\r\n<p>\r\n	<span style="color:#000000;font-size:16px;"><span style="font-size:16px;line-height:24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>Wechat:e-lib-offical</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;有任何問題，歡迎反饋，謝謝！<img src="http://192.168.0.102:81/weblib/editor/plugins/emoticons/images/0.gif" border="0" alt="" /></span> \r\n</p>\r\n<br />', '2014-11-30 21:03:19', 0, '2015-01-08 20:26:30', 405),
(93, '加入我們||加入E-LIB', '<p>\r\n	Hello，e-lib的粉絲：\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;<img alt="" src="http://192.168.0.102:81/weblib/editor/plugins/emoticons/images/0.gif" border="0" />歡迎加入我們，但由於網站現在進行測試中，您無法進行註冊，請先使用測試賬號（賬號：test 密碼：123）進行瀏覽，待正式開始公測后，才開放註冊，謝謝您的配合，給您帶來不便，敬請原諒！<img alt="" src="http://192.168.0.102:81/weblib/editor/plugins/emoticons/images/21.gif" border="0" /> \r\n</p>\r\n<p style="text-align:right;">\r\n	e-lib 2014-11-30\r\n</p>', '2014-11-30 21:09:24', 0, '2014-12-04 16:59:49', 379),
(114, 'E-LIB線上圖書借閱系統簡介', '<p>\r\n	<p>\r\n		E-LIB線上圖書借閱系統借力于現代化的物流，採用黑貓宅急送超速物流，運用先進的借書流程，無需到書館，只需線上一點，書籍送到府上！\r\n	</p>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '2015-01-10 17:42:39', 1, '2015-01-11 15:32:04', 14),
(115, '測試標題1', '<p>\r\n	測試內容以一\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '2015-01-11 17:48:40', 1, '2015-01-11 17:48:50', 1),
(116, '測試標題2', '測試內容2', '2015-01-11 17:49:18', 1, '2015-01-11 17:49:18', 0),
(117, '測試標題3', '<p>\r\n	測試內容3\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '2015-01-11 17:49:31', 1, '2015-01-11 17:49:31', 0),
(119, '測試翻頁2', '<p>\r\n	嘟嘟嘟\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '2015-01-11 17:50:00', 1, '2015-01-11 17:50:00', 2);

-- --------------------------------------------------------

--
-- 表的结构 `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `sid` int(20) NOT NULL AUTO_INCREMENT,
  `suser` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `stype` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `scontent` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `stime` datetime NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(50) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userPwd` varchar(50) NOT NULL,
  `userSex` varchar(2) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `userCardId` varchar(18) NOT NULL,
  `userMail` varchar(100) NOT NULL,
  `regTime` varchar(30) NOT NULL,
  `readerVip` varchar(5) NOT NULL DEFAULT '否',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`id`, `userID`, `userName`, `userPwd`, `userSex`, `userAddress`, `userCardId`, `userMail`, `regTime`, `readerVip`) VALUES
(7, '10127021', '黃冠瑜', '10127021', '男', '朝陽科大', '440123199901015123', 'q4eb4t8q3r@kimo.com', '2015-01-08 21:04:09', '否'),
(9, 'systest', '系統測試NOVIP', '123456', '男', '臺中市霧峰區朝陽科技大學', '440711200001011453', 'systest@e-lib.com', '2015-01-11 16:46:55', '否');

-- --------------------------------------------------------

--
-- 表的结构 `vipinfo`
--

CREATE TABLE IF NOT EXISTS `vipinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `alipayName` varchar(100) NOT NULL,
  `alipayNum` varchar(50) NOT NULL,
  `applyTime` varchar(50) NOT NULL,
  `result` varchar(20) DEFAULT '未審核',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alipayNum` (`alipayNum`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
