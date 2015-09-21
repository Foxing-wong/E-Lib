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
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="admin.css"/>
</head>
<body>
<img src="../../public/img/more.gif" />添加管理員賬號
<hr>
<div style="margin:0 auto;border:1px solid #a5b6c8;background:#eef3f7;width:370;" ><center><p> 添加管理員賬號</p></center><hr>
	<form name="resetPwd" method="post" action="add_admin_result.php">
		<div style="text-align:center">
		<p><span style="text-align:center">賬號</span><input type="text" name="admin_name" style="margin-left:100;width:150"> *必填</p>
		<p>密碼<input type="password" name="admin_pwd" style="margin-left:100;width:150"> *必填</p>
		<p><span style="text-align:center">權限</span><select name="umain" style="margin-left:100;width:150"><option value="0">普通賬號</option><option value="1">超級賬號</option></select> *必選</p>
		<p>說明：普通賬號只擁有管理借閱申請||系統留言檢視之權限</p></div>
	<center><input type="submit" class="addBu" name="button" value="送出" style="margin-left:0px;" />  
	<input type="reset" class="addBu" name="button" value="重置" style="margin-left:100px;" /></center></form>
</div>
<div align="center">
<?php
 include("../../dbconf.php");
 $sql="select * from admininfo";
 $Page_size=10; 
 $result=mysqli_query($link,$sql);
 $count = mysqli_num_rows($result);
 $page_count  = ceil($count/$Page_size);
 $init=1;
 $page_len=7;
 $max_p=$page_count;
 $pages=$page_count; //判断当前页码
 if
 (empty($_GET['page'])||$_GET['page']<0){
  $page=1;
 }
 else 
 {
 $page=$_GET['page'];
 } 
 $offset=$Page_size*($page-1);
 $sql="select * from admininfo limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><td align=center>系統編號</td><td align=center>管理員賬號</td><td align=center>最後登入時間</td><td align=center>賬號類型</td><td align=center>操作</td></tr>
 <?php
 while ($row=mysqli_fetch_array($result))
 {
?>

      <?php 
	  if($row[4]=="1")
	  {
		$xx="<span style=\"font-weight: bold;color:red;\">超級賬號</span>";
	  }
	  else
	  {
		$xx="普通賬號";
	  }
	  if($row[1]!=$_SESSION['admin_value'])
	  {
		$deleteadmin="<td align=center><a style=\"color:red;font-size:14px;font-weight:normal\" href=\"javascript:\" onclick=\"if(confirm('您确定要刪除該管理員賬號？？？')){location.href='delete_admin.php?user=".$row[1]."';}\" class=\"btn\">刪除</a></td>";
	  }
	  else
	  {
		$deleteadmin="<td></td>";
	  }
	  echo "<tr><td align=center>".$row[0]."</td><td>".$row[1]."</td><td align=center>".$row[3]."</td><td align=center>".$xx."</td>
	  ".$deleteadmin."</tr>";
} 
 $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
 $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 $key='<div class="page">';
 @$key.="<span>$page/$pages</span>";   //第几页,共几页
 if($page!=1)
 {
 $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> ";    //第一页
 $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页
}
else {
 $key.="第一页 ";//第一页
 $key.="上一页"; //上一页
} 
if($pages>$page_len){
 //如果当前页小于等于左偏移
 if($page<=$pageoffset){
 $init=1;
 $max_p = $page_len;
 }
 else{//如果当前页大于左偏移
 //如果当前页码右偏移超出最大分页数
 if($page+$pageoffset>=$pages+1){
 $init = $pages-$page_len+1;
 }else{
 //左右偏移都存在时的计算
 $init = $page-$pageoffset;
 $max_p = $page+$pageoffset;
 }
 }
  }
  for($i=$init;$i<=$max_p;$i++){
 if($i==$page){
 $key.=' <span>'.$i.'</span>';
 } else {
 $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";
 }
  }  if($page!=$pages){
 $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页
 $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页
 }else {
 $key.="下一页 ";//下一页
 $key.="最后一页"; //最后一页
 }
 $key.='</div>';
?>
<p><?php echo $key?></p></div>
</body>
</html>