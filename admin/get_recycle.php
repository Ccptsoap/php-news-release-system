<?php

    require "mysqli_connect.php";

    $sql = "SELECT news_id,title,cre_date FROM recycle ORDER BY  cre_date DESC";
//执行查询，返回结果集对象
    $mysqli_reseult = $mysqli->query($sql);
//如果结果集存在并且有数据
    if ($mysqli_reseult && $mysqli_reseult->num_rows) {

        //指针复位
        $mysqli_reseult->data_seek(0);
//table head
        echo "<table class=\"table text-center table-striped\"> <tr>
      <th width=\"5%\">新闻编号</th>
      <th width=\"15%\">新闻名称</th>
      <th width=\"10%\">创建时间</th>
      <th width=\"10%\">操作</th>
    </tr>";
        while ($row = $mysqli_reseult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['news_id'] . '</td><td>' . $row['title'] . '</td><td>' . $row['cre_date'] . '</td>';
            echo '<td>
        <div class="button-group">
          <a class="button border-main" href="javascript:void(0)" onclick="';

            echo "return reuse({$row['news_id']})";

            echo '"><span class="icon-paper-plane"></span> 恢复</a>
        </div>
      </td>';
            echo '</tr>';
        }
        echo "</table>";

    } else {
        echo '<h3 align="center" style="padding: 20px">回收站空空如也哦</h3>';
    }
    $mysqli->close();

