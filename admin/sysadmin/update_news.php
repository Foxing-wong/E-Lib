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
<?php
	$id=$_GET['id'];
	include("../../dbconf.php");
	$sql="select * from news where id='".$id."'";
	$rows=mysqli_query($link,$sql);
	$num=mysqli_num_rows($rows);
	$row=mysqli_fetch_row($rows);
	$title=$row[1];
	$htmlData=$row[2];
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>修改新聞</title>
	<link rel="stylesheet" type="text/css" href="admin.css"/>
	<link rel="stylesheet" href="../../editor/themes/default/default.css" />
	<link rel="stylesheet" href="../../editor/plugins/code/prettify.css" />
	<script charset="utf-8" src="../../editor/kindeditor.js"></script>
	<script charset="utf-8" src="../../editor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../../editor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '../../editor/plugins/code/prettify.css',
				uploadJson : 'upload_json.php',
				fileManagerJson : 'file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
	<?php
	$id=$_GET['id'];
	include("../../dbconf.php");
	$sql="select * from news where id='".$id."'";
	$rows=mysqli_query($link,$sql);
	$num=mysqli_num_rows($rows);
	$row=mysqli_fetch_row($rows);
	$title=$row[1];
	$content=$row[2];
	$ishow="";
	?>
	<div style="text-align:center">
	<div style="margin: 2 auto; text-align:left;">
	<img src="../../public/img/news.gif" height=30>E-LIB新聞/公告修改
	<a class="myButton" style="float:right" href="news_m.php"><span>返回</span></a> 
	<hr>
	<form name="example" method="post" action="upadate_news_result.php">
		<p>新聞ID：<input type="text" name="newsID" size=30 readonly <?php echo "value=\"".$id."\"" ?> >不可修改&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;是否在首頁顯示 <input type="radio" name="isShow" value='1' <?php if($row[4]=="1"){echo "checked";}?> >是 <input type="radio" name="isShow" value='0'<?php if($row[4]=="0"){echo "checked";}?>>否</p>
		<p>標題：<input type="text" name="newstitle" size=100 <?php echo "value=\"".$title."\"" ?> > *必填</p>
		內容：<textarea name="content1" style="width:780px;height:312px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
		<br />
	<input type="submit" class="addBu" name="button" value="修改" style="margin-left:140px;" />  
	<input type="reset" class="addBu" name="button" value="重置" style="margin-left:170px;" />	</form>
	</div>
	</div>
</body>
</html>

