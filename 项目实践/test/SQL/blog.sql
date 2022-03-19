-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-06-23 16:47:24
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 数据库： `blog`

-- 进入数据库
-- 创建用户表t_user
CREATE TABLE IF NOT EXISTS t_user
(
    id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(50),
    real_name varchar(50),
    pwd varchar(10),
    mail varchar(50),
    sex varchar(6)
);


-- 创建博文表t_article
CREATE TABLE IF NOT EXISTS t_article
(
    aid int(20) UNSIGNED AUTO_INCREMENT,
    user_id int(50) not null ,
    user_name varchar(50),
    content text,
    title varchar(50),
    time datetime,
    PRIMARY KEY (aid)
);

-- 创建评论表t_comment
CREATE TABLE IF NOT EXISTS t_comment
(
    id int(20)  UNSIGNED AUTO_INCREMENT,
    user_id int(20) not null ,
    article_id int(20) not null ,
    user_name varchar(50),
    content text,
    time datetime,
    PRIMARY KEY (id)
);

-- 创建图片表t_pic
CREATE TABLE IF NOT EXISTS t_pic
(
    id int(10) UNSIGNED AUTO_INCREMENT,
    pic_name varchar(30),
    user varchar(50),
    time datetime,
    PRIMARY KEY (id)
);


-- 创建好友表t_friend
CREATE TABLE IF NOT EXISTS t_friend
(
    id int(10) UNSIGNED AUTO_INCREMENT,
    name varchar(30),
    bir date,
    address varchar(50),
    friend_id int(10),
    PRIMARY KEY (id)
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

