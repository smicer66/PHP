<?php
$user=new User();
$userDetails=$user->getUserDetails($_SESSION['uid']);

if(!isset($_SESSION['uid']))
{
?>

<form action="<?php
$loginAddy='index.php';
if(strlen($_SERVER['QUERY_STRING'])>0)
{
	$loginAddy=$loginAddy."?".$_SERVER['QUERY_STRING'];

}
echo $loginAddy;
?>
" method="post">
              <strong>Id:</strong>
              <input name="username" type="text" class="login" />
              <strong>Password:</strong>
              <input name="password" type="password" class="password" />
              <input name='Login_User' type='submit' class='formelement2' value='Login' />
              <br />
            </form>
			
<?php	
}	
else
{
?>
				<span class='tdmemberarea5'>You're Logged On, <?php echo $userDetails['username']; ?>!<br></span>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
				if(isset($_SESSION['uid']))
				{
				?>
				<a class='link_type1' href='index.php?fid=<?php echo FEATURE::getId('Message');?>&viewmsgtype=1'>Messages(<?php echo MESSAGE::getMyUnreadMessageCount($_SESSION['uid']);?>)</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
				}
				?>
				<?php
				if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer'))
				{
				?>
					<a class='link_type1' href='?fid=<?php echo FEATURE::getId('Project');?>&viewMe'>view Projects</a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<!--<a class='link_type1' href='viewvacancies.php'>view job vacancies</a>-->
				<?php
				}
				else
				{
				?>	
				<!--<a class='link_type1' href='postvacancy.php'>post a job vacancy</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
				<a class='link_type1' href='?fid=<?php echo FEATURE::getId('Project');?>'>post a project</a>
				<?php
				}
				?>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a class='link_type1' href='index.php?logout=1'>logout</a><br><br>
<?php
}
?>