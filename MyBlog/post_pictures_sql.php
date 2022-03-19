<?php
// 处理用户登录页面
require "dbConfig.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);

//1.取提交的数据
@session_start();
$picture_name = $_POST["picture_name"];         // 照片
//echo $picture_name;

$add_likeness_sql = "update pictures 
            set likeness = (likeness + 1)
            where picname = '$picture_name';";
$add_likeness_res = mysqli_query($link,$add_likeness_sql);

if ($add_likeness_res>0) {                  //

    echo "<script type='text/javascript'>";
    echo "alert('点击成功');";
    echo "location.href='post_pictures.php';";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('点击失败');";
    echo "location.href='post_pictures.php';";
    echo "</script>";
}

mysqli_close($link);
//?>
