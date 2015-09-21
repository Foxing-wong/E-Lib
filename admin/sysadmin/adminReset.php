<?php 
	session_start();
	if(@$_SESSION['admin_value']=="")
	{
		Header("Location: ../");
	}
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
	if(@$_GET['type']=="elibadminpassword")
	{
		if(@$_POST['admin_oldpwd']==@$_POST['admin_newped'])
		{
			echo "<br><br><br><br>";
			echo "<center><img src=\"img/error.png\"><br><br>原密碼和新密碼相同，無需更改<br><br>頁面將在二秒鐘之後進行跳轉</center>";
			header("refresh:2;url=admin_info.php");
			exit;
		}
		if(@$_POST['admin_newpwd']!=@$_POST['admin_newpwd2'])
		{
			echo "<br><br><br><br>";
			echo "<center><img src=\"img/error.png\"><br><br>您輸入的兩次新密碼不相符，請重新輸入<br><br>頁面將在二秒鐘之後進行跳轉</center>";
			header("refresh:2;url=admin_info.php");
		}
		else
		{
			date_default_timezone_set("PRC");
			$time=date('Y-m-d H:i:s');
		    include("../../dbconf.php");
			$sql="update admininfo set adminpwd='".@$_POST['admin_newpwd']."'where adminname='".$_SESSION['admin_value']."'and adminpwd='".@$_POST['admin_oldpwd']."';";
			mysqli_query($link,$sql);
			$num=mysqli_affected_rows($link);
			if($num>0)
			{
				unset($_SESSION['admin_value']);
				echo "<script>alert(\"密碼更新成功，請重新登錄！\")</script>";
				echo "<script>window.parent.parent.location.href=\"index.php\"</script>";
			}
			else
			{
				echo "<br><br><br><br><br><br><br>";
				echo "<center><img src=\"img/error.png\"><br>更新失敗！原密碼不正確<br><br>頁面將在二秒鐘之後進行跳轉</center>";
				header("refresh:2;url=admin_info.php");
			}
		}
		exit;
	}
	if(@$_GET['type']=="elibadminaccount")
	{
				if(@$_SESSION['is_super']=="0")
				{
					echo "<br><br><br><h3>權限不足</h3><br><br>";
					exit;
				}
		if(@$_POST['admin_olda']==@$_POST['admin_newa'])
		{
			echo "<br><br><br><br>";
			echo "<center><img src=\"img/error.png\"><br><br>原賬號和新賬號相同，無需更改<br><br>頁面將在二秒鐘之後進行跳轉</center>";
			header("refresh:2;url=admin_info.php");
			exit;
		}
		else
		{
			date_default_timezone_set("PRC");
			$time=date('Y-m-d H:i:s');
			include("../../dbconf.php");
			$sql="update admininfo set adminname='".@$_POST['admin_newa']."'where adminname='".$_POST['admin_olda']."'and adminpwd='".@$_POST['admin_pwd']."';";
			mysqli_query($link,$sql);
			$num=mysqli_affected_rows($link);
			if($num>0)
			{
				unset($_SESSION['admin_value']);
				echo "<script>alert(\"賬號更新成功，請重新登錄！\")</script>";
				echo "<script>window.parent.parent.location.href=\"index.php\"</script>";
			}
			else
			{
				echo "<br><br><br><br><br><br><br>";
				echo "<center><img src=\"img/error.png\"><br>更新失敗！原密碼不正確<br><br>頁面將在二秒鐘之後進行跳轉</center>";
				header("refresh:2;url=admin_info.php");
			}
		}
		exit;
	}
	else
	{
		header("refresh:0;url=admin_info.php");
	}
?>
</body>
</html>