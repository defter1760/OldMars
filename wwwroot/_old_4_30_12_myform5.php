<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["3HomeState"].value;
if (x==null || x=="")
  {
  alert("State must be filled out");
  return false;
  }
}
</script>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["3Email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="speechbubbles.css" />

<script type="text/javascript" src="speechbubbles.js">

/***********************************************
* Speech Bubbles Tooltip- (c) Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

</script>

<script type="text/javascript">

jQuery(function($){ //on document.ready
 	//Apply tooltip to links with class="addspeech", plus look inside 'speechdata.txt' for the tooltip markups
	$('a.addspeech').speechbubble({url:'speechdata.txt'})
})

</script>
<!--DYNAMIC DRIVE END--><!--DYNAMIC DRIVE END--><!--DYNAMIC DRIVE END-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>



<script type="text/javascript" src="js/ddimgtooltip.js">

/***********************************************
* Image w/ description tooltip v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script src="https://static-interlogyllc.netdna-ssl.com/min/g=jotform?3.0.3279" type="text/javascript"></script>

<script type="text/javascript">
   JotForm.setConditions([{"action":{"field":"15","visibility":"Hide"},"link":"Any","terms":[{"field":"20","operator":"equals","value":"Yes"}],"type":"field"},{"type":"field","link":"Any","terms":[{"field":"16","operator":"isFilled","value":false},{"field":"23","operator":"isFilled","value":false}],"action":{"field":"2","visibility":"Show"}},{"action":{"field":"17","visibility":"Show"},"link":"Any","terms":[{"field":"16","operator":"equals","value":"I wasnt paid for all the work I performed."}],"type":"field"},{"action":{"field":"23","visibility":"Hide"},"link":"Any","terms":[{"field":"16","operator":"isFilled","value":false}],"type":"field"},{"action":{"field":"16","visibility":"Hide"},"link":"Any","terms":[{"field":"23","operator":"isFilled","value":false}],"type":"field"}]);
   JotForm.init(function(){
      $('input_13_confirm').hint('Confirm Email');
      $('input_13').hint('ex: myname@example.com');
      JotForm.setCalendar("15");
   });
</script>

<script language="JavaScript">
  var needToConfirm = true;
  
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    if (needToConfirm)
      return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  }
</script>
<link href="https://static-interlogyllc.netdna-ssl.com/min/g=formCss?3.0.3279" rel="stylesheet" type="text/css" />

<style type="text/css">

.ddimgtooltip{
box-shadow: 3px 3px 5px #818181; /*shadow for CSS3 capable browsers.*/
-webkit-box-shadow: 3px 3px 5px #818181;
-moz-box-shadow: 3px 3px 5px #818181;
display:none;
position:absolute;
border:1px solid black;
background:white;
color: black;
z-index:2000;
padding: 4px;
}
body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	background:#ffffff;
	margin:0;
	text-align:center;
	height:100%;
}

div#main {

  width:750px;
  margin:0 auto;
  text-align:left;
    margin-left: auto;

  margin-right: auto;

  text-align: left;

}

h1{
	font-size:22px;
	line-height:30px;
}

h2{
	font-size:20px;
	line-height:28px;
}



h3{
	font-size:18px;
	line-height:26px;
}

h4{
	font-size:16px;
	line-height:24px;
}



p{
	font-size:14px;
	line-height:20px;
	pading-bottom:5px;
}

a{
	color:#9f111b;
	text-decoration:none;
	font-weight:bold;
}

.form-required{
	font-weight:bold;
	color:#9f111b !important;
}

#main .form-all{
        width:750px;
        color:#424242;
        font-family: 'Open Sans', sans-serif;
        font-size:14px;
}

.form-all .form-header-group{
	background-color:#fff;
	border:none;
	padding:0;
}

.HeaderRed {
	color: #9f111b;
	text-align:center;
}

.form-subHeader{
	/*background-color:#f1f1f1;*/
        background-color:#AFb0b0;
	font-style:normal !important;
	padding:5px 5px 5px 10px;
	border:none !important;
}
.form-label{
        width:150px !important;
        font-family: 'Open Sans', sans-serif !important;
		
    }
.form-label-left{
        width:150px !important;
		font-size:14px;
 }
 
 .form-label-top{
	 font-size:14px;
 }
    
.form-line{
        padding:10px;
		margin-left:10px;
    }
	
#id_21, #id_20, #id_15, #id_16, #id_17{
	margin-left:10px;
}
.form-label-right{
        width:150px !important;
		font-size:14px;
    }
	
.form-single-column{
	font-size:14px;
}

.form-checkbox-item{
	padding-bottom:10px;
}

	

.requiredRed {
	font-style: italic;
	font-weight:bold;
	color: #9f111b;
	padding:2px;
	font-size:14px;
	margin-left:10px;
}


