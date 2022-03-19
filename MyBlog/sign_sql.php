<?php
    // 处理用户登录页面
    require "dbConfig.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // 编码设置
    mysqli_set_charset('utf8',$link);

    //1.取提交的数据
    $name = $_POST["user_name"];         // 用户姓名

    $check_sql = "select * from adminuser where regname = '$name';";
    $check_res = mysqli_query($link,$check_sql);
    $row_user = mysqli_num_rows($check_res);

    if ($row_user>0) {                  // 用户已注册
        echo "<script type='text/javascript'>";
        echo "alert('用户名已存在');";
        echo "location.href='sign.php';";
        echo "</script>";
    }

    $email = $_POST['user_email'];      // 用户邮箱
    $pwd = $_POST['user_pwd'];          // 用户密码
    $repwd = $_POST['reuser_pwd'];      // 用户确认密码
    $sex = $_POST['user_sex'];          // 用户性别
    $qq = $_POST['user_qq'];            // 用户QQ

    if ($pwd <> $repwd) {               // 用户两次密码不一致
        echo "<script type='text/javascript'>";
        echo "alert('两次输入密码不一致！');";
        echo "location.href='sign.php';";
        echo "</script>";
    }

    // 插入数据
    $sign_sql = "INSERT INTO adminuser (regname, regpwd, regqq, regemail, regsex, islock, fig)
         VALUES ('$name', '$pwd', '$qq', '$email', '$sex', 0, 0);";

    $sign = mysqli_query($link,$sign_sql);
    if($sign) {
        echo "<script type='text/javascript'>";
        echo "alert('注册成功');";
        echo "location.href='login.php';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('注册失败');";
        echo "location.href='sign.php';";
        echo "</script>";
    }
    mysqli_close($link);
?>
