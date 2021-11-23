<?php
require("./header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="./css/sign.css">
</head>
<div class="user_information">
    <div class="appointment">
        <form action="./sign_sql.php" method="POST"> <!--接受表单变量的值，执行sign_sql.php完成相应的sql操作-->
            <div class="main">
                <div class="form-left">
<!--                    <label for = "name">账号</label>-->
                    <input type="text"  name="user_name" id="name" placeholder="账号" required="required" autocapitalize="off"> <!--标记标签变量值 -->
                </div>
                <div class="form-right">
<!--                    <label for="email">邮 箱</label>-->
                    <input type="email" name="user_email" id="email"  placeholder="邮箱" required="required" autocapitalize="off">
                </div>
            </div>

            <div class="main">
                <div class="form-left">
<!--                    <label for="user_pass">输 入 密 码</label>-->
                    <input type="password" name="user_pwd" id="user_pass"  class="input" placeholder="输入密码" required="required" autocapitalize="off">
                </div>
                <div class="form-right ">
<!--                    <label for="user_pass">确 认 密 码</label>-->
                    <input type="password" name="reuser_pwd" id="reuser_pass" class="input" placeholder="确认密码" required="required" autocapitalize="off">
                </div>
            </div>

            <div class="main">
                <div class="form-left">
<!--                    <label for="sex">性 别</label>-->
                    <input type="text" name="user_sex" class="input" id="sex" placeholder="性别" required="required" autocapitalize="off">
                </div>
                <div class="form-right ">
<!--                    <label for="qq">Q Q</label>-->
                    <input class="bottom" type="number" id="qq" name="user_qq" placeholder="QQ" required="required" autocapitalize="off">
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="btnn">
                <input type="submit" name="sign" value="注册">
            </div>
        </form>
    </div>
</div>
<?php require( "./footer.php"); ?> <!-- 页脚 -->
</html>
