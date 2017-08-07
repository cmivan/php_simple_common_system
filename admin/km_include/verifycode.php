<?php
//cm.ivan@163.com
//------------------------
$session_save_path = dirname(__FILE__)."/sessions";
Header("Content-type:image/PNG");
srand((double)microtime()*1000000);
$im =imagecreate(60,25);
$black = ImageColorAllocate($im, 60,60,120);
$red   = ImageColorAllocate($im, 200,0,0);
$white = ImageColorAllocate($im, 255,255,255);
$gray  = ImageColorAllocate($im,200,200,200);
imagefill($im,90,40,$gray);  //imagefill($im,0,0,$gray); 

for($i=0;$i<600;$i++)
{
	$randcolor =ImageColorallocate($im,rand(10,255),rand(10,255),rand(10,255));
	imagesetpixel($im, rand()%90 , rand()%30 ,$randcolor);
}

for($i=0;$i<10;$i++)
{
	imageline($im,rand(0,75),rand(0,75),rand(0,75),rand(0,75),$red);
}

//$array="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
$array="0123456789";
for($i=0;$i<4;$i++)
{
	$authnum .=substr($array,rand(0,9),1);
}
//写入session
session_save_path($session_save_path);
session_start();
$_SESSION["verifycode"]=$authnum;

$font= "arial.ttf";
imagettftext($im, 15, 2, 8, 20, $white, $font, $authnum);
ImagePNG($im);
ImageDestroy($im);

?>
