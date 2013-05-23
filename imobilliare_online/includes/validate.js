//wrong document
// JavaScript Document
// holds an instance of XMLHttpRequest
var xmlHttp = createXmlHttpRequestObject();
// holds the remote server address
var serverAddress = "../../../scripts/validate.php";
var serverAddressForLogo= "includes/kaka.php?action=Logo&style=12921";
var serverAddressForSelect= "../includes/kaka.php?action=Select&style=1";
var serverAddressForSpecify= "includes/kaka.php?action=Specify&style=102";
var serverAddressForSelect1= "../includes/kaka.php?action=Select&style=2";
var serverAddressForSelect2= "../includes/kaka.php?action=Select&style=3";
var serverAddressForSelect3= "../../../scripts/kaka.php?action=Select&style=4";
var serverAddressForSelect4= "../includes/kaka.php?action=Select&style=5";
var serverAddressForSelect5= "../includes/kaka.php?action=Select&style=6";
var serverAddressForSelect41= "includes/kaka.php?action=Select&style=5";
var serverAddressForSelect51= "includes/kaka.php?action=Select&style=6";
var serverAddressForNotification= "includes/kaka.php?action=Select&style=18590";
var serverAddressForSelect45= "../includes/kaka.php?action=Select&style=55";
var serverAddressForSelect55= "../includes/kaka.php?action=Select&style=65";
var serverAddressForSelect6= "../../../scripts/kaka.php?action=Select&style=7";
var serverAddressForSelect7= "../../../scripts/kaka.php?action=Select&style=8";
var serverAddressForSelect8= "../includes/kaka.php?action=Select&style=9";
var serverAddressForSelect9= "../../scripts/kaka.php?action=Select&style=10";
var serverAddressForSelect10= "scripts/kaka.php?action=Select&style=11";
var serverAddressForSelect104State= "scripts/kaka.php?action=Select&style=18";
var serverAddressForSelect105State= "includes/kaka.php?action=Select&style=18";
var serverAddressForSelect11= "includes/kaka.php?action=Select&style=12";
var serverAddressForSelect12= "../../../scripts/kaka.php?action=Select&style=13";
var serverAddressRegForm="includes/validate.php";
var serverAddressRegForm1="includes/validate.php?validationType=php";
var serverAddressForSelect15= "../includes/kaka.php?action=Select&style=15";
var serverAddressForSelect16= "../../../scripts/kaka.php?action=Select&style=16";
var serverAddressForSelect17= "../includes/kaka.php?action=Select&style=17";
var serverAddressForSelect18= "../includes/kaka.php?action=Select&style=19";
var serverAddressForSelect20= "scripts/kaka.php?action=Select&style=20";
var serverAddressForSelect21= "../../../scripts/kaka.php?action=Select&style=21";
var serverAddressForSelect22="../../../scripts/kaka.php?action=Select&style=12";
var serverAddressForSelect408= "../includes/kaka.php?action=Select&style=408";
var serverAddressForSelect409= "../includes/kaka.php?action=Select&style=409";
var serverAddressForSelect410= "../includes/kaka.php?action=Select&style=410";
var serverAddressForAccessPanel= "includes/kaka.php?action=Select&style=900";
var serverAddressForSelectCompose= "includes/kaka.php?action=SelectCompose";
var serverAddressForSelect133= "includes/validate.php";
// when set to true, display detailed error messages
var showErrors = true;
// initialize the validation requests cache
var cache = new Array();
//create instance of XMLHttpRequest for handling logo upload notification
var xmlHttpLogo = createXmlHttpRequestObject();
//creare instance for selecting developers, employers, personnel
var xmlHttpSelectDev = createXmlHttpRequestObject();
//create instance for access panel on index page;
var xmlHttpAccessPan = createXmlHttpRequestObject();

var updateInterval=2;

var lastIndex;


//initialize the validation value for confirm_password
var value= "hidden";

