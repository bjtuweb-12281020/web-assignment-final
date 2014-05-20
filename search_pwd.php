<?php
header("Content-Type: text/html; charset=utf-8");
require_once("dbtools.inc.php");
$account = $_POST["account"];
$email = $_POST["email"];

$link = creat_connection();

$sql = "SELECT password FROM users WHERE account = '$account' AND email = '$email'";
$result = execute_sql("member", $sql, $link);

if(mysql_num_rows($result) == 0){
	echo "<script type='text/javascript'>";
	echo "alert('您查询的用户不存在或验证邮箱不正确，请重新输入！');";
	echo "hitory.back();";
	echo "</script>";
}
else{
	$password = mysql_result($result, 0, "password");
	$message = "您的账号为 $account,密码 $password";
	$message = iconv("UTF-8", "Gb2312", $message);
	mail($email, iconv("UTF-8", "Gb2312", "查询密码"), $message);
	
	echo "$account, 您的密码已经寄至 $email<br>";
	echo "<a href='index.html'>登录</a>";
}

mysql_free_result($result);
mysql_close($link);	
?>