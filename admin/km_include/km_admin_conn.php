<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-


 //==========================================
 //用于独立类文件夹内,如 km_article 文件夹内的调用
 //==========================================

 //--------------------| 调用文件 |----------------------
   include("../km_include/km_session.php");      //系统session记录文件
   include("../km_include/km_config.php");       //系统数据库链接配置
   include("../km_include/km_function.php");     //后台系统公共函数
 //-----------------------------------------------------
 
if($_SESSION["username"]=="")
{
  echo backPage("您还没有登陆，请你先登陆后再操作","../index.php",0);
  exit();		
}


 //---------------- |数据连接| ------------------
   $lnk = mysql_connect($sql_host,$sql_Uid,$sql_pass) or die ('Not connected : ' . mysql_error());
          mysql_select_db($sql_dbName, $lnk) or die ('Can\'t use news : ' . mysql_error());
	      mysql_query("SET NAMES ".$sql_code);
?>