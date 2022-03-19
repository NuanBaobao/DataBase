 <?php
    // 设置编码
    header("content-type:text/html;charset=utf-8");
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
                <div class="add">
                    <a href="../public/addBooks.html">Add</a>
                </div>
                <table width="960" border="1">
                    <tr>
                        <th>isbn</th>
                        <th>title</th>
                        <th>author</th>
                        <th>publisher</th>
                        <th>operation</th>
                    </tr>';
 
                    // 引入配置信息
                	require "dbConfig.php";
                	// 连接mysql
                	$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die("ERROR: CANNOT CONNECT TO DATABASE!");
                	
                	// 编码设置
                	mysqli_set_charset('utf8', $link);
                	$sql = "select * from books";
                	$result = mysqli_query($link, $sql);
                	// 解析结果集,$row为所有数据，$newsNum为图书的数目
                	$booksNum = mysqli_num_rows($result);
                	    
                	for($i=0; $i<$booksNum; $i++){
                	    $row = mysqli_fetch_assoc($result);
                	    echo "<tr>";
                	    echo "<td>{$row['isbn']}</td>";
                	    echo "<td>{$row['title']}</td>";
                	    echo "<td>{$row['author']}</td>";
                	    echo "<td>{$row['publisher']}</td>";
                	    echo "<td>
                                <a href='javascript:del({$row['isbn']})'>delete</a>
                                <a href='editBooks.php?isbn={$row['isbn']}'>update</a>
                              </td>";
                	    echo "</tr>";
                	}
                	// 5. 释放结果集
                	mysqli_free_result($result);
                	mysqli_close($link);
                	header("Content-type:text/html;charset=utf-8");
                	echo '
                 </table>
            </div>
            <script type="text/javascript">
                function del (isbn) {
                    if (confirm("delete?")){
                        window.location = "delBook.php?isbn=" + isbn;
                    }
                }
            </script>
        </body>
    </html>
                
    ';
?>