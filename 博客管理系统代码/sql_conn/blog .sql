use myblog;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
# SET time_zone = "+00:00";

set global time_zone = '+8:00';  ##修改mysql全局时区为北京时间，即我们所在的东8区
set time_zone = '+8:00';  ##修改当前会话时区
flush privileges;  #立即生效


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 数据库：blog

-- 用户表adminuser

CREATE TABLE `adminuser` (
  `regid` int(11)  UNSIGNED AUTO_INCREMENT  NOT NULL,
  `regname` varchar(20) NOT NULL,
  `regpwd` varchar(100) NOT NULL,
  `regqq` varchar(20) DEFAULT NULL,
  `regemail` varchar(50) NOT NULL,
  `regsex` varchar(10) DEFAULT NULL,
  `islock` int(11) NOT NULL DEFAULT 0,
  `fig` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`regid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 插入数据到adminuser

INSERT INTO `adminuser` (`regid`,`regname`, `regpwd`, `regqq`, `regemail`, `regsex`, `islock`, `fig`) VALUES
(1,'ZJH', '123', '2793585903', '2793585903@qq.com', 'male', 0, 1);
INSERT INTO `adminuser` (`regid`,`regname`, `regpwd`, `regqq`, `regemail`, `regsex`, `islock`, `fig`) VALUES
    (2,'ZWH', '123', '2793585903', '2793585903@qq.com', 'male', 0, 0);
INSERT INTO `adminuser` (`regid`,`regname`, `regpwd`, `regqq`, `regemail`, `regsex`, `islock`, `fig`) VALUES
    (3,'ZZX', '123', '2793585903', '2793585903@qq.com', 'male', 0, 0);
INSERT INTO `adminuser` (`regid`,`regname`, `regpwd`, `regqq`, `regemail`, `regsex`, `islock`, `fig`) VALUES
    (4,'SQ', '123', '2793585903', '2793585903@qq.com', 'male', 0, 0);
INSERT INTO `adminuser` (`regid`,`regname`, `regpwd`, `regqq`, `regemail`, `regsex`, `islock`, `fig`) VALUES
    (5,'XZ', '123', '2793585903', '2793585903@qq.com', 'male', 0, 0);
-- --------------------------------------------------------

-- 博文表 article

CREATE TABLE `article` (
  `id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `pubtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 插入数据 article

INSERT INTO `article` (`id`, `type_id`, `title`, `content`, `author`, `pubtime`) VALUES
(1, 1, 'PHP简介', '您应当具备的基础知识\r\n在继续学习之前，您需要对以下PHP知识有基本的了解,\r\nPHP（全称：PHP：Hypertext Preprocessor，即\"PHP：超文本预处理器\"）是一种通用开源脚本语言。', 'ZJH', '2021-11-19 13:45:59'),
(2, 2, 'SQL语言简介', 'SQL 是一门 ANSI 的标准计算机语言，用来访问和操作数据库系统！', 'XZ', '2021-11-19 14:45:59'),
(3, 3, 'HTML简介','HTML的全称为超文本标记语言', 'ZJH', '2021-11-19 16:45:59'),
(4, 3, 'HTML简介2','HTML的全称为超文本标记语言', 'ZJH', '2021-11-19 16:45:59'),
(5, 3, 'HTML简介3','HTML的全称为超文本标记语言', 'ZJH', '2021-11-19 16:45:59'),
(6, 3, 'HTML简介4','HTML的全称为超文本标记语言', 'ZWH', '2021-12-08 16:45:59'),
(7, 3, 'HTML简介5','HTML的全称为超文本标记语言', 'ZZX', '2021-12-09 16:45:59'),
(8, 3, 'HTML简介6','HTML的全称为超文本标记语言', 'SQ', '2021-12-10 16:45:59'),
(9, 3, 'HTML简介7','HTML的全称为超文本标记语言', 'XZ', '2021-12-11 16:45:59'),
(10, 2, 'SQL语言简介2', 'SQL 是一门 ANSI 的标准计算机语言，用来访问和操作数据库系统！', 'SQ', '2021-12-19 14:45:59');


-- 博文类型表 article_type

CREATE TABLE `article_type` (
  `type_id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
  `type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 插入数据 article_type

INSERT INTO `article_type` (`type_id`, `type_name`) VALUES
(1, 'PHP'),
(2, 'SQL'),
(3, 'HTML');

-- 评论表 comment

CREATE TABLE `comment` (
  `id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
  `fileid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `comtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 插入数据 comment

INSERT INTO `comment` (`id`, `fileid`, `username`, `content`, `comtime`) VALUES
(1, 1, 'ZJH', '干的漂亮！', '2021-11-17 10:23:14'),
(2, 1, 'ZJH', '写的挺好的，奥利给！', '2021-11-18 23:39:09'),
(3, 2, 'ZJH', '这是第二篇文章的第一条留言', '2021-11-20 23:40:12'),
(4, 2, 'ZWH', '6666666666666！', '2021-11-17 00:05:49'),
(5, 3, 'ZWH', '第n次测试', '2021-11-13 04:07:06'),
(6, 3, 'ZZX', '第n+1次测试', '2021-11-12 04:13:15'),
(7, 3, 'ZZX', '留下我的足迹', '2021-11-10 03:44:10'),
(8,4,'ZJH','真棒','2021-11-10 03:44:10'),
(9, 4, 'XZ', '干的漂亮！', '2021-11-30 10:23:14'),
(10, 5, 'SQ', '写的挺好的，奥利给！', '2021-11-30 23:39:09'),
(11, 5, 'ZJH', '这是第二篇文章的第一条留言', '2021-11-20 23:40:12'),
(12, 6, 'ZWH', '6666666666666！', '2021-11-30 00:05:49'),
(13, 6, 'SQ', '第n次测试', '2021-12-01 04:07:06'),
(14, 7, 'XZ', '第n+1次测试', '2021-11-12 04:13:15'),
(15, 7, 'XZ', '留下我的足迹', '2021-12-11 03:44:10'),
(16,8,'ZJH','真棒','2021-11-10 03:44:10');


-- 图片表 pictures

CREATE TABLE `pictures`(
    `id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
    `picname` varchar(30) NOT NULL ,
    `likeness` int(11) NOT NULL ,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pictures` (`id`, `picname`,`likeness`) VALUES
(1,'天空之城',0),
(2,'秘境',0),
(3,'城堡乐园',0);

-- 好友表
CREATE TABLE `friends`(
    `id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
    `name` varchar(50) NOT NULL ,
    `fname` varchar(50) NOT NULL ,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


REPLACE INTO `friends`(`id`,`name`,`fname`) VALUES
    (1,'ZJH','ZWH'),
    (2,'ZJH','ZZX'),
    (3,'ZWH','ZJH'),
    (4,'ZWH','ZZX'),
    (5,'ZZX','ZJH'),
    (6,'ZZX','ZWH');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
