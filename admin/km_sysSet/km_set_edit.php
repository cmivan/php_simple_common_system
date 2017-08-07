<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

  include("km_conn.php");                     //数据库连接

  $article_title="模块";
  $article_table="km_table";

?>

<?
  //--------------| 接收Url参数       |---------------
   $id=$_GET["id"];
if($id==""){
   $action     ="add";
   $action_name="添加";
}else{
   $action     ="edit";
   $action_name="修改";
}



if($_POST["action"]!="")
{
  //--------------| 接收提交来的数据    |---------------
    $id          = $_POST["id"];
	$title       = $_POST["title"];
	$tables      = $_POST["tables"];
  //---------
	$db_title        = $_POST["db_title"];
	$db_class        = $_POST["db_class"];
	$db_description  = $_POST["db_description"];
	$db_content      = $_POST["db_content"];
	$db_recommen     = $_POST["db_recommen"];
	$db_popular      = $_POST["db_popular"];
	$db_writer       = $_POST["db_writer"];
	$db_come         = $_POST["db_come"];
	$db_pic_b        = $_POST["db_pic_b"];
	$db_pic_s        = $_POST["db_pic_s"];


if($db_title=="1"){$db_title=true;}else{$db_title=0;}
if($db_class=="1"){$db_class=true;}else{$db_class=0;}
if($db_description=="1"){$db_description=true;}else{$db_description=0;}
if($db_content=="1"){$db_content=true;}else{$db_content=0;}
if($db_recommen=="1"){$db_recommen=true;}else{$db_recommen=0;}
if($db_popular=="1"){$db_popular=true;}else{$db_popular=0;}
if($db_writer=="1"){$db_writer=true;}else{$db_writer=0;}
if($db_come=="1"){$db_come=true;}else{$db_come=0;}
if($db_pic_b=="1"){$db_pic_b=true;}else{$db_pic_b=0;}
if($db_pic_s=="1"){$db_pic_s=true;}else{$db_pic_s=0;}

if($_POST["action"]=="edit"){
	if($title==""){
	echo backPage($article_title." 标题不能为空,请填写!","",2);
	exit();
	}
  //--------------------------------------------------

	$sql="update ".$article_table." set title='$title',
	tables='$tables',
	db_title='$db_title',
	db_class='$db_class',
	db_description='$db_description',
	db_content='$db_content',
	db_recommen='$db_recommen',
	db_popular='$db_popular',
	db_writer='$db_writer',
	db_come='$db_come',
	db_pic_b='$db_pic_b',
	db_pic_s='$db_pic_s' where id=$id";
    $rs = new com("ADODB.RecordSet");
    $conn->execute($sql);

	echo backPage($action_name."成功!","km_set_manage.php",0);
	exit();

  //--------------| 完成修改操作      |--------------


}elseif($_POST["action"]=="add"){
	if($title==""){
	echo backPage($article_title." 标题不能为空,请填写!","",2);
	exit();
	}
  //-------------------------------------
	$sql="insert into ".$article_table."(title,
	tables,db_title,db_class,db_description,db_content,db_recommen,db_popular,db_writer,db_come,db_pic_b,db_pic_s) values('$title','$tables','$db_title','$db_class','$db_description','$db_content','$db_recommen','$db_popular','$db_writer','$db_come','$db_pic_b','$db_pic_s')";
    $conn->execute($sql);
	
	echo backPage($action_name."成功!","km_set_edit.php",0);
	exit();

}else{
	echo backPage($article_title."提交的参数有误!","",2);
	exit();
}}




 //=== 编辑状态>删除字段 ===
  $del_field_id=$_GET["del_field_id"];
  $id=$_GET["id"];
if(is_numeric($del_field_id)){
   $sql="delete from km_field where id=$del_field_id";
   if($conn->execute($sql)){
	echo backPage("成功删除!","km_set_edit.php?id=$id",0);
	exit();
   }
} 
?>





<?
 //=== 编辑状态>读取数据 ===
