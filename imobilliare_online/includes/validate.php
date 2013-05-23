<?php
// start PHP session
	require_once('error_handler.php');
	
require_once("../lib/lib.php");
require_once("../lib/lib_special.php");
require_once("../lib/lib_util.php");
include_once("../includes/mysqli.php");
include_once("../includes/db.php");
require_once ('validate.class.php');
//include_once("../includes/session.inc");
//;

// Create new validator object
$validator = new Validate();
// read validation type (PHP or AJAX?)
$validationType = '';

if (isset($_GET['validationType']))
{
	$validationType = $_GET['validationType'];
}

// AJAX validation or PHP validation?
if ($validationType == 'php')
{	
	// PHP validation is performed by the ValidatePHP method, which returns
	// the page the visitor should be redirected to (which is allok.php if
	// all the data is valid, or back to index.php if not)
	//header("Location:" . $validator->ValidatePHP());
//	header("Location: allok.php");
		$response =
		'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' .
			'<response>' .
				'<result>' .
					$validator->ValidateAJAX($_POST['inputValue'], $_POST['fieldID'], $_POST['inputValue2'], $_POST['fieldID2']) .
				'</result>' .
				'<fieldid>' .
					$_POST['fieldID'] .
				'</fieldid>' .
			'</response>';
			
		if(ob_get_length()) ob_clean();
		header('Content-Type: text/xml');
		echo $response;
	
}



else
{
	// AJAX validation is performed by the ValidateAJAX method. The results
	// are used to form an XML document that is sent back to the client
//	$_SESSION['selectId']=$_POST['inputValue'];
	//$_SESSION['selectId']="sdk;sk";
	
		$response =
		'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' .
			'<response>' .
				'<result>' .
					$validator->ValidateAJAX($_POST['inputValue'], $_POST['fieldID']) .
				'</result>' .
				'<fieldid>' .
					$_POST['fieldID'] .
				'</fieldid>' .
			'</response>';
	
		// generate the response
		if(ob_get_length()) ob_clean();
		header('Content-Type: text/xml');
		echo $response;
	
}
/*<?php

// start PHP session
session_start();
// load error handling script and validation class
require_once ($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."error_handler.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."validate.class.php");
// Create new validator object
$validator = new Validate();
// read validation type (PHP or AJAX?)
$validationType = '';
if (isset($_GET['validationType']))
{
$validationType = $_GET['validationType'];
}
// AJAX validation or PHP validation?
if ($validationType == 'php')
{
// PHP validation is performed by the ValidatePHP method, which returns
// the page the visitor should be redirected to (which is allok.php if
// all the data is valid, or back to index.php if not)
header("Location:" . $validator->ValidatePHP());
}
else
{
// AJAX validation is performed by the ValidateAJAX method. The results
// are used to form an XML document that is sent back to the client
$response =
'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' .
'<response>' .
'<result>' .
$validator->ValidateAJAX($_POST['inputValue'], $_POST['fieldID']) .
'</result>' .
'<fieldid>' .
$_POST['fieldID'] .
'</fieldid>' .
'</response>';
// generate the response
if(ob_get_length()) ob_clean();
	header('Content-Type: text/xml');
	echo $response;
	
}
?>*/?>