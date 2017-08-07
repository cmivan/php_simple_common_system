<?php include("include/km_conn.php");?>
<?
$id=$_GET["id"];
$sql  ="select * from km_article where id=$id";
$query=mysql_query($sql);
$row  =mysql_fetch_array($query);  
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<TITLE><? echo($row["title"]);?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content="MSHTML 6.00.2900.3300" name=GENERATOR></HEAD>
<BODY>
<DIV align=center></DIV>
<DIV align=center>
<TABLE id=table2 height=467 cellSpacing=0 cellPadding=0 width=768 border=0>
  <TBODY>
  <TR>
    <TD height=47>　</TD></TR>
  <TR>
    <TD height=32>
      <P align=center><B><FONT style="FONT-SIZE: 16pt"><? echo($row["title"]);?></FONT></B></P></TD></TR>
  <TR>
    <TD class=shadow2 vAlign=top height=16>
      <HR width="95%" color=#c0c0c0>
    </TD></TR>
  <TR>
    <TD class=shadow2 height=26>
      <P align=center><FONT 
      style="FONT-SIZE: 11pt">点击次数：<? echo($row["clicktime"]);?>&nbsp;&nbsp;作者:<? echo($row["writer"]);?>&nbsp;&nbsp;来源:<? echo($row["come"]);?>&nbsp;&nbsp;类别:<? echo($row["classname"]);?>&nbsp;&nbsp;日期:<? echo(date("Y-m-d",$row["time"]));?></FONT></P></TD></TR>
  <TR>
    <TD height=14></TD></TR>
  <TR>
    <TD vAlign=top>
      <DIV align=center>
      <TABLE id=table3 height=226 cellSpacing=0 cellPadding=0 width="95%" 
      border=0>
        <TBODY>
        <TR>
          <TD vAlign=top>
            <? echo($row["content"]);?></TD></TR></TBODY></TABLE></DIV></TD></TR>
  <TR>
    <TD height=40>
      <P 
    align=center><INPUT onclick=window.close() type=button value=关闭窗口></P></TD></TR>
  <TR>
    <TD height=18>
      <HR width="95%" color=#c0c0c0>
    </TD></TR>
  <TR>
    <TD height=48>
      <DIV align=center><FONT face=宋体 size=2>版权所有&copy;1999-2000 
华侨大学网络中心</FONT></DIV>
      <DIV align=center>　</DIV><FONT face=宋体 size=2></FONT></FONT>
      <DIV align=center><FONT face=宋体 size=2>任何的建议和意见请</FONT><FONT color=red 
      size=2><A href="mailto:webmaster@hqu.edu.cn"><FONT 
      face=宋体>Email:webmaster@hqu.edu.cn</FONT></A></FONT></DIV></TD></TR></TBODY></TABLE></DIV>
</BODY></HTML>
