<? 
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
       $classid=$_GET["classid"];
	if($classid==""){
	   $action     ="add";
       $action_name="添加";
      }else{
       $action     ="edit";
       $action_name="修改";
	  }
	  
	  

if($_POST["action"]!="")
{
    $classid_b=$_POST["classid_b"];
	$classname=$_POST["classname"];
	$classid  =$_POST["classid"];
	
if($_POST["action"]=="edit"){
  //--------------| 判断接收数据是否符合 |---------------
 if($classname!="" and is_numeric($classid)){
	
	//判断是否修改id值
	if(is_numeric($classid_b)){
	$sql="update ".$article_table."_class_b set classname='".$classname."',classid_b=".$classid_b." where classid_b=$classid";
	}else{
	$sql="update ".$article_table."_class_b set classname='".$classname."' where classid_b=$classid";
	}
	
	if(mysql_query($sql))
	{
	echo backPage("恭喜您，".$action_name."成功!","km_class_manage.php",0);
	exit();
	}else{
	echo backPage("失败，请联系管理员!","km_class_manage.php",0);
	exit();	
	}
	
}else{
	echo backPage("失败,参数不足或有误!","km_class_manage.php",0);
	exit();
	}
  //--------------| 完成修改操作      |--------------
  
}elseif($_POST["action"]=="add"){
   if($classname==""){
   echo backPage("失败,参数不足或有误!","km_class_b_add.php",0);
   exit();
   }
  //--------------| 先获取数据的最大排序  |----------------
   	$class_b_max=0;   //初始化最大值参数
    $sql_max   = "select ".$article_table."_class_b.* from ".$article_table."_class_b";
	$query_max = mysql_query($sql_max);
	 while($row_max=mysql_fetch_array($query_max)){
	       $class_b_min=$row_max["classOrder"];
		   if(is_numeric($class_b_min)){
		      if($class_b_min>$class_b_max){
			     $class_b_max=$class_b_min;
			    }
		   }
	 }
	 
	$class_b_max++;  //新项要加 1

   //--------------| 添加新项            |---------------
  $sql="insert into ".$article_table."_class_b(classname,classOrder) values('".$classname."','".$class_b_max."')";
  if(mysql_query($sql))
	{
	echo backPage("分类".$action_name."成功!","km_class_manage.php",0);
	exit();
	}
	else
	{
	echo backPage("失败，请联系管理员!","km_class_manage.php",0);
	exit();	
	}
}
	
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员主页面</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />

</head>

<body style="overflow:hidden">
<?
	
if (is_numeric($classid)){
    $sql  ="select * from ".$article_table."_class_b where classid_b=$classid";
    $query=mysql_query($sql);
    $row  =mysql_fetch_array($query);
    if($row){
       $r_classid_b  =$row["classid_b"];
       $r_classname  =$row["classname"];
	   }
}
?> 
<br />

<table border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow"><form id="form1" name="form1" method="post" action="">
<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
        <tr class="disNone">
          <td align="right" class="forumRow"><? echo $article_title;?>类别ID</td>
          <td class="forumRow"><input name="classid_b" type="text" id="classid_b"  value="<? echo $r_classid_b;?>" size="10"/></td>
          <td class="forumRow">&nbsp;</td>
        </tr>
	   
	    <tr>
          <td align="right" class="forumRow"><? echo $article_title;?>类别名称</td>
          <td class="forumRow"><input type="text" name="classname" id="classname"  value="<? echo $r_classname;?>"/>		  </td>
          <td class="forumRow"><input type="submit" name="button" id="button"
		   value="提交<? echo $action_name;?>" />
            <input type="hidden" name="action" id="action"  value="<? echo $action;?>"/>
            <input type="hidden" name="classid" id="classid"  value="<? echo $r_classid_b;?>"/></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
