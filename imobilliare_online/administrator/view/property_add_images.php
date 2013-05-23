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
$administrator->grantAccess(($_REQUEST['fid']) ,$url);

$error=new Error();
$user=new User();


if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
{
	$resultMOD = PROPERTY::getPropertyDetails($_REQUEST['id']);
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
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_creator'); ?>">Property Creator</a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_listing'); ?>">Property Listings</a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_add_images'); ?>&mod=1">Add Images/Files To Property</a></td>
              </tr>
			  
			  
		  <?php
		  	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
			{
		  ?>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_type_creator'); ?>">Create Property Types</a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_type_updater'); ?>">Edit Property Types</a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_category_creator'); ?>">Create Property Type Category</a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_category_updater'); ?>">Edit Property Type Category</a><a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('property_listing'); ?>"></a></td>
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
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Add Files About The Property </span><?php 
			if(!isset($_REQUEST['mod']))
			{ 
				echo "<span class='welcomeUserText'>(Step 2)</span>";
			} 
			?>
			<br />
			<br />
<span class="warningText">[Such files are restricted to images, videos (wmv format), audio recordings, pdf docs. Maximum size of files should not exceed <?php echo MAX_FILE_SIZE/1000000; ?>MB]</span></td>
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
                  <td width="28%" valign='top' class="cellType11">Select Listing To Add Files to:</td>
                  <td valign='top' class="cellType10"><select name="agent_listings" id="agent_listings" >
                    <?php 
					if(isset($_REQUEST['mod']))
					{
						echo append_agent_listings($value); 
					}
					else
					{
						echo append_agent_listings($value, 'Not Started'); 
					}
					?>
                  </select>                  </td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 1:</td>
                  <td valign='top' class="cellType10"><input name='userfile1' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 2:</td>
                  <td valign='top' class="cellType10"><input name='userfile2' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 3:</td>
                  <td valign='top' class="cellType10"><input name='userfile3' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 4:</td>
                  <td valign='top' class="cellType10"><input name='userfile4' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 5:</td>
                  <td valign='top' class="cellType10"><input name='userfile5' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 6:</td>
                  <td valign='top' class="cellType10"><input name='userfile6' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 7:</td>
                  <td valign='top' class="cellType10"><input name='userfile7' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 8:</td>
                  <td valign='top' class="cellType10"><input name='userfile8' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 9:</td>
                  <td valign='top' class="cellType10"><input name='userfile9' type='file' /></td>
                </tr>
                <tr>
                  <td valign='top' class="cellType11">Add File 10:</td>
                  <td valign='top' class="cellType10"><input name='userfile10' type='file' /></td>
                </tr>
                
                <tr>
                  <td valign='top' class="cellType11">&nbsp;</td>
                  <td valign='top' class="cellType10">
				  <?php
        if((isset($_REQUEST['mod'])))
		{
			echo "<input name='Property_Add_Images' type='submit' id='Update' value='Add Files' />";
		}
		else
		{
			echo "<input name='Property_Add_Images' type='submit' id='Create' value='Add Files' />";
		}          
					?>					&nbsp;&nbsp;
				  <?php
        if((isset($_REQUEST['mod'])))
		{
			
		}
		else
		{
			echo "<input name='Property_Add_Images' type='submit' id='Create' value='Back' />";
		}          
					?>
				  &nbsp;&nbsp;
				  <?php
        if((isset($_REQUEST['mod'])))
		{

		}
		else
		{
			echo "<input name='Property_Add_Images' type='submit' id='Create' value='Next' />";
		}          
					?></td>
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
