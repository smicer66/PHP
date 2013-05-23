<?php

//if ($lib->getAccessLevel()!="general_user") {
if(!defined('CH_PORTAL_ACCESS'))
{
    //die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

ob_start();

global $mysql;
global $feature;

if($_POST['Submit']=='Submit')
{
	$url=FEATURE::tuneFeatures();
	header($url);
	
}


?>