// creates an XMLHttpRequest instance
function createXmlHttpRequestObject()
{
// will store the reference to the XMLHttpRequest object
	var xmlHttp;
// this should work for all browsers except IE6 and older
	try
	{
		// try to create XMLHttpRequest object
		xmlHttp = new XMLHttpRequest();
	}
	catch(e)
	{
		// assume IE6 or older
		var XmlHttpVersions = new Array("MSXML2.XMLHTTP.6.0",
		"MSXML2.XMLHTTP.5.0",
		"MSXML2.XMLHTTP.4.0",
		"MSXML2.XMLHTTP.3.0",
		"MSXML2.XMLHTTP",
		"Microsoft.XMLHTTP");
		// try every id until one works
		for (var i=0; i<XmlHttpVersions.length && !xmlHttp; i++)
		{
			try
			{
				// try to create XMLHttpRequest object
				xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
			}
			catch (e) {} // ignore potential error
		}
	}
	// return the created object or display an error message
	if (!xmlHttp)
	displayError("Error creating the XMLHttpRequest object.");
	else
	return xmlHttp;
}



// function that displays an error message
function displayError($message)
{
	// ignore errors if showErrors is false
	if (showErrors)
	{
		// turn error displaying Off
		showErrors = false;
		// display error message
		//alert("Error encountered: \n" + $message);
		// retry validation after 10 seconds
		setTimeout("validate();", 10000);
	}
}



// the function handles the validation for any form field

function validateFromHome(inputValue, fieldID)
{
	//alert("Error encountered: \n" + $message);
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				if(fieldID == 'project_type')
				{
					xmlHttp.open("POST", serverAddressForSelect11, true);
				}
				else if(fieldID == 'featureName')
				{
					xmlHttp.open("POST", serverAddressForSelect1, true);
				}
				else if(fieldID == 'menuName')
				{
					xmlHttp.open("POST", serverAddressForSelect2, true);
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.open("POST", serverAddressForSelect3, true);
				}
				else if(fieldID == 'state')
				{
					xmlHttp.open("POST", serverAddressForSelect8, true);
				}
				else if(fieldID == 'country')
				{
					xmlHttp.open("POST", serverAddressForSelect10, true);
				}
				else if(fieldID == 'addImage')
				{
					docFieldId=document.getElementById('addImage');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect41, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect51, true);
					}
				}
				else if(fieldID == 'addImage1')
				{
					docFieldId=document.getElementById('addImage1');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect6, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				else if(fieldID == 'addImage2')
				{
					docFieldId=document.getElementById('addImage2');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect7, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				
				
				
				if(fieldID == 'menuName')
				{
					xmlHttp.onreadystatechange = handleSectionSelect1;
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.onreadystatechange = handleSectionSelect2;
				}
				else if(fieldID == 'addImage')
				{
					xmlHttp.onreadystatechange = handleSectionSelect4;
				}
				else if(fieldID == 'addImage1')
				{
					xmlHttp.onreadystatechange = handleSectionSelect4;
				}
				else if(fieldID == 'addImage2')
				{
					xmlHttp.onreadystatechange = handleSectionSelect5;
				}
				else
				{
					xmlHttp.onreadystatechange = handleSectionSelect;
				}
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}



function setSelectedDevCompose()
{
		
	if(xmlHttpSelectDevCompose)
	{
		try
		{
			// call the server page to execute the server-side operation
			xmlHttpSelectDevCompose.open("POST", serverAddressForSelectCompose, true);
			xmlHttpSelectDevCompose.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlHttpSelectDevCompose.onreadystatechange = handleSelectDevNotificationCompose;
			xmlHttpSelectDevCompose.send(null);
		}
		catch(e)
		{
			displayError(e.toString());
		}
	}

}

function showHideIds(divHide, divShow)
{
	
	if((divHide instanceof Array) && (divShow instanceof Array))
	{
		
		for(count=0;count<divHide.length;count++)	
		{
			
			if((document.getElementById(divHide[count])))
			{
				
				document.getElementById(divHide[count]).style.display='none';
			}
		}
		
		for(count=0;count<divShow.length;count++)	
		{
		//document.getElementById(divShow[count]).className="visibleClass";
			if(document.getElementById(divShow[count]))
			{
				document.getElementById(divShow[count]).style.display='block';
				
			}
		}
		
	}	
}


function checkInputNumeric(ob) {
	var invalidChars = /[^0-9]/gi;
	if(isNaN(ob.value))
	{
		alert("Your last input is not a number. Change it to a number!");
		ob.value = ob.value.replace(ob.value,"");
	}
 
  /*var invalidChars = /[^0-9]/gi
  if(invalidChars.test(ob.value)) {
            ob.value = ob.value.replace(invalidChars,"");
      }*/
}



function handleSelectDevNotificationCompose()
{
	// continue if the process is completed
	if (xmlHttpSelectDevCompose.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttpSelectDevCompose.status == 200)
		{
			try
			{
				// process the server's response
				readSelectionCompose();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttpSelectDevCompose.statusText);
		}
	}
}



