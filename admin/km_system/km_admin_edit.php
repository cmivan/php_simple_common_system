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

<?
if($_POST["action"]=="do")
{
   $id=$_POST["id"];
   $str_username=$_POST["str_username"];
   $str_password=$_POST["str_password"];
if ($str_username!="" and $str_password!="" and is_numeric($id)){
   $sql="update km_admin set username='".$str_username."',password='".md5($str_password)."' where id=$id";
	if(mysql_query($sql))
	{
		echo backPage("恭喜您，修改成功!","km_admin_add.php",0);
		exit();
	}
	else
	{
		echo backPage("失败，请联系管理员!","km_admin_add.php",0);
		exit();	
	}

}else{
		echo backPage("失败，数据不足或有误!","km_admin_add.php",0);
		exit();
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

<body>
<?
$id=$_GET["id"];
if (!is_numeric($id)){
   echo backPage("参数有误!","km_admin_add.php",0);
   exit;
}


$sql="select * from km_admin where id=$id";
$query=mysql_query($sql);
$row = mysql_fetch_array($query);
?> 
<br />

<table border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow"><form id="form1" name="form1" method="post" action="">
<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
        <tr>
          <td align="right" class="forumRow">用户名：</td>
          <td class="forumRow"><label>
            <input readonly type="text" name="str_username" id="str_username"  value="<? echo($row["username"]);?>"/>
          </label></td>
          <td rowspan="2" class="forumRow"><input style="height:38px;" type="submit" name="button" id="button" value="提交修改" />
            <input type="hidden" name="action" id="action"  value="do"/>
            <input type="hidden" name="id" id="id"  value="<? echo($row["id"]);?>"/></td>
        </tr>
        <tr>
          <td align="right" class="forumRow">新管理密码：</td>
          <td class="forumRow"><input type="text" name="str_password" id="str_password"/></td>
          </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
