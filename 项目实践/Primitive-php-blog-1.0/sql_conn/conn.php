<?php 
    define('HOST','localhost');
    define('USER','root');
    define('PASS','130727');
    define('DBNAME','test_blog');

    if ($conn=mysqli_connect(HOST,USER,PASS,DBNAME)) {
        mysqli_query($conn,"set names utf8");
        // echo ("Login successful");
    }
    else {
     echo ("Database connection failed");
    }
 ?> 
