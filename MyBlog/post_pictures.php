<?php
require "dbConfig.php";
require "header.php";
// 连接mysql
$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
// 编码设置
mysqli_set_charset('utf8',$link);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/pictures.css">
</head>

<div class="bg">
    <div class="pictures">
        <form action="./post_pictures_sql.php" method="POST" >
            <div class="picture">
                <h5>天空之城</h5>
                <img src="./images/1.png" height="90%;">
                <div class="btnn">
                    <?php
                    $get_likeness_sql = "select * from pictures where picname='天空之城';";
                    $get_likeness_res = mysqli_query($link,$get_likeness_sql);
                    $likeness = mysqli_fetch_array($get_likeness_res);
                    ?>
                    <input type="submit" name="submit" value="<?php echo $likeness['likeness'];?>" >
                    <input type="text" name="picture_name"  class="input" value="" size="20" required="required"  placeholder='天空之城'/>
                </div>
            </div>
        </form>
        <form action="./post_pictures_sql.php" method="POST" >
            <div class="picture">
                <h5>秘境</h5>
                <img src="./images/2.png" height="90%;">
                <div class="btnn">
                    <?php
                    $get_likeness_sql = "select * from pictures where picname='秘境';";
                    $get_likeness_res = mysqli_query($link,$get_likeness_sql);
                    $likeness = mysqli_fetch_array($get_likeness_res);
                    ?>
                    <input type="submit" name="submit" value="<?php echo $likeness['likeness'];?>">
                    <input type="text" name="picture_name"  class="input" value="" size="20" required="required"  placeholder='秘境'/>
                </div>
            </div>
        </form>
        <form action="./post_pictures_sql.php" method="POST" >
            <div class="picture">
                <h5>城堡乐园</h5>
                <img src="./images/3.png" height="90%;">
                <div class="btnn">
                    <?php
                    $get_likeness_sql = "select * from pictures where picname='城堡乐园';";
                    $get_likeness_res = mysqli_query($link,$get_likeness_sql);
                    $likeness = mysqli_fetch_array($get_likeness_res);
                    ?>
                    <input type="submit" name="submit" value="<?php echo $likeness['likeness'];?>">
                    <input type="text" name="picture_name"  class="input" value="" size="20" required="required"  placeholder='城堡乐园'/>
                </div>
            </div>
        </form>
    </div>
</div>
</html>
