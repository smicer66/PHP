<?php

	error_reporting(0);
	include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/includes_class.php");
	$includes=new Includes();
	$includes->includeFiles();
	//echo $_SERVER['QUERY_STRING'];
	$header=new Header();
	$header->todo($_SERVER['QUERY_STRING'], $_REQUEST['fiid']);
	
	
	global $active_template;
			
	$active_template=new Template();
	$active_template->setActiveTemplate();
	$template="template/".$active_template->tempName."/".$active_template->tempFilePath;

		//echo $_SESSION['section'];
	$prjLastIndex=PROJECT::getLastProjectId();
	
	//echo $_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."template/".str_replace(' ', '', $active_template->tempName)."/".str_replace(' ', '', $active_template->tempFilePath);
	@include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."template/".str_replace(' ', '', $active_template->tempName)."/".str_replace(' ', '', $active_template->tempFilePath));
	

?>


<!--d//goto the db check for the site table and -->