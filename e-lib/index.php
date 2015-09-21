<?php session_start();
	$_SESSION['oldurl']=$_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"];
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
	include("../nav.html");
	if(@$_SESSION['username']=="")
	{
		Header("Location: ../login");
	}
?>
<div id=Content-Left >
<p align=center><a href="reader_info.php" target="readermain"><img src="img/account.png"></a></p>
<p align=center><a href="reader_reset_pwd.php" target="readermain"><img src="img/pwd.png"></a></p>
<p align=center><a href="reader_apply_VIP.php" target="readermain"><img src="img/check.png"></a></p>
<p align=center><a href="reader_borrow_ing.php" target="readermain"><img src="img/ing.png"></a></p>
<p align=center><a href="reader_borrow_history.php" target="readermain"><img src="img/jyls.png"></a></p>
<p align=center><a href="reader_login_history.php" target="readermain"><img src="img/login_history.png"></a></p>
<p align=center><a href="../login/logout.php" target="_self"><img src="img/logout.png"></a></p>
</div>
<div id =Content-Main>
<iframe src="welcome.html" id="readermain"  frameborder="0" scrolling="auto"  onload="iFrameHeight()" name="readermain" width=790 height=600></iframe>
</div>
</div>
<div id=Footer style="margin-top:600px">
<?php 
	include("../footer.php");
?>
</div>
</div>
</body>
</html>