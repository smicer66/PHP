<?php
if($_POST['Billing_Add']=='Add Funds')
{
	$regStatus=BILLING::addFunds();
	$url=$regStatus;
	header($url);
}


if($_POST['CreateBillingCosts']=='Set')
{
	$regStatus=BILLING::updateBillingCosts();
	$url=$regStatus;
	header($url);
}


if($_POST['Funds_Listings']=='Update')
{
	$regStatus=BILLING::updateListings($_REQUEST['search_start']);
	$url=$regStatus;
	header($url);
}

if($_POST['Fund_Transfer']=='Ok')
{
	$transferStatus=BILLING::transferFund();
	$url=$transferStatus;
	header($url);
}

if($_POST['Complaint']=='Send')
{
	$regStatus=BILLING::addComplaint();
	$url=$regStatus;
	header($url);
}

?>