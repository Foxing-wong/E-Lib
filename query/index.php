<?php session_start();
	$_SESSION['oldurl']=$_SERVER['PHP_SELF'].$_SERVER["QUERY_STRING"];
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
<center><p><img src="../public/img/so.png"></p>
<form method="get" name="query" action="result.php" style="height:34px;margin:40px auto 0 auto;">
<p>
<input type="text" name="keywords" style="vertical-align: middle;width:315px;height:34px;border:2px solid #d3d3d3;">
<button id="searchBtn" style="vertical-align: middle;height:34px;width:86px;background-image:url(../public/img/searchbg.png);background-repeat:no-repeat;"type="submit"></button>
</p>
<p><input type="radio" name="type" value="bookname" checked="checked" />書名&nbsp;&nbsp;&nbsp;
<input type="radio" name="type" value="ISBN" />ISBN&nbsp;&nbsp;&nbsp;
<input type="radio" name="type" value="publisher" />出版商&nbsp;&nbsp;&nbsp;
<input type="radio" name="type" value="news" />站內新聞/公告&nbsp;&nbsp;&nbsp;</p>
</form>
</center>
</div>
<div id=Footer style="margin-top:80px">
<?php 
	include("../footer.php");
?>
</div>
</body>
</html>