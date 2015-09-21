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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>歡迎光臨E-LIB Book lenging system</title>
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
</head>
<body>
<?php 
	if($_GET['user']!=$_SESSION['admin_value'])
	{
		include("../../dbconf.php");
		$sql="delete from admininfo where adminname='".$_GET['user']."'";
		if(mysqli_query($link,$sql))
		{
			echo "<br><br><br><br><br>";
			echo "<br><center>刪除成功<br><br></center>";
			header("refresh:1;url=add_admin.php");
		}
		else
		{
			echo "<br><br><br><br><br>";
			echo "<center><br>刪除失敗<br><br>頁面將在二秒鐘之後進行跳轉</center>";
			header("refresh:2;url=add_admin.php");
		}
	}	
?>
</body>
</html>