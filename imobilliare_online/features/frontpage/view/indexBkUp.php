<?php
$faqArticle=ARTICLES::getArticleDetails('FAQs');
$devArticle=ARTICLES::getArticleDetails('Developers');
$empArticle=ARTICLES::getArticleDetails('Employers!');
$policyArticle=ARTICLES::getArticleDetails('Policy Note');
?>
<table width="924" height="582" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="192" height="582" valign="top" bgcolor="#333333"><br />
        <br />
        <br />
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" cellpadding="4" cellspacing="0" class="homeborder2">
                <tr>
                  <td width="180" bgcolor="#FFCC00"><div align="center"><br />
                          <br />
                          <a href="index.php"><img src="images/imob.png" width="144" height="26" border="0" align="middle" /></a><br />
                          <span class="style73">Employers connect Developers </span> <br />
                          <br />
                          <br />
                  </div></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="4" cellspacing="0" class="homeborder4">
                <tr>
                  <td width="180" height="97" valign="top" bgcolor="#FFEDB7"><p><br />
                          <span class="style72">Register as a:</span><br />
                          <br />
                          <span class="textstyle22"><span class="style74">&#8226; </span>&nbsp;</span><a href="?fid=<?php echo FEATURE::getId('User')?>&us=<?php echo USERTYPE::getUserTypeId('Developer');?>">Developer</a><br class="cell_seperator" />
                          <span class="textstyle22"><span class="style74">&#8226; </span>&nbsp;</span><a href="?fid=<?php echo FEATURE::getId('User')?>&us=<?php echo USERTYPE::getUserTypeId('Employer');?>">Outsourcer/Employer</a><br />
                          <br />
                  </p></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="4" cellspacing="0" class="homeborder4">
                <tr>
                  <td width="180" height="118" valign="top" bgcolor="#FFE79D" class="homeborder5"><p><span class="style72">Member Link </span> </p>
                      <div class='cell_seperator'>&nbsp;</div>
                    <span class="textstyle22"><span class="style74">&#8226; </span>&nbsp;</span><a href="?fid=<?php echo FEATURE::getId('Project')."&list&bt=2";?>">View Open Projects</a>
                      <!--<div class='cell_seperator'>&nbsp;</div>
                    <span class="textstyle22"><span class="style74">&#8226; </span>&nbsp;</span><a href="viewvacancies.php">View Job Vacancies </a>-->
                      <div class='cell_seperator'>&nbsp;</div>
                    <span class="textstyle22"><span class="style74">&#8226; </span>&nbsp;</span><a href="?fid=<?php echo FEATURE::getId('Project');?>">Post a Project </a>
                      <!--<div class='cell_seperator'>&nbsp;</div>
                    <span class="textstyle22"><span class="style74">&#8226; </span>&nbsp;</span><a href="postvacancy.php">Post a Job Vacancy </a><br />-->
					<div class='cell_seperator'>&nbsp;</div>
                    <span class="textstyle22"><span class="style74">&#8226; </span>&nbsp;</span><a href="?fid=<?php echo FEATURE::getId('Contact');?>">Read About our Service</a><br />
                      </p></td>
                </tr>
            </table></td>
          </tr>
        </table>
      <br /></td>
    <td valign="top" class="homeborder1"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="picindex">
      <tr>
        <td colspan="2" bgcolor="#FFCC00"><br /><br /><div align="right">
          <?php 
		//SEARCH::displayFPFeature();
		FEATURE::fView('top2');
		?>
        </div>
              <br />
              <hr align="right" width="340" color="#FFFFFF" />
              <?php

if(!isset($_SESSION['id']))
{
	echo "<div align='right'><a href='?fid=".FEATURE::getId('Articles')."&fiid=".$empArticle['id']."' class='link_type6'>Employers Page</a>&nbsp;&nbsp;&nbsp; <a href='?fid=".FEATURE::getId('Articles')."&fiid=".$devArticle['id']."'  class='link_type6'>Developers Page</a>&nbsp;&nbsp;&nbsp;<a href='?fid=".FEATURE::getId('Articles')."&fiid=".$faqArticle['id']."'  class='link_type6'>FAQ</a>&nbsp;&nbsp;&nbsp; </div>";
}
                  
				  
				  else 
				  {
				  	echo "<div align='right'><a href='postproject.php' class='link_type6'>Post A Project</a>&nbsp;&nbsp;&nbsp; <a href='postvacancy.php'>Post A Job Vacancy</a> &nbsp;&nbsp;&nbsp;<a href='index.php?uuiideje=opalsk'>Logout</a>&nbsp;&nbsp;&nbsp;</div>";
				  }
				  
				  ?>
              <hr align="right" width="340" color="#FFFFFF" /></td>
      </tr>
    </table>
        <table width="468" height="288" cellpadding="4" cellspacing="0" bordercolor="#666666">
          <tr>
            <td width="473" height="286" align="right" valign="top" bgcolor="#FFFFFF" class="tdstyleIndex2"><br />
                <table width="432" border="0" align="right" cellpadding="4" cellspacing="0">
                  <tr>
                    <td colspan="2" align="left"><span class="style63 font"><br />
                      </span><span class="textstyle22"><span class="style71"> <span class="style75">imobilliare connects outsourcers with developers<br />
                        and professionals.<br />
                      </span></span></span><br /></td>
                  </tr>
                  <tr>
						<td width="246" align="left"><span class="textstyle22"><span class="style71"><span class="style741">Through imobilliare...</span></span><br />
                          <span class="style74">&#8226; </span>&nbsp; <span class="style7212">Find web designers & programmers!</span> <br />
                          <!--<span class="style74">&#8226; </span>&nbsp; <span class="style7212">Post Job vacancies!</span><br />-->
                          <span class="style74">&#8226; &nbsp;</span> <span class="style7212">Design websites and get paid!</span> <br />
                          <!--<span class="style74">&#8226; </span>&nbsp; <span class="style74">Find computer related job vacancies!</span></td>-->
						  <span class="style74">&#8226; &nbsp;</span> <span class="style7212">Provide your programming Services</span> <br />
						  <span class="style74">&#8226; &nbsp;</span> <span class="style7212">Write & be paid!</span> <br />
						  <span class="style74">&#8226; &nbsp;</span> <span class="style7212">Photography Services</span> <br />
						  <span class="style74">&#8226; &nbsp;</span> <span class="style7212">Find Data Entry providers</span> <br />
                    <td width="170" align="left" valign="middle"><img src="images/liquorice.jpg" width="168" height="102" /></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left"><div align="center"><a href="?fid=<?php echo FEATURE::getId('Workplace');?>" class="link_type5">Enter Workplace </a></div></td>
                  </tr>
                </table>
              <p class="style63 font"><br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
              </p></td>
          </tr>
        </table>
      <table width="403" border="0" cellpadding="0" cellspacing="0" class="picindex">
          <tr>
            <td><img src="images/index1.png" width="78" height="77" /></td>
            <td><img src="images/index2.png" width="78" height="77" /></td>
            <td><img src="images/index3.png" width="78" height="77" /></td>
            <td><img src="images/index4.png" width="78" height="77" /></td>
            <td><img src="images/index5.png" width="78" height="77" /></td>
            <td><img src="images/index6.png" width="78" height="77" /></td>
          </tr>
      </table>
    <br />
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">
		<span class="textstyle22"><span class="style71"><span class="style741">Currently recruiting developers!</span></span></span> <br />
