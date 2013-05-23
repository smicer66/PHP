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
	$resultMOD = ADVERTISEMENT::getAdvertDetails($_REQUEST['fiid']);
	$displayStopButton=ADVERTISEMENT::displayStopDisplayButton($_REQUEST['fiid']);
	$displayStartButton=ADVERTISEMENT::displayStartDisplayButton($_REQUEST['fiid']);
	
	if($resultMOD['srcId'] == $_SESSION['uid'])
	{
		//proceed
	}
	else
	{
		//redirect to creator
		header('Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('advertisement_creator'));
	}
	
	
	//if property has already started being listed
	if($resultMOD['status'] != 1)
	{
		//redirect to creator
		header('Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('advertisement_creator'));
	}
	else
	{
		//proceed
		
	}
}
else
{
	header('Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('advertisement_creator'));
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
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Pause or Restart My Advertisements </span>
			
			</td>
          </tr>
          <tr>
            <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><?php
			  $error->displayComponent($_REQUEST['errcpj'], null, 1);
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
                  <td width="28%" valign='top' class="cellType11">Advert Title: </td>
                  <td valign="top" class="cellType10">
				  <?php echo $resultMOD['name'];?></td>
                </tr>
				 <tr>
                  <td valign='top' class="cellType11">Advert Preview :</td>
                  <td valign='top' class="cellType10">
				  		<table width="20%" border="0" cellpadding="0" cellspacing="5">
						<tr>
						<td class='advertCells'>  
							<?php echo adjustImageUrlToViewLife(ADVERTISEMENT::getAdvertForAdmin($_REQUEST['fiid']));?>						</td>
						</tr>
					  </table>                </tr>
		
				 <tr>
				   <td valign='top' class="cellType11">Current Display Status: </td>
				   <td valign='top' class="cellType10">
				   <?php 
				   if($displayStopButton==TRUE)
				   {
				   		echo "Currently Being Displayed";
				   }
				   else
				   {
				   		echo "Not Currently Being Displayed. <br />Either Its being Paused or the period of its running has elasped or you have not started listing it.";
				   }
				   ?></td>
				   </tr>
				 <tr>
                  <td valign='top' class="cellType11">&nbsp;</td>
                  <td valign='top' class="cellType10">
				  <?php
			//get available money at time of trying to start listing
			//if money is larger or equal to the cost of setting up on listing allow user to start listing
			//else restrict user from starting listing
			$totalFunds=BILLING::getTotalFunds();
			$totalFundsUsed=BILLING::getTotalFundsUsed();
			$moneyAvail=$totalFunds - $totalFundsUsed;
			
			$moneyNeededAtLeast=BILLING::getBillingEntry($resultMOD['billingId']);
			
			
			if($displayStopButton==TRUE)
			{
				echo "<input name='Advert_Listing' type='submit' id='Create' value='Pause Display' />&nbsp;&nbsp;";
			}
			if($displayStartButton==TRUE)
			{
				if($moneyAvail >= $moneyNeededAtLeast)
				{
					echo "<input name='Advert_Listing' type='submit' id='Create' value='Start Display' />";
				}
				else
				{
					echo "<input name='Advert_Listing' type='submit' id='Create' value='Start Display' /><br />
				<span class='warningText'>To Start Listing Ensure you have enough funds. Your present funds stand at <u>".$moneyAvail."Naira</u>. 
				<br />You need at least <u>".$moneyNeededAtLeast." Naira</u> in your funds to start listing this property. <a href=#>More Help?</a></span>";
				}
				
			}
			else if($displayStartButton==FALSE)
			{
				//echo "<input name='Advert_Listing' type='submit' id='Create' value='Start Display' disabled='disabled'/>";
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
