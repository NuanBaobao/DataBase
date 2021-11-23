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
(1, 3, 'PHP简介', '您应当具备的基础知识\r\n在继续学习之前，您需要对以下知识有基本的了解：\r\n\r\nHTML\r\nCSS\r\n如果您希望首先学习这些项目，请在我们的 首页 访问这些教程。\r\n\r\nPHP 是什么？\r\nPHP（全称：PHP：Hypertext Preprocessor，即\"PHP：超文本预处理器\"）是一种通用开源脚本语言。\r\nPHP 脚本在服务器上执行。\r\nPHP 可免费下载使用。\r\nlamp	PHP 对初学者而言简单易学。\r\n\r\nPHP 也为专业的程序员提供了许多先进的功能。\r\n\r\nPHP 文件是什么？\r\nPHP 文件可包含文本、HTML、JavaScript代码和 PHP 代码\r\nPHP 代码在服务器上执行，结果以纯 HTML 形式返回给浏览器\r\nPHP 文件的默认文件扩展名是 \".php\"\r\nPHP 能做什么？\r\nPHP 可以生成动态页面内容\r\nPHP 可以创建、打开、读取、写入、关闭服务器上的文件\r\nPHP 可以收集表单数据\r\nPHP 可以发送和接收 cookies\r\nPHP 可以添加、删除、修改您的数据库中的数据\r\nPHP 可以限制用户访问您的网站上的一些页面\r\nPHP 可以加密数据\r\n通过 PHP，您不再限于输出 HTML。您可以输出图像、PDF 文件，甚至 Flash 电影。您还可以输出任意的文本，比如 XHTML 和 XML。\r\n\r\n为什么使用 PHP？\r\nPHP 可在不同的平台上运行（Windows、Linux、Unix、Mac OS X 等）\r\nPHP 与目前几乎所有的正在被使用的服务器相兼容（Apache、IIS 等）\r\nPHP 提供了广泛的数据库支持\r\nPHP 是免费的，可从官方的 PHP 资源下载它： www.php.net\r\nPHP 易于学习，并可高效地运行在服务器端。', 'zjh', '2021-11-19 13:45:59'),
(2, 1, 'SQL语言简介', 'SQL 是一门 ANSI 的标准计算机语言，用来访问和操作数据库系统。SQL 语句用于取回和更新数据库中的数据。SQL 可与数据库程序协同工作，比如 MS Access、DB2、Informix、MS SQL Server、Oracle、Sybase 以及其他数据库系统。\r\n\r\n不幸地是，存在着很多不同版本的 SQL 语言，但是为了与 ANSI 标准相兼容，它们必须以相似的方式共同地来支持一些主要的关键词（比如 SELECT、UPDATE、DELETE、INSERT、WHERE 等等）。\r\n\r\n注释：除了 SQL 标准之外，大部分 SQL 数据库程序都拥有它们自己的私有扩展！', 'yyc', '2021-11-19 14:45:59'),
(3, 1, 'HTML简介','HTML的全称为超文本标记语言，是一种标记语言。\n它包括一系列标签．通过这些标签可以将网络上的文档格式统一，使分散的Internet资源连接为一个逻辑整体。HTML文本是由HTML命令组成的描述性文本，HTML命令可以说明文字，图形、动画、声音、表格、链接等', 'zwh', '2021-11-19 16:45:59');


-- 博文类型表 article_type

CREATE TABLE `article_type` (
  `type_id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
  `type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 插入数据 article_type

INSERT INTO `article_type` (`type_id`, `type_name`) VALUES
(1, 'MySQL'),
(2, 'HTML'),
(3, 'PHP');

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

# INSERT INTO `comment` (`id`, `fileid`, `username`, `content`, `comtime`) VALUES
# (1, 1, 'zjh', '干的漂亮！', '2021-11-17 10:23:14'),
# (2, 1, 'zwh', '写的挺好的，奥利给！', '2021-11-18 23:39:09'),
# (3, 2, 'yyc', '这是第二篇文章的第一条留言', '2021-11-20 23:40:12'),
# (4, 1, 'zjh', '6666666666666！', '22021-11-17 00:05:49'),
# (5, 3, 'sq', '第n次测试', '2021-11-13 04:07:06'),
# (6, 3, 'lbgj', '第n+1次测试', '2021-11-12 04:13:15'),
# (7, 1, 'lyj', '留下我的足迹', '2021-11-10 03:44:10');

-- 图片表 pictures

CREATE TABLE `pictures`(
    `id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
    `picname` varchar(30) NOT NULL ,
    `user` varchar(50) NOT NULL ,
    `time` datetime NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;;

-- 好友表
CREATE TABLE `friends`(
    `id` int(11) UNSIGNED AUTO_INCREMENT  NOT NULL,
    `fid` int(10) NOT NULL ,
    `fname` varchar(50) NOT NULL ,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;;


-- notice
CREATE TABLE `notice` (
                          `notice_id` int(11)UNSIGNED AUTO_INCREMENT  NOT NULL,
                          `notice_content` text NOT NULL,
                          `notice_author` varchar(20) NOT NULL,
                          `notice_time` datetime NOT NULL,
                          PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
