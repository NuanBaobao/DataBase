<!--针对超级管理员管理所有用户-->
<head>
    <link rel="stylesheet" type="text/css" href="./css/manager_user.css">
</head>
<?php
require "dbConfig.php";
require "login_session_check.php";
require "./header.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);
$user_name = $_SESSION["user_name"]; // 超级管理员姓名

$get_users_sql = "select * from adminuser";
$res_users = mysqli_query($link,$get_users_sql);
$num_users = mysqli_num_rows($res_users); // 用户数量
?>
<div class="user_title">
        <h2><?php echo "共有".$num_users."名用户注册账户"."<br/>"; ?></h2>
</div>

<?php
while ($user=mysqli_fetch_array($res_users)) { // 找出所有注册用户
    ?>
    <div class="users_bg">
        <div class="users_ino">
            <div class="one_user_ino">
                <div class="base_ino">
                <?php echo $user["regname"]." ".$user["regqq"]." ".$user["regmail"]." ".$user["regsex"]."<br/>"; ?>
                </div>

                <div class="user_article">
                    <h3> <?php echo $user_name."的详细情况"; ?> </h3>
                    <?php
                    $user_name = $user["regname"]; // 用户姓名
                    $get_user_articles_sql = "select * from article where author = '$user_name'";
                    $res_user_articles = mysqli_query($link,$get_user_articles_sql);
                    $num_user_articles = mysqli_num_rows($res_user_articles); // 该用户发表的文章数目
                    ?>
                    <div class="article_ino">
                        <?php echo $user_name."共发表了".$num_user_articles."篇文章<br/>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

