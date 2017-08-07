<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

//$session_save_path = dirname(__FILE__)."/km_include/sessions";
//session_save_path($session_save_path);
  session_start();
  
  include("km_include/km_config.php");       //系统数据库链接配置
  include("km_include/km_function.php");     //后台系统公共函数

if($_POST["action"]=="do")
{
	$username=$_POST["username"];
	$password=$_POST["password"];

	
	$_SESSION["trytimes"]=$_SESSION["trytimes"]+1;
	//请在这里判断登陆
	if($_SESSION["trytimes"]>3)
	{
		//尝试大于3次则判断验证码
		if($_POST["code"]==$_SESSION["verifycode"])
		{
$lnk = mysql_connect($sql_host,$sql_Uid,$sql_pass)
       or die ('Not connected : ' . mysql_error());
       mysql_select_db($sql_dbName, $lnk) or die ('Can\'t use news : ' . mysql_error());

			mysql_query("SET NAMES ".$sql_code);	
			$result=mysql_query("select count(*) from km_admin where username='$username' and password='".md5($password)."'");
			$row = mysql_fetch_array($result);
			if($row[0]==0)
			{
				echo backPage("用户名密码不匹配!","km_login.php",0);
				exit();			
			}	
			else
			{
				$_SESSION["username"]=$username;
		        $_SESSION["password"]=$password;
				echo backPage("登陆成功,正在载入...","km_default.php",0);
				exit();					
			}		
		}
		else
		{
			    echo backPage("验证码错误!","km_login.php",0);
		}
	}
$lnk = mysql_connect($sql_host,$sql_Uid,$sql_pass)
       or die ('Not connected : ' . mysql_error());
    mysql_select_db($sql_dbName, $lnk) or die ('Can\'t use news : ' . mysql_error());
	mysql_query("SET NAMES ".$sql_code);	
	$result=mysql_query("select count(*) from km_admin where username='$username' and password='".md5($password)."'");
	$row = mysql_fetch_array($result);
	if($row[0]==0)
	{
		echo backPage("用户名密码不匹配!","km_login.php",0);	
		exit();			
	}	
	else
	{
				$_SESSION["username"]=$username;
		        $_SESSION["password"]=$password;
				echo backPage("登陆成功,正在载入...","km_default.php",0);
		exit();					
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登陆</title>
<script language="javascript">
function refreshVerifyCode()
{
	document.getElementById('verifycode').src="km_include/verifycode.php?random="+Math.random(); 
}

function check(){

 theForm=document.all.LoginForm;

	if (theForm.username.value == "") {
		alert("请输入用户名");
		theForm.username.focus();
		return false;
	}
	if (theForm.password.value == "") {
		alert("请输入密码");
		theForm.password.focus();
		return false;
}
	if (theForm.code.value == "") {
		alert("请输入校验码");
		theForm.code.focus();
		return false;
}

 return true;
}

</SCRIPT>

<link href="km_style/style/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="overflow:hidden">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100%" valign="middle">	<table width="473" height="299" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="482" height="294" valign="bottom" background="km_style/images/login/manage_back1.jpg"><table width="97%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="157" valign="bottom"><table width="320"  border="0" cellpadding="0" cellspacing="0">
                <form action="" method="post" name="LoginForm">
                  <tr>
                    <td width="95" height="30"><div align="right">管理名称：</div></td>
                    <td width="225"><input name="username" type="text" class="login_input" id="username" size="20" />                    </td>
                  </tr>
                  <tr>
                    <td height="30"><div align="right">管理密码：</div></td>
                    <td><input name="password" type="password" class="login_input" id="password" size="20" maxlength="15" /></td>
                  </tr>

<?
    	if($_SESSION["trytimes"]>2)
		{
	?>
                  <tr>
                    <td><div align="right">验证码：</div></td>
                    <td width="225"><input name="code" type="text" id="code" size="8" />
                      <a href="#"><img src="km_include/verifycode.php" alt="点击刷新" name="verifycode" height="18" border="0" align="absmiddle" class="code_img" id="verifycode" onClick="refreshVerifyCode();" /></a></td>
                  </tr>
<?
}
?>

                 <tr>
                    <td height="40">&nbsp;</td>
                    <td><input name="Submit" type="image" id="Submit" src="km_style/images/login/loginForm_Btn.jpg" alt="登录" />
                      <a href="#"><span class="forumRow">
                      <input type="hidden" name="action" id="action"  value="do" />
                      </span></a>					</td>
                  </tr>
                </form>
              </table></td>
            </tr>
            <tr align="left">
              <td height="77" valign="bottom"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="66%">&nbsp;</td>
                  <td width="34%">技术支持：<A href="http://www.heyou51.com" target=_blank>广州合优网络</A></td>
                </tr>
              </table>
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
        </table></td>
      </tr>
    </table>
</td>
  </tr>
</table>

</body>
</html>
