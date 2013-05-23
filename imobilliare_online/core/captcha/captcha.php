<?php
@include_once("../../includes/session.inc");

$font = 'arial.ttf';
$height = 20;
$width = 80;
@session_start();

$code = '';
$code= $_SESSION['AntiSpamImage'];

$font_size = $height * 0.7;
$image = @imagecreate($width, $height);
$background_color = @imagecolorallocate($image, 255, 255, 255);
$noise_color = @imagecolorallocate($image, 20, 40, 100);

/* add image noise */
for($i=0; $i < ($width * $height) / 4; $i++) {
  @imageellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
}
/* render text */
$text_color = @imagecolorallocate($image, 20, 40, 100);
@imagettftext($image, $font_size, 0, 7,17,
              $text_color, $font , $code)
  or die('Cannot render TTF text.');

/* output image to the browser */
header('Content-Type: image/png');
@imagepng($image) or die('imagepng error!');
@imagedestroy($image);

exit();
?>