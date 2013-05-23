<?php


function display_search_input()
{
	echo "<form id='form1' name='form1' method='post' action='".$_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/search/search.php'>
  <select name='category'>".append_project_type($value)."</select><input type='text' name='searchTextField' />
	&nbsp;&nbsp;
	<input type='submit' name='Submit' value='Search' />
	</form>";
}

?>