<?php
require_once("dbtools.inc.php");
//获取窗体数据
$account = $_POST["account"];
$password = $_POST["password"];
$name = $_POST["name"];
$sex = $_POST["sex"];
$year = $_POST["year"];
$month = $_POST["month"];
$day = $_POST["day"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];

//创建数据连接
$link = creat_connection();

//检查账号是否已经使用、
$sql = "SELECT * FROM users Where account = '$account'";
$result = execute_sql("member", $sql, $link);

//账号已经被使用
if(mysql_num_rows($result) != 0){
	//释放￥result占用的内存
	mysql_free_result("$result");
	//显示消息要求用户更换账号名称
	echo "<script type='text/javascript'>";
	echo "alert('该账户已经被使用！请使用其他账号');";
	echo "history.back();";
	echo "</script>";
}
//如果账号没有人使用
else{
	//释放￥result占用的内存
	mysql_free_result($result);
	//知行SQL命令添加该账号
	$sql = "INSERT INTO users (account, password, name, sex, year, month, day, telephone, email) VALUES 
	('$account', '$password', '$name', '$sex', '$year', '$month', '$day', '$telephone', '$email')";
	
	$result = execute_sql("member", $sql, $link);
}

mysql_close($link);
?>

<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>注册成功</title>

<body>
<p>恭喜您注册成功，请牢记以下信息：</p>
 账号：<?php echo $account ?><br />
 密码：<?php echo $password ?><br />
 <a href="index.html">现在登录</a>
</body>
</html>
