<br />
<br />
<form id='loginForm' name='loginForm' method='post' action='

<?php
$loginAddy='index.php';
if(strlen($_SERVER['QUERY_STRING'])>0)
{
	$loginAddy=$loginAddy."?".$_SERVER['QUERY_STRING'];

}
echo $loginAddy;
?>
'>
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="14">
    <tr>
      <td><table width='60%' border='0' align="center" cellpadding='0' cellspacing='0' >
          <?php
			echo PORTLET::displayHeader("Login Form", "");
			?>
			</table>
			<table width='60%' border='0' align="center" cellpadding='0' cellspacing='0' class="onlyBorderAlone defaultBgColor" >
          <tr>
            <td colspan='5' class='portletBorder'><div class='fpPortletDisplay'>
              <br />
              <div class='cell_seperator'>&nbsp;</div>
              <label>Username:&nbsp;&nbsp;&nbsp;</label>
              <input type='text' name='username' class='textfield' />
              <br />
              <div class='cell_seperator'>&nbsp;</div>
              <div class='cell_seperator'>&nbsp;</div>
              <label>Password:&nbsp;&nbsp;&nbsp;</label>
              <input type='password' name='password' class='textfield' />
              <br />
              <div class='cell_seperator'>&nbsp;</div>
              <div class='cell_seperator'>&nbsp;</div>
              <input type='submit' name='Login_User' value='Login' class='button' />
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
			
			?>          <br />
            <table width='80%' height="105" border='0' align="center" cellpadding='0' cellspacing='0'>
              <tr>
                <td colspan='3'><label></label>
                  <span class="textBodyStyle2">Please log in using your valid Id and password in order to access the features 
                      available on the portal. If you do not have an account yet, click on the <a href="index.php?fid=<?php echo FEATURE::getId('user')."&register=1";?>">link</a> in order to 
                      register as an agent, or a real project searcher</span></td>
              </tr>
            </table></td>
          </tr>
            </table>        
      </td>
    </tr>
  </table>
  <div align="center"><br />
  <br />
    <br />
            </div>
</form>