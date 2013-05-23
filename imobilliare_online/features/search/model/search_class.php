<?php
//Ruke Emuveyan

class Search extends Feature
{
//	public $entryError=array();
	public $searchArray1=array();
	public $searchArrayKey=array();	
	public $id;
	
	function __construct()
	{
//		$_SESSION['search_start']=0;
	//	$_SESSION['search_last']=SEARCH_PAGING;
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		//not applicable
	}
	
	function fullPreview($id)
	{
		//not applicable
	}
	
	
	function displayFPFeature($position, $parameter2=null)
	{
		CONTROLLER_SEARCH::controlFrontPageDisplay();
	}
	
	function setSearchableFeatures()
	{
		global $mysql;
		$error=new Error();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated'";
		$sql= $mysql->query($str);
		
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$value='checkbox'.$result['id'];
			$value=$_POST[$value];
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_features` SET `searchYes` = '".$value."' WHERE `id` = '".$result['id']."'";
			$sql1= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	function displayFeature($resultArray=NULL)
	{
		CONTROLLER_SEARCH::controlFlowProcess();
	}
	
	
	function setPaging()
	{
		if($_SESSION['search_start']!=NULL)
		{
			$_SESSION['search_start']=$_SESSION['search_start'] + SEARCH_PAGING;
			$_SESSION['search_last']=$_SESSION['search_last'] * 2;
		}
	}
	
	
	function paginateResults($resultArray, $divisor)
	{

		$pageViews=(floor(((sizeof($resultArray))/$divisor) + 0.999));

		if($pageViews==0)
		{
			$paging=1;
		}
		else
		{
			for($counter=0;$counter<$pageViews;$counter++)
			{
				$counter1=$counter + 1;
			//	echo $counter1;
				$start=$counter * $divisor;
				$last=$start + $divisor;
				if($last>sizeof($resultArray))
				{
					$last=sizeof($resultArray);
				}
				$linkChecker=$_REQUEST['search_start']/$divisor;
				if($linkChecker==$counter)
				{
					$paging=$paging."&nbsp;&nbsp;".$counter1;
				}
				else
				{
					$paging=$paging."&nbsp;&nbsp;<a href='index.php?fid=".parent::getId('Search')."&search_start=".$start."&search_last=".$last."&search'>".$counter1."</a>";
				}
			}
		}
		if($pageViews!=0)
		{
			echo "<span align='right' class='textType2'>Page ".$paging." of ".$pageViews."</span>";
		}
	
	}
	
	
	
	function displayResults($resultArray, $start=0, $last)
	{	
		if($start==NULL)
		{
			$start=0;
		}
		$siteDet=SITE::getDetails();
		if(sizeof($resultArray)==0)
		{
			$results="No results found for search entered.";
		}
		else
		{
			if(isset($last))
			{
				$counterEnd=$last;
			}
			else
			{
				if($start==0)
				{
					$counterEnd=$siteDet['searchPaging'];
				}
				else
				{
					if($siteDet['searchPaging']<$last)
					{
						$counterEnd=$last;
					}
					else
					{
						$counterEnd=sizeof($resultArray);
					}
				}
				
			}
			
			for($counter=$start;$counter<$counterEnd;$counter++)
			{
				if(strlen($resultArray[$counter])>0)
				{
					$results=$results.$resultArray[$counter]."<br><br>";
				}
			}
		}
		echo $results;
	
	}
	
	
	function isSearchTableActive($string)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `name` = '".$string."' AND `searchYes` = '1' AND `status` = 'Activated'";
		$sql= $mysql->query($str);
	//	echo $mysql->num_rows;
//		echo $sql;
		//$sql= mysql_result($sql, 1);
		//echo $sql;
		if ($mysql->num_rows > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function doSearch($string)
	{
		global $mysql;
		$_SESSION['SEARCHTYPE']=$_POST['project_type'];
		$_SESSION['SEARCHSPECIFICS']=$_POST['project_specifics'];
		$_SESSION['SEARCHLOCATION']=$_POST['location'];

		if($this->prepareSearchString($string)==FALSE)
		{
			$search_str='';
			if((isset($_POST['project_type'])) && ($_POST['project_type']!='NULL'))
			{
			//	$search_str='transactionTypeId = '.$_POST['project_type'];
			}
			if((isset($_POST['project_specifics'])) && ($_POST['project_specifics']!='NULL'))
			{
				if(strlen($search_str)>0)
				{
					$search_str=$search_str.' AND ';
				}
				$search_str=$search_str.'projectCategoryId = '.$_POST['project_specifics'];
			}
			if((isset($_POST['location'])) && ($_POST['location']!='NULL'))
			{
				if(strlen($search_str)>0)
				{
					$search_str=$search_str.' AND ';
				}
				$search_str=$search_str.'locationId = '.$_POST['location'];
			}
			
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".$search_str." AND `status` = 'Valid'";
			echo $str;
			$sql= $mysql->query($str);
			while($result = $mysql->fetch_assoc_mine($sql))
			{
		
				$entry=$result['id'];
				array_push($this->searchArrayKey, $entry);

			}
		}
		else
		{
			//search within announcements
			//break them into key words
			

			$search_str='';
			/*if((isset($_POST['project_type'])) && ($_POST['project_type']!='NULL'))
			{
				//$search_str='transactionTypeId = '.$_POST['project_type'];
			}
			if((isset($_POST['project_specifics'])) && ($_POST['project_specifics']!='NULL'))
			{
				if(strlen($search_str)>0)
				{
					$search_str=$search_str.' AND ';
				}
				$search_str=$search_str.'projectCategoryId = '.$_POST['project_specifics'];
			}
			if((isset($_POST['location'])) && ($_POST['location']!='NULL'))
			{
				if(strlen($search_str)>0)
				{
					$search_str=$search_str.' AND ';
				}
				$search_str=$search_str.'locationId = '.$_POST['location'];
			}*/
			if(strlen($_POST['searchText']))
			{
			
				$trimmed=$this->prepareSearchString($string);
				$trimmed_array = explode(" ",$trimmed);
				if(strlen($search_str)>0)
				{
					$search_str=$search_str.' AND ';
				}
				
			}
			for($count1=0;$count1<sizeof($trimmed_array);$count1++)
			{
				$text="'%".$trimmed_array[$count1]."%'";
				
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".$search_str."(`header` LIKE ".$text." OR `detail` LIKE ".$text.") AND `status` = 'Open' ORDER BY creation_date ASC";
				//echo $str;
				$sql= $mysql->query($str);
				while($result = $mysql->fetch_assoc_mine($sql))
				{
			
					$entry=$result['id'];
					//echo "<br />".$entry;					
					if(in_array($entry, $this->searchArrayKey))
					{
					
					}
					else
					{
						array_push($this->searchArrayKey, $entry);
					
						if(strlen($result['header'])>0)
						{
							$getTextAround="<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$result['id']."'>".getRealDataNoHTML($result['header'])."</a><br>".getTextAround(str_replace("<br />", " ", getRealDataNoHTML($result['detail'])), $trimmed_array[1], 30);
						}
						else
						{
							$getTextAround="<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$result['id']."'>".getTextAround(getRealDataNoHTML($result[$data2]), $trimmed_array[1], 30)."</a><br>".getTextAround(str_replace("<br />", " ", getRealDataNoHTML($result['detail'])), $trimmed_array[1], 30);
						}
						array_push($this->searchArray1, $getTextAround);
					}
					
					
				}
			}
			
			
			
			//$searchArrayKey_1=array();
			
			for($count1=0;$count1<sizeof($trimmed_array);$count1++)
			{
				$text="'%".$trimmed_array[$count1]."%'";
				
				$str="SELECT ".DEFAULT_DB_TBL_PREFIX."_project.id as prjId, ".DEFAULT_DB_TBL_PREFIX."_project.detail as prjDetail, ".DEFAULT_DB_TBL_PREFIX."_project.header as header FROM `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_project_specialization`, `".DEFAULT_DB_TBL_PREFIX."_specialization` WHERE ".$search_str."((".DEFAULT_DB_TBL_PREFIX."_specialization.name LIKE ".$text.") AND (".DEFAULT_DB_TBL_PREFIX."_specialization.id = ".DEFAULT_DB_TBL_PREFIX."_project_specialization.specializationId) AND (".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_project_specialization.projectId)) ORDER BY ".DEFAULT_DB_TBL_PREFIX."_project.creation_date ASC";
				//echo $str;
				$sql= $mysql->query($str);
				while($result = $mysql->fetch_assoc_mine($sql))
				{
			
					$entry=$result['prjId'];
					//echo "<br />".$entry;
					if(in_array($entry, $this->searchArrayKey))
					{
					
					}
					else
					{
						array_push($this->searchArrayKey, $entry);
					
						if(strlen($result['header'])>0)
						{
							$getTextAround="<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$result['prjId']."'>".getRealDataNoHTML($result['prjId'])."</a><br>".getTextAround(str_replace("<br />", " ", getRealDataNoHTML($result['prjDetail'])), $trimmed_array[1], 30);
						}
						else
						{
							$getTextAround="<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$result['prjId']."'>".getTextAround(getRealDataNoHTML($result[$data2]), $trimmed_array[1], 10)."</a><br>".getTextAround(str_replace("<br />", " ", getRealDataNoHTML($result['prjDetail'])), $trimmed_array[1], 30);
						}
						array_push($this->searchArray1, $getTextAround);
					}
					
					
				}
			}
			
		}
		
		//$searchArray=array_unique($this->searchArrayKey);

		
		
//		$searchArray=join('<br><br>', $this->searchArray1);
	//	$_SESSION['searchResults1']=$searchArray;
		//print $searchArray;
//		echo sizeof($searchArray);
		//print_r($this->searchArray1);
		return $this->searchArray1;
	}
	
	function prepareSearchString($string)
	{
		//	$string=$_POST['SEARCHSTRING'];
		$_SESSION['SEARCHSTRING1']=$string;
	
		//	$string=preg_replace('/[.;,:!?¿¡\[\]@\(\)]/', ' ', $string);
		$string=preg_replace('/[.;,+*\/:!?¿¡\[\]@\(\)]/', ' ', $string);
		
		//if the resultant of no white spaces is nothing throw error
		$trimmed_array = trim($string);
		if ($trimmed_array == "")
		{
			$this->setEntryError(ERROR_NOSEARCH);
			//append error for search error
			$trimmed_array = FALSE;
		}
		
		else
		{
			//if nothing exists in search field, throw error
			if (!isset($string))
			{
				$this->setEntryError(ERROR_NOSEARCH);
				//$resultmsg =  "<p>Search Error</p><p>We don't seem to have a search parameter! </p>" ;
				$trimmed_array = FALSE;				
			}
			
		}
		return $trimmed_array;
		
	}
	
	function setVar($id)
	{
		$this->id=$id;
//		return $this->id;
	}
	
	function getVar()
	{
		return $this->id;
	}
	


}


//global $search;
//$search =new Search();
//$search->displayFeature($_SESSION['searchResults']);
//echo $_SESSION['searchResults'];
//echo sizeof($_SESSION['searchResults']);
?>