function validateForm()
{
	if (document.onlineSurvey.shortcheck1.checked == false &&
		document.onlineSurvey.shortcheck2.checked == false &&
		document.onlineSurvey.shortcheck3.checked == false &&
		document.onlineSurvey.shortcheck4.checked == false &&
		document.onlineSurvey.shortcheck5.checked == false &&
		document.onlineSurvey.shortcheck6.checked == false &&
		document.onlineSurvey.shortcheck7.checked == false &&
		document.onlineSurvey.shortnoneoftheabove.checked == false)
	{
		alert ('Please select at least one option.');
		return false;
	}

	
	var WhoFirstName = document.forms["onlineSurvey"]["WhoFirstName"].value;
	if (WhoFirstName == null || WhoFirstName == "")
	{
		alert("First name must be filled out");
		return false;
	}
	
	var WhoLastName = document.forms["onlineSurvey"]["WhoLastName"].value;
	if (WhoLastName ==null || WhoLastName =="")
	{
		alert("Last name must be filled out");
		return false;
	}
	
	var Email = document.forms["onlineSurvey"]["Email"].value;
	var atpos=Email.indexOf("@");
	var dotpos=Email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=Email.length)
	{
		alert("Not a valid e-mail address");
		return false;
	}
	
	var CallbackNum = document.forms["onlineSurvey"]["CallbackNum"].value;
	if (CallbackNum.length!=12 || CallbackNum == null || CallbackNum == "")
	{
		alert("Please enter a valid phone number in the following format: xxx-xxx-xxxx");
		return false;
	}
	
	var StreetLine1 = document.forms["onlineSurvey"]["StreetLine1"].value;
	if (StreetLine1 ==null || StreetLine1 =="")
	{
		alert("Street Addresss must be filled out");
		return false;
	}
	
	var HomeCity = document.forms["onlineSurvey"]["HomeCity"].value;
	if (HomeCity ==null || HomeCity =="")
	{
		alert("City must be filled out");
		return false;
	}
	
	var Zipcode = document.forms["onlineSurvey"]["Zipcode"].value;
	if (Zipcode ==null || Zipcode =="")
	{
		alert("Zip code must be filled out");
		return false;
	}
}




//	if (document.formNameHere.inputNameHere_1.checked == false &&
//		document.formNameHere.inputNameHere_2.checked == false)
//	{
//		alert ('Please select at least one option.');
//		return false;
//	}
	
//	var inputNameHere = document.forms["formNameHere"]["inputNameHere"].value;
//	if (x == null || x == "")
//	{
//		alert("This field must be filled out");
//		return false;
//	}