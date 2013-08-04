<?php
  require_once('recaptchalib.php');
  $privatekey = "6LeVHs4SAAAAAByblbL0zRz0b70JPwooyi-G-fxx";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("<FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'></FORM><BR>The reCAPTCHA wasn't entered correctly. Go back and try it again." ."<br>" .
         "(reCAPTCHA said: " . $resp->error . ")");
		 
  } else {
    // Your code here to handle a successful verification
  }
  ?>
<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

#$brand = $_REQUEST['brand'];
#$tenantid = $_REQUEST['tenantid'];
#$brandid = $_REQUEST['brandid'];
#$caseid = $_REQUEST['caseid'];
#$data = $_REQUEST['var'];

//set something to bob to test
//REQUIRED START
if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (isset($_POST['tenantid'])) $tenantid = $_POST['tenantid'];
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];

if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];

if (isset($_REQUEST['brand'])) $brandname = $_REQUEST['brand'];
if (isset($_POST['brand'])) $brandname = $_POST['brand'];

if (isset($_REQUEST['1WhoFirstName'])) $whofirstname = $_REQUEST['1WhoFirstName'];
if (isset($_REQUEST['1WhoFirstName'])) $FirstName = $_REQUEST['1WhoFirstName'];
if (isset($_POST['1WhoFirstName'])) $FirstName = $_POST['1WhoFirstName'];
if (isset($_POST['1WhoFirstName'])) $whofirstname = $_POST['1WhoFirstName'];


if (isset($_REQUEST['1WhoLastName'])) $wholastname = $_REQUEST['1WhoLastName'];
if (isset($_REQUEST['1WhoLastName'])) $LastName = $_REQUEST['1WhoLastName'];
if (isset($_POST['1WhoLastName'])) $LastName = $_POST['1WhoLastName'];
if (isset($_POST['1WhoLastName'])) $wholastname = $_POST['1WhoLastName'];

$clientname = "$FirstName" . " $LastName";

if (isset($_REQUEST['clientname'])) $clientname = $_REQUEST['clientname'];
if (isset($_POST['clientname'])) $clientname = $_POST['clientname'];


if (isset($uniqueid)){
$query = "IF NOT EXISTS(SELECT * FROM data WHERE  uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO data (uniqueid,brandid,tenantid,date,time,brand) VALUES ('$uniqueid','$brandid','$tenantid','$date','$time','$brand')";
$results = sqlsrv_query($conn,$query);
}

if (empty($uniqueid)) 
{
	
	/*
	|-----------------
	| Chip Download Class
	|------------------
	*/
 
	require_once("class.chip_password_generator.php");
 
	/*
	|-----------------
	| Class Instance
	|------------------
	*/
 
	$args = array(
	    'length'                =>   18,
	    'alpha_upper_include'   =>   TRUE,
	    'alpha_lower_include'   =>   FALSE,
	    'number_include'        =>   TRUE,
	    'symbol_include'        =>   FALSE,
	    );
	$object = new chip_password_generator( $args );
	 
	/*
	|-----------------
	| Generate Password
	|------------------
	*/
	 
	$password = $object->get_password();
 
	#echo $password;
	
	$uniqueid = $password;
	if (isset($uniqueid))
	{	
		$query = "IF NOT EXISTS(SELECT * FROM data WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO data (uniqueid,brandid,tenantid,date,time,brand) VALUES ('$uniqueid','$brandid','$tenantid','$date','$time','$brand')";
		$results = sqlsrv_query($conn,$query);
	}
}

//REQUIRED DONE
//allow first name via request to test
		#	$query = "IF EXISTS (SELECT * from status WHERE data.uniqueid='$uniqueid' AND data.tenantid='4') UPDATE status set retainernote='$retainernote',retainerRecievedDate='$date',retainerRecievedWeek='$week',retainerRecieved='$retainerRecieved',retainerRecievedMonth='$month' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4'";
		#	$results = sqlsrv_query($conn,$query);

#if (isset($_POST['1WhoFirstName'])) 
if (isset($_REQUEST['1WhoFirstName']))
{
	#$whofirstname = $_POST['1WhoFirstName'];
	$whofirstname = $_REQUEST['1WhoFirstName'];
	$var = "1WhoFirstName";
	$vardata = $whofirstname;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			
}
if (isset($_POST['1WhoLastName'])) 
{
	$wholastname = $_POST['1WhoLastName'];
	$var = "1WhoLastName";
	$vardata = $wholastname;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['1CallbackNumArea']))  $callbacknumarea = $_POST['1CallbackNumArea'];
