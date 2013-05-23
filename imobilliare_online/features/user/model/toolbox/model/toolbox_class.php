<?php
class Toolbox extends Feature
{
	function __construct()
	{
	
	}
	
	function displayFeature($userId=NULL)
	{
		include_once("features/user/model/toolbox/view/full_view.php");
	}
	
	function displayTextLink()
	{
		if(file_exists("features/user/model/toolbox/view/toolbox_link.php"))
		{
			include("features/user/model/toolbox/view/toolbox_link.php");
		}
		else
		{
			if(file_exists("../features/user/model/toolbox/view/toolbox_link_admin.php"))
			{
				include("../features/user/model/toolbox/view/toolbox_link_admin.php");
			}
		}
	}
}


//$tool=new Toolbox();
//$tool->displayFeature(2);
?>