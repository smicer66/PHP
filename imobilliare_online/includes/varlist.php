<?php
//session_start();


if (!isset($_SESSION['values']))
{
	$_SESSION['values']['txtFirstname'] = '';
}

if (!isset($_SESSION['errors']))
{
	$_SESSION['errors']['txtFirstname'] = 'hidden';
}
$_POST['txtFirstname']='';



?>