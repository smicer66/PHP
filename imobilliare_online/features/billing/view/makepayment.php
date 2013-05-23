<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php

	  	$str_t="Add Funds To My Account";
		
			echo PORTLET::displayHeader($str_t, "");
			?>
</table>	
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="">
    <tr>
      <td  bgcolor='#FFFCEC' class='tdstyle152 tdstyle151'><br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> 
<input type="hidden" name="cmd" value="_xclick"> <!-- You would need to change the 'youremail@domain.com' to your email address--> 
<input type="hidden" name="business" value="smicer66@gmail.com"> 
<input type="hidden" name="lc" value="US"> 
<input type="hidden" name="item_name" value="Payment for Services">
<input type="hidden" name="currency_code" value="USD"> 
<input type="hidden" name="button_subtype" value="services"> 
<input type="hidden" name="no_note" value="0"> 
<input type="hidden" name="cn" value="Add special instructions to the seller"> 
<input type="hidden" name="no_shipping" value="2"> 
<input type="hidden" name="weight_unit" value="lbs"> 
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHosted"> 

<table> <tr><td>Enter Amount Here</td></tr><tr><td>
<input type="text" name="amount" maxlength="60"></td></tr> </table> 
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> 
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> 
</form>
        <br>
<br></td>
    </tr>
  </table>
