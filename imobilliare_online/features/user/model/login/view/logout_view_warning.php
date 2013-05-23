
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader("Register For An Account", "");
?>
</table>

<table width='100%' border='0' cellspacing='5' cellpadding='5'  class="onlyBorderAlone defaultBgColor">
<tr><div style="width:30">
<td colspan='5'>
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
				<span class='textBodyStyle4'>You will have to log out first of all in order to create an account. <br />To log out, please click on the <?Php echo "<a href='index.php?fid=".FEATURE::getId('User')."&logout=1&us1=".$_REQUEST['us']."'>";?>link</a>. </span><br />
				<div class='cell_seperator'>&nbsp;</div>
				<input type='submit' name='Login_User' value='Logout'  class='button' />
				<div class='cell_seperator'>&nbsp;</div>
				<div class='cell_seperator'>&nbsp;</div>
				
			</div>
</form>
</td>
</tr>
		</table>