<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>show</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="apple-touch-icon-precomposed" href="images/icon.png">
    <link rel="shortcut icon" href="images/favicon.ico">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/jquery.lazyload.min.js"></script>


    <link rel="stylesheet" href="../admin/css/pintuer.css">
    <script src="../admin/js/pintuer.js"></script>
    <link rel="stylesheet" href="../admin/css/admin.css">
    <script src="../admin/js/jquery.js"></script>

    <script>
        function ajup5() {
            // alert("ajup5 + ");
            $.get("logout.php", function (data, status) {
                // alert("数据: " + data + "\n状态: " + status);
            });
            location.replace(location);
        }

        function comlist() {
            // alert("comlist");
            $.get(" getComment.php?new_nid=" +<?php echo "{$_GET['id']}"; ?>, function (data, status) {
                // alert("数据: " + data + "\n状态: " + status);
                document.getElementById("txtHint_com").innerHTML = data;
            });
        }
    </script>


</head>
<body class="user-select single" style="background:url('images/bg.jpg');
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-size:cover;
    -moz-background-size:cover;
    -webkit-background-size:cover;">


    <header class="header" style="background:url(images/favicon.ico)">
        <nav class="navbar navbar-default" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <h1 class="logo hvr-bounce-in"><a href="index.php"><img src="images/nav_head.png"/></a></h1>
                </div>
                <div class="collapse navbar-collapse" id="header-navbar">
                    <form class="navbar-form visible-xs" action="/Search" method="post">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20"
                                   autocomplete="off"/>
                            <span class="input-group-btn"> <button class="btn btn-default btn-search" name="search"
                                                                   type="submit">搜索</button> </span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="icon-home"></span> 首页</a></li>
                        <li><a href="search.php"><span class="icon-search"></span> 搜索</a></li>

                        <?php
                            session_start();
                            if (!isset($_SESSION['fname'])) {
                                ?>
                                <li><a data-cont="用户登陆" title="用户登陆" href="../home/login.html"><span
                                                class="icon-user"></span> 用户登陆</a></li>
                                <?php
                            } else { ?>
                                <li><a href="javascript:void(0)" onclick="ajup5()"><span class="icon-sign-out"></span>
                                        退出登陆</a></li>
                                <?php
                            }
                        ?>

                        <li><a data-cont="管理员" title="管理员" href="../admin/login.html"><span class="icon-wrench"></span>
                                管理员</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <section class="container" style="padding-top: 25px; padding-bottom: 25px">
        <div class="content-wrap" style="min-height: 870px">
            <div class="content">

                <?php
                    $news_id = $_GET['id'];

                    $mysqli = new mysqli('127.0.0.1', 'root', '888888', 'news');
                    $mysqli->set_charset('utf8');
                    if ($mysqli->connect_errno) {
                        die('<h2 style="color : red">连接错误</h2>' . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM news WHERE news_id=" . $news_id;
                    //执行查询，返回结果集对象
                    $mysqli_result = $mysqli->query($sql);
                    //如果结果集存在并且有数据
                    if ($mysqli_result && $mysqli_result->num_rows) {
                        //指针复位
                        $mysqli_result->data_seek(0);
                        $row = $mysqli_result->fetch_assoc();
                        echo "<header class=\"article-header\">
            <h1 class=\"article-title\">
                {$row['title']}
            </h1>
            <div class=\"article-meta\">
                时间：{$row['cre_date']} &nbsp;&nbsp;
                类型：{$row['category']} &nbsp;&nbsp;
                点击量：{$row['click']}
            </div>
        </header>
    
        <article class=\"article-content\">
            <p>";

                        $text_arr = explode(chr(10), $row['content']);

                        for ($i = 0; $i < count($text_arr); $i++) {
                            echo $text_arr[$i];
                            echo "</p><p>";
                        }


                        echo "</p>
        </article>
        
      <div class=\"article-tags\">
          分类：{$row['category']}
      </div>
    ";

                    } else {
                        echo '么有你想要的东西';
                    }

                    //更新阅读量
                    $sql = "UPDATE news SET click=click+1 WHERE news_id=" . $news_id;
                    //执行查询，返回结果集对象
                    $mysqli_result = $mysqli->query($sql);

                    $mysqli->close();

                ?>

                <!--  模版  -->

                <!--	<header class="article-header">-->
                <!--		<h1 class="article-title">-->
                <!--			{$row['title']}-->
                <!--        </h1>-->
                <!--		<div class="article-meta">-->
                <!--            {$row['cre_date']} &nbsp;&nbsp;-->
                <!--            {$row['category']} &nbsp;&nbsp;-->
                <!--            {$row['click']}-->
                <!--		</div>-->
                <!--	</header>-->
                <!---->
                <!--	<article class="article-content">-->
                <!--		<p>{$row['content']}</p>-->
                <!--	</article>-->
                <!--    -->
                <!--  <div class="article-tags">-->
                <!--	  分类：{$row['category']}-->
                <!--  </div>-->

                <hr>
                <br>

                <?php

                    if (!isset($_SESSION['fname'])) {
                        ?>
                        <h2>登陆之后才可以评论</h2>
                        <br><br>
                        <?php
                    } else { ?>
                        <form action="postComment.php" type="get">
                            <input type="hidden" name="nid" value="<?php echo "{$_GET['id']}"; ?>">
                            <input type="hidden" name="uname" value="<?php echo "{$_SESSION['fname']}"; ?>">
                            <!--            <textarea name="ctext" id="" cols="30" rows="10" placeholder="您的评论或留言"></textarea>-->
                            <!--            <input type="submit">-->

                            <div id="respond">
                                <div class="comment">
                                    <div class="comment-box">
                                        <textarea placeholder="您的评论或留言" name="ctext" id="comment-textarea" cols="100%"
                                                  rows="3" tabindex="3" id="txtcom"></textarea>
                                        <!--                        <input type="submit" onclick="diy()" >-->
                                        <div class="comment-ctrl">
                                            <button type="submit" id="comment-submit" tabindex="4">评论</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <?php
                    }
                ?>

                <button class="button border-green icon-chevron-circle-down" onclick="comlist()"> 点击查看评论</button>
                <br><br>
                <div id="txtHint_com"><h2 align="center" style="padding: 20px">点击查看评论</h2></div>

                <!--    <div id="postcomments">-->
                <!--        <ol id="comment_list" class="commentlist">-->
                <!--            <li class="comment-content"><div class="comment-main"><p><b>{$row['cauthor']}</b><span class="time">({$row['ctime']})</span><br>{$row['ctext']}</p></div></li>-->
                <!--            <li class="comment-content"><div class="comment-main"><p><b>木庄网络博客</b><span class="time">(2016/10/28 11:41:03)</span><br>不错的网站主题，看着相当舒服</p></div></li>-->
                <!--        </ol>-->
                <!--    </div>-->

            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>Copyright &copy; 2018.Kang Yi Corporation.</p>
        </div>
        <div id="gotop"><a class="gotop"></a></div>
    </footer>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.ias.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
