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


if(isSuperAdmin($_SESSION['uid']))
{
	$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` ORDER BY `id` DESC";
}
else
{
	$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` WHERE `sourceUserId` = '".$_SESSION['uid']."' ORDER BY `id` DESC";
}

$sqlY= $mysql->query($strY);
$totalNoResults=$mysql->num_rows;

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
        <td width="313"><a href="<?php echo $_SERVER['HTTP_HOST'];?>"><img src="../images/houselogo.png" width="72" height="64" border="0" align="left" /></a><img src="../images/houselogoname.png" width="220" height="64" /></td>
        <td align="right"><span>Portal Manager</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="66%" class="cellType6">Client: <?php //include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."core/site/site_class.php");
	$site=new Site();$siteDet=$site->getDetails();echo $siteDet['clientName'];?> </td>
    <td width="47%" align="right" class="cellType6"><span class="texttype1"><?php if(isset($_SESSION['uid'])){ ?>Logged in as <?php echo $_SESSION['actnpals'];}?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <?php if(isset($_SESSION['uid'])){ ?><a href="../index.php?logout=1">Logout</a> <?php } else { ?> <a href="../index.php">Login</a>}<?php } ?>&nbsp;&nbsp;&nbsp;<a href='<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('home'); ?>'>Portal Grid Home</a>&nbsp;</td>
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
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Funds Listing </span></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7">
              <table width='100%' border='0' cellspacing='5' cellpadding='5'>
                
                
                
                <tr>
                  <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><?php
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
                        <div class='scrollYes'>
                          <table width="100%" border="0" cellspacing="2" cellpadding="5">
                            <tr>
                              <td width="23%" valign="top" class="cellType2">Funds Payed In By  <span class="texttype2"></span></td>
                              <td width="20%" valign="top" class="cellType2">Pay-In Teller No. </td>
                              <td width="16%" valign="top" class="cellType2">Bank</td>
                              <td width="16%" valign="top" class="cellType2">Receiving Agency</td>
                              <td width="15%" valign="top" class="cellType2">Amount</td>
                              <td width='5%' valign="top" class="cellType2">Status</td>
                              <td width='5%' valign="top" class="cellType2">Approved</td>
                            </tr>
                            <?php
				
			$sql=BILLING::getFundsListing($_REQUEST['search_start']);
			if($sql)
			{
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					$bankDet=getBankDetails($result['bankId']);
					$srcDet=USER::getUserDetails($result['sourceUserId']);
					$recDet=USER::getUserDetails($result['receivingUserId']);
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
				  <td valign='top' class='cellType11'><a href='../index.php?fid=".FEATURE::getId('User')."&fiid=".$result['sourceUserId']."&vacct=1&us=".USERTYPE::getUserTypeId('Agent')."'>".$srcDet['agencyName']."</a> - <br />".$date[0]."</td>
				  <td valign='top' class='cellType11'>".getRealData($result['payInTellerNo'])."</td>
				  <td valign='top' class='cellType11'>".strtoupper($bankDet['name'])."</td>
				  <td valign='top' class='cellType11'>".$recDet['agencyName']."</td>
				  <td valign='top' class='cellType11'>".getRealData($result['amount'])."</td>
				  <td valign='top' class='cellType7'><input name='status".$result['id']."' type='checkbox' value='1' ".$checked4." ".$disabled."/></td>
				  <td valign='top' class='cellType7'><input name='approve".$result['id']."' type='checkbox' value='1' ".$checked5." ".$disabled."/></td>";
					  
					  echo "</tr>";
				}
			}
			else
			{
				echo "<tr>
				  <td colspan='7' class='cellType11'/><div align='center'>None Available</div></td>";
					  echo "</tr>";
			}
		
		?>
                          </table>
                          <table width="100%" border="0" cellspacing="2" cellpadding="5">
                            <tr>
                              <td colspan='6' valign="top" class="cellType11">
							  <?php ADMINISTRATOR::paginateResults($totalNoResults,$siteDet['adminResultsDisplayNumber']);?></td>
                            </tr>
                            <tr>
                              <td colspan='6' valign="top" class="cellType11">
							  <?php
							if(isSuperAdmin($_SESSION['uid']))
							{
							?>
							  <input name="Funds_Listings" type="submit" id="Edit1" value="Update" />
							  <?php
							}
							?>
							  </td>
                            </tr>
                          </table>
                        </div>
                      </form></td>
                </tr>
              </table>
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
