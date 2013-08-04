<?PHP
require("style.php");
require("db.php");
require("functions.php");

echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/reports.php'>Back to reports</a><br>"; 
//$prospectiveundeliverableaddressesretainer         
	$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.Columns where TABLE_NAME = 'Data' and COLUMN_NAME!='Date' and COLUMN_NAME!='Time' and COLUMN_NAME!='1WhoFirstName' and COLUMN_NAME!='1WhoLastName' and COLUMN_NAME!='1CallBackNum' and COLUMN_NAME!='3SecondaryNumber' and COLUMN_NAME!='3Fax' and COLUMN_NAME!='3Email' and COLUMN_NAME!='3StreetLine1' and COLUMN_NAME!='3StreetLine2' and COLUMN_NAME!='3HomeCity' and COLUMN_NAME!='3HomeState' and COLUMN_NAME!='3Zipcode' and COLUMN_NAME!='caseid' and COLUMN_NAME!='brand' and COLUMN_NAME!='brandid' and COLUMN_NAME!='tenantid' and COLUMN_NAME!='uniqueid' 
	
AND COLUMN_NAME!='7cat1mealbreakcutshort' AND COLUMN_NAME!='13WasPaycheckViewableNet' AND COLUMN_NAME!='13WasWageStatementInCodes' AND COLUMN_NAME!='1LocState' AND COLUMN_NAME!='1HowdYouHear' AND COLUMN_NAME!='13AbleToIdentifyProblemsWithStub' AND COLUMN_NAME!='13DiddntUnderstandPayCalculationWhy' AND COLUMN_NAME!='13DidYouUnderstandPayCalculation' AND COLUMN_NAME!='13WasWageStatementInCodes' AND COLUMN_NAME!='13DidYouUnderstandWageStatement' AND COLUMN_NAME!='13WasPaycheckViewableNet' AND COLUMN_NAME!='4EmployeeStatusOther' AND COLUMN_NAME!='4StartMonth' AND COLUMN_NAME!='4StartYear' AND COLUMN_NAME!='4HourlyRateOther' AND COLUMN_NAME!='4StartTime' AND COLUMN_NAME!='4StartTimeOther' AND COLUMN_NAME!='4EndTime' AND COLUMN_NAME!='4EndTimeOther' AND COLUMN_NAME!='4MealBreak' AND COLUMN_NAME!='4ShiftHours' AND COLUMN_NAME!='4DailyPay' AND COLUMN_NAME!='4WorkSchedule' AND COLUMN_NAME!='4WorkScheduleOther' AND COLUMN_NAME!='4ShiftsPerWeek' AND COLUMN_NAME!='4HoursPerWeekConfirm' AND COLUMN_NAME!='4ShiftsPerWeekSpecial' AND COLUMN_NAME!='4ShiftsPerWeekSpecialOther' AND COLUMN_NAME!='4HoursPerWeekOther' AND COLUMN_NAME!='4Positions' AND COLUMN_NAME!='4Departments' AND COLUMN_NAME!='5FamiliarArb' AND COLUMN_NAME!='5DocumentsRemember' AND COLUMN_NAME!='5DocumentsRemList' AND COLUMN_NAME!='5SignedArbitration' AND COLUMN_NAME!='5OptedOutofArb' AND COLUMN_NAME!='6ClockedIn' AND COLUMN_NAME!='6ClockedInType' AND COLUMN_NAME!='6ClockedInTypeOther' AND COLUMN_NAME!='6SupNameRemember' AND COLUMN_NAME!='7ClockedForMeal' AND COLUMN_NAME!='7ClockedInType' AND COLUMN_NAME!='7MealBreakScheduled' AND COLUMN_NAME!='7MealBreakWritten' AND COLUMN_NAME!='7Cat2MealBreakMissedFreq' AND COLUMN_NAME!='7Cat2MealBreakMissedWhy' AND COLUMN_NAME!='7Cat2MealBreakMissedWantToMiss' AND COLUMN_NAME!='7Cat2MealBreakWhen' AND COLUMN_NAME!='7Cat2MealBreakAfter5th' AND COLUMN_NAME!='7Cat2MealAfter5thWhy' AND COLUMN_NAME!='7Cat2MealAfter5thHowOften' AND COLUMN_NAME!='7Cat2MealLength' AND COLUMN_NAME!='7Cat2MealBreakInteruptedFreq' AND COLUMN_NAME!='7Cat2MealBreakCutShortWhy' AND COLUMN_NAME!='7Cat2MealBreakCutShortFreq' AND COLUMN_NAME!='7Cat2ExtraHourPay' AND COLUMN_NAME!='7Cat2ExtraHourDetail'

