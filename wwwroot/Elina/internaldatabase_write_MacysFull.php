

 
<?PHP
//
////
//////print('<pre>');
//////print_r($_POST);
//////print('</pre>');
//////print_r(array_keys($_POST));
//////echo "<br><br>";
//////print_r(array_values($_POST)); 
////
//
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');


if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (isset($_POST['tenantid'])) $tenantid = $_POST['tenantid'];

if (empty($tenantid)) $tenantid = '4';
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];



if (isset($_POST['brand'])) $brandname = $_POST['brand'];

if (isset($_POST['WhoFirstName'])) $FirstName = $_POST['WhoFirstName'];
if (isset($_POST['WhoFirstName'])) $whofirstname = $_POST['WhoFirstName'];
if (isset($_POST['WhoLastName'])) $LastName = $_POST['WhoLastName'];
if (isset($_POST['WhoLastName'])) $wholastname = $_POST['WhoLastName'];

if (isset($_POST['StreetLine1'])) $streetline1 = $_POST['StreetLine1'];
if (isset($_POST['StreetLine2'])) $streetline2 = $_POST['StreetLine2'];
if (isset($_POST['HomeCity'])) $homecity = $_POST['HomeCity'];
if (isset($_POST['HomeState'])) $locstate = $_POST['HomeState'];
if (isset($_POST['Zipcode'])) $zipcode = $_POST['Zipcode'];
if (isset($_POST['1LocCity'])) $LocCity = $_POST['1LocCity'];
if (isset($_POST['Email'])) $email = $_POST['Email'];

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT authformreceived,retainerRecieved,feewaiverreceived,completedlongformonline,FirstName,LastName,brand,email,brandid ,brand,3StreetLine1,3StreetLine2 FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){


		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
#		$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
#		$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
		$brandname = $row['brand']; if (empty($brandname)) unset($brandname);
#		$email = $row['email']; if (empty($email)) unset($email);
		$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
		$brand = $row['brand']; if (empty($brand)) unset($brand);
#		$StreetLine1db = $row['3StreetLine1']; if (empty($StreetLine1db)) unset($StreetLine1db);
#		$StreetLine2db = $row['3StreetLine2']; if (empty($StreetLine1db)) unset($StreetLine1db);

  }


$clientname = $FirstName." ". $LastName;
if (empty($TwoSigners)) $TwoSigners = 'Create an Envelope with 2 Signers';
if (empty($RecipientEmail2)) $RecipientEmail2 = 'ihutchings@initiativelegal.com';
if (empty($RecipientName2)) $RecipientName2 = 'Ian Hutchings';

$query = "INSERT INTO Data (uniqueid) VALUES ('$uniqueid');";
$results = sqlsrv_query($conn,$query);

