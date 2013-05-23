<?php
class Pagination
{
	function __construct()
	{
	}
	
	
	function paginateResults($resultCount, $divisor, $feature, $showPaging=NULL)
	{
		$pageViews=(floor((($resultCount)/$divisor) + 0.999));
		if($showPaging==0)
		{
		
		}
		else
		{
			
			if($pageViews==0)
			{
				$paging=1;
			}
			else
			{
				
				for($counterT=0;$counterT<$pageViews;$counterT++)
				{
					$counter1=$counterT + 1;
					$start=$counterT * $divisor;
					$last=$start + $divisor;
					if($last>$resultCount)
					{
						$last=$resultCount;
					}
	
					if(!isset($_REQUEST['search_start']))
					{
						$search_starter=0;
					}
					else
					{
						$search_starter=$_REQUEST['search_start'];
					}
					$linkChecker=$search_starter/$divisor;
					
					if($linkChecker==$counterT)
					{
						$paging=$paging."&nbsp;&nbsp;".$counter1;
						
					}
					else
					{
						$paging=$paging."&nbsp;&nbsp;<a href='index.php?fid=".FEATURE::getId($feature)."&list&search_start=".$start."&search_last=".$last."&agId=".$_REQUEST['agId']."&bt=".$_REQUEST['bt']."'>".$counter1."</a>";
						
					}
				}
	
			}
			if($pageViews!=0)
			{
				return "<span align='right' class='textType2'>Page ".$paging." of ".$pageViews."</span>";
			}
		}
	}
}
?>