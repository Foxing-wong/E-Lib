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
	$borrowid=$_GET['id'];
	include("../dbconf.php");
	$times="select borrowtimes from borrowinfo where borrowid='".$borrowid."' and username='".$_SESSION['username']."'";
	$sql="update borrowinfo set borrowtimes=borrowtimes+1,returntime=returntime+10*24*3600 where borrowid='".$borrowid."'and username='".$_SESSION['username']."'";
	$resultcishu=mysqli_query($link,$times);
	if($cishu=mysqli_fetch_array($resultcishu))
	{
		if($cishu[0]<3)
		{
			mysqli_query($link,$sql);
			$num=mysqli_affected_rows($link);
			if($num>0)
			{
				echo "<script>alert(\"續借成功！時間延長10天\")</script>";
				header("refresh:0;url=reader_borrow_ing.php");
			}
			else
			{
				echo "<br><br><br><br>";
				echo "<center><br>續借失敗<br><br>頁面將在二秒鐘之後進行跳轉</center>";
				header("refresh:2;url=reader_borrow_ing.php");
			}
		}
		else
		{
			echo "<script>alert(\"續借次數超過三次，無法續借\")</script>";
			header("refresh:0;url=reader_borrow_ing.php");
		}
	}
	
?>
</body>
</html>