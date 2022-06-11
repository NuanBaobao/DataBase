<?php 
    @session_start();
    if (empty($_SESSION["user_name"])) {
        echo "<script type='text/javascript'>";
        echo "alert('您还没有登录，请先登录');";
        echo "window.location.href='login.php';"; // 用户登陆界面
        echo "</script>";
    }
    ?>
