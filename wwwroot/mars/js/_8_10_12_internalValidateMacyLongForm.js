	function ClearForm(){
	  document.getElementById("20599278470161").reset();
	}
	 function showPositionExplain(){		
		if (document.getElementById('input_97_6').checked){
			document.getElementById('id_98').style.display="block";
			document.getElementById('id_99').style.display="none";
			document.getElementById('id_106').style.display="none";
			document.getElementById('id_300').style.display="block";					
			}
		else if(document.getElementById('input_97_12').checked){
			document.getElementById('id_98').style.display="none";
			document.getElementById('id_99').style.display="block";
			document.getElementById('id_106').style.display="none";
			document.getElementById('id_300').style.display="block";			
			}
		else if(document.getElementById('input_97_11').checked){
			document.getElementById('id_98').style.display="none";
			document.getElementById('id_99').style.display="none";
			document.getElementById('id_106').style.display="block";
			document.getElementById('id_300').style.display="block";	
			}
		else{
			document.getElementById('id_98').style.display="none";
			document.getElementById('id_99').style.display="none";
			document.getElementById('id_106').style.display="none";
			document.getElementById('id_300').style.display="none";
			document.getElementById('input_99').value="";
			}
	}
	
	function validateLongFormDiv1() {
	   var form = document.form_20599278470161;
	   var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
	   var zipPattern = /^\d{5}(-\d{4})?$/;
	   var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	        if (form.WhoFirstName.value == "") {
                alert( "Please enter your first name." );
                form.WhoFirstName.focus();
				return false;
            } 
			 else if (form.WhoLastName.value == "") {
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
			else if (form.SecondaryNum.value !="" && !phoneNumberPattern.test(form.SecondaryNum.value)) {
                alert( "Invalid phone number format. \r\nPlease enter a Alternate Phone with the xxx-xxx-xxxx format or xxxxxxxxxx format." );
                form.SecondaryNum.focus();
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
			else if (form.HomeState.value == "") {
                alert( "Please enter state." );
                form.HomeState.focus();
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
			else {
				showDiv2();
                return true;			
            }//showDiv2();
	}
	function validateLongFormDiv2() {
	   var form = document.form_20599278470161;
	        if (!document.getElementById('input_97_0').checked && !document.getElementById('input_97_1').checked
			&& !document.getElementById('input_97_2').checked && !document.getElementById('input_97_3').checked
			&& !document.getElementById('input_97_4').checked && !document.getElementById('input_97_5').checked
			&& !document.getElementById('input_97_6').checked && !document.getElementById('input_97_7').checked
			&& !document.getElementById('input_97_8').checked && !document.getElementById('input_97_9').checked
			&& !document.getElementById('input_97_10').checked && !document.getElementById('input_97_11').checked
			&& !document.getElementById('input_97_12').checked && !document.getElementById('input_97_13').checked) {
                alert( "Please select your most recent position during your employment at Macy's!" );
                form.recentPosition1.focus();
				return false;
            } 
			else if (document.getElementById('input_99').value!="" && form.recentPositionExplain.value.length > 1000 ) {
                form.recentPositionExplain.value = form.recentPositionExplain.value.substring(0, 1000);
					alert( "Please explain. (Maximum characters: 1000)!" );
				form.recentPositionExplain.focus();
				return false;  
            } 
			else if (document.getElementById('input_12').value == "Other" && document.getElementById('input_13').value=="") {
                alert( "Please enter the city was the last Macy's you worked in!" );
                form.oneMorePositionExplain.focus();
				return false;
            }
			else if (!document.getElementById('input_15_0').checked && !document.getElementById('input_15_1').checked
			&& !document.getElementById('input_15_2').checked && !document.getElementById('input_15_3').checked
			&& !document.getElementById('input_15_4').checked) {
                alert( "Please select how were you paid when you worked for Macy's!" );
                form.recentPosition1.focus();
				return false;
            }
			else if (document.getElementById('input_301').value!="" && form.PaidExplain.value.length > 1000 ) {
                form.PaidExplain.value = form.PaidExplain.value.substring(0, 1000);
					alert( "Please explain. (Maximum characters: 1000)!" );
				form.PaidExplain.focus();
				return false;  
            } 
			else if (!document.getElementById('input_22_0').checked && !document.getElementById('input_22_1').checked) {
                alert( "Are you currently employed at Macy's?" );
                form.recentPosition1.focus();
				return false;
            }
			else if (document.getElementById('input_22_0').checked && (document.getElementById('month_15').value=="" ||
			document.getElementById('year_15').value=="")) {
                alert( "Please select start dates of employment at Macy's!" );
                form.startdaymonth.focus();
				return false;
            }
			else if (document.getElementById('input_22_1').checked && (document.getElementById('month_15').value=="" ||
			document.getElementById('year_15').value=="" || document.getElementById('month_19').value=="" ||
			document.getElementById('year_19').value=="")) {
                alert( "Please select start dates and end dates of employment at Macy's!" );
                form.formerlastdaymonth.focus();
				return false;
            }
			else if (document.getElementById('input_104').value!="" && form.identifypeople.value.length > 1000 ) {
                form.identifypeople.value = form.identifypeople.value.substring(0, 1000);
					alert( "Please identify the names and contact information for any of your friends or coworkers who also worked at Macy's.  (Maximum characters: 1000)!" );
				form.identifypeople.focus();
				return false;  
            }   				
			else {
				showDiv3();
                return true;			
            };//showDiv3()
	}
	function validateLongFormDiv3() {
	   var form = document.form_20599278470161;
	        if (!document.getElementById('input_27_0').checked && !document.getElementById('input_27_1').checked
			&& !document.getElementById('input_27_2').checked && !document.getElementById('input_27_3').checked) {
                alert( "In your most recent position at Macy's, on average, how many hours was your typical shift?" );
                form.Category1.focus();
				return false;
            }
			else if (!document.getElementById('input_28_0').checked && !document.getElementById('input_28_1').checked
			&& !document.getElementById('input_28_2').checked && !document.getElementById('input_28_3').checked) {
                alert( "Did you ever agree to waive your meal breaks in your most recent position at Macy's?" );
                form.Category1.focus();
				return false;
            }
			else if (!document.getElementById('input_29_0').checked && !document.getElementById('input_29_1').checked) {
                alert( "In your most recent position at Macy's, were you ever NOT able to take at least a 30-minute uninterrupted meal break when you worked shifts of more than 5 hours? " );
                form.Category1.focus();
				return false;
            }
			else if (!document.getElementById('input_30_0').checked && !document.getElementById('input_30_1').checked
			&& !document.getElementById('input_30_2').checked && !document.getElementById('input_30_3').checked
			&& !document.getElementById('input_30_4').checked) {
                alert( "In your most recent position at Macy's, how often were you NOT able to take an uninterrupted 30-minute meal break? (Check the one that best describes your situation.)" );
                form.Category1.focus();
				return false;
            }
			else if (!document.getElementById('input_31_0').checked && !document.getElementById('input_31_1').checked
			&& !document.getElementById('input_31_2').checked && !document.getElementById('input_31_3').checked) {
                alert( "In your most recent position at Macy's, in general, why did you NOT take meal breaks?" );
                form.Category1.focus();
				return false;
            } 
			else if (document.getElementById('input_302').value!="" && form.missMealBreakrExplain.value.length > 1000 ) {
                form.missMealBreakrExplain.value = form.missMealBreakrExplain.value.substring(0, 1000);
					alert( "Please explain. (Maximum characters: 1000)!" );
				form.missMealBreakrExplain.focus();
				return false;  
            } 
			else if (!document.getElementById('input_32_0').checked && !document.getElementById('input_32_1').checked) {
                alert( "In your most recent position at Macy's, did you ever work shifts of more than 10 hours?" );
                form.Category1.focus();
				return false;
            }
			else if (!document.getElementById('input_33_0').checked && !document.getElementById('input_33_1').checked
			&& !document.getElementById('input_33_2').checked && !document.getElementById('input_33_3').checked 
			&& !document.getElementById('input_33_4').checked) {
                alert( "In your most recent position at Macy's, were you ever NOT able to take 2 uninterrupted 30-minute meal breaks when you worked shifts of more than 10 hours?" );
                form.Category1.focus();
				return false;
            } 
			else if (!document.getElementById('input_34_0').checked && !document.getElementById('input_34_1').checked
			&& !document.getElementById('input_34_2').checked && !document.getElementById('input_34_3').checked
			&& !document.getElementById('input_34_4').checked) {
                alert( "How often were you NOT able to take both of your 30-minute meal breaks when you worked more than 10 hours in a day?" );
                form.Category1.focus();
				return false;
            }
			else if (!document.getElementById('input_35_0').checked && !document.getElementById('input_35_1').checked
			&& !document.getElementById('input_35_2').checked && !document.getElementById('input_35_3').checked && 
			!document.getElementById('input_35_4').checked) {
               alert( "Did you receive an additional hour of pay on those occasions you were unable to take an uninterrupted 30-minute meal break?" );
                form.Category1.focus();
				return false;
            }
			else if (document.getElementById('input_36').value!="" && form.session3Explain.value.length > 1000 ) {
                form.session3Explain.value = form.session3Explain.value.substring(0, 1000);
					alert( "Please explain any of your answers.  (Maximum characters: 1000)!" );
				form.session3Explain.focus();
				return false;  
            }      				
			else {
				showDiv4();
                return true;			
            }//showDiv4();
	}
	function validateLongFormDiv4() {
	   var form = document.form_20599278470161;
	        if (!document.getElementById('input_39_0').checked && !document.getElementById('input_39_1').checked) {
                alert( "In your most recent position at Macys, were you ever NOT able to take at least a 10-minute uninterrupted rest break for every 4 hours worked in a day?" );
                form.RestEverMissed1.focus();
				return false;
            }
			else if (!document.getElementById('input_40_0').checked && !document.getElementById('input_40_1').checked
			&& !document.getElementById('input_40_2').checked && !document.getElementById('input_40_3').checked
			&& !document.getElementById('input_40_4').checked) {
                alert( "In your most recent position at Macy's, how often were you NOT able to take at least a 10-minute uninterrupted rest break after working 4 hours?" );
                form.Category1.focus();
				return false;
            }
			else if (!document.getElementById('input_41_0').checked && !document.getElementById('input_41_1').checked
			&& !document.getElementById('input_41_2').checked && !document.getElementById('input_41_3').checked) {
                alert( "In your most recent position at Macy's, why would you miss your rest breaks?" );
                form.Category1.focus();
				return false;
            }			
			else if (document.getElementById('input_303').value!="" && form.missRestBreakExplain.value.length > 1000 ) {
                form.missRestBreakExplain.value = form.missRestBreakExplain.value.substring(0, 1000);
					alert( "Please explain. (Maximum characters: 1000)!" );
				form.missRestBreakExplain.focus();
				return false;  
            }    			
			else if (!document.getElementById('input_42_0').checked && !document.getElementById('input_42_1').checked
			&& !document.getElementById('input_42_2').checked && !document.getElementById('input_42_3').checked
			&& !document.getElementById('input_42_4').checked) {
                alert( "If you were ever NOT able to take a 10-minute uninterrupted rest break, were you paid an additional hour of pay on each occasion that this occurred?" );
                form.Category1.focus();
				return false;
            }
			else if (document.getElementById('input_203').value!="" && form.session4Explain.value.length > 1000 ) {
                form.session4Explain.value = form.session4Explain.value.substring(0, 1000);
					alert( "Please explain any of your answers.  (Maximum characters: 1000)!" );
				form.session4Explain.focus();
				return false;  
            } 	  	
			else {
				showDiv5();
                return true;			
            }//showDiv5();
	}
	function validateLongFormDiv5() {
	   var form = document.form_20599278470161;
	        if (!document.getElementById('input_44_0').checked && !document.getElementById('input_44_1').checked && 
			!document.getElementById('input_44_2').checked) {
                alert( " In your most recent position at Macy's, when you were leaving the store for a meal break or at the end of your shift, were you required to have your personal bag checked before you could leave?" );
                form.BagsChecksYesNo1.focus();
				return false;
            }
			else if (!document.getElementById('input_45_0').checked && !document.getElementById('input_45_1').checked
			&& !document.getElementById('input_45_2').checked && !document.getElementById('input_45_3').checked
			&& !document.getElementById('input_45_4').checked) {
                alert( "How often was your bag checked?" );
                form.BagsChecksYesNo1.focus();
				return false;
            }
		   else if (!document.getElementById('input_46_0').checked && !document.getElementById('input_46_1').checked && 
			!document.getElementById('input_46_2').checked) {
                alert( "Did you have to wait for your co-workers to have their belongings checked before you could leave?" );
                form.BagsChecksYesNo1.focus();
				return false;
            }
			else if (document.getElementById('input_46_0').checked && document.getElementById('hour_109').value=="00"
			 && document.getElementById('minute_109').value=="00"){
				 alert( "In general, approximately how long would you have to wait to complete the entire bag check process before you could leave the store?" );
                form.bagCheckWaitHour.focus();
				return false; 
				 }
			else if (!document.getElementById('input_51_0').checked && !document.getElementById('input_51_1').checked) {
                alert( "In your most recent position at Macy's, did you ever work the closing shift?" );
                form.BagsChecksYesNo1.focus();
				return false;
            }
			 else if (!document.getElementById('input_52_0').checked && !document.getElementById('input_52_1').checked && 
			!document.getElementById('input_52_2').checked && !document.getElementById('input_52_3').checked 
			&& !document.getElementById('input_52_4').checked) {
                alert( "If you worked the closing shift, did you ever have to wait to leave the store after you clocked out?" );
                form.BagsChecksYesNo1.focus();
				return false;
            }
			else if ((document.getElementById('input_52_0').checked || document.getElementById('input_52_1').checked || 
			document.getElementById('input_52_2').checked )&& (document.getElementById('hour_110').value=="00" &&
			document.getElementById('minute_110').value=="00")) {
                alert( "In general, approximately how long would you have to wait?" );
                form.generalWaitHour.focus();
				return false;
            }
			else if(!document.getElementById('input_93_0').checked && 
			!document.getElementById('input_93_1').checked){
				alert( "In your most recent position at Macy's, did you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid?" );
                form.BagsChecksYesNo1.focus();
				return false;
				}
				else if (document.getElementById('input_121').value!="" && form.afterBeforeClockExplain.value.length > 1000 ) {
                form.afterBeforeClockExplain.value = form.afterBeforeClockExplain.value.substring(0, 1000);
					alert( "Please explain.  (Maximum characters: 1000)!" );
				form.afterBeforeClockExplain.focus();
				return false;  
            }	
			else if(document.getElementById('input_93_0').checked &&
			(document.getElementById('hour_57').value=="00" && document.getElementById('minute_57').value=="00")){
				alert( "On average, how much time a week would you perform work-related tasks while you were off the clock?" );
                form.offClockHour.focus();
				return false;
				}
			else if (document.getElementById('input_200').value!="" && form.session5Explain.value.length > 1000 ) {
                form.session5Explain.value = form.session5Explain.value.substring(0, 1000);
					alert( "Please explain any of your answers.  (Maximum characters: 1000)!" );
				form.session5Explain.focus();
				return false;  
            }
			else {
				showDiv6();
                return true;			
            }//showDiv6();
	}
	function validateLongFormDiv6() {
	   var form = document.form_20599278470161;
/*	        if (!document.getElementById('input_63_0').checked && !document.getElementById('input_63_1').checked) {
                alert( "In your most recent position working at Macy's, were you terminated (laid-off or fired) or did you quit your employment?" );
                form.TermType1.focus();
				return false;
            }
			else if (!document.getElementById('input_64_0').checked && !document.getElementById('input_64_1').checked 
			&& !document.getElementById('input_64_2').checked) {
                alert( "Did you provide at least 72 hours notice before quitting or you did not quit?" );
                form.TermType1.focus();
				return false;
            }
			else if (!document.getElementById('input_65_0').checked && !document.getElementById('input_65_1').checked 
			&& !document.getElementById('input_65_2').checked) {
                alert( "If you were terminated or you quit after giving at least 72 hours notice, did you receive all your final paycheck on your last day of work?" );
                form.TermType1.focus();
				return false;
            }
			else if (!document.getElementById('input_67_0').checked && !document.getElementById('input_67_1').checked 
			&& !document.getElementById('input_67_2').checked) {
                alert( "If you quit without providing at least 72 hours notice, did you receive your final paycheck within 72 hours of quitting?" );
                form.TermType1.focus();
				return false;
            }
			else if (!document.getElementById('input_68_0').checked && !document.getElementById('input_68_1').checked 
			&& !document.getElementById('input_68_2').checked && !document.getElementById('input_68_3').checked 
			&& !document.getElementById('input_68_4').checked && !document.getElementById('input_68_5').checked
			 && !document.getElementById('input_68_6').checked) {
                alert( "How long after you stopped working for Macy's did you receive your final paycheck?" );
                form.TermType1.focus();
				return false;
            }
			else if (!document.getElementById('input_95_0').checked && !document.getElementById('input_95_1').checked 
			&& !document.getElementById('input_95_2').checked) {
                alert( "In your most recent position at Macy's, did your final paycheck include all commissions owed to you?" );
                form.TermType1.focus();
				return false;
            }
			else if (document.getElementById('input_95_1').checked && (!document.getElementById('input_96_0').checked 
			&& !document.getElementById('input_96_1').checked && !document.getElementById('input_96_2').checked 
			&& !document.getElementById('input_96_3').checked && !document.getElementById('input_96_4').checked 
			&& !document.getElementById('input_96_5').checked && !document.getElementById('input_96_6').checked 
			&& !document.getElementById('input_96_7').checked)) {
                alert( "How long did it take for Macy's to pay you all commissions owed to you?" );
                form.TermType1.focus();
				return false;
            }
			else if (document.getElementById('input_201').value!="" && form.session6Explain.value.length > 1000 ) {
                form.session6Explain.value = form.session6Explain.value.substring(0, 1000);
					alert( "Please explain any of your answers.  (Maximum characters: 1000)!" );
				form.session6Explain.focus();
				return false;  
            }
			else {
				showDiv7();
                return true;			
            }*/showDiv7();
	}
	function validateLongFormDiv7() {
	   var form = document.form_20599278470161;
	        if (!document.getElementById('input_71_0').checked && !document.getElementById('input_71_1').checked
			&& !document.getElementById('input_71_2').checked && !document.getElementById('input_71_3').checked) {
                alert( "In your most recent position working at Macy's, did the nature of your job require you to stand?" );
                form.DidYourJobRequireStanding1.focus();
				return false;
            }
			else if (!document.getElementById('input_72_0').checked && !document.getElementById('input_72_1').checked) {
                alert( "When you weren't engaged in your work duties, did Macy's ever let you sit in a seat during your work shift?" );
                form.DidYourJobRequireStanding1.focus();
				return false;
            }
			else if (!document.getElementById('input_75_0').checked && !document.getElementById('input_75_1').checked) {
                alert( "Were there any disciplinary consequences if you were to have a seat during your work shift?" );
                form.DidYourJobRequireStanding1.focus();
				return false;
            }
			else if (document.getElementById('input_107').value!="" && form.jobListSeated.value.length > 1000 ) {
                form.jobListSeated.value = form.jobListSeated.value.substring(0, 1000);
					alert( "Please explain. (Maximum characters: 1000)!" );
				form.jobListSeated.focus();
				return false;  
            } 
			else if (!document.getElementById('input_76_0').checked && !document.getElementById('input_76_1').checked) {
                alert( "Do you think you could have performed your job duties while you were seated?" );
                form.DidYourJobRequireStanding1.focus();
				return false;
            }
			else if (document.getElementById('input_122').value!="" && form.jobSeatedExplain.value.length > 1000 ) {
                form.jobSeatedExplain.value = form.jobSeatedExplain.value.substring(0, 1000);
					alert( "Please explain. (Maximum characters: 1000)!" );
				form.jobSeatedExplain.focus();
				return false;  
            } 
			else if (document.getElementById('input_202').value!="" && form.session7Explain.value.length > 1000 ) {
                form.session7Explain.value = form.session7Explain.value.substring(0, 1000);
					alert( "Please explain any of your answers.  (Maximum characters: 1000)!" );
				form.session7Explain.focus();
				return false;  
            } 
			else {
				showDiv8();
                return true;			
            }showDiv8();
	}
	function validateLongFormDiv9() {
/*	   var form = document.form_20599278470161;
	        if (!document.getElementById('input_102_0').checked && !document.getElementById('input_102_1').checked
			&& !document.getElementById('input_102_2').checked && !document.getElementById('input_102_3').checked
			&& !document.getElementById('input_102_4').checked && !document.getElementById('input_102_5').checked
			&& !document.getElementById('input_102_6').checked && !document.getElementById('input_102_7').checked
			&& !document.getElementById('input_102_8').checked && !document.getElementById('input_102_9').checked) {
                alert( "How many people live in your household, including yourself?" );
                form.HouseHoldCount1.focus();
				return false;
            }
		    if (!document.getElementById('input_103_0').checked && !document.getElementById('input_103_1').checked
			&& !document.getElementById('input_103_2').checked && !document.getElementById('input_103_3').checked
			&& !document.getElementById('input_103_4').checked && !document.getElementById('input_103_5').checked
			&& !document.getElementById('input_103_6').checked && !document.getElementById('input_103_7').checked
			&& !document.getElementById('input_103_8').checked) {
                alert( "What is your current gross monthly income?" );
                form.HouseHoldCount1.focus();
				return false;
            }
			else {
				showDiv10();
                return true;		
            }//showDiv10();*/
	}
	function whatCity(){	
		if (document.getElementById('input_12').value == "Other"){
			document.getElementById('id_13').style.display="block";
		}
		else{
			document.getElementById('id_13').style.display="none";
			document.getElementById('input_13').value="";
			}
	}
	function waitToLeave(){	
		if (document.getElementById('input_52_3').checked || document.getElementById('input_52_4').checked){
			document.getElementById('id_109').style.display="none";
			document.getElementById('hour_110').value="00";
			document.getElementById('minute_110').value="00";
		}
		else{
			document.getElementById('id_109').style.display="block";
			}
	}
	function waitCoWorkers(){
		if (document.getElementById('input_46_1').checked || document.getElementById('input_46_2').checked){
			document.getElementById('id_47').style.display="none";
			document.getElementById('hour_109').value="00";
			document.getElementById('minute_109').value="00";
		}
		else{
			document.getElementById('id_47').style.display="block";
			}
		}
	function showHowPayExplain(){		
		if (document.getElementById('input_15_0').checked){
			document.getElementById('id_110').style.display="block";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";
			document.getElementById('id_301').style.display="block";
		}
		else if (document.getElementById('input_15_1').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="block";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";		
			document.getElementById('id_301').style.display="block";
		}
		else if (document.getElementById('input_15_2').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="block";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";	
			document.getElementById('id_301').style.display="block";
		}
		else if (document.getElementById('input_15_3').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="block";
			document.getElementById('id_114').style.display="none";
			document.getElementById('id_301').style.display="block";		
		}
		else if (document.getElementById('input_15_4').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="block";
			document.getElementById('id_301').style.display="block";		
		}
		else{
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";
			document.getElementById('id_301').style.display="block";
			document.getElementById('input_301').value="";
			}
	}
	
	function employed(){
		if (document.getElementById('input_22_1').checked){
			document.getElementById('id_21').style.display="block";
		}
		else{
			document.getElementById('id_21').style.display="none";
			document.getElementById('month_19').value="";
			document.getElementById('year_19').value="";
			}
		}
	function whyMealBreakExplain(){		
		if (document.getElementById('input_31_0').checked){
			document.getElementById('id_115').style.display="block";
			document.getElementById('id_116').style.display="none";
			document.getElementById('id_117').style.display="none";
			document.getElementById('id_302').style.display="block";
		}
		else if (document.getElementById('input_31_1').checked){
			document.getElementById('id_115').style.display="none";
			document.getElementById('id_116').style.display="block";
			document.getElementById('id_117').style.display="none";
			document.getElementById('id_302').style.display="block";		
		}
		else if (document.getElementById('input_31_2').checked){
			document.getElementById('id_115').style.display="none";
			document.getElementById('id_116').style.display="none";
			document.getElementById('id_117').style.display="block";
			document.getElementById('id_302').style.display="block";
		}
		else{
			document.getElementById('id_115').style.display="none";
			document.getElementById('id_116').style.display="none";
			document.getElementById('id_117').style.display="none";
			document.getElementById('id_302').style.display="none";		
			document.getElementById('input_302').value="";
			}
	}
	function whyRestBreakExplain(){		
		if (document.getElementById('input_41_0').checked){
			document.getElementById('id_118').style.display="block";
			document.getElementById('id_119').style.display="none";
			document.getElementById('id_120').style.display="none";
			document.getElementById('id_303').style.display="block";
		}
		else if (document.getElementById('input_41_1').checked){
			document.getElementById('id_118').style.display="none";
			document.getElementById('id_119').style.display="block";
			document.getElementById('id_120').style.display="none";
			document.getElementById('id_303').style.display="block";			
		}
		else if (document.getElementById('input_41_2').checked){
			document.getElementById('id_118').style.display="none";
			document.getElementById('id_119').style.display="none";
			document.getElementById('id_120').style.display="block";
			document.getElementById('id_303').style.display="block";
		}
		else{
			document.getElementById('id_118').style.display="none";
			document.getElementById('id_119').style.display="none";
			document.getElementById('id_120').style.display="none";
			document.getElementById('id_303').style.display="none";	
			document.getElementById('input_303').value="";
			}
	}
	function outClockExplain(){		
		if (document.getElementById('input_93_1').checked){
			document.getElementById('id_121').style.display="none";
			document.getElementById('id_57').style.display="none";
			document.getElementById('input_121').value="";
			document.getElementById('hour_57').value="00";
			document.getElementById('minute_57').value="00";
		}
		else{
			document.getElementById('id_121').style.display="block";
			document.getElementById('id_57').style.display="block";
			}
	}

	function dutySeatedExplain(){	
		if (document.getElementById('input_76_0').checked){
			document.getElementById('id_122').style.display="block";
			document.getElementById('id_57').style.display="block";			
		}
		else{
			document.getElementById('id_122').style.display="none";
			document.getElementById('id_57').style.display="none";
			document.getElementById('input_122').value="";
			}
	}
	function seatConseq(){
			if (document.getElementById('input_75_0').checked){
			document.getElementById('id_107').style.display="block";
		}
		else{
			document.getElementById('id_107').style.display="none";
			document.getElementById('input_107').value="";
			}
		
		}
	function commisionOwn(){	
		if (document.getElementById('input_95_0').checked || document.getElementById('input_95_2').checked){
			document.getElementById('id_96').style.display="none";
			document.getElementById('input_96_0').value="";
			document.getElementById('input_96_1').value="";
			document.getElementById('input_96_2').value="";
			document.getElementById('input_96_3').value="";
			document.getElementById('input_96_4').value="";
			document.getElementById('input_96_5').value="";
			document.getElementById('input_96_6').value="";
			document.getElementById('input_96_7').value="";
		}
		else{
			document.getElementById('id_96').style.display="block";
			}
	}
	
	
	

