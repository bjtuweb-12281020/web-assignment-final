<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>讨论区</title>		

<style type="text/css">
	#A {
		margin-left:250px;
		margin-right:250px;
		background-color:#C1FFC1;
	}
	
	#B {
		text-align:center;
		background-color:#BDE37D;
		font-size:26px;
	}
	
	#C{
		text-align:center;
	}
	#D {
		text-align:center;
		background-color:#DDD;
	}
	#E{
		text-align:center;
		background:#7BF;
		font-size:20px;
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
	
	//指定每页显示几条记录
	$records_per_page = 5;
	
	//获取要显示的第几页的记录
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	else{
		$page = 1;
	}
	
	//创建数据连接
	$link = creat_connection();
	$sql = "SELECT id,author,subject,date FROM message ORDER BY date DESC";
	$result = execute_sql("news", $sql, $link);
	
	$total_records = mysql_num_rows($result);
	//ceil() 函数向上舍入为最接近的整数
	$total_page = ceil($total_records/$records_per_page);
	$start_record = $records_per_page * ($page - 1);
	mysql_data_seek($result, $start_record);
	
	//显示记录
	echo "<p id='B'>欢迎来到讨论区</p><br><br>";

	$j = 1;
	while($row = mysql_fetch_assoc($result) and $j <= $records_per_page){
		echo "<div id='A'>";	
		echo "作者：".$row["author"]."<br>";
		echo "主题：".$row["subject"]."<br>";
		echo "时间：".$row["date"]."<br>";
		echo "<a href='show_news.php?id=";
		echo $row["id"]."'>加入讨论</a><br>";
		echo "</div>";
		
		echo "<p id='C'>————————————————————————————————————————————————————————</p>";
		$j++;
	}
	
	//生成导航栏
	echo "<p align='center'>";
		if($page > 1){
			echo "<a href='group.php?=".($page-1)."'> 上一页</a>";
		}
		
		for($i = 1; $i <= $total_page; $i++){
			if($i == $page){
				echo "$i";
			}
			else{
				echo "<a href='group.php?page=$i'>$i </a>";
			}
		}
		
		if($page < $total_page){
			echo "<a href='group.php?=".($page+1)."'> 下一页</a>";
		}

		echo "</p>";
		
	echo "<p id='E'>发表新主题</p>";
	mysql_free_result($result);
	mysql_close($link);	
?>

<form name="myForm" method="post" action="post.php">
<div id="D">
作者 <input name="author" type="text" size="50"><br>
主题 <input name="subject" type="text" size="50"><br>
内容 <textarea name="content" cols="50" rows="5"></textarea><br>
    <input type="button" onClick="check_data()" value="发表">
    <input type="reset" value="重新输入"><br><br>
    <a href="main.php">回我的主页</a>
</form>
</div>

</body>
</html>