<?php
    $ini = parse_ini_file("conf.ini");
    $mysqli = new mysqli($ini["host"], $ini["username"], $ini["passwd"], $ini["dbname"]);
    $mysqli->set_charset('utf8');

    if ($mysqli->connect_errno) {
        die('<h2 style="color: red">连接错误</h2>' . $mysqli->connect_error);
    }
