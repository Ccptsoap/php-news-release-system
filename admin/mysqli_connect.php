<?php

    echo "<link rel=\"stylesheet\" href=\"../admin/css/bootstrap.min.css\">";
    echo "<script src=\"../admin/js/jquery.js\"></script>";
    echo "<script src=\"../admin/js/bootstrap.min.js\"></script>";


    header("Content-Type: text/html; charset=utf-8");

    $mysqli = new mysqli('127.0.0.1', 'root', '888888', 'news');
    $mysqli->set_charset('utf8');

    if ($mysqli->connect_errno) {
        die('<h2 style="color: red">连接错误</h2>' . $mysqli->connect_error);
    }
