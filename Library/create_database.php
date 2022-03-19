<?php
// 设置编码
header("content-type:text/html;charset=utf-8");
// 引入配置信息
require "my_config.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS) or die("ERROR: CANNOT CONNECT TO DATABASE!");

$sql = "CREATE DATABASE user";
if(mysqli_query($link, $sql))
{
    echo "DataBase user has been created!"."<br />";
}
mysqli_select_db($link, "user");
$sql = "CREATE TABLE Persons
(
    sid varchar(10) not null ,
    sname varchar(10) not null ,
    course varchar(10),
    score float 
)";

if(mysqli_query($link, $sql))
{
    echo "Table Persons has been created!<br />";
}
