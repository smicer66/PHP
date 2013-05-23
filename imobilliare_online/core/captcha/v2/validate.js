var array_holder=new Array();
var test=0;
var test2=0;
var counter_super=0;
var maxim_float;
var captcha_border_size;
var maxim_incline;
var counter11=0;
var counter2=0;
var xter_count;
var period;
var float_steps;
var rotate_steps;
var beam_width;
var beam_height;
var captcha_div_width;
var current_super_div_width;
var curr_searchlight_width;
var curr_searchlight_holder;
var slbeam2Left;
var roundbeam2Left;	
var bigger_beam;
var roundbeam;
var searchlight;
var searchlightbeam;
var searchlightbeam2;
var border;



function captcha(maximum_float, maximum_incline, captcha_b_size, xter_count_super, time_secs)
{
	float_steps_super = '10';
	rotate_steps_super = '10';

	
	//if(document.getElementById(div))
	//{
	
		if(counter11++==0)
		{
	
			if((maximum_float))
			{
				
				float_steps=parseInt(float_steps_super);
				xter_count = parseInt(xter_count_super);
				beam_width = parseInt(document.getElementById('fontSize').offsetWidth);
				beam_height = parseInt(document.getElementById('fontSize').offsetHeight);
				bigger_beam = ((parseInt(maximum_float) * 2) + beam_width + float_steps + (captcha_b_size*(2)) - 1);
	
				maxim_float=maximum_float;
				maxim_incline = Math.abs(maximum_incline);
				captcha_border_size=captcha_b_size;
				period = parseInt(time_secs);
				
				rotate_steps=parseInt(rotate_steps_super);
				captcha_div_width=(((parseInt(maximum_float) * 2) + beam_width + float_steps) * xter_count) + (captcha_border_size*(xter_count + 1));
				curr_searchlight_width=(((parseInt(maximum_float) * 2) + beam_width + float_steps)) + (captcha_border_size*(2));
				curr_searchlight_holder=(((parseInt(maximum_float) * 2) + beam_width + float_steps));
				document.getElementById('roundbeam').style.left = (0 - bigger_beam) + "px";
				document.getElementById('roundbeam').style.top = "0px";
				
				current_super_div_width=captcha_div_width;
				
				setSuperDiv();
				setSuperSearchLight();
				for(countre=0;countre<xter_count;countre++)
				{
					
					document.getElementById('captchaItem' + countre + '_holder').style.left = (countre * (curr_searchlight_holder + parseInt(captcha_b_size))) + "px";
					document.getElementById('captchaItem' + countre + '_holder').style.top = "0px";
					document.getElementById('captchaItem' + countre + '_holder').style.height = curr_searchlight_width + "px";
	
	
					document.getElementById('captchaItem' + countre).style.left = ((countre * curr_searchlight_holder) + (curr_searchlight_holder/2) - (beam_width/2)) + "px";
					document.getElementById('captchaItem' + countre).style.top =  ((parseInt(document.getElementById('captcha_div').style.height)/2) - (parseInt(beam_height)/2)) + "px";
					document.getElementById('captchaItem' + countre).style.width =  parseInt(beam_width) + "px";
					
					
				}
			
			}
		}
		
		var move_right=1;
		var move_left=1;
		var move_up=1;
		var move_down=1;
	
		
		if(document.getElementById('roundbeam') && document.getElementById('searchlight') && document.getElementById('searchlightbeam') && document.getElementById('searchlightbeam2') && document.getElementById('border'))
		{
			roundbeam= document.getElementById('roundbeam');
			
			searchlight= document.getElementById('searchlight');
			searchlightbeam= document.getElementById('searchlightbeam');
			searchlightbeam2= document.getElementById('searchlightbeam2');
			border= document.getElementById('border');
			
			if(counter11++==1)
			{
				//current_super_div_width
				searchlight.style.left=captcha_div_width + "px";
				searchlightbeam.style.left = (0 - parseInt(maxim_float) + float_steps + parseInt(captcha_border_size)) + "px";
				searchlightbeam2.style.left = 0 + "px";
				searchlightbeam.style.top = 0 + "px";
				searchlightbeam.style.width = bigger_beam + "px";
				searchlightbeam2.style.top = 0 + "px";
				slbeam2Left = 0 + "px";
				roundbeam2Left = (0 - bigger_beam) + "px";
				
				searchlightbeam2.style.width= captcha_div_width + "px";
				searchlightbeam.style.height= bigger_beam + "px";
				searchlightbeam2.style.height= bigger_beam + "px";
				
				roundbeam.style.width = bigger_beam + "px";
				roundbeam.style.height = bigger_beam + "px";
				
				roundbeam.style.MozBorderRadius = bigger_beam + "px";
				roundbeam.style.webkitBorderRadius = bigger_beam + "px";
				roundbeam.style.khtmlBorderRadius = bigger_beam + "px";
				roundbeam.style.borderRadius = bigger_beam + "px";
				
				
			}
			
			
			if(parseInt(searchlight.style.left) > (parseInt(border.style.width) + parseInt(maxim_float*2) + bigger_beam))
			{
				searchlight.style.left = 0 + "px";
			
				searchlightbeam2.style.left = 0 + "px";
				slbeam2Left = 0;
				roundbeam2Left = (0 - bigger_beam);
				searchlightbeam.style.left = (0 - parseInt(maxim_float*2) - (beam_width + float_steps) + parseInt(captcha_border_size)) + "px";
				searchlightbeam.style.width = "1px";
				//alert(test);
				test=1;
				
				roundbeam.style.left = (0 - bigger_beam) + "px";
				
			}
			else
			{
				
				test=0;	
				
					
		
				
					searchlight.style.left = (parseInt(searchlight.style.left) + float_steps)+'px';
					
					
	
					searchlightbeam.style.width = parseInt(searchlightbeam.style.width) + float_steps + "px";
	
					if(counter11==2)
					{
							
					}
					slbeam2Left = parseInt(slbeam2Left) + float_steps;
	
					searchlightbeam2.style.left = parseInt(slbeam2Left) + "px";
					
					roundbeam2Left = (parseInt(roundbeam2Left) +  parseInt(float_steps));
	
					roundbeam.style.left = (roundbeam2Left) + "px";
	
			}
			
			if(test ==1)
			{
					
				for(count=0;count<xter_count;count++)
				{
					
					rand=Math.floor(Math.random() * 4);
					rand1=Math.floor(Math.random() * 2);
					
						move_right=1;
						move_left=1;
						move_up=1;
						move_down=1;
						if(parseInt(document.getElementById('captchaItem' + count).style.left) >= ((parseInt(document.getElementById('captchaItem' + count + '_holder').style.left) + parseInt(maxim_float*2) + float_steps)))
						{
							move_right=0;
						}
						
	
						if((((parseInt(document.getElementById('captchaItem' + count).style.top)) + parseInt(document.getElementById('fontSize').offsetHeight))) >= ((curr_searchlight_width - 5)))
						{
	
							move_down=0;
						}
	
						
						if(((parseInt(document.getElementById('captchaItem' + count).style.top) - float_steps)) < ((parseInt(document.getElementById('captchaItem' + count + '_holder').style.top))))
						{
							
							move_up=0;
						}
	
						if(((parseInt(document.getElementById('captchaItem' + count).style.left) - float_steps)) < ((parseInt(document.getElementById('captchaItem' + count + '_holder').style.left))))
						{
							
							move_left=0;
						}
						
						floatItem('captchaItem', rand, rand1, move_up, move_down, move_left, move_right, count, maxim_incline, rotate_steps, float_steps, xter_count);
					
					
				}
			}
			setTimeout(captcha,period);
			
		}
	//}
}


