<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

  include("km_conn.php");                     //数据库连接
  include("../km_include/km_config.php"); 

  $article_title="模块";
  $article_table="km_table";
  
?>


<?php
//　　*php生成目录代码 生成目录
function makepath($path){
     $paths=realpath($path);
	 if(!is_dir($path)){
	 if(!mkdir($path)){
	 echo "<br>没有生成目录 ".$path;
	 }else{
	 echo "<br>生成目录 ".$path;
	 }
	 }
}




//------- 普通删除、数据处理
   $del_id=$_GET["del_id"];
if (is_numeric($del_id)){
 //内容删除 ========================
   $sql="delete from ".$article_table." where id=$del_id";   //删除大类
   $conn->execute($sql);
    echo backPage("成功删除!","km_set_manage.php",0);
    exit();
	}



//------- 批量生成、数据处理
  $make_id=$_POST["make_id"];
  if(!empty($make_id)){
     $make_id_arr  =$make_id;
     $make_id_size = count($make_id_arr); 
	  for($i=0;$i<$make_id_size;$i++){
	  
	     if(is_numeric($make_id_arr[$i])){


	//-------读取系统配置数据(go)--------------	
	          $read_sql="select top 1 * from km_config";
              $read_rs = new com("ADODB.RecordSet");
              $read_rs->Open($read_sql,$conn,1,1);
		      if(!$read_rs->eof){
			      $db_prefixs    = $read_rs["db_prefix"]->value;
			      $db_sql_admin  = $read_rs["db_sql_admin"]->value;
				  $db_sql_main   = $read_rs["db_sql_main"]->value;
				  $db_sql_class_b= $read_rs["db_sql_class_b"]->value;
				  $db_sql_class_s= $read_rs["db_sql_class_s"]->value;
			  
			  }
			  $read_rs->close;



	      $make_id_sql="select * from ".$article_table." where id=$make_id_arr[$i]";
          $make_rs = new com("ADODB.RecordSet");
          $make_rs->Open($make_id_sql,$conn,1,1);
	       while(!$make_rs->eof){
		  //生成相应的目录
		     $db_title = $make_rs["title"];
			 $db_table = $make_rs["tables"];
		  //=======
			 $db_tables= $sql_prefix.$db_table;
			 
		     $paths="../".$sql_prefix.$db_table;
              makepath($paths);
		 
		 
	//################ 读取增加的字段 ################
             $field_sql="select * from km_field where db_moduleID=$make_id_arr[$i]";
             $field_rs = new com("ADODB.RecordSet");
             $field_rs->Open($field_sql,$conn,1,1);

			 //初始化该变量，以免数据重叠
			 $field_sql_str   ="";
			 $field_post_str  ="";
			 $field_table_str ="";
			 $field_edit_str  ="";
			 $field_add_str1  ="";
			 $field_add_str2  ="";
			 $field_read_str  ="";
			 
	          while(!$field_rs->eof){
			     $db_filed=$field_rs["db_filed"]->value;
			   
			   //生成sql文件用
			     $field_sql_str  =$field_sql_str."\r\n  `".$db_filed."` char(255) default NULL,";
               //生成编辑文件-接收字段
			     $field_post_str=$field_post_str."	\$".$db_filed."       = \$_POST[\"".$db_filed."\"];\r\n";
			   //生成编辑文件-编辑框
			     $field_table_str=$field_table_str."\r\n\r\n<tr><td width=60 align=right class=forumRow>".$field_rs["db_name"]->value.":</td>\r\n<td class=forumRow>\r\n<input name=".$db_filed." type=text id=".$db_filed." size=50 value=\"<? echo \$r_".$db_filed.";?>\" />\r\n</td></tr>";
			   //生成编辑文件-修改字段
			     $field_edit_str=$field_edit_str.",$db_filed='\$$db_filed'";
			   //生成编辑文件-添加字段
				 $field_add_str1=$field_add_str1.",$db_filed";
			     $field_add_str2=$field_add_str2.",'\".\$$db_filed.\"'";
			   //生成编辑文件-读取字段
				 $field_read_str=$field_read_str."\$r_$db_filed       =\$row[\"$db_filed\"];\r\n";
			   
			   $field_rs->movenext();
			  }
			  $field_rs->close;
	//################################################
				 
				 
				 
				 
				 
            $get_sql_main    = str_replace("{db_tables}",$db_tables,$db_sql_main);
			//替换数据库字段
			$get_sql_main    = str_replace("{db_field_sql}",$field_sql_str,$get_sql_main);
			
			
			$get_sql_class_b = str_replace("{db_tables}",$db_tables,$db_sql_class_b);
			$get_sql_class_s = str_replace("{db_tables}",$db_tables,$db_sql_class_s);
			
			$get_sql=$get_sql."\r\n\r\n".$get_sql_main."\r\n\r\n".$get_sql_class_b."\r\n\r\n".$get_sql_class_s."\r\n\r\n\r\n\r\n\r\n";
	 
				 
				 
	//-------生成相应的文件(go)--------------
	          $makef_sql="select * from km_files";
              $makef_rs = new com("ADODB.RecordSet");
              $makef_rs->Open($makef_sql,$conn,1,1);
		       while(!$makef_rs->eof){
			    $make_code=$makef_rs["code"];
				$make_code=str_replace("{db_title}",$db_title,$make_code);
			    $make_code=str_replace("{db_table}",$db_table,$make_code);
				
				$make_code= str_replace("{field_table_str}",$field_table_str,$make_code);
				$make_code= str_replace("{field_post_str}",$field_post_str,$make_code);
				$make_code= str_replace("{db_field_sql}",$field_sql_str,$make_code);
				$make_code= str_replace("{db_field_edit}",$field_edit_str,$make_code);
				$make_code= str_replace("{db_field_add1}",$field_add_str1,$make_code);
				$make_code= str_replace("{db_field_add2}",$field_add_str2,$make_code);
				$make_code= str_replace("{db_field_read}",$field_read_str,$make_code);
				
				
				$make_code=iconv('gb2312','UTF-8',$make_code); 
				
	
                $makef_str=fopen ($paths.'/'.$makef_rs["filename"],'w');
                           fputs ($makef_str,$make_code);
                           fclose($makef_str);

		       $makef_rs->movenext();
		       }
			  $makef_rs->close;
	//-------生成相应的文件(end)--------------

	
			  $make_rs->movenext();
			  }
			  } 
			  }
			  
			  
	//***--------------------------------
	//-------生成数据库文件--------------				  
	//***--------------------------------	
	    $get_sql=$db_sql_admin."\r\n\r\n\r\n".$get_sql;
        $get_str=fopen ("../../install/km_install.sql",'w');
                 fputs ($get_str,$get_sql);
                 fclose($get_str);

	     echo backPage("成功生成!","km_set_manage.php",0);
         exit();
			  
		 }
		 
		 $make_rs->close;


		 
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
<title>模块管理</title>
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
	  if(document.getElementById("make_"+i).checked==""){
	     document.getElementById("make_"+i).checked="checked";
	   }
	   else{
	     document.getElementById("make_"+i).checked="";
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

	<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
	  <tr>
        <td colspan="4" align="center" bgcolor="#E6E6E6" class="forumRaw" style="color:#CC0000">
<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
            <tr>
              <td align="center" class="forumRaw"><span class="forumRaw aTitle">
			  <? echo $article_title;?> 管理列表 </span></td>
              <td align="right" class="forumRaw">
			  <table border="0" cellpadding="0" cellspacing="0">
<form name="allmake_Form" method="post" action="">
			    <tr>
				  <td align="center" valign="bottom" style="padding-right:3px;"><? if($_SESSION[$article_table."keyswordStr"]!=""){
				      echo "&nbsp; <a href=\"?keyword_del=del\">清空关键词</a>&nbsp;";
					  }else{
					  echo "&nbsp; <a>填写关键词</a>&nbsp;";
					  }?></td>
				  <td style="padding-right:3px;"><input name="keysword" type="text" id="keysword" style="background-color:#EEF7FD" value="<? echo $_SESSION[$article_table."keyswordStr"];?>" size="25" maxlength="20" /></td>
                  <td><input type="submit" name="Submit" value="<? echo $article_title;?>搜索" /></td>
                  </tr>
                </form>
              </table></td>
              </tr>
          </table></td>
        </tr>


<form name="allmake_Form" method="post" action="">
<tr>
        <td width="22" bgcolor="#E6E6E6" class="forumRaw">&nbsp;</td>
        <td width="174" bgcolor="#E6E6E6" class="forumRaw">&nbsp;<? echo $article_title;?>名称</td>
        <td width="271" bgcolor="#E6E6E6" class="forumRaw">&nbsp;表段</td>
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
	   
if(!$rs->eof){
	while(!$rs->eof){
//----数据总数大于0，即有记录
       $delNum++;
?> 
      
      <tr style="background-color:#EEF7FD" onmouseover="cursor_('on',this);" onmouseout="cursor_('',this);">
        <td align="center" class="forumRow2"><input name="make_id[]" type="checkbox" id="make_<? echo $delNum;?>" value="<? echo $rs["id"]->value;?>" checked="checked" /></td>
        <td align="left" class="forumRow2">&nbsp;<a href="km_set_edit.php?id=<?php echo ($rs["id"]->value); ?>"><? echo $rs["id"]->value;?>.<?php echo showShort($rs["title"]->value,30); ?> </a></td>
        <td align="left" class="forumRow2">&nbsp;<?php echo $rs["tables"]->value; ?></td>
        <td width="38" align="center" class="forumRow2"><a href="?del_id=<?php echo ($rs["id"]->value); ?>"  onclick="return confirm('确定要删除该信息？');"><img src="../km_style/images/ico/del.gif" alt="删除" width="14" border="0" /></a>&nbsp;<a href="km_set_edit.php?id=<?php echo ($rs["id"]->value); ?>"><img src="../km_style/images/ico/edit.gif" alt="编辑" height="14" border="0" /></a></td>
      </tr>

<?
   $rs->MoveNext();
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
<td height="20" align="center" class="forumRaw"><span class="forumRow2">
  <input name="checkbox" type="checkbox" onclick="allDel(<? echo $delNum;?>);" />
</span></TD>
<td height="20" colspan="3" class="forumRaw"><input name="提交" type="submit" value="生成选模块" onclick="return confirm('确定生成选中的项？');" /> 
  &nbsp;[<a href="../../install/index.php">进入安装页面</a>]</TD>
</tr></form>

 </table>

 </td>
  </tr>
</table>
</body>
</html>
