<div align="right">
<form id='loginForm' name='loginForm' method='post' action='<?php
$loginAddy='index.php';
if(strlen($_SERVER['QUERY_STRING'])>0)
{
	$loginAddy=$loginAddy."?".$_SERVER['QUERY_STRING'];

}
echo $loginAddy;
?>
'><!--<span class='textBodyStyle2'><a href='index.php?fid=<?php echo FEATURE::getId('Search');?>' class="link_type6">Advanced Search</a>&nbsp;&nbsp;</span><br />-->
      <span class="textBodyStyle5">Search For A Project&nbsp;</span>&nbsp;&nbsp;&nbsp;<input onfocus="if
(this.value=='e.g. Website Design') this.value='';" type='text' name='searchText' onFocus="if(this.value=='e.g. Website Design')this.value='';" onblur="if(this.value=='')this.value='e.g. Website Design';"  value='e.g. Website Design' class='textFieldStyle1'/>&nbsp;&nbsp;<input type='submit' name='SEARCH' value='Search' class='button' /></form>
	  </div>