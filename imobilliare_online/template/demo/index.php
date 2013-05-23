<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php SITE::getTitle();?></title>
<?php SITE::prepareSearchTags();?>
<link href="template/<?php echo $active_template->tempName;?>/css/orange.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="template/<?php echo $active_template->tempName;?>/css/style.css" type="text/css" />
<script type="text/javascript" src="includes/fpss.js"></script>
<script type="text/javascript" src="template/<?php echo $active_template->tempName;?>/js/script.js"></script>
<script type="text/javascript" src="includes/validate.js"></script>
<script type="text/javascript" src="includes/error.js"></script>
<script type="text/javascript" src="core/captcha/v2/validate.js"></script>
</head>

<body>
<table width="900px" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ECE9D8">
      <tr>
        <td width="43%" class="textHeaderStyle3 bannerCell" align="left" valign="top" background="images/real_banner1.jpg" bgcolor="#FFEEAA"><a href="index.php"><img src="images/real_banner.png" width="378" height="100" border="0" /></a></td>
        <td align="right" valign="bottom" background="images/real_banner1.jpg" bgcolor="#FFEEAA" class="bannerCell bannerRight"><?php 
		//SEARCH::displayFPFeature();
		FEATURE::fView('top2');
		?><?php 
		FEATURE::fView('left2', 1);
		?></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="bottom" background="images/border2.gif" bgcolor="#FFEEAA" class="border1">&nbsp;</td>
        </tr>
    </table>    </td>
  </tr>
  <tr>
    <td height="32" bgcolor="#ECE9D8">
		<div id="menubar">
  <div id="top1">
<?php
	$menu=new Menu();
	echo $menu->displayComponent('left');
	?>
	<script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu","menuhover");
</script>
	</div>
		</div></td>
  </tr>
  <tr>
    <td valign="top"><?php
	FEATURE::fView('body2');
	?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php 
		$menu=new Menu();
		//FEATURE::fView('top1');
		?>&nbsp;<div align="right">
		  <?php //echo $menu->displayComponent('footer1', 1);?></div></td>
  </tr>
</table>
</body>
</html>