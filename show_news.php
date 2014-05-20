<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>回复主题—讨论区</title>		

<style type="text/css">
	#A {
		margin-left:250px;
		margin-right:250px;
		background-color:#D2FFFF;
	}
	#B {
		text-align:center;
		background-color:#B0E6FF;
		font-size:26px;
	}
	#C{
		text-align:center;
		font-weight:200;
	}
	#D {
		text-align:center;
		background-color:#D5AAFF;
		font-size:22px;
	}
	#E {
		margin-left:250px;
		margin-right:250px;
		background-color:#FFC8FF;
	}
	#F {
		text-align:center;
		background-color:#DDD;
	}
	
</style>

<script type="text/javascript">
		function check_data(){
			if(document.myForm.author.value.length == 0)
			{
				alert("作者不能为空哦！");
				return false;
			}
			if(document.myForm.subject.value.length == 0)
			{
				alert("主题不能为空哦！");
				return false;
			}
			if(document.myForm.content.value.length == 0)
			{
				alert("内容不能为空哦！");
				return false;
			}
			myForm.submit();
		}
</script>

</head>

<body>
<?php
	require_once("dbtools.inc.php");
	
	//获取要显示的记录
	$id = $_GET["id"];
	
	//创建数据连接
	$link = creat_connection();
	$sql = "SELECT * FROM message WHERE id = $id";
	$result = execute_sql("news", $sql, $link);
	
	//显示原讨论主题的内容
	echo "<p id='B'>回复主题</p><br><br>";
	echo "<p id='C'>—————————————————————————原主题——————————————————————————</p>";
	while($row = mysql_fetch_assoc($result)){
		echo "<div id='A'>";	
		echo "<td>作者：".$row["author"]."<br>";
		echo "主题：".$row["subject"]."<br>";
		echo "时间：".$row["date"]."<br>";
		echo $row["content"]."<br>";
		echo "</div>";
	}
	echo "<p id='C'>———————————————————————————————————————————————————————</p>";
	
	mysql_free_result($result);
	
	$sql = "SELECT * FROM reply_message WHERE reply_id = $id";
	$result = execute_sql("news", $sql, $link);
	
	if(mysql_num_rows($result) <> 0){
		echo "<p id= 'D'>跟帖</p><br>";
		while($row = mysql_fetch_assoc($result)){
			echo "<div id='E'>";
			echo "<td>作者：".$row["author"]."  ";
			echo "主题：".$row["subject"]."  ";
			echo "时间：".$row["date"]."<br>";
			echo $row["content"]."<br>";
			echo "</div>";
			echo "<p id='C'>————————————————————————————————————————————————————————</p>";
		}
	}

	mysql_free_result($result);
	mysql_close($link);	
?>

<form name="myForm" method="post" action="post_reply.php">
	<div id="F">
    <input name="reply_id" type="hidden" value="<?= $id ?>"><br>

作者 <input name="author" type="text" size="50"><br>
主题 <input name="subject" type="text" size="50"><br>
内容 <textarea name="content" cols="50" rows="5"></textarea><br>
    <input type="button" onClick="check_data()" value="发表">
    <input type="reset" value="重新输入"><br><br>
</form>

<a href="group.php">回讨论区主页</a>

<a href="main.php">回我的主页</a>
</div>

</body>
</html>