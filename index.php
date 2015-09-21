<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php 
	session_start();
	if(file_exists("install.php")){
		Header("Location: /install.php");
	}
	else
	{
		Header("Location: home");
	}
?>
</body>
</html>