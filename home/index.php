<?php session_start();
	$_SESSION['oldurl']=$_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>歡迎光臨E-LIB Book lenging system</title>
<link rel="stylesheet" type="text/css" href="../public/css/style.css"/>
<style type="text/css">
#Content-Main ul li {
		line-height:45px;
		border-bottom:1px dashed #CCC;
        }
#Content-Main ul li:hover {
            background-color: #fece4e;
            cursor: pointer;
        }
</style>
</head>
<body>
<div id=Container>
<?php 
	include("../nav.html");
?>
<div style="margin-top:20;float:left;width:1018px;border: 1px solid #CCC;" >
<center><img src="../public/img/ad_read.jpg"/></center>
</div>
<div id=Content-Left >
<div style="margin-top:20;text-align:left;float:left;width:220px;border: 1px solid #CCC;height:190" >
<center><img name=loginimg src="../public/img/login.png"/></center>
<?php 
	include("uinfo.php");
?>
</div>
<div style="margin-top:27px;float:left;width:220px;border: 1px solid #CCC;height:165" >
<center><img name=loginimg src="../public/img/elib.png"/></center>
<div style="margin-top:5">E-LIB線上圖書借閱系統借力于現代化的物流，採用黑貓宅急送超速物流，運用先進的借書流程，無需到書館，只需線上一點，書籍送到府上！
</div></div>
</div>
<div id =Content-Main style="margin-top:20px;border: 1px solid #CCC;margin-left:30px;height:385px;width:766px;float:left;">
<center><img src="../public/img/dt.png"/></center><div><?php
	include("../dbconf.php");
	$sql="select * from news where isShow='1' order by id desc ";
	$Page_size=6; 
	$result=mysqli_query($link,$sql);
	$count = mysqli_num_rows($result);
	$page_count  = ceil($count/$Page_size);
	$init=1;
	$page_len=7;
	$max_p=$page_count;
	$pages=$page_count; //判断当前页码
	if(empty($_GET['page'])||$_GET['page']<0){
		$page=1;
		$is_new=0;
	}
	else 
	{
		$page=$_GET['page'];
		if($_GET['page']==1)
		{
			$is_new=0;
		}
		else
		{
			$is_new=10;
		}
	} 
	$offset=$Page_size*($page-1);
	$sql="select * from news where isShow='1' order by id desc limit $offset,$Page_size";
	$result=mysqli_query($link,$sql);
	echo "<ul>";
	while ($row=mysqli_fetch_array($result))
	{
		if($is_new<=1)
		{
			echo "<li><a id=\"a\" style=\"color:#FF0000;font-size:14px;font-weight:bold \" href='shownews.php?id=".$row[0]."'  target=\"_blank\" title=\"".$row[1]."\">&nbsp;<img src=\"../public/img/b.gif\">&nbsp;&nbsp;".$row[1]."&nbsp;&nbsp;[".substr($row[3],0,10)."]"."&nbsp;&nbsp;</a><img src=\"../public/img/new.gif\"></li>";		}
		else
		{
			echo "<li><a id=\"a\" style=\"color:black;font-size:14px;font-weight:normal \" href='shownews.php?id=".$row[0]."'  target=\"_blank\" title=\"".$row[1]."\">&nbsp;<img src=\"../public/img/b.gif\">&nbsp;&nbsp;".$row[1]."&nbsp;&nbsp;[".substr($row[3],0,10)."]"."&nbsp;&nbsp;</a></li>";		}
		$is_new=$is_new+1;
	} 
	echo "</ul>";
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 $key='<div class="page">';
	@$key.="<span>$page/$pages</span>";   //第几页,共几页
	if($page!=1)
	{
		$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> ";    //第一页
		$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页
	}
	else 
	{
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
<div align="center"><p><?php echo $key ?></p></div>
</div>
<div id=isa style="margin-top:680px;overflow:hidden;height:125px;width:1018px;color:#ff0000;border: 1px solid #CCC;">
<table align=left cellpadding=0 cellspace=0 border=0><tr><td id=isa1 valign=top>
  <table border=0 cellpadding=0 cellspacing=0>
  <tr>
  <?php 
    /*$sql2="select * from index_show order by id desc limit 12";
	$result2=mysqli_query($link,$sql2);
	while($row2=mysqli_fetch_array($result2))
	{
		echo "<td><img border=0 src=\"此處是url\" width=132 height=99 hspace=22 title=\"此處是書名\"></a><center>此處也是書名</center></td>";
	}*/
	//此處如果資料庫有資料之後，刪掉該項
	for($j=0;$j<12;$j++)
	{
		echo "<td><img border=0 src=\"images/newbook.jpg\" width=132 height=99 hspace=22 title=\"此處顯示該書名字\"></a><center>此處顯示該書名字</center></td>";
	}
	?>
  </table>
 </td><td id=isa2 valign=top></td></tr></table></div>
   <div style="margin-top:30px;border: 1px solid #CCC;width:1018px;">
   <center><img name=loginimg src="../public/img/elib_g.jpg"/></center>
  <?php
	include("chengzhang.html");
  ?></div>
</div>
 <script>
  var speed=15//速度数值越大速度越慢
  isa2.innerHTML=isa1.innerHTML
  function Marquee(){
  if(isa2.offsetWidth-isa.scrollLeft<=0)
  isa.scrollLeft-=isa1.offsetWidth
  else{
  isa.scrollLeft++
  }
  }
  var MyMar=setInterval(Marquee,speed)
  isa.onmouseover=function() {clearInterval(MyMar)}
  isa.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
  </script>
</div>
<div id=Footer style="margin-top:30">
<?php 
	include("../footer.php");
?>
</div>
</body>
</html>