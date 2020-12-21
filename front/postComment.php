<?php
    //提交用户评论
    header("Content-Type: text/html; charset=utf-8");

    $ctext = $_GET['ctext'];
    $nid = $_GET['nid'];
    $uname = $_GET['uname'];


    require_once($_SERVER['DOCUMENT_ROOT'] . "/mysqli_connect.php");
    if ($mysqli->connect_errno) {
        die('<h2 style="color: red">连接错误</h2>' . $mysqli->connect_error);
    }

    $sql = "INSERT comment(ctext,ctime,cuser,nid) VALUES('{$ctext}',NOW(),'{$uname}',{$nid})";
    if ($mysqli->query($sql)) {
        echo '<script> alert("成功发表评论"); window.location.href="showNews.php?id="+' . $nid . ';</script>';

//    echo '成功添加了'.$mysqli->affected_rows.'条记录，新增的主键id是：'.$mysqli->insert_id;
    } else {
        echo '添加失败' . $mysqli->errno . ': ' . $mysqli->error;
    }
    $mysqli->close();