.whatsthis {
	color: #666666;
	background-color:rgba(241,241,241,.5);
	border-radius:10px;
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	box-shadow:0 0 1px #888;
	-webkit_box-shadow:0 0 2px #888;
	-moz-box-shadow:0 0 2px #888;
	padding:5px;
	margin-left:12px;
	font-size:10px;
}

#barcode {
	padding-bottom:5px;

}

.form-buttons-wrapper{
	width:100%;
}

.form-submit-button{
	float:left;
	display:block !important;
	width:204px !important;
	height:62px;
	border:none !important;
	text-indent:-99999px;
	background:url(https://macyslawsuit.com/wp-content/uploads/2012/04/submit_button.png) no-repeat 0 0;
	padding:0;
	margin:0;
}

.form-button-error{
	float:left;
	padding-left:30px;
}

.clear{
	clear:both;
}
#message p.disclaimer{
	font-size:15px;
	font-style:italic;
	font-family:Times New Roman, Times, serif;
	font-weight:bold;
	text-align:center;
	padding-top:25px;
	
}
</style>

<div align="center"><div id="main">
<form class="jotform-form" action="database_write_Short_MacysEmail_2.php" method="post" name="form_20545014055139" id="20545014055139" accept-charset="utf-8">
  <input type="hidden" name="formID" value="20545014055139" />
  <div class="form-all">
    <ul class="form-section">
      <li id="cid_11" class="form-input-wide">
        <div class="form-header-group">
          <h1 id="header_11" class="HeaderRed">
            Macy’s Employee Experience Online Survey
          </h1>
          
            <p>We are investigating potential wage and hour claims against Macy's and would like to know if you experienced any labor code violations. If you believe your rights were violated, please complete the short online survey below.<br><strong><i>If you are already represented by an attorney in regards to any claims against Macy's, please do not continue.</i></strong></p>
        
        </div>
      </li>
      <li id="cid_9" class="form-input-wide">
          <h2 id="header_8" class="form-subHeader">
            Tell us about yourself:<br /><span class="requiredRed">*Indicates a required field.</span>
          </h2>
      </li>
      <li class="form-line" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3">
          Full Name<span class="form-required">*</span>
        </label>
        <div id="cid_3" class="form-input">
        <span class="form-sub-label-container">
        <input class="form-textbox validate[required]" type="text" size="25" name="1WhoFirstName" id="first_3" />
            <label class="form-sub-label" for="first_3" id="sublabel_first"> 
            First Name 
            </label>
            </span>
            <span class="form-sub-label-container">
            <input class="form-textbox validate[required]" type="text" size="35" name="1WhoLastName" id="last_3" />
            <label class="form-sub-label" for="last_3" id="sublabel_last"> 
            Last Name 
            </label>
            </span>
        </div>
      </li>
      <li class="form-line" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5">
          Phone Number<span class="form-required">*</span>
        </label>
        <div id="cid_5" class="form-input"><!--<span class="form-sub-label-container">
        <input class="form-textbox validate[required]" type="tel" name="q5_phoneNumber5[area]" id="input_5_area" size="3">
            -
            <label class="form-sub-label" for="input_5_area" id="sublabel_area"> 
            Area Code 
            </label>
            </span>-->
            <span class="form-sub-label-container">
            <input class="form-textbox validate[required]" type="text" name="1CallbackNum" id="input_5_phone" pattern="[A-Za-z]{3}" title="Ten digit phone number" size="12"/>
            <!--<input type="text" name="country_code" pattern="[A-Za-z]{3}" title="Three letter country code" />-->

            <label class="form-sub-label" for="input_5_phone" id="sublabel_phone"> 
            Phone Number 
            </label>
            </span>
        </div>
      </li>
      <li class="form-line" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Alternate Phone </label>
        <div id="cid_6" class="form-input"><!--<span class="form-sub-label-container">
        <input class="form-textbox" type="tel" name="q6_alternatePhone[area]" id="input_6_area" size="3">
            -
            <label class="form-sub-label" for="input_6_area" id="sublabel_area"> 
            Area Code 
            </label>
            </span>-->
            <span class="form-sub-label-container">
            <input class="form-textbox" type="tel" name="3SecondaryNumber" id="input_6_phone" size="12">
            <label class="form-sub-label" for="input_6_phone" id="sublabel_phone"> 
            Phone Number 
            </label>
            </span>
        </div>
      </li>
      <li class="form-line" id="id_13">
        <label class="form-label-left" id="label_13" for="input_13">
          E-mail<span class="form-required">*</span>
        </label>
        <div id="cid_13" class="form-input">
          <input type="email" class="form-textbox validate[required, Email]" id="input_13" name="3Email" size="30" />
	  <a class="addspeech" title="No problem. Please call our law firm at 1.888.792.2293, Monday through Friday 8:30 a.m. to 6:30 p.m., PST to discuss your potential claims."><span class="whatsthis">I don't have an email address.</span></a>
          <br />
          <input type="email" class="form-textbox validate[Email_Confirm]" id="input_13_confirm" style="margin-top:8px;" size="30" />
        </div>
      </li>
      <li class="form-line" id="id_4">
        <label class="form-label-left" id="label_4" for="input_4">
          Address<span class="form-required">*</span>
        </label>
        <div id="cid_4" class="form-input">
          <table summary="" class="form-address-table" border="0" cellpadding="0" style="font-family:arial,helvetica,sans-serif;" cellspacing="0">
            <tr>
              <td colspan="2"><span class="form-sub-label-container"><input class="form-textbox validate[required] form-address-line" type="text" name="3StreetLine1" id="input_4_addr_line1" />
                  <label class="form-sub-label" for="input_4_addr_line1" id="sublabel_addr_line1"> Street Address </label></span>
              </td>
            </tr>
            <tr>
              <td colspan="2"><span class="form-sub-label-container"><input class="form-textbox form-address-line" type="text" name="3StreetLine2" id="input_4_addr_line2" size="46" />
                  <label class="form-sub-label" for="input_4_addr_line2" id="sublabel_addr_line2"> Street Address Line 2 </label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox validate[required] form-address-city" type="text" name="3HomeCity" id="input_4_city" size="21" />
                  <label class="form-sub-label" for="input_4_city" id="sublabel_city"> City </label></span>
              </td>
              <td><span class="form-sub-label-container"><input class="form-textbox validate[required] form-address-state" type="text" name="3HomeState" id="input_4_state" size="22" />
                  <label class="form-sub-label" for="input_4_state" id="sublabel_state"> State</label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox validate[required] form-address-postal" type="text" name="3Zipcode" id="input_4_postal" size="10" />
                  <label class="form-sub-label" for="input_4_postal" id="sublabel_postal">Zip Code </label></span>
              </td>
            </tr>
          </table>
        </div>
      </li>
      <li id="cid_8" class="form-input-wide">
          <h2 id="header_8" class="form-subHeader">
            Tell us about your work experience at Macy's:
          </h2>
      </li>
      <li class="form-line" id="id_21">
        <label class="form-label-top" id="label_21" for="input_21"> Did ever you work at a Macy's retail store?<span class="form-required">*</span></label>
        <div id="cid_21" class="form-input-wide">
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_21_0" name="didyouworkatmacysretail" checked="checked" value="Yes" />
              <label for="input_21_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_21_1" name="didyouworkatmacysretail" value="No" />
              <label for="input_21_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_20">
        <label class="form-label-top" id="label_20" for="input_20"> Are you currently employed at Macy's?<span class="form-required">*</span> </label>
        <div id="cid_20" class="form-input-wide">
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio" id="input_20_0" name="areyoucurrentmacysemployee" value="Yes" />
              <label for="input_20_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio" id="input_20_1" name="areyoucurrentmacysemployee" value="No" />
              <label for="input_20_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_15">
        <label class="form-label-top" id="label_15" for="input_15"> If you no longer work at Macy's, when did you stop working at Macy's (best estimate)? </label>
        <div id="cid_15" class="form-input-wide"><span class="form-sub-label-container"><input class="form-textbox" id="month_15" name="formerlastdaymonth" type="text" size="2" maxlength="2" value="" /><span class="date-separate">&nbsp;/</span>
            <label class="form-sub-label" for="month_15" id="sublabel_month"> Month </label></span><span class="form-sub-label-container"><input class="noDefault form-textbox" id="day_15" name="formerlastdayday" type="text" size="2" maxlength="2" value="" /><span class="date-separate">&nbsp;/</span>
            <label class="form-sub-label" for="day_15" id="sublabel_day"> Day </label></span><span class="form-sub-label-container"><input class="form-textbox" id="year_15" name="formerlastdayyear" type="text" size="4" maxlength="4" value="" />
            <label class="form-sub-label" for="year_15" id="sublabel_year"> Year </label></span><span class="form-sub-label-container"><img alt="Pick a Date" id="input_15_pick" src="https://jotform.us/images/calendar.png" align="absmiddle" />
            <label class="form-sub-label" for="input_15_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
      <li class="form-line" id="id_16">
        <label class="form-label-top" id="label_16" for="input_16"> Please check all of the following that apply to your work experience at Macy's: </label>
        <div id="cid_16" class="form-input-wide">
          <div class="form-single-column"><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_16_0" name="shortcheck1" value="I missed some or all of my meal breaks while I worked for Macys." />
              <label for="input_16_0"> I missed some or all of my meal breaks while I worked for Macy's.<a class="addspeech" title="With some exceptions, employers must provide hourly employees with at least a 30-minute uninterrupted meal break for every 5 hours worked and with two 30-minute meal breaks if the employee works more than 10 hours in a day."><span class="whatsthis">What's this?</span></a> </label></span><span class="clearfix"></span><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_16_1" name="shortcheck2" value="I missed some or all of my rest breaks while I worked for Macys." />
              <label for="input_16_1"> I missed some or all of my rest breaks while I worked for Macy's.<a class="addspeech" title="With some exceptions, employers must allow employees to take a 10-minute uninterrupted rest break for every 4 hours worked."><span class="whatsthis">What's this?</span></a>  </label></span><span class="clearfix"></span><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_16_2" name="shortcheck3" value="I was required to go through a security bag check after I had clocked out." />
              <label for="input_16_2"> I was required to go through a security bag check after I had clocked out.<a class="addspeech" title="If an employee is required to remain on the work premises after the employee has clocked out, the employer may be required to compensate the employee for that off the clock time."><span class="whatsthis">What's this?</span></a> </label></span><span class="clearfix"></span><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_16_3" name="shortcheck4" value="I think I wasnt paid for all my overtime work." />
              <label for="input_16_3"> I think I wasn't paid for all my overtime work.<a class="addspeech" title="If an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to one and a half times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week."><span class="whatsthis">What's this?</span></a> </label></span><span class="clearfix"></span><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_16_4" name="shortcheck5" value="I am a former employee. When I left Macys, I was not given my final paycheck within 3 days." />
              <label for="input_16_4"> I am a former employee. When I left Macy's, I was not given my final paycheck within 3 days.<a class="addspeech" title="California requires employers to provide final wages to employees whose employment is terminated immediately upon their termination, or the employer has to pay a penalty. 
