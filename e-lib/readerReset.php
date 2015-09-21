<?php 
	session_start();
	if(@$_SESSION['username']=="")
	{
		Header("Location: ../login");
	}
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
	if(@$_POST['admin_oldpwd']==@$_POST['admin_newped'])
	{
		echo "<br><br>";
		echo "<center><br><br>原密碼和新密碼相同，無需更改<br><br>頁面將在二秒鐘之後進行跳轉</center>";
		header("refresh:2;url=reader_reset_pwd.php");
		exit;
	}
	if(@$_POST['admin_newpwd']!=@$_POST['admin_newpwd2'])
	{
		echo "<br><br><br><br>";
		echo "<center><br><br>您輸入的兩次新密碼不相符，請重新輸入<br><br>頁面將在二秒鐘之後進行跳轉</center>";
		header("refresh:2;url=reader_reset_pwd.php");
	}
	else
	{
		include("../dbconf.php");
		$sql="update userinfo set userPWD='".@$_POST['admin_newpwd']."'where userid='".$_SESSION['username']."'and userpwd='".@$_POST['admin_oldpwd']."';";
		mysqli_query($link,$sql);
		$num=mysqli_affected_rows($link);
		if($num>0)
		{
			unset($_SESSION['username']);
			echo "<script>alert(\"密碼更新成功，請重新登錄！\")</script>";
			echo "<script>window.parent.parent.location.href=\"../e-lib\"</script>";
		}
		else
		{
			echo "<br><br><br><br>";
			echo "<center><br>更新失敗！原密碼不正確<br><br>頁面將在二秒鐘之後進行跳轉</center>";
			header("refresh:2;url=reader_reset_pwd.php");
		}
	}
	exit;
?>
</body>
</html>