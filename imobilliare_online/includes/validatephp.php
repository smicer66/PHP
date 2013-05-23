<?php
// load error handler and database configuration
require_once("varlist.php");
ob_start();
//include 'session.inc';

connect_now(1);

// Class supports AJAX and PHP web form validation
class Validate
{
	// stored database connection
	private $mMysqli;


	// constructor opens database connection
	function __construct()
	{
		$this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
//		connect_now(1);
	}

	// destructor closes database connection
	function __destruct()
	{
		$this->mMysqli->close();
		//close connection
	}

	// supports AJAX validation, verifies a single value
	public function ValidateAJAX($inputValue, $fieldID)
	{
		// check which field is being validated and perform validation
		switch($fieldID)
		{
			// Check if the username is valid
			case 'USERNAME11':
				return $this->validateUserName($inputValue);
				break;

// Check if the name is valid
			case 'PASSWORD11':
				$_SESSION['temp']['password']=$inputValue;
				return $this->validatePassword($inputValue);
				break;

// Check if a gender was selected
			case 'PASSWORD12':
				return $this->validateConfirmPassword($inputValue);
				//return $this->validateConfirmPassword($inputValue);
				break;
				
// Check if a password entered is correct
			case 'PASSWORD':
				return $this->validateRealPassword($inputValue);
				//return $this->validateConfirmPassword($inputValue);
				break;				

// Check if email is valid
			case 'EMAIL':
				return $this->validateEmail($inputValue);
				break;
				
// Check if HRLYRATE is valid
			case 'HRLYRATE':
				return $this->validateHrlyRate($inputValue);
				break;				

// Check if PROFILE is valid
			case 'PROFILE':
				return $this->validateProfile($inputValue);
				break;
				
// Check if bid msg is valid
			case 'msg':
				return $this->validateBidMsg($inputValue);
				break;
				
				
// Check if bid msg is valid
			case 'BIDPERIOD':
				return $this->validateBidPeriod($inputValue);
				break;				
				
				
				
// Check if bid msg is valid
			case 'BIDAMOUNT':
				return $this->validateBidAmount($inputValue);
				break;				
				
// Check if "I have read the terms" checkbox has been checked
			case 'chkReadTerms':
				return $this->validateReadTerms($inputValue);
				break;				
				
				

// Check if "I have read the terms" checkbox has been checked
			case 'menuName':
				//return $this->validateMenuName($inputValue);
				return $inputValue;
				break;			
				
				
// Check if "bid template name is provided for saving bid templates
			case 'BidTempName':
				return $this->validateBidTempName($inputValue);
				break;			

// Check if project name is provided for posting projects
			case 'PROJECT_NAME':
				return $this->validatePROJECT_NAME($inputValue);
				break;			

// Check if project name is provided for posting projects
			case 'PERIOD':
				return $this->validatePERIOD($inputValue);
				break;	
				
// Check if project name is provided for posting projects
			case 'PROJ_DETAIL':
				return $this->validatePROJ_DETAIL($inputValue);
				break;							


// Check if project name is provided for posting projects
			case 'SPECIFY':
				return $this->validateSPECIFY($inputValue);
				break;							
				
		}
	}