AND COLUMN_NAME!='13GetPayStubWithCheck'
AND COLUMN_NAME!='13WasPaystubElectronic'
AND COLUMN_NAME!='7cat1mealbreakwhen'
AND COLUMN_NAME!='7cat1mealbreaklate'
AND COLUMN_NAME!='7cat1mealbreaklatewhy'
AND COLUMN_NAME!='7cat1mealbreaklatefreq'
AND COLUMN_NAME!='7cat1mealbreakinterupt'
AND COLUMN_NAME!='7cat1mealbreakinteruptwhy'
AND COLUMN_NAME!='7cat1mealbreakinteruptfreq'
AND COLUMN_NAME!='7cat1extrahourpay'
AND COLUMN_NAME!='7cat1extrahourpay'
AND COLUMN_NAME!='7evermorethan6'
AND COLUMN_NAME!='claimsmealperiods'
AND COLUMN_NAME!='claimsrestbreaks'
AND COLUMN_NAME!='claimsrestbreaks'
AND COLUMN_NAME!='claimsbagcheck'
AND COLUMN_NAME!='claimsovertime'
AND COLUMN_NAME!='claimswageafterterm'
AND COLUMN_NAME!='claimswagestatements'
AND COLUMN_NAME!='claimsseating'
AND COLUMN_NAME!='shortcheck1'
AND COLUMN_NAME!='shortcheck2'
AND COLUMN_NAME!='shortcheck3'
AND COLUMN_NAME!='shortcheck4'
AND COLUMN_NAME!='shortcheck5'
AND COLUMN_NAME!='shortcheck6'
AND COLUMN_NAME!='shortcheck7'
AND COLUMN_NAME!='shortcheck8'
AND COLUMN_NAME!='shortcheck9'
AND COLUMN_NAME!='shortcheck10'
AND COLUMN_NAME!='shortanythingelse'
AND COLUMN_NAME!='shortcoworkerinfo'
AND COLUMN_NAME!='longcoworkerinfo'
AND COLUMN_NAME!='ip'
AND COLUMN_NAME!='completedonline'
AND COLUMN_NAME!='claimsoffclockclosing'
AND COLUMN_NAME!='7evermorethan4'
AND COLUMN_NAME!='7cat1mealbreakduration'
AND COLUMN_NAME!='7cat1mealbreakforcedgotextrahour'
AND COLUMN_NAME!='7cat1mealbreakwaivedtold'
AND COLUMN_NAME!='15discusswithmgmt2discuss'
AND COLUMN_NAME!='7cat3secondmealbreakdur'
AND COLUMN_NAME!='7clockedformealother'
AND COLUMN_NAME!='1callbacklaterdetails'
AND COLUMN_NAME!='data'
AND COLUMN_NAME!='15requestreconsideration'
AND COLUMN_NAME!='15everdraftwrittencomplainthrdiscuss'
AND COLUMN_NAME!='15discusswithmgmtdiscuss'
AND COLUMN_NAME!='12quitmorethan72noticereicevecheckhow'
AND COLUMN_NAME!='4endmonthseason'
AND COLUMN_NAME!='12notcurrentcorrect'
AND COLUMN_NAME!='11howmuchot'
AND COLUMN_NAME!='10lengthwaitformgr'
AND COLUMN_NAME!='8howoftenrestcombined'
AND COLUMN_NAME!='8restbreakyesclockedoutinfo'
AND COLUMN_NAME!='7cat4howoftenmissedmeals'
AND COLUMN_NAME!='7evermorethan12'
AND COLUMN_NAME!='7cat3missed2ndmealwaivemealperiod'
AND COLUMN_NAME!='6supsotherinfo'
AND COLUMN_NAME!='6supsotherinfo'
AND COLUMN_NAME!='6supsotherhad'
AND COLUMN_NAME!='6supposition'
AND COLUMN_NAME!='6supnamelastname'
AND COLUMN_NAME!='6supnamefirstname'
AND COLUMN_NAME!='5instoresolutionexperience'
AND COLUMN_NAME!='1notqualifiedcallbackyesorno'
AND COLUMN_NAME!='15WhereElse'
AND COLUMN_NAME!='15AnyoneDraftWrittenComplaintHR'
AND COLUMN_NAME!='15EverDraftWrittenComplaintHR'
AND COLUMN_NAME!='15DiscussWithMgmt2'
AND COLUMN_NAME!='15DiscussWithMgmt'
AND COLUMN_NAME!='15AnythingElseUnfair'
AND COLUMN_NAME!='15OtherDocs'
AND COLUMN_NAME!='15DocumentList'
AND COLUMN_NAME!='15AnyDocumentsToShare'
AND COLUMN_NAME!='14WhatConsequences'
AND COLUMN_NAME!='14PermittedToSitNoHoursUntilSit'
AND COLUMN_NAME!='14DidSupTell'
AND COLUMN_NAME!='14WhyNotAllowedToSit'
AND COLUMN_NAME!='14DescribeSeating'
AND COLUMN_NAME!='14DistanceNearestChair'
AND COLUMN_NAME!='14WereThereChairs'
AND COLUMN_NAME!='14HowManyHoursAverageStanding'
AND COLUMN_NAME!='11Over40AndNotPaidWhy'
AND COLUMN_NAME!='11Over40AndNotPaid'
AND COLUMN_NAME!='11EverWorkOver40WeekHowMany'
AND COLUMN_NAME!='11EverWorkOver40WeekFreq'
AND COLUMN_NAME!='11EverWork40WeekFreq'
AND COLUMN_NAME!='11EverWorkOver40Week'
AND COLUMN_NAME!='11EverWork40Week'
AND COLUMN_NAME!='11EverNotPaidWhy'
AND COLUMN_NAME!='11EverNotPaidOTHow'
AND COLUMN_NAME!='11OTFreq'
AND COLUMN_NAME!='10FreqWaitForMgr'
AND COLUMN_NAME!='10TellYouCantLeave'
AND COLUMN_NAME!='10OnOrOffClockWaiting'
AND COLUMN_NAME!='10HaveToWaitToLeave'
AND COLUMN_NAME!='10RecallManagersLockDoors'
AND COLUMN_NAME!='9WaitForOtherBagChecks'
AND COLUMN_NAME!='9BagCheckLocation'
AND COLUMN_NAME!='9TimeClockLocation'
AND COLUMN_NAME!='9BagsCheckedAfterClocking'
AND COLUMN_NAME!='8ExtraHourPayDetail'
AND COLUMN_NAME!='8HowOftenRestInterupt'
AND COLUMN_NAME!='8WhyCouldntTakeBreakWhenWanted'
AND COLUMN_NAME!='8WhyUnable10MinRest'
AND COLUMN_NAME!='12SeventyTwoHoursOrLess2'
AND COLUMN_NAME!='4endyear'
AND COLUMN_NAME!='11Over40AndNotPaidHow'
AND COLUMN_NAME!='4EmployeeStatus'



