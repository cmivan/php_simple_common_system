<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-


//-------------- |后台定义公共函数| ------------------



//×
//× --------------------------------------
//× -------  根据分类ID返回分类名称 ---------
//× --------------------------------------
//×
  function getClass($db_table,$db_type,$db_classid)
  {
  if ($db_type=='b'){
   $getsql="select * from ".$db_table."_class_b where classid_b=".$db_classid;
   }else{
   $getsql="select * from ".$db_table."_class_s where classid_s=".$db_classid;
   }
  $getquery=mysql_query($getsql);
       $row=mysql_fetch_array($getquery);
	   return $row["classname"];
   }



//×
//× --------------------------------------
//× ----------  返回提示信息 ---------------
//× --------------------------------------
//×
  function backPage($backStr,$backUrl,$backType){
    $back ="";
	$back =$back."<meta http-equiv=Content-Type content=text/html; charset=utf-8 />";
	$back =$back."<link href='km_style/style/style.css' rel='stylesheet' type='text/css' />";
	$back =$back."<link href='../km_style/style/style.css' rel='stylesheet' type='text/css' />";
	if ($backType==0){
	    //meta自动跳转到指定页面
        $back =$back."<meta http-equiv=refresh content=1;url=".$backUrl.">";
		$back =$back."<body style=\"overflow:hidden;\">";
	    $back =$back."<br><table width=350 border=0 align=center cellpadding=10 cellspacing=1 bordercolor=#FFFFFF bgcolor=#C4D8ED><tr><td width=90% class=forumRow>";
		$back =$back."<table width=100% height=25 border=0 cellpadding=4 align=center cellpadding=2 cellspacing=1 bordercolor=#FFFFFF bgcolor=#C4D8ED><tr><td class=forumRow align=center>";
		$back =$back.$backStr;
		$back =$back."</tr></table></td></tr></table>";

	
	}elseif ($backType==1){
	    //js弹出提示，返回指定页面
	    $back =$back."<script language='javascript'>alert('".$backStr."');";
		$back =$back."window.location.href='".$backUrl."';</script>";
	}elseif ($backType==2){
	    //js弹出提示，返回上一级
	    $back =$back."<script language='javascript'>alert('".$backStr."');";
		$back =$back."history.back(1);</script>";
	}elseif ($backType==3){
	    //js弹出提示，返回指定页
	    $back =$back."<script language='javascript'>window.location.href='".$backUrl."';</script>";
	}
	
    return $back;
  }
  
  
  
  
//×
//× --------------------------------------
//× ----------  限制显示字符数 -------------
//× --------------------------------------
//×
   function csubstr($str,$start,$len)
   { 
   $strlen=strlen($str); 
   $clen=0;
   for($i=0;$i<$strlen;$i++,$clen++)
   { 
   if ($clen>=$start+$len)
   break; 
   if(ord(substr($str,$i,1))>0xa0)
   {
   if ($clen>=$start)
   $tmpstr.=substr($str,$i,2);
   $i++;
   }else{
   if ($clen>=$start)
   $tmpstr.=substr($str,$i,1);
   } 
} 
return $tmpstr; 
} 

   function showShort($str,$len)
	{
	$tempstr = csubstr($str,0,$len);
	if ($str<>$tempstr)
	$tempstr .= "..."; //要以什么结尾,修改这里就可以.
	return $tempstr; 
}

?>