<head>
    <link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<?php 
    @session_start();
 ?>
<body>
    <div class="main-header">
        <div class="container">
            <div class="navigation">
                <div class="info">
                    <nav class="menu">
                        <ul class ="menu-one" >
                            <li><a href="./front_page.php">首页</li> <!-- 此处实现点击返回首页，未实现 -->
                            <?php
                                if (!empty($_SESSION["user_name"])) { # 如果用户已登录，则显示个人中心与退出按钮
                                    echo "<li><a href='./user_center.php'>个人中心</a></li>";
                                    echo "<li><a href='./user_exit_sql.php'>退出</a></li>";
                                }
                                else { # 如果用户未登录，则显示登录与注册按钮
                                    echo "<li><a href='./login.php'>登陆</a></li>";
                                    echo "<li><a href='./sign.php'>注册</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>

                <a href="#">
                    <h2>数据无限</h2><br>
                    <span>人生只有贪心，没有动态规划</span>
                </a>
            </div>
        </div>
    </div>
</body>