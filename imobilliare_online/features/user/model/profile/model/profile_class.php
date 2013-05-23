<?php

class Profile extends Feature
{
	function __construct()
	{
	
	}
	
	
	function pullUserDetails($id=NULL,$ustype)
	{

		$user1=USER::getUserDetails($id);
		if($user1['userTypeId']==$ustype)
		{
			return $user1;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	


}

//$user=new Profile();
//$user->displayProfile(1);
?>