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
	$writer      = $_POST["writer"];
	$come        = $_POST["come"];
	$content     = $_POST["content"];
	$classid_b   = $_POST["classid_b"];	
	$classid_s   = $_POST["classid_s"];	
  //-------------------------------------
    $description = $_POST["description"];  
	$recommen    = $_POST["recommen"];
	$popular     = $_POST["popular"];
	$pic_s       = $_POST["pic_s"];
	$pic_b       = $_POST["pic_b"];
	

if($_POST["action"]=="edit"){
  //--------------| 判断接收数据是否符合 |---------------
    if (!is_numeric($id)){
	echo backPage($article_title." 参数有误!","",2);
	exit;
	}
	if (!is_numeric($classid_b)){
	echo backPage($article_title." 参数有误!","",2);
	exit;
    }
	if($title==""){
	echo backPage($article_title." 标题不能为空,请填写!","",2);
	exit();
	}
  //--------------------------------------------------
	$sql="update ".$article_table." set title='$title',writer='$writer',come='$come',content='$content',classid_b='$classid_b',classid_s='$classid_s',description='$description',recommen='$recommen',popular='$popular',pic_s='$pic_s',pic_b='$pic_b' where id=$id";
	if(mysql_query($sql))
	{   echo backPage($action_name."成功!","km_article_manage.php",0);
		exit();
		}else{   echo $sql;
		echo backPage("失败，请联系管理员!","km_article_manage.php",0);
		exit();
		}
  //--------------| 完成修改操作      |--------------

  
}elseif($_POST["action"]=="add"){
 
  //-------------------------------------
    if (!is_numeric($classid_b)){
	echo backPage($article_title." 参数有误!","",2);
	exit;
    }
	if($title==""){
	echo backPage($article_title." 标题不能为空,请填写!","",2);
	exit();
	}
  //-------------------------------------
	$sql="insert into ".$article_table."(title,writer,come,content,time,classid_b,classid_s,description,recommen,popular,pic_s,pic_b) values('".$title."','".$writer."','".$come."','".$content."','".time()."','".$classid_b."','".$classid_s."','".$description."','".$recommen."','".$popular."','".$pic_s."','".$pic_b."')";
	if(mysql_query($sql))
	{
		echo backPage($action_name."成功!","km_article_edit.php",0);
		exit();
	}
	else
	{
		echo backPage("失败，请联系管理员!","km_article_edit.php",0);
		exit();	
	}	
	

}else{
	echo backPage($article_title."提交的参数有误!","",2);
	exit();
}
	
}
?>





<?
 //=== 编辑状态>读取数据 ===
