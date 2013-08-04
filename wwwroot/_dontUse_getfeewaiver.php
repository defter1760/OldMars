<?PHP
require("/mars/style.php");//docutype, css
require("/mars/db.php");//database connection information
require("/mars/ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("/mars/functions.php");//functions
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
?>
<style type="text/css">

body {
	font-family: 'Open Sans', sans-serif;
	/*color:#424242;*/
	color:#000000;
	margin:0;
	/*text-align:center;*/
	height:100%;
	font-size:12px;
	background-repeat: no-repeat;

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
        font-size:10px;
    }
	.HeaderRed {
	color: #900;
}

/*this centers the whole document :)*/
div#main {

  width:950px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
div#main2 {

  width:99%;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
</style>
<body>
<?PHP
if (isset($uniqueid))
{

$date = date('Y').'-'.date('m').'-'.date('d');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');
require("/mars/uniqueid_row.php");
require("/mars/uniqueiddata_row.php");
#require("/mars/iansmakepdf_feewaiver.php");//functions
#makefeewaiver2($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName);
$Email = $email;
//docusign start

$RecipientName2 = "Macys Lawsuit";
$RecipientEmail2 = "macyslawsuit@initiativelegal.com";
//require ("include/ianSession.php"); 
//require ("api/ianCredential.php");
//require ("api/APIService.php");
//require ("include/utils.php");
//		$_SESSION["UserID"] = "ihutchings@initiativelegal.com";
//		$_SESSION["AccountID"] = "873db901-09a0-460f-933a-e0069b414d3f";
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
$filename2 = "$LastName, " .  "$FirstName" . " - Feewaiver - $uniqueid"; 
$chewypdf = './mars/Retainerstmp/'."$filename2".'.pdf';
$pdfname = "$filename2";
$chewonthis = "PDFBytes = file_get_contents($chewypdf)";
function createAndSend($pdffilename,$subject,$name,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$grossincomeprint,$HouseHoldCount,$StreetLine1,$StreetLine2,$HomeCity,$HomeState,$Zipcode) {
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
    
    $env->Tabs = addTabs(count($env->Recipients),$grossincomeprint,$HouseHoldCount,$FirstName,$LastName,$StreetLine1,$StreetLine2,$HomeCity,$HomeState,$Zipcode);
    
    $api = getAPI();
    try {
        $csParams = new CreateAndSendEnvelope();
        $csParams->Envelope = $env;
        $status = $api->CreateAndSendEnvelope($csParams)->CreateAndSendEnvelopeResult;
        addEnvelopeID($status->EnvelopeID);
        getToken($status, 1, $uniqueid, $brandid, $brand, $tenantid);
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
	    header("Location: error.php");
	    exit;
    }
    
    return $recipients;
}

function addTabs($count,$grossincomeprint,$HouseHoldCount,$FirstName,$LastName,$StreetLine1,$StreetLine2,$HomeCity,$HomeState,$Zipcode) {
    $tabs[] = new Tab();
    
//first page initials at bottom right
	$sign2 = new Tab();
    $sign2->Type = TabTypeCode::SignHere;
    $sign2->DocumentID = "1";
    $sign2->PageNumber = "1";
    $sign2->RecipientID = "1";
    $sign2->XPosition = "330";//left right
    $sign2->YPosition = "489";//up down
    array_push($tabs, $sign2);

$data1 = new Tab();
$data1->Type = TabTypeCode::Custom;
$data1->CustomTabType = CustomTabType::Text;
$data1->CustomTabWidth = "120";
$data1->CustomTabHeight = "21";
$data1->CustomTabRequired = "0";
$data1->Value = "".$FirstName." ".$LastName;
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
$data2->Value = $StreetLine1." ".$StreetLine2.", ".$HomeCity." ".$HomeState.", ".$Zipcode;
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
$data3->TabLabel = "Monthly gross income";
$data3->Name = "Monthly gross income";
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
$data4->CustomTabRequired = "1";
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
if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{

    $_oneSigner = isset($_POST['OneSigner']);
	$_oneSigner = isset($_REQUEST['OneSigner']);
    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$grossincomeprint,$HouseHoldCount,$StreetLine1,$StreetLine2,$HomeCity,$HomeState,$Zipcode);
		if(!$_oneSigner)
		{
			$_showTwoSignerMessage = true;
		}

}
if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken']))
{


echo "<div id='main'>";
echo "<div class='container'>";
echo "<div id='logo'>";
echo "<h1>INITIATIVE LEGAL GROUP, APC</h1>";
echo "</div>";
echo "<h2>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h2>";
echo "<p>On the next page, you will find an Affidavit for Waiver of Fees Notice. This will allow us to request that the American Arbitration Association waive the filing fee. Please carefully review the information to verify that it is correct.</p>";
echo "<p>Once you have completed your review, use your computer mouse to draw your electronic signature when prompted. Don't worry if your electronic signature does not look exactly like your real signature. All that is required is that you make an original mark on this document.</p>";
echo "<p>Please click on the &quot;confirmed signature&quot; button once you have completed the document and you will proceed to the next step of the process.</p>";
echo "<p>This waiver will only apply and be filed with the American Arbitration Association if the Court declines to allow the pending case against Macy's to proceed as a class action with Initiative Legal Group APC as class counsel and Initiative elects to pursue your claims on an individual basis through arbitration.</p>";
echo "</div>";
echo "</div>";


echo "<div id='main2'>";
echo "<table width='93%' align='center'>";
echo "<tr>";
echo "<td height='1400px' width='' align='center'>";
echo "<iframe  align='middle' marginheight='5%' width='99%' height='99%' src='";
echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe' frameborder='0'></iframe>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
}
?>
</body>
</html>