if (isset($_POST['1CallbackNum'])) 
{	$callbacknum = '(' . $callbacknumarea . ')-' . $_POST['1CallbackNum'];
	$var = "1CallbackNum";
	$vardata = $callbacknum;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3SecondaryNumArea']))  $secondarynumberarea = $_POST['3SecondaryNumArea'];
if (isset($_POST['3SecondaryNumber'])) 
{	$secondarynumber =  '(' . $secondarynumberarea . ')-' . $_POST['3SecondaryNumber'];
	$var = "3SecondaryNumber";
	$vardata = $secondarynumber;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3Email'])) 
{	$email = $_POST['3Email'];
	$var = "3Email";
	$vardata = $email;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3StreetLine1'])) 
{	$streetline1 = $_POST['3StreetLine1'];
	$var = "3StreetLine1";
	$vardata = $streetline1;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3StreetLine2'])) 
{	$streetline2 = $_POST['3StreetLine2'];
	$var = "3StreetLine2";
	$vardata = $streetline2;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3HomeCity'])) 
{	$homecity = $_POST['3HomeCity'];
	$var = "3HomeCity";
	$vardata = $homecity;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3HomeState'])) 
{	$homestate = $_POST['3HomeState'];
	$var = "3HomeState";
	$vardata = $homestate;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3Zipcode'])) 
{	$zipcode = $_POST['3Zipcode'];
	$var = "3Zipcode";
	$vardata = $zipcode;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['didyouworkatmacysretail'])) 
{	$didyouworkatmacysretail = $_POST['didyouworkatmacysretail'];
	$var = "didyouworkatmacysretail";
	$vardata = $didyouworkatmacysretail;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}



if (isset($_POST['formerlastdayyear'])) $formerlastdayyear = $_POST['formerlastdayyear'];
if (isset($_POST['formerlastdayday'])) $formerlastdayday = $_POST['formerlastdayday'];
if (isset($_POST['formerlastdaymonth'])) $formerlastdaymonth = $_POST['formerlastdaymonth'];
if (isset($_POST['formerlastdayyear']))
{	$formerlastday = "$formerlastdayyear".'-'."$formerlastdaymonth" .'-'. "$formerlastdayday";
	$var = "formerlastday";
	$vardata = $formerlastday;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['shortcheck1'])) 
{	$shortcheck1 = $_POST['shortcheck1'];
	$var = "shortcheck1";
	$vardata = $shortcheck1;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck2'])) 
{	$shortcheck2 = $_POST['shortcheck2'];
	$var = "shortcheck2";
	$vardata = $shortcheck2;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck3'])) 
{	$shortcheck3 = $_POST['shortcheck3'];
	$var = "shortcheck3";
	$vardata = $shortcheck3;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck4'])) 
{	$shortcheck4 = $_POST['shortcheck4'];
	$var = "shortcheck4";
	$vardata = $shortcheck4;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck5'])) 
{	$shortcheck5 = $_POST['shortcheck5'];
	$var = "shortcheck5";
	$vardata = $shortcheck5;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck6'])) 
{	$shortcheck6 = $_POST['shortcheck6'];
	$var = "shortcheck6";
	$vardata = $shortcheck6;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck7'])) 
{	$shortcheck7 = $_POST['shortcheck7'];
	$var = "shortcheck7";
	$vardata = $shortcheck7;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck8'])) 
{	$shortcheck8 = $_POST['shortcheck8'];
	$var = "shortcheck8";
	$vardata = $shortcheck8;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck9'])) 
{	$shortcheck9 = $_POST['shortcheck9'];
	$var = "shortcheck9";
	$vardata = $shortcheck9;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck10'])) 
{	$shortcheck10 = $_POST['shortcheck10'];
	$var = "shortcheck10";
	$vardata = $shortcheck10;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortanythingelse'])) 
{	$shortanythingelse = $_POST['shortanythingelse'];
	$var = "shortanythingelse";
	$vardata = $shortanythingelse;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}



if (isset($_POST['15DocumentList'])) $documentlist = $_POST['15DocumentList'];

// Contact questions


if ($tenantid < 4)
{
echo "\\\\var dump start<br />";
	//print contact questions in plain text for testing post
	if (isset($whofirstname)) echo "OMG HI<br />$tenantid$whofirstname";
	#echo "<br />$wholastname";
	if (isset($wholastname)) echo "<br />$wholastname";
	#echo "<br />$wholastname";
	if (isset($callbacknum)) echo "<br />$callbacknum";
	#echo "<br />$callbacknum";
	if (isset($secondarynumber)) echo "<br />$secondarynumber";
	#echo "<br />$secondarynumber";
	if (isset($email)) echo "<br />$email";
	#echo "<br />$email";
	if (isset($streetline1)) echo "<br />$streetline1";
	#echo "<br />$streetline1";
	if (isset($streetline2)) echo "<br />$streetline2";
	#echo "<br />$streetline2";
	if (isset($homecity)) echo "<br />$homecity";
	#echo "<br />$homecity";
	if (isset($homestate)) echo "<br />$homestate";
	#echo "<br />$homestate";
	if (isset($zipcode)) echo "<br />$zipcode";
	#echo "<br />$zipcode";
	#1WhoFirstName
	#1WhoLastName
	#1CallbackNum
	#3SecondaryNumber
	#3Email
	#3StreetLine1
	#3StreetLine2
	#3HomeCity
	#3HomeState
	#3Zipcode
	//contact questions done
	//Employment background questions start
	if (isset($locstate)) echo "<br />$locstate";
	#echo "<br />$locstate";
	if (isset($loccity)) echo "<br />$loccity";
	#echo "<br />$loccity";
	if (isset($employeestatus)) echo "<br />$employeestatus";
	#echo "<br />$employeestatus";
	if (isset($workatmacys2004)) echo "<br />$workatmacys2004";
	#echo "<br />$employeehourly";
	if (isset($startmonth)) echo "<br />$startmonth";
	#echo "<br />$startmonth";
	if (isset($startyear)) echo "<br />$startyear";
	#echo "<br />$startyear";
	if (isset($endmonthseason)) echo "<br />$endmonthseason";
	#echo "<br />$endmonthseason";
	if (isset($endyear)) echo "<br />$endyear";
	#echo "<br />$endyear";
	if (isset($employeehourly)) echo "<br />$employeehourly";
	#echo "<br />$employeehourly";
	if (isset($workschedule)) echo "<br />$workschedule";
	#echo "<br />$workschedule";
	if (isset($category)) echo "<br />$category";
	#echo "<br />$category";
	if (isset($positions)) echo "<br />$positions";
	#echo "<br />$positions";
	#1LocState
	#1LocCity
	#4EmployeeStatus
	#4EmployeeHourly
	#4StartMonth
	#4StartYear
	#4EndMonthSeason
	#4EndYear
	#4EmployeeHourly
	#4WorkSchedule
	#4Category
	#4Positions
	//Employment background questions end
	//Documentation questions start
	if (isset($signedarbitration)) echo "<br />$signedarbitration";
	#echo "<br />$signedarbitration";
	if (isset($optedoutofarb)) echo "<br />$optedoutofarb";
	#echo "<br />$optedoutofarb";
	if (isset($familiararb)) echo "<br />$familiararb";
	#echo "<br />$familiararb";
	#5SignedArbitration
	#5OptedOutofArb
	#5FamiliarArb
	//meal breaks start
	if (isset($clockedformeal)) echo "<br />$clockedformeal";
	#echo "<br />$clockedformeal";
	if (isset($mealbreakscheduled)) echo "<br />$mealbreakscheduled";
	#echo "<br />$mealbreakscheduled";
	if (isset($mealwhenworkingbetween5and6hours)) echo "<br />$mealwhenworkingbetween5and6hours";
	#echo "<br />$mealwhenworkingbetween5and6hours";
	if (isset($mealbreakmissedcat1freq)) echo "<br />$mealbreakmissedcat1freq";
	#echo "<br />$mealbreakmissedcat1freq";
	if (isset($mealbreakmissedcat1why)) echo "<br />$mealbreakmissedcat1why";
	#echo "<br />$mealbreakmissedcat1why";
	if (isset($cat1mealbreaklate)) echo "<br />$cat1mealbreaklate";
	#echo "<br />$cat1mealbreaklate";
	if (isset($cat1mealbreaklatewhy)) echo "<br />$cat1mealbreaklatewhy";
	#echo "<br />$cat1mealbreaklatewhy";
	if (isset($cat1mealbreaklatefreq)) echo "<br />$cat1mealbreaklatefreq";
	#echo "<br />$cat1mealbreaklatefreq";
	if (isset($cat1mealbreakinterupt)) echo "<br />$cat1mealbreakinterupt";
	#echo "<br />$cat1mealbreakinterupt";
	if (isset($cat1mealbreakinteruptwhy)) echo "<br />$cat1mealbreakinteruptwhy";
	#echo "<br />$cat1mealbreakinteruptwhy";
	if (isset($cat1mealbreakinteruptfreq)) echo "<br />$cat1mealbreakinteruptfreq";
	#echo "<br />$cat1mealbreakinteruptfreq";
	if (isset($cat1extrahourpay)) echo "<br />$cat1extrahourpay";
	#echo "<br />$cat1extrahourpay";
	if (isset($cat1extrahourpaydetail)) echo "<br />$cat1extrahourpaydetail";
	#echo "<br />$cat1extrahourpaydetail";
	if (isset($evermorethan10)) echo "<br />$evermorethan10";
	#echo "<br />$evermorethan10";
	if (isset($cat3didgetsecondmealbreak)) echo "<br />$cat3didgetsecondmealbreak";
	#echo "<br />$cat3didgetsecondmealbreak";
	if (isset($cat3secondmealbreakdur)) echo "<br />$cat3secondmealbreakdur";
	#echo "<br />$cat3secondmealbreakdur";
	if (isset($cat3missed2ndmealbreakoften)) echo "<br />$cat3missed2ndmealbreakoften";
	#echo "<br />$cat3missed2ndmealbreakoften";
	if (isset($cat3missed2ndmealwaivemealperiod)) echo "<br />$cat3missed2ndmealwaivemealperiod";
	#echo "<br />$cat3missed2ndmealwaivemealperiod";
	if (isset($cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay)) echo "<br />$cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay";
	#echo "<br />$cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay";
	#7ClockedForMeal
	#7MealBreakScheduled
	#7MealWhenWorkingBetween5and6hours
	#7MealBreakMissedCat1Freq
	#7MealBreakMissedCat1Why
	#7Cat1MealBreakLate
	#7Cat1MealBreakLateWhy
	#7Cat1MealBreakLateFreq
	#7Cat1MealBreakInterupt
	#7Cat1MealBreakInteruptWhy
	#7Cat1MealBreakInteruptFreq
	#7Cat1ExtraHourPay
	#7Cat1ExtraHourPayDetail
	#7EverMoreThan10
	#7Cat3DidGetSecondMealBreak
	#7Cat3SecondMealBreakDur
	#7Cat3Missed2ndMealBreakOften
	#7Cat3Missed2ndMealWaiveMealPeriod
	#7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay
	//meal end
	//rest start
	if (isset($restevermissed)) echo "<br />$restevermissed";
	#echo "<br />$restevermissed";
	if (isset($howoftenmissrest)) echo "<br />$howoftenmissrest";
	#echo "<br />$howoftenmissrest";
	if (isset($whymiss10minrest)) echo "<br />$whymiss10minrest";
	#echo "<br />$whymiss10minrest";
	if (isset($resteverinterupt)) echo "<br />$resteverinterupt";
	#echo "<br />$resteverinterupt";
	if (isset($howoftenrestinterupt)) echo "<br />$howoftenrestinterupt";
	#echo "<br />$howoftenrestinterupt";
	if (isset($extrahourpay)) echo "<br />$extrahourpay";
	#echo "<br />$extrahourpay";
	if (isset($extrahourpaydetail)) echo "<br />$extrahourpaydetail";
	#echo "<br />$extrahourpaydetail";
	if (isset($restlatefreq)) echo "<br />$restlatefreq";
	#echo "<br />$restlatefreq";
	#8RestEverMissed
	#8HowOftenMissRest
	#8WhyMiss10MinRest
	#8RestEverInterupt
	#8HowOftenRestInterupt
	#8ExtraHourPay
	#8ExtraHourPayDetail
	#8RestLateFreq
	//rest end
	//bag start
	if (isset($bagschecksyesno)) echo "<br />$bagschecksyesno";
	#echo "<br />$bagschecksyesno";
	if (isset($bagscheckedafterclocking)) echo "<br />$bagscheckedafterclocking";
	#echo "<br />$bagscheckedafterclocking";
	if (isset($bagscheckedeverytimeleaving)) echo "<br />$bagscheckedeverytimeleaving";
	#echo "<br />$bagscheckedeverytimeleaving";
	if (isset($bagscheckedduration)) echo "<br />$bagscheckedduration";
	#echo "<br />$bagscheckedduration";
	if (isset($bagscheckedwait)) echo "<br />$bagscheckedwait";
	#echo "<br />$bagscheckedwait";
	if (isset($waitforotherbagchecks)) echo "<br />$waitforotherbagchecks";
	#echo "<br />$waitforotherbagchecks";
	#9BagsChecksYesNo
	#9BagsCheckedAfterClocking
	#9BagsCheckedEverytimeLeaving
	#9BagsCheckedDuration
	#9BagsCheckedWait
	#9WaitForOtherBagChecks
	//bag end
	//closing shift start
	if (isset($everworkclosingshift)) echo "<br />$everworkclosingshift";
	#echo "<br />$everworkclosingshift";
	if (isset($havetowaittoleave)) echo "<br />$havetowaittoleave";
	#echo "<br />$havetowaittoleave";
	if (isset($onoroffclockwaiting)) echo "<br />$onoroffclockwaiting";
	#echo "<br />$onoroffclockwaiting";
	if (isset($howlongwaittoleave)) echo "<br />$howlongwaittoleave";
	#echo "<br />$howlongwaittoleave";
	if (isset($waitformgrtophysicallyafterclockedout)) echo "<br />$waitformgrtophysicallyafterclockedout";
	#echo "<br />$waitformgrtophysicallyafterclockedout";
	if (isset($lengthwaitformgr)) echo "<br />$lengthwaitformgr";
	#echo "<br />$lengthwaitformgr";
	#10EverWorkClosingShift
	#10HaveToWaitToLeave
	#10OnOrOffClockWaiting
	#10HowLongWaitToLeave
	#10WaitForMgrToPhysicallyAfterClockedOut
	#10LengthWaitForMgr
	//closing shift end
	//overtimestart
	if (isset($over8)) echo "<br />$over8";
	if (isset($howmuchot)) echo "<br />$howmuchot";
	#echo "<br />$over8";
	if (isset($evernotpaidot)) echo "<br />$evernotpaidot";
	#echo "<br />$evernotpaidot";
	if (isset($everwork40week)) echo "<br />$everwork40week";
	#echo "<br />$everwork40week";
	if (isset($everworkover40weekhowmany)) echo "<br />$everworkover40weekhowmany";
	#echo "<br />$everworkover40weekhowmany";
	if (isset($over40andnotpaid)) echo "<br />$over40andnotpaid";
	#echo "<br />$over40andnotpaid";
	#11Over8
	#11EverNotPaidOT
	#11EverWork40Week
	#11EverWorkOver40WeekHowMany
	#11Over40AndNotPaid
	//overtimeend
	//finalwage start
	if (isset($termtype)) echo "<br />$termtype";
	#echo "<br />$termtype";
	if (isset($didyougetfinalcheckonlastday)) echo "<br />$didyougetfinalcheckonlastday";
	#echo "<br />$didyougetfinalcheckonlastday";
	if (isset($howlongaftertermrecievecheckgreaterthan72)) echo "<br />$howlongaftertermrecievecheckgreaterthan72";
	#echo "<br />$howlongaftertermrecievecheckgreaterthan72";
	if (isset($seventytwohoursorless)) echo "<br />$seventytwohoursorless";
	#echo "<br />$seventytwohoursorless";
	if (isset($didyougetfinalcheckonlastday)) echo "<br />$didyougetfinalcheckonlastday";
	#echo "<br />$didyougetfinalcheckonlastday";
	#12TermType
	#12DidYouGetFinalCheckOnLastDay
	#12HowLongAfterTermRecieveCheckGreaterThan72
	#12SeventyTwoHoursOrLess
	#12DidYouGetFinalCheckOnLastDay
	//finalwage end
	//wage statements start
	if (isset($getpaystubwithcheck)) echo "<br />$getpaystubwithcheck";
	#echo "<br />$getpaystubwithcheck";
	if (isset($waspaystubelectronic)) echo "<br />$waspaystubelectronic";
	#echo "<br />$waspaystubelectronic";
	if (isset($didyouunderstandwagestatement)) echo "<br />$didyouunderstandwagestatement";
	#echo "<br />$didyouunderstandwagestatement";
	if (isset($waswagestatementincodes)) echo "<br />$waswagestatementincodes";
	#echo "<br />$waswagestatementincodes";
	if (isset($paycalcmethod)) echo "<br />$paycalcmethod";
	#echo "<br />$paycalcmethod";
	if (isset($anyproblemswithpay)) echo "<br />$anyproblemswithpay";
	#echo "<br />$anyproblemswithpay";
	#13GetPayStubWithCheck
	#13WasPaystubElectronic
	#13DidYouUnderstandWageStatement
	#13WasWageStatementInCodes
	#13PayCalcMethod
	#13AnyProblemsWithPay
	//wage statements end
	//seating start
	if (isset($didyourjobrequirestanding)) echo "<br />$didyourjobrequirestanding";
	#echo "<br />$didyourjobrequirestanding";
	if (isset($weretherechairs)) echo "<br />$weretherechairs";
	#echo "<br />$weretherechairs";
	if (isset($permittedtosit)) echo "<br />$permittedtosit";
	#echo "<br />$permittedtosit";
	if (isset($describeseating)) echo "<br />$describeseating";
	#echo "<br />$describeseating";
	if (isset($permittedtosityeshoursuntilsit)) echo "<br />$permittedtosityeshoursuntilsit";
	#echo "<br />$permittedtosityeshoursuntilsit";
	if (isset($whynotallowedtosit)) echo "<br />$whynotallowedtosit";
	#echo "<br />$whynotallowedtosit";
	if (isset($consequences)) echo "<br />$consequences";
	#echo "<br />$consequences";
	if (isset($whatconsequences)) echo "<br />$whatconsequences";
	#echo "<br />$whatconsequences";
	if (isset($sittingwouldinterfere)) echo "<br />$sittingwouldinterfere";
	#echo "<br />$sittingwouldinterfere";
	#14DidYourJobRequireStanding
	#14WereThereChairs
	#14DescribeSeating
	#14PermittedToSit
	#14PermittedToSitYesHoursUntilSit
	#14WhyNotAllowedToSit
	#14Consequences
	#14WhatConsequences
	#14SittingWouldInterfere
	//seating end
	//documents start
	if (isset($anydocumentstoshare)) echo "<br />$anydocumentstoshare";
	#echo "<br />$anydocumentstoshare";
	if (isset($documentlist)) echo "<br />$documentlist";
	#echo "<br />$documentlist";
	#15AnyDocumentsToShare
	#15DocumentList
}
#if( $conn === false ) {
#
#    die('{"data":'.json_encode(sqlsrv_errors()).'}');
#
#}


 

if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

} 

?>

<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');
$date = date('Y').'-'.date('m').'-'.date('d');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');

class PDF_Code128 extends FPDF {

var $T128;                                             // tableau des codes 128
var $ABCset="";                                        // jeu des caractères éligibles au C128
var $Aset="";                                          // Set A du jeu des caractères éligibles
var $Bset="";                                          // Set B du jeu des caractères éligibles
var $Cset="";                                          // Set C du jeu des caractères éligibles
var $SetFrom;                                          // Convertisseur source des jeux vers le tableau
var $SetTo;                                            // Convertisseur destination des jeux vers le tableau
var $JStart = array("A"=>103, "B"=>104, "C"=>105);     // Caractères de sélection de jeu au début du C128
var $JSwap = array("A"=>101, "B"=>100, "C"=>99);       // Caractères de changement de jeu

//____________________________ Extension du constructeur _______________________
function PDF_Code128($orientation='P', $unit='mm', $format='A4') {

    parent::FPDF($orientation,$unit,$format);

    $this->T128[] = array(2, 1, 2, 2, 2, 2);           //0 : [ ]               // composition des caractères
    $this->T128[] = array(2, 2, 2, 1, 2, 2);           //1 : [!]
    $this->T128[] = array(2, 2, 2, 2, 2, 1);           //2 : ["]
    $this->T128[] = array(1, 2, 1, 2, 2, 3);           //3 : [#]
    $this->T128[] = array(1, 2, 1, 3, 2, 2);           //4 : [$]
    $this->T128[] = array(1, 3, 1, 2, 2, 2);           //5 : [%]
    $this->T128[] = array(1, 2, 2, 2, 1, 3);           //6 : [&]
    $this->T128[] = array(1, 2, 2, 3, 1, 2);           //7 : [']
    $this->T128[] = array(1, 3, 2, 2, 1, 2);           //8 : [(]
    $this->T128[] = array(2, 2, 1, 2, 1, 3);           //9 : [)]
    $this->T128[] = array(2, 2, 1, 3, 1, 2);           //10 : [*]
    $this->T128[] = array(2, 3, 1, 2, 1, 2);           //11 : [+]
    $this->T128[] = array(1, 1, 2, 2, 3, 2);           //12 : [,]
    $this->T128[] = array(1, 2, 2, 1, 3, 2);           //13 : [-]
    $this->T128[] = array(1, 2, 2, 2, 3, 1);           //14 : [.]
    $this->T128[] = array(1, 1, 3, 2, 2, 2);           //15 : [/]
    $this->T128[] = array(1, 2, 3, 1, 2, 2);           //16 : [0]
    $this->T128[] = array(1, 2, 3, 2, 2, 1);           //17 : [1]
    $this->T128[] = array(2, 2, 3, 2, 1, 1);           //18 : [2]
    $this->T128[] = array(2, 2, 1, 1, 3, 2);           //19 : [3]
    $this->T128[] = array(2, 2, 1, 2, 3, 1);           //20 : [4]
    $this->T128[] = array(2, 1, 3, 2, 1, 2);           //21 : [5]
    $this->T128[] = array(2, 2, 3, 1, 1, 2);           //22 : [6]
    $this->T128[] = array(3, 1, 2, 1, 3, 1);           //23 : [7]
    $this->T128[] = array(3, 1, 1, 2, 2, 2);           //24 : [8]
    $this->T128[] = array(3, 2, 1, 1, 2, 2);           //25 : [9]
    $this->T128[] = array(3, 2, 1, 2, 2, 1);           //26 : [:]
    $this->T128[] = array(3, 1, 2, 2, 1, 2);           //27 : [;]
    $this->T128[] = array(3, 2, 2, 1, 1, 2);           //28 : [<]
    $this->T128[] = array(3, 2, 2, 2, 1, 1);           //29 : [=]
    $this->T128[] = array(2, 1, 2, 1, 2, 3);           //30 : [>]
    $this->T128[] = array(2, 1, 2, 3, 2, 1);           //31 : [?]
    $this->T128[] = array(2, 3, 2, 1, 2, 1);           //32 : [@]
    $this->T128[] = array(1, 1, 1, 3, 2, 3);           //33 : [A]
    $this->T128[] = array(1, 3, 1, 1, 2, 3);           //34 : [B]
    $this->T128[] = array(1, 3, 1, 3, 2, 1);           //35 : [C]
    $this->T128[] = array(1, 1, 2, 3, 1, 3);           //36 : [D]
    $this->T128[] = array(1, 3, 2, 1, 1, 3);           //37 : [E]
    $this->T128[] = array(1, 3, 2, 3, 1, 1);           //38 : [F]
    $this->T128[] = array(2, 1, 1, 3, 1, 3);           //39 : [G]
    $this->T128[] = array(2, 3, 1, 1, 1, 3);           //40 : [H]
    $this->T128[] = array(2, 3, 1, 3, 1, 1);           //41 : [I]
    $this->T128[] = array(1, 1, 2, 1, 3, 3);           //42 : [J]
    $this->T128[] = array(1, 1, 2, 3, 3, 1);           //43 : [K]
    $this->T128[] = array(1, 3, 2, 1, 3, 1);           //44 : [L]
    $this->T128[] = array(1, 1, 3, 1, 2, 3);           //45 : [M]
    $this->T128[] = array(1, 1, 3, 3, 2, 1);           //46 : [N]
    $this->T128[] = array(1, 3, 3, 1, 2, 1);           //47 : [O]
    $this->T128[] = array(3, 1, 3, 1, 2, 1);           //48 : [P]
    $this->T128[] = array(2, 1, 1, 3, 3, 1);           //49 : [Q]
    $this->T128[] = array(2, 3, 1, 1, 3, 1);           //50 : [R]
    $this->T128[] = array(2, 1, 3, 1, 1, 3);           //51 : [S]
    $this->T128[] = array(2, 1, 3, 3, 1, 1);           //52 : [T]
    $this->T128[] = array(2, 1, 3, 1, 3, 1);           //53 : [U]
    $this->T128[] = array(3, 1, 1, 1, 2, 3);           //54 : [V]
    $this->T128[] = array(3, 1, 1, 3, 2, 1);           //55 : [W]
    $this->T128[] = array(3, 3, 1, 1, 2, 1);           //56 : [X]
    $this->T128[] = array(3, 1, 2, 1, 1, 3);           //57 : [Y]
    $this->T128[] = array(3, 1, 2, 3, 1, 1);           //58 : [Z]
    $this->T128[] = array(3, 3, 2, 1, 1, 1);           //59 : [[]
    $this->T128[] = array(3, 1, 4, 1, 1, 1);           //60 : [\]
    $this->T128[] = array(2, 2, 1, 4, 1, 1);           //61 : []]
    $this->T128[] = array(4, 3, 1, 1, 1, 1);           //62 : [^]
    $this->T128[] = array(1, 1, 1, 2, 2, 4);           //63 : [_]
    $this->T128[] = array(1, 1, 1, 4, 2, 2);           //64 : [`]
    $this->T128[] = array(1, 2, 1, 1, 2, 4);           //65 : [a]
    $this->T128[] = array(1, 2, 1, 4, 2, 1);           //66 : [b]
    $this->T128[] = array(1, 4, 1, 1, 2, 2);           //67 : [c]
    $this->T128[] = array(1, 4, 1, 2, 2, 1);           //68 : [d]
    $this->T128[] = array(1, 1, 2, 2, 1, 4);           //69 : [e]
    $this->T128[] = array(1, 1, 2, 4, 1, 2);           //70 : [f]
    $this->T128[] = array(1, 2, 2, 1, 1, 4);           //71 : [g]
    $this->T128[] = array(1, 2, 2, 4, 1, 1);           //72 : [h]
    $this->T128[] = array(1, 4, 2, 1, 1, 2);           //73 : [i]
    $this->T128[] = array(1, 4, 2, 2, 1, 1);           //74 : [j]
    $this->T128[] = array(2, 4, 1, 2, 1, 1);           //75 : [k]
    $this->T128[] = array(2, 2, 1, 1, 1, 4);           //76 : [l]
    $this->T128[] = array(4, 1, 3, 1, 1, 1);           //77 : [m]
    $this->T128[] = array(2, 4, 1, 1, 1, 2);           //78 : [n]
    $this->T128[] = array(1, 3, 4, 1, 1, 1);           //79 : [o]
    $this->T128[] = array(1, 1, 1, 2, 4, 2);           //80 : [p]
    $this->T128[] = array(1, 2, 1, 1, 4, 2);           //81 : [q]
    $this->T128[] = array(1, 2, 1, 2, 4, 1);           //82 : [r]
    $this->T128[] = array(1, 1, 4, 2, 1, 2);           //83 : [s]
    $this->T128[] = array(1, 2, 4, 1, 1, 2);           //84 : [t]
    $this->T128[] = array(1, 2, 4, 2, 1, 1);           //85 : [u]
    $this->T128[] = array(4, 1, 1, 2, 1, 2);           //86 : [v]
    $this->T128[] = array(4, 2, 1, 1, 1, 2);           //87 : [w]
    $this->T128[] = array(4, 2, 1, 2, 1, 1);           //88 : [x]
    $this->T128[] = array(2, 1, 2, 1, 4, 1);           //89 : [y]
    $this->T128[] = array(2, 1, 4, 1, 2, 1);           //90 : [z]
    $this->T128[] = array(4, 1, 2, 1, 2, 1);           //91 : [{]
    $this->T128[] = array(1, 1, 1, 1, 4, 3);           //92 : [|]
    $this->T128[] = array(1, 1, 1, 3, 4, 1);           //93 : [}]
    $this->T128[] = array(1, 3, 1, 1, 4, 1);           //94 : [~]
    $this->T128[] = array(1, 1, 4, 1, 1, 3);           //95 : [DEL]
    $this->T128[] = array(1, 1, 4, 3, 1, 1);           //96 : [FNC3]
    $this->T128[] = array(4, 1, 1, 1, 1, 3);           //97 : [FNC2]
    $this->T128[] = array(4, 1, 1, 3, 1, 1);           //98 : [SHIFT]
    $this->T128[] = array(1, 1, 3, 1, 4, 1);           //99 : [Cswap]
    $this->T128[] = array(1, 1, 4, 1, 3, 1);           //100 : [Bswap]                
    $this->T128[] = array(3, 1, 1, 1, 4, 1);           //101 : [Aswap]
    $this->T128[] = array(4, 1, 1, 1, 3, 1);           //102 : [FNC1]
    $this->T128[] = array(2, 1, 1, 4, 1, 2);           //103 : [Astart]
    $this->T128[] = array(2, 1, 1, 2, 1, 4);           //104 : [Bstart]
    $this->T128[] = array(2, 1, 1, 2, 3, 2);           //105 : [Cstart]
    $this->T128[] = array(2, 3, 3, 1, 1, 1);           //106 : [STOP]
    $this->T128[] = array(2, 1);                       //107 : [END BAR]

    for ($i = 32; $i <= 95; $i++) {                                            // jeux de caractères
        $this->ABCset .= chr($i);
    }
    $this->Aset = $this->ABCset;
    $this->Bset = $this->ABCset;
    for ($i = 0; $i <= 31; $i++) {
        $this->ABCset .= chr($i);
        $this->Aset .= chr($i);
    }
    for ($i = 96; $i <= 126; $i++) {
        $this->ABCset .= chr($i);
        $this->Bset .= chr($i);
    }
    $this->Cset="0123456789";

    for ($i=0; $i<96; $i++) {                                                  // convertisseurs des jeux A & B  
        @$this->SetFrom["A"] .= chr($i);
        @$this->SetFrom["B"] .= chr($i + 32);
        @$this->SetTo["A"] .= chr(($i < 32) ? $i+64 : $i-32);
        @$this->SetTo["B"] .= chr($i);
    }
}

//________________ Fonction encodage et dessin du code 128 _____________________
function Header()
{
	global $title;
	$this->Ln(14);
}
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-20);
	// Arial italic 8
	$this->SetFont('Arial','I',9);
	// Text color in gray
	$this->SetTextColor(128);
	// Page number
#	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	$this->Cell(0,10,'1800 Century Park East, 2nd Floor - Los Angeles, California 90067 ','','','C');
	$this->Ln(3);
	$this->Cell(0,10,'877-515-4712 Main - 310.861.9051 Fax - www.InitiativeLegal.com ','','','C');
	$this->Ln(4);
	$this->Cell(0,10,'CLIENT INITIALS _______','','','R');
	$this->Ln(9);
}


function Code128($x, $y, $code, $w, $h) {
    $Aguid = "";                                                                      // Création des guides de choix ABC
    $Bguid = "";
    $Cguid = "";
    for ($i=0; $i < strlen($code); $i++) {
        $needle = substr($code,$i,1);
        $Aguid .= ((strpos($this->Aset,$needle)===false) ? "N" : "O"); 
        $Bguid .= ((strpos($this->Bset,$needle)===false) ? "N" : "O"); 
        $Cguid .= ((strpos($this->Cset,$needle)===false) ? "N" : "O");
    }

    $SminiC = "OOOO";
    $IminiC = 4;

    $crypt = "";
    while ($code > "") {
                                                                                    // BOUCLE PRINCIPALE DE CODAGE
        $i = strpos($Cguid,$SminiC);                                                // forçage du jeu C, si possible
        if ($i!==false) {
            $Aguid [$i] = "N";
            $Bguid [$i] = "N";
        }

        if (substr($Cguid,0,$IminiC) == $SminiC) {                                  // jeu C
            $crypt .= chr(($crypt > "") ? $this->JSwap["C"] : $this->JStart["C"]);  // début Cstart, sinon Cswap
            $made = strpos($Cguid,"N");                                             // étendu du set C
            if ($made === false) {
                $made = strlen($Cguid);
            }
            if (fmod($made,2)==1) {
                $made--;                                                            // seulement un nombre pair
            }
            for ($i=0; $i < $made; $i += 2) {
                $crypt .= chr(strval(substr($code,$i,2)));                          // conversion 2 par 2
            }
            $jeu = "C";
        } else {
            $madeA = strpos($Aguid,"N");                                            // étendu du set A
            if ($madeA === false) {
                $madeA = strlen($Aguid);
            }
            $madeB = strpos($Bguid,"N");                                            // étendu du set B
            if ($madeB === false) {
                $madeB = strlen($Bguid);
            }
            $made = (($madeA < $madeB) ? $madeB : $madeA );                         // étendu traitée
            $jeu = (($madeA < $madeB) ? "B" : "A" );                                // Jeu en cours

            $crypt .= chr(($crypt > "") ? $this->JSwap[$jeu] : $this->JStart[$jeu]); // début start, sinon swap

            $crypt .= strtr(substr($code, 0,$made), $this->SetFrom[$jeu], $this->SetTo[$jeu]); // conversion selon jeu

        }
        $code = substr($code,$made);                                           // raccourcir légende et guides de la zone traitée
        $Aguid = substr($Aguid,$made);
        $Bguid = substr($Bguid,$made);
        $Cguid = substr($Cguid,$made);
    }                                                                          // FIN BOUCLE PRINCIPALE

    $check = ord($crypt[0]);                                                   // calcul de la somme de contrôle
    for ($i=0; $i<strlen($crypt); $i++) {
        $check += (ord($crypt[$i]) * $i);
    }
    $check %= 103;

    $crypt .= chr($check) . chr(106) . chr(107);                               // Chaine Cryptée complète

    $i = (strlen($crypt) * 11) - 8;                                            // calcul de la largeur du module
    $modul = $w/$i;

    for ($i=0; $i<strlen($crypt); $i++) {                                      // BOUCLE D'IMPRESSION
        $c = $this->T128[ord($crypt[$i])];
        for ($j=0; $j<count($c); $j++) {
            $this->Rect($x,$y,$c[$j]*$modul,$h,"F");
            $x += ($c[$j++]+$c[$j])*$modul;
        }
    }
}
}                                                                              // FIN DE CLASSE

$pdf = new PDF_Code128();




$retainerhead1 = './retainers/'. "$brandname" . 'RetainerHead1.txt';
$retainerhead2 = './retainers/'. "$brandname" . 'RetainerHead2.txt';
$retainerhead3 = './retainers/'. "$brandname" . 'RetainerHead3.txt';
$retainerhead4 = './retainers/'. "$brandname" . 'RetainerHead4.txt';
$retainerhead5 = './retainers/'. "$brandname" . 'RetainerHead5.txt';
$retainerhead6 = './retainers/'. "$brandname" . 'RetainerHead6.txt';
$retainerhead7 = './retainers/'. "$brandname" . 'RetainerHead7.txt';
$retainerhead8 = './retainers/'. "$brandname" . 'RetainerHead8.txt';
$retainerhead9 = './retainers/'. "$brandname" . 'RetainerHead9.txt';
$retainer1 = './retainers/'. "$brandname" . 'RetainerPart1.txt';
$retainer2 = './retainers/'. "$brandname" . 'RetainerPart2.txt';
$retainer3 = './retainers/'. "$brandname" . 'RetainerPart3.txt';
$retainer4 = './retainers/'. "$brandname" . 'RetainerPart4.txt';
$retainer5 = './retainers/'. "$brandname" . 'RetainerPart5.txt';
$retainer6 = './retainers/'. "$brandname" . 'RetainerPart6.txt';
$retainer7 = './retainers/'. "$brandname" . 'RetainerPart7.txt';
$retainer8 = './retainers/'. "$brandname" . 'RetainerPart8.txt';
$retainer9 = './retainers/'. "$brandname" . 'RetainerPart9.txt';
$get1 = file_get_contents($retainer1);
$get2 = file_get_contents($retainer2);
$get3 = file_get_contents($retainer3);
$get4 = file_get_contents($retainer4);
$get5 = file_get_contents($retainer5);
$get6 = file_get_contents($retainer6);
$get7 = file_get_contents($retainer7);
$get8 = file_get_contents($retainer8);
$get9 = file_get_contents($retainer9);
$gethead1 = file_get_contents($retainerhead1);
$gethead2 = file_get_contents($retainerhead2);
$gethead3 = file_get_contents($retainerhead3);
$gethead4 = file_get_contents($retainerhead4);
$gethead5 = file_get_contents($retainerhead5);
$gethead6 = file_get_contents($retainerhead6);
$gethead7 = file_get_contents($retainerhead7);
$gethead8 = file_get_contents($retainerhead8);
$gethead9 = file_get_contents($retainerhead9);

$hellocompany = 'INITIATIVE LEGAL GROUP APC';
$hellotitle = 'ATTORNEY-CLIENT AGREEMENT';
$hello = "$clientname" . ' ("Client") ';
#$hellophone = "$cliphone" . ' phone number';
$hello2 = '     This Attorney-Client Agreement sets forth the terms under which Initiative Legal Group APC ("Attorneys") has been retained by ' . "$hello" .' to perform certain legal services.';
$title = 'ATTORNEY-CLIENT AGREEMENT';
$agreed = 'AGREED AND ACCEPTED';
$space = ' ';
$printtxt = 'PHONE NUMBER';
$printline = '__________________________________';
$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
$pdf->AddPage();

$pdf->Image('logo.png',62,22,8,0,'','');
$pdf->Ln();
$pdf->SetFont('helvetica','B',12);
$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$hellotitle,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,$hello2);
$pdf->Ln();
$pdf->Ln();
#$pdf->SetFont('Times','',10);
#$pdf->MultiCell(0,5,$hello);
#$pdf->Ln();
#$pdf->SetFont('Times','',10);
#$pdf->MultiCell(0,5,$hellophone);
#$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead1);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get1);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead2);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get2);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead3);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get3);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get4);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead5);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get5);
$pdf->SetFont('Arial','',10);

$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
// page 2 start
$pdf->AddPage();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead6);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get6);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead7);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get7);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead8);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get8);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead9);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get9);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,5,$agreed,'','','L');
$pdf->Ln(15);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,$signline);
$pdf->Ln(7);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$signtxt);
$pdf->Ln(9);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,$printline);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$printtxt);
#$pdf->Write('',Hello,'');

