<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

  include("km_conn.php");                     //数据库连接

  $article_title="页面";
  $article_table="km_files";
  
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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
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
<table width="550" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
<td width="90%" bgcolor="#FFFFFF" class="forumRow">
<form name="allDel_Form" method="post" action="">
	<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
      <tr>
        <td colspan="3" align="center" bgcolor="#E6E6E6" class="forumRaw" style="color:#CC0000">
<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
            <tr>
              <td align="center" class="forumRaw"><span class="forumRaw aTitle">
			  <? echo $article_title;?> 管理列表 </span></td>
              <td align="right" class="forumRaw"><table border="0" cellpadding="0" cellspacing="0">
                <tr>
				  <td align="center" valign="bottom" style="padding-right:3px;"><? if($_SESSION[$article_table."keyswordStr"]!=""){
				      echo "&nbsp; <a href=\"?keyword_del=del\">清空关键词</a>&nbsp;";
					  }else{
					  echo "&nbsp; <a>填写关键词</a>&nbsp;";
					  }?></td>
				  <td style="padding-right:3px;"><input name="keysword" type="text" id="keysword" style="background-color:#EEF7FD" value="<? echo $_SESSION[$article_table."keyswordStr"];?>" size="25" maxlength="20" /></td>
                  <td><input type="submit" name="Submit" value="<? echo $article_title;?>搜索" /></td>
                  </tr>
                
              </table></td>
              </tr>
          </table></td>
        </tr>
      <tr>
        <td width="199" bgcolor="#E6E6E6" class="forumRaw">&nbsp;<? echo $article_title;?>名称</td>
        <td width="273" bgcolor="#E6E6E6" class="forumRaw">&nbsp;文件名称</td>
        <td width="38" align="center" bgcolor="#E6E6E6" class="forumRaw">操作</td>
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
    $key_sql=$_SESSION[$article_table."keyswordSql"];
	}
  
 if(is_numeric($classid_b) and is_numeric($classid_s)){
  //筛选大小类同时符合的 =======================
   $sql="select * from ".$article_table." where ".$key_sql;
   }elseif(is_numeric($classid_b)){
  //筛选大类符合的 ======================
   $sql="select * from ".$article_table." where ".$key_sql;
   }elseif(is_numeric($classid_s)){
  //筛选小类符合的 ======================
   $sql="select * from ".$article_table." where ".$key_sql;
   }else{
  //读取所有内容 =======================
 if($_SESSION[$article_table."keyswordSql"]!=""){
    $key_sql=" where ".$_SESSION[$article_table."keyswordSql"];
	}
   $sql="select * from ".$article_table.$key_sql;
   }
   }

    $sql   = $sql." order by id asc";
//recordset的open方法
    $rs = new com("ADODB.RecordSet");
    $rs->Open($sql,$conn,1,1);
       
	   $delNum=0;
	while(!$rs->eof){
//----数据总数大于0，即有记录
       $delNum++;
?> 
      
      <tr style="background-color:#EEF7FD" onmouseover="cursor_('on',this);" onmouseout="cursor_('',this);">
        <td align="left" class="forumRow2">&nbsp;<a href="km_article_edit.php?id=<?php echo ($rs["id"]->value); ?>"><? echo $rs["id"]->value;?>.<?php echo showShort($rs["title"]->value,30); ?>
        </a>		</td>
        <td align="left" class="forumRow2">&nbsp;<?php echo $rs["filename"]->value; ?></td>
        <td width="38" align="center" class="forumRow2"><a href="km_article_edit.php?id=<?php echo ($rs["id"]->value); ?>"><img src="../km_style/images/ico/edit.gif" alt="编辑" height="14" border="0" /></a></td>
      </tr>

<?
   $rs->MoveNext();
}
?>


<tr style="background-color:#EEF7FD">
<td height="20" colspan="3" align="center" class="forumRaw">&nbsp;</TD>
</tr>
 </table>
</form>
 </td>
  </tr>
</table>
</body>
</html>
