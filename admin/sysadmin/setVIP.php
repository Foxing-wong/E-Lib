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
	$readerid=$_GET['id'];
	include("../../dbconf.php");
	if($type=="pass")
	{
		$value="是";
	}
	if($type=="cancel")
	{
		$value="否";
	}
	$sql="update userinfo set readervip='".$value."' where id='".$readerid."'";
	mysqli_query($link,$sql);
	$num=mysqli_affected_rows($link);
	if($num>0)
	{
		echo "<br><br><br><br><br><br><center><h3 style=\"color:red\">操作成功<h3></center>";
		header("refresh:1;url=reader_m.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><center><h3 style=\"color:red\">沒有任何改變，無需操作<h3></center>";
		header("refresh:1;url=reader_m.php");
	}
?>
</body>
</html>