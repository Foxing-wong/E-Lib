<?php session_start();
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
<img src="../public/img/more.gif" /> E-LIB讀者密碼變更
<hr>
<div style="margin:100 auto;border:1px solid #a5b6c8;background:#eef3f7;width:370;" ><center><p> E-LIB讀者密碼變更</p></center><hr>
	<form name="resetPwd" method="post" action="readerReset.php">
		<div style="text-align:center">
		<p><span style="text-align:center">原密碼</span><input type="password" name="admin_oldpwd" style="margin-left:100;width:150"> *必填</p>
		<p>新密碼<input type="password" name="admin_newpwd" style="margin-left:100;width:150"> *必填</p>
		<p>重複一次新密碼<input type="password" name="admin_newpwd2" style="margin-left:36;width:150"> *必填</p></div>
	<center><input type="submit" class="addBu" name="button" value="送出" style="margin-left:0px;" />  
	<input type="reset" class="addBu" name="button" value="重置" style="margin-left:100px;" /></center></form>
</div>
</body>
</html>