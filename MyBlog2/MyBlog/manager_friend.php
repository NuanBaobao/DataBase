<head>
    <link rel="stylesheet" type="text/css" href="./css/manager_friend.css">
</head>

<?php
require "dbConfig.php";
require "login_session_check.php";
require "./header.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);
$user_name = $_SESSION["user_name"]; // 用户姓名

$get_friends_sql = "select * from friends where name = '$user_name'";
$res_friend = mysqli_query($link,$get_friends_sql);
$num_friends = mysqli_num_rows($res_friend); // 好友数量

while ($friend=mysqli_fetch_array($res_friend)) { // 找出用户的所有朋友
?>
<div class="friend_bg">
    <div class="friend_ino">
        <div class="one_friend">
            <?php
            $friend_name = $friend["fname"]; // 朋友名字
//            @session_start();
//            $_SESSION["delete_friend"] = $friend_name;
            // 该好友关于用户相关文章的评论内容
            $get_comment_sql = "select * from comment where username = '$friend_name' and fileid in (select id from article where author = '$user_name')";
            $res_comment = mysqli_query($link,$get_comment_sql);
            $num_comment = mysqli_num_rows($res_comment); // 相关评论数量
            ?>
            <div class="comment_title">
                <p>
                    <?php echo $friend_name."的评论专区,共".$num_comment."条评论<br>"; ?>
                </p>
            </div>

            <?php
            while($friend_comment = mysqli_fetch_array($res_comment)){ // 评论内容
                $file_id = $friend_comment["fileid"]; // 评论针对的博文

                $get_title_sql = "select * from  article where id = '$file_id'"; // 找出博文title
                $res_title = mysqli_query($link,$get_title_sql);
                $title = mysqli_fetch_array($res_title);
                ?>
               <div class="comment_ino">
                       <p><a href='./blog_article.php?blog_id=<?php echo $file_id;?>' >
                       <?php echo $title['title'] ?>
                        </a>
                       <?php echo " : ".$friend_comment["content"]."  ---  ".mb_substr($friend_comment['comtime'],0,10,'UTF-8'); ?></p>
               </div>
           <?php } ?>
            <div class="delete_friend">
                <form name="friend"  action="./delete_friend_sql.php" method="POST"> <!--删除好友-->
                    <input type="submit" name="submit"  class="button" value="删除好友" />
                    <input type="text" name="friend_name"  class="input" value="" size="20" required="required"  placeholder='<?php echo $friend_name;?>' />
                </form>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php
require "./footer.php"?>

