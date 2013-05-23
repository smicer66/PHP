<?php

class Preview
{

	function __construct()
	{
	
	}
	
	function paginateResults($result, $divisor, $feature)
	{
		$pageViews=(floor((sizeof($result)/$divisor) + 0.999));

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
				if($last>sizeof($result))
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
					$paging=$paging."&nbsp;&nbsp;<a href='index.php?fid=".FEATURE::getId('Project')."&propId=".$_REQUEST['propId']."&fiid=".$result[$counterT]."&search_start=".$start."&search_last=".$last."&ftype=".$_REQUEST['ftype']."'>".$counter1."</a>";
					
				}
			}

		}
		if($pageViews!=0)
		{
			return "<span align='right' class='textType2'>Image ".$paging." of ".$pageViews."</span>";
		}
	
	}
}

?>