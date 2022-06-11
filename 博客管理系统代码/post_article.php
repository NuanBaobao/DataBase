<?php 
    require("./login_session_check.php");
    require("./header.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <title>博文发布</title>
     <link rel="stylesheet" type="text/css" href="./css/post_article.css">
 </head>
     <div class="post_bg">
        <div class="post_fix"></div>
        <div class="post_art_main">
            <h2>博文发布</h2>
            <div class="post_form">
                <form action="./post_article_sql.php" method="post" >
                    <div class="province">
                        <select name="type_id" >
                            <option value="1" selected="selected">MySQL</option>
                            <option value="2">HTML</option>
                            <option value="3">PHP</option>
                        </select>
                    </div>
                    <input placeholder="文章标题" required="required" type="text" name="title"><br/>
                    <textarea placeholder="来吧展示" required="required" name="content"></textarea>
                    <div class="btnn">
                        <input type="submit" name="submit" value="发布">
                    </div>
                </form> 
            </div>
        </div>
        <div class="post_fix"></div>
    </div>
    <?php require("./footer.php"); ?>
 </html>
