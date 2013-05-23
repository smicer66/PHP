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


$menu=new Menu();


if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
{
	$menuDet=$menu->getMenuItemDetails($_REQUEST['id']);
}
else
{
	$menuDet=null;
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
<script  src="../scripts/error.js" type="text/javascript"></script>
<script src="../includes/error.js" type="text/javascript"></script>

</head>

<body onLoad="setFocus()">
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
                    <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('menu_creator'); ?>">Menu Creator </a></td>
                  </tr>
                  <tr>
                    <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('menu_items_inserter'); ?>">Menu Item Insert </a></td>
                  </tr>
                  <tr>
                    <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('menu_updater'); ?>">Menu Updater </a></td>
                  </tr>
                  <tr>
                    <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('menu_mapper'); ?>">Menu Mapper </a></td>
                  </tr>
                  <tr>
                    <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('menu_mapper_edit'); ?>">View Menu Mapping </a></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Component Manager - Menu Item Insert </span></td>
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
			 ?>" method="post" enctype="multipart/form-data">
                      <table width="100%" border="0" cellspacing="5" cellpadding="5">
                        <tr>
                          <td width="28%" class="cellType11">Menu Item: </td>
                          <td width="84%" class="cellType10"><input name="menuItemName" type="text" id="menuItemName" <?php echo "value='".getRealDataNoHTML($menuDet['title'])."'";?>/></td>
                        </tr>
                        <tr>
                          <td class="cellType11">Belongs To Menu Name: </td>
                          <td class="cellType10"><select name="menuName" id="menuName" onchange='validate(this.value, this.id)'>
                              <?php
	  echo append_option_menu_name(getRealDataNoHTML($menuDet['menuId']));
	  
	  ?>
                          </select></td>
                        </tr>
                        <tr>
                          <td class="cellType11">Belongs To Menu Item: </td>
                          <td class="cellType10"><div id='logoStatus1'>
						  <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
				echo "<select name='parentMenu' id='parentMenu'>";
				$entryParentId=$menu->getMenuItemDetails($_REQUEST['id']);
				echo append_option_menu_items($menuDet['menuId'], $entryParentId['parentId']);
				echo "</select>";
		}			
					?>
					</div></td>
                        </tr>
                        <tr>
                          <td class="cellType11">Leads to feature : </td>
                          <td class="cellType10"><select name="featureName" id="featureName" onchange='validate(this.value, this.id)' >
                              <?php
	  echo append_option_featureListMenuOnly($menuDet['linkToFeatureId']);
	  
	  ?>
                            </select>
                              <div id='logoStatus'>
							  <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			$feat=new Feature();
			$featDet=$feat->getDetails($menuDet['linkToFeatureId']);
			if($featDet)
			{
				echo "<br />";
				
						
				if($featDet['name']=='Frontpage')
				{
				
				}
				else
				{
					echo "Select Specific Link:<br />";
					@include_once("../../../features/".strtolower($featDet['name'])."/".strtolower($featDet['name'])."_class.php");
				
					$tablename=strtolower(str_replace(" ", "_", $featDet['name']));
					$str=ucfirst(strtolower($tablename));
					$obj=new $str();	
					
					
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tablename."` WHERE (`status` = '1' OR `status` = 'Active')";
					//echo $strX;
					$sqlX= $mysql->query($strX);
					while($resultX = $mysql->fetch_assoc_mine($sqlX))
					{
							echo "<a href='javascript:;' onClick='javascript:window.open(\"../../../core/preview/preview.php?featureId=".$_POST['inputValue']."&linkToFeatureId=".$resultX['id']."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";
							$obj->previewLink($resultX['id'], $menuDet['linkToFeatureChildId'], 1);
							echo '<br /></a>';
					}
				}
			}
		}			
					?></div></td>
                        </tr>
                        
                        <tr>
                          <td class="cellType11">&nbsp;</td>
                          <td class="cellType10">
						  
						  <?php
        if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input name='UpdateMenuItems' type='submit' id='Create' value='Update' />";
		}
		else
		{
			echo "<input name='InsertMenuItems' type='submit' id='Insert' value='Insert' />";
		}          
					?>
                            </td>
                        </tr>
                      </table>
                    </form></td>
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