"><span class="whatsthis">What's this?</span>
</a> </label></span><span class="clearfix"></span><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_16_5" name="shortcheck6" value="I was fired from Macys and was not given my final paycheck on my last day of work." />
              <label for="input_16_5"> I was fired from Macy's and was not given my final paycheck on my last day of work.<a class="addspeech" title="California requires employers to provide final wages to employees whose employment is terminated immediately upon their termination, or the employer has to pay a penalty."><span class="whatsthis">What's this?</span>
</a>  </label></span><span class="clearfix"></span><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_16_6" name="shortcheck7" value="I wasnt paid for all the work I performed." />
              <label for="input_16_6"> I wasn't paid for all the work I performed. </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_17">
        <label class="form-label-top" id="label_17" for="input_17"> Explain: </label>
        <div id="cid_17" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_17" class="form-textarea" name="shortanythingelse" cols="40" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_17-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_23">
        <label class="form-label-top" id="label_23" for="input_23"></label>
        <div id="cid_23" class="form-input-wide">
          <div class="form-single-column"><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_23_0" name="shortnoneoftheabove" value="None of the above apply to my work experience at Macys" />
              <label for="input_23_0"> None of the above apply to my work experience at Macy's. </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
     <li class="form-line" id="id_16_7">
        <label class="form-label-top" id="16_7" for="16_7">
          <div id="barcode">Postcard Barcode Number (Optional) <a class="whatsthis" href="https://macyslawsuit.com/questionnaire/" rel="imgtip[0]">What's this?</a></div>
        </label><br />

        <div id="cid_16_7" class="form-input"><span class="form-sub-label-container"><input class="form-textbox" type="text" size="25" name="barcode"/>
            <label class="form-sub-label" for="input_16_7" > Barcode Number  </label></span>
        </div>
      </li>
      <li class="form-line" id="id_22">
        <label class="form-label-top" id="label_22" for="input_22">
          Enter the message as it's shown<span class="form-required">*</span>
        </label>
        <div id="cid_22" class="form-input-wide">
       <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
       <div class="clear"></div>
       <input type="text" name="captcha_code" size="10" maxlength="6" />

<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>     
        </div>
      </li>
       <li class="form-line" id="id_2">
        <div class="form-button-wrapper">
          <div class="form-buttons-wrapper">
            <button id="input_2" type="submit"  onclick="needToConfirm = false;" class="form-submit-button">
              Submit Form
            </button>
          </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="20545014055139" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "20545014055139-20545014055139";
  </script>
 <input type="hidden" name="completedonline" value="Yes" />
  <input type="hidden" name="tenantid" value="4" />
  <input type="hidden" name="brandid" value="1" />
  <input type="hidden" name="brand" value="Macys" />
  <input class="docusignbutton brown" name="TwoSigners" id="TwoSigners" type="hidden" value="Create an Envelope with 2 Signers" />
  <input type="hidden" Name="RecipientName2" value="Macys Lawsuit">
  <input type="hidden" name="RecipientEmail2" value="macyslawsuit@initiativelegal.com">  
</form>
</div>
</div>
<p class="disclaimer">
<strong><i>Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</i></strong>
</p>