<?php
		include_once("../../lib/lib.php");
		include_once("../../includes/mysqli.php");
		include_once("../../includes/db.php");
		include_once("../../includes/session.inc");	
		include_once("../../core/error/error_class.php");

		include_once("../../utilities/util.php");		
		include_once("../../lib/lib_errors.php");		
		include_once("../../lib/lib_special.php");
		include_once("../../lib/lib_util.php");				

		include_once("../../features/model/features_class.php");
		include_once("../../features/user/model/user_class.php");
		include_once("../../features/user/Employer/model/employer_class.php");
		include_once("../../features/user/developer/model/developer_class.php");
		include_once("../../features/frontpageslideshow/model/frontpageslideshow_class.php");
		include_once("../../features/search/model/search_class.php");
		include_once("../../features/user/model/user_class.php");
		include_once("../../features/user/model/toolbox/model/toolbox_class.php");
		include_once("../../features/user/model/problems/model/problems_class.php");
		include_once("../../features/user/model/register/model/register_class.php");
		include_once("../../features/project/model/project_class.php");
		
		
		include_once("../../core/preview/model/preview_class.php");
		
		$propDetails=PROJECT::getProjectDetails($_REQUEST['propId']);
		$userDetails=USER::getUserDetails($propDetails['authorUserId']);



$propFileIdSQL=PROJECT::getProjectFilesByType($_REQUEST['propId'], $_REQUEST['ftype']);
$array_ids=array();
while($resultX = $mysql->fetch_assoc_mine($propFileIdSQL))
{
	array_push($array_ids,$resultX['fileId']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="view/css/preview.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="2" cellpadding="5">
  <tr>
    <td class='listingCells'><label>Title:</label> <?php echo $propDetails['title']; ?></td>
  </tr>
  <tr>
    <td class="objectivePreviewTable">
	<?php
	if(fileFormat(getPictureFileName($_REQUEST['fiid']))=='Image')
	{
		echo "<img src='../../features/project/view/images/".getPictureFileName($_REQUEST['fiid'])."' alt='Image' class='fullImage' border='0' title='".$propDet['title']."'/>";
	}
	else if(fileFormat(getPictureFileName($_REQUEST['fiid']))=='pdf')
	{
		echo "<img src='../../images/adobe_pdf_icon.png' alt='Image' class='fullImage' border='0' title='".$propDet['title']."'/>";
	}
	else if(fileFormat(getPictureFileName($_REQUEST['fiid']))=='Video')
	{
		echo "<OBJECT ID='MediaPlayer' WIDTH='260' HEIGHT='280' CLASSID='CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95'
		STANDBY='Loading Windows Media Player components...' TYPE='application/x-oleobject'>
		<PARAM NAME='FileName' VALUE='../../features/project/view/images/".getPictureFileName($_REQUEST['fiid'])."'>
		<PARAM name='ShowControls' VALUE='true'>
		<param name='ShowStatusBar' value='false'>
		<PARAM name='ShowDisplay' VALUE='false'>
		<PARAM name='autostart' VALUE='false'>
		<EMBED TYPE='application/x-mplayer2' SRC='../../features/project/view/images/".getPictureFileName($_REQUEST['fiid'])."' NAME='MediaPlayer'
		WIDTH='260' HEIGHT='280' ShowControls='1' ShowStatusBar='0' ShowDisplay='0' autostart='0'> </EMBED>
		</OBJECT>";
	}
	else if(fileFormat(getPictureFileName($_REQUEST['fiid']))=='Audio')
	{
		echo "<script language='JavaScript' src='scripts/audio-player.js'></script>
		<object type='application/x-shockwave-flash' data='features/project/images/player.swf' id='audioplayer1' height='24' width='290'>
		<param name='movie' value='features/media/player.swf'>
		<param name='FlashVars' value='playerID=audioplayer1&soundFile=../../features/project/view/images/".getPictureFileName($_REQUEST['fiid'])."'>
		<param name='quality' value='high'>
		<param name='menu' value='false'>
		<param name='wmode' value='transparent'>
		</object>";
	}
	
	?></td>
  </tr>
  <tr>
    <td class="textBodyStyle1">
      <label>Courtesy of:</label> <?php echo $userDetails['agencyName']; ?>
    </td>
  </tr>
  <tr>
    <td class="textBodyStyle1" align="right">
		<?php
		echo PREVIEW::paginateResults($array_ids, 1, 'PROJECT');
		?>
    </td>
  </tr>
</table>
</body>
</html>