function readSelectionCompose()
{
	// retrieve the server's response
	
	var responseCompose = xmlHttpSelectDevCompose.responseText;
	// server error?
	if (responseCompose.indexOf("ERRNO") >= 0	|| responseCompose.indexOf("error") >= 0	|| responseCompose.length == 0)
	throw(responseCompose.length == 0 ? "Server error." : responseCompose);
	// display the message
	if($message_tempCompose!=responseCompose)
	{
		displaySelectedNotificationCompose(responseCompose);
	}
	// restart sequence
	setTimeout("setSelectedDevCompose();", updateInterval * 1000);
}



function displaySelectedNotificationCompose($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("SelectDevStatusCompose");
	// display message
	$message_tempCompose=$message;
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}

function validateFromHomeStyle1(inputValue, fieldID)
{
	//alert("Error encountered: \n" + $message);
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				xmlHttp.open("POST", serverAddressForSelect22, true);
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlHttp.onreadystatechange = handleSectionSelect;
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}



function validateFromHome4State(inputValue, fieldID)
{
	//alert("Error encountered: \n" + $message);
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				if(fieldID == 'section')
				{
					xmlHttp.open("POST", serverAddressForSelect11, true);
				}
				else if(fieldID == 'featureName')
				{
					xmlHttp.open("POST", serverAddressForSelect1, true);
				}
				else if(fieldID == 'menuName')
				{
					xmlHttp.open("POST", serverAddressForSelect2, true);
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.open("POST", serverAddressForSelect3, true);
				}
				else if(fieldID == 'state')
				{
					xmlHttp.open("POST", serverAddressForSelect8, true);
				}
				else if(fieldID == 'country')
				{
					xmlHttp.open("POST", serverAddressForSelect104State, true);
				}
				else if(fieldID == 'addImage')
				{
					docFieldId=document.getElementById('addImage');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect4, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				else if(fieldID == 'addImage1')
				{
					docFieldId=document.getElementById('addImage1');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect6, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				else if(fieldID == 'addImage2')
				{
					docFieldId=document.getElementById('addImage2');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect7, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				
				
				
				if(fieldID == 'menuName')
				{
					xmlHttp.onreadystatechange = handleSectionSelect1;
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.onreadystatechange = handleSectionSelect2;
				}
				else if(fieldID == 'addImage')
				{
					xmlHttp.onreadystatechange = handleSectionSelect4;
				}
				else if(fieldID == 'addImage1')
				{
					xmlHttp.onreadystatechange = handleSectionSelect4;
				}
				else if(fieldID == 'addImage2')
				{
					xmlHttp.onreadystatechange = handleSectionSelect5;
				}
				else
				{
					xmlHttp.onreadystatechange = handleSectionSelect4State;
				}
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}


function validateFromHome4StateStyle1(inputValue, fieldID)
{
	//alert("Error encountered: \n" + $message);
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				xmlHttp.open("POST", serverAddressForSelect105State, true);
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlHttp.onreadystatechange = handleSectionSelect4State;
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}




function validate(inputValue, fieldID)
{
	//alert("Error encountered: \n" + $message);
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				if(fieldID == 'project_type')
				{
					xmlHttp.open("POST", serverAddressForSelect, true);
				}
				if(fieldID == 'SPECIFY')
				{
					xmlHttp.open("POST", serverAddressForSpecify, true);
				}
				else if(fieldID == 'project_type')
				{
					xmlHttp.open("POST", serverAddressForSelect, true);
				}
				else if(fieldID == 'featMenu')
				{
					xmlHttp.open("POST", serverAddressForSelect15, true);
				}
				else if(fieldID == 'featMenu1')
				{
					xmlHttp.open("POST", serverAddressForSelect17, true);
				}
				else if(fieldID == 'advertname')
				{
					xmlHttp.open("POST", serverAddressForSelect18, true);
				}
				
				else if(fieldID == 'check')
				{
					xmlHttp.open("POST", serverAddressForSelect, true);
				}
				else if(fieldID == 'featureName')
				{
					xmlHttp.open("POST", serverAddressForSelect1, true);
				}
				else if(fieldID == 'menuName')
				{
					xmlHttp.open("POST", serverAddressForSelect2, true);
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.open("POST", serverAddressForSelect3, true);
				}
				else if(fieldID == 'state')
				{
					xmlHttp.open("POST", serverAddressForSelect8, true);
				}
				else if(fieldID == 'noOfDays')
				{
					xmlHttp.open("POST", serverAddressForSelect408, true);
				}
				else if(fieldID == 'noOfDays2')
				{
					xmlHttp.open("POST", serverAddressForSelect409, true);
				}
				else if(fieldID == 'country')
				{
					xmlHttp.open("POST", serverAddressForSelect9, true);
				}
				else if(fieldID == 'userfile')
				{
					docFieldId=document.getElementById('userfile');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect20, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect21, true);
					}
				}
				else if(fieldID == 'addImage')
				{
					docFieldId=document.getElementById('addImage');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect4, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				else if(fieldID == 'addImageToListing')
				{
					docFieldId=document.getElementById('addImageToListing');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect45, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect55, true);
					}
				}
				else if(fieldID == 'addImage1')
				{
					docFieldId=document.getElementById('addImage1');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect6, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				else if(fieldID == 'addImage2')
				{
					docFieldId=document.getElementById('addImage2');
					if(docFieldId.checked)
					{
						xmlHttp.open("POST", serverAddressForSelect7, true);
					}
					else
					{
						xmlHttp.open("POST", serverAddressForSelect5, true);
					}
				}
				else if(fieldID == 'PASSWORD')
				{
					xmlHttp.open("POST", serverAddressForSelect133, true);
				}
				
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				
				
				
				if(fieldID == 'menuName')
				{
					xmlHttp.onreadystatechange = handleSectionSelect1;
				}
				else if(fieldID == 'check')
				{
					xmlHttp.onreadystatechange = handleSectionSelect;
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.onreadystatechange = handleSectionSelect2;
				}
				else if(fieldID == 'noOfDays')
				{
					xmlHttp.onreadystatechange = handleSectionSelect408;
				}
				else if(fieldID == 'noOfDays2')
				{
					xmlHttp.onreadystatechange = handleSectionSelect409;
				}
				else if(fieldID == 'addImage')
				{
					xmlHttp.onreadystatechange = handleSectionSelect4;
				}
				else if(fieldID == 'addImageToListing')
				{
					xmlHttp.onreadystatechange = handleSectionSelect4;
				}
				else if(fieldID == 'userfile')
				{
					xmlHttp.onreadystatechange = handleSectionSelect18;
				}
				else if(fieldID == 'addImage1')
				{
					xmlHttp.onreadystatechange = handleSectionSelect4;
				}
				else if(fieldID == 'addImage2')
				{
					xmlHttp.onreadystatechange = handleSectionSelect5;
				}
				else if(fieldID == 'state')
				{
					xmlHttp.onreadystatechange = handleSectionSelect21;
				}
				else if(fieldID == 'PASSWORD')
				{
					xmlHttp.onreadystatechange = handleRequestStateChange212;
				}
				else
				{
					xmlHttp.onreadystatechange = handleSectionSelect;
				}
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}


function validateX1(inputValue, fieldID)
{
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				/*if(fieldID == 'section')
				{
					xmlHttp.open("POST", serverAddressForSelect, true);
				}
				else if(fieldID == 'featureName')
				{*/
					xmlHttp.open("POST", serverAddressForSelect1, true);
				/*}
				else if(fieldID == 'menuName')
				{
					xmlHttp.open("POST", serverAddressForSelect2, true);
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.open("POST", serverAddressForSelect3, true);
				}*/
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				/*if(fieldID == 'menuName')
				{
					xmlHttp.onreadystatechange = handleSectionSelect1;
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.onreadystatechange = handleSectionSelect2;
				}
				else
				{*/
					xmlHttp.onreadystatechange = handleSectionSelectX1;
				//}
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}



function validateX2(inputValue, fieldID)
{
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				/*if(fieldID == 'section')
				{
					xmlHttp.open("POST", serverAddressForSelect, true);
				}
				else if(fieldID == 'featureName')
				{*/
					xmlHttp.open("POST", serverAddressForSelect12, true);
				/*}
				else if(fieldID == 'menuName')
				{
					xmlHttp.open("POST", serverAddressForSelect2, true);
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.open("POST", serverAddressForSelect3, true);
				}*/
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				/*if(fieldID == 'menuName')
				{
					xmlHttp.onreadystatechange = handleSectionSelect1;
				}
				else if(fieldID == 'specLayer')
				{
					xmlHttp.onreadystatechange = handleSectionSelect2;
				}
				else
				{*/
					xmlHttp.onreadystatechange = handleSectionSelectX1;
				//}
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}


// function that handles the HTTP response
function handleRequestStateChange()
{
	// when readyState is 4, we read the server response
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// read the response from the server
				readMessages();
			}
			catch(e)
			{
				// display error message
				displayError(e.toString());
			}
		}
		else
		{
			// display error message
			displayError(xmlHttp.statusText);
		}
	}
}



