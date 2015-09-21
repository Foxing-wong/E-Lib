<html>
<head>
<title>登錄</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
</head>
<body>
<?php 
	session_start();
	if(!isset($_POST['uname']))
	{
		echo "<script language=javascript>alert ('非法訪問');</script>"; 
		echo "<script language=\"javascript\">";
		echo "document.location=\"../home\"";
		echo "</script>";
		exit();
	}
?>	
<?php
	function getCity($ip)
	{
	$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
	$ipinfo=json_decode(file_get_contents($url));
	if($ipinfo->code=='1'){
	return false;
	}
	$city = $ipinfo->data->region.$ipinfo->data->city;
	return $city;
	}
		function getRealIp()
		{
			$ip=false;
			if(!empty($_SERVER["HTTP_CLIENT_IP"])){
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			}
			if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
				if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
				for ($i = 0; $i < count($ips); $i++) {
					if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
						$ip = $ips[$i];
						break;
					}
				}
			}
			return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
		}
		date_default_timezone_set("PRC");
		$logintime=date('Y-m-d H:i:s');
		$uname= $_POST['uname'];
		$upwd= $_POST['upwd'];
		include("../dbconf.php");
		$sql="select * from userinfo where userid='".$uname."'and userpwd='".$upwd."';";
		$rows=mysqli_query($link,$sql);
		$num=mysqli_num_rows($rows);
		$sql2="insert into loginhistory(username,logintime,loginip,loginAddress,logintype) values('".$uname."','".$logintime."','".getRealIp()."','".getCity(getRealIp())."','Web')";
		if($num==1)
		{
			mysqli_query($link,$sql2);
			echo "<script language=javascript>alert ('登錄成功！頁面即將進行跳轉！！！');</script>"; 
			$_SESSION['username']=$uname;
			$_SESSION['logintime']=$logintime;
			$_SESSION['loginIP']=getRealIp();
			echo "<script language=\"javascript\">";
			echo "document.location=\"".$_SESSION['oldurl']."\"";
			echo "</script>";
		}
		else
		{
			echo "<script language=javascript>alert ('登錄失敗，請檢查用戶賬號與密碼是否匹配！');</script>"; 
			$_SESSION['username']=null;
			echo "<script language=\"javascript\">";
			echo "document.location=\"../home\"";
			echo "</script>";
		}	
?>
</body>
</html>