$pdf->SetFont('Arial','',10);

$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
//AUTH FORM START
$pdf->AddPage();
$authtitle = 'AUTHORIZATION FOR RELEASE OF';
$authtitle2 = 'PERSONNEL FILE AND WAGE RECORDS';
$authline = '_________________________________________';
$towhom = 'To Whom It May Concern:';
$authintro = 'I, ' . "$clientname" . ':';
$authtext = 'request request that ' . "$brandname" . ', Inc. and any related entities send copies of the following to Initiative Legal Group APC, located at 1800 Century Park East, 2nd Floor, Los Angeles, California 90067:';
$authtext2 = '          (a) My employee personnel file as required by California Labor Code section 432; and';
$authtext3 = '          (b) My wage stubs and time records in their entirety as set out in California Labor Code section 226(a)';
$authtext4 = '          and as required by California Labor Code section 226(b). ';
$authsignline = '__________________________________              ________________';
$authsigntext = 'SIGN YOUR FULL NAME                                               Date';

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$authtitle,'','C');
$pdf->Ln(1);
$pdf->MultiCell(0,5,$authtitle2,'','C');
$pdf->Ln(3);
$pdf->MultiCell(0,5,$authline,'','C');
$pdf->Ln();

$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,$towhom);
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$authintro);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$authtext);
$pdf->Ln();
$pdf->MultiCell(0,5,$authtext2);
$pdf->Ln();
$pdf->Cell(0,5,$authtext3);
$pdf->Ln(5);
$pdf->Cell(0,5,$authtext4);
$pdf->Ln(10);
$pdf->Cell(0,5,$authsignline);
$pdf->Ln(7);
$pdf->Cell(0,5,$authsigntext);

