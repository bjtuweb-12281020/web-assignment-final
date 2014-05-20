<?php
	ob_start();
	require_once("dbtools.inc.php");
	
	$author = $_POST["author"];	
	$subject = $_POST["subject"];	
	$content = $_POST["content"];	
	$current_time = date("Y-m-d H:i:s");
	$reply_id = $_POST["reply_id"];
	
	//创建数据连接
	$link = creat_connection();
	
	$sql = "INSERT INTO reply_message (author, subject, content, date, reply_id) 
			VALUES ('$author', '$subject', '$content', '$current_time', '$reply_id') ";
	$result = execute_sql("news", $sql, $link);
	
	mysql_close($link);	
	
	header("Location:show_news.php?id=".$reply_id);
	ob_end_flush();
	exit();
?>