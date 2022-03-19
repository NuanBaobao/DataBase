<?php
// 展现用户发布博文页面
require "dbConfig.php";
require("./header.php");

    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // 编码设置
    mysqli_set_charset('utf8',$link);

    $get_all_sql = "select * from article";         // 选择所有的博文
    $res_articles = mysqli_query($link,$get_all_sql);
    $num_article = mysqli_num_rows($res_articles);

    $blog_id = intval($_GET["blog_id"]);          // 查看博文id
    if (empty($blog_id) || $blog_id > $num_article) {
    header("location:./blog_article.php?blog_id=1");
    exit();
    }

    $get_one_sql = "select * from article where id = $blog_id "; // 获取文章
    $res_one_article = mysqli_query($link,$get_one_sql);
    $article_info = mysqli_fetch_array($res_one_article);
    $blog_author = $article_info["author"]; // 文章作者
?>
<!DOCTYPE html>
<html>
<head>
    <title>文章内容</title>
    <link rel="stylesheet" type="text/css" href="./css/blog_article.css">
</head>
<div class="bg">
    <div class="bloginfo">
        <div class="article_title">
            <h2><?php echo $article_info['title']; ?></h2>
            <div class="author_time">
                <?php
                echo '<a>发布时间：'.$article_info['pubtime'].'</a>';
                echo '<a>作者：'.$article_info["author"].'</a>';
                ?>
            </div>
            <p><?php echo $article_info['content']; ?></p>
            <div class="add_friend">
                <form name="friend"  action="./add_friend_sql.php" method="POST"> <!--添加好友-->
                    <input type="submit" name="submit"  class="button" value="添加好友" />
                    <input type="text" name="friend_name"  class="input" value="" size="20" required="required"  placeholder='<?php echo $blog_author;?>' />
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("./comment.php") ?>
<?php require("./footer.php"); ?>
</html>
