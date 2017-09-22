<?php
function generateSertif($i, $name, $numb)
{
    $image = imagecreatetruecolor(500, 350);
    $whiteColor = imagecolorallocate($image, 255, 255, 255);
    $textColor = imagecolorallocate($image, 000, 000, 000);
    $fontFile = 'a.ttf';
    imagefill($image, 0, 0, $whiteColor);
    imagettftext($image, 45, 0, 0, 50, $textColor, $fontFile, 'Сертификат :');
    imagettftext($image, 45, 0, 0, 200, $textColor, $fontFile, 'оценка:');
    imagettftext($image, 45, 0, 200, 200, $textColor, $fontFile, $numb);
    imagettftext($image, 25, 0, 0, 250, $textColor, $fontFile, $i);
    imagettftext($image, 25, 0, 0, 100, $textColor, $fontFile, $name);
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
}

$i = file_get_contents('numb.txt');
$numb = $i + 2;
$name = file_get_contents('name.txt');
$name = "на имя $name";
$i = "количество верных ответов = $i";
generateSertif($i, $name, $numb);
?>