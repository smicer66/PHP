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


$fsql=BILLING::getFundsListing($_REQUEST['search_start']);
$totalNoResults=BILLING::getMyFundsListingCount();

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
<link href="css/orange_admin.css" rel="stylesheet" type="text/css" />
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
                  <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('funds_listing'); ?>">Funds Listing </a></td>
                </tr>
                <tr>
                  <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('funds_manage'); ?>">Manage Funds </a></td>
                </tr>
				
			  
		  <?php
		  	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
			{
		  ?>
		  		<tr>
                  <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('billing_add'); ?>">Add Funds </a></td>
                </tr>
                
                <tr>
                  <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('billing_costs'); ?>">Manage Billing/Charging</a></td>
                </tr>
			<?php
		  	}
		  ?>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Funds Management </span></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7">
			<?php
			   $error=new Error();


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
			 ?>" method="post">
              <table width="100%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <td colspan="2" align="left" class="cellType6">Funds Available For You Total Naira </td>
                  </tr>
                
                
                <tr>
                  <td colspan="2" align="left" valign="top" class="headerTitle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="cellType16 cellType13">
  <tr>
    <td width="33%">Funding Summary:</td>
    <td colspan="2" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3">
      <div class="texttype10">Total Funds Paid In Escrow Account:&nbsp;<span class="texttype2">
        <?php 
		if(isSuperAdmin($_SESSION['uid']))
		{
			echo BILLING::getTotalFundsOnSystem($_SESSION['uid']);
		}
		else
		{
			echo BILLING::getTotalFunds($_SESSION['uid']);
		}
		?> Naira
      </span><br />
      Total Funds Used:&nbsp;<span class="texttype2">
        <?php 
		if(isSuperAdmin($_SESSION['uid']))
		{
			echo BILLING::getTotalFundsUsedOnSystem();
		}
		else
		{
			echo BILLING::getTotalFundsUsed();
		}
		
		?> Naira
      </span><br />
      Total Funds Available for Property Listing or Advert Placement: &nbsp;<span class="texttype2">
        <?php 
		if(isSuperAdmin($_SESSION['uid']))
		{
			echo (BILLING::getTotalFundsOnSystem() - BILLING::getTotalFundsUsedOnSystem());
		}
		else
		{
			echo (BILLING::getTotalFunds() - BILLING::getTotalFundsUsed());
		}
		
		?> Naira
      </span></div></td>
    </tr>