if(is_numeric($id)){
    $sql= "select * from ".$article_table." where id=$id";
    $rs = new com("ADODB.RecordSet");
    //recordset的open方法
    $rs->Open($sql,$conn,1,1);
    //=== 成功读取内容 ===
	
 if(!$rs->eof){
 
    $r_id          =$rs["id"]->value;
	$r_title       =$rs["title"]->value;
	$r_tables      =$rs["tables"]->value;
  //------------------------------------------
	$r_db_title       =$rs["db_title"]->value;
	$r_db_class       =$rs["db_class"]->value;
	$r_db_description =$rs["db_description"]->value;
	$r_db_content     =$rs["db_content"]->value;
	$r_db_recommen    =$rs["db_recommen"]->value;
	$r_db_popular     =$rs["db_popular"]->value;
	$r_db_writer      =$rs["db_writer"]->value;
	$r_db_come        =$rs["db_come"]->value;
	$r_db_pic_b       =$rs["db_pic_b"]->value;
	$r_db_pic_s       =$rs["db_pic_s"]->value;


    $rs  ->close;
}else{
    $rs  ->close;
	echo backPage($article_title."提交的参数有误!","",2);
	exit();
}
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理员主页面</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />

<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<br>
<table border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow"><form id="artForm" name="artForm" method="post" action="">
<table width="100%" border="0" align=center cellpadding=1 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
        <tr>
          <td height="25" colspan="2" align="center" class="forumRaw" style="color:#CC0000"><strong><? echo $article_title;?></strong> 信息<? echo $action_name;?>		  </td>
          </tr>
		<tr>
          <td align="right" class="forumRow">名称:</td>
          <td width="97" class="forumRow"><label>
            <input name="title" type="text" id="title" value="<? echo $r_title;?>" size="12" />
          </label></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">表段:</td>
          <td class="forumRow"><label>
          <input name="tables" type="text" id="tables" value="<? echo $r_tables;?>" size="12" />
          </label></td>
        </tr>
        <tr>
          <td height="2" colspan="2" align="center" bgcolor="#E4EDF9" class="forumRaw" style="color:#FF0B0B">
<strong><? echo $article_title;?></strong> 显示字段		  </td>
          </tr>
        <tr>
          <td align="right" class="forumRow">标题:</td>
          <td class="forumRow"><input name="db_title" type="checkbox" id="db_title" value="1" <? if($r_db_title){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">类别:</td>
          <td class="forumRow"><input name="db_class" type="checkbox" id="db_class" value="1" <? if($r_db_class){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">简介:</td>
          <td class="forumRow"><input name="db_description" type="checkbox" id="db_description" value="1" <? if($r_db_description){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">内容:</td>
          <td class="forumRow"><input name="db_content" type="checkbox" id="db_content" value="1" <? if($r_db_content){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">推荐:</td>
          <td class="forumRow"><input name="db_recommen" type="checkbox" id="db_recommen" value="1" <? if($r_db_recommen){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">热门:</td>
          <td class="forumRow"><input name="db_popular" type="checkbox" id="db_popular" value="1" <? if($r_db_popular){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">作者:</td>
          <td class="forumRow"><input name="db_writer" type="checkbox" id="db_writer" value="1" <? if($r_db_writer){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">来源:</td>
          <td class="forumRow"><input name="db_come" type="checkbox" id="db_come" value="1" <? if($r_db_come){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">缩略图:</td>
          <td class="forumRow"><input name="db_pic_s" type="checkbox" id="db_pic_s" value="1" <? if($r_db_pic_s){echo "checked";}?>></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">大图片:</td>
          <td class="forumRow"><input name="db_pic_b" type="checkbox" id="db_pic_b" value="1" <? if($r_db_pic_b){echo "checked";}?>></td>
        </tr>
		
<? if($action=="edit"){?>

<?
  if(is_numeric($id)){
    $f_sql= "select * from km_field where db_moduleID=$id";
    $f_rs = new com("ADODB.RecordSet");
    $f_rs->Open($f_sql,$conn,1,1);
    //=== 成功读取内容 ===
	
     while(!$f_rs->eof){
	 ?>
        <tr>
          <td align="right" class="forumRow"><? echo $f_rs["db_name"]->value;?>:</td>
          <td class="forumRow" style="padding-left:5px;"><a href="?id=<? echo $id;?>&del_field_id=<? echo $f_rs["id"]->value;?>">×</a></td>
        </tr>
	 <?
	$f_rs->MoveNext();
	 }
	$f_rs->close;
	$conn->close;
	}
?>



        <tr>
          <td align="right" class="forumRaw">添加:</td>
          <td class="forumRaw" style="padding-left:7px;"><a href="#"><img src="../km_style/images/ico/add_class_b.gif" width="9" height="9" border="0" onClick="MM_openBrWindow('km_set_field_add.php?moduleID=<? echo $r_id;?>','kmsetadd','width=260,height=170')"></a></td>
        </tr>
<? }?>
		
        <tr>
          <td align="right" class="forumRow">&nbsp;</td>
          <td class="forumRow"><input type="submit" name="button" id="button" value="提交" />
            <input type="hidden" name="action" id="action" value="<? echo $action;?>" />
            <input type="hidden" name="id" id="id" value="<? echo $r_id;?>" /></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
</table>
<br>
</body>
</html>
