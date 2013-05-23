<?Php
if(isset($_REQUEST['search_start']))//start of project listing
{
	$start=$_REQUEST['search_start'];
}
else
{
	$start=0;
}

$end=MAX_SPECIAL_LISTINGS;


$userListSQL=USER::getUserList($start, $end,NULL);
$array=array();
global $mysql;
while($result_spec=$mysql->fetch_assoc_mine($userListSQL))
{
	if($result_spec['userTypeId']==USERTYPE::getUserTypeId('Developer'))
	{
		array_push($array, $result_spec);
	}
}

$faqArticle=ARTICLES::getArticleDetails('FAQs');
$userProjArray=PROJECT::getListByUserType($_SESSION['uid']);
//print_r($userProjArray);
?>

<form action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
			}
			 ?>' method='POST'>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="63%" valign="top">
	
	
	
		<table width="90%" border="0" align="left" cellpadding="0" cellspacing="0">
  	<?php
  echo PORTLET::displayHeader("Developers on Imobilliare", "<a href='?fid=".FEATURE::getid('User')."&members=emp'>Rate Employers</a>");
	?>
</table>
	  <table width='90%' border='0' align="left" cellspacing='0' cellpadding='0' class='onlyBorderAlone defaultBgColor'>
	
	<?php
	for($count=0;$count<(sizeof($array));$count++)
	{
			if((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer')))
			{
				if((in_array($array[$count]['id'], $userProjArray)))
				{
					$disabled='';
				}
				else
				{
					$disabled='disabled';
				}
			}
			else if((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator')))
			{
				$disabled='';
			}
			else
			{
				$disabled='disabled';
			}
	?>
		<tr><td valign='middle' class='style72 tdstyle13'>
		
		<input name='RATING' type='radio' class='formradio' value='<?php echo $array[$count]['id'];?>' <?php echo $disabled;?>>
		&nbsp;&nbsp;<a href='?fid=<?php echo FEATURE::getId('User');?>&vacct=1&fiid=<?php echo $array[$count]['id'];?>&us=<?php echo $array[$count]['userTypeId'];?>'><?php echo $array[$count]['username'];?></a>
		</td></tr>
	<?php	
	}
	?>
		</table>
<br>
<br>
</td>
    <td width="37%" valign="top">
	
		
		<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
			<?php
		  echo PORTLET::displayHeader("Ratings", "");
			?>
		</table><br>
			<table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" class="onlyBorderAlone defaultBgColor">
			<tr>
			<td height="269" valign="top" bgcolor="#FFFCEC">
			
			
			<strong>Select Project for Rating</strong><br />
			<select name="project" class="formlisttype1">
			<?php
			echo appendMyProjectsHandling(NULL, NULL, $_SESSION['uid'], 'id', 'ASC', NULL);
			?>
			</select><br /><br />

			<strong>Rating is out of 10</strong> <br>
			Rating Score: 
			<select name="ratings" class="formlisttype1">
			<option value="-">-</option>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			</select>
			<br>
			<br>
			Add Review [Optional]: <br>
			<textarea name="review" class="formtextarea3"></textarea>
			<br>
			<br>
			<?php
			if((!isset($_SESSION['uid'])) || (USER::getUserTypeId($_SESSION['uid'])!=USERTYPE::getUserTypeId('Employer')))
			{
				$disabled="disabled='disabled'";
			}
			else
			{
				$disabled="";
			}
			?>
			<input name="DEVELOPER" type="submit" class="button11" value="Rate" <?php echo $disabled;?>>
			
			<br>
			<br>
			<div align="right">
			<a href="?fid=<?php echo FEATURE::getid('User')."&members=emp";?>">Rate Employers</a><br />
			<!--<a href="?fid=<?php echo FEATURE::getid('Articles')."&fiid=".$faqArticle['id'];?>">About Our Rating System </a>--></div></td>
			</tr>
		  </table><br>


	
	</td>
  </tr>
</table>

</form>
