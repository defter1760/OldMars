<?PHP
require("iansmakeproperretainer2.php");
?>
<?PHP
$query = "select attorneyfname,attorneylname,attorneyemail,username,password from tbl_attorneyassign where attorneylname=(select agentlname from status where uniqueid='$uniqueid');";
$results = sqlsrv_query($conn,$query);

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

}
else
{
    $feewaiverpagenumber = '1000';
}

while($row = sqlsrv_fetch_array($results))
{
    $assignedattorneylname = $row['attorneylname']; if (empty($assignedattorneylname)) unset($assignedattorneylname);
    $assignedattorneyfname = $row['attorneyfname']; if (empty($assignedattorneyfname)) unset($assignedattorneyfname);
    $assignedattorneyemail = $row['attorneyemail']; if (empty($assignedattorneyemail)) unset($assignedattorneyemail);
}

switch ($assignedattorneylname)
	{
	    case ($assignedattorneylname == 'Chang'):
		$assignedattorneyphone = "1.310.405.0778";
		$sigFile = 'MChang.png';
		$sigXacc = '10';
		$sigYacc = '175';
		$sigXrej = '10';
		$sigYrej = '207';
		$sigScale = '20';
		##$pdf->Image('VChettySig.png',10,195,'','50');
		##$pdf->Image($sigFile,$sigXacc,$sigYacc,'',$sigScale);
		##$pdf->Image($sigFile,$sigXrej,$sigYrej,'',$sigScale);
	    break;
	    case ($assignedattorneylname == 'Grether'):
		$assignedattorneyphone = "1.310.405.0780";
		$sigFile = 'NGrether.png';
		$sigXacc = '9';
		$sigYacc = '175';
		$sigXrej = '9';
		$sigYrej = '207';
		$sigScale = '19';
	    break;
	    case ($assignedattorneylname == 'Lee'):
		$assignedattorneyphone = "1.310.405.0776";
		$sigFile = 'MLee.png';
		$sigXacc = '10';
		$sigYacc = '175';
		$sigXrej = '10';
		$sigYrej = '207';
		$sigScale = '19';	
	    break;
	    case ($assignedattorneylname == 'Trejo'):
		$assignedattorneyphone = "1.310.405.0129";
		$sigFile = 'JTrejo.png';
		$sigXacc = '7';
		$sigYacc = '175';
		$sigXrej = '8';
		$sigYrej = '207';
		$sigScale = '21';	
	    break;	
	    case ($assignedattorneylname == 'Zak'):
		$assignedattorneyphone = "1.424.270.0443";
		$sigFile = 'HZak.png';
		$sigXacc = '10';
		$sigYacc = '175';
		$sigXrej = '10';
		$sigYrej = '207';
		$sigScale = '19';	
	    break;
	    case ($assignedattorneylname == 'Savoy'):
		$assignedattorneyphone = "1.424.256.7986";
		$sigFile = 'GSavoy.png';
		$sigXacc = '13';
		$sigYacc = '172';
		$sigXrej = '13';
		$sigYrej = '207';
		$sigScale = '25';		
	    break;
	}


        $brandname = "Macys"; 
	$pdf = new PDF_Code128();
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
	$agentname = $assignedattorneyfname.' '.$assignedattorneylname;
	$agentemail = 'macyslawsuit@initiativelegal.com';
	
	$caseattorneyname = '                                                                                                                                          '.$agentname;
	$caseattorneyphonenumber = '                                                                                                                                          '.$assignedattorneyphone;
	$caseattorneyemail = '                                                                                                                                          '.$agentemail;
	$hellotitle = 'CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION';
	$hello = "$clientname" . ' ("Client") ';
	$hello2 = date('F').' '.date('j').', '.date('Y');
	$printyourfullname = 'VIA U.S. MAIL';
	$yourbestphonenumber = $FirstName.' '.$LastName;
	$addressline1 = $Street1.' '.$Street2;
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