$pdf->SetFont('Arial','',10);

$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$filename = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$ext = ".pdf";
#$pdf->Output(); //pushes file to browser as a viewable PDF
#$pdf->Output("$filename$ext","D"); //pushes file to browser as save as

$pdf->Output("/inetpub/wwwroot/$filename$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/Retainerstmp/$filename$ext","F");
$pdf = new PDF_Code128();
$pdf->AddPage();
$questiontitle = "$clientname" . ':' . "$brandname" .' Questionnare questions and answers - ' . "$date";

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$questiontitle,'','C');
$pdf->Ln();
$pdf->Ln();
	if (isset($whofirstname)) 
	{
		$question = "Please type in your First Name:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$whofirstname);
		$pdf->Ln();
	}
	if (isset($wholastname))  
	{
		$question = "Please type in your Last Name:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$wholastname);
		$pdf->Ln();
	}
	if (isset($callbacknum))  
	{
		$question = "What is the best number to reach you:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$callbacknum);
		$pdf->Ln();
	}
	if (isset($secondarynumber)) 
	{
		$question = "Do you have a secondary phone number:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$secondarynumber);
		$pdf->Ln();
	}
	if (isset($email)) 
	{
		$question = "What is your email address?:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$email);
		$pdf->Ln();
	}
	if (isset($streetline1))  
	{
		$question = "What is your home address? Street 1:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$streetline1);
		$pdf->Ln();
	}
	if (isset($streetline2))  
	{
		$question = "Street 2:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$streetline2);
		$pdf->Ln();
	}
	if (isset($homecity))  
	{
		$question = "City:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$homecity);
		$pdf->Ln();
	}
	if (isset($homestate))  
	{
		$question = "State:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$homestate);
		$pdf->Ln();
	}
	if (isset($zipcode)) 
	{
		$question = "Zipcode:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$zipcode);
		$pdf->Ln();
	}


