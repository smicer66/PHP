<?Php
$userDet=USER::getUserDetails($_REQUEST['fiid']);
$rating=USER::getRating($_REQUEST['fiid']);
$fileArray=FILES::getFile(NULL, $_REQUEST['fiid'], NULL, 'Profile', NULL);
$faqArticle=ARTICLES::getArticleDetails('FAQs');
?>

<style type="text/css">
<!--
.style38 {color: #0066FF}
.style39 {font-size: 10px}
.style74 {font-size: 11px}
-->
</style>
<table width='95%' border='0' cellspacing='0' cellpadding='0'>
<?php
			echo PORTLET::displayHeader("Member Profile");
			?>
</table>
<table width='95%' border='0' cellspacing='5' cellpadding='5' class="onlyBorderAlone defaultBgColor">
  <tr>
    <td colspan="5" bgcolor="#FFFCEC" class=""><br />
        <br />      <table width="93%" border="0" align="left" cellpadding="5" cellspacing="5">
          <tr>
            <td valign="top"><table width="98" border="0" cellpadding="0" cellspacing="0" class="memberpix" heigh="98">
              <tr>
                <td align="center"><?php
					
		$ext=explode('.', getPictureFileName($fileArray[0]['id']));
		
		if((($ext[(sizeof($ext) - 1)]=='png') || ($ext[(sizeof($ext) - 1)]=='jpg') || ($ext[(sizeof($ext) - 1)]=='gif') || ($ext[(sizeof($ext) - 1)]=='jpe') || ($ext[(sizeof($ext) - 1)]=='jpeg') || ($ext[(sizeof($ext) - 1)]=='bmp') || ($ext[(sizeof($ext) - 1)]=='tiff')) && file_exists("features/user/Employer/view/images/".$ext[0].".".$ext[1]))
		{
			/*if($_SESSION['uid']==$_REQUEST['fiid'])
			{
				//?fid=9&mod=1&step=2&us=1
				echo "<a href='?fid=".FEATURE::getId('User')."&mod=1&step=2&us=".USERTYPE::getUserTypeId('Developer')."'>";
			}*/
			echo "<img src='features/user/developer/view/images/".$ext[0].".".$ext[1]."' width='78' height='82' border='0' title='Click to change your logo'>";
			/*if($_SESSION['uid']==$_REQUEST['fiid'])
			{
				echo "</a>";
			}*/
		}
		
		else
		{
			if($_SESSION['uid']==$_REQUEST['fiid'])
			{
				echo "<a href='?fid=".FEATURE::getId('User')."&mod=1&step=2&us=".USERTYPE::getUserTypeId('Developer')."'>";
			}
			echo "<img src='images/user.png' border='0' title='Click to upload your logo'>";
			if($_SESSION['uid']==$_REQUEST['fiid'])
			{
				echo "</a>";
			}
		}
						?>                </td>
            </tr>
              </table>
                <br />
                <br />
                <table width="481" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="193" valign="top" class="tdstyle13"><span class="style10">Id:</span></td>
                    <td width="288" class="tdstyle13"><?php
  		echo $userDet['username'];
		
		?>
                        <br />
                        <br /></td>
                  </tr>
                  <tr>
                    <td valign="top" class="tdstyle14"><span class="style10">Joined imobilliare.com on: </span></td>
                    <td class="tdstyle14"><span class="style74">
                      <?php
  		$subspt_date=explode(' ', $userDet['subspt_date']);
		echo getDateInWords($subspt_date[0]);
		
		?>
                      <br />
                      <br />
                    </span></td>
                  </tr>
                  <tr>
                    <td valign="top" class="tdstyle13"><span class="style74"><strong>Personnel Type: </strong></span></td>
                    <td class="tdstyle13"><span class="style74">
                      <?php
  		$userTypeDet=USERTYPE::getUserTypeDetails($userDet['userTypeId']);
		echo $userTypeDet['name'];
						?>
                      <br />
                      <br />
                    </span></td>
                  </tr>
                  <tr>
                    <td valign="top" class="tdstyle14"><span class="style10">Status:</span></td>
                    <td class="tdstyle14"><span class="style74">
                      <?php
  		echo $userDet['status'];
		
						?>
                      <br />
                      <br />
                    </span></td>
                  </tr>
                  
                  <tr>
                    <td valign="top" class="tdstyle14 style74"><strong>State:</strong></td>
                    <td class="tdstyle14">
					<?php
					if(strlen($userDet['state'])>0)
					{
				  		echo $userDet['state'];
					}
					else
					{
						echo "None Listed";
					}
		
						?>
                        <br />
                      <br /></td>
                  </tr>
                  <tr>
                    <td valign="top" class="tdstyle13 style74"><strong>Country:</strong></td>
                    <td class="tdstyle13">
					<?php
					if(strlen($userDet['country'])>0)
					{
				  		echo getCountryName($userDet['country']);
					}
					else
					{
						echo "None Listed";
					}?>
                        <br />
                      <br /></td>
                  </tr>
                  <tr>
                    <td valign="top" class="tdstyle14 style74"><strong>Total Worth from Projects: </strong></td>
                    <td class="tdstyle14"><?php
  		$worth=BILLING::getUserWorth($_REQUEST['fiid']);

		if(($worth)!="0.00")
		{
			echo "NGN".$worth;
		}
		else
		{
			echo "NGN 0.00";
		}

		
		?>
                        <br />
                      <br />                    </td>
                  </tr>
                  <tr>
                    <td valign="top" class="style74 tdstyle13"><strong>Profile:</strong></td>
                    <td class="tdstyle13"><?php
  		if(strlen($userDet['profile'])>0)
		{
			echo $userDet['profile'];
		}
		else
		{
			echo "None Listed";
		}
		
		?>
                        <br />
                      <br /></td>
                  </tr>
                  <tr>
                    <td valign="top" class="tdstyle14"><span class="style74"><strong>Rating (Out of 10):</strong></span></td>
                    <td class="tdstyle14">
					<?php	
		if($rating>0)
		{
		echo $rating;
		}
		else
		{
			echo "Not Rated";
		}
		
		

		
		?>
                        <br />
                        <br /></td>
                  </tr>
                  <tr>
                    <td colspan="2" valign="top" class="tdstyle10d">Rating are a result of accumulated ratings from previous developers/employers the member has had dealings with in the past. <a href="?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo $faqArticle['id'];?>">Rating System</a> </td>
                  </tr>
                </table>
            <br />
                <br />
                <br />
                <div style="width:80%">
				<?php
				$reviews=PROJECT::getReviews($userDet['id']);

				if(sizeof($reviews))
				{
				?>
					<label><u>Reviews</u></label><br /><br />
				<?php
				}
				
				
				for($count=0;$count<sizeof($reviews);$count++)
				{
					$usDet=USER::getDetails($reviews[$count]['reviewer_id']);
					echo $reviews[$count]['details'];
					echo "<div style='text-align:right; border-bottom: 1px solid #cccccc'><i>".$usDet['username']." - ".$reviews[$count]['creation_date']."</i></div>";
				}
				?>
				</div></td>
        </tr>
        </table></td>
  </tr>
</table>
