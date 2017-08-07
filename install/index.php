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
</head>

<body>
<div id="error_a">
	<div id="error_a_a">
		<div id="error_p">
		<div id="op"><img src="img/logo.png" width="319" /></div>
		<table width="320" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#000000" id="table">
  			<tr>
    		<th colspan="2" bgcolor="#2A2A2A" id="thead" scope="col">基本运行环境要求</th>
  			</tr>
  			<tr>
    		<td height="20" bgcolor="#2A2A2A">服务器操作系统：<span class="STYLE2">随意</span></td>
    		<td bgcolor="#2A2A2A">当前系统：
			<?php
			echo php_uname(s);
			?>			</td>
  			</tr>
			<tr>
    		<td height="20" bgcolor="#2A2A2A">PHP版本：> <span class="STYLE2">5.0</span></td>
    		<td bgcolor="#2A2A2A">当前版本：
			<?php
			if(phpversion() > 5.0)
			{
				echo '<span class="STYLE1">'.phpversion().'</span>';
			}
			else
			{
				echo '<span class="STYLE2">'.phpversion().'</span>';
				$error = 1;
			}
			?>			</td>
  			</tr>
  			<tr>
   			<td height="20" bgcolor="#2A2A2A">PHP扩展信息：<span class="STYLE2">MySQLi扩展</span></td>
    		<td bgcolor="#2A2A2A">当前设置：
			<?php
			$extensions = get_loaded_extensions();
			if (in_array('mysqli',$extensions))
			{
				echo '<span class="STYLE1">支持</span>';
			}
			else
			{
				echo '<span class="STYLE2">不支持</span>';
				$error = 1;
			}
			?>			</td>
  			</tr>
  			<tr>
   			<td height="20" bgcolor="#2A2A2A">PHP扩展信息：<span class="STYLE2">GD2扩展</span></td>
    		<td bgcolor="#2A2A2A">当前设置：
			<?php
			$extensions = get_loaded_extensions();
			if (in_array('gd',$extensions))
			{
				echo '<span class="STYLE1">支持</span>';
			}
			else
			{
				echo '<span class="STYLE2">不支持</span>';
				$error = 1;
			}
			?>			</td>
  			</tr>
  			<tr>
   			<!--<td class="ttl">写入配置文件：<span class="STYLE2">可写</span><br />
			<?php //echo '配置文件路径：'.APP_DIR.'/dsn.inc.php' ?>
			</td>
    		<td class="ttl">当前设置：
			<?php
//          $file = '../dsn.inc.php';
//			if (is_writable(APP_DIR))
//			{
//				if (file_exists($file))
//				{	
//					if (is_writable($file))
//					{
//						echo '<span class="STYLE1">覆盖现有文件</span>';
//					}
//					else
//					{
//						echo '<span class="STYLE2">只读：不可写入</span>';
//						$error = 1;
//					}
//				}
//				else
//				{
//					echo '<span class="STYLE1">新创建</span>';
//				}
//			}
//			else
//			{
//				echo '<span class="STYLE2">根目录不可写入</span>';
//				$error = 1;
//			}
			?>
			</td>
  			</tr>
			
			<tr>
    		<td class="ttl">产品图片目录：<span class="STYLE2">可写(Windows服务器无需设置)</span><br />
			<?php echo '产品图片路径:'.APP_DIR.'/up/image/<br />'; ?>
			</td>
    		<td class="ttl">当前设置：
			<?php
//			define('CP_DIR',APP_DIR.'/up/image/');
//			if(is_writable(CP_DIR))
//			{
//				echo '<span class="STYLE1">可写</span>';
//			}
//			else
//			{
//				echo '<span class="STYLE2">只读</span>';
//				$error = 1;
//			}
			?>
			</td>
  			</tr>

			<tr>
    		<td class="ttl">简介图片目录：<span class="STYLE2">可写(Windows服务器无需设置)</span><br />
			<?php echo '简介图片路径:'.APP_DIR.'/up/jjimg/<br />'; ?>
			</td>
    		<td class="ttl">当前设置：
			<?php
//			define('JJ_DIR',APP_DIR.'/up/jjimg/');
//			if(is_writable(JJ_DIR))
//			{
//				echo '<span class="STYLE1">可写</span>';
//			}
//			else
//			{
//				echo '<span class="STYLE2">只读</span>';
//				$error = 1;
//			}
			?>
			</td>
  			</tr>
			
			<tr>
    		<td class="ttl">荣誉图片目录：<span class="STYLE2">可写(Windows服务器无需设置)</span><br />
			<?php echo '荣誉图片路径:'.APP_DIR.'/up/ryimg/<br />'; ?>
			</td>
    		<td class="ttl">当前设置：
			<?php
//			define('RY_DIR',APP_DIR.'/up/ryimg/');
//			if(is_writable(RY_DIR))
//			{
//				echo '<span class="STYLE1">可写</span>';
//			}
//			else
//			{
//				echo '<span class="STYLE2">只读</span>';
//				$error = 1;
//			}
			?>
			</td>
  			</tr>
			
			<tr>
    		<td class="ttl">风采图片目录：<span class="STYLE2">可写(Windows服务器无需设置)</span><br />
			<?php echo '风采图片路径:'.APP_DIR.'/up/fcimg/<br />'; ?>
			</td>
    		<td class="ttl">当前设置：
			<?php
//          define('FC_DIR',APP_DIR.'/up/fcimg/');
//			if(is_writable(FC_DIR))
//			{
//				echo '<span class="STYLE1">可写</span>';
//			}
//			else
//			{
//				echo '<span class="STYLE2">只读</span>';
//				$error = 1;
//			}
			?>
			</td>-->
  			</tr>
		  </table>
			<input name="Next" type="button" id="Next" value="设置安装选项 &gt;&gt;" class="button" <?php if ($error == 1): ?>disabled="disabled"<?php endif; ?> onclick="document.location.href='To_install.php';" />
	    </div>
	</div>
</div>
</body>
</html>
