<?php
require "dbConfig.php";
require "./header.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);

@session_start();
$friends_name = $friends["fname"];

$sql = "select * from comment where username = '$friends_name'";
$result = mysqli_query($link,$sql);
$num_comment = mysqli_num_rows($result);
$friends_comment = mysqli_fetch_array($result);
?>

<div class="main-main">
    <div class="new-blog">
        <div class="inner-new">
            好友名字：<?php echo $friends["fname"]."<br>"; ?>
            好友评论数量：<?php echo $num_comment."<br>"; ?>
            <?php
            echo $friends_comment;
            ?>

            <form>
                是否删除好友 <input type="radio" name="delete_friend" value="YES">YES<br>
            </form>
        </div>
    </div>
<div class="bottom"></div>
</div>

