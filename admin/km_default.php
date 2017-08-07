<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

   include("km_include/km_main_conn.php");
?>
<html>
<head>
<meta http-equiv=Content-Type content=text/html; charset=utf-8>
<link href="km_style/style/style.css" rel="stylesheet" type="text/css">
</head>
<BODY leftMargin=0 topMargin=0 rightMargin=0 style="overflow:hidden">
<TABLE style="BORDER-COLLAPSE: collapse" cellSpacing=0 cellPadding=0 width="100%" height="100%" border=0>
<TR><TD height="25" style="background-repeat:no-repeat" bgcolor="#30669C"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="180" valign="bottom"></td>
    <td width="586" valign="bottom"></td>
  </tr>
  <tr>
    <td class="greentext" style="padding:10px; font-size:20px; font-family:Georgia, 'Times New Roman', Times, serif"><span class="greentext">企业网站管理系统 V1.0</span></td>
    <td align="center">
<div class="MENU">
<a href="index.php" target="_top">退出系统</a>
<a href="http://www.heyou51.com" target="_blank">访问官网</a>
<a href="km_system/km_system_info.php" target="km_main">系统菜单</a>
<a href="km_left.php" target="km_left">中文系统</a>
<a href="../adminEN/km_left.php" target="km_left">英文系统</a></div>
	</td>
  </tr>
</table>
</TD>
</TR>
<TR>
  <TD height="5" background="SYS_WEB_FILES/IMAGES/topLine_.gif" bgcolor="#000000"></TD>
</TR>
<TR>
  <TD>
<script>
if(self!=top){top.location=self.location;}
function switchSysBar(){
if (document.all("frmTitle").style.display==""){
document.all("frmTitle").style.display="none"
}else{
document.all("frmTitle").style.display=""
}}
</script>
<table width="100%" height="100%" border="0" align="center" cellPadding="0" cellSpacing="0">
  <tr>
    <td width="165" align="middle" vAlign="top" noWrap id="frmTitle"><iframe frameborder="0" id="km_left" name="km_left" scrolling=auto src="km_left.php" style="HEIGHT: 100%; VISIBILITY: inherit; WIDTH: 165px; Z-INDEX: 2"></iframe></td>
    <td style="WIDTH: 9pt; background-color:#30669C"><table border="0" cellpadding="0" cellspacing="0" height="100%">
      <tr>
        <td valign="middle" style="HEIGHT: 100%; padding:3px;" onClick="switchSysBar()">&gt;</td>
      </tr>
    </table></td>
		<td valign="top" style="WIDTH: 100%">
<iframe frameborder="0" id="main" name="km_main" scrolling="yes" src="km_system/km_system_info.php" style="HEIGHT: 100%; VISIBILITY: inherit; WIDTH: 100%; Z-INDEX: 1"></iframe></td>
  </tr>
</table>
<script>
  if(window.screen.width<'1024'){switchSysBar()}
</script>
  </TD>
</TR>
</TABLE>

</body>
</html>