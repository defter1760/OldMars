<?PHP
require("iansmakeproperretainer3.php");
?>

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
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
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
	#echo "It looks like you've already completed the Fee Waiver, give us a call if you have any questions.";
}
?>

<?PHP
$query = "
SELECT 
retaineraccept,feewaivertomailroom,feewaiveraccept,authtomailroom,authaccept,authtomailroom2,authaccept2,FirstName,LastName,brand,email,donotcontact,notqualified,Street1,Street2,City,State,Zipcode
FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results))
        {
            $retaineraccept = $row['retaineraccept']; if (empty($retaineraccept)) unset($retaineraccept);
	    if ($retaineraccept == 'NULL') unset($retaineraccept);
            $feewaiversent = $row['feewaivertomailroom']; if (empty($feewaiversent)) unset($feewaiversent);
            $feewaiveraccept = $row['feewaiveraccept']; if (empty($feewaiveraccept)) unset($feewaiveraccept);
            $authformsent = $row['authtomailroom']; if (empty($authformsent)) unset($authformsent);
            $authaccept = $row['authaccept']; if (empty($authaccept)) unset($authaccept);
            $authformsent2 = $row['authtomailroom2']; if (empty($authformsent2)) unset($authformsent2);
            $authaccept2 = $row['authaccept2']; if (empty($authaccept2)) unset($authaccept2);
            $FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
            $LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
            $brand = $row['retaineraccept']; if (empty($brand)) unset($brand);
            $email = $row['email']; if (empty($email)) unset($email);
            $donotcontact = $row['donotcontact']; if (empty($donotcontact)) unset($donotcontact);
            $notqualified = $row['notqualified']; if (empty($notqualified)) unset($notqualified);
            $Street1 = $row['Street1']; if (empty($Street1)) unset($Street1);
            $Street2 = $row['Street2']; if (empty($Street2)) unset($Street2);
            $City = $row['City']; if (empty($City)) unset($City);
            $State = $row['State']; if (empty($State)) unset($State);
            $Zipcode = $row['Zipcode']; if (empty($Zipcode)) unset($Zipcode);
            
#        print_r($row);
        #echo "<br><br><br><br>";
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
    ## if you we havn't received and accepted a Attorney-Client Agreement then you shouldn't be on this page but just incase, we wrap for it.
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
 #               echo "We need to add Fee Waiver to the pdf!";
                $feewaiver = 'FeewaiverSet';
            }
        }
#        echo '<br>Woof ... means we have accepted the Attorney-Client Agreement<br>';
        
