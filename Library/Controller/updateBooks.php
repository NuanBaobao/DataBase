<?php
    // ���ñ���
    header("content-type:text/html;charset=utf-8");
    // ����������Ϣ
    require "dbConfig.php";
    // ����mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    
    // ��ȡ�޸ĵ���Ϣ
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    // ��������
    $sql = "UPDATE books SET isbn='$isbn', title='$title', author='$author', publisher='$publisher'
             where isbn = '{$isbn}'";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header("Location:books.php");
