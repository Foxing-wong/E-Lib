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
	include("../dbconf.php");
	$sql="delete from borrowinfo where borrowid='".$_POST['cancelid']."' and status='待審核' and username='".$_SESSION['username']."'";
	if(mysqli_query($link,$sql))
	{
		echo "<br><br><br><br><br>";
		echo "<br><center>取消成功<br><br></center>";
		header("refresh:1;url=reader_borrow_history.php");
	}
	else
	{
		echo "<br><br><br><br><br>";
		echo "<center><br>取消失敗<br>可能原因為：當前狀態不符合取消要求<br>頁面將在二秒鐘之後進行跳轉</center>";
		header("refresh:2;url=reader_borrow_history.php");
	}
?>
</body>
</html>