if(is_numeric($id)){
$sql   = "select * from ".$article_table." where id=$id";
$query = mysql_query($sql);
$row   = mysql_fetch_array($query);
if($row){
 //=== 成功读取内容 ===
    $r_id          =$row["id"];
	$r_title       =$row["title"];
	$r_writer      =$row["writer"];
	$r_come        =$row["come"];
	$r_content     =$row["content"];
	$r_classid_b   =$row["classid_b"];	
	$r_classid_s   =$row["classid_s"];	
 //-------------------
    $r_description =$row["description"];  
	$r_recommen    =$row["recommen"];
	$r_popular     =$row["popular"];
	$r_pic_s       =$row["pic_s"];
	$r_pic_b       =$row["pic_b"];
}
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员主页面</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />

<script language = "JavaScript">
<!--
var onecount;
subcat = new Array();

<?
$classid=$_GET["classid"];

//-- 大类 -----
$sql_b="select * from ".$article_table."_class_b";
$query_b=mysql_query($sql_b);
$count=0;
while($row_b = mysql_fetch_array($query_b)){

//-- 小类 -----
$sql_s="select * from ".$article_table."_class_s where classid_b=".$row_b["classid_b"];
$query_s=mysql_query($sql_s);
while($row_s = mysql_fetch_array($query_s))
{
?> 
subcat[<? echo $count;?>] = new Array("<? echo getClass($article_table,'s',$row_s["classid_s"]);?>","<? echo $row_b["classid_b"];?>","<? echo $row_s["classid_s"];?>");
<?
$count++;
}}
?>

onecount=<? echo $count;?>;

function changelocation(locationid)
    {
    document.artForm.classid_s.length = 1; 
    var locationid=locationid;
    var i;
    for (i=0;i < onecount; i++)
        {
            if (subcat[i][1] == locationid)
            {
                document.artForm.classid_s.options[document.artForm.classid_s.length] = new Option(subcat[i][0], subcat[i][2]);
            }        
        }
    }
	
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<br>
<table width="700" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow"><form id="artForm" name="artForm" method="post" action="">
<table width="100%" border="0" align=center cellpadding=1 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
        <tr>
          <td height="25" colspan="2" align="center" class="forumRaw" style="color:#CC0000"><strong><? echo $article_title;?></strong> 信息<? echo $action_name;?>
		  </td>
          </tr>
		<tr>
          <td width="60" align="right" class="forumRow">标题:</td>
          <td class="forumRow"><label>
            <input name="title" type="text" id="title" size="50" value="<? echo $r_title;?>" />
          </label></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">类别:</td>
          <td class="forumRow"><label>
<select name="classid_b" id="classid_b" onChange="changelocation(document.artForm.classid_b.options[document.artForm.classid_b.selectedIndex].value)">
<?
$classid = $_GET["classid"];
$sql_b   = "select * from ".$article_table."_class_b";
$query_b = mysql_query($sql_b);
while($row_b = mysql_fetch_array($query_b))
{
if ($r_classid_b==""){
   $num_b++;
if($num_b==1){
   $classid_b=$row_b["classid_b"];
}
}
?>
<option value="<? echo($row_b["classid_b"]);?>" <? if($r_classid_b==$row_b["classid_b"]){echo "selected";} ?> > <? echo(getClass($article_table,"b",$row_b["classid_b"]));?></option>

<?
}
?>
</select>

<select name="classid_s" id="classid_s">
<option value="">选择小类</option>
<?
if (is_numeric($r_classid_b)){
   $sql_s       = "select * from ".$article_table."_class_s where classid_b=".$r_classid_b;
}else{
   $sql_s       = "select * from ".$article_table."_class_s where classid_b=".$classid_b;
}

$query_s     = mysql_query($sql_s);
while($row_s = mysql_fetch_array($query_s))
{
?>
<option value="<? echo($row_s["classid_s"]);?>" <? if($r_classid_s==$row_s["classid_s"]){echo "selected";} ?>> <? echo(getClass($article_table,'s',$row_s["classid_s"]));?></option>
<?
}
?>
</select>
</label></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="forumRow">简介:</td>
          <td class="forumRow">
<textarea name="description" cols="60" rows="4" id="description"><? echo $r_description;?>
</textarea></td>
        </tr>        
        <tr>
          <td align="right" valign="top" class="forumRow">内容:</td>
          <td class="forumRow"><input type="hidden" id="content" name="content" style="display:none" value="<? echo htmlspecialchars($r_content);?>" />
          <input type="hidden" id="FCKeditor1___Config" value="" style="display:none" />
          <iframe id="FCKeditor1___Frame" src="../km_editor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="320" frameborder="0" scrolling="no"></iframe></td>
        </tr>

        <tr>
          <td align="right" class="forumRow">&nbsp;</td>
          <td class="forumRow"><table border="0" cellpadding=0 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
            <tr>
              <td align="center" class="forumRow"><label>
<input name="recommen" type="checkbox" id="recommen" value="yes" <? if($r_recommen=="yes"){echo "checked";};?> />
              </label></td>
              <td width="40" align="center" class="forumRow">推荐</td>
              <td align="center" class="forumRow"><label>
<input name="popular" type="checkbox" id="popular" value="yes" <? if($r_popular=="yes"){echo "checked";};?>/>
                </label>
              </td>
              <td width="40" align="center" class="forumRow">热门</td>
              <td width="300" align="right" class="forumRow"><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="45" align="center">作者</td>
                    <td>
	<input name="writer" type="text" id="writer" value="<? echo $r_writer;?>" size="15" />					</td>
                    <td width="45" align="center">来源</td>
                    <td>
					<input name="come" type="text" class="input" id="come" value="<? echo $r_come;?>" size="15" />					</td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">缩略图:</td>
          <td class="forumRow"><input name="pic_s" type="text" id="pic_s" value="<? echo $r_pic_s;?>" size="40">
<input type="button" onClick="MM_openBrWindow('../km_system/km_uploads.php?formKey=pic_s','upfile','width=500,height=60')" value="上传">
		    </td>
        </tr>
        <tr>
          <td align="right" class="forumRow">大图片:</td>
          <td class="forumRow"><input name="pic_b" type="text" id="pic_b" value="<? echo $r_pic_b;?>" size="40">
<input type="button" onClick="MM_openBrWindow('../km_system/km_uploads.php?formKey=pic_b','upfile','width=500,height=60')" value="上传">
		</td>
        </tr>
        
        <tr>
          <td align="right" class="forumRow">&nbsp;</td>
          <td class="forumRow"><input type="submit" name="button" id="button" value="提交修改" />
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