Function Longformwriteropenfield($var,$key,$uniqueid)
{
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
    if (isset($var))
    {
		 if(strstr($var,'\''))
        {
        
           $var = str_replace('\'','`',$var);
        }
/*      //strip single quote
        if(strstr($var,'\''))
        {
        
            $var = str_replace('\'','',$var);
        }
        
        //strip double quote
        if(strstr($var,'\"'))
        {
        
            $var = str_replace('\"','',$var);
        }	*/
    /*      //strip percentage
        if(strstr($var,'%'))
        {
        
            $var = str_replace('%','',$var);
        }
        //strip asterisk
        if(strstr($var,'*'))
        {
        
            $var = str_replace('*','',$var);
        }
        //strip underscore
        if(strstr($var,'_'))
        {
        
            $var = str_replace('_','',$var);
        }
        //strip ampersand
        if(strstr($var,'&'))
        {
        
            $var = str_replace('\'','',$var);
        }	
        //strip dash
        if(strstr($var,'-'))
        {
        
            $var = str_replace('-','',$var);
        }   
        //strip parenthasis open
        if(strstr($var,'('))
        {
        
                $var = preg_replace('/\(|\)/','',$var);
        }
        
        //strip parenthasis close
        if(strstr($var,')'))
        {
                $var = preg_replace('/\(|\)/','',$var); 
        }
*/
        $query = "UPDATE data set [$key]='$var' WHERE data.uniqueid='$uniqueid'";
        $results = sqlsrv_query($conn,$query);
	

    }
}
Function statusLongformwriteropenfield($var,$key,$uniqueid)
{
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
    if (isset($var))
    {
		if(strstr($var,'\''))
        {
        
           $var = str_replace('\'','`',$var);
        }
/*        //strip single quote
        if(strstr($var,'\''))
        {
        
            $var = str_replace('\'','',$var);
        }
        
        //strip double quote
        if(strstr($var,'\"'))
        {
        
            $var = str_replace('\"','',$var);
        }*/	
/*        //strip percentage
        if(strstr($var,'%'))
        {
        
            $var = str_replace('%','',$var);
        }
        //strip asterisk
        if(strstr($var,'*'))
        {
        
            $var = str_replace('*','',$var);
        }
        //strip underscore
        if(strstr($var,'_'))
        {
        
            $var = str_replace('_','',$var);
        }
        //strip ampersand
        if(strstr($var,'&'))
        {
        
            $var = str_replace('\'','',$var);
        }	
        //strip dash
        if(strstr($var,'-'))
        {
        
            $var = str_replace('-','',$var);
        }   
        //strip parenthasis open
        if(strstr($var,'('))
        {
        
                $var = preg_replace('/\(|\)/','',$var);
        }*/
        
        //strip parenthasis close
/*        if(strstr($var,')'))
        {
                $var = preg_replace('/\(|\)/','',$var); 
        }
*/
        $query = "UPDATE status set [$key]='$var' WHERE uniqueid='$uniqueid'";
        $results = sqlsrv_query($conn,$query);
	

    }
}
	if (isset($status))
	{
		$query = "UPDATE data set [$key]='$var' WHERE data.uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
if (isset($_POST['WhoFirstName'])){
statusLongformwriteropenfield($_POST['WhoFirstName'],'FirstName',$uniqueid);
}
if (isset($_POST['WhoLastName'])){
statusLongformwriteropenfield($_POST['WhoLastName'],'LastName',$uniqueid);
}
if (isset($_POST['CallbackNum'])){
statusLongformwriteropenfield($_POST['CallbackNum'],'Phone1',$uniqueid);
}
if (isset($_POST['SecondaryNum'])){
statusLongformwriteropenfield($_POST['SecondaryNum'],'Phone2',$uniqueid);
}
if (isset($_POST['Email'])){
statusLongformwriteropenfield($_POST['Email'],'Email',$uniqueid);
}
if (isset($_POST['StreetLine1'])){
statusLongformwriteropenfield($_POST['StreetLine1'],'Street1',$uniqueid);
}
if (isset($_POST['StreetLine2'])){
statusLongformwriteropenfield($_POST['StreetLine2'],'Street2',$uniqueid);
}
if (isset($_POST['HomeCity'])){
statusLongformwriteropenfield($_POST['HomeCity'],'City',$uniqueid);
}
if (isset($_POST['HomeState'])){
statusLongformwriteropenfield($_POST['HomeState'],'State',$uniqueid);
}
if (isset($_POST['Zipcode'])){
statusLongformwriteropenfield($_POST['Zipcode'],'Zipcode',$uniqueid);
}


if (isset($_POST['WhoFirstName'])){
}
Longformwriteropenfield($_POST['WhoFirstName'],'1WhoFirstName',$uniqueid);	
if (isset($_POST['WhoLastName'])){	
Longformwriteropenfield($_POST['WhoLastName'],'1WhoLastName',$uniqueid);	
}
if (isset($_POST['CallbackNum'])){
Longformwriteropenfield($_POST['CallbackNum'],'1CallbackNum',$uniqueid);	
}
if (isset($_POST['SecondaryNum'])){
Longformwriteropenfield($_POST['SecondaryNum'],'3SecondaryNumber',$uniqueid);
}
if (isset($_POST['Email'])){
Longformwriteropenfield($_POST['Email'],'3Email',$uniqueid);
}
if (isset($_POST['StreetLine1'])){
Longformwriteropenfield($_POST['StreetLine1'],'3StreetLine1',$uniqueid);
}
if (isset($_POST['StreetLine2'])){
Longformwriteropenfield($_POST['StreetLine2'],'3StreetLine2',$uniqueid);	
}
if (isset($_POST['HomeCity'])){
Longformwriteropenfield($_POST['HomeCity'],'3HomeCity',$uniqueid);
}
if (isset($_POST['HomeState'])){
Longformwriteropenfield($_POST['HomeState'],'3HomeState',$uniqueid);
}
if (isset($_POST['Zipcode'])){
Longformwriteropenfield($_POST['Zipcode'],'3Zipcode',$uniqueid);
}


if (isset($_POST['recentPosition1'])){		
Longformwriteropenfield($_POST['recentPosition1'],'recentPosition1',$uniqueid);	
}
if (isset($_POST['Zipcode'])){	
Longformwriteropenfield($_POST['recentPosition'],'recentPosition',$uniqueid);
}
if (isset($_POST['recentPositionExplain'])){		
Longformwriteropenfield($_POST['recentPositionExplain'],'recentPositionExplain',$uniqueid);	
}
if (isset($_POST['1LocCity'])){	
Longformwriteropenfield($_POST['1LocCity'],'1LocCity',$uniqueid);
}
if (isset($_POST['1LocCity2'])){		
Longformwriteropenfield($_POST['1LocCity2'],'1LocCity2',$uniqueid);	
}
if (isset($_POST['EmployeeHourly'])){	
Longformwriteropenfield($_POST['EmployeeHourly'],'EmployeeHourly',$uniqueid);
}
if (isset($_POST['PaidExplain'])){	
Longformwriteropenfield($_POST['PaidExplain'],'PaidExplain',$uniqueid);	
}
if (isset($_POST['4CurrentlyEmployed'])){	
Longformwriteropenfield($_POST['4CurrentlyEmployed'],'4CurrentlyEmployed',$uniqueid);
}
if (isset($_POST['startdaymonth'])){		
Longformwriteropenfield($_POST['startdaymonth'],'startdaymonth',$uniqueid);
}
if (isset($_POST['startdayyear'])){		
Longformwriteropenfield($_POST['startdayyear'],'startdayyear',$uniqueid);
}
if (isset($_POST['formerlastdaymonth'])){	
Longformwriteropenfield($_POST['formerlastdaymonth'],'formerlastdaymonth',$uniqueid);	
}
if (isset($_POST['formerlastdayyear'])){	
Longformwriteropenfield($_POST['formerlastdayyear'],'formerlastdayyear',$uniqueid);	
}
if (isset($_POST['identifypeople'])){	
Longformwriteropenfield($_POST['identifypeople'],'identifypeople',$uniqueid);	
}


if (isset($_POST['Category1'])){	
Longformwriteropenfield($_POST['Category1'],'Category1',$uniqueid);	
}
if (isset($_POST['4Category'])){	
Longformwriteropenfield($_POST['4Category'],'4Category',$uniqueid);
}
if (isset($_POST['7Cat1MealBreakWaived'])){		
Longformwriteropenfield($_POST['7Cat1MealBreakWaived'],'7Cat1MealBreakWaived',$uniqueid);
}
if (isset($_POST['7MealWhenWorkingBetween5and6hours'])){		
Longformwriteropenfield($_POST['7MealWhenWorkingBetween5and6hours'],'7MealWhenWorkingBetween5and6hours',$uniqueid);
}
if (isset($_POST['7MealBreakMissedCat1Freq'])){	
Longformwriteropenfield($_POST['7MealBreakMissedCat1Freq'],'7MealBreakMissedCat1Freq',$uniqueid);	
}
if (isset($_POST['7MealBreakMissedCat1Why'])){	
Longformwriteropenfield($_POST['7MealBreakMissedCat1Why'],'7MealBreakMissedCat1Why',$uniqueid);	
}
if (isset($_POST['missMealBreakrExplain'])){	
Longformwriteropenfield($_POST['missMealBreakrExplain'],'missMealBreakrExplain',$uniqueid);	
}
if (isset($_POST['7EverMoreThan10'])){	
Longformwriteropenfield($_POST['7EverMoreThan10'],'7EverMoreThan10',$uniqueid);	
}
if (isset($_POST['7Cat3DidGetSecondMealBreak'])){	
Longformwriteropenfield($_POST['7Cat3DidGetSecondMealBreak'],'7Cat3DidGetSecondMealBreak',$uniqueid);
}
if (isset($_POST['7Cat3Missed2ndMealBreakOften'])){		
Longformwriteropenfield($_POST['7Cat3Missed2ndMealBreakOften'],'7Cat3Missed2ndMealBreakOften',$uniqueid);
}
if (isset($_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay'])){	
Longformwriteropenfield($_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay'],'7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay',$uniqueid);
}
if (isset($_POST['session3Explain'])){		
Longformwriteropenfield($_POST['session3Explain'],'session3Explain',$uniqueid);	
}


if (isset($_POST['RestEverMissed1'])){
Longformwriteropenfield($_POST['RestEverMissed1'],'RestEverMissed1',$uniqueid);	
}
if (isset($_POST['8RestEverMissed'])){	
Longformwriteropenfield($_POST['8RestEverMissed'],'8RestEverMissed',$uniqueid);
}
if (isset($_POST['8HowOftenMissRest'])){		
Longformwriteropenfield($_POST['8HowOftenMissRest'],'8HowOftenMissRest',$uniqueid);
}
if (isset($_POST['8WhyMiss10MinRest'])){		
Longformwriteropenfield($_POST['8WhyMiss10MinRest'],'8WhyMiss10MinRest',$uniqueid);	
}
if (isset($_POST['missRestBreakExplain'])){	
Longformwriteropenfield($_POST['missRestBreakExplain'],'missRestBreakExplain',$uniqueid);
}
if (isset($_POST['8ExtraHourPay'])){		
Longformwriteropenfield($_POST['8ExtraHourPay'],'8ExtraHourPay',$uniqueid);	
}
if (isset($_POST['session4Explain'])){	
Longformwriteropenfield($_POST['session4Explain'],'session4Explain',$uniqueid);	
}


if (isset($_POST['BagsChecksYesNo1'])){	
Longformwriteropenfield($_POST['BagsChecksYesNo1'],'BagsChecksYesNo1',$uniqueid);
}
if (isset($_POST['9BagsChecksYesNo'])){	
Longformwriteropenfield($_POST['9BagsChecksYesNo'],'9BagsChecksYesNo',$uniqueid);	
}
if (isset($_POST['9BagsCheckedEverytimeLeaving'])){	
Longformwriteropenfield($_POST['9BagsCheckedEverytimeLeaving'],'9BagsCheckedEverytimeLeaving',$uniqueid);
}
if (isset($_POST['9BagsCheckedWait'])){		
Longformwriteropenfield($_POST['9BagsCheckedWait'],'9BagsCheckedWait',$uniqueid);
}
if (isset($_POST['bagCheckWaitHour'])){	
Longformwriteropenfield($_POST['bagCheckWaitHour'],'bagCheckWaitHour',$uniqueid);
}
if (isset($_POST['bagCheckWaitMinute'])){		
Longformwriteropenfield($_POST['bagCheckWaitMinute'],'bagCheckWaitMinute',$uniqueid);
}
if (isset($_POST['10EverWorkClosingShift'])){		
Longformwriteropenfield($_POST['10EverWorkClosingShift'],'10EverWorkClosingShift',$uniqueid);
}
if (isset($_POST['9BagsCheckedEverytimeWaitToLeaving'])){		
Longformwriteropenfield($_POST['9BagsCheckedEverytimeWaitToLeaving'],'9BagsCheckedEverytimeWaitToLeaving',$uniqueid);	
}
if (isset($_POST['generalWaitHour'])){	
Longformwriteropenfield($_POST['generalWaitHour'],'generalWaitHour',$uniqueid);
}
if (isset($_POST['generalWaitMinute'])){		
Longformwriteropenfield($_POST['generalWaitMinute'],'generalWaitMinute',$uniqueid);	
}
if (isset($_POST['workOutClock'])){
Longformwriteropenfield($_POST['workOutClock'],'workOutClock',$uniqueid);	
}
if (isset($_POST['afterBeforeClockExplain'])){	
Longformwriteropenfield($_POST['afterBeforeClockExplain'],'afterBeforeClockExplain',$uniqueid);	
}
if (isset($_POST['offClockHour'])){	
Longformwriteropenfield($_POST['offClockHour'],'offClockHour',$uniqueid);	
}
if (isset($_POST['offClockMinute'])){	
Longformwriteropenfield($_POST['offClockMinute'],'offClockMinute',$uniqueid);
}
if (isset($_POST['session5Explain'])){	
Longformwriteropenfield($_POST['session5Explain'],'session5Explain',$uniqueid);	
}


if (isset($_POST['TermType1'])){		
Longformwriteropenfield($_POST['TermType1'],'TermType1',$uniqueid);	
}
if (isset($_POST['12TermType'])){		
Longformwriteropenfield($_POST['12TermType'],'12TermType',$uniqueid);
}
if (isset($_POST['12SeventyTwoHoursOrLess'])){			
Longformwriteropenfield($_POST['12SeventyTwoHoursOrLess'],'12SeventyTwoHoursOrLess',$uniqueid);
}
if (isset($_POST['12DidYouGetFinalCheckOnLastDay'])){			
Longformwriteropenfield($_POST['12DidYouGetFinalCheckOnLastDay'],'12DidYouGetFinalCheckOnLastDay',$uniqueid);
}
if (isset($_POST['12withoutSeventyTwoHoursOrLess'])){			
Longformwriteropenfield($_POST['12withoutSeventyTwoHoursOrLess'],'12withoutSeventyTwoHoursOrLess',$uniqueid);
}
if (isset($_POST['12HowLongAfterTermRecieveCheckGreaterThan72'])){			
Longformwriteropenfield($_POST['12HowLongAfterTermRecieveCheckGreaterThan72'],'12HowLongAfterTermRecieveCheckGreaterThan72',$uniqueid);
}
if (isset($_POST['finalcheckincludeallcommissions'])){			
Longformwriteropenfield($_POST['finalcheckincludeallcommissions'],'finalcheckincludeallcommissions',$uniqueid);
}
if (isset($_POST['howlongdidittakeformacystopayallcommissions'])){		
Longformwriteropenfield($_POST['howlongdidittakeformacystopayallcommissions'],'howlongdidittakeformacystopayallcommissions',$uniqueid);
}	
if (isset($_POST['session6Explain'])){		
Longformwriteropenfield($_POST['session6Explain'],'session6Explain',$uniqueid);
}


if (isset($_POST['DidYourJobRequireStanding1'])){				
Longformwriteropenfield($_POST['DidYourJobRequireStanding1'],'DidYourJobRequireStanding1',$uniqueid);
}
if (isset($_POST['14DidYourJobRequireStanding'])){		
Longformwriteropenfield($_POST['14DidYourJobRequireStanding'],'14DidYourJobRequireStanding',$uniqueid);	
}
if (isset($_POST['14PermittedToSit'])){	
Longformwriteropenfield($_POST['14PermittedToSit'],'14PermittedToSit',$uniqueid);
}
if (isset($_POST['timeBeforeSitHour'])){				
Longformwriteropenfield($_POST['timeBeforeSitHour'],'timeBeforeSitHour',$uniqueid);	
}
if (isset($_POST['timeBeforeSitMinute'])){		
Longformwriteropenfield($_POST['timeBeforeSitMinute'],'timeBeforeSitMinute',$uniqueid);
}
if (isset($_POST['14Consequences'])){		
Longformwriteropenfield($_POST['14Consequences'],'14Consequences',$uniqueid);	
}
if (isset($_POST['jobListSeated'])){		
Longformwriteropenfield($_POST['jobListSeated'],'jobListSeated',$uniqueid);	
}
if (isset($_POST['14SittingWouldInterfere'])){		
Longformwriteropenfield($_POST['14SittingWouldInterfere'],'14SittingWouldInterfere',$uniqueid);	
}
if (isset($_POST['jobSeatedExplain'])){		
Longformwriteropenfield($_POST['jobSeatedExplain'],'jobSeatedExplain',$uniqueid);	
}
if (isset($_POST['session7Explain'])){		
Longformwriteropenfield($_POST['session7Explain'],'session7Explain',$uniqueid);	
}


if (isset($_POST['needssase'])){		
Longformwriteropenfield($_POST['needssase'],'needssase',$uniqueid);	
}
if (isset($_POST['HouseHoldCount1'])){	
Longformwriteropenfield($_POST['HouseHoldCount1'],'HouseHoldCount1',$uniqueid);	
}
if (isset($_POST['HouseHoldCount'])){	
Longformwriteropenfield($_POST['HouseHoldCount'],'HouseHoldCount',$uniqueid);
}
if (isset($_POST['GrossIncome'])){	
Longformwriteropenfield($_POST['GrossIncome'],'GrossIncome',$uniqueid);	
}
//print_r($_POST);
foreach($_POST as $key => $value)
{
	$$key = $value;
	if (empty($$key)) unset($$key);
	if (isset($$key))
	{
		if(strstr($$key,'\''))
		{
		
		    $$key = str_replace('\'','`',$$key);
		}
/*		//strip single quote
		if(strstr($$key,'\''))
		{
		
		    $$key = str_replace('\'','',$$key);
		}
		
		//strip double quote
		if(strstr($$key,'\"'))
		{
		
		    $$key = str_replace('\"','',$$key);
		}	*/
/*		//strip percentage
		if(strstr($$key,'%'))
		{
		
		    $$key = str_replace('%','',$$key);
		}
		//strip asterisk
		if(strstr($$key,'*'))
		{
		
		    $$key = str_replace('*','',$$key);
		}
		//strip underscore
		if(strstr($$key,'_'))
		{
		
		    $$key = str_replace('_','',$$key);
		}
		//strip ampersand
		if(strstr($$key,'&'))
		{
		
		    $$key = str_replace('\'','',$$key);
		}	
		//strip dash
		if(strstr($$key,'-'))
		{
		
		    $$key = str_replace('-','',$$key);
		}   
		//strip parenthasis open
		if(strstr($$key,'('))
		{
		
			$$key = preg_replace('/\(|\)/','',$$key);
		}
		
		//strip parenthasis close
		if(strstr($$key,')'))
		{
			$$key = preg_replace('/\(|\)/','',$$key); 
		}*/
		
	}
}

if (isset($needssase)) if ($needssase == 'Yes')
{
$message = '
<html>
<head>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
	<tbody>
        <tr>
		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
			  <tr>
			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%">
				<p>Please mail out a SASE today. <br /><br />
				Mailing address:<br /><br />
				'.$FirstName.' '.$LastName.'
				<br />
				'.$streetline1.', '.$streetline2.'<br />
				'.$homecity.', '.$locstate.' '.$zipcode.'<br />
				<br />
				Uniqueid: '.$uniqueid.'
				<br />
<br />

MARS: <a href="http://sqlsrv.domain.initiativelegal.com/mars/index.php?uniqueid='.$uniqueid.'">CLICK HERE</a>

<br>

</td>
		      </tr>
		    </table></td>
		</tr>
		
		<tr>
			
</table>
</body>
</html>


';


       
	$mailroom = 'MassAction_Mailroom@initiativelegal.com';
	$mailroomname = 'Mass Action Mailroom';

require_once('class.phpmailer.php');
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "macyslawsuit"; // SMTP account username
  $mail->Password   = "PLS1234!";        // SMTP account password
  $mail->AddAddress('MassAction_Mailroom@initiativelegal.com','Mass Action Mailroom');

  $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');

  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");

  #$mail->AddReplyTo('Lawsuittest@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->Subject = 'SASE - '.$LastName.', '.$FirstName.' - '.$uniqueid;
  #$mail->AddAttachment($attachment);      // attachment
  if (isset($attachment2))
  {
	$mail->AddAttachment($attachment2);      // attachment
  }
  $mail->MsgHTML($message);
  $mail->Send();
  
  #echo "</p>\n";
} 
catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
}

//logic for fee waiver
if (isset($GrossIncome)){
if ($GrossIncome == 'Less than 2793') $grossincomeprint = 'less than $2,793';
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
if ($HouseHoldCount == '1') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';

if ($HouseHoldCount == '2') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '2') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';

if ($HouseHoldCount == '3') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '3') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '3') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';

