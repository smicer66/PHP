<?php
ob_start();
$site=new Site(); 
$siteDet=$site->getDetails();
$features=new Feature();
$url='Location: index.php';
$administrator=new Administrator();
if($_SERVER['QUERY_STRING'])
{
	$uri=".php?".$_SERVER['QUERY_STRING'];
}
else
{
	$uri=".php";
}
$administrator->grantAccess(($_REQUEST['fid']) ,$url);

$error=new Error();
$user=new User();



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php $site=new Site(); echo $site->getTitle()." - Administrator Area";?></title>
<script type="text/javascript" src="../includes/validate.js"></script>
<script type="text/javascript" src="../includes/jacs.js"></script>
<link href="view/css/orange_admin.css" rel="stylesheet" type="text/css" />
<script  src="../scripts/error.js" type="text/javascript"></script>
<script src="../includes/error.js" type="text/javascript"></script>

</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cellType4">
  <tr>
    <td colspan="2" class="cellType5"><table width="100%" border="0" cellspacing="0">
      <tr>
        <td width="313"><a href="http://www.<?php echo $_SERVER['HTTP_HOST'];?>"><img src="../images/houselogo.png" width="72" height="64" border="0" align="left" /></a><img src="../images/houselogoname.png" width="220" height="64" /></td>
        <td align="right"><span>Portal Manager</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="66%" class="cellType6">Software Application: <?php 
	$site=new Site();$siteDet=$site->getDetails();echo $siteDet['churchName'];?> </td>
    <td width="34%" align="right" class="cellType6"><span class="texttype1"><?php if(isset($_SESSION['uid'])){ ?>Logged in as <?php echo $_SESSION['actnpals'];}?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <?php if(isset($_SESSION['uid'])){ ?><a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('home'); ?>&logout=1">Logout</a> <?php } else { ?> <a href="index.php">Login</a><?php } ?>&nbsp;&nbsp;&nbsp;<a href='<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('home'); ?>'>Portal Grid Home</a>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="5" class="cellType3">
      <tr>
        <td width="22%" valign="top" class="cellType7"><table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="cellType2"><p> Portal Grid Functions</p></td>
          </tr>
          
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('features_manager'); ?>">Features Manager </a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td colspan="5" align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">My Portal Grid Tools </span></td>
          </tr>
          <tr>
            <td width="20%" align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('advertisement_creator'); ?>"><img src="view/images/Image.png" width="48" height="48" border="0" /></a><br />
              <a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('advertisement_creator'); ?>">Advertisements</a></td>
            <td width="20%" align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('billing_add'); ?>"><img src="view/images/Tag.png" width="48" height="48" border="0" /></a><br />
              <a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('funds_manage'); ?>">Billing &amp; Reports</a></td>
            <td width="20%" align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_creator'); ?>"><img src="view/images/Buddy Group.png" width="48" height="48" border="0" /></a><br />
              <a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_creator'); ?>">Property</a></td>
            <td width="20%" align="center" valign="bottom" class="cellType7">&nbsp;</td>
            <td width="20%" align="center" valign="bottom" class="cellType7">&nbsp;</td>
          </tr>
          
          <tr>
            <td align="center" valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" valign="bottom">&nbsp;</td>
            <td align="center" valign="bottom">&nbsp;</td>
            <td align="center" valign="bottom">&nbsp;</td>
            <td align="center" valign="bottom">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      
      <tr>
        <td colspan="2" align="center" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
<div class="footer">
  <div align="left"><?php //include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/footer/footer_class.php");
	$fot=new Footer();echo $fot->displayComponent(NULL);?></div>
</div>
</body>
</html>
