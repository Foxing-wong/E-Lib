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
<img src="../../public/img/news.gif" height=30/>E-LIB讀者管理
<a class="myButton" style="margin-left:200px;" href="reader_m.php"><span>返回讀者信息管理</span></a> 
<hr>
<div align="center">
<?php
 include("../../dbconf.php");
 $sql="select * from vipinfo order by id desc ";
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
 $sql="select * from vipinfo order by id desc limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><td align=center>讀者賬號</td><td align=center>支付寶付款賬號</td><td align=center>支付寶交易編號</td><td align=center>申請時間</td><td align=center>狀態</td><td colspan=2 align=center>可用操作</td></tr>
 <?php
 while ($row=mysqli_fetch_array($result))
 {
?>

      <?php 
	  echo "<tr><td align=center>".$row[1]."</td>
	  <td align=center>".$row[2]."</td>
	  <td align=center>".$row[3]."</td><td>".$row[4]."</td><td align=center>".$row[5]."</td>";
	  if($row[5]=="已通過"||$row[5]=="已拒絕")
	  {
		echo "<td colspan=2 align=center>無可用操作</td>"; 
	  }
	  else
	  {
		echo "<td align=center><a style=\"color:red;font-size:14px;font-weight:normal\" href=\"javascript:\" onclick=\"if(confirm('您确定通過該讀者的申請認證？？？')){location.href='vip_result.php?id=".$row[0]."&reader=".$row[1]."&type=pass';}\" class=\"btn\">通過</a></td><td align=center><a style=\"color:red;font-size:14px;font-weight:normal\" href=\"javascript:\" onclick=\"if(confirm('您确定拒絕該讀者的申請認證？？？')){location.href='vip_result.php?id=". $row[0]."&reader=none&type=refuse';}\" class=\"btn\">拒絕</a></td></tr>"; 
	  }
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