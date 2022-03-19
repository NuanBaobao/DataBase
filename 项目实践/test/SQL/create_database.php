<?php
const HOST = 'localhost';
const USER = 'root';
const PASS = '130727';
const DBNAME = 'myblog';

if ($conn=mysqli_connect(HOST,USER,PASS,DBNAME)) {
    mysqli_query($conn,"set names utf8");
    echo ("Login successful");
}
else {
    echo ("Database connection failed");
}

