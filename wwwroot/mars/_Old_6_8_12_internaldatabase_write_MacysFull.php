<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
</head>

 
<?PHP
//
////
print('<pre>');
print_r($_POST);
print('</pre>');
print_r(array_keys($_POST));
echo "<br><br>";
print_r(array_values($_POST)); 
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
        //strip single quote
        if(strstr($var,'\''))
        {
        
            $var = str_replace('\'','',$var);
        }
        
        //strip double quote
        if(strstr($var,'\"'))
        {
        
            $var = str_replace('\"','',$var);
        }	
        //strip percentage
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
        //strip single quote
        if(strstr($var,'\''))
        {
        
            $var = str_replace('\'','',$var);
        }
        
        //strip double quote
        if(strstr($var,'\"'))
        {
        
            $var = str_replace('\"','',$var);
        }	
        //strip percentage
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

        $query = "UPDATE status set [$key]='$var' WHERE data.uniqueid='$uniqueid'";
        $results = sqlsrv_query($conn,$query);
	

    }
}
	if (isset($status))
	{
		$query = "UPDATE data set [$key]='$var' WHERE data.uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}

statusLongformwriteropenfield($_POST['WhoFirstName'],'FirstName',$uniqueid);
statusLongformwriteropenfield($_POST['WhoLastName'],'LastName',$uniqueid);
statusLongformwriteropenfield($_POST['CallbackNum'],'Phone1',$uniqueid);
statusLongformwriteropenfield($_POST['SecondaryNum'],'Phone2',$uniqueid);
statusLongformwriteropenfield($_POST['Email'],'Email',$uniqueid);
statusLongformwriteropenfield($_POST['StreetLine1'],'Street1',$uniqueid);
statusLongformwriteropenfield($_POST['StreetLine2'],'Street2',$uniqueid);
statusLongformwriteropenfield($_POST['HomeCity'],'City',$uniqueid);
statusLongformwriteropenfield($_POST['HomeState'],'State',$uniqueid);
statusLongformwriteropenfield($_POST['Zipcode'],'Zipcode',$uniqueid);

Longformwriteropenfield($_POST['WhoFirstName'],'1WhoFirstName',$uniqueid);		
Longformwriteropenfield($_POST['WhoLastName'],'1WhoLastName',$uniqueid);		
Longformwriteropenfield($_POST['CallbackNum'],'1CallbackNum',$uniqueid);		
Longformwriteropenfield($_POST['SecondaryNum'],'3SecondaryNum',$uniqueid);		
Longformwriteropenfield($_POST['Email'],'3Email',$uniqueid);		
Longformwriteropenfield($_POST['StreetLine1'],'3StreetLine1',$uniqueid);		
Longformwriteropenfield($_POST['StreetLine2'],'3StreetLine2',$uniqueid);		
Longformwriteropenfield($_POST['HomeCity'],'3HomeCity',$uniqueid);		
Longformwriteropenfield($_POST['HomeState'],'3HomeState',$uniqueid);		
Longformwriteropenfield($_POST['Zipcode'],'3Zipcode',$uniqueid);		
Longformwriteropenfield($_POST['recentPosition1'],'recentPosition1',$uniqueid);		
Longformwriteropenfield($_POST['recentPosition'],'recentPosition',$uniqueid);		
Longformwriteropenfield($_POST['recentPositionExplain'],'recentPositionExplain',$uniqueid);		
Longformwriteropenfield($_POST['1LocCity'],'1LocCity',$uniqueid);		
Longformwriteropenfield($_POST['1LocCity2'],'1LocCity2',$uniqueid);		
Longformwriteropenfield($_POST['EmployeeHourly'],'EmployeeHourly',$uniqueid);		
Longformwriteropenfield($_POST['PaidExplain'],'PaidExplain',$uniqueid);		
Longformwriteropenfield($_POST['4CurrentlyEmployed'],'4CurrentlyEmployed',$uniqueid);		
Longformwriteropenfield($_POST['startdaymonth'],'startdaymonth',$uniqueid);		
Longformwriteropenfield($_POST['startdayyear'],'startdayyear',$uniqueid);		
Longformwriteropenfield($_POST['formerlastdaymonth'],'formerlastdaymonth',$uniqueid);		
Longformwriteropenfield($_POST['formerlastdayyear'],'formerlastdayyear',$uniqueid);		
Longformwriteropenfield($_POST['identifypeople'],'identifypeople',$uniqueid);		
Longformwriteropenfield($_POST['Category1'],'Category1',$uniqueid);		
Longformwriteropenfield($_POST['4Category'],'4Category',$uniqueid);		
Longformwriteropenfield($_POST['7Cat1MealBreakWaived'],'7Cat1MealBreakWaived',$uniqueid);		
Longformwriteropenfield($_POST['7MealWhenWorkingBetween5and6hours'],'7MealWhenWorkingBetween5and6hours',$uniqueid);		
Longformwriteropenfield($_POST['7MealBreakMissedCat1Freq'],'7MealBreakMissedCat1Freq',$uniqueid);		
Longformwriteropenfield($_POST['7MealBreakMissedCat1Why'],'7MealBreakMissedCat1Why',$uniqueid);		
Longformwriteropenfield($_POST['missMealBreakrExplain'],'missMealBreakrExplain',$uniqueid);		
Longformwriteropenfield($_POST['7EverMoreThan10'],'7EverMoreThan10',$uniqueid);		
Longformwriteropenfield($_POST['7Cat3DidGetSecondMealBreak'],'7Cat3DidGetSecondMealBreak',$uniqueid);		
Longformwriteropenfield($_POST['7Cat3Missed2ndMealBreakOften'],'7Cat3Missed2ndMealBreakOften',$uniqueid);		
Longformwriteropenfield($_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay'],'7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay',$uniqueid);		
Longformwriteropenfield($_POST['session3Explain'],'session3Explain',$uniqueid);		
Longformwriteropenfield($_POST['RestEverMissed1'],'RestEverMissed1',$uniqueid);		
Longformwriteropenfield($_POST['8RestEverMissed'],'8RestEverMissed',$uniqueid);		
Longformwriteropenfield($_POST['8HowOftenMissRest'],'8HowOftenMissRest',$uniqueid);		
Longformwriteropenfield($_POST['8WhyMiss10MinRest'],'8WhyMiss10MinRest',$uniqueid);		
Longformwriteropenfield($_POST['missRestBreakExplain'],'missRestBreakExplain',$uniqueid);		
Longformwriteropenfield($_POST['8ExtraHourPay'],'8ExtraHourPay',$uniqueid);		
Longformwriteropenfield($_POST['session4Explain'],'session4Explain',$uniqueid);		
Longformwriteropenfield($_POST['BagsChecksYesNo1'],'BagsChecksYesNo1',$uniqueid);		
Longformwriteropenfield($_POST['9BagsChecksYesNo'],'9BagsChecksYesNo',$uniqueid);		
Longformwriteropenfield($_POST['9BagsCheckedEverytimeLeaving'],'9BagsCheckedEverytimeLeaving',$uniqueid);		
Longformwriteropenfield($_POST['9BagsCheckedWait'],'9BagsCheckedWait',$uniqueid);		
Longformwriteropenfield($_POST['bagCheckWaitHour'],'bagCheckWaitHour',$uniqueid);		
Longformwriteropenfield($_POST['bagCheckWaitMinute'],'bagCheckWaitMinute',$uniqueid);		
Longformwriteropenfield($_POST['10EverWorkClosingShift'],'10EverWorkClosingShift',$uniqueid);		
Longformwriteropenfield($_POST['9BagsCheckedEverytimeWaitToLeaving'],'9BagsCheckedEverytimeWaitToLeaving',$uniqueid);		
Longformwriteropenfield($_POST['generalWaitHour'],'generalWaitHour',$uniqueid);		
Longformwriteropenfield($_POST['generalWaitMinute'],'generalWaitMinute',$uniqueid);		
Longformwriteropenfield($_POST['workOutClock'],'workOutClock',$uniqueid);		
Longformwriteropenfield($_POST['afterBeforeClockExplain'],'afterBeforeClockExplain',$uniqueid);		
Longformwriteropenfield($_POST['offClockHour'],'offClockHour',$uniqueid);		
Longformwriteropenfield($_POST['offClockMinute'],'offClockMinute',$uniqueid);		
Longformwriteropenfield($_POST['session5Explain'],'session5Explain',$uniqueid);		
Longformwriteropenfield($_POST['TermType1'],'TermType1',$uniqueid);		
Longformwriteropenfield($_POST['12TermType'],'12TermType',$uniqueid);		
Longformwriteropenfield($_POST['12SeventyTwoHoursOrLess'],'12SeventyTwoHoursOrLess',$uniqueid);		
Longformwriteropenfield($_POST['12DidYouGetFinalCheckOnLastDay'],'12DidYouGetFinalCheckOnLastDay',$uniqueid);		
Longformwriteropenfield($_POST['12withoutSeventyTwoHoursOrLess'],'12withoutSeventyTwoHoursOrLess',$uniqueid);		
Longformwriteropenfield($_POST['12HowLongAfterTermRecieveCheckGreaterThan72'],'12HowLongAfterTermRecieveCheckGreaterThan72',$uniqueid);		
Longformwriteropenfield($_POST['finalcheckincludeallcommissions'],'finalcheckincludeallcommissions',$uniqueid);		
Longformwriteropenfield($_POST['howlongdidittakeformacystopayallcommissions'],'howlongdidittakeformacystopayallcommissions',$uniqueid);		
Longformwriteropenfield($_POST['session6Explain'],'session6Explain',$uniqueid);		
Longformwriteropenfield($_POST['DidYourJobRequireStanding1'],'DidYourJobRequireStanding1',$uniqueid);		
Longformwriteropenfield($_POST['14DidYourJobRequireStanding'],'14DidYourJobRequireStanding',$uniqueid);		
Longformwriteropenfield($_POST['14PermittedToSit'],'14PermittedToSit',$uniqueid);		
Longformwriteropenfield($_POST['timeBeforeSitHour'],'timeBeforeSitHour',$uniqueid);		
Longformwriteropenfield($_POST['timeBeforeSitMinute'],'timeBeforeSitMinute',$uniqueid);		
Longformwriteropenfield($_POST['14Consequences'],'14Consequences',$uniqueid);		
Longformwriteropenfield($_POST['jobListSeated'],'jobListSeated',$uniqueid);		
Longformwriteropenfield($_POST['14SittingWouldInterfere'],'14SittingWouldInterfere',$uniqueid);		
Longformwriteropenfield($_POST['jobSeatedExplain'],'jobSeatedExplain',$uniqueid);		
Longformwriteropenfield($_POST['session7Explain'],'session7Explain',$uniqueid);		
Longformwriteropenfield($_POST['needssase'],'needssase',$uniqueid);		
Longformwriteropenfield($_POST['HouseHoldCount1'],'HouseHoldCount1',$uniqueid);		
Longformwriteropenfield($_POST['HouseHoldCount'],'HouseHoldCount',$uniqueid);		
Longformwriteropenfield($_POST['GrossIncome'],'GrossIncome',$uniqueid);	

foreach($_POST as $key => $value)
{
	$$key = $value;
	if (empty($$key)) unset($$key);
	if (isset($$key))
	{
		//strip single quote
		if(strstr($$key,'\''))
		{
		
		    $$key = str_replace('\'','',$$key);
		}
		
		//strip double quote
		if(strstr($$key,'\"'))
		{
		
		    $$key = str_replace('\"','',$$key);
		}	
		//strip percentage
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
		}
		
	}
}
if (isset($_POST['GrossIncome'])) $GrossIncome = $_POST['GrossIncome'];
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

if ($feewaivequal == 'Yes')
{
	statusLongformwriteropenfield('Yes','feewaiverqualified',$uniqueid);

}
//logic for fee waiver

 

if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

}

?>


<?PHP 
if (isset($uniqueid))
	{	
		$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid')
		UPDATE status set
		completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',interviewstarted='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday=$date,interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week'
		WHERE status.uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			
}
?>


<?php
$link = 'https://DFWMS01.initiativelegal.com/macysdetailedquestionnaire.php?uniqueid='.$uniqueid;
?>

<?PHP 


	if (isset($uniqueid))
	{	
			$query = "select notelog from status  WHERE uniqueid='$uniqueid'";
			$currentlog = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($currentlog))
			{
			$newlog =   $date . ' @ ' . $time . ': <strong>Longform complete via telephone</strong><br>' . $row['notelog'];
			}		
			$currentstatus = 'Longform complete via telephone';		
			$query = "UPDATE status
			set notelog='$newlog',currentstatus='$currentstatus',longformcompleteonline='Yes',longformcompleteonlinedate='$date',longformcompleteonlineweek='$week',longformcompleteonlinemonth='$month',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
	}


?>
<!--<script type="text/javascript">
window.close();
</script>-->