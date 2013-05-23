<?php
$faqArticle=ARTICLES::getArticleDetails('FAQs');
$devArticle=ARTICLES::getArticleDetails('Developers');
$empArticle=ARTICLES::getArticleDetails('Employers!');
$policyArticle=ARTICLES::getArticleDetails('Policy Note');
global $active_template;
?>
<table width="900px" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="19">
	<!--banner section -->
	<table width="100%" border="0" cellspacing="0" cellpadding="0"  bgcolor="#ECE9D8">
      <tr>
        <td width="43%" class="textHeaderStyle3 bannerCell" align="left" valign="top" background="images/real_banner1.jpg" bgcolor="#FFEEAA"><a href="index.php"><img src="images/real_banner.png" width="378" height="100" border="0" /></a></td>
        <td align="right" valign="bottom" background="images/real_banner1.jpg" bgcolor="#FFEEAA" class="bannerCell bannerRight"><?php 
		//SEARCH::displayFPFeature();
			FEATURE::fView('top2');
		?><?php 
		FEATURE::fView('left2', 1);
		?></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="bottom" background="images/border2.gif" bgcolor="#FFEEAA" class="border1">&nbsp;</td>
        </tr>
    </table> 
	<!--end banner section -->
    </td>
  </tr>
  <tr>
  <!--menu barr starts here-->
    <td height="32"  bgcolor="#ECE9D8">
		<div id="menubar">
  <div id="top1">
<?php
	$menu=new Menu();
	echo $menu->displayComponent('left');
	?>
	<script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu","menuhover");
</script>
	</div>
		</div></td>
  <!--menu barr ends here-->
  </tr>
  <tr>
    <td valign="top">
	<!--first phase of page starts here -->
	
	<table width="100%" border="0" cellspacing="5" cellpadding="5">
	  <tr>
		<td width="72%"><span class="style63 font"><br />
              </span><span class="textstyle22"><span class="style71"> <span class="style75">imobilliare connects outsourcers with software developers and designers in Nigeria.
            </span></span></span>&nbsp;&nbsp;&nbsp;
            <br />
            <br />
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tr>
                <td width="353" align="left"><span class="style71"><span class="style741">Through imobilliare...</span></span><br /><br />
                  <span class="style74">&nbsp;<img src="images/001_21.png" width="20px" align="absmiddle" />&nbsp;&nbsp;</span> <span class="style7212">Find web designers &amp; programmers!</span> <br />
                  <span class="style74">&nbsp;<img src="images/001_21.png" width="20px" align="absmiddle" />&nbsp;&nbsp;</span> <span class="style7212">Design websites and get paid!</span> <br />
                  <span class="style74">&nbsp;<img src="images/001_21.png" width="20px" align="absmiddle" />&nbsp;&nbsp;</span> <span class="style7212">Provide your programming Services</span> <br />
                  <span class="style74">&nbsp;<img src="images/001_21.png" width="20px" align="absmiddle" />&nbsp;&nbsp;</span> <span class="style7212">Find writers to write for you!</span> <br />
                  <span class="style74">&nbsp;<img src="images/001_21.png" width="20px" align="absmiddle" />&nbsp;&nbsp;</span> <span class="style7212">Portal development services</span> <br />
                <span class="style74">&nbsp;<img src="images/001_21.png" width="20px" align="absmiddle" />&nbsp;&nbsp;</span> <span class="style7212">Find Data Entry personnel</span> <br /></td>
              <td width="255" align="left" valign="middle">
                <img src="images/liquorice.jpg" width="168" height="102" /><br />
                <a href="index.php?fid=<?php echo FEATURE::getId('User');?>&us=<?php echo USERTYPE::getUserTypeId('Employer');?>"><img src="images/button_ideal.png" border="0" align="absmiddle" /></a><br /><span class="style741">Get Started Now!</span><br />
                <span class="style7212">Outsource your software project</span>&nbsp;</td>
            </tr>
              <tr>
                <td align="left">&nbsp;</td>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="left">
				<div id="notifications">Loading...&nbsp;</div>
				</td>
              </tr>
            </table>
           <br /></td>
		<td width="28%" class="onlyBorderAloneInvite">
		<br />
              <span class="style7212">Tell your friends about imobilliare</span>
              <br />
              <?php
ERROR::displayTextComponent($_REQUEST['errcpj']);?>
            <form name='invite' action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
			}
			 ?>' method='POST'>


