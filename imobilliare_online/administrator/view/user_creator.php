<?php
ob_start();

$features=new Feature();
$url='Location: ../index.php?fid='.FEATURE::getId('User').'&register=1';


//just redirect to account opening page
header($url);
?>