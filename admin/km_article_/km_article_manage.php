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
//------- 普通删除、数据处理
$del_id=$_GET["del_id"];
if (is_numeric($del_id)){
 //内容删除 ========================
   $sql="delete from ".$article_table." where id=$del_id";   //删除大类
    if(mysql_query($sql))
	{
	$del_Info=$del_Info."成功删除!";
    echo backPage($del_Info,"km_article_manage.php",0);
    exit();
	}
	else
	{
	echo backPage("删除失败，请联系管理员!","km_article_manage.php",0);
	exit();
	}
	}




//------- 批量删除、数据处理
  $del_id=$_POST["del_id"];
  if(!empty($del_id)){
     $del_id_arr  =$del_id;
     $del_id_size = count($del_id_arr); 
	  for($i=0;$i<$del_id_size;$i++){
	     if(is_numeric($del_id_arr[$i])){
		 
	//=========| 符合，则删除 |============
		 $del_id_sql="delete from ".$article_table." where id=$del_id_arr[$i]";   //删除大类
         mysql_query($del_id_sql);
	     echo backPage("成功删除!","km_article_manage.php",0);
         exit();
	//====================================

		 } 
		 }
		 }




		 
  //判断搜索\清空、搜索 ======================
 
	 $keyword_del=$_GET["keyword_del"];
  if($keyword_del!=""){
     $_SESSION[$article_table."keyswordStr"]="";
     $_SESSION[$article_table."keyswordSql"]="";
	 }
	 
     $keysword   =$_POST["keysword"];
  if($keysword!=""){
     $_SESSION[$article_table."keyswordStr"]=$keysword;
     $_SESSION[$article_table."keyswordSql"]=" title like '%$keysword%'";
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类管理</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />
<script>
//定义鼠标移过样式
function cursor_(ctype,objs){
    if (ctype=="on"){
	   objs.style.backgroundColor="#ffffff";
	}else{
	   objs.style.backgroundColor="#EEF7FD";
	}

}

//定义批量删除
function allDel(num){
  if(num>=1){
   for(i=1;i<=num;i++){
	  if(document.getElementById("del_"+i).checked==""){
	     document.getElementById("del_"+i).checked="checked";
	   }
	   else{
	     document.getElementById("del_"+i).checked="";
		}
   }
   }
}
</script>
</head>

<body>
<br />
<table width="780" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
<td width="90%" bgcolor="#FFFFFF" class="forumRow">

	<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
      <tr>
        <td colspan="6" align="center" bgcolor="#E6E6E6" class="forumRaw" style="color:#CC0000">
<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
            <tr>
              <td width="55%" align="center" class="forumRaw"><span class="forumRaw aTitle">
			  <? echo $article_title;?> 管理列表 </span></td>
              <td align="right" class="forumRaw">
<form name="allDel_Form" method="post" action="">			  
			  <table border="0" cellpadding="0" cellspacing="0">
                <tr>
				  <td align="center" valign="bottom" style="padding-right:3px;"><? if($_SESSION[$article_table."keyswordStr"]!=""){
				      echo "&nbsp; <a href=\"?keyword_del=del\">清空关键词</a>&nbsp;";
					  }else{
					  echo "&nbsp; <a>填写关键词</a>&nbsp;";
					  }?></td>
				  <td style="padding-right:3px;"><input name="keysword" type="text" id="keysword" style="background-color:#EEF7FD" value="<? echo $_SESSION[$article_table."keyswordStr"];?>" size="25" maxlength="20" /></td>
                  <td><input type="submit" name="Submit" value="<? echo $article_title;?>搜索" /></td>
                  </tr>
                
              </table>
</form>
			  </td>
              </tr>
          </table></td>
        </tr>
      <tr>
        <td colspan="6" bgcolor="#E6E6E6" class="forumRaw">

<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
          <tr>
<td class="forumRaw">
&nbsp;分类<img src="../km_style/images/ico/type_ico.gif" width="12" height="12" />
<?
$classid_b=$_GET["classid_b"];
$classid_s=$_GET["classid_s"];

$sql_b  ="select * from ".$article_table."_class_b order by classOrder asc";
$query_b=mysql_query($sql_b);
while ($row_b = mysql_fetch_array($query_b)) {   
?> 
|
<a href="?classid_b=<?php echo ($row_b["classid_b"]); ?>">
<?php echo ($row_b["classname"]); ?></a>
<?
}
?></td></tr>
<?php
if(is_numeric($classid_b)){
   $sql_s="select * from ".$article_table."_class_s where classid_b=".$classid_b." order by classOrder asc";
   $query_s=mysql_query($sql_s);
   $query_s_row=mysql_query($sql_s);
if(mysql_fetch_array($query_s_row)){
?>			
<tr><td class="forumRaw" style="padding-left:51px;">
<?php
while($row_s = mysql_fetch_array($query_s)){
?>
 - <a href="?classid_b=<?php echo $classid_b; ?>&classid_s=<?php echo ($row_s["classid_s"]); ?>"><?php echo ($row_s["classname"]); ?></a> 
<?php
}
?>
</td>
</tr>
<?php
}
}
?>
 </table>
 </td>
 </tr>
 
<form name="allDel_Form" method="post" action=""> 
<tr>
 <td bgcolor="#E6E6E6" class="forumRaw">&nbsp;</td>
        <td width="380" bgcolor="#E6E6E6" class="forumRaw">&nbsp;文章标题</td>
        <td width="135" align="center" bgcolor="#E6E6E6" class="forumRaw">所属类别</td>
        <td width="40" align="center" bgcolor="#E6E6E6" class="forumRaw">点击</td>
        <td width="80" align="center" bgcolor="#E6E6E6" class="forumRaw">添加日期</td>
        <td width="60" align="center" bgcolor="#E6E6E6" class="forumRaw">操作</td>
      </tr>
	  
	  
<?
  //读取内容 ===========================
if($classid_b=="" and $classid_s=="" ){
  //读取所有内容 =======================
 if($_SESSION[$article_table."keyswordSql"]!=""){
    $key_sql=" where ".$_SESSION[$article_table."keyswordSql"];
	}
   $sql="select * from ".$article_table.$key_sql;
}else{

 if($_SESSION[$article_table."keyswordSql"]!=""){
    $key_sql=" and ".$_SESSION[$article_table."keyswordSql"];
	}
  
 if(is_numeric($classid_b) and is_numeric($classid_s)){
  //筛选大小类同时符合的 =======================
   $sql="select * from ".$article_table." where classid_b=$classid_b and classid_s=$classid_s".$key_sql;
   }elseif(is_numeric($classid_b)){
  //筛选大类符合的 ======================
   $sql="select * from ".$article_table." where classid_b=$classid_b".$key_sql;
   }elseif(is_numeric($classid_s)){
  //筛选小类符合的 ======================
   $sql="select * from ".$article_table." where classid_s=$classid_s".$key_sql;
   }else{
  //读取所有内容 =======================
 if($_SESSION[$article_table."keyswordSql"]!=""){
    $key_sql=" where ".$_SESSION[$article_table."keyswordSql"];
	}
   $sql="select * from ".$article_table.$key_sql;
   }
   }
   

//现在要分页
$pagesize	= 15;						    //每页显示多少条
$page		= $_GET["page"];
$query_all  = mysql_query($sql); 
$allrows	= mysql_num_rows($query_all); 	//获取数据库总数量
$allpages   = ceil($allrows/$pagesize);	    //所有页数

if(!is_numeric($page) or $page<=0){$page=1;}
if($page>$allpages){$page=$allpages;}
   $start = ($page-1)*$pagesize;
   $sql   = $sql." order by id desc limit $start,$pagesize";
   $query = mysql_query($sql);

if($allrows>0){
//----数据总数大于0，即有记录
       $delNum=0;
while ($row = mysql_fetch_array($query)) {
       $delNum++;
?> 
      
      <tr style="background-color:#EEF7FD" onmouseover="cursor_('on',this);" onmouseout="cursor_('',this);">
        <td width="25" align="center" class="forumRow2">
		<input name="del_id[]" type="checkbox" id="del_<? echo $delNum;?>" value="<? echo $row["id"];?>" /></td>
        <td class="forumRow2">&nbsp;<a href="km_article_edit.php?id=<?php echo ($row["id"]); ?>"><? echo $row["id"];?>.<?php echo showShort($row["title"],30); ?>
</a>		</td>
        <td align="center" class="forumRow2">
<a href="?classid_b=<?php echo $row["classid_b"]; ?>">
          <?php echo(getClass($article_table,'b',$row["classid_b"]));?></a>	

<? if(is_numeric($row["classid_s"]) and $row["classid_s"]!=0){?>
<img src="../km_style/images/ico/type_ico.gif" width="12" height="12" />
<a href="?classid_b=<?php echo $row["classid_b"]; ?>&classid_s=<?php echo $row["classid_s"]; ?>"><?php echo(getClass($article_table,'s',$row["classid_s"]));?>   </a>
<? }?>		</td>
        <td width="40" align="center" class="forumRow2"><?php echo ($row["clicktime"]); ?></td>
        <td align="center" class="forumRow2"><?php echo (date("Y-m-d",$row["time"])); ?></td>
        <td width="60" align="center" class="forumRow2">
<a href="?del_id=<?php echo ($row["id"]); ?>"  onclick="return confirm('确定要删除该信息？');"><img src="../km_style/images/ico/del.gif" alt="删除" width="14" border="0" /></a>&nbsp;&nbsp;<a href="km_article_edit.php?id=<?php echo ($row["id"]); ?>"><img src="../km_style/images/ico/edit.gif" alt="编辑" height="14" border="0" /></a></td>
      </tr>

<?
}
}else{
?>
<tr style="background-color:#EEF7FD;" onmouseover="cursor_('on',this);" onmouseout="cursor_('',this);">
<td colspan="6" align="center" style="padding:5px;">暂无记录!</td>
</tr>
<?
}
?>


<tr style="background-color:#EEF7FD">
<td width="25" align="center" class="forumRaw"><span class="forumRow2">
  <input type="checkbox" onclick="allDel(<? echo $delNum;?>);" />
</span></TD>
<td height="20" colspan="5" align="right" class="forumRaw"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
<td width="120" align="left">&nbsp;<input name="提交" type="submit" value="删除选中项" onclick="return confirm('确定要删除选中的项？');" /></td>
    <td align="right" id="pageNav">

&nbsp; 
      页次：<b><? echo($page);?>/<? echo($allpages);?></b>&nbsp;每页<b><? echo($pagesize);?></b>&nbsp;总数<b><? echo($allrows);?></b>&nbsp;&nbsp;
	  
<a href="?classid_b=<? echo $classid_b;?>&classid_s=<? echo $classid_s;?>&page=<? echo($i-1);?>">上一页</a>
<?
//初始化
$pageNum1=1;
$pageNum2=$allpages;

if($page>4 and $page<$allpages){
   $pageNum1=$page-4;
   }
if($page>1 and $page<$allpages-4){
   $pageNum2=$page+4;
   }


for($i=$pageNum1;$i<=$pageNum2;$i++){
   if($page==$i){
      $class="class=on";
   }else{
      $class="class=off";
   }
   echo("<a href='?classid_b=$classid_b&classid_s=$classid_s&page=$i' ".$class.">$i</a>");
}
?>

<a href="?classid_b=<? echo $classid_b;?>&classid_s=<? echo $classid_s;?>&page=<? echo($i++);?>">下一页</a>


&nbsp;&nbsp;转到:
<select 
      onchange=self.location.href=this.options[this.selectedIndex].value 
      name=select>
        <? 
for($i=1;$i<=$allpages;$i++){
?>
        <option value="?classid_b=<? echo $classid_b;?>&classid_s=<? echo $classid_s;?>&page=<? echo($i);?>" <? if($i==$page) echo(" selected") ?>> 第 <? echo($i);?> 页</option>
        <?
 }
 ?>
      </select></td>
    </tr>
  
</table>  </TD>
</tr>
</form>

 </table>

 </td>
  </tr>
</table>
</body>
</html>
