<?php
//检查cookie中的passed变量是否等于TRUE
$passed = $_COOKIE["passed"];
if($passed != TRUE){
	header("Location:index.html");
	exit();
}	
else{
	require_once("dbtools.inc.php");
	$id = $_COOKIE["id"];
	//创建数据连接
	$link = creat_connection();
	$sql = "DELETE FROM users Where id = $id";
	$result = execute_sql("member", $sql, $link);
	//关闭数据连接
	mysql_close($link);	
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>注册成功</title>
</head>

<body>
	注销成功！<br />
    
	<a href="index.html">回首页</a>
 
</body>
</html>
