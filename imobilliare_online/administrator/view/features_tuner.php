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


$feature=new Feature();

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
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<?php $siteIn=new Site(); if($siteIn->siteOnline){?><a href="../install/installer.php"><?php }?>Install<?php $siteIn=new Site(); if($siteIn->siteOnline){?></a><?php }?>&nbsp;/&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('portal_updater'); ?>">Updates</a></td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('features_manager'); ?>">Features Manager </a></td>
          </tr>
          <tr>
            <td class="cellType1"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('components_manager'); ?>">Components Manager </a></td>
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
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - Features Tuner </span></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" bgcolor="#F8F8F8" class="cellType7"><?php
			  $error=new Error();


					$error->displayComponent($_REQUEST['errcpj'], null, 1);
			  ?><form action="<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
				echo $_SERVER['PHP_SELF'];
			}
			 ?>" method="post">
              <table width="100%" border="0" cellspacing="2" cellpadding="5">
                <tr>
                  <td width="15%" class="cellType2">FEATURES</td>
                  <td width="13%" class="cellType2">Display on FrontPage</td>
                  <td width="16%" class="cellType2">Full Feature Display Position</td>
                  <td width="13%" class="cellType2">FrontPage Position</td>
                  <!--<td width="10%" class="cellType2">Access <br />
                    Level </td>
                  <td width="10%" class="cellType2">Display Menus</td>-->
                  <!--<td width="10%"><p>FrontPage<br />
        Hierarchial Level </p></td>-->
                  <td width="16%" class="cellType2">Template Applicable </td>
                  <td width="9%" class="cellType2">Status</td>
                </tr>
                <?php
$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features`";
$sql= $mysql->query($str);
//$sql= mysql_result($sql, 1);
//echo $sql;
$count=0;
while($result = $mysql->fetch_assoc_mine($sql))
{
	$rmd=$count % 2;
	if($rmd==0)
	{
		$bgcolor="#cccccc";
	}
	else
	{
		$bgcolor="#ffffff";
	}
  echo "<tr>
    <td valign='top' class='cellType11'>".$result['name']."</td>
    <td valign='top' class='cellType11'><select name='frontPage".$result['id']."'>";echo append_option($result['frontPageYes']);
	echo "
    </select>
    </td>
	<td valign='top' class='cellType11'><select name='fullDisplay".$result['id']."'>";echo append_option_menu_position($result['position']);
	echo "
    </select>
    </td>
    <td valign='top' class='cellType11'><select name='position".$result['id']."'>";echo append_option_menu_position($result['fpPosition']);
	echo "	
    </select></td>";
   // <td valign='top' class='cellType11'><select name='accessLevel".$result['id']."'>";echo append_option_accessLevel($result['lowestAccessLevel']);
   //echo "</select></td>"
	//echo "
	//<td valign='top' class='cellType11'><select name='displayMenus".$result['id']."[]' multiple='1' size='2'>";echo append_option_menu_name($result['menuIds']);
	//echo "    
	//</select></td>";
    /*<td><select name='positionalLevel".$result['id']."'>";echo append_option_hierarchialPositionalLevel($result['fpPositionalLevel']);
	echo "    
	</select></td>*/
   
	echo "<td valign='top' class='cellType11'><select name='mainViewTemplateId".$result['id']."'>";echo append_template_option($result['mainViewTemplateId']);
	echo "
    </select></td>
    <td valign='top' class='cellType11'><select name='status".$result['id']."'>";echo append_option_status($result['status']);
	echo "
    </select></td>
  </tr>";
  $count++;
}
?>
              </table>
              <table width="100%" border="0" cellpadding="5" cellspacing="5" class="cellType11">
                <tr>
                  <td colspan='6' align="right" class="cellType11">&nbsp;
                      <input name="Submit" type="submit" value="Submit" />
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



