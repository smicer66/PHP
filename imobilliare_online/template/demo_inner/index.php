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
<link rel="stylesheet" href="template/<?php echo $active_template->tempName;?>/css/style.css" type="text/css" />
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="19"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20%" class="textHeaderStyle3 bannerCell"><a href="<?php echo $_SERVER['HTTP_HOST']; ?>"><img src="images/icon_logo.png" border="0" /></a></td>
        <td valign="bottom" class="bannerCell"><?php 
		FEATURE::fView('top2');
		?></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="32">
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
    <td><table width="100%" border="0" cellspacing="15" cellpadding="0">
      <tr>
        <td width="24%" valign="top"><?php 
		USER::displayFPFeature();
		?></td>
        <td colspan="2" rowspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2"><?php 
		FEATURE::mView($_REQUEST['fid'],$_REQUEST['fiid']);
		?></td>
              </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            
          </table>
          <br />
          <table width="100%" border="0" cellspacing="5" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="3" valign="top"><?php 
		JOBS::displayFeature('horizontal');
		?>&nbsp;</td>
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