//                $pdf->Ln();
//                $pdf->SetFont('Times','',12);
//                $pdf->MultiCell(0,5,'Initiative Legal Group APC','','L');
//                $pdf->Ln(-1);
//                $pdf->MultiCell(0,5,'CO: Macy\'s Lawsuit','','L');
//                $pdf->Ln(-1);
//                $pdf->MultiCell(0,5,'1800 Century Park East','','L');
//                $pdf->Ln(-1);
//                $pdf->MultiCell(0,5,'2nd Floor','','L');
//                $pdf->Ln(-1);
//                
//                $pdf->MultiCell(0,5,'Century City, CA 90067','','L');
//                $pdf->Ln(-1);
//                $pdf->SetFont('Times','B',14);
//                $pdf->MultiCell(0,5,'ATTORNEY ADVERTISEMENT','','L');                
//                $pdf->Ln(50);
//                $pdf->SetFont('Times','',12);
//                $pdf->MultiCell(0,5,$fiftyspace.''.$fiftyspace.''.$yourbestphonenumber,'','L');
//                $pdf->Ln(0);
//                $pdf->SetFont('Times','',12);
//                $pdf->MultiCell(0,5,$fiftyspace.''.$fiftyspace.''.$addressline1,'','L');
//                $pdf->Ln(0);
//                $pdf->SetFont('Times','',12);
//                $pdf->MultiCell(0,5,$fiftyspace.''.$fiftyspace.''.$addressline2,'','L');
//                $pdf->Ln();
//                $code = $row['uniqueid'];
//		$pdf->Code128(10,40,$code,50,3);
//
$pdf->Ln(99);
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,'Initiative Legal Group APC','','L');
	$pdf->Ln(-1);
	$pdf->MultiCell(0,5,'c/o Macy\'s Lawsuit','','L');
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
	
	$pdf->AddPage('','','',$feewaiverpagenumber);
	$pdf->Image('logo.png',60,13,'','12');
	#$pdf->Image('logo.png',);
	#$pdf->Image('logo.png',62,13,8,0,'','');
	$pdf->Ln();
	#$pdf->SetFont('helvetica','B',12);
	#$pdf->MultiCell(0,5,$hellocompany,'','C');
	$pdf->Ln(3);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$caseattorneyname,'','R');
	$pdf->Ln(-1);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','R');
	$pdf->Ln(-1);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$caseattorneyemail,'','R');
	$pdf->Ln();
	$pdf->SetFont('Times','BU',11);
	$pdf->MultiCell(0,5,$hellotitle,'','C');
	$pdf->Ln();
	#$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$hello2);
	$pdf->Ln();
	$pdf->SetFont('Times','U',10);
	$pdf->MultiCell(0,5,$printyourfullname);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$yourbestphonenumber);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$addressline1);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$addressline2);
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->Cell(0,5,'Subject:');
	$pdf->Ln(0);
	$pdf->SetFont('Times','I',10);
	$pdf->Cell(0,5,$get1);
	$pdf->Ln(5);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$get2);
	$pdf->Ln(5);
	//$pdf->SetFont('Times','',12);
	//$pdf->MultiCell(0,5,$get2);
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,'Dear '.$yourbestphonenumber.': ');
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$get3);
	$pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$get4);
	$pdf->Ln();
        $pdf->SetFont('Times','',10);
        $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'1.');

        if ($auth1 == 'Auth1Set')
        {
            $pdf->Ln(-5);
            $pdf->SetFont('Times','B',10);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     Authorization for Settlement form:');
            $pdf->Ln(-5);
            $pdf->SetFont('Times','',10);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.'       Although Initiative Legal Group does not guarantee or');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     promise any specific outcome for your case, by signing this Authorization form, if and when ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     the time comes, you will allow our law firm to settle and release your potential wage and ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     hour claims against Macy\'s on your behalf for at least $200 total, after the deduction of legal ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     fees and costs.  ');
	}
                if ($auth2 == 'Auth2Set')
        {
                        if ($auth1 == 'Auth1Set')
            {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'2.');
            }
            $pdf->Ln(-5);
            $pdf->SetFont('Times','B',10);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     Authorization for Release of Personnel File and Wage Records form:');
            $pdf->Ln(-5);
            $pdf->SetFont('Times','',10);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.'                         By signing this');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     Authorization form, you will direct Macy\'s to release your employment records to our law');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     firm, which may be helpful to support your claims.');
	}
        if ($feewaiver == 'FeewaiverSet')
        {
            if ($auth2 == 'Auth2Set')
            {
                if ($auth1 == 'Auth1Set')
                {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'3.');
                }
                else
                {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'2.');
                }
            }
            else
            {
                if ($auth1 == 'Auth1Set')
                {
                $pdf->Ln();
                $pdf->SetFont('Times','',10);
                $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'2.');
                }
            }
            
            $pdf->Ln(-5);
            $pdf->SetFont('Times','B',10);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     Affidavit for Waiver of Fees Notice form:');
            $pdf->Ln(-5);
            $pdf->SetFont('Times','',10);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace.'        Our law firm will advance all costs so there are');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     no out-of-pocket costs you will have to pay.  This form will allow us to request that the  ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     American Arbitration Association waive the filing fee that our law firm would have to pay if  ');
            $pdf->Ln(0);
            $pdf->MultiCell(0,5,$tenspace.''.$tenspace.'     and if and when your case is filed. ');

	}
        $pdf->Ln();
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,'If you have any questions, please don\'t hesitate to call me at '.$assignedattorneyphone.', Monday through Friday.');
	$pdf->Ln();
    $pdf->SetFont('Times','',10);
    $pdf->MultiCell(0,5,'Sincerely,');
    $pdf->Image($sigFile,$sigXacc,$sigYacc,'',$sigScale);
    #$pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->MultiCell(0,5,$agentname,'','L');
    #$pdf->Ln(-1);
    $pdf->MultiCell(0,5,'Case Attorney','','L');
    #$pdf->Ln();
	#$pdf->Ln();
	$pdf->SetFont('Times','',10);
        IF ($auth1 == 'Auth1Set')
        {
            $enclosure = 'Authorization for Settlement';
            $enclosurefilename = 'Authorization for Settlement';
        }
        if ($auth2 == 'Auth2Set')
        {
            IF ($auth1 == 'Auth1Set')
            {
                $enclosure = $enclosure.', Authorization for Release of Personnel File and Wage Records';
                $enclosurefilename = $enclosurefilename.', Authorization for Release';
            }
            else
            {
                $enclosure = 'Authorization for Release of Personnel File and Wage Records';
                $enclosurefilename = 'Authorization for Release';              
            }
        }
        if ($feewaiver == 'FeewaiverSet')
        {
            IF (isset ($enclosure))
            {
                if ($enclosure == 'Authorization for Settlement, Authorization for Release of Personnel File and Wage Records')
                {
                    $enclosure = $enclosure.', and Affidavit for Waiver of Fees Notice';
                    $enclosurefilename = $enclosurefilename.', and Affidavit for Waiver of Fees Notice';
                }
                else
                {
                    $enclosure = $enclosure.', Affidavit for Waiver of Fees Notice';
                    $enclosurefilename = $enclosurefilename.', Affidavit for Waiver of Fees Notice';
                }
            }
            else
            {
                $enclosure = 'Affidavit for Waiver of Fees Notice';
                $enclosurefilename = 'Affidavit for Waiver of Fees Notice';
            }
        }
	$pdf->MultiCell(0,5,'Enclosure: '.$enclosure.'.');
	$code= $uniqueid;
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
        $clientname = "$FirstName" . " $LastName";
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
}//if auth1 is set to send, wrap close here
if ($auth2 == 'Auth2Set')
{
        $pdf->AddPage('','',$uniqueid,$feewaiverpagenumber);
        $hellocompany = 'INITIATIVE LEGAL GROUP APC';
        $pdf->Image('logo.png',62,15,'',8,0,'','');
        
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
#        $pdf->SetXY(130,270);
        #$pdf->Write(5,''.$code.'');
}//if auth2 is set to send, wrap close here
if ($feewaiver == 'FeewaiverSet')
{
        $pdf->AddPage('','',$uniqueid,$feewaiverpagenumber);
        #$hellocompany = 'INITIATIVE LEGAL GROUP APC';
        #$pdf->Image('logo.png',62,22,8,0,'','');
        $pdf->Ln();
#        $pdf->Ln();
        $pdf->SetFont('helvetica','B',12);
        #$pdf->MultiCell(0,5,$hellocompany,'','C');
#        $pdf->Ln();
#        $pdf->Ln();
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
#        $pdf->Cell(0,5,'Hello');
#        $code= $uniqueid;
#        $pdf->Code128(70,286,$code,70,2);
#        $pdf->SetXY(130,270);
#        $pdf->Write(5,''.$code.'');

}

	$dir='/inetpub/wwwroot/';
	$filename = "$LastName, " .  "$FirstName" . " - ".$enclosurefilename." - Packet - ".$uniqueid.' - '.$assignedattorneylname; 
	$ext = ".pdf";
        
	$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F",$uniqueid,$feewaiverpagenumber); //pushes file to server for temp storage
	$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F",$uniqueid,$feewaiverpagenumber);
	
	$ftp_server = '10.129.3.21';
	$ftp_user_name = 'sqlsrv';
	$ftp_user_pass = 'password';
	$dir0 = '/' . "$brandname" . '/';
	$filename3 = "$LastName, " .  "$FirstName" . " - ".$uniqueid; 
	$dir1 = "$dir0" . "$filename3";
	$dir2 = "$dir1" . '/';
	$dir3 = "$dir1" . '/';
	$file = "$filename" . "$ext";
	#$file2 = "$filename2" . "$ext";
	$conn_id = ftp_connect($ftp_server);
	
	// login with username and password
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
	ftp_put($conn_id, $file, $file, FTP_BINARY);
	ftp_close($conn_id);
	unlink($file); //delete temp copy pdf stored on server


?>