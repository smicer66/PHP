<?php

	if((isset($_REQUEST['search_start'])) && (is_numeric($_REQUEST['search_start'])==1))
	{
		$msgStart=$_REQUEST['search_start'];
	}
	else
	{
		$msgStart=0;
	}
	
	
	if($_SESSION['viewmsgtype']==0)
	{
		$messageListing=MESSAGE::getMessageListing($msgStart, MAX_LISTINGS,$_SESSION['uid']);
		$messageListingCount=MESSAGE::getOutMessageCount($_SESSION['uid']);
	}
	else
	{
		$messageListing=MESSAGE::getInboxListing($msgStart, MAX_LISTINGS,$_SESSION['uid']);
		$messageListingCount=MESSAGE::getInMessageCount($_SESSION['uid']);
	}

$iterator=1;
?>
<table width="651" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="1%" valign="top" bgcolor="#FFD325" class="tdstyle10a"><img src="images/bg11.gif" width="9" height="25" />
</td>
<td width="10%" align="left" background="images/bg9.gif" class="tdsubmenu style38 style39"><div align="left">
<?php
if($_SESSION['viewmsgtype']==1)
{
  	echo "My Inbox";
}
else
{
	echo "My Outbox";
}
?>
<span class="style45"></span></div></td>
<td width="1%" valign="top" bgcolor="#FFD325" class="tdstyle10a"><img src="images/bg10.gif" width="9" height="25" /></td>
<td width="32%" class="tdsubmenu1">&nbsp;</td>
<td class="tdsubmenu1"><div align="right">
<?php
if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==2)){echo "<a href='?fid=".FEATURE::getId('Message')."&viewmsgtype=1'>";}
echo "My Inbox";
if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==2)){echo "</a>";}

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

