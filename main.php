<?php
	//检查cookie中的passed变量是否等于TRUE
	$passed = $_COOKIE["passed"];
	if($passed != TRUE){
		header("Location:index.html");
		exit();
	}	
?>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>会员主页</title>		

<style type="text/css">
	#A {
		text-align:center;
		background-color:#CCC;
		color:#90F;
	}
	#B0 {
		text-align:center;
		background-color:#0CF;
		font-size:20px;
	}
	#B1 {
		text-align:center;
		background-color:#FC3;
		font-size:20px;
	}
	#B2 {
		text-align:center;
		background-color:#F99;
		font-size:20px;
	}
	#B3 {
		text-align:center;
		background-color:#96F;
		font-size:20px;
	}
</style>
		
</head>

<body>
<div id="A">
<h1>欢迎您的登录！</h1>
<h2>您可以选择以下功能！</h2>
</div>
<div id="B0">
<a href="group.php">去讨论区</a><br>
</div>
<div id="B1">
<a href="modify.php">修改我的资料</a><br />
</div>
<div id="B2">
<a href="delete.php">删除账户</a><br />
</div>
<div id="B3">
<a href="logout.php">退出登录</a>
</div>

</body>
</html>