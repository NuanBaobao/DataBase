<?php
    // 设置编码
    header("content-type:text/html;charset=utf-8");
    // 引入配置信息
    require "dbConfig.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    
    // 获取修改的信息
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    // 更新数据
    $sql = "UPDATE books SET isbn='$isbn', title='$title', author='$author', publisher='$publisher'
             where isbn = '{$isbn}'";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header("Location:books.php");
