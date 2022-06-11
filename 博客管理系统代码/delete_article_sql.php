<?php
// 处理用户登录页面
require "dbConfig.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);

//1.取提交的数据
@session_start();
$delete_article = $_POST['title'];

$delete_article_sql = "delete from article where title='$delete_article';"; // 删除博文信息
$delete_article_res = mysqli_query($link,$delete_article_sql);

if ($delete_article_res>0) {                  // 用户朋友已删除
    $delete_comments_sql = "delete from comment where fileid=(select id from article where title='$delete_article');"; // 删除评论信息
    if(mysqli_query($link,$delete_comments_sql) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('博文信息已删除');";
        echo "location.href='manager_user.php';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('删除评论信息失败');";
        echo "location.href='manager_user.php';";
        echo "</script>";
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('删除失败，请重新删除');";
    echo "location.href='manager_user.php';";
    echo "</script>";
}

mysqli_close($link);
?>