<table width='225' border='0' align='right' cellpadding='1' cellspacing='0'>
  <tr>
    <td width='217'>
	<table width='100%' class='tdstyle1444'>
	<tr>
	<td align="left"><input name='name' type='text' class='invite' id='NAME' value="My Name(s)" onFocus="if(this.value=='My Name(s)')this.value='';" onblur="if(this.value=='')this.value='My Name(s)';"  >			</td></tr></table>
    </td>
  </tr>
  <tr>
    <td width='217'>	<table width='100%'><tr><td class='fontwhite' align='left'><span><strong>*provide their email address: </strong></span>
            
			</td></tr></table>			
    </td>
  </tr>
  <tr>
    <td width='217'>	<table width='100%' class='tdstyle1444'><tr><td>
            <input name='invite1' type='text' class='invite' onFocus="if(this.value=='1st Friend (Email Address)')this.value='';" onblur="if(this.value=='')this.value='1st Friend (Email Address)';"  id='invite1' value="1st Friend (Email Address)">
			</td></tr></table>			
    </td>
  </tr>
  <tr>
    <td>
		<table width='100%' class='tdstyle1444'><tr><td>
      <input name='invite2' type='text' class='invite' id='invite2' onFocus="if(this.value=='2nd Friend (Email Address)')this.value='';" 
							onblur="if(this.value=='')this.value='2nd Friend (Email Address)';"  value="2nd Friend (Email Address)">
			</td></tr></table></td>
  </tr>
  <tr>
    <td>
		<table width='100%' class='tdstyle1444'><tr><td>
      <input name='invite3' type='text' class='invite' id='invite3' onFocus="if(this.value=='3rd Friend (Email Address)')this.value='';" 
							onblur="if(this.value=='')this.value='3rd Friend (Email Address)';"  value="3rd Friend (Email Address)">
						</td></tr></table>				  </td>
  </tr>
  <tr>
    <td>	<table width='100%' class='tdstyle1444'><tr><td>
      <input name='invite4' type='text' class='invite' id='invite4' onFocus="if(this.value=='4th Friend (Email Address)')this.value='';" 
							onblur="if(this.value=='')this.value='4th Friend (Email Address)';"  value="4th Friend (Email Address)">
			</td></tr></table>			</td>
  </tr>
  <tr>
    <td>
		<table width='100%' class='tdstyle1444'><tr><td>
            <input name='invite5' type='text' class='invite' id='invite5' onFocus="if(this.value=='5th Friend (Email Address)')this.value='';" 
							onblur="if(this.value=='')this.value='5th Friend (Email Address)';"  value="5th Friend (Email Address)">
			</td></tr></table>			
    </td>
  </tr>
  <tr>
    <td><input name='FRONTPAGE' type='submit' class='button11' value='Invite' ><br /><br /></td>
  </tr>
</table>
</form>             </td>
	  </tr>
	</table>
	

<table width="99%" border="0" cellspacing="2" cellpadding="5" align="center">
  <tr>
    <td><hr />
	
	 <?php 
		FEATURE::fView('body', NULL);
		?>
	
<hr /></td>
  </tr>
</table>

<table width="96%" border="0" cellspacing="2" cellpadding="0" align="center">
  <tr>
    <td width="25%" valign="top"><span class="style7212">Employer Links</span><br />
	<div class="cell_seperator">&nbsp;</div>
	<div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('User');?>&us=<?php echo USERTYPE::getUserTypeId('Employer');?>">Create An Outsourcer/Employer Account</a><br />
	  <div class="cell_seperator">&nbsp;<br /></div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Project');?>">Create A Project</a><br />
	  <div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Workplace');?>">Enter Workplace</a><br />
	  <div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo $empArticle['id'];?>">See Employers Page</a><br />
&nbsp;</td>


    <td width="25%" valign="top"><span class="style7212">Developer Links</span><br />
	<div class="cell_seperator">&nbsp;</div>
	<div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('User');?>&us=<?php echo USERTYPE::getUserTypeId('Developer');?>">Create A Developer/Professional Account</a><br />
	  <div class="cell_seperator">&nbsp;<br /></div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Workplace');?>">Enter Workplace</a><br />
	  <div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo $devArticle['id'];?>">See Developers Page</a>
      </td>
    <td width="25%" valign="top"><span class="style7212">imobilliare Links</span><br />
	<div class="cell_seperator">&nbsp;</div>
	<div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('User');?>&fiid=0">Read About Our Service</a><br />
	  <div class="cell_seperator">&nbsp;<br /></div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo $faqArticle['id'];?>">General Information and FAQs</a><br />
	  <div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Contact');?>">Contact Us</a><br />
	  <div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo $policyArticle['id'];?>">Policy Notes</a><br />
	  <div class="cell_seperator">&nbsp;</div>
      <a href="index.php?fid=<?php echo FEATURE::getId('Site Map');?>&fiid=<?php echo $policyArticle['id'];?>">Site Map</a><br />
&nbsp;</td>
    <td valign="top">
	
	<table width="96%" border="0" cellpadding="0" cellspacing="0">
  <?php
			echo PORTLET::displayHeader("Tips & News", "");
			?>
  </table><table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="onlyBorderAloneNews">
	<div style="text-align:right">&nbsp;</div>
	<strong>Zero Charges for project posting on imobilliare.com</strong><br />
	<div style="text-align:right">12.07.2012</div>
	<div class="cell_seperator">&nbsp;</div>
	<strong>Services on Imobilliare.com resumes</strong><br />
	<div style="text-align:right">11.07.2012</div>
	<div class="cell_seperator">&nbsp;</div>
	<em>Use the Mailing System on imobilliare.com for effective communication.</em><br />&nbsp;</td>
	<div class="cell_seperator">&nbsp;</div>
  </tr>
</table></td>
  </tr>
</table>


<table width="99%" border="0" cellspacing="2" cellpadding="5" align="center">
  <tr>
    <td align="center"><hr /><?php 
		
		FEATURE::fView('top1');
		?>&nbsp;<div align="right">
		  <?php echo $menu->displayComponent('footer1', 1);?></div><br />
		  
		  <?php
echo FOOTER::displayComponent('footer');
	?></td>
  </tr>
</table>

</td>
  </tr>
</table>