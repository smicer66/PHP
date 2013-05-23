<?php
			define("CH_PORTAL_ACCESS",true);
			define("MAX_FILE_SIZE",300000000);
			define("MAX_FP_LISTINGS",10);
			define("MAX_LISTINGS",10);
			define("MAX_SPECIAL_LISTINGS",12);
			define("DIRECTORY_SEPERATOR",'/');
			define("SEARCH_PAGING",10);
			
			//emailer
			define("SMTPAUTHUSER",'');						// SMTP USERNAME - USUALLY THE SAME AS YOUR MAILBOX
			define("SMTPAUTHUSERPASS",'');					// SMTP USERNAME - USUALLY THE SAME AS YOUR MAILBOX
			define("SOCKETFROM",'FROM EMAIL');				// EMAIL ADDRESS TO APPEAR IN FROM / REPLY FIELD::: Get Email from site table
			define("SOCKETFROMNAME",'FROM NAME');			// NAME TO APPEAR IN FROM / REPLY FIELD::: Get Email from site table
			define("SOCKETHOST",'smtp.yourdomain.com');		// ALSO FROM DB
?>