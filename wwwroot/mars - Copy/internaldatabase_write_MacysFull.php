<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<style type="text/css">

body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	margin:0;
	text-align:center;
	height:100%;
}

    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding:10px;
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:650px;
        color:#000000 !important;
        font-family:Verdana;
        font-size:12px;
    }
	.HeaderRed {
	color: #900;
}

/*this centers the whole document :)*/
div#main {

  width:1100px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
</style>
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
$whofirstname = 'Bob';

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


$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT * FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){


		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
		$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
		$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
		$brandname = $row['brand']; if (empty($brandname)) unset($brandname);
		$email = $row['email']; if (empty($email)) unset($email);
		$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
		$brand = $row['brand']; if (empty($brand)) unset($brand);
		$StreetLine1db = $row['3StreetLine1']; if (empty($StreetLine1db)) unset($StreetLine1db);
		$StreetLine2db = $row['3StreetLine2']; if (empty($StreetLine1db)) unset($StreetLine1db);

  }


$clientname = "$FirstName" . " $LastName";
if (empty($TwoSigners)) $TwoSigners = 'Create an Envelope with 2 Signers';
if (empty($RecipientEmail2)) $RecipientEmail2 = 'macyslawsuit@initiativelegal.com';
if (empty($RecipientName2)) $RecipientName2 = 'Macys Lawsuit';
if (isset($_REQUEST['clientname'])) $clientname = $_REQUEST['clientname'];
if (isset($_POST['clientname'])) $clientname = $_POST['clientname'];


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
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			
}
if (isset($_POST['1WhoLastName'])) 
{
	$wholastname = $_POST['1WhoLastName'];
	$var = "1WhoLastName";
	$vardata = $wholastname;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['GrossIncome'])) 
{
	$GrossIncome = $_POST['GrossIncome'];
	$var = "GrossIncome";
	$vardata = $GrossIncome;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['HouseHoldCount'])) 
{
	$HouseHoldCount = $_POST['HouseHoldCount'];
	$var = "HouseHoldCount";
	$vardata = $HouseHoldCount;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['1CallbackNum'])) 
{	$callbacknum = $_POST['1CallbackNum'];
	$var = "1CallbackNum";
	$vardata = $callbacknum;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3SecondaryNumber'])) 
{	$secondarynumber = $_POST['3SecondaryNumber'];
	$var = "3SecondaryNumber";
	$vardata = $secondarynumber;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3Email'])) 
{	$email = $_POST['3Email'];
	$var = "3Email";
	$vardata = $email;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3StreetLine1'])) 
{	$streetline1 = $_POST['3StreetLine1'];
	$var = "3StreetLine1";
	$vardata = $streetline1;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3StreetLine2'])) 
{	$streetline2 = $_POST['3StreetLine2'];
	$var = "3StreetLine2";
	$vardata = $streetline2;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3HomeCity'])) 
{	$homecity = $_POST['3HomeCity'];
	$var = "3HomeCity";
	$vardata = $homecity;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3HomeState'])) 
{	$homestate = $_POST['3HomeState'];
	$var = "3HomeState";
	$vardata = $homestate;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3Zipcode'])) 
{	$zipcode = $_POST['3Zipcode'];
	$var = "3Zipcode";
	$vardata = $zipcode;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['1LocState'])) 
{	$locstate = $_POST['1LocState'];
	$var = "1LocState";
	$vardata = $locstate;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['1LocCity'])) 
{	$loccity = $_POST['1LocCity'];
	$var = "1LocCity";
	$vardata = $loccity;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4EmployeeStatus'])) 
{	$employeestatus = $_POST['4EmployeeStatus'];
	$var = "4EmployeeStatus";
	$vardata = $employeestatus;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['areyoucurrentmacysemployee'])) 
{	$employeestatus = $_POST['areyoucurrentmacysemployee'];
	$var = "areyoucurrentmacysemployee";
	$vardata = $employeestatus;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['startdaymonth'])) 
{	$startdaymonth = $_POST['startdaymonth'];
	$var = "startdaymonth";
	$vardata = $startdaymonth;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['startdayday'])) 
{	$startdayday = $_POST['startdayday'];
	$var = "startdayday";
	$vardata = $startdayday;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['startdayyear'])) 
{	$startdayyear = $_POST['startdayyear'];
	$var = "startdayyear";
	$vardata = $startdayyear;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['formerlastdaymonth'])) 
{	$formerlastdaymonth = $_POST['formerlastdaymonth'];
	$var = "formerlastdaymonth";
	$vardata = $formerlastdaymonth;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['formerlastdayday'])) 
{	$formerlastdayday = $_POST['formerlastdayday'];
	$var = "formerlastdayday";
	$vardata = $formerlastdayday;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['formerlastdayyear'])) 
{	$formerlastdayyear = $_POST['formerlastdayyear'];
	$var = "formerlastdayyear";
	$vardata = $formerlastdayyear;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}


