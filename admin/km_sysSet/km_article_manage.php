<?php
//-=================================================-
//-====  |       ����php��վϵͳ v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : ��������             | ====-
//-=================================================-

  include("km_conn.php");                     //���ݿ�����

  $article_title="ҳ��";
  $article_table="km_files";
  
?>


<?php
//------- ��ͨɾ�������ݴ���
$del_id=$_GET["del_id"];
if (is_numeric($del_id)){
 //����ɾ�� ========================
   $sql="delete from ".$article_table." where id=$del_id";   //ɾ������
    if(mysql_query($sql))
	{
	$del_Info=$del_Info."�ɹ�ɾ��!";
    echo backPage($del_Info,"km_article_manage.php",0);
    exit();
	}
	else
	{
	echo backPage("ɾ��ʧ�ܣ�����ϵ����Ա!","km_article_manage.php",0);
	exit();
	}
	}




//------- ����ɾ�������ݴ���
  $del_id=$_POST["del_id"];
  if(!empty($del_id)){
     $del_id_arr  =$del_id;
     $del_id_size = count($del_id_arr); 
	  for($i=0;$i<$del_id_size;$i++){
	     if(is_numeric($del_id_arr[$i])){
		 
	//=========| ���ϣ���ɾ�� |============
		 $del_id_sql="delete from ".$article_table." where id=$del_id_arr[$i]";   //ɾ������
         mysql_query($del_id_sql);
	     echo backPage("�ɹ�ɾ��!","km_article_manage.php",0);
         exit();
	//====================================

		 } 
		 }
		 }




		 
  //�ж�����\��ա����� ======================
 
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
<title>�������</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />
<script>
//��������ƹ���ʽ
function cursor_(ctype,objs){
    if (ctype=="on"){
	   objs.style.backgroundColor="#ffffff";
	}else{
	   objs.style.backgroundColor="#EEF7FD";
	}

}

//��������ɾ��
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
			  <? echo $article_title;?> �����б� </span></td>
              <td align="right" class="forumRaw"><table border="0" cellpadding="0" cellspacing="0">
                <tr>
				  <td align="center" valign="bottom" style="padding-right:3px;"><? if($_SESSION[$article_table."keyswordStr"]!=""){
				      echo "&nbsp; <a href=\"?keyword_del=del\">��չؼ���</a>&nbsp;";
					  }else{
					  echo "&nbsp; <a>��д�ؼ���</a>&nbsp;";
					  }?></td>
				  <td style="padding-right:3px;"><input name="keysword" type="text" id="keysword" style="background-color:#EEF7FD" value="<? echo $_SESSION[$article_table."keyswordStr"];?>" size="25" maxlength="20" /></td>
                  <td><input type="submit" name="Submit" value="<? echo $article_title;?>����" /></td>
                  </tr>
                
              </table></td>
              </tr>
          </table></td>
        </tr>
      <tr>
        <td width="199" bgcolor="#E6E6E6" class="forumRaw">&nbsp;<? echo $article_title;?>����</td>
        <td width="273" bgcolor="#E6E6E6" class="forumRaw">&nbsp;�ļ�����</td>
        <td width="38" align="center" bgcolor="#E6E6E6" class="forumRaw">����</td>
      </tr>
	  
	  
<?
  //��ȡ���� ===========================
if($classid_b=="" and $classid_s=="" ){
  //��ȡ�������� =======================
 if($_SESSION[$article_table."keyswordSql"]!=""){
    $key_sql=" where ".$_SESSION[$article_table."keyswordSql"];
	}
   $sql="select * from ".$article_table.$key_sql;
}else{

 if($_SESSION[$article_table."keyswordSql"]!=""){
    $key_sql=$_SESSION[$article_table."keyswordSql"];
	}
  
 if(is_numeric($classid_b) and is_numeric($classid_s)){
  //ɸѡ��С��ͬʱ���ϵ� =======================
   $sql="select * from ".$article_table." where ".$key_sql;
   }elseif(is_numeric($classid_b)){
  //ɸѡ������ϵ� ======================
   $sql="select * from ".$article_table." where ".$key_sql;
   }elseif(is_numeric($classid_s)){
  //ɸѡС����ϵ� ======================
   $sql="select * from ".$article_table." where ".$key_sql;
   }else{
  //��ȡ�������� =======================
 if($_SESSION[$article_table."keyswordSql"]!=""){
    $key_sql=" where ".$_SESSION[$article_table."keyswordSql"];
	}
   $sql="select * from ".$article_table.$key_sql;
   }
   }

    $sql   = $sql." order by id asc";
//recordset��open����
    $rs = new com("ADODB.RecordSet");
    $rs->Open($sql,$conn,1,1);
       
	   $delNum=0;
	while(!$rs->eof){
//----������������0�����м�¼
       $delNum++;
?> 
      
      <tr style="background-color:#EEF7FD" onmouseover="cursor_('on',this);" onmouseout="cursor_('',this);">
        <td align="left" class="forumRow2">&nbsp;<a href="km_article_edit.php?id=<?php echo ($rs["id"]->value); ?>"><? echo $rs["id"]->value;?>.<?php echo showShort($rs["title"]->value,30); ?>
        </a>		</td>
        <td align="left" class="forumRow2">&nbsp;<?php echo $rs["filename"]->value; ?></td>
        <td width="38" align="center" class="forumRow2"><a href="km_article_edit.php?id=<?php echo ($rs["id"]->value); ?>"><img src="../km_style/images/ico/edit.gif" alt="�༭" height="14" border="0" /></a></td>
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
