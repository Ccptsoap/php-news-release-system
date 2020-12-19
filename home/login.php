<?php

require '../admin/mysqli_connect.php';

session_start();


$sql = "SELECT username,password FROM user";
$mysqli_result = $mysqli->query($sql);
if ($mysqli_result && $mysqli_result->num_rows>0) {
    $rows = $mysqli_result->fetch_all(MYSQLI_ASSOC);



    $flag = 0;
    foreach ($rows as $row) {
        if ($row['username'] == $_POST['username'] && $row['password'] == $_POST['password']) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 1) {
        $_SESSION['fname'] = $_POST['username'];
        $_SESSION['fpwd'] = $_POST['password'];

        echo "<script>alert('欢迎您，{$_POST['username']}');
        window.location.href='../front/index.php'</script>";
    } else {
        echo "<script>alert('账户或者密码错误！重新填写');
        window.location.href=\"login.html\";</script>";
    }

//    echo session_id();

}