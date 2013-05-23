<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php SITE::getTitle(); ?></title>
<link href="template/<?php echo $active_template->tempName;?>/css/orange.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="template/<?php echo $active_template->tempName;?>/css/style.css" type="text/css" />
<script type="text/javascript" src="includes/fpss.js"></script>
<script type="text/javascript" src="template/<?php echo $active_template->tempName;?>/js/script.js"></script>
<script type="text/javascript" src="includes/validate.js"></script>
<script type="text/javascript" src="includes/error.js"></script>
</head>

<body>
<?php 
		//SEARCH::displayFPFeature();
		FEATURE::fView('body_1');
?>