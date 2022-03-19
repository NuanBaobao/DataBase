 <!DOCTYPE html>
 <html>
 <head>
    <link rel='stylesheet' type='text/css' href='./css/comment.css'>
 </head>
    <div id="comment" class="bg_comment">
        <?php 
            if (empty($article_info)) {
                header("Location:./front_page.php");
                exit();
            }
         ?>

        <?php
            require "dbConfig.php";
            // 连接mysql
            $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
            // 编码设置
            mysqli_set_charset('utf8',$link);

            $fileid = $article_info['id']; // 针对博文id
            // 获取相关评论
            $comment_sql = "select * from comment where fileid = $fileid order by comtime desc ";
            $res_comment = mysqli_query($link,$comment_sql);
            
            echo "<div class='comment'>";
            echo "<h2>评论区</h2>";
            include("./send_comment.php");
            while ($comment_row = mysqli_fetch_array($res_comment)) {
            ?>
            <div class="comment_info">
                <p><?php echo " ".$comment_row['username']."：".$comment_row['content']." "; ?>
                    <a id="time"><?php echo mb_substr($comment_row['comtime'],0,10,'UTF-8') ; ?></a>
                </p>
            </div>

         <?php
            }
            echo "</div>";
            
        ?>
    </div>
 </html>
