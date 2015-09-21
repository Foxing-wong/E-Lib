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
	$type=$_GET['type'];
	$vipid=$_GET['id'];
	$userid=$_GET['reader'];
	include("../../dbconf.php");
	if($type=="pass")
	{
		$value="是";
		$vipvalue="已通過";
	}
	if($type=="refuse")
	{
		$value="否";
		$vipvalue="已拒絕";
	}
	$sql="update vipinfo set result='".$vipvalue."' where id='".$vipid."'";
	mysqli_query($link,$sql);
	$num=mysqli_affected_rows($link);
	$sql1="update userinfo set readervip='".$value."' where userid='".$userid."'";
	mysqli_query($link,$sql1);
	$num1=mysqli_affected_rows($link);
	if($num>0)
	{
		echo "<br><br><br><br><br><br><center><h3 style=\"color:red\">操作成功<h3></center>";
		header("refresh:1;url=readerm.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><center><h3 style=\"color:red\">操作失敗<h3></center>";
		header("refresh:1;url=readerm.php");
	}
?>
</body>
</html>