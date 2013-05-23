<?php


class Portlet
{
	function __construct()
	{
	
	}
	
	function displayHeader($title, $minuteText)
	{
		return "<tr>
		<td class='tdstyle10a' width='1%' align='right' ><img src='images/bg11.gif'/></td>
		<td class='tdsubmenu style38 style39'><div align='left'>".$title."</td>
		<td width='1%' valign='top' bgcolor='#FFD325' class='tdstyle10a'><img src='images/bg10.gif' width='9' height='25'></td>
        <td width='31%' class='tdsubmenu1' style='text-align:right'>". $minuteText."&nbsp;</td>
        <td width='9%' class='tdsubmenu1'>&nbsp;</td>
	  	</tr>";
	}

}
?>