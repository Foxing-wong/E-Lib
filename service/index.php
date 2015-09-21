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
?>
<div style="margin-top:27px;border: 1px solid #CCC;">
<div style="margin-left:27px;">
<p>E-LIB在線反饋</p>
<form method="post" name="user_Opinion" action="submit.php" >
<p>
您的郵箱：<input type="text" name="userinfo" onfocus="if(value=='請輸入您的郵箱賬號') {value=''}" onblur="if(value=='') {value='請輸入您的郵箱賬號'}"> *</p>
<p><label style="float:left">反饋類型：</label>
<input type="radio" name="type" value="咨詢" checked="checked" />咨詢
<input type="radio" name="type" value="建議" />建議
<input type="radio" name="type" value="投訴" />投訴
</p>
<p><label style="float:left">意見描述：</label><textarea name="MSG" cols=94 rows=10>
</textarea>
</p><button id="searchBtn" style="margin-left:80px;vertical-align: middle;height:23px;width:84px;background-image:url(../public/img/submit.jpg);background-repeat:no-repeat;"type="submit"></button>
</form>
</div>
</div>
</div>
<div id=Footer style="margin-top:50">
<?php 
	include("../footer.php");
?>
</div>
</body>
</html>