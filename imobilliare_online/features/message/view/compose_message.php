<?php
$allUsers=USER::getAllUsers(NULL, array(USERTYPE::getUserTypeId('Administrator'), USER::getUserTypeId($_SESSION['uid'])));

if(isset($_REQUEST['fiid']) && (is_numeric($_REQUEST['fiid'])==1) && (USER::getUserTypeId($_SESSION['uid'])!=USERTYPE::getUserTypeId('Employer')))
{
	$projDet=PROJECT::getProjectDetails($_REQUEST['fiid']);
	$userDet=USER::getDetails($projDet['emp_id']);
	$recip_name=$userDet['username'];
}
?>
<script language="javascript" type="text/javascript">
function addReceipient(str)
{
	var str1=document.getElementById('to').value;
	if(str1.length>0)
	{
		document.getElementById('to').value=document.getElementById('to').value + "; " + str;
	}
	else
	{
		document.getElementById('to').value=str;
	}
}


function clearField(field)
{
	document.getElementById(field).value='';
}
</script>

<?php
if($_SESSION['viewmsgtype']!=2)
{
	header('Location: index.php?errcpj=errcpj181921281');
}


$projectListingDetails=PROJECT::getProjectDetails($_REQUEST['fiid']);
$userDetails=USER::getUserDetails($projectListingDetails['emp_id']);
$userDetailsMe=USER::getUserDetails($_SESSION['uid']);
?>
<?php
$info="";

if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==2)){$info=$info."<a href='?fid=".FEATURE::getId('Message')."&viewmsgtype=1'>";}
	$info=$info."Inbox";
	if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==2)){$info=$info."</a>";}
	
	$info=$info."&nbsp;&nbsp;";
	
	if(($_SESSION['viewmsgtype']==1) || ($_SESSION['viewmsgtype']==2)){$info=$info."<a href='?fid=".FEATURE::getId('Message')."&viewmsgtype=0'>";}
	$info=$info."Outbox";
	if(($_SESSION['viewmsgtype']==1) || ($_SESSION['viewmsgtype']==2)){$info=$info."</a>";}
	
	$info=$info."&nbsp;&nbsp;";
	
	if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==1)){$info=$info."<a href='?fid=".FEATURE::getId('Message')."&viewmsgtype=2'>";}
	$info=$info."New Message";
	if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==1)){$info=$info."</a>";}
