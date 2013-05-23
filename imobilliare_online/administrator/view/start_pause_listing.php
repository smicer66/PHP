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
//$administrator->grantAccess(basename($_SERVER['REQUEST_URI'], $uri) ,$url);

$error=new Error();
$user=new User();


if((isset($_REQUEST['fiid']))&& (is_numeric($_REQUEST['fiid'])==1))
{
	$resultMOD = PROPERTY::getPropertyDetails($_REQUEST['fiid']);
	$fileSql=PROPERTY::getPropertyFiles($_REQUEST['fiid']);
	$propCat=PROPERTY::getPropertyCategory($resultMOD['propertyCategoryId']);
	$propType=PROPERTY::getPropertyType($propCat['propertyTypeId']);
	$propLocation=PROPERTY::getPropertyLocation($resultMOD['locationId']);
	$propLocationState=PROPERTY::getPropertyState($propLocation['stateId']);
	$propTrans=PROPERTY::getPropertyTransaction($resultMOD['transactionTypeId']);
	
	if($resultMOD['authorUserId'] == $_SESSION['uid'])
	{
		//proceed
	}
	else
	{
		//redirect to creator
		header('Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('property_creator'));
	}
	
	
	//if property has already started being listed
	if($resultMOD['status'] == 'Valid')
	{
		//redirect to creator
		header('Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('property_creator'));
	}
	else
	{
		//proceed
		
	}
}
else
{
	if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
	{
		$resultMOD = PROPERTY::getPropertyDetails($_REQUEST['id']);
		$fileSql=PROPERTY::getAllPropertyFiles($_REQUEST['id']);
		$propCat=PROPERTY::getPropertyCategory($resultMOD['propertyCategoryId']);
		$propType=PROPERTY::getPropertyType($propCat['propertyTypeId']);
		$propLocation=PROPERTY::getPropertyLocation($resultMOD['locationId']);
		$propLocationState=PROPERTY::getPropertyState($propLocation['stateId']);
		$propTrans=PROPERTY::getPropertyTransaction($resultMOD['transactionTypeId']);
		
		if($resultMOD['authorUserId'] == $_SESSION['uid'])
		{
			//proceed
		}
		else
		{
			//redirect to creator
			header('Location: property_creator.php');
		}
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php $site=new Site(); echo $site->getTitle()." - Administrator Area";?></title>
<script type="text/javascript" src="../includes/validate.js"></script>
<script type="text/javascript" src="../includes/jacs.js"></script>
<link href="view/css/orange_admin.css" rel="stylesheet" type="text/css" />
<script src="../includes/error.js" type="text/javascript"></script>
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
            <td><table width="100%" border="0" cellspacing="2" cellpadding="5">
              <tr>
                <td class="cellType2">Other Links: </td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_creator'); ?>">Property Creator</a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_listing'); ?>">Property Listings</a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_add_images'); ?>&mod=1">Add Images/Files To Property</a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Set File Properties </span>
			<?php
			if(!isset($_REQUEST['mod']))
			{ 
				echo "<span class='welcomeUserText'>(Step 3)</span>";
			}
			?>
			</td>
          </tr>
          <tr>
            <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><?php
			 // $error->displayComponent($_REQUEST['errcpj'], null, 1);
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
              <table width='100%' border='0' cellspacing='5' cellpadding='5'>
			  	<tr>
                  <td width="28%" valign='top' class="cellType11">Property Title: </td>
                  <td valign='top' class="cellType10"><?php
		echo $resultMOD['title'];
		?>  </td>
                </tr>
			  <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
		
		
		
		}
		else
		{
		?>
                
				
                <tr>
                  <td valign='top' class="cellType11">Buy/Lease:</td>
                  <td valign='top' class="cellType10"><?php
				 echo $propTrans;
				  ?></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Property Type:</td>
                  <td valign='top' class="cellType10"><?php echo $propType; ?>&nbsp;</td>
                </tr>
				<tr>
                  <td valign='top' class="cellType11">Property Specifics:</td>
                  <td valign='top' class="cellType10"><?php
				  echo $propCat['name'];
		?></td>
                </tr>
				<tr>
                  <td valign='top' class="cellType11">Property Location:</td>
                  <td valign='top' class="cellType10"><?php echo $propLocationState['name'];?></td>
                </tr>
				<tr>
                  <td valign='top' class="cellType11">Property Location Specifics:</td>
                  <td valign='top' class="cellType10"><?php echo $propLocation['name'];?></td>
                </tr>
				
                
                <tr>
                  <td valign='top' class="cellType11">Property Description: </td>
                  <td valign='top' class="cellType10"><?php echo $resultMOD['description'];?></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">No of Days Listing Runs:  </td>
                  <td valign='top' class="cellType10"><?php
				  echo $resultMOD['period'];
		?></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Pricing (Naira):<br />
<span class='warningText'>[Valuation should be numeric (no commas). Per Year for Lease, Outright Cost for Buy]</span></td>
                  <td valign='top' class="cellType10"><?php
		echo getRealData($resultMOD['pricing']);
		?></td>
                </tr>
		<?php
		}
		?>
                <tr>
                  <td width="28%" valign='top' class="cellType11">Property Files:<br />
				  <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
                echo "<br />Add Files: <br />
				<input name='userfile1' type='file' id='userfile1' /><br /><div class='cell_seperator2'>&nbsp;</div>
				<input name='userfile2' type='file' id='userfile2' /><br /><div class='cell_seperator2'>&nbsp;</div>
				<input name='userfile3' type='file' id='userfile3' /><br /><div class='cell_seperator2'>&nbsp;</div>
				<input name='userfile4' type='file' id='userfile4' /><br /><div class='cell_seperator2'>&nbsp;</div>
				<input name='userfile5' type='file' id='userfile5' /><br /><div class='cell_seperator2'>&nbsp;</div>
				<input name='Add_Images' type='submit' id='Update' value='OK' />";
		}
		?>		
				  <br />
				  <span class="cellType10">
				  
				  </span></td>
                  <td valign='top' class="cellType10">
				  <table width="100%" border="0" cellspacing="2" cellpadding="5" class="AdminTable">
				  <tr>
                      <td width="50%" class='cellType6' align="left"><span class="headers">Files</span></td>
                      <td class='cellType6' align="right"><span class="headers">File Properties</span></td>
                    </tr>
                  <?php
				  $count=0;
				  while($result=$mysql->fetch_assoc_mine($fileSql))
				  {
				  	if(($count%2)==0)
					{
						$class="class='altBg'";
					}
					else
					{
						$class="class='altBg1'";
					}
					$count++;
				  ?>
                    <tr>
                      <td valign="top" <?php echo $class; ?>><table width="10%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
						  	<?php
						  	  if(fileFormat(getPictureFileName($result['fileId']))=='Image')
							  {
							  		echo "<img src='../features/property/view/images/".getPictureFileName($result['fileId'])."' alt='Image' class='imagePreview' border='0' title='Image'/>";
							  }
							  else if(fileFormat(getPictureFileName($result['fileId']))=='pdf')
							  {
							  		echo "<img src='../images/adobe_pdf_icon.png' alt='Image' class='imagePreview' border='0' title='pdf'/>";
							  }
							  else if(fileFormat(getPictureFileName($result['fileId']))=='Video')
							  {
							  		echo "<img src='../images/video_icon.jpg' alt='Image' class='imagePreview' border='0' title='video'/>";
							  }
							  else if(fileFormat(getPictureFileName($result['fileId']))=='Audio')
							  {
							  		echo "<a href='javascript:;' onClick='javascript:window.open(\"../core/preview/index.php?fid=".FEATURE::getId('Property')."&propId=".$_REQUEST['fiid']."&search_start=".$countre1."&ftype=".$result['imageType']."&fiid=".$result['fileId']."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";
									echo "<img src='../images/audio_icon.jpg' alt='Image' class='imagePreview' border='0' title='audio'/>";
									echo "</a>";
							  }
							  echo "<a href='".$_SERVER['PHP_SELF']."?delFid=".$result['uniqueId']."'><img src='view/images/delete.png' height=30px border=0 /></a>";
							  ?>
						  
						  </td>
                        </tr>
                      </table></td>
                      <td valign="top" align="right" <?php echo $class; ?>>
					  Display on Frontpage: <select name="frontpage<?php echo $result['id'];?>"><?php echo append_option($result['frontPageYes']);?></select><br /><br />
					  File Status - Valid: <select name="status<?php echo $result['id'];?>"><?php echo append_option($result['status']);?></select>
						</td>
                    </tr>
                  <?php
				 }
				 ?>
				 </table>				 </td>
                </tr>
                
                <tr>
                  <td valign='top' class="cellType11">&nbsp;</td>
                  <td valign='top' class="cellType10">
				  <?php
        if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input name='Property_Listing' type='submit' id='Update' value='Update Listing' />";
		}
		else
		{
			//get available money at time of trying to start listing
			//if money is larger or equal to the cost of setting up on listing allow user to start listing
			//else restrict user from starting listing
			$totalFunds=BILLING::getTotalFunds();
			$totalFundsUsed=BILLING::getTotalFundsUsed();
			$moneyAvail=$totalFunds - $totalFundsUsed;
			
			$moneyNeededAtLeast=BILLING::getBillingEntry($resultMOD['billingId']);
			echo "<input name='Property_Listing' type='submit' id='Create' value='Save' />&nbsp;&nbsp;";
			if($moneyAvail >= $moneyNeededAtLeast)
			{
				echo "<input name='Property_Listing' type='submit' id='Create' value='Start Listing' />";
			}
			else
			{
				echo "<input name='Property_Listing' type='submit' id='Create' value='Start Listing' disabled='disabled'/><br />
				<span class='warningText'>To Start Listing Ensure you have enough funds. Your present funds stand at <u>".$moneyAvail."Naira</u>. 
				<br />You need at least <u>".$moneyNeededAtLeast." Naira</u> in your funds to start listing this property. <a href=#>More Help?</a></span>
				";
			}
		}          
					?>					</td>
                </tr>
              </table>
            </form>
            </td>
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
