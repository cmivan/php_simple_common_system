<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>卡米建站系统：安装界面</title>
<link href="" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body{
font-size:12px;
line-height:18px;}
.STYLE2 {color: #FF0000}
.STYLE3 {
	font-size: 24px;
	font-family: "黑体";
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div id="error_a">
	<div id="error_a_a">
<div id="error_p">
	<div id="op"><img src="img/logo.png" width="319" border="0" /></div>
	<table width="320" border="0" align="center" cellpadding="4" cellspacing="1" id="table">
  			<tr>
    		<th colspan="2" bgcolor="#2A2A2A" id="thead" scope="col">安装结果</th>
  			</tr>
			
			<tr>
    		<th align="left" id="error_ok" style="font-weight:lighter">
<?php

$host      = $_POST['host'];
$name      = $_POST['name'];
$mysqlpass = $_POST['mysqlpass'];
$db        = $_POST['db'];
$admin     = $_POST['admin'];
$adminpass = $_POST['adminpass'];
$adminpassi= $_POST['adminpassi'];
$file      = 'km_install.sql';
if ($adminpass != $adminpassi) 
{
     echo '两次管理员密码输入不一致';
     exit;
}
//尝试连接服务器
echo "尝试连接数据库主机：";
if (!@$conn = mysql_connect($host, $name, $mysqlpass)) 
	{
        echo "无法连接<br />" . mysql_error();
        exit;
    }
echo "成功连接到 {$host}<br />";

//检查Mysql服务器版本
$rs = mysql_query('SELECT VERSION()');
$row = mysql_fetch_row($rs);
$version = $row[0];
if ($version >= '4.1.3') 
{
	mysql_query("SET NAMES 'utf8'");
	$version = 5;
} 
else 
{
	$version = 3;
}
echo "尝试打开数据库 {$db}：";
if (!@mysql_select_db($db))
	{
        echo "数据库不存在<br />";
        echo "尝试建立数据库 {$db}：";

        if (!@mysql_query("CREATE DATABASE {$db}"))
        {
            echo "失败<br />" .mysql_error();
            exit;
        }
        $result = mysql_select_db($db);
    }
echo "成功<br />";

if (file_exists($file)) 
{
     if (!is_readable($file)) 
     {
          echo '请将*.sql文件属性改为只读或全部';
          exit;
     }
     $script = file_get_contents($file);
     $scr = explode(';', $script);
     foreach ($scr as $sql) 
     {
            $sql = trim($sql);
            if (strtoupper(substr($sql, 0, 12)) == 'CREATE TABLE') 
            {
            	if ($sql == '') { continue; }
            	if (!@mysql_query($sql)) 
            	{
                	echo "\n执行错误：\n" . mysql_error() . "<br />";
	                //exit;
            	}
            }
     }
}
    echo "$file.....ok! <br />";
	
	
  // ---------------| 向数据库添加管理员账号 |-------------------
	$cons = new mysqli($host,$name,$mysqlpass,$db);
	$result = $cons->query("set names 'utf8'");
	
	$result = $cons->query("select * form km_admin where username='".$admin."'");
	if(!$result->eof){
	 $result = $cons->query("update km_admin set password='".md5($adminpass)."' where username='".$admin."'");
	}else{
     $result = $cons->query("insert into km_admin(username,password) values ('".$admin."','".md5($adminpass)."')");
	}

	if (!$result) 
	{ echo '添加失败，请登陆Mysql删除之前安装的所有表重新安装<br />';
	}else {
	  echo '管理员添加成功....<br />';
	  }
	  
	  
	  
	  
  // ---------------| 写入系统数据库配置文件 |-------------------
  // ----path: admin/km_include/km_config.php ----------------
  // ---------------------------------------------------------
	 $km_config="";
     $km_config=$km_config."<?php \n";
     $km_config=$km_config."//-=================================================- \n";
	 $km_config=$km_config."//-====  |       卡米php建站系统 v1.0           | ====- \n";
	 $km_config=$km_config."//-====  |       Author : kami.ivan           | ====- \n";
	 $km_config=$km_config."//-====  |       QQ     : 619835864           | ====- \n";
	 $km_config=$km_config."//-====  |       Time   : 2009-09-09 20:45    | ====- \n";
	 $km_config=$km_config."//-====  |       For    : 合优网络             | ====- \n";
	 $km_config=$km_config."//-=================================================- \n";
	 $km_config=$km_config."   \$sql_host   = \"".$host."\";  //数据库 主机 \n";
	 $km_config=$km_config."   \$sql_Uid    = \"".$name."\";       //数据库 连接用户 \n";
	 $km_config=$km_config."   \$sql_pass   = \"".$mysqlpass."\";       //数据库 连接密码 \n";
	 $km_config=$km_config."   \$sql_dbName = \"".$db."\"; //数据库 名称 \n";
	 $km_config=$km_config."   \$sql_code   = \"utf8\";       //读取数据编码方式 \n";
	 $km_config=$km_config."   \$sql_prefix = \"km_\";        //读取数据前缀 \n";
	 $km_config=$km_config."//-=================================================- \n";
	 $km_config=$km_config."?>";
	 
	 $km_config_file=fopen("../admin/km_include/km_config.php","w");
     fwrite($km_config_file,$km_config);
     fclose($km_config_file); 
//-----------------------------------




	if (!get_magic_quotes_gpc())
	{
		$host      = addslashes($host);
    	$name      = addslashes($name);
    	$mysqlpass = addslashes($mysqlpass);
    	$db        = addslashes($db);
	}
?>
<br />数据库配置成功。<br /><span class='STYLE2'><span class='STYLE3'>安装完成</span></span><br />
<span class='STYLE2'>请务必将install目录以及目录内的所有文件删除</span>			</th>
  			</tr>
  
	  </table>
		
<div id="see">
<a href="../admin/index.php"><img src="img/admin.gif" width="130" height="45" border="0" /></a>
<a href="../index.php"><img src="img/go.gif" width="130" height="45" border="0" /></a></div>
</div>
	</div>
</div>
</body>
</html>