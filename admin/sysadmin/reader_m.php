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
<img src="../../public/img/news.gif" height=30/>E-LIB讀者管理
<a class="myButton" style="margin-left:100px;" href="applyVIP_m.php"><span>申請認證管理</span></a> 
<a class="myButton" style="margin-left:200px;" href="welcome.html"><span>返回</span></a> 
<hr>
<div align="center">
<?php
include("../../dbconf.php");
 $sql="select * from userinfo order by id desc ";
 $Page_size=12; 
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
 $sql="select * from userinfo order by id desc limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><td align=center>賬號</td><td align=center>姓名</td><td align=center>性別</td><td align=center>地址</td><td align=center>身份證號</td><td align=center>郵箱</td><td align=center>註冊時間</td><td align=center>VIP</td><td colspan=2 align=center>可用操作</td></tr>
 <?php
 while ($row=mysqli_fetch_array($result))
 {
?>

      <?php 
	  echo "<tr><td align=center>".$row[1]."</td>
	  <td align=center>".$row[2]."</td>
	  <td align=center>".$row[4]."</td><td>".$row[5]."</td><td align=center>".$row[6]."</td><td align=center>".$row[7]."</td><td align=center>".$row[8]."</td><td align=center>".$row[9]."</td>";
	?>
	<td align=center><a style="color:red;font-size:14px;font-weight:normal" href="javascript:" onclick="if(confirm('您确定讓該位讀者通過認證？？？')){location.href='setVIP.php?id=<?php echo $row[0]; ?>&type=pass';}" class="btn">通過認證</a></td>
	<td align=center><a style="color:red;font-size:14px;font-weight:normal" href="javascript:" onclick="if(confirm('您确定取消該讀者的認證？？？')){location.href='setVIP.php?id=<?php echo $row[0]; ?>&type=cancel';}" class="btn">取消認證</a></td></tr> 
	<?php
} 
?>
</table>
<?php
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