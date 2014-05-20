<?php
header("Content-Type: text/html; charset=utf-8");
require_once("dbtools.inc.php");
//获取窗体数据
$account = $_POST["account"];
$password = $_POST["password"];

//创建数据连接
$link = creat_connection();
//检查账号密码是否正确
$sql = "SELECT * FROM users Where account = '$account' AND password = '$password'";
$result = execute_sql("member", $sql, $link);

//如果账号密码错误
if(mysql_num_rows($result) == 0){
	//释放￥result占用的内存
	mysql_free_result("$result");
	//关闭数据连接
	mysql_close($link);	
	echo "<script type='text/javascript'>";
	echo "alert('账号或密码错误，请检查后重新登录');";
	echo "history.back();";
	echo "</script>";
}
//如果正确
else{
	//获取id字段
	$id = mysql_result($result, 0, "id");
	//释放￥result占用的内存
	mysql_free_result($result);
	//关闭数据连接
	mysql_close($link);	
	//将用户加入到cookie
	setcookie("id", $id);
	setcookie("passed", "TRUE");
	header("Location:main.php");	
}

?>