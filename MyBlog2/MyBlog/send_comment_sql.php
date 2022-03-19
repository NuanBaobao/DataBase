<?php
    if (!empty($_SESSION['fileid']) ) {
            header("Location:./front_page.php");
            exit();
        }
    else{
        include("./dbConfig.php");
        include("./login_session_check.php");
        // 连接mysql
        $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
        // 编码设置
        mysqli_set_charset('utf8',$link);

        $content = $_POST['message'];
        $username = $_SESSION['user_name'];
        if (empty($_SESSION['fileid'])) {
            header("Location:./front_page.php");
            exit();
        }
        $fileid = intval($_SESSION['fileid']);
        $comtime = date('Y-m-d h:i:s', time());


        $comment_sql = "INSERT INTO comment (id, fileid, username, content, comtime)
         VALUES (NULL, '".$fileid."', '".$username."', '".$content."', '".$comtime."')";

        $res = mysqli_query($link,$comment_sql);
        if ($res>0) {
            echo "<script type='text/javascript'>";
            echo "type='text/javascript'>";
            echo "alert('留言成功');";
            echo "location.href='./main.php';";
            echo "</script>";
            exit();

        }
        else{
            echo "<script type='text/javascript'>";
            echo "type='text/javascript'>";
            echo "alert('留言失败');";
            echo "location.href='./blog_article.php?blog_id=".$fileid."#comments';";
            echo "</script>";
            exit();
        }
    }
    @session_start();
    unset($_SESSION["fileid"]);
    mysqli_close($link);
 ?>
