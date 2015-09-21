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
	$sql="INSERT INTO admininfo(adminname,adminpwd,is_super) VALUES ('".$_POST['admin_name']."','".$_POST['admin_pwd']."','".$_POST['umain']."');";
	if(mysqli_query($link,$sql))
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/ok.png\"><br>新增成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=add_admin.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/error.png\"><br>新增失敗<br>可能原因為：賬號重複<br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=add_admin.php");
	}
?>
</body>
</html>