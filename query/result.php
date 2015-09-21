<?php session_start();
	$_SESSION['oldurl']=$_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"];
?>
<html>
<head>
<title>歡迎光臨E-LIB Book lenging system</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
<style type="text/css">
#Container ul li {
		line-height:45px;
		border-bottom:1px dashed #CCC;
        }
#Container ul li:hover {
            cursor: pointer;
			border:1px solid #bbe1f1;
			background:#eefaff;
			font-weight:bold;
        }
#Container a:hover { 
color:red;
text-decoration:none; 
        }
</style>
</head>
<body>
<div id=Container>
<?php 
	$type=@$_GET['type'];
	$kw=@$_GET['keywords'];
	include("../nav.html");
?>
<form method="get" name="query" action="result.php" style="width:487px;height:34px;margin:0px auto 0 auto;">
<p>
<input type="text" name="keywords" style="vertical-align: middle;width:315px;height:34px;border:2px solid #d3d3d3;" <?php echo "value=\"".$kw."\"" ?>>
<button id="searchBtn" style="vertical-align: middle;height:34px;width:86px;background-image:url(../public/img/searchbg.png);background-repeat:no-repeat;"type="submit"></button>
</p>
<p>
<input type="radio" name="type" value="bookname" <?php if($type=="bookname")echo "checked=\"checked\""; ?> />書名 
<input type="radio" name="type" value="ISBN" <?php if($type=="ISBN")echo "checked=\"checked\""; ?>/>ISBN
<input type="radio" name="type" value="publisher" <?php if($type=="publisher")echo "checked=\"checked\""; ?>/>出版商
<input type="radio" name="type" value="news" <?php if($type=="news")echo "checked=\"checked\""; ?>/>站內新聞/公告
</p>
</form>
<br><br><br>
<?php
	if(@$_GET['keywords']=="")
	{
				echo "<div style=\"width:300px;height:34px;margin:0px auto 0 auto;\"><img src=\"../public/img/error.png\" /><br>請輸入關鍵字進行搜尋</div>";
	}
	else
	{
		if($type=="bookname"||$type=="ISBN"||$type=="publisher")
		{
			 include("../dbconf.php");
			 $sql="select * from bookinfo where ".$type." like '%".$kw."%';";
			 $Page_size=15; 
			 $result=mysqli_query($link,$sql);
			 $count = mysqli_num_rows($result);
			 if($count>0)
			 {
					echo "<p style=\"line-height:30px;border:1px solid #bbe1f1;background:#eefaff;\">&nbsp;<img src=\"../editor/plugins/emoticons/images/0.gif\">&nbsp;&nbsp;E-LIB为您找到相關結果约<span style=\"color:red\">&nbsp;".$count."&nbsp;</span>个</p>";
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
					 $sql="select * from bookinfo where ".$type." like '%".$kw."%' limit $offset,$Page_size";
					 $result=mysqli_query($link,$sql);
					 echo "<ul>";
					 while ($row=mysqli_fetch_array($result))
					 {
					?>
						  <?php 
						  echo "<li><img src=\"../public/img/b.gif\"><a href='details.php?bookid=".$row[0]."'  target=\"_blank\">".$row[1]."[".$row[3]."]</a></li>";						  ?><?php
					} 
					echo "</ul>";
					 $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
					 $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 $key='<div class="page">';
					 @$key.="<span>$page/$pages</span>";   //第几页,共几页
					 if($page!=1)
					 {
					 $key.="<a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=1\">第一页</a> ";    //第一页
					 $key.="<a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=".($page-1)."\">上一页</a>"; //上一页
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
					 $key.=" <a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=".$i."\">".$i."</a>";
					 }
					  }  if($page!=$pages){
					 $key.=" <a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=".($page+1)."\">下一页</a> ";//下一页
					 $key.="<a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page={$pages}\">最后一页</a>"; //最后一页
					 }else {
					 $key.="下一页 ";//下一页
					 $key.="最后一页"; //最后一页
					 }
					 $key.='</div>';
					 echo "</br><div align=\"center\">".$key."</div>";
			 }
			 else
			 {
				echo "<div style=\"width:300px;height:34px;margin:0px auto 0 auto;\"><br>無可顯示的搜索結果</div>";
			 }
		}
		else
		{
			 include("../dbconf.php");
			 $sql="select * from news where title like '%".$kw."%' and isShow='1' ;";
			 $Page_size=15; 
			 $result=mysqli_query($link,$sql);
			 $count = mysqli_num_rows($result);
			 if($count>0)
			 {
				echo "<p style=\"line-height:30px;border:1px solid #bbe1f1;background:#eefaff;\">&nbsp;<img src=\"../editor/plugins/emoticons/images/0.gif\">&nbsp;&nbsp;E-LIB为您找到相關結果约<span style=\"color:red\">&nbsp;".$count."&nbsp;</span>个</p>";
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
					$sql="select * from news where title like'%".$kw."%' limit $offset,$Page_size";
					$result=mysqli_query($link,$sql);
					echo "<ul>";
					while ($row=mysqli_fetch_array($result))
					{
					?>
					  <?php 
						echo "<li><img src=\"../public/img/b.gif\"><a style=\"color:black;font-size:14px;font-weight:normal \" href='../home/shownews.php?id=".$row[0]."'  target=\"_blank\">".$row[1]."[".$row[3]."]</a></li>";
						  ?><?php
					} 
					echo "</ul>";
					 $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
					 $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 $key='<div class="page">';
					 @$key.="<span>$page/$pages</span>";   //第几页,共几页
					 if($page!=1)
					 {
					 $key.="<a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=1\">第一页</a> ";    //第一页
					 $key.="<a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=".($page-1)."\">上一页</a>"; //上一页
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
					 $key.=" <a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=".$i."\">".$i."</a>";
					 }
					  }  if($page!=$pages){
					 $key.=" <a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page=".($page+1)."\">下一页</a> ";//下一页
					 $key.="<a href=\"".$_SERVER['PHP_SELF']."?keywords=".$kw."&type=".$type."&page={$pages}\">最后一页</a>"; //最后一页
					 }else {
					 $key.="下一页 ";//下一页
					 $key.="最后一页"; //最后一页
					 }
					 $key.='</div>';
					 echo "</br></br><div align=\"center\">".$key."</div>";
			 }
			 else
			 {
				echo "<div style=\"width:300px;height:34px;margin:0px auto 0 auto;\"><br>無可顯示的搜索結果</div>";
			 }
		}
			 
	}
?>
</div>
<div id=Footer style="margin-top:60px">
<?php 
	include("../footer.php");
?>
</div>
</body>
</html>