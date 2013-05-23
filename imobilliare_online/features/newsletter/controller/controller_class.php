<?php
class Controller_Newsletter
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL)
	{
		global $mysql;
		
		include("features/newsletter/view/fpView.php");
		
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;
		include_once("features/newsletter/model/newsletter_class.php");
		
		//$newletterListingCount=NEWSLETTER::getListingCount();
		//$newletterListingSQL=NEWSLETTER::getNewsletterListing($start, $end);
		if((isset($id)) && (is_numeric($id)==1))
		{
			if(((NEWSLETTER::getNewsletterDetails($id))==NULL))
			{
				include_once("core/access/unavailable.php");
			}
			else
			{	
				$newsLetterDet=NEWSLETTER::getNewsletterDetails($id);
				if(isSuperAdmin($_SESSION['uid']))
				{
					include("features/newsletter/view/fullView.php");
				}
				else
				{
					if(($newsLetterDet['status']==1) && ($newsLetterDet['srcId']==$_SESSION['uid']))
					{
						include("features/newsletter/view/fullView.php");
					}
					else
					{
						include_once("core/access/unavailable.php");
					}
				}
				
				
			}
			
		}
		else 
		{
			
			include_once("features/newsletter/view/newsletterListings.php");
		}
	}
	
}
?>