$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$filename2 = "$LastName, " .  "$FirstName" . " - QnA - $uniqueid"; 
$ext = ".pdf";

$pdf->Output("/inetpub/wwwroot/$filename2$ext","F"); //pushes file to server for temp storage


?>

<?PHP

$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$dir1 = "$dir0" . "$filename";
$dir2 = "$dir1" . '/Retainer/Original/';
$dir3 = "$dir1" . '/Questions/Online/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

ftp_mkdir($conn_id, $dir2);

ftp_chdir($conn_id, $dir2);
ftp_put($conn_id, $file, $file, FTP_BINARY);
ftp_close($conn_id);
unlink($file); //delete temp copy pdf stored on server

$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_mkdir($conn_id, $dir3);
ftp_chdir($conn_id, $dir3);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); //delete temp copy pdf stored on server
?>
<?PHP 
if (isset($uniqueid))
	{	
		$query = "IF NOT EXISTS(SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO status (uniqueid,notelog,email,phone1,phone2,currentstatus,currentstatusdate,brandid,tenantid,date,time,brand,completedonline,onlinecompleteday,onlinecompleteweek,onlinecompletemonth,onlinecompletetime,FirstName,LastName,Street1,Street2,City,State,Zipcode,interviewstarted,reachedretainerdiscussion,interviewstartmonthyear,interviewstartday,interviewcompletemonthyear,interviewcompleteday,interviewstarttime,interviewcompletetime,interviewstartweek,interviewcompleteweek) VALUES ('$uniqueid','$date @ $time : <strong>Retainer passed to docusign</strong><br>$date @ $time : <strong>Shortform Complete</strong><br>','$email','$callbacknum','$secondarynumber','Shortform Complete','$date','$brandid','$tenantid','$date','$time','$brand','Yes','$date','$week','$month','$time','$whofirstname','$wholastname','$streetline1','$streetline2','$homecity','$homestate','$zipcode','Yes','Yes','$month','$date','$month','$date','$time','$time','$week','$week')";
		$results = sqlsrv_query($conn,$query);
	
		$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday=$date,interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
		$results = sqlsrv_query($conn,$query);
			
}
?>