function handleRequestStateChange212()
{
	// when readyState is 4, we read the server response
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// read the response from the server
				readMessages212();
			}
			catch(e)
			{
				// display error message
				displayError(e.toString());
			}
		}
		else
		{
			// display error message
			displayError(xmlHttp.statusText);
		}
	}
}


// read server's response
function readResponse()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0 || response.indexOf("error:") >= 0 || response.length == 0)
	throw(response.length == 0 ? "Server error." : response);
	// get response in XML format (assume the response is valid XML)
	responseXml = xmlHttp.responseXML;
	// get the document element
	xmlDoc = responseXml.documentElement;
	result = xmlDoc.getElementsByTagName("result")[0].firstChild.data;
	fieldID = xmlDoc.getElementsByTagName("fieldid")[0].firstChild.data;
	// find the HTML element that displays the error
	message = document.getElementById(fieldID + "Failed");
	// show the error or hide the error
	
	//specially for bid selecter
	if(fieldID=='bidselecter')
	{
		message=document.getElementById('msg');
		if(result==0)
		{
			message.value='';
		}
		else
		{
			message.value=result;
		}
	}
	
	
	//specially for ensurng selection of checkbox for saving template
//	if(fieldID=='BidTempName')
	/*{
		message1=document.getElementById('savetemplate');
		message2=document.getElementById('savetemplate');
		if(message1.checked)
		{
			message.value='';
		}
		else
		{
			message.value=result;
		}
	}*/
	
	else
	{
		message.className = (result == "0") ? "error" : "hidden";
	}
	// call validate() again, in case there are values left in the cache
	setTimeout("validate();", 500);
}