$query = "select attorneyfname,attorneylname,attorneyemail,username,password from tbl_attorneyassign where attorneylname=(select agentlname from status where uniqueid='$uniqueid');";
$results = sqlsrv_query($conn,$query);
if (isset($auth1))
{
	if ($auth1 == 'Auth1Set')
	{
	    $auth1pagenumber = '3';     
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
	    $auth2pagenumber = '4';
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
	    $feewaiverpagenumber = '3';
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
        $brandname = "Macys"; 
#	$pdf = new PDF_Code128();
	$subject1 = './retainers/'. "$brandname" . 'BulkPacketCoverSubject1.txt';
	$subject2 = './retainers/'. "$brandname" . 'BulkPacketCoverSubject2.txt';
	$body1 = './retainers/'. "$brandname" . 'BulkPacketCoverBody1.txt';
	$get1 = file_get_contents($subject1);
	$get2 = file_get_contents($subject2);
	$body1 = './retainers/'. "$brandname" . 'BulkPacketCoverBody1.txt';
	$get3 = file_get_contents($body1);
	$body2 = './retainers/'. "$brandname" . 'BulkPacketCoverBody2.txt';
	$get4 = file_get_contents($body2);
	$body3 = './retainers/'. "$brandname" . 'BulkPacketCoverBody3.txt';
	$get5 = file_get_contents($body3);
	$body4 = './retainers/'. "$brandname" . 'BulkPacketCoverBody4.txt';
	$get6 = file_get_contents($body4);
        $body5 = './retainers/'. "$brandname" . 'BulkPacketCoverBody4.txt';
	$get7 = file_get_contents($body5);
	$hellocompany = 'INITIATIVE LEGAL GROUP APC';

switch ($assignedattorneylname)
	{
	    case ($assignedattorneylname == 'Chang'):
		$assignedattorneyphone = "310.405.0778";
		$agentnamecapp = 'MERCY CHANG';
		$sigFile = 'MChang.png';
		$sigXacc = '10';
		$sigYacc = '187';
		$sigXrej = '10';
		$sigYrej = '207';
		$sigScale = '20';
		##$pdf->Image('VChettySig.png',10,195,'','50');
		##$pdf->Image($sigFile,$sigXacc,$sigYacc,'',$sigScale);
		##$pdf->Image($sigFile,$sigXrej,$sigYrej,'',$sigScale);
	    break;
	    case ($assignedattorneylname == 'Grether'):
		$assignedattorneyphone = "310.405.0780";
		$agentnamecapp = 'NICHOLAS GRETHER';
		$sigFile = 'NGrether.png';
		$sigXacc = '9';
		$sigYacc = '185';
		$sigXrej = '9';
		$sigYrej = '207';
		$sigScale = '19';
	    break;
	    case ($assignedattorneylname == 'Lee'):
		$assignedattorneyphone = "310.405.0776";
		$agentnamecapp = 'MICHELLE LEE';
		$sigFile = 'MLee.png';
		$sigXacc = '10';
		$sigYacc = '187';#204 now
		$sigXrej = '10';
		$sigYrej = '207';
		$sigScale = '19';	
	    break;
	    case ($assignedattorneylname == 'Trejo'):
		$assignedattorneyphone = "310.405.0129";
		$agentnamecapp = 'JOSE TREJO';
		$sigFile = 'JTrejo.png';
		$sigXacc = '7';
		$sigYacc = '183';
		$sigXrej = '8';
		$sigYrej = '207';
		$sigScale = '21';	
	    break;	
	    case ($assignedattorneylname == 'Zak'):
		$assignedattorneyphone = "424.270.0443";
		$agentnamecapp = 'HEATHER ZAK';
		$sigFile = 'HZak.png';
		$sigXacc = '10';
		$sigYacc = '182';
		$sigXrej = '10';
		$sigYrej = '207';
		$sigScale = '19';	
	    break;
	    case ($assignedattorneylname == 'Savoy'):
		$assignedattorneyphone = "424.256.7986";
		$agentnamecapp = 'GRANT SAVOY';
		$sigFile = 'GSavoy.png';
		$sigXacc = '13';
		$sigYacc = '180';
		$sigXrej = '13';
		$sigYrej = '207';
		$sigScale = '25';		
	    break;
	}	
	
	if ($feewaiver == 'FeewaiverSet')
        {
            if ($auth2 == 'Auth2Set')
            {
                if ($auth1 == 'Auth1Set')
                {
			$sigYacc = '225';
                }
                else
                {
			$sigYacc = '200';
                }
            }
            else
            {
                if ($auth1 == 'Auth1Set')
                {
			$sigYacc = '210';
                }
	    }
	}
	else
	{
	    if ($auth1 == 'Auth1Set')
	    {
		    $sigYacc = '206';
	    }
	    
	    
	    if ($auth1 != 'Auth1Set')
	    {
		if ($auth2 == 'Auth2Set')
		{
			$sigYacc = '180';
		}
	    }
	    
	}
	
	$agentname = $assignedattorneyfname.' '.$assignedattorneylname;
	$agentemail = 'macyslawsuit@initiativelegal.com';
	
	$caseattorneyname = '                                                                                                                                          '.$agentnamecapp;
	$caseattorneyphonenumber = '                                                                                                                                          '.$assignedattorneyphone;
	$caseattorneyemail = '                                                                                                                                          '.$agentemail;
	$hellotitle = 'CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION';
	$hello = "$clientname" . ' ("Client") ';
	$hello2 = date('F').' '.date('j').', '.date('Y');
	$printyourfullname = 'VIA U.S. MAIL';
	$yourbestphonenumber = $FirstName.' '.$LastName;
        if (isset($Street2))
        {
            $addressline1 = $Street1.' '.$Street2;  
        }
        else
        {
            $addressline1 = $Street1;
        }
	$addressline2 = $City.', '.$State.' '.$Zipcode;
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
	$pdf->AddPage('P','',$uniqueid,$feewaiverpagenumber);
$pdf->Ln(99);
	$pdf->SetFont('Times','',16);
	$pdf->MultiCell(0,5,'Initiative Legal Group APC','','L');
	$pdf->Ln(-1);
	$pdf->SetFont('Times','B',14);
	$pdf->MultiCell(0,5,'c/o Macy\'s Lawsuit','','L');
	$pdf->SetFont('Times','',12);
	$pdf->Ln(-1);
	$pdf->MultiCell(0,5,'9663 Santa Monica Blvd., #149','','L');
	$pdf->Ln(-1);
	$pdf->MultiCell(0,5,'Beverly Hills, CA 90210','','L');
	$pdf->Ln();	
	#$pdf->MultiCell(0,5,'Attorney Newsletter','','L');
	$pdf->Ln();	
	#$pdf->MultiCell(0,5,'Monica Balderrama, Esq','','L');
	#$pdf->Ln(3);            
	$pdf->Ln(25);
	$pdf->SetFont('Times','',14);
	$pdf->MultiCell(0,4,$yourbestphonenumber,'','L');
#        $pdf->MultiCell(0,5,$tenspace.''.$fiftyspace.''.$yourbestphonenumber,'','L');
	$pdf->Ln(1);
	$pdf->SetFont('Times','',14);
	$pdf->MultiCell(0,4,$addressline1,'','L');
	$pdf->Ln(1);
	$pdf->SetFont('Times','',14);
	$pdf->MultiCell(0,4,$addressline2,'','L');
	#$pdf->Ln();
	$code = $uniqueid;
	$pdf->Code128(10,185,$code,55,3);

#######
#######	cover letter
#######
	$pdf->AddPage('','','',$feewaiverpagenumber);
	$pdf->Image('logo.png',60,13,'','12');
	#$pdf->Image('logo.png',);
	#$pdf->Image('logo.png',62,13,8,0,'','');
	$pdf->Ln();
	#$pdf->SetFont('helvetica','B',12);
	#$pdf->MultiCell(0,5,$hellocompany,'','C');
	$pdf->Ln(3);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$caseattorneyname,'','R');
	$pdf->Ln(-1);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$caseattorneyphonenumber,'','R');
	$pdf->Ln(-1);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$caseattorneyemail,'','R');
	$pdf->Ln();
	$pdf->SetFont('Times','BU',10);
	$pdf->MultiCell(0,4.5,$hellotitle,'','C');
	$pdf->Ln();
	#$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$hello2);
	$pdf->Ln();
	$pdf->SetFont('Times','U',10);
	$pdf->MultiCell(0,4.5,$printyourfullname);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$yourbestphonenumber);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$addressline1);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$addressline2);
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->Cell(0,4.5,'Subject:');
	$pdf->Ln(0);
	$pdf->SetFont('Times','I',10);
	$pdf->Cell(0,4.5,$get1);
	$pdf->Ln(5);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$get2);
	$pdf->Ln(5);
	//$pdf->SetFont('Times','',12);
	//$pdf->MultiCell(0,5,$get2);
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,'Dear '.$yourbestphonenumber.': ');
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$get3);
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,$get4);
	$pdf->Ln();
        $pdf->SetFont('Times','',10);
        $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'1.');

        if ($auth1 == 'Auth1Set')
        {
            $pdf->Ln(-5);
            $pdf->SetFont('Times','B',10);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     Authorization for Settlement form:');
            $pdf->Ln(-5);
            $pdf->SetFont('Times','',10);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.'       Although Initiative Legal Group does not guarantee or');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     promise any specific outcome for your case, by signing this Authorization form, if and when ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     the time comes, you will allow our law firm to settle and release your potential wage and ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     hour claims against Macy\'s on your behalf for at least $200 total, after the deduction of legal ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     fees or costs.  ');
	}
                if ($auth2 == 'Auth2Set')
        {
                        if ($auth1 == 'Auth1Set')
            {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'2.');
            }
            $pdf->Ln(-5);
            $pdf->SetFont('Times','B',10);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     Authorization for Release of Personnel File and Wage Records form:');
            $pdf->Ln(-5);
            $pdf->SetFont('Times','',10);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.'                         By signing this');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     Authorization form, you will direct Macy\'s to release your employment records to our law');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     firm, which may be helpful to support your claims.');
	}
        if ($feewaiver == 'FeewaiverSet')
        {
            if ($auth2 == 'Auth2Set')
            {
                if ($auth1 == 'Auth1Set')
                {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'3.');
                }
                else
                {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'2.');
                }
            }
            else
            {
                if ($auth1 == 'Auth1Set')
                {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'2.');
                }
            }
            
            $pdf->Ln(-5);
            $pdf->SetFont('Times','B',10);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     Affidavit for Waiver of Fees Notice form:');
            $pdf->Ln(-5);
            $pdf->SetFont('Times','',10);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.'        Our law firm will advance all costs so there are');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     no out-of-pocket costs you will have to pay.  This form will allow us to request that the  ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     American Arbitration Association waive the filing fee that our law firm would have to pay if  ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,4.5,$tenspace.''.$tenspace.'     and when your case is filed. ');

	}
        $pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,4.5,'If you have any questions, please don\'t hesitate to call me at '.$assignedattorneyphone.', Monday through Friday.');
	$pdf->Ln();
    $pdf->SetFont('Times','',10);
    $pdf->MultiCell(0,5,'Sincerely,');
    $pdf->Image($sigFile,$sigXacc,$sigYacc,'',$sigScale);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->MultiCell(0,5,$agentname,'','L');
    #$pdf->Ln(-1);
    $pdf->MultiCell(0,5,'Case Attorney','','L');
    $pdf->MultiCell(0,5,'Enclosure: '.$enclosure.'.');
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
        $authtext = ' give my Attorneys, Initiative Legal Group APC, authority to settle and release my claims for unpaid overtime, missed meal and rest breaks, unpaid minimum wages, unlawful wage deductions, unpaid commissions, wages not timely paid upon termination, failure to provide seating during a work shift, non-compliant wage statements, and derivative claims under California Business & Professions Code sections 17200 et seq. (the "Claims") if the total offer will yield Client at least $200 total, after the deduction of legal fees or costs.';
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
        $authline = '____________________________________________';
        $towhom = 'To Whom It May Concern:';
        $authintro = 'I, ' . "$clientname" . ':';
        $authtext = 'request that Macy\'s, Inc. and any related entities send copies of the following to my attorneys, Initiative Legal Group APC, located at 1800 Century Park East, 2nd Floor, Los Angeles, California 90067 as soon as practicable, but no later than 21 calendar days after the date this request has been submitted:';
        $authtext2 = '          a) My entire employee personnel file, including any documents I signed; and';
        $authtext3 = '          b) All of my time, wage and payroll records, including my wage stubs in their entirety.';
        $authtext4 = 'I hereby expressly authorize and appoint Initiative Legal Group, APC as my representative to act on my behalf and in my place to obtain my personnel file and time, wage and payroll records by any and all means necessary and available.';
        $authsignline = '__________________________________              ________________';
        $authsigntext = 'SIGN YOUR FULL NAME                                               Date';
        $pdf->Ln(15);
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
        $pdf->MultiCell(0,10,$authintro);
        $pdf->Ln(1);
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,10,$authtext);
        $pdf->Ln(1);
        $pdf->MultiCell(0,10,$authtext2);
        $pdf->Ln(1);
        $pdf->Cell(0,10,$authtext3);
        $pdf->Ln(10);
        $pdf->MultiCell(0,10,$authtext4);
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
$pdf->Output("/inetpub/wwwroot/mars/$filename2$ext","F",$uniqueid,$feewaiverpdf); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename2$ext","I",$uniqueid,$feewaiverpdf); //pushes file to server for temp storage
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
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
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
    }
}
?>