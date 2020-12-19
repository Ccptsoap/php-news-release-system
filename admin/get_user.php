<?php


    require "mysqli_connect.php";

    $sql = "SELECT user_id,username,email FROM user";
//执行查询，返回结果集对象
    $mysqli_reseult = $mysqli->query($sql);
//如果结果集存在并且有数据
    if ($mysqli_reseult && $mysqli_reseult->num_rows) {

        //指针复位
        $mysqli_reseult->data_seek(0);
//table head
        echo "<table class=\"table text-center table-striped\"> <tr>
      <th width=\"5%\">用户编号</th>
      <th width=\"15%\">用户名称</th>
      <th width=\"10%\">用户邮箱</th>
      <th width=\"10%\">操作</th>
    </tr>";
        while ($row = $mysqli_reseult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['user_id'] . '</td><td>' . $row['username'] . '</td><td>' . $row['email'] . '</td>';
            echo '<td>
        <div class="button-group">
          <a class="button border-red" href="javascript:void(0)" onclick="';

            echo "return del({$row['user_id']},2)";

            echo '"><span class="icon-trash-o"></span> 删除</a>
        </div>
      </td>';
            echo '</tr>';
        }
        echo "</table>";

    } else {
        echo '么有你想要的东西';
    }
    $mysqli->close();






