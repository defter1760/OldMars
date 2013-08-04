  function ClearForm(){
	  document.getElementById("20545014055139").reset();
		/*document.form_20545014055139.reset();*/
	}
  function validateForm() {
	   var form = document.form_20545014055139;
	   var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
	   var zipPattern = /^\d{5}(-\d{4})?$/;
	    var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	   var validformat=/^\d{2}\-\d{2}\-\d{4}$/;
	   if (!document.getElementById('notqualified_retained_0').checked && !document.getElementById('notqualified_retained_1').checked ){
		        alert( "Are you represented by another attorney in an action against Macy's?" );	
   				document.getElementById('notqualified_retained_0').focus();		
				return false;
		   }
/*	   else if (document.getElementById('notqualified_retained_0').checked && document.getElementById('attName').value == ""){				
					alert( "Please enter Attorney's Name." );	
					document.getElementById('attName').focus();
					return false;
					}
	   else if (document.getElementById('notqualified_retained_0').checked &&document.getElementById('firmPhone').value == ""){		
					alert( "Please enter Phone Number." );	
					document.getElementById('firmPhone').focus();
					return false;
					}
	  else if (document.getElementById('notqualified_retained_0').checked && !phoneNumberPattern.test(document.getElementById('firmPhone').value)) {
					alert( "Invalid phone number format. \r\nPlease enter a phone number with the xxx-xxx-xxxx format or xxxxxxxxxx format." );
					 document.getElementById('firmPhone').focus();
					return false;
					}
	  else if (document.getElementById('notqualified_retained_0').checked && document.getElementById('firmName').value == ""){		
					alert( "Please enter Firm Name." );	
					document.getElementById('firmName').focus();
					return false;
					}
	  else if (document.getElementById('notqualified_retained_0').checked && document.getElementById('firmCity').value == ""){		
					alert( "Please enter city." );	
					document.getElementById('firmCity').focus();
					return false;
					}*/
	   else if (document.getElementById('first_3').value == "") {
                alert( "Please enter your first name." );
                document.getElementById('first_3').focus();
				return false;
            }
		else if (document.getElementById('last_3').value == "") {
                 alert( "Please enter your last name." );
                document.getElementById('last_3').focus();
				return false;
            }
		else if (document.getElementById('input_5_phone').value == "") {
                alert( "Please enter your phone number." );
                document.getElementById('input_5_phone').focus();
				return false;
            }
		else if (!phoneNumberPattern.test(document.getElementById('input_5_phone').value)) {
                alert( "Invalid phone number format. \r\nPlease enter a phone number with the xxx-xxx-xxxx format or xxxxxxxxxx format." );
                 document.getElementById('input_5_phone').focus();
				return false;
            }
		else if (document.getElementById('input_6_phone').value != "" && !phoneNumberPattern.test(document.getElementById('input_6_phone').value)) {
                alert( "Invalid phone number format. \r\nPlease enter a Alternate Phone with the xxx-xxx-xxxx format or xxxxxxxxxx format." );
                document.getElementById('input_6_phone').focus();
				return false;
            }
			
		else if (document.getElementById('input_fax').value != "" && !phoneNumberPattern.test(document.getElementById('input_fax').value)) {
                alert( "Invalid fax number format. \r\nPlease enter a fax number with the xxx-xxx-xxxx format or xxxxxxxxxx format." );
                document.getElementById('input_fax').focus();
				return false;
            }
	    else if (document.getElementById('input_4_addr_line1').value == "") {
                alert( "Please enter street address." );
                document.getElementById('input_4_addr_line1').focus();
				return false;
            }
		
		else if (document.getElementById('input_4_city').value == "") {
                alert( "Please enter city." );
                document.getElementById('input_4_city').focus();
				return false;
            }			
			
		else if (document.getElementById('input_4_postal').value == "") {
			alert( "Please enter zip code." );
			document.getElementById('input_4_postal').focus();
			return false;
		}
		else if (!zipPattern.test(document.getElementById('input_4_postal').value)) {
			alert( "Invalid zip code format. \r\nPlease enter a zip code with xxxxx format or xxxxx-xxxx format." );
			document.getElementById('input_4_postal').focus();
			return false;	
		}
		else if (document.getElementById('input_4_birthday').value !="" && !validformat.test(document.getElementById('input_4_birthday').value )){
			  alert("Invalid Date Format!\r\nPlease Enter a Date with mm-dd-yyyy.");
			  document.getElementById('input_4_birthday').focus();  
			  return false;
			}
		else if (!document.getElementById('input_21_0').checked && document.getElementById('notqualified_retained_1').checked && !document.getElementById('input_21_1').checked){
                alert( "Did you ever work at a Macy's retail store?" );	
   				document.getElementById('input_21_1').focus();		
				return false;	
            }
		else if (document.getElementById('input_21_0').checked && document.getElementById('notqualified_retained_1').checked){
                if (!document.getElementById('input_20_0').checked && !document.getElementById('input_20_1').checked){		
				alert( "Are you currently employed at Macy's?" );	
               	document.getElementById('input_20_0').focus();
				return false;
				}
		else if(document.getElementById('input_20_1').checked && document.getElementById('notqualified_retained_1').checked &&
		(document.getElementById('month_15').value==""||document.getElementById('year_15').value=="")){
				alert( "Please select the month and year which you stoped working at Macy's(Best Estimate)." );
						document.getElementById('month_15').focus();
						return false;				
				}
				if (!document.getElementById('input_16_1').checked && !document.getElementById('input_16_2').checked 
				&& !document.getElementById('input_16_3').checked && !document.getElementById('input_16_4').checked	
				&& !document.getElementById('input_16_5').checked && !document.getElementById('input_16_6').checked	
				&& !document.getElementById('input_16_0').checked && !document.getElementById('input_23_0').checked
			 && document.getElementById('notqualified_retained_1').checked){		
				alert( "Please check all of the following that apply to your work experience at Macy's." );	
                document.getElementById('input_16_0').focus();	
				return false;
				}
            }
			else if (document.getElementById('notqualified_retained_1').checked && document.getElementById('input_21_1').checked){
				if (!document.getElementById('input_27_0').checked && !document.getElementById('input_27_1').checked){		
				alert( "Would you like to share your work experience at other companies?" );	
                document.getElementById('input_27_0').focus();
				return false;
				}
			}
			 else {
                return true;
            }
	}
		function showReYes(){		
		if(document.getElementById('input_21_0').checked){
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
		if(document.getElementById('input_21_1').checked){
		document.getElementById("id_20").style.display="none";
		document.getElementById("id_16").style.display="none";
		document.getElementById("id_23").style.display="none";
		document.getElementById("id_27").style.display="block";
		document.getElementById("id_15").style.display="none";
		document.getElementById('id_17').style.display="none";
		document.getElementById('input_27_0').value="";
		//document.getElementById('month_15').value="";
		//document.getElementById('year_15').value="";
		//document.getElementById('input_17').value="";
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
	function showExp(){
		document.getElementById("cid_8").style.display="block";
		document.getElementById("id_21").style.display="block";
	if(!document.getElementById('input_21_0').checked && !document.getElementById('input_21_1').checked){
		document.getElementById("id_20").style.display="block";
		document.getElementById("id_15").style.display="block";
		document.getElementById("id_16").style.display="block";
		//document.getElementById("id_17").style.display="block";		
		document.getElementById("id_23").style.display="block";
		}
		showReYes();
		if(!document.getElementById('input_20_0').checked && !document.getElementById('input_20_1').checked && !document.getElementById('input_21_1').checked){
		document.getElementById("id_15").style.display="block";
		}	
		showEmYes();
		showEmNo();
		showReNo();
		document.getElementById("info").style.display="block";
		
		document.getElementById("contactAtt").style.display="none";
		document.getElementById("background").style.display="block";
		document.getElementById("identify").style.display="none";
				
		document.getElementById("attInfo").style.display="none";
		document.getElementById("attField1").style.display="none";
		document.getElementById('firmName').value="";
		document.getElementById('firmPhone').value="";
		document.getElementById("attField2").style.display="none";
		document.getElementById('attName').value="";
		document.getElementById('firmCity').value="";
		}
	function hideExp(){
		document.getElementById("cid_8").style.display="none";
		document.getElementById("id_21").style.display="none";
		document.getElementById('input_21_0').checked = false;
		document.getElementById('input_21_1').checked = false;
/*		document.getElementById('input_21_0').value="";
		document.getElementById('input_21_1').value="";*/
		document.getElementById("id_20").style.display="none";
		document.getElementById('input_20_0').checked = false;
		document.getElementById('input_20_1').checked = false;
		document.getElementById("id_15").style.display="none";
		document.getElementById('month_15').value="";
		document.getElementById('year_15').value="";
		document.getElementById("id_16").style.display="none";
		document.getElementById('input_16_0').checked = false;
		document.getElementById('input_16_1').checked = false;
		document.getElementById('input_16_2').checked = false;
		document.getElementById('input_16_3').checked = false;
		document.getElementById('input_16_4').checked = false;
		document.getElementById('input_16_5').checked = false;
		document.getElementById('input_16_6').checked = false;
		document.getElementById("id_17").style.display="none";
		document.getElementById('input_17').value="";
		document.getElementById("id_23").style.display="none";
		document.getElementById('input_23_0').value="";
		document.getElementById("id_27").style.display="none";
		document.getElementById('input_27_0').checked = false;
		document.getElementById('input_27_1').checked = false;
		document.getElementById("id_28").style.display="none";
		document.getElementById('input_28_0').checked = false;
		document.getElementById('input_28_1').checked = false;
		document.getElementById("info").style.display="none";
		document.getElementById("additionalInfo").value="";
		
		document.getElementById("contactAtt").style.display="block";
		document.getElementById("background").style.display="none";
		document.getElementById("identify").style.display="block";
		
		document.getElementById("attInfo").style.display="block";
		document.getElementById("attField1").style.display="block";		
		document.getElementById("attField2").style.display="block";		

		}	
	function showEmYes(){		
		if(document.getElementById('input_20_0').checked){
			document.getElementById("id_15").style.display="none";
			document.getElementById('month_15').value="";
			document.getElementById('day_15').value="";
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
			//document.getElementById('id_17').style.display="block";
		}
		if (!document.getElementById('input_16_6').checked &&(document.getElementById('input_16_1').checked || document.getElementById('input_16_2').checked 
					|| document.getElementById('input_16_3').checked || document.getElementById('input_16_4').checked	
					|| document.getElementById('input_16_5').checked || document.getElementById('input_16_0').checked)){
			//document.getElementById('id_17').style.display="none";
			//document.getElementById('input_17').value="";
			document.getElementById('id_23').style.display="none";
			document.getElementById('input_23_0').checked = false;
		}
		if (!document.getElementById('input_16_6').checked && !document.getElementById('input_16_1').checked 
		&& !document.getElementById('input_16_2').checked && !document.getElementById('input_16_3').checked 
		&& !document.getElementById('input_16_4').checked && !document.getElementById('input_16_5').checked 
		&& !document.getElementById('input_16_0').checked){
			//document.getElementById('id_17').style.display="none";
			//document.getElementById('input_17').value="";
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
	function checkShortCheck(){
			if (document.getElementById('input_23_0').checked &&
			(document.getElementById('input_16_6').checked ||document.getElementById('input_16_1').checked || document.getElementById('input_16_2').checked 
					|| document.getElementById('input_16_3').checked || document.getElementById('input_16_4').checked	
					|| document.getElementById('input_16_5').checked || document.getElementById('input_16_0').checked)){
			alert("Please uncheck the check box above!");	
			document.getElementById('input_23_0').checked=false;					
			}
		
		}

