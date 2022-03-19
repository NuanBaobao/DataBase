<?php
    // 处理用户发布博文页面
    require("./login_session_check.php");
    require "dbConfig.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // 编码设置
    mysqli_set_charset('utf8',$link);

    @session_start();
    $title = $_POST['title'];
    $type_id = strval($_POST['type_id']);
    $content = $_POST['content'];
    $author = $_SESSION['user_name'];
    $pubtime=date("Y-m-d H:i:s");

    $sql = "INSERT INTO article (id, type_id, title, content, author, pubtime)
    VALUES (NULL, '".$type_id."', '".$title."', '".$content."', '".$author."', '".$pubtime."');";


    $res = mysqli_query($link,$sql);
    if ($res>0) {
        echo "<script  type='text/javascript'>";
        echo "alert('文章发表成功');";
        echo "location.href='./user_center.php';";
        echo "</script>";
        exit();
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('文章发表失败');";
        echo "location.href='./post_article.php';"; 
        echo "</script>";
        exit();
    }

 ?> 
