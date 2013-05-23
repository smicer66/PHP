<?php
$menu=new Menu();
?>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td><table width="100%" border="0" cellspacing="15" cellpadding="0">
      <tr>
        <td width="22%" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php 
		FEATURE::fView('left1');
		?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td><?php 
		FEATURE::fView('left2');
		?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>		</td>
        <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            
            
            
            <tr>
              <td colspan="2"><?php
			  FEATURE::fView('body');
			  ?>&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><?php
			  FEATURE::fView('body', 1);
			  ?>&nbsp;</td>
            </tr>
            
            
          </table></td>
        </tr>
      <tr>
        <td colspan="3" valign="top"><div align="right">
		  <?php echo $menu->displayComponent('footer1', 1);?></div></td>
        </tr>
      
    </table></td>
  </tr>
  <tr>
    <td align="center"><?php
echo FOOTER::displayComponent('footer');
	?></td>
  </tr>
</table>
