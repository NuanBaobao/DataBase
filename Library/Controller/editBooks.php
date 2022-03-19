 <?php
    // 设置编码
    header("content-type:text/html;charset=utf-8");
    // 引入配置信息
    require "dbConfig.php";
    // 连接mysql
    $link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
    
    // 获取传递的isbn,并显示原先的值
    $isbn = $_GET['isbn'];
    $sql = mysqli_query($link, "SELECT * FROM books WHERE isbn={$isbn}");
    $old = mysqli_fetch_assoc($sql); 
    echo '
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Library Manage System</title>
        </head>
        <style type="text/css">
        .wrapper {width: 1000px;margin: 20px auto;}
        h2 {text-align: center;}
        .add {margin-bottom: 20px;}
        .add a {text-decoration: none;color: #fff;background-color: green;padding: 6px;border-radius: 5px;}
        td {text-align: center;}
        </style>
        <body>
            <div class="wrapper">
                <h2>Library Manage System</h2>
                <div  class="add_top">
                	<form action="../Controller/updateBooks.php" method="post" >  
                	    <td>isbn             </td><td><input type="text" name="isbn" value="';
                                                        echo $old['isbn'];
                                                        echo '"/></td><br>
                	    <td>title            </td><td><input type="text" name="title" value="';
                	                                    echo $old['title'];
                	                                    echo '"/></td><br>
                	    <td>author           </td><td><input type="text" name="author" value="';
                	                                    echo $old['author'];
                	                                    echo '"/></td><br>
                	    <td>publisher        </td><td><input type="text" name="publisher" value="';
                	                                    echo $old['publisher'];
                	                                    echo '"/></td><br>
                	    <input type="submit" value="Submit">  
                	</form>  
                </div>
            </div>
            
        </body>
    </html>
                
    ';
