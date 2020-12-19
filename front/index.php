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
    <!--    <link rel="apple-touch-icon-precomposed" href="images/icon.png">-->
    <!--    <link rel="shortcut icon" href="images/favicon.ico">-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/jquery.lazyload.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


    <link href="css/newsStyle.css" rel="stylesheet">

    <link rel="stylesheet" href="../admin/css/pintuer.css">
    <script src="../admin/js/pintuer.js"></script>
    <link rel="stylesheet" href="../admin/css/admin.css">
    <script src="../admin/js/jquery.js"></script>


</head>

<body class="user-select">
    <div class="wrapper">
        <div class="wrap-box">

            <header class="header">
                <nav class="navbar navbar-default" id="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <h1 class="logo hvr-bounce-in" style="text-align: center;font-family:'宋体'"><a
                                        href="index.php"><strong>新闻发布系统</strong></h1></a></h1>
                        </div>
                        <div class="collapse navbar-collapse" id="header-navbar">
                            <form class="navbar-form visible-xs" action="/Search" method="post">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="请输入关键字"
                                           maxlength="20" autocomplete="off"/>
                                    <span class="input-group-btn"> <button class="btn btn-default btn-search"
                                                                           name="search"
                                                                           type="submit">搜索</button> </span>
                                </div>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.php"><span class="icon-home"></span> 首页</a></li>
                                <li><a href="search.php"><span class="icon-search"></span> 搜索</a></li>
                                <li><a data-cont="管理员" title="管理员" href="../admin/login.html"><span
                                                class="icon-wrench"></span> 管理员</a></li>
                                <?php
                                    session_start();
                                    if (!isset($_SESSION['fname'])) {
                                        ?>
                                        <li><a data-cont="用户登陆" title="用户登陆" href="../home/login.html"><span
                                                        class="icon-user"></span> 用户登陆</a></li>
                                        <?php
                                    } else { ?>
                                        <li><a href="javascript:void(0)" onclick="ajup5()"><span
                                                        class="icon-sign-out"></span> 退出登陆</a></li>
                                        <?php
                                    }
                                ?>


                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            <section class="container">


                <br>


                <p align="center">
                    <!-- <img src="images\cate.png" alt=""  > -->

                </p>
                <div class="dt-wrap">
                    <div class="jumbotron line" style="margin-bottom:20px; text-align:center">
                        <h1 style="text-align: center;font-family:'宋体'">&nbsp新闻发布</h1>
                        <p style="text-align: center">&nbsp&nbsp&nbspNew's &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Relese</p>
                    </div>
                </div>
                <ul class="nav nav-pills" role="tablist"
                    style="display:flex;justify-items: center;justify-content: center;">
                    <li role="presentation" value="国际新闻" onclick="uploadNewsCate(this.innerText,this)" class="active"><a
                                href="#">国际新闻</a></li>
                    <li role="presentation" value="军事新闻" onclick="uploadNewsCate(this.innerText,this)"><a href="#">军事新闻</a></li>
                    <li role="presentation" value="体育新闻" onclick="uploadNewsCate(this.innerText,this)"><a href="#">体育新闻</a></li>
                    <li role="presentation" value="娱乐新闻" onclick="uploadNewsCate(this.innerText,this)"><a href="#">娱乐新闻</a></li>
                    <li role="presentation" value="社会新闻" onclick="uploadNewsCate(this.innerText,this)"><a href="#">社会新闻</a></li>
                    <li role="presentation" value="经济新闻" onclick="uploadNewsCate(this.innerText,this)"><a href="#">经济新闻</a></li>
                    <li role="presentation" value="时政新闻" onclick="uploadNewsCate(this.innerText,this)"><a href="#">时政新闻</a></li>
                </ul>

                <br>
                <div id="txtHint3">
                    <h2 align="center" style="padding: 20px">请点击新闻类型</h2>
                </div>
                <br><br>


                <p align="center">
                <h1 style="text-align: center;font-size:50px;font-family:'宋体'">&nbsp发布时间排行</h1>
                <a class="button border-yellow fadein-top" style="float: right" onclick="ajup()"><span
                            class="icon-refresh"></span> 刷新数据</a>
                </p>
                <div id="txtHint">
                </div>
                <br><br>

                <p align="center">
                <h1 style="text-align: center;font-size:50px;font-family:'宋体'">&nbsp点击量排行</h1>
                <a class="button border-yellow fadein-top" style="float: right" onclick="ajup2()"><span
                            class="icon-refresh"></span> 刷新数据</a>
                </p>
                <div id="txtHint2">
                </div>
                <br><br>

            </section>

            <footer class="footer">
                <div id="gotop"><a class="gotop"></a></div>
            </footer>
        </div>
    </div>

    <script src="js/jquery.ias.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        function ajup() {

            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp = new XMLHttpRequest();
            } else {
                // IE6, IE5 浏览器执行代码
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", " getNewsByTime.php", true);
            xmlhttp.send();

        }

        function ajup2() {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp = new XMLHttpRequest();
            } else {
                // IE6, IE5 浏览器执行代码
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                // alert('response '+xmlhttp.readyState+' '+xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // alert(xmlhttp.responseText);
                    document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", " getNewsByPoint.php", true);
            xmlhttp.send();

        }

        function ajup3(cate) {

            alert(cate);
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp = new XMLHttpRequest();
            } else {
                // IE6, IE5 浏览器执行代码
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.ontreadysatechange = function () {

                // alert('response '+xmlhttp.readyState+' '+xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // alert(xmlhttp.responseText);
                    document.getElementById("txtHint3").innerHTML = xmlhttp.responseText;
                }
            }
            // xmlhttp.open("GET", "getNewsByCate.php?cate="+cate ,true);
            xmlhttp.open("GET", "getNewsByCate.php", true);
            xmlhttp.send();
        }

        function uploadNewsCate(cate, _this) {
            //从服务器更新对应栏目的新闻。参数1：要更新的栏目；参数2：栏目标签。
            if (_this) {
                Array.from(_this.parentNode.children).forEach(item => {
                    if (item.attributes['class']) {
                        item.className = '';
                    }
                });
                _this.className += 'active' //激活栏目选中状态
            }
            $.get("getNewsByCate.php?cate=" + cate, function (data, status) {
                document.getElementById("txtHint3").innerHTML = data;
            });
        }


        function ajup5() {
            $.get("logout.php", function (data, status) {
            });
            location.replace(location);
        }


        $(function () {
            uploadNewsCate("国际新闻");
            ajup();
            let timer = setTimeout(ajup2, 10);
        });
    </script>

    <script type="text/javascript">
        function turn(id) {
            var s = "show.php?id=" + id;
            window.location.href = s;
        }
    </script>


</body>

</html>