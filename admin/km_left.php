<?php
//-=================================================-
//-====  |       卡米php建站系统 v1.0           | ====-
//-====  |       Author : kami.ivan           | ====-
//-====  |       QQ     : 619835864           | ====-
//-====  |       Time   : 2009-09-09 20:45    | ====-
//-====  |       For    : 合优网络             | ====-
//-=================================================-

   include("km_include/km_main_conn.php");
?>
<html>
<head>
<meta http-equiv=Content-Type content=text/html; charset=utf-8>
<link href="km_style/style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
BODY {
	MARGIN: 0px;
	background-color: #C4D8ED;;
}

.menu_title {
	FONT-WEIGHT: lighter;
	padding-left:12px;
	COLOR:#006CB5;
	POSITION: relative;
	TOP: 2px;
	font-size: 12px;
	font-weight:lighter;
	cursor:hand;
	background-image:url(km_style/images/menudown.gif);
}


.menu_title2 {
	font-weight:bold;
	padding-left:13px;
	COLOR:#0099FF;
	POSITION: relative;
	TOP: 2px;
	font-size: 12px;
	font-weight:lighter;
	cursor:hand;
	background-image:url(km_style/images/menuup.gif);
}
</style>
</head>

<BODY>
<div style="padding:3px; padding-top:0;">
  <script>
var he=document.body.clientHeight-55
document.write("<div id=tt style=height:"+he+";overflow:hidden>")
</script>
<table cellspacing="0" cellpadding="0" width="158" align="center">
	<tr>
    <td id="imgmenu1" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(1)" onMouseOut="if(onTitle!=1){this.className='menu_title'};" height="25"> 
      <span>网站信息 </span></td>
	</tr>

	<tr>
		<td class="forumRow" id="submenu1" style="DISPLAY: none">
		<div class="sec_menu" >
		  <table cellspacing="8" cellpadding="0" width="100%" align="center">
            <tr>
              <td>·<a target="km_main" href="km_system/km_admin_add.php">管理员管理</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="km_system/km_system_info.php">网站信息配置</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="km_sysSet/km_article_manage.php">模块基本页面</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="km_sysSet/km_set_edit.php">模块添加</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="km_sysSet/km_set_manage.php">模块管理</a></td>
            </tr>
          </table>
		</div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu2" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(2)" onMouseOut="if(onTitle!=2){this.className='menu_title'};" height="25"> 
      <span>企业信息 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu2" style="DISPLAY: none">
		<div class="sec_menu" >
		  <table cellspacing="8" cellpadding="0" width="100%" align="center">
            <tr>
              <td>·<a target="km_main" href="SYS_COMPANY/Manage_Main1.asp">组织机构</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="SYS_COMPANY/Manage_Main2.asp">企业简介</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="SYS_COMPANY/Manage_Main3.asp">成长历程</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="SYS_COMPANY/Manage_Main4.asp">联系我们</a></td>
            </tr>
            <tr>
              <td>·<a target="km_main" href="SYS_COMPANY/Manage_Main5.asp">领导致辞</a></td>
            </tr>
            <tr>
              <td>·<a href="SYS_COMPANY/Manage_culture.asp" target="km_main">管理企业文化</a></td>
            </tr>
            <tr>
              <td>·<a href="SYS_COMPANY/Manage_cultureNewsAdd.asp" target="km_main">增加企业文化</a></td>
            </tr>

          </table>
		</div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu3" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(3)" onMouseOut="if(onTitle!=3){this.className='menu_title'};" height="25"> 
      <span>产品管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu3" style="DISPLAY: none">
		<div class="sec_menu" >
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="8">
            <tr>
              <td><a href="km_product/km_class_manage.php" target="km_main">·类别管理</a></td>
            </tr>
            <tr>
              <td><a href="km_product/km_article_edit.php" target="km_main">·产品添加</a></td>
            </tr>
            <tr>
              <td><a href="km_product/km_article_manage.php" target="km_main">·产品管理</a></td>
            </tr>
          </table>
		</div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu4" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(4)" onMouseOut="if(onTitle!=4){this.className='menu_title'};" height="25"> 
      <span>订单管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu4" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>		
    <td id="imgmenu5" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(5)" onMouseOut="if(onTitle!=5){this.className='menu_title'};" height="25"> 
      <span>下载中心 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu5" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>


	<tr>
		
    <td id="imgmenu6" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(6)" onMouseOut="if(onTitle!=6){this.className='menu_title'};" height="25"> 
      <span>会员管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu6" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu7" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(7)" onMouseOut="if(onTitle!=7){this.className='menu_title'};" height="25"> 
      <span>新闻管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu7" style="DISPLAY: none">
		<div class="sec_menu" >
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="8">
        <tr>
          <td>·<a href="km_article/km_class_manage.php" target="km_main">类别管理</a></td>
        </tr>
        <tr>
          <td>·<a href="km_article/km_article_edit.php" target="km_main">添加文章</a></td>
        </tr>
        <tr>
          <td>·<a href="km_article/km_article_manage.php" target="km_main">文章管理</a></td>
        </tr>


      
   
