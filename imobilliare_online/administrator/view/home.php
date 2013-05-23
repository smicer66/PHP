<?php
ob_start();




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script  src="../scripts/error.js" type="text/javascript"></script>
<script type="text/javascript">
function toggle(d)
{
	var o=document.getElementById(d);
	o.style.display=(o.style.display=='none')?'block':'none';
	o.title=(o.style.display=='none')?'Click to Maximize and Enter Details':'Click to Minimize';
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php $site=new Site(); echo $site->getTitle()." - Administrator Area";?></title>
<link href="view/css/orange_admin.css" rel="stylesheet" type="text/css" />
<script src="../includes/error.js" type="text/javascript"></script>
<?php $site=new Site(); $site->prepareSearchTags();?>
<?php $site=new Site(); $site->prepareSearchTags();?>
</head>

<body>
<?php
			  
			  ?><table width="100%" border="0" cellpadding="0" cellspacing="0" class="cellType4">
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
    <td colspan="2"><table width="100%" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers"><?php
						if(file_exists("../install1"))
						{
						?>Step 1: Install grabmyhouse
						<?php 
						}
						else
						{
						?>Welcome <?php echo $_SESSION['actnpals'];?>!
						<?php 
						}
						
						 ?> </span></td>
      </tr>
      <tr>
        <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><?php
			  	$error=new Error();


				$error->displayComponent($_REQUEST['errcpj'], 'index.php', 2);
					
			  ?>
            
            
            </td>
      </tr>
    </table>
     
     
    <table width="100%" border="0" cellpadding="5" cellspacing="5" class="cellType3">
      <tr>
        <td width="20%" valign="top" class="cellType7"><table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="cellType2">Administrative Functions</td>
            </tr>
          <?php
		  	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
			{
		  ?><tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<?php $siteIn=new Site(); if($siteIn->siteOnline){?><a href="../install/installer.php"><?php }?>Install<?php if($siteIn->siteOnline){ ?></a><?php }?>&nbsp;/&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('portal_updater'); ?>">Updates</a></td>
            </tr>
			<?php
		  	}
		  ?>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('features_manager'); ?>">Features Manager </a></td>
            </tr>
          <?php
		  	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
			{
		  ?>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('components_manager'); ?>">Components Manager</a> </td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('configuration_manager'); ?>">Site Configurations</a></td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('template_manager'); ?>">Template Manager</a> </td>
          </tr>
          <?php
		  	}
		  ?>
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td align="left" class="cellType2">Admin Login </td>
            </tr>
          <tr>
            <td align="left" class="cellType11">
              <?php
LOGIN::displayLoginForm('../features/user/login/', NULL);
			?>			</td>
            </tr>
          <tr>
            <td align="left">&nbsp;</td>
            </tr>
          </table></td>
          <td width="80%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td class="headers" align="left">From the family ! </td>
            </tr>
            <tr>
              <td align="left"><div>
                <p>Hey!<br />
                  <br />
				  <?php
		  	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
			{
		  ?>
Thanks for choosing grabmyhouse as your housing portal software. <br />
<?php
		  	}
			else
			{
		  ?>
		  Thanks for logging into the portal grid. Here you can perform your core functions like posting properties for viewers to view.<br />
<?php
		  	}
		  ?>
<br />
grabmyhouse has been developed to enable property search become easy. It provides tools required to enhance this especially to the administrator. No more need for handling the nitty gritty business issues involved in site management as this has been taken care of.You are thereby faced with the tasks of populating your housing portal. Gives you more concentration on the business aspect of your firm.<br />
<br /> 
Start by clicking on any of the links under the Administrative Functions panel.<br />
Enjoy grabmyhouse!
<br />
                  <br />
                  <?php
		  	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
			{
		  ?>
		  <strong>Administrator</strong><br />
                  <br />
Ensure you read your starter resource to help you configure your grabmyhouse. </p>
                <p>Security issues are paramount for most sites. To ensure we keep up with security loopholes and in order to keep your site secure, reguarly check your mails for notification on security updates and matters or you can go to our site on <a href="http://www.syncstate.com/projects/grabmyhouse/security/index.php" target="_blank">www.syncstate.com/projects/grabmyhouse/security</a>. </p>
                <p>If you have any security issues, please notify us by going to <a href="http://www.syncstate.com/projects/grabmyhouse/security/index.php" target="_blank">www.syncstate.com/projects/grabmyhouse/security</a>. </p>
                <p><strong>Join Us </strong></p>
                <p>Have any ideas or features which you will want to be added to the portal, feel free to let us know. Tell us through <a href="http://www.syncstate.com/projects/grabmyhouse/security/index.php" target="_blank">www.syncstate.com/projects/grabmyhouse/talk2us</a>. </p>
              </div></td>
            </tr><?php
		  	}
		  ?>
            </table></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="2" align="center" valign="top">&nbsp;</td>
        </tr>
    </table>
	
	</td></tr>
</table>
<div align="left"><?php //include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/footer/footer_class.php");
	$fot=new Footer();echo $fot->displayComponent(NULL);?></div>

</body>
</html>
