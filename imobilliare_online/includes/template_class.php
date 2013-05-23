<?php

class Template
{
	public $tempName, $status, $dateCreated, $creator, $tempFilePath, $cssFilePath;

	function __construct()
	{

	}
	
	function getEditorClassFile()
	{
		global $mysql;
		$str3="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1'";
		$sql3= $mysql->query($str3);
		$result3 = $mysql->fetch_assoc_mine($sql3);
		
		$fileName=$result3['editorClassFileId'];
		
		if(strlen($fileName)>0)
		{
			return $fileName;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function setActiveTemplate()
	{
		global $mysql;

		if((isset($_REQUEST['fid'])) && (is_numeric($_REQUEST['fid'])==1))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND id = '".$_REQUEST['fid']."'";
			//echo $str;
			$sql= $mysql->query($str);
			if($mysql->num_rows > 0)
			{
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					$tempId=$result['mainViewTemplateId'];
					$str_temp="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `id` = '".$tempId."' AND `status` = 'Active'";
				
					$sql_temp= $mysql->query($str_temp);
					if($mysql->num_rows > 0)
					{
						while($result_temp = $mysql->fetch_assoc_mine($sql_temp))
						{
							$this->tempName=str_replace(' ', '', getRealDataNoHTML($result_temp['templateName']));
							$this->tempFilePath=$result_temp['tempFilePath'];
							$this->cssFilePath=$result_temp['cssFilePath'];
						}
					}
					else
					{
						$this->tempName=NULL;
						$this->tempFilePath=NULL;
						$this->cssFilePath=NULL;
					}
				}
			}
			else
			{
				$str_temp="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active' AND `frontPageYes` = '1'";
				$sql_temp= $mysql->query($str_temp);
	
				while($result_temp = $mysql->fetch_assoc_mine($sql_temp))
				{
					$this->tempName=str_replace(' ', '', $result_temp['templateName']);
					$this->tempFilePath=$result_temp['tempFilePath'];
					$this->cssFilePath=$result_temp['cssFilePath'];
				}
			}
		}
		
		else
		{

			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `name` = 'Frontpage'";
			$sql= $mysql->query($str);

			while($result = $mysql->fetch_assoc_mine($sql))
			{
				$str_temp="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active' AND `id` = '".$result['mainViewTemplateId']."'";
				$sql_temp= $mysql->query($str_temp);
				$result_temp = $mysql->fetch_assoc_mine($sql_temp);

				$this->tempName=str_replace(' ', '', $result_temp['templateName']);
				$this->tempFilePath=$result_temp['tempFilePath'];
				$this->cssFilePath=$result_temp['cssFilePath'];
			}
		}
		

		
	}
}

?>