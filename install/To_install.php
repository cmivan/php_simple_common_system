<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

  session_start();
  include("../admin/km_include/km_config.php"); 
  
if($_SESSION["username"]!="")
{
   $install_host   = $sql_host;  //数据库 主机 
   $install_Uid    = $sql_Uid;       //数据库 连接用户 
   $install_pass   = $sql_pass;       //数据库 连接密码 
   $install_dbName = $sql_dbName; //数据库 名称 
   $install_code   = $sql_code;       //读取数据编码方式 
   $install_prefix = $sql_prefix;        //读取数据前缀 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>卡米建站系统：安装界面</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function fnOnSubmit(form) {
    if (form.db.value == '') {
        alert('必须输入数据库名称');
        form.db.focus();
        return false;
    }
	if (form.host.value == '') {
        alert('必须输入数据库服务器');
        form.host.focus();
        return false;
    }
	if (form.name.value == '') {
        alert('必须输入数据库用户名');
        form.name.focus();
        return false;
    }
	if (form.admin.value == '') {
        alert('必须输入管理员帐号');
        form.name.focus();
        return false;
    }
	if (form.adminpass.value == '') {
        alert('必须输入管理员密码');
        form.adminpass.focus();
        return false;
    }
    return true;
	if (form.adminpassi.value == '') {
        alert('必须输入确认管理员密码');
        form.adminpassi.focus();
        return false;
    }
    return true;
}
</script>
</head>

<body>
<div id="error_a">
	<div id="error_a_a">
		<div id="error_y">
		<div id="op"><img src="img/logo.png" width="319" /></div>
		  <form id="form1" name="form1" method="post" action="install.php" onsubmit="return fnOnSubmit(this)";>
			<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#000000" id="table">
  <tr>
    <td colspan="2" align="center" bgcolor="#2A2A2A" id="thead" scope="col"><strong>安装界面</strong></td>
    </tr>
  <tr>
    <td width="37%" height="20" align="left" bgcolor="#2A2A2A">数据库服务器</td>
    <td width="63%" align="left" bgcolor="#2A2A2A"><input name="host" type="text" value="<? echo $install_host;?>" class="textinput" /></td>
  </tr>
  <tr>
    <td height="20" align="left" bgcolor="#2A2A2A">数据库用户名</td>
    <td align="left" bgcolor="#2A2A2A"><input name="name" type="text" value="<? echo $install_Uid;?>" class="textinput" /></td>
    </tr>
  <tr>
    <td height="20" align="left" bgcolor="#2A2A2A">数据库密码</td>
    <td align="left" bgcolor="#2A2A2A"><input name="mysqlpass" type="password" class="textinput" value="<? echo $install_pass;?>" /></td>
    </tr>
  <tr>
    <td height="20" align="left" bgcolor="#2A2A2A">数据库名称</td>
    <td align="left" bgcolor="#2A2A2A"><input name="db" type="text" value="<? echo $install_dbName;?>" class="textinput" /></td>
    </tr>
  <tr>
    <td height="20" align="left" bgcolor="#2A2A2A">管理员帐号</td>
    <td align="left" bgcolor="#2A2A2A"><input name="admin" type="text" class="textinput" value="admin" /></td>
    </tr>
  <tr>
    <td height="20" align="left" bgcolor="#2A2A2A">管理员密码</td>
    <td align="left" bgcolor="#2A2A2A"><input name="adminpass" type="password" class="textinput" value="admin" /></td>
    </tr>
  <tr>
    <td height="20" align="left" bgcolor="#2A2A2A">确认管理密码</td>
    <td align="left" bgcolor="#2A2A2A"><input name="adminpassi" type="password" class="textinput" value="admin" /></td>
    </tr>
  <tr>
    <td height="20" bgcolor="#2A2A2A">&nbsp;</td>
    <td align="left" bgcolor="#2A2A2A"><input type="submit" name="Submit" value="下一步" /></td>
    </tr>
</table></form></div>
	</div>
</div>

</body>
</html>
