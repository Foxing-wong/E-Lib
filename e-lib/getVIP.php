<?php session_start();
	if(@$_SESSION['username']=="")
	{
		Header("Location: ../login");
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
	if($_POST['alipayName']!=""&&$_POST['alipayNum']!="")
	{
		date_default_timezone_set("PRC");
		$time=date('Y-m-d H:i:s');
		include("../dbconf.php");
		$sql="INSERT INTO vipinfo(username,alipayname,alipaynum,applytime,result) VALUES ('".$_SESSION['username']."','".$_POST['alipayName']."','".$_POST['alipayNum']."','".$time."','未審核');";
		if(mysqli_query($link,$sql))
		{
			echo "<br><br><br><br><br>";
			echo "<br><center>申請成功，請耐心等待結果<br><br>頁面將在一秒鐘之後進行跳轉</center>";
			header("refresh:1;url=reader_apply_VIP.php");
		}
		else
		{
			echo "<br><br><br><br><br>";
			echo "<center><br>申請失敗<br>可能原因為：支付寶交易編號重複<br>頁面將在二秒鐘之後進行跳轉</center>";
			header("refresh:2;url=reader_apply_VIP.php");
		}
	}
	else
	{
		echo "<br><br><br><br><br>";
		echo "<center><br><h2 style=\"color:red\">支付寶付款賬號及支付寶交易編號尚未填寫</h2><br>頁面將在二秒鐘之後進行跳轉</center>";
		header("refresh:2;url=reader_apply_vip.php");
	}
?>
</body>
</html>