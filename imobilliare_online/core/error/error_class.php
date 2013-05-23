<?php
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/mysqli.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."utilities/util.php");


class Error
{
	public $errorCode;
	
	function __construct()
	{
		//echo "creating new error".uniqid();
	}
	
	
	function getErrorDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_errors` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;	
	}
	
	function updateErrorListing()
	{
		global $mysql;
		$error=new Error();
		
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_errors`";
		$sql=$mysql->query($query);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			
			
					
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_errors` SET `status` = '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			//echo $update;
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	function updateErrorMsg()
	{
		global $mysql;
		$error=new Error();
		
		$errorStatement=setDataDB($_POST['errorStatement']);
	
		if((strlen($errorStatement)==0))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj022');
		}
		else
		{
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_errors` SET `errorStatement`= '".$errorStatement."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
			echo $entryString;
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
			$sql= $mysql->query($entryString);
		}
		return $url;
	}
	
	
	function constructErrorAddy($addy,$append)
	{
		//if($append!='NULL')
		//{
			//if($_SERVER['QUERY_STRING'])
			//{
				if(strpos($addy,'&errcpj'))
				{
					$strpos=strpos($addy,'&errcpj');
					
					$end=$_REQUEST['errcpj'];
					$end=(strlen($end)) + ($strpos) + (strlen('&errcpj='));
					
					
					$url=substr($addy,0,$strpos)."".(substr($addy,$end,strlen($addy)));
				}
				else if(strpos($addy,'errcpj'))
				{
					$strpos=strpos($addy,'errcpj');
					$end=$_REQUEST['errcpj'];
					$end=(strlen($end)) + ($strpos) + (strlen('errcpj='));
					
					
					$url=substr($addy,0,$strpos)."".(substr($addy,$end,strlen($addy)));
//					$url=substr($addy,0,$strpos);
				}
				else
				{
					$strpos=-1;
					$url=substr($addy,0);
				}
				
				if($append!='NULL')
				{
				
					if(!strpos($url,'?',0))
					{
						$url=$url.'?'.$append;
					}
					else
					{
						$url=$url.'&'.$append;
					}
				}
			/*}
			else
			{
				$url=$addy.'?'.$append;
			}*/
			return $url;			
		//}
		//else
		//{
		//	return $addy;
		//}
	}
	
	function getError($errorCode=NULL, $redirectURL=NULL,$deepLength)
	{
		if($errorCode==NULL)
		{
			$err=$this->errorCode;
		}
		else
		{
			$err=$errorCode;
		}
		for($count=0;$count<$deepLength;$count++)
		{
			$elipse='../'.$elipse;
		}
		$errorStatement='';
		global $mysql;
		if(strlen($err)>0)
		{
			$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_errors` WHERE `errorCode` = '".$err."'";
			$sql_new=$mysql->query($query_new);
	
			
			if($redirectURL==NULL)
			{
				$redirectURL=$_SERVER['HTTP_REFERER'];
			}
			$redirectURL=$this->constructErrorAddy($redirectURL,'NULL');
			$errorStatement="<div id='ErrorLayer'><div id='ErrorLayerClose' onclick=\"MM_showHideLayers('ErrorLayer','','hide','ErrorLayerClose','','hide', '".$redirectURL."')\"><a href='javascript:;' class='link_type2' title='Click To Close'>&nbsp;&nbsp;<strong>X</strong>&nbsp;&nbsp;</a></div>
			
			<table width='100%' border='0' cellspacing='2' cellpadding='10' align='center' class='ErrorTableClass'>
			<tr>
			<td align='left' valign='bottom' class='ErrorCellClass'>";
	
			if($mysql->num_rows >0)
			{
				while($result = $mysql->fetch_assoc_mine($sql_new))
				{
					$errorStatement=$errorStatement."<img src='".$elipse."images/".getPictureFileName($result['errorPixId'], 1)."' height='40px'>".getRealDataNoHTML($result['errorStatement']);
				}
			}
			else
			{
				$errorStatement="Error Occured! Error Code Unlinkable.";
			}
			$errorStatement=$errorStatement."</td>
			  </tr>
			  </table></div>";
		}
		else
		{
			$errorStatement="";
		}
		  
		return $errorStatement;
	}
	
	
	
	function storeError($errorCode, $errorStatement)
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_error` WHERE `errorCode` = '".$errorCode."'";
		$sql_new=$mysql->query($query_new);

		if($mysql->num_rows >0)
		{
			while($result = $mysql->fetch_assoc_mine($sql_new))
			{
				return "Error Code ".$errorCode." already exists which states:: ".getRealDataNoHTML($result['errorStatement'])."<br>Please provide another error code.";
			}
		}
		else
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_errors` (`id` ,`errorCode` ,`errorStatement` ,`status`)VALUES ('' , '".$errorCode."', '".$errorStatement."', '1')";
				//$sql=$display_announcement->doQuery($entryString);
			$sql= $mysql->query($entryString);
			
			if($sql==TRUE)
			{
				return "Error Code Inserted Successfully1";
			}
		}
	}
	
	function setError($errorCode)
	{
		$this->errorCode=$errorCode;
		//echo $this->errorCode;
	}
	
	function showComponent($errorCode, $redirectUrl, $deepLength)
	{
		echo $this->getError($errorCode, $redirectUrl, $deepLength);
	}
	
	function displayComponent($errorCode, $redirectUrl, $deepLength)
	{
		$this->showComponent($errorCode, $redirectUrl, $deepLength);
	}
	
	
	function displayTextComponent($errorCode)
	{
		global $mysql;
		if(strlen($errorCode)>0)
		{
			$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_errors` WHERE `errorCode` = '".$errorCode."'";
			$sql_new=$mysql->query($query_new);
	
			
			
			$errorStatement="
			<table width='100%' border='0' cellspacing='2' cellpadding='10' align='center' class='ErrorTableClass'>
			<tr>
			<td align='left' valign='bottom' class='ErrorCellClass'>";
	
			if($mysql->num_rows >0)
			{
				
				while($result = $mysql->fetch_assoc_mine($sql_new))
				{
					$errorStatement=$errorStatement."".getRealDataNoHTML($result['errorStatement']);
				}
			}
			else
			{
				$errorStatement="Error Occured! Error Code Unlinkable.";
			}
			$errorStatement=$errorStatement."</td>
			  </tr>
			  </table></div>";
		}
		else
		{
			$errorStatement="";
		}
		  
		echo $errorStatement;
	}
	

}
?>