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

<div id="internalShortForm">
<!--    <form <?PHP //echo 'action="database_write_MacysshortformUpdate.php?uniqueid='.$uniqueid; ?> method="post" name="internalShortForm" id="internalShortForm" accept-charset="utf-8" onSubmit="return validateForm();">-->
 <form action="database_write_MacysshortformUpdate.php?uniqueid=<?PHP echo $uniqueid; ?>" method="post" name="internalShortForm" id="internalShortForm" accept-charset="utf-8" onSubmit="return validateForm();">
        <input type="hidden" name="formID" value="20545014055139" />
			<?PHP
				if (isset($_GET['uniqueid']))
				{
					$uniqueid = $_GET['uniqueid'];
				}
				$serverName = "localhost\SPICE";
				$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
				$conn = sqlsrv_connect( $serverName, $connectionInfo );
				$query = "SELECT FirstName,LastName,Street1,Street2,City,State,Zipcode,email,phone1,phone2,brandid,tenantid,brand,completedlongformonline,didyouworkatmacysretail,areyoucurrentmacysemployee,shortcheck1,shortcheck2,shortcheck2,shortcheck3,shortcheck4,shortcheck5,shortcheck6,shortcheck7,shortnoneoftheabove,wantstoshare,barcode FROM Status WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
					while($row = sqlsrv_fetch_array($results))
					{
						$FirstName = $row['FirstName'];
						$LastName = $row['LastName'];
						$StreetLine1 = $row['Street1'];
						$StreetLine2 = $row['Street2'];
						$HomeCity = $row['City'];
						$HomeState = $row['State'];
						$Zipcode = $row['Zipcode'];
						$Email = $row['email'];
						$phone1 = $row['phone1'];
						$phone2 = $row['phone2'];
						$brandid = $row['brandid'];
						$tenantid = $row['tenantid'];
						$brand = $row['brand'];
						$barcode = $row['barcode'];		
						$completedlongformonline = $row['completedlongformonline'];
						$didyouworkatmacysretail = $row['didyouworkatmacysretail'];
						$areyoucurrentmacysemployee = $row['areyoucurrentmacysemployee'];
						$shortcheck1 = $row['shortcheck1'];
						$shortcheck2 = $row['shortcheck2'];
						$shortcheck3 = $row['shortcheck3'];
						$shortcheck4 = $row['shortcheck4'];
						$shortcheck5 = $row['shortcheck5'];
						$shortcheck6 = $row['shortcheck6'];
						$shortcheck7 = $row['shortcheck7'];
						$shortnoneoftheabove = $row['shortnoneoftheabove'];
						$wantstoshare1 = $row['wantstoshare1'];
						$wantstoshare = $row['wantstoshare'];
					}
            ?>
            <ul class="form-section">
                <li id="cid_11" class="form-input-wide">
                    <div class="">
                        <p>As background, Initiative Legal Group is currently investigating wage and hour claims against Macys. We think that you may have been affected by these violations during your employment at Macys. This conversation is completely voluntary. It should take about [10-15] minutes.</p>
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
                            <input class="form-textbox validate[required]" type="text" size="30" name="1WhoFirstName" id="first_3" 
							<?PHP if (isset($FirstName)){if($FirstName != '') echo 'value="'.$FirstName.'"';} ?>/>
                            <label class="form-sub-label" for="first_3" id="sublabel_first"> 
                                What is your first name? 
                            </label>
                        </span>
                        <span class="form-sub-label-container">
                            <input class="form-textbox validate[required]" type="text" size="30" name="1WhoLastName" id="last_3" 
							<?PHP if (isset($LastName)){if($LastName != '') echo 'value="'.$LastName.'"';} ?> />
                            <label class="form-sub-label" for="last_3" id="sublabel_last"> 
                                What is your last name?
                            </label>
                        </span>
                    </div>
                </li>
                <li class="form-line" id="id_5">
                    <label class="form-label-left" id="label_5" for="input_5">
                        Phone Number <span class="form-required">*</span>
                    </label>
                    <div id="cid_5" class="form-input">
                        <span class="form-sub-label-container">
                            <input class="form-textbox validate[required]" type="tel" name="1CallbackNum" id="input_5_phone" size="12" 
							<?PHP if (isset($phone1)){if($phone1 != '') echo 'value="'.$phone1.'"';} ?>>
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
                            <input class="form-textbox" type="tel" name="3SecondaryNumber" id="input_6_phone" size="12" 
							<?PHP if (isset($phone2)){if($phone2 != '') echo 'value="'.$phone2.'"';} ?>/>
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
                        <input type="email"  id="input_13" name="3Email" size="46" 
						<?PHP if (isset($Email)){if($Email != '') echo 'value="'.$Email.'"';} ?>/>
                            <label class="form-sub-label" for="input_13_email" id="sublabel_email">
                                What is your email address?
                            </label>
                        <br>
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
                                        <input class="form-textbox validate[required] form-address-line" type="text" name="3StreetLine1" id="input_4_addr_line1" size="46"
										<?PHP if (isset($StreetLine1)){if($StreetLine1 != '') echo 'value="'.$StreetLine1.'"';} ?>/>
                                        <label class="form-sub-label" for="input_4_addr_line1" id="sublabel_addr_line1"> 
                                            What is your home street address?
                                        </label>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 0px 10px 10px 0px;">
                                    <span class="form-sub-label-container">
                                        <input class="form-textbox form-address-line" type="text" name="3StreetLine2" id="input_4_addr_line2" size="46" 
										<?PHP if (isset($StreetLine2)){if($StreetLine2 != '') echo 'value="'.$StreetLine2.'"';} ?>/>
                                        <label class="form-sub-label" for="input_4_addr_line2" id="sublabel_addr_line2"> 
                                            What is your home street address (line 2)?
                                        </label>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="padding: 0px 10px 10px 0px;">
                                    <span class="form-sub-label-container">
                                        <input class="form-textbox validate[required] form-address-city" type="text" name="3HomeCity" id="input_4_city" size="21" 
										<?PHP if (isset($HomeCity)){if($HomeCity != '') echo 'value="'.$HomeCity.'"';} ?>/>
                                        <label class="form-sub-label" for="input_4_city" id="sublabel_city">
                                            City
                                        </label>
                                    </span>
                                </td>
                                <td style="padding: 0px 10px 10px 0px;">
                                    <span class="form-sub-label-container">
                                        <select name="3HomeState" id="input_4_state">         	
                                            <option value="AL" <?PHP if (isset($HomeState)){if ($HomeState == "AL") echo "selected";}?>>Alabama</option>	
                                            <option value="AK" <?PHP if (isset($HomeState)){if ($HomeState == "AK") echo "selected";}?>>Alaska</option>	
                                            <option value="AZ" <?PHP if (isset($HomeState)){if ($HomeState == "AZ") echo "selected";}?>>Arizona</option>	
                                            <option value="AR" <?PHP if (isset($HomeState)){if ($HomeState == "AR") echo "selected";}?>>Arkansas</option>	
                                            <option value="CA" <?PHP if (isset($HomeState)){if ($HomeState == "CA") echo "selected";}?>>California</option>	
                                            <option value="CO" <?PHP if (isset($HomeState)){if ($HomeState == "CO") echo "selected";}?>>Colorado</option>	
                                            <option value="CT" <?PHP if (isset($HomeState)){if ($HomeState == "CT") echo "selected";}?>>Connecticut</option>	
                                            <option value="DE" <?PHP if (isset($HomeState)){if ($HomeState == "DE") echo "selected";}?>>Delaware</option>	
                                            <option value="DC" <?PHP if (isset($HomeState)){if ($HomeState == "DC") echo "selected";}?>>District of Columbia</option>	
                                            <option value="FL" <?PHP if (isset($HomeState)){if ($HomeState == "FL") echo "selected";}?>>Florida</option>	
                                            <option value="GA" <?PHP if (isset($HomeState)){if ($HomeState == "GA") echo "selected";}?>>Georgia</option>	
                                            <option value="HI" <?PHP if (isset($HomeState)){if ($HomeState == "HI") echo "selected";}?>>Hawaii</option>	
                                            <option value="ID" <?PHP if (isset($HomeState)){if ($HomeState == "ID") echo "selected";}?>>Idaho</option>	
                                            <option value="IL" <?PHP if (isset($HomeState)){if ($HomeState == "IL") echo "selected";}?>>Illinois</option>	
                                            <option value="IN" <?PHP if (isset($HomeState)){if ($HomeState == "IN") echo "selected";}?>>Indiana</option>	
                                            <option value="IA" <?PHP if (isset($HomeState)){if ($HomeState == "IA") echo "selected";}?>>Iowa</option>	
                                            <option value="KS" <?PHP if (isset($HomeState)){if ($HomeState == "KS") echo "selected";}?>>Kansas</option>	
                                            <option value="KY" <?PHP if (isset($HomeState)){if ($HomeState == "KY") echo "selected";}?>>Kentucky</option>	
                                            <option value="LA" <?PHP if (isset($HomeState)){if ($HomeState == "LA") echo "selected";}?>>Louisiana</option>	
                                            <option value="ME" <?PHP if (isset($HomeState)){if ($HomeState == "ME") echo "selected";}?>>Maine</option>	
                                            <option value="MD" <?PHP if (isset($HomeState)){if ($HomeState == "MD") echo "selected";}?>>Maryland</option>	
                                            <option value="MA" <?PHP if (isset($HomeState)){if ($HomeState == "MA") echo "selected";}?>>Massachusetts</option>	
                                            <option value="MI" <?PHP if (isset($HomeState)){if ($HomeState == "MI") echo "selected";}?>>Michigan</option>	
                                            <option value="MN" <?PHP if (isset($HomeState)){if ($HomeState == "MN") echo "selected";}?>>Minnesota</option>	
                                            <option value="MS" <?PHP if (isset($HomeState)){if ($HomeState == "MS") echo "selected";}?>>Mississippi</option>	
                                            <option value="MO" <?PHP if (isset($HomeState)){if ($HomeState == "MO") echo "selected";}?>>Missouri</option>	
                                            <option value="MT" <?PHP if (isset($HomeState)){if ($HomeState == "MT") echo "selected";}?>>Montana</option>	
                                            <option value="NE" <?PHP if (isset($HomeState)){if ($HomeState == "NE") echo "selected";}?>>Nebraska</option>	
                                            <option value="NV" <?PHP if (isset($HomeState)){if ($HomeState == "NV") echo "selected";}?>>Nevada</option>	
                                            <option value="NH" <?PHP if (isset($HomeState)){if ($HomeState == "NH") echo "selected";}?>>New Hampshire</option>	
                                            <option value="NJ" <?PHP if (isset($HomeState)){if ($HomeState == "NJ") echo "selected";}?>>New Jersey</option>	
                                            <option value="NM" <?PHP if (isset($HomeState)){if ($HomeState == "NM") echo "selected";}?>>New Mexico</option>	
                                            <option value="NY" <?PHP if (isset($HomeState)){if ($HomeState == "NY") echo "selected";}?>>New York</option>	
                                            <option value="NC" <?PHP if (isset($HomeState)){if ($HomeState == "NC") echo "selected";}?>>North Carolina</option>	
                                            <option value="ND" <?PHP if (isset($HomeState)){if ($HomeState == "ND") echo "selected";}?>>North Dakota</option>	
                                            <option value="OH" <?PHP if (isset($HomeState)){if ($HomeState == "OH") echo "selected";}?>>Ohio</option>	
                                            <option value="OK" <?PHP if (isset($HomeState)){if ($HomeState == "OK") echo "selected";}?>>Oklahoma</option>	
                                            <option value="OR" <?PHP if (isset($HomeState)){if ($HomeState == "OR") echo "selected";}?>>Oregon</option>	
                                            <option value="PA" <?PHP if (isset($HomeState)){if ($HomeState == "PA") echo "selected";}?>>Pennsylvania</option>	
                                            <option value="RI" <?PHP if (isset($HomeState)){if ($HomeState == "RI") echo "selected";}?> >Rhode Island</option>	
                                            <option value="SC" <?PHP if (isset($HomeState)){if ($HomeState == "SC") echo "selected";}?>>South Carolina</option>	
                                            <option value="SD" <?PHP if (isset($HomeState)){if ($HomeState == "SD") echo "selected";}?>>South Dakota</option>	
                                            <option value="TN" <?PHP if (isset($HomeState)){if ($HomeState == "TN") echo "selected";}?>>Tennessee</option>	
                                            <option value="TX" <?PHP if (isset($HomeState)){if ($HomeState == "TX") echo "selected";}?>>Texas</option>	
                                            <option value="UT" <?PHP if (isset($HomeState)){if ($HomeState == "UT") echo "selected";}?>>Utah</option>	
                                            <option value="VT" <?PHP if (isset($HomeState)){if ($HomeState == "VT") echo "selected";}?>>Vermont</option>	
                                            <option value="VA" <?PHP if (isset($HomeState)){if ($HomeState == "VA") echo "selected";}?>>Virginia</option>	
                                            <option value="WA" <?PHP if (isset($HomeState)){if ($HomeState == "WA") echo "selected";}?>>Washington</option>	
                                            <option value="WV" <?PHP if (isset($HomeState)){if ($HomeState == "WV") echo "selected";}?>>West Virginia</option>	
                                            <option value="WI" <?PHP if (isset($HomeState)){if ($HomeState == "WI") echo "selected";}?>>Wisconsin</option>	
                                            <option value="WY" <?PHP if (isset($HomeState)){if ($HomeState == "WY") echo "selected";}?>>Wyoming</option>	
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
                                        <input class="form-textbox validate[required] form-address-postal" type="text" name="3Zipcode" id="input_4_postal" size="10" 
										<?PHP if (isset($Zipcode)){if($Zipcode != '') echo 'value="'.$Zipcode.'"';} ?>/>
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
                                <input type="radio" class="form-radio" id="input_21_0" name="didyouworkatmacysretail"  value="Yes" 
								<?PHP if (isset($didyouworkatmacysretail)){if($didyouworkatmacysretail == 'Yes') echo 'checked ' ;} ?> onClick="showReYes();"/>
                                <label for="input_21_0">
                                    Yes
                                </label>
                            </span>
                            <span class="clearfix">
                            </span>
                            <span class="form-radio-item">
                                <input type="radio" class="form-radio" id="input_21_1" name="didyouworkatmacysretail" value="No" 
								<?PHP if (isset($didyouworkatmacysretail)){if($didyouworkatmacysretail == 'No') echo 'checked';} ?> onClick="showReNo();"/>
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
                            <input type="radio" class="form-radio" id="input_20_0" name="areyoucurrentmacysemployee" value="Yes" 
                            <?PHP if (isset($areyoucurrentmacysemployee)){if($areyoucurrentmacysemployee == 'Yes') echo 'checked';} ?> onClick="showEmYes();"/>
                            <label for="input_20_0"> 
                                Yes
                            </label>
                        </span>
                        <span class="clearfix">
                        </span>
                        <span class="form-radio-item">
                            <input type="radio" class="form-radio" id="input_20_1" name="areyoucurrentmacysemployee" value="No" 
							<?PHP if (isset($areyoucurrentmacysemployee)){if($areyoucurrentmacysemployee == 'No') echo 'checked';} ?> onClick="showEmNo();"/>
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
                                <option name="formerlastdaymonth" value="" >  </option>
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
                                    Did you ever miss your meal breaks while working for Macys? 
                                    <!--<a class="addspeech" title="With some exceptions, employers must provide hourly employees with at least a 30-minute uninterrupted meal break for every 6 hours worked and with two 30-minute uninterrupted meal breaks if the employee works more than 10 hours in one day."> <span class="whatsthis">What's this?</span></a>-->
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_1" name="shortcheck2" value="Did you ever miss your rest breaks while working for Macys?"
                                <?PHP if (isset($shortcheck2)){if($shortcheck2 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_1"> 
                                    Did you ever miss your rest breaks while working for Macys?
                                    <!--<a class="addspeech" title="With some exceptions, employers must allow employees to take a 10-minute uninterrupted rest break for every 4 hours worked."> <span class="whatsthis">What's this?</span></a>--> 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_2" name="shortcheck3" value="After you clocked out, were you required to go through a security check?"  
                                <?PHP if (isset($shortcheck3)){if($shortcheck3 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_2"> 
                                    After you clocked out, were you required to go through a security check? 
                                    <!--<a class="addspeech" title="If an employee is required to remain on the work premises after the employee has clocked out, the employer may be required to compensate the employee for that off the clock time."> <span class="whatsthis">What's this?</span></a>--> 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_3" name="shortcheck4" value="Were you paid for all of your overtime work?" 
                                <?PHP if (isset($shortcheck4)){if($shortcheck4 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_3">
                                    Were you paid for all of your overtime work? 
                                    <!--<a class="addspeech" title="If an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to 1 and a half times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week."> <span class="whatsthis">What's this?</span></a>-->
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_4" name="shortcheck5" value="Did you receive your final paycheck within 72 hours or 3 days after your last day of work?" 
                                <?PHP if (isset($shortcheck5)){if($shortcheck5 != '') echo 'checked';} ?> onClick="showNoneAbove();" />
                                <label for="input_16_4"> 
                                    Did you receive your final paycheck within 72 hours or 3 days after your last day of work?
                                    <!--<a class="addspeech" title="California requires employers to provide final wages to employees within 3 days of their last day of work, or the employer has to pay a penalty."> <span class="whatsthis">What's this?</span></a>-->
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_5" name="shortcheck6" value="If you were fired, did you receive your final paycheck on your last day of work?"  
                                <?PHP if (isset($shortcheck6)){if($shortcheck6 != '') echo 'checked';} ?> onClick="showNoneAbove();"/>
                                <label for="input_16_5"> 
                                    If you were fired, did you receive your final paycheck on your last day of work?
                                    <!--<a class="addspeech" title="California requires employers to provide final wages to employees within 3 days of their last day of work, or the employer has to pay a penalty."> <span class="whatsthis">What's this?</span></a>-->
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_6" name="shortcheck7" value="During your employment at Macys, were you paid for all the work that you performed?" 
                                <?PHP if (isset($shortcheck7)){if($shortcheck7 != '') echo 'checked';} ?> onClick="showExplain();"/>
                                <label for="input_16_6"> 
                                    During your employment at Macys, were you paid for all the work that you performed?
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
                            	<textarea id="input_17" class="form-textarea" name="shortanythingelse" cols="40" rows="6" 
								<?PHP if (isset($shortanythingelse)){if($shortanythingelse != '') echo 'value=".$shortanythingelse."';} ?>>
                                </textarea>
                        		<div class="form-textarea-limit-indicator">
                                	<span type="Letters" limit="1000" id="input_17-limit">0/1000</span>
                        		</div>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_23" style="display:block;">
                    <label class="form-label-top" id="label_23" for="input_23">
                    </label>
                    <div id="cid_23" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_23_0" name="shortnoneoftheabove" value="Just to confirm, none of the above occurred during your work experience at Macys?" 
                                <?PHP if (isset($shortnoneoftheabove)){if($shortnoneoftheabove != '') echo 'checked';} ?>/>
                                <label for="input_23_0">
                                    Just to confirm, none of the above occurred during your work experience at Macys?
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
                                <input type="radio" class="form-radio" id="input_27_0" name="wantstoshare1" value="Yes" 
                                <?PHP if (isset($wantstoshare1)){if($wantstoshare1 == 'Yes') echo 'checked';} ?> onClick="showExperYes();" />
                                <label for="input_27_0"> 
                                    Yes 
                                </label>
                            </span><span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left;">
                                <input type="radio" class="form-radio" id="input_27_1" name="wantstoshare1" value="No"
                                <?PHP if (isset($wantstoshare1)){if($wantstoshare1 == 'No') echo 'checked';} ?> onClick="showExperNo();" />
                                <label for="input_27_1"> 
                                    No 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_28" style="display:none;">
                    <label class="form-label-top" id="label_28" for="input_28"> 
                    	Can one of our attorneys contact you about your work experience at other companies? 
                    </label>
                    <div id="cid_28" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left;">
                                <input type="radio" class="form-radio" id="input_28_0" name="wantstoshare" value="Yes" 
                                <?PHP if (isset($wantstoshare)){if($wantstoshare == 'Yes') echo 'checked';} ?>/>
                                <label for="input_28_0"> 
                                Yes 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left;">
                                <input type="radio" class="form-radio" id="input_28_1" name="wantstoshare" value="No" 
                                <?PHP if (isset($wantstoshare)){if($wantstoshare == 'No') echo 'checked';} ?>/>
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
                        echo "<table width='700px' cellspacing='20' cellpadding='2' align='left' >";
                            echo "<tr >";
                                echo "<td>";
                                    echo "<p>Those are all the questions I have for you today. I encourage you to visit our website at www.macyslawsuit.com to find out more about this case and our law firm. I want to let you know that, in this case, our law firm represents current and former employees of Macy’s for their potential wage and hour claims.</p>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr >";
                                echo "<td>";
                                    echo "<p>Do you have any questions for me?</p>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr >";
                                echo "<td width='400px'>";
                                    textfieldmaketall('Additional Information','','100','additionalInfo');
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
                        	<input class="form-textbox" type="text" size="25" name="barcode" 
							<?PHP if (isset($barcode)){if($barcode != '') echo 'value="'.$barcode.'"';} ?>/>
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