if (isset($_POST['4WorkAtMacys2004'])) 
{	$employeehourly = $_POST['4WorkAtMacys2004'];
	$var = "4WorkAtMacys2004";
	$vardata = $workatmacys2004;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4StartMonth'])) 
{	$startmonth = $_POST['4StartMonth'];
	$var = "4StartMonth";
	$vardata = $startmonth;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4StartYear'])) 
{	$startyear = $_POST['4StartYear'];
	$var = "4StartYear";
	$vardata = $startyear;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4EndMonthSeason'])) 
{	$endmonthseason = $_POST['4EndMonthSeason'];
	$var = "4EndMonthSeason";
	$vardata = $endmonthseason;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4EndYear'])) 
{	$endyear = $_POST['4EndYear'];
	$var = "4EndYear";
	$vardata = $endyear;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4HourlyRate'])) 
{	$employeehourly = $_POST['4HourlyRate'];
	$var = "4HourlyRate";
	$vardata = $employeehourly;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4EmployeeHourly'])) 
{	$EmployeeHourly = $_POST['4EmployeeHourly'];
	$var = "4EmployeeHourly";
	$vardata = $EmployeeHourly;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['4WorkSchedule'])) 
{	$workschedule = $_POST['4WorkSchedule'];
	$var = "4WorkSchedule";
	$vardata = $workschedule;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4Category'])) 
{	$category = $_POST['4Category'];
	$var = "4Category";
	$vardata = $category;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['4Positions'])) 
{	$positions = $_POST['4Positions'];
	$var = "4Positions";
	$vardata = $positions;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['5SignedArbitration'])) 
{	$signedarbitration = $_POST['5SignedArbitration'];
	$var = "5SignedArbitration";
	$vardata = $signedarbitration;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['5OptedOutofArb'])) 
{	$optedoutofarb = $_POST['5OptedOutofArb'];
	$var = "5OptedOutofArb";
	$vardata = $optedoutofarb;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['5FamiliarArb'])) 
{	$familiararb = $_POST['5FamiliarArb'];
	$var = "5FamiliarArb";
	$vardata = $familiararb;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7ClockedForMeal'])) 
{	$clockedformeal = $_POST['7ClockedForMeal'];
	$var = "7ClockedForMeal";
	$vardata = $clockedformeal;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7MealBreakScheduled'])) 
{	$mealbreakscheduled = $_POST['7MealBreakScheduled'];
	$var = "7MealBreakScheduled";
	$vardata = $mealbreakscheduled;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7MealWhenWorkingBetween5and6hours'])) 
{	$mealwhenworkingbetween5and6hours = $_POST['7MealWhenWorkingBetween5and6hours'];
	$var = "7MealWhenWorkingBetween5and6hours";
	$vardata = $mealwhenworkingbetween5and6hours;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7MealBreakMissedCat1Freq'])) 
{	$mealbreakmissedcat1freq = $_POST['7MealBreakMissedCat1Freq'];
	$var = "7MealBreakMissedCat1Freq";
	$vardata = $mealbreakmissedcat1freq;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7MealBreakMissedCat1Why'])) 
{	$mealbreakmissedcat1why = $_POST['7MealBreakMissedCat1Why'];
	$var = "7MealBreakMissedCat1Why";
	$vardata = $mealbreakmissedcat1why;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat1MealBreakLate'])) 
{	$cat1mealbreaklate = $_POST['7Cat1MealBreakLate'];
	$var = "7Cat1MealBreakLate";
	$vardata = $cat1mealbreaklate;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['7Cat1MealBreakWaived'])) 
{	$Cat1MealBreakWaived = $_POST['7Cat1MealBreakWaived'];
	$var = "7Cat1MealBreakWaived";
	$vardata = $Cat1MealBreakWaived;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}


if (isset($_POST['7Cat1MealBreakLateWhy'])) 
{	$cat1mealbreaklatewhy = $_POST['7Cat1MealBreakLateWhy'];
	$var = "7Cat1MealBreakLateWhy";
	$vardata = $cat1mealbreaklatewhy;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat1MealBreakLateFreq'])) 
{	$cat1mealbreaklatefreq = $_POST['7Cat1MealBreakLateFreq'];
	$var = "7Cat1MealBreakLateFreq";
	$vardata = $cat1mealbreaklatefreq;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat1MealBreakInterupt'])) 
{	$cat1mealbreakinterupt = $_POST['7Cat1MealBreakInterupt'];
	$var = "7Cat1MealBreakInterupt";
	$vardata = $cat1mealbreakinterupt;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat1MealBreakInteruptWhy'])) 
{	$cat1mealbreakinteruptwhy = $_POST['7Cat1MealBreakInteruptWhy'];
	$var = "7Cat1MealBreakInteruptWhy";
	$vardata = $cat1mealbreakinteruptwhy;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat1MealBreakInteruptFreq'])) 
{	$cat1mealbreakinteruptfreq = $_POST['7Cat1MealBreakInteruptFreq'];
	$var = "7Cat1MealBreakInteruptFreq";
	$vardata = $cat1mealbreakinteruptfreq;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat1ExtraHourPay'])) 
{	$cat1extrahourpay = $_POST['7Cat1ExtraHourPay'];
	$var = "7Cat1ExtraHourPay";
	$vardata = $cat1extrahourpay;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat1ExtraHourPayDetail'])) 
{	$cat1extrahourpaydetail = $_POST['7Cat1ExtraHourPayDetail'];
	$var = "7Cat1ExtraHourPayDetail";
	$vardata = $cat1extrahourpaydetail;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7EverMoreThan10'])) 
{	$evermorethan10 = $_POST['7EverMoreThan10'];
	$var = "7EverMoreThan10";
	$vardata = $evermorethan10;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat3DidGetSecondMealBreak'])) 
{	$cat3didgetsecondmealbreak = $_POST['7Cat3DidGetSecondMealBreak'];
	$var = "7Cat3DidGetSecondMealBreak";
	$vardata = $cat3didgetsecondmealbreak;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat3SecondMealBreakDur'])) 
{	$cat3secondmealbreakdur = $_POST['7Cat3SecondMealBreakDur'];
	$var = "7Cat3SecondMealBreakDur";
	$vardata = $cat3secondmealbreakdur;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat3Missed2ndMealBreakOften'])) 
{	$cat3missed2ndmealbreakoften = $_POST['7Cat3Missed2ndMealBreakOften'];
	$var = "7Cat3Missed2ndMealBreakOften";
	$vardata = $cat3missed2ndmealbreakoften;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat3Missed2ndMealWaiveMealPeriod'])) 
{	$cat3missed2ndmealwaivemealperiod = $_POST['7Cat3Missed2ndMealWaiveMealPeriod'];
	$var = "7Cat3Missed2ndMealWaiveMealPeriod";
	$vardata = $cat3missed2ndmealwaivemealperiod;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay'])) 
{	$cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay = $_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay'];
	$var = "7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay";
	$vardata = $cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8RestEverMissed'])) 
{	$restevermissed = $_POST['8RestEverMissed'];
	$var = "8RestEverMissed";
	$vardata = $restevermissed;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8HowOftenMissRest'])) 
{	$howoftenmissrest = $_POST['8HowOftenMissRest'];
	$var = "8HowOftenMissRest";
	$vardata = $howoftenmissrest;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8WhyMiss10MinRest'])) 
{	$whymiss10minrest = $_POST['8WhyMiss10MinRest'];
	$var = "8WhyMiss10MinRest";
	$vardata = $whymiss10minrest;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8RestEverInterupt'])) 
{	$resteverinterupt = $_POST['8RestEverInterupt'];
	$var = "8RestEverInterupt";
	$vardata = $resteverinterupt;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8HowOftenRestInterupt'])) 
{	$howoftenrestinterupt = $_POST['8HowOftenRestInterupt'];
	$var = "8HowOftenRestInterupt";
	$vardata = $howoftenrestinterupt;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8ExtraHourPay'])) 
{	$extrahourpay = $_POST['8ExtraHourPay'];
	$var = "8ExtraHourPay";
	$vardata = $extrahourpay;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8ExtraHourPayDetail'])) 
{	$extrahourpaydetail = $_POST['8ExtraHourPayDetail'];
	$var = "8ExtraHourPayDetail";
	$vardata = $extrahourpaydetail;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['8RestLateFreq'])) 
{	$restlatefreq = $_POST['8RestLateFreq'];
	$var = "8RestLateFreq";
	$vardata = $restlatefreq;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['9BagsChecksYesNo'])) 
{	$bagschecksyesno = $_POST['9BagsChecksYesNo'];
	$var = "9BagsChecksYesNo";
	$vardata = $bagschecksyesno;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['9BagsCheckedAfterClocking'])) 
{	$bagscheckedafterclocking = $_POST['9BagsCheckedAfterClocking'];
	$var = "9BagsCheckedAfterClocking";
	$vardata = $bagscheckedafterclocking;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['9BagsCheckedEverytimeLeaving'])) 
{	$bagscheckedeverytimeleaving = $_POST['9BagsCheckedEverytimeLeaving'];
	$var = "9BagsCheckedEverytimeLeaving";
	$vardata = $bagscheckedeverytimeleaving;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['9BagsCheckedDuration'])) 
{	$bagscheckedduration = $_POST['9BagsCheckedDuration'];
	$var = "9BagsCheckedDuration";
	$vardata = $bagscheckedduration;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['9BagsCheckedWait'])) 
{	$bagscheckedwait = $_POST['9BagsCheckedWait'];
	$var = "9BagsCheckedWait";
	$vardata = $bagscheckedwait;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['9WaitForOtherBagChecks'])) 
{	$waitforotherbagchecks = $_POST['9WaitForOtherBagChecks'];
	$var = "9WaitForOtherBagChecks";
	$vardata = $waitforotherbagchecks;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['10EverWorkClosingShift'])) 
{	$everworkclosingshift = $_POST['10EverWorkClosingShift'];
	$var = "10EverWorkClosingShift";
	$vardata = $everworkclosingshift;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['10HaveToWaitToLeave'])) 
{	$havetowaittoleave = $_POST['10HaveToWaitToLeave'];
	$var = "10HaveToWaitToLeave";
	$vardata = $havetowaittoleave;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['10OnOrOffClockWaiting'])) 
{	$onoroffclockwaiting = $_POST['10OnOrOffClockWaiting'];
	$var = "10OnOrOffClockWaiting";
	$vardata = $onoroffclockwaiting;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['10HowLongWaitToLeave'])) 
{	$howlongwaittoleave = $_POST['10HowLongWaitToLeave'];
	$var = "10HowLongWaitToLeave";
	$vardata = $howlongwaittoleave;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['10WaitForMgrToPhysicallyAfterClockedOut'])) 
{	$waitformgrtophysicallyafterclockedout = $_POST['10WaitForMgrToPhysicallyAfterClockedOut'];
	$var = "10WaitForMgrToPhysicallyAfterClockedOut";
	$vardata = $waitformgrtophysicallyafterclockedout;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['10LengthWaitForMgr'])) 
{	$lengthwaitformgr = $_POST['10LengthWaitForMgr'];
	$var = "10LengthWaitForMgr";
	$vardata = $lengthwaitformgr;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['11Over8'])) 
{	$over8 = $_POST['11Over8'];
	$var = "11Over8";
	$vardata = $over8;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['11HowMuchOT'])) 
{	$over8 = $_POST['11HowMuchOT'];
	$var = "11HowMuchOT";
	$vardata = $howmuchot;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['11EverNotPaidOT'])) 
{	$evernotpaidot = $_POST['11EverNotPaidOT'];
	$var = "11EverNotPaidOT";
	$vardata = $evernotpaidot;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['11EverWorkOffClock'])) 
{	$EverWorkOffClock = $_POST['11EverWorkOffClock'];
	$var = "11EverWorkOffClock";
	$vardata = $EverWorkOffClock;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['11OffClockMinutesPerWeek'])) 
{	$OffClockMinutesPerWeek = $_POST['11OffClockMinutesPerWeek'];
	$var = "11OffClockMinutesPerWeek";
	$vardata = $OffClockMinutesPerWeek;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}



if (isset($_POST['11EverWork40Week'])) 
{	$everwork40week = $_POST['11EverWork40Week'];
	$var = "11EverWork40Week";
	$vardata = $everwork40week;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['11EverWorkOver40WeekHowMany'])) 
{	$everworkover40weekhowmany = $_POST['11EverWorkOver40WeekHowMany'];
	$var = "11EverWorkOver40WeekHowMany";
	$vardata = $everworkover40weekhowmany;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['11Over40AndNotPaid'])) 
{	$over40andnotpaid = $_POST['11Over40AndNotPaid'];
	$var = "11Over40AndNotPaid";
	$vardata = $over40andnotpaid;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['12TermType'])) 
{	$termtype = $_POST['12TermType'];
	$var = "12TermType";
	$vardata = $termtype;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['12DidYouGetFinalCheckOnLastDay'])) 
{	$didyougetfinalcheckonlastday = $_POST['12DidYouGetFinalCheckOnLastDay'];
	$var = "12DidYouGetFinalCheckOnLastDay";
	$vardata = $didyougetfinalcheckonlastday;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['12HowLongAfterTermRecieveCheckGreaterThan72'])) 
{	$howlongaftertermrecievecheckgreaterthan72 = $_POST['12HowLongAfterTermRecieveCheckGreaterThan72'];
	$var = "12HowLongAfterTermRecieveCheckGreaterThan72";
	$vardata = $howlongaftertermrecievecheckgreaterthan72;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['12SeventyTwoHoursOrLess'])) 
{	$seventytwohoursorless = $_POST['12SeventyTwoHoursOrLess'];
	$var = "12SeventyTwoHoursOrLess";
	$vardata = $seventytwohoursorless;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['12DidYouGetFinalCheckOnLastDay'])) 
{	$didyougetfinalcheckonlastday = $_POST['12DidYouGetFinalCheckOnLastDay'];
	$var = "12DidYouGetFinalCheckOnLastDay";
	$vardata = $didyougetfinalcheckonlastday;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['13GetPayStubWithCheck'])) 
{	$getpaystubwithcheck = $_POST['13GetPayStubWithCheck'];
	$var = "13GetPayStubWithCheck";
	$vardata = $getpaystubwithcheck;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['13WasPaystubElectronic'])) 
{	$waspaystubelectronic = $_POST['13WasPaystubElectronic'];
	$var = "13WasPaystubElectronic";
	$vardata = $waspaystubelectronic;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['13DidYouUnderstandWageStatement'])) 
{	$didyouunderstandwagestatement = $_POST['13DidYouUnderstandWageStatement'];
	$var = "13DidYouUnderstandWageStatement";
	$vardata = $didyouunderstandwagestatement;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['13WasWageStatementInCodes'])) 
{	$waswagestatementincodes = $_POST['13WasWageStatementInCodes'];
	$var = "13WasWageStatementInCodes";
	$vardata = $waswagestatementincodes;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['13PayCalcMethod'])) 
{	$paycalcmethod = $_POST['13PayCalcMethod'];
	$var = "13PayCalcMethod";
	$vardata = $paycalcmethod;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['13AnyProblemsWithPay'])) 
{	$anyproblemswithpay = $_POST['13AnyProblemsWithPay'];
	$var = "13AnyProblemsWithPay";
	$vardata = $anyproblemswithpay;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14DidYourJobRequireStanding'])) 
{	$didyourjobrequirestanding = $_POST['14DidYourJobRequireStanding'];
	$var = "14DidYourJobRequireStanding";
	$vardata = $didyourjobrequirestanding;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14WereThereChairs'])) 
{	$weretherechairs = $_POST['14WereThereChairs'];
	$var = "14WereThereChairs";
	$vardata = $weretherechairs;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14DescribeSeating'])) 
{	$describeseating = $_POST['14DescribeSeating'];
	$var = "14DescribeSeating";
	$vardata = $describeseating;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14PermittedToSit'])) 
{	$permittedtosit = $_POST['14PermittedToSit'];
	$var = "14PermittedToSit";
	$vardata = $permittedtosit;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14PermittedToSitYesHoursUntilSit'])) 
{	$permittedtosityeshoursuntilsit = $_POST['14PermittedToSitYesHoursUntilSit'];
	$var = "14PermittedToSitYesHoursUntilSit";
	$vardata = $permittedtosityeshoursuntilsit;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14WhyNotAllowedToSit'])) 
{	$whynotallowedtosit = $_POST['14WhyNotAllowedToSit'];
	$var = "14WhyNotAllowedToSit";
	$vardata = $whynotallowedtosit;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14Consequences'])) 
{	$consequences = $_POST['14Consequences'];
	$var = "14Consequences";
	$vardata = $consequences;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14WhatConsequences'])) 
{	$whatconsequences = $_POST['14WhatConsequences'];
	$var = "14WhatConsequences";
	$vardata = $whatconsequences;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['14SittingWouldInterfere'])) 
{	$sittingwouldinterfere = $_POST['14SittingWouldInterfere'];
	$var = "14SittingWouldInterfere";
	$vardata = $sittingwouldinterfere;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['15AnyDocumentsToShare'])) 
{	$anydocumentstoshare = $_POST['15AnyDocumentsToShare'];
	$var = "15AnyDocumentsToShare";
	$vardata = $anydocumentstoshare;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['15DocumentList'])) $documentlist = $_POST['15DocumentList'];


//logic for fee waiver
if (isset($_POST['GrossIncome'])) 
{	$GrossIncome = $_POST['GrossIncome'];
	$var = "GrossIncome";
	$vardata = $GrossIncome;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['CommissionStructure'])) 
{	$CommissionStructure = $_POST['CommissionStructure'];
	$var = "CommissionStructure";
	$vardata = $CommissionStructure;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['EntitledToCommissions'])) 
{	$EntitledToCommissions = $_POST['EntitledToCommissions'];
	$var = "EntitledToCommissions";
	$vardata = $EntitledToCommissions;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['CommisionRate'])) 
{	$CommisionRate = $_POST['CommisionRate'];
	$var = "CommisionRate";
	$vardata = $CommisionRate;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['FinalPayCheckIncludedCommisionsOwed'])) 
{	$FinalPayCheckIncludedCommisionsOwed = $_POST['FinalPayCheckIncludedCommisionsOwed'];
	$var = "FinalPayCheckIncludedCommisionsOwed";
	$vardata = $FinalPayCheckIncludedCommisionsOwed;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['HowLongToGetFinalCommissions'])) 
{	$HowLongToGetFinalCommissions = $_POST['HowLongToGetFinalCommissions'];
	$var = "HowLongToGetFinalCommissions";
	$vardata = $HowLongToGetFinalCommissions;
	$query = "IF EXISTS (SELECT uniqueid from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}



if (isset($GrossIncome)){
if ($GrossIncome == '2793') $grossincomeprint = 'less than $2,793';
if ($GrossIncome == '2793to3783') $grossincomeprint = 'between $2,793 and $3,783';
if ($GrossIncome == '3783to4773') $grossincomeprint = 'between $3,783 and $4,773';
if ($GrossIncome == '4773to5763') $grossincomeprint = 'between $4,773 and $5,763';
if ($GrossIncome == '5763to6753') $grossincomeprint = 'between $5,763 and $6,753';
if ($GrossIncome == '6753to7743') $grossincomeprint = 'between $6,753 and $7,743';
if ($GrossIncome == '7743to8733') $grossincomeprint = 'between $7,743 and $8,733';
if ($GrossIncome == '8733to9723') $grossincomeprint = 'between $8,733 and $9,723';
if ($GrossIncome == '9723to10713') $grossincomeprint = 'between $9,723 and $10,713';
if ($GrossIncome == '10713to11703') $grossincomeprint = 'between $10,713 and $11,703';
}

if (isset($GrossIncome)) if ($GrossIncome !== 'Decline') if (isset($HouseHoldCount)) if ($HouseHoldCount !== 'Decline')
{
if ($HouseHoldCount == '1') if ($GrossIncome == '2793') $feewaivequal = 'Yes';

if ($HouseHoldCount == '2') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '2') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';

if ($HouseHoldCount == '3') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '3') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '3') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';

