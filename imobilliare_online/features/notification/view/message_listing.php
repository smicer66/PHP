<?php

	if((isset($_REQUEST['search_start'])) && (is_numeric($_REQUEST['search_start'])==1))
	{
		$msgStart=$_REQUEST['search_start'];
	}
	else
	{
		$msgStart=0;
	}
	
	
	if((isset($_SESSION['viewmsgtype']) && ($_SESSION['viewmsgtype']==0)) || (!isset($_SESSION['viewmsgtype'])))
	{
		$messageListing=MESSAGE::getInboxListing($msgStart, MAX_LISTINGS,$_SESSION['uid']);
		$messageListingCount=MESSAGE::getInMessageCount($_SESSION['uid']);
	}
	else if((isset($_SESSION['viewmsgtype']) && ($_SESSION['viewmsgtype']==1)))
	{
		$messageListing=MESSAGE::getMessageListing($msgStart, MAX_LISTINGS,$_SESSION['uid']);
		$messageListingCount=MESSAGE::getOutMessageCount($_SESSION['uid']);
	}

$iterator=1;
?>

<table width="95%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
		
		<?php
		$bgcolor=$bgcolor1=$bgcolor2=$bgcolor3='#ccc';
		$link=0;
		if(isset($_REQUEST['reply']) || isset($_REQUEST['forward']))
		{
			$bgcolor2='#fff';
		}
		else
		{
			if(isset($_REQUEST['fiid']))
			{
				$bgcolor3='#fff';
			}
			else
			{	
				if(isset($_SESSION['viewmsgtype']) && ($_SESSION['viewmsgtype']==0))
				{
					$bgcolor='#fff';
					$link=1;
				}
				else
				{
					if(isset($_SESSION['viewmsgtype']) && ($_SESSION['viewmsgtype']==1))
					{
						$bgcolor1='#fff';
						$link=2;
					}
					else
					{
					
					}
				}
			}
		}
		?>
		<div id='groupHome' style="padding-left:10px; text-align:center; background-color:<?php echo $bgcolor;?>; border: #A4A4A4 1px solid; border-bottom: #A4A4A4 0px solid; padding-right:10px;padding-top:5px;padding-bottom:5px; width:70px; font-family: Arial, Helvetica, sans-serif; font-size:13px;"><a class="groupLinks" href="?fid=<?php echo $_REQUEST['fid'];?>&viewmsgtype=0"><strong>Mails</strong></a>&nbsp;</div></td>
		<td><div id='groupAbout' style="padding-left:10px; text-align:center; background-color:<?php echo $bgcolor1;?>; border: #A4A4A4 1px solid; border-left: #A4A4A4 0px solid; padding-right:10px;padding-top:5px;padding-bottom:5px; width:110px; font-family: Arial, Helvetica, sans-serif; border-bottom: #A4A4A4 0px solid; font-size:13px;"><a class="groupLinks" href="?fid=<?php echo $_REQUEST['fid'];?>&viewmsgtype=1"><strong>Sent Messages</strong></a>&nbsp;</div></td>
		<?php
		if(isset($_REQUEST['fiid']))
		{
		?>
			<td><div id='groupAbout' style="padding-left:10px; text-align:center; background-color:<?php echo $bgcolor3;?>; border: #A4A4A4 1px solid; border-left: #A4A4A4 0px solid; padding-right:10px;padding-top:5px;padding-bottom:5px; width:85px; font-family: Arial, Helvetica, sans-serif; border-bottom: #A4A4A4 0px solid; font-size:13px;"><strong>Read Mail</strong>&nbsp;</div></td>
        <?php
		}
		?><td><div id='groupAbout' style="padding-left:10px; text-align:center; background-color:<?php echo $bgcolor2;?>; border: #A4A4A4 1px solid; border-left: #A4A4A4 0px solid; padding-right:10px;padding-top:5px;padding-bottom:5px; width:85px; font-family: Arial, Helvetica, sans-serif; border-bottom: #A4A4A4 0px solid; font-size:13px;"><a class="groupLinks" href="?fid=<?php echo $_REQUEST['fid'];?>&compose=1"><strong>Compose</strong></a>&nbsp;</div></td>
        
        <td width="99%"><div style="padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px; width:70px; ">&nbsp;</div></td>
      </tr>
      <tr>
        <td colspan="5" class="groupTable groupCell">
		<span class="title_type1"><strong><?php //echo $news['name'];?></strong></span>
		
	<?php
	if(isset($_REQUEST['fiid']))
	{
		if(isset($_REQUEST['compose']))
		{
			include("features/message/view/compose_message.php");
		}
		else
		{
			$msgDetails=MESSAGE::getMessageDetails($_REQUEST['fiid']);
			$userDetailsSource=USER::getUserDetails($msgDetails['source_id']);
			$userDetailsRecp=USER::getUserDetails($msgDetails['receipient_id']);
		?>
			<table width="100%" style="border: #A4A4A4 1px solid;" cellpadding="0" cellspacing="0">
	  <tr>
		
		<td bgcolor="#FFFCEC" class="tdstyle152"><u><br>
		  </u>
			<table width='100%' border='0' cellpadding='5' cellspacing='0' bgcolor="#F9FAFD" class='tdstyle20'>
			  <tr>
				<td width="100" align='center' valign='middle' class="tdstyle21b"><label><strong>From:</strong></label></td>
				<td width="395" align='center' valign='middle' class="tdstyle21c"><label><?php echo $userDetailsSource['username'];?></label></td>
			  </tr>
			  <tr>
				<td width="100" align='center' valign='middle' class="tdstyle21b"><label><strong>To:</strong></label></td>
				<td width="395" align='center' valign='middle' class="tdstyle21c"><label><?php echo $userDetailsRecp['username'];?></label></td>
			  </tr>
			  <tr>
				<td align='center' valign='middle' class="tdstyle21b"><label><strong>Date Sent: </strong></label></td>
				<td align='center' valign='middle' class="tdstyle21c"><label><?php echo $msgDetails['creation_date'];?></label></td>
			  </tr>
			  <tr>
				<td align='center' valign='middle' class="tdstyle21b"><label><strong>Subject:</strong></label></td>
				<td align='center' valign='middle' class="tdstyle21c"><label><?php echo $msgDetails['subject'];?></label></td>
			  </tr>
			</table>
				<br>
				
	&nbsp;<a href='?fid=<?php echo FEATURE::getId('Message');?>&fiid=<?php echo $msgDetails['id'];?>&compose&forward' class="link_index">Forward</a>&nbsp;&nbsp;&nbsp;
				<?php
				if($msgDetails['source_id']!=$_SESSION['uid'])
				{
				?>
	&nbsp;<a href='?fid=<?php echo FEATURE::getId('Message');?>&fiid=<?php echo $msgDetails['id'];?>&compose&reply' class="link_index">Reply</a>
				<?php
				}
				?>
					<u> </u><span class="style10"><br>
					</span>
					<table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor="#F9FAFD" class='tdstyle20'>
					  <tr>
						<td colspan="2" align='center' valign='middle' class="tdstyle21b"><strong><u>Message:</u></strong><br>
							<br>
							<?php echo $msgDetails['details'];?>
							<br>
							<br>
						</td>
					  </tr>
					</table>
				  <span class="style10"><br>
					</span><span class="style10"></span><br>
				</td>
			  </tr>
			  
			</table>
		<?php
		}
	}
	else
	{
		if((isset($_SESSION['viewmsgtype']) && ($_SESSION['viewmsgtype']==0)) || (!isset($_SESSION['viewmsgtype'])))
		{
		?>
			
						<form action='index.php
						<?php 
						if(strlen($_SERVER['QUERY_STRING'])>0)
						{
							echo "?".$_SERVER['QUERY_STRING'];
						}
						else
						{
						}
						 
						 ?>' method='post'>
						<table width='100%' border='0' cellpadding='0' cellspacing='0'>
						<tr>
						<td width="130" valign='top' class='tdstyle10b' align="center"><label style="font-size:14px; color:#FFFFFF;"><strong>FROM</strong></label></td>
						<td width="350" class='tdstyle10b' align="center"><label style="font-size:14px; color:#FFFFFF;"><strong>MESSAGE SUBJECT</strong></label></td>
						<td width="130" class='tdstyle10b' align="center">
						<label style="font-size:14px; color:#FFFFFF;">DATE SENT </label></td>
						</tr>
						<?php
						if(sizeof($messageListing)==0)
						{
						?>
							<tr><td colspan='3' align='center' class='tdstyle13'>
							No Messages in your Inbox</td></tr>
						<?php
						}
						else
						{
							
							for($counter=0; $counter<(sizeof($messageListing)); $counter++)
							{
								$source=USER::getDetails($messageListing[$counter]['source_id']);
								
								?>
								<tr>
								<td width='130' valign='top' class='<?php if ($messageListing[$counter]['receipientunread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'>
								<input name='DEL[]' type='checkbox' class='formcheckboxes' value='<?php echo $messageListing[$counter]['id'];?>'>&nbsp;&nbsp;			
								<?php
								$iterator++;
								echo $source['username'];
								?>
								</td>
								<td width='350' class='<?php if($messageListing[$counter]['receipientunread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'>
								<a href='?fid=<?php echo FEATURE::getId('Message')."&fiid=".$messageListing[$counter]['id'];?>'>
								<?php echo $messageListing[$counter]['subject'];?></a>
								<td valign='top' width='130' align='center' class='
								<?php if($messageListing[$counter]['receipientunread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'><?php echo $messageListing[$counter]['creation_date'];?>
								</td></tr>
								<?php
							}
						}			
						?>
						</table>
						<br><input name='MESSAGE' type='submit' class='button11' id='Del' value='DELETE' /></form><br />
						<div align=right>
									<?php
									if((MAX_LISTINGS<$messageListingCount))
									{
									?>
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
										  <tr>
											<td>&nbsp;</td>
											<td class="listingCells" align="right"><?php 
											$pag=new Pagination();
											echo $pag->paginateResults($messageListingCount, MAX_LISTINGS, 'MESSAGE', 100);?></td>
										  </tr>
										</table>
									<?php
									}
									else
									{
									?>
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
										  <tr>
											<td width="80%">&nbsp;</td>
											<td width="20%" align="center" class="listingCells"><a href="index.php?fid=<?php echo FEATURE::getId('Message')."&list";?>">View All</a></td>
										  </tr>
										</table>
									<?php
									}
									?>	
						</div>
						</form>
	
		<?php
		}
		else if((isset($_SESSION['viewmsgtype']) && ($_SESSION['viewmsgtype']==1)) || (!isset($_SESSION['viewmsgtype'])))
		{
		?>
			
						<form action='index.php
						<?php 
						if(strlen($_SERVER['QUERY_STRING'])>0)
						{
							echo "?".$_SERVER['QUERY_STRING'];
						}
						else
						{
						}
						 
						 ?>' method='post'>
						<table width='100%' border='0' cellpadding='0' cellspacing='0'>
						<tr>
						<td width="130" valign='top' class='tdstyle10b' align="center"><label style="font-size:14px; color:#FFFFFF;"><strong>TO</strong></label></td>
						<td width="350" class='tdstyle10b' align="center"><label style="font-size:14px; color:#FFFFFF;"><strong>MESSAGE SUBJECT</strong></label></td>
						<td width="130" class='tdstyle10b' align="center">
						<label style="font-size:14px; color:#FFFFFF;">DATE SENT </label></td>
						</tr>
						<?php
						if(sizeof($messageListing)==0)
						{
						?>
							<tr><td colspan='3' align='center' class='tdstyle13'>
							No Messages in your Outbox</td></tr>
						<?php
						}
						else
						{
							
							for($counter=0; $counter<(sizeof($messageListing)); $counter++)
							{
								$source=USER::getDetails($messageListing[$counter]['receipient_id']);
								
								?>
								<tr>
								<td width='130' valign='top' class='<?php if ($messageListing[$counter]['sourceunread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'>
								<input name='DEL[]' type='checkbox' class='formcheckboxes' value='<?php echo $messageListing[$counter]['id'];?>'>&nbsp;&nbsp;			
								<?php
								$iterator++;
								echo $source['username'];
								?>
								</td>
								<td width='350' class='<?php if($messageListing[$counter]['sourceunread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'>
								<a href='?fid=<?php echo FEATURE::getId('Message')."&fiid=".$messageListing[$counter]['id'];?>'>
								<?php echo $messageListing[$counter]['subject'];?></a>
								<td valign='top' width='130' align='center' class='
								<?php if($messageListing[$counter]['sourceunread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'><?php echo $messageListing[$counter]['creation_date'];?>
								</td></tr>
								<?php
							}
						}			
						?>
						</table>
						<br><input name='MESSAGE_SENDER' type='submit' class='button11' id='Del' value='DELETE' /></form><br />
						<div align=right>
									<?php
									if((MAX_LISTINGS<$messageListingCount))
									{
									?>
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
										  <tr>
											<td>&nbsp;</td>
											<td class="listingCells" align="right"><?php 
											$pag=new Pagination();
											echo $pag->paginateResults($messageListingCount, MAX_LISTINGS, 'MESSAGE', 100);?></td>
										  </tr>
										</table>
									<?php
									}
									else
									{
									?>
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
										  <tr>
											<td width="80%">&nbsp;</td>
											<td width="20%" align="center" class="listingCells"><a href="index.php?fid=<?php echo FEATURE::getId('Message')."&list";?>">View All</a></td>
										  </tr>
										</table>
									<?php
									}
									?>	
						</div>
						</form>
		
		<?php
		}
	}
	?>
		
</td>
        </tr>
    </table></td>
</tr>

	</td>
	</tr>
	</table>

