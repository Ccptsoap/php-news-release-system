<?php
    require 'mysqli_connect.php';

//插入回收站
    $sql = "SELECT * FROM news WHERE news_id=" . $_GET['uid'];
    $mysqli_result = $mysqli->query($sql);
    $mysqli_result->data_seek(0);
    $row = $mysqli_result->fetch_array();

    echo 't: ' . $row['title'] . ' c: ' . $row['content'] . ' cate: ' . $row['category'] . '<br>';

    $sql = "INSERT recycle(title ,content ,cre_date ,click ,category ) 
VALUES('" . $row['title'] . "', '" . $row['content'] . "', '" . $row['cre_date'] . "', " . $row['click'] . ", '" . $row['category'] . "')";

    $mysqli->query($sql);

//删除
    $sql = "DELETE FROM news WHERE news_id=" . $_GET["uid"];
    if ($mysqli->query($sql)) {
        echo '成功删除了' . $mysqli->affected_rows . '条记录';
    } else {
        echo '删除失败' . $mysqli->errno . ': ' . $mysqli->error;
    }
    $mysqli->close();