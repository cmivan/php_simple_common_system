<?php
  $session_save_path = dirname(__FILE__)."/km_include/sessions";
  session_save_path($session_save_path);
  session_start();
  
  session_unset();
  session_destroy();
  
  include("km_include/km_config.php");       //系统数据库链接配置
  include("km_include/km_function.php");     //后台系统公共函数
  echo backPage("进入登陆页面, Waitting ...","km_login.php",0);
?>