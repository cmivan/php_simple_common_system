<? 
//-=================================================-
//-====  |       phpվϵͳ v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : .            | ====-
//-=================================================-


  //PHPԤcomһݿӶ󣬲ADOݿ
  $conn = new com("adodb.connection"); 
  //ݿ
  $connstr="provider=microsoft.jet.oledb.4.0;data source=". realpath("km_php.mdb");
  //comopen()ִ
  $conn->open($connstr); 
  


  
  
//
// --------------------------------------
// ----------  ʾϢ ---------------
// --------------------------------------
//
  function backPage($backStr,$backUrl,$backType){
    $back ="";
	$back =$back."<meta http-equiv=Content-Type content=text/html; charset=gb2312 />";
	$back =$back."<link href='km_style/style/style.css' rel='stylesheet' type='text/css' />";
	$back =$back."<link href='../km_style/style/style.css' rel='stylesheet' type='text/css' />";
	if ($backType==0){
	    //metaԶתָҳ
        $back =$back."<meta http-equiv=refresh content=1;url=".$backUrl.">";
		$back =$back."<body style=\"overflow:hidden;\">";
	    $back =$back."<br><table width=350 border=0 align=center cellpadding=10 cellspacing=1 bordercolor=#FFFFFF bgcolor=#C4D8ED><tr><td width=90% class=forumRow>";
		$back =$back."<table width=100% height=25 border=0 cellpadding=4 align=center cellpadding=2 cellspacing=1 bordercolor=#FFFFFF bgcolor=#C4D8ED><tr><td class=forumRow align=center>";
		$back =$back.$backStr;
		$back =$back."</tr></table></td></tr></table>";

	
	}elseif ($backType==1){
	    //jsʾָҳ
	    $back =$back."<script language='javascript'>alert('".$backStr."');";
		$back =$back."window.location.href='".$backUrl."';</script>";
	}elseif ($backType==2){
	    //jsʾһ
	    $back =$back."<script language='javascript'>alert('".$backStr."');";
		$back =$back."history.back(1);</script>";
	}elseif ($backType==3){
	    //jsʾָҳ
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