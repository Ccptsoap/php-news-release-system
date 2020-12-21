<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/mysqli_connect.php");

    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $coverImgPath = null;

    if (($_FILES["coverImg"]["type"] == "image/gif" || $_FILES["coverImg"]["type"] == "image/jpeg" || $_FILES["coverImg"]["type"] == "image/png"
            || $_FILES["coverImg"]["type"] == "image/jpg"
            || $_FILES["coverImg"]["type"] == "image/pjpeg") && $_FILES["coverImg"]["size"] < 2 * 1024 * 1024) {
        //限制2MB大小

        if ($_FILES["coverImg"]["error"] > 0) {
            // error为0表示上传成功

            echo "Return Code: " . $_FILES["coverImg"]["error"] . "<br />";
            //上传失败返回错误代码
        } else {
            $filename = date("YmdHis") . rand() . '.png'; //日期+随机数命名图片并转移保存
            move_uploaded_file($_FILES["coverImg"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "\\newsCoverImg\\" . $filename);

//            $coverImgPath = $_SERVER['DOCUMENT_ROOT'] . '\\newsCoverImg\\' . $filename;

            echo '存储路径：' . $coverImgPath . '</br>';

            $sql = "INSERT news(title, content, cre_date, category, imageName) VALUES('{$title}', '{$content}', NOW(), '{$category}','{$filename}')";
            echo $sql . '</br > ';
            if ($mysqli->query($sql)) {
                $res1 = '成功添加了' . $mysqli->affected_rows . '条记录';
                $res2 = '新增的新闻id是：' . $mysqli->insert_id;
                echo " < div class=\"container\">
	        <div class=\"jumbotron\">
	        	<h2 style='color: #30ff09;'>{
                $res1}
        </
        h2 >
	        	<p >{
            $res2}</p >
	        </div >
        </div > ";
            } else {
                echo '添加失败' . $mysqli->errno . ': ' . $mysqli->error;
            }
        }
    } else {

        $sql = "INSERT news(title, content, cre_date, category) VALUES('{$title}', '{$content}', NOW(), '{$category}')";
        if ($mysqli->query($sql)) {
            $res1 = '成功添加了' . $mysqli->affected_rows . '条记录';
            $res2 = '新增的新闻id是：' . $mysqli->insert_id;
            echo " < div class=\"container\">
	        <div class=\"jumbotron\">
	        	<h2 style='color: #30ff09;'>{
            $res1}</h2>
	        	<p>{
            $res2}</p>
	        </div>
        </div>";
        } else {
            echo '添加失败' . $mysqli->errno . ': ' . $mysqli->error;
        }
    }


    $mysqli->close();