;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$rownow = $row['COLUMN_NAME'];
		echo "<strong>".$row['COLUMN_NAME']."</strong>";
		echo "<br>";
		
		$query2 = "SELECT DISTINCT
		[$rownow]
		FROM (SELECT TOP 50000000 [$rownow] FROM Data
		where [$rownow]!='' ORDER BY [$rownow]) DERIVEDTBL;";
		
		$results2 = sqlsrv_query($conn,$query2);
		
		while($row2 = sqlsrv_fetch_array($results2))
		{
			$rownow2 = $row2[$row['COLUMN_NAME']];
			
			echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='1000px' cellpadding='2' cellspacing='0'>";
			echo "<tr>";
			echo "<td align ='center'>";
			echo $rownow.": ".$row2[$row['COLUMN_NAME']]." (<strong>";

			$query3_1 = "SELECT count(*)
			 AS COUNT FROM data where [$rownow]='$rownow2';";
			$results3_1 = sqlsrv_query($conn,$query3_1);
			while($row3_1 = sqlsrv_fetch_array($results3_1))
			{
				
				
				echo $row3_1['COUNT']."</strong>)<br>";
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='1000px' cellpadding='2' cellspacing='0'>";
				echo "<tr >";
				echo "<th width='50px'>";
				echo "Num";
				echo "</th>";				
				echo "<th width='250px'>";
				echo "UNIQUEID";
				echo "</th>";
				echo "<th width='200px'>";
				echo "First Name";
				echo "</th>";
				echo "<th width='200px'>";
				echo "Last Name";
				echo "</th>";
				echo "<th>";
				echo $rownow;
				echo "</th>";				
				echo "</tr>";
			}
			
			$query3 = "SELECT uniqueid,[$rownow] as CURRENTROW,[1WhoFirstName] as FirstName,[1WhoLastName] as LastName,
			ROW_NUMBER() OVER (ORDER BY [1WhoFirstName]) as COUNT 
			FROM data where [$rownow]='$rownow2';";
			$results3 = sqlsrv_query($conn,$query3);
			while($row3 = sqlsrv_fetch_array($results3))
			{

				echo "<tr height='55px'>";
				echo "<td>";
				echo $row3['COUNT'];
				echo "</td>";
				echo "<td>";				
				echo "<a href='client2.php?uniqueid=".$row3['uniqueid']."'>";
				echo $row3['uniqueid'];
				echo "</a>";
				echo "</td>";
				echo "<td>";
				echo $row3['FirstName'];
				echo "</td>";
				echo "<td>";
				echo $row3['LastName'];
				echo "</td>";
				echo "<td>";
				echo $row3['CURRENTROW'];
				echo "</td>";				
				echo "</tr>";
				
			}
				echo "</table>";
				echo "<br>";
		}
	}        


//////
//////$radio = array(
//////    'agentlname' => array(
//////'Alvarado',
//////'Cox',
//////'Eshghieh',
//////'Hutchings',
//////'Larsen',
//////'Martinez',
//////'Moore',
//////'Pinney',
//////'Valero',
//////'Yonan',
//////'Milford',
//////    )
//////);
//////
//////foreach($radio as $name => &$values)
//////{
//////    //echo "<br>";
//////    //echo $question;
//////    //echo "<br>";
//////    foreach($values as &$value)
//////    {
//////        $query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value';";
//////	$results = sqlsrv_query($conn,$query);
//////	while($row = sqlsrv_fetch_array($results))
//////	{
//////		$agentcount = $row['COUNT'];
//////	}  
//////        echo $value." Assigned Clients (";
//////        echo $agentcount ;
//////        echo ")";
//////        echo "<br>";
//////       
//////    }
//////}
?>