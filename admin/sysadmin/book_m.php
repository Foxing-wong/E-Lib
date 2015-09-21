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
<img src="../../public/img/news.gif" height=30/>E-LIB書籍管理
<a class="myButton" style="float:right" href="welcome.html"><span>返回</span></a> 
<hr>
<div align="center">
<?php
 include("../../dbconf.php");
 $sql="select * from bookinfo order by bookid desc";
 $Page_size=9; 
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
 $sql="select * from bookinfo order by bookid desc limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><td align=center>書籍編號</td><td align=center>書名</td><td align=center>ISBN</td><td align=center>出版社</td><td align=center>剩餘數量</td><td align=center colspan=3>可用操作</td></tr>
 <?php
 while ($row=mysqli_fetch_array($result))
 {
?>

      <?php 
	  echo "<tr><td align=center>".$row[0]."</td><td>".$row[1]."</td><td align=center>".$row[2]."</td><td align=center>".$row[3]."</td><td align=center>".$row[5]."</td>
	  <td align=center><a class=\"myButton2\" href='../../query/details.php?bookid=".$row[0]."'  target=\"_blank\">檢視</a></td>
	  <td align=center><a class=\"myButton2\" href='update_book.php?id=".$row[0]."'  target=\"_self\">修改</a></td>";
	?>
	<td align=center><a class="myButton2" href="javascript:;" onclick="if(confirm('您确定删除这条记录？')){location.href='delete_book.php?id=<?php echo $row[0]; ?>';}" class="btn">删除</a></td></tr> 
	<?php
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