<?php
#define('FPDF_FONTPATH', 'font/');

#$pdf=new PDF_Code39();
#$pdf->Output();
?>
<?php
?><br />

<?php 
#include_once 'include/session.php'; // initializes session and provides
#include_once 'api/APIService.php';
#include 'include/utils.php';
//changed includes to requires )->ian
require ("include/ianSession.php"); // initializes session and provides
//ian)->added these two additional includes
#require ("include/account_creds.php");
require ("api/ianCredential.php");

require ("api/APIService.php");
require ("include/utils.php");

//ian)->embedd the creds here
        #$_SESSION["UserID"] = "dbc1a2b2-088b-4825-a489-c71503e498cf";
		$_SESSION["UserID"] = "ihutchings@preferredlegalsupport.com";
		$_SESSION["AccountID"] = "c468460b-4d8f-4fd6-980c-0974de9c815a";
        $_SESSION["Password"] = "siec9oanoapoeqiA";
        $_SESSION["IntegratorsKey"] = "PREF-7a494820-fcfd-4a5a-88dd-90402a914ce9";
//========================================================================
// globals
//========================================================================
$_oneSigner = true; // Do we want One Signer (=true) or Two (=false)
$_showTwoSignerMessage = false; // Display (or not display) a message before Signer One has signed (only for Two Signer mode)
$_showTransitionMessage = false; // Display (or not display) a message after Signer One has signed (only for Two Signer mode)

