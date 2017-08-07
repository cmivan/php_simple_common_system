<? 
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

   //---------------- |数据连接| ------------------
    include("../km_include/km_admin_conn.php"); 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>类别添加</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />
</head>

<body><br>
<table width="600" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow">
<table width="100%" border="0" align=center cellpadding=5 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td colspan="2" class="forumRaw"><div align="center">
      <DIV align=center><font color="#666666">服务器系统信息</font></DIV>
    </div></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器系统：</td>
    <td class="forumRow">&nbsp;<?php echo defined('PHP_OS')?PHP_OS:'未知';?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器版本：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["SERVER_SOFTWARE"];?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器语言环境：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["HTTP_ACCEPT_LANGUAGE"];?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器域名：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["SERVER_NAME"];?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器IP地址：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["SERVER_ADDR"];?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器端口：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["SERVER_PORT"];?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器根目录：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["DOCUMENT_ROOT"];?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器时区：</td>
    <td class="forumRow">&nbsp;<?php echo date("T",time())?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务器时间：</td>
    <td class="forumRow">&nbsp;<?php echo date("Y年m月d日 H:i:s",time());?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务端通信协议：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["SERVER_PROTOCOL"];?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务端剩余空间：</td>
    <td class="forumRow">&nbsp;<?php echo intval(diskfreespace(".")/(1024*1024)).'MB';?></td>
  </tr>
  <tr>
    <td width="120" class="forumRow">服务端管理员邮箱：</td>
    <td class="forumRow">&nbsp;<?php echo $_SERVER["SERVER_ADMIN"]?></td>
  </tr>
  <?php
          if($myself_look!=0)
          {
  ?>
  <tr>
    <td width="120" class="forumRow">系统当前用户名：</td>
    <td class="forumRow">&nbsp;<?php get_current_user();?></td>
  </tr>
  <? }?>
  <tr>
    <td width="120" class="forumRaw">本文件路径：</td>
    <td class="forumRaw">&nbsp;<?php echo $_SERVER["SCRIPT_FILENAME"]?></td>
  </tr>
</table>
    </td>
  </tr>
</table>
</body>
</html>
