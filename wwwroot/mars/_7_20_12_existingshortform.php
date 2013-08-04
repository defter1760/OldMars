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
<!--<script type="text/javascript">
	$(document).ready(ClearForm);
</script>-->

<body>

<div id="internalShortForm">
    <form <?PHP echo 'action="database_write_MacysshortformUpdate.php?uniqueid='.$uniqueid.'"'; ?> method="post" name="internalShortForm" id="internalShortForm" accept-charset="utf-8" onSubmit="return validateForm();">
        <input type="hidden" name="formID" value="20545014055139" />
			<?PHP
				if (isset($_GET['uniqueid']))
				{
					$uniqueid = $_GET['uniqueid'];
				}
				$serverName = "localhost\SPICE";
				$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
				$conn = sqlsrv_connect( $serverName, $connectionInfo );
				$query = "SELECT FirstName,LastName,Street1,Street2,City,State,Zipcode,email,phone1,phone2,brandid,tenantid,brand,completedlongformonline,didyouworkatmacysretail,areyoucurrentmacysemployee,shortcheck1,shortcheck2,shortcheck2,shortcheck3,shortcheck4,shortcheck5,shortcheck6,shortcheck7,shortanythingelse,wantstoshare,barcode,additionalInfo,formerlastdaymonth,formerlastdayyear FROM Status WHERE uniqueid='$uniqueid'";
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
						$formerlastdayyear = $row['formerlastdayyear'];
						$formerlastdaymonth = $row['formerlastdaymonth'];
						$additionalInfo = $row['additionalInfo'];
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
						$shortanythingelse = $row['shortanythingelse'];
						$wantstoshare1 = $row['wantstoshare'];
					}
            ?>
            <ul class="form-section">
                <li id="cid_11" class="form-input-wide">
                    <div class="">
                        <p>As background, Initiative Legal Group is currently investigating wage and hour claims against Macy's. We think that you may have been affected by these violations during your employment at Macy's. This conversation is completely voluntary. It should take about [10-15] minutes.</p>
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
		              <li class="form-line" id="id_12">
                <label class="form-label-left" id="label_6" for="input_fax"> 
                	Fax Number
                </label>
                <div id="cid_12" class="form-input">
                    <span class="form-sub-label-container">
                        <input class="form-textbox"  name="Fax" id="input_fax" size="12" <?PHP if (isset($fax)){if($fax != '') echo 'value="'.$fax.'"';} ?>>
                        <label class="form-sub-label" for="input_fax" id="sublabel_fax">
                            What is your fax number?
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
					<?PHP
					
            #echo '<select name="3HomeState">';         
            echo '<option value="AL"';
            if ($HomeState == "AL") echo "selected";
            echo '>AL</option>';
            echo '<option value="AK"';
            if ($HomeState == "AK") echo "selected";
            echo '>AK</option>';
            echo '<option value="AZ"';
            if ($HomeState == "AZ") echo "selected";
            echo '>AZ</option>';
            echo '<option value="AR"';
            if ($HomeState == "AR") echo "selected";
            echo '>AR</option>';
            echo '<option value="CA"';
            if ($HomeState == "CA") echo "selected";
            echo '>CA</option>';
            echo '<option value="CO"';
            if ($HomeState == "CO") echo "selected";
            echo '>CO</option>';
            echo '<option value="CT"';
            if ($HomeState == "CT") echo "selected";
            echo '>CT</option>';
            echo '<option value="DE"';
            if ($HomeState == "DE") echo "selected";
            echo '>DE</option>';
            echo '<option value="DC"';
            if ($HomeState == "DC") echo "selected";
            echo '>DC</option>';
            echo '<option value="FL"';
            if ($HomeState == "FL") echo "selected";
            echo '>FL</option>';
            echo '<option value="GA"';
            if ($HomeState == "GA") echo "selected";
            echo '>GA</option>';
            echo '<option value="HI"';
            if ($HomeState == "HI") echo "selected";
            echo '>HI</option>';
            echo '<option value="ID"';
            if ($HomeState == "ID") echo "selected";
            echo '>ID</option>';
            echo '<option value="IL"';
            if ($HomeState == "IL") echo "selected";
            echo '>IL</option>';
            echo '<option value="IN"';
            if ($HomeState == "IN") echo "selected";
            echo '>IN</option>';
            echo '<option value="IA"';
            if ($HomeState == "IA") echo "selected";
            echo '>IA</option>';
            echo '<option value="KS"';
            if ($HomeState == "KS") echo "selected";
            echo '>KS</option>';
            echo '<option value="KY"';
            if ($HomeState == "KY") echo "selected";
            echo '>KY</option>';
            echo '<option value="LA"';
            if ($HomeState == "LA") echo "selected";
            echo '>LA</option>';
            echo '<option value="ME"';
            if ($HomeState == "ME") echo "selected";
            echo '>ME</option>';
            echo '<option value="MD"'; 
            if ($HomeState == "MD") echo "selected";
            echo '>MD</option>';
            echo '<option value="MA"';
            if ($HomeState == "MA") echo "selected";
            echo '>MA</option>';
            echo '<option value="MI"';
            if ($HomeState == "MI") echo "selected";
            echo '>MI</option>';
            echo '<option value="MN"';
            if ($HomeState == "MN") echo "selected";
            echo '>MN</option>';
            echo '<option value="MS"';
            if ($HomeState == "MS") echo "selected";
            echo '>MS</option>';
            echo '<option value="MO"';
            if ($HomeState == "MO") echo "selected";
            echo '>MO</option>';
            echo '<option value="MT"';
            if ($HomeState == "MT") echo "selected";
            echo '>MT</option>';
            echo '<option value="NE"';
            if ($HomeState == "NE") echo "selected";
            echo '>NE</option>';
            echo '<option value="NV"';
            if ($HomeState == "NV") echo "selected";
            echo '>NV</option>';
            echo '<option value="NH"';
            if ($HomeState == "NH") echo "selected";
            echo '>NH</option>';
            echo '<option value="NJ"';
            if ($HomeState == "NJ") echo "selected";
            echo '>NJ</option>';
            echo '<option value="NM"';
            if ($HomeState == "NM") echo "selected";
            echo '>NM</option>';
            echo '<option value="NY"';
            if ($HomeState == "NY") echo "selected";
            echo '>NY</option>';
            echo '<option value="NC"';
            if ($HomeState == "NC") echo "selected";
            echo '>NC</option>';
            echo '<option value="ND"';
            if ($HomeState == "ND") echo "selected";
            echo '>ND</option>';
            echo '<option value="OH"';
            if ($HomeState == "OH") echo "selected";
            echo '>OH</option>';
            echo '<option value="OK"';
            if ($HomeState == "OK") echo "selected";
            echo '>OK</option>';
            echo '<option value="OR"';
            if ($HomeState == "OR") echo "selected";
            echo '>OR</option>';
            echo '<option value="PA"';
            if ($HomeState == "PA") echo "selected";
            echo '>PA</option>';
            echo '<option value="RI"';
            if ($HomeState == "RI") echo "selected";
            echo '>RI</option>';
            echo '<option value="SC"';
            if ($HomeState == "SC") echo "selected";
            echo '>SC</option>';
            echo '<option value="SD"';
            if ($HomeState == "SD") echo "selected";
            echo '>SD</option>';
            echo '<option value="TN"';
            if ($HomeState == "TN") echo "selected";
            echo '>TN</option>';
            echo '<option value="TX"';
            if ($HomeState == "TX") echo "selected";
            echo '>TX</option>';
            echo '<option value="UT"';
            if ($HomeState == "UT") echo "selected";
            echo '>UT</option>';
            echo '<option value="VT"'; 
            if ($HomeState == "VT") echo "selected";
            echo '>VT</option>';
            echo '<option value="VA"';
            if ($HomeState == "VA") echo "selected";
            echo '>VA</option>';
            echo '<option value="WA"';
            if ($HomeState == "WA") echo "selected";
            echo '>WA</option>';
            echo '<option value="WV"';
            if ($HomeState == "WV") echo "selected";
            echo '>WV</option>';
            echo '<option value="WI"';
            if ($HomeState == "WI") echo "selected";
            echo '>WI</option>';
            echo '<option value="WY"';
            if ($HomeState == "WY") echo "selected";
            echo '>WY</option>';
            echo "</select>";
					
					?>
                                        <label class="form-sub-label" for="input_4_state" id="sublabel_state">
                                            State
                                        </label>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="padding: 0px 10px 10px 0px;">
                                    <span class="form-sub-label-container">
                                        <input class="form-textbox validate[required] form-address-postal" type="text" name="3Zipcode" id="input_4_postal" size="10" <?PHP if (isset($Zipcode)){if($Zipcode != '') echo 'value="'.$Zipcode.'"';} ?>/>
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
                <li class="form-line" id="id_15" >
                    <label class="form-label-top" id="label_15" for="input_15">  
                    	If you no longer work at Macy's, when did you stop working at Macy's?  (Best Estimate)<?PHP #echo $formerlastdaymonth; ?>
                    </label>
                    <div id="cid_15" class="form-input-wide">
                        <span class="form-sub-label-container">
                                <select class="form-textbox" id="month_15" name="formerlastdaymonth">
                                <option name="formerlastdaymonth" value="">  </option>
				<option name="formerlastdaymonth" value="01" <?PHP if(isset($formerlastdaymonth))  if ($formerlastdaymonth == '01') echo 'selected';?>> 01 </option>
                                
                                <option name="formerlastdaymonth" value="02"
				<?PHP if(isset($formerlastdaymonth))
				if ($formerlastdaymonth == '02') echo 'selected';?>> 02 </option>
                                <option name="formerlastdaymonth" value="03" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '03') echo 'selected';?>> 03 </option>
                                <option name="formerlastdaymonth" value="04" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '04') echo 'selected';?>> 04 </option>
                                <option name="formerlastdaymonth" value="05" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '05') echo 'selected';?>> 05 </option>
                                <option name="formerlastdaymonth" value="06" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '06') echo 'selected';?>> 06 </option>
                                <option name="formerlastdaymonth" value="07" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '07') echo 'selected';?>> 07 </option>
                                <option name="formerlastdaymonth" value="08" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '08') echo 'selected';?>> 08 </option>
                                <option name="formerlastdaymonth" value="09" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '09') echo 'selected';?>> 09 </option>
                                <option name="formerlastdaymonth" value="10" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '10') echo 'selected';?>> 10 </option>
                                <option name="formerlastdaymonth" value="11" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '11') echo 'selected';?>> 11 </option>
                                <option name="formerlastdaymonth" value="12" <?PHP if(isset($formerlastdaymonth)) if ($formerlastdaymonth == '12') echo 'selected';?>> 12 </option>
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
                                <option name="formerlastdayyear" value="1980" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1980') echo 'selected';?>> 1980 </option>
                                <option name="formerlastdayyear" value="1981" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1981') echo 'selected';?>> 1981 </option>
                                <option name="formerlastdayyear" value="1982" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1982') echo 'selected';?>> 1982 </option>
                                <option name="formerlastdayyear" value="1983" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1983') echo 'selected';?>> 1983 </option>
                                <option name="formerlastdayyear" value="1984" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1984') echo 'selected';?>> 1984 </option>
                                <option name="formerlastdayyear" value="1985" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1985') echo 'selected';?>> 1985 </option>
                                <option name="formerlastdayyear" value="1986" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1986') echo 'selected';?>> 1986 </option>
                                <option name="formerlastdayyear" value="1987" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1987') echo 'selected';?>> 1987 </option>
                                <option name="formerlastdayyear" value="1988" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1988') echo 'selected';?>> 1988 </option>
                                <option name="formerlastdayyear" value="1989" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1989') echo 'selected';?>> 1989 </option>
                                <option name="formerlastdayyear" value="1990" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1990') echo 'selected';?>> 1990 </option>
                                <option name="formerlastdayyear" value="1991" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1991') echo 'selected';?>> 1991 </option>
                                <option name="formerlastdayyear" value="1992" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1992') echo 'selected';?>> 1992 </option>
                                <option name="formerlastdayyear" value="1993" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1993') echo 'selected';?>> 1993 </option>
                                <option name="formerlastdayyear" value="1994" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1994') echo 'selected';?>> 1994 </option>
                                <option name="formerlastdayyear" value="1995" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1995') echo 'selected';?>> 1995 </option>
                                <option name="formerlastdayyear" value="1996" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1996') echo 'selected';?>> 1996 </option>
                                <option name="formerlastdayyear" value="1997" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1997') echo 'selected';?>> 1997 </option>
                                <option name="formerlastdayyear" value="1998" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1998') echo 'selected';?>> 1998 </option>
                                <option name="formerlastdayyear" value="1999" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '1999') echo 'selected';?>> 1999 </option>
                                <option name="formerlastdayyear" value="2000" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2000') echo 'selected';?>> 2000 </option>
                                <option name="formerlastdayyear" value="2001" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2001') echo 'selected';?>> 2001 </option>
                                <option name="formerlastdayyear" value="2002" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2002') echo 'selected';?>> 2002 </option>
                                <option name="formerlastdayyear" value="2003" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2003') echo 'selected';?>> 2003 </option>
                                <option name="formerlastdayyear" value="2004" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2004') echo 'selected';?>> 2004 </option>
                                <option name="formerlastdayyear" value="2005" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2005') echo 'selected';?>> 2005 </option>
                                <option name="formerlastdayyear" value="2006" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2006') echo 'selected';?>> 2006 </option>
                                <option name="formerlastdayyear" value="2007" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2007') echo 'selected';?>> 2007 </option>
                                <option name="formerlastdayyear" value="2008" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2008') echo 'selected';?>> 2008 </option>
                                <option name="formerlastdayyear" value="2009" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2009') echo 'selected';?>> 2009 </option>
                                <option name="formerlastdayyear" value="2010" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2010') echo 'selected';?>> 2010 </option>
                                <option name="formerlastdayyear" value="2011" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2011') echo 'selected';?>> 2011 </option>
                                <option name="formerlastdayyear" value="2012" <?PHP if(isset($formerlastdayyear)) if ($formerlastdayyear == '2012') echo 'selected';?>> 2012 </option>
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
                                    <a class="addspeech" title="With some exceptions, employers must provide hourly employees with at least a 30-minute uninterrupted meal break for every 5 hours worked and with two 30-minute uninterrupted meal breaks if the employee works more than 10 hours in one day."> <span class="whatsthis">What's this?</span></a>
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
                                    <a class="addspeech" title="California requires employers to provide final wages to employees whose employment is terminated immediately upon their termination, or the employer has to pay a penalty."> <span class="whatsthis">What's this?</span></a>
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="clearfix"></span>
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_16_6" name="shortcheck7" value="During your employment at Macys, were you paid for all the work that you performed?" 
                                <?PHP if (isset($shortcheck7)){if($shortcheck7 != '') echo 'checked';} ?> onClick="showExplain();"/>
                                <label for="input_16_6"> 
                                    During your employment at Macy's, were you paid for all the work that you performed?
                                </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_17" >
                    <label class="form-label-top" id="label_17" for="input_17"> 
                    	Explain: 
                    </label>
                    <div id="cid_17" class="form-input-wide">
                        <div class="form-textarea-limit">
                        	<span>
                            	<textarea  class='form-textarea' name='shortanythingelse' cols='40' rows='6'><?PHP if (isset($shortanythingelse)) echo $shortanythingelse; ?></textarea>
                        		<div class="form-textarea-limit-indicator">
                                	<span type="Letters" limit="1000" id="input_17-limit">0/1000</span>
                        		</div>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_23" >
                    <label class="form-label-top" id="label_23" for="input_23">
                    </label>
                    <div id="cid_23" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-checkbox-item" style="clear:left;">
                                <input type="checkbox" class="form-checkbox" id="input_23_0" name="shortnoneoftheabove" value="Just to confirm, none of the above occurred during your work experience at Macys?" 
                                <?PHP if (isset($shortnoneoftheabove)){if($shortnoneoftheabove != '') echo 'checked';} ?>/>
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
                                <?PHP if (isset($wantstoshare1)){if($wantstoshare1 == 'Yes') echo 'checked';} ?>/>
                                <label for="input_28_0"> 
                                Yes 
                                </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left;">
                                <input type="radio" class="form-radio" id="input_28_1" name="wantstoshare" value="No" 
                                <?PHP if (isset($wantstoshare1)){if($wantstoshare1 == 'No') echo 'checked';} ?>/>
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
                                    #textfieldmaketall('Additional Information','200','100','additionalInfo');
				    echo '<input class="form-textbox" type="text" size="100" name="additionalInfo"';
				    if (isset($additionalInfo)){if($additionalInfo != '')
				    echo 'value="'.$additionalInfo.'"';}
				    echo "/>";
                            echo '<label class="form-sub-label" for="input_16_7" >';
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