//========================================================================
// Functions
//========================================================================

/**
 * Creates an embedded signing experience.
 */
#$chewonthis = 'Retainerstmp/'."$filename"."$ext";
$chewypdf = './Retainerstmp/'."$filename".'.pdf';
$pdfname = "$filename";
$chewonthis = "PDFBytes = file_get_contents($chewypdf)";
#Hutchings, Ian - 3MTW5G27HVB6U89S4.pdf
function createAndSend($pdffilename,$subject,$name,$uniqueid,$brandid,$brand,$tenantid) {
    global $_oneSigner;
    $status = "";
    
    // Construct basic envelope
    $env = new Envelope();
    $env->Subject = $subject;
	#$env->Subject = "Pickles";
    $env->EmailBlurb = "This envelope demonstrates embedded signing";
    $env->AccountId = $_SESSION['AccountID'];
    
    $env->Recipients = constructRecipients($_oneSigner);
    
    $doc = new Document();
    $doc->PDFBytes = file_get_contents($pdffilename);
    #$doc->PDFBytes = file_get_contents("Retainerstmp/Hutchings, Ian - 3MTW5G27HVB6U89S4.pdf");
    
	$doc->Name = $name;
    #$doc->Name = "Pickles";
	#$doc->PDFBytes = file_get_contents("resources/THERETAINER.pdf");
    #$doc->Name = $_POST['RecipientName'];
    $doc->ID = "1";
    $doc->FileExtension = "pdf";
    $env->Documents = array($doc);
    
    $env->Tabs = addTabs(count($env->Recipients));
    
    $api = getAPI();
    try {
        $csParams = new CreateAndSendEnvelope();
        $csParams->Envelope = $env;
        $status = $api->CreateAndSendEnvelope($csParams)->CreateAndSendEnvelopeResult;
        addEnvelopeID($status->EnvelopeID);
        getToken($status, 1, $uniqueid, $brandid, $brand, $tenantid);
    } catch (SoapFault $e) {
        $_SESSION['errorMessage'] = $e;
        header("Location: error.php");
    }
}

/**
 * Construct recipients
 * 
 * @param boolean $oneSigner
 * 	true - create one recipient
 * 	false = create two recipient
 * 
 * @return Recipient[]
 */


function constructRecipients() {
    $recipients = array();
    
    $count = count($_POST['1WhoFirstName']);
    for ($i = 1; $i <= $count; $i++) {
    	
    		// Must contain all POST parameters
    		if(empty($_POST['1WhoFirstName']) ||
    			 empty($_POST['3Email'])){
    			 	continue;
    		}
    	
        $r1 = new Recipient();
        
        $r1->UserName = $_POST['1WhoFirstName']. ' ' .$_POST['1WhoLastName'];
        $r1->Email = $_POST['3Email'];
        $r1->RequireIDLookup = false;
        $r1->ID = 1;
        $r1->Type = RecipientTypeCode::Signer;
        $r1->RoutingOrder = 1;
//commented out for demo, no auto pop the retainer for docusign sig        
        if(!isset($_POST['RecipientInviteToggle'][1])){
        	$r1->CaptiveInfo = new RecipientCaptiveInfo();
        	$r1->CaptiveInfo->ClientUserId = 1;
        }
        
        array_push($recipients, $r1);
		
        $r2 = new Recipient();
        
        $r2->UserName = $_POST['RecipientName2'];
        $r2->Email = $_POST['RecipientEmail2'];
        $r2->RequireIDLookup = false;
        $r2->ID = 2;
        $r2->Type = RecipientTypeCode::Signer;
        $r2->RoutingOrder = 2;
        
		//ian)-> comment next three lines to set 2nd recipient to recieve email when recipient 1 is done signing
#        if(!isset($_POST['RecipientInviteToggle'][$i])){
#        	$r1->CaptiveInfo = new RecipientCaptiveInfo();
#        	$r1->CaptiveInfo->ClientUserId = $i;
#       }
        
        array_push($recipients, $r2);

    }
    
    if(empty($recipients)){
	    $_SESSION['errorMessage'] = "You must include at least 1 Recipient";
	    header("Location: error.php");
	    exit;
    }
    
    return $recipients;
}


