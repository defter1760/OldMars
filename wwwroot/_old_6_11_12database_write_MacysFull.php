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
/*        //strip single quote
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
        }*/

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
        }*/

        $query = "UPDATE status set [$key]='$var' WHERE uniqueid='$uniqueid'";
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
		if(strstr($var,'\''))
        {
        
           $var = str_replace('\'','`',$var);
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

if ($feewaivequal == 'Yes')
{
	statusLongformwriteropenfield('Yes','feewaiverqualified',$uniqueid);

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

//Function QuestionAnswerPDF($question,$var)
//{
//		
//		$pdf->MultiCell(0,5,$question);
//		$pdf->SetFont('Times','',11);
//		$pdf->MultiCell(0,5,$var);
//		$pdf->Ln();
//}

$pdf = new PDF_Code128();
$pdf->AddPage();
$questiontitle = $clientname.": ".$brandname." Long Questionnare questions and answers - ".$date;

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$questiontitle,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',11);
//QuestionAnswerPDF("Please type in your First Name:",$whofirstname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Phone number:",$CallbackNum);
//QuestionAnswerPDF("Alternate phone:",$SecondaryNum);
//QuestionAnswerPDF("Email:",$Email);
//QuestionAnswerPDF("Street Line 1:",$StreetLine1);
//QuestionAnswerPDF("Street Line 2:",$StreetLine2);
//QuestionAnswerPDF("City:",$HomeCity);
//QuestionAnswerPDF("State:",$HomeState);
//QuestionAnswerPDF("Zipcode:",$Zipcode);
//
//QuestionAnswerPDF("What was your most recent position during your employment at Macys? (Select the choice that best describes your last position)",$recentPosition);
//QuestionAnswerPDF("Please explain about your most recent position:",$recentPositionExplain);
//QuestionAnswerPDF("What city was the last Macys you worked in?",$LocCity);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);
//QuestionAnswerPDF("Please type in your Last Name:",$wholastname);

$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$filename = $LastName.', '.$FirstName.' - '.$uniqueid; 
$filename2 = $LastName.', '.$FirstName.' - LongQnA - '.$uniqueid; 
$ext = ".pdf";

$pdf->Output("/inetpub/wwwroot/$filename2$ext","F"); //pushes file to server for temp storage


?>

<?PHP

$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/'.$brandname.'/';
$dir1 = $dir0."".$filename;
$dir2 = $dir1."/Retainer/Original/";
$dir3 = $dir1."/";
$file = $filename."".$ext;
$file2 = $filename2."".$ext;
$conn_id = ftp_connect($ftp_server);

// login with username and password


$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$dir3.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $dir3);
}
ftp_chdir($conn_id, $dir3);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); //delete temp copy pdf stored on server
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
			$newlog =   $date . ' @ ' . $time . ': <strong>Longform complete via website</strong><br>' . $row['notelog'];
			}		
			$currentstatus = 'Longform complete via website';		
			$query = "UPDATE status
			set notelog='$newlog',currentstatus='$currentstatus',longformcompleteonline='Yes',longformcompleteonlinedate='$date',longformcompleteonlineweek='$week',longformcompleteonlinemonth='$month',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);

