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
		$sql = "SELECT *FROM users Where id = $id";
		$result = execute_sql("member", $sql, $link);
		$row = mysql_fetch_assoc($result);
	}
?>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>修改资料</title>

<head>
<style type="text/css">
	#A {
		margin-left:500px;
		margin-right:500px;
		background-color:#CFF;
	}
	
	#C {
		background-color:#CFF;
	}
</style>
	<script type="text/javascript">
		function check_data(){
			if(document.myForm.password.value.length == 0)
			{
				alert("密码不能为空哦！");
				return false;
			}
			if(document.myForm.password.value.length > 10)
			{
				alert("密码不能超过10个字符哦！");
				return false;
			}
			if(document.myForm.re_password.value.length == 0)
			{
				alert("确认密码不能空着哦！");
				return false;
			}
			if(document.myForm.re_password.value != document.myForm.password.value)
			{
				alert("两次输入的密码不一致！");
				return false;
			}
			myForm.submit();
		}
			
    </script>
</head>

<body>
<div id="C">
<div id="A">
<form action="updata.php" method="post" name="myForm">
	<font color="#FF0066">账号：</font>
    <?php echo $row["account"] ?><br>
	<font color="#000099">密码：</font>
    <input name="password" type="password" size="15" value="<?php echo $row["password"] ?>"><br>
    <font color="#000099">确认密码：</font>
    <input name="re_password" type="password" size="15" value="<?php echo $row["password"] ?>"><br>
    <font color="#FF0066">昵称：</font>
    <input name="name" type="text" size="15" value="<?php echo $row["name"] ?>"><br>
    <input name="sex" type="radio" value="男">男<br>
 	<input name="sex" type="radio" value="女">女<br>
    <input name="year" type="text" size="2" value="<?php echo $row["year"] ?>">年
    <input name="month" type="text" size="2" value="<?php echo $row["month"] ?>">月
    <input name="day" type="text" size="2" value="<?php echo $row["day"] ?>">日<br>
    <font color="#00CC00">电话：</font>
    <input name="telephone" type="text" size="20" value="<?php echo $row["telephone"] ?>"><br>
    <font color="#00CC00">邮箱：</font>
    <input name="email" type="text" size="30" value="<?php echo $row["email"] ?>"><br>
    <input type="button" onClick="check_data()" value="修改">
    <input type="reset" value="重填"><br><br>
</form>
</div>
</div>
 
</body>
</html>
<?php
	//释放$result占用的内存
	mysql_free_result($result);
	mysql_close($link);	
?>
