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
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
</head>
<body>
<?php 
	$bookid=$_POST['bookid'];
	include("../dbconf.php");
	$isB="select * from borrowinfo where bookid='".$bookid."' and username='".$_SESSION['username']."'and (status='待審核' or status='借閱中')";
	$ISBR=mysqli_query($link,$isB);
	$num=mysqli_num_rows($ISBR);
	if($num<1)
	{
		$times="select bookinfo.sysl,userinfo.readerVIP from bookinfo,userinfo where bookinfo.bookid='".$bookid."' and userinfo.userID='".$_SESSION['username']."'";
		$sql="insert borrowinfo(username,bookid,borrowtime) values ('".$_SESSION['username']."','".$bookid."','".time()."')";
		$resultcishu=mysqli_query($link,$times);
		if($cishu=mysqli_fetch_array($resultcishu))
		{
			if($cishu[0]>0&&$cishu[1]=="是")
			{
				mysqli_query($link,$sql);
				$num=mysqli_affected_rows($link);
				if($num>0)
				{
					echo "<script>alert(\"申請成功！請等待系統審查\")</script>";
					echo "<script type=\"text/javascript\">window.close(); </script>";
				}
				else
				{
					echo "<script>alert(\"借閱失敗，請聯繫管理員\")</script>";
					echo "<script type=\"text/javascript\">window.close(); </script>";
				}
			}
			else
			{
				if($cishu[0]==0)
				{
					echo "<script>alert(\"剩餘存量不足，請等待\")</script>";
					echo "<script type=\"text/javascript\">window.close(); </script>";
				}
				if($cishu[1]=="否")
				{
					echo "<script>alert(\"尚未進行認證的讀者賬號，無法辦理借閱，請先申請認證\")</script>";
					echo "<script type=\"text/javascript\">window.close(); </script>";
				}
			}
		}
	}
	else
	{
		echo "<script>alert(\"請不要重複借閱！！！\")</script>";
		echo "<script type=\"text/javascript\">window.close(); </script>";
	}
?>
</body>
</html>