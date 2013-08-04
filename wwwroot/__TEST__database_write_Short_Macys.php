<?php
  require_once('recaptchalib.php');
  $privatekey = "6LeVHs4SAAAAAByblbL0zRz0b70JPwooyi-G-fxx";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
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
		$query = "IF NOT EXISTS(SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO status (uniqueid,email,currentstatus,currentstatusdate,brandid,tenantid,date,time,brand,completedonline,onlinecompleteday,onlinecompleteweek,onlinecompletemonth,onlinecompletetime,FirstName,LastName,Street1,Street2,City,State,Zipcode,interviewstarted,reachedretainerdiscussion,interviewstartmonthyear,interviewstartday,interviewcompletemonthyear,interviewcompleteday,interviewstarttime,interviewcompletetime,interviewstartweek,interviewcompleteweek) VALUES ('$uniqueid','$email','Shortform Complete','$date','$brandid','$tenantid','$date','$time','$brand','Yes','$date','$week','$month','$time','$whofirstname','$wholastname','$streetline1','$streetline2','$homecity','$homestate','$zipcode','Yes','Yes','$month','$date','$month','$date','$time','$time','$week','$week')";
		$results = sqlsrv_query($conn,$query);
	
		$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday=$date,interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
		$results = sqlsrv_query($conn,$query);
			
}
//session.php bellow:
?>
<?php
session_name("DocuSign2011Q1Sample");
session_start();

function isLoggedIn(){
    $retval = false;
    if (isset($_SESSION["LoggedIn"]) && ($_SESSION["LoggedIn"] === true )){
        $retval = false;
    }
    return $retval;
}

function loginCheck(){
    if (!isset($_SESSION["LoggedIn"]) || ($_SESSION["LoggedIn"] <> true )){
        header("Location: index.php");
    }
}

function checkSessionValue($key, $val){
    $retval = false;
    if((isset($_SESSION[$key])) && ($_SESSION[$key]==$val)){
        $retval = true;
    }
    return $retval;
}

function xmlpp($xml, $html_output=false) {
    $level = 4;
    $indent = 0; // current indentation level
    $pretty = array();
    $retval = "";
    try {
        $xml_obj = new SimpleXMLElement($xml);
        // get an array containing each XML element
        $xml = explode("\n", preg_replace('/>\s*</', ">\n<", $xml_obj->asXML()));

        // shift off opening XML tag if present
        if (count($xml) && preg_match('/^<\?\s*xml/', $xml[0])) {
            $pretty[] = array_shift($xml);
        }

        foreach ($xml as $el) {
            if (preg_match('/^<([\w])+[^>\/]*>$/U', $el)) {
                // opening tag, increase indent
                $pretty[] = str_repeat(' ', $indent) . $el;
                $indent += $level;
            } else {
                if (preg_match('/^<\/.+>$/', $el)) {
                    $indent -= $level;  // closing tag, decrease indent
                }
                if ($indent < 0) {
                    $indent += $level;
                }
                $pretty[] = str_repeat(' ', $indent) . $el;
            }
        }
        $xml = implode("\n", $pretty);
        $retval = ($html_output) ? htmlentities($xml) : $xml;
    } catch(Exception $excp){

    }
    return $retval;
}


function addToLog($desc, $msg){
    $d =  date('d/m/Y H:i:s');
    if(!isset($_SESSION["traceLog"])){
        $_SESSION["traceLog"] = array();
        $_SESSION["traceLog"][] = "Log Started - " . $d . "<br/>";
    }
    if(count($_SESSION["traceLog"]) > 10 ){
        array_shift($_SESSION["traceLog"]);
    }
    $_SESSION["traceLog"][] = "[".$_SERVER['REMOTE_ADDR']."] - ".$d.": ".$desc ."<br/>" . $msg . "<br/>";

}
?>
<?PHP // pasted api APISERVICE bellow:
?>
<?php 
/** 
 * soap-wsa.php 
 * 
 * Copyright (c) 2007, Robert Richards <rrichards@ctindustries.net>. 
 * All rights reserved. 
 * 
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions 
 * are met: 
 * 
 *   * Redistributions of source code must retain the above copyright 
 *     notice, this list of conditions and the following disclaimer. 
 * 
 *   * Redistributions in binary form must reproduce the above copyright 
 *     notice, this list of conditions and the following disclaimer in 
 *     the documentation and/or other materials provided with the 
 *     distribution. 
 * 
 *   * Neither the name of Robert Richards nor the names of his 
 *     contributors may be used to endorse or promote products derived 
 *     from this software without specific prior written permission. 
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS 
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT 
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS 
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE 
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT 
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN 
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
 * POSSIBILITY OF SUCH DAMAGE. 
 * 
 * @author     Robert Richards <rrichards@ctindustries.net> 
 * @copyright  2007 Robert Richards <rrichards@ctindustries.net> 
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License 
 * @version    1.0.0 
 */ 

class WSASoap { 
    const WSANS = 'http://schemas.xmlsoap.org/ws/2004/08/addressing'; 
    const WSAPFX = 'wsa'; 
    private $soapNS, $soapPFX; 
    private $soapDoc = NULL; 
    private $envelope = NULL; 
    private $SOAPXPath = NULL; 
    private $header = NULL; 
    private $messageID = NULL; 
     
    private function locateHeader() { 
        if ($this->header == NULL) { 
            $headers = $this->SOAPXPath->query('//wssoap:Envelope/wssoap:Header'); 
            $header = $headers->item(0); 
            if (! $header) { 
                $header = $this->soapDoc->createElementNS($this->soapNS, $this->soapPFX.':Header'); 
                $this->envelope->insertBefore($header, $this->envelope->firstChild); 
            } 
            $this->header = $header; 
        } 
        return $this->header; 
    } 

    public function __construct($doc) { 
        $this->soapDoc = $doc; 
        $this->envelope = $doc->documentElement; 
        $this->soapNS = $this->envelope->namespaceURI; 
        $this->soapPFX = $this->envelope->prefix; 
        $this->SOAPXPath = new DOMXPath($doc); 
        $this->SOAPXPath->registerNamespace('wssoap', $this->soapNS); 
        $this->SOAPXPath->registerNamespace('wswsa', WSASoap::WSANS); 
         
        $this->envelope->setAttributeNS("http://www.w3.org/2000/xmlns/", 'xmlns:'.WSASoap::WSAPFX, WSASoap::WSANS); 
        $this->locateHeader(); 
    } 

    public function addAction($action) { 
        /* Add the WSA Action */ 
        $header = $this->locateHeader(); 

        $nodeAction = $this->soapDoc->createElementNS(WSASoap::WSANS, WSASoap::WSAPFX.':Action', $action); 
        $header->appendChild($nodeAction); 
    } 

    public function addTo($location) { 
        /* Add the WSA To */ 
        $header = $this->locateHeader(); 

        $nodeTo = $this->soapDoc->createElementNS(WSASoap::WSANS, WSASoap::WSAPFX.':To', $location); 
        $header->appendChild($nodeTo); 
    } 

    private function createID() { 
        $uuid = md5(uniqid(rand(), true)); 
        $guid =  'uudi:'.substr($uuid,0,8)."-". 
                substr($uuid,8,4)."-". 
                substr($uuid,12,4)."-". 
                substr($uuid,16,4)."-". 
                substr($uuid,20,12); 
        return $guid; 
    } 

    public function addMessageID($id=NULL) { 
        /* Add the WSA MessageID or return existing ID */ 
        if (! is_null($this->messageID)) { 
            return $this->messageID; 
        } 

        if (empty($id)) { 
            $id = $this->createID(); 
        } 

        $header = $this->locateHeader(); 

        $nodeID = $this->soapDoc->createElementNS(WSASoap::WSANS, WSASoap::WSAPFX.':MessageID', $id); 
        $header->appendChild($nodeID); 
        $this->messageID = $id; 
    } 

    public function addReplyTo($address = NULL) { 
            /* Create Message ID is not already added - required for ReplyTo */ 
            if (is_null($this->messageID)) { 
                $this->addMessageID(); 
            } 
            /* Add the WSA ReplyTo */ 
            $header = $this->locateHeader(); 
     
            $nodeReply = $this->soapDoc->createElementNS(WSASoap::WSANS, WSASoap::WSAPFX.':ReplyTo'); 
            $header->appendChild($nodeReply); 
             
            if (empty($address)) { 
                $address = 'http://schemas.xmlsoap.org/ws/2004/08/addressing/role/anonymous'; 
            } 
            $nodeAddress = $this->soapDoc->createElementNS(WSASoap::WSANS, WSASoap::WSAPFX.':Address', $address); 
            $nodeReply->appendChild($nodeAddress); 
    } 

    public function getDoc() { 
        return $this->soapDoc; 
    } 
     
    public function saveXML() { 
        return $this->soapDoc->saveXML(); 
    } 

    public function save($file) { 
        return $this->soapDoc->save($file); 
    } 
} 

?>
<?php
/**
 * xmlseclibs.php
 *
 * Copyright (c) 2007, Robert Richards <rrichards@cdatazone.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Robert Richards nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @author     Robert Richards <rrichards@cdatazone.org>
 * @copyright  2007 Robert Richards <rrichards@cdatazone.org>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    1.2.1
 */

/*
Functions to generate simple cases of Exclusive Canonical XML - Callable function is C14NGeneral()
i.e.: $canonical = C14NGeneral($domelement, TRUE);
*/

/* helper function */
function sortAndAddAttrs($element, $arAtts) {
   $newAtts = array();
   foreach ($arAtts AS $attnode) {
      $newAtts[$attnode->nodeName] = $attnode;
   }
   ksort($newAtts);
   foreach ($newAtts as $attnode) {
      $element->setAttribute($attnode->nodeName, $attnode->nodeValue);
   }
}

/* helper function */
function canonical($tree, $element, $withcomments) {
    if ($tree->nodeType != XML_DOCUMENT_NODE) {
        $dom = $tree->ownerDocument;
    } else {
        $dom = $tree;
    }
    if ($element->nodeType != XML_ELEMENT_NODE) {
        if ($element->nodeType == XML_DOCUMENT_NODE) {
            foreach ($element->childNodes AS $node) {
                canonical($dom, $node, $withcomments);
            }
            return;
        }
        if ($element->nodeType == XML_COMMENT_NODE && ! $withcomments) {
            return;
        }
        $tree->appendChild($dom->importNode($element, TRUE));
        return;
    }
    $arNS = array();
    if ($element->namespaceURI != "") {
        if ($element->prefix == "") {
            $elCopy = $dom->createElementNS($element->namespaceURI, $element->nodeName);
        } else {
            $prefix = $tree->lookupPrefix($element->namespaceURI);
            if ($prefix == $element->prefix) {
                $elCopy = $dom->createElementNS($element->namespaceURI, $element->nodeName);
            } else {
                $elCopy = $dom->createElement($element->nodeName);
                $arNS[$element->namespaceURI] = $element->prefix;
            }
        }
    } else {
        $elCopy = $dom->createElement($element->nodeName);
    }
    $tree->appendChild($elCopy);

    /* Create DOMXPath based on original document */
    $xPath = new DOMXPath($element->ownerDocument);

    /* Get namespaced attributes */
    $arAtts = $xPath->query('attribute::*[namespace-uri(.) != ""]', $element);

    /* Create an array with namespace URIs as keys, and sort them */
    foreach ($arAtts AS $attnode) {
        if (array_key_exists($attnode->namespaceURI, $arNS) &&
            ($arNS[$attnode->namespaceURI] == $attnode->prefix)) {
            continue;
        }
        $prefix = $tree->lookupPrefix($attnode->namespaceURI);
        if ($prefix != $attnode->prefix) {
           $arNS[$attnode->namespaceURI] = $attnode->prefix;
        } else {
            $arNS[$attnode->namespaceURI] = NULL;
        }
    }
    if (count($arNS) > 0) {
        asort($arNS);
    }

    /* Add namespace nodes */
    foreach ($arNS AS $namespaceURI=>$prefix) {
        if ($prefix != NULL) {
              $elCopy->setAttributeNS("http://www.w3.org/2000/xmlns/",
                               "xmlns:".$prefix, $namespaceURI);
        }
    }
    if (count($arNS) > 0) {
        ksort($arNS);
    }

    /* Get attributes not in a namespace, and then sort and add them */
    $arAtts = $xPath->query('attribute::*[namespace-uri(.) = ""]', $element);
    sortAndAddAttrs($elCopy, $arAtts);

    /* Loop through the URIs, and then sort and add attributes within that namespace */
    foreach ($arNS as $nsURI=>$prefix) {
       $arAtts = $xPath->query('attribute::*[namespace-uri(.) = "'.$nsURI.'"]', $element);
       sortAndAddAttrs($elCopy, $arAtts);
    }

    foreach ($element->childNodes AS $node) {
        canonical($elCopy, $node, $withcomments);
    }
}

/*
$element - DOMElement for which to produce the canonical version of
$exclusive - boolean to indicate exclusive canonicalization (must pass TRUE)
$withcomments - boolean indicating wether or not to include comments in canonicalized form
*/
function C14NGeneral($element, $exclusive=FALSE, $withcomments=FALSE) {
    /* IF PHP 5.2+ then use built in canonical functionality */
    $php_version = explode('.', PHP_VERSION);
    if (($php_version[0] > 5) || ($php_version[0] == 5 && $php_version[1] >= 2) ) {
        return $element->C14N($exclusive, $withcomments);
    }

    /* Must be element or document */
    if (! $element instanceof DOMElement && ! $element instanceof DOMDocument) {
        return NULL;
    }
    /* Currently only exclusive XML is supported */
    if ($exclusive == FALSE) {
        throw new Exception("Only exclusive canonicalization is supported in this version of PHP");
    }

    $copyDoc = new DOMDocument();
    canonical($copyDoc, $element, $withcomments);
    return $copyDoc->saveXML($copyDoc->documentElement, LIBXML_NOEMPTYTAG);
}

class XMLSecurityKey {
    const TRIPLEDES_CBC = 'http://www.w3.org/2001/04/xmlenc#tripledes-cbc';
    const AES128_CBC = 'http://www.w3.org/2001/04/xmlenc#aes128-cbc';
    const AES192_CBC = 'http://www.w3.org/2001/04/xmlenc#aes192-cbc';
    const AES256_CBC = 'http://www.w3.org/2001/04/xmlenc#aes256-cbc';
    const RSA_1_5 = 'http://www.w3.org/2001/04/xmlenc#rsa-1_5';
    const RSA_OAEP_MGF1P = 'http://www.w3.org/2001/04/xmlenc#rsa-oaep-mgf1p';
    const RSA_SHA1 = 'http://www.w3.org/2000/09/xmldsig#rsa-sha1';
    const DSA_SHA1 = 'http://www.w3.org/2000/09/xmldsig#dsa-sha1';

    private $cryptParams = array();
    public $type = 0;
    public $key = NULL;
    public $passphrase = "";
    public $iv = NULL;
    public $name = NULL;
    public $keyChain = NULL;
    public $isEncrypted = FALSE;
    public $encryptedCtx = NULL;
    public $guid = NULL;

    /**
     * This variable contains the certificate as a string if this key represents an X509-certificate.
     * If this key doesn't represent a certificate, this will be NULL.
     */
    private $x509Certificate = NULL;

    public function __construct($type, $params=NULL) {
        srand();
        switch ($type) {
            case (XMLSecurityKey::TRIPLEDES_CBC):
                $this->cryptParams['library'] = 'mcrypt';
                $this->cryptParams['cipher'] = MCRYPT_TRIPLEDES;
                $this->cryptParams['mode'] = MCRYPT_MODE_CBC;
                $this->cryptParams['method'] = 'http://www.w3.org/2001/04/xmlenc#tripledes-cbc';
                break;
            case (XMLSecurityKey::AES128_CBC):
                $this->cryptParams['library'] = 'mcrypt';
                $this->cryptParams['cipher'] = MCRYPT_RIJNDAEL_128;
                $this->cryptParams['mode'] = MCRYPT_MODE_CBC;
                $this->cryptParams['method'] = 'http://www.w3.org/2001/04/xmlenc#aes128-cbc';
                break;
            case (XMLSecurityKey::AES192_CBC):
                $this->cryptParams['library'] = 'mcrypt';
                $this->cryptParams['cipher'] = MCRYPT_RIJNDAEL_128;
                $this->cryptParams['mode'] = MCRYPT_MODE_CBC;
                $this->cryptParams['method'] = 'http://www.w3.org/2001/04/xmlenc#aes192-cbc';
                break;
            case (XMLSecurityKey::AES256_CBC):
                $this->cryptParams['library'] = 'mcrypt';
                $this->cryptParams['cipher'] = MCRYPT_RIJNDAEL_128;
                $this->cryptParams['mode'] = MCRYPT_MODE_CBC;
                $this->cryptParams['method'] = 'http://www.w3.org/2001/04/xmlenc#aes256-cbc';
                break;
            case (XMLSecurityKey::RSA_1_5):
                $this->cryptParams['library'] = 'openssl';
                $this->cryptParams['padding'] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams['method'] = 'http://www.w3.org/2001/04/xmlenc#rsa-1_5';
                if (is_array($params) && ! empty($params['type'])) {
                    if ($params['type'] == 'public' || $params['type'] == 'private') {
                        $this->cryptParams['type'] = $params['type'];
                        break;
                    }
                }
                throw new Exception('Certificate "type" (private/public) must be passed via parameters');
                return;
            case (XMLSecurityKey::RSA_OAEP_MGF1P):
                $this->cryptParams['library'] = 'openssl';
                $this->cryptParams['padding'] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams['method'] = 'http://www.w3.org/2001/04/xmlenc#rsa-oaep-mgf1p';
                $this->cryptParams['hash'] = NULL;
                if (is_array($params) && ! empty($params['type'])) {
                    if ($params['type'] == 'public' || $params['type'] == 'private') {
                        $this->cryptParams['type'] = $params['type'];
                        break;
                    }
                }
                throw new Exception('Certificate "type" (private/public) must be passed via parameters');
                return;
            case (XMLSecurityKey::RSA_SHA1):
                $this->cryptParams['library'] = 'openssl';
                $this->cryptParams['method'] = 'http://www.w3.org/2000/09/xmldsig#rsa-sha1';
                $this->cryptParams['padding'] = OPENSSL_PKCS1_PADDING;
                if (is_array($params) && ! empty($params['type'])) {
                    if ($params['type'] == 'public' || $params['type'] == 'private') {
                        $this->cryptParams['type'] = $params['type'];
                        break;
                    }
                }
                throw new Exception('Certificate "type" (private/public) must be passed via parameters');
                break;
            default:
                throw new Exception('Invalid Key Type');
                return;
        }
        $this->type = $type;
    }