?>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php
	
	
	
	
if(isset($_REQUEST['fiid']))
{
	echo PORTLET::displayHeader("Messaging On Project ID:  <span class='style45'>#".substr($projectListingDetails['unique_id'],0,10), $info);
}
else
{
	
	echo PORTLET::displayHeader("Compose A Message!", $info);
}
?>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#FFFCEC" class="tdstyle151"><br>
            <br></td>
        <td colspan="4" bgcolor="#FFFCEC" class="tdstyle152"><br>
            
			
		<form name='compose' action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			}
			else
			{
			}
			 ?>' method='post'>
		<span class='style10'><u>Compose a Message:</u><br>
        <br>
        </span>
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <?php
		//display To field if and only if the user is an employer and make the field, enabled for editing
		if(USERTYPE::getUserTypeId('Employer')==$userDetailsMe['userTypeId'])
		{
		?>
		<tr>
			<td valign='top'><span class='style10 style4'>To</span><span class='style10'><span class='style4'>:</span>&nbsp;</span></td>
			<td>
			<input name='TO' type='text' id='to' class='formtextboxtype1' value='<?php echo $recip_name;?>' readonly="1">&nbsp;<a href='javascript:clearField("to")'>Clear Receipients</a><br />
			<span class="warningText">Use The Receipient Selector ==></span>
			<!--<span class='style10'><span class='style4'>
			<select name='To[]' multiple="1" size="5"><?php echo append_developer_list();?></select><br /><span class="warningText">Hold shift key down to select more than one receipient</span>
			<input name='TO' id='SPECIFY' type='text' class='formtextboxtype1' 
			<?php
			if(isset($_SESSION['postprj']['SPECIFY']))
			{
				echo ">";
			}
			else
			{
			 	echo " value='".$whom[0]."'>";
				//readonly onblur='validate(this.value, this.id)'
			}?>
			
			<a href='javascript:;' onclick='javascript:window.open("devlist.php","Win1","scrollbars=yes,width=500,height=400")'>Select Developers available</a>
			</span></span>-->
			
			
			<span id='SPECIFYFailed' class='<?php
			if(isset($_SESSION['errors']['SPECIFY']))
			  {
			  	echo $_SESSION['errors']['SPECIFY'];
			  }
			  else
			  {	
			  	echo "hidden";
			  }?>'>[Optional] One of the developers does not exist or List the developers in the right format!</span>
			</span></span></td>
		  </tr>
		<?php
		}
		else if(USERTYPE::getUserTypeId('Administrator')==$userDetailsMe['userTypeId'])
		{
		?><tr>
			<td valign='top'><span class='style10 style4'>To</span><span class='style10'><span class='style4'>:</span>&nbsp;</span></td>
			<td><span class='style10'><span class='style4'></span></span></td>
			</tr>
			
		<?php
		}
	
		else
		{
		?>
			<tr>
			<td valign='top'><span class='style10 style4'>To:</span></td>
			<td>
			</span><?php echo $userDetails['username'];?></span>			</td>
			</tr>
		<?php
		}
		?>
		
		<tr>
        <td class='tdstyle16'>&nbsp;</td>
        <td class='tdstyle16'>&nbsp;</td>
        </tr>
		<tr>
        <td valign='top'><span class='style10 style4'>Subject<span class='style10'><span class='style4'>:</span></span></span></td>
        <td><span class='style10'><span class='style10 style4'><span class='style4'></span></span></span>
		
		<input name='SUBJECT' type='text' id='msg' class='formtextboxtype1' value=''>
		</u><br></td>
        </tr>
		<tr>
		  <td colspan="2" valign='top'><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="72%" valign="top"><span class='style10'><span class='style4'><u>Message:<br />
                <textarea name='MSG' class='formtextarea1' id='PROFILE'><?php echo $_COOKIE['formCompose']['msg'];?></textarea>
                <br />
                <br />
                <input name='MESSAGE' type='submit' class='button12' value='Send'>
              </u></span></span></td>
              <td width="28%" valign="top">
			  <?php
			  if(isset($_REQUEST['fiid']) && (is_numeric($_REQUEST['fiid'])==1) && (USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer')))
{

}
else
{
			  ?>
			  <span class="warningText">Receipient Selector [Choose Receipient By Clicking]<br />
			</span>
			  <div style="height:150px; overflow-y:scroll; background-color:#FFFFFF;">
                <table width="100%" border="0" cellspacing="3" cellpadding="5">
                  <?php
			  for($count=0;$count<sizeof($allUsers);$count++)
			  {
			  ?>
                  <tr>
                    <td style="background-color: #FDF7DF;"><a href='javascript:addReceipient("<?php  echo $allUsers[$count]['username'];?>");' class="link_type2">
                      <?php  echo $allUsers[$count]['username'];?>
                    </a></td>
                  </tr>
                  <?php
			  }
			  ?>
                </table>
	        </div>
<?php
}
?>&nbsp;</td>
            </tr>
          </table></td>
		  </tr>
		<tr>
		  <td valign='top'>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
        </table>
		<br>
		<br>
		<br>
        <br>
        <span class='style10'><br>
        <span class='style4'></span></form>
		<br>        </td>
      </tr>
      

      <tr>
        <td align="left" bgcolor="#ECE9D8" class="tdstyle3">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#ECE9D8" class="tdstyle3">&nbsp;</td>
  </tr>
</table>