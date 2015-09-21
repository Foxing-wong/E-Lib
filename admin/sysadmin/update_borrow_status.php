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
	include("../../dbconf.php");
	if(@$_POST['changestatus']=="")
	{
		$sql="update borrowinfo set remarks='".@$_POST['beizhu']."' where borrowid='".$_POST['borrowid']."'";
	}else{
		if($_POST['changestatus']=="添加備註")
		{
			$sql="update borrowinfo set remarks='".@$_POST['beizhu']."' where borrowid='".$_POST['borrowid']."'";
		}
		else if($_POST['changestatus']=="借閱中")
		{
			$sql="update borrowinfo set remarks='".@$_POST['beizhu']."',returntime='".($_POST['btime']+10*24*3600)."',status='".@$_POST['changestatus']."' where borrowid='".$_POST['borrowid']."';update bookinfo set sysl=sysl-1 where bookid='".$_POST['bookid']."';";
		}
		else if($_POST['changestatus']=="已歸還")
		{
			$sql="update borrowinfo set remarks='".@$_POST['beizhu']."',status='".@$_POST['changestatus']."' where borrowid='".$_POST['borrowid']."';update bookinfo set sysl=sysl+1 where bookid='".$_POST['bookid']."';";
		}
		else{
		$sql="update borrowinfo set remarks='".@$_POST['beizhu']."',status='".@$_POST['changestatus']."' where borrowid='".$_POST['borrowid']."'";
		}
	}
	mysqli_multi_query($link,$sql);
	$num=mysqli_affected_rows($link);
	if($num>0)
	{
		echo "<br><br><br><br><br><br><center><h3 style=\"color:red\">操作成功<h3></center>";
		header("refresh:1;url=borrow_apply_m.php");
	}
	else
	{
		echo "<br><br><br><br><br><br><center><h3 style=\"color:red\">操作失敗，請聯繫管理員<h3></center>";
		header("refresh:1;url=borrow_apply_m.php");
	}
?>
</body>
</html>