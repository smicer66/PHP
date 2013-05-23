<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="template/<?php echo $active_template->tempName;?>/css/orange.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="template/<?php echo $active_template->tempName;?>/css/style.css" type="text/css" />
<script type="text/javascript" src="includes/fpss.js"></script>
<script type="text/javascript" src="template/<?php echo $active_template->tempName;?>/js/script.js"></script>
<script type="text/javascript" src="includes/validate.js"></script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="19"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20%" class="textHeaderStyle3 bannerCell"><a href="<?php echo $_SERVER['HTTP_HOST']; ?>"><img src="images/icon_logo.png" border="0" class="iconLogo" /></a></td>
        <td valign="bottom" class="bannerCell bannerRight"><?php 
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
		</div>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="15" cellpadding="0">
      <tr>
        <td width="33%" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php 
		FEATURE::fView('left1');
		?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          
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
		FEATURE::fView('left3');
		?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><?php 
		FEATURE::fView('left4');
		?></td>
          </tr>
        </table>		</td>
        <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2"><?Php
		//$fpshow=new Frontpageslideshow();
		//$fpshow->displayFPFeature();
		FEATURE::fView('body2');
		?></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            
            <tr>
              <td colspan="2"><?php
			  FEATURE::fView('body');
			  ?>&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><?php
			  FEATURE::fView('body', 1);
			  ?>&nbsp;</td>
            </tr>
            
            
          </table></td>
        </tr>
      <tr>
        <td colspan="3" valign="top"><?php 
		JOBS::displayFeature('horizontal');
		?></td>
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
