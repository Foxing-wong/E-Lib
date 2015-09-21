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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
	include("../../dbconf.php");
	$sql="delete from bookinfo where bookid='".$_GET['id']."'";
	if(mysqli_query($link,$sql))
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/ok.png\"><br>刪除成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=book_m.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/error.png\"><br>刪除失敗<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=book_m.php");
	}
?>