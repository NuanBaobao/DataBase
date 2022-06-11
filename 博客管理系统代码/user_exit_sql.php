<?php
    // 处理用户退出页面
    require "dbConfig.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // 编码设置
    mysqli_set_charset('utf8',$link);

    @session_start();
    // 取提交的数据
    $name = $_SESSION["user_name"];                        // 用户姓名

    $sql = "update adminuser 
            set islock = 0                              
            where regname = '$name';";

    if(mysqli_query($link,$sql)){

        unset($_SESSION["user_name"]);
        echo "<script type='text/javascript'>";
        echo "location.href='login.php';";
        echo "alert('退出成功');";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('退出失败');";
        echo "</script>";
    }

    mysqli_close($link);


