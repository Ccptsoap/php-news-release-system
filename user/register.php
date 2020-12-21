<?php

    require '../admin/mysqli_connect.php';

    header('Access-Control-Allow-Origin:*');

    echo "<script> alert('success register'); </script>";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT user(username,password,email) VALUES('{$username}','{$password}','{$email}')";
    if ($mysqli->query($sql)) {
        $res1 = '成功添加了' . $mysqli->affected_rows . '条记录';
        $res2 = '新增的主键id是：' . $mysqli->insert_id;
        echo "<div class=\"container\">
	<div class=\"jumbotron\">
		<h2 style='color: #30ff09;'>{$res1}</h2>
		<p>{$res2}</p>
		<p><a href='login.html' class=\"btn btn-primary btn-lg\" role=\"button\">
			转到登陆</a>
		</p>
	</div>
</div>";
    } else {
        echo '添加失败' . $mysqli->errno . ': ' . $mysqli->error;
    }
//关闭连接
    $mysqli->close();