if ($HouseHoldCount == '4') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '4') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '4') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '4') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';

if ($HouseHoldCount == '5') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '5') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';

if ($HouseHoldCount == '6') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '6') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';

if ($HouseHoldCount == '7') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';
if ($HouseHoldCount == '7') if ($GrossIncome == '7743to8733') $feewaivequal = 'Yes';

if ($HouseHoldCount == '8') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '7743to8733') $feewaivequal = 'Yes';
if ($HouseHoldCount == '8') if ($GrossIncome == '8733to9723') $feewaivequal = 'Yes';

if ($HouseHoldCount == '9') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '2793to3783') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '3783to4773') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '4773to5763') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '5763to6753') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '6753to7743') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '7743to8733') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '8733to9723') $feewaivequal = 'Yes';
if ($HouseHoldCount == '9') if ($GrossIncome == '9723to10713') $feewaivequal = 'Yes';


if ($HouseHoldCount == '10') if ($GrossIncome == 'Less than 2793') $feewaivequal = 'Yes';
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
if (isset($feewaivequal))
{
	if ($feewaivequal == 'Yes')
	{
		statusLongformwriteropenfield('Yes','feewaiverqualified',$uniqueid);
	}
}
else
{
	statusLongformwriteropenfield('','feewaiverqualified',$uniqueid);
}
//logic for fee waiver

 

