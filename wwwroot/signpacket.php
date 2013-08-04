<?PHP
require("iansmakeproperretainer2.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />



</head>
<?PHP
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

if (empty($TwoSigners)) $TwoSigners = 'Create an Envelope with 2 Signers';
if (empty($RecipientEmail2)) $RecipientEmail2 = 'ihutchings@initiativelegal.com';
if (empty($RecipientName2)) $RecipientName2 = 'Ian Hutchings';
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';

if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];


?>

<?PHP 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT authformreceived,retainerRecieved,feewaiverreceived,completedlongformonline,FirstName,LastName,brand,email,brandid,longformcompleteonline FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
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
		$longformcompleteonline = $row['longformcompleteonline']; if (empty($longformcompleteonline)) unset($longformcompleteonline);

  }
//  		$query = "IF EXISTS (SELECT uniqueid from status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid') UPDATE status set authformsent='Docusign',authformsentdate='$date',authformsentmonth='$month',authformsentweek='$week' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
//		$results = sqlsrv_query($conn,$query);

$link = "getauth.php";
if (isset($authformreceived)) if ($authformreceived == 'Yes')
{
	$link = "macysdetailedquestionnaire.php";
	#echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if (isset($completedlongformonline)) if ($completedlongformonline == 'Yes')
{
	$link = "feewaiverprequal.php";
	#echo "It looks like you've already completed our detailed questionnaire, give us a call if you have any questions.";
}
if (isset($feewaiverreceived)) if ($feewaiverreceived == 'Yes')
{
	$link = "";
	#echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if (isset($feewaiverreceived)) if ($feewaiverreceived == 'Not Qualified')
{
	$link = "";
	#echo "It looks like you've already completed the fee waiver, give us a call if you have any questions.";
}
?>

<?PHP
$query = "
SELECT 
retaineraccept,feewaiversent,feewaiveraccept,authformsent,authaccept,authformsent2,authaccept2,FirstName,LastName,brand,email,donotcontact,notqualified
FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results))
        {
            $retaineraccept = $row['retaineraccept']; if (empty($retaineraccept)) unset($retaineraccept);
	    if ($retaineraccept == 'NULL') unset($retaineraccept);
            $feewaiversent = $row['feewaiversent']; if (empty($feewaiversent)) unset($feewaiversent);
            $feewaiveraccept = $row['feewaiveraccept']; if (empty($feewaiveraccept)) unset($feewaiveraccept);
            $authformsent = $row['authformsent']; if (empty($authformsent)) unset($authformsent);
            $authaccept = $row['authaccept']; if (empty($authaccept)) unset($authaccept);
            $authformsent2 = $row['authformsent2']; if (empty($authformsent2)) unset($authformsent2);
            $authaccept2 = $row['authaccept2']; if (empty($authaccept2)) unset($authaccept2);
            $FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
            $LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
            $brand = $row['retaineraccept']; if (empty($brand)) unset($brand);
            $email = $row['email']; if (empty($email)) unset($email);
            $donotcontact = $row['donotcontact']; if (empty($donotcontact)) unset($donotcontact);
            $notqualified = $row['notqualified']; if (empty($notqualified)) unset($notqualified);
            
            
#        print_r($row);
        echo "<br><br><br><br>";
        }
        
$query = "SELECT authformreceived,retainerRecieved,feewaiverreceived,completedlongformonline,FirstName,LastName,brand,email,brandid,longformcompleteonline FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
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
		$longformcompleteonline = $row['longformcompleteonline']; if (empty($longformcompleteonline)) unset($longformcompleteonline);

  }        
##First make sure they're not DNC or Not qualified
if (isset($donotcontact))
{
    if ($donotcontact == 'Yes')
    {
        $deadstop = 'Yes';
    }
}