</table>
		</div>
		</td>
	</tr>
	
	<tr>
		
    <td id="imgmenu8" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(8)" onMouseOut="if(onTitle!=8){this.className='menu_title'};" height="25"> 
      <span>留言管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu8" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu9" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(9)" onMouseOut="if(onTitle!=9){this.className='menu_title'};" height="25"> 
      <span>荣誉管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu9" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu10" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(10)" onMouseOut="if(onTitle!=10){this.className='menu_title'};" height="25"> 
      <span>营销网络 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu10" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu11" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(11)" onMouseOut="if(onTitle!=11){this.className='menu_title'};" height="25"> 
      <span>人才管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu11" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>
		
    <td id="imgmenu12" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(12)" onMouseOut="if(onTitle!=12){this.className='menu_title'};" height="25"> 
      <span>调查管理 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu12" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>		
    <td id="imgmenu13" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(13)" onMouseOut="if(onTitle!=13){this.className='menu_title'};" height="25"> 
      <span>邮件列表 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu13" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

	<tr>		
    <td id="imgmenu14" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(14)" onMouseOut="if(onTitle!=14){this.className='menu_title'};" height="25"> 
      <span>友情链接 </span></td>
	</tr>
	<tr>
		<td class="forumRow" id="submenu14" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>

<tr>		
    <td id="imgmenu15" class="menu_title" onMouseOver="this.className='menu_title2';" onClick="showsubmenu(15)" onMouseOut="if(onTitle!=15){this.className='menu_title'};" height="25"> 
      <span>其他信息 </span></td>
  </tr>
	<tr>
		<td class="forumRow" id="submenu15" style="DISPLAY: none">
		<div class="sec_menu" ></div>
		</td>
	</tr>


</table>
</div>

<script>
function aa(Dir)
{tt.doScroll(Dir);Timer=setTimeout('aa("'+Dir+'")',100)}//这里100为滚动速度
function StopScroll(){if(Timer!=null)clearTimeout(Timer)}

function initIt(){
divColl=document.all.tags("DIV");
for(i=0; i<divColl.length; i++) {
whichEl=divColl(i);
if(whichEl.className=="child")whichEl.style.display="none";}
}
function expands(el) {
whichEl1=eval(el+"Child");
if (whichEl1.style.display=="none"){
initIt();
whichEl1.style.display="block";
}else{whichEl1.style.display="none";}
}
var tree= 0;
function loadThreadFollow(){
if (tree==0){
document.frames["hiddenframe"].location.replace("Admin_LeftMeun.asp");
tree=1
}
}


var onTitle=0;
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
imgmenu = eval("imgmenu" + sid);

for (i=1;i<16;i++){
eval("submenu" + i + ".style.display=\"none\";");
eval("imgmenu" + i + ".className=\"menu_title\";");
}

if (whichEl.style.display == "none"&&onTitle!=sid)
{
whichEl.style.display="block";
imgmenu.className="menu_title2";
}else{
whichEl.style.display="none";
imgmenu.className="menu_title";
sid=0;
}
onTitle=sid;          //记录当前栏目id
}


function loadingmenu(id){
var loadmenu =eval("menu" + id);
if (loadmenu.innerText=="Loading..."){
document.frames["hiddenframe"].location.replace("Admin_LeftMeun.asp?menu=menu&id="+id+"");
}
}
top.document.title="卡米网站系统后台管理-Powered by "; 
</script>

</BODY>
</HTML>
