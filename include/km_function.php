<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-====  |       定义函数库，以便同类调用         | ====-
//-=================================================-
?>



<?php
//-====  |       读取信息列表(分页+) 参数：           | ====-
//-====  |       $db_table     ,相应的数据表        | ====-
//-====  |       $db_b\$db_s   ,相应大小类          | ====-
//-====  |       $db_num       ,读取的条数          | ====-
//-====  |       $db_style     ,显示方式            | ====-
//-====  |       $db_paging    ,是否分页            | ====-
  function getlist($db_table,$db_b,$db_s,$db_num,$db_style,$db_paging){

  }
?>





<?php
//-====  |       根据分类id读取相应的分类名称 参数：    | ====-
//-====  |       $db_table     ,相应的数据表         | ====-
//-====  |       $db_type      ,用来判读属大类或小类  | ====-
//-====  |       $db_classid   ,目标分类id          | ====-
  function getClass($db_table,$db_type,$db_classid)
  {
  if ($db_type=='b'){
   $getsql="select * from ".$db_table."_class_b where classid_b=".$db_classid;
   }else{
   $getsql="select * from ".$db_table."_class_s where classid_s=".$db_classid;
   }
   
   $getquery=mysql_query($getsql);
       $row=mysql_fetch_array($getquery);
	   return $row["classname"];
   }
   
   echo getClass("km_article","b",2);
?>