if (isset($notqualified))
{
    if ($notqualified == 'Yes')
    {
        $deadstop = 'Yes';
    }
}
if (!isset($deadstop))
{
    $deadstop = 'No';
}
if ($deadstop != 'Yes')
{
    if (isset($retaineraccept))
    {
    ## if you we havn't received and accepted a retainer then you shouldn't be on this page but just incase, we wrap for it.
        if (isset($authformsent))
        {
            if (!isset($authaccept))
            {
#                echo "We need to add Auth1 to the pdf!";
                $auth1 = 'Auth1Set';
            }
	    else
	    {
		$auth1 = 'Auth1NOTSET';
	    }
        }
        if (isset($authformsent2))
        {
            if (!isset($authaccept2))
            {
#                echo "We need to add Auth2 to the pdf!";
                $auth2 = 'Auth2Set';
            }
	    else
	    {
		$auth2 = 'Auth2NOTSET';
	    }
        }
        if (isset($feewaiversent))
        {
            if (!isset($feewaiveraccept))
            {
 #               echo "We need to add Fee waiver to the pdf!";
                $feewaiver = 'FeewaiverSet';
            }
        }
#        echo '<br>Woof ... means we have accepted the retainer<br>';
        
$query = "select attorneyfname,attorneylname,attorneyemail,username,password from tbl_attorneyassign where attorneylname=(select agentlname from status where uniqueid='$uniqueid');";
$results = sqlsrv_query($conn,$query);
if (isset($auth1))
{
	if ($auth1 == 'Auth1Set')
	{
	    $auth1pagenumber = '1';     
	}
	if ($auth1 != 'Auth1Set')
	{
	    $auth1pagenumber = ''; 	
	}
}
else
{
    $auth1pagenumber = ''; 	
}
if (isset($auth2))
{
	if ($auth2 == 'Auth2Set')
	{
	    $auth2pagenumber = '2';
	    if ($auth1 != 'Auth1Set')
	    {
			$auth2pagenumber--;
	    }
	}
	if ($auth2 != 'Auth2Set')
	{
		$auth2pagenumber = '';	
	}
}
else
{
	$auth2pagenumber = '';	
}
if (isset($feewaiver))
{
	if ($feewaiver == 'FeewaiverSet')
	{
	    $feewaiverpagenumber = '1';
		if ($auth1 == 'Auth1Set')
		{
		    $feewaiverpagenumber++;
		}        
		if ($auth2 == 'Auth2Set')
		{
		    $feewaiverpagenumber++;
		}
	#  echo $feewaiverpagenumber;      
	}
	if ($feewaiver != 'FeewaiverSet')
	{
	    $feewaiverpagenumber = '';
		$feewaiver1000 = '1000';
	#    echo $feewaiverpagenumber;
	}
}
else
{
    $feewaiverpagenumber = '';
	$feewaiver1000 = '1000';
#    echo $feewaiverpagenumber;
}

while($row = sqlsrv_fetch_array($results))
{
    $assignedattorneylname = $row['attorneylname']; if (empty($assignedattorneylname)) unset($assignedattorneylname);
    $assignedattorneyfname = $row['attorneyfname']; if (empty($assignedattorneyfname)) unset($assignedattorneyfname);
    $assignedattorneyemail = $row['attorneyemail']; if (empty($assignedattorneyemail)) unset($assignedattorneyemail);
}

        $brandname = "Macys";
        $clientname = $FirstName." ".$LastName;
	$pdf = new PDF_Code128();
	$hellocompany = 'INITIATIVE LEGAL GROUP APC';
	$agentname = $assignedattorneyfname.' '.$assignedattorneylname;
	$agentemail = 'macyslawsuit@initiativelegal.com';
	
	$caseattorneyname = '                                                                                                                                          '.$agentname;
	$caseattorneyphonenumber = '                                                                                                                                          888.792.2293';
	$caseattorneyemail = '                                                                                                                                          '.$agentemail;
	$hellotitle = 'CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION';
	$hello = "$clientname" . ' ("Client") ';
	$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
	$printyourfullname = 'VIA U.S. MAIL';
	$yourbestphonenumber = $FirstName.' '.$LastName;
	$title = 'ATTORNEY-CLIENT AGREEMENT';
	$agreed = 'AGREED AND ACCEPTED';
	$space = ' ';
	$doublespace = '  ';
	$tenspace = $doublespace.''.$doublespace.''.$doublespace.''.$doublespace.''.$doublespace;
	$fiftyspace = $tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace;
	$twofiftyspace = $fiftyspace.''.$fiftyspace.''.$fiftyspace.''.$fiftyspace.''.$fiftyspace;
	$printtxt = 'PRINT FIRST AND LAST NAME';
	$printline = '__________________________________';
	$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
	$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';

	if (isset($auth1))
	{
        if ($auth1 == 'Auth1Set')
        {
            $enclosure = 'Authorization for Settlement';
            $enclosurefilename = 'Auth for Settlement';
        }
	}	
	if (isset($auth2))
	{
        if ($auth2 == 'Auth2Set')
        {
            IF ($auth1 == 'Auth1Set')
            {
                $enclosure = $enclosure.', Authorization for Release of Personnel File and Wage Records';
                $enclosurefilename = '2 Auths';
            }
            else
            {
                $enclosure = 'Authorization for Release of Personnel File and Wage Records';
                $enclosurefilename = 'Auth for Release';              
            }
        }
	}
	if (isset($feewaiver))
	{
		if ($feewaiver == 'FeewaiverSet')
		{
		    IF (isset ($enclosure))
		    {
			if ($enclosure == 'Authorization for Settlement, Authorization for Release of Personnel File and Wage Records')
			{
			    $enclosure = $enclosure.', and Affidavit for Waiver of Fees Notice';
			    $enclosurefilename = $enclosurefilename.', and Fee Waiver';
			}
			else
			{
			    $enclosure = $enclosure.', Affidavit for Waiver of Fees Notice';
			    $enclosurefilename = $enclosurefilename.', Fee Waiver';
			}
		    }
		    else
		    {
			$enclosure = 'Affidavit for Waiver of Fees Notice';
			$enclosurefilename = 'Fee Waiver';
		    }
		}
	}
if (isset($auth1))
{
if ($auth1 == 'Auth1Set')
{
        $pdf->AddPage('','',$uniqueid,$feewaiverpagenumber);
        $pdf->Image('logo.png',62,15,'',8,0,'','');
        #$pdf->Image('logo.png',);
        #$pdf->Image('logo.png',62,13,8,0,'','');
        $pdf->Ln();
        #$pdf->SetFont('helvetica','B',12);
        #$pdf->MultiCell(0,5,$hellocompany,'','C');
        $pdf->Ln(15);
        $clientname = $FirstName." ".$LastName;
        $authtitle = 'AUTHORIZATION FOR SETTLEMENT, DISMISSAL AND SIMILAR';
        $authtitle2 = 'ACTIONS BY ATTORNEY';
        $authline = '_________________________________________';
        $towhom = 'To Whom It May Concern:';
        $authintro = 'I, ' . "$clientname" . ' ("Client"),';
        $authtext = ' give my Attorneys, Initiative Legal Group APC, authority to settle and release my claims for unpaid overtime, missed meal and rest breaks, unpaid minimum wages, unlawful wage deductions, unpaid commissions, wages not timely paid upon termination, failure to provide seating during a work shift,  non-compliant wage statements, and derivative claims under California Business & Professions Code sections 17200 et seq. (the "Claims") if the total offer will yield Client at least $200 total, after the deduction of legal fees and costs.';
        $authtext2 = 'I/Client authorize and agree that Attorneys have the choice of reaching a settlement, if any, with Macy\'s, Inc. either by individual settlement or through a multi-party/group settlement or a class action settlement.  If judgment, award or settlement is obtained in my matter, I/Client authorize Attorneys to execute any documents on my behalf to effectuate the settlement and any release and dismissal, deposit any proceeds into the Attorneys\' client trust account, and to distribute the funds as agreed.';
        $authtext3 = '          b) All of my time, wage and payroll records, including my wage stubs in their entirety.';
        $authtext4 = 'I hereby expressly authorize and appoint Initiative Legal Group, APC as my representative to act on my behalf and in my place to obtain my personnel file and time, wage and payroll records by any and all means necessary and available.';
        $authsignline = '__________________________________              ________________';
        $authsigntext = 'SIGN YOUR FULL NAME                                               Date';
        $disclaimer = 'Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.';

        $pdf->SetFont('Times','B',12);
        $pdf->MultiCell(0,5,$authtitle,'','C');
        $pdf->Ln(1);
        $pdf->MultiCell(0,5,$authtitle2,'','C');
        $pdf->Ln(3);
        $pdf->MultiCell(0,5,$authline,'','C');
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,10,$authintro.''.$authtext);
        $pdf->Ln();
        $pdf->MultiCell(0,10,$authtext2);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(0,5,$authsignline);
        $pdf->Ln(9);
        $pdf->Cell(0,5,$authsigntext);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Times','BI',12);
        $pdf->MultiCell(0,5,$disclaimer,'','L');
        $pdf->SetFont('Arial','',10);
        $code = $uniqueid;
        $pdf->Code128(70,286,$code,70,2);
        $pdf->SetXY(130,270);
}
}//if auth1 is set to send, wrap close here
if (isset($auth2))
{
if ($auth2 == 'Auth2Set')
{
        $pdf->AddPage('','',$uniqueid,$feewaiverpagenumber);
        $hellocompany = 'INITIATIVE LEGAL GROUP APC';
        $pdf->Image('logo.png',62,15,'',8,0,'','');
        if (!isset($auth1))
	{
		$pdf->Ln(10);	
	}
	else
	{
		if($auth1 == 'Auth1NOTSET')
		{
			$pdf->Ln(10);	
		}
	}
        $pdf->Ln();
        
        //AUTH FORM START
        $clientname = "$FirstName" . " $LastName";
        $authtitle = 'AUTHORIZATION FOR RELEASE OF';
        $authtitle2 = 'PERSONNEL FILE AND WAGE RECORDS';
        $authline = '_________________________________________';
        $towhom = 'To Whom It May Concern:';
        $authintro = 'I, ' . "$clientname" . ':';
        $authtext = 'request that Macy\'s, Inc. and any related entities send copies of the following to my attorneys, Initiative Legal Group APC, located at 1800 Century Park East, 2nd Floor, Los Angeles, California 90067 as soon as practicable, but no later than 21 calendar days after the date this request has been submitted:';
        $authtext2 = '          a) My entire employee personnel file, including any documents I signed; and';
        $authtext3 = '          b) All of my time, wage and payroll records, including my wage stubs in their entirety.';
        $authtext4 = 'I hereby expressly authorize and appoint Initiative Legal Group, APC as my representative to act on my behalf and in my place to obtain my personnel file and time, wage and payroll records by any and all means necessary and available.';
        $authsignline = '__________________________________              ________________';
        $authsigntext = 'SIGN YOUR FULL NAME                                               Date';
        $pdf->Ln(5);
        #$pdf->Ln();
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
        $pdf->Ln(10);
        $pdf->MultiCell(0,5,$authtext4);
        $pdf->Ln(10);
        $pdf->Cell(0,5,$authsignline);
        $pdf->Ln(9);
        $pdf->Cell(0,5,$authsigntext);
        $pdf->SetFont('Arial','',10);
        $code = $uniqueid;
        $pdf->Code128(70,286,$code,70,2);
}//if auth2 is set to send, wrap close here
}
if (isset($feewaiver))
{
	if ($feewaiver == 'FeewaiverSet')
	{
		$pdf->AddPage('','',$uniqueid,$feewaiverpagenumber);
		if (!isset($auth2))
		{
			$pdf->Ln(10);	
		}
		else
		{
			if($auth2 == 'Auth2NOTSET')
			{
				$pdf->Ln(10);	
			}
		}
		$pdf->Ln();
	
		$pdf->SetFont('helvetica','B',12);
	
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
	#        $pdf->Ln();
	#        $pdf->Ln();
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
	}
}
$dir='/inetpub/wwwroot/';
$filename = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename2 = "$LastName, " .  "$FirstName" . " - ".$enclosurefilename." - $uniqueid"; 
$ext = ".pdf";
if ($feewaiverpagenumber == '')
{
	$feewaiverpdf = '1000';
}
else
{
	$feewaiverpdf = $feewaiverpagenumber;
}
$pdf->Output("/inetpub/wwwroot/$filename2$ext","F",$uniqueid,$feewaiverpdf); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/Retainerstmp/$filename2$ext","F",$uniqueid,$feewaiverpdf); //pushes file to server for temp storage
//pdf create end
//FTP
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$dir1 = "$dir0" . "$filename";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $newdiruniquid);
}

