<?php
@session_start();
if (!empty($_SESSION["user_name"])) {
    header("Location:./index.php");
    exit();
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>博客登录</title>
    <link href="./css/login.css" rel='stylesheet' type='text/css' media="all">
</head>
<body >
<div class="bg">
    <div class = "blog">
        <img src="../images/sdu3.png">
    </div>
    <div class = "login">
        <h1> 博客登录 </h1>
        <form name="login form"  action="./login_sql.php" method="POST"> <!--登陆后修改数据库内容-->
            <p>
<!--                <label for="user_login">用户名</label>-->
                <input type="text" name="user_name" id="user_login" class="input" value="" size="20" required="required"  placeholder="用户名"/>

<!--                <label for="user_pass">密码</label>-->
                <input type="password" name="user_pwd" id="user_pass" class="input" value="" size="20" required="required"  placeholder="密码"/>
            </p>

            <p class="submit">
                <input type="submit" name="submit"  class="button button-primary " value="登录" /> <!--登陆界面-->
            </p>
        </form>
        <div class = "footer">
            <p class="nav"><a href="#">忘记密码？</a></p> <!--触法相应处理机制，此处先用本地页面代替 -->
            <p class="backsign"><a href="./sign.php"> &larr; 注册账号</a></p> <!-- 触发注册账号界面 -->
        </div>
    </div>
</div>
</body>
</html>
<?php require("./footer.php"); ?>