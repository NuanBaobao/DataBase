<?php
    require "./dbConfig.php";
    require "./login_session_check.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // 编码设置
    mysqli_set_charset('utf8',$link);

    $friend_name = $_POST['friend_name'];
    $username = $_SESSION['user_name'];

    $judge_friend_exit_sql = "SELECT * FROM friends where name='$username' and fname='$friend_name';";
    $check_res = mysqli_query($link,$judge_friend_exit_sql);
    $row_friend = mysqli_num_rows($check_res);

if ($row_friend>0) {                  // 用户已添加好友
    echo "<script type='text/javascript'>";
    echo "alert('该用户已添加好友');";
    echo "location.href='main.php';";
    echo "</script>";
}
else {

    $add_friend_sql = "INSERT INTO friends (id, name, fname)
         VALUES (NULL, '" . $username . "', '" . $friend_name . "')";

    $res_add_friend = mysqli_query($link, $add_friend_sql);
    if ($res_add_friend > 0) {
        echo "<script type='text/javascript'>";
        echo "type='text/javascript'>";
        echo "alert('添加好友成功');";
        echo "location.href='./blog_article.php';";
        echo "</script>";
        exit();

    } else {
        echo "<script type='text/javascript'>";
        echo "type='text/javascript'>";
        echo "alert('添加好友失败');";
        echo "location.href='./article.php';";
        echo "</script>";
        exit();
    }
}

mysqli_close($link);
?>
