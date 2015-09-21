<?php 
	session_start();
	if(@$_SESSION['admin_value']=="")
	{
		Header("Location: ../");
	}
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="admin.css"/>
</head>
<body>
<img src="../../public/img/news.gif" height=30/>E-LIB借閱申請管理
<hr>
<div align="center">
<?php
 include("../../dbconf.php");
 date_default_timezone_set("PRC");
 $sql="select * from borrowinfo order by borrowid desc ";
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
 $sql="select * from borrowinfo order by borrowid desc  limit $offset,$Page_size";
 $result=mysqli_query($link,$sql);
 ?>
 <table>
 <tr><td align=center>讀者賬號</td><td align=center>書籍ID</td><td align=center>申請時間</td><td align=center>已續次數</td><td align=center>狀態</td><td align=center>備註</td></tr>
 <?php
 while ($row=mysqli_fetch_array($result))
 {
?>

      <?php 
	  echo "<tr><td align=center>".$row[1]."</td>
	  <td align=center>".$row[2]."</td>
	  <td align=center>".date('Y-m-d H:i:s',$row[3])."</td><td>".$row[4]."</td><td align=center>".$row[5]."</td>";
	  if($row[5]=="待審核")
	  {
		$caozuo="<select name=\"changestatus\" >
<option value=\"借閱中\">同意借閱</option>
<option value=\"被拒絕\">拒絕借閱</option>
</select><input type=\"hidden\" name=\"bookid\" value=\"".$row[2]."\"><input type=\"hidden\" name=\"btime\" value=\"".$row[3]."\">&nbsp;&nbsp;";
	  }
	  else if($row[5]=="借閱中")
	  {
				$caozuo="<select name=\"changestatus\" >
<option value=\"已歸還\">書籍已還</option>
<option value=\"已結案\">異常結案</option><option value=\"添加備註\" style=\"color:red\">添加備註</option>
</select><input type=\"hidden\" name=\"bookid\" value=\"".$row[2]."\">&nbsp;&nbsp;";
	  }
	  else if($row[5]=="已歸還"||$row[5]=="已結案"||$row[5]=="被拒絕")
	  {
		$caozuo="無可用操作&nbsp;&nbsp;";
	  }
	  echo "<td align=center><form method=\"post\" action=\"update_borrow_status.php\">".$caozuo."<input type=\"hidden\" name = \"borrowid\" value=\"".$row[0]."\"><input type=\"text\" name=\"beizhu\" value=\"".$row[6]."\">&nbsp;&nbsp;<input type=\"submit\" value=\"提交\"></form></td></tr>";
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