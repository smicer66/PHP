<?php
// load error handler and database configuration
// Class supports AJAX and PHP web form validation
//require_once ('config.php');

//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib_special.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib_util.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/session.inc");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."/scripts/varlist.php");

class Validate
{
	//
	// supports AJAX validation, verifies a single value
	public function ValidateAJAX($inputValue, $fieldID, $inputValue2=NULL, $fieldID2=NULL)
	{
		global $mysql; 
		// check which field is being validated and perform validation
		switch($fieldID)
		{
			// Check if the username is valid
			case 'txtUsername':
			return $this->validateUserName($inputValue);
			break;
			// Check if the Password is valid
			case 'txtPassword':
			$_SESSION['temp']['password']=$inputValue;
			return $this->validatePassword($inputValue);
			break;
			// Check if the Password is valid
			case 'txtCPassword':
			return $this->validateCPassword($inputValue, $inputValue2);
			break;
			// Check if the Firstname is valid
			case 'txtName':
			return $this->validateName($inputValue);
			break;
			//Check if dob is selected
			case 'dateOfBirth':
			return $this->validateDateOfBirth($inputValue);
			break;
			// Check if the Lastname is valid
			case 'txtLastName':
			return $this->validateLastname($inputValue);
			break;
			// Check if the Firstname is valid
			case 'txtFirstname':
			return $this->validateFirstname($inputValue);
			break;
			// Check if the Address1 is valid
			case 'txtAddress1':
			return $this->validateAddress1($inputValue);
			break;
			// Check if a gender was selected
			case 'selGender':
			return $this->validateGender($inputValue);
			break;
			// Check if a gender was selected
			case 'state':
			return $this->validateState($inputValue);
			break;
			// Check if a User Type was selected
			case 'selUserType':
			return $this->validateUserType($inputValue);
			break;
			// Check if a User Type was selected
			case 'selDepartments':
			return $this->validateDepartments($inputValue);
			break;
			// Check if email is valid
			case 'txtEmail':
			return $this->validateEmail($inputValue);
			break;
			// Check if phone is valid
			case 'txtPhone':
			return $this->validatePhone($inputValue);
			break;
			//check hrly rate
			case 'HRLYRATE':
			return $this->validateHRLYRATE($inputValue);
			break;
			//check hrly rate
			case 'PROFILE':
			return $this->validatePROFILE($inputValue);
			break;
			// Check if section Child is valid
			case 'section':
			return $this->validateSection($inputValue);
			break;
			// Check if section Child is valid
			case 'PASSWORD':
			return $this->validatePasswordById($inputValue);
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
		$_SESSION['errors']['txtName'] = 'hidden';
		$_SESSION['errors']['txtPassword'] = 'hidden';
		$_SESSION['errors']['txtCPassword'] = 'hidden';
		$_SESSION['errors']['txtFirstname'] = 'hidden';
		$_SESSION['errors']['txtLastname'] = 'hidden';
		$_SESSION['errors']['txtAddress1'] = 'hidden';
		$_SESSION['errors']['selGender'] = 'hidden';
		$_SESSION['errors']['selUserType'] = 'hidden';
		$_SESSION['errors']['selDepartments'] = 'hidden';
		$_SESSION['errors']['txtEmail'] = 'hidden';
		$_SESSION['errors']['txtPhone'] = 'hidden';
		$_SESSION['errors']['state'] = 'hidden';
		$_SESSION['errors']['HRLYRATE'] = 'hidden';
		$_SESSION['errors']['PASSWORD'] = 'hidden';
		
		// Validate username
		if (!$this->validateUserName($_POST['txtUsername']))
		{
			$_SESSION['errors']['txtUsername'] = 'error';
			$errorsExist = 1;
		}
		// Validate Password
		if (!$this->validatePassword($_POST['txtPassword']))
		{
			$_SESSION['errors']['txtPassword'] = 'error';
			$errorsExist = 1;
		}
		// Validate CPassword
		if (!$this->validateCPassword($_POST['txtCPassword']))
		{
			$_SESSION['errors']['txtCPassword'] = 'error';
			$errorsExist = 1;
		}
		// Validate Firstname
		if (!$this->validateName($_POST['txtFirstname']))
		{
			$_SESSION['errors']['txtName'] = 'error';
			$errorsExist = 1;
		}
		// Validate Lastname
		if (!$this->validateLastname($_POST['txtLastname']))
		{
			$_SESSION['errors']['txtLastname'] = 'error';
			$errorsExist = 1;
		}
		// Validate Firstname
		if (!$this->validateLastname($_POST['txtFirstname']))
		{
			$_SESSION['errors']['txtFirstname'] = 'error';
			$errorsExist = 1;
		}
		// Validate Othername
		if (!$this->validateAddress1($_POST['txtAddress1']))
		{
			$_SESSION['errors']['txtAddress1'] = 'error';
			$errorsExist = 1;
		}
		// Validate HRLYRATE
		if (!$this->validateHRLYRATE($_POST['HRLYRATE']))
		{
			$_SESSION['errors']['HRLYRATE'] = 'error';
			$errorsExist = 1;
		}
		// Validate gender
		if (!$this->validateGender($_POST['selGender']))
		{
			$_SESSION['errors']['selGender'] = 'error';
			$errorsExist = 1;
		}
		// Validate Country
		if (!$this->validateState($_POST['state']))
		{
			$_SESSION['errors']['state'] = 'error';
			$errorsExist = 1;
		}
		// Validate Country
		if (!$this->validateSection($_POST['section']))
		{
			$_SESSION['errors']['section'] = 'error';
			$errorsExist = 1;
		}
		// Validate UserType
		if (!$this->validateUserType($_POST['selUserType']))
		{
			$_SESSION['errors']['selUserType'] = 'error';
			$errorsExist = 1;
		}
		// Validate Deparments
		if (!$this->validateDepartments($_POST['selDepartments']))
		{
			$_SESSION['errors']['selDepartments'] = 'error';
			$errorsExist = 1;
		}
		// Validate email
		if (!$this->validateEmail($_POST['txtEmail']))
		{
			$_SESSION['errors']['txtEmail'] = 'error';
			$errorsExist = 1;
		}
		// Validate phone
		if (!$this->validatePhone($_POST['txtPhone']))
		{
			$_SESSION['errors']['txtPhone'] = 'error';
			$errorsExist = 1;
		}
		//Validate Password by id
		if (!$this->validatePasswordById($_POST['PASSWORD']))
		{
			$_SESSION['errors']['PASSWORD'] = 'error';
			$errorsExist = 1;
		}
		
		// If no errors are found, point to a successful validation page
		if ($errorsExist == 0)
		{
			
			
		}
		else
		{
			// If errors are found, save current user input
			foreach ($_POST as $key => $value)
			{
				$_SESSION['values'][$key] = $_POST[$key];
			}
			return 'register1.php';
		}
	}
	// validate user name (must be empty, and must not be already registered)
	private function validateUserName($value)
	{
		// trim and escape input value
		global $mysql;
		//$value = $mysql->real_escape_string(trim($value));
		// empty user name is not valid
		if ($value == null)
		return 0; // not valid
		// check if the username exists in the database
		$query = $mysql->query('SELECT username FROM `'.DEFAULT_DB_TBL_PREFIX.'_user` ' . 'WHERE `username` = "' . $value . '"');
		
		if ($mysql->num_rows > 0)
		return 0; // valid
		else
		return 1;
	}
	// validate user name (must be empty, and must not be already registered)
	private function validatePasswordById($value)
	{
		// trim and escape input value
		global $mysql;
		//$value = $mysql->real_escape_string(trim($value));
		// empty user name is not valid
		if ($value == null)
		return 0; // not valid
		// check if the username exists in the database
		$query = $mysql->query('SELECT username FROM `'.DEFAULT_DB_TBL_PREFIX.'_user` ' . 'WHERE `password` = "' . md5($value) . '" AND status = "Active"');
		
		if ($mysql->num_rows > 0)
		return 0; // valid
		else
		return 1;
	}
	// validate Password
	private function validatePassword($value)
	{
		// trim and escape input value
		$_SESSION['temp']['password']=$value;
		$value = trim($value);
		// empty user name is not valid
		if (strlen($value) >=6)
		return 1; // valid
		else
		return 0; // not valid
	}
	
	// validate Password
	private function validateCPassword($value, $value2)
	{
		// trim and escape input value
		$value = trim($value);
		// empty user name is not valid
		if (strlen($value) >=6)
		{
			if($value2 !=$value)
			//if(($_SESSION['temp']['password'])!=$value)
			{
				return 0;
			}
			else
			{
				return 1;
			}
		}
		else
		{
			return 0; // not valid
		}
	}
	
	
	// validate Firstname
	private function validateName($value)
	{
		// trim and escape input value
		$value = trim($value);
		// empty user name is not valid
		if ($value)
		return 1; // valid
		else
		return 0; // not valid
	}
	// validate Firstname
	private function validateDateOfBirth($value)
	{
		// trim and escape input value
		$value = trim($value);
		// empty user name is not valid
		if ($value)
		return 1; // valid
		else
		return 0; // not valid
	}
	// validate Lastname
	private function validateLastname($value)
	{
		// trim and escape input value
		$value = trim($value);
		// empty user name is not valid
		if ($value)
		return 1; // valid
		else
		return 0; // not valid
	}
	// validate Firstname
	private function validateFirstname($value)
	{
		// trim and escape input value
		$value = trim($value);
		// empty user name is not valid
		if ($value)
		return 1; // valid
		else
		return 0; // not valid
	}
	// validate Othername
	private function validateAddress1($value)
	{
		// trim and escape input value
		$value = trim($value);
		// empty user name is not valid
		if ($value)
		return 1; // valid
		else
		return 0; // not valid
	}
	// validate gender
	private function validateGender($value)
	{
		// user must have a gender
		if($value=='NULL')
		{
			return 0;
		}
		else
		{
			return 1;
		}
		//return ($value == '0') ? 0 : 1;
	}
	
	// validate country
	private function validateState($value)
	{
		// user must have a gender
		if($value=='NULL')
		{
			return 0;
		}
		else
		{
			return 1;
		}
		//return ($value == '0') ? 0 : 1;
	}
	
	// validate country
	private function validateSection($value)
	{
		// user must have a gender
		if($value=='NULL')
		{
			return 0;
		}
		else
		{
			return 1;
		}
		//return ($value == '0') ? 0 : 1;
	}

	// validate UserType
	private function validateUserType($value)
	{
		// UserType must be non-null
		return ($value == 'NULL' || $value < 1) ? 0 : 1;
	}
	// validate Departments
	private function validateDepartments($value)
	{
		// UserType must be non-null
		return ($value == 'NULL' || $value < 1) ? 0 : 1;
	}
	// validate email
	private function validateEmail($value)
	{
		global $mysql;
		// valid email formats: *@*.*, *@*.*.*, *.*@*.*, *.*@*.*.*)
		
//		preg_match('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $value, $matches, PREG_OFFSET_CAPTURE);
		
	///	if()
		
		//if ($matches[0][0]!= $value))
		if (!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $value))
			return 0;
		// check if the username exists in the database
		$query = $mysql->query('SELECT email FROM `'.DEFAULT_DB_TBL_PREFIX.'_user`' . 'WHERE email="' . $value . '"');
		if ($mysql->num_rows > 0)
		return '0'; // not valid
		else
		return '1'; // valid
	}
	// validate phone
	private function validatePhone($value)
	{
		// valid phone format: ###-###-#####
		if(strlen($value)==0) return 0;
		else return 1;
//		return (!eregi('^[+]-*[0-9]$', $value)) ? 0 : 1;
	}
	
	
	private function validatePROFILE($value)
	{
		// valid phone format: ###-###-#####
		if(strlen($value)<5)
		{
			return 0;
		}
		else 
		{
			return 1;
		}
//		return (!eregi('^[+]-*[0-9]$', $value)) ? 0 : 1;
	}
	
	
	private function validateHRLYRATE($value)
	{
		// valid phone format: ###-###-#####
		if(strlen($value)==0)
		{
			return 0;
		}
		else 
		{
			if(is_numeric($value)!=1)
			{
				return 0;
			}
			else
			{
				return 1;
			}
		}
//		return (!eregi('^[+]-*[0-9]$', $value)) ? 0 : 1;
	}
	
	// username
	private function getValue($val)
	{
		// trim and escape input value
		$val = trim($val);
		// empty user name is not valid
		return $val; // valid
	}
}


?>