function setSuperDiv()
{
	
	//if((parseInt(document.getElementById('captcha_div').style.width) + float_steps)<current_super_div_width)
	//{
		//document.getElementById('captcha_div').style.width = (parseInt(document.getElementById('captcha_div').style.width) + float_steps) + "px";	
		document.getElementById('captcha_div').style.width = (current_super_div_width - 1) + "px";	
		//document.getElementById('border').style.width = (parseInt(document.getElementById('border').style.width) + float_steps) + "px";
		document.getElementById('border').style.width = (current_super_div_width - 1) + "px";
		document.getElementById('captcha_div').style.height = curr_searchlight_width + "px";
		document.getElementById('border').style.height = curr_searchlight_width + "px";
		//setTimeout(setSuperDiv,1);
	//}
	//else
	//{	
	//}
	
	
																							
}


function setSuperSearchLight()
{
	
	//if(parseInt(document.getElementById('searchlight').style.width)<curr_searchlight_width)
//	{
		//document.getElementById('searchlight').style.width = (parseInt(document.getElementById('searchlight').style.width) + float_steps) + "px";	
		document.getElementById('searchlight').style.width = (curr_searchlight_width - 1) + "px";	
		
		//setTimeout(setSuperSearchLight,1);
	//}
	//else
	//{
	//}
	
	
																							
}


function setSuperHolder(count)
{
	
	if(parseInt(document.getElementById('captchaItem' + count + '_holder').style.width)<curr_searchlight_holder)
	{
		//document.getElementById('captchaItem' + count + '_holder').style.width = (parseInt(document.getElementById('captchaItem' + count + '_holder').style.width) + float_steps) + "px";	
		document.getElementById('captchaItem' + count + '_holder').style.width = (curr_searchlight_holder - 1) + "px";	
		document.getElementById('captchaItem' + count + '_holder').style.height = curr_searchlight_width + "px";
		
		//setTimeout(setSuperHolder,1);
	}
	else
	{
		
	}
	
	
																							
}


