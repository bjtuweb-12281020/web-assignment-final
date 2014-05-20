<?php
function creat_connection(){
	$link = mysql_connect("localhost", "root", "009988") or die("无法创建连接");
	mysql_query("SET NAMES utf8");
	return $link;
}

function execute_sql($database, $sql, $link){
	$db_select = mysql_select_db($database, $link) or die ("无法打开数据库");
	$result = mysql_query($sql, $link);
	return $result;
}

?>