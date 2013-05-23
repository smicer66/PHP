<form id='loginForm' name='loginForm' method='post' action='<?php
$loginAddy='index.php';
if(strlen($_SERVER['QUERY_STRING'])>0)
{
	$loginAddy=$loginAddy."?".$_SERVER['QUERY_STRING'];

}
echo $loginAddy;
?>
'><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
			echo PORTLET::displayHeader("Login Form", "");
			?>
  </table>	
	<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" class="onlyBorderAlone defaultBgColor">	
	<tr>
	<td><br />
	<div align="left"><strong>Id:</strong> <br />
                              <input name="username" type="text" class="formtextboxtype4" id="username" />
                      </div></td>
              </tr>
              <tr>
                <td><div align="left"><strong>Password:<br />
                          </strong>
                          <input type='password' name='password' class='formtextboxtype6' /></div></td>
              </tr>
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                      <td class="tdstyle1444"><div align="left">
                        <input type='submit' name='Login_User' value='Login' class='button11' />
                        <br />
                        <?php
			echo "<div class='cell_seperator'>&nbsp;</div>";	
			$problems=new Problems();
			$problems->displayTextLink();
		
			echo "<div class='cell_seperator'>&nbsp;</div>";
			
			$toolbox=new Toolbox();
			$toolbox->displayTextLink();
			
			echo "<div class='cell_seperator'>&nbsp;</div>";
			
			$register=new Register();
			$register->displayTextLink();
			echo "</div><div class='cell_seperator'>&nbsp;</div>";
			echo "</div><div class='cell_seperator'>&nbsp;</div>";
			
			?>
                      </div>
                </td>
              </tr>
            </table>
	  </td>
	  </tr>
  </table>
</form>