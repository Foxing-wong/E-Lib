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
<script language=javascript>
function selectAll(){
var a = document.getElementsByTagName("input");
if(a[0].checked){
for(var i = 0;i<a.length;i++){
if(a[i].type == "checkbox") a[i].checked = false;
}
}
else{
for(var i = 0;i<a.length;i++){
if(a[i].type == "checkbox") a[i].checked = true;
}
}
}
function unselectAll(){
var a = document.getElementsByTagName("input");
if(a[0].checked==false){
for(var i = 0;i<a.length;i++){
if(a[i].type == "checkbox") a[i].checked = false;
}
}
else{
for(var i = 0;i<a.length;i++){
if(a[i].type == "checkbox") a[i].checked = true;
}
}
}
</script>
</head>
<body>
<img src="../../public/img/news.gif" height=30/>E-LIB最新新聞&公告管理
<a class="myButton" style="float:right" href="welcome.html"><span>返回</span></a> 
<hr>
<div align="center">
<?php
 include("../../dbconf.php");
 $sql="select * from news order by id desc ";
 $Page_size=8; 
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
 $sql="select * from news order by id desc limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <form name="del_form" action="del_news.php" method="post"> 

<input class="myButton" style="margin-left:30" type="button" name="select" onclick="selectAll()" value="全選"/>
<input class="myButton" style="margin-left:100" type="button" name="select" onclick="unselectAll()" value="反選"/>
 <input class="myButton"  style="margin-left:120" type="submit" value="批量刪除" style="margin-left:0px;" onclick='return confirm("確定要批量刪除所選擇的新聞/公告？此操作不可恢復！！！")'><br><br>
 <table>
 <tr><td align=center style="background-color:#f2fddb">首顯</td><td align=center style="background-color:#f2fddb">選擇</td><td align=center style="background-color:#f2fddb">編號</td><td align=center style="background-color:#f2fddb">新聞標題</td><td align=center style="background-color:#f2fddb">新聞發佈時間</td><td colspan=3 align=center style="background-color:#f2fddb">可用操作</td></tr>
 <?php
 $j=1;
 while ($row=mysqli_fetch_array($result))
 {
 if($j%2==0)
 {
	$tdstyle="style=\"background-color:#f2fddb \"";
 }
 else
 {
	$tdstyle="style=\" \"";
 }
 $ishow="";
 if($row[4]=="0")
	  {
	  $showtype="e-lib";
	  $ishow="否";}
	  else{$ishow="是";
	  $showtype="shownews";}
?>

      <?php 
	  echo "<tr><td align=center ".$tdstyle." >".$ishow."</td>
	  <td align=center ".$tdstyle."><input name=\"del_id[]\" type=\"checkbox\" id=\"del_id[]\" value=".$row[0]." /></td>
	  <td align=center ".$tdstyle.">".$row[0]."</td><td ".$tdstyle.">".$row[1]."</td><td align=center ".$tdstyle.">".$row[3]."</td>
	  <td align=center ".$tdstyle."><a class=\"myButton2\" href='../../home/".$showtype.".php?id=".$row[0]."'  target=\"_blank\">檢視</a></td>
	  <td align=center ".$tdstyle."><a class=\"myButton2\" href='update_news.php?id=".$row[0]."'  target=\"_self\">修改</a></td>";
	?>
	<td align=center <?php echo $tdstyle; ?>><a class="myButton2" href="javascript:;" onclick="if(confirm('您确定删除这条记录？')){location.href='delete_news.php?id=<?php echo $row[0]; ?>';}" class="btn">删除</a></td></tr> 
	<?php
	$j++;
	} 
?>
</table>
</form>
<?php
 $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
 $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 $key='<div class="page">';
 @$key.="<span $page/$pages</span>";   //第几页,共几页
 if($page!=1)
 {
 $key.="<a   href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> ";    //第一页
 $key.="<a   href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页
}
else {
 $key.="<span > 第一页 </span>";//第一页
 $key.="<span > 上一页 </span>"; //上一页
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
 $key.=" <a   href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";
 }
  }  if($page!=$pages){
 $key.=" <a  href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页
 $key.="<a   href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页
 }else {
 $key.=" 下一页 ";//下一页
 $key.=" 最后一页 "; //最后一页
 }
 $key.='</div>';
?>
<p><?php echo $key?></p></div>
</body>
</html>