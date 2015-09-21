<?php 
	session_start();
	if(@$_SESSION['admin_value']=="")
	{
		Header("Location: ../");
	}
		if(@$_SESSION['is_super']=="0")
	{
		echo "<br><br><br><h3>權限不足</h3><br><br>";
		exit;
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
	$del_id=@$_POST['del_id'];
    if($del_id!=""){ 
    $del_num=count($del_id); 
	include("../../dbconf.php");
    for($i=0;$i<$del_num;$i++)
	{ 
		mysqli_query($link,"Delete from news where id='$del_id[$i]'");
    }
	echo "<br><br><br><br><br><br><br>";
	echo "<center><img src=\"img/ok.png\"><br>刪除成功<br><br>頁面將在一秒鐘之後進行跳轉</center>";
	header("refresh:1;url=news_m.php");
    }
	else
	{ 
        echo "<br><br><br><br><br><br><br>";
		echo "<center><img src=\"img/error.png\"><br>尚未選擇需要刪除的新聞/公告！刪除失敗<br><br>頁面將在一秒鐘之後進行跳轉</center>";
		header("refresh:1;url=news_m.php");
    } 
?>