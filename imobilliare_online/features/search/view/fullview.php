<form id='form1' name='form1' method='post' action='index.php'>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" align="right" valign="bottom">
	<span class='textBodyStyle2'>Project Type</span><br />
		<select name="project_type" id="project_type" onChange='validateFromHome(this.value, this.id)' ><?php echo append_project_type($value); ?></select>
		<br />
		<br />
		<div id='logoStatus'>
          <?php
		echo "<select id='project_specifics' name='project_specifics' class='formtextboxtype2'>
			<option value='NULL'>--Select One--</option>";
		if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_REQUEST['id'])) && (is_numeric($_REQUEST['id'])==1))
		{	
			$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_category` WHERE `status` = '1' AND `projectTypeId` = '".$resultMOD['']."'";
			$sqlX= $mysql->query($strX);
			while($resultX = $mysql->fetch_assoc_mine($sqlX))
			{
				if($resultMOD['sectionId']==$resultX['id'])
				{
					$selected='selected';
				}
				echo "<option value='".$resultX['id']."' $selected>".$resultX['name']."</option>";
				$selected='';
			}
		}	
			echo "</select>";
		
		?>
	    </div></td>
    <td width="22%" align="right" valign="bottom">
	<span class='textBodyStyle2'>Location</span><br />
	<select name="location" id="location" >
	  <?php echo append_option_locations($value); ?>
	  </select>	</td>
    <td width="19%" align="right" valign="bottom"><span class='textBodyStyle2'>Enter Search String</span>
      <input type='text' name='searchText' value='' /></td>
    <td width="11%" align="right" valign="bottom"><input type='submit' name='Submit' value='Search' class='button' /></td>
  </tr>
</table>
</form>