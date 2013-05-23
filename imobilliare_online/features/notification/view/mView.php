<div id="rightsidebar" style="display:none; z-index:800" onmouseout="if(this.style.display=='block'){this.style.display='none';}">
<div style="height:100%; overflow-y:hidden; padding: 3px; border-bottom:#333333 2px solid;">
<?php 	
$socialNt=new Socials(); 
echo $socialNt->displayComponentPlugin('facebook', 1);
?>
</div>
</div>