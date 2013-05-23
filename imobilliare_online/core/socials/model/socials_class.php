<?php

//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/"."component_class.php");

//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/"."db.php");


class Socials
{
	

	
	
	function __construct()
	{
	}
	
	
	function getSocialsDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_socials` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	function displayComponentPlugin($socialNtwk, $columnXrow)
	{
		if($socialNtwk=='facebook')
		{
			return '<div class="fb-like-box" data-href="http://www.facebook.com/Imobilliare" data-width="255" data-height="800" data-show-faces="false" data-border-color="#ffffff" data-stream="true" data-header="true"></div>';
		}
	}
	
	function displayComponent($position, $columnXrow)
	{
		global $mysql;	
		global $siteSupreme;
		global $active_template;
		$array_socials=array();
		$siteDet=SITE::getDetails();
		$array=explode('x', $columnXrow);
		
		
		$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_socials` WHERE `status` = '1'";
		$sql1= $mysql->query($query1);
		$menu=$menu."";
		if($mysql->num_rows > 0)
		{
			while($result1 = $mysql->fetch_assoc_mine($sql1))
			{
				array_push($array_socials, $result1);
			}
			$check=1;
			$menu=$menu."<br><strong class='headerTitle2'>Other Places</strong><br><br>";
			while($check==1)
			{
				for($count=0;$count<$array[0];$count++)
				{
					
					if(strlen($array_socials[$count]['name'])>1)
					{
						$menu=$menu."<a title='".$array_socials[$count]['name']."' href='".$array_socials[$count]['url']."' class='menulink'>
						<img align='absmiddle' src='template/".$active_template->tempName."/images/".$array_socials[$count]['icon']."' height='30px' border='0' ></a>";
					}
					else
					{
						$check=0;
					}
				}
				$menu=$menu."<br />";
			}
			
		}
		
			
		echo $menu;
	}
	
	

}
//addressing system=&feat=devotionals&id=90
//$menu=new Menu();
//echo $menu->displayComponent('left');
?>