<?php include("include/km_conn.php");?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
-->
</style></head>

<body bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0 marginwidth="0" 
marginheight="0">
<DIV align=center></DIV>
<DIV align=center>
<TABLE id=table2 height=25 cellSpacing=0 cellPadding=0 width=768 border=0><!-- MSTableType="layout" -->
  <TBODY>
  <TR>
    <TD>　</TD></TR>
  <TR>
    <TD bgColor=#efefef height=25>&nbsp; <IMG src="images/list.gif" 
      width=16 heigth="16"> <A class=classlinkclass 
      href="/">首页</A>&nbsp;&gt;&nbsp;<A 
      class=classlinkclass href="index.php">新闻</A>&nbsp;&gt;<!--empire.url--></TD></TR></TBODY></TABLE></DIV>
<DIV align=center>
<TABLE id=table3 cellSpacing=0 cellPadding=0 width=768 border=0>
  <TBODY>
  <TR>
    <FORM action=search.php method=get>
    <TD align=right height=30><INPUT type=show size=50 name=kw>  
      <INPUT style="WIDTH: 16px; HEIGHT: 16px" type=image 
      src="images/search.gif" align=absMiddle value="" name=Submit> 
    </TD></FORM></TR></TBODY></TABLE></DIV>
<CENTER>
<TABLE style="BORDER-COLLAPSE: collapse" borderColor=#efefef cellPadding=10 
width=768 border=1>
  <TBODY>
  <TR>
    <TD vAlign=top align=right>
<?
$kw=$_GET["kw"];	
$sql="select * from km_article where title like '%".$kw."%'";
$query=mysql_query($sql);
//现在要分页了
$allrows	=mysql_num_rows($query); 	//获取数据库总数量
$pagesize	=20;						//每页显示多少条
$page		=$_GET["page"];
if($page=="")
{
	$page=1;
}
$allpages=ceil($allrows/$pagesize);	//所有页数
$start		=$page*$pagesize-20;
$sql="select * from km_article where title like '%".$kw."%' order by id desc limit $start,$pagesize";
$query=mysql_query($sql);
while ($row = mysql_fetch_array($query)) {
?>           
      <TABLE cellSpacing=0 cellPadding=5 width="100%" align=center border=0>
        <TBODY>
        <TR>
          <TD width="5%">
            <DIV align=right><IMG height=10 alt="" src="images/file.gif" 
            width=8></DIV></TD>
          <TD width="80%"><A title=<?  echo($row["title"]);?> 
            href="show.php?id=<?  echo($row["id"]);?> " 
            target=_blank><?  echo($row["title"]);?> </A></TD>
          <TD width="15%"><?  echo(date("Y-m-d",$row["time"]));?> </TD></TR></TBODY></TABLE>
<?
}
?>
　</TD></TR></TBODY></TABLE>
<DIV align=center>
<TABLE id=table6 cellSpacing=0 cellPadding=0 width=768 border=0><!-- MSTableType="layout" -->
  <TBODY>
  <TR>
    <TD>　</TD></TR>
  <TR>
    <TD bgColor=#efefef height=35>
        	<? 
//			for($i=1;$i<=$allpages;$i++)
//			{
//				echo("<a href='show_guestbook.php?page=$i'>$i</a>&nbsp;&nbsp;&nbsp;&nbsp;");
//			}
		?>
    &nbsp; 
      页次：<B><? echo($page);?>/<? echo($allpages);?></B>&nbsp;每页<B><? echo($pagesize);?></B>&nbsp;总数<B><? echo($allrows);?></B>&nbsp;&nbsp;&nbsp;&nbsp;转到:
      <SELECT 
      onchange=self.location.href=this.options[this.selectedIndex].value 
      name=select>
            <? 
			for($i=1;$i<=$allpages;$i++)
			{
		?>     
      	<OPTION value="search.php?kw=<? echo($kw);?>&page=<? echo($i);?>" <? if($i==$page) echo(" selected") ?>>第 <? echo($i);?> 页</OPTION>
       <?
       }
	   ?>
       </SELECT></TD></TR></TBODY></TABLE></DIV>
<DIV align=center>
<TABLE style="BORDER-RIGHT: #c0c0c0 1px solid; BORDER-LEFT: #c0c0c0 1px solid" 
cellSpacing=0 cellPadding=0 width=768 bgColor=#f7f7f7 border=0>
  <TBODY>
  <TR></TD></TR></TBODY></TABLE></DIV>
<CENTER>　
<HR width=768>
 
<DIV align=center><FONT style="FONT-SIZE: 12px; FONT-FAMILY: 宋体" 
size=2>版权所有&copy;1999-2000 华侨大学网络中心</FONT></DIV>
<DIV align=center>　</DIV></FONT>
<DIV align=center><FONT style="FONT-SIZE: 12px; FONT-FAMILY: 宋体" 
size=2>任何的建议和意见请</FONT><FONT style="FONT-SIZE: 12px; FONT-FAMILY: 宋体" color=red 
size=2><A style="TEXT-DECORATION: none" href="mailto:webmaster@hqu.edu.cn"><FONT 
style="FONT-SIZE: 12px; FONT-FAMILY: 宋体" 
face="Arial, Helvetica, sans-serif">Email:webmaster@hqu.edu.cn</FONT></A></FONT></DIV></CENTER>
</CENTER>

</body>
</html>

