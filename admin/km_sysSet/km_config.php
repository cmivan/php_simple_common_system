<? 
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 卡米.伊凡            | ====-
//-=================================================-


  //利用PHP预定义类com声明一个数据库连接对象，并利用ADO连接数据库
  $conn = new com("adodb.connection"); 
  //设置数据库连接驱动
  $connstr="provider=microsoft.jet.oledb.4.0;data source=". realpath("km_php.mdb");
  //调用com类的open()方法来执行上述连接驱动
  $conn->open($connstr); 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统配置</title>
<link href="../../km_style/style/style.css" rel="stylesheet" type="text/css" />
</head>

<body><br>
<table width="600" border="0" align=center cellpadding=10 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="90%" class="forumRow">
<table width="100%" border="0" align=center cellpadding=5 cellspacing=1 bordercolor="#FFFFFF" bgcolor="#C4D8ED">
  <tr>
    <td width="120" colspan="2" class="forumRaw">&nbsp;</td>
  </tr>

</table>
    </td>
  </tr>
</table>
</body>
</html>
