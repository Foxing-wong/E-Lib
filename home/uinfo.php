<?php 
	if(!isset($_SESSION['username']))
	{
		echo "<form name=login method=\"post\" action=\"../login/login.php\">
		</br>賬號：<input type=\"text\" name=\"uname\" size=18><br><br>
		密碼：<input type=\"password\" name=\"upwd\" size=18><br><br>
		<input type=\"submit\" value=\"送   出\" style=\"margin-left:30px;\"><input type=\"reset\" value=\"清   除\" style=\"margin-left:50px;\">
		</form>";
	}
	else
	{
		echo "<p>賬號：".$_SESSION['username']
		."</p><p>本次登入IP：".$_SESSION['loginIP']."</p>";
		echo "<center><a href='../e-lib'><button type=\"button\">進入我的E館</button></a></center>";
	}
	
?>	