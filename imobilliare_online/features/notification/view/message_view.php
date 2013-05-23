<?php
$msgDetails=MESSAGE::getMessageDetails($_REQUEST['fiid']);
$userDetailsSource=USER::getUserDetails($msgDetails['source_id']);
$userDetailsRecp=USER::getUserDetails($msgDetails['receipient_id']);
?>
