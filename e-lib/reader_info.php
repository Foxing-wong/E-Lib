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
<img src="../public/img/more.gif" /> E-LIB讀者個人信息檢視
<hr>
<div style="text-align:left;border:1px solid #9bdf70;background:#f0fbeb;" >
<span style="color:red;">【e-lib用戶協定】
为有效利用e-lib賬號资源，维护用户合法权益，特制订《e-lib賬號规则》。请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款，以及开通或使用某项服务的单独协议，并选择接受或不接受。限制、免责条款可能以加粗形式提示您注意。
除非您已阅读并接受本规则所有条款，否则您无权申请或使用e-lib賬號。您申请或使用e-lib賬號的行为即视为您已阅读并同意受本规则的约束。</span><br>
<?php 
	include("../dbconf.php");
	$sql="select * from userinfo where userID='".$_SESSION['username']."'";
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_array($result))
	{
		if($row[9]=="是")
		{
			$nametype= "賬號類型：已認證讀者，貴賓用戶，可辦理借閱";
		}
		else
		{
			$nametype= "賬號類型：未認證讀者，無法辦理借閱，請申請認證";
		}
		echo "<p>賬號：".$row[1]."【".$nametype."】</p>";
		echo "<p style=\"color:red\">本次登入IP：".$_SESSION['loginIP']."</p>";
		echo "<p style=\"color:red\">本次登入時間：".$_SESSION['logintime']."</p>";
		echo "<p>姓名：".$row[2]."</p>";
		echo "<p>性別：".$row[4]."</p>";
		echo "<p>聯繫地址：".$row[5]."</p>";
		echo "<p>身份證號：".$row[6]."</p>";
		echo "<p>聯繫郵箱：".$row[7]."</p>";
		echo "<p>加入時間：".$row[8]."</p>";
	}
		?>
		
</div>
</body>
</html>