ftp_chdir($conn_id, $newdiruniquid);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); 
//ftp end

//docusign start


//require ("include/ianSession.php"); 
//require ("api/ianCredential.php");
//require ("api/APIService.php");
//require ("include/utils.php");
//	$_SESSION["UserID"] = "ihutchings@initiativelegal.com";
//	$_SESSION["AccountID"] = "873db901-09a0-460f-933a-e0069b414d3f";
//        $_SESSION["Password"] = "siec9oanoapoeqiA";
//        $_SESSION["IntegratorsKey"] = "INIT-ec3b5acd-ad64-496b-b821-2b89ae424e82";

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
function createAndSend($pdffilename,$subject,$name,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$auth1page,$auth2page,$feewaiverpage,$auth1,$auth2,$feewaiver) {
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
    
    $env->Tabs = addTabs(count($env->Recipients),$auth1page,$auth2page,$feewaiverpage);
    
    $api = getAPI();
    try {
        $csParams = new CreateAndSendEnvelope();
        $csParams->Envelope = $env;
        $status = $api->CreateAndSendEnvelope($csParams)->CreateAndSendEnvelopeResult;
        addEnvelopeID($status->EnvelopeID);
        getToken($status, 1, $uniqueid, $brandid, $brand, $tenantid,$auth1,$auth2,$feewaiver);
    } catch (SoapFault $e) {
        $_SESSION['errorMessage'] = $e;
        header("Location: errorpretty.php");
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
	    header("Location: errorpretty2.php");
	    exit;
    }
    
    return $recipients;
}

