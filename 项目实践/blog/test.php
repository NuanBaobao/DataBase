<?php

include("./sql_conn/conn.php");
//require("./header.php");

$sql = "select * from article";
$result = mysqli_query($conn, $sql);
$res_num = mysqli_num_rows($result);
//echo $res_num;
@$list = intval($_GET["list"]);
echo $list;