    public function generateSessionKey() {
        $key = '';
        if (! empty($this->cryptParams['cipher']) && ! empty($this->cryptParams['mode'])) {
            $keysize = mcrypt_module_get_algo_key_size($this->cryptParams['cipher']);
            /* Generating random key using iv generation routines */
            if (($keysize > 0) && ($td = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '',$this->cryptParams['mode'], ''))) {
                if ($this->cryptParams['cipher'] == MCRYPT_RIJNDAEL_128) {
                    $keysize = 16;
                    if ($this->type == XMLSecurityKey::AES256_CBC) {
                        $keysize = 32;
                    } elseif ($this->type == XMLSecurityKey::AES192_CBC) {
                        $keysize = 24;
                    }
                }
                while (strlen($key) < $keysize) {
                    $key .= mcrypt_create_iv(mcrypt_enc_get_iv_size ($td),MCRYPT_RAND);
                }
                mcrypt_module_close($td);
                $key = substr($key, 0, $keysize);
                $this->key = $key;
            }
        }
        return $key;
    }

    public function loadKey($key, $isFile=FALSE, $isCert = FALSE) {
        if ($isFile) {
            $this->key = file_get_contents($key);
        } else {
            $this->key = $key;
        }
        if ($isCert) {
            $this->key = openssl_x509_read($this->key);
            openssl_x509_export($this->key, $str_cert);
            $this->x509Certificate = $str_cert;
            $this->key = $str_cert;
        } else {
            $this->x509Certificate = NULL;
        }
        if ($this->cryptParams['library'] == 'openssl') {
            if ($this->cryptParams['type'] == 'public') {
                $this->key = openssl_get_publickey($this->key);
            } else {
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
            }
        } else if ($this->cryptParams['cipher'] == MCRYPT_RIJNDAEL_128) {
            /* Check key length */
            switch ($this->type) {
                case (XMLSecurityKey::AES256_CBC):
                    if (strlen($this->key) < 25) {
                        throw new Exception('Key must contain at least 25 characters for this cipher');
                    }
                    break;
                case (XMLSecurityKey::AES192_CBC):
                    if (strlen($this->key) < 17) {
                        throw new Exception('Key must contain at least 17 characters for this cipher');
                    }
                    break;
            }
        }
    }

    private function encryptMcrypt($data) {
        $td = mcrypt_module_open($this->cryptParams['cipher'], '', $this->cryptParams['mode'], '');
        $this->iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $this->key, $this->iv);
        if ($this->cryptParams['mode'] == MCRYPT_MODE_CBC) {
            $bs = mcrypt_enc_get_block_size($td);
            for ($datalen0=$datalen=strlen($data); (($datalen%$bs)!=($bs-1)); $datalen++)
                $data.=chr(rand(1, 127));
            $data.=chr($datalen-$datalen0+1);
        }
        $encrypted_data = $this->iv.mcrypt_generic($td, $data);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $encrypted_data;
    }

    private function decryptMcrypt($data) {
        $td = mcrypt_module_open($this->cryptParams['cipher'], '', $this->cryptParams['mode'], '');
        $iv_length = mcrypt_enc_get_iv_size($td);

        $this->iv = substr($data, 0, $iv_length);
        $data = substr($data, $iv_length);

        mcrypt_generic_init($td, $this->key, $this->iv);
        $decrypted_data = mdecrypt_generic($td, $data);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        if ($this->cryptParams['mode'] == MCRYPT_MODE_CBC) {
            $dataLen = strlen($decrypted_data);
            $paddingLength = substr($decrypted_data, $dataLen - 1, 1);
            $decrypted_data = substr($decrypted_data, 0, $dataLen - ord($paddingLength));
        }
        return $decrypted_data;
    }

    private function encryptOpenSSL($data) {
        if ($this->cryptParams['type'] == 'public') {
            if (! openssl_public_encrypt($data, $encrypted_data, $this->key, $this->cryptParams['padding'])) {
                throw new Exception('Failure encrypting Data');
                return;
            }
        } else {
            if (! openssl_private_encrypt($data, $encrypted_data, $this->key, $this->cryptParams['padding'])) {
                throw new Exception('Failure encrypting Data');
                return;
            }
        }
        return $encrypted_data;
    }

    private function decryptOpenSSL($data) {
        if ($this->cryptParams['type'] == 'public') {
            if (! openssl_public_decrypt($data, $decrypted, $this->key, $this->cryptParams['padding'])) {
                throw new Exception('Failure decrypting Data');
                return;
            }
        } else {
            if (! openssl_private_decrypt($data, $decrypted, $this->key, $this->cryptParams['padding'])) {
                throw new Exception('Failure decrypting Data');
                return;
            }
        }
        return $decrypted;
    }

    private function signOpenSSL($data) {
        if (! openssl_sign ($data, $signature, $this->key)) {
            throw new Exception('Failure Signing Data');
            return;
        }
        return $signature;
    }

    private function verifyOpenSSL($data, $signature) {
        return openssl_verify ($data, $signature, $this->key);
    }

    public function encryptData($data) {
        switch ($this->cryptParams['library']) {
            case 'mcrypt':
                return $this->encryptMcrypt($data);
                break;
            case 'openssl':
                return $this->encryptOpenSSL($data);
                break;
        }
    }

    public function decryptData($data) {
        switch ($this->cryptParams['library']) {
            case 'mcrypt':
                return $this->decryptMcrypt($data);
                break;
            case 'openssl':
                return $this->decryptOpenSSL($data);
                break;
        }
    }

    public function signData($data) {
        switch ($this->cryptParams['library']) {
            case 'openssl':
                return $this->signOpenSSL($data);
                break;
        }
    }

    public function verifySignature($data, $signature) {
        switch ($this->cryptParams['library']) {
            case 'openssl':
                return $this->verifyOpenSSL($data, $signature);
                break;
        }
    }

    public function getAlgorith() {
        return $this->cryptParams['method'];
    }

    static function makeAsnSegment($type, $string) {
        switch ($type){
            case 0x02:
                if (ord($string) > 0x7f)
                    $string = chr(0).$string;
                break;
            case 0x03:
                $string = chr(0).$string;
                break;
        }

        $length = strlen($string);

        if ($length < 128){
           $output = sprintf("%c%c%s", $type, $length, $string);
        } else if ($length < 0x0100){
           $output = sprintf("%c%c%c%s", $type, 0x81, $length, $string);
        } else if ($length < 0x010000) {
           $output = sprintf("%c%c%c%c%s", $type, 0x82, $length/0x0100, $length%0x0100, $string);
        } else {
            $output = NULL;
        }
        return($output);
    }

    /* Modulus and Exponent must already be base64 decoded */
    static function convertRSA($modulus, $exponent) {
        /* make an ASN publicKeyInfo */
        $exponentEncoding = XMLSecurityKey::makeAsnSegment(0x02, $exponent);
        $modulusEncoding = XMLSecurityKey::makeAsnSegment(0x02, $modulus);
        $sequenceEncoding = XMLSecurityKey:: makeAsnSegment(0x30, $modulusEncoding.$exponentEncoding);
        $bitstringEncoding = XMLSecurityKey::makeAsnSegment(0x03, $sequenceEncoding);
        $rsaAlgorithmIdentifier = pack("H*", "300D06092A864886F70D0101010500");
        $publicKeyInfo = XMLSecurityKey::makeAsnSegment (0x30, $rsaAlgorithmIdentifier.$bitstringEncoding);

        /* encode the publicKeyInfo in base64 and add PEM brackets */
        $publicKeyInfoBase64 = base64_encode($publicKeyInfo);
        $encoding = "-----BEGIN PUBLIC KEY-----\n";
        $offset = 0;
        while ($segment=substr($publicKeyInfoBase64, $offset, 64)){
           $encoding = $encoding.$segment."\n";
           $offset += 64;
        }
        return $encoding."-----END PUBLIC KEY-----\n";
    }

    public function serializeKey($parent) {

    }
    


    /**
     * Retrieve the X509 certificate this key represents.
     *
     * Will return the X509 certificate in PEM-format if this key represents
     * an X509 certificate.
     *
     * @return  The X509 certificate or NULL if this key doesn't represent an X509-certificate.
     */
    public function getX509Certificate() {
        return $this->x509Certificate;
    }
    
}

class XMLSecurityDSig {
    const XMLDSIGNS = 'http://www.w3.org/2000/09/xmldsig#';
    const SHA1 = 'http://www.w3.org/2000/09/xmldsig#sha1';
    const SHA256 = 'http://www.w3.org/2001/04/xmlenc#sha256';
    const SHA512 = 'http://www.w3.org/2001/04/xmlenc#sha512';
    const RIPEMD160 = 'http://www.w3.org/2001/04/xmlenc#ripemd160';

    const C14N = 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315';
    const C14N_COMMENTS = 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315#WithComments';
    const EXC_C14N = 'http://www.w3.org/2001/10/xml-exc-c14n#';
    const EXC_C14N_COMMENTS = 'http://www.w3.org/2001/10/xml-exc-c14n#WithComments';

    const template = '<ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#">
  <ds:SignedInfo>
    <ds:SignatureMethod />
  </ds:SignedInfo>
</ds:Signature>';

    public $sigNode = NULL;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = NULL;
    private $xPathCtx = NULL;
    private $canonicalMethod = NULL;
    private $prefix = 'ds';
    private $searchpfx = 'secdsig';

    /* This variable contains an associative array of validated nodes. */
    private $validatedNodes = NULL;

    public function __construct() {
        $sigdoc = new DOMDocument();
        $sigdoc->loadXML(XMLSecurityDSig::template);
        $this->sigNode = $sigdoc->documentElement;
    }

