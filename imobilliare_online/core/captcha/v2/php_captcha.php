<?php
function php_captcha($maximum_float, $maximum_incline, $captcha_border_size, $captcha_border_color, $xter, $period, $external_border_size, $external_border_color, $charset, $searchlight_color, $font_size, $beam_width, $character_color, $font_face_file_url)
{
	$captchaStrArray=array();
	for($count=0;$count<$xter;$count++)
	{
		array_push($captchaStrArray, substr($charset, mt_rand(0, strlen($charset) - 1), 1));
	}
	$array_join=join('', $captchaStrArray);
	$_SESSION['pal-microcomuting-captcha']=$array_join;
	
$captcha="";
$captcha=$captcha."<style> 
@font-face
{
    font-family: 'captcha_font';
	src: url('".$font_face_file_url."');
    src: local('captcha_font'), url('".$font_face_file_url."' format('truetype'));
}
</style>";
$captcha=$captcha."<div id='fontSize' style='padding:0px; position:fixed; top:-1000px; background-color:#00CCFF; font-family:captcha_font; font-size:".$font_size."px;'>M
</div>
";




$captcha=$captcha."<div id='captcha_div' style='width:0px; -moz-border-radius: 5px 5px 5px 5px; position:relative; left: 0px; top: 0px;  border:".$external_border_color." ".$external_border_size."px solid;'>";
$captcha=$captcha."<div id='border' style='position:relative; overflow:hidden; left:0px; background-color: ".$captcha_border_color."; width:0px; border:".$captcha_border_color." ".$captcha_border_size."px solid; '>&nbsp;";
$captcha=$captcha."<div id='searchlight' style=' position:absolute; left:0px; top:0px; height: 10px;'>&nbsp;
	</div>";
$captcha=$captcha."<div id='searchlightbeam' style=' position:absolute; background-color: ".$captcha_border_color."; z-index:1300; '>
&nbsp;";
$captcha=$captcha."</div>  	
<div id='searchlightbeam2' style=' position:absolute; background-color: ".$captcha_border_color."; z-index:1100; '>
&nbsp;
</div>";
$roundMoz=((($maximum_float) * 2) + $beam_width + 10 + ($captcha_border_size*(2)) - 1);
$captcha=$captcha."<div id='roundbeam' style='-moz-border-radius: ".$roundMoz."px ".$roundMoz."px ".$roundMoz."px ".$roundMoz."px;  position:absolute; border:".$captcha_border_color." 0px solid; background-color:".$searchlight_color."; z-index:10; '>
&nbsp;
</div>";
		
		for($count=0;$count<$xter;$count++)
		{
			
		
     		
			$captcha=$captcha."<div id='captchaItem".$count."_holder' style='position:absolute; z-index:1; text-align:center; border: #000 0px solid;  background-color:".$captcha_border_color."; width:0px; '>&nbsp;
			</div>";
			$captcha=$captcha."<div id='captchaItem".$count."' style='font:normal ".$font_size."px captcha_font; position:absolute; text-align:center; border: 0px solid; width:".$beam_width."px; color:".$character_color."; z-index:100;'>";
			$captcha=$captcha."".$captchaStrArray[$count]."</div>";
		}
$captcha=$captcha."</div>


</div>";

return $captcha;
}
?>