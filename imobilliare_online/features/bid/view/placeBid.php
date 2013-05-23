<?php
$result=PROJECT::getProjectDetails($_REQUEST['fiid']);

if(PROJECT::isExpired($_REQUEST['fiid']) || BID::doBid($_REQUEST['fiid'])==FALSE)
{
	//if project is expired dont display
	header('Location: index.php?fid='.FEATURE::getId('Project').'&ex=1');
}

$result_spec=SPECIALIZATION::getDetailsFromProjectId($_REQUEST['fiid']);
$result_user=USER::getDetails($_SESSION['uid']);
$result_usertype=USERTYPE::getUserTypeDetails($result_user['userTypeId']);
$policyArticle=ARTICLES::getArticleDetails('Policy Note');


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
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php

	  	
echo PORTLET::displayHeader("My Bid for Project ID: <span class='style45'>".substr($result['unique_id'], 0, 10)."...</span>", "");
			?>
</table>	
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="">
      <tr>
        <td bgcolor='#FFFCEC' class='tdstyle151'>&nbsp;</td>
        <td colspan='4' bgcolor='#FFFCEC' class='tdstyle152'><br>
          <span class='style10'><br>
          </span>
			<table width='90%' border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td width='24%' valign='top' class='tdstyle13'><span class='style45'><strong>Title:</strong></span></td>
              <td width='76%' class='tdstyle13'><a href="?fid=<?php echo FEATURE::getId('project');?>&fiid=<?php echo $result['id'];?>"><?php echo $result['header']; ?></a></td>
            </tr>
            <tr>
              <td valign='top' class='tdstyle14'><span class='style45'><strong>Status:</strong></span></td>
              <td class='tdstyle14'><?php echo $result['status']; ?>			  </td>
            </tr>
            <tr>
              <td valign='top' class='tdstyle13'><span class='style45'><strong>Closes on: </strong></span></td>
              <td class='tdstyle13'><?php echo $result['expiry_date']." - ".$result['expiry_time']; ?>West African Time</td>
			</tr>
            <tr>
              <td valign='top' class='tdstyle14'><span class='style45'><strong>Employers Budget: </strong></span></td>
              <td class='tdstyle14'>NGN<?php echo $result['min_bdgt']." - NGN".$result['max_bdgt']; ?></td>
			</tr>
            <tr>
              <td valign='top' class='tdstyle13'><span class='style45'><strong>Escrow:</strong></span></td>
              <td class='tdstyle13'><?php echo $result['escrow']; ?></td></tr>
            <tr>
              <td valign='top' class='tdstyle14'><span class='style45'><strong>Specialization:</strong></span></td>
              <td class='tdstyle14'>
			  <?php 
			  if (sizeof($result_spec)>0)
			  {
			  	echo join(', ', $result_spec); 
			  }
			  ?>			  </td></tr>
            <tr>
              <td valign='top' class='tdstyle13'><span class='style45'><strong>Project Report:</strong></span></td>
              <td class='tdstyle13'><?php echo $result['proj_report']; ?></td>
			</tr>
            <tr>
              <td valign='top' class='tdstyle14'><span class='style45'><strong>Details:</strong></span></td>
              <td class='tdstyle14'><table width='90%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><?php echo $result['detail']; ?></td></tr>
              </table></td>
            </tr>
          </table>
          <span class='style10'></span><br>        </td>
      </tr>
	  <?php
	  if($result_usertype['name']=='Developer')
	  {
	  ?>
      <tr>
        <td align='left' bgcolor='#FFFADD' class='tdstyle151'>&nbsp;</td>
        <td colspan='4' align='left' bgcolor='#FFFADD' class='tdstyle152'>
				
				<br><br><span class='style10'>Id:</span><br>
					<input name='USERNAME' type='text' class='formtextboxtype4' value='<?php echo $result_user['username'];?>'  readonly="true"><br>
            <span class='style10'><br>
              Password:</span><br><input name='PASSWORD' type='password' class='formtextboxtype4'>
			  <br>
          <br>
          Visitor? <a href='devsignup.html'>Click</a> to Sign Up <br>
          <br></td>
      </tr>
      <tr>
        <td align='left' bgcolor='#FFFCEC' class='tdstyle151'>&nbsp;</td>
        <td colspan='4' align='left' bgcolor='#FFFCEC' class='tdstyle152'><STRONG class='style10'><br>
              <u><STRONG class='style10'><br>
              <u>Bid Details:</u></STRONG>              </u></STRONG>
			  
			  <?php /*
			   echo "Select Bid Template:
          <select id='bidselecter' name='selectBidTemp' class='formtextboxtype2'>		
                <option value='-1'>none</option>";
				
			  


	if(sizeof($str_bid_template_id)==1)
	{
	}
	else
	{
		for($counter=0;$counter<((sizeof($str_bid_template_id)) - 1);$counter++)
		{
			$worktool=$str_bid_template_id[$counter];
			$query_bid_temp=getResult1("msgs_reviews_violations", "templatename", "id", "'$worktool' AND status= 'Valid'", "1" );
			$str_bid_temp=explode('||', $query_bid_temp);
			
			if (($_COOKIE['formbid']['selectBidTemp'])==($counter + 1))
			{
				$selected="selected";
				echo "<option value='".($str_bid_temp[0])."' selected='".$selected."'>".$str_bid_temp[0]."</option>";				
			}
			else
			{
				$selected="";
				echo "<option value='".($str_bid_temp[0])."'>".$str_bid_temp[0]."</option>";				
			}




		}
	}
	
	
              echo "</select>
          [optional]<br>";*/?>
		  
          <br>
            <textarea name='msg' id='msg' class='formtextarea1'><?php echo $_COOKIE['formbid']['msg'];?></textarea>
            <br>
			<br>
			
			<!--<input name='SAVE[]' type='checkbox' value='1'>
Save Bid as a Template with Name:<input class='formtextboxtype3' id='BidTempName' name='BidTempName' type='text' value='";
			<?php 
			if(isset($_SESSION['values']['BidTempName']))
			{
				echo $_SESSION['values']['BidTempName'];
			}
			else
			{
				echo $_COOKIE['formbid']['BidTempName'];
			}
			
			echo "'>";?>
			-->
            
          <table width='75%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
              <td><br><div align='justify'><U>Note:</U><BR>
                Provide explicit details as much as possible in order to give the developers a near-accurate idea about the project. The project details could also be edited later by going to your admin area and clicking on edit near the project. </div></td>
            </tr>
          </table>
          <br></td>
      </tr>
      <tr>
        <td align='left' bgcolor='#FFFADD' class='tdstyle151'>&nbsp;</td>
        <td colspan='4' align='left' bgcolor='#FFFADD' class='tdstyle152'><span class='style10'><strong><STRONG class='style10'><u><br>
          </u>How long will it take you to deliver on the project: </STRONG></strong><span><br />
		  <input name='period' type='text' class='formtextboxtype4' onblur='checkInputNumeric(this)' value='<?php echo $_COOKIE['formbid']['period'];?>'> days
                <br>
                <br>
          How Much will you charge to work on the project: <STRONG class='style10'> </STRONG><br />
		  <input name='bid' type='text' class='formtextboxtype4' onblur='checkInputNumeric(this)' value='<?php echo $_COOKIE['formbid']['bid'];?>'> Naira
          <br>
          <br>
		  <br>
          <br>
		  
			<input name='Bid_Submit' type='submit' class='button12' value='Submit Bid'>
          <br>
          <br>
          <br></td>
      </tr>
	  <?php
	  }
	  else
	  {
	  ?>
	  <td align='left' bgcolor='#FFFADD' class='tdstyle151'>&nbsp;</td>
        <td colspan='4' align='left' bgcolor='#FFFADD' class='tdstyle152'>
				
				<br><br><strong>Place a Bid for this Project</strong><br>
				You need to sign in as a developer in order to place a bid<br>
          <br>
          <a href='?fid=<?php echo FEATURE::getId('User');?>'>Sign In</a>  |  Visitor? <a href='devsignup.html'>Click</a> to Sign Up <br>
          <br></td>
	  <?php
	  
	  }
	  ?>
      <tr>
        <td colspan='5' align='left' bgcolor='#ECE9D8' class='tdstyle3'>&nbsp;</td>
      </tr>
    </table>	
	</form>