if ($HouseHoldCount == '4') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '4') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '4') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '4') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';

if ($HouseHoldCount == '5') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';

if ($HouseHoldCount == '6') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';

if ($HouseHoldCount == '7') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '7743to8733') $feewaivequal = 'Yes';

if ($HouseHoldCount == '8') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '7743to8733') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '8733to9723') $feewaivequal = 'Yes';

if ($HouseHoldCount == '9') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '7743to8733') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '8733to9723') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '9723to10713') $feewaivequal = 'Yes';


if ($HouseHoldCount == '10') if ($GrossIncome == '2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '7743to8733') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '8733to9723') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '9723to10713') $feewaivequal = 'Yes';
if ($HouseHoldCount == '10') if ($GrossIncome == '10713to11703') $feewaivequal = 'Yes';

}
//logic for fee waiver

 

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
//	$this->Cell(0,10,'1800 Century Park East, 2nd Floor - Los Angeles, California 90067 ','','','C');
//	$this->Ln(3);
//	$this->Cell(0,10,'877-515-4712 Main - 310.861.9051 Fax - www.InitiativeLegal.com ','','','C');
//	$this->Ln(4);
//	$this->Cell(0,10,'CLIENT INITIALS _______','','','R');
//	$this->Ln(9);
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
$pdf->AddPage();
$questiontitle = "$clientname" . ':' . "$brandname" .' Long Questionnare questions and answers - ' . "$date";

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
	if (isset($locstate))  
	{
		$question = "Was the Macy’s you worked at in California?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$locstate);
		$pdf->Ln();
	}
	if (isset($loccity))  
	{
		$question = "What city, in California, was the Macy’s you worked at located?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$loccity);
		$pdf->Ln();
	}
	if (isset($employeestatus))  
	{
		$question = "Are you a current or former employee of Macy’s?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$employeestatus);
		$pdf->Ln();
	}
	if (isset($workatmacys2004))  
	{
		$question = "Did you work at Macy’s at any time from 2004 to the present?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$workatmacys2004);
		$pdf->Ln();
	}
	if (isset($startmonth))  
	{
		$question = "What are your dates of employment at Macys? Start month:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$startmonth);
		$pdf->Ln();
	}
	if (isset($startyear))  
	{
		$question = "Start year:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$startyear);
		$pdf->Ln();
	}
	if (isset($endmonthseason))  
	{
		$question = "End month:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$endmonthseason);
		$pdf->Ln();
	}
	if (isset($endyear))  
	{
		$question = "End year:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$endyear);
		$pdf->Ln();
	}
	if (isset($employeehourly))  
	{
		$question = "How did Macys pay you your wages?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$employeehourly);
		$pdf->Ln();
	}
	if (isset($workschedule))  
	{
		$question = "Please Check all that apply to your employment at Macys:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$workschedule);
		$pdf->Ln();
	}
	if (isset($category))  
	{
		$question = "On average, how many hours was your typical shift?:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$category);
		$pdf->Ln();
	}
	if (isset($positions)) 
	{
		$question = "What was your job title at Macys?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$positions);
		$pdf->Ln();
	}
	if (isset($signedarbitration))  
	{
		$question = "At any time during your employment with Macy’s, did you sign an arbitration agreement?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$signedarbitration);
		$pdf->Ln();
	}
	if (isset($optedoutofarb))  
	{
		$question = "Did you opt-out of the arbitration agreement?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$optedoutofarb);
		$pdf->Ln();
	}
	if (isset($familiararb)) 
	{
		$question = "Are you familiar with Macy’s arbitration procedure?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$familiararb);
		$pdf->Ln();
	}
	if (isset($clockedformeal))  
	{
		$question = "Did you clock in and out for meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$clockedformeal);
		$pdf->Ln();
	}
	if (isset($mealbreakscheduled))  
	{
		$question = "Was your meal break scheduled?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$mealbreakscheduled);
		$pdf->Ln();
	}
	if (isset($mealwhenworkingbetween5and6hours)) 
	{
		$question = "Did you ever work a shift longer than 6 hours without taking a meal break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$mealwhenworkingbetween5and6hours);
		$pdf->Ln();
	}
	if (isset($mealbreakmissedcat1freq))  
	{
		$question = "How often did you miss your meal break? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$mealbreakmissedcat1freq);
		$pdf->Ln();
	}
	if (isset($mealbreakmissedcat1why))  
	{
		$question = "Why did you miss your meal break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$mealbreakmissedcat1why);
		$pdf->Ln();
	}
	if (isset($cat1mealbreaklate))  
	{
		$question = "Did you ever take your meal break after the 5th hour of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1mealbreaklate);
		$pdf->Ln();
	}
	if (isset($cat1mealbreaklatewhy))  
	{
		$question = "Why would you take your meal break later than the 5th hour?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1mealbreaklatewhy);
		$pdf->Ln();
	}
	if (isset($cat1mealbreaklatefreq))  
	{
		$question = "How often would you take a meal break after the 5th hour of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1mealbreaklatefreq);
		$pdf->Ln();
	}
	if (isset($cat1mealbreakinterupt)) 
	{
		$question = "Were your meal breaks ever interrupted or cut short, so that you had to return to work before your scheduled meal break was supposed to be over? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1mealbreakinterupt);
		$pdf->Ln();
	}
	if (isset($cat1mealbreakinteruptwhy)) 
	{
		$question = "Why were your meal breaks interrupted or cut short?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1mealbreakinteruptwhy);
		$pdf->Ln();
	}
	if (isset($cat1mealbreakinteruptfreq))  
	{
		$question = "How often were your meal breaks interrupted or cut short?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1mealbreakinteruptfreq);
		$pdf->Ln();
	}
	if (isset($cat1extrahourpay))  
	{
		$question = "Did you receive an extra hour of pay for missed, interrupted or cut short meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1extrahourpay);
		$pdf->Ln();
	}
	if (isset($cat1extrahourpaydetail))  
	{
		$question = "Did you receive an extra hour of pay for missed, interrupted or cut short meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat1extrahourpaydetail);
		$pdf->Ln();
	}
	if (isset($evermorethan10))  
	{
		$question = "Did you ever work a shift that was 10 hours long or longer?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$evermorethan10);
		$pdf->Ln();
	}
	if (isset($cat3didgetsecondmealbreak)) 
	{
		$question = "When you worked more than 10 hour shifts, did you take two 30-minute meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat3didgetsecondmealbreak);
		$pdf->Ln();
	}
	if (isset($cat3secondmealbreakdur))  
	{
		$question = "When you worked more than 10 hour shifts, did you take two 30-minute meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat3secondmealbreakdur);
		$pdf->Ln();
	}
	if (isset($cat3missed2ndmealbreakoften))  
	{
		$question = "How often were you unable to take both of your 30-minute meal breaks? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat3missed2ndmealbreakoften);
		$pdf->Ln();
	}
	if (isset($cat3missed2ndmealwaivemealperiod))  
	{
		$question = "Did you ever sign a meal period waiver or agree that you would not take both meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat3missed2ndmealwaivemealperiod);
		$pdf->Ln();
	}
	if (isset($cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay))  
	{
		$question = "Did you receive an additional hour of pay for missing either meal break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay);
		$pdf->Ln();
	}
	if (isset($restevermissed)) 
	{
		$question = "Were you ever unable to take a 10-minute rest break, for every 4 hours worked?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$restevermissed);
		$pdf->Ln();
	}
	if (isset($howoftenmissrest)) 
	{
		$question = "How often did you miss your 10-minute rest break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$howoftenmissrest);
		$pdf->Ln();
	}
	if (isset($whymiss10minrest))  
	{
		$question = "Why would you miss your 10-minute rest break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$whymiss10minrest);
		$pdf->Ln();
	}
	if (isset($resteverinterupt))  
	{
		$question = "Were your rest breaks ever interrupted or cut shorter than 10 minutes because of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$resteverinterupt);
		$pdf->Ln();
	}
	if (isset($howoftenrestinterupt))  
	{
		$question = "Were your rest breaks ever interrupted or cut shorter than 10 minutes because of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$howoftenrestinterupt);
		$pdf->Ln();
	}
	if (isset($extrahourpay))  
	{
		$question = "Were you ever paid an additional hour of pay, when you missed, had a short, or interrupted 10-minute rest breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$extrahourpay);
		$pdf->Ln();
	}
	if (isset($extrahourpaydetail))  
	{
		$question = "Were you ever paid an additional hour of pay, when you missed, had a short, or interrupted 10-minute rest breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$extrahourpaydetail);
		$pdf->Ln();
	}
	if (isset($restlatefreq))  
	{
		$question = "How often would you work more than 4 hours before taking a 10 minute rest break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$restlatefreq);
		$pdf->Ln();
	}
	if (isset($bagschecksyesno))  
	{
		$question = "Were your bags ever checked, when you were leaving the store either at the end of your shift or for a lunch break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$bagschecksyesno);
		$pdf->Ln();
	}
	if (isset($bagscheckedafterclocking))  
	{
		$question = "Would the bag check occur before or after you clocked out?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$bagscheckedafterclocking);
		$pdf->Ln();
	}
	if (isset($bagscheckedeverytimeleaving))  
	{
		$question = "How often were your bags checked?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$bagscheckedeverytimeleaving);
		$pdf->Ln();
	}
	if (isset($bagscheckedduration))  
	{
		$question = "How long would you have to wait during the bag check process before you could leave?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$bagscheckedduration);
		$pdf->Ln();
	}
	if (isset($bagscheckedwait)) 
	{
		$question = "While you were clocked out, did you have to wait for others to have their bags checked before your bags were checked?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$bagscheckedwait);
		$pdf->Ln();
	}
	if (isset($waitforotherbagchecks))  
	{
		$question = "When you had to wait for others, how long did it take?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$waitforotherbagchecks);
		$pdf->Ln();
	}
	if (isset($everworkclosingshift))  
	{
		$question = "Did you ever work the closing shift at Macy’s? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$everworkclosingshift);
		$pdf->Ln();
	}
	if (isset($havetowaittoleave))  
	{
		$question = "Did you have to wait to leave until others were ready to leave?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$havetowaittoleave);
		$pdf->Ln();
	}
	if (isset($onoroffclockwaiting))  
	{
		$question = "Were you on or off the clock while you were waiting?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$onoroffclockwaiting);
		$pdf->Ln();
	}
	if (isset($howlongwaittoleave))  
	{
		$question = "How long would you have to wait?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$howlongwaittoleave);
		$pdf->Ln();
	}
	if (isset($waitformgrtophysicallyafterclockedout))  
	{
		$question = "Did you ever clock out of your shift and have to wait for a supervisor or manager to let you out of the store?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$waitformgrtophysicallyafterclockedout);
		$pdf->Ln();
	}
	if (isset($lengthwaitformgr))  
	{
		$question = "On average, how long did you have to wait for a supervisor or manager to let you out of the store?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$lengthwaitformgr);
		$pdf->Ln();
	}
	if (isset($over8)) 
	{
		$question = "Did you ever work more than 8 hours in one day?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$over8);
		$pdf->Ln();
	}
		if (isset($howmuchot)) 
	{
		$question = "On average, how many hours (or minutes) of overtime would you work in one day?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$over8);
		$pdf->Ln();
	}
	if (isset($evernotpaidot))  
	{
		$question = "Were you paid overtime rates when you worked more than 8 hours in one day?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$evernotpaidot);
		$pdf->Ln();
	}
	if (isset($everwork40week)) 
	{
		$question = "Did you ever work more than 40 hours in one week?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$everwork40week);
		$pdf->Ln();
	}
	if (isset($everworkover40weekhowmany)) 
	{
		$question = "On average, how many hours over 40 would you work in one week?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$everworkover40weekhowmany);
		$pdf->Ln();
	}
	if (isset($over40andnotpaid))  
	{
		$question = "Were you paid overtime rates when you worked more than 40 hours in one week?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$over40andnotpaid);
		$pdf->Ln();
	}
	if (isset($termtype))  
	{
		$question = "How did you end your employment with Macys?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$termtype);
		$pdf->Ln();
	}
	if (isset($didyougetfinalcheckonlastday))  
	{
		$question = "Did you receive your final paycheck on your last day of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$didyougetfinalcheckonlastday);
		$pdf->Ln();
	}
	if (isset($howlongaftertermrecievecheckgreaterthan72))  
	{
		$question = "Did you receive your final paycheck on your last day of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$howlongaftertermrecievecheckgreaterthan72);
		$pdf->Ln();
	}
	if (isset($seventytwohoursorless))  
	{
		$question = "If you quit/resigned, did you give at least 3 days’ notice (72 hours)?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$seventytwohoursorless);
		$pdf->Ln();
	}
	if (isset($didyougetfinalcheckonlastday)) 
	{
		$question = "Did you receive your final paycheck on your last day of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$didyougetfinalcheckonlastday);
		$pdf->Ln();
	}
	if (isset($getpaystubwithcheck))  
	{
		$question = "Did you receive a wage statement or paystub with each paycheck?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$getpaystubwithcheck);
		$pdf->Ln();
	}
	if (isset($waspaystubelectronic))  
	{
		$question = "Was your paystub on paper or electronically available?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$waspaystubelectronic);
		$pdf->Ln();
	}
	if (isset($didyouunderstandwagestatement))  
	{
		$question = "Did you understand what was written on your paystub?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$didyouunderstandwagestatement);
		$pdf->Ln();
	}
	if (isset($waswagestatementincodes))  
	{
		$question = "Was the wage statement in codes?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$waswagestatementincodes);
		$pdf->Ln();
	}
	if (isset($paycalcmethod))  
	{
		$question = "How was your pay calculated?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$paycalcmethod);
		$pdf->Ln();
	}
	if (isset($anyproblemswithpay)) 
	{
		$question = "What kinds of problems did you see on your paycheck, if any?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$anyproblemswithpay);
		$pdf->Ln();
	}
	if (isset($didyourjobrequirestanding)) 
	{
		$question = "When you worked for Macy’s did the nature of your job require you to stand?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$didyourjobrequirestanding);
		$pdf->Ln();
	}
	if (isset($weretherechairs))  
	{
		$question = "Did Macy’s provide seating near your work station?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$weretherechairs);
		$pdf->Ln();
	}
	if (isset($permittedtosit))  
	{
		$question = "Could you please describe the seating arrangement provided by Macys:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$permittedtosit);
		$pdf->Ln();
	}
	if (isset($describeseating))  
	{
		$question = "Did Macy’s ever let you sit in a seat during your work shift? (Example: When you weren't actively engaged in your work duties).";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$describeseating);
		$pdf->Ln();
	}
	if (isset($permittedtosityeshoursuntilsit))  
	{
		$question = "On average, how many hours were you required to work during a normal shift until you were permitted to sit down?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$permittedtosityeshoursuntilsit);
		$pdf->Ln();
	}
	if (isset($whynotallowedtosit))  
	{
		$question = "Why were you not permitted to sit in a seat during your work shift?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$whynotallowedtosit);
		$pdf->Ln();
	}
	if (isset($consequences))  
	{
		$question = "Were there any disciplinary consequences if you were to have a seat during your work shift?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$consequences);
		$pdf->Ln();
	}
	if (isset($whatconsequences))  
	{
		$question = "What were those disciplinary consequences? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$whatconsequences);
		$pdf->Ln();
	}
	if (isset($sittingwouldinterfere))  
	{
		$question = "Do you believe that if Macy’s had permitted you to sit in a seat near your work station, sitting would have interfered with the performance of your job duties?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$sittingwouldinterfere);
		$pdf->Ln();
	}
	if (isset($anydocumentstoshare))  
	{
		$question = "Do you have any documents, of when you worked with Macy’s, which you can share with us?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$anydocumentstoshare);
		$pdf->Ln();
	}
	if (isset($documentlist))  
	{
		$question = "What documents do you have? (Please Check All that Apply)";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$documentlist);
		$pdf->Ln();
	}