if(($_SESSION['viewmsgtype']==1) || ($_SESSION['viewmsgtype']==2)){echo "<a href='?fid=".FEATURE::getId('Message')."&viewmsgtype=0'>";}
echo "Messages Sent";
if(($_SESSION['viewmsgtype']==1) || ($_SESSION['viewmsgtype']==2)){echo "</a>";}

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==1)){echo "<a href='?fid=".FEATURE::getId('Message')."&viewmsgtype=2&compose'>";}
echo "Compose A New Message";
if(($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==1)){echo "</a>";}
?>
</div></td>
</tr>
<tr>
<td bgcolor="#FFFCEC" class="tdstyle151"><br />
<br /></td>
<td colspan="4" bgcolor="#FFFCEC" class="tdstyle152">
<?php
if(($_SESSION['viewmsgtype']==1) || ($_SESSION['viewmsgtype']==2))
{
?>
	<u><br />
	<span class="style10">Messages Received:</span></u><span class="style10"><br />
	<br />
	</span>
	<form action='index.php<?php 
	if(strlen($_SERVER['QUERY_STRING'])>0)
	{
		echo "?".$_SERVER['QUERY_STRING'];
	}
	else
	{
	}
	 ?>' method='post'>
	<table width='610' border='0' cellpadding='0' cellspacing='0'>
	<tr>
	<td width="130" valign='top' class='tdstyle10b'><table width='100%' border='0' cellpadding='0' cellspacing='0' background='images/bg9.gif' class='tdstyle20'>
		<tr>
		  <td align='center' valign='middle'><span class='style56'><strong>FROM</strong></span></td>
		</tr>
	</table></td>
	<td width="350" class='tdstyle10b'><table width='100%' border='0' cellpadding='0' cellspacing='0' background='images/bg9.gif' class='tdstyle20'>
		<tr>
		  <td align='center' valign='middle'><span class='style56'><strong>MESSAGE SUBJECT</strong></span></td>
		</tr>
	</table></td>
	<td width="130" class='tdstyle10b'><table width='100%' border='0' cellpadding='0' cellspacing='0' background='images/bg9.gif' class='tdstyle20'>
		<tr>
		  <td align='center' valign='middle'><span class='style10'>DATE SENT </span></td>
		</tr>
	</table></td>
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
			<td width='130' valign='top' class='<?php if ($messageListing[$counter]['receipient_unread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'>
			<input name='DEL[]' type='checkbox' class='formcheckboxes' value='<?php echo $messageListing[$counter]['id'];?>'>&nbsp;&nbsp;			
			<?php
			$iterator++;
			echo $source['username'];
			?>
			</td>
			<td width='350' class='<?php if($messageListing[$counter]['receipient_unread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'>
			<a href='?fid=<?php echo FEATURE::getId('Message')."&fiid=".$messageListing[$counter]['id'];?>&view=1'>
			<?php echo $messageListing[$counter]['subject'];?></a>
			<td valign='top' width='130' align='center' class='
			<?php if($messageListing[$counter]['receipient_unread']==0){echo "tdstyle14g";}else{echo "tdstyle13g";}?>'><?php echo $messageListing[$counter]['creation_date'];?>
			</td></tr>
			<?php
		}
	}			
	?>
	</table>
	<br><input name='MESSAGE' type='submit' class='button11' id='Del' value='DELETE' /></form><br />

	<table  width="100%" border='0' cellpadding='0' cellspacing='0'>
	<tr><td width="70%">
	<table width="100%" border='0' cellpadding='0' cellspacing='0'>
	<tr>
	<td width="60%">&nbsp;</td>
	<td align="right">
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
						<td width="18%">&nbsp;</td>
						<td width="82%" align="right" class="listingCells"><a href="index.php?fid=<?php echo FEATURE::getId('Message')."&list";?>">View All</a></td>
					  </tr>
					</table>
				<?php
				}
				?>	
	</td></tr></table>
	
	</td>
	</tr>
	</table>
	<?php
}	
else if (($_SESSION['viewmsgtype']==0) || ($_SESSION['viewmsgtype']==2))
{
?><u><br />
	<span class="style10">Messages Sent:</span></u><span class="style10"><br />
	<br />
	</span>
	<form action='index.php<?php 
	if(strlen($_SERVER['QUERY_STRING'])>0)
	{
		echo "?".$_SERVER['QUERY_STRING'];
	}
	else
	{
	}
	 ?>' method='post'>
	<table width='610' border='0' cellpadding='0' cellspacing='0'>
	<tr>
	<td width="130" valign='top' class='tdstyle10b'>
	<table width='100%' border='0' cellpadding='0' cellspacing='0' background='images/bg9.gif' class='tdstyle20'>
		<tr>
		  <td align='center' valign='middle'><span class='style56'><strong>TO</strong></span></td>
		</tr>
	</table></td>
	<td width="350" class='tdstyle10b'>
	<table width='100%' border='0' cellpadding='0' cellspacing='0' background='images/bg9.gif' class='tdstyle20'>
		<tr>
		  <td align='center' valign='middle'><span class='style56'><strong>MESSAGE SUBJECT</strong></span></td>
		</tr>
	</table></td>
	<td width="130" class='tdstyle10b'>
	<table width='100%' border='0' cellpadding='0' cellspacing='0' background='images/bg9.gif' class='tdstyle20'>
		<tr>
		  <td align='center' valign='middle'><span class='style10'>DATE SENT </span></td>
		</tr>
	</table></td>
	</tr>
	<?php
	if(sizeof($messageListing)==0)
	{
	?>
		<tr>
		<td colspan='3' align='center' class='tdstyle13'>
		No Messages in your Inbox</td>
		</tr>
	<?php
	}
	else
	{
		
		for($counter=0; $counter<(sizeof($messageListing)); $counter++)
		{
			$receiver=USER::getDetails($messageListing[$counter]['receipient_id']);
			
			?>
			<tr>
			<td width='130' valign='top' class='
			<?php if ($messageListing[$counter]['source_unread']==0){echo "tdstyle13g";}else{echo "tdstyle13g";}?>'>
			<input name='DEL[]' type='checkbox' class='formcheckboxes' value='<?php echo $messageListing[$counter]['id'];?>'>&nbsp;&nbsp;			
			<?php
			$iterator++;
			
			echo $receiver['username'];
			?>
			</td>
			<td width='350' class='
			<?php if($messageListing[$counter]['source_unread']==0){echo "tdstyle13g";}else{echo "tdstyle13g";}?>'>
			<a href='?fid=<?php echo FEATURE::getId('Message')."&fiid=".$messageListing[$counter]['id'];?>&view=1'>
			<?php echo $messageListing[$counter]['subject'];?></a></td>
			<td valign='top' width='130' align='center' class='
			<?php if($messageListing[$counter]['source_unread']==0){echo "tdstyle13g";}else{echo "tdstyle13g";}?>'><?php echo $messageListing[$counter]['creation_date'];?>
			</td></tr>
			<?php
		}
	}			
	?>
	</table>
	<br><input name='MESSAGE_SENDER' type='submit' class='button11' id='Del' value='DELETE' /></form>
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
	<?php
}		
?>
<span class="style10"></span><br />
<br />
</td>
</td>
</tr>
</table>