if ($feewaivequal == 'Yes')
{
//PDF CREATOR


$date = date('Y').'-'.date('m').'-'.date('d');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');


$pdf = new PDF_Code128();

$pdf->AddPage();
#$hellocompany = 'INITIATIVE LEGAL GROUP APC';
#$pdf->Image('logo.png',62,22,8,0,'','');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('helvetica','B',12);
#$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->Ln();
//AUTH FORM START
$clientname = "$FirstName" . " $LastName";
$authtitle = 'American Arbitration Association Affidavit For Waiver of Fees Notice';
$authtitle2 = 'For Use By California Consumers Only';
$authtitle3 = 'PERSONNEL FILE AND WAGE RECORDS';
$authline = '_________________________________________';
$nameline1 = '                     Name:   __________________________________________________________';
$nameline2 = '                     Address:   ________________________________________________________';
$nameline3 = '                     Number of persons in Household:   ____________________________________';
$nameline4 = '                     Gross Monthly Income:   ____________________________________________';
$authintro = 'I, ' . "$clientname" . ':';
$swear = '                     I hereby swear that the foregoing is a true and correct statement.';
$authtext1 = '                     Pursuant to section 1284.3 of the California Code of Civil Procedure, consumers';
$authtext2 = '                     with a gross monthly income of less than 300% of the federal poverty guidelines,';
$authtext3 = '                     are entitled to a waiver of all fees and costs, exclusive of arbitrator fees. This law';
$authtext4 = '                     applies to all consumer arbitration agreements subject to the California Arbitration';
$authtext5 = '                     Act, and to all consumer arbitrations conducted in California. If you believe that';
$authtext6 = '                     you meet these requirements, please complete this form and submit it with your';
$authtext7 = '                     demand for arbitration to the AAA\'s Western Case Management Center.';

$auth2text1 = '                     If (1) you are not a California consumer; or (2) your gross monthly income is more';
$auth2text2 = '                     than 300% of the federal poverty guidelines, you may still apply for a reduction or';
$auth2text3 = '                     deferral of AAA administrative fees by contacting the nearest AAA Case';
$auth2text4 = '                     Management Center and requesting a hardship application form.';

$authsignline = '                                                                                                 ___________________________';
$authsigntext = '                                                                                                 Signature';
$pdf->Ln();
$pdf->Ln();
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(0,5,$authtitle,'','C');
$pdf->Ln(1);
$pdf->MultiCell(0,5,$authtitle2,'','C');
$pdf->Ln(0);
$pdf->MultiCell(0,5,$authline,'','C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,$authtext1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext4,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext5,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext6,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext7,'','J');
$pdf->Ln(10);
$pdf->Cell(0,5,$auth2text1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text4,'','J');
$pdf->Ln(20);
$pdf->Cell(0,5,$nameline1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline4,'','J');
$pdf->Ln(10);
$pdf->Ln(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,$swear);
$pdf->Ln(15);
$pdf->Cell(0,5,$authsignline);
$pdf->Ln(5);
$pdf->Cell(0,5,$authsigntext);
$pdf->SetFont('Arial','',10);
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$filename = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename2 = "$LastName, " .  "$FirstName" . " - Feewaiver - $uniqueid"; 
$ext = ".pdf";
$pdf->Output("/inetpub/wwwroot/$filename2$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/Retainerstmp/$filename2$ext","F"); //pushes file to server for temp storage
//pdf create end
//FTP
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$dir1 = "$dir0" . "$filename";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$dir3.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $dir3);
}
ftp_chdir($conn_id, $dir3);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); 
//ftp end

//docusign start


////require ("include/ianSession.php"); 
////require ("api/ianCredential.php");
////require ("api/APIService.php");
////require ("include/utils.php");
////		$_SESSION["UserID"] = "ihutchings@initiativelegal.com";
////		$_SESSION["AccountID"] = "873db901-09a0-460f-933a-e0069b414d3f";
////        $_SESSION["Password"] = "siec9oanoapoeqiA";
////        $_SESSION["IntegratorsKey"] = "INIT-ec3b5acd-ad64-496b-b821-2b89ae424e82";

