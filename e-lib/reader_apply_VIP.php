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
<img src="../public/img/more.gif" /> E-LIB讀者申請認證
<hr>
<div style="text-align:left;border:1px solid #9bdf70;background:#f0fbeb;" >
<p style="color:red;">【e-lib用戶認證提醒】
未認證用戶僅可以查詢館藏，無法辦理借閱<a class="myButton" href="vip_history.php">查看我的申請歷史</a></p><hr>
<?php 
	include("../dbconf.php");
	$sql="select * from userinfo where userID='".$_SESSION['username']."'";
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_array($result))
	{
		echo "<p>賬號：".$row[1]."</p>";
		if($row[9]=="是")
		{
			echo "<p style=\"color:red;font-weight:bold;\">當前類型：已認證讀者，貴賓用戶，可辦理借閱</p>";
		}
		else
		{
			echo "<p style=\"color:red;font-weight:bold;\">當前類型：未認證讀者，無法辦理借閱，請申請認證</p>";
			echo "<form name=\"VIP\" method=\"post\" action=\"getVIP.php\">
		<div style=\"text-align:center\">
		<p><span style=\"text-align:center\">支付寶付款賬號：</span><input type=\"text\" name=\"alipayName\" style=\"margin-left:100;width:150\"> *必填</p>
		<p>支付寶交易編號：<input type=\"text\" name=\"alipayNum\" style=\"margin-left:100;width:150\"> *必填</p>
		</div>
	<center><input type=\"submit\" class=\"myButton\" name=\"button\" value=\"在線申請認證\" style=\"margin-left:0px;\" /></center></form>";
			echo "<p style=\"color:red;font-weight:bold;\">繳納RMB200元保證金即可申請認證；</p><p><span style=\"background-color:red;color:black;font-weight:bold;font-size:25;\">收款賬號：e-lib@e-lib.com</span></p><p>申請認證處理時間為48小時，請耐心稍後，處理結果發送至聯繫郵箱</p>";
		}
		echo "<p>加入時間：".$row[8]."</p>";
	}
		?>
		
</div>
</body>
</html>