	// validates all form fields on form submit
	public function ValidatePHP()
	{
		// error flag, becomes 1 when errors are found.
		$errorsExist = 0;
		// clears the errors session flag
		if (isset($_SESSION['errors']))
		unset($_SESSION['errors']);
		// By default all fields are considered valid
		$_SESSION['errors']['USERNAME11'] = 'hidden';
		$_SESSION['errors']['PASSWORD11'] = 'style37a';
		$_SESSION['errors']['PASSWORD12'] = 'hidden';
		$_SESSION['errors']['EMAIL'] = 'hidden';
		$_SESSION['errors']['HRLYRATE'] = 'hidden';		
		$_SESSION['temp']['password']='';
		$_SESSION['errors']['PROFILE']='hidden';
		$_SESSION['errors']['msg']='hidden';	
		$_SESSION['errors']['BIDPERIOD']='hidden';
		$_SESSION['errors']['BIDAMOUNT']='hidden';				
		$_SESSION['errors']['chkReadTerms'] = 'hidden';	
		$_SESSION['values']['bidselecter']='';	
		$_SESSION['errors']['REALPASSWORD']='hidden';
		$_SESSION['errors']['PROJECT_NAME']='hidden';		
		$_SESSION['errors']['PERIOD']='hidden';
		$_SESSION['errors']['PROJ_DETAIL']='hidden';		
		$_SESSION['errors']['SPECIFY']='hidden';			
		// Validate username
		if (!$this->validateUserName($_POST['USERNAME11']))
		{
			$_SESSION['errors']['USERNAME11'] = 'style37';
			$_SESSION['values']['USERNAME11'] = $_POST['USERNAME11'];			
			$errorsExist = 1;
		}

		// Validate name
		if (!$this->validatePassword($_POST['PASSWORD11']))
		{
			$_SESSION['errors']['PASSWORD11'] = 'style37';
			$errorsExist = 1;
		}
		
		// Validate name
		if (!$this->validateRealPassword($_POST['PASSWORD']))
		{
			$_SESSION['errors']['REALPASSWORD'] = 'style37';
			$errorsExist = 1;
		}


		// Validate gender
		if (!$this->validateConfirmPassword($_POST['PASSWORD12']))
		{
			$_SESSION['errors']['PASSWORD12'] = 'style37';
			$errorsExist = 1;
		}

		// Validate email
		if (!$this->validateEmail($_POST['EMAIL']))
		{
			$_SESSION['errors']['EMAIL'] = 'style37';
			$errorsExist = 1;
		}
		

		// Validate HrlyRate
		if (!$this->validateHrlyRate($_POST['HRLYRATE']))
		{
			$_SESSION['errors']['HRLYRATE'] = 'style37';
			$errorsExist = 1;
		}
		

		//Validate Profile
		if (!$this->validateProfile($_POST['PROFILE']))
		{
			$_SESSION['errors']['PROFILE'] = 'style37';
			$errorsExist = 1;
		}
		
		
		//for posting of new project
		if (!$this->validatePROJ_DETAIL($_POST['PROJ_DETAIL']))
		{
			$_SESSION['errors']['PROJ_DETAIL'] = 'style37';
			$errorsExist = 1;
		}
		
		
		
		
		//for posting of new project
		if (!isset($_POST['SPECIFY']) || (!$this->validateSPECIFY($_POST['SPECIFY'])))
		{
			$_SESSION['errors']['SPECIFY'] = 'style37';
			$errorsExist = 1;
		}
		
		
		//Validate Bid details
		if (!$this->validateBidMsg($_POST['msg']))
		{
			$_SESSION['errors']['msg'] = 'style37';
			$errorsExist = 1;
		}		


		//Validate Bid period
		if (!$this->validateBidPeriod($_POST['period']))
		{
			$_SESSION['errors']['BIDPERIOD'] = 'style37';
			$errorsExist = 1;
		}		


		//Validate Bid amout
		if (!$this->validateBidAmount($_POST['bid']))
		{
			$_SESSION['errors']['BIDAMOUNT'] = 'style37';
			$errorsExist = 1;
		}				
		
		
		// Validate read terms
		if (!isset($_POST['prj_bid_mgmt[]']) || !$this->validateReadTerms($_POST['prj_bid_mgmt[]']))
		{
//			$_SESSION['errors']['chkReadTerms'] = 'error';
			$_SESSION['errors']['prj_bid_mgmt'] = 'error';
			$errorsExist = 1;
		}
		
		// Validate bidselecter
		if (!isset($_POST['selectBidTemp'][0]) || !$this->validateBidselecter($_POST['selectBidTemp'][0]))
		{
			$_SESSION['values']['bidselecter'] = '';
			$_SESSION['errors']['BIDSELECTOR']='hidden';
		}


		// Validate BidTempName
		if (!isset($_POST['BidTempName']) || !$this->validateBidTempName(escapeshellcmd($_POST['BidTempName'])))
		{
			$_SESSION['values']['BidTempName'] = '';
			$_SESSION['errors']['BidTempName']='hidden';
		}
		
		//validate project name for posting		
		if ((isset($_POST['PROJECT_NAME'])) && (!$this->validatePROJECT_NAME($_POST['PROJECT_NAME'])))
		{
			$_SESSION['errors']['PROJECT_NAME'] = 'style37';
			$errorsExist = 1;
		}
		
		//Validate Post project period
		if ((isset($_POST['PERIOD'])) && (!$this->validatePERIOD($_POST['PERIOD'])))
		{
			$_SESSION['errors']['PERIOD'] = 'style37';
			$errorsExist = 1;
		}

		// If no errors are found, point to a successful validation page
		if ($errorsExist == 0)
		{
//			return 'empsignup.php?ss'.$_POST['USERNAME11'];
		}
		else
		{
			// If errors are found, save current user input
			foreach ($_POST as $key => $value)
			{
				$_SESSION['values'][$key] = $_POST[$key];
			}	
	//		return 'devsignup.php';
		}
	}
	
	
	private function validateUserName($value)
	{
		// trim and escape input value
		$value = $this->mMysqli->real_escape_string(trim($value));
		// empty user name is not valid
		if ($value == null)
		return 0; // not valid
		// check if the username exists in the database
		//$query = getResult1("personnel", "id", "username", "'$value'", "1" );
		//$query=explode('||', $query);

		//if (sizeof($query) > 1)
		$query = $this->mMysqli->query('SELECT username FROM personnel ' . 'WHERE username="' . $value . '"');
		
		if ($this->mMysqli->affected_rows > 0)
		return '0'; // not valid
		else
		return '1'; // valid
	}
	

	
	private function validatePassword($value)
	{
		// trim and escape input value
//		$value = real_escape_string(trim($value));
		// password must be greater than 5 characters
		if (strlen($value)>5)
		{
			return 1; // valid
		}
		else
		{
			return '0'; // invalid
		}
	}
	
	
	private function validateConfirmPassword($value)
	{
		// trim and escape input value
//		$value = real_escape_string(trim($value));
		// password must be greater than 5 characters
		if ($value==$_SESSION['temp']['password'])
		{
			$_SESSION['temp']['password']='';
			return 1; // valid
		}
		else
		{
			return '0'; // invalid
		}
	}
	
	
	private function validateRealPassword($value)
	{
		// trim and escape input value
//		$value = real_escape_string(trim($value));
		// password must be greater than 5 characters
		$id=$_SESSION['id'];
		
			$value=md5((escapeshellcmd(strip_tags($value))));
			$query=getResult1("personnel", "username", "id", "'$id' AND password = '$value' AND status = 'Active'", "1" );
			$query=explode('||', $query);

			
			if((sizeof($query)>1))
			{
				return 1;
			}
			else
			{
				return 0;
			}
//

	}


