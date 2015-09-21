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
	include("../../dbconf.php");
	$sql="update bookinfo set bookname ='".$_POST['bookname']."',ISBN='".$_POST['ISBN']."',publisher='".$_POST['publisher']."',introduce='".$_POST['content1']."',sysl='".$_POST['sysl']."' where bookid='".$_POST['bookID']."'";
	mysqli_query($link,$sql);
	$num=mysqli_affected_rows($link);
	if($num>0)
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/ok.png\"><br>更新成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=book_m.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/error.png\"><br>更新失敗<br>可能原因為：ISBN重複<br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=book_m.php");
	}
?>
</body>
</html>