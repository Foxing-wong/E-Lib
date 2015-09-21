<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>
<?php
	date_default_timezone_set("PRC");
	$time=date('Y-m-d H:i:s');
	include("../dbconf.php");
	echo "<br><br>";
	$sql="INSERT INTO userinfo(userID,userName,userPwd,userSex,userAddress,userCardId,userMail,regTime) 
	VALUES ('".$_POST['t_UserName']."','".$_POST['iptNickName']."','".$_POST['t_UserPass']."','".$_POST['rb_Sex']."','".$_POST['iptName']."','".$_POST['iptCard']."','".$_POST['t_Email']."','".$time."')";
	if(mysqli_query($link,$sql))
	{
		echo "<center><h3>加入成功</h3></center>"; 
		echo "<center><br><a href=\"../login/\" target=\"_parent\">去登錄</a></center>";
	}
	else
	{
		echo "<center><h3>失敗，賬號重複</h3></center>"; 
		echo "<center><a href=\"../join/\" target=\"_parent\">再試一次</a></center>";
	}
?>
</body>
</html>