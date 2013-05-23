<?php



class Articles extends Feature
{
	function __construct()
	{
	
	}
	
	
	function getIdByName($attached)
	{
		global $mysql;
		$error=new Error();
		
		$sql="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `name` = '".$attached."' AND `status` = '1' ORDER BY id DESC LIMIT 0, 1";
	//	echo $sql;
		$query = $mysql->query($sql);
		$resultMOD = $mysql->fetch_assoc_mine($query);
//		print_r($resultMOD);
//		return 20;
		if($mysql->num_rows > 0)
		{
			return $resultMOD['id'];
		}
		else
		{
			return NULL;
		}
		
		
	}
	
	function displayFeature($id=NULL)
	{
		global $mysql;
		//echo 22;
		CONTROLLER_ARTICLES::controlFlowProcess($id);
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			if($id3==1)
			{
				echo "<input name='preview' type='radio' value='".$result['id']."' $checked/>";
			}
			echo "&nbsp;&nbsp;".getRealDataNoHTML($result['name'])."<br />";
			$checked='';
		}
		
	}
	
	
	function findLink($id, $id2=NULL)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			echo "&nbsp;&nbsp;".$result['name']." link ---- index.php?linkToFeatureId=".parent::getId('Articles')."&linkToFeatureChildId=".$id."";
			$checked='';
		}
		
	}
	
	
	
	function getArticleTypeDetails($id)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles_type` WHERE `id` = '".$id."'";
		$sqlMOD=$mysql->query($queryMOD);
		$resultMOD = $mysql->fetch_assoc_mine($sqlMOD);
		return $resultMOD;
	}
	
	function getArticleDetails($id)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `id` = '".$id."' OR `name` = '".$id."'";
		$sqlMOD=$mysql->query($queryMOD);
		
		if($mysql->num_rows > 0)
		{
			$resultMOD = $mysql->fetch_assoc_mine($sqlMOD);
			return $resultMOD;
		}
		else
		{
			return NULL;
		}
	}
	
	function fullPreview($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			echo ucfirst(strtolower($result['name']))."<br /><br />";
		}
		echo $this->displayFeature($id);	
	}
	
	function displayFPFeature($id=NULL, $frontPageTitle=NULL)
	{
		global $mysql;
		
		CONTROLLER_ARTICLES::controlFrontPageDisplay();
		
	}
	
	
	function createAnArticle()
	{
		$title=setDataDB($_POST['title']);
		$articleType=$_POST['articleType'];
		$articleContents=setDataDB(adjustImageUrlToFit($_POST['articleContents'],0));
		$fpContents=setDataDB(adjustImageUrlToFit($_POST['fpContents'],0));
		$section=$_POST['section'];
		$error=new Error();
		
		
		
		
		$article=new Article_admin();
		global $article;
		
		$artDet=ARTICLES::getArticleDetails($title);
		$moveNext=1;
		if($_POST['UpdateArticles']=='Submit')
		{
			$resultMOD = ARTICLES::getArticleDetails($_REQUEST['id']);
		}
		
		if(($artDet) && ($_POST['UpdateArticles']=='Submit') && ($title!=$resultMOD['name']))
		{
			$moveNext=0;
		}
		else
		{
			if(($artDet) && ($_POST['saveArticles']=='Submit'))
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
				if($_POST['saveArticles']=='Submit')
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_articles` (`id` ,`name` ,`frontPageContents` ,`frontPageContentsNoHtml`,`contents`, `contentsNoHtml`, `status`)VALUES ('' , '".$title."','".$fpContents."', '".setDataDB(adjustImageUrlToFit(strip_tags($_POST['fpContents']),0))."', '".$articleContents."', '".setDataDB(adjustImageUrlToFit(strip_tags($_POST['articleContents']),0))."', '1')";
					$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
				}
				else if($_POST['UpdateArticles']=='Submit')
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
	
	
	function updateArticleListings()
	{
		global $mysql;
		$error=new Error();
		if(!isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `srcId` = '".$_SESSION['uid']."'";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles`";
		}
		$sql=$mysql->query($str);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
					
			$frontPageYes='frontPageYes'.$result['id'];
			$frontPageYes=$_POST[$frontPageYes];
			if($frontPageYes!=1)
			{
				$frontPageYes=0;
			}
			
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_articles` SET `status` = '".$status."',`frontPageYes`='".$frontPageYes."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			echo $update;
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
}




class Article_admin extends Articles
{
	public $entryError=array();
	
	function __construct()
	{
	
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}	
}


?>