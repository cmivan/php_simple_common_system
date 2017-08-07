<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

  include("km_article_config.php");           //当前管理类型的数据配置
?>


<?php
//-===================| 删除分类 |=====================-
   $class_b_del=$_GET["class_b_del"];
   $class_s_del=$_GET["class_s_del"];
   
if(is_numeric($class_b_del)){
//-===================| 删除大类 |=====================-
$sql="delete from ".$article_table."_class_b where classid_b=$class_b_del";   //删除大类
if(mysql_query($sql))
{
	$del_Info="成功删除相应的大类";
  //删除相应小类
  $sql_s  ="delete from ".$article_table."_class_s where classid_b=$class_b_del"; 
  if(mysql_query($sql_s)){
	$del_Info=$del_Info."、小类";
  //删除相应文章
    $sql_art="delete from ".$article_table." where classid_b=$class_b_del"; 
	if(mysql_query($sql_art)){
	$del_Info=$del_Info."、文章";
	}}
echo backPage($del_Info,"km_class_manage.php",0);
exit();
}
else
{
echo backPage("删除大类失败，请联系管理员!","km_class_manage.php",0);
exit();	
}
}

if(is_numeric($class_s_del)){
//-===================| 删除小类 |=====================-
  $sql="delete from ".$article_table."_class_s where classid_s=$class_s_del";
  if(mysql_query($sql))
  {
    $del_info="成功删除分类";
    $sql_s="delete from ".$article_table." where classid_s=$class_s_del";
 if(mysql_query($sql_s)){
	$del_info=$del_info."、相应的内容!";
	}
	
  echo backPage($del_info,"km_class_manage.php",0);
  exit();
  
  }else{
  echo backPage("失败，请联系管理员!","km_class_manage.php",0);
  exit();	
}	
}
?>







<?php
//-===================| 处理大类排序问题 |=====================-
  $order       =$_GET["order"];
  $classOrder_b=$_GET["classOrder_b"];
if($order!="" and is_numeric($classOrder_b)){
     
	 $order_sql="select * from ".$article_table."_class_b where classOrder=".$classOrder_b;
     $query_now=mysql_query($order_sql);
	 $row_now  =mysql_fetch_array($query_now);
     if($row_now){
        $row_now_classOrder=$row_now["classOrder"];
		$row_now_id        =$row_now["classid_b"];
	 }else{
		echo backPage("参数有误!","km_class_manage.php",0);
		exit();
	 }

  if($order=="up"){
    //---------------------------------------------
     $order_sql_up  ="select * from ".$article_table."_class_b where classOrder<".$classOrder_b." order by classOrder desc";
     $query_up =mysql_query($order_sql_up);
	 $row_up   =mysql_fetch_array($query_up);
	 if($row_up){
        $row_up_classOrder=$row_up["classOrder"];
		$row_up_query ="update ".$article_table."_class_b set classOrder=$row_now_classOrder where classOrder=$row_up_classOrder";
		$row_now_query="update ".$article_table."_class_b set classOrder=$row_up_classOrder where classid_b=$row_now_id";
         mysql_query($row_up_query);
		 mysql_query($row_now_query);
	 }else{
		echo backPage("排序已到上限!","km_class_manage.php",0);
		exit();
	 }
  }elseif($order=="down"){
    //---------------------------------------------
	 $order_sql_down="select * from ".$article_table."_class_b where classOrder>".$classOrder_b." order by classOrder asc";
     $query_down=mysql_query($order_sql_down);
	 $row_down  =mysql_fetch_array($query_down);
	 if($row_down){
        $row_down_classOrder=$row_down["classOrder"];
		$row_down_query ="update ".$article_table."_class_b set classOrder=$row_now_classOrder where classOrder=$row_down_classOrder";
		$row_now_query  ="update ".$article_table."_class_b set classOrder=$row_down_classOrder where classid_b=$row_now_id";
		 mysql_query($row_down_query);
		 mysql_query($row_now_query);
	 }else{
		echo backPage("排序已到下限!","km_class_manage.php",0);
		exit();
	 }
	 }
	 }
?>








<?php
//-===================| 处理小类排序问题 |=====================-
  $order       =$_GET["order"];
  $classid_b   =$_GET["classid_b"];
  $classOrder_s=$_GET["classOrder_s"];
