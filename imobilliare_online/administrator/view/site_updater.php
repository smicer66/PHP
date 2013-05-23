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

$resultMOD = $site->getSiteDetails();

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
    <td colspan="2" class="cellType5"><a href="../../site/index.php"><img src="../../images/grabmyhouseLogo.png" border="0" align="absmiddle" /></a>&nbsp;Portal Manager </td>
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
        <td width="16%" valign="top" class="cellType7"><table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="cellType2">Administrative Functions</td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<?php $siteIn=new Site(); if($siteIn->siteOnline){?><a href="../../install/installer.php"><?php }?>Install<?php if($siteIn->siteOnline){ ?></a><?php }?>&nbsp;/&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('portal_updater'); ?>">Updates</a></td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('features_manager'); ?>">Features Manager </a></td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('components_manager'); ?>">Components Manager</a> </td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('configuration_manager'); ?>">Site Configurations</a></td>
          </tr>
		  
		  <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('template_manager'); ?>">Template Manager</a> </td>
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
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Configuration Manager - Site Configurations  </span></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><?php
			  $error=new Error();


					$error->displayComponent($_REQUEST['errcpj'], null, 1);
			  ?>
			  <form action="<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
				echo $_SERVER['PHP_SELF'];
			}
			 ?>" method="post" enctype="multipart/form-data" >
              <table width="100%" border="0" cellspacing="5" cellpadding="5">

                <tr>
                  <td width="28%" valign="top" class="cellType11">Site Name: </td>
                  <td class="cellType10"><?php
			echo "<input type='text' name='churchName' value='".getRealData($resultMOD['churchName'])."'/>";
		
		?></td>
                </tr>

                <tr>
                  <td valign="top" class="cellType11">Site Title: </td>
                  <td class="cellType10"><?php
			echo "<input type='text' name='siteTitle' value='".getRealData($resultMOD['siteTitle'])."'/>";
		
		?></td>
                </tr>
                
                <tr>
                  <td valign="top" class="cellType11">Transaction Currency: </td>
                  <td class="cellType10"><?php
			echo "<input type='text' name='currency' value='".getRealData($resultMOD['currency'])."'/>";
		
		?></td>
                </tr>
                
                
 
                <tr>
                  <td valign="top" class="cellType11">Activate Mailer: </td>
                  <td class="cellType10"><?php
			if($resultMOD['status']==1)
			{
				$checked="checked='checked'";
			}
			echo "<input name='mailer' type='radio' value='1' ".$checked." />";
			$checked='';
		
		?>
&nbsp;Yes&nbsp;&nbsp;
<?php
			if($resultMOD['status']==0)
			{
				$checked="checked='checked'";
			}
			echo "<input name='mailer' type='radio' value='0' ".$checked." />";
			$checked='';
		
		?>
&nbsp;No</em></td>
                </tr>
         
               
                <tr>
                  <td valign="top" class="cellType11">Site keywords: </td>
                  <td class="cellType10"><input name="keywords" type="text" id="keywords" value="<?php
				  echo getRealData($resultMOD['keywords']);?>"/></td>
                </tr>
				<tr>
                  <td valign="top" class="cellType11">Site Description: </td>
                  <td class="cellType10"><input name="description" type="text" id="description" value="<?php
		echo getRealData($resultMOD['description']);
		?>" /></td>
                </tr>
               
               
                <?php
		
			 echo " <tr>
                  <td valign='top' class='cellType11'>Change Favicon Image? </td>
                  <td class='cellType10'>
				  
				  <table width='50%' cellspacing='0' cellpadding='0'>
				  <tr>
                  <td valign='top' width='20%'>
				  <input name='addImage' type='checkbox' id='addImage' onChange='validate(this.value, this.id)' value='1' />&nbsp;Yes
				  </td>
				  <td valign='top' width='20%'>
				  <div id='logoStatus4'>&nbsp;</div>
				  </td></tr></table>
				  
				  </td>
                </tr>";
		
		?>
               
                <tr>
                  <td valign="top" class="cellType11">Site Author: </td>
                  <td class="cellType10"><input name="author" type="text" id="author" value="<?php
				  echo getRealData($resultMOD['author']);?>"/></td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11">Site Copyright: </td>
                  <td class="cellType10"><input name="copyright" type="text" id="copyright" value="<?php
		echo getRealData($resultMOD['copyright']);
		?>" /></td>
                </tr>
                
                <tr>
                  <td valign="top" class="cellType11">Set Site Status As Online? </td>
                  <td class="cellType10"><?php
			if($resultMOD['status']==1)
			{
				$checked="checked='checked'";
			}
			echo "<input name='status' type='radio' value='1' ".$checked." />";
			$checked='';
		
		?>
                    &nbsp;Yes&nbsp;&nbsp;
                   <?php
			if($resultMOD['status']==0)
			{
				$checked="checked='checked'";
			}
			echo "<input name='status' type='radio' value='0' ".$checked." />";
			$checked='';
		
		?>&nbsp;No</td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11">&nbsp;</td>
                  <td class="cellType10"><?php
        
			echo "<input name='UpdateSiteSettings' type='submit' id='Create' value='Update' />";
					?></td>
                </tr>
              </table>
            </form>            </td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table><br />
<div class="footer">
  <div align="left"><?php //include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/footer/footer_class.php");
	$fot=new Footer();echo $fot->displayComponent(NULL);?></div>
</div>
</body>
</html>
