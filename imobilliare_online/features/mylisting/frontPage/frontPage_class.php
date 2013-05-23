<?php
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/mysqli.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib_special.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."utilities/util.php");

class ArticlesFrontPage
{
	//$news=new news();
	//from frontPages' seperate class
	//public $feature=new feature();
	public $status;
	public $display;
	//34512393
//	ogorchukwu_precious@yahoo.cm
					
	public $accessLevel;
	
	function __construct()
	{
				
	}
	
	function getFrontPageDisplay($id,$sectionLocation=NULL)
	{
		global $mysql;
		
		if($sectionLocation!=NULL)
		{
			$extraQuery=" AND sectionYes = '1'";
			$extraStr=" AND sectionsId = '".$sectionLocation;
		}
		else
		{
			$extraQuery="";
			$extraStr="";
		}
		
		
		
		$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `name` = 'Articles' AND `status` = 'Activated'".$extraQuery;
		$sql1= $mysql->query($str1);
		while($result1 = $mysql->fetch_assoc_mine($sql1))
		{  
			echo '<table width="100%" border="0" cellspacing="0" cellpadding="5"><tr>';
			
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `status` = 'Active' AND `id` = '".$id."'".$extraStr;
			$sql= $mysql->query($str);
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				/*$contents=str_replace("'", "<_09a", $result['contents']);
				$contents=str_replace('"', "'", $contents);
				$contents=str_replace("<_09a", '"', $contents);*/
				echo '<td>';
				echo $result['frontPageContents'];
			
				echo '</td>
			  	</tr>
			  	<tr>
					<td>';
						echo '<a href="index.php?linktoFeatureId='.$result1['id'].'&linkToFeatureChildId='.$id.'">Read More</a></td>';
			}
		  	echo '</tr>';			
			echo '</table>';
		}
	}
	
}


$art=new ArticlesFrontPage();
$art->getFrontPageDisplay(1,NULL);