<script language="javascript" type="text/javascript">
function addReceipient(str)
{
	var str1=document.getElementById('to').value;
	if(str1.length>0)
	{
		document.getElementById('to').value=document.getElementById('to').value + "; " + str;
	}
	else
	{
		document.getElementById('to').value=str;
	}
}


function clearField(field)
{
	document.getElementById(field).value='';
}
</script>


<?php
$allUsers=USER::getAllUsers();
$userDetailsMe=USER::getUserDetails($_SESSION['uid']);
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#FFFCEC" class="tdstyle151"><br>
            <br></td>
        <td colspan="4" bgcolor="#FFFCEC" class="tdstyle152"><u><br>
            
			
		<form name='compose' action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			}
			else
			{
			}
			 ?>' method='post'>
		<label>Compose a Message:<br>
        <br>
        </label></u>
        <table width='95%' border='0' cellspacing='0' cellpadding='0'>
       
		<tr>
			<td width="15%" valign='top'><label>To: </label></td>
			<td width="49%" align="left">
			<input name='to' type='text' id='to' class='formtextboxtype1' value='' readonly="1">&nbsp;<a href='javascript:clearField("to")'>Clear Receipients</a><br />
			<span class="warningText">Use The Receipient Selector ==></span>
			<!--<input name='TO' id='SPECIFY' type='text' class='formtextboxtype1' 
			
			
			<a href='javascript:;' onclick='javascript:window.open("devlist.php","Win1","scrollbars=yes,width=500,height=400")'>Select Developers available</a>-->			</td>
			<td width="36%" rowspan="5" align="left" valign="top"><span class="warningText">Receipient Selector [Choose Receipient By Clicking]<br />
			</span>
			  <div style="height:150px; overflow-y:scroll; background-color:#FFFFFF;">
                <table width="100%" border="0" cellspacing="3" cellpadding="5">
                  <?php
			  for($count=0;$count<sizeof($allUsers);$count++)
			  {
			  ?>
                  <tr>
                    <td style="background-color: #FDF7DF;"><a href='javascript:addReceipient("<?php  echo $allUsers[$count]['username'];?>");' class="link_type2">
                      <?php  echo $allUsers[$count]['username'];?>
                    </a></td>
                  </tr>
                  <?php
			  }
			  ?>
                </table>
	        </div></td>
		</tr>
		
		
		<tr>
        <td class='tdstyle16'>&nbsp;</td>
        <td class='tdstyle16'>&nbsp;</td>
        </tr>
		<tr>
        <td valign='top'><label>Subject: </label></td>
		<td valign='top'>
		<input name='SUBJECT' type='text' id='msg' class='formtextboxtype1' value=''>
		</u><br></td>
        </tr>
		<tr>
		  <td valign='top'>&nbsp;</td>
		  <td valign='top'>&nbsp;</td>
		  </tr>
		<tr>
		  <td colspan="2" valign='top'><label>Message:</label><br>

	    
		<textarea name='MSG' class='formtextarea1' id='PROFILE'><?php echo $_COOKIE['formCompose']['msg'];?></textarea>&nbsp;&nbsp;</td>
		  </tr>
		<tr>
		  <td colspan="3" valign='top'>&nbsp;</td>
		  </tr>
        </table>
		<input name='MESSAGE' type='submit' class='button12' value='Send' ><br /><br />
        <br>
		</form></td>
      </tr>
    </table>