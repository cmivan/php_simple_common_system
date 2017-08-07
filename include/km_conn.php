<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-


//-------------- |读取数据库配置| ------------
  include("admin/km_include/km_config.php");
  
//-------------- |连MySql数据库| ------------ 
$lnk=mysql_connect($sql_host,$sql_Uid,$sql_pass) or die ('Not connected : ' . mysql_error());
     mysql_select_db($sql_dbName, $lnk) or die ('Can\'t use database! ' . mysql_error());
	 mysql_query("SET NAMES ".$sql_code);

//-------------- |读取 系统函数| ------------
  include("include/km_function.php");
?>