// sets focus on the first field of the form
function setFocus()
{
//	document.getElementById("menuName").focus();
	if(xmlHttpLogo)
	{
		try
		{
			// call the server page to execute the server-side operation
			xmlHttpLogo.open("POST", serverAddress, true);
			xmlHttpLogo.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlHttpLogo.onreadystatechange = handleSectionSelect;
			xmlHttpLogo.send(null);
		}
		catch(e)
		{
			displayError(e.toString());
		}
	}

}


function init()
{
	if(xmlHttpLogo)
	{
		try
		{
			// call the server page to execute the server-side operation
			xmlHttpLogo.open("POST", serverAddressForLogo, true);
			xmlHttpLogo.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlHttpLogo.onreadystatechange = handleLogoUploadNotification;
			xmlHttpLogo.send(null);
		}
		catch(e)
		{
			displayError(e.toString());
		}
	}

}



function handleLogoUploadNotification()
{
	// continue if the process is completed
	if (xmlHttpLogo.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttpLogo.status == 200)
		{
			try
			{
				// process the server's response
				readMessages();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttpLogo.statusText);
		}
	}
}





function access(lastPrjId)
{
	if(xmlHttpAccessPan)
	{
		try
		{
			// call the server page to execute the server-side operation
			lastIndex=lastPrjId;
			var serverAddressForAccessPanel_new=serverAddressForAccessPanel + "&lastPrjId=" + lastPrjId;
			xmlHttpAccessPan.open("POST", serverAddressForAccessPanel_new, true);
			xmlHttpAccessPan.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlHttpAccessPan.onreadystatechange = handleAccessPanel;
			xmlHttpAccessPan.send(null);
		}
		catch(e)
		{
			displayError(e.toString());
		}
	}

}




