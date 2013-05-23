<?php
	// load the error handling module
//	session_destroy();
	require_once('error_handler.php');
require_once("../lib/lib.php");
require_once("../lib/lib_special.php");
require_once("../lib/lib_util.php");
include_once("../includes/session.inc");
include_once("../includes/mysqli.php");
include_once("../includes/db.php");
include_once("../lib/lib_util.php");
include_once("../features/model/features_class.php");
include_once("../features/user/model/user_class.php");
include_once("../includes/session.inc");
include_once("../core/error/error_class.php");
//include_once("../component/email/email_class.php");
include_once("../utilities/util.php");




$error=new Error();

	// make sure the user's browser doesn't cache the result
	/*header('Expires: Wed, 23 Dec 1980 00:30:00 GMT'); // time in the past
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-cache, must-revalidate');
	header('Pragma: no-cache');*/
	// read the action parameter
	$action = $_GET['action'];
	$style = $_GET['style'];
	// get news
	global $mysql;
	
	if ($action == 'Logo')
	{
		if(isset($_SESSION['fileid0']) && (strlen($_SESSION['fileid0'])>2))
		{
			$unique=$_SESSION['fileid0'];			
			$query=getResult1("files", "id", "unique_id", $unique, "1" );
			$str=explode('||', $query);
			$query=getResult1("files", "filename", "id", $str[0], "1" );
			$str_name=explode('||', $query);
			
			echo "<strong>File Uploaded - </strong>[".$str_name[0]."] ";
			echo "<strong><a href='javascript:;' onClick='javascript:window.open(\"upload_pro.php?jjsjs=isso\",\"Win1\",\"width=500,height=400\")'>
Upload a different file</a></strong>";
		}
		else 
		{
			if((isset($_REQUEST['confirmation']) && ($_REQUEST['confirmation']==2)))
			{

			}
			else 
			{
				echo "<strong><a href='javascript:;' onClick='javascript:window.open(\"upload_pro.php?jjsjs=isso\",\"Win1\",\"width=500,height=400\")'>
Upload File</a></strong>";
			}
		}
		
	}
	else if($action=='SelectCompose')
	{
		
		if((isset($_SESSION['selected'])) && (strlen($_SESSION['selected'])>0))
		{
			echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1' value='".$_SESSION['selected']."' onchange='validate2(this.value, this.id)'>";
			echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
	   echo "View Available Developers</a>   </span><br>
<b><font color='blue'>e.g. john, paul, damien</font></b><br>
";
		}
		else 
		{
			echo "";
			/*
			$id_pers_type=$_SESSION['id'];
			$query_type=getResult1("personnel", "personnel_type", "id", "'$id_pers_type'", "1" );
			$query_type=explode('||', $query_type);
			if(($query_type[0]=='Employer'))
			{
				if(isset($_SESSION['particulars']))
				{
					$msgng=$_SESSION['particulars'];
					$from2whom=explode('csccs', $msgng);
					
					if((is_numeric($from2whom[1])==1))
					{
						$whom=getResult1("personnel", "username", "id", "'$from2whom[1]'", "1" );
						$whom=explode('||', $whom);
					}
					if((isset($whom)) && (strlen($whom[0])>0))
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1' value='".$whom[0]."'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
				echo "View Available Developers</a>   </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";	
					}
					else
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
						echo "View Available Developers</a>   </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";
					}
				}
			}
			else if($query_type[0]=='Administrator')
			{
				if(isset($_SESSION['particulars']))
				{
					$msgng=$_SESSION['particulars'];
					$from2whom=explode('csccs', $msgng);
					
					if((is_numeric($from2whom[1])==1))
					{
						$whom=getResult1("personnel", "username", "id", "'$from2whom[1]'", "1" );
						$whom=explode('||', $whom);
					}
					if((isset($whom)) && (strlen($whom[0])>0))
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1' value='".$whom[0]."'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
				echo "View Available Developers</a>   </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";	
					}
					else
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
						echo "View Available Developers</a><a href='#' onClick='javascript:window.open(\"emplist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
						echo "View Available Employers</a>  </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";
					}
				}
			}
			
			
			else
			{
				if(isset($_SESSION['particulars']))
				{
					$msgng=$_SESSION['particulars'];
					$from2whom=explode('csccs', $msgng);
					
					if((is_numeric($from2whom[1])==1))
					{
						$whom=getResult1("personnel", "username", "id", "'$from2whom[1]'", "1" );
						$whom=explode('||', $whom);
					}
					if((isset($whom)) && (strlen($whom[0])>0))
					{
						$id=$_SESSION['msg_idd'];
						$srcid=$_SESSION['id'];
						$query_rf=getResult1("msgs_reviews_violations", "subject", "id", "'$id' AND source_id = '$srcid'", "1" );
						$query_rf=explode('||', $query_rf);
						if(sizeof($query_rf)>1)
						{	
							echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1'>";
							echo "<a href='#' onClick='javascript:window.open(\"emplist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
							echo "View Available Employers</a>   </span><br>
		<b><font color='blue'>e.g. john, paul, damien</font></b><br>";
						}
						else
						{
							echo $whom[0];
						}
					}
				}
			}			
			*/
		}
	}
	
	else if($action=='createProject')
	{
		
		if((isset($_SESSION['selected'])) && (strlen($_SESSION['selected'])>0))
		{
			echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1' value='".$_SESSION['selected']."' onchange='validate2(this.value, this.id)'>";
			echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
	   echo "View Available Developers</a>   </span><br>
<b><font color='blue'>e.g. john, paul, damien</font></b><br>
";
		}
		else 
		{
			echo "";
			/*
			$id_pers_type=$_SESSION['id'];
			$query_type=getResult1("personnel", "personnel_type", "id", "'$id_pers_type'", "1" );
			$query_type=explode('||', $query_type);
			if(($query_type[0]=='Employer'))
			{
				if(isset($_SESSION['particulars']))
				{
					$msgng=$_SESSION['particulars'];
					$from2whom=explode('csccs', $msgng);
					
					if((is_numeric($from2whom[1])==1))
					{
						$whom=getResult1("personnel", "username", "id", "'$from2whom[1]'", "1" );
						$whom=explode('||', $whom);
					}
					if((isset($whom)) && (strlen($whom[0])>0))
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1' value='".$whom[0]."'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
				echo "View Available Developers</a>   </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";	
					}
					else
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
						echo "View Available Developers</a>   </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";
					}
				}
			}
			else if($query_type[0]=='Administrator')
			{
				if(isset($_SESSION['particulars']))
				{
					$msgng=$_SESSION['particulars'];
					$from2whom=explode('csccs', $msgng);
					
					if((is_numeric($from2whom[1])==1))
					{
						$whom=getResult1("personnel", "username", "id", "'$from2whom[1]'", "1" );
						$whom=explode('||', $whom);
					}
					if((isset($whom)) && (strlen($whom[0])>0))
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1' value='".$whom[0]."'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
				echo "View Available Developers</a>   </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";	
					}
					else
					{
						echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1'>";
						echo "<a href='#' onClick='javascript:window.open(\"devlist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
						echo "View Available Developers</a><a href='#' onClick='javascript:window.open(\"emplist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
						echo "View Available Employers</a>  </span><br>
	<b><font color='blue'>e.g. john, paul, damien</font></b><br>";
					}
				}
			}
			
			
			else
			{
				if(isset($_SESSION['particulars']))
				{
					$msgng=$_SESSION['particulars'];
					$from2whom=explode('csccs', $msgng);
					
					if((is_numeric($from2whom[1])==1))
					{
						$whom=getResult1("personnel", "username", "id", "'$from2whom[1]'", "1" );
						$whom=explode('||', $whom);
					}
					if((isset($whom)) && (strlen($whom[0])>0))
					{
						$id=$_SESSION['msg_idd'];
						$srcid=$_SESSION['id'];
						$query_rf=getResult1("msgs_reviews_violations", "subject", "id", "'$id' AND source_id = '$srcid'", "1" );
						$query_rf=explode('||', $query_rf);
						if(sizeof($query_rf)>1)
						{	
							echo "<input name='SPECIFY' id='SPECIFY' type='text' class='formelement1'>";
							echo "<a href='#' onClick='javascript:window.open(\"emplist.html\",\"Win1\",\"scrollbars=yes,width=500,height=400\")'>";
							echo "View Available Employers</a>   </span><br>
		<b><font color='blue'>e.g. john, paul, damien</font></b><br>";
						}
						else
						{
							echo $whom[0];
						}
					}
				}
			}			
			*/
		}
	}
	
	else if($action=='Select')
	{
		if($style==1)
		{
			if(isset($_POST['inputValue']))
			{
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_category` WHERE `status` = '1' AND `projectTypeId` = '".$_POST['inputValue']."'";
				$sql= $mysql->query($str);
				
				if($mysql->num_rows ==0)
				{
				
				}
				else
				{
					echo "<select id='project_specifics' name='project_specifics' class='formtextboxtype2'>
					<option value='NULL'>--Select One--</option>";
					
					while($result = $mysql->fetch_assoc_mine($sql))
					{
						echo "<option value='".$result['id']."'>".getRealDataNoHTML($result['name'])."</option>";
					}
					echo "</select>";
					
				}
			}
		}
		else if($style==2)
		{
			if(isset($_POST['inputValue']))
			{
				echo "Feature Child:<br />";
				
			
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `id` = '".$_POST['inputValue']."'";
				//echo $str;
				$sql= $mysql->query($str);
				
				
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					
					include_once("../features/".strtolower(str_replace(" ", "", getRealDataNoHTML($result['name'])))."/model/".strtolower(str_replace(" ", "", getRealDataNoHTML($result['name'])))."_class.php");
					
					
						$tablename=strtolower(str_replace(" ", "_", getRealDataNoHTML($result['name'])));
						$str=ucfirst(strtolower(str_replace(" ", "", getRealDataNoHTML($result['name']))));
					
					$obj=new $str();	
					
					
					
					
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tablename."` WHERE (`status` = '1' OR `status` = 'Active'  OR `status` = 'Valid')";
					//echo $strX;
					
					
					$sqlX= $mysql->query($strX);
					while($resultX = $mysql->fetch_assoc_mine($sqlX))
					{
						
						
						$obj->previewLink($resultX['id'],NULL, 1);
						
					}
					
				}
			}
		}
		
		else if($style==3)
		{
			if(isset($_POST['inputValue']))
			{
				echo "<select name='parentMenu' id='parentMenu'>";
				echo append_option_menu_items($_POST['inputValue'], NULL);
				echo "</select>";
			}
		}
		else if($style==4)
		{
			if(isset($_POST['inputValue']))
			{
				include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/architecture/architecture_class.php");		
				$architecture=new Architecture();
				$tableName=$architecture->getDetails($_POST['inputValue']);
				$tableName=$tableName['name'];
				echo "Select A Child:<br /><select name='layer' id='layer'>";
				echo append_option_section_items($tableName);
				echo "</select>";
			}
		}
		else if($style==5)
		{
			if(isset($_POST['inputValue']))
			{
				echo "<input name='userfile1' type='file' id='userfile1' />";
			}
		}
		else if($style==6)
		{
			if(isset($_POST['inputValue']))
			{
				echo "&nbsp;";
			}
			
		}
		else if($style==55)
		{
			if(isset($_POST['inputValue']))
			{
				echo "<input name='userfile1' type='file' id='userfile1' /><br />
				<input name='Add_Images' type='submit' id='Update' value='OK' />";
			}
		}
		else if($style==65)
		{
			if(isset($_POST['inputValue']))
			{
				echo "&nbsp;";
			}
			
		}
		else if($style==7)
		{
			if(isset($_POST['inputValue']))
			{
				echo "<input name='userfile' type='file' id='userfile' />";
			}
		}
		else if($style==8)
		{
			if(isset($_POST['inputValue']))
			{
				echo "<input name='userfile2' type='file' id='userfile2' />";
			}
		}
		else if($style==9)
		{
			if(isset($_POST['inputValue']))
			{
				if($_POST['inputValue']=='NULL')
				{
					$countryId='NULL';
					echo "<select name='location_specifics' id='location_specifics'>";
					echo append_option_locations(NULL,NULL);
					echo "</select>";
				}
				else
				{
					echo "<select name='location_specifics' id='location_specifics'>";
					echo append_option_locations(NULL,$_POST['inputValue']);
					echo "</select>";
				}
				
			}
		}
		else if($style==408)
		{
			global $mysql;
			if(isset($_POST['inputValue']))
			{
				
				if($_POST['inputValue']=='NULL')
				{
					
				}
				else
				{
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_type` WHERE (status = '1' AND name != 'Jobs') ORDER BY name";
					$sqlX= $mysql->query($strX);
					
					if($mysql->num_rows==0)
					{
						
					}
					else
					{
						echo "<br /><strong>Select A Pricing Choice:</strong> <select name='pricingChoice' id='pricingChoice'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						
						$selected='';
						while($result = $mysql->fetch_assoc_mine($sqlX))
						{
							$strXT="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE (`status` = '1' AND `billingTypeId` = '".$result['id']."' AND `dateEffected` < CURRENT_TIMESTAMP) ORDER BY `dateEffected` DESC LIMIT 0, 1";
							//echo $strXT;
							$sqlXT= $mysql->query($strXT);
							$resultT = $mysql->fetch_assoc_mine($sqlXT);
							$listingCost=$resultT['amountPerDay'] * $_POST['inputValue'];
							echo "<option value='".$resultT['id']."' $selected>".$result['name']." - ".number_format($listingCost).".00 Naira</option>";
							$selected='';
							
						}
						echo "</select>";	
					
					}
					
					
				}
				
			}
		}
		else if($style==409)
		{
			global $mysql;
			if(isset($_POST['inputValue']))
			{
				
				if($_POST['inputValue']=='NULL')
				{
					
				}
				else
				{
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_type` WHERE (status = '1' AND name = 'Jobs') ORDER BY name";
					$sqlX= $mysql->query($strX);
					
					if($mysql->num_rows==0)
					{
						
					}
					else
					{
						echo "<br /><strong>Select A Pricing Choice:</strong> <select name='pricingChoice' id='pricingChoice'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						
						$selected='';
						while($result = $mysql->fetch_assoc_mine($sqlX))
						{
							$strXT="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE (`status` = '1' AND `billingTypeId` = '".$result['id']."' AND `dateEffected` < CURRENT_TIMESTAMP) ORDER BY `dateEffected` DESC LIMIT 0, 1";
							//echo $strXT;
							$sqlXT= $mysql->query($strXT);
							$resultT = $mysql->fetch_assoc_mine($sqlXT);
							$listingCost=$resultT['amountPerDay'] * $_POST['inputValue'];
							echo "<option value='".$resultT['id']."' $selected>".$result['name']." - ".number_format($listingCost).".00 Naira</option>";
							$selected='';
							
						}
						echo "</select>";	
					
					}
					
					
				}
				
			}
		}
		else if($style==10)
		{
			if(isset($_POST['inputValue']))
			{
				
				if($_POST['inputValue']=='NULL')
				{
					$countryId='NULL';
					echo "<select name='state' id='state'>";
					echo append_option_state($_SESSION['ship']['state'], $countryId);
					echo "</select>";
				}
				else
				{
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE (`status` = '1' AND `countryId` = '".$_POST['inputValue']."') ORDER BY name";
					$sqlX= $mysql->query($strX);
					$arrayList=array();
					$arrayIdList=array();
					
					if($mysql->num_rows==0)
					{
						echo "<select name='state' id='state'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						echo "</select>";				
						echo "<input name='state1' type='text' id='state' value='".getRealDataNoHTML($_SESSION['ship']['state1'])."'/>";
					}
					else
					{
						echo "<select name='state' id='state'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						while($result = $mysql->fetch_assoc_mine($sqlX))
						{
							array_push($arrayList,$result['name']);
							array_push($arrayIdList,$result['stateCode']);
						}
						$selected='';
						for($count=0;$count<sizeof($arrayList);$count++)
						{
							echo "<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
							$selected='';
						}
						echo "</select>";				
//						echo "<input name='state1' type='text' id='state' value=".$_SESSION['ship']['state1']."/>";		
					}
					//options should be gotten from the positions table
					
					
				}
				
			}
		}
		else if($style==11)
		{
			if(isset($_POST['inputValue']))
			{
				
				if($_POST['inputValue']=='NULL')
				{
					$countryId='NULL';
					echo "<select name='state' id='state'>";
					echo append_option_state($_SESSION['ship']['state'], $countryId);
					echo "</select>";
				}
				else
				{
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE (`status` = '1' AND `countryId` = '".$_POST['inputValue']."') ORDER BY name";
					$sqlX= $mysql->query($strX);
					$arrayList=array();
					$arrayIdList=array();
					
					if($mysql->num_rows==0)
					{
						echo "<select name='state' id='state'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						echo "</select>";				
						echo "&nbsp;&nbsp;Not Listed? Provide:<input name='state1' type='text' id='state'/>";
					}
					else
					{
						echo "<select name='state' id='state'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						while($result = $mysql->fetch_assoc_mine($sqlX))
						{
							array_push($arrayList,getRealDataNoHTML($result['name']));
							array_push($arrayIdList,$result['id']);
						}
						$selected='';
						for($count=0;$count<sizeof($arrayList);$count++)
						{
							echo "<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
							$selected='';
						}
						echo "</select>";				
//						echo "<input name='state1' type='text' id='state' value=".$_SESSION['ship']['state1']."/>";		
					}
					//options should be gotten from the positions table
					
					
				}
				
			}
		}
		else if($style==20)
		{
			if(isset($_POST['inputValue']))
			{
				echo "<input name='userfile' type='file' id='userfile' />";
			}
		}
		
		
		else if($style==21)
		{
			if(isset($_POST['inputValue']))
			{
				echo "&nbsp;";
			}
			
		}
		
		else if($style==18)
		{
			if(isset($_POST['inputValue']))
			{
				
				if($_POST['inputValue']=='NULL')
				{
					$countryId='NULL';
					echo "<select name='state' id='state'>";
					echo append_option_state($_SESSION['ship']['state'], $countryId);
					echo "</select>";
				}
				else
				{
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE (`status` = '1' AND `countryId` = '".$_POST['inputValue']."') ORDER BY name";
					$sqlX= $mysql->query($strX);
					$arrayList=array();
					$arrayIdList=array();
					
					if($mysql->num_rows==0)
					{
						echo "<select name='state' id='state'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						echo "</select>";				
						echo "&nbsp;&nbsp;Not Listed? Provide:<input name='state1' type='text' id='state'/>";
					}
					else
					{
						echo "<select name='state' id='state'>";
						echo "<option value='NULL' selected='selected'>--Select One--</option>";						
						while($result = $mysql->fetch_assoc_mine($sqlX))
						{
							array_push($arrayList,getRealDataNoHTML($result['name']));
							array_push($arrayIdList,$result['id']);
						}
						$selected='';
						for($count=0;$count<sizeof($arrayList);$count++)
						{
							echo "<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
							$selected='';
						}
						echo "</select>";				
//						echo "<input name='state1' type='text' id='state' value=".$_SESSION['ship']['state1']."/>";		
					}
					//options should be gotten from the positions table
					
					
				}
				
			}
		}
		if($style==12)
		{
			if(isset($_POST['inputValue']))
			{
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_category` WHERE `status` = '1' AND `projectTypeId` = '".$_POST['inputValue']."'";
				$sql= $mysql->query($str);
				
				if($mysql->num_rows ==0)
				{
				
				}
				else
				{
					echo "<span class='textBodyStyle2'>Project Specifics</span><br /><select id='project_specifics' name='project_specifics' class='formtextboxtype2'>
					<option value='NULL'>--Select One--</option>";
					
					while($result = $mysql->fetch_assoc_mine($sql))
					{
						echo "<option value='".$result['id']."'>".getRealDataNoHTML($result['name'])."</option>";
					}
					echo "</select>";
				}
			}
		}
		
		else if($style==12)
		{
			if(isset($_POST['inputValue']))
			{
				echo "Feature Child:<br />";
				
			
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `id` = '".$_POST['inputValue']."'";
				//echo $str;
				$sql= $mysql->query($str);
				
				
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					//@include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/".strtolower($result['name'])."/".strtolower($result['name'])."_class.php");
					@include_once("../../../features/".strtolower($result['name'])."/".strtolower($result['name'])."_class.php");
					
					$tablename=strtolower(str_replace(" ", "_", $result['name']));
					$str=ucfirst(strtolower($tablename));
					$obj=new $str();	
					
					
					$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tablename."` WHERE (`status` = '1' OR `status` = 'Active')";
					//echo $strX;
					$sqlX= $mysql->query($strX);
					while($resultX = $mysql->fetch_assoc_mine($sqlX))
					{
						echo "<a href='javascript:;' onClick='javascript:window.open(\"../../../core/preview/preview.php?featureId=".$_POST['inputValue']."&linkToFeatureId=".$resultX['id']."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";
						$obj->findLink($resultX['id'],NULL);
						echo '<br /></a>';
					}
					
				}
			}
		}
		else if($style==18590)
		{
			if(isset($_POST['inputValue']))
			{
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user`, `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE ".DEFAULT_DB_TBL_PREFIX."_user.status = 'Active' AND ".DEFAULT_DB_TBL_PREFIX."_usertype.status = '1' AND ".DEFAULT_DB_TBL_PREFIX."_user.userTypeId =  ".DEFAULT_DB_TBL_PREFIX."_usertype.id AND ".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Developer'";
				//echo $str;
				$sql= $mysql->query($str);
				$devNo=$mysql->num_rows;
				//echo $devNo;
				
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user`, `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE ".DEFAULT_DB_TBL_PREFIX."_user.status = 'Active' AND ".DEFAULT_DB_TBL_PREFIX."_usertype.status = '1' AND ".DEFAULT_DB_TBL_PREFIX."_user.userTypeId =  ".DEFAULT_DB_TBL_PREFIX."_usertype.id AND ".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Employer'";
				
				$sql= $mysql->query($str);
				$empNo=$mysql->num_rows;
				
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project`";
				
				$sql= $mysql->query($str);
				$prjNo=$mysql->num_rows;/**/
				
				echo "<span style='font-size:17px; color:#ff6600'><strong>".$devNo." Software Developers & Designers Signed Up&nbsp;&nbsp;&nbsp;&nbsp;<br />".$empNo." Project Outsourcers Signed Up<br />".$prjNo." Projects posted!</strong></span>";
			}
		}
		
		else if($style==15)
		{
			if(isset($_POST['inputValue']))
			{
				
				
				$strT="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `id` = '".$_POST['inputValue']."'";
				$sqlT= $mysql->query($strT);
				$resultT = $mysql->fetch_assoc_mine($sqlT);
				
				//@include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/".strtolower($result['name'])."/".strtolower($result['name'])."_class.php");
				if($resultT['name']=='Frontpage')
				{
					
				}
				
				
					
				
				
				
				
				$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `status` = '1' AND `featureId` = '".$_POST['inputValue']."' GROUP BY `featureId`";
				//$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `status` = '1' GROUP BY `featureId`";
				//echo $query;
				$sql=$mysql->query($query);
				if($mysql->num_rows==0)
				{

					$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
					$sql=$mysql->query($query);
					if($mysql->num_rows==0)
					{
						
					}
					else
					{
						
						echo "<table width='100%' border='0' cellspacing='0' cellpadding='5'>";
						echo "<tr><td align='left' colspan='2'>No menus mapped to this feature. To map menu(s) to this feature, or to change the mapping <a href='menu_mapper.php'>click here</a></td></tr>";						
						
						echo "</table>";
					}			
				}
				else
				{
					
					
					while($result = $mysql->fetch_assoc_mine($sql))
					{
						//echo $result['featureId']."<br />";
						$queryR="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `status` = '1' AND `featureId` = '".$result['featureId']."' GROUP BY `featureChildId`";
						//echo $queryR;
						$sqlR=$mysql->query($queryR);
						while($resultR = $mysql->fetch_assoc_mine($sqlR))
						{
							//echo $resultR['featureChildId']."<br />";
							$queryZ="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `status` = '1' AND `featureId` = '".$result['featureId']."' AND `featureChildId` = '".$resultR['featureChildId']."' AND `position` != ''";
							//echo $queryZ;
							$sqlZ=$mysql->query($queryZ);
							$numRows=$mysql->num_rows;
							
							$featureD=new Feature();
							$featureD=$featureD->getDetails($_POST['inputValue']);
							if($featureD['name']=='Frontpage')
							{
								echo " ";
							}
							else
							{
								@include_once("../features/".strtolower($featureD['name'])."/model/".strtolower($featureD['name'])."_class.php");
								$tablename=strtolower(str_replace(" ", "_", $featureD['name']));
								$str=ucfirst(strtolower($tablename));
								$obj=new $str();
								$strT="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tablename."` WHERE (`status` = '1' OR `status` = 'Active') AND `id` = '".$resultR['featureChildId']."'";
								
								$sqlT= $mysql->query($strT);
								$resultT = $mysql->fetch_assoc_mine($sqlT);
								echo "<table width='100%' border='1' cellspacing='0' cellpadding='5'>";
								if($numRows>0)
								{
									echo "<tr><td colspan='2' class='cellShade1'><strong><strong>Feature Entry: </strong>";
									$obj->previewLink($resultT['id'],NULL, 0);
									echo "</strong></td></tr>";
									echo "<tr><td width='20%' align='left' class='cellType2'><strong>Menu</strong></td>
									<td align='left' class='cellType2'><strong>Position</strong></td></tr>";
								}
								echo "</table>";
							}	
									
								echo "<table width='100%' border='1' cellspacing='0' cellpadding='5'>";
								while($resultZ = $mysql->fetch_assoc_mine($sqlZ))
								{
									$queryX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated' AND `id` = '".$resultZ['menuId']."'";
									$sqlX=$mysql->query($queryX);
									$resultX = $mysql->fetch_assoc_mine($sqlX);
									
									$queryZ1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `id` = '".$resultZ['id']."'";
								//echo $queryZ;
									$sqlZ1=$mysql->query($queryZ1);
									$resultZ1 = $mysql->fetch_assoc_mine($sqlZ1);
									echo "<tr><td width='20%' align='left'><strong>".$resultX['name']."</strong></td>
									<td align='left'><em>".$resultZ1['position']."</em></td></tr>";
									
									
								}
								echo "</td></tr></table><br />";
							
						
						}
						
						
						/*
						$queryX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = '1' AND `id` = '".$result['menuId']."'";
						$sqlX=$mysql->query($queryX);
						
						$featureD=new Feature();
						$featureD=$featureD->getDetails($result['id']);
						@include_once("../features/".strtolower($featureD['name'])."/".strtolower($featureD['name'])."_class.php");
						$tablename=strtolower(str_replace(" ", "_", $featureD['name']));
						$str=ucfirst(strtolower($tablename));
						$obj=new $str();	
						
						
						$strT="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tablename."` WHERE (`status` = '1' OR `status` = 'Active') AND 'id' = '".$result['featureChildId']."'";
						echo $strT;
						$sqlT= $mysql->query($strT);
						$resultT = $mysql->fetch_assoc_mine($sqlT);
						
						echo "<tr><td width='20%' align='left' colspan='2'>".$obj->previewLink($resultT['id'],NULL)."</td>
						</tr>";	
						while($resultX = $mysql->fetch_assoc_mine($sqlX))
						{
							echo "<tr><td width='20%' align='left'>".$resultX['name']."</td>
							<td align='left'><select name='position".$resultX['id']."'>".append_option_menu_position($resultX['position'])."</select></td></tr>";		
						}				*/
					}
				}	
				
				/*
				
				$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
				$sql=$mysql->query($query);
				if($mysql->num_rows==0)
				{
					
				}
				else
				{
					
					echo "<div id='linker' name='linker'><table width='100%' border='0' cellspacing='0' cellpadding='5'>";
					while($result = $mysql->fetch_assoc_mine($sql))
					{
						$queryX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `status` = '1' AND `menuId` = '".$result['id']."'";
						$sqlX=$mysql->query($queryX);
						$resultX = $mysql->fetch_assoc_mine($sqlX);
						echo "<tr><td width='20%' align='left'>".$result['name']."</td>
						<td align='left'><select name='position".$result['id']."'>".append_option_menu_position($resultX['position'])."</select></td>
						</tr>";						
					}
					
					echo "</div></table>";
				}	*/
			}
		}
		else if($style==16)
		{
			if(isset($_POST['inputValue']))
			{
				
				
				echo "as";
			}
		}
		else if($style==17)
		{
			if(isset($_POST['inputValue']))
			{
				
				
				$strT="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `id` = '".$_POST['inputValue']."'";
				$sqlT= $mysql->query($strT);
				$resultT = $mysql->fetch_assoc_mine($sqlT);
				
				//@include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/".strtolower($result['name'])."/".strtolower($result['name'])."_class.php");
				if($resultT['name']=='Frontpage')
				{
					
				}
				else
				{
					echo "<strong>Select Feature Child:</strong><br />";
					@include_once("../features/".str_replace(' ', '', strtolower($resultT['name']))."/model/".str_replace(' ', '', strtolower($resultT['name']))."_class.php");
					
					$tablename=strtolower(str_replace(" ", "_", $resultT['name']));
					$classname=strtolower(str_replace(" ", "", $resultT['name']));
					$str=ucfirst(strtolower($classname));
					$obj=new $str();	
					
					
					$strT="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tablename."` WHERE (`status` = '1' OR `status` = 'Active' OR `status` = 'Valid')";
					
					$sqlT= $mysql->query($strT);
					while($resultT1 = $mysql->fetch_assoc_mine($sqlT))
					{
						echo "<a href='javascript:;' onClick='javascript:window.open(\"../../../core/preview/preview.php?featureId=".FEATURE::getId($resultT['name'])."&linkToFeatureId=".$resultT1['id']."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";
						$obj->previewLink($resultT1['id'],NULL, 1);
						echo '</a>';
					}
					echo "<br /><br />";
				}
				
				$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
				$sql=$mysql->query($query);
				if($mysql->num_rows==0)
				{
					
				}
				else
				{
					
					echo "<table width='100%' border='0' cellspacing='3' cellpadding='5'>";
					echo "<tr><td width='20%' align='left' class='cellType2'><strong>Menu</strong></td>
					<td align='left' class='cellType2'><strong>Select Position</strong></td>
					</tr>";	
					while($result = $mysql->fetch_assoc_mine($sql))
					{
						echo "<tr><td width='20%' align='left' class='cellType11'>".$result['name']."</td>
						<td align='left'><select name='position".$result['id']."'>".append_option_menu_position()."</select></td>
						</tr>";						
					}
					
					echo "</table>";
				}			
				
				
				
			}
		}
		else if($style==19)
		{
			if(isset($_POST['inputValue']))
			{
				
				@include_once("../features/Jobs/model/jobs_class.php");
				echo adjustImageUrlToViewLife(JOBS::getAdvertForAdmin($_POST['inputValue']));
				
				echo "<br /><br />";
				
				
				
			}
		}
		else if($style==900)
		{
			@include_once("../features/project/model/project_class.php");
			@include_once("../features/message/model/message_class.php");
			global $mysql;
			if(isset($_SESSION['uid']))
			{
				echo "<table width='372' border='0' cellspacing='0' cellpadding='4'>
				<tr>
				  <td width='120' bgcolor='#777F7F' class='tdstyle13c'><div align='center' class='style69'>Quick Access Panel:</div></td>
				  <td class='tdstyle13d'><div align='right'><a href='?fid=".FEATURE::getId('Project')."'>";
				  
				
				$newProjects=PROJECT::getProjectsGreaterThan($_REQUEST['lastPrjId']);
				echo $newProjects;
				echo " New Projects!</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				
				$msgsql=MESSAGE::getUnreadMessages($_SESSION['uid']);
				$newMailsCount=0;
				while($result = $mysql->fetch_assoc_mine($msgsql))
				{
					$newMailsCount++;
				}
				echo "<a href='?fid=".FEATURE::getId('Message')."'>".$newMailsCount;
				echo " Unread Messages!</a>";
				echo "</div></td>
				  </tr>
			  </table>";
			}
			else
			{
				echo " ";
			}
		}
	}
	else
	{
		echo 'Communication error: server doesn\'t understand command.';
	}
	
	
	
	
	
	
?>