  function ClearForm(){
	  document.getElementById("20545014055139").reset();
		/*document.form_20545014055139.reset();*/
	}
  function validateForm() {
	   var form = document.form_20545014055139;
	   var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
	   var zipPattern = /^\d{5}(-\d{4})?$/;
	   var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	        if (form.WhoFirstName.value == "") {
                alert( "Please enter your first name." );
                form.WhoFirstName.focus();
				return false;
            } else if (form.WhoLastName.value == "") {
                alert( "Please enter your last name." );
                form.WhoLastName.focus();
				return false;
            }
			else if (form.CallbackNum.value == "") {
                alert( "Please enter your phone number." );
                form.CallbackNum.focus();
				return false;	
            }
			else if (!phoneNumberPattern.test(form.CallbackNum.value)) {
                alert( "Invalid phone number format. \r\nPlease enter a phone number with the xxx-xxx-xxxx format or xxxxxxxxxx format." );
                form.CallbackNum.focus();
				return false;
            }
			else if (form.SecondaryNumber.value !="" && !phoneNumberPattern.test(form.SecondaryNumber.value)) {
                alert( "Invalid phone number format. \r\nPlease enter a Alternate Phone with the xxx-xxx-xxxx format or xxxxxxxxxx format." );
                form.SecondaryNumber.focus();
				return false;
            }
			else if (form.Email.value == "") {
                alert( "Please enter your email." );
                form.Email.focus();
				return false;	
            }
			else if (!filter.test(form.Email.value)) {
                alert( "Please enter valid email address." );
                form.Email.focus();
				return false;	
            }
			else if (form.Email2.value == "") {
                alert( "Please enter confirmation email." );
                form.Email2.focus();
				return false;	
            }
			else if (!filter.test(form.Email2.value)) {
                alert( "Please enter valid confirmation email address." );
                form.Email2.focus();
				return false;	
            }
			else if (form.Email.value != form.Email2.value) {
                alert( "Email does not match." );
                form.Email2.focus();
				return false;	
            }
			else if (form.StreetLine1.value == "") {
                alert( "Please enter street address." );
                form.StreetLine1.focus();
				return false;	
            }
			else if (form.HomeCity.value == "") {
                alert( "Please enter city." );
                form.HomeCity.focus();
				return false;	
            }
			else if (form.Zipcode.value == "") {
                alert( "Please enter zip code." );
                form.Zipcode.focus();
				return false;	
            }
			else if (!zipPattern.test(form.Zipcode.value)) {
                alert( "Invalid zip code format. \r\nPlease enter a zip code with xxxxx format or xxxxx-xxxx format." );
                form.Zipcode.focus();
				return false;	
            }
			else if (!document.getElementById('input_21_0').checked && !document.getElementById('input_21_1').checked){
                alert( "Did you ever work at a Macy's retail store?" );	
                form.didyouworkatmacysretail1.focus();
				return false;	
            }
			else if (document.getElementById('input_21_0').checked){
                if (!document.getElementById('input_20_0').checked && !document.getElementById('input_20_1').checked){		
				alert( "Are you currently employed at Macy's?" );	
                form.q20_areYou1.focus();
				return false;
				}
				if(document.getElementById('input_20_1').checked){
					if(form.formerlastdaymonth.value==""||form.formerlastdayyear.value==""){
						alert( "Please select the month and year which you stoped working at Macy's(Best Estimate)." );
						form.formerlastdaymonth.focus;
						return false;	
						}		
				}
				if (!document.getElementById('input_16_1').checked && !document.getElementById('input_16_2').checked 
				&& !document.getElementById('input_16_3').checked && !document.getElementById('input_16_4').checked	
				&& !document.getElementById('input_16_5').checked && !document.getElementById('input_16_6').checked	
				&& !document.getElementById('input_16_0').checked && !document.getElementById('input_23_0').checked){		
				alert( "Please check all of the following that apply to your work experience at Macy's." );	
                form.shortcheck1.focus();
				return false;
				}
            }
			else if (document.getElementById('input_21_1').checked){
				if (!document.getElementById('input_27_0').checked && !document.getElementById('input_27_1').checked){		
				alert( "Would you like to share your work experience at other companies?" );	
                form.wantstoshare11.focus();
				return false;
				}
			}
			 else {
                return true;
            }
	}
	
	function showReYes(){		
		if(document.getElementById('input_21_0').value=="Yes"){
		document.getElementById("id_20").style.display="block";
		document.getElementById("id_16").style.display="block";
		document.getElementById("id_23").style.display="block";
		document.getElementById("id_27").style.display="none";
		document.getElementById("input_27_0").checked = false;
		document.getElementById("input_27_1").checked = false;
		document.getElementById("input_28_0").checked = false;
		document.getElementById("input_28_1").checked = false;
		document.getElementById("id_28").style.display="none";
		}		
	}
	function showReNo(){
		if(document.getElementById('input_21_1').value=="No"){
		document.getElementById("id_20").style.display="none";
		document.getElementById("id_16").style.display="none";
		document.getElementById("id_23").style.display="none";
		document.getElementById("id_27").style.display="block";
		document.getElementById("id_15").style.display="none";
		document.getElementById('id_17').style.display="none";
		document.getElementById('input_27_0').value="";
		document.getElementById('month_15').value="";
		document.getElementById('year_15').value="";
		document.getElementById('input_17').value="";
		document.getElementById('input_20_0').checked = false;
		document.getElementById('input_20_1').checked = false;
		document.getElementById('input_16_1').checked = false;
		document.getElementById('input_16_2').checked = false; 
		document.getElementById('input_16_3').checked = false; 
		document.getElementById('input_16_4').checked = false;	
		document.getElementById('input_16_5').checked = false; 
		document.getElementById('input_16_6').checked = false;	
		document.getElementById('input_16_0').checked = false; 
		document.getElementById('input_23_0').checked = false;
		}		
	}
	function showEmYes(){		
		if(document.getElementById('input_20_0').checked){
			document.getElementById("id_15").style.display="none";
			document.getElementById('month_15').value="";
			document.getElementById('year_15').value="";
		}	
	}
	function showEmNo(){		
		if(document.getElementById('input_20_1').checked){
		document.getElementById("id_15").style.display="block";
		}	
	}
	function showNoneAbove(){		
		if (document.getElementById('input_16_1').checked || document.getElementById('input_16_2').checked 
					|| document.getElementById('input_16_3').checked || document.getElementById('input_16_4').checked	
					|| document.getElementById('input_16_5').checked || document.getElementById('input_16_0').checked){
			document.getElementById('id_23').style.display="none";
			document.getElementById('input_23_0').checked = false;
		}
		else if(document.getElementById('input_16_6').checked &&(!document.getElementById('input_16_1').checked 
		&& !document.getElementById('input_16_2').checked && !document.getElementById('input_16_3').checked 
		&& !document.getElementById('input_16_4').checked && !document.getElementById('input_16_5').checked 
		&& !document.getElementById('input_16_0').checked)){
			document.getElementById('id_23').style.display="none";
			document.getElementById('input_23_0').checked = false;
			}	
		else {document.getElementById('id_23').style.display="block";
		}
	}
	function showExplain(){		
		if (document.getElementById('input_16_6').checked){
			document.getElementById('id_23').style.display="none";
			document.getElementById('input_23_0').checked = false;
			document.getElementById('id_17').style.display="block";
		}
		if (!document.getElementById('input_16_6').checked &&(document.getElementById('input_16_1').checked || document.getElementById('input_16_2').checked 
					|| document.getElementById('input_16_3').checked || document.getElementById('input_16_4').checked	
					|| document.getElementById('input_16_5').checked || document.getElementById('input_16_0').checked)){
			document.getElementById('id_17').style.display="none";
			document.getElementById('input_17').value="";
			document.getElementById('id_23').style.display="none";
			document.getElementById('input_23_0').checked = false;
		}
		if (!document.getElementById('input_16_6').checked && !document.getElementById('input_16_1').checked 
		&& !document.getElementById('input_16_2').checked && !document.getElementById('input_16_3').checked 
		&& !document.getElementById('input_16_4').checked && !document.getElementById('input_16_5').checked 
		&& !document.getElementById('input_16_0').checked){
			document.getElementById('id_17').style.display="none";
			document.getElementById('input_17').value="";
			document.getElementById('id_23').style.display="block";
		}

	}
	function showExperYes(){
		if (document.getElementById('input_27_0').checked){
			document.getElementById('id_28').style.display="block";
		}
	}
	function showExperNo(){
		if (document.getElementById('input_27_1').checked){
			document.getElementById('id_28').style.display="none";
			document.getElementById("input_28_0").checked = false;
			document.getElementById("input_28_1").checked = false;
		}
	}

