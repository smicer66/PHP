<?php

ob_start();
//include_once("mysqli.php");
//include_once("session.inc");
if(file_exists($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib.php"))
{
	//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib.php");
}

global $mysql;

$mysql=new mysqliUsed(DEFAULT_DB_HOST,DEFAULT_DB_USERNAME,DEFAULT_DB_PASSWORD,NULL,DEFAULT_DB_PORT);
$mysql->mysqliConnectToDb(DEFAULT_DB_HOST,DEFAULT_DB_USERNAME,DEFAULT_DB_PASSWORD,DEFAULT_DB_NAME,DEFAULT_DB_PORT);
?>