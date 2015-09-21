<?php 
	session_start();
	if(@$_SESSION['admin_value']=="")
	{
		Header("Location: ../");
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>賬號信息檢視</title>
	<link rel="stylesheet" type="text/css" href="admin.css"/>
</head>
<body>
<div style="text-align:center">
<div style="margin: 2 auto; text-align:left;">
<img src="../../public/img/news.gif" height=30>E-LIB賬號信息檢視<a class="myButton" style="margin-left:30px;" href="add_admin.php"><span>添加管理員賬號</span></a> 
<a class="myButton" style="margin-left:80px;" href="welcome.html"><span>返回</span></a> <hr>
<div >
<div style="float:left;width:370px;border:1px solid #9bdf70;background:#f0fbeb;height:210" >
<img src="../../public/img/dot.gif" height=30>E-LIB系統狀態<hr>
	<p>系統類型和版本號：<?php echo  php_uname();?></p>
	<p>服務器IP：<?php echo GetHostByName($_SERVER['SERVER_NAME'])?></p>
	<p>服務器端口：<?php echo $_SERVER['SERVER_PORT'] ?></p>
	<p>PHP版本：<?php echo PHP_VERSION ?></p>
</div>
	<div style="float:right;width:370px;border:1px solid #bbe1f1;background:#eefaff;height:210" >
<img src="../../public/img/dot.gif" height=30>E-LIB賬號信息<hr>
	<p>賬 號：<?php echo $_SESSION['admin_value'] ?></p>
	<p>身 份：系統管理員<?php
		if(@$_SESSION['is_super']=="0")
	{
		echo "【普通賬號】";
	}
	else
	{
		echo "【超級賬號】";
	}
	?>
	</p>
	<p>上次登入：<?php echo $_SESSION['old_time'] ?></p>
	<p>本次登入：<?php echo $_SESSION['admin_time'] ?></p>
</div>
</div>
<div style="margin-top:240">
<?php
if(@$_SESSION['is_super']=="0")
	{
		$show= "<br><br><br><h3>權限不足</h3><br><br><br>";
	}
	else
	{
		$show="<form name=\"resetName\" method=\"post\" action=\"adminReset.php?type=elibadminaccount\">
		<div style=\"text-align:center\">
		<p><span style=\"text-align:center\">原賬號</span><input type=\"text\" name=\"admin_olda\" readonly style=\"margin-left:100;width:150\" value=\"".$_SESSION['admin_value']."\" > *自動</p>
		<p>新賬號<input type=\"text\" name=\"admin_newa\" style=\"margin-left:100;width:150\"> *必填</p>
		<p>請輸入密碼確認<input type=\"password\" name=\"admin_pwd\" style=\"margin-left:36;width:150\"> *必填</p></div>
	<center><input type=\"submit\" class=\"addBu\" name=\"button\" value=\"送出\" style=\"margin-left:0px;\" />  
	<input type=\"reset\" class=\"addBu\" name=\"button\" value=\"重置\" style=\"margin-left:100px;\" /></center></form>";	}
?>
<div style="float:left;width:370px;border:1px solid #e3e197;background:#ffffdd" >
<img src="../../public/img/dot.gif" height=30>更改登錄賬號<hr><?php echo $show; ?>
</div>
	<div style="float:right;border:1px solid #a5b6c8;background:#eef3f7;width:370;" ><img src="../../public/img/dot.gif" height=30>變更登錄密碼<hr>
	<form name="resetPwd" method="post" action="adminReset.php?type=elibadminpassword">
		<div style="text-align:center">
		<p><span style="text-align:center">原密碼</span><input type="password" name="admin_oldpwd" style="margin-left:100;width:150"> *必填</p>
		<p>新密碼<input type="password" name="admin_newpwd" style="margin-left:100;width:150"> *必填</p>
		<p>重複一次新密碼<input type="password" name="admin_newpwd2" style="margin-left:36;width:150"> *必填</p></div>
	<center><input type="submit" class="addBu" name="button" value="送出" style="margin-left:0px;" />  
	<input type="reset" class="addBu" name="button" value="重置" style="margin-left:100px;" /></center></form>
</div>
</div>
</div>
</div>
</body>
</html>

