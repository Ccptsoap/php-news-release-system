<?php

    header("Content-Type: text/html; charset=utf-8");

    session_start();

    if ($_SESSION['uname'] == '') {
        echo "<script>alert('您没有权限，请先登陆！{$_SESSION['uname']}');
        window.location.href=\"login.html\"</script>";
    } else {
        echo "<script>window.location.href=\"index.html\"</script>";
    }
?>