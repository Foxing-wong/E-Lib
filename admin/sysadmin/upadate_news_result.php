<?php 
	session_start();
	if(@$_SESSION['admin_value']=="")
	{
		Header("Location: ../");
	}
		if(@$_SESSION['is_super']=="0")
	{
		echo "<br><br><br><h3>權限不足</h3><br><br>";
		exit;
	}
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
	date_default_timezone_set("PRC");
	$time=date('Y-m-d H:i:s');
	include("../../dbconf.php");
	$sql="update news set title='".@$_POST['newstitle']."', content='".@$_POST['content1']."', lasttime='".$time."',isShow='".@$_POST['isShow']."' where id='".@$_POST['newsID']."'";
	if(mysqli_query($link,$sql))
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/ok.png\"><br>更新成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=news_m.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/ok.png\"><br>更新成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=news_m.php");
	}
?>
</body>
</html>