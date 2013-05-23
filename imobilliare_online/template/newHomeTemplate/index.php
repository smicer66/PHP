<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php SITE::getTitle(); ?></title>
<?php //SITE::prepareSearchTags();?>
<link href="template/<?php echo $active_template->tempName;?>/css/orange.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="template/<?php echo $active_template->tempName;?>/css/style.css" type="text/css" />
<script type="text/javascript" src="includes/fpss.js"></script>
<script type="text/javascript" src="template/<?php echo $active_template->tempName;?>/js/script.js"></script>
<script type="text/javascript" src="includes/validate.js"></script>
<script type="text/javascript" src="includes/error.js"></script>
<script type="text/javascript" src="core/captcha/v2/validate.js"></script>
<script type="text/javascript">
    window.onload = function() {
		
		//doNotifyUs('notifier');
		loadnotifications();
		//captcha('<?php echo MAXIMUM_FLOAT;?>', '<?php echo MAXIMUM_INCLINE;?>', '<?php echo CAPTCHA_BORDER_SIZE;?>', '<?php echo XTER;?>', '<?php echo PERIOD;?>');
		//SI.Files.stylizeAll();
		//setSelectedDevCompose();
		//loadnotifications();
	};
</script>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php FEATURE::fView('right77');?>
<?php FEATURE::mView('right78', NULL, FEATURE::getId('Notification'));?>
<?php 
		//SEARCH::displayFPFeature();
		FEATURE::fView('body_1');
?>
</body>
</html>