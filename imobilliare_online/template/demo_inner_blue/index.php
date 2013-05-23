<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php SITE::getTitle(); ?></title>
<?php SITE::prepareSearchTags();?>
<link href="template/<?php echo $active_template->tempName;?>/css/<?php echo $active_template->cssFilePath;?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="includes/fpss.js"></script>
<script type="text/javascript" src="includes/validate.js"></script>
<script src="includes/error.js" type="text/javascript"></script>
<script src="includes/js_extra.js" type="text/javascript"></script>
<script src="includes/sifiles/si.files.js" type="text/javascript"></script>
<script type="text/javascript" src="core/captcha/v2/validate.js"></script>
<script type="text/javascript" src="includes/jacs1.js"></script>
<script type="text/javascript">
    window.onload = function() {
		
		//doNotifyUs('notifier');
		//loadnotifications();
		captcha('<?php echo MAXIMUM_FLOAT;?>', '<?php echo MAXIMUM_INCLINE;?>', '<?php echo CAPTCHA_BORDER_SIZE;?>', '<?php echo XTER;?>', '<?php echo PERIOD;?>');
		SI.Files.stylizeAll();
		setSelectedDevCompose();
		//loadnotifications();
	};
</script>

<link rel="stylesheet" href="template/<?php echo $active_template->tempName;?>/css/style.css" type="text/css" />
</head>
<!--selectDev(); onLoad="init(); access(<?Php echo $prjLastIndex; ?>); -->
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php FEATURE::fView('right77');?>
<?php FEATURE::mView('right78', NULL, FEATURE::getId('Notification'));?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" bgcolor="#ECE9D8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="43%" class="textHeaderStyle3 bannerCell" align="left" valign="bottom" background="images/real_banner1.jpg" bgcolor="#FFEEAA"><a href="index.php"><img src="images/real_banner.png" width="378" height="100" border="0" /></a><a href="<?php echo $_SERVER['HTTP_HOST']; ?>"></a></td>
        <td width="97%" align="right" valign="bottom" background="images/real_banner1.jpg" bgcolor="#FFEEAA" class="bannerCell bannerRight"><?php 
		//SEARCH::displayFPFeature();
		FEATURE::fView('top2');
		?><?php 
		FEATURE::fView('left2', 1);
		?>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="bottom" background="images/border2.gif" bgcolor="#FFEEAA" class="border1">&nbsp;</td>
      </tr>
    </table></td>
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
		</div>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="15" cellpadding="0">
      <tr>
        <td width="22%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php 
		FEATURE::fView('left2');
		?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><?php 
		FEATURE::fView('body', NULL,'single-instance');
		?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2"><?php
ERROR::displayTextComponent($_REQUEST['errcpj']);?>
                <?php 
		FEATURE::mView('body');
		?></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><?php 
		
		FEATURE::fView('top1');
		?>&nbsp;<div align="right">
		  <?php echo $menu->displayComponent('footer1', 1);?></div></td>
      </tr>
      <tr>
        <td valign="top"><div align="right"> <?php //echo $menu->displayComponent('footer1', 1);?></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><?php
echo FOOTER::displayComponent('footer');
	?></td>
  </tr>
</table>
</body>
</html>
