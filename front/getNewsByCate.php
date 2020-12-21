<?php
    //获取指定类型的新闻

    if ($_SERVER['HTTP_REFERER'] == "") {
        header("Location:" . "index.php");
        exit;
    }
    header("Content-Type: text/html; charset=utf-8");

    require_once($_SERVER['DOCUMENT_ROOT'] . "/mysqli_connect.php");
    if ($mysqli->connect_errno) {
        die('<h2 style="color: red">连接错误</h2>' . $mysqli->connect_error);
    }

    $cate = $_GET['cate'];

    $sql = "SELECT * FROM news WHERE category='" . $cate . "' LIMIT 8";

//执行查询，返回结果集对象
    $mysqli_result = $mysqli->query($sql);
//如果结果集存在并且有数据
    if ($mysqli_result && $mysqli_result->num_rows) {

        //指针复位
        $mysqli_result->data_seek(0);

        /****前端渲染****/
        echo <<<EOT
        <div data-reactroot="" class="channel_mod" data-bosszone="channel_list" data-bossirs="new_list">
        <ul class="list">
EOT;
        while ($row = $mysqli_result->fetch_assoc()) {
            echo '<li  class="item cf itme-ls">';

            //输出图片
            echo '
                <a class="picture" href="showNews.php?id=' . $row['news_id'] . '" target="_blank">
                <img class="Monograph" src="/news/newsCoverImg/' . $row['imageName'] . '">
                </a>
                ';

            echo '<div class="detail">'; //<div class="detail">

            //输出标题
            echo '
                <h3 class="">
                <a href="showNews.php?id=' . $row['news_id'] . '" target="_blank">'
                . $row['title'] .
                '</a></h3>
                ';

            //输出分隔
            echo '<div class="tags"></div>';

            //输出日期和点击数
            echo '<div class="binfo cf">';
            echo '
                <div class="fl">
                <span class="time">' . "发布日期：" . date('Y-m-d', strtotime($row['cre_date']))
                . "&nbsp&nbsp&nbsp&nbsp&nbsp 点击量：" . $row['click'] . '</span>
                </div>
                ';

            echo '</div>'; //<div class="binfo cf">

            echo '</div>'; //<div class="detail">

            echo '</li>'; //<li  class="item cf itme-ls">

        }

        echo <<<EOT
        </div>
        </ul>
EOT;
        /****前端渲染****/

    } else {
        echo '<h2  align="center" style="padding: 200px; color: #CCCCCC">数据库中没有数据</h2>';
    }
    $mysqli->close();



