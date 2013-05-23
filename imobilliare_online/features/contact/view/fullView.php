<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
			echo PORTLET::displayHeader("About Us & Contact Information", "");
			?>
  </table>	
  
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      
                      <tr>
                        <td width="130" height="35" valign="top" class="tdstyle13"><span class="style72"><strong>Our Goal:</strong></span></td>
                        <td width="606" valign="top" class="tdstyle13 style72">To provide an interface between employers and freelancers/developers.<br>
                          To provide jobs for freelancers who may (not) have working experience. <br>
                          <br></td>
                      </tr>
                      
                      <tr>
                        <td valign="top" class="tdstyle13"><span class="style72"><strong>General Info: </strong></span></td>
                        <td valign="top" class="tdstyle13 style72">Imobilliare.com 
                          is  a web-application created to connect employers to freelancers to engage them with work, and for freelancers looking for job  opportunities from employers. Towards, this the application is aimed at providing an interface that would connect clients to  freelancers and vice versa.<br>
                          <br>
                        SyncState provides the web application &ndash; imobilliare.com.<br>
                        <br></td>
                      </tr>
                      <tr>
                        <td valign="top" class="tdstyle13"><span class="style72"><strong>Management:</strong></span></td>
                        <td valign="top" class="tdstyle13 style72">SyncState handles the management of imobilliare.com. SyncState has an experienced team who handles the affairs of imobilliare.com daily. <br>
                        <br></td>
                      </tr>
                      <tr>
                        <td valign="top" class="tdstyle13"><span class="style72"><strong>Contact Info: </strong></span></td>
                        <td valign="top" class="tdstyle13 style72"><u>email</u>: customer.support@imobilliare.com<br>
						<u>Mobile:</u> +2348102743263
                        <br></td>
                      </tr>
                    </table>
                  <span class="style10"><div align="right"></div>
                  </span><br>
                  <br /><div align="right">
                  <table width="40%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="1%" valign="top" bgcolor="#FFD325" class="tdstyle10a"><img src="images/bg11.gif" width="9" height="25" /></td>
                      <td align="left" background="images/bg9.gif" class="tdsubmenu style38 style39"><div align="left">Talk to Us </div></td>
                      <td width="1%" valign="top" bgcolor="#FFD325" class="tdstyle10a"><img src="images/bg10.gif" width="9" height="25" /></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFFCEC" class="tdstyle151"><br />
                          <br /></td>
                      <td colspan="2" align="left" bgcolor="#FFFCEC" class="tdstyle152"><table width="93%" border="0" align="left" cellpadding="5" cellspacing="5">
                          <tr>
                            <td height="269" valign="top"><?php
					
					if($_REQUEST['ksaebd']=='sasww1')
					{
						echo "<br>
<br>
<br>
<span class='style37'><font size='4'>Message Sent!</font></span><br><br><br>
<br>
<br>




						";
					}
					
					else
					{
						if($_REQUEST['ksaebd']=='saswasw1')
						{
							echo "<span class='style37'>* Error! Please Type in a message.</span>";							
						}
						
				?>
                                <br />
                                <form action="index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
			}
			 ?>" method="post">
                                  <b>Names:<br />
                                  <input name="names" type="text" class="formtextboxtype3" id="names" />
                                  <br />
                                  Email:<br />
                                  <input name="email" type="text" class="formtextboxtype3" id="email" />
                                  <br />
                                  Type in a Message: </b><br />
                                  <textarea name="message" class="formtextarea3"></textarea>
                                  <br />
                                  <br />
                                  <input name="CONTACT" type="submit" class="button11" value="Send" />
                                </form>
                              <br />
                                <?php
					  }
					  ?>
                                <div align="right">Your Message will be attended <br />
                                  to if necessary</a></div></td>
                          </tr>
                        </table>
                          <br />
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3" align="left" bgcolor="#ECE9D8" class="tdstyle3"><div align="right">Provided by Imobilliare.com Support Team </div></td>
                    </tr>
                  </table>
                <br /></div>
