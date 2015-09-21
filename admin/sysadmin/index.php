<?php 
	session_start();
	if(@$_SESSION['admin_value']=="")
	{
		Header("Location: ../");
	}
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../../public/css/style.css"/>
</head>
<body>
<div id=Footer style="height:40;border:1px solid #adcd3c;background:#f2fddb;">
E-LIB Book Lending System
<br>
<?php echo "管理員：".@$_SESSION['admin_value'].",歡迎您！登入時間：".$_SESSION['admin_time'];
?>
</div>
<div id=Container>
<div id=Content-Left >
<center><a href="admin_info.php" target="main"><img src="img/accountm.png"></a></center><br>
<center><a href="news_m.php" target="main"><img src="img/btn.png"></a></center><br>
<center><a href="add_news.php" target="main"><img src="img/add.png"></a></center><br>
<center><a href="add_book.php" target="main"><img src="img/add_book.png"></a></center><br>
<center><a href="book_m.php" target="main"><img src="img/update_book.png"></a></center><br>
<center><a href="borrow_apply_m.php" target="main"><img src="img/applyM.png"></a></center><br>
<center><a href="reader_m.php" target="main"><img src="img/readerm.png"></a></center><br>
<center><a href="service_m.php" target="main"><img src="img/service.jpg"></a></center><br>
<center><a href="../logout.php" target="_self"><img src="img/logou.png"></a></center><br>
</div>
<div id =Content-Main>
<iframe src="welcome.html" id="main"  frameborder="0" scrolling="no"  onload="iFrameHeight()" name="main" width=790 height=700></iframe>
</div>
</div>

</body>
</html>