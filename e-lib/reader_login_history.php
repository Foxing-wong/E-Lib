<?php 
	session_start();
	if(@$_SESSION['username']=="")
	{
		Header("Location: ../");
	}
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">  
  table {
   width:780;
   border: 2px solid #E83801;
   padding:0; 
   margin:0 auto;
   border-collapse: collapse;
  }
  
  td {
   border: 2px solid #E83801;
   background: #fff;
   font-size:15px;
   padding: 3px 3px 3px 8px;
   color: black;
  }
</style>
</head>
<body>
<img src="../public/img/more.gif" /> E-LIB登錄歷史查詢
<hr>
*登錄歷史僅供參考，不作任何證明！
<div align="center">
<?php
include("../dbconf.php");
 $sql="select * from loginhistory where username='".$_SESSION['username']."'order by id desc ";
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
 $sql="select * from loginhistory where username='".$_SESSION['username']."'order by id desc limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><td align=center>次數</td><td align=center>登錄時間</td><td align=center>登錄IP</td><td align=center>登錄地點</td><td align=center>登錄類型</td></tr>
 <?php
 if($page==1)
 {
	$lid=$count;
 }
 else
 {
	$lid=$count-($page-1)*12;
 }
 
 while ($row=mysqli_fetch_array($result))
	{
	
	echo "<tr><td align=center>第 ".$lid." 次</td><td align=center>".$row[2]."</td><td align=center>".$row[3]."</td><td align=center>".$row[4]."</td><td align=center>".$row[5]."</td></tr>";
	$lid--;
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
<p><?php echo $key ?></p></div>
</body>
</html>