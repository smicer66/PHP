<?php
class Controller_Billing
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL)
	{
		global $mysql;
		
		include("features/billing/view/fpView.php");
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;

		if(isset($_REQUEST['pay']))
		{
			include("features/billing/view/makepayment.php");
		}
		else
		{
			if($id!=NULL)
			{
				include("features/billing/view/one_payment_view.php");
			}
			else
			{
				include("features/billing/view/full_view.php");
			}
		}
		
		
	}
	
}
?>