<?php session_start();
	$_SESSION['oldurl']=$_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"];
	$id=@$_GET['id'];
	include("../dbconf.php");
	$sql="select * from news where id='".$id."'and isshow='1'";
	$sql2="update news set times=times+1 where id='".$id."'and isshow='1'";
	mysqli_query($link,$sql2);
	$rows=mysqli_query($link,$sql);
	$num=mysqli_num_rows($rows);
	$row=mysqli_fetch_row($rows);
	$title=$row[1];
	$content=$row[2];
?>
<html>
<head>
<?php 
	if($num>0)
	{
		echo "<title>".$title."</title>";
	}
	else
	{
		echo "<title>Sorry，E-lib開小差去了，請到服務中心反饋，謝謝！</title>";
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
</head>
<body>
<div id=Container>
<?php 
	include("../nav.html");
?>
<div>
<?php 
	if($num>0)
	{
		echo "<center><h2>".$title."</h2></center>";
		echo "<hr style=\"width: 1018px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
		echo "<center>發佈時間：".$row[3]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
		."最後修改時間：".$row[5]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
		"閱讀次數：<span style=\"color:red\">".$row[6]."</span>次";
		echo "</center><hr style=\"width: 1018px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
		echo $content; 
		echo "<center><a href=\"#\" onClick='window.close()'>[关闭]</a></center><br>";
	}
	else
	{
		echo "<center><br><br><br><br><br><br>Sorry，E-lib開小差去了，請到服務中心反饋，謝謝！";
		echo "<br><br><br><br><a href=\"#\" onClick='window.close()'>[关闭]</a><br></center><br>";
	}
?></div>
</div>
<div id=Footer>
<?php 
	include("../footer.php");
?>
</div>
</body>
</html>