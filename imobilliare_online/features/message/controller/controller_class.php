<?php
class Controller_Message
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL)
	{
		global $mysql;
		
		include("features/message/view/fpView.php");
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;
		if(isset($_SESSION['uid']))
		{
			if(isset($_REQUEST['compose']))
			{
				include("features/message/view/compose_message.php");
			}
			else
			{
				if(isset($_REQUEST['fiid']))
				{
					if(isset($_REQUEST['view']))
					{
						include("features/message/view/message_view.php");
					}
					else
					{
						include("features/message/view/message_listing.php");
					}
				}
				else
				{
					if($id!=NULL)
					{
						if(isset($_REQUEST['view']))
						{
							include("features/message/view/message_view.php");
						}
						else
						{
							include("features/message/view/message_listing.php");
						}
					}
					else
					{
						include("features/message/view/message_listing.php");
					}
				}
			}
		}
		else
		{
			header('Location: index.php?fid='.PROJECT::getId('Project').'&fiid='.$_REQUEST['fiid']);
		}
		
	}
	
}
?>