if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

}

?>


<?PHP   
//if (isset($uniqueid))
//	{	
//		$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid')
//		UPDATE status set
//		completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',interviewstarted='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday=$date,interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week'
//		WHERE status.uniqueid='$uniqueid'";
//		$results = sqlsrv_query($conn,$query);
//			
//}
?>


<?php
$link = 'https://DFWMS01.initiativelegal.com/macysdetailedquestionnaire.php?uniqueid='.$uniqueid;
?>

<?PHP 


	if (isset($uniqueid))
	{	
		if (isset($_POST['saveClose']))
		{
			if ($_POST['saveClose'] == 'Save & Close')
			{
				$query = "select notelog from status  WHERE uniqueid='$uniqueid'";
				$currentlog = sqlsrv_query($conn,$query);
				while($row = sqlsrv_fetch_array($currentlog))
				{
				$newlog =   $date . ' @ ' . $time . ': <strong>Long form updated via telephone</strong><br>' . $row['notelog'];
				}		
				$currentstatus = 'Longform updated via telephone';		
				$query = "UPDATE status set notelog='$newlog' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
			}
		}
//		else
//		{
			if (isset($_POST['complete']))
			{
				if ($_POST['complete'] == 'Submit')
				{
					$query = "select notelog from status  WHERE uniqueid='$uniqueid'";
					$currentlog = sqlsrv_query($conn,$query);
					while($row = sqlsrv_fetch_array($currentlog))
					{
					$newlog =   $date . ' @ ' . $time . ': <strong>Long form complete via telephone</strong><br>' . $row['notelog'];
					}		
					$currentstatus = 'Longform complete via telephone';		
					$query = "UPDATE status set notelog='$newlog',longformcompleteonphone='Yes',longformcompleteonphonedate='$date',longformcompleteonphoneweek='$week',longformcompleteonphonemonth='$month' WHERE uniqueid='$uniqueid'";
					$results = sqlsrv_query($conn,$query);
				}
			}
//		}
	}


?>
<?PHP
require("writePdf.php");?>
<script type="text/javascript">
window.close();
</script>