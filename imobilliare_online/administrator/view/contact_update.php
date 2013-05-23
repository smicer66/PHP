<?php
ob_start();

$features=new Feature();
$url='Location: ../administrator/index.php';
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
$userDet=$user->getUserDetails($_SESSION['uid']);

//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");


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
    <td colspan="2" class="cellType5"><table width="671" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="77"><a href="http://www.<?php echo $_SERVER['HTTP_HOST'];?>"><img src="../../../images/azaiahLogo.png" border="0" align="absmiddle" /></a></td>
        <td width="574"><span>Portal Manager</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="66%" class="cellType6">Church: <?php //include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."core/site/site_class.php");
	$site=new Site();$siteDet=$site->getDetails();echo $siteDet['churchName'];?> </td>
    <td width="34%" align="right" class="cellType6"><span class="texttype1"><?php if(isset($_SESSION['uid'])){ ?>Logged in as <?php echo $_SESSION['actnpals'];}?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <?php if(isset($_SESSION['uid'])){ ?><a href="../../../features/user/login/login.php?logout=1">Logout</a> <?php } else { ?> <a href="../../../administrator/index.php">Login</a>}<?php } ?>&nbsp;&nbsp;&nbsp;<a href='<?php echo getDomain($_SERVER['REQUEST_URI']);?>/administrator/'>Admin Home</a>&nbsp;</td>
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
		  ?>
          <tr>
            <td class="cellType1"><?php $siteIn=new Site(); if($siteIn->siteOnline){?>
                <a href="../install/installer.php">
                <?php }?>
                  Install
                  <?php if($siteIn->siteOnline){ ?>
                </a>
                <?php }?>
              &nbsp;/&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('portal_updater'); ?>">Updates</a></td>
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
                  <td class="cellType11"><img src="../../../images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('contact_update'); ?>">Contact Updater </a></td>
                </tr>
                <tr>
                  <td class="cellType11"><img src="../../../images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('contact_creator'); ?>">Contact Creator </a></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Contact Update </span></td>
          </tr>
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType7"> <?php
			  $error->displayComponent($_REQUEST['errcpj'], $_SERVER['HTTP_REFERER'], 3);
			  ?><form action="<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
				echo $_SERVER['PHP_SELF'];
			}
			 ?>" method="post" enctype="multipart/form-data">
              <div class='scrollYes'>
			  <table width="100%" border="0" cellspacing="2" cellpadding="5">
                
                <tr>
                  <td valign="top" class="cellType2">Contact Information<br />
                    <span class="texttype2">[Click to Update Contact Contents]</span></td>
				  <td width='20%' valign="top" class="cellType2">Display On Frontpage<br />
				    (Yes)?</td>
				  <td width='10%' valign="top" class="cellType2">Active<br />
				    (Yes)?</td>
                  </tr>
                <?php
		
			
			if(isSuperAdmin($_SESSION['uid']))
			{
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact`";
			}
			else
			{
				$userDet=$user->getUserDetails($_SESSION['uid']);
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact`";
			}
			
			
			$sql= $mysql->query($str);
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				 $checked='';$checked1=''; 
				
				if($result['frontPageYes']==1)
				{
					$checked='checked';
				}
				if($result['status']==1)
				{
					$checked1='checked';
				}
				
					
					echo "<tr>
				  <td valign='top' class='cellType11'>
				  <a href='".$_SERVER['PHP_SELF']."?delContactId=".$result['uniqueId']."'><img src='../images/delete.png' height=15px border=0 align='absmiddle' title='delete' /></a>&nbsp;&nbsp;
				  <a href='?fid=".ADMINISTRATOR::getAdminFunctionId('contact_creator')."&mod=1&id=".$result['id']."'>".truncateText(strip_tags(($result['information'])), 20);
				  echo "</a></td>
				  <td valign='top' class='cellType7'><input name='frontPageYes".$result['id']."' type='checkbox' value='1' ".$checked."/></td>";
				 
				 echo "
				 <td valign='top' class='cellType7'><input name='status".$result['id']."' type='checkbox' value='1' ".$checked1."/></td>";
				  
				  echo "</tr>";
				
			}
			
		
		?>
              </table>
			 
              <table width="100%" border="0" cellspacing="2" cellpadding="5">
                <tr>
                  <td colspan='3' valign="top" class="cellType11"><input name="EditContact" type="submit" id="Edit" value="Update" /></td>
                    </tr>  
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
</table>
<br />
<div class="footer">
  <div align="left"><?php //include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/footer/footer_class.php");
	$fot=new Footer();echo $fot->displayComponent(NULL);?></div>
</div>
</body>
</html>
