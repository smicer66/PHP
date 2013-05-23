<?php
ob_start();


$features=new Feature();
$url='Location: ../../../administrator/index.php';
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
<link href="view/css/orange_admin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="../includes/validate.js"></script>
<script type="text/javascript" src="../includes/jacs.js"></script>
<link href="view/css/orange_admin.css" rel="stylesheet" type="text/css" />
<script src="../includes/error.js" type="text/javascript"></script>
<?php $site=new Site(); $site->prepareSearchTags();?>
<link href="css/orange_admin.css" rel="stylesheet" type="text/css" />
<!-- TinyMCE -->
<script type="text/javascript" src="../includes/validate.js"></script>
<script type="text/javascript" src="../utilities/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<?php
include_once("../utilities/tinymce/direct_src.php");
?>
<!-- /TinyMCE -->


<?php $site=new Site(); $site->prepareSearchTags();?>
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
        <td width="16%" valign="top" class="cellType7"><table width="99%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="cellType2">Administrative Functions</td>
            </tr>
            <?php
		  	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
			{
		  ?><tr>
            <td class="cellType1"><?php $siteIn=new Site(); if($siteIn->siteOnline){?><a href="../install/installer.php"><?php }?>Install<?php if($siteIn->siteOnline){ ?></a><?php }?>&nbsp;/&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('portal_updater'); ?>">Updates</a></td>
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
              <td><table width="100%" border="0" cellspacing="2" cellpadding="5">
                  <tr>
                    <td class="cellType2">Other Links: </td>
                  </tr>
                  <tr>
                    <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('advertisement_creator'); ?>">Advertisement Creator </a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('advertisement_update'); ?>">Advertisement Updater </a></td>
                  </tr>
              
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Advertisement Update </span></td>
          </tr>
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType7"> <?php
			  $error=new Error();


				$error->displayComponent($_REQUEST['errcpj'], $_SERVER['HTTP_REFERER'], 1);
			  ?><form action="index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			}
			else
			{
				
			}
			 ?>" method="post" enctype="multipart/form-data">
              <div class='scrollYes'>
			  <table width="100%" border="0" cellspacing="2" cellpadding="5">
                
                <tr>
                  <td valign="top" class="cellType2">Advert Name<br />
                    <span class="texttype2">[Click to Update Advert Contents]</span></td>
				  <td width='20%' valign="top" class="cellType2">Display On Frontpage<br />
				    (Yes)?</td>
				  <td width='10%' valign="top" class="cellType2">Active<br />
				    (Yes)?</td>
                  </tr>
                <?php
		if(!isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advertisement` WHERE `srcId` = '".$_SESSION['uid']."'";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advertisement`";
		}
			$sql= $mysql->query($str);
			if($mysql->num_rows==0)
			{
				echo "<tr>
				  <td colspan='3' valign='top' class='cellType7'>
				  <table width='100%' border='0' cellspacing='0' cellpadding='5'>
				<tr><td align='center' class='cellType12'>No Advertisements Created Yet!</td>
				</tr>";
				echo "</table>
				</td></tr>";
			}
			else
			{
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					if($result['fpYes']==1)
					{
						$checked='checked';
					}
					if($result['status']==1)
					{
						$checked1='checked';
					}
					if(!isSuperAdmin($_SESSION['uid']))
					{
						$disabled1='disabled=disabled';
						$text="<br /><a href='?fid=".ADMINISTRATOR::getAdminFunctionId('start_pause_advertisement')."&fiid=".$result['id']."'>Start/Pause Listing</a>";
					}
					else
					{
						$disabled1='';
						$text="";
					}
					echo "<tr>
					  <td valign='top' class='cellType11'>
					  <a href='".$_SERVER['PHP_SELF']."?delId=".$result['uniqueId']."'><img src='../../../images/delete.png' height=15px border=0 align='absmiddle' title='delete' /></a>&nbsp;&nbsp;
					  <a href='?fid=".ADMINISTRATOR::getAdminFunctionId('advertisement_creator')."&mod=1&id=".$result['id']."'>".getRealData($result['name'])."</a></td>
					  <td valign='top' class='cellType7'><input name='fpYes".$result['id']."' type='checkbox' value='1' ".$checked."/></td>";
					 echo "
					 <td valign='top' class='cellType7'><input name='status".$result['id']."' type='checkbox' value='1' ".$checked1." ".$disabled1."/> ".$text."</td>";
					   $checked='';$checked1='';
					  echo "</tr>";
				}
				
              echo "<table width='100%' border='0' cellspacing='2' cellpadding='5'>
                <tr>
                  <td colspan='3' valign='top' class='cellType11'><input name='EditAdvert' type='submit' id='Edit' value='Update' /></td>
                    </tr>  
              </table>";
			}
			
		
		?>
              </table>
			  </div>
			 
            </form>            </td>
            </tr>
        </table></td>
      </tr>
      
      <tr>
        <td colspan="2" align="center" valign="top">&nbsp;</td>
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
