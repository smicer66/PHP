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

$fpss=new FrontPageSlideShow();
//$display_devotional->setActiveValues();

if((isset($_REQUEST['delImageId'])) && (strlen($_REQUEST['delImageId'])>0))
{
	require_once("../../features/frontpageslideshow/controller/fpss.php");
}



if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
{
	$resultMOD = $fpss->getFPSSDetails($_REQUEST['id']);
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
<script type="text/javascript" src="../utilities/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<?php
include_once("../utilities/tinymce/direct_src.php");
?>
<!-- /TinyMCE -->


<?php $site=new Site(); $site->prepareSearchTags();?>

<script type="text/javascript">
// Browser Slide-Show script. With image cross fade effect for those browsers
// that support it.
// Script copyright (C) 2004-2008 www.cryer.co.uk.
// Script is free to use provided this copyright header is included.
var FadeDurationMS=1000;
var pauseFlag = false;
var firstDelay = false;
var timer;

function SetOpacity(object,opacityPct)
{
	// IE.
	object.style.filter = 'alpha(opacity=' + opacityPct + ')';
	// Old mozilla and firefox
	object.style.MozOpacity = opacityPct/100;
	// Everything else.
	object.style.opacity = opacityPct/100;
}
function ChangeOpacity(id,msDuration,msStart,fromO,toO)
{
	var element=document.getElementById(id);
	var msNow = (new Date()).getTime();
	var opacity = fromO + (toO - fromO) * (msNow - msStart) / msDuration;
	if (opacity>=100)
	{
		SetOpacity(element,100);
		element.timer = undefined;
	}
	else if (opacity<=0)
	{
		SetOpacity(element,0);
		element.timer = undefined;
	}
	else 
	{
		SetOpacity(element,opacity);
		element.timer = window.setTimeout("ChangeOpacity('" + id + "'," + msDuration + "," + msStart + "," + fromO + "," + toO + ")",10);
	}
}
function FadeInImage(foregroundID,newImage,backgroundID)
{
	var foreground=document.getElementById(foregroundID);
	if (foreground.timer) window.clearTimeout(foreground.timer);

	if (backgroundID)
	{
		var background=document.getElementById(backgroundID);
		if (background)
		{
			if (background.src)
			{
				foreground.src = background.src;	
				SetOpacity(foreground,100);
			}
			
			background.src = newImage;
			background.style.backgroundImage = 'url(' + newImage + ')';
			background.style.backgroundRepeat = 'no-repeat';
			var startMS = (new Date()).getTime();
			foreground.timer = window.setTimeout("ChangeOpacity('" + foregroundID + "'," + FadeDurationMS + "," + startMS + ",100,0)",10);
		}
	} else {
		foreground.src = newImage;
	}
}


var slideCache = new Array();

function RunSlideShow(pictureID,backgroundID,imageFiles,displaySecs)
{
	var imageSeparator = imageFiles.indexOf(";");
	var nextImage = imageFiles.substring(0,imageSeparator);
	FadeInImage(pictureID,nextImage,backgroundID);
	var futureImages = imageFiles.substring(imageSeparator+1,imageFiles.length)+ ';' + nextImage;
	timer=setTimeout("RunSlideShow('"+pictureID+"','"+backgroundID+"','"+futureImages+"',"+displaySecs+")",
		displaySecs*1000);
	// Cache the next image to improve performance.
	imageSeparator = futureImages.indexOf(";");
	nextImage = futureImages.substring(0,imageSeparator);
	if (slideCache[nextImage] == null)
	{
		slideCache[nextImage] = new Image;
		slideCache[nextImage].src = nextImage;
	}
}





function play(name, bg, pix, time)
{
	if(play)
	{
		RunSlideShow(name,bg,pix,time);
		return 1;
		
	}
	
}

function toggle(d, e, f)
{
	var o=document.getElementById(d);
	o.style.display=(o.style.display=='none')?'block':'none';
	o.title=(o.style.display=='none')?'Click to Maximize and Enter Details':'Click to Minimize';
	
	var o=document.getElementById(e);
	o.style.display=(o.style.display=='none');
	o.title=(o.style.display=='none')?'Click to Maximize and Enter Details':'Click to Minimize';
	
	var o=document.getElementById(f);
	o.style.display=(o.style.display=='none');
	o.title=(o.style.display=='none')?'Click to Maximize and Enter Details':'Click to Minimize';
}



function autoSlide() 
{
	if (!pauseFlag) 
	{
		timer = setTimeout('autoSlide()', speed_delay);
		if (!firstDelay) 
		firstDelay = true;
		else showNext();
	}
}

function clearSlide() 
{
	if (!pauseFlag) 
	{
		clearTimeout(timer);
		firstDelay = false;
		
	}
}

</script>

<SCRIPT language="JavaScript" type="text/javascript">
						
						function regenerate(){
						window.location.reload()
						}
						function regenerate2(){
						if (document.layers){
						setTimeout("window.onresize=regenerate",'100%')
						intializescroller()
						}
						}
						function intializescroller(){
						document.vscroller01.document.vscroller02.document.write(scrollercontents)
						document.vscroller01.document.vscroller02.document.close()
						thelength=document.vscroller01.document.vscroller02.document.height
						scrollit()
						}
						function scrollit(){
						if (document.vscroller01.document.vscroller02.top>=thelength*(-1)){
						document.vscroller01.document.vscroller02.top-=speed
						setTimeout("scrollit()",10)
						}
						else{
						document.vscroller01.document.vscroller02.top=scrollerheight
						scrollit()
						}
						}
 </SCRIPT>

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
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('fpss_creator'); ?>">FPSS Creator </a></td>
              </tr>
              <tr>
                <td class="cellType11"><img src="view/images/154.png" width="16" height="16" align="absmiddle" />&nbsp;<a href="<?php echo "?fid=".ADMINISTRATOR::getAdminFunctionId('frontpageslideshow_update'); ?>">FPSS Updater </a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td align="left" valign="bottom" bgcolor="#F8F8F8" class="cellType6"><span class="headers">Features Manager - SlideShow Creator </span></td>
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
			 ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <table width="100%" border="0" cellspacing="5" cellpadding="5">
                <tr>
                  <td width="28%" valign="top" class="cellType11">FPSS Name:</td>
                  <td class="cellType10"><?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input type='text' name='name' value='".getRealData($resultMOD['name'])."'/>";
		}
		else
		{
			echo "<input type='text' name='name' />";
		}
		?></td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11">Opacity:</td>
                  <td class="cellType10"><?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input type='text' name='opacity' value='".getRealData($resultMOD['opacity'])."'/>";
		}
		else
		{
			echo "<input type='text' name='opacity' value='0.63' />";
		}
		?></td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11">Picture Interchange Timing:</td>
                  <td class="cellType10"><?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input type='text' name='timing' value='".getRealData($resultMOD['timing'])."'/>";
		}
		else
		{
			echo "<input type='text' name='timing' value='5' />";
		}
		?></td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11">Style:</td>
                  <td class="cellType10"><select name="style" id="style">
                      <?php
	echo append_option_fpss_style($resultMOD['style']);
	?>
                    </select>                  </td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11">Display on FrontPage? </td>
                  <td class="cellType10">
				  <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			if($resultMOD['frontPageYes']==1)
			{
				$checked="checked='checked'";
			}
			echo "<input name='fpYes' type='radio' value='1' ".$checked." />";
			$checked='';
		}
		else
		{
			echo "<input name='fpYes' type='radio' value='1' checked='checked' />";
		}
		?>
                    &nbsp;Yes&nbsp;&nbsp;
        <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			if($resultMOD['frontPageYes']==0)
			{
				$checked="checked='checked'";
			}
			echo "<input name='fpYes' type='radio' value='0' ".$checked." />";
			$checked='';
		}
		else
		{
			echo "<input name='fpYes' type='radio' value='0' />";
		}
		?>&nbsp;No		</td>
                </tr>
                <tr>
                  <td class="cellType11">Slide Title:		</td>
                  <td class="cellType10"><?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input type='text' name='slideTitle' value='".getRealData($resultMOD['slideText'])."'/>";
		}
		else
		{
			echo "<input type='text' name='slideTitle' />";
		}
		?></td>
                </tr>
                <tr>
                  <td valign="top" class="cellType11">FPSS Pictures:
		<?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
                    echo "<br />Click To Add Picture: <input name='addImage' type='checkbox' onChange='validate(this.value, this.id)' id='addImage' value='1' />
					<div id='logoStatus4'>&nbsp;</div>";
		}
		?>			</td>
                  <td class="cellType10">
				  <?php
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_slideshow_images` WHERE `slideShowId` = '".$_REQUEST['id']."'";
			$sqlX= $mysql->query($str);
			echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
			if($mysql->num_rows >0)
			{
				while($result = $mysql->fetch_assoc_mine($sqlX))
				{
					if($result['backgroundYes']==1)
					{
						$checked="checked='checked'";
					}
					echo "<tr>
					  <td valign='top' class='cellType10'><img src='../features/frontpageslideshow/view/images/".getPictureFileName($result['fileId'], 1)."' height='70px' style='border:#999999 1px solid;  padding: 1px;' ></td>
					  <td align='left' width='45%'>&nbsp;&nbsp;&nbsp;&nbsp;Set As Background:&nbsp;<input name='bgYes".$result['id']."' type='checkbox' value='1' $checked /></td>
					  <td align='left' width='50%'><a href='".$_SERVER['PHP_SELF']."?delImageId=".$result['uniqueId']."'><img src='../../../images/delete.png' height=30px border=0 /></a></td>
					</tr>";
					$checked="";
					
				}
			}
			else
			{
				echo "<tr>
					  <td valign='top' class='cellType10' colspan='3'>No Images Uploaded Yet!</td>
					</tr>";
			}
			echo "</table>";
		}
		else
		{
			for($count=1;$count<21;$count++)
			{
				echo "<input type='file' name='userfile".$count."' />
				&nbsp;&nbsp;&nbsp;&nbsp;Set As Background:
				<input name='bgYes".$count."' type='checkbox' value='1'/>
				<br />";
			}
		}
		?>                  </td>
                </tr>
				
                <tr>
                  <td class="cellType11"></td>
                  <td class="cellType10">&nbsp;<?php
        if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{
			echo "<input name='UpdateFP' type='submit' id='Update' value='Update' />";
		}
		else
		{
			echo "<input name='CreateFP' type='submit' id='Create' value='Create' />";
		}          
					?></td>
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