	private function validateEmail($value)
	{

		$value = $this->mMysqli->real_escape_string(trim($value));
		// empty user name is not valid
		if ($value == null)
		return 0; // not valid
		// check if the username exists in the database
		//$query = getResult1("personnel", "id", "username", "'$value'", "1" );
		//$query=explode('||', $query);

		//if (sizeof($query) > 1)
		$query = $this->mMysqli->query('SELECT email FROM personnel ' . 'WHERE email="' . $value . '"');
		
		// valid email formats: *@*.*, *@*.*.*, *.*@*.*, *.*@*.*.*)
		if((!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $value)) || ($this->mMysqli->affected_rows > 0))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	
	private function validateProfile($value)
	{

		$value = $this->mMysqli->real_escape_string(trim($value));
		$result=no_email_http($value);
		
		if(($result!=2))
		{
			return 0;
		}
		else
		{
			return 1;
		}

	}
	
	
	
	private function validateSPECIFY($value)
	{
		// trim and escape input value
		$value = $this->mMysqli->real_escape_string(trim($value));
		// empty user name is not valid
		if ($value == null)
		return 1; // not valid
		// check if the username exists in the database
		//$query = getResult1("personnel", "id", "username", "'$value'", "1" );
		//$query=explode('||', $query);

		//if (sizeof($query) > 1)
		$value=explode(', ', $value);
		
		for($count=0; $count<(sizeof($value)); $count++)
		{
			$query = $this->mMysqli->query('SELECT id FROM personnel ' . 'WHERE userTypeId = "Developer" AND status = "Active" AND username="' . $value[$count] . '"');
			
			if ($this->mMysqli->affected_rows > 0)
			;
			else
			return '0'; // invalid
		}
		return 1;
		
	}
	
	
	private function validatePROJ_DETAIL($value)
	{

		$value = $this->mMysqli->real_escape_string(trim($value));
		$result=no_email_http($value);
		
		if(($result!=2) || (strlen($value)<1))
		{
			return 0;
		}
		else
		{
			return 1;
		}

	}
	
	
	