    private function getXPathObj() {
        if (empty($this->xPathCtx) && ! empty($this->sigNode)) {
            $xpath = new DOMXPath($this->sigNode->ownerDocument);
            $xpath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS);
            $this->xPathCtx = $xpath;
        }
        return $this->xPathCtx;
    }

    static function generate_GUID($prefix='pfx') {
        $uuid = md5(uniqid(rand(), true));
        $guid =  $prefix.substr($uuid,0,8)."-".
                substr($uuid,8,4)."-".
                substr($uuid,12,4)."-".
                substr($uuid,16,4)."-".
                substr($uuid,20,12);
        return $guid;
    }

    public function locateSignature($objDoc) {
        if ($objDoc instanceof DOMDocument) {
            $doc = $objDoc;
        } else {
            $doc = $objDoc->ownerDocument;
        }
        if ($doc) {
            $xpath = new DOMXPath($doc);
            $xpath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS);
            $query = ".//secdsig:Signature";
            $nodeset = $xpath->query($query, $objDoc);
            $this->sigNode = $nodeset->item(0);
            return $this->sigNode;
        }
        return NULL;
    }

    public function createNewSignNode($name, $value=NULL) {
        $doc = $this->sigNode->ownerDocument;
        if (! is_null($value)) {
            $node = $doc->createElementNS(XMLSecurityDSig::XMLDSIGNS, $this->prefix.':'.$name, $value);
        } else {
            $node = $doc->createElementNS(XMLSecurityDSig::XMLDSIGNS, $this->prefix.':'.$name);
        }
        return $node;
    }

    public function setCanonicalMethod($method) {
        switch ($method) {
            case 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315':
            case 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315#WithComments':
            case 'http://www.w3.org/2001/10/xml-exc-c14n#':
            case 'http://www.w3.org/2001/10/xml-exc-c14n#WithComments':
                $this->canonicalMethod = $method;
                break;
            default:
                throw new Exception('Invalid Canonical Method');
        }
        if ($xpath = $this->getXPathObj()) {
            $query = './'.$this->searchpfx.':SignedInfo';
            $nodeset = $xpath->query($query, $this->sigNode);
            if ($sinfo = $nodeset->item(0)) {
                $query = './'.$this->searchpfx.'CanonicalizationMethod';
                $nodeset = $xpath->query($query, $sinfo);
                if (! ($canonNode = $nodeset->item(0))) {
                    $canonNode = $this->createNewSignNode('CanonicalizationMethod');
                    $sinfo->insertBefore($canonNode, $sinfo->firstChild);
                }
                $canonNode->setAttribute('Algorithm', $this->canonicalMethod);
            }
        }
    }

    private function canonicalizeData($node, $canonicalmethod, $arXPath=NULL, $prefixList=NULL) {
        $exclusive = FALSE;
        $withComments = FALSE;
        switch ($canonicalmethod) {
            case 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315':
                $exclusive = FALSE;
                $withComments = FALSE;
                break;
            case 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315#WithComments':
                $withComments = TRUE;
                break;
            case 'http://www.w3.org/2001/10/xml-exc-c14n#':
                $exclusive = TRUE;
                break;
            case 'http://www.w3.org/2001/10/xml-exc-c14n#WithComments':
                $exclusive = TRUE;
                $withComments = TRUE;
                break;
        }
/* Support PHP versions < 5.2 not containing C14N methods in DOM extension */
        $php_version = explode('.', PHP_VERSION);
        if (($php_version[0] < 5) || ($php_version[0] == 5 && $php_version[1] < 2) ) {
            if (! is_null($arXPath)) {
                throw new Exception("PHP 5.2.0 or higher is required to perform XPath Transformations");
            }
            return C14NGeneral($node, $exclusive, $withComments);
        }
        return $node->C14N($exclusive, $withComments, $arXPath, $prefixList);
    }

    public function canonicalizeSignedInfo() {

        $doc = $this->sigNode->ownerDocument;
        $canonicalmethod = NULL;
        if ($doc) {
            $xpath = $this->getXPathObj();
            $query = "./secdsig:SignedInfo";
            $nodeset = $xpath->query($query, $this->sigNode);
            if ($signInfoNode = $nodeset->item(0)) {
                $query = "./secdsig:CanonicalizationMethod";
                $nodeset = $xpath->query($query, $signInfoNode);
                if ($canonNode = $nodeset->item(0)) {
                    $canonicalmethod = $canonNode->getAttribute('Algorithm');
                }
                $this->signedInfo = $this->canonicalizeData($signInfoNode, $canonicalmethod);
                return $this->signedInfo;
            }
        }
        return NULL;
    }

    public function calculateDigest ($digestAlgorithm, $data) {
        switch ($digestAlgorithm) {
            case XMLSecurityDSig::SHA1:
                $alg = 'sha1';
                break;
            case XMLSecurityDSig::SHA256:
                $alg = 'sha256';
                break;
            case XMLSecurityDSig::SHA512:
                $alg = 'sha512';
                break;
            case XMLSecurityDSig::RIPEMD160:
                $alg = 'ripemd160';
                break;
            default:
                throw new Exception("Cannot validate digest: Unsupported Algorith <$digestAlgorithm>");
        }
        if (function_exists('hash')) {
            return base64_encode(hash($alg, $data, TRUE));
        } elseif (function_exists('mhash')) {
            $alg = "MHASH_" . strtoupper($alg);
            return base64_encode(mhash(constant($alg), $data));
        } elseif ($alg === 'sha1') {
            return base64_encode(sha1($data, TRUE));
        } else {
            throw new Exception('xmlseclibs is unable to calculate a digest. Maybe you need the mhash library?');
        }
    }

    public function validateDigest($refNode, $data) {
        $xpath = new DOMXPath($refNode->ownerDocument);
        $xpath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS);
        $query = 'string(./secdsig:DigestMethod/@Algorithm)';
        $digestAlgorithm = $xpath->evaluate($query, $refNode);
        $digValue = $this->calculateDigest($digestAlgorithm, $data);
        $query = 'string(./secdsig:DigestValue)';
        $digestValue = $xpath->evaluate($query, $refNode);
        return ($digValue == $digestValue);
    }

    public function processTransforms($refNode, $objData) {
        $data = $objData;
        $xpath = new DOMXPath($refNode->ownerDocument);
        $xpath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS);
        $query = './secdsig:Transforms/secdsig:Transform';
        $nodelist = $xpath->query($query, $refNode);
        $canonicalMethod = 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315';
        $arXPath = NULL;
        $prefixList = NULL;
        foreach ($nodelist AS $transform) {
            $algorithm = $transform->getAttribute("Algorithm");
            switch ($algorithm) {
                case 'http://www.w3.org/2001/10/xml-exc-c14n#':
                case 'http://www.w3.org/2001/10/xml-exc-c14n#WithComments':
                    $node = $transform->firstChild;
                    while ($node) {
                        if ($node->localName == 'InclusiveNamespaces') {
                            if ($pfx = $node->getAttribute('PrefixList')) {
                                $arpfx = array();
                                $pfxlist = split(" ", $pfx);
                                foreach ($pfxlist AS $pfx) {
                                    $val = trim($pfx);
                                    if (! empty($val)) {
                                        $arpfx[] = $val;
                                    }
                                }
                                if (count($arpfx) > 0) {
                                    $prefixList = $arpfx;
                                }
                            }
                            break;
                        }
                        $node = $node->nextSibling;
                    }
                case 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315':
                case 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315#WithComments':
                    $canonicalMethod = $algorithm;
                    break;
                case 'http://www.w3.org/TR/1999/REC-xpath-19991116':
                    $node = $transform->firstChild;
                    while ($node) {
                        if ($node->localName == 'XPath') {
                            $arXPath = array();
                            $arXPath['query'] = '(.//. | .//@* | .//namespace::*)['.$node->nodeValue.']';
                            $arXpath['namespaces'] = array();
                            $nslist = $xpath->query('./namespace::*', $node);
                            foreach ($nslist AS $nsnode) {
                                if ($nsnode->localName != "xml") {
                                    $arXPath['namespaces'][$nsnode->localName] = $nsnode->nodeValue;
                                }
                            }
                            break;
                        }
                        $node = $node->nextSibling;
                    }
                    break;
            }
        }
        if ($data instanceof DOMNode) {
            $data = $this->canonicalizeData($objData, $canonicalMethod, $arXPath, $prefixList);
        }
        return $data;
    }

    public function processRefNode($refNode) {
        $dataObject = NULL;
        if ($uri = $refNode->getAttribute("URI")) {
            $arUrl = parse_url($uri);
            if (empty($arUrl['path'])) {
                if ($identifier = $arUrl['fragment']) {
                    $xPath = new DOMXPath($refNode->ownerDocument);
                    if ($this->idNS && is_array($this->idNS)) {
                        foreach ($this->idNS AS $nspf=>$ns) {
                            $xPath->registerNamespace($nspf, $ns);
                        }
                    }
                    $iDlist = '@Id="'.$identifier.'"';
                    if (is_array($this->idKeys)) {
                        foreach ($this->idKeys AS $idKey) {
                            $iDlist .= " or @$idKey='$identifier'";
                        }
                    }
                    $query = '//*['.$iDlist.']';
                    $dataObject = $xPath->query($query)->item(0);
                } else {
                    $dataObject = $refNode->ownerDocument;
                }
            } else {
                $dataObject = file_get_contents($arUrl);
            }
        } else {
            $dataObject = $refNode->ownerDocument;
        }
        $data = $this->processTransforms($refNode, $dataObject);
        if (!$this->validateDigest($refNode, $data)) {
            return FALSE;
        }

        if ($dataObject instanceof DOMNode) {
            /* Add this node to the list of validated nodes. */
            if(! empty($identifier)) {
                $this->validatedNodes[$identifier] = $dataObject;
            } else {
                $this->validatedNodes[] = $dataObject;
            }
        }

        return TRUE;
    }

    public function getRefNodeID($refNode) {
        if ($uri = $refNode->getAttribute("URI")) {
            $arUrl = parse_url($uri);
            if (empty($arUrl['path'])) {
                if ($identifier = $arUrl['fragment']) {
                    return $identifier;
                }
            }
        }
        return null;
    }

    public function getRefIDs() {
        $refids = array();
        $doc = $this->sigNode->ownerDocument;

        $xpath = $this->getXPathObj();
        $query = "./secdsig:SignedInfo/secdsig:Reference";
        $nodeset = $xpath->query($query, $this->sigNode);
        if ($nodeset->length == 0) {
            throw new Exception("Reference nodes not found");
        }
        foreach ($nodeset AS $refNode) {
            $refids[] = $this->getRefNodeID($refNode);
        }
        return $refids;
    }

    public function validateReference() {
        $doc = $this->sigNode->ownerDocument;
        if (! $doc->isSameNode($this->sigNode)) {
            $this->sigNode->parentNode->removeChild($this->sigNode);
        }
        $xpath = $this->getXPathObj();
        $query = "./secdsig:SignedInfo/secdsig:Reference";
        $nodeset = $xpath->query($query, $this->sigNode);
        if ($nodeset->length == 0) {
            throw new Exception("Reference nodes not found");
        }
        
        /* Initialize/reset the list of validated nodes. */
        $this->validatedNodes = array();
        
        foreach ($nodeset AS $refNode) {
            if (! $this->processRefNode($refNode)) {
                /* Clear the list of validated nodes. */
                $this->validatedNodes = NULL;
                throw new Exception("Reference validation failed");
            }
        }
        return TRUE;
    }

    private function addRefInternal($sinfoNode, $node, $algorithm, $arTransforms=NULL, $options=NULL) {
        $prefix = NULL;
        $prefix_ns = NULL;
        $id_name = 'Id';
        $overwrite_id  = TRUE;

        if (is_array($options)) {
            $prefix = empty($options['prefix'])?NULL:$options['prefix'];
            $prefix_ns = empty($options['prefix_ns'])?NULL:$options['prefix_ns'];
            $id_name = empty($options['id_name'])?'Id':$options['id_name'];
            $overwrite_id = !isset($options['overwrite'])?TRUE:(bool)$options['overwrite'];
        }

        $attname = $id_name;
        if (! empty($prefix)) {
            $attname = $prefix.':'.$attname;
        }

        $refNode = $this->createNewSignNode('Reference');
        $sinfoNode->appendChild($refNode);

        if (! $node instanceof DOMDocument) {
            $uri = NULL;
            if (! $overwrite_id) {
                $uri = $node->getAttributeNS($prefix_ns, $attname);
            }
            if (empty($uri)) {
                $uri = XMLSecurityDSig::generate_GUID();
                $node->setAttributeNS($prefix_ns, $attname, $uri);
            }
            $refNode->setAttribute("URI", '#'.$uri);
        }

        $transNodes = $this->createNewSignNode('Transforms');
        $refNode->appendChild($transNodes);

        if (is_array($arTransforms)) {
            foreach ($arTransforms AS $transform) {
                $transNode = $this->createNewSignNode('Transform');
                $transNodes->appendChild($transNode);
                $transNode->setAttribute('Algorithm', $transform);
            }
        } elseif (! empty($this->canonicalMethod)) {
            $transNode = $this->createNewSignNode('Transform');
            $transNodes->appendChild($transNode);
            $transNode->setAttribute('Algorithm', $this->canonicalMethod);
        }

        $canonicalData = $this->processTransforms($refNode, $node);
        $digValue = $this->calculateDigest($algorithm, $canonicalData);

        $digestMethod = $this->createNewSignNode('DigestMethod');
        $refNode->appendChild($digestMethod);
        $digestMethod->setAttribute('Algorithm', $algorithm);

        $digestValue = $this->createNewSignNode('DigestValue', $digValue);
        $refNode->appendChild($digestValue);
    }

    public function addReference($node, $algorithm, $arTransforms=NULL, $options=NULL) {
        if ($xpath = $this->getXPathObj()) {
            $query = "./secdsig:SignedInfo";
            $nodeset = $xpath->query($query, $this->sigNode);
            if ($sInfo = $nodeset->item(0)) {
                $this->addRefInternal($sInfo, $node, $algorithm, $arTransforms, $options);
            }
        }
    }

    public function addReferenceList($arNodes, $algorithm, $arTransforms=NULL, $options=NULL) {
        if ($xpath = $this->getXPathObj()) {
            $query = "./secdsig:SignedInfo";
            $nodeset = $xpath->query($query, $this->sigNode);
            if ($sInfo = $nodeset->item(0)) {
                foreach ($arNodes AS $node) {
                    $this->addRefInternal($sInfo, $node, $algorithm, $arTransforms, $options);
                }
            }
        }
    }

   public function addObject($data, $mimetype=NULL, $encoding=NULL) {
      $objNode = $this->createNewSignNode('Object');
      $this->sigNode->appendChild($objNode);
      if (! empty($mimetype)) {
         $objNode->setAtribute('MimeType', $mimetype);
      }
      if (! empty($encoding)) {
         $objNode->setAttribute('Encoding', $encoding);
      }

      if ($data instanceof DOMElement) {
         $newData = $this->sigNode->ownerDocument->importNode($data, TRUE);
      } else {
         $newData = $this->sigNode->ownerDocument->createTextNode($data);
      }
      $objNode->appendChild($newData);

      return $objNode;
   }

    public function locateKey($node=NULL) {
        if (empty($node)) {
            $node = $this->sigNode;
        }
        if (! $node instanceof DOMNode) {
            return NULL;
        }
        if ($doc = $node->ownerDocument) {
            $xpath = new DOMXPath($doc);
            $xpath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS);
            $query = "string(./secdsig:SignedInfo/secdsig:SignatureMethod/@Algorithm)";
            $algorithm = $xpath->evaluate($query, $node);
            if ($algorithm) {
                try {
                    $objKey = new XMLSecurityKey($algorithm, array('type'=>'public'));
                } catch (Exception $e) {
                    return NULL;
                }
                return $objKey;
            }
        }
        return NULL;
    }

    public function verify($objKey) {
        $doc = $this->sigNode->ownerDocument;
        $xpath = new DOMXPath($doc);
        $xpath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS);
        $query = "string(./secdsig:SignatureValue)";
        $sigValue = $xpath->evaluate($query, $this->sigNode);
        if (empty($sigValue)) {
            throw new Exception("Unable to locate SignatureValue");
        }
        return $objKey->verifySignature($this->signedInfo, base64_decode($sigValue));
    }

    public function signData($objKey, $data) {
        return $objKey->signData($data);
    }

    public function sign($objKey) {
        if ($xpath = $this->getXPathObj()) {
            $query = "./secdsig:SignedInfo";
            $nodeset = $xpath->query($query, $this->sigNode);
            if ($sInfo = $nodeset->item(0)) {
                $query = "./secdsig:SignatureMethod";
                $nodeset = $xpath->query($query, $sInfo);
                $sMethod = $nodeset->item(0);
                $sMethod->setAttribute('Algorithm', $objKey->type);
                $data = $this->canonicalizeData($sInfo, $this->canonicalMethod);
                $sigValue = base64_encode($this->signData($objKey, $data));
                $sigValueNode = $this->createNewSignNode('SignatureValue', $sigValue);
                if ($infoSibling = $sInfo->nextSibling) {
                    $infoSibling->parentNode->insertBefore($sigValueNode, $infoSibling);
                } else {
                    $this->sigNode->appendChild($sigValueNode);
                }
            }
        }
    }

    public function appendCert() {

    }

    public function appendKey($objKey, $parent=NULL) {
        $objKey->serializeKey($parent);
    }


    /**
     * This function inserts the signature element.
     *
     * The signature element will be appended to the element, unless $beforeNode is specified. If $beforeNode
     * is specified, the signature element will be inserted as the last element before $beforeNode.
     *
     * @param $node  The node the signature element should be inserted into.
     * @param $beforeNode  The node the signature element should be located before.
     */
    public function insertSignature($node, $beforeNode = NULL) {

        $document = $node->ownerDocument;
        $signatureElement = $document->importNode($this->sigNode, TRUE);

        if($beforeNode == NULL) {
            $node->insertBefore($signatureElement);
        } else {
            $node->insertBefore($signatureElement, $beforeNode);
        }
    }

    public function appendSignature($parentNode, $insertBefore = FALSE) {
        $beforeNode = $insertBefore ? $parentNode->firstChild : NULL;
        $this->insertSignature($parentNode, $beforeNode);
    }

    static function get509XCert($cert, $isPEMFormat=TRUE) {
        $certs = XMLSecurityDSig::staticGet509XCerts($cert, $isPEMFormat);
        if (! empty($certs)) {
            return $certs[0];
        }
        return '';
    }

    static function staticGet509XCerts($certs, $isPEMFormat=TRUE) {
        if ($isPEMFormat) {
            $data = '';
            $certlist = array();
            $arCert = explode("\n", $certs);
            $inData = FALSE;
            foreach ($arCert AS $curData) {
                if (! $inData) {
                    if (strncmp($curData, '-----BEGIN CERTIFICATE', 22) == 0) {
                        $inData = TRUE;
                    }
                } else {
                    if (strncmp($curData, '-----END CERTIFICATE', 20) == 0) {
                        $inData = FALSE;
                        $certlist[] = $data;
                        $data = '';
                        continue;
                    }
                    $data .= trim($curData);
                }
            }
            return $certlist;
        } else {
            return array($certs);
        }
    }

    static function staticAdd509Cert($parentRef, $cert, $isPEMFormat=TRUE, $isURL=False, $xpath=NULL) {
          if ($isURL) {
            $cert = file_get_contents($cert);
          }
          if (! $parentRef instanceof DOMElement) {
            throw new Exception('Invalid parent Node parameter');
          }
          $baseDoc = $parentRef->ownerDocument;

          if (empty($xpath)) {
              $xpath = new DOMXPath($parentRef->ownerDocument);
              $xpath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS);
          }

         $query = "./secdsig:KeyInfo";
         $nodeset = $xpath->query($query, $parentRef);
         $keyInfo = $nodeset->item(0);
         if (! $keyInfo) {
              $inserted = FALSE;
              $keyInfo = $baseDoc->createElementNS(XMLSecurityDSig::XMLDSIGNS, 'ds:KeyInfo');

               $query = "./secdsig:Object";
               $nodeset = $xpath->query($query, $parentRef);
               if ($sObject = $nodeset->item(0)) {
                    $sObject->parentNode->insertBefore($keyInfo, $sObject);
                    $inserted = TRUE;
               }

              if (! $inserted) {
                   $parentRef->appendChild($keyInfo);
              }
         }

         // Add all certs if there are more than one
         $certs = XMLSecurityDSig::staticGet509XCerts($cert, $isPEMFormat);

         // Atach X509 data node
         $x509DataNode = $baseDoc->createElementNS(XMLSecurityDSig::XMLDSIGNS, 'ds:X509Data');
         $keyInfo->appendChild($x509DataNode);

         // Atach all certificate nodes
         foreach ($certs as $X509Cert){
            $x509CertNode = $baseDoc->createElementNS(XMLSecurityDSig::XMLDSIGNS, 'ds:X509Certificate', $X509Cert);
         $x509DataNode->appendChild($x509CertNode);
         }
     }

    public function add509Cert($cert, $isPEMFormat=TRUE, $isURL=False) {
         if ($xpath = $this->getXPathObj()) {
            self::staticAdd509Cert($this->sigNode, $cert, $isPEMFormat, $isURL, $xpath);
         }
    }
    
    /* This function retrieves an associative array of the validated nodes.
     *
     * The array will contain the id of the referenced node as the key and the node itself
     * as the value.
     *
     * Returns:
     *  An associative array of validated nodes or NULL if no nodes have been validated.
     */
    public function getValidatedNodes() {
        return $this->validatedNodes;
    }
}

class XMLSecEnc {
    const template = "<xenc:EncryptedData xmlns:xenc='http://www.w3.org/2001/04/xmlenc#'>
   <xenc:CipherData>
      <xenc:CipherValue></xenc:CipherValue>
   </xenc:CipherData>
</xenc:EncryptedData>";

    const Element = 'http://www.w3.org/2001/04/xmlenc#Element';
    const Content = 'http://www.w3.org/2001/04/xmlenc#Content';
    const URI = 3;
    const XMLENCNS = 'http://www.w3.org/2001/04/xmlenc#';

    private $encdoc = NULL;
    private $rawNode = NULL;
    public $type = NULL;
    public $encKey = NULL;

    public function __construct() {
        $this->encdoc = new DOMDocument();
        $this->encdoc->loadXML(XMLSecEnc::template);
    }

    public function setNode($node) {
        $this->rawNode = $node;
    }

    public function encryptNode($objKey, $replace=TRUE) {
        $data = '';
        if (empty($this->rawNode)) {
            throw new Exception('Node to encrypt has not been set');
        }
        if (! $objKey instanceof XMLSecurityKey) {
            throw new Exception('Invalid Key');
        }
        $doc = $this->rawNode->ownerDocument;
        $xPath = new DOMXPath($this->encdoc);
        $objList = $xPath->query('/xenc:EncryptedData/xenc:CipherData/xenc:CipherValue');
        $cipherValue = $objList->item(0);
        if ($cipherValue == NULL) {
            throw new Exception('Error locating CipherValue element within template');
        }
        switch ($this->type) {
            case (XMLSecEnc::Element):
                $data = $doc->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute('Type', XMLSecEnc::Element);
                break;
            case (XMLSecEnc::Content):
                $children = $this->rawNode->childNodes;
                foreach ($children AS $child) {
                    $data .= $doc->saveXML($child);
                }
                $this->encdoc->documentElement->setAttribute('Type', XMLSecEnc::Content);
                break;
            default:
                throw new Exception('Type is currently not supported');
                return;
        }

        $encMethod = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(XMLSecEnc::XMLENCNS, 'xenc:EncryptionMethod'));
        $encMethod->setAttribute('Algorithm', $objKey->getAlgorith());
        $cipherValue->parentNode->parentNode->insertBefore($encMethod, $cipherValue->parentNode);

        $strEncrypt = base64_encode($objKey->encryptData($data));
        $value = $this->encdoc->createTextNode($strEncrypt);
        $cipherValue->appendChild($value);