function handleAccessPanel()
{
	// continue if the process is completed
	if (xmlHttpAccessPan.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttpAccessPan.status == 200)
		{
			try
			{
				// process the server's response
				readAccessPanel();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttpAccessPan.statusText);
		}
	}
}



function handleSelectDevNotification()
{
	// continue if the process is completed
	if (xmlHttpSelectDev.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttpSelectDev.status == 200)
		{
			try
			{
				// process the server's response
				readSelection();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttpSelectDev.statusText);
		}
	}
}



function handleSectionSelect6()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages6();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}


function handleSectionSelect18()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages18();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}


function handleSectionSelect21()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages21();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}




function handleSectionSelect()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}



function handleSectionSelect4State()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages4State();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}


function handleSectionSelectX1()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessagesX1();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}



function handleSectionSelect1()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages1();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}


function handleSectionSelect2()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages2();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}



function handleSectionSelect408()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages408();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}






function handleSectionSelect409()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages409();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}


function handleSectionSelect4()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages4();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}

function handleSectionSelect5()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessages5();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}




function checkall()
{
	
	pers=document.getElementById("PERS");
	pers.checked=true;
}

// function that displays a new message on the page
function displaySectionSub($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}



function displaySectionSub212($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("PASSWORDFailed");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}


