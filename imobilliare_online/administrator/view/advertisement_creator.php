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


$advertisement=new Advertisement();
if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
{
	$resultMOD = $advertisement->getAdvertDetails($_REQUEST['id']);
	
	//check if item to be modified was uploaded by admin
	$userDet=$user->getUserDetails($_SESSION['uid']);
	if(($_SESSION['uid'] == $resultMOD['srcId']) || (isSuperAdmin($_SESSION['uid'])))
	{
		//proceed
	}
	else
	{
		//redirect to creator
		header('Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('advertisement_creator'));
	}
}



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
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Advertisement Creator </span></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7">
			<?php
			   	$error=new Error();

				$error->displayComponent($_REQUEST['errcpj'], $_SERVER['HTTP_REFERER'], 1);
			  
			  ?>
			
			<form action="index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			}
			else
			{
				
			}
			 ?>" method="post" enctype="multipart/form-data">
              <table width="100%" border="0" cellspacing="2" cellpadding="5">
                
                <tr>
                  <td width="25%" valign="top" class="cellType11">Advert Header Title:</td>
                  <td class="cellType10">
				  <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input type='text' name='name' value='".getRealData($resultMOD['name'])."'/>";
		}
		else
		{
			echo "<input type='text' name='name' />";
		}
		?>		</td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11"> When clicked Redirect to Url :</td>
                  <td class="cellType10"><?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input type='text' name='url' value='".getRealData($resultMOD['url'])."'/>";
		}
		else
		{
			echo "<input type='text' name='url' />";
		}
		?>                  </td>
                </tr>
                
                <tr>
                  <td valign="top" class="cellType11">Or When clicked Redirect to: <br />
                    <span class="texttype2">[Select the feature first and then the particular item under that feature. Clicking on the item gives you a preview]</span></td>
                  <td valign="top" class="cellType10">
				  <select name="featureName" id="featureName" onchange='validateX1(this.value, this.id)'>
				  
                    <?php
	  echo append_option_featureListMenuOnly($resultMOD['linkToFeatureId']);
	  
	  ?>
                  </select>
					
                    <br />
                    <div id='logoStatusX1'>
					<?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			$feat=new Feature();
			$featDet=$feat->getDetails($resultMOD['linkToFeatureId']);
			if($featDet)
			{
				echo "<br />
					Select Specific Link:<br />";
						
				$tablename=strtolower(str_replace(" ", "_", $featDet['name']));
				$str=ucfirst(strtolower($tablename));
				$obj=new $str();	
				
				
				$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tablename."` WHERE (`status` = '1' OR `status` = 'Valid')";
				$sqlX= $mysql->query($strX);
				while($resultX = $mysql->fetch_assoc_mine($sqlX))
				{
						
						$obj->previewLink($resultX['id'], $resultMOD['linkToFeatureChildId'], 1);
						
				}
			}
		}			
					?>
					</div></td>
                </tr>
				
				<?php
				if(isSuperAdmin($_SESSION['uid']))
				{
				?>
				<?php
				}
				?>
				
                <?php
	  
	  	if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			 echo " <tr>
                  <td valign='top' class='cellType11'>Change Advert Image</td>
                  <td class='cellType10'>";
				  
				  if(is_numeric($resultMOD['fileId'])==1)
				  {
				  	echo "<img src='../features/advertisement/view/images/".getPictureFileName($resultMOD['fileId'], 1)."' height='70px'>";
				  }
				  
				  
				  echo "<table width='50%' cellspacing='0' cellpadding='0'>
				  <tr>
                  <td valign='top' width='20%'>
				  <input name='addImage' type='checkbox' id='addImage' title='click to change image' onChange='validate(this.value, this.id)' value='1' />
				  </td>
				  <td valign='top' width='20%'>
				  <div id='logoStatus4'>&nbsp;</div>
				  </td></tr></table>
				  
				  </td>
                </tr>";
		}
		else
		{
               echo " <tr>
                  <td valign='top' class='cellType11'>Advert Contents (Image Format)<br />
                      <span class='style1'>Image File(s)</span>:</td>
                  <td class='cellType10'>
		 
		
				  <input name='userfile1' type='file' id='userfile1' />
                      <br />                  </td>
                </tr>";
		}
          ?>      
                
                <tr>
                  <td valign="top" class="cellType11">Period Adverts Last:</td>
                  <td class="cellType10"><?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo getRealData($resultMOD['periodLasts'])." days";
		}
		else
		{
		?>
                    <select name="noOfDays2" id="noOfDays2" onchange='validate(this.value, this.id)'>
                      <?php echo append_serial_nos(1,101,$value); ?>
                                        </select>
                    <?php
			
		}
		?>
                    <span id='listingCost'></span></td>
                </tr>
                
                <tr>
                  <td valign="top" class="cellType11">Advert Contents</td>
                  <td valign="top" class="cellType10"><div>
                      <div>
                        <!--elm1-->
                        <textarea id="advertisementContents" name="advertisementContents" rows="8" cols="20" style="width:30%"><?php
        if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo adjustImageUrlToFit(getRealDataNoHTML($resultMOD['textContents']),1);
		}
			?></textarea>
                      </div>
                    <br />
					<?php
        if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input name='UpdateAdvert' type='submit' id='Create' value='Update' />";
		}
		else
		{
			echo "<input name='CreateAdvert' type='submit' id='Create' value='Create' />";
		}          
					?>
                  </div></td>
                </tr>
              </table>
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