function floatItem(captchaItemId, rand, rand1, move_up, move_down, move_left, move_right, count, maximum_incline, rotate_by, float_by, xter_count)
{
	test2++;
	
	if(test2 > xter_count)
	{
		//alert(maximum_incline);
		var captchaItem=document.getElementById(captchaItemId + "" + count);
		if(document.getElementById('captchaItem' + count).style.MozTransform)
		{
			currentIncline=parseInt(document.getElementById('captchaItem' + count).style.MozTransform.substr(7, document.getElementById('captchaItem' + count).style.MozTransform.indexOf('deg')));
		}
		else
		{
			currentIncline = 0;
		}
		
		var status1;
		//rand=0;
		if(rand==0)
		{
	
			//document.getElementById('current_status').innerHTML="move upwards" + " for " + rand;
			if(move_up==1)
			{
				status1="Actually move upwards" + move_up + " for " + rand;
				captchaItem.style.top = (parseInt(captchaItem.style.top) - float_by)+'px';
				
			}
			else
			{
				status1="Actually move downwards" + " for " + rand;
				captchaItem.style.top = (parseInt(captchaItem.style.top) + float_by)+'px';
			}
		}
		else if(rand==1)
		{
			//document.getElementById('current_status').innerHTML="move leftwards" + " for " + rand;
			if(move_left==1)
			{
				status1="Actually move left" + " for " + rand;
				captchaItem.style.left = (parseInt(captchaItem.style.left) - float_by)+'px';
			}
			else
			{
				status1="Actually move right" + " for " + rand;
				captchaItem.style.left = (parseInt(captchaItem.style.left) + float_by)+'px';
			}
		}
		else if(rand==2)
		{
			//document.getElementById('current_status').innerHTML="move downwards" + " for " + rand;
			if(move_down==1)
			{
				status1="Actually move down" + " for " + rand;
				captchaItem.style.top = (parseInt(captchaItem.style.top) + float_by)+'px';
			}
			else
			{
				status1="Actually move up" + " for " + rand;
				captchaItem.style.top = (parseInt(captchaItem.style.top) - float_by)+'px';
			}
		}
		else if(rand==3)
		{
			//document.getElementById('current_status').innerHTML="move right" + " for " + rand;
			if(move_right==1)
			{
				status1="Actually move right" + " for " + rand;
				captchaItem.style.left = (parseInt(captchaItem.style.left) + float_by)+'px';
			}
			else
			{
				status1="Actually move left" + " for " + rand;
				captchaItem.style.left = (parseInt(captchaItem.style.left) - float_by)+'px';	
			}
		}
		if(count==0)
		{
			//document.getElementById('1current_status').innerHTML=status1;	
		}
		else
		{
			//document.getElementById('captchaItemText').innerHTML=status1;	
		}
		
		//uncomment line 367, 368, 369, and 403 to confirm that the rotate works. If it works it will rotate the 
		//character number 1 only in one direction. When it gets to the maximum it will
		//rotate the opposite way
//rand1=1;
//if(count==0)
//{
	
		if(maximum_incline > 0)
		{
			if((Math.abs(currentIncline) + rotate_by) > maximum_incline)
			{
				if((rand1==0) && ((((currentIncline) - rotate_by) < (0 - maximum_incline))))
				{	
					rand1 = 1;
				}
				else if((rand1==0) && ((((currentIncline) - rotate_by) > (maximum_incline))))
				{	
					rand1 = 0;
				}
				else if((rand1==1) && ((((currentIncline) + rotate_by) > maximum_incline)))
				{
					rand1 = 0;	
				}
				else if((rand1==1) && ((((currentIncline) + rotate_by) < (0 - maximum_incline))))
				{
					rand1 = 1;	
				}
			}
			
			
			if(rand1==0)
			{
				minus="";
				
				document.getElementById('captchaItem' + count).style.WebkitTransform = "rotate(" + minus + (currentIncline - rotate_by) + "deg)";
				document.getElementById('captchaItem' + count).style.MozTransform = "rotate(" + minus + (currentIncline - rotate_by) + "deg)";
				document.getElementById('captchaItem' + count).style.OTransform = "rotate(" + minus + (currentIncline - rotate_by) + "deg)";
				document.getElementById('captchaItem' + count).style.transform = "rotate(" + minus + (currentIncline - rotate_by) + "deg)";	
				
				
			}
			else if(rand1==1)
			{
				document.getElementById('captchaItem' + count).style.WebkitTransform = "rotate(" + (currentIncline + rotate_by) + "deg)";
				document.getElementById('captchaItem' + count).style.MozTransform = "rotate(" + (currentIncline + rotate_by) + "deg)";
				document.getElementById('captchaItem' + count).style.OTransform = "rotate(" + (currentIncline + rotate_by) + "deg)";
				document.getElementById('captchaItem' + count).style.transform = "rotate(" + (currentIncline + rotate_by) + "deg)";	
			}
		}
	}
//}
}