require ("include/prod/ianSession.php"); 
require ("api/prod/ianCredential.php");
require ("api/prod/APIService.php");
require ("include/prod/utils.php");
//prod UserID
$_SESSION["UserID"] = "4dbf6087-64d2-4584-bf04-698ce5bf24d7";
//demo UserID
#		$_SESSION["UserID"] = "ihutchings@preferredlegalsupport.com";
//this one is the production accountid		
$_SESSION["AccountID"] = "7ac3ef7c-e311-400e-a932-31f225a2e747";
//this one is the demo accountid
#		$_SESSION["AccountID"] = "c468460b-4d8f-4fd6-980c-0974de9c815a";
		$_SESSION["Password"] = "siec9oanoapoeqiA";

        $_SESSION["IntegratorsKey"] = "INIT-ec3b5acd-ad64-496b-b821-2b89ae424e82";
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
$chewypdf = './Retainerstmp/'."$filename2".'.pdf';
$pdfname = "$filename2";
$chewonthis = "PDFBytes = file_get_contents($chewypdf)";
function createAndSend($pdffilename,$subject,$name,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$grossincomeprint,$HouseHoldCount) {
    global $_oneSigner;
    $status = "";
    
    // Construct basic envelope
    $env = new Envelope();
    $env->Subject = $subject;
    $env->EmailBlurb = "This envelope demonstrates embedded signing";
    $env->AccountId = $_SESSION['AccountID'];
    $env->Recipients = constructRecipients($FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2);
    
    $doc = new Document();
    $doc->PDFBytes = file_get_contents($pdffilename);
	$doc->Name = $name;

    $doc->ID = "1";
    $doc->FileExtension = "pdf";
    $env->Documents = array($doc);
    
    $env->Tabs = addTabs(count($env->Recipients),$grossincomeprint,$HouseHoldCount);
    
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


function constructRecipients($FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2) 
{
    $recipients = array();
    
    $count = count($FirstName);
    for ($i = 1; $i <= $count; $i++) {
    	
    		// Must contain all POST parameters
    		if(empty($FirstName) ||
    			 empty($email)){
    			 	continue;
    		}
    	
        $r1 = new Recipient();
        
        $r1->UserName = $FirstName. ' ' .$LastName;
        $r1->Email = $email;
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
        
        $r2->UserName = $RecipientName2;
        $r2->Email = $RecipientEmail2;
        $r2->RequireIDLookup = false;
        $r2->ID = 2;
        $r2->Type = RecipientTypeCode::CarbonCopy;
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

function addTabs($count,$grossincomeprint,$HouseHoldCount) {
    $tabs[] = new Tab();
    
//first page initials at bottom right
	$sign2 = new Tab();
    $sign2->Type = TabTypeCode::SignHere;
    $sign2->DocumentID = "1";
    $sign2->PageNumber = "1";
    $sign2->RecipientID = "1";
    $sign2->XPosition = "330";//left right
    $sign2->YPosition = "475";//up down
    array_push($tabs, $sign2);

$data1 = new Tab();
$data1->Type = TabTypeCode::Custom;
$data1->CustomTabType = CustomTabType::Text;
$data1->CustomTabWidth = "120";
$data1->CustomTabHeight = "21";
$data1->CustomTabRequired = "0";
$data1->Value = "".$_POST['WhoFirstName']." ".$_POST['WhoLastName'];
$data1->TabLabel = "Your name";
$data1->Name = "Your name";
$data1->DocumentID = "1";
$data1->PageNumber = "1";
$data1->RecipientID = "1";
$data1->XPosition = "147";
$data1->YPosition = "382";
array_push($tabs, $data1);


$data2 = new Tab();
$data2->Type = TabTypeCode::Custom;
$data2->CustomTabType = CustomTabType::Text;
$data2->CustomTabWidth = "120";
$data2->CustomTabHeight = "21";
$data2->CustomTabRequired = "0";
$data2->Value = $_POST['StreetLine1']." ".$_POST['StreetLine2'].", ".$_POST['HomeCity']." ".$_POST['HomeState'].", ".$_POST['Zipcode'];
$data2->TabLabel = "address";
$data2->Name = "address";
$data2->DocumentID = "1";
$data2->PageNumber = "1";
$data2->RecipientID = "1";
$data2->XPosition = "150";
$data2->YPosition = "395";
array_push($tabs, $data2);

$data3 = new Tab();
$data3->Type = TabTypeCode::Custom;
$data3->CustomTabType = CustomTabType::Text;
$data3->CustomTabWidth = "120";
$data3->CustomTabHeight = "21";
$data3->CustomTabRequired = "1";
#$data3->Value = "".$grossincomeprint;
$data3->TabLabel = "Gross monthly income";
$data3->Name = "Gross monthly income";
$data3->DocumentID = "1";
$data3->PageNumber = "1";
$data3->RecipientID = "1";
$data3->XPosition = "220";
$data3->YPosition = "425";
array_push($tabs, $data3);

	
$data4 = new Tab();
$data4->Type = TabTypeCode::Custom;
$data4->CustomTabType = CustomTabType::Text;
$data4->CustomTabWidth = "120";
$data4->CustomTabHeight = "21";
$data4->CustomTabRequired = "0";
$data4->Value = "".$HouseHoldCount;
$data4->TabLabel = "number of persons in household";
$data4->Name = "number of persons in household";
$data4->DocumentID = "1";
$data4->PageNumber = "1";
$data4->RecipientID = "1";
$data4->XPosition = "268";
$data4->YPosition = "408";
array_push($tabs, $data4);

    
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
    $urls->OnCancel = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnDecline = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnException = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnFaxPending = 'https://DFWMS01.initiativelegal.com/AfterLongForm1.php?uniqueid=' . "$uniqueid".'&statuslevel=Faxpending';
    $urls->OnIdCheckFailed = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnSessionTimeout = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnTTLExpired = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnViewingComplete = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    if ($_oneSigner) {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/AfterLongForm1.php?uniqueid=' . "$uniqueid".'&statuslevel=Signed';
    }
    else {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/AfterLongForm1.php?uniqueid=' . "$uniqueid".'&statuslevel=Signed';
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

#if ($_SERVER['REQUEST_METHOD'] == 'GET') 	
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $_oneSigner = isset($_POST['OneSigner']);
	$_oneSigner = isset($_REQUEST['OneSigner']);
    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$grossincomeprint,$HouseHoldCount);
		if(!$_oneSigner)
		{
			$_showTwoSignerMessage = true;
		}

}
if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken']))
{



echo '<div id="main">';
echo '<div id="message">';
//echo "<div id='main'>";
//echo "<div class='container'>";
//echo "<div id='logo'>";
//echo "<h1>INITIATIVE LEGAL GROUP, APC</h1>";
//echo "</div>";
echo "<h4>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>";
echo "<p>On the following page, you will find an Affidavit for Waiver of Fees Notice. This will allow us to request that the American Arbitration Association waive the filing fee. Please carefully review the information to verify that it is correct.</p>";
echo "<p>Once you have completed your review, use your computer mouse to draw your electronic signature when prompted. Don't worry if your electronic signature does not look exactly like your real signature. All that is required is that you make an original mark on this document.</p>";
echo "<p>Please click on the &quot;confirmed signature&quot; button once you have completed the document and you will proceed to the next step of the process.</p>";
echo "<p>This waiver will only apply and be filed with the American Arbitration Association if our law firm elects to pursue your claims on an individual basis through arbitration.</p>";

echo '<p class="disclaimer">';
    echo 'Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.';
    echo '</p>';

#echo "<div id='main'>";
//echo "<table width='98%' align='center'>";
//echo "<tr>";
//echo "<td height='1400px' width='1100px' align='center'>";
//echo "<iframe  align='middle' marginheight='5%' width='98%' height='98%' src='";
//echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe' frameborder='0'></iframe>";
//echo "</td>";
//echo "</tr>";
//echo "</table>";

		echo "<table align='center' width='1100px' border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<td  height='1100px'   align='center'>";
		echo "<iframe  align='middle' marginheight='5%' width='99%' height='98%' src='";
		echo $_SESSION['embedToken'] . "&id='focusstealer' name='focusstealer' frameborder='0' ";
		echo 'onload="reloadPage()"';
		echo "></iframe>";
echo "</div>";
echo "</div>";
echo "</div>";
}
	
}//wrap end--If they've completed the the fee waiver form already they wont see the above

}//fee waiv qualified wrap

if ($feewaivequal !== 'Yes')
{
echo '<body>';
echo '<div id="main">';
echo '<div id="message">';
echo '<h4>';
echo 'CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
echo '<h3>Thank you for providing us with additional information regarding your potential wage and hour claims against Macy\'s!</h3>';
echo '<ul>';
echo '<li>We will review your information and will contact you directly if (and when) required. </li>';
//echo '<li>For the latest updates on the status of this case, we encourage you to visit our website at <a href="http://www.macyslawsuit.com" target="_parent">www.macyslawsuit.com</a> and click on the "Status of the Case" tab.  This information will be updated periodically when there are new developments in the case.</li>';
//echo '<li>If you have any questions, please contact us toll-free <strong>1.888.792.2293</strong>, Monday through Friday.';
//echo '</li>';
echo '</ul>';
echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';	
	
//			echo "<div id='main'>";
//			echo "<table width='900px' align='center'>";
//			echo "<tr>";
//			echo "<td align='center'>";
//			echo "<img src='https://DFWMS01.initiativelegal.com/whitelogo.png'>";
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






$query = "select attorneyfname,attorneylname,attorneyemail,username,password from tbl_attorneyassign where attorneylname=(select agentlname from status where uniqueid='$uniqueid');";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$assignedattorneylname = $row['attorneylname']; if (empty($assignedattorneylname)) unset($assignedattorneylname);
		$assignedattorneyfname = $row['attorneyfname']; if (empty($assignedattorneyfname)) unset($assignedattorneyfname);
		$assignedattorneyemail = $row['attorneyemail']; if (empty($assignedattorneyemail)) unset($assignedattorneyemail);
		$attorneyusername = $row['username']; if (empty($attorneyusername)) $attorneyusername = 'macyslawsuit';
		$attorneypassword = $row['password']; if (empty($attorneypassword)) $attorneypassword = 'PLS1234!';
		
	}
	

#$link = 'http://sql.initiativelegal.com:35535/getauth.php?uniqueid='.$uniqueid;
#$link = 'http://www.yourlawsuit.com/macys/authorization/?uniqueid='.$uniqueid;
$link = 'https://macyslawsuit.com/authorization/?uniqueid='.$uniqueid;
//$message = '
//<html>
//<head>
//</head>
//<body>
//<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
//	<tbody>
//		<tr>
//			<td width="20">&nbsp;</td>
//			<td>
//		  <table border="0" cellspacing="0" cellpadding="14" width="100%">
//				<tbody>
//					
//                    <tr>
//						<td bgcolor="#ffffff" style="text-align:center;"><img src="https://DFWMS01.initiativelegal.com/whitelogo.png"><img width="1px" height="1px" src="https://DFWMS01.initiativelegal.com/emailhit.php?uniqueid='.$uniqueid.'&isemail=afterlongform">
//					  </td>
//					</tr>
//					                   
//					<tr>
//						<td style="font-family: Arial,Helvetica,sans-serif;  color:#333333; line-height:24px; text-align:center;" bgcolor="#ffffff"><h2><u>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</u></h2></td>
//					</tr>
//                    <tr>
//						<td style="font-family: Arial,Helvetica,sans-serif;  color:#333333; font-size:10px; font-style:italic;" bgcolor="#ffffff"><p>This message is for the intended recipient only. The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above. If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others. If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, and delete it from your system.</p></td>
//					</tr>
//				</tbody>
//			</table>
//            </td>
//		</tr>
//        <tr>
//		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
//			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
//			  <tr>
//			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%"><p>Dear '.$FirstName.':</p><p>Thank you for providing us with additional information regarding your employment with Macy\'s. We will review your information and we will contact you directly, if (and when) required.</p><p>For the latest updates on the status of this case, we encourage you to visit our website at <a href="http://www.MacysLawsuit.com" target="_blank">www.MacysLawsuit.com</a> and click on the "Status of the Case" tab. This website will be updated periodically when there are new developments in the case.</p><p>If you have any questions, please contact us toll-free at 1.888.792.2293, Monday through Friday.</p><p><br /><br />Sincerely, <br /><br />'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney </p></td>
//		      </tr>
//		    </table></td>
//		</tr>
//		
//		<tr>
//			
//</table>
//
//
//
//
//
//
//
//</body>
//</html>
//
//';
$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table style="font-family:arial, helvetica, sans-serif; color:#424242;" bgcolor="#888888" width="100%" border="0" cellspacing="0" cellpadding="5">
	<tr>
    	<td>
        <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
        	<tr>
            	<td>
                <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
                	<tr>
                    	<td></td>
                    </tr>
                </table>
                </td>
            </tr>
        	<tr>
            	<td>
                <table style="font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="550" border="0" cellspacing="0" cellpadding="5">
                		<tr>
                        <td width="2%">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="2%">&nbsp;</td>
                        </tr>
                        <tr>
						<td width="2%">&nbsp;</td>
                        <td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_macys_logo.gif" width="200px" height="42px" alt="MacysLawsuit.com" /></td>
                        <td>&nbsp;</td>
                        <td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_ilg_logo.gif" width="250px" height="31px" alt="Initiative Legal Group, APC" />
                        <td width="2%">&nbsp;</td>
                        </tr>
                        <tr>
                        <td width="2%">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><p style="font-weight:bold; text-align:center;">TOLL FREE: 1.888.792.2293</p></td>
                        <td width="2%">&nbsp;</td>
                        </tr>
                </table>
                </td>
            </tr>
            <tr>
            <td>
            <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
                <tr>
                	<td><p style="text-align:center; text-decoration:underline; font-family:arial, helvetica, sans-serif; color:#888888;font-weight:bold; font-size:12px;">CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</p></td>
                </tr>
            </table>
            </td>
          </tr>
          <tr>
  		<td><table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
   				<tr>
   					<td width="2%">&nbsp;</td>
    				<td><p>Dear '.$FirstName.' '.$LastName.':</p><p style="line-height:3px;">&nbsp;</p><p>Thank you for providing us with additional information regarding your potential wage and hour claims against Macy\'s!</p><p style="line-height:3px;">&nbsp;</p><p>We will review your information and we will contact you directly, if (and when) required.</p><p style="line-height:3px;">&nbsp;</p><p>For the latest updates on the status of this case, we encourage you to visit our website at <a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;"href="http:/www.macyslawsuit.com" target="_blank">www.macyslawsuit.com</a> and click on the "Status of the Case" tab.  This website will be updated periodically when there are new developments in the case.</p><p style="line-height:3px;">&nbsp;</p><p>If you have any questions, please contact us toll-free at <strong>1.888.792.2293</strong>.</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">Sincerely,</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p></td>
    				<td width="2%">&nbsp;</td>
			</table>
		</td>
  	</tr>
      <tr>
  		<td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">

   	<tr>
   		<td width="2%">&nbsp;</td>
    	<td><p style="padding-bottom:5px;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above.  If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others.  If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p></td>
    	<td width="2%">&nbsp;</td>
  	</tr>
	</table>
	</td>
  </tr>
          
        </table>
        </td>
    </tr>
    
    
</table><img width="1px" height="1px" src="https://DFWMS01.initiativelegal.com/emailhit.php?uniqueid='.$uniqueid.'&isemail=finalemail">
</body>
</html>
';
require_once('class.phpmailer.php');


$mail = new PHPMailer(true);

$mail->IsSMTP();


try {
  $mail->Host       = "mail1.domain.initiativelegal.com";
  $mail->SMTPDebug  = 0;
  $mail->SMTPAuth   = true;
  $mail->Port       = 25;
  $mail->Username   = $attorneyusername;
  $mail->Password   = $attorneypassword;
  $mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddAddress($email,$FirstName." ".$LastName);
  $mail->SetFrom($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
  $mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->Subject = 'Macy\'s Lawsuit - Thank you';
#$mail->Subject = "$FirstName "."$LastName, ".'Thank you for signing the Attorney-Client agreement!';
  $mail->MsgHTML($message);
  $mail->Send();
  echo "</p>\n";
	} 

catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
}
?>
<?PHP 
$link = "getauth.php";
#$link = 'http://www.yourlawsuit.com/macys/authorization/?uniqueid='.$uniqueid;
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
<?PHP require_once("WritePdf.php");?>