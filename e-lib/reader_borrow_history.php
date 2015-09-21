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
  .myButton2 {
	-moz-box-shadow: 0px 0px 0px 2px #9fb4f2;
	-webkit-box-shadow: 0px 0px 0px 2px #9fb4f2;
	box-shadow: 0px 0px 0px 2px #9fb4f2;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #7892c2), color-stop(1, #476e9e));
	background:-moz-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-webkit-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-o-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-ms-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#7892c2', endColorstr='#476e9e',GradientType=0);
	background-color:#7892c2;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:13px;
	padding:0px 10px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
	margin-top:10px;
}
.myButton2:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #476e9e), color-stop(1, #7892c2));
	background:-moz-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:-webkit-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:-o-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:-ms-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#476e9e', endColorstr='#7892c2',GradientType=0);
	background-color:#476e9e;
}
.myButton2:active {
	position:relative;
	top:1px;
}
</style>

</head>
<body>
<img src="../public/img/more.gif" />讀者借閱歷史檢視
<hr>
<p style="color:red">狀態說明：[借閱中]表示正在借閱||[已結案]表示該書出現異常狀態，詳見備註||[已歸還]表示該書已經歸還||[待審核]表示該次借閱正在審核中||[被拒絕]表示異常，詳見備註</p>
<div align="center">
<?php
include("../dbconf.php");
 $sql="select borrowinfo.bookid,bookinfo.bookname,bookinfo.publisher,borrowinfo.borrowtime,borrowinfo.status,borrowinfo.remarks from borrowinfo,bookinfo where username='".$_SESSION['username']."'and bookinfo.bookid=borrowinfo.bookid order by borrowid desc";
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
 $sql="select borrowinfo.bookid,bookinfo.bookname,bookinfo.publisher,borrowinfo.borrowtime,borrowinfo.status,borrowinfo.remarks,borrowinfo.borrowID from borrowinfo,bookinfo where username='".$_SESSION['username']."'and bookinfo.bookid=borrowinfo.bookid order by borrowid desc  limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><th align=center>書籍編號</th><th align=center>書名</th><th align=center>出版社</th><th align=center>借閱時間</th><th align=center>狀態</th><th align=center>備註</th></tr>
 <?php
 while ($row=mysqli_fetch_array($result))
	{
		if($row[4]=="待審核")
		{
			echo "<tr><td align=center>".$row[0]." </td><td align=center><a id=\"a\" href=book_details.php?bookid=".$row[0]." </a>".$row[1]."</td><td align=center>".$row[2]."</td><td align=center>".date('Y-m-d H:i',$row[3])."</td><td align=center>".$row[4]."</td><td align=center><p><form method=\"post\" action=\"borrowCancel.php\" onsubmit=\"return submitTest();\"><input type=\"hidden\" name=\"cancelid\" value=\"".$row[6]."\" />
<input type=\"submit\" class=\"myButton2\" value=\"取消借閱\" /></form></p></td></tr>";
		}
		else
		{
			echo "<tr><td align=center>".$row[0]." </td><td align=center><a id=\"a\" href=book_details.php?bookid=".$row[0]." </a>".$row[1]."</td><td align=center>".$row[2]."</td><td align=center>".date('Y-m-d H:i',$row[3])."</td><td align=center>".$row[4]."</td><td align=center>".$row[5]."</td></tr>";
		}
	} 
?>
</table>
<SCRIPT LANGUAGE="JavaScript"> 
function submitTest() { 
	if(confirm('您确定要取消該書籍的借閱申請？此操作不可恢復'))
	{return true;}
	else
	{
		return false;
	}
} 
</SCRIPT> 
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