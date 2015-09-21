<?php session_start();
	if(@$_SESSION['username']=="")
	{
		Header("Location: ../login");
	}
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
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
  th {
   border: 2px solid #E83801;
   background: #fff;
   font-size:17px;
   padding: 3px 3px 3px 8px;
   color: blue;
  }
</style>

</head>
<body>
<img src="../public/img/more.gif" />借閱進行中/續借
<hr>
<p>至多續借三次，三次之後無法續借</p>
<div align="center">
<?php
include("../dbconf.php");
 $sql="select borrowinfo.bookid,bookinfo.bookname,borrowinfo.borrowtime,borrowinfo.borrowtimes,borrowinfo.returntime from borrowinfo,bookinfo where username='".$_SESSION['username']."'and bookinfo.bookid=borrowinfo.bookid and borrowinfo.status='借閱中' order by borrowid desc";
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
 $sql="select borrowinfo.bookid,bookinfo.bookname,borrowinfo.borrowtime,borrowinfo.borrowtimes,borrowinfo.returntime,borrowinfo.borrowid from borrowinfo,bookinfo where username='".$_SESSION['username']."'and bookinfo.bookid=borrowinfo.bookid and  borrowinfo.status='借閱中' order by borrowid desc  limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><th align=center>書籍編號</th><th align=center>書名</th><th align=center>借閱時間</th><th align=center>已續借次數</th><th align=center>應歸還時間</th><th align=center>操作</th></tr>
 <?php
 while ($row=mysqli_fetch_array($result))
	{
		echo "<tr><td align=center>".$row[0]." </td><td align=center>".$row[1]."</td><td align=center>".date('Y-m-d H:i',$row[2])."</td><td align=center>".$row[3]."</td><td align=center>".date('Y-m-d H:i',$row[4])."</td><td align=center><a class=\"myButton\" href=\"javascript:;\" onclick=\"if(confirm('您确定要續借嗎？一次續借延長10天')){location.href='book_renew.php?id=".$row[5]."';}\" class=\"btn\">續借</a>"."</td></tr>";
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