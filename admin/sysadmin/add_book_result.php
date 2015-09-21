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
	$sql="INSERT INTO bookinfo(bookname,ISBN,publisher,introduce,sysl) VALUES ('".$_POST['bookname']."','".$_POST['ISBN']."','".$_POST['publisher']."','".$_POST['content1']."','".$_POST['sysl']."');";
	if(mysqli_query($link,$sql))
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/ok.png\"><br>新增成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=book_m.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/error.png\"><br>新增失敗<br>可能原因為：ISBN重複<br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=book_m.php");
	}
?>
</body>
</html>