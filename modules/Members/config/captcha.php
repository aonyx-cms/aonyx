<?php
/**
 * @author: galicher
 * Date: 28/03/16
 * Time: 00:15
 */

session_start();

// Random
$mot = str_pad(mt_rand(0,pow(10,5)-1),5,'0',STR_PAD_LEFT);

// Generate image
$largeur = strlen($mot) * 10;
$hauteur = 20;
$img = imagecreate($largeur, $hauteur);
$blanc = imagecolorallocate($img, 255, 255, 255);
$noir = imagecolorallocate($img, 0, 0, 0);
$milieuHauteur = ($hauteur / 2) - 8;
imagestring($img, 6, strlen($mot) /2 , $milieuHauteur, $mot, $noir);
imagerectangle($img, 1, 1, $largeur - 1, $hauteur - 1, $noir); // La bordure
imagepng($img);
imagedestroy($img);

$_SESSION['captcha'] = $mot;