$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/mars/';
$filename = $LastName.", ".$FirstName." - ".$uniqueid; 
$filename2 = $LastName.", ".$FirstName." - LongQnA - ".$uniqueid; 
$ext = ".pdf";

$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename2$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/mars/$filename2$ext","F"); //pushes file to server for temp storage


?>

<?PHP

$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$dir1 = "$dir0" . "$filename";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "".$filename."".$ext;
$file2 = "".$filename2."".$ext;
//$conn_id = ftp_connect($ftp_server);

// login with username and password
//$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

//ftp_mkdir($conn_id, $dir2);
//
//ftp_chdir($conn_id, $dir2);
//ftp_put($conn_id, $file, $file, FTP_BINARY);
//ftp_close($conn_id);
//unlink($file); //delete temp copy pdf stored on server

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
		$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday=$date,interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
		$results = sqlsrv_query($conn,$query);
			
}
?>


<?php
$link = 'https://DFWMS01.initiativelegal.com/macysdetailedquestionnaire.php?uniqueid='.$uniqueid;
?>
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<style>

body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	margin:0;
	text-align:center;
	height:100%;
}

body, div, h1, h2, h3, h4, h5, h6, p, ul, img {
	margin:0px;
	padding:0px;
}

h1{
	font-size:22px;
	line-height:28px;
}

