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
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<?php
			echo PORTLET::displayHeader("Login Form", "");
			?>
</table>
<table width='100%' border='0' cellspacing='0' cellpadding='0' class="onlyBorderAlone defaultBgColor">
			
			<tr>
			<td colspan='5' class='portletBorder'>
			<div class='fpPortletDisplay'>
			<span class='welcomeUserText'>Welcome <?php 
				
				$user=new User();

				$userDetails=$user->getUserDetails($_SESSION['uid']);
				echo getRealDataNoHTML($userDetails['username']);?>! </span><br />
				<div class='cell_seperator'>&nbsp;</div>
				<input type='submit' name='Login_User' value='Logout'  class='button11' />
				<div class='cell_seperator'>&nbsp;</div>
				<div class='cell_seperator'>&nbsp;</div>
				
			</div>
			<?php
			if(file_exists("view/home.php"))
			{
				if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
				{
					echo "<img src='images/settings.png' border='0' height='20px' align='middle' />&nbsp;<a href='?fid=".FEATURE::getId('Project')."'>Create New Project</a><br />";
					echo "</div><div class='cell_seperator'>&nbsp;</div>";
				}
				echo "<img src='images/settings.png' border='0' height='20px' align='middle' />&nbsp;<a href='../?fid=".FEATURE::getId('User')."'>My Toolbox</a>";
				echo "</div><div class='cell_seperator'>&nbsp;</div>";
				echo "</div><div class='cell_seperator'>&nbsp;</div>";
			}
			else
			{
				if(USER::getUserTypeId($_SESSION['uid'])!=USERTYPE::getUserTypeId('RPS'))
				{
					//echo "<img src='images/settings.png' border='0' height='20px' align='middle' />&nbsp;<a href='administrator/?fid=".ADMINISTRATOR::getAdminFunctionId('home')."'>My Portal Grid</a><br />";
					if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
					{
						echo "<img src='images/settings.png' border='0' height='20px' align='middle' />&nbsp;<a href='?fid=".FEATURE::getId('Project')."'>Create New Project</a><br />";
						echo "</div><div class='cell_seperator'>&nbsp;</div>";
					}					
				}
				echo "<img src='images/settings.png' border='0' height='20px' align='middle' />&nbsp;<a href='?fid=".FEATURE::getId('User')."'>My Toolbox</a>";
				echo "</div><div class='cell_seperator'>&nbsp;</div>";
				echo "</div><div class='cell_seperator'>&nbsp;</div>";
			}
			
			?>
			
			</td>
			</tr>
			</table>
				
			</form>