	private function validateHrlyRate($value)
	{
		// valid value is 'true'
		if(is_numeric($value)==1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
		
	
	private function validateBidMsg($value)
	{
		$value = $this->mMysqli->real_escape_string(trim($value));
		$result=no_email_http($value);
		
		if(($value==null) || ($result!=2))
		{
			return 0;
			$_SESSION['errors']['msg']='style37';
		}
		else
		{
			return 1;
		}
	}
	
	
	
	private function validateBidPeriod($value)
	{
		// valid value is 'true'
		if(is_numeric($value)==1)
		{
			return 1;
		}
		else
		{
			return 0;
			$_SESSION['errors']['BIDPERIOD'] = 'style37';			
		}
	}
	
	
	private function validatePERIOD($value)
	{
		// valid value is 'true'
		if((is_numeric($value)==1) && ($value<36) && ($value>-1) )
		{
			return 1;
		}
		else
		{
			return 0;
			$_SESSION['errors']['PERIOD'] = 'style37';			
		}
	}
	
	
	
	private function validateBidAmount($value)
	{
		// valid value is 'true'
		if(is_numeric($value)==1)
		{
			return 1;
		}
		else
		{
			return 0;
			$_SESSION['errors']['BIDAMOUNT'] = 'style37';			
		}
	}	
	
	
	// check the user has read the terms of use
	private function validateReadTerms($value)
	{
		// valid value is 'true'
		return ($value == 'true' || $value == 'on') ? 1 : 0;
	}
	
	
	private function validatePROJECT_NAME($value)
	{

		$value = $this->mMysqli->real_escape_string(trim($value));
		$result=no_email_http($value);
		$query=getResult1("project", "id", "header", "'$value'", "1" );
		$query=explode('||', $query);
		
		if(($result!=2) || (strlen($value)>35) || (sizeof($query)>1) || (strlen($value)==0))
		{
			return 0;
		}
		else
		{
			return 1;
		}

	}
	
	
	private function validateMenuName($value)
	{
		//  $id=$_SESSION['id'];
		$query_bid_det=getResult1("msgs_reviews_violations", "details", "type", "'Bid Template' AND status = 'Valid' AND templatename = '$value'", "1" );
		$str_bid_det=explode('||', $query_bid_det);
		if(strlen($str_bid_det[0])>0)
		{
			return $str_bid_det[0];
		}
		else
		{
			return 0;
		}
//  AND source_id = '$id'
	}
	
	
	private function validateBidTempName($value)
	{
		$value=escapeshellcmd($value);
		$id=$_SESSION['id'];
		$query=getResult1("msgs_reviews_violations", "id", "type", "'Bid Template' AND status = 'Valid' AND templatename = '$value'  AND source_id = '$id'", "1" );
		$query=explode('||', $query);
		if((sizeof($query)>1))
		{
			return 0;
		}
		else
		{
			return 1;
		}
//
		
	}
}

?>