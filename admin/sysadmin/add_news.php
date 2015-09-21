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
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>添加新聞</title>
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
<div style="text-align:center">
<div style="margin: 2 auto; text-align:left;">
<img src="../../public/img/news.gif" height=30>E-LIB新增新聞/公告
<a class="myButton" style="float:right" href="welcome.html"><span>返回</span></a> 
<hr>
	<form name="example" method="post" action="add_news_result.php">
		<p>標題：<input type="text" name="newstitle" onfocus="if(value=='請輸入新聞標題') {value=''}" onblur="if(value=='') {value='請輸入新聞標題'}" size=80> *必填</p>
		<p>是否在首頁顯示 <input type="radio" name="isShow" value='1' checked>是（用於一般新聞/公告）<input type="radio" name="isShow" value='0'>否（用於用戶協議/其他，用戶無法搜索到此條信息）</p>
		內容：<textarea name="content1" style="width:780px;height:340px;visibility:hidden;"></textarea>
		<br>
	<center><input type="submit" class="addBu" name="button" value="新增" style="margin-left:0px;" />  
	<input type="reset" class="addBu" name="button" value="重置" style="margin-left:100px;" /></center></form>
</div>
</div>
</body>
</html>

