<?php
// 处理用户登录页面
require "dbConfig.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);

//1.取提交的数据
$user_name = $_POST["user_name"]; // 删除用户姓名

$delete_user_sql = "delete  from adminuser where regname = '$user_name' and fig = 0;"; // 删除用户
$delete_user_res = mysqli_query($link,$delete_user_sql);

if ($delete_user_res > 0) {                  // 用户已删除
    echo "<script type='text/javascript'>";
    echo "alert('已删除用户');";
    echo "location.href='manager_user.php';";
    echo "</script>";
//
//    $delete_article_sql = "delete from article where author='$user_name';";  // 删除用户博文
//    if(mysqli_query($link,$delete_article_sql)> 0) {
//        echo "<script type='text/javascript'>";
//        echo "alert('已删除用户博文');";
//        echo "location.href='manager_user.php';";
//        echo "</script>";
//    }
//    else{
//        echo "<script type='text/javascript'>";
//        echo "alert('删除用户博文失败');";
//        echo "location.href='manager_user.php';";
//        echo "</script>";
//    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('删除用户失败');";
    echo "location.href='manager_user.php';";
    echo "</script>";
}

mysqli_close($link);
?>
