<?php


class Updates
{
	public $tempName, $status, $dateCreated, $creator, $tempFilePath, $cssFilePath;

	function __construct()
	{

	}
	
	function includeReqdFiles()
	{
		include_once("../../../lib/lib.php");
		include_once("../../../lib/lib_special.php");
		include_once("../../../includes/mysqli.php");
		include_once("../../../includes/db.php");
		include_once("../../../lib/lib_util.php");
		include_once("../../../utilities/util.php");
	}
	
}

//$temp=new Template();
//echo $temp->getEditorClassFile();
?>