<a href="?fid=<?php echo FEATURE::getId('User')?>&us=<?php echo USERTYPE::getUserTypeId('Developer');?>" class="link_type5">Sign Up Now</ </td>
      </tr>
    </table></td>
    <td width="323" valign="top"><table width="219" height="66" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="211"><?php 
		FEATURE::fView('left2');
		?></td>
          </tr>
      </table>
      <table width="253" height="66" border="0" cellpadding="4" cellspacing="0" class="onlyBorderAlone1 defaultBgColor">
          <tr>
            <td width="253" bgcolor="#FFFCEC"><span class="style10 style77"><br />
              Tell your friends about imobilliare
              <br />
              </span><?php
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


<table width='225' border='0' align='left' cellpadding='1' cellspacing='0'>
  <tr>
    <td width='217'>
	<table width='100%' class='tdstyle1444'>
	<tr>
	<td>
	<div align='left'><strong>My Name(s): </strong><br>
            <input name='name' type='text' class='formtextboxtype1' id='NAME'>
			</td></tr></table>
    </div></td>
  </tr>
  <tr>
    <td width='217'>	<table width='100%'><tr><td class='fontwhite'><span align='left'><strong>*provide their email address: </strong></span>
            
			</td></tr></table>			
    </div></td>
  </tr>
  <tr>
    <td width='217'>	<table width='100%' class='tdstyle1444'><tr><td><div align='left'><strong>1st Friend: </strong><br>
            <input name='invite1' type='text' class='formtextboxtype1' id='invite1'>
			</td></tr></table>			
    </div></td>
  </tr>
  <tr>
    <td>
		<table width='100%' class='tdstyle1444'><tr><td><strong>2nd Friend: <br>
    </strong>
      <input name='invite2' type='text' class='formtextboxtype1' id='invite2'>
			</td></tr></table></td>
  </tr>
  <tr>
    <td>
		<table width='100%' class='tdstyle1444'><tr><td><strong>3rd Friend: <br>
    </strong>
      <input name='invite3' type='text' class='formtextboxtype1' id='invite3'>
						</td></tr></table>
						</td>
  </tr>
  <tr>
    <td>	<table width='100%' class='tdstyle1444'><tr><td>
	<strong>4th Friend: <br>
    </strong>
      <input name='invite4' type='text' class='formtextboxtype1' id='invite4'>
			</td></tr></table>
			</td>
  </tr>
  <tr>
    <td>
		<table width='100%' class='tdstyle1444'><tr><td>
		<div align='left'>
    <strong>5th Friend: <br>
        </strong>
            <input name='invite5' type='text' class='formtextboxtype1' id='invite5'>
			</td></tr></table>			
    </div></td>
  </tr>
  <tr>
    <td><input name='FRONTPAGE' type='submit' class='button11' value='Invite' ><br /><br /></td>
  </tr>
</table>
</form></td>
          </tr>
      </table>
      <table width="241" height="32" border="0" cellpadding="4" cellspacing="0">
          <tr>
            <td width="232" height="32" align="center"><span class="style78"><a href="?fid=<?php echo FEATURE::getId('Articles')."&fiid=".$policyArticle['id'];?>">policy</a>&nbsp; &nbsp; <a href="?fid=<?php echo FEATURE::getId('Articles')."&fiid=".$devArticle['id'];?>">developers</a>&nbsp; &nbsp; <a href="?fid=<?php echo FEATURE::getId('Articles')."&fiid=".$empArticle['id'];?>">employers</a>&nbsp; &nbsp; <a href="?fid=<?php echo FEATURE::getId('Articles')."&fiid=".$faqArticle['id'];?>">faq<br />
            </a></span>&copy; imobilliare 2008 </td>
          </tr>
      </table></td>
  </tr>
</table>
<?php
ob_start();
?>