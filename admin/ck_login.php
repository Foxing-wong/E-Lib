<?php 
	session_start();
	if(!isset($_POST['adminname']))
	{
		echo "<script language=javascript>alert ('非法訪問');</script>"; 
		echo "<script language=\"javascript\">";
		echo "document.location=\"../admin\"";
		echo "</script>";
		exit();
	}
?>	
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
</head>
<body>
<div id=Container>
<?php
		include("../dbconf.php");
		$sql="select * from admininfo where adminname='".$_POST['adminname']."'and adminpwd='".$_POST['adminpwd']."';";
		$rows=mysqli_query($link,$sql);
		$num=mysqli_num_rows($rows);
		if($num==1)
		{
			date_default_timezone_set("PRC");
			$row=mysqli_fetch_array($rows);
			$_SESSION['old_time']=$row['3'];
			$_SESSION['is_super']=$row['4'];
			$_SESSION['admin_time']=date('Y年m月d日H時i分s秒'); 
			$sql2="update admininfo set lasttime='".$_SESSION['admin_time']."' where adminname='".$_POST['adminname']."';";
			mysqli_query($link,"set names 'utf8'");
			mysqli_query($link,$sql2);
			$_SESSION['admin_value']=$_POST['adminname'];
			echo "<br><br><br><br><br><br><br>";
			echo "<center><img src=\"sysadmin/img/ok.png\"><br>登錄成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
			header("refresh:1;url=sysadmin/");
		}
		else
		{
			$_SESSION['admin_value']=null;
			echo "<br><br><br><br><br><br><br>";
			echo "<center><img src=\"sysadmin/img/error.png\"><br>登錄失敗<br><br>頁面將在一秒鐘之後進行跳轉</center>";
			header("refresh:1;url=../admin/");
		}	
?>
<br><br><br>
</div>
</body>
</html>