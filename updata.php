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
	$sql = "UPDATE users SET password = '$password', name = '$name', sex = '$sex',
	 year = '$year', month = '$month', day = '$day', telephone = '$telephone', email = '$email'";
	$result = execute_sql("member", $sql, $link);
	//关闭数据连接
	mysql_close($link);	
	}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>修改会员资料成功</title>

<style type="text/css">
	#A {
		text-align:center;
		background-color:#CFF;
		font-size:24px;
	}
</style>
</head>

<body>
 <div id="A">
	<?php echo $name ?> <p>恭喜修改资料成功！</p>
	<a href="main.php">回首页</a>
 </div>
</body>
</html>
