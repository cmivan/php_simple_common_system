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
$id=$_GET["id"];

$sql    ="delete from km_admin where id=$id";   //删除帐号
if(mysql_query($sql))
{
echo backPage("删除成功!","km_admin_add.php",0);
exit();
}
else
{
	echo backPage("删除失败，请联系管理员!","km_admin_add.php",0);
	exit();	
}
	
?>