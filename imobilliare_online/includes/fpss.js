
// Browser Slide-Show script. With image cross fade effect for those browsers
// that support it.
// Script copyright (C) 2004-2008 www.cryer.co.uk.
// Script is free to use provided this copyright header is included.
var FadeDurationMS=1000;
var pauseFlag = false;
var firstDelay = false;
var timer;

function SetOpacity(object,opacityPct)
{
	// IE.
	object.style.filter = 'alpha(opacity=' + opacityPct + ')';
	// Old mozilla and firefox
	object.style.MozOpacity = opacityPct/100;
	// Everything else.
	object.style.opacity = opacityPct/100;
}
function ChangeOpacity(id,msDuration,msStart,fromO,toO)
{
	var element=document.getElementById(id);
	var msNow = (new Date()).getTime();
	var opacity = fromO + (toO - fromO) * (msNow - msStart) / msDuration;
	if (opacity>=100)
	{
		SetOpacity(element,100);
		element.timer = undefined;
	}
	else if (opacity<=0)
	{
		SetOpacity(element,0);
		element.timer = undefined;
	}
	else 
	{
		SetOpacity(element,opacity);
		element.timer = window.setTimeout("ChangeOpacity('" + id + "'," + msDuration + "," + msStart + "," + fromO + "," + toO + ")",10);
	}
}
function FadeInImage(foregroundID,newImage,backgroundID)
{
	var foreground=document.getElementById(foregroundID);
	if (foreground.timer) window.clearTimeout(foreground.timer);

	if (backgroundID)
	{
		var background=document.getElementById(backgroundID);
		if (background)
		{
			if (background.src)
			{
				foreground.src = background.src;	
				SetOpacity(foreground,100);
			}
			
			background.src = newImage;
			background.style.backgroundImage = 'url(' + newImage + ')';
			background.style.backgroundRepeat = 'no-repeat';
			var startMS = (new Date()).getTime();
			foreground.timer = window.setTimeout("ChangeOpacity('" + foregroundID + "'," + FadeDurationMS + "," + startMS + ",100,0)",10);
		}
	} else {
		foreground.src = newImage;
	}
}


var slideCache = new Array();

function RunSlideShow(pictureID,backgroundID,imageFiles,displaySecs)
{
	var imageSeparator = imageFiles.indexOf(";");
	var nextImage = imageFiles.substring(0,imageSeparator);
	FadeInImage(pictureID,nextImage,backgroundID);
	var futureImages = imageFiles.substring(imageSeparator+1,imageFiles.length)+ ';' + nextImage;
	timer=setTimeout("RunSlideShow('"+pictureID+"','"+backgroundID+"','"+futureImages+"',"+displaySecs+")",
		displaySecs*1000);
	// Cache the next image to improve performance.
	imageSeparator = futureImages.indexOf(";");
	nextImage = futureImages.substring(0,imageSeparator);
	if (slideCache[nextImage] == null)
	{
		slideCache[nextImage] = new Image;
		slideCache[nextImage].src = nextImage;
	}
}





function play(name, bg, pix, time)
{
	if(play)
	{
		RunSlideShow(name,bg,pix,time);
		return 1;
		
	}
	
}

function toggle(d, e, f)
{
	var o=document.getElementById(d);
	o.style.display=(o.style.display=='none')?'block':'none';
	o.title=(o.style.display=='none')?'Click to Maximize and Enter Details':'Click to Minimize';
	
	var o=document.getElementById(e);
	o.style.display=(o.style.display=='none');
	o.title=(o.style.display=='none')?'Click to Maximize and Enter Details':'Click to Minimize';
	
	var o=document.getElementById(f);
	o.style.display=(o.style.display=='none');
	o.title=(o.style.display=='none')?'Click to Maximize and Enter Details':'Click to Minimize';
}



function autoSlide() 
{
	if (!pauseFlag) 
	{
		timer = setTimeout('autoSlide()', speed_delay);
		if (!firstDelay) 
		firstDelay = true;
		else showNext();
	}
}

function clearSlide() 
{
	if (!pauseFlag) 
	{
		clearTimeout(timer);
		firstDelay = false;
		
	}
}


function textCounter(field, countfield, maxlimit) 
{
	if (field.value.length > maxlimit)
	{
		field.value = field.value.substring(0, maxlimit);
	}
	else 
	{
		countfield.value = maxlimit - field.value.length;
	}
}