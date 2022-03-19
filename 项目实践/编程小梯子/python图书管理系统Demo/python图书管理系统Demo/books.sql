/*
-- Query: SELECT * FROM books.books
LIMIT 0, 1000

-- Date: 2019-11-11 18:33
*/
CREATE DATABASE  IF NOT EXISTS `books` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `books`;

CREATE TABLE `books` (
  `isbn` varchar(15) NOT NULL DEFAULT '',
  `name` varchar(20) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `publisher` varchar(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787040396911','高等数学习题全解指南（上册）同济 第七版','同济数学系','高等教育出版社',27.3);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787111213826','Java编程思想（第4版)','Bruce Eckel','机械工业出版社',54);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787111547426','Java核心技术 卷I：基础知识','凯 S.霍斯特曼','机械工业出版社',59.5);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787115279460','C++ Primer Plus(第6版)','Stephen Prata','人民邮电出版社',46.1);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787115422699','Python编程快速上手','Al Sweigart 斯维加特','人民邮电出版社',32.1);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787115461476','深度学习','Ian Goodfellow','人民邮电出版社',78.1);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787201094014','浮生六记','沈复','天津人民出版社',16);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787208061644','追风筝的人','卡勒德·胡赛尼','上海人民出版社',14.5);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787302517597','Java从入门到精通（第5版）','明日科技','清华大学出版社',33.2);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787512355309','Python编程（第四版)','Mark Lutz','中国电力出版社',80.5);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787517068235','PHP从零基础到项目实战','未来科技','水利水电出版社',42.7);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787544270878','解忧杂货店','东野圭吾 ','南海出版社',19.7);
INSERT INTO `books` (`isbn`,`name`,`author`,`publisher`,`price`) VALUES ('9787544276986','你当像鸟飞往你的山','塔拉 · 韦斯特弗','南海出版社',29.5);