function addTabs($count) {
    $tabs[] = new Tab();
    
//first page initials at bottom right
    $init1 = new Tab();
    $init1->Type = TabTypeCode::InitialHere;
    $init1->DocumentID = "1";
    $init1->PageNumber = "1";
    $init1->RecipientID = "1";
    $init1->XPosition = "530";
    $init1->YPosition = "773";
    array_push($tabs, $init1);
    
    $sign1 = new Tab();
    $sign1->Type = TabTypeCode::SignHere;
    $sign1->DocumentID = "1";
    $sign1->PageNumber = "2";
    $sign1->RecipientID = "1";
    $sign1->XPosition = "40";
    $sign1->YPosition = "656";
    array_push($tabs, $sign1);
        
    $fullAnchor = new Tab();
    $fullAnchor->Type = TabTypeCode::FullName;
    $anchor = new AnchorTab();
    $anchor->AnchorTabString = "Client Name (printed)";
    $anchor->XOffset = -123;
    $anchor->YOffset = 31;
    $anchor->Unit = UnitTypeCode::Pixels;
    $anchor->IgnoreIfNotPresent = true;
    $fullAnchor->AnchorTabItem = $anchor;
    $fullAnchor->DocumentID = "1";
    $fullAnchor->PageNumber = "2";
    $fullAnchor->RecipientID = "1";
    array_push($tabs, $fullAnchor);
        
    $date1 = new Tab();
    $date1->Type = TabTypeCode::DateSigned;
    $date1->DocumentID = "1";
    $date1->PageNumber = "2";
    $date1->RecipientID = "1";
    $date1->XPosition = "170";
    $date1->YPosition = "690";
    array_push($tabs, $date1);
    
//page 2 initials        
    $init2 = new Tab();
    $init2->Type = TabTypeCode::InitialHere;
    $init2->DocumentID = "1";
    $init2->PageNumber = "2";
    $init2->RecipientID = "1";
    $init2->XPosition = "530";
    $init2->YPosition = "773";
    array_push($tabs, $init2);
    
	$sign2 = new Tab();
    $sign2->Type = TabTypeCode::SignHere;
    $sign2->DocumentID = "1";
    $sign2->PageNumber = "3";
    $sign2->RecipientID = "1";
    $sign2->XPosition = "60";
    $sign2->YPosition = "328";
    array_push($tabs, $sign2);
    
	$date2 = new Tab();
    $date2->Type = TabTypeCode::DateSigned;
    $date2->DocumentID = "1";
    $date2->PageNumber = "3";
    $date2->RecipientID = "1";
    $date2->XPosition = "300";
    $date2->YPosition = "365";
    array_push($tabs, $date2);
   
//page 3 initials	
	$init3 = new Tab();
    $init3->Type = TabTypeCode::InitialHere;
    $init3->DocumentID = "1";
    $init3->PageNumber = "3";
    $init3->RecipientID = "1";
    $init3->XPosition = "530";
    $init3->YPosition = "773";
    array_push($tabs, $init3);
        
    if ($count > 1) {
        $sign2 = new Tab();
        $sign2->Type = TabTypeCode::SignHere;
        $sign2->DocumentID = "1";
        $sign2->PageNumber = "2";
        $sign2->RecipientID = "2";
        $sign2->XPosition = "273";
        $sign2->YPosition = "656";
        array_push($tabs, $sign2);

        $date3 = new Tab();
        $date3->Type = TabTypeCode::DateSigned;
        $date3->DocumentID = "1";
        $date3->PageNumber = "2";
        $date3->RecipientID = "2";
        $date3->XPosition = "400";
        $date3->YPosition = "690";
        array_push($tabs, $date3);
    }
        
    
    // eliminate 0th element
    array_shift($tabs);
    
    return $tabs;
}

function getToken($status, $clientID, $uniqueid, $brandid, $brand, $tenantid) {
    global $_oneSigner;
    $token = null;
    $_SESSION['embedToken'];
       
    // get recipient token
    $assertion = new RequestRecipientTokenAuthenticationAssertion();
    $assertion->AssertionID = guid();
    $assertion->AuthenticationInstant = todayXsdDate();
    $assertion->AuthenticationMethod = RequestRecipientTokenAuthenticationAssertionAuthenticationMethod::Password;
    $assertion->SecurityDomain = "DocuSign2011Q1Sample";
    
    // Get Recipient fro ClientID
    $recipient = false;
		foreach($status->RecipientStatuses->RecipientStatus as $rs){
			if($rs->ClientUserId == $clientID){
    		$recipient = $rs;
    	}
    }
    
    if($recipient == false){
	    $_SESSION['errorMessage'] = "Unable to find Recipient";
	    header("Location: error.php");
    }
    
    $urls = new RequestRecipientTokenClientURLs();
    $urlbase = getCallbackURL("pop.html") . "?source=Embedded";
    
    $urls->OnAccessCodeFailed = $urlbase . "&event=AccessCodeFailed&uname=" . $recipient->UserName;
    $urls->OnCancel = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnDecline = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnException = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnFaxPending = 'http://sql.initiativelegal.com:35535/_test/thanks.php?uniqueid=' . "$uniqueid" . '&brandid=' . "$brandid" . '&brand=' . "$brand" . '&tenantid=' . "$tenantid" . '&statuslevel=Faxpending';
    $urls->OnIdCheckFailed = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnSessionTimeout = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnTTLExpired = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnViewingComplete = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    if ($_oneSigner) {
        $urls->OnSigningComplete = 'http://sql.initiativelegal.com:35535/_test/thanks.php?uniqueid=' . "$uniqueid" . '&brandid=' . "$brandid" . '&brand=' . "$brand" . '&tenantid=' . "$tenantid" . '&statuslevel=Signed';
    }
    else {
        $urls->OnSigningComplete = 'http://sql.initiativelegal.com:35535/_test/thanks.php?uniqueid=' . "$uniqueid" . '&brandid=' . "$brandid" . '&brand=' . "$brand" . '&tenantid=' . "$tenantid" . '&statuslevel=Signed';
    }
    
    $api = getAPI();
    $rrtParams = new RequestRecipientToken();
    $rrtParams->AuthenticationAssertion = $assertion;
    $rrtParams->ClientURLs = $urls;
    $rrtParams->ClientUserID = $recipient->ClientUserId;
    $rrtParams->Email = $recipient->Email;
    $rrtParams->EnvelopeID = $status->EnvelopeID;
    $rrtParams->Username = $recipient->UserName;
    
    try {
        $token = $api->RequestRecipientToken($rrtParams)->RequestRecipientTokenResult;
    } catch (SoapFault $e) {
        $_SESSION['errorMessage'] = $e;
        header("Location: error.php");
    }
    
     $_SESSION["embedToken"] = $token;
}

function getStatus($envelopeID) {
    $status = null;
    
    $api = getAPI();
    
    $rsParams = new RequestStatus();
    $rsParams->EnvelopeID = $envelopeID;
    
    try {
        $status = $api->RequestStatus($rsParams)->RequestStatusResult;
    } catch (SoapFault $e) {
        $_SESSION['errorMessage'] = $e;
        header("Location: error.php");
    }
    
    return $status;
}

//========================================================================
// Main
//========================================================================

loginCheck();

	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_oneSigner = isset($_POST['OneSigner']);
	$_oneSigner = isset($_REQUEST['OneSigner']);
    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid);
		if(!$_oneSigner){
			$_showTwoSignerMessage = true;
		}
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['envelopeID'])) {
    		// Display a message that we are moving on to Signer Number 2
    		// - unless the message is suppressed (by signing from the GetStatusAndDocs page)
    		if(isset($_GET['from_gsad'])){
    			getToken(getStatus($_GET['envelopeID']),$_GET['clientID'], $uniqueid, $brandid, $brand, $tenantid);
    		} else {
    			$_showTransitionMessage = true;
        	getToken(getStatus($_GET['envelopeID']), 2, $uniqueid, $brandid, $brand, $tenantid);
        }
    } else {
        $_SESSION['embedToken'] = "";
    }
}
?>

<!DOCTYPE html">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/homestyle.css" />
        <link rel="stylesheet" href="css/jquery.ui.all.css" />
        <script type="text/javascript" src="js/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="js/Utils.js"></script>      
    </head>
<body>
    	
<div class="container">
	    		<?php
	    			// Display the Two Signer Message (if Two Signer Mode)
	    			if($_showTwoSignerMessage)
						{
	    				#echo "<div class='sampleMessage'>Have the first signer fill out the Envelope (only a signature is required for the first signer)</div>";
	    				}
				?>
	    		<?php
	    			// Display the Transition Message (if required, in Two Signer Mode)
	    			if($_showTransitionMessage)
					{
						echo "<div class='sampleMessage'>The first signer has completed the Envelope. Now the second signer will be asked to fill out details in the Envelope.</div>";
	    			}
	    		?>
	    				
	    		<?PHP
//ian)->
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//ian)-> This is where the PDF to sign is actually presented to the end user after you build it above
 
	    			// Display the iFrame (if is needed)
	    			if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken'])){
						
//ian)-> get hyperlink for iframe, maybe pipe this to the database?
						
#echo "<a href='";
#echo $_SESSION['embedToken'] . "&id='hostiframe'>IAN CLICK THIS</a>";
						
						//ian)-> paint the actual iframe took out this tag class='embediframe' 
						
						
						echo "<iframe marginheight='5%' width='94%' height='94%' src='";
echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe'></iframe>";
                        }
	    		?>

</div>
    </body>
</html>


