<?php
//-=================================================-
//-====  |       ����php��վϵͳ v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : ��������             | ====-
//-=================================================-

  include("km_conn.php");                     //���ݿ�����
  
  $article_title="ģ��";
  $article_table="km_files";

?>

<?
  //--------------| ����Url����       |---------------
   $id=$_GET["id"];
if($id==""){
   $action     ="add";
   $action_name="���";
}else{
   $action     ="edit";
   $action_name="�޸�";
}



if($_POST["action"]!="")
{
  //--------------| �����ύ��������    |---------------
    $id          = $_POST["id"];
	$title       = $_POST["title"];
	$filename    = $_POST["filename"];
	$code        = $_POST["code"];
//    $title    = mb_convert_encoding($title,"gb2312","UTF-8");
//    $filename = mb_convert_encoding($filename,"gb2312","UTF-8");
//    $code     = mb_convert_encoding($code,"gb2312","UTF-8");

if($_POST["action"]=="edit"){
	if($title==""){
	echo backPage($article_title." ���ⲻ��Ϊ��,����д!","",2);
	exit();
	}
  //--------------------------------------------------

	$sql="update ".$article_table." set title='".$title."',filename='".$filename."',code='".$code."' where id=$id";
    $rs = new com("ADODB.RecordSet");
    $conn->execute($sql);

	echo backPage($action_name."�ɹ�!","km_article_manage.php",0);
	exit();

  //--------------| ����޸Ĳ���      |--------------

  
}elseif($_POST["action"]=="add"){
	if($title==""){
	echo backPage($article_title." ���ⲻ��Ϊ��,����д!","",2);
	exit();
	}
  //-------------------------------------
	$sql="insert into ".$article_table."(title,filename,code) values('".$title."','".$filename."','".$code."')";
    $rs = new com("ADODB.RecordSet");
    $conn->execute($sql);
	echo backPage($action_name."�ɹ�!","km_article_edit.php",0);
	exit();

	

}else{
	echo backPage($article_title."�ύ�Ĳ�������!","",2);
	exit();
}
	
}
?>





<?
 //=== �༭״̬>��ȡ���� ===
if(is_numeric($id)){
    $sql= "select * from ".$article_table." where id=$id";
    $rs = new com("ADODB.RecordSet");
    //recordset��open����
    $rs->Open($sql,$conn,1,1);
    //=== �ɹ���ȡ���� ===
	
 if(!$rs->eof){
    $r_id          =$rs["id"]->value;
	$r_title       =$rs["title"]->value;
	$r_filename    =$rs["filename"]->value;
	$r_code        =$rs["code"]->value;
    $rs  ->close;
    $conn->close;
}else{
    $rs  ->close;
    $conn->close;
	echo backPage($article_title."�ύ�Ĳ�������!","",2);
	exit();
}
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����Ա��ҳ��</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<br>
<table width="780" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow"><form id="artForm" name="artForm" method="post" action="">
<table width="100%" border="0" align=center cellpadding=1 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
        <tr>
          <td height="25" colspan="2" align="center" class="forumRaw" style="color:#CC0000"><strong><? echo $article_title;?></strong> ��Ϣ<? echo $action_name;?>		  </td>
          </tr>
		<tr>
          <td width="60" align="right" class="forumRow">����:</td>
          <td class="forumRow"><label>
            <input name="title" type="text" id="title" value="<? echo $r_title;?>" />
          </label></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">�ļ�����:</td>
          <td class="forumRow"><label>
          <input name="filename" type="text" id="filename" size="50" value="<? echo $r_filename;?>" />
          </label></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="forumRow">����:</td>
          <td class="forumRow">
<textarea name="code" cols="70" rows="25" id="code" style="width:100%"><? echo $r_code;?>
</textarea></td>
        </tr>
        
        <tr>
          <td align="right" class="forumRow">&nbsp;</td>
          <td class="forumRow"><input type="submit" name="button" id="button" value="�ύ�޸�" />
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