function addTabs($count,$auth1page,$auth2page,$feewaiverpage) 
{
    $tabs[] = new Tab();
		
	//first page initials at bottom right
	if (!empty($auth1page))
	{
		if ($auth1page != '')
		{
			$sign3 = new Tab();
			$sign3->Type = TabTypeCode::SignHere;
			$sign3->DocumentID = "1";
			$sign3->PageNumber = $auth1page;
			$sign3->RecipientID = "1";
			$sign3->XPosition = "29";
			$sign3->YPosition = "500";
			array_push($tabs, $sign3);
			
			$date3 = new Tab();
			$date3->Type = TabTypeCode::DateSigned;
			$date3->DocumentID = "1";
			$date3->PageNumber = $auth1page;
			$date3->RecipientID = "1";
			$date3->XPosition = "300";
			$date3->YPosition = "550";
			array_push($tabs, $date3);
		}
	}
		
	if (!empty($auth2page))
	{
		if ($auth2page != '')
		{
			$sign2 = new Tab();
			$sign2->Type = TabTypeCode::SignHere;
			$sign2->DocumentID = "1";
			$sign2->PageNumber = $auth2page;
			$sign2->RecipientID = "1";
			$sign2->XPosition = "29";
			$sign2->YPosition = "345";
			array_push($tabs, $sign2);
			 
			$date2 = new Tab();
			$date2->Type = TabTypeCode::DateSigned;
			$date2->DocumentID = "1";
			$date2->PageNumber = $auth2page;
			$date2->RecipientID = "1";
			$date2->XPosition = "300";
			$date2->YPosition = "393";
			array_push($tabs, $date2);
		}	
	}
	
	if (!empty($feewaiverpage))
	{
		if ($feewaiverpage != '')
		{
			$signfw = new Tab();
			$signfw->Type = TabTypeCode::SignHere;
			$signfw->DocumentID = "1";
			$signfw->PageNumber = $feewaiverpage;
			$signfw->RecipientID = "1";
			$signfw->XPosition = "330";//left right
			$signfw->YPosition = "489";//up down
			array_push($tabs, $signfw);
			
			$fwdata1 = new Tab();
			$fwdata1->Type = TabTypeCode::Custom;
			$fwdata1->CustomTabType = CustomTabType::Text;
			$fwdata1->CustomTabWidth = "120";
			$fwdata1->CustomTabHeight = "21";
			$fwdata1->CustomTabRequired = "1";
			#$fwdata1->Value = "".$FirstName." ".$LastName;
			$fwdata1->TabLabel = "Your name";
			$fwdata1->Name = "Your name";
			$fwdata1->DocumentID = "1";
			$fwdata1->PageNumber = $feewaiverpage;
			$fwdata1->RecipientID = "1";
			$fwdata1->XPosition = "147";
			$fwdata1->YPosition = "382";
			array_push($tabs, $fwdata1);
			
			$fwdata2 = new Tab();
			$fwdata2->Type = TabTypeCode::Custom;
			$fwdata2->CustomTabType = CustomTabType::Text;
			$fwdata2->CustomTabWidth = "120";
			$fwdata2->CustomTabHeight = "21";
			$fwdata2->CustomTabRequired = "1";
			#$fwdata2->Value = $StreetLine1." ".$StreetLine2.", ".$HomeCity." ".$HomeState.", ".$Zipcode;
			$fwdata2->TabLabel = "address";
			$fwdata2->Name = "address";
			$fwdata2->DocumentID = "1";
			$fwdata2->PageNumber = $feewaiverpage;
			$fwdata2->RecipientID = "1";
			$fwdata2->XPosition = "150";
			$fwdata2->YPosition = "395";
			array_push($tabs, $fwdata2);
			
			$fwdata3 = new Tab();
			$fwdata3->Type = TabTypeCode::Custom;
			$fwdata3->CustomTabType = CustomTabType::Text;
			$fwdata3->CustomTabWidth = "120";
			$fwdata3->CustomTabHeight = "21";
			$fwdata3->CustomTabRequired = "1";
			#$data3->Value = "".$grossincomeprint;
			$fwdata3->TabLabel = "Monthly gross income";
			$fwdata3->Name = "Monthly gross income";
			$fwdata3->DocumentID = "1";
			$fwdata3->PageNumber = $feewaiverpage;
			$fwdata3->RecipientID = "1";
			$fwdata3->XPosition = "220";
			$fwdata3->YPosition = "425";
			array_push($tabs, $fwdata3);
			
			$fwdata4 = new Tab();
			$fwdata4->Type = TabTypeCode::Custom;
			$fwdata4->CustomTabType = CustomTabType::Text;
			$fwdata4->CustomTabWidth = "120";
			$fwdata4->CustomTabHeight = "21";
			$fwdata4->CustomTabRequired = "1";
			#$fwdata4->Value = "".$HouseHoldCount;
			$fwdata4->TabLabel = "number of persons in household";
			$fwdata4->Name = "number of persons in household";
			$fwdata4->DocumentID = "1";
			$fwdata4->PageNumber = $feewaiverpage;
			$fwdata4->RecipientID = "1";
			$fwdata4->XPosition = "268";
			$fwdata4->YPosition = "408";
			array_push($tabs, $fwdata4);
		}
	}
		// eliminate 0th element
    array_shift($tabs);
    return $tabs;
}

