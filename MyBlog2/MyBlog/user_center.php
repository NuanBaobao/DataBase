<?php
    // 处理用户中心页面
    require("./login_session_check.php");
    require("./dbConfig.php");
    require("./header.php");
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // 编码设置
    mysqli_set_charset('utf8',$link);
    @session_start();
    $name = $_SESSION['user_name'];

    $sql = "select * from adminuser where regname = '$name' and fig = 1";
    $result = mysqli_query($link,$sql);
    $admin = mysqli_num_rows($result);

    mysqli_free_result($result);
    mysqli_close($link);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <title>个人中心</title>
     <link rel="stylesheet" type="text/css" href="./css/user_center.css">
 </head>
    <div class="user_center">
        <div class="big_menu">
            <a href="./post_article.php">
                <div class="center_menu">
                <h3>发布博文<br><br><img src="./images/14.png" alt="发布博文" width='100'></h3></div>
            </a>
            <a href="./post_pictures.php"><div class="center_menu">
                <h3>图片上传<br><br><img src="./images/18.png" alt="图片上传" width='100'></h3></div>
            </a>
            <a href="./manager_friend.php"><div class="center_menu">
                <h3>好友管理<br><br><img src="./images/16.png" alt="好友管理" width='100'></h3></div>
            </a>
            <?php
                if ($admin > 0 ) { // 超级管理员
                    echo "<a href='./manager_user.php'><div class='center_menu'>
                    <h3>管理用户<br><br><img src='images/13.png' alt='管理用户' width='100'></h3></div>
                    </a>";
                }
             ?>
            <a href="./blog_article.php"><div class="center_menu">
                    <h3>博文浏览<br><br><img src="./images/17.png" alt="博文浏览" width='100'></h3></div>
            </a>
            <a href="./user_exit_sql.php"><div class="center_menu">
                <h3>退出登录<br><br><img src="./images/12.png" alt="退出登录" width='100'></h3></div>
            </a>
        </div>
    </div>
    <?php require("./footer.php"); ?>
 </html>


