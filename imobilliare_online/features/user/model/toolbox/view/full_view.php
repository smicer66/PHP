<?php
$totalUnread=MESSAGE::getUnreadMessageCount($_SESSION['uid']);
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
			echo PORTLET::displayHeader("User Panel!", "");
			?>
  </table>	
  <table width='100%' border='0' cellspacing='0' cellpadding='5' class="onlyBorderAlone defaultBgColor">
		  <tr>
			<td colspan='2' class='cellType6'><span class='headerTitle'>My Account</span></td>
		  </tr>
		  <tr>
			<td colspan='2'><table width='100%' border='0' cellspacing='5' cellpadding='5'>
			  <tr>
			  <?php
				if(checkToolsItemActivate('View My Account Details'))
				{
				?>
					<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='index.php?fid=<?Php echo parent::getId('User')."&vacct=1&fiid=".$_SESSION['uid']."&us=".USER::getUserTypeId($_SESSION['uid']);?>' class='link_type3'><img src='images/Profile.png' width='48' height='48' border='0' /></a><br /><a href='index.php?fid=<?Php echo parent::getId('User')."&vacct=1&fiid=".$_SESSION['uid']."&us=".USER::getUserTypeId($_SESSION['uid']);?>' class='link_type4'>View My Account Details</a></td>
				<?php
				}
				if(checkToolsItemActivate('Edit My Account Details'))
				{
				?>
				
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='index.php?fid=<?Php echo parent::getId('User')."&mod=1&us=".USER::getUserTypeId($_SESSION['uid']);?>' class='link_type3'><img src='images/Document Edit.png' border='0'  width='48' height='48' /></a><br /><a href='index.php?fid=<?Php echo parent::getId('User')."&mod=1&us=".USER::getUserTypeId($_SESSION['uid']);?>' class='link_type4'>Edit My Account Details</a> </td>
				<?php
				
				}
				if(checkToolsItemActivate('Edit My Account Details'))
				{
					if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer'))
					{
				?>
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='index.php?fid=<?Php echo parent::getId('User')."&mod=1&step=2&us=".USER::getUserTypeId($_SESSION['uid']);?>' class='link_type3'><img src='images/favor.png' border='0'  width='48' height='48' /></a><br />
				<a href='index.php?fid=<?Php echo parent::getId('User')."&mod=1&step=2&us=".USER::getUserTypeId($_SESSION['uid']);?>' class='link_type4'>Edit My Specialization</a> </td>
				<?php
					}
					else
					{
					?>
					<?php
					}
				}
				?>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
		    <td colspan='2' class='cellType6'><span class='headerTitle'>Projects &amp; Bids</span> </td>
    </tr>
		  <tr>
            <td colspan='2'><table width='100%' border='0' cellspacing='5' cellpadding='5'>
                <tr>
                  <?php
				if(checkToolsItemActivate('View My Projects'))
				{
				?>
                  <td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='index.php?fid=<?php echo FEATURE::getId('Project');?>&viewMe' class='link_type3'><img src='images/Project-icon.png' width='48' height='48' border='0' /></a><br />
                    <a href='?fid=<?php echo FEATURE::getId('Project');?>&viewMe' class='link_type4'>My Projects</a></td>
                  <?php
				}
				if(checkToolsItemActivate('View My Bids'))
				{
				?>
                  <td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='?fid=<?Php echo parent::getId('Bid')."&viewMe=1";?>' class='link_type3'><img src='images/bid_tag.png' border='0'  width='48' height='48' /></a><br />
                    <a href='?fid=<?Php echo parent::getId('Bid')."&viewMe=1";?>' class='link_type4'>My Bids </a> </td>
                  <?php
				
				}
				if(checkToolsItemActivate('Create A Project'))
				{
				
					if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
					{
				?>
                  <td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='?fid=<?Php echo parent::getId('Project');?>' class='link_type3'><img src='images/Document Edit.png' border='0'  width='48' height='48' /></a><br />
                    <a href='?fid=<?Php echo parent::getId('Project');?>' class='link_type4'>Create A Project</a> </td>
                  <?php
					}
				}
				?>
                  <td width='20%' align='center' valign='bottom'>&nbsp;</td>
                  <td width='20%' align='center' valign='bottom'>&nbsp;</td>
                </tr>
            </table></td>
    </tr>
		  
		  
		  <tr>
			<td colspan='2' class='cellType6'><span class='headerTitle'>Mails &amp; Messaging</span></td>
		  </tr>
		  <tr>
			<td colspan='2'><table width='100%' border='0' cellspacing='5' cellpadding='5'>
			  <tr>
			  <?php
				if(checkToolsItemActivate('My Mail'))
				{
				?>
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='?fid=<?php echo FEATURE::getId('Message');?>' class='link_type3'><img src='images/Email.png' border='0'  width='48' height='48' /></a><br /><a href='?fid=<?php echo FEATURE::getId('Message');?>' class='link_type4'>My Mail <strong>(<?php echo $totalUnread;?>)</strong></a></td>
				<?Php
				}
				?>
				<?php
				if(checkToolsItemActivate('Complaints'))
				{
				?>
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='?fid=<?php echo FEATURE::getId('User');?>&complaint' class='link_type3'><img src='images/Email.png' border='0'  width='48' height='48' /></a><br /><a href='?fid=<?php echo FEATURE::getId('User');?>&complaint' class='link_type4'>Complaints</a></td>
				<?Php
				}
				?>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
			  </tr>
			</table></td>
			<?Php
			if((USER::getUserTypeId($_SESSION['uid']))==(USERTYPE::getUserTypeId('RPS')))
			{
			}
			else
			{?>
		  <tr>
			<td colspan='2' class='cellType6'><span class='headerTitle'>Financials</span></td>
		  </tr>
		  <tr>
			<td colspan='2'><table width='100%' border='0' cellspacing='5' cellpadding='5'>
			  <tr>
			  	<?php
			  	if(checkToolsItemActivate('My Subscriptions'))
				{
				?>
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='?fid=<?php echo FEATURE::getId('Billing');?>' class='link_type3'><img src='images/coins-icon.png' border='0'  width='48' height='48' /></a><br /><a href='?fid=<?php echo FEATURE::getId('Billing');?>' class='link_type4'>My Funds Management</a></td>
				<?php
				}
				if(checkToolsItemActivate('Donate'))
				{
				?>
					<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='index.php?linkToFeatureId=".parent::getId('Donations')."&viewDon' class='link_type3'><img src='images/coins_icon.png' border='0'  width='48' height='48' /></a><br /><a href='index.php?linkToFeatureId=<?Php echo ADMINISTRATOR::getAdminFunctionId('funds_listing');?>' class='link_type4'>My Funds</a></td>
				<?php
				}
				?>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
			  </tr>
			</table></td>
		  </tr>
		  		<?php
	  }
	  if(isAdmin($_SESSION['uid']))
	  {
	  			?>
		  <tr>
			<td colspan='2' class='cellType6'><span class='headerTitle'>Support</span></td>
		  </tr>
		  <tr>
			<td colspan='2'><table width='100%' border='0' cellspacing='5' cellpadding='5'>
			  <tr>
			  	<?Php
		  	if(checkToolsItemActivate('FAQ'))
			{
				?>
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='http://www.syncstate.com/grabmyhouse/faq' class='link_type3'><img src='images/Help and Support.png' border='0'  width='48' height='48' /></a><br /><a href='http://www.syncstate.com/grabmyhouse/faq' class='link_type4'>FAQ</a></td>
				<?Php
				
			}
			if(checkToolsItemActivate('Index'))
			{
				?>
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='index.php?fid=<?Php echo parent::getId('Site Map');?>' class='link_type3'><img src='images/Zoom In.png' border='0'  width='48' height='48' /></a><br /><a href='index.php?fid=<?Php echo parent::getId('Site Map');?>' class='link_type4'>Site Map</a></td>
				<?php
			}
			if(checkToolsItemActivate('Admin Support'))
			{
				?>
				<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='mailto:grabmyhousesupport@syncstate.com' class='link_type3'><img src='images/settings.png' border='0'  width='48' height='48' /></a><br /><a href='mailto:grabmyhousesupport@syncstate.com' class='link_type4'>Admin Support</a></td>
				<?php
			}
				?>
			<td width='20%' align='center' valign='bottom'>&nbsp;</td>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
			  </tr>
			</table></td>
		  </tr>
		  </tr><tr>
			<td colspan='2' class='cellType6'><span class='headerTitle'>Admin Module</span></td>
		  </tr>
		  <tr>
			<td colspan='2'><table width='100%' border='0' cellspacing='5' cellpadding='5'>
			  <tr>
			  		<?php
			  
			  	if(checkToolsItemActivate('Site Manager'))
				{
					?>
					<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('configuration_manager');?>' class='link_type3'><img src='images/Computer.png' border='0'  width='48' height='48' /><br /><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('configuration_manager');?>' class='link_type4'>Site Manager</a> </td>
					<?php
				}
				if(checkToolsItemActivate('Features Manager'))
				{
					?>
					<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('features_manager');?>' class='link_type3'><img src='images/Tag.png' border='0'  width='48' height='48' /></a><br /><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('features_manager');?>' class='link_type4'>Features Manager</a></td>
					<?php
				
				}
				if(checkToolsItemActivate('Component Manager'))
				{
					?>
					<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('component_manager');?>' class='link_type3'><img src='images/Panel Settings.png' border='0'  width='48' height='48' /></a><br /><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('component_manager');?>' class='link_type4'>Component Manager</a></td>
					<?php
				}
				if(checkToolsItemActivate('Business Intelligence Reporting Tools'))
				{
					?>
					<td width='20%' align='center' valign='bottom' class='cellTypeUserCells'><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('features_manager');?>' class='link_type3'><img src='images/financials.jpg' border='0'  width='48' height='48' /></a><br /><a href='administrator/?fid=<?Php echo ADMINISTRATOR::getAdminFunctionId('features_manager');?>' class='link_type4'>BIR Tools</a></td>
					<?php
				}
				
				?>
				<td width='20%' align='center' valign='bottom'>&nbsp;</td>
			  </tr>
			</table></td>
		  </tr>
		  <?php
	  }
		  ?>
		</table>