if($order!="" and is_numeric($classOrder_s) and is_numeric($classid_b)){
     
	 $order_sql="select * from ".$article_table."_class_s where classid_b=$classid_b and classOrder=".$classOrder_s;
     $query_now=mysql_query($order_sql);
	 $row_now  =mysql_fetch_array($query_now);
     if($row_now){
        $row_now_classOrder=$row_now["classOrder"];
		$row_now_id        =$row_now["classid_s"];
	 }else{
		echo backPage("参数有误!","km_class_manage.php",0);
		exit();
	 }

  if($order=="up"){
    //---------------------------------------------
     $order_sql_up  ="select * from ".$article_table."_class_s where classid_b=$classid_b and classOrder<".$classOrder_s." order by classOrder desc";
     $query_up =mysql_query($order_sql_up);
	 $row_up   =mysql_fetch_array($query_up);
	 if($row_up){
        $row_up_classOrder=$row_up["classOrder"];
		$row_up_query ="update ".$article_table."_class_s set classOrder=$row_now_classOrder where classid_b=$classid_b and classOrder=$row_up_classOrder";
		$row_now_query="update ".$article_table."_class_s set classOrder=$row_up_classOrder where classid_b=$classid_b and classid_s=$row_now_id";
         mysql_query($row_up_query);
		 mysql_query($row_now_query);
	 }else{
		echo backPage("排序已到上限!","km_class_manage.php",0);
		exit();
	 }
  }elseif($order=="down"){
    //---------------------------------------------
	 $order_sql_down="select * from ".$article_table."_class_s where classid_b=$classid_b and classOrder>".$classOrder_s." order by classOrder asc";
     $query_down=mysql_query($order_sql_down);
	 $row_down  =mysql_fetch_array($query_down);
	 if($row_down){
        $row_down_classOrder=$row_down["classOrder"];
		$row_down_query ="update ".$article_table."_class_s set classOrder=$row_now_classOrder where classid_b=$classid_b and classOrder=$row_down_classOrder";
		$row_now_query  ="update ".$article_table."_class_s set classOrder=$row_down_classOrder where classid_b=$classid_b and classid_s=$row_now_id";
		 mysql_query($row_down_query);
		 mysql_query($row_now_query);
	 }else{
		echo backPage("排序已到下限!","km_class_manage.php",0);
		exit();
	 }
	 }
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类管理</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />
<script>
function cursor_(ctype,objs){
    if (ctype=="on"){
	   objs.style.backgroundColor="#EFEFEF";
	}else{
	   objs.style.backgroundColor="#ffffff";
	}

}
</script>
</head>

<body style="overflow:hidden">
<br />
<table width="350" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow"><table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
	  
      <tr>
        <td align="center" bgcolor="#E6E6E6" class="forumRaw">&nbsp;</td>
        <td align="center" bgcolor="#E6E6E6" class="forumRaw"><a href="km_class_b_edit.php"><span style="color:#CC3300; font-weight:bold"><? echo $article_title;?></span> 类别设置 <img src="../km_style/images/ico/add_class_b.gif" alt="添加大类" border="0" /></a></td>
        <td width="40" align="center" bgcolor="#E6E6E6" class="forumRaw">排序</td>
        <td width="40" align="center" bgcolor="#E6E6E6" class="forumRaw"><span class="STYLE1">编辑</span></td>
      </tr>
<?
$sql_b="select * from ".$article_table."_class_b order by classOrder asc";
$query_b=mysql_query($sql_b);
while ($row_b = mysql_fetch_array($query_b)) {   
?>   

      <tr>
        <td width="25" align="center" bgcolor="#EBEBEB" class="forumRow">
<a href="km_class_s_edit.php?classid_b=<?php echo ($row_b["classid_b"]); ?>"><img src="../km_style/images/ico/add_class_s.gif" alt="添加相应的小类" width="9" height="9" border="0" /></a></td>
        <td bgcolor="#EBEBEB" class="forumRow class_b_title">
		<?php echo ($row_b["classname"]); ?><span>(<?php echo ($row_b["classid_b"]); ?>)</span>
		</td>
<td width="40" align="center" bgcolor="#EBEBEB" class="forumRow class_b_title">
<a href="?order=up&classOrder_b=<?php echo ($row_b["classOrder"]);?>"><img src="../km_style/images/ico/up_ico.gif" border="0" /></a>

<a href="?order=down&classOrder_b=<?php echo ($row_b["classOrder"]);?>"><img src="../km_style/images/ico/down_ico.gif" border="0" /></a></td>
        <td align="center" bgcolor="#EBEBEB" class="forumRow">
<a href="?class_b_del=<?php echo ($row_b["classid_b"]); ?>"  onclick="return confirm('你真的确定要删除吗？');"><img src="../km_style/images/ico/del.gif" alt="删除大类" height="13" border="0" /></a>&nbsp;<a href="km_class_b_edit.php?classid=<?php echo ($row_b["classid_b"]); ?>"><img src="../km_style/images/ico/edit.gif" alt="修改大类" height="12" border="0" /></a></td>
      </tr>
	  
	  
	  
<?php
$sql_s="select * from ".$article_table."_class_s where classid_b=".$row_b["classid_b"]." order by classOrder asc";
$query_s=mysql_query($sql_s);
while ($row_s = mysql_fetch_array($query_s)) {   
?> 
      <tr style="background-color:#FFFFFF" onmouseover="cursor_('on',this);" onmouseout="cursor_('',this);">
        <td>&nbsp;</td>
        <td class="class_s_title">
		<?php echo ($row_s["classname"]); ?><span>(<?php echo ($row_s["classid_s"]); ?>)</span>
		</td>
        <td width="40" align="center" class="class_s_title">
<a href="?order=up&classid_b=<?php echo ($row_s["classid_b"]);?>&classOrder_s=<?php echo ($row_s["classOrder"]);?>"><img src="../km_style/images/ico/up_ico.gif" border="0" /></a>

<a href="?order=down&classid_b=<?php echo ($row_s["classid_b"]);?>&classOrder_s=<?php echo ($row_s["classOrder"]);?>"><img src="../km_style/images/ico/down_ico.gif" border="0" /></a></td>
        <td align="center">
<a href="?class_s_del=<?php echo ($row_s["classid_s"]); ?>"  onclick="return confirm('你真的确定要删除吗？');"><img src="../km_style/images/ico/del.gif" alt="删除小类" height="13" border="0" /></a>&nbsp;<a href="km_class_s_edit.php?classid=<?php echo ($row_s["classid_s"]); ?>"><img src="../km_style/images/ico/edit.gif" alt="修改小类" height="12" border="0" /></a></td>
      </tr>
<?
}
}
?>
    </table></td>
  </tr>
</table>
</body>
</html>
