<?php session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
</head>
<body>
<?php
	if(@$_SESSION['admin_value']=="")
	{
		Header("Location: ../admin");
	}
	else
	{
		unset($_SESSION['admin_value']);
		echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"sysadmin/img/ok.png\"><br>登出成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=../admin/");
	}
			
?>
</body>
</html>
