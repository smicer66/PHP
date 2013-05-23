<?php

require_once dirname(__FILE__)."/dUnzip2.php";
require_once dirname(__FILE__)."/dZip.php";

//echo "<hr>";
$zip = new dUnzip2('RMS.zip');
$zip->debug = true;

$zip->getList();
$zip->unzipAll('uncompressed');

//echo "Checking attributes for dUnzip2.gif<br>";
$d = $zip->getExtraInfo('dUnzip2.gif');
//echo ($d['external_attributes1']&1 )?"File is read only.":"File is NOT read-only."; echo "<br>";
//echo ($d['external_attributes1']&2 )?"File is hidden.":"File is NOT hidden.";       echo "<br>";
//echo ($d['external_attributes1']&4 )?"File is system.":"File is NOT system.";       echo "<br>";
//echo ($d['external_attributes1']&16)?"It's directory.":"It's NOT a directory.";     echo "<br>";
//echo ($d['external_attributes1']&32)?"File is archive":"File is NOT archive";       echo "<br>";

// No secrets, do you agree?
