<center><br />
<br />
<br />
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
<table width='50%' border='0' cellspacing='0' cellpadding='0'>
			<?php
			echo PORTLET::displayHeader("Forgotten My Password:", "");
			?>
			</table>
			<table width="50%" border="0" align="center" cellpadding="1" cellspacing="0" class="onlyBorderAlone defaultBgColor">	
			<tr>
			<td colspan='5' class='portletBorder' align="center">
			<div class='fpPortletDisplay'>
			<br />
			<div class='cell_seperator'>&nbsp;</div>
			<label>Provide The Email Used During Your Registration:</label>
			<br />
			<input type='text' name='email' class='textfield' /><br />
			<div class='cell_seperator'>&nbsp;</div>
			<div class='cell_seperator'>&nbsp;</div>
			<input type='submit' name='Problems_Login' value='Retrieve' class='button' /><br />
			<?php
			echo "<div class='cell_seperator'>&nbsp;</div>";
			echo "<div class='cell_seperator'>&nbsp;</div>";
			
			?>
			</td></tr>
			</table>
			</form>
			</center>