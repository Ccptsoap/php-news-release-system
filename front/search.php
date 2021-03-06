<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/jquery.lazyload.min.js"></script>

    <link href="css/newsStyle.css" rel="stylesheet">

    <link rel="stylesheet" href="../admin/css/pintuer.css">
    <script src="../admin/js/pintuer.js"></script>
    <link rel="stylesheet" href="../admin/css/admin.css">
    <script src="../admin/js/jquery.js"></script>

</head>

<body class="user-select">

    <header class="header">
        <nav class="navbar navbar-default" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <h1 class="logo hvr-bounce-in" style="text-align: center;"><a
                                href="index.php"><strong>今日头条</strong></h1></a></h1>
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
                        <li><a href="index.php"><span class="icon-home"></span> 首页</a>
                        </li>
                        <li><a href="search.php"><span class="icon-search"></span> 搜索</a>
                        </li>
                        <li><a data-cont="管理员" title="管理员" href="../admin/login.html"><span class="icon-wrench"></span>
                                管理员</a></li>
                        <?php
                            session_start();
                            if (!isset($_SESSION['fname'])) {
                                ?>
                                <li><a data-cont="用户登陆" title="用户登陆" href="../user/login.html"><span
                                                class="icon-user"></span> 用户登陆</a></li>
                                <?php
                            } else { ?>
                                <li><a href="javascript:void(0)" onclick="ajup5()"><span class="icon-sign-out"></span>
                                        退出登陆</a></li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script>
        function ajup() {
            var str = document.getElementById("key").value;
            // alert("ajup + "+str);
            $.get("getNewsByKeyword.php?key=" + str, function (data, status) {
                // alert("数据: " + data + "\n状态: " + status);
                document.getElementById("answer").innerHTML = data;
            });
            // location.replace(location);
        }

        function turn(id) {
            var s = "showNews.php?id=" + id;
            window.location.href = s;
        }

        $(function () {

        });
    </script>

    <section class="container">
        <div class="dt-wrap">
            <div class="jumbotron line"
                 style="margin-bottom:80px; padding-top: 10px; text-align:center;background-color:#EEEEEE">
                <h1 style="text-align: center; color: #337ab7;font-weight:900"></span>新闻搜索</h1>
            </div>
        </div>

        <div class="line">
            <div class="x6 x3-move">
                <input type="text" class="input" style="width: 95%" placeholder="模糊搜索新闻标题" id="key"/>
            </div>
            <div class="x1 x0-move" style="margin-left: 10px">
                <button class="button border-blue fadein-right" onclick="ajup()"><span class="icon-search"></span> 搜索
                </button>
            </div>
        </div>
        <br>
        <div id="answer">
            <h2 align="center" style="padding: 200px;color: #CCCCCC">请输入关键字</h2>
        </div>
        <br><br>

    </section>


    <footer class="footer">
        <div id="gotop"><a class="gotop"></a></div>
    </footer>

    <script src="js/jquery.ias.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>