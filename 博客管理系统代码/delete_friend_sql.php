<?php
// 处理用户登录页面
require "dbConfig.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);

//1.取提交的数据
@session_start();
$delete_friend = $_POST["friend_name"];         // 删除用户姓名
$user_name = $_SESSION["user_name"];

$delete_friend_sql = "delete  from friends where name = '$user_name' and fname = '$delete_friend';";
$delete_friend_res = mysqli_query($link,$delete_friend_sql);

if ($delete_friend_res>0) {                  // 用户朋友已删除
    @session_start();
    unset($_SESSION["delete_friend"]);

    echo "<script type='text/javascript'>";
    echo "alert('朋友关系已解除');";
    echo "location.href='manager_friend.php';";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('解除失败，请重新解除');";
    echo "location.href='manager_friend.php';";
    echo "</script>";
}

mysqli_close($link);
?>
