<?php session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
</head>
<body>
<?php
	if(@$_SESSION['username']=="")
	{
		Header("Location: ../login");
	}
	else
	{
		echo "<script language=javascript>alert ('登出成功！頁面即將進行跳轉！！！');</script>"; 
		unset($_SESSION['username']);
		echo "<script language=\"javascript\">";
		echo "document.location=\"".$_SESSION['oldurl']."\"";
		echo "</script>";
	}
			
?>
</body>
</html>