function displaySectionSub21($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus21");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}


function displaySectionSub18($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus18");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}




function displaySectionSub4State($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus4State");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}


function displaySectionSub6($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("linker");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "fd<br/>";
	}
}


function displaySectionSubX1($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatusX1");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}


function displaySectionSub1($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus1");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}

function displaySectionSub2($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}


function displaySectionSub408($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("listingCost");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}



function displaySectionSub409($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("listingCost");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}





function displaySectionSub4($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus4");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}

function displaySectionSub5($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatus5");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}


function readMessages6()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub6(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}



function readMessages18()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub18(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}



function readMessages()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}


function readMessages212()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub212(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}


function readMessages21()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub21(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}


function readMessages4State()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub4State(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}


function readMessagesX1()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSubX1(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}


function readMessages1()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub1(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}

function readMessages2()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub2(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}



function readMessages408()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub408(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}



function readMessages409()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub409(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}




function readMessages4()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub4(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}

function readMessages5()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSub5(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}



function readAccessPanel()
{
	// retrieve the server's response
	var response = xmlHttpAccessPan.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Server error.2123" : response);
	// display the message
	displayAccessPanelResults(response);
	// restart sequence
	setTimeout("access(lastIndex);", updateInterval * 1000);
}


function validate1()
{
	pswd1=document.getElementById("PASSWORD11").value;
	pswd2=document.getElementById("PASSWORD11").value;
	
	if(pswd1==pswd2)
	{
		value = 'style37';
	}
	else
	{
		value = 'hidden';
		
	}
}

function validate2()
{
	value='hidden';
	return value;	
}




function selectDev()
{
	if(xmlHttpSelectDev)
	{
		try
		{
			// call the server page to execute the server-side operation
			xmlHttpSelectDev.open("POST", serverAddressForSelect, true);
			xmlHttpSelectDev.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlHttpSelectDev.onreadystatechange = handleSelectDevNotification;
			xmlHttpSelectDev.send(null);
		}
		catch(e)
		{
			displayError(e.toString());
		}
	}
	else
	{
		
	}

}


function readSelection()
{
	// retrieve the server's response
	var response = xmlHttpSelectDev.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Server error.122122" : response);
	// display the message
	displaySelectedNotification(response);
	// restart sequence
	setTimeout("selectDev();", updateInterval * 1000);
}



// function that displays a new message on the page
function displaySelectedNotification($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("SPECIFY");
	// display message
	
	
	if(myDiv)
	{
		myDiv.value = $message;
	}
}


// function that displays a new message on the page
function displayAccessPanelResults($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("accesspanel");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}






function validatePostProjectForm(inputValue, fieldID)
{
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			
			// add the values to the queue
			if(fieldID=='txtCPassword')
			{
				fieldID2 = document.getElementById('txtPassword');
				inputValue2= fieldID2.value;
				cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID + "&inputValue2=" + inputValue2 + "&fieldID2=" + fieldID2);
			 //	alert("Error encountered: \n" + inputValue + "=sdlsdl=" + inputValue2);
			}
			else
			{
				cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);	
				//alert("Error encountered: \n" + inputValue + "=sdlsdl=" + fieldID);
			}
			//cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
			
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && (cache.length > 0))
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				if(fieldID=='txtCPassword')
				{
					xmlHttp.open("POST", serverAddressRegForm1, true);
				}
				else
				{
					xmlHttp.open("POST", serverAddressRegForm, true);	
				}
				//xmlHttp.open("POST", serverAddressRegForm, true);
				xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				xmlHttp.onreadystatechange = handleRequestStateChangeRegForm;
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}




function validateRegForm(inputValue, fieldID)
{
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			
			// add the values to the queue
			if(fieldID=='txtCPassword')
			{
				fieldID2 = document.getElementById('txtPassword');
				inputValue2= fieldID2.value;
				cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID + "&inputValue2=" + inputValue2 + "&fieldID2=" + fieldID2);
			 //	alert("Error encountered: \n" + inputValue + "=sdlsdl=" + inputValue2);
			}
			else
			{
				cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);	
				//alert("Error encountered: \n" + inputValue + "=sdlsdl=" + fieldID);
			}
			//cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
			
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && (cache.length > 0))
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				if(fieldID=='txtCPassword')
				{
					xmlHttp.open("POST", serverAddressRegForm1, true);
				}
				else
				{
					xmlHttp.open("POST", serverAddressRegForm, true);	
				}
				//xmlHttp.open("POST", serverAddressRegForm, true);
				xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				xmlHttp.onreadystatechange = handleRequestStateChangeRegForm;
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}



function handleRequestStateChangeRegForm()
{
	// when readyState is 4, we read the server response
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// read the response from the server
				readResponseRegForm();
			}
			catch(e)
			{
				// display error message
				displayError(e.toString());
			}
		}
		else
		{
		// display error message
		displayError(xmlHttp.statusText);
		}
	}
}