function getToken($status, $clientID, $uniqueid, $brandid, $brand, $tenantid,$auth1,$auth2,$feewaiver) {
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
    $urls->OnCancel = "https://DFWMS01.initiativelegal.com/AfterAuth1.php";
    $urls->OnDecline = 'https://DFWMS01.initiativelegal.com/declineToSign.php?uniqueid=' . "$uniqueid".'&document=Authorization';
    #$urls->OnDecline = 'https://DFWMS01.initiativelegal.com/declineToSign.php?uniqueid=' . "$uniqueid".'&document='.$auth1.''.$auth2.''.$feewaiver.'';    
    $urls->OnException = "https://DFWMS01.initiativelegal.com/AfterAuth1.php";
    $urls->OnFaxPending = 'https://DFWMS01.initiativelegal.com/AfterAuth1.php?uniqueid=' . "$uniqueid".'&statuslevel=Faxpending';
    $urls->OnIdCheckFailed = "https://DFWMS01.initiativelegal.com/thanks.php";
    $urls->OnSessionTimeout = "https://DFWMS01.initiativelegal.com/thanks.php";
    $urls->OnTTLExpired = "https://DFWMS01.initiativelegal.com/thanks.php";
    $urls->OnViewingComplete = 'https://DFWMS01.initiativelegal.com/AfterAuth1.php?uniqueid=' . "$uniqueid".'&statuslevel=Faxpending';
    if ($_oneSigner)
    {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/afterpacket1.php?uniqueid=' . "$uniqueid".'&Auth1='.$auth1.'&Auth2='.$auth2.'&Feewaiver='.$feewaiver.'';
    }
    else
    {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/afterpacket1.php?uniqueid=' . "$uniqueid".'&Auth1='.$auth1.'&Auth2='.$auth2.'&Feewaiver='.$feewaiver.'';
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
    ##ian --)> uncomment this line to allow for SOAP trace, also uncomment the last couple lines of the file that refer to piping arrays into xml
     #print_r($api);
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
        header("Location: errorpretty3.php");
    }
    
    return $status;
}