        if ($replace) {
            switch ($this->type) {
                case (XMLSecEnc::Element):
                    if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                        return $this->encdoc;
                    }
                    $importEnc = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, TRUE);
                    $this->rawNode->parentNode->replaceChild($importEnc, $this->rawNode);
                    return $importEnc;
                    break;
                case (XMLSecEnc::Content):
                    $importEnc = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, TRUE);
                    while($this->rawNode->firstChild) {
                        $this->rawNode->removeChild($this->rawNode->firstChild);
                    }
                    $this->rawNode->appendChild($importEnc);
                    return $importEnc;
                    break;
            }
        }
    }

    public function decryptNode($objKey, $replace=TRUE) {
        $data = '';
        if (empty($this->rawNode)) {
            throw new Exception('Node to decrypt has not been set');
        }
        if (! $objKey instanceof XMLSecurityKey) {
            throw new Exception('Invalid Key');
        }
        $doc = $this->rawNode->ownerDocument;
        $xPath = new DOMXPath($doc);
        $xPath->registerNamespace('xmlencr', XMLSecEnc::XMLENCNS);
        /* Only handles embedded content right now and not a reference */
        $query = "./xmlencr:CipherData/xmlencr:CipherValue";
        $nodeset = $xPath->query($query, $this->rawNode);

        if ($node = $nodeset->item(0)) {
            $encryptedData = base64_decode($node->nodeValue);
            $decrypted = $objKey->decryptData($encryptedData);
            if ($replace) {
                switch ($this->type) {
                    case (XMLSecEnc::Element):
                        $newdoc = new DOMDocument();
                        $newdoc->loadXML($decrypted);
                        if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                            return $newdoc;
                        }
                        $importEnc = $this->rawNode->ownerDocument->importNode($newdoc->documentElement, TRUE);
                        $this->rawNode->parentNode->replaceChild($importEnc, $this->rawNode);
                        return $importEnc;
                        break;
                    case (XMLSecEnc::Content):
                        if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                            $doc = $this->rawNode;
                        } else {
                            $doc = $this->rawNode->ownerDocument;
                        }
                        $newFrag = $doc->createDOMDocumentFragment();
                        $newFrag->appendXML($decrypted);
                        $this->rawNode->parentNode->replaceChild($newFrag, $this->rawNode);
                        return $this->rawNode->parentNode;
                        break;
                    default:
                        return $decrypted;
                }
            } else {
                return $decrypted;
            }
        } else {
            throw new Exception("Cannot locate encrypted data");
        }
    }

    public function encryptKey($srcKey, $rawKey, $append=TRUE) {
        if ((! $srcKey instanceof XMLSecurityKey) || (! $rawKey instanceof XMLSecurityKey)) {
            throw new Exception('Invalid Key');
        }
        $strEncKey = base64_encode($srcKey->encryptData($rawKey->key));
        $root = $this->encdoc->documentElement;
        $encKey = $this->encdoc->createElementNS(XMLSecEnc::XMLENCNS, 'xenc:EncryptedKey');
        if ($append) {
            $keyInfo = $root->appendChild($this->encdoc->createElementNS('http://www.w3.org/2000/09/xmldsig#', 'dsig:KeyInfo'));
            $keyInfo->appendChild($encKey);
        } else {
            $this->encKey = $encKey;
        }
        $encMethod = $encKey->appendChild($this->encdoc->createElementNS(XMLSecEnc::XMLENCNS, 'xenc:EncryptionMethod'));
        $encMethod->setAttribute('Algorithm', $srcKey->getAlgorith());
        if (! empty($srcKey->name)) {
            $keyInfo = $encKey->appendChild($this->encdoc->createElementNS('http://www.w3.org/2000/09/xmldsig#', 'dsig:KeyInfo'));
            $keyInfo->appendChild($this->encdoc->createElementNS('http://www.w3.org/2000/09/xmldsig#', 'dsig:KeyName', $srcKey->name));
        }
        $cipherData = $encKey->appendChild($this->encdoc->createElementNS(XMLSecEnc::XMLENCNS, 'xenc:CipherData'));
        $cipherData->appendChild($this->encdoc->createElementNS(XMLSecEnc::XMLENCNS, 'xenc:CipherValue', $strEncKey));
        return;
    }

    public function decryptKey($encKey) {
        if (! $encKey->isEncrypted) {
            throw new Exception("Key is not Encrypted");
        }
        if (empty($encKey->key)) {
            throw new Exception("Key is missing data to perform the decryption");
        }
        return $this->decryptNode($encKey, FALSE);
    }

    public function locateEncryptedData($element) {
        if ($element instanceof DOMDocument) {
            $doc = $element;
        } else {
            $doc = $element->ownerDocument;
        }
        if ($doc) {
            $xpath = new DOMXPath($doc);
            $query = "//*[local-name()='EncryptedData' and namespace-uri()='".XMLSecEnc::XMLENCNS."']";
            $nodeset = $xpath->query($query);
            return $nodeset->item(0);
        }
        return NULL;
    }

    public function locateKey($node=NULL) {
        if (empty($node)) {
            $node = $this->rawNode;
        }
        if (! $node instanceof DOMNode) {
            return NULL;
        }
        if ($doc = $node->ownerDocument) {
            $xpath = new DOMXPath($doc);
            $xpath->registerNamespace('xmlsecenc', XMLSecEnc::XMLENCNS);
            $query = ".//xmlsecenc:EncryptionMethod";
            $nodeset = $xpath->query($query, $node);
            if ($encmeth = $nodeset->item(0)) {
                   $attrAlgorithm = $encmeth->getAttribute("Algorithm");
                try {
                    $objKey = new XMLSecurityKey($attrAlgorithm, array('type'=>'private'));
                } catch (Exception $e) {
                    return NULL;
                }
                return $objKey;
            }
        }
        return NULL;
    }

    static function staticLocateKeyInfo($objBaseKey=NULL, $node=NULL) {
        if (empty($node) || (! $node instanceof DOMNode)) {
            return NULL;
        }
        if ($doc = $node->ownerDocument) {
            $xpath = new DOMXPath($doc);
            $xpath->registerNamespace('xmlsecenc', XMLSecEnc::XMLENCNS);
            $xpath->registerNamespace('xmlsecdsig', XMLSecurityDSig::XMLDSIGNS);
            $query = "./xmlsecdsig:KeyInfo";
            $nodeset = $xpath->query($query, $node);
            if ($encmeth = $nodeset->item(0)) {
                foreach ($encmeth->childNodes AS $child) {
                    switch ($child->localName) {
                        case 'KeyName':
                            if (! empty($objBaseKey)) {
                                $objBaseKey->name = $child->nodeValue;
                            }
                            break;
                        case 'KeyValue':
                            foreach ($child->childNodes AS $keyval) {
                                switch ($keyval->localName) {
                                    case 'DSAKeyValue':
                                        throw new Exception("DSAKeyValue currently not supported");
                                        break;
                                    case 'RSAKeyValue':
                                        $modulus = NULL;
                                        $exponent = NULL;
                                        if ($modulusNode = $keyval->getElementsByTagName('Modulus')->item(0)) {
                                            $modulus = base64_decode($modulusNode->nodeValue);
                                        }
                                        if ($exponentNode = $keyval->getElementsByTagName('Exponent')->item(0)) {
                                            $exponent = base64_decode($exponentNode->nodeValue);
                                        }
                                        if (empty($modulus) || empty($exponent)) {
                                            throw new Exception("Missing Modulus or Exponent");
                                        }
                                        $publicKey = XMLSecurityKey::convertRSA($modulus, $exponent);
                                        $objBaseKey->loadKey($publicKey);
                                        break;
                                }
                            }
                            break;
                        case 'RetrievalMethod':
                            /* Not currently supported */
                            break;
                        case 'EncryptedKey':
                            $objenc = new XMLSecEnc();
                            $objenc->setNode($child);
                            if (! $objKey = $objenc->locateKey()) {
                                throw new Exception("Unable to locate algorithm for this Encrypted Key");
                            }
                            $objKey->isEncrypted = TRUE;
                            $objKey->encryptedCtx = $objenc;
                            XMLSecEnc::staticLocateKeyInfo($objKey, $child);
                            return $objKey;
                            break;
                        case 'X509Data':
                            if ($x509certNodes = $child->getElementsByTagName('X509Certificate')) {
                                if ($x509certNodes->length > 0) {
                                    $x509cert = $x509certNodes->item(0)->textContent;
                                    $x509cert = str_replace(array("\r", "\n"), "", $x509cert);
                                    $x509cert = "-----BEGIN CERTIFICATE-----\n".chunk_split($x509cert, 64, "\n")."-----END CERTIFICATE-----\n";
                                    $objBaseKey->loadKey($x509cert, FALSE, TRUE);
                                }
                            }
                            break;
                    }
                }
            }
            return $objBaseKey;
        }
        return NULL;
    }

    public function locateKeyInfo($objBaseKey=NULL, $node=NULL) {
        if (empty($node)) {
            $node = $this->rawNode;
        }
        return XMLSecEnc::staticLocateKeyInfo($objBaseKey, $node);
    }
}
?>
<?php  
/** 
 * soap-wsse.php 
 * 
 * Copyright (c) 2007, Robert Richards <rrichards@ctindustries.net>. 
 * All rights reserved. 
 * 
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions 
 * are met: 
 * 
 *   * Redistributions of source code must retain the above copyright 
 *     notice, this list of conditions and the following disclaimer. 
 * 
 *   * Redistributions in binary form must reproduce the above copyright 
 *     notice, this list of conditions and the following disclaimer in 
 *     the documentation and/or other materials provided with the 
 *     distribution. 
 * 
 *   * Neither the name of Robert Richards nor the names of his 
 *     contributors may be used to endorse or promote products derived 
 *     from this software without specific prior written permission. 
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS 
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT 
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS 
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE 
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT 
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN 
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
 * POSSIBILITY OF SUCH DAMAGE. 
 * 
 * @author     Robert Richards <rrichards@ctindustries.net> 
 * @copyright  2007 Robert Richards <rrichards@ctindustries.net> 
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License 
 * @version    1.0.0 
 */ 
  
#require('xmlseclibs.php'); 

class WSSESoap { 
    const WSSENS = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd'; 
    const WSUNS = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd'; 
    const WSUNAME = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0'; 
    const WSSEPFX = 'wsse'; 
    const WSUPFX = 'wsu'; 
    private $soapNS, $soapPFX; 
    private $soapDoc = NULL; 
    private $envelope = NULL; 
    private $SOAPXPath = NULL; 
    private $secNode = NULL; 
    public $signAllHeaders = FALSE; 
     
    private function locateSecurityHeader($bMustUnderstand = TRUE, $setActor = NULL) { 
        if ($this->secNode == NULL) { 
            $headers = $this->SOAPXPath->query('//wssoap:Envelope/wssoap:Header'); 
            $header = $headers->item(0); 
            if (! $header) { 
                $header = $this->soapDoc->createElementNS($this->soapNS, $this->soapPFX.':Header'); 
                $this->envelope->insertBefore($header, $this->envelope->firstChild); 
            } 
            $secnodes = $this->SOAPXPath->query('./wswsse:Security', $header); 
            $secnode = NULL; 
            foreach ($secnodes AS $node) { 
                $actor = $node->getAttributeNS($this->soapNS, 'actor'); 
                if ($actor == $setActor) { 
                    $secnode = $node; 
                    break; 
                } 
            } 
            if (! $secnode) { 
                $secnode = $this->soapDoc->createElementNS(WSSESoap::WSSENS, WSSESoap::WSSEPFX.':Security'); 
                $header->appendChild($secnode); 
                if ($bMustUnderstand) { 
                    $secnode->setAttributeNS($this->soapNS, $this->soapPFX.':mustUnderstand', '1'); 
                } 
                if (! empty($setActor)) { 
                    $ename = 'actor'; 
                    if ($this->soapNS == 'http://www.w3.org/2003/05/soap-envelope') { 
                        $ename = 'role'; 
                    } 
                    $secnode->setAttributeNS($this->soapNS, $this->soapPFX.':'.$ename, $setActor); 
                } 
            } 
            $this->secNode = $secnode; 
        } 
        return $this->secNode; 
    } 

    public function __construct($doc, $bMustUnderstand = TRUE, $setActor=NULL) { 
        $this->soapDoc = $doc; 
        $this->envelope = $doc->documentElement; 
        $this->soapNS = $this->envelope->namespaceURI; 
        $this->soapPFX = $this->envelope->prefix; 
        $this->SOAPXPath = new DOMXPath($doc); 
        $this->SOAPXPath->registerNamespace('wssoap', $this->soapNS); 
        $this->SOAPXPath->registerNamespace('wswsse', WSSESoap::WSSENS); 
        $this->locateSecurityHeader($bMustUnderstand, $setActor); 
    } 
    
