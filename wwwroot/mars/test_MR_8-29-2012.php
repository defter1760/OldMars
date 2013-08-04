<?php
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

<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/style.css" rel="stylesheet" type="text/css" />

<div id="internalShortForm">
    <form <?php echo 'action="test_MR_8-29_WRITE.php?uniqueid='.$uniqueid.'"'; ?> method="post" name="internalShortForm" id="internalShortForm" accept-charset="utf-8" onSubmit="return validateForm();">
        <input type="hidden" name="formID" value="20545014055139" />
		<?php
            if (isset($_GET['uniqueid']))
            {
                $uniqueid = $_GET['uniqueid'];
            }
            $query = "SELECT FirstName,LastName,Street1,Street2,City,State,Zipcode,email,phone1,phone2,brandid,tenantid,brand,completedlongformonline,didyouworkatmacysretail,areyoucurrentmacysemployee,shortcheck1,shortcheck2,shortcheck2,shortcheck3,shortcheck4,shortcheck5,shortcheck6,shortcheck7,shortanythingelse,wantstoshare,barcode,additionalInfo,formerlastdaymonth,formerlastdayyear,notqualified_retained,attName,firmPhone,firmName,firmCity,dateofbirth FROM Status WHERE uniqueid='$uniqueid'";
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
					$notqualified_retained = $row['notqualified_retained'];
					$attName = $row['attName'];
					$firmPhone = $row['firmPhone'];
					$firmName = $row['firmName'];
					$firmCity = $row['firmCity'];
					$dateofbirth = $row['dateofbirth'];
				}
		?>	

		<?php
            echo "<table class='topTable' width='680px'>";
                echo "<tr>";
                    echo "<td colspan='2'>";
                        echo "<label>";
                            echo "Are you represented by another attorney in an action against Macy's? ";
                        echo "</label>";
						if($notqualified_retained == 'Yes')
						{
							echo "<input type='radio' name='notqualified_retained'  value='Yes' onClick='showReYes();' checked/>";
						}
						else
						{
							echo "<input type='radio' name='notqualified_retained'  value='Yes' onClick='showReYes();' />";
						}
						echo "<label>";
							echo "Yes";
						echo "</label>";
						if($notqualified_retained == 'No')
						{
							echo "<input type='radio' name='notqualified_retained'  value='No' checked/>";
						}
						else
						{
							echo "<input type='radio' name='notqualified_retained'  value='No' />";
						}
						echo "<label>";
							echo "No";
						echo "</label>";
						echo "</td>";
						echo "<td>";
							formend('Update');
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td colspan='2'>";
							echo "<p><strong>WARNING:</strong>  If the prospective client is represented by another attorney in a matter against Macy's, we cannot speak with them.  Therefore, please ONLY obtain contact information for the attorney and the prospective client so that we can place them on the Do Not Call List.  Remember to click submit at the bottom of the page to save the information and to place the prospective client on the Do Not Call list.</p>";
						echo "</td>";
					echo "</tr>";
				?>
                
                
                
				<form <?php echo 'action="database_write_MacysshortformUpdate.php?uniqueid='.$uniqueid.'"'; ?> method="post" name="internalShortForm" id="internalShortForm" accept-charset="utf-8" onSubmit="return validateForm();">
                
				<?php
					if($notqualified_retained == "Yes") 
					{
						echo "<tr>";
							echo "<td colspan='2'>";
								echo "Attorney Info - What is your Attorney's...";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td valign='top'>";
								echo "<label>Attorney's Name:</label> <input type='text' size='24' name='attName' id='attName' value='$attName' />";
							echo "</td>";
							echo "<td>";
								echo "<label>Phone Number:</label> <input type='text' size='24' name='firmPhone' id='firmPhone' value='$firmPhone' />";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td valign='top'>";
								echo "<label>Firm Name:</label> <input type='text' size='24' name='firmName' id='firmName' value='$firmName' />";
							echo "</td>";
							echo "<td>";
								echo "<label>City:</label> <input type='text' size='24' name='firmCity' id='firmCity' value='$firmCity' />";
							echo "</td>";
						echo "</tr>";
					}
					else
					{
					}
				echo "</table>";		
			?>
        <?php
			if($notqualified_retained == "No") 
			{
				echo "<table width='680px'>";
					echo "<tr>";
						echo "<td>";
							echo "<p><em>Great. As background, Initiative Legal Group is currently investigating wage and hour claims against Macy's. We think that you may have been affected by these violations during your employment at Macy's. This conversation is completely voluntary. It should take about [10-15] minutes.</em></p>";
						echo "</td>";
					echo "</tr>";
			}
			if($notqualified_retained == "Yes") 
			{
					echo "<tr>";
						echo "<td>";
							echo "<p><em>Please provide me with your contact information for identification purposes only and we will NOT contact you again.</em></p>";
						echo "</td>";
					echo "</tr>";
				echo "</table>";
			}
			else
			{
			}
		?>
            
        <table width="680px">
            <tr>
            	<td valign='top' colspan="3">
                    <h2 class="formHeader">
                        Tell us about Yourself:
                    </h2>
                </td>
            </tr>
            <tr>
            	<td valign='top' colspan="3">
                    <p class="required">
                        * Indicates a required field.
                    </p>
                </td>
            </tr>
            <tr>
                <td valign='top' width="200px">
                    <label>
                        Full Name<span class="required">*</span>
                    </label>
                </td>
                <td valign='top' width="240px">
					<?php
                        echo "<input class='validate[required]' type='text' size='30' name='firstName' value='$FirstName' />";
                    ?>
                    <label class="description"> 
                        What is your first name? 
                    </label>
                </td>
                <td valign='top' width="240px">
					<?php
                        echo "<input class='validate[required]' type='text' size='30' name='lastName' value='$LastName' />";
                    ?>
                    <label class="description"> 
                        What is your last name?
                    </label>
                </td>
            </tr>
            <tr>
                <td valign='top'>
                    <label>
                        Phone Number<span class="required">*</span>
                    </label>
                </td>
                <td valign='top' colspan="2">
					<?php
                        echo "<input class='validate[required]' type='tel' size='12' name='phone1' value='$phone1' />";
                    ?>
                    <label class="description">
                        What is the best phone number to reach you?
                    </label>
                </td>
            </tr>
            <tr>
                <td valign='top'>
                    <label> 
                        Alternate phone
                    </label>
                </td>
                <td valign='top' colspan="2">
					<?php
                        echo "<input class='validate[required]' type='tel' size='12' name='phone2' value='$phone2' />";
                    ?>
                    <label class="description">
                        Do you have a secondary phone number?
                    </label>
                </td>
            </tr>
            <tr>
                <td valign='top'>
                    <label> 
                        Fax Number
                    </label>
                </td>
                <td valign='top' colspan="2">
					<?php
                        echo "<input class='validate[required]' type='tel' size='12' name='fax' value='$fax' />";
                    ?>
                    <label class="description">
                        What is your fax number?
                    </label>
                </td>
            </tr>
            <tr>
                <td valign='top'>
                    <label>
                        E-mail<span class="required"></span>
                    </label>
                </td>
                <td valign='top' colspan="2">
					<?php
                        echo "<input class='validate[required]' type='email' size='46' name='email' value='$Email' />";
                    ?>
                    <label class="description">
                        What is your email address?
                    </label>
                </td>
            </tr>
            <tr>
                <td valign='top'>
                    <label>
                        Address<span class="required">*</span>
                    </label>
                </td>
                <td valign='top' colspan="2">
					<?php
                        echo "<input class='validate[required]' type='text' size='46' name='StreetLine1' value='$StreetLine1' />";
                    ?>
                    <label class="description"> 
                        What is your home street address?
                    </label>
                </td>
            </tr>
            <tr>
            	<td></td>
                <td valign='top' colspan="2">
					<?php
                        echo "<input class='validate[required]' type='text' size='46' name='StreetLine2' value='$StreetLine2' />";
                    ?>
                    <label class="description"> 
                        What is your home street address (line 2)?
                    </label>
                </td>
            </tr>
            <tr>
            	<td></td>
                <td valign='top'>
					<?php
                        echo "<input class='validate[required]' type='text' size='21' name='HomeCity' value='$HomeCity' />";
                    ?>
                    <label class="description">
                        City
                    </label>
                </td>
                <td valign='top'>
                    <select name="HomeState">
                    <?php
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
					?>
                    </select>
                    <label class="description">
                        State
                    </label>
                </td>
            </tr>
            <tr>
            	<td></td>
                <td valign='top'>
					<?php
                        echo "<input class='validate[required]' type='text' size='10' name='Zipcode' value='$Zipcode' />";
                    ?>
                    <label class="description">
                        Zip Code
                    </label>
                </td>
            	<td valign='top'></td>
            </tr>
            <tr>
                <td valign='top' colspan="2">
                    <label>
                        To confirm you are over 18 years of age, what is your date of birth?
                    </label>
                </td>
                <td valign='top'>
					<?php
                        echo "<input type='text' size='30' name='dateofbirth' value='$dateofbirth' />";
                    ?>
                    <label class="description">
                        Example mm-dd-yyyy
                    </label><br />
                </td>
            </tr>
        </table>
        
        <?php 
			if($notqualified_retained != "Yes") 
			{
				echo "<table width='680px'>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							echo "<h2 class='formHeader'>";
								echo "Tell us about your experience at Macy's:";
							echo "</h2>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							echo "<label>";
								echo "Did you ever work at a Macy's retail store?<span class='required'>*</span>";
							echo "</label>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($didyouworkatmacysretail == 'Yes')
							{
								echo "<input type='radio' name='didyouworkatmacysretail'  value='Yes' onClick='showReYes();' checked/>";
							}
							else
							{
								echo "<input type='radio' name='didyouworkatmacysretail'  value='Yes' onClick='showReYes();' />";
							}
							echo "<label>";
								echo "Yes";
							echo "</label>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($didyouworkatmacysretail == 'No')
							{
								echo "<input type='radio' name='didyouworkatmacysretail'  value='No' onClick='showReYes();' checked/>";
							}
							else
							{
								echo "<input type='radio' name='didyouworkatmacysretail'  value='No' onClick='showReYes();' />";
							}
							echo "<label>";
								echo "No";
							echo "</label>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
                    		echo "<label>";
                       			echo "Are you currently employed at Macy's?<span class='required'>*</span>";
                    		echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					if($areyoucurrentmacysemployee == 'Yes')
					{
						echo "<tr>";
							echo "<td valign='top' colspan='3'>";
								echo "<input type='radio' name='areyoucurrentmacysemployee' value='Yes' onClick='showEmYes();' checked />";
								echo "<label>";
									echo "Yes";
								echo "</label>";
							echo "</td>";
						echo "</tr>"; 
					}
					else
					{
						echo "<tr>";
							echo "<td valign='top' colspan='3'>";
								echo "<input type='radio' name='areyoucurrentmacysemployee' value='Yes' onClick='showEmYes();' />";
								echo "<label>";
									echo "Yes";
								echo "</label>";
							echo "</td>";
						echo "</tr>"; 
					}
					if($areyoucurrentmacysemployee == 'No')
					{
						echo "<tr>";
							echo "<td valign='top' colspan='3'>";
								echo "<input type='radio' name='areyoucurrentmacysemployee' value='No' onClick='showEmYes();' checked />";
								echo "<label>";
									echo "Yes";
								echo "</label>";
							echo "</td>";
						echo "</tr>"; 
					}
					else
					{
						echo "<tr>";
							echo "<td valign='top' colspan='3'>";
								echo "<input type='radio' name='areyoucurrentmacysemployee' value='No' onClick='showEmYes();' />";
								echo "<label>";
									echo "No";
								echo "</label>";
							echo "</td>";
						echo "</tr>"; 
					}
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
                    		echo "<label>";
                        		echo "If you no longer work at Macy's, when did you stop working at Macy's?  (Best Estimate)";
                    		echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top'>";
                    		echo "<select name='formerlastdaymonth'>";
                        		echo "<option name='formerlastdaymonth' value=''>  </option>";
								if ($formerlastdaymonth == '01')
								{
									echo "<option name='formerlastdaymonth' value='01' selected> 01 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='01'> 01 </option>";
								}
								if ($formerlastdaymonth == '02')
								{
									echo "<option name='formerlastdaymonth' value='02' selected> 02 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='02'> 02 </option>";
								}
								if ($formerlastdaymonth == '03')
								{
									echo "<option name='formerlastdaymonth' value='03' selected> 03 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='03'> 03 </option>";
								}
								if ($formerlastdaymonth == '04')
								{
									echo "<option name='formerlastdaymonth' value='04' selected> 04 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='04'> 04 </option>";
								}
								if ($formerlastdaymonth == '05')
								{
									echo "<option name='formerlastdaymonth' value='05' selected> 05 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='05'> 05 </option>";
								}
								if ($formerlastdaymonth == '06')
								{
									echo "<option name='formerlastdaymonth' value='06' selected> 06 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='06'> 06 </option>";
								}
								if ($formerlastdaymonth == '07')
								{
									echo "<option name='formerlastdaymonth' value='07' selected> 07 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='07'> 07 </option>";
								}
								if ($formerlastdaymonth == '08')
								{
									echo "<option name='formerlastdaymonth' value='08' selected> 08 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='08'> 08 </option>";
								}
								if ($formerlastdaymonth == '09')
								{
									echo "<option name='formerlastdaymonth' value='09' selected> 09 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='09'> 09 </option>";
								}
								if ($formerlastdaymonth == '10')
								{
									echo "<option name='formerlastdaymonth' value='10' selected> 10 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='10'> 10 </option>";
								}
								if ($formerlastdaymonth == '11')
								{
									echo "<option name='formerlastdaymonth' value='11' selected> 11 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='11'> 11 </option>";
								}
								if ($formerlastdaymonth == '12')
								{
									echo "<option name='formerlastdaymonth' value='12' selected> 12 </option>";
								}
								else
								{
									echo "<option name='formerlastdaymonth' value='12'> 12 </option>";
								}
							echo "</select>";
							echo "<label class='description'> ";
								echo "Month";
							echo "</label>";
						echo "</td>";
						echo "<td valign='top'>";
							echo "<input name='formerlastdayday' type='hidden' size='2' maxlength='2' value='' />";
                    		echo "<select name='formerlastdayyear'>";
                        		echo "<option name='formerlastdayyear' value=''>  </option>";
								if ($formerlastdayyear == '1980')
								{
									echo "<option name='formerlastdayyear' value='1980' selected> 1980 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1980'> 1980 </option>";
								}
								if ($formerlastdayyear == '1981')
								{
									echo "<option name='formerlastdayyear' value='1981' selected> 1981 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1981'> 1981 </option>";
								}
								if ($formerlastdayyear == '1982')
								{
									echo "<option name='formerlastdayyear' value='1982' selected> 1982 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1982'> 1982 </option>";
								}
								if ($formerlastdayyear == '1983')
								{
									echo "<option name='formerlastdayyear' value='1983' selected> 1983 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1983'> 1983 </option>";
								}
								if ($formerlastdayyear == '1984')
								{
									echo "<option name='formerlastdayyear' value='1984' selected> 1984 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1984'> 1984 </option>";
								}
								if ($formerlastdayyear == '1985')
								{
									echo "<option name='formerlastdayyear' value='1985' selected> 1985 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1985'> 1985 </option>";
								}
								if ($formerlastdayyear == '1986')
								{
									echo "<option name='formerlastdayyear' value='1986' selected> 1986 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1986'> 1986 </option>";
								}
								if ($formerlastdayyear == '1987')
								{
									echo "<option name='formerlastdayyear' value='1987' selected> 1987 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1987'> 1987 </option>";
								}
								if ($formerlastdayyear == '1988')
								{
									echo "<option name='formerlastdayyear' value='1988' selected> 1988 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1988'> 1988 </option>";
								}
								if ($formerlastdayyear == '1989')
								{
									echo "<option name='formerlastdayyear' value='1989' selected> 1989 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1989'> 1989 </option>";
								}
								if ($formerlastdayyear == '1990')
								{
									echo "<option name='formerlastdayyear' value='1990' selected> 1990 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1990'> 1990 </option>";
								}
								if ($formerlastdayyear == '1991')
								{
									echo "<option name='formerlastdayyear' value='1991' selected> 1991 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1991'> 1991 </option>";
								}
								if ($formerlastdayyear == '1992')
								{
									echo "<option name='formerlastdayyear' value='1992' selected> 1992 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1992'> 1992 </option>";
								}
								if ($formerlastdayyear == '1993')
								{
									echo "<option name='formerlastdayyear' value='1993' selected> 1993 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1993'> 1993 </option>";
								}
								if ($formerlastdayyear == '1994')
								{
									echo "<option name='formerlastdayyear' value='1994' selected> 1994 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1994'> 1994 </option>";
								}
								if ($formerlastdayyear == '1995')
								{
									echo "<option name='formerlastdayyear' value='1995' selected> 1995 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1995'> 1995 </option>";
								}
								if ($formerlastdayyear == '1996')
								{
									echo "<option name='formerlastdayyear' value='1996' selected> 1996 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1996'> 1996 </option>";
								}
								if ($formerlastdayyear == '1997')
								{
									echo "<option name='formerlastdayyear' value='1997' selected> 1997 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1997'> 1997 </option>";
								}
								if ($formerlastdayyear == '1998')
								{
									echo "<option name='formerlastdayyear' value='1998' selected> 1998 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1998'> 1998 </option>";
								}
								if ($formerlastdayyear == '1999')
								{
									echo "<option name='formerlastdayyear' value='1999' selected> 1999 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='1999'> 1999 </option>";
								}
								if ($formerlastdayyear == '2000')
								{
									echo "<option name='formerlastdayyear' value='2000' selected> 2000 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2000'> 2000 </option>";
								}
								if ($formerlastdayyear == '2001')
								{
									echo "<option name='formerlastdayyear' value='2001' selected> 2001 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2001'> 2001 </option>";
								}
								if ($formerlastdayyear == '2002')
								{
									echo "<option name='formerlastdayyear' value='2002' selected> 2002 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2002'> 2002 </option>";
								}
								if ($formerlastdayyear == '2003')
								{
									echo "<option name='formerlastdayyear' value='2003' selected> 2003 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2003'> 2003 </option>";
								}
								if ($formerlastdayyear == '2004')
								{
									echo "<option name='formerlastdayyear' value='2004' selected> 2004 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2004'> 2004 </option>";
								}
								if ($formerlastdayyear == '2005')
								{
									echo "<option name='formerlastdayyear' value='2005' selected> 2005 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2005'> 2005 </option>";
								}
								if ($formerlastdayyear == '2006')
								{
									echo "<option name='formerlastdayyear' value='2006' selected> 2006 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2006'> 2006 </option>";
								}
								if ($formerlastdayyear == '2007')
								{
									echo "<option name='formerlastdayyear' value='2007' selected> 2007 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2007'> 2007 </option>";
								}
								if ($formerlastdayyear == '2008')
								{
									echo "<option name='formerlastdayyear' value='2008' selected> 2008 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2008'> 2008 </option>";
								}
								if ($formerlastdayyear == '2009')
								{
									echo "<option name='formerlastdayyear' value='2009' selected> 2009 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2009'> 2009 </option>";
								}
								if ($formerlastdayyear == '2010')
								{
									echo "<option name='formerlastdayyear' value='2010' selected> 2010 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2010'> 2010 </option>";
								}
								if ($formerlastdayyear == '2011')
								{
									echo "<option name='formerlastdayyear' value='2011' selected> 2011 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2011'> 2011 </option>";
								}
								if ($formerlastdayyear == '2012')
								{
									echo "<option name='formerlastdayyear' value='2012' selected> 2012 </option>";
								}
								else
								{
									echo "<option name='formerlastdayyear' value='2012'> 2012 </option>";
								}
							echo "</select>";
							echo "<label class='description'> ";
								echo "Year";
							echo "</label>";
                		echo "</td>";
						echo "<td valign='top' width='550px'>";
						echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortcheck1 != '')
							{
								echo "<input type='checkbox' name='shortcheck1' value='Did you ever miss your meal breaks while working for Macys?' checked onClick='showNoneAbove();' />";
							}
							else
							{
								echo "<input type='checkbox' name='shortcheck1' value='Did you ever miss your meal breaks while working for Macys?' onClick='showNoneAbove();' />";
							}
							echo "<label>";
								echo "Did you ever miss your meal breaks while working for Macys?";
								echo "<a class='addspeech' title='With some exceptions, employers must provide hourly employees with at least a 30-minute uninterrupted meal break for every 5 hours worked and with two 30-minute uninterrupted meal breaks if the employee works more than 10 hours in one day.'> <span class='whatsthis'>What's this?</span></a>";
							echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortcheck2 != '')
							{
								echo "<input type='checkbox' name='shortcheck2' value='Did you ever miss your rest breaks while working for Macys?' checked onClick='showNoneAbove();' />";
							}
							else
							{
								echo "<input type='checkbox' name='shortcheck2' value='Did you ever miss your rest breaks while working for Macys?' onClick='showNoneAbove();' />";
							}
							echo "<label>";
								echo "Did you ever miss your rest breaks while working for Macys?";
								echo "<a class='addspeech' title='With some exceptions, employers must allow employees to take a 10-minute uninterrupted rest break for every 4 hours worked.'> <span class='whatsthis'>What's this?</span></a>";
							echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortcheck3 != '')
							{
								echo "<input type='checkbox' name='shortcheck3' value='After you clocked out, were you required to go through a security check?' checked onClick='showNoneAbove();' />";
							}
							else
							{
								echo "<input type='checkbox' name='shortcheck3' value='After you clocked out, were you required to go through a security check?' onClick='showNoneAbove();' />";
							}
							echo "<label>";
								echo "After you clocked out, were you required to go through a security check?";
								echo "<a class='addspeech' title='If an employee is required to remain on the work premises after the employee has clocked out, the employer may be required to compensate the employee for that off the clock time.'> <span class='whatsthis'>What's this?</span></a>";
							echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortcheck4 != '')
							{
								echo "<input type='checkbox' name='shortcheck4' value='Were you paid for all of your overtime work?' checked onClick='showNoneAbove();' />";
							}
							else
							{
								echo "<input type='checkbox' name='shortcheck4' value='Were you paid for all of your overtime work?' onClick='showNoneAbove();' />";
							}
							echo "<label>";
								echo "Were you paid for all of your overtime work?";
								echo "<a class='addspeech' title='If an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to 1 and a half times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week.'> <span class='whatsthis'>What's this?</span></a>";
							echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortcheck5 != '')
							{
								echo "<input type='checkbox' name='shortcheck5' value='Did you receive your final paycheck within 72 hours or 3 days after your last day of work?' checked onClick='showNoneAbove();' />";
							}
							else
							{
								echo "<input type='checkbox' name='shortcheck5' value='Did you receive your final paycheck within 72 hours or 3 days after your last day of work?' onClick='showNoneAbove();' />";
							}
							echo "<label>";
								echo "Did you receive your final paycheck within 72 hours or 3 days after your last day of work?";
								echo "<a class='addspeech' title='California requires employers to provide final wages to employees within 3 days of their last day of work, or the employer has to pay a penalty.'> <span class='whatsthis'>What's this?</span></a>";
							echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortcheck6 != '')
							{
								echo "<input type='checkbox' name='shortcheck6' value='If you were fired, did you receive your final paycheck on your last day of work?' checked onClick='showNoneAbove();' />";
							}
							else
							{
								echo "<input type='checkbox' name='shortcheck6' value='If you were fired, did you receive your final paycheck on your last day of work?' onClick='showNoneAbove();' />";
							}
							echo "<label>";
								echo "If you were fired, did you receive your final paycheck on your last day of work?";
								echo "<a class='addspeech' title='California requires employers to provide final wages to employees whose employment is terminated immediately upon their termination, or the employer has to pay a penalty.'> <span class='whatsthis'>What's this?</span></a>";
							echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortcheck7 != '')
							{
								echo "<input type='checkbox' name='shortcheck7' value='I wasnt paid for all the work I performed.' checked onClick='showNoneAbove();' />";
							}
							else
							{
								echo "<input type='checkbox' name='shortcheck7' value='I wasnt paid for all the work I performed.' onClick='showNoneAbove();' />";
							}
							echo "<label>";
								echo "During your employment at Macy's, were you paid for all the work that you performed?";
							echo "</label>";
                		echo "</td>";
            		echo "</tr>";
					echo "<tr>";
						echo "<td valign='top' colspan='3'>";
							if($shortnoneoftheabove != '')
							{
								echo "<input type='checkbox' name='shortnoneoftheabove' value='Just to confirm, none of the above occurred during your work experience at Macys?' onClick='checkShortCheck();' checked/>";
							}
							else
							{
								echo "<input type='checkbox' name='shortnoneoftheabove' value='Just to confirm, none of the above occurred during your work experience at Macys?' onClick='checkShortCheck();' />";
							}
                        	echo "<label>";
                        		echo "Just to confirm, none of the above occurred during your work experience at Macy's?";
                        	echo "</label>";
                    	echo "</td>";
					echo "</tr>";
				}
				else
				{
				}
			?>
            
            <?php 
				if($notqualified_retained != "Yes") 
				{
					echo "<tr><td>&nbsp;</td></tr>";
					echo "<tr>";
                    	echo "<td valign='top' colspan='3'>";
                    		echo "<p><em>Based on the answers you just provided me, you may have wage and hour claims against Macy’s. In order to further investigate your potential claims against Macy’s, you may retain our law firm. The California State Bar requires a written agreement in a case like this, and I can send one to you to review.  Our fee is contingent on getting a recovery for you.  If there is no recovery, there are no fees or costs payable by you. Once have had a chance to look at it, you can call me with any questions. Otherwise, please sign and return it to us. Once we receive the signed agreement from you, we can continue investigating your potential claims and contact you for more information.</em></p>";
                    	echo "</td>";
					echo "</tr>";
					echo "<tr>";
                    	echo "<td valign='top' colspan='3'>";
							echo "<p><em>Would you like me to send you the agreement?</em></p>";
                    	echo "</td>";
					echo "</tr>";
					echo "<tr>";
                    	echo "<td valign='top' colspan='3'>";
                            echo "<textarea id='additionalInfo' name='additionalInfo' cols='40' rows='6'>";
                                if (isset($additionalInfo))
                                {
                                    if($additionalInfo != '')
                                    echo $additionalInfo;
                                }
                            echo "</textarea>";
                    	echo "</td>";
					echo "</tr>";
					echo "<tr>";
                    	echo "<td valign='top' colspan='3'>";
                        	echo"<p><em>Thank you for your time. You should receive the agreement shortly. If you have any questions about this case or the agreement, please call us at 888.792.2293 or you can visit our website at www.macyslawsuit.com.</em></p>";
                    	echo "</td>";
					echo "</tr>";
					echo "<tr><td>&nbsp;</td></tr>";
				}
				else
				{
				}
			?>
            
            <?php 
				if($notqualified_retained == "Yes")
				{
					echo "<tr>";
                    	echo "<td valign='top' colspan='3'>";
                    		echo "<p><em>Thank you for your time.  If we have any further questions, we will contact your attorney.</em></p>";
                    	echo "</td>";
                	echo "</tr>";
				}
				else
				{
				}
			?>
            
            <tr>
                <td valign='top' width="100px">
                    <label>
                        Barcode #
                    </label>
                </td>
                <td valign='top'>
					<?php
                        echo "<input class='validate[required]' type='text' size='25' name='barcode' value='$barcode' />";
                    ?>
                    <label class="description"> 
                        Barcode number 
                    </label>
                </td>
            </tr>
            <tr><td><br /></td></tr>
            <tr>
                <td valign='top' colspan="3">
                    <input type="submit" onClick="needToConfirm = false;" name="complete" value="Submit" class="submitButton" />
                </td>
            </tr>
            <tr><td><br /></td></tr>
        <input type="hidden" id="simple_spc" name="simple_spc" value="20545014055139" />
        <input type="hidden" name="completedonline" value="Yes" />
        <input type="hidden" name="tenantid" value="4" />
        <input type="hidden" name="brandid" value="1" />
        <input type="hidden" name="brand" value="Macys" />
    </form>
</div>