</table>

				  <div class="texttype2"></div></td>
                  </tr>
                <tr>
                  <td colspan="2" align="left" valign="top"><div class='scrollYes'>
                    <table width="100%" border="0" cellspacing="2" cellpadding="5">
                      <tr>
                        <td width="20%" valign="top" class="cellType2">Pay-In Teller No. </td>
                        <td width="16%" valign="top" class="cellType2">Bank</td>
                        <td width="15%" valign="top" class="cellType2">Amount - Naira</td>
                        <td width='5%' valign="top" class="cellType2">Valid</td>
                        <td width='5%' valign="top" class="cellType2">Approved</td>
                      </tr>
                      <?php
				
			if($fsql!=FALSE)
			{
			
				while($result = $mysql->fetch_assoc_mine($fsql))
				{
					$bankDet=getBankDetails($result['bankId']);
					$date=explode(' ', $result['datePosted']);
					
					 $checked4=''; $checked5='';
	
					
					if($result['status']=='1')
					{
						$checked4='checked';
					}
					if($result['adminApprovedYes']=='1')
					{
						$checked5='checked';
					}
					
					
					if(!isSuperAdmin($_SESSION['uid']))
					{
						$disabled="disabled='disabled'";
					}
					else
					{
						$disabled="";
					}
					
					
					echo "<tr>
				  <td valign='top' class='cellType11'>".getRealData($result['payInTellerNo'])."</td>
				  <td valign='top' class='cellType11'>".strtoupper($bankDet['name'])."</td>
				  <td valign='top' class='cellType11'>".getRealData($result['amount'])."</td>
				  <td valign='top' class='cellType7'><input name='status".$result['id']."' type='checkbox' value='1' ".$checked4." ".$disabled."/></td>
				  <td valign='top' class='cellType7'><input name='approve".$result['id']."' type='checkbox' value='1' ".$checked5." ".$disabled."/></td>";
					  
					  echo "</tr>";
				}
			}
			else
			{
				echo "<tr>
				  <td colspan='5' class='cellType11'/><div align='center'>None Available</div></td>";
					  echo "</tr>";
			}
		
		?>
                    </table>
                    <table width="100%" border="0" cellspacing="2" cellpadding="5">
                      
                      <tr>
                        <td valign="top" class="cellType11">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						  <tr>
							<td>
							<?php
							if(isSuperAdmin($_SESSION['uid']))
							{
							?>
							<input name="Funds_Listings" type="submit" id="Edit1" value="Update" />
							<?php
							}
							?>
							
							&nbsp;</td>
							<td><div class="texttype2" align="right">
                          <?php ADMINISTRATOR::paginateResults($totalNoResults,$siteDet['adminResultsDisplayNumber']);?>
                        </div> </td>
						  </tr>
						</table></td>
                        </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td width="34%" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td width="37%" align="left" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" valign="top" class="cellType14"><span class="headerTitle">How Did I Spend My Funds?</span><br />
                        <br />
                        <table width="95%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="cellType13 cellType16">
							<div class="newscrollYes">
							<span class="headers"><u>Listings:</u>&nbsp;</span><span class="footer">date format (yy-mm-dd)</span> <br />
                              <?php
							  $activityDetailsSQL=PROPERTY::getMyPropertyActivityDetails();
							  if($activityDetailsSQL)
							  {
							  		while($resultX = $mysql->fetch_assoc_mine($activityDetailsSQL))
									{
										echo "<strong>Property:<br /></strong><span class='texttype10'>".$resultX['title']."</span><br />Ran From <i>";
										if($resultX['pauseListingDate']!='0000-00-00 00:00:00')
										{
											echo getDateInWords(substr($resultX['re_startListingDate'], 0, (strlen($resultX['re_startListingDate']) - 8)))." to ".getDateInWords(substr($resultX['pauseListingDate'], 0, (strlen($resultX['pauseListingDate']) - 8)))."</i> = ".getDayDiff($resultX['re_startListingDate'], $resultX['pauseListingDate'])." day(s) <br />Funds Used: <strong>".getDayDiff($resultX['re_startListingDate'], $resultX['pauseListingDate']) * BILLING::getBillingEntry($resultX['billingId'])." Naira</strong><br /><br />";
											$totalFundsUsed1=$totalFundsUsed1 + getDayDiff($resultX['re_startListingDate'], $resultX['pauseListingDate']) * BILLING::getBillingEntry($resultX['billingId']);
										}
										else
										{
											echo getDateInWords(substr($resultX['re_startListingDate'], 0, (strlen($resultX['re_startListingDate']) - 8)))." to today </i> = ".getDayDiff($resultX['re_startListingDate'], date('Y-m-d H:i:s'))." day(s) <br />Funds Used: <strong>".getDayDiff($resultX['re_startListingDate'], date('Y-m-d H:i:s'))  * BILLING::getBillingEntry($resultX['billingId'])." Naira</strong><br /><br />";
											$totalFundsUsed1=$totalFundsUsed1 + getDayDiff($resultX['re_startListingDate'], date('Y-m-d H:i:s'))  * BILLING::getBillingEntry($resultX['billingId']);
										}
									}
							  }
							  
							  
							  
							  $activityDetailsSQL=ADVERTISEMENT::getMyAdvertActivityDetails();
							  if($activityDetailsSQL)
							  {
							  		while($resultX = $mysql->fetch_assoc_mine($activityDetailsSQL))
									{
										echo "<strong>Advert:<br /></strong><span class='texttype10'>".$resultX['name']."</span><br />Ran From <i>";
										if($resultX['pauseListingDate']!='0000-00-00 00:00:00')
										{
											echo getDateInWords(substr($resultX['re_startListingDate'], 0, (strlen($resultX['re_startListingDate']) - 8)))." to ".getDateInWords(substr($resultX['pauseListingDate'], 0, (strlen($resultX['pauseListingDate']) - 8)))."</i> = ".getDayDiff($resultX['re_startListingDate'], $resultX['pauseListingDate'])." day(s) <br />Funds Used: <strong>".getDayDiff($resultX['re_startListingDate'], $resultX['pauseListingDate']) * BILLING::getBillingEntry($resultX['billingId'])." Naira</strong><br /><br />";
											$totalFundsUsed1=$totalFundsUsed1 + getDayDiff($resultX['re_startListingDate'], $resultX['pauseListingDate']) * BILLING::getBillingEntry($resultX['billingId']);
										}
										else
										{
											echo getDateInWords(substr($resultX['re_startListingDate'], 0, (strlen($resultX['re_startListingDate']) - 8)))." to today </i> = ".getDayDiff($resultX['re_startListingDate'], date('Y-m-d H:i:s'))." day(s) <br />Funds Used: <strong>".getDayDiff($resultX['re_startListingDate'], date('Y-m-d H:i:s'))  * BILLING::getBillingEntry($resultX['billingId'])." Naira</strong><br /><br />";
											$totalFundsUsed1=$totalFundsUsed1 + getDayDiff($resultX['re_startListingDate'], date('Y-m-d H:i:s'))  * BILLING::getBillingEntry($resultX['billingId']);											
										}
									}
							  }
							  
							  echo "<br /><br /><strong>Total Funds Used</strong> = ".$totalFundsUsed1;
							  ?>							  
							  </div></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                  <td valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="cellType14"><span class="headerTitle">Listing Pricing Details </span><br />
                        <br />
                        <table width="95%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td valign="top" class="cellType13 cellType16">
							<?Php
							$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_type` WHERE `status` = '1'";
							$sql= $mysql->query($str);
							//$result = $mysql->fetch_assoc_mine($sql);
								
							if($mysql->num_rows > 0)
							{
								while($result = $mysql->fetch_assoc_mine($sql))
								{
									$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE `status` = '1' AND `billingTypeId` = '".$result['id']."' ORDER BY id DESC LIMIT 0, 1";
									$sql1= $mysql->query($str1);
									if($mysql->num_rows > 0)
									{
										$result1 = $mysql->fetch_assoc_mine($sql1);
										echo "<br /><strong>".$result['name'].":</strong><br /> ".$result1['amountPerDay']." Naira starting from ".$result1['dateEffected']."<br />";
									}
								}
							}
							
							?>
							</td>
                          </tr>
                        </table>
                        <br />
                        <br />
                        <span class="headerTitle">Complaints?</span><br />
                        <br />
                        <table width="95%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top" class="cellType16 cellType13"><br />
                              Subject:<br />
                              <input name="subject" type="text" id="subject" value="<?php echo $_COOKIE['subject'];?>"/>
                              <br />
                              <br />
                              Complaint:<br />
                              <textarea name="complaint" id="complaint"><?php echo $_COOKIE['complaint'];?></textarea>
                              &nbsp;&nbsp;
                              <input name="Complaint" type="submit" id="Complaint" value="Send" /></td>
                          </tr>
                        </table>
                        <br /></td>
                    </tr>
                  </table>                    
                    <br />
                    <br /></td>
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
