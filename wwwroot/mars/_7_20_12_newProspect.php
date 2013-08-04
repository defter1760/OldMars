<?PHP
require("internalFormsStyle.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

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
        <ul class="form-section" id="form-section">
            <li>
				<?php
					echo "<table class='topTable clear' width='700px' cellspacing='2' cellpadding='2' align='left' >";
						echo "<tr >";
							echo "<td colspan='4'>";
								echo "Are you represented by another attorney in an action against Macy's?<br><br><strong>WARNING:</strong>
If the prospective client is represented by another attorney in a matter against Macy's, we cannot speak with them.  Therefore, please ONLY obtain contact information for the attorney and the prospective client so that we can place them on the Do Not Call List.  Remember to click submit at the bottom of the page to save the information and to place the prospective client on the Do Not Call list.<br><br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr >";
							echo "<td valign='top'>";
								echo '<input type="radio" name="notqualified_retained" value="Yes"  id="notqualified_retained_0" onClick="hideExp();"';
								echo ' />';
								echo "Yes";	
							echo "</td>";
							echo "<td valign='top' width='100px'>";		
								echo '<input type="radio" name="notqualified_retained"  id="notqualified_retained_1" value="No" onClick="showExp();"';
								echo ' />';
								echo "No";
							echo "</td>";
//							echo "<td valign='top' width='100px'>";
//								echo '<input type="radio" name="notqualified_retained" value="Clear" />';
//								echo "Clear";
//							echo "</td>";
							echo "<td width='400px'>";
								textfieldmake('Attorney Info','','40','attorneyInfo');
							echo "<br><br>Please use the following to help end your call:<i>\"Thank you for your time.  If we have any further questions, we will contact your attorney.\"</i></td>";
//							echo "<td valign='bottom'>";
//							echo "</td>";
						echo "</tr>";
					echo "</table>";
                ?>
            </li>
            <li id="cid_11" class="form-input-wide">
                <div style="display: block; clear: both;">
                    <p>Great. As background, Initiative Legal Group is currently investigating wage and hour claims against Macy's. We think that you may have been affected by these violations during your employment at Macy's. This conversation is completely voluntary. It should take about [10-15] minutes.</p>
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
                            What is your first name? 
                        </label>
                    </span>
                    <span class="form-sub-label-container">
                        <input class="form-textbox validate[required]" type="text" size="30" name="1WhoLastName" id="last_3" />
                        <label class="form-sub-label" for="last_3" id="sublabel_last"> 
                            What is your last name?
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
                            What is the best phone number to reach you?
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
                            Do you have a secondary phone number?
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
                    <label class="form-sub-label" for="input_13_email" id="sublabel_email">
                        What is your email address?
                    </label>
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
                                        What is your home street address?
                                    </label>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 0px 10px 10px 0px;">
                                <span class="form-sub-label-container">
                                    <input class="form-textbox form-address-line" type="text" name="3StreetLine2" id="input_4_addr_line2" size="46" />
                                    <label class="form-sub-label" for="input_4_addr_line2" id="sublabel_addr_line2"> 
                                        What is your home street address (line 2)?
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
				    <option value="AL">AL</option>
				    <option value="AK">AK</option>
				    <option value="AZ">AZ</option>
				    <option value="AR">AR</option>
				    <option value="CA" selected="selected">CA</option>
				    <option value="CO">CO</option>
				    <option value="CT">CT</option>
				    <option value="DE">DE</option>
				    <option value="DC">DC</option>
				    <option value="FL">FL</option>
				    <option value="GA">GA</option>
				    <option value="HI">HI</option>
				    <option value="ID">ID</option>
				    <option value="IL">IL</option>
				    <option value="IN">IN</option>
				    <option value="IA">IA</option>
				    <option value="KS">KS</option>
				    <option value="KY">KY</option>
				    <option value="LA">LA</option>
				    <option value="ME">ME</option>
				    <option value="MD">MD</option>
				    <option value="MA">MA</option>
				    <option value="MI">MI</option>
				    <option value="MN">MN</option>
				    <option value="MS">MS</option>
				    <option value="MO">MO</option>
				    <option value="MT">MT</option>
				    <option value="NE">NE</option>
				    <option value="NV">NV</option>
				    <option value="NH">NH</option>
				    <option value="NJ">NJ</option>
				    <option value="NM">NM</option>
				    <option value="NY">NY</option>
				    <option value="NC">NC</option>
				    <option value="ND">ND</option>
				    <option value="OH">OH</option>
				    <option value="OK">OK</option>
				    <option value="OR">OR</option>
				    <option value="PA">PA</option>
				    <option value="RI">RI</option>
				    <option value="SC">SC</option>
				    <option value="SD">SD</option>
				    <option value="TN">TN</option>
				    <option value="TX">TX</option>
				    <option value="UT">UT</option>
				    <option value="VT">VT</option>
				    <option value="VA">VA</option>
				    <option value="WA">WA</option>
				    <option value="WV">WV</option>
				    <option value="WI">WI</option>
				    <option value="WY">WY</option>
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
<!--                
                    <label class="form-label-top" id="label_16" for="input_16"> 
                        Please check all of the following that you believe apply to your work experience at Macy's.
                    </label>
-->                    
                    <div id="cid_16" class="form-input-wide">
                        <div class="form-single-column">
                        	<span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_0" name="shortcheck1" value="Did you ever miss your meal breaks while working for Macys?"  
                                <?PHP if (isset($shortcheck1)){if($shortcheck1 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_0">
                                    Did you ever miss your meal breaks while working for Macy's? 
                                    <a class="addspeech" title="With some exceptions, employers must provide hourly employees with at least a 30-minute uninterrupted meal break for every 6 hours worked and with two 30-minute uninterrupted meal breaks if the employee works more than 10 hours in one day."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_1" name="shortcheck2" value="Did you ever miss your rest breaks while working for Macys?"
                                <?PHP if (isset($shortcheck2)){if($shortcheck2 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_1"> 
                                    Did you ever miss your rest breaks while working for Macy's?
                                    <a class="addspeech" title="With some exceptions, employers must allow employees to take a 10-minute uninterrupted rest break for every 4 hours worked."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_2" name="shortcheck3" value="After you clocked out, were you required to go through a security check?"  
                                <?PHP if (isset($shortcheck3)){if($shortcheck3 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_2"> 
                                    After you clocked out, were you required to go through a security check? 
                                    <a class="addspeech" title="If an employee is required to remain on the work premises after the employee has clocked out, the employer may be required to compensate the employee for that off the clock time."> <span class="whatsthis">What's this?</span></a> 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_3" name="shortcheck4" value="Were you paid for all of your overtime work?" 
                                <?PHP if (isset($shortcheck4)){if($shortcheck4 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_3">
                                    Were you paid for all of your overtime work? 
                                    <a class="addspeech" title="If an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to 1 and a half times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_4" name="shortcheck5" value="Did you receive your final paycheck within 72 hours or 3 days after your last day of work?" 
                                <?PHP if (isset($shortcheck5)){if($shortcheck5 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_4"> 
                                    Did you receive your final paycheck within 72 hours or 3 days after your last day of work?
                                    <a class="addspeech" title="California requires employers to provide final wages to employees within 3 days of their last day of work, or the employer has to pay a penalty."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_5" name="shortcheck6" value="If you were fired, did you receive your final paycheck on your last day of work?"  
                                <?PHP if (isset($shortcheck6)){if($shortcheck6 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_5"> 
                                    If you were fired, did you receive your final paycheck on your last day of work?
                                    <a class="addspeech" title="California requires employers to provide final wages to employees within 3 days of their last day of work, or the employer has to pay a penalty."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_6" name="shortcheck7" value="I wasnt paid for all the work I performed." 
                                <?PHP if (isset($shortcheck7)){if($shortcheck7 != '') echo 'checked';} ?> onClick="showExplain();"/>
                                <label for="input_16_6"> 
                                    During your employment at Macy's, were you paid for all the work that you performed?
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
                        	<textarea id="input_17" class="form-textarea" name="shortanythingelse" cols="40" rows="6"></textarea>
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
                        	<input type="checkbox" class="form-checkbox" id="input_23_0" name="shortnoneoftheabove" value="Just to confirm, none of the above occurred during your work experience at Macys?" />
                    		<label for="input_23_0">
                            	Just to confirm, none of the above occurred during your work experience at Macy's?
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
                    	<span class="form-radio-item" style="clear:left;">
                        <input type="radio" class="form-radio" id="input_28_0" name="wantstoshare" value="Yes" />
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
            <li>
				<?php
					echo "<table width='700px' cellspacing='20' cellpadding='2' align='left' id='info'>";
						echo "<tr >";
							echo "<td>";
								echo "<p>Those are all the questions I have for you today. I encourage you to visit our website at www.macyslawsuit.com to find out more about this case and our law firm. I want to let you know that, in this case, our law firm represents current and former employees of Macy's for their potential wage and hour claims.</p>";
							echo "</td>";
						echo "</tr>";
						echo "<tr >";
							echo "<td>";
								echo "<p>Do you have any questions for me?</p>";
							echo "</td>";
						echo "</tr>";
						echo "<tr >";
							echo "<td width='400px'>";
/*								textfieldmaketall('Additional Information','','100','additionalInfo');*/
								echo 'Additional Information'.":<input type='text' ROWS=3 COLS=70 class='first' size='100' value='' name='additionalInfo' id='additionalInfo'/>";
							echo "</td>";
						echo "</tr>";
						echo "<tr >";
							echo "<td>";
								echo "<p>If you have any questions about this case in the future, please call us at 888.792.2293, Monday through Friday or you can visit us at our website at www.macyslawsuit.com.</p>";
							echo "</td>";
						echo "</tr>";
					echo "</table>";
                ?>
            </li>
            <li class="form-line" id="id_16_7">
                <label class="form-label-top" id="16_7" for="16_7">
                    Barcode #
                </label><br>
                <div id="cid_16_7" class="form-input">
                	<span class="form-sub-label-container">
                    	<input class="form-textbox" type="text" size="25" name="barcode" id="input_16_7"/>
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