<?php
	ob_start();
	require_once("dbtools.inc.php");
	
	$author = $_POST["author"];	
	$subject = $_POST["subject"];	
	$content = $_POST["content"];	
	$current_time = date("Y-m-d H:i:s");	
	
	//创建数据连接
	$link = creat_connection();
	
	$sql = "INSERT INTO message (author, subject, content, date)
			VALUES ('$author', '$subject', '$content', '$current_time') ";
	$result = execute_sql("news", $sql, $link);
	
	mysql_close($link);	
	
	header("Location:group.php");
	ob_end_flush();
	exit();
?>