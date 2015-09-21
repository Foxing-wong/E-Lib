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
	$bookid=@$_GET['bookid'];
	include("../nav.html");
?>
<div style="background-color:#EBF7FC">
<div style="margin-left:200px;margin-right:200px; >
<img src="../public/img/dot.gif"/>瀏覽書籍詳細信息<hr>
<?php
	include("../dbconf.php");
	$sql="select * from bookinfo where bookid ='".$bookid."'";
	$rows=mysqli_query($link,$sql);
	$num=mysqli_num_rows($rows);
	if($num>0)
	{
		for($i=0;$i<$num;$i++)
		{
			$row=mysqli_fetch_row($rows);
			echo "書籍編號：".$row[0]."<br>";
			echo "<hr style=\"width: 620px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
			echo "書名：".$row[1]."<br>";
			echo "<hr style=\"width: 620px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
			echo "ISBN：".$row[2]."<br>";
			echo "<hr style=\"width: 620px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
			echo "在庫剩餘數量：".$row[5]."<br>";
			echo "<hr style=\"width: 620px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
			echo "出版社：".$row[3]."<br>";
			echo "<hr style=\"width: 620px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
			echo "書籍簡介：<div style=\"background-color:#EBF7FC\">".$row[4]."</div>";
			echo "<hr style=\"width: 620px;display:inline-block;line-height: 30px;vertical-align: middle;border: 1px dashed #CCC;\">";
			if(@$_SESSION['username']!="")
			{
				echo "<form method=\"post\" action=\"borrow_result.php\"><input  type=\"hidden\" value=\"".$bookid."\" name=\"bookid\">可用操作：<input class=\"myButton\" type=\"submit\" value=\"申請借閱\" ></form>";
			}
			else
			{
				echo "可用操作：您尚未登入，無法辦理借閱，請先<a href=\"../login\">[登入]</a>！";
			}
		}
	} 
?>
</div></div>
<div id=Footer>
<?php 
	include("../footer.php");
?>
</div>
</div>

</body>
</html>