//========================================================================
// Main
//========================================================================

loginCheck();

if ($_SERVER['REQUEST_METHOD'] == 'GET') 	
#if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $_oneSigner = isset($_POST['OneSigner']);
	$_oneSigner = isset($_REQUEST['OneSigner']);
	if (!isset($auth1))
	{
		$auth1wasNah = 'Yes';
		$auth1 = '';
	}
	if (!isset($auth2))
	{
		$auth2wasNah = 'Yes';
		$auth2 = '';
	}
	if (!isset($feewaiver))
	{
		$fwwasNah = 'Yes';
		$feewaiver = '';
	}
	
	$NotImportant = '';
    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$auth1pagenumber,$auth2pagenumber,$feewaiverpagenumber,$auth1,$auth2,$feewaiver);
#	    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$auth1pagenumber,$auth2pagenumber,$feewaiverpagenumber,$auth1,$auth2,$feewaiver);
		if(isset($auth1wasNah))
		{
			empty($auth1);
			unset($auth1);
		}
		if(isset($auth2wasNah))
		{
			empty($auth2);
			unset($auth2);
		}
		if(isset($fwwasNah))
		{
			empty($feewaiver);
			unset($feewaiver);
		}
				
		if(!$_oneSigner)
		{
			$_showTwoSignerMessage = true;
		}

}
if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken']))
{





echo '<body>';


echo '<div id="main">';
echo '<div id="message">';
//echo '<h4>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
//echo '<h3><span class="underline">STEP ONE:</span> Sign Two Authorization Forms.</h3>';
//echo '<ul>';
//echo '<li><p>There are two forms you will be asked to sign. The first is an Authorization for Settlement form. By signing this Authorization form, you will allow our law firm to settle and release your potential wage and hour claims against Macy\'s on your behalf for at least $200 total, after the deduction of legal fees or costs.</p></li>';
//echo '<li><p>The second is an Authorization for Release of Personnel File and Wage Records form. By signing this Authorization form, you will help us request from Macy\'s the release of your employment records to our law firm, which may be helpful to support your claims. </p></li>';
//echo '<li><p>Please fill out the two Authorization forms by completing these <strong>three</strong> items:</p></li>';
//echo '</ul>';
//
//echo '<ol>';
//echo '<li><p>Carefully review the Authorization forms and verify the spelling of your full name at the top of each document.</p></li>';
//echo '<li><p>When prompted, use your computer mouse to draw your electronic signature.  Don\'t worry if your signature does not look like your regular signature.  All that is required is that you make an original mark on this document. Signature instructions will be included in the document.</p></li>';
//echo '<li><p>Please click on the "confirm signing" button after you have verified the spelling of your name and electronically signed the forms and you will proceed to the next step of the process.</p></li>';
//
//echo '</ol>';
echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';

echo "<table align='center' width='1100px' border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<td  height='1700px'   align='center'>";
		echo "<iframe  align='middle' marginheight='5%' width='99%' height='98%' src='";
		echo $_SESSION['embedToken'] . "&id='focusstealer' name='focusstealer' frameborder='0' ";
		echo 'onload="reloadPage()"';
		echo "></iframe>";
		
		echo "</td>";
		echo "</tr>";
		echo "</table>";


echo "</div>";

echo '</div>';
echo '</div>';


echo '</body>';

}
	
}//wrap end--If they've completed the the auth form already they wont see the above
else
{ // a message for ... anyone who some how got here without signing a retainer first
	echo "There is candy here but you can't have any until you sign a retainer. <br>&nbsp&nbsp&nbsp&nbsp-- A helpful error message from PHP Gremlins everywhere.";
}
}
?>
<?PHP 

//if (isset($authformreceived)) if (!isset($longformcompleteonline))
//{//wrap this in conditional -- only if never completed the long form
//
//echo '<script type="text/javascript">';
//echo 'function reloadPage()';
//echo '{';
//echo 'window.top.location.replace("https://macyslawsuit.com/longform/?uniqueid='.$uniqueid.'");';
//echo '}';
//echo '<\/script>';
//
//
//echo '<body onload="reloadPage()">';
//}//wrap end--If they've completed the long form already they wont see the above
//if (isset($authformreceived)) if (isset($longformcompleteonline))
//{
//	require("AfterLongForm.php");
//}
?>

<!--
[__last_response_headers] => <?xml version=”1.0 encoding=”UTF-8”?>
[__lastRequest] => <?xml version=”1.0 encoding=”UTF-8”?>-->

</div>
</html>