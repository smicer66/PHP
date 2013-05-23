<?php


class Footer
{
	
	function __construct()
	{
	}
	
	
	function getFooterDetails($id)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_footer` WHERE `id` = '".$id."' OR `name` = '".$id."'";
		echo $queryMOD;
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
	
	
	function getValidFooterDetails()
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_footer` WHERE `status` = '1' LIMIT 0, 1";
		$sqlMOD=$mysql->query($queryMOD);
		$resultMOD = $mysql->fetch_assoc_mine($sqlMOD);
		return $resultMOD;
	}
	
	
	
	function editFooterListing()
	{
		global $mysql;
		$error=new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_footer`";
		$sql=$mysql->query($query);
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$status='status'.$result['id'];
			$status=escapeshellcmd(strip_tags($_POST[$status]));
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_footer` SET `status`= '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sqlX= $mysql->query($entryString);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		header($url);
	}
	
	
	
	function createFooter()
	{
		global $mysql;
		$error=new Error();
		
		$title=setDataDB($_POST['title']);
		$portalEmail=setDataDB($_POST['portalEmail']);
		$portalPhone=setDataDB($_POST['portalPhone']);
		$portalContactAddress=setDataDB($_POST['portalContactAddress']);
		
		$artDet=FOOTER::getFooterDetails($title);
		$moveNext=1;
		if($_POST['UpdateFooter']=='Submit')
		{
			$resultMOD = FOOTER::getFooterDetails($_REQUEST['id']);
		}
		
		if(($artDet) && ($_POST['UpdateFooter']=='Submit') && ($title!=$resultMOD['name']))
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
			if(strlen($title)==0)
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj260');
			}
			if(strlen($portalEmail)==0)
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj261');
			}
			else if(strlen($portalPhone)==0)
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj262');
			}
			else if(strlen($portalContactAddress)==0)
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj263');
			}
			else
			{
				global $mysql;
				if($_POST['saveFooter']=='Submit')
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_footer` (`id` ,`name` ,`portalEmail` ,`portalContactAddress`, `portalPhone` ,`status`)VALUES ('' , '".$title."','".$portalEmail."', '".$portalContactAddress."', '".$portalPhone."', '1')";
					echo $entryString;
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
				}
				else if($_POST['UpdateFooter']=='Submit')
				{
					$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_footer` SET `name`= '".$title."', `portalEmail` = '".$portalEmail."', `portalContactAddress` = '".$portalContactAddress."',`portalPhone` = '".$portalPhone."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
					echo $entryString;
				}
				echo $entryString;
				$sql= $mysql->query($entryString);
			}
		}
		return $url;
	}
	
	
	
	function displayComponent($position)
	{
	
		global $mysql;
		$footerInfo=FOOTER::getValidFooterDetails();
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1' LIMIT 0, 1";
		$sql_new=$mysql->query($query_new);
		$display="<div>";
		while($result = $mysql->fetch_assoc_mine($sql_new))
		{
			$display=$display."<div class='footerText'>&copy; 2012 <strong>".getRealDataNoHTML($result['churchName'])."</strong> | "." <a href='".$_SERVER['HTTP_HOST']."'>".$_SERVER['HTTP_HOST']."</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='mailto:".$footerInfo['portalEmail']."'>".$footerInfo['portalEmail']."</a>&nbsp;&nbsp;| ".$footerInfo['portalContactAddress']."Runs on <!--<a href='".$_SERVER['HTTP_HOST']."'>--><strong>Phages</strong><!--</a>--></div>";		
		}
		$display=$display."</div>";
		echo $display;
	}
	
	
	
	

}



?>