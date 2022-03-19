
<?php
    // 处理增加操作的页面
    require "dbConfig.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // 编码设置
    mysqli_set_charset('utf8',$link);
    
    // 获取增加的图书
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    
    
    // 插入数据
    $sql = "INSERT INTO books VALUES ('$isbn', '$title', '$author','$publisher')";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header("Location:books.php");
?>
