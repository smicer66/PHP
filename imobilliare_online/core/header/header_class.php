<?php
class Header
{

	function __construct()
	{
	
	}
	
	
	function set_In_Out_Box($redirect)
	{
		if(is_numeric($_REQUEST['viewmsgtype'])==1)
		{
			$_SESSION['viewmsgtype']=$_REQUEST['viewmsgtype'];
			$url='Location: index.php?'.str_replace('&viewmsgtype='.$_REQUEST['viewmsgtype'], '', $redirect);
			//echo $url;
			header($url);
		
		}
	}
	
	
	function setReadMessage($id)
	{
		if((is_numeric($_REQUEST['view'])==1) && (isset($_SESSION['uid'])))
		{
			MESSAGE::setReadMessage($id);
		}
	}
	
	
	
	function todo($redirect, $fiid=NULL)
	{
		$this->set_In_Out_Box($redirect);
		$this->setReadMessage($fiid);
		$this->project_todos($redirect, $fiid);
	}
	
	
	function project_todos($redirect, $fiid=NULL)
	{
		//echo $_REQUEST['fid'];
		if((is_numeric($_REQUEST['close'])==1) && (FEATURE::getId('Project')==$_REQUEST['fid']) && isset($_SESSION['uid']))
		{
			PROJECT::closeProject($fiid, $_SESSION['uid']);
			$url='Location: index.php?'.str_replace('&close', '', $redirect);
			header($url);
		}
		if((isset($_REQUEST['assign'])) && (FEATURE::getId('Project')==$_REQUEST['fid']) && isset($_SESSION['uid']))
		{
			//echo 1212;
			$bidder=BID::getBidDetails($_REQUEST['fiiid']);
			PROJECT::assignProject($fiid, $bidder['developer_id']);
			$url='Location: index.php?'.str_replace('&assign', '', $redirect);
			header($url);
		}
		if((isset($_REQUEST['complete'])) && ($_REQUEST['complete']==1))
		{
			//echo 1212;
			PROJECT::projectCompleted($fiid, $_SESSION['uid']);
			$url='Location: index.php?'.str_replace('&complete=1', '&errcpj=errcpj8792362', $redirect);
			//header($url);
		}
		
		if((isset($_REQUEST['dcomplete'])) && ($_REQUEST['dcomplete']==1))
		{
			//echo 1212;
			PROJECT::projectDeveloperCompleted($fiid, $_SESSION['uid']);
			$url='Location: index.php?'.str_replace('&dcomplete=1', '&errcpj=errcpj8792361', $redirect);
			header($url);
		}
		if((isset($_REQUEST['agree'])) && ($_REQUEST['agree']==1) && (FEATURE::getId('Project')==$_REQUEST['fid']))
		{
			//echo 1212;
			//$bidder=BID::getBidDetails($_REQUEST['fiiid']);
			$uniqId=$_REQUEST['iqid'];
			$url=PROJECT::bidderAcceptProject($uniqId, $fiid);
			
			header($url);
		}
	}


}
?>