<?php

    require 'mysqli_connect.php';


    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

//echo '<pre>';
//print_r($title);
//echo '</pre>';
//
//echo '<hr>';
//
//echo '<pre>';
//print_r($category);
//echo '</pre>';

    $sql = "INSERT news(title,content,cre_date,category) VALUES('{$title}','{$content}',NOW(),'{$category}')";
    if ($mysqli->query($sql)) {
        $res1 = '成功添加了' . $mysqli->affected_rows . '条记录';
        $res2 = '新增的主键id是：' . $mysqli->insert_id;
        echo "<div class=\"container\">
	<div class=\"jumbotron\">
		<h2 style='color: #30ff09;'>{$res1}</h2>
		<p>{$res2}</p>
	</div>
</div>";
    } else {
        echo '添加失败' . $mysqli->errno . ': ' . $mysqli->error;
    }
//关闭连接
    $mysqli->close();