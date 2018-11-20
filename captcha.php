<?php
session_start();
$getal = "";
for($i=1; $i<6; $i++){
 $getal .= mt_rand(0,9); 
} 
$_SESSION['captcha'] = $getal; 

$afbeelding = imagecreatetruecolor(200, 75); 
$achtergrondkleur = imagecolorallocate($afbeelding, 255, 255, 255);//wit
$tekstkleur = imagecolorallocate($afbeelding, 173, 6, 6);//rood
$lijnkleur = imagecolorallocate($afbeelding, 217, 60, 0);//oranje
$puntkleur = imagecolorallocate($afbeelding, 217, 60, 0);//oranje

imagefilledrectangle($afbeelding, 0,0, 200, 75, $achtergrondkleur);
imagettftext($afbeelding, 40, 10, 15, 70, $tekstkleur, 'fonts/Acceleration&Reaction.ttf', $getal);

//Teken 25 willekeurige lijnen;
for ($i=0;$i<25; $i++){
imageline($afbeelding, 0, mt_rand(0,75), 300, mt_rand(0,75), $lijnkleur);

}

// We tekenen 500 stippen
for($i=0; $i<2000; $i++){
imagesetpixel($afbeelding, mt_rand(0,200), mt_rand(0,75), $puntkleur);

}

header('Content-type: image/png');
imagepng($afbeelding);

?>