<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit"/>
    <title>后台管理中心</title>
    <link rel="stylesheet" href="css/pintuer.css"/>
    <link rel="stylesheet" href="css/admin.css"/>
    <script src="js/jquery.js"></script>


    <!--    检查是否登陆过-->
    <?php
        session_start();
        if (!isset($_SESSION['uname'])) {
            echo "<script>alert('您没有权限，请先登陆！');window.location.href=\"login.html\"</script>";
        }
    ?>
    <!--    按键调用ajax 调用php-->
    <script>
        function Logout() {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码x
                xmlhttp = new XMLHttpRequest();
            } else {
                //IE6, IE5 浏览器执行的代码
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.open("GET", "logout.php", true);
            xmlhttp.send();
        }
    </script>
</head>


<body style="background-color:#f2f9fd;">

    <div class="header bg-main">
        <div class="logo margin-big-left fadein-top">
            <h1 style="color: black">后台管理中心</h1>
        </div>
        <div class="head-l">
            <a class="button button-little bg-green" href="../front/index.php" onclick="Logout()"><span
                        class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;
            <a class="button button-little bg-red" href="login.html" onclick="Logout()"><span
                        class="icon-power-off"></span> 退出登录</a>
        </div>
    </div>


    <div class="leftnav">
        <div class="leftnav-title">
            <strong><span class="icon-list"></span>菜单列表</strong>
        </div>
        <h2><span class="icon-user"></span>首页</h2>
        <ul style="display:block">

            <li><a href="newsCreate.html?1" target="right"><span class="icon-caret-right"></span>发布新闻</a></li>
            <li><a href="userOperate.html" target="right"><span class="icon-caret-right"></span>用户管理</a></li>
            <li><a href="book.html" target="right"><span class="icon-caret-right"></span>新闻管理</a></li>
            <li><a href="recycle.html" target="right"><span class="icon-caret-right"></span>新闻回收站</a></li>

        </ul>

    </div>
    <script type="text/javascript">
        $(function () {
            $(".leftnav h2").click(function () {
                $(this).next().slideToggle(100);
                $(this).toggleClass("on");
            })
            $(".leftnav ul li a").click(function () {
                $("#a_leader_txt").text($(this).text());
                $(".leftnav ul li a").removeClass("on");
                $(this).addClass("on");
            })
        });
    </script>
    <ul class="bread">
        <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
        <li><a href="##" id="a_leader_txt">发布新闻</a></li>
    </ul>
    <div class="admin">
        <iframe scrolling="auto" rameborder="0" src="newsCreate.html?1" name="right" width="100%" height="100%"></iframe>
    </div>


    <!--    ajax刷新头像-->
    <script>
        $(function () {
            $.ajax({
                success: function (msg) {
                    $("#flush_head").attr("src", "images/h1.jpg");
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        })
    </script>

</body>
</html>