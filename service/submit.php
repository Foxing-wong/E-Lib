<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
</head>
<body>
<?php 
	session_start();
	if(@$_POST['userinfo']==""||@$_POST['type']==""||@$_POST['MSG']=="")
	{
		echo "<script language=javascript>alert ('資料填寫不完整，頁面即將跳轉跳轉到原頁面');</script>"; 
		echo "<script language=\"javascript\">";
		echo "document.location=\"".$_SESSION['oldurl']."\"";
		echo "</script>";
	}
	else
	{
		if(strpos(@$_POST['userinfo'],"@") === false){
		echo "<script language=javascript>alert ('請輸入正確的郵箱地址');</script>"; 
		echo "<script language=\"javascript\">";
		echo "document.location=\"".$_SESSION['oldurl']."\"";
		echo "</script>";
		}
		else
		{
			date_default_timezone_set("PRC");
			$time=date('Y-m-d H:i:s');
			include("../dbconf.php");
			$sql="insert into service(suser,stype,scontent,stime)values('".@$_POST['userinfo']."','".@$_POST['type']."','".@$_POST['MSG']."','".$time."')";
			if(mysqli_query($link,$sql))
			{
				echo "<script language=javascript>alert ('感謝您的反饋，我司將在24小時內處理完畢，并發送處理意見到您的郵箱！請留意郵箱結果通知！');</script>"; 
				echo "<script language=\"javascript\">";
				echo "document.location=\"".$_SESSION['oldurl']."\"";
				echo "</script>";
			}
			else
			{
				echo "<script language=javascript>alert ('失敗，請聯繫管理員');</script>"; 
				echo "<script language=\"javascript\">";
				echo "document.location=\"".$_SESSION['oldurl']."\"";
				echo "</script>";
			}
		}
		
	}
?>

</body>
</html>