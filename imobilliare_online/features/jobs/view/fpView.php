<?php
$site=new Site();
$siteDet=$site->getDetails();
$idArray=array();
$idArray=JOBS::getAdverts(1);
$width=floor(100/$siteDet['advert_no']);

if(strtoupper(strtolower($style))=='HORIZONTAL')
{
?>
	<hr><table width="100%" border="0" cellpadding="0" cellspacing="5">  
<?php	
	echo "<tr>";
	for($count=0;$count<$siteDet['advert_no'];$count++)
	{
		if($count!=($siteDet['advert_no'] - 1))
		{
			$width1=" width='".$width."%'";
		}
		else
		{
			$width1="";
		}
		if(is_numeric($idArray[$count])==1)
		{
			echo "<td".$width1." class='advertCells' valign='top'>".adjustImageUrlToViewLife(JOBS::getAdvert($idArray[$count]))."</td>";
		}
		else
		{
			echo "<td".$width1." class='advertCells' valign='top'>".adjustImageUrlToViewLife(JOBS::getDefaultAdvert())."</td>";
		}
	}
	echo "</tr></table>";
}
else
{
	?>
	<table width="100%" border="1" cellpadding="0" cellspacing="5" class="advertTable_right">  
	<?php
	for($count=0;$count<$siteDet['advert_no'];$count++)
	{
		if($count!=($siteDet['advert_no'] - 1))
		{
			$width1=" width='".$width."'%";
		}
		else
		{
			$width1="";
		}
		echo "<tr>";
		echo "<td".$width1." class='advertsTable'>".getAdvert($idArray[$count])."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>