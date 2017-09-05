<?php
function generateSertif($i,$name){
$image = imagecreatetruecolor(300,300);
$whiteColor = imagecolorallocate($image,255,255,255);
$textColor = imagecolorallocate($image,000,000,000);
$fontFile ='a_AlternaSw.TTF';
imagefill($image,0,0,$whiteColor);
imagettftext($image,45,10,20,200,$textColor,$fontFile,'Сертификат');
imagettftext($image,45,30,40,200,$textColor,$fontFile,'оценка');
imagettftext($image,45,60,70,-200,$textColor,$fontFile,$i);
imagettftext($image,45,10,20,200,$textColor,$fontFile,$name);
   header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
}

?>