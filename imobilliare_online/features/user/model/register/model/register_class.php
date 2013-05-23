<?php



class Register extends Feature
{
	/*style depics if thhe login form is flat[horizontal] or vertical[default*]*/
	public $status, $style;
	
	function __construct()
	{
	
	}
	
	function createVariables($arr)
	{
		for($count=0;$count<sizeof($arr);$count++)
		{
			$this->$arr[$count]='';
		}
	}
	
	function setStatus($status)
	{
		$this->status=$status;
	}
	
	function setStyle($style)
	{
		$this->style=$style;
	}
	
	function getStatus()
	{
		return $this->status;
	}
	
	function getStyle()
	{
		return $this->style;
	}
	
	
	function displayTextLink()
	{
		if(!isset($_SESSION['uid']))
		{
			if(file_exists("features/user/model/register/view/register_link.php"))
			{
				include("features/user/model/register/view/register_link.php");
			}
			else
			{
				if(file_exists("../features/user/model/register/view/register_link_admin.php"))
				{
					include("../features/user/model/register/view/register_link_admin.php");
				}
			}	
		}
	}
	
	
}

?>