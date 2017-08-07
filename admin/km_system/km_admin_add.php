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
	$str_username=$_POST["str_username"];
	$str_password=$_POST["str_password"];
	if($str_username=="" or $str_password==""){
		echo backPage("失败，请填写资料!","km_admin_add.php",0);
		exit();	
	}
	
	$sql="insert into km_admin(username,password) values('".$str_username."','".md5($str_password)."')";
	if(mysql_query($sql))
	{
		echo backPage("添加成功!","km_admin_add.php",0);
		exit();
	}
	else
	{
		echo backPage("失败，请联系管理员!","km_admin_add.php",0);
		exit();	
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>类别添加</title>
<link href="../km_style/style/style.css" rel="stylesheet" type="text/css" />
</head>

<body><br>
<table border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow">
<table width="100%" border="0" align=center cellpadding=2 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
        <tr>
          <td colspan="4" align="center" class="forumRaw"><strong>帐号管理</strong></td>
        </tr>
        <tr>
          <td align="center" class="forumRaw">编号</td>
          <td width="17%" class="forumRaw">帐号</td>
          <td width="51%" class="forumRaw">密码</td>
          <td width="16%" align="center" class="forumRaw">管理</td>
        </tr>
<form id="form1" name="form1" method="post" action="">
        <tr>
          <td align="center" class="forumRaw">0</td>
          <td class="forumRaw"><input name="str_username" type="text" id="str_username" size="15"></td>
          <td class="forumRaw"><input name="str_password" type="text" id="str_password" size="25"></td>
          <td align="center" class="forumRaw"><input type="submit" value="添加">
            <input type="hidden" name="action" id="action" value="do" /></td>
        </tr>
		
<?
$sql="select * from km_admin order by id asc";
$query=mysql_query($sql);
while ($row = mysql_fetch_array($query)) {   
?> 
        <tr>
          <td align="center" class="forumRow"><?php echo $row["id"];?></td>
          <td class="forumRow"><?php echo $row["username"];?></td>
          <td class="forumRow"><?php echo $row["password"];?></td>
          <td align="center" class="forumRow">
<a href="km_admin_del.php?id=<?php echo $row["id"];?>"  onclick="return confirm('你真的确定要删除吗？');"><img src="../km_style/images/ico/del.gif" alt="删除管理员" height="13" border="0" /></a>&nbsp;<a href="km_admin_edit.php?id=<?php echo $row["id"];?>"><img src="../km_style/images/ico/edit.gif" alt="修改管理帐号" height="12" border="0" /></a>		  </td>
        </tr>
<?
}
?>
</form>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