h2{
	font-size:20px;
	line-height:26px;
	text-decoration:underline;
	padding-top:20px;
	padding-bottom:30px;
}

h3{
	font-size:18px;
	line-height:24px;
}


p{
	font-size:16px;
	text-align:left;
	padding-bottom:10px;
}

a {
	color:#9f111b;
	font-weight:bold;
	text-decoration:none;
}

.bigText{
	font-size:20px;
	text-transform:uppercase;
}

.red{
	font-weight:bold;
	color:#9f111b;
}

#main{
	width:100%;
	margin:0 auto;
	padding:20px;
}

.container{
	width:90%;
	margin:0 auto;
}

#logo{
	width:370px;
	height:36px;
	background-image:url(http://sql.initiativelegal.com:35535/whitelogo.png);
	background-repeat:none;
	text-indent:-9999px;
	margin:0 auto;
}





</style>-->
<?PHP 


	if (isset($uniqueid))
	{	
			$query = "IF EXISTS (SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid') select notelog from status  WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$currentlog = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($currentlog))
			{
			$newlog =   $date . ' @ ' . $time . ': <strong>Longform complete on phone</strong><br>' . $row['notelog'];
			}		
			$currentstatus = 'Longform complete';		
			$query = "IF EXISTS (SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',longformcompleteonphonedate='$date',longformcompleteonphoneweek='$week',longformcompleteonphonemonth='$month' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);


//if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken']))
//{
//
//
//echo "<div id='main'>";
//echo "<div class='container'>";
//echo "<div id='logo'>";
//echo "<h1>INITIATIVE LEGAL GROUP, APC</h1>";
//echo "</div>";
//echo "<h2>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h2>";
//echo "<p>On the next page, you will find an Affidavit for Waiver of Fees Notice. This will allow us to request that the American Arbitration Association waive the filing fee. Please carefully review the information to verify that it is correct.</p>";
//echo "<p>Once you have completed your review, use your computer mouse to draw your electronic signature when prompted. Don't worry if your electronic signature does not look exactly like your real signature. All that is required is that you make an original mark on this document.</p>";
//echo "<p>Please click on the &quot;confirmed signature&quot; button once you have completed the document and you will proceed to the next step of the process.</p>";
//echo "<p>This waiver will only apply and be filed with the American Arbitration Association if the Court declines to allow the pending case against Macy's to proceed as a class action with Initiative Legal Group APC as class counsel and Initiative elects to pursue your claims on an individual basis through arbitration.</p>";
//echo "</div>";
//echo "</div>";
//
//
//echo "<div id='main'>";
//echo "<table width='98%' align='center'>";
//echo "<tr>";
//echo "<td height='1400px' width='800px' align='center'>";
//echo "<iframe  align='middle' marginheight='5%' width='94%' height='94%' src='";
//echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe' frameborder='0'></iframe>";
//echo "</td>";
//echo "</tr>";
//echo "</table>";
//echo "</div>";
//}
	
}//wrap end--If they've completed the the fee waiver form already they wont see the above

