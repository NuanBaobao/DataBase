<?php
    // 处理删除操作的页面
    require "dbconfig.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    mysqli_set_charset('utf8',$link);
    // 获取传递的isbn
    $isbn = $_GET['isbn'];
    $sql = "DELETE FROM books where isbn = {$isbn}";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header("Location:books.php");
?>