// read server's response
function readResponseRegForm()
{
	// retrieve the server's response
	
	var response = xmlHttp.responseText;
	//alert("Error encountered: \n" + response);
	// server error?
	if (response.indexOf("ERRNO") >= 0
	|| response.indexOf("error:") >= 0
	|| response.length == 0)
	throw(response.length == 0 ? "Server error." : response);
	// get response in XML format (assume the response is valid XML)
	responseXml = xmlHttp.responseXML;
	// get the document element
	xmlDoc = responseXml.documentElement;
	result = xmlDoc.getElementsByTagName("result")[0].firstChild.data;
	fieldID = xmlDoc.getElementsByTagName("fieldid")[0].firstChild.data;
	// find the HTML element that displays the error
	
	message = document.getElementById(fieldID + "Failed");
	// show the error or hide the error
	message.className = (result == "0") ? "error" : "hidden";
	// call validate() again, in case there are values left in the cache
	setTimeout("validateRegForm();", 500);
}


function validateSpecial(inputValue, fieldID)
{
	//alert("Error encountered: \n" + $message);
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		if (fieldID)
		{
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent(inputValue);
			fieldID = encodeURIComponent(fieldID);
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		}
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				if(fieldID == 'section')
				{
					xmlHttp.open("POST", serverAddressForSelect, true);
				}
				
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlHttp.onreadystatechange = handleSectionSelectSpecial;
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}
}


function handleSectionSelectSpecial()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessagesSpecial();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}


function readMessagesSpecial()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message
	displaySectionSubSpecial(response);
	// restart sequence
	setTimeout("", updateInterval * 1000);
}


function displaySectionSubSpecial($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("logoStatusSpecial");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}


function loadnotifications()
{

	//alert("Error encountered: \n" + $message);
	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		// if we received non-null parameters, we add them to cache in the
		// form of the query string to be sent to the server for validation
		
			// encode values for safely adding them to an HTTP request query string
			inputValue = encodeURIComponent("NULL");
			fieldID = encodeURIComponent("NULL");
			// add the values to the queue
			cache.push("inputValue=" + inputValue + "&fieldID=" + fieldID);
		
		// try to connect to the server
		try
		{
			// continue only if the XMLHttpRequest object isn't busy
			// and the cache is not empty
			if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && cache.length > 0)
			{
				// get a new set of parameters from the cache
				var cacheEntry = cache.shift();
				// make a server request to validate the extracted data
				xmlHttp.open("POST", serverAddressForNotification, true);
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlHttp.onreadystatechange = handleNotifications;
				xmlHttp.send(cacheEntry);
			}
		}
		catch (e)
		{
			// display an error when failing to connect to the server
			displayError(e.toString());
		}
	}	
}


function handleNotifications()
{
	// continue if the process is completed
	if (xmlHttp.readyState == 4)
	{
		// continue only if HTTP status is "OK"
		if (xmlHttp.status == 200)
		{
			try
			{
				// process the server's response
				readMessagesNotification();
			}
			catch(e)
			{
				// display the error message
				displayError(e.toString());
			}
		}
		else
		{
			// display the error message
			displayError(xmlHttp.statusText);
		}
	}
}


function readMessagesNotification()
{
	// retrieve the server's response
	var response = xmlHttp.responseText;
	// server error?
	if (response.indexOf("ERRNO") >= 0	|| response.indexOf("error") >= 0	|| response.length == 0)
	throw(response.length == 0 ? "Make A Proper Selection" : response);
	// display the message

	displayNotification(response);
	// restart sequence
	setTimeout("loadnotifications();", updateInterval * 10000);
}


function displayNotification($message)
{
	// obtain a reference to the <div> element on the page
	myDiv = document.getElementById("notifications");
	// display message
	if(myDiv)
	{
		myDiv.innerHTML = $message + "<br/>";
	}
}
