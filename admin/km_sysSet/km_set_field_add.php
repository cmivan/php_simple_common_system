<?php
//-=================================================-
//-====  |       ����php��վϵͳ v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : ��������             | ====-
//-=================================================-

  include("km_conn.php");                     //���ݿ�����
  
  $article_title="�ֶ�";
  $article_table="km_field";

?>

<?
  //--------------| ����Url����       |---------------
   $r_db_moduleID=$_GET["moduleID"];
   if(!is_numeric($r_db_moduleID)){
	echo backPage("��������!","",2);
	exit();
   }
   
   
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
	$db_name     = $_POST["db_name"];
	$db_filed    = $_POST["db_filed"];
	$db_type     = $_POST["db_type"];
	$db_length   = $_POST["db_length"];
	$db_moduleID = $_POST["db_moduleID"];
	
//    $db_name    = mb_convert_encoding($db_name,"gb2312","UTF-8");
//    $db_filed = mb_convert_encoding($db_filed,"gb2312","UTF-8");
//    $db_length     = mb_convert_encoding($db_length,"gb2312","UTF-8");

if($_POST["action"]=="edit"){
	if($db_name==""){
	echo backPage($article_title." ���ⲻ��Ϊ��,����д!","",2);
	exit();
	}
  //--------------------------------------------------

	$sql="update ".$article_table." set db_name='".$db_name."',db_filed='".$db_filed."',db_length='".$db_length."' where id=$id";
    $rs = new com("ADODB.RecordSet");
    $conn->execute($sql);

	echo backPage($action_name."�ɹ�!","",0);
	exit();

  //--------------| ����޸Ĳ���      |--------------

  
}elseif($_POST["action"]=="add"){
	if($db_name==""){
	echo backPage($article_title." ���ⲻ��Ϊ��,����д!","",2);
	exit();
	}
	
if(is_numeric($db_type) and is_numeric($db_length) and is_numeric($db_moduleID)){
  //-------------------------------------
	$sql="insert into ".$article_table."(db_name,db_filed,db_type,db_length,db_moduleID) values('".$db_name."','".$db_filed."',".$db_type.",".$db_length.",".$db_moduleID.")";
    $rs = new com("ADODB.RecordSet");
    $conn->execute($sql);
	echo backPage("��ӳɹ�!","",0);
	exit();
  //-------------------------------------
}else{
	echo backPage("��������!","",2);
	exit();
}

	

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
	$r_db_name     =$rs["db_name"]->value;
	$r_db_filed    =$rs["db_filed"]->value;
	$r_db_length   =$rs["db_length"]->value;
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
<table width="260" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow"><form id="artForm" name="artForm" method="post" action="">
<table width="100%" border="0" align=center cellpadding=1 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
        <tr>
          <td height="25" colspan="2" align="center" class="forumRaw" style="color:#CC0000"><strong><? echo $article_title;?></strong> ��Ϣ<? echo $action_name;?>		  </td>
          </tr>
		<tr>
          <td align="right" class="forumRow">����:</td>
          <td width="169" class="forumRow"><label>
            <input name="db_name" type="text" id="db_name" value="<? echo $r_db_name;?>" />
          </label></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">�ֶ�:</td>
          <td class="forumRow">
          <input name="db_filed" type="text" id="db_filed" value="<? echo $r_db_filed;?>" />		  </td>
        </tr>
        <tr>
          <td align="right" class="forumRow">����:</td>
          <td class="forumRow">
            <input name="db_length" type="text" id="db_length" value="<? echo $r_db_length;?>
"></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">�����:</td>
          <td class="forumRow">
		  <select name="db_type">
		  <option value="0">���������</option>
		  </select></td>
        </tr>
        
        <tr>
          <td align="right" class="forumRow">&nbsp;</td>
          <td class="forumRow"><input type="submit" name="button" id="button" value="�ύ�޸�" />
            <input type="hidden" name="action" id="action" value="<? echo $action;?>" />
            <input type="hidden" name="id" id="id" value="<? echo $r_id;?>" />
			<input type="hidden" name="db_moduleID" id="db_moduleID" value="<? echo $r_db_moduleID;?>" />
			</td>
        </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