#}//fee waiv qualified wrap

//if ($feewaivequal !== 'Yes')
//{
//			echo "<div id='main'>";
//			echo "<table width='900px' align='center'>";
//			echo "<tr>";
//			echo "<td align='center'>";
//			echo "<img src='http://sql.initiativelegal.com:35535/whitelogo.png'>";
//			echo "<br><br>";
//			echo "<h2><u>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</u></h2>";
//			echo "</td>";
//			echo "</tr>";
//			echo "<tr>";
//			echo "<td align='left'>";
//			echo "<p>Thank you for providing us with additional information regarding your employment with Macy's. We will review your information and will contact you directly if (and when) required.</p>";
//			echo "<br /><br />";		
//			echo "<p>For the latest updates on the status of this case, we encourage you to visit our website at www.macyslawsuit.com and click on the “Status of the Case” tab. This information will be updated periodically when there are new developments in the case.
//If you have any questions, please contact us toll-free at 1.888.792.2293, Monday through Friday.</p><br /><br />";				
//			echo "<p>If you have any questions, please contact us toll-free at 1.888.792.2293, Monday through Friday.</p><br /><br />";
//			echo "</td>";
//			echo "</tr>";
//			echo "</table>";
//			echo "</div>";

#echo $uniqueid."";
echo "<iframe scrolling='auto' width='100%' height='";
echo "2500px";
echo "' frameborder='0' style='margin:auto;' src='";
echo "client2.php";
echo "?uniqueid=";
echo $uniqueid;
echo "'></iframe>";
#echo "<br>Hello";



//}



?>


<?PHP
$link = "getauth.php";
if ($authformreceived == 'Yes')
{
	$link = "macysdetailedquestionnaire.php";
	#echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if ($completedlongformonline == 'Yes')
{
	$link = "feewaiverprequal.php";
	#echo "It looks like you've already completed our detailed questionnaire, give us a call if you have any questions.";
}
if ($feewaiverreceived == 'Yes')
{
	$link = "";
	#echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if ($feewaiverreceived == 'Not Qualified')
{
	$link = "";
	#echo "It looks like you've already completed the fee waiver, give us a call if you have any questions.";
}
?> 
<?PHP 

#if (isset($authformreceived)) if (!isset($completedlongformonline))
{//wrap this in conditional -- only if never completed the long form
#require('macysdetailedquestionnaire.php');

}//wrap end--If they've completed the long form already they wont see the above
      
?>