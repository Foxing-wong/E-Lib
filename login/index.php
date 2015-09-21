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
?>
<div style="margin-top:40px">
<div  style="margin-left:46px;height:300px;width:604px;float:left;border:1px solid #bbe1f1;"><center><img src="../public/img/loginE.jpg"/></center></div>
<div style="margin-left:50px;height:300px;width:300px;float:left;border:1px solid #bbe1f1;background:#eefaff;">
<center><div style="height:120px;background:white;"><br><br><img name=loginimg src="../public/img/login.png"/><br></div>
<div style="margin-top:10px;">
<form name=login method="post" action="../login/login.php">
</br>
賬號：<input type="text" name="uname" style="width:200"><br><br>
密碼：<input type="password" name="upwd" style="width:200"><br><br>
<input type="submit" value="送   出" style="margin-left:30px;"><input type="reset" value="清   除" style="margin-left:50px;">
</form>
<p>E-LIB Book Lending System</p></div></center>
</div>
</div>
</div>
<div id="Footer" style="margin-top:400px">
<?php 
	include("../footer.php");
?>
</div>
</body>
</html>