<?php



class Review extends Feature
{
	public $entryError=array();
	public $id;
	
	function __construct()
	{
	
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}

	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_reviews` WHERE `id` = '".$id."' AND `status` = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			$blogi=$this->getBlogDetails($id);
			if($id3==1)
			{
				echo "<input name='preview' type='radio' value='".$result['id']."' $checked/>";
			}
			echo "&nbsp;&nbsp;".$blogi['subject'].":: ".$result['topic']."<br />";
			$checked='';
		}
		
		
	}
	
	
	function getDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_reviews` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			return $result;	
		}
		else
		{
			return NULL;
		}
	}
	
	
	
	function displayFPFeature()
	{
		CONTROLLER_REVIEW::controlFrontPageDisplay();
	}
	
	function displayFeature($id=NULL)
	{
		CONTROLLER_REVIEW::controlFlowProcess();
	}
	
	
	
	function addReview()
	{
		global $mysql;
		
		if($value==1)
		{
			$mode='SMS';
			$receivingEndPoint=setDataDB($_POST['phoneNumber']);
		}
		else
		{
			$mode='Email';
			$receivingEndPoint=setDataDB($_POST['email']);
		}
		
		global $article;
		
		$artDet=MESSAGE::getMessageDetails($receivingEndPoint);
		$moveNext=1;
		if($_POST['Message']=='Send Me SMS Updates')
		{
			$resultMOD = ARTICLES::getArticleDetails($_REQUEST['id']);
		}
		
		if(($artDet) && ($_POST['Update']=='Submit') && ($title!=$resultMOD['name']))
		{
			$moveNext=0;
		}
		else
		{
			if(($artDet) && ($_POST['save']=='Submit'))
			{
				$moveNext=0;
			}
		}
		
			
		if($moveNext==0)
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj9029');
		}
		else
		{
			if((strlen($fpContents)==0))
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj017');
			}
			else if((strlen($articleContents)==0))
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj016');
			}
			else
			{
				global $mysql;
				if($_POST['save']=='Submit')
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_articles` (`id` ,`name` ,`frontPageContents` ,`frontPageContentsNoHtml`,`contents`, `contentsNoHtml`, `status`)VALUES ('' , '".$title."','".$fpContents."', '".setDataDB(adjustImageUrlToFit(strip_tags($_POST['fpContents']),0))."', '".$articleContents."', '".setDataDB(adjustImageUrlToFit(strip_tags($_POST['articleContents']),0))."', '1')";
					$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
				}
				else if($_POST['Update']=='Submit')
				{
					$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_articles` SET `name`= '".$title."', `frontPageContents` = '".$fpContents."', `frontPageContentsNoHtml` = '".setDataDB(adjustImageUrlToFit(strip_tags($_POST['fpContents']),0))."',`contents` = '".$articleContents."', `contentsNoHtml` = '".setDataDB(adjustImageUrlToFit(strip_tags($_POST['articleContents']),0))."'WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
				}
				echo $entryString;
				$sql= $mysql->query($entryString);
			}
		}
		
		return $url;
	}
	
	
	
	
}


?>