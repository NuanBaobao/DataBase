
<?php
    // �������Ӳ�����ҳ��
    require "dbConfig.php";
    // ����mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    // ��������
    mysqli_set_charset('utf8',$link);
    
    // ��ȡ���ӵ�ͼ��
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    
    
    // ��������
    $sql = "INSERT INTO books VALUES ('$isbn', '$title', '$author','$publisher')";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header("Location:books.php");
?>