    public function addUserTokenNoMCrypt($u, $p){
        $security = $this->locateSecurityHeader(); 
				
        $usernameToken = $this->soapDoc->createElementNS('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'wsse:UsernameToken');
        $username = $this->soapDoc->createElementNS('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'wsse:Username', $u);
        $password = $this->soapDoc->createElementNS('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'wsse:Password', $p);
        $usernameToken->appendChild($username);
        $usernameToken->appendChild($password);
        $security->appendChild($usernameToken);
        
    }

    public function addTimestamp($secondsToExpire=3600) { 
        /* Add the WSU timestamps */ 
        $security = $this->locateSecurityHeader(); 

        $timestamp = $this->soapDoc->createElementNS(WSSESoap::WSUNS, WSSESoap::WSUPFX.':Timestamp'); 
        $security->insertBefore($timestamp, $security->firstChild); 
        $currentTime = time(); 
        $created = $this->soapDoc->createElementNS(WSSESoap::WSUNS,  WSSESoap::WSUPFX.':Created', gmdate("Y-m-d\TH:i:s", $currentTime).'Z'); 
        $timestamp->appendChild($created); 
        if (! is_null($secondsToExpire)) { 
            $expire = $this->soapDoc->createElementNS(WSSESoap::WSUNS,  WSSESoap::WSUPFX.':Expires', gmdate("Y-m-d\TH:i:s", $currentTime + $secondsToExpire).'Z'); 
            $timestamp->appendChild($expire); 
        } 
    } 

    public function addUserToken($userName, $password=NULL, $passwordDigest=FALSE) { 
        if ($passwordDigest && empty($password)) { 
            throw new Exception("Cannot calculate the digest without a password"); 
        } 
         
        $security = $this->locateSecurityHeader(); 

        $token = $this->soapDoc->createElementNS(WSSESoap::WSSENS, WSSESoap::WSSEPFX.':UsernameToken'); 
        $security->insertBefore($token, $security->firstChild); 

        $username = $this->soapDoc->createElementNS(WSSESoap::WSSENS,  WSSESoap::WSSEPFX.':Username', $userName); 
        $token->appendChild($username); 
         
        /* Generate nonce - create a 256 bit session key to be used */ 
        $objKey = new XMLSecurityKey(XMLSecurityKey::AES256_CBC); 
        $nonce = $objKey->generateSessionKey(); 
        unset($objKey); 
        $createdate = gmdate("Y-m-d\TH:i:s").'Z'; 
         
        if ($password) { 
            $passType = WSSESoap::WSUNAME.'#PasswordText'; 
            if ($passwordDigest) { 
                $password = base64_encode(sha1($nonce.$createdate. $password, true)); 
                $passType = WSSESoap::WSUNAME.'#PasswordDigest'; 
            } 
            $passwordNode = $this->soapDoc->createElementNS(WSSESoap::WSSENS,  WSSESoap::WSSEPFX.':Password', $password); 
            $token->appendChild($passwordNode); 
            $passwordNode->setAttribute('Type', $passType); 
        } 

        $nonceNode = $this->soapDoc->createElementNS(WSSESoap::WSSENS,  WSSESoap::WSSEPFX.':Nonce', base64_encode($nonce)); 
        $token->appendChild($nonceNode); 

        $created = $this->soapDoc->createElementNS(WSSESoap::WSUNS,  WSSESoap::WSUPFX.':Created', $createdate); 
        $token->appendChild($created); 
    } 

    public function addBinaryToken($cert, $isPEMFormat=TRUE, $isDSig=TRUE) { 
        $security = $this->locateSecurityHeader(); 
        $data = XMLSecurityDSig::get509XCert($cert, $isPEMFormat); 

        $token = $this->soapDoc->createElementNS(WSSESoap::WSSENS, WSSESoap::WSSEPFX.':BinarySecurityToken', $data); 
        $security->insertBefore($token, $security->firstChild); 

        $token->setAttribute('EncodingType', 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary'); 
        $token->setAttributeNS(WSSESoap::WSUNS, WSSESoap::WSUPFX.':Id', XMLSecurityDSig::generate_GUID()); 
        $token->setAttribute('ValueType', 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#X509v3'); 
         
        return $token; 
    } 
     
    public function attachTokentoSig($token) { 
        if (! ($token instanceof DOMElement)) { 
            throw new Exception('Invalid parameter: BinarySecurityToken element expected'); 
        } 
        $objXMLSecDSig = new XMLSecurityDSig(); 
        if ($objDSig = $objXMLSecDSig->locateSignature($this->soapDoc)) { 
            $tokenURI = '#'.$token->getAttributeNS(WSSESoap::WSUNS, "Id"); 
            $this->SOAPXPath->registerNamespace('secdsig', XMLSecurityDSig::XMLDSIGNS); 
            $query = "./secdsig:KeyInfo"; 
            $nodeset = $this->SOAPXPath->query($query, $objDSig); 
            $keyInfo = $nodeset->item(0); 
            if (! $keyInfo) { 
                $keyInfo = $objXMLSecDSig->createNewSignNode('KeyInfo'); 
                $objDSig->appendChild($keyInfo); 
            } 
             
            $tokenRef = $this->soapDoc->createElementNS(WSSESoap::WSSENS, WSSESoap::WSSEPFX.':SecurityTokenReference'); 
            $keyInfo->appendChild($tokenRef); 
            $reference = $this->soapDoc->createElementNS(WSSESoap::WSSENS, WSSESoap::WSSEPFX.':Reference'); 
            $reference->setAttribute("URI", $tokenURI); 
            $tokenRef->appendChild($reference); 
        } else { 
            throw new Exception('Unable to locate digital signature'); 
        } 
    } 

    public function signSoapDoc($objKey) { 
        $objDSig = new XMLSecurityDSig(); 

        $objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N); 

        $arNodes = array(); 
        foreach ($this->secNode->childNodes AS $node) { 
            if ($node->nodeType == XML_ELEMENT_NODE) { 
                $arNodes[] = $node; 
            } 
        } 

        if ($this->signAllHeaders) { 
            foreach ($this->secNode->parentNode->childNodes AS $node) { 
                if (($node->nodeType == XML_ELEMENT_NODE) &&  
                ($node->namespaceURI != WSSESoap::WSSENS)) { 
                    $arNodes[] = $node; 
                } 
            } 
        } 

        foreach ($this->envelope->childNodes AS $node) { 
            if ($node->namespaceURI == $this->soapNS && $node->localName == 'Body') { 
                $arNodes[] = $node; 
                break; 
            } 
        } 
         
        $arOptions = array('prefix'=>WSSESoap::WSUPFX, 'prefix_ns'=>WSSESoap::WSUNS); 
        $objDSig->addReferenceList($arNodes, XMLSecurityDSig::SHA1, NULL, $arOptions); 

        $objDSig->sign($objKey); 

        $objDSig->appendSignature($this->secNode, TRUE); 
    } 

    public function addEncryptedKey($node, $key, $token) { 
        if (! $key->encKey) { 
            return FALSE; 
        } 
        $encKey = $key->encKey; 
        $security = $this->locateSecurityHeader(); 
        $doc = $security->ownerDocument; 
        if (! $doc->isSameNode($encKey->ownerDocument)) { 
            $key->encKey = $security->ownerDocument->importNode($encKey, TRUE); 
            $encKey = $key->encKey; 
        } 
        if (! empty($key->guid)) { 
            return TRUE; 
        } 
         
        $lastToken = NULL; 
        $findTokens = $security->firstChild; 
        while ($findTokens) { 
            if ($findTokens->localName == 'BinarySecurityToken') { 
                $lastToken = $findTokens; 
            } 
            $findTokens = $findTokens->nextSibling; 
        } 
        if ($lastToken) { 
            $lastToken = $lastToken->nextSibling; 
        } 

        $security->insertBefore($encKey, $lastToken); 
        $key->guid = XMLSecurityDSig::generate_GUID(); 
        $encKey->setAttribute('Id', $key->guid); 
        $encMethod = $encKey->firstChild; 
        while ($encMethod && $encMethod->localName != 'EncryptionMethod') { 
            $encMethod = $encMethod->nextChild; 
        } 
        if ($encMethod) { 
            $encMethod = $encMethod->nextSibling; 
        } 
        $objDoc = $encKey->ownerDocument; 
        $keyInfo = $objDoc->createElementNS('http://www.w3.org/2000/09/xmldsig#', 'dsig:KeyInfo'); 
        $encKey->insertBefore($keyInfo, $encMethod); 
        $tokenURI = '#'.$token->getAttributeNS(WSSESoap::WSUNS, "Id"); 
        $tokenRef = $objDoc->createElementNS(WSSESoap::WSSENS, WSSESoap::WSSEPFX.':SecurityTokenReference'); 
        $keyInfo->appendChild($tokenRef); 
        $reference = $objDoc->createElementNS(WSSESoap::WSSENS, WSSESoap::WSSEPFX.':Reference'); 
        $reference->setAttribute("URI", $tokenURI); 
        $tokenRef->appendChild($reference); 

        return TRUE; 
    } 

    public function AddReference($baseNode, $guid) { 
        $refList = NULL; 
        $child = $baseNode->firstChild; 
        while($child) { 
            if (($child->namespaceURI == XMLSecEnc::XMLENCNS) && ($child->localName == 'ReferenceList')) { 
                $refList = $child; 
                break; 
            } 
            $child = $child->nextSibling; 
        } 
        $doc = $baseNode->ownerDocument; 
        if (is_null($refList)) { 
            $refList = $doc->createElementNS(XMLSecEnc::XMLENCNS, 'xenc:ReferenceList'); 
            $baseNode->appendChild($refList); 
        } 
        $dataref = $doc->createElementNS(XMLSecEnc::XMLENCNS, 'xenc:DataReference'); 
        $refList->appendChild($dataref); 
        $dataref->setAttribute('URI', '#'.$guid); 
    } 

    public function EncryptBody($siteKey, $objKey, $token) { 

        $enc = new XMLSecEnc(); 
        foreach ($this->envelope->childNodes AS $node) { 
            if ($node->namespaceURI == $this->soapNS && $node->localName == 'Body') { 
                break; 
            } 
        } 
        $enc->setNode($node); 
        /* encrypt the symmetric key */ 
        $enc->encryptKey($siteKey, $objKey, FALSE); 

        $enc->type = XMLSecEnc::Content; 
        /* Using the symmetric key to actually encrypt the data */ 
        $encNode = $enc->encryptNode($objKey); 

        $guid = XMLSecurityDSig::generate_GUID(); 
        $encNode->setAttribute('Id', $guid); 

        $refNode = $encNode->firstChild; 
        while($refNode && $refNode->nodeType != XML_ELEMENT_NODE) { 
            $refNode = $refNode->nextSibling; 
        } 
        if ($refNode) { 
            $refNode = $refNode->nextSibling; 
        } 
        if ($this->addEncryptedKey($encNode, $enc, $token)) { 
            $this->AddReference($enc->encKey, $guid); 
        } 
    } 
     
    public function saveXML() { 
        return $this->soapDoc->saveXML(); 
    } 

    public function save($file) { 
        return $this->soapDoc->save($file); 
    } 
} 

?>
<?php
#require_once("WSASoap.php");
#require_once("WSSESoap.php");

class CreateEnvelope {
  public $Envelope; // Envelope
}

class Envelope {
  public $TransactionID; // string
  public $Asynchronous; // boolean
  public $AccountId; // string
  public $Documents; // ArrayOfDocument
  public $Recipients; // ArrayOfRecipient
  public $Tabs; // ArrayOfTab
  public $Subject; // string
  public $EmailBlurb; // string
  public $SigningLocation; // SigningLocationCode
  public $CustomFields; // ArrayOfCustomField
  public $VaultingOptions; // VaultingOptions
  public $AutoNavigation; // boolean
  public $EnvelopeIdStamping; // boolean
  public $AuthoritativeCopy; // boolean
  public $Notification; // Notification
  public $EnvelopeAttachment; // ArrayOfAttachment
  public $EnforceSignerVisibility; // boolean
  public $EnableWetSign; // boolean
  public $AllowMarkup; // boolean
  public $EventNotification; // EventNotification
}

class Document {
  public $ID; // positiveInteger
  public $Name; // string
  public $PDFBytes; // base64Binary
  public $Password; // string
  public $TransformPdfFields; // boolean
  public $FileExtension; // string
  public $MatchBoxes; // ArrayOfMatchBox
  public $AttachmentDescription; // string
}

class MatchBox {
  public $PageNumber; // positiveInteger
  public $XPosition; // int
  public $YPosition; // int
  public $Width; // int
  public $Height; // int
}

class Recipient {
  public $ID; // positiveInteger
  public $UserName; // string
  public $SignerName; // string
  public $Email; // string
  public $Type; // RecipientTypeCode
  public $AccessCode; // string
  public $AddAccessCodeToEmail; // boolean
  public $RequireIDLookup; // boolean
  public $IDCheckConfigurationName; // string
  public $PhoneAuthentication; // RecipientPhoneAuthentication
  public $SignatureInfo; // RecipientSignatureInfo
  public $CaptiveInfo; // RecipientCaptiveInfo
  public $CustomFields; // ArrayOfString1
  public $RoutingOrder; // unsignedShort
  public $IDCheckInformationInput; // IDCheckInformationInput
  public $AutoNavigation; // boolean
  public $RecipientAttachment; // ArrayOfAttachment
  public $Note; // string
  public $RoleName; // string
  public $TemplateLocked; // boolean
  public $TemplateRequired; // boolean
  public $TemplateAccessCodeRequired; // boolean
  public $DefaultRecipient; // boolean
}

class RecipientTypeCode {
  const Signer = 'Signer';
  const Agent = 'Agent';
  const Editor = 'Editor';
  const CarbonCopy = 'CarbonCopy';
  const CertifiedDelivery = 'CertifiedDelivery';
  const InPersonSigner = 'InPersonSigner';
}

class RecipientPhoneAuthentication {
  public $RecipMayProvideNumber; // boolean
  public $ValidateRecipProvidedNumber; // boolean
  public $RecordVoicePrint; // boolean
  public $SenderProvidedNumbers; // ArrayOfString
}

class RecipientSignatureInfo {
  public $SignatureName; // string
  public $SignatureInitials; // string
  public $FontStyle; // FontStyleCode
}

class FontStyleCode {
  const RageItalic = 'RageItalic';
  const Mistral = 'Mistral';
  const BradleyHandITC = 'BradleyHandITC';
  const KaufmannBT = 'KaufmannBT';
  const Freehand575 = 'Freehand575';
  const LuciaBT = 'LuciaBT';
  const DocuSign1 = 'DocuSign1';
  const DocuSign2 = 'DocuSign2';
  const DocuSign3 = 'DocuSign3';
  const DocuSign4 = 'DocuSign4';
  const DocuSign5 = 'DocuSign5';
  const DocuSign6 = 'DocuSign6';
  const DocuSign7 = 'DocuSign7';
  const DocuSign8 = 'DocuSign8';
}

class RecipientCaptiveInfo {
  public $ClientUserId; // string
}

class IDCheckInformationInput {
  public $AddressInformationInput; // AddressInformationInput
  public $DOBInformationInput; // DOBInformationInput
  public $SSN4InformationInput; // SSN4InformationInput
  public $SSN9InformationInput; // SSN9InformationInput
}

class AddressInformationInput {
  public $AddressInformation; // AddressInformation
  public $DisplayLevel; // DisplayLevelCode
  public $ReceiveInResponse; // boolean
}

class AddressInformation {
  public $Street1; // string
  public $Street2; // string
  public $City; // string
  public $State; // string
  public $Zip; // string
  public $ZipPlus4; // string
}

class DisplayLevelCode {
  const ReadOnly = 'ReadOnly';
  const Editable = 'Editable';
  const DoNotDisplay = 'DoNotDisplay';
}

class DOBInformationInput {
  public $DOBInformation; // DOBInformation
  public $DisplayLevel; // DisplayLevelCode
  public $ReceiveInResponse; // boolean
}

class DOBInformation {
  public $DOB; // dateTime
}

class SSN4InformationInput {
  public $SSN4Information; // SSN4Information
  public $DisplayLevel; // DisplayLevelCode
  public $ReceiveInResponse; // boolean
}

class SSN4Information {
  public $SSN4; // string
}

class SSN9InformationInput {
  public $SSN9Information; // SSN9Information
  public $DisplayLevel; // DisplayLevelCode
}

class SSN9Information {
  public $SSN9; // string
}

class Attachment {
  public $Data; // base64Binary
  public $Label; // string
  public $Type; // string
}

class Tab {
  public $DocumentID; // positiveInteger
  public $RecipientID; // positiveInteger
  public $PageNumber; // nonNegativeInteger
  public $XPosition; // nonNegativeInteger
  public $YPosition; // nonNegativeInteger
  public $ScaleValue; // decimal
  public $AnchorTabItem; // AnchorTab
  public $Type; // TabTypeCode
  public $Name; // string
  public $TabLabel; // string
  public $Value; // string
  public $CustomTabType; // CustomTabType
  public $CustomTabWidth; // int
  public $CustomTabHeight; // int
  public $CustomTabRequired; // boolean
  public $CustomTabLocked; // boolean
  public $CustomTabDisableAutoSize; // boolean
  public $CustomTabListItems; // string
  public $CustomTabListValues; // string
  public $CustomTabListSelectedValue; // string
  public $CustomTabRadioGroupName; // string
  public $CustomTabValidationPattern; // string
  public $CustomTabValidationMessage; // string
  public $TemplateLocked; // boolean
  public $TemplateRequired; // boolean
  public $ConditionalParentLabel; // string
  public $ConditionalParentValue; // string
  public $SharedTab; // boolean
  public $RequireInitialOnSharedTabChange; // boolean
  public $ConcealValueOnDocument; // boolean
}

class AnchorTab {
  public $AnchorTabString; // string
  public $XOffset; // double
  public $YOffset; // double
  public $Unit; // UnitTypeCode
  public $IgnoreIfNotPresent; // boolean
}

class UnitTypeCode {
  const Pixels = 'Pixels';
  const Mms = 'Mms';
  const Cms = 'Cms';
  const Inches = 'Inches';
}

class TabTypeCode {
  const InitialHere = 'InitialHere';
  const SignHere = 'SignHere';
  const FullName = 'FullName';
  const Company = 'Company';
  const Title = 'Title';
  const DateSigned = 'DateSigned';
  const InitialHereOptional = 'InitialHereOptional';
  const EnvelopeID = 'EnvelopeID';
  const Custom = 'Custom';
  const SignerAttachment = 'SignerAttachment';
  const SignHereOptional = 'SignHereOptional';
}

class CustomTabType {
  const Text = 'Text';
  const Checkbox = 'Checkbox';
  const Radio = 'Radio';
  const _List = 'List';
  const Date = 'Date';
  const Number = 'Number';
  const SSN = 'SSN';
  const ZIP5 = 'ZIP5';
  const ZIP5DASH4 = 'ZIP5DASH4';
  const Email = 'Email';
}

class SigningLocationCode {
  const InPerson = 'InPerson';
  const Online = 'Online';
}

class CustomField {
  public $Name; // string
  public $Show; // string
  public $Required; // string
  public $Value; // string
  public $CustomFieldType; // CustomFieldType
  public $ListItems; // string
}

class CustomFieldType {
  const Text = 'Text';
  const _List = 'List';
}

class VaultingOptions {
  public $VaultingMode; // VaultingModeCode
  public $EODTransactionName; // string
  public $EODDocumentName; // string
  public $EODDocumentDescription; // string
}

class VaultingModeCode {
  const None = 'None';
  const EODeStore = 'EODeStore';
  const EODAuthoritativeCopy = 'EODAuthoritativeCopy';
}

class Notification {
  public $UseAccountDefaults; // boolean
  public $Reminders; // Reminders
  public $Expirations; // Expirations
}

class Reminders {
  public $ReminderEnabled; // boolean
  public $ReminderDelay; // nonNegativeInteger
  public $ReminderFrequency; // nonNegativeInteger
}

class Expirations {
  public $ExpireEnabled; // boolean
  public $ExpireAfter; // nonNegativeInteger
  public $ExpireWarn; // nonNegativeInteger
}

class EventNotification {
  public $URL; // string
  public $LoggingEnabled; // boolean
  public $EnvelopeEvents; // ArrayOfEnvelopeEvent
}

class EnvelopeEvent {
  public $EnvelopeEventStatusCode; // EnvelopeEventStatusCode
  public $IncludeDocuments; // boolean
}

class EnvelopeEventStatusCode {
  const Sent = 'Sent';
  const Delivered = 'Delivered';
  const Completed = 'Completed';
  const Declined = 'Declined';
  const Voided = 'Voided';
}

class CreateEnvelopeResponse {
  public $CreateEnvelopeResult; // EnvelopeStatus
}

class EnvelopeStatus {
  public $RecipientStatuses; // ArrayOfRecipientStatus
  public $TimeGenerated; // dateTime
  public $EnvelopeID; // string
  public $Subject; // string
  public $UserName; // string
  public $Email; // string
  public $Status; // EnvelopeStatusCode
  public $Created; // dateTime
  public $Deleted; // dateTime
  public $Sent; // dateTime
  public $Delivered; // dateTime
  public $Signed; // dateTime
  public $Completed; // dateTime
  public $Declined; // dateTime
  public $TimedOut; // dateTime
  public $ACStatus; // string
  public $ACStatusDate; // dateTime
  public $ACHolder; // string
  public $ACHolderEmail; // string
  public $ACHolderLocation; // string
  public $SigningLocation; // SigningLocationCode
  public $SenderIPAddress; // string
  public $EnvelopePDFHash; // string
  public $CustomFields; // ArrayOfCustomField
  public $VaultingDetails; // VaultingDetails
  public $AutoNavigation; // boolean
  public $EnvelopeIdStamping; // boolean
  public $AuthoritativeCopy; // boolean
  public $EnvelopeAttachment; // ArrayOfAttachment
  public $DocumentStatuses; // ArrayOfDocumentStatus
  public $FormData; // FormData
}

class RecipientStatus {
  public $Type; // RecipientTypeCode
  public $Email; // string
  public $UserName; // string
  public $RoutingOrder; // unsignedShort
  public $Sent; // dateTime
  public $Delivered; // dateTime
  public $Signed; // dateTime
  public $Declined; // dateTime
  public $DeclineReason; // string
  public $Status; // RecipientStatusCode
  public $RecipientIPAddress; // string
  public $ClientUserId; // string
  public $AutoNavigation; // boolean
  public $IDCheckInformation; // IDCheckInformation
  public $RecipientAuthenticationStatus; // AuthenticationStatus
  public $CustomFields; // ArrayOfString1
  public $TabStatuses; // ArrayOfTabStatus
  public $RecipientAttachment; // ArrayOfAttachment
  public $AccountStatus; // string
  public $EsignAgreementInformation; // RecipientStatusEsignAgreementInformation
  public $FormData; // FormData
  public $RecipientId; // string
}

class RecipientStatusCode {
  const Created = 'Created';
  const Sent = 'Sent';
  const Delivered = 'Delivered';
  const Signed = 'Signed';
  const Declined = 'Declined';
  const Completed = 'Completed';
  const FaxPending = 'FaxPending';
}

class IDCheckInformation {
  public $AddressInformation; // AddressInformation
  public $DOBInformation; // DOBInformation
  public $SSN4Information; // SSN4Information
}

class AuthenticationStatus {
  public $AccessCodeResult; // EventResult
  public $IDQuestionsResult; // EventResult
  public $IDLookupResult; // EventResult
  public $AgeVerifyResult; // EventResult
  public $STANPinResult; // EventResult
  public $OFACResult; // EventResult
  public $PhoneAuthResult; // EventResult
}

class EventResult {
  public $Status; // EventStatusCode
  public $EventTimestamp; // dateTime
}

class EventStatusCode {
  const Passed = 'Passed';
  const Failed = 'Failed';
}

class TabStatus {
  public $TabType; // TabTypeCode
  public $Status; // string
  public $XPosition; // double
  public $YPosition; // double
  public $Signed; // dateTime
  public $TabLabel; // string
  public $TabName; // string
  public $TabValue; // string
  public $DocumentID; // positiveInteger
  public $PageNumber; // nonNegativeInteger
  public $OriginalValue; // string
  public $ValidationPattern; // string
  public $RoleName; // string
  public $ListValues; // string
  public $ListSelectedValue; // string
  public $ScaleValue; // decimal
  public $CustomTabType; // CustomTabType
}

class RecipientStatusEsignAgreementInformation {
  public $AccountEsignId; // string
  public $UserEsignId; // string
  public $AgreementDate; // dateTime
}

class FormData {
  public $xfdf; // FormDataXfdf
}

class FormDataXfdf {
  public $fields; // ArrayOfFormDataXfdfField
}

class FormDataXfdfField {
  public $value; // string
  public $name; // string
}

class EnvelopeStatusCode {
  const Any = 'Any';
  const Voided = 'Voided';
  const Created = 'Created';
  const Deleted = 'Deleted';
  const Sent = 'Sent';
  const Delivered = 'Delivered';
  const Signed = 'Signed';
  const Completed = 'Completed';
  const Declined = 'Declined';
  const TimedOut = 'TimedOut';
  const Template = 'Template';
  const Processing = 'Processing';
}

class VaultingDetails {
  public $EODTransactionName; // string
  public $EODTransactionID; // string
  public $EODDocumentProfileID; // string
}

class DocumentStatus {
  public $ID; // positiveInteger
  public $Name; // string
  public $TemplateName; // string
  public $Sequence; // positiveInteger
}

class CreateAndSendEnvelope {
  public $Envelope; // Envelope
}

class CreateAndSendEnvelopeResponse {
  public $CreateAndSendEnvelopeResult; // EnvelopeStatus
}

class SendEnvelope {
  public $EnvelopeId; // string
  public $AccountId; // string
}

class SendEnvelopeResponse {
  public $SendEnvelopeResult; // EnvelopeStatus
}

class CorrectAndResendEnvelope {
  public $Correction; // Correction
}

class Correction {
  public $EnvelopeID; // string
  public $EnvelopeSettingsCorrection; // EnvelopeSettings
  public $RecipientCorrections; // ArrayOfRecipientCorrection
}

class EnvelopeSettings {
  public $AutoNavigation; // boolean
  public $EnvelopeIdStamping; // boolean
}

class RecipientCorrection {
  public $PreviousUserName; // string
  public $PreviousEmail; // string
  public $PreviousRoutingOrder; // unsignedShort
  public $PreviousSignerName; // string
  public $CorrectedUserName; // string
  public $CorrectedSignerName; // string
  public $CorrectedEmail; // string
  public $CorrectedCaptiveInfo; // RecipientCorrectionCorrectedCaptiveInfo
  public $CorrectedAccessCode; // string
  public $CorrectedAccessCodeRequired; // boolean
  public $CorrectedRequireIDLookup; // boolean
  public $CorrectedIDCheckConfigurationName; // string
  public $CorrectedRoutingOrder; // unsignedShort
  public $CorrectedAutoNavigation; // boolean
  public $CorrectedIDCheckInformationInput; // IDCheckInformationInput
  public $Resend; // boolean
}

class RecipientCorrectionCorrectedCaptiveInfo {
  public $ClientUserId; // string
}

class CorrectAndResendEnvelopeResponse {
  public $CorrectAndResendEnvelopeResult; // CorrectionStatus
}

class CorrectionStatus {
  public $EnvelopeSettingsCorrectionStatus; // EnvelopeSettings
  public $RecipientCorrectionStatuses; // ArrayOfRecipientCorrectionStatus
}

class RecipientCorrectionStatus {
  public $CorrectionSucceeded; // boolean
  public $RecipientCorrection; // RecipientCorrection
  public $RecipientStatus; // RecipientStatus
}

class RequestPDFNoWaterMark {
  public $EnvelopeID; // string
}

class RequestPDFNoWaterMarkResponse {
  public $RequestPDFNoWaterMarkResult; // EnvelopePDF
}

class EnvelopePDF {
  public $EnvelopeID; // string
  public $PDFBytes; // base64Binary
}

class RequestPDF {
  public $EnvelopeID; // string
}

class RequestPDFResponse {
  public $RequestPDFResult; // EnvelopePDF
}

class RequestPDFWithCert {
  public $EnvelopeID; // string
  public $AddWaterMark; // boolean
}

class RequestPDFWithCertResponse {
  public $RequestPDFWithCertResult; // EnvelopePDF
}

class RequestDocumentPDFs {
  public $EnvelopeID; // string
}

class RequestDocumentPDFsResponse {
  public $RequestDocumentPDFsResult; // DocumentPDFs
}

class DocumentPDFs {
  public $EnvelopeId; // string
  public $DocumentPDF; // DocumentPDF
}

class DocumentPDF {
  public $Name; // string
  public $PDFBytes; // base64Binary
  public $DocumentID; // positiveInteger
  public $DocumentType; // DocumentType
}

class DocumentType {
  const SUMMARY = 'SUMMARY';
  const CONTENT = 'CONTENT';
}

class RequestDocumentPDFsEx {
  public $EnvelopeID; // string
}

class RequestDocumentPDFsExResponse {
  public $RequestDocumentPDFsExResult; // DocumentPDFs
}

class RequestDocumentPDFsRecipientsView {
  public $EnvelopeID; // string
  public $RecipientName; // string
  public $RecipientEmail; // string
}

class RequestDocumentPDFsRecipientsViewResponse {
  public $RequestDocumentPDFsRecipientsViewResult; // DocumentPDFs
}

class RequestStatusEx {
  public $EnvelopeID; // string
}

class RequestStatusExResponse {
  public $RequestStatusExResult; // EnvelopeStatus
}

class RequestStatus {
  public $EnvelopeID; // string
}

class RequestStatusResponse {
  public $RequestStatusResult; // EnvelopeStatus
}

class RequestStatusCodes {
  public $EnvelopeStatusFilter; // EnvelopeStatusFilter
}

class EnvelopeStatusFilter {
  public $UserInfo; // UserInfo
  public $AccountId; // string
  public $BeginDateTime; // EnvelopeStatusFilterBeginDateTime
  public $EndDateTime; // dateTime
  public $Statuses; // ArrayOfEnvelopeStatusCode
  public $EnvelopeIds; // ArrayOfString2
  public $StartAtIndex; // nonNegativeInteger
  public $ACStatus; // EnvelopeACStatusCode
}

class UserInfo {
  public $UserName; // string
  public $Email; // string
}

class EnvelopeStatusFilterBeginDateTime {
  public $_; // dateTime
  public $statusQualifier; // string
}

class EnvelopeACStatusCode {
  const Unknown = 'Unknown';
  const Original = 'Original';
  const Transferred = 'Transferred';
  const AuthoritativeCopy = 'AuthoritativeCopy';
  const AuthoritativeCopyExportPending = 'AuthoritativeCopyExportPending';
  const AuthoritativeCopyExported = 'AuthoritativeCopyExported';
  const DepositPending = 'DepositPending';
  const Deposited = 'Deposited';
  const DepositedEO = 'DepositedEO';
  const DepositFailed = 'DepositFailed';
}

class RequestStatusCodesResponse {
  public $RequestStatusCodesResult; // FilteredEnvelopeStatusChanges
}

class FilteredEnvelopeStatusChanges {
  public $ResultSetSize; // int
  public $EnvelopeStatusChanges; // ArrayOfEnvelopeStatusChange
}

class EnvelopeStatusChange {
  public $EnvelopeID; // string
  public $Status; // EnvelopeStatusCode
  public $StatusChanged; // dateTime
}

class RequestStatusChanges {
  public $EnvelopeStatusChangeFilter; // EnvelopeStatusChangeFilter
}

class EnvelopeStatusChangeFilter {
  public $AccountId; // string
  public $UserInfo; // UserInfo
  public $StatusChangedSince; // dateTime
  public $Statuses; // ArrayOfEnvelopeStatusCode
}

class RequestStatusChangesResponse {
  public $RequestStatusChangesResult; // FilteredEnvelopeStatusChanges
}

class RequestStatusesEx {
  public $EnvelopeStatusFilter; // EnvelopeStatusFilter
}

class RequestStatusesExResponse {
  public $RequestStatusesExResult; // FilteredEnvelopeStatuses
}

class FilteredEnvelopeStatuses {
  public $ResultSetSize; // int
  public $EnvelopeStatusFilter; // EnvelopeStatusFilter
  public $EnvelopeStatuses; // ArrayOfEnvelopeStatus
}

class RequestStatuses {
  public $EnvelopeStatusFilter; // EnvelopeStatusFilter
}

class RequestStatusesResponse {
  public $RequestStatusesResult; // FilteredEnvelopeStatuses
}

class GetRecipientEsignList {
  public $UserName; // string
  public $SenderEmail; // string
  public $SenderAccountId; // string
  public $RecipientEmail; // string
}

class GetRecipientEsignListResponse {
  public $GetRecipientEsignListResult; // RecipientEsignList
}

class RecipientEsignList {
  public $AccountId; // string
  public $RecipientEsign; // ArrayOfRecipientEsign
}

class RecipientEsign {
  public $UserName; // string
  public $Email; // string
  public $Esign; // boolean
  public $ReservedRecipientEmail; // boolean
  public $ReservedRecipientNames; // string
}

class GetRecipientList {
  public $SenderAccountId; // string
  public $RecipientEmail; // string
}

class GetRecipientListResponse {
  public $GetRecipientListResult; // RecipientList
}

class RecipientList {
  public $ReservedRecipientEmail; // boolean
  public $MultipleUsers; // boolean
  public $RecipientName; // ArrayOfString3
}

class VoidEnvelope {
  public $EnvelopeID; // string
  public $Reason; // string
}

class VoidEnvelopeResponse {
  public $VoidEnvelopeResult; // VoidEnvelopeStatus
}

class VoidEnvelopeStatus {
  public $VoidSuccess; // boolean
}

class RequestRecipientToken {
  public $EnvelopeID; // string
  public $ClientUserID; // string
  public $Username; // string
  public $Email; // string
  public $AuthenticationAssertion; // RequestRecipientTokenAuthenticationAssertion
  public $ClientURLs; // RequestRecipientTokenClientURLs
}

class RequestRecipientTokenAuthenticationAssertion {
  public $AssertionID; // string
  public $AuthenticationInstant; // dateTime
  public $AuthenticationMethod; // RequestRecipientTokenAuthenticationAssertionAuthenticationMethod
  public $SecurityDomain; // string
}

class RequestRecipientTokenAuthenticationAssertionAuthenticationMethod {
  const Password = 'Password';
  const Email = 'Email';
  const PaperDocuments = 'PaperDocuments';
  const HTTPBasicAuth = 'HTTPBasicAuth';
  const SSLMutualAuth = 'SSLMutualAuth';
  const X509Certificate = 'X509Certificate';
  const Kerberos = 'Kerberos';
  const SingleSignOn_CASiteminder = 'SingleSignOn_CASiteminder';
  const SingleSignOn_InfoCard = 'SingleSignOn_InfoCard';
  const SingleSignOn_MicrosoftActiveDirectory = 'SingleSignOn_MicrosoftActiveDirectory';
  const SingleSignOn_Passport = 'SingleSignOn_Passport';
  const SingleSignOn_SAML = 'SingleSignOn_SAML';
  const SingleSignOn_Other = 'SingleSignOn_Other';
  const Smartcard = 'Smartcard';
  const RSASecureID = 'RSASecureID';
  const Biometric = 'Biometric';
  const None = 'None';
  const KnowledgeBasedAuth = 'KnowledgeBasedAuth';
}

class RequestRecipientTokenClientURLs {
  public $OnSigningComplete; // string
  public $OnViewingComplete; // string
  public $OnCancel; // string
  public $OnDecline; // string
  public $OnSessionTimeout; // string
  public $OnTTLExpired; // string
  public $OnException; // string
  public $OnAccessCodeFailed; // string
  public $OnIdCheckFailed; // string
  public $OnFaxPending; // string
  public $GenerateSignedDocumentAsynch; // boolean
}

class RequestRecipientTokenResponse {
  public $RequestRecipientTokenResult; // string
}

class TransferEnvelope {
  public $EnvelopeID; // string
  public $AccountID; // string
  public $UserID; // string
}

class TransferEnvelopeResponse {
  public $TransferEnvelopeResult; // TransferEnvelopeStatus
}

class TransferEnvelopeStatus {
  public $TransferEnvelopeSuccess; // boolean
}

class GetAccountMembershipFeaturesList {
  public $AccountId; // string
}

class GetAccountMembershipFeaturesListResponse {
  public $GetAccountMembershipFeaturesListResult; // AccountMembershipFeaturesList
}

class AccountMembershipFeaturesList {
  public $Email; // string
  public $UserName; // string
  public $EnabledFeaturesSet; // ArrayOfString4
}

class GetAccountSettingsList {
  public $AccountId; // string
}

class GetAccountSettingsListResponse {
  public $GetAccountSettingsListResult; // AccountSettingsList
}

class AccountSettingsList {
  public $AccountSetting; // AccountSetting
}

class AccountSetting {
  public $Name; // string
  public $Value; // string
  public $Type; // string
  public $TestSetting; // string
}

class AcknowledgeAuthoritativeCopyExport {
  public $EnvelopeId; // string
  public $TransactionId; // string
  public $checkSumHash; // base64Binary
}

class AcknowledgeAuthoritativeCopyExportResponse {
  public $AcknowledgeAuthoritativeCopyExportResult; // AuthoritativeCopyExportStatus
}

class AuthoritativeCopyExportStatus {
  public $AuthoritativeCopyExportSuccess; // boolean
  public $EnvelopeId; // string
  public $ExportKey; // string
}

class ExportAuthoritativeCopy {
  public $EnvelopeId; // string
}

class ExportAuthoritativeCopyResponse {
  public $ExportAuthoritativeCopyResult; // AuthoritativeCopyExportDocuments
}

class AuthoritativeCopyExportDocuments {
  public $EnvelopeId; // string
  public $TransactionId; // string
  public $Count; // int
  public $DocumentPDF; // DocumentPDF
}

class EnvelopeAuditEvents {
  public $EnvelopeId; // string
}

class EnvelopeAuditEventsResponse {
  public $EnvelopeAuditEventsResult; // EnvelopeAuditEventsResult
}

class EnvelopeAuditEventsResult {
  public $any; // <anyXML>
}

class Ping {
}

class PingResponse {
  public $PingResult; // boolean
}

class CreateEnvelopeFromTemplates {
  public $TemplateReferences; // ArrayOfTemplateReference
  public $Recipients; // ArrayOfRecipient1
  public $EnvelopeInformation; // EnvelopeInformation
  public $ActivateEnvelope; // boolean
}

class TemplateReference {
  public $TemplateLocation; // TemplateLocationCode
  public $Template; // string
  public $Document; // Document
  public $RoleAssignments; // ArrayOfTemplateReferenceRoleAssignment
  public $FieldData; // TemplateReferenceFieldData
  public $AdditionalTabs; // ArrayOfTab
  public $Sequence; // positiveInteger
  public $TemplateAttachments; // ArrayOfAttachment
}

class TemplateLocationCode {
  const SOAP = 'SOAP';
  const PDFMetaData = 'PDFMetaData';
  const Server = 'Server';
}

class TemplateReferenceRoleAssignment {
  public $RoleName; // string
  public $RecipientID; // positiveInteger
}

class TemplateReferenceFieldData {
  public $DataValues; // ArrayOfTemplateReferenceFieldDataDataValue
}

class TemplateReferenceFieldDataDataValue {
  public $TabLabel; // string
  public $Value; // string
}

class EnvelopeInformation {
  public $TransactionID; // string
  public $Asynchronous; // boolean
  public $AccountId; // string
  public $EmailBlurb; // string
  public $Subject; // string
  public $SigningLocation; // SigningLocationCode
  public $CustomFields; // ArrayOfCustomField
  public $VaultingOptions; // VaultingOptions
  public $AutoNavigation; // boolean
  public $EnvelopeIdStamping; // boolean
  public $AuthoritativeCopy; // boolean
  public $Notification; // Notification
  public $EnforceSignerVisibility; // boolean
  public $EnableWetSign; // boolean
  public $AllowRecipientRecursion; // boolean
  public $AllowMarkup; // boolean
  public $EventNotification; // EventNotification
}

class CreateEnvelopeFromTemplatesResponse {
  public $CreateEnvelopeFromTemplatesResult; // EnvelopeStatus
}

class CreateEnvelopeFromTemplatesAndForms {
  public $EnvelopeInformation; // EnvelopeInformation
  public $CompositeTemplates; // ArrayOfCompositeTemplate
  public $ActivateEnvelope; // boolean
}

class CompositeTemplate {
  public $ServerTemplates; // ArrayOfServerTemplate
  public $InlineTemplates; // ArrayOfInlineTemplate
  public $PDFMetaDataTemplate; // PDFMetaDataTemplate
  public $Document; // Document
}

class ServerTemplate {
  public $Sequence; // positiveInteger
  public $TemplateID; // string
}

class InlineTemplate {
  public $Sequence; // positiveInteger
  public $Envelope; // Envelope
}

class PDFMetaDataTemplate {
  public $Sequence; // positiveInteger
}

class CreateEnvelopeFromTemplatesAndFormsResponse {
  public $CreateEnvelopeFromTemplatesAndFormsResult; // EnvelopeStatus
}

class GetStatusInDocuSignConnectFormat {
  public $EnvelopeID; // string
}

class GetStatusInDocuSignConnectFormatResponse {
  public $GetStatusInDocuSignConnectFormatResult; // DocuSignEnvelopeInformation
}

class DocuSignEnvelopeInformation {
  public $EnvelopeStatus; // EnvelopeStatus
  public $DocumentPDFs; // ArrayOfDocumentPDF
}

class PurgeDocuments {
  public $EnvelopeID; // string
}

class PurgeDocumentsResponse {
  public $PurgeDocumentsResult; // PurgeDocumentStatus
}

class PurgeDocumentStatus {
  public $PurgeDocumentSuccess; // boolean
  public $PurgeDocumentError; // string
}

class SaveTemplate {
  public $EnvelopeTemplate; // EnvelopeTemplate
}

class EnvelopeTemplate {
  public $EnvelopeTemplateDefinition; // EnvelopeTemplateDefinition
  public $Envelope; // Envelope
}

class EnvelopeTemplateDefinition {
  public $TemplateID; // string
  public $Name; // string
  public $Shared; // boolean
  public $TemplatePassword; // string
  public $TemplateDescription; // string
  public $LastModified; // dateTime
  public $PageCount; // int
}

class SaveTemplateResponse {
  public $SaveTemplateResult; // SaveTemplateResult
}

class SaveTemplateResult {
  public $Success; // boolean
  public $TemplateID; // string
  public $Name; // string
}

class UploadTemplate {
  public $TemplateXML; // string
  public $AccountID; // string
  public $Shared; // boolean
}

class UploadTemplateResponse {
  public $UploadTemplateResult; // SaveTemplateResult
}

class RequestTemplates {
  public $AccountID; // string
  public $IncludeAdvancedTemplates; // boolean
}

class RequestTemplatesResponse {
  public $RequestTemplatesResult; // EnvelopeTemplates
}

class EnvelopeTemplates {
  public $EnvelopeTemplateDefinition; // EnvelopeTemplateDefinition
}

class RequestTemplate {
  public $TemplateID; // string
  public $IncludeDocumentBytes; // boolean
}

class RequestTemplateResponse {
  public $RequestTemplateResult; // EnvelopeTemplate
}

class GetAuthenticationToken {
  public $GoToEnvelopeID; // string
}

class GetAuthenticationTokenResponse {
  public $GetAuthenticationTokenResult; // string
}

class GetAddressBookItems {
  public $AccountID; // string
}

class GetAddressBookItemsResponse {
  public $GetAddressBookItemsResult; // ArrayOfAddressBookItem
}

class AddressBookItem {
  public $AddressBookID; // string
  public $Email; // string
  public $UserName; // string
  public $AccountName; // string
  public $Shared; // boolean
  public $Created; // dateTime
  public $Owner; // boolean
  public $Phone1; // AddressBookPhoneNumber
  public $Phone2; // AddressBookPhoneNumber
  public $Phone3; // AddressBookPhoneNumber
  public $Phone4; // AddressBookPhoneNumber
}

class AddressBookPhoneNumber {
  public $PhoneNumber; // string
  public $Designation; // PhoneNumberDesignation
}

class PhoneNumberDesignation {
  const Home = 'Home';
  const Mobile = 'Mobile';
  const Work = 'Work';
  const Other = 'Other';
}

class UpdateAddressBookItems {
  public $AddressBookItems; // ArrayOfAddressBookItem
  public $ReturnAddressBook; // boolean
}

class UpdateAddressBookItemsResponse {
  public $UpdateAddressBookItemsResult; // UpdateAddressBookResult
}

class UpdateAddressBookResult {
  public $Success; // boolean
  public $AddressBookItems; // ArrayOfAddressBookItem1
}

class RemoveAddressBookItems {
  public $AddressBookRemoveItems; // ArrayOfAddressBookRemoveItem
  public $ReturnAddressBook; // boolean
}

class AddressBookRemoveItem {
  public $AddressBookID; // string
}

class RemoveAddressBookItemsResponse {
  public $RemoveAddressBookItemsResult; // UpdateAddressBookResult
}

class SynchEnvelope {
  public $TransactionID; // string
  public $AccountID; // string
  public $Block; // boolean
}

class SynchEnvelopeResponse {
  public $SynchEnvelopeResult; // SynchEnvelopeStatus
}

class SynchEnvelopeStatus {
  public $EnvelopeStatus; // EnvelopeStatusCode
  public $EnvelopeID; // string
}

class RequestSenderToken {
  public $EnvelopeID; // string
  public $AccountID; // string
  public $ReturnURL; // string
}

class RequestSenderTokenResponse {
  public $RequestSenderTokenResult; // string
}

class RequestCorrectToken {
  public $EnvelopeID; // string
  public $SuppressNavigation; // boolean
  public $ReturnURL; // string
}

class RequestCorrectTokenResponse {
  public $RequestCorrectTokenResult; // string
}

class GetFolderItems {
  public $FolderFilter; // FolderFilter
}

class FolderFilter {
  public $AccountId; // string
  public $FolderOwner; // UserInfo
  public $FolderTypeInfo; // FolderTypeInfo
  public $StartPosition; // int
  public $FromDate; // dateTime
  public $ToDate; // dateTime
  public $SearchText; // string
  public $Status; // EnvelopeStatusCode
}

class FolderTypeInfo {
  public $FolderType; // FolderType
  public $FolderName; // string
}

class FolderType {
  const RecycleBin = 'RecycleBin';
  const Draft = 'Draft';
  const Inbox = 'Inbox';
  const SentItems = 'SentItems';
  const Normal = 'Normal';
}

class GetFolderItemsResponse {
  public $GetFolderItemsResult; // FolderResults
}

class FolderResults {
  public $ResultSetSize; // int
  public $StartPosition; // int
  public $EndPosition; // int
  public $FolderTypeInfo; // FolderTypeInfo
  public $FolderItems; // ArrayOfFolderItem
}

class FolderItem {
  public $EnvelopeId; // string
  public $Status; // EnvelopeStatusCode
  public $Owner; // string
  public $SenderName; // string
  public $SenderEmail; // string
  public $SenderCompany; // string
  public $RecipientStatuses; // ArrayOfRecipientStatus
  public $CustomFields; // ArrayOfCustomField
  public $Created; // dateTime
  public $Sent; // dateTime
  public $Completed; // dateTime
  public $Subject; // string
}

class GetFolderList {
  public $FoldersFilter; // FoldersFilter
}

class FoldersFilter {
  public $AccountId; // string
}

class GetFolderListResponse {
  public $GetFolderListResult; // AvailableFolders
}

class AvailableFolders {
  public $Folders; // ArrayOfFolder
}

class Folder {
  public $FolderOwner; // UserInfo
  public $FolderTypeInfo; // FolderTypeInfo
}

class RequestEnvelope {
  public $EnvelopeID; // string
  public $IncludeDocumentBytes; // boolean
}

class RequestEnvelopeResponse {
  public $RequestEnvelopeResult; // Envelope
}


/**
 * APIService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class APIService extends SoapClient {

  private static $classmap = array(
                                    'CreateEnvelope' => 'CreateEnvelope',
                                    'Envelope' => 'Envelope',
                                    'Document' => 'Document',
                                    'MatchBox' => 'MatchBox',
                                    'Recipient' => 'Recipient',
                                    'RecipientTypeCode' => 'RecipientTypeCode',
                                    'RecipientPhoneAuthentication' => 'RecipientPhoneAuthentication',
                                    'RecipientSignatureInfo' => 'RecipientSignatureInfo',
                                    'FontStyleCode' => 'FontStyleCode',
                                    'RecipientCaptiveInfo' => 'RecipientCaptiveInfo',
                                    'IDCheckInformationInput' => 'IDCheckInformationInput',
                                    'AddressInformationInput' => 'AddressInformationInput',
                                    'AddressInformation' => 'AddressInformation',
                                    'DisplayLevelCode' => 'DisplayLevelCode',
                                    'DOBInformationInput' => 'DOBInformationInput',
                                    'DOBInformation' => 'DOBInformation',
                                    'SSN4InformationInput' => 'SSN4InformationInput',
                                    'SSN4Information' => 'SSN4Information',
                                    'SSN9InformationInput' => 'SSN9InformationInput',
                                    'SSN9Information' => 'SSN9Information',
                                    'Attachment' => 'Attachment',
                                    'Tab' => 'Tab',
                                    'AnchorTab' => 'AnchorTab',
                                    'UnitTypeCode' => 'UnitTypeCode',
                                    'TabTypeCode' => 'TabTypeCode',
                                    'CustomTabType' => 'CustomTabType',
                                    'SigningLocationCode' => 'SigningLocationCode',
                                    'CustomField' => 'CustomField',
                                    'CustomFieldType' => 'CustomFieldType',
                                    'VaultingOptions' => 'VaultingOptions',
                                    'VaultingModeCode' => 'VaultingModeCode',
                                    'Notification' => 'Notification',
                                    'Reminders' => 'Reminders',
                                    'Expirations' => 'Expirations',
                                    'EventNotification' => 'EventNotification',
                                    'EnvelopeEvent' => 'EnvelopeEvent',
                                    'EnvelopeEventStatusCode' => 'EnvelopeEventStatusCode',
                                    'CreateEnvelopeResponse' => 'CreateEnvelopeResponse',
                                    'EnvelopeStatus' => 'EnvelopeStatus',
                                    'RecipientStatus' => 'RecipientStatus',
                                    'RecipientStatusCode' => 'RecipientStatusCode',
                                    'IDCheckInformation' => 'IDCheckInformation',
                                    'AuthenticationStatus' => 'AuthenticationStatus',
                                    'EventResult' => 'EventResult',
                                    'EventStatusCode' => 'EventStatusCode',
                                    'TabStatus' => 'TabStatus',
                                    'RecipientStatusEsignAgreementInformation' => 'RecipientStatusEsignAgreementInformation',
                                    'FormData' => 'FormData',
                                    'FormDataXfdf' => 'FormDataXfdf',
                                    'FormDataXfdfField' => 'FormDataXfdfField',
                                    'EnvelopeStatusCode' => 'EnvelopeStatusCode',
                                    'VaultingDetails' => 'VaultingDetails',
                                    'DocumentStatus' => 'DocumentStatus',
                                    'CreateAndSendEnvelope' => 'CreateAndSendEnvelope',
                                    'CreateAndSendEnvelopeResponse' => 'CreateAndSendEnvelopeResponse',
                                    'SendEnvelope' => 'SendEnvelope',
                                    'SendEnvelopeResponse' => 'SendEnvelopeResponse',
                                    'CorrectAndResendEnvelope' => 'CorrectAndResendEnvelope',
                                    'Correction' => 'Correction',
                                    'EnvelopeSettings' => 'EnvelopeSettings',
                                    'RecipientCorrection' => 'RecipientCorrection',
                                    'RecipientCorrectionCorrectedCaptiveInfo' => 'RecipientCorrectionCorrectedCaptiveInfo',
                                    'CorrectAndResendEnvelopeResponse' => 'CorrectAndResendEnvelopeResponse',
                                    'CorrectionStatus' => 'CorrectionStatus',
                                    'RecipientCorrectionStatus' => 'RecipientCorrectionStatus',
                                    'RequestPDFNoWaterMark' => 'RequestPDFNoWaterMark',
                                    'RequestPDFNoWaterMarkResponse' => 'RequestPDFNoWaterMarkResponse',
                                    'EnvelopePDF' => 'EnvelopePDF',
                                    'RequestPDF' => 'RequestPDF',
                                    'RequestPDFResponse' => 'RequestPDFResponse',
                                    'RequestPDFWithCert' => 'RequestPDFWithCert',
                                    'RequestPDFWithCertResponse' => 'RequestPDFWithCertResponse',
                                    'RequestDocumentPDFs' => 'RequestDocumentPDFs',
                                    'RequestDocumentPDFsResponse' => 'RequestDocumentPDFsResponse',
                                    'DocumentPDFs' => 'DocumentPDFs',
                                    'DocumentPDF' => 'DocumentPDF',
                                    'DocumentType' => 'DocumentType',
                                    'RequestDocumentPDFsEx' => 'RequestDocumentPDFsEx',
                                    'RequestDocumentPDFsExResponse' => 'RequestDocumentPDFsExResponse',
                                    'RequestDocumentPDFsRecipientsView' => 'RequestDocumentPDFsRecipientsView',
                                    'RequestDocumentPDFsRecipientsViewResponse' => 'RequestDocumentPDFsRecipientsViewResponse',
                                    'RequestStatusEx' => 'RequestStatusEx',
                                    'RequestStatusExResponse' => 'RequestStatusExResponse',
                                    'RequestStatus' => 'RequestStatus',
                                    'RequestStatusResponse' => 'RequestStatusResponse',
                                    'RequestStatusCodes' => 'RequestStatusCodes',
                                    'EnvelopeStatusFilter' => 'EnvelopeStatusFilter',
                                    'UserInfo' => 'UserInfo',
                                    'EnvelopeStatusFilterBeginDateTime' => 'EnvelopeStatusFilterBeginDateTime',
                                    'EnvelopeACStatusCode' => 'EnvelopeACStatusCode',
                                    'RequestStatusCodesResponse' => 'RequestStatusCodesResponse',
                                    'FilteredEnvelopeStatusChanges' => 'FilteredEnvelopeStatusChanges',
                                    'EnvelopeStatusChange' => 'EnvelopeStatusChange',
                                    'RequestStatusChanges' => 'RequestStatusChanges',
                                    'EnvelopeStatusChangeFilter' => 'EnvelopeStatusChangeFilter',
                                    'RequestStatusChangesResponse' => 'RequestStatusChangesResponse',
                                    'RequestStatusesEx' => 'RequestStatusesEx',
                                    'RequestStatusesExResponse' => 'RequestStatusesExResponse',
                                    'FilteredEnvelopeStatuses' => 'FilteredEnvelopeStatuses',
                                    'RequestStatuses' => 'RequestStatuses',
                                    'RequestStatusesResponse' => 'RequestStatusesResponse',
                                    'GetRecipientEsignList' => 'GetRecipientEsignList',
                                    'GetRecipientEsignListResponse' => 'GetRecipientEsignListResponse',
                                    'RecipientEsignList' => 'RecipientEsignList',
                                    'RecipientEsign' => 'RecipientEsign',
                                    'GetRecipientList' => 'GetRecipientList',
                                    'GetRecipientListResponse' => 'GetRecipientListResponse',
                                    'RecipientList' => 'RecipientList',
                                    'VoidEnvelope' => 'VoidEnvelope',
                                    'VoidEnvelopeResponse' => 'VoidEnvelopeResponse',
                                    'VoidEnvelopeStatus' => 'VoidEnvelopeStatus',
                                    'RequestRecipientToken' => 'RequestRecipientToken',
                                    'RequestRecipientTokenAuthenticationAssertion' => 'RequestRecipientTokenAuthenticationAssertion',
                                    'RequestRecipientTokenAuthenticationAssertionAuthenticationMethod' => 'RequestRecipientTokenAuthenticationAssertionAuthenticationMethod',
                                    'RequestRecipientTokenClientURLs' => 'RequestRecipientTokenClientURLs',
                                    'RequestRecipientTokenResponse' => 'RequestRecipientTokenResponse',
                                    'TransferEnvelope' => 'TransferEnvelope',
                                    'TransferEnvelopeResponse' => 'TransferEnvelopeResponse',
                                    'TransferEnvelopeStatus' => 'TransferEnvelopeStatus',
                                    'GetAccountMembershipFeaturesList' => 'GetAccountMembershipFeaturesList',
                                    'GetAccountMembershipFeaturesListResponse' => 'GetAccountMembershipFeaturesListResponse',
                                    'AccountMembershipFeaturesList' => 'AccountMembershipFeaturesList',
                                    'GetAccountSettingsList' => 'GetAccountSettingsList',
                                    'GetAccountSettingsListResponse' => 'GetAccountSettingsListResponse',
                                    'AccountSettingsList' => 'AccountSettingsList',
                                    'AccountSetting' => 'AccountSetting',
                                    'AcknowledgeAuthoritativeCopyExport' => 'AcknowledgeAuthoritativeCopyExport',
                                    'AcknowledgeAuthoritativeCopyExportResponse' => 'AcknowledgeAuthoritativeCopyExportResponse',
                                    'AuthoritativeCopyExportStatus' => 'AuthoritativeCopyExportStatus',
                                    'ExportAuthoritativeCopy' => 'ExportAuthoritativeCopy',
                                    'ExportAuthoritativeCopyResponse' => 'ExportAuthoritativeCopyResponse',
                                    'AuthoritativeCopyExportDocuments' => 'AuthoritativeCopyExportDocuments',
                                    'EnvelopeAuditEvents' => 'EnvelopeAuditEvents',
                                    'EnvelopeAuditEventsResponse' => 'EnvelopeAuditEventsResponse',
                                    'EnvelopeAuditEventsResult' => 'EnvelopeAuditEventsResult',
                                    'Ping' => 'Ping',
                                    'PingResponse' => 'PingResponse',
                                    'CreateEnvelopeFromTemplates' => 'CreateEnvelopeFromTemplates',
                                    'TemplateReference' => 'TemplateReference',
                                    'TemplateLocationCode' => 'TemplateLocationCode',
                                    'TemplateReferenceRoleAssignment' => 'TemplateReferenceRoleAssignment',
                                    'TemplateReferenceFieldData' => 'TemplateReferenceFieldData',
                                    'TemplateReferenceFieldDataDataValue' => 'TemplateReferenceFieldDataDataValue',
                                    'EnvelopeInformation' => 'EnvelopeInformation',
                                    'CreateEnvelopeFromTemplatesResponse' => 'CreateEnvelopeFromTemplatesResponse',
                                    'CreateEnvelopeFromTemplatesAndForms' => 'CreateEnvelopeFromTemplatesAndForms',
                                    'CompositeTemplate' => 'CompositeTemplate',
                                    'ServerTemplate' => 'ServerTemplate',
                                    'InlineTemplate' => 'InlineTemplate',
                                    'PDFMetaDataTemplate' => 'PDFMetaDataTemplate',
                                    'CreateEnvelopeFromTemplatesAndFormsResponse' => 'CreateEnvelopeFromTemplatesAndFormsResponse',
                                    'GetStatusInDocuSignConnectFormat' => 'GetStatusInDocuSignConnectFormat',
                                    'GetStatusInDocuSignConnectFormatResponse' => 'GetStatusInDocuSignConnectFormatResponse',
                                    'DocuSignEnvelopeInformation' => 'DocuSignEnvelopeInformation',
                                    'PurgeDocuments' => 'PurgeDocuments',
                                    'PurgeDocumentsResponse' => 'PurgeDocumentsResponse',
                                    'PurgeDocumentStatus' => 'PurgeDocumentStatus',
                                    'SaveTemplate' => 'SaveTemplate',
                                    'EnvelopeTemplate' => 'EnvelopeTemplate',
                                    'EnvelopeTemplateDefinition' => 'EnvelopeTemplateDefinition',
                                    'SaveTemplateResponse' => 'SaveTemplateResponse',
                                    'SaveTemplateResult' => 'SaveTemplateResult',
                                    'UploadTemplate' => 'UploadTemplate',
                                    'UploadTemplateResponse' => 'UploadTemplateResponse',
                                    'RequestTemplates' => 'RequestTemplates',
                                    'RequestTemplatesResponse' => 'RequestTemplatesResponse',
                                    'EnvelopeTemplates' => 'EnvelopeTemplates',
                                    'RequestTemplate' => 'RequestTemplate',
                                    'RequestTemplateResponse' => 'RequestTemplateResponse',
                                    'GetAuthenticationToken' => 'GetAuthenticationToken',
                                    'GetAuthenticationTokenResponse' => 'GetAuthenticationTokenResponse',
                                    'GetAddressBookItems' => 'GetAddressBookItems',
                                    'GetAddressBookItemsResponse' => 'GetAddressBookItemsResponse',
                                    'AddressBookItem' => 'AddressBookItem',
                                    'AddressBookPhoneNumber' => 'AddressBookPhoneNumber',
                                    'PhoneNumberDesignation' => 'PhoneNumberDesignation',
                                    'UpdateAddressBookItems' => 'UpdateAddressBookItems',
                                    'UpdateAddressBookItemsResponse' => 'UpdateAddressBookItemsResponse',
                                    'UpdateAddressBookResult' => 'UpdateAddressBookResult',
                                    'RemoveAddressBookItems' => 'RemoveAddressBookItems',
                                    'AddressBookRemoveItem' => 'AddressBookRemoveItem',
                                    'RemoveAddressBookItemsResponse' => 'RemoveAddressBookItemsResponse',
                                    'SynchEnvelope' => 'SynchEnvelope',
                                    'SynchEnvelopeResponse' => 'SynchEnvelopeResponse',
                                    'SynchEnvelopeStatus' => 'SynchEnvelopeStatus',
                                    'RequestSenderToken' => 'RequestSenderToken',
                                    'RequestSenderTokenResponse' => 'RequestSenderTokenResponse',
                                    'RequestCorrectToken' => 'RequestCorrectToken',
                                    'RequestCorrectTokenResponse' => 'RequestCorrectTokenResponse',
                                    'GetFolderItems' => 'GetFolderItems',
                                    'FolderFilter' => 'FolderFilter',
                                    'FolderTypeInfo' => 'FolderTypeInfo',
                                    'FolderType' => 'FolderType',
                                    'GetFolderItemsResponse' => 'GetFolderItemsResponse',
                                    'FolderResults' => 'FolderResults',
                                    'FolderItem' => 'FolderItem',
                                    'GetFolderList' => 'GetFolderList',
                                    'FoldersFilter' => 'FoldersFilter',
                                    'GetFolderListResponse' => 'GetFolderListResponse',
                                    'AvailableFolders' => 'AvailableFolders',
                                    'Folder' => 'Folder',
                                    'RequestEnvelope' => 'RequestEnvelope',
                                    'RequestEnvelopeResponse' => 'RequestEnvelopeResponse',
                                   );

  public function APIService($wsdl = "APIService.wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param CreateEnvelope $parameters
   * @return CreateEnvelopeResponse
   */
  public function CreateEnvelope(CreateEnvelope $parameters) {
    return $this->__soapCall('CreateEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param CreateAndSendEnvelope $parameters
   * @return CreateAndSendEnvelopeResponse
   */
  public function CreateAndSendEnvelope(CreateAndSendEnvelope $parameters) {
    return $this->__soapCall('CreateAndSendEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param SendEnvelope $parameters
   * @return SendEnvelopeResponse
   */
  public function SendEnvelope(SendEnvelope $parameters) {
    return $this->__soapCall('SendEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param CorrectAndResendEnvelope $parameters
   * @return CorrectAndResendEnvelopeResponse
   */
  public function CorrectAndResendEnvelope(CorrectAndResendEnvelope $parameters) {
    return $this->__soapCall('CorrectAndResendEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestPDFNoWaterMark $parameters
   * @return RequestPDFNoWaterMarkResponse
   */
  public function RequestPDFNoWaterMark(RequestPDFNoWaterMark $parameters) {
    return $this->__soapCall('RequestPDFNoWaterMark', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestPDF $parameters
   * @return RequestPDFResponse
   */
  public function RequestPDF(RequestPDF $parameters) {
    return $this->__soapCall('RequestPDF', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestPDFWithCert $parameters
   * @return RequestPDFWithCertResponse
   */
  public function RequestPDFWithCert(RequestPDFWithCert $parameters) {
    return $this->__soapCall('RequestPDFWithCert', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestDocumentPDFs $parameters
   * @return RequestDocumentPDFsResponse
   */
  public function RequestDocumentPDFs(RequestDocumentPDFs $parameters) {
    return $this->__soapCall('RequestDocumentPDFs', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestDocumentPDFsEx $parameters
   * @return RequestDocumentPDFsExResponse
   */
  public function RequestDocumentPDFsEx(RequestDocumentPDFsEx $parameters) {
    return $this->__soapCall('RequestDocumentPDFsEx', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestDocumentPDFsRecipientsView $parameters
   * @return RequestDocumentPDFsRecipientsViewResponse
   */
  public function RequestDocumentPDFsRecipientsView(RequestDocumentPDFsRecipientsView $parameters) {
    return $this->__soapCall('RequestDocumentPDFsRecipientsView', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestStatusEx $parameters
   * @return RequestStatusExResponse
   */
  public function RequestStatusEx(RequestStatusEx $parameters) {
    return $this->__soapCall('RequestStatusEx', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestStatus $parameters
   * @return RequestStatusResponse
   */
  public function RequestStatus(RequestStatus $parameters) {
    return $this->__soapCall('RequestStatus', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestStatusCodes $parameters
   * @return RequestStatusCodesResponse
   */
  public function RequestStatusCodes(RequestStatusCodes $parameters) {
    return $this->__soapCall('RequestStatusCodes', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestStatusChanges $parameters
   * @return RequestStatusChangesResponse
   */
  public function RequestStatusChanges(RequestStatusChanges $parameters) {
    return $this->__soapCall('RequestStatusChanges', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestStatusesEx $parameters
   * @return RequestStatusesExResponse
   */
  public function RequestStatusesEx(RequestStatusesEx $parameters) {
    return $this->__soapCall('RequestStatusesEx', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestStatuses $parameters
   * @return RequestStatusesResponse
   */
  public function RequestStatuses(RequestStatuses $parameters) {
    return $this->__soapCall('RequestStatuses', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetRecipientEsignList $parameters
   * @return GetRecipientEsignListResponse
   */
  public function GetRecipientEsignList(GetRecipientEsignList $parameters) {
    return $this->__soapCall('GetRecipientEsignList', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetRecipientList $parameters
   * @return GetRecipientListResponse
   */
  public function GetRecipientList(GetRecipientList $parameters) {
    return $this->__soapCall('GetRecipientList', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param VoidEnvelope $parameters
   * @return VoidEnvelopeResponse
   */
  public function VoidEnvelope(VoidEnvelope $parameters) {
    return $this->__soapCall('VoidEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestRecipientToken $parameters
   * @return RequestRecipientTokenResponse
   */
  public function RequestRecipientToken(RequestRecipientToken $parameters) {
    return $this->__soapCall('RequestRecipientToken', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param TransferEnvelope $parameters
   * @return TransferEnvelopeResponse
   */
  public function TransferEnvelope(TransferEnvelope $parameters) {
    return $this->__soapCall('TransferEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetAccountMembershipFeaturesList $parameters
   * @return GetAccountMembershipFeaturesListResponse
   */
  public function GetAccountMembershipFeaturesList(GetAccountMembershipFeaturesList $parameters) {
    return $this->__soapCall('GetAccountMembershipFeaturesList', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetAccountSettingsList $parameters
   * @return GetAccountSettingsListResponse
   */
  public function GetAccountSettingsList(GetAccountSettingsList $parameters) {
    return $this->__soapCall('GetAccountSettingsList', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param AcknowledgeAuthoritativeCopyExport $parameters
   * @return AcknowledgeAuthoritativeCopyExportResponse
   */
  public function AcknowledgeAuthoritativeCopyExport(AcknowledgeAuthoritativeCopyExport $parameters) {
    return $this->__soapCall('AcknowledgeAuthoritativeCopyExport', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param ExportAuthoritativeCopy $parameters
   * @return ExportAuthoritativeCopyResponse
   */
  public function ExportAuthoritativeCopy(ExportAuthoritativeCopy $parameters) {
    return $this->__soapCall('ExportAuthoritativeCopy', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param EnvelopeAuditEvents $parameters
   * @return EnvelopeAuditEventsResponse
   */
  public function EnvelopeAuditEvents(EnvelopeAuditEvents $parameters) {
    return $this->__soapCall('EnvelopeAuditEvents', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param Ping $parameters
   * @return PingResponse
   */
  public function Ping(Ping $parameters) {
    return $this->__soapCall('Ping', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param CreateEnvelopeFromTemplates $parameters
   * @return CreateEnvelopeFromTemplatesResponse
   */
  public function CreateEnvelopeFromTemplates(CreateEnvelopeFromTemplates $parameters) {
    return $this->__soapCall('CreateEnvelopeFromTemplates', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param CreateEnvelopeFromTemplatesAndForms $parameters
   * @return CreateEnvelopeFromTemplatesAndFormsResponse
   */
  public function CreateEnvelopeFromTemplatesAndForms(CreateEnvelopeFromTemplatesAndForms $parameters) {
    return $this->__soapCall('CreateEnvelopeFromTemplatesAndForms', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetStatusInDocuSignConnectFormat $parameters
   * @return GetStatusInDocuSignConnectFormatResponse
   */
  public function GetStatusInDocuSignConnectFormat(GetStatusInDocuSignConnectFormat $parameters) {
    return $this->__soapCall('GetStatusInDocuSignConnectFormat', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param PurgeDocuments $parameters
   * @return PurgeDocumentsResponse
   */
  public function PurgeDocuments(PurgeDocuments $parameters) {
    return $this->__soapCall('PurgeDocuments', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param SaveTemplate $parameters
   * @return SaveTemplateResponse
   */
  public function SaveTemplate(SaveTemplate $parameters) {
    return $this->__soapCall('SaveTemplate', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UploadTemplate $parameters
   * @return UploadTemplateResponse
   */
  public function UploadTemplate(UploadTemplate $parameters) {
    return $this->__soapCall('UploadTemplate', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestTemplates $parameters
   * @return RequestTemplatesResponse
   */
  public function RequestTemplates(RequestTemplates $parameters) {
    return $this->__soapCall('RequestTemplates', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestTemplate $parameters
   * @return RequestTemplateResponse
   */
  public function RequestTemplate(RequestTemplate $parameters) {
    return $this->__soapCall('RequestTemplate', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetAuthenticationToken $parameters
   * @return GetAuthenticationTokenResponse
   */
  public function GetAuthenticationToken(GetAuthenticationToken $parameters) {
    return $this->__soapCall('GetAuthenticationToken', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetAddressBookItems $parameters
   * @return GetAddressBookItemsResponse
   */
  public function GetAddressBookItems(GetAddressBookItems $parameters) {
    return $this->__soapCall('GetAddressBookItems', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param UpdateAddressBookItems $parameters
   * @return UpdateAddressBookItemsResponse
   */
  public function UpdateAddressBookItems(UpdateAddressBookItems $parameters) {
    return $this->__soapCall('UpdateAddressBookItems', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RemoveAddressBookItems $parameters
   * @return RemoveAddressBookItemsResponse
   */
  public function RemoveAddressBookItems(RemoveAddressBookItems $parameters) {
    return $this->__soapCall('RemoveAddressBookItems', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param SynchEnvelope $parameters
   * @return SynchEnvelopeResponse
   */
  public function SynchEnvelope(SynchEnvelope $parameters) {
    return $this->__soapCall('SynchEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestSenderToken $parameters
   * @return RequestSenderTokenResponse
   */
  public function RequestSenderToken(RequestSenderToken $parameters) {
    return $this->__soapCall('RequestSenderToken', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestCorrectToken $parameters
   * @return RequestCorrectTokenResponse
   */
  public function RequestCorrectToken(RequestCorrectToken $parameters) {
    return $this->__soapCall('RequestCorrectToken', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetFolderItems $parameters
   * @return GetFolderItemsResponse
   */
  public function GetFolderItems(GetFolderItems $parameters) {
    return $this->__soapCall('GetFolderItems', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetFolderList $parameters
   * @return GetFolderListResponse
   */
  public function GetFolderList(GetFolderList $parameters) {
    return $this->__soapCall('GetFolderList', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestEnvelope $parameters
   * @return RequestEnvelopeResponse
   */
  public function RequestEnvelope(RequestEnvelope $parameters) {
    return $this->__soapCall('RequestEnvelope', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/3.0',
            'soapaction' => ''
           )
      );
  }

/* Everything above this was generated by the wsdltophp.php script.
 * Below this are some custom functions that add WSE security support to all the api calls
 * these require that two files be included (see top of this file)
 * wsdl2php: http://www.urdalen.no/wsdl2php/
 * WSASoap, WSSESoap, xmlseclibs: http://www.cdatazone.org/index.php?/archives/54-Xmlseclibs-1.2.2-Released.html
*/

	private $_username;
	private $_password;


	public function setCredentials($username, $password)
	{
	    $this->_username = $username;
	    $this->_password = $password;
	}
	public $_lastRequest;
	function __doRequest($request, $location, $saction, $version, $one_way = null)
	{
		#include_once 'WSSESoap.php';
		#include_once 'WSASoap.php';
				
		$dom = new DOMDocument('1.0');
		$dom->loadXML($request);
		$objWSA = new WSASoap($dom);
		$objWSA->addAction($saction);
		$objWSA->addTo($location);
		$objWSA->addMessageID();
		$objWSA->addReplyTo();
		
		$dom = $objWSA->getDoc();
		
		$objWSSE = new WSSESoap($dom);
		
		if (isset($this->_username) && isset($this->_password)) {
			if(!function_exists('mcrypt_module_get_algo_key_size')){
				$objWSSE->addUserTokenNoMCrypt($this->_username,$this->_password);
			} else {
				$objWSSE->addUserToken($this->_username, $this->_password);
			}
		}
		
		/* Sign all headers to include signing the WS-Addressing headers */
		$objWSSE->signAllHeaders = TRUE; // Normally uncommented

		$objWSSE->addTimestamp(300);
		// if you need to do binary certificate signing you can uncomment this (and provide the path to the cert)
		/* create new XMLSec Key using RSA SHA-1 and type is private key */
		// $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, array('type'=>'private'));

		/* load the private key from file - last arg is bool if key in file (TRUE) or is string (FALSE) */

		/* Sign the message - also signs appropraite WS-Security items */
		// $objWSSE->signSoapDoc($objKey);

		/* Add certificate (BinarySecurityToken) to the message and attach pointer to Signature */
		// $token = $objWSSE->addBinaryToken(file_get_contents(CERT_FILE));
		// $objWSSE->attachTokentoSig($token);
		
		$request = $objWSSE->saveXML();
		$this->_lastRequest = $request;
		
		return parent::__doRequest($request, $location, $saction, $version);
	}

}


?>
<?php
// TODO: Use Integrator's Key from Docusign DevCenter Account Preferences API
$IntegratorsKey = "PREF-7a494820-fcfd-4a5a-88dd-90402a914ce9";
// TODO: Use your Docusign DevCenter Account email
$UserID = "dbc1a2b2-088b-4825-a489-c71503e498cf";
// TODO: Use your Docusign DevCenter Account password
$Password = "siec9oanoapoeqiA";

// TODO: Endpoints must be changed after certification
$credapi_endpoint = "https://demo.docusign.net/api/3.0/credential.asmx";
$dsapi_endpoint = "https://demo.docusign.net/api/3.0/dsapi.asmx";
$api_endpoint = "https://demo.docusign.net/api/3.0/api.asmx";
?>
<?php
/**
 * @copyright Copyright (C) DocuSign, Inc.  All rights reserved.
 *
 * This source code is intended only as a supplement to DocuSign SDK
 * and/or on-line documentation.
 * This sample is designed to demonstrate DocuSign features and is not intended
 * for production use. Code and policy for a production application must be
 * developed to meet the specific data and security requirements of the
 * application.
 *
 * THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY
 * KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A
 * PARTICULAR PURPOSE.
 */

include_once 'include/account_creds.php'; //endpoints 'n such
// DocuSign api service proxy classes and soapclient
#include_once 'api/APIService.php';
// TODO: put in your timezone or make it null
$TimeZone = 'America/Los_Angeles';

/**
 * Prints variable dump pretty for debug and browser
 * @param unknown_type $val
 */
function print_r2($val) {
    echo '<pre>';
    print_r($val);
    echo  '</pre>';
}

/**
 * Prints variable dump pretty for debug and browser
 * @param unknown_type $val
 */
function pr($val) {
    echo '<pre>';
    print_r($val);
    echo  '</pre>';
}

/**
 * Returns xsd format datetime for start of today
 * @return string
 */
function todayXsdDate() {
    global $TimeZone;
    if ($TimeZone != null) {
        date_default_timezone_set($TimeZone);
    }
    return (date("Y") . "-" . date("m") . "-" . date("d") . "T00:00:00.00");
}

/**
 * Returns xsd format datetime for now
 * @return string
 */
function nowXsdDate() {
    global $TimeZone;
    if ($TimeZone != null) {
        date_default_timezone_set($TimeZone);
    }
    return (date("Y") . "-" . date("m") . "-" . date("d") . "T" . date("H") . ":" . date("i") . ":" . date("s"));
}

/**
 * A guid maker for all seasons (note that com_create_guid() only works on windows
 * @return string
 */
function guid(){
    if (function_exists('com_create_guid')){
        // somehow the function com_create_guid includes {}, while our webservice
        // doesn't.  Here we are changint the format by taking those curly braces out.
        $uuid = com_create_guid();
        $uuid = str_ireplace("{", "", $uuid );
        $uuid = str_ireplace("}", "", $uuid );
        return $uuid;
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
        .substr($charid, 0, 8).$hyphen
        .substr($charid, 8, 4).$hyphen
        .substr($charid,12, 4).$hyphen
        .substr($charid,16, 4).$hyphen
        .substr($charid,20,12)
        .chr(125);// "}"
        return $uuid;
    }
}


function curPageURL() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function getCallbackURL($callbackPage){
    $urlbase =  curPageURL();
    $urlbase = substr($urlbase, 0, strrpos($urlbase, '/'));
    $urlbase = $urlbase . "/" . $callbackPage;
    return $urlbase;
}

/**
 * Gets APIService SOAP client proxy that uses SOAP header authentication
 * @return APIService
 */
function getAPI() {
    loginCheck();
    global $api_endpoint;
    $api_wsdl = "api/APIService.wsdl";
    $api_options =  array('location'=>$api_endpoint,'trace'=>true,'features' => SOAP_SINGLE_ELEMENT_ARRAYS);
    $api = new APIService($api_wsdl, $api_options);
    $api->setCredentials("[" . $_SESSION["IntegratorsKey"] . "]" . $_SESSION["UserID"], $_SESSION["Password"]);
    
    return $api;
}

function addEnvelopeID($envelopeID) {
    if (isset($_SESSION["EnvelopeIDs"])) {
        array_push($_SESSION["EnvelopeIDs"], $envelopeID);
    }
    else {
        $_SESSION["EnvelopeIDs"] = array($envelopeID);
    }
}

function getLastEnvelopeID() {
    $index = count($_SESSION["EnvelopeIDs"]) - 1;
    return $_SESSION["EnvelopeIDs"][$index];
}
?>
<?php
#define('FPDF_FONTPATH', 'font/');

#$pdf=new PDF_Code39();
#$pdf->Output();
?>
<?php
?>


<?php 
#require_once('/include/session.php');
#require_once('/api/APIService.php');
#require_once('/include/utils.php');
#include_once 'http://sql.initiativelegal.com:35535/include/session.php'; // initializes session and provides
#include_once 'http://sql.initiativelegal.com:35535/api/APIService.php';
#include 'http://sql.initiativelegal.com:35535/include/utils.php';

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
function createAndSend($pdffilename,$subject,$name) {
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
        getToken($status, 1);
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

function getToken($status, $clientID) {
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
    $urls->OnFaxPending = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnIdCheckFailed = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnSessionTimeout = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnTTLExpired = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    $urls->OnViewingComplete = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    if ($_oneSigner) {
        $urls->OnSigningComplete = "http://sql.initiativelegal.com:35535/_test/thanks.php";
    }
    else {
        $urls->OnSigningComplete = "http://sql.initiativelegal.com:35535/_test/thanks.php";
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
    createAndSend($chewypdf,$pdfname,$pdfname);
		if(!$_oneSigner){
			$_showTwoSignerMessage = true;
		}
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['envelopeID'])) {
    		// Display a message that we are moving on to Signer Number 2
    		// - unless the message is suppressed (by signing from the GetStatusAndDocs page)
    		if(isset($_GET['from_gsad'])){
    			getToken(getStatus($_GET['envelopeID']),$_GET['clientID']);
    		} else {
    			$_showTransitionMessage = true;
        	getToken(getStatus($_GET['envelopeID']), 2);
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
						echo "<iframe class='embediframe' width='95%' height='95%' src='";
echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe'></iframe>";
                        }
	    		?>

</div>
    </body>
</html>


