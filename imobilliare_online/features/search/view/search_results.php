<?Php $siteDet=SITE::getDetails();
global $mysql;
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
			echo PORTLET::displayHeader("Search", "");
			?>
  </table>	
  
  <table width='100%' border='0' cellspacing='0' cellpadding='5' class="onlyBorderAlone defaultBgColor">
		  <tr>
			<td>
		<form id='form1' name='form1' method='post' action='<?php
$loginAddy='index.php';
if(strlen($_SERVER['QUERY_STRING'])>0)
{
	$loginAddy=$loginAddy."?".$_SERVER['QUERY_STRING'];

}
echo $loginAddy;
?>'>
<table width="100%" border="0" cellspacing="0" cellpadding="10" class="objectivePreviewTable">
  <tr >
    <!--<td width="23%" align="center" valign="bottom">
	<span class='textBodyStyle2'>Project Type</span><br />
		<select name="project_type" id="project_type" onChange='validateFromHome(this.value, this.id)' ><?php echo append_project_type($_SESSION['SEARCHTYPE']); ?></select>	</td>
    <td width="4%" align="center" valign="bottom"><br />
	<div id='logoStatus'>
	  <?php
	  if(isset($_SESSION['SEARCHTYPE']))
	  {
			echo "<span class='textBodyStyle2'>Project Specifics</span><br /><select id='project_specifics' name='project_specifics' class='formtextboxtype2'>
			<option value='NULL'>--Select One--</option>";
			
			$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_category` WHERE `status` = '1' AND `projectTypeId` = '".$_SESSION['SEARCHTYPE']."'";
			$sqlX= $mysql->query($strX);
			while($resultX = $mysql->fetch_assoc_mine($sqlX))
			{
				if($resultX['id']==$_SESSION['SEARCHSPECIFICS'])
				{
					$selected='selected';
				}
				echo "<option value='".$resultX['id']."' $selected>".$resultX['name']."</option>";
				$selected='';
			}
			
			echo "</select>";
	  }	
		?></div></td>
    <td width="32%" align="center" valign="bottom">
	<span class='textBodyStyle2'>Location</span><br />
	<select name="location" id="location" >
	  <?php echo append_option_locations($_SESSION['SEARCHLOCATION']); ?>
	  </select>
	</td>width="27%" -->
    <td align="left" valign="bottom"> <span class="textBodyStyle5">Enter Search String</span>
      <input type='text' name='searchText' value='<?php echo $_SESSION['SEARCHSTRING1'];?>' class="textFieldStyle1" />&nbsp;<input type='submit' name='SEARCH' value='Search' class='button' /></td>
  </tr>
</table>
</form>




		</td>
		  </tr>
		  
		  <?php
		 // echo sizeof($_SESSION['searchResults']);
		  //($resultArray!=NULL) || 
		if(((isset($_SESSION['searchResults'])) && (sizeof($_SESSION['searchResults'])>0)))
		{
			//echo 12122;
			if(isset($_REQUEST['search']))
			{
				
			?>
			
		  <tr>
			<td class='textBodyStyle3'><br><br>Results <?php
			
			if(sizeof($_SESSION['searchResults'])>SEARCH_PAGING)
			{
				if(isset($_REQUEST['search_last']))
				{
					$searchLast=$_REQUEST['search_last'];
				}
				else
				{
					if(sizeof($_SESSION['searchResults'])>$siteDet['searchPaging'])
					{
						$searchLast=$siteDet['searchPaging'];
					}
					else
					{
						$searchLast=sizeof($_SESSION['searchResults']);
					}
				}
				echo ($_REQUEST['search_start'] + 1)." - ".$searchLast;
			}
			else
			{
				echo sizeof($_SESSION['searchResults']);
			}
			echo " of ".sizeof($_SESSION['searchResults']);
			if((isset($_SESSION['SEARCHSTRING1'])) && (strlen($_SESSION['SEARCHSTRING1'])>0))
			{
				echo " for ".$_SESSION['SEARCHSTRING1'];
			}
			
			?>
			 </td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>
			
			<?php
			//echo $_SESSION['searchResults'][0];
			echo $this->displayResults($_SESSION['searchResults'], $_REQUEST['search_start'], $_REQUEST['search_last']);
			
			?>
			</td>
		  </tr>
		  <tr>
			<td class='textBodyStyle1'>
			
			<?php
			echo $this->paginateResults($_SESSION['searchResults'], $siteDet['searchPaging']);
			}
			else
			{
			}?>
			</td>
		  </tr>
		  <?php
		}
		else
		{
			?>
			<tr>
			<td class="textBodyStyle4">No Results were found for this search</td>
		  </tr>
		  <?php
		}
		
		?>
		</table>