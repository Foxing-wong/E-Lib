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
<div>
<div  style="height:300px;width:604px;float:left;"><img src="../public/img/loginE.jpg"/></div>
<div style="margin-left:100px;height:300px;width:250px;float:left;">
<form name=login method="post" action="../login/login.php">
</br>
賬號：<input type="text" name="uname" style="width:200"><br><br>
密碼：<input type="password" name="upwd" style="width:200"><br><br>
<input type="submit" value="送   出" style="margin-left:30px;"><input type="reset" value="清   除" style="margin-left:50px;">
</form>
</div>
</div>
</div>
<div id="Footer" style="margin-top:350px">
<?php 
	include("../footer.php");
?>
</div>
</body>
</html>