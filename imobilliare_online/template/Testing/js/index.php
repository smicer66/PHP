<?php
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."plugins/template/template_class.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/view/view.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/menus/menu_class.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/header/header_class.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/footer/footer_class.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."core/site/site_class.php");
//$temp=new Template();
////include_once($temp->useTemplate(2));
$site= new Site();

$active_template=new Template();
$menu=new Menu();
$footer=new Footer();
$header=new Header();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?php $site->getTitle()?>
</title>
<!--<link href="template/<?php echo $active_template->tempName;?>/css/<?php echo $active_template->cssFilePath;?>" rel="stylesheet" type="text/css" media="screen" />-->
<style type="text/css">
<!--
body {
	
}
body,td,th {
	color: #000000;
}
-->
</style>
<!--
<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}
</script>
-->



<link href="css/smoots.css" rel="stylesheet" type="text/css" />
<link href="../../component/menus/css/dropdown/dropdown.css" rel="stylesheet" type="text/css" />
<link href="../../component/menus/css/dropdown/themes/nvidia.com/default.advanced.css" rel="stylesheet" type="text/css" />

<?php $site=new Site(); $site->prepareSearchTags();?>
</head>
<body onload="MM_CheckFlashVersion('7,0,0,0','Content on this page requires a newer version of Macromedia Flash Player. Do you want to download it now?');">
<div id="banner">
<?php
echo $header->displayComponent();
?>
  <!--<div id="leftBanner">-->
  <!--</div>-->
</div>
<div align="center" id="wrap">
  <div id="pl4">
    <?php
	echo $menu->displayComponent('left');
	?>
  </div>
  <div id="pl41">
	<?php
	jFPFeatureView('top2');
	?>
  </div>
  <div id="p15">
    <div id="left">
      <div id="left1">
	  <?php
	
	echo $menu->displayComponent('left1');
	?>
	  </div>
	  <div id="left2">
	  <?php
echo $menu->displayComponent('left2');
		?>
	  </div>
	  <div id="left3">
<?php
echo $menu->displayComponent('left3');
		?>	  
	  </div>
	  <div id="left4">
<?php
jFPFeatureView('left4');
		?>	  
	  </div>
	  
	</div>
	
    <div id="mainbody">
      <div id="body1"><?php
jFPFeatureView('body1');
		?></div>
	  <div id="body2"><?php
jFPFeatureView('body2');
		?></div>
	  <div id="body3"><?php
jFPFeatureView('body3');
		?></div>
	  <div id="body4"><?php
jFPFeatureView('body4');
		?></div>
	  <div id="body5"><?php
jFPFeatureView('body5');
		?></div>
      
    </div>
  </div>
	
  
</div><div id="footer1"> <?php
jFPFeatureView('body6');
	?></div><br />
<div id="footer">
  <?php
echo $footer->displayComponent('footer');;
	?>
</div>

</body>
</html>
