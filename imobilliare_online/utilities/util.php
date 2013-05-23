<?php
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/session.inc");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/devotionals/devotionals_class.php");




	
	function test1($url)
	{
		$new=str_replace("<img src='../../", "<img src='", $url);
		echo htmlentities($new)."<br /><br /><br />";
		$url=$new;
		
		echo htmlentities($new1);
	}
	
	
	
	function getBusinessCategories()
	{
		global $mysql;
		$arrayPosition=array();
		$str="SELECT name FROM `".DEFAULT_DB_TBL_PREFIX."_business_category` WHERE `status` = '1'";
		$sql= $mysql->query($str);
		return $sql;
	}
	
	
	function getBusinessCategory($id)
	{
		global $mysql;
		$arrayPosition=array();
		$str="SELECT name FROM `".DEFAULT_DB_TBL_PREFIX."_business_category` WHERE `status` = '1' WHERE `id` = '".$id."' OR `name` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	
	function adjustImageUrlToFit($url, $reset)
	{
		
		if($reset==0)
		{	
			$url= str_replace('src=\"../../../', 'src=\"', $url);
			return  str_replace('src="../../../', 'src="', $url);
		}
		else if($reset==1)
		{
			$url=str_replace('src="../', 'src="../', $url);
			return str_replace('src=\"../', 'src=\"../', $url);
		}

	}
	
	
	
	function adjustImageUrlToViewLife($url)
	{
		
		$url= str_replace('src="../', 'src="', $url);
		return  $url;
	}
	
	
	
	function nl2br_skip_html($string)
	{
		// remove any carriage returns (mysql)
		$string = str_replace("\r", '', $string);
		// replace any newlines that aren't preceded by a > with a <br />
		$string = preg_replace('/(?<!>)\n/', "<br />", $string);
		return $string;
	}
	
	
	function formatStringCasing($format, $str)
	{
		if($format=='Title Case')
		{
			return ucfirst(strtolower($str));
		}
		else if($format=='UPPER CASE')
		{
			return strtoupper(strtolower($str));
		}
		else if($format=='lower Case')
		{
			return strtolower($str);		
		}
		else if($format=='Sentence case')
		{
			return ucwords(strtolower($str));
		}
		else if($format=='tOOGLE cASE')
		{
			return ucwords(strtolower($str));
		}
		else if($format=='Full Names')
		{
			return $str;
		}
		else if($format=='Initials')
		{
			$str_array=explode(' ', $str); 
			return $str_array[1]." ".$str_array[0][0].".";
		}
		
	}
	
	
	function generateFileSize($size)
	{
		$size_count=0;
		$size=$str34[$cnt];

		while(($size>1024) && ($size_count<3))
		{
			$size=$size/1024;
			$size_count++;
		}
		
		if($size_count==0)
		{
			$size=round($size, 2);
			$size=$size."bytes";
		}
		else if($size_count==1)
		{
			$size=round($size, 2);			
			$size=$size."Kb";
		}
		else if($size_count==2)
		{
			$size=round($size, 2);
			$size=$size."Mb";
		}
		else 
		{
			$size=round($size, 2);
			$size=$size."Kb";
		}
		return $size;
	}
	
	
	
	function getPictureFileName($id, $scrammble=1)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_files` WHERE `id` = '".$id."'";
		
		$sql= $mysql->query($str);
		//echo $sql->num_rows;
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($scrammble==1)
			{
				$filenameArray=explode('.', $result['fileName']);
				$filename=$result['unique_id'].".".$filenameArray[1];
			}
			else
			{
				$filename=$result['fileName'];
			}
			return $filename;
		}
		
	
	}
	
	
	function firstTextHeader($text, $style=NULL, $wordYes=NULL, $count=NULL)
	{
		$strlen=strlen($text);
		if($wordYes==FALSE)
		{
			if($count==NULL)
			{
				$count=1;
			}
			$first=substr($text, 0, $count);
			$remainder=substr($text, $count, $strlen);
		}
		else if($wordYes==TRUE)
		{
			$array=explode(' ', $text);
			for($counter=0;$counter<$count;$counter++)
			{
				$first=$first."".$array[$counter]." ";
			}
			for($counter=$count;$counter<sizeof($array);$counter++)
			{
				$remainder=$remainder."".$array[$counter]." ";
			}
			
		}
		
		echo "<span style='font-size:24px;'>".$first."</span>".$remainder;
		
	}
	
	
	function getDateInWords($str)
	{
		//2009-02-31
		//31 Febr 2009
		$array=explode('-', $str);
		$monthArray=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$str1=$monthArray[$array[1] - 1]." ".$array[2]." ".$array[0];
		return $str1;
	}
	
	
	function getCountryName($countryCode)
	{
		global $mysql;
		$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_country` WHERE `iso_code` = '".$countryCode."'";
		//echo $query1;
		$sql1=$mysql->query($query1);
		$resultD = $mysql->fetch_assoc_mine($sql1);
		if($mysql->num_rows == 1)
		{
			return $resultD['name'];
		}
	}
	
	function getSpecializationName($id)
	{
		global $mysql;
		$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_specialization` WHERE `id` = '".$id."'";
		//echo $query1;
		$sql1=$mysql->query($query1);
		$resultD = $mysql->fetch_assoc_mine($sql1);
		if($mysql->num_rows == 1)
		{
			return $resultD['name'];
		}
	}
	
?>