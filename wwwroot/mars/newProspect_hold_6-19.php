<?PHP
//require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

<link type="text/css" rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/internalForms.css" />

<?php session_start(); ?>
<script language="JavaScript" src="js/internalValidate.js">
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(ClearForm);
</script>

<body>

<div id="newProspectForm">
    <form action="database_write_newprospect_Macys.php" method="post" name="newProspectForm" id="newProspectForm" accept-charset="utf-8" onSubmit="return validateForm();">
        <input type="hidden" name="formID" value="20545014055139" />
        <ul class="form-section">
            <li>
				<?php
					echo "<table class='topTable clear' width='650px' cellspacing='2' cellpadding='2' align='left' >";
						echo "<tr >";
							echo "<td colspan='2'>";
								echo "Are you represented by another attorney in an action against Macy's?";
								echo '<input type="radio" name="notqualified_retained" value="Yes"';
								echo '/>';
								echo "Yes";			
								echo '<input type="radio" name="notqualified_retained" value="No"';
								echo '/>';
								echo "No";
								echo '<input type="radio" name="notqualified_retained" value="Clear" />';
								echo "Clear";
							echo "</td>";
						echo "</tr>";
						echo "<tr >";
							echo "<td width='300px'>";
							textfieldmake('Attorney Info','','40','attorneyInfo');
							echo "</td>";
							echo "<td valign='bottom'>";
							echo "</td>";
						echo "</tr>";
					echo "</table>";
                ?>
            </li>
            <li id="cid_11" class="form-input-wide">
                <div style="display: block; clear: both;">
                    <p>We are investigating Macy's for potential wage and hour claims. We think that you may have been affected by these violations during your employment at Macy's. Please complete the questionnaire below so that we can further investigate your potential claims.</p>
                </div>
            </li>
            <li id="cid_9" class="form-input-wide">
                <h2 id="header_8" class="form-header-group">
                    Tell us about Yourself:
                </h2>
                <h4 style="color: #900;">* Indicates a required field.
                </h4>
            </li>
            <li class="form-line" id="id_3">
                <label class="form-label-left" id="label_3" for="input_3">
                    Full Name<span class="form-required">*</span>
                </label>
                <div id="cid_3" class="form-input">
                    <span class="form-sub-label-container">
                        <input class="form-textbox validate[required]" type="text" size="30" name="1WhoFirstName" id="first_3" />
                        <label class="form-sub-label" for="first_3" id="sublabel_first"> 
                            First Name 
                        </label>
                    </span>
                    <span class="form-sub-label-container">
                        <input class="form-textbox validate[required]" type="text" size="30" name="1WhoLastName" id="last_3" />
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
                <div id="cid_5" class="form-input">
                    <span class="form-sub-label-container">
                        <input class="form-textbox validate[required]" type="tel" name="1CallbackNum" id="input_5_phone" size="12">
                        <label class="form-sub-label" for="input_5_phone" id="sublabel_phone">
                            Phone Number
                        </label>
                    </span>
                </div>
            </li>
            <li class="form-line" id="id_6">
                <label class="form-label-left" id="label_6" for="input_6"> 
                	Alternate phone
                </label>
                <div id="cid_6" class="form-input">
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
                    E-mail<span class="form-required"></span>
                </label>
                <div id="cid_13" class="form-input">
                    <input type="email" id="input_13" name="3Email" size="46" />
                </div>
            </li>
            <li class="form-line" id="id_4">
                <label class="form-label-left" id="label_4" for="input_4">
                    Address<span class="form-required">*</span>
                </label>
                <div id="cid_4" class="form-input">
                    <table summary="" class="form-address-table" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2" style="padding: 0px 10px 10px 0px;">
                                <span class="form-sub-label-container">
                                    <input class="form-textbox validate[required] form-address-line" type="text" name="3StreetLine1" id="input_4_addr_line1" size="46" />
                                    <label class="form-sub-label" for="input_4_addr_line1" id="sublabel_addr_line1"> 
                                        Street Address
                                    </label>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 0px 10px 10px 0px;">
                                <span class="form-sub-label-container">
                                    <input class="form-textbox form-address-line" type="text" name="3StreetLine2" id="input_4_addr_line2" size="46" />
                                    <label class="form-sub-label" for="input_4_addr_line2" id="sublabel_addr_line2"> 
                                        Street Address Line 2
                                    </label>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="padding: 0px 10px 10px 0px;">
                                <span class="form-sub-label-container">
                                    <input class="form-textbox validate[required] form-address-city" type="text" name="3HomeCity" id="input_4_city" size="21" />
                                    <label class="form-sub-label" for="input_4_city" id="sublabel_city">
                                    City
                                    </label>
                                </span>
                            </td>
                            <td style="padding: 0px 10px 10px 0px;">
                                <span class="form-sub-label-container">
                                    <select name="3HomeState" id="input_4_state">
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA" selected="selected">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                    <label class="form-sub-label" for="input_4_state" id="sublabel_state">
                                        State
                                    </label>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="padding: 0px 10px 10px 0px;">
                                <span class="form-sub-label-container">
                                    <input class="form-textbox validate[required] form-address-postal" type="text" name="3Zipcode" id="input_4_postal" size="10" />
                                    <label class="form-sub-label" for="input_4_postal" id="sublabel_postal">
                                        Zip Code
                                    </label>
                                </span>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>
            </li>
            <li id="cid_8" class="form-input-wide">
                <h2 id="header_8" class="form-header-group">
                    Tell us about your experience at Macy's:
                </h2>
            </li>
            <li class="form-line" id="id_21">
                <label class="form-label-top" id="label_21" for="input_21"> 
                    Did you ever work at a Macy's retail store?<span class="form-required">*</span>
                </label>
                <div id="cid_21" class="form-input-wide">
                    <div class="form-multiple-column">
                        <span class="form-radio-item">
                            <input type="radio" class="form-radio" id="input_21_0" name="didyouworkatmacysretail"  value="Yes" onClick="showReYes();"/>
                            <label for="input_21_0">
                                Yes
                            </label>
                        </span>
                        <span class="clearfix">
                        </span>
                        <span class="form-radio-item">
                            <input type="radio" class="form-radio" id="input_21_1" name="didyouworkatmacysretail" value="No" onClick="showReNo();"/>
                            <label for="input_21_1">
                                No
                            </label>
                        </span>
                        <span class="clearfix">
                        </span>
                    </div>
                </div>
            </li>
            <li class="form-line" id="id_20">
                <label class="form-label-top" id="label_20" for="input_20"> 
                    Are you currently employed at Macy's?<span class="form-required">*</span>
                </label>
                <div id="cid_20" class="form-input-wide">
                    <div class="form-multiple-column">
                        <span class="form-radio-item">
                            <input type="radio" class="form-radio" id="input_20_0" name="areyoucurrentmacysemployee" value="Yes" onClick="showEmYes();"/>
                            <label for="input_20_0"> 
                                Yes
                            </label>
                        </span>
                        <span class="clearfix">
                        </span>
                        <span class="form-radio-item">
                            <input type="radio" class="form-radio" id="input_20_1" name="areyoucurrentmacysemployee" value="No" onClick="showEmNo();"/>
                            <label for="input_20_1"> 
                                No
                            </label>
                        </span>
                        <span class="clearfix">
                        </span>
                    </div>
                </div>
            </li>
            <li class="form-line" id="id_15" style="display:none;">
                <label class="form-label-top" id="label_15" for="input_15">  
                	If you no longer work at Macy's, when did you stop working at Macy's?  (Best Estimate)
                </label>
                <div id="cid_15" class="form-input-wide">
                    <span class="form-sub-label-container">
                        <select class="form-textbox" id="month_15" name="formerlastdaymonth">
                            <option name="formerlastdaymonth" value="">  </option>
                            <option name="formerlastdaymonth" value="01"> 01 </option>
                            <option name="formerlastdaymonth" value="02"> 02 </option>
                            <option name="formerlastdaymonth" value="03"> 03 </option>
                            <option name="formerlastdaymonth" value="04"> 04 </option>
                            <option name="formerlastdaymonth" value="05"> 05 </option>
                            <option name="formerlastdaymonth" value="06"> 06 </option>
                            <option name="formerlastdaymonth" value="07"> 07 </option>
                            <option name="formerlastdaymonth" value="08"> 08 </option>
                            <option name="formerlastdaymonth" value="09"> 09 </option>
                            <option name="formerlastdaymonth" value="10"> 10 </option>
                            <option name="formerlastdaymonth" value="11"> 11 </option>
                            <option name="formerlastdaymonth" value="12"> 12 </option>
                        </select>
                    <span class="date-separate">
                        &nbsp;/
                    </span>
                        <label class="form-sub-label" for="month_15" id="sublabel_month"> 
                            Month 
                        </label>
                    </span>
                    <span class="form-sub-label-container">
                        <input class="noDefault form-textbox" id="day_15" name="formerlastdayday" type="hidden" size="2" maxlength="2" value="" />
                    <span class="date-separate">
                    </span>
                    </span>
                    <span class="form-sub-label-container">
                        <select class="form-textbox" id="year_15" name="formerlastdayyear">
                            <option name="formerlastdayyear" value="">  </option>
                            <option name="formerlastdayyear" value="1980"> 1980 </option>
                            <option name="formerlastdayyear" value="1981"> 1981 </option>
                            <option name="formerlastdayyear" value="1982"> 1982 </option>
                            <option name="formerlastdayyear" value="1983"> 1983 </option>
                            <option name="formerlastdayyear" value="1984"> 1984 </option>
                            <option name="formerlastdayyear" value="1985"> 1985 </option>
                            <option name="formerlastdayyear" value="1986"> 1986 </option>
                            <option name="formerlastdayyear" value="1987"> 1987 </option>
                            <option name="formerlastdayyear" value="1988"> 1988 </option>
                            <option name="formerlastdayyear" value="1989"> 1989 </option>
                            <option name="formerlastdayyear" value="1990"> 1990 </option>
                            <option name="formerlastdayyear" value="1991"> 1991 </option>
                            <option name="formerlastdayyear" value="1992"> 1992 </option>
                            <option name="formerlastdayyear" value="1993"> 1993 </option>
                            <option name="formerlastdayyear" value="1994"> 1994 </option>
                            <option name="formerlastdayyear" value="1995"> 1995 </option>
                            <option name="formerlastdayyear" value="1996"> 1996 </option>
                            <option name="formerlastdayyear" value="1997"> 1997 </option>
                            <option name="formerlastdayyear" value="1998"> 1998 </option>
                            <option name="formerlastdayyear" value="1999"> 1999 </option>
                            <option name="formerlastdayyear" value="2000"> 2000 </option>
                            <option name="formerlastdayyear" value="2001"> 2001 </option>
                            <option name="formerlastdayyear" value="2002"> 2002 </option>
                            <option name="formerlastdayyear" value="2003"> 2003 </option>
                            <option name="formerlastdayyear" value="2004"> 2004 </option>
                            <option name="formerlastdayyear" value="2005"> 2005 </option>
                            <option name="formerlastdayyear" value="2006"> 2006 </option>
                            <option name="formerlastdayyear" value="2007"> 2007 </option>
                            <option name="formerlastdayyear" value="2008"> 2008 </option>
                            <option name="formerlastdayyear" value="2009"> 2009 </option>
                            <option name="formerlastdayyear" value="2010"> 2010 </option>
                            <option name="formerlastdayyear" value="2011"> 2011 </option>
                            <option name="formerlastdayyear" value="2012"> 2012 </option>
                        </select>
                        <label class="form-sub-label" for="year_15" id="sublabel_year"> 
                            Year 
                        </label>
                    </span>
                    </div>
            </li>
                <li class="form-line" id="id_16"><input type="hidden"  name="shortcheck1"/>
                    <label class="form-label-top" id="label_16" for="input_16"> 
                        Please check all of the following that you believe apply to your work experience at Macy's.
                    </label>
                    <div id="cid_16" class="form-input-wide">
                        <div class="form-single-column">
                        	<span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_0" name="shortcheck1" value="I missed some or all of my meal breaks while I worked for Macys."  
                                <?PHP if (isset($shortcheck1)){if($shortcheck1 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_0">
                                    I missed some or all of my meal breaks while I worked for Macy's. <a class="addspeech" title="With some exceptions, employers must provide hourly employees with at least a 30-minute uninterrupted meal break for every 6 hours worked and with two 30-minute uninterrupted meal breaks if the employee works more than 10 hours in one day."> <span class="whatsthis">What's this?</span></a> 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_1" name="shortcheck2" value="I missed some or all of my rest breaks while I worked for Macys."
                                <?PHP if (isset($shortcheck2)){if($shortcheck2 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_1"> 
                                    I missed some or all of my rest breaks while I worked for Macy's.<a class="addspeech" title="With some exceptions, employers must allow employees to take a 10-minute uninterrupted rest break for every 4 hours worked."> <span class="whatsthis">What's this?</span></a> 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_2" name="shortcheck3" value="I was required to go through a security bag check after I had clocked out."  
                                <?PHP if (isset($shortcheck3)){if($shortcheck3 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_2"> 
                                    I was required to go through a security bag check after I had clocked out.<a class="addspeech" title="If an employee is required to remain on the work premises after the employee has clocked out, the employer may be required to compensate the employee for that off the clock time."> <span class="whatsthis">What's this?</span></a> 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_3" name="shortcheck4" value="I think I wasnt paid for all my overtime work." 
                                <?PHP if (isset($shortcheck4)){if($shortcheck4 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_3">
                                    I think I wasn't paid for all my overtime work.<a class="addspeech" title="If an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to 1 and a half times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_4" name="shortcheck5" value="When I stopped working for Macys, I was not given my final paycheck within 3 days." 
                                <?PHP if (isset($shortcheck5)){if($shortcheck5 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_4"> 
                                    When I stopped working for Macy's, I was not given my final paycheck within 3 days.<a class="addspeech" title="California requires employers to provide final wages to employees within 3 days of their last day of work, or the employer has to pay a penalty."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_5" name="shortcheck6" value="I was fired from Macys and was not given my final paycheck on my last day of work."  
                                <?PHP if (isset($shortcheck6)){if($shortcheck6 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_5"> 
                                    I was fired, and I was not given my final paycheck on my last day of work. <a class="addspeech" title="California requires employers to provide final wages to employees within 3 days of their last day of work, or the employer has to pay a penalty."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_6" name="shortcheck7" value="I wasnt paid for all the work I performed." 
                                <?PHP if (isset($shortcheck7)){if($shortcheck7 != '') echo 'checked';} ?> onClick="showExplain();"/>
                                <label for="input_16_6"> 
                                    I wasn't paid for all the work I performed. 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
            <li class="form-line" id="id_17" style="display:none;">
                <label class="form-label-top" id="label_17" for="input_17"> 
                    Explain: 
                </label>
                <div id="cid_17" class="form-input-wide">
                    <div class="form-textarea-limit">
                    	<span>
                        	<textarea id="input_17" class="form-textarea" name="q17_explain" cols="40" rows="6"></textarea>
                        	<div class="form-textarea-limit-indicator">
                            	<span type="Letters" limit="1000" id="input_17-limit">0/1000</span>
                        	</div>
                        </span>
                    </div>
                </div>
            </li>
            <li class="form-line" id="id_23" style="display:block;">
                <label class="form-label-top" id="label_23" for="input_23"></label>
                <div id="cid_23" class="form-input-wide">
                    <div class="form-single-column">
                    	<span class="form-checkbox-item" style="clear:left;">
                        	<input type="checkbox" class="form-checkbox" id="input_23_0" name="shortnoneoftheabove" value="None of the above apply to my work experience at Macys" />
                    		<label for="input_23_0">
                            	None of the above apply to my work experience at Macy's.
                            </label>
                        </span>
                        <span class="clearfix"></span>
                    </div>
                </div>
            </li>
            <li class="form-line" id="id_27" style="display:none;">
                <label class="form-label-top" id="label_27" for="input_27"> 
                	Would you like to share your work experience at other companies? 
                </label>
                <div id="cid_27" class="form-input-wide">
                    <div class="form-single-column">
                    	<span class="form-radio-item" style="clear:left;">
                        	<input type="radio" class="form-radio" id="input_27_0" name="wantstoshare1" value="Yes" onClick="showExperYes();" />
                            <label for="input_27_0"> 
                            	Yes 
                            </label>
                        </span>
                        <span class="clearfix"></span>
                        <span class="form-radio-item" style="clear:left;">
                        	<input type="radio" class="form-radio" id="input_27_1" name="wantstoshare1" value="No" onClick="showExperNo();" />
                    		<label for="input_27_1"> No </label><input type="hidden"  name="wantstoshare1"/>
                        </span><span class="clearfix"></span>
                    </div>
                </div>
            </li>
            <li class="form-line" id="id_28" style="display:none;">
                <label class="form-label-top" id="label_28" for="input_28"> Can one of our attorneys contact you about your work experience at other companies? </label>
                <div id="cid_28" class="form-input-wide">
                    <div class="form-single-column">
                    	<span class="form-radio-item" style="clear:left;"><
                        	input type="radio" class="form-radio" id="input_28_0" name="wantstoshare" value="Yes" />
                            <label for="input_28_0"> 
                                Yes 
                            </label>
                        </span>
                        <span class="clearfix"></span>
                        <span class="form-radio-item" style="clear:left;">
                            <input type="radio" class="form-radio" id="input_28_1" name="wantstoshare" value="No" />
                            <label for="input_28_1"> 
                                No 
                            </label>
                        </span>
                        <span class="clearfix"></span>
                    </div>
                </div>
            </li>
            <li class="form-line" id="id_16_7">
                <label class="form-label-top" id="16_7" for="16_7">
                    Barcode #
                </label><br>
                <div id="cid_16_7" class="form-input">
                	<span class="form-sub-label-container">
                    	<input class="form-textbox" type="text" size="25" name="barcode"/>
                    	<label class="form-sub-label" for="input_16_7" > 
                        	Barcode number 
                        </label>
                    </span>
                </div>
            </li>
            <li class="form-line" id="id_22">
                <div id="cid_22" class="form-input-wide">
                </div>
            </li>
            <div class="clear"></div>
            <li class="form-line" id="id_2">
                <div class="form-buttons-wrapper">
                    <input type="submit" onClick="needToConfirm = false;" name="complete" value="Submit" class="redBtn" />
                </div>
            </li>
            <li style="display:none">
                Should be Empty:
                <input type="text" name="website" value="" />
            </li>
        </ul>
        <input type="hidden" id="simple_spc" name="simple_spc" value="20545014055139" />
        <input type="hidden" name="completedonline" value="Yes" />
        <input type="hidden" name="tenantid" value="4" />
        <input type="hidden" name="brandid" value="1" />
        <input type="hidden" name="brand" value="Macys" />
    </form>
</div>
            
</body>
</html>