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
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/jquery.lazyload.min.js"></script>


    <link rel="stylesheet" href="../admin/css/pintuer.css">
    <script src="../admin/js/pintuer.js"></script>
    <link rel="stylesheet" href="../admin/css/admin.css">
    <script src="../admin/js/jquery.js"></script>

    <script>
        function logout() {
            $.get("logout.php", function (data, status) {
            });
            location.replace(location);
        }

        function getComlist() {
            $.get(" getComment.php?new_nid=" +<?php echo "{$_GET['id']}"; ?>, function (data, status) {
                document.getElementById("txtHint_com").innerHTML = data;
            });
        }
    </script>


</head>
<!--<body class="user-select single" style="background:url('images/bg.jpg');-->
<body class="user-select single" style="background-color: #888888;
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-size:cover;
    -moz-background-size:cover;
    -webkit-background-size:cover;">


    <header class="header" style="background:url(images/favicon.ico)">
        <nav class="navbar navbar-default" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <h1 class="logo hvr-bounce-in" style="text-align: center;"><a href="index.php"><strong>????????????</strong>
                    </h1></a></h1>
                </div>
                <div class="collapse navbar-collapse" id="header-navbar">
                    <form class="navbar-form visible-xs" action="/Search" method="post">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="??????????????????" maxlength="20"
                                   autocomplete="off"/>
                            <span class="input-group-btn"> <button class="btn btn-default btn-search" name="search"
                                                                   type="submit">??????</button> </span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="icon-home"></span> ??????</a></li>
                        <li><a href="search.php"><span class="icon-search"></span> ??????</a></li>

                        <?php
                            session_start();
                            if (!isset($_SESSION['fname'])) {
                                ?>
                                <li><a data-cont="????????????" title="????????????" href="../user/login.html"><span
                                                class="icon-user"></span> ????????????</a></li>
                                <?php
                            } else { ?>
                                <li><a href="javascript:void(0)" onclick="logout()"><span class="icon-sign-out"></span>
                                        ????????????</a></li>
                                <?php
                            }
                        ?>

                        <li><a data-cont="?????????" title="?????????" href="../admin/login.html"><span class="icon-wrench"></span>
                                ?????????</a></li>
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

                    require_once($_SERVER['DOCUMENT_ROOT'] . "/mysqli_connect.php");
                    if ($mysqli->connect_errno) {
                        die('<h2 style="color : red">????????????</h2>' . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM news WHERE news_id=" . $news_id;
                    //????????????????????????????????????
                    $mysqli_result = $mysqli->query($sql);
                    //????????????????????????????????????
                    if ($mysqli_result && $mysqli_result->num_rows) {
                        //????????????
                        $mysqli_result->data_seek(0);
                        $row = $mysqli_result->fetch_assoc();

                        echo '<script>document.title = "' . $row['title'] . '";</script>'; //??????????????????
                        echo "<header class=\"article-header\">

            <h1 class=\"article-title\">
                {$row['title']}
            </h1>
            <div class=\"article-meta\">
                ?????????{$row['cre_date']} &nbsp;&nbsp;
                ?????????{$row['category']} &nbsp;&nbsp;
                ????????????{$row['click']}
            </div>
        </header>
        <img src='/news/newsCoverImg/{$row['imageName']}' style='display:block; margin:50px auto'/>
        <article class=\"article-content\">
        
            <p>";

                        $text_arr = explode(chr(10), $row['content']); //???????????????????????????

                        for ($i = 0; $i < count($text_arr); $i++) {
                            echo $text_arr[$i];
                            echo "</p><p>";
                        }

                        echo "</p>
        </article>
        
      <div class=\"article-tags\">
          ?????????{$row['category']}
      </div>
    ";

                    } else {
                        echo '<h1 class=\"article-title\" style="text-align: center;padding-top: 50px;padding-bottom: 50px">????????????????????????</h1>';
                    }
                    //???????????????
                    $sql = "UPDATE news SET click=click+1 WHERE news_id=" . $news_id;
                    //????????????????????????????????????
                    $mysqli_result = $mysqli->query($sql);

                    $mysqli->close();

                ?>
                <hr>
                <br>

                <?php

                    if (!isset($_SESSION['fname'])) {
                        ?>
                        <p style="margin-top: 5px;margin-bottom: 50px; font-size: 14px;">???????????????????????????</p>
                        <br><br>
                        <?php
                    } else { ?>
                        <form action="postComment.php" type="get">
                            <input type="hidden" name="nid" value="<?php echo "{$_GET['id']}"; ?>">
                            <input type="hidden" name="uname" value="<?php echo "{$_SESSION['fname']}"; ?>">

                            <div id="respond">
                                <div class="comment">
                                    <div class="comment-box">
                                        <textarea placeholder="?????????????????????" name="ctext" id="comment-textarea" cols="100%"
                                                  rows="3" tabindex="3" id="txtcom"></textarea>
                                        <div class="comment-ctrl">
                                            <button type="submit" id="comment-submit" tabindex="4">??????</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <?php
                    }
                ?>
                <div style="text-align:center">
                    <button class="button border-green icon-chevron-circle-down"
                            style="width: 400px; padding-top: 5px;padding-bottom: 5px;margin-top: 20px;"
                            onclick="getComlist()"> ??????????????????
                    </button>
                </div>

                <br><br>
                <div id="txtHint_com"><h2 align="center" style="padding: 20px"></h2></div>

            </div>
        </div>
    </section>

    <footer class="footer">
        <div id="gotop"><a class="gotop"></a></div>
    </footer>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.ias.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
