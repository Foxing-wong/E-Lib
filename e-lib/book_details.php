<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
</head>
<body>
<img src="../public/img/more.gif" />書籍信息檢視
<a class="myButton" href="reader_borrow_history.php" >返回</a>
<hr>
<?php
	include("../dbconf.php");
	$sql="select * from bookinfo where bookid ='".$_GET['bookid']."'";
	$rows=mysqli_query($link,$sql);
	$num=mysqli_num_rows($rows);
	if($num>0)
	{
		for($i=0;$i<$num;$i++)
		{
			$row=mysqli_fetch_row($rows);
			echo "<p>書籍編號：".$row[0]."</p>";
			echo "<p>書名：".$row[1]."</p>";
			echo "<p>ISBN：".$row[2]."</p>";
			echo "<p>在庫剩餘數量：".$row[5]."</p>";
			echo "<p>最近借閱到期時間：".$row[6]."</p>";
			echo "<p>出版社：".$row[3]."</p>";
			echo "<p>書籍簡介：<div style=\"background-color:#EBF7FC\">".$row[4]."</div></p>";
		}
	} 
?>
</body>
</html>