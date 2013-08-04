<?php 
require ("include/ianSession.php"); // initializes session and provides
require ("api/ianCredential.php");
require ("api/APIService.php");
require ("include/utils.php");

//ian)->embedd the creds here
		#$_SESSION["UserID"] = "ihutchings@preferredlegalsupport.com";
		$_SESSION["UserID"] = "ihutchings@initiativelegal.com";
		#$_SESSION["AccountID"] = "c468460b-4d8f-4fd6-980c-0974de9c815a";
		$_SESSION["AccountID"] = "a195e868-0495-4894-9865-12e436e1eea8";
        $_SESSION["Password"] = "siec9oanoapoeqiA";
        #$_SESSION["IntegratorsKey"] = "PREF-7a494820-fcfd-4a5a-88dd-90402a914ce9";
        $_SESSION["IntegratorsKey"] = "INIT-ec3b5acd-ad64-496b-b821-2b89ae424e82";
$_oneSigner = true; // Do we want One Signer (=true) or Two (=false)
$_showTwoSignerMessage = false; // Display (or not display) a message before Signer One has signed (only for Two Signer mode)
$_showTransitionMessage = false; // Display (or not display) a message after Signer One has signed (only for Two Signer mode)
$filename = "$LastName, " .  "$FirstName" . " - Authorization -  $uniqueid"; 
$chewypdf = './Retainerstmp/'."$filename".'.pdf';
$pdfname = "$filename";
$chewonthis = "PDFBytes = file_get_contents($chewypdf)";
function createAndSend($pdffilename,$subject,$name,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$Email,$RecipientName2,$RecipientEmail2,$phone1) {
    global $_oneSigner;
    $status = "";
    $env = new Envelope();
    $env->Subject = $subject;
    $env->EmailBlurb = "This envelope demonstrates embedded signing";
    $env->AccountId = $_SESSION['AccountID'];
    $env->Recipients = constructRecipients($FirstName,$LastName,$Email,$RecipientName2,$RecipientEmail2);
    $doc = new Document();
    $doc->PDFBytes = file_get_contents($pdffilename);
	$doc->Name = $name;
    $doc->ID = "1";
    $doc->FileExtension = "pdf";
    $env->Documents = array($doc);
    $env->Tabs = addTabs(count($env->Recipients),$FirstName,$LastName,$phone1);
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
function constructRecipients($FirstName,$LastName,$Email,$RecipientName2,$RecipientEmail2) {
    $recipients = array();
    
    $count = count($FirstName);
    for ($i = 1; $i <= $count; $i++) {
   	if(empty($FirstName) ||
    			 empty($FirstName)){
    			 	continue;
    		}
    	
        $r1 = new Recipient();
        
        $r1->UserName = $FirstName. ' ' .$LastName;
        $r1->Email = $Email;
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
		array_push($recipients, $r2);

    }
    
    if(empty($recipients)){
	    $_SESSION['errorMessage'] = "You must include at least 1 Recipient";
	    header("Location: error.php");
	    exit;
    }
    
    return $recipients;
}


function addTabs($count,$FirstName,$LastName,$phone1) {
    $tabs[] = new Tab();
    
//first page initials at bottom right
    $init1 = new Tab();
    $init1->Type = TabTypeCode::InitialHere;
    $init1->DocumentID = "1";
    $init1->PageNumber = "1";
    $init1->RecipientID = "1";
    $init1->XPosition = "530";
    $init1->YPosition = "778";
    array_push($tabs, $init1);
    
    $sign1 = new Tab();
    $sign1->Type = TabTypeCode::SignHere;
    $sign1->DocumentID = "1";
    $sign1->PageNumber = "2";
    $sign1->RecipientID = "1";
    $sign1->XPosition = "60";
    $sign1->YPosition = "659";
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
    $date1->YPosition = "695";
    array_push($tabs, $date1);


$data1 = new Tab();
$data1->Type = TabTypeCode::Custom;
$data1->CustomTabType = CustomTabType::Text;
$data1->CustomTabWidth = "110";
$data1->CustomTabHeight = "21";
$data1->CustomTabRequired = "0";
$data1->TabLabel = "Emergency Contact";
$data1->Name = "Emergency Contact Name";
$data1->DocumentID = "1";
$data1->PageNumber = "1";
$data1->RecipientID = "1";
$data1->XPosition = "28";
$data1->YPosition = "222";
array_push($tabs, $data1);

$data3 = new Tab();
$data3->Type = TabTypeCode::Custom;
$data3->CustomTabType = CustomTabType::Text;
$data3->CustomTabWidth = "120";
$data3->CustomTabHeight = "21";
$data3->CustomTabRequired = "0";
$data3->Value = $FirstName." ".$LastName;
$data3->TabLabel = "Full name";
$data3->Name = "Full name";
$data3->DocumentID = "1";
$data3->PageNumber = "1";
$data3->RecipientID = "1";
$data3->XPosition = "28";
$data3->YPosition = "168";
array_push($tabs, $data3);

$data5 = new Tab();
$data5->Type = TabTypeCode::Custom;
$data5->CustomTabType = CustomTabType::Text;
$data5->CustomTabWidth = "60";
$data5->CustomTabHeight = "21";
$data5->CustomTabRequired = "0";
$data5->TabLabel = "Relationship";
$data5->Name = "Relationship";
$data5->DocumentID = "1";
$data5->PageNumber = "1";
$data5->RecipientID = "1";
$data5->XPosition = "267";
$data5->YPosition = "222";
array_push($tabs, $data5);

$data6 = new Tab();
$data6->Type = TabTypeCode::Custom;
$data6->CustomTabType = CustomTabType::Text;
$data6->CustomTabWidth = "95";
$data6->CustomTabHeight = "21";
$data6->CustomTabRequired = "0";
$data6->TabLabel = "Phone";
$data6->Name = "Phone";
$data6->DocumentID = "1";
$data6->PageNumber = "1";
$data6->RecipientID = "1";
$data6->XPosition = "396";
$data6->YPosition = "222";
array_push($tabs, $data6);


$data4 = new Tab();
$data4->Type = TabTypeCode::Custom;
$data4->CustomTabType = CustomTabType::Text;
$data4->CustomTabWidth = "120";
$data4->CustomTabHeight = "21";
$data4->CustomTabRequired = "0";
$data4->Value = $FirstName." ".$LastName;
$data4->TabLabel = "Full name";
$data4->Name = "Full name";
$data4->DocumentID = "1";
$data4->PageNumber = "2";
$data4->RecipientID = "1";
$data4->XPosition = "28";
$data4->YPosition = "751";
array_push($tabs, $data4);

$data2 = new Tab();
$data2->Type = TabTypeCode::Custom;
$data2->CustomTabType = CustomTabType::Text;
$data2->CustomTabWidth = "120";
$data2->CustomTabHeight = "21";
$data2->CustomTabRequired = "0";
$data2->Value = $phone1;
$data2->TabLabel = "Your best phone number";
$data2->Name = "Your best phone number";
$data2->DocumentID = "1";
$data2->PageNumber = "1";
$data2->RecipientID = "1";
$data2->XPosition = "28";
$data2->YPosition = "195";
array_push($tabs, $data2);
     
    $init2 = new Tab();
    $init2->Type = TabTypeCode::InitialHere;
    $init2->DocumentID = "1";
    $init2->PageNumber = "2";
    $init2->RecipientID = "1";
    $init2->XPosition = "530";
    $init2->YPosition = "778";
    array_push($tabs, $init2);
    array_shift($tabs);
    
    return $tabs;
}

function getToken($status, $clientID, $uniqueid, $brandid, $brand, $tenantid) {
    global $_oneSigner;
    $token = null;
    $_SESSION['embedToken'];
       
	$assertion = new RequestRecipientTokenAuthenticationAssertion();
    $assertion->AssertionID = guid();
    $assertion->AuthenticationInstant = todayXsdDate();
    $assertion->AuthenticationMethod = RequestRecipientTokenAuthenticationAssertionAuthenticationMethod::Password;
    $assertion->SecurityDomain = "DocuSign2011Q1Sample";

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
    $urls->OnCancel = "https://DFWMS01.initiativelegal.com/thanksemail.php?Monkey";
    $urls->OnDecline = "https://DFWMS01.initiativelegal.com/thanksemail.php?Mouse";
    $urls->OnException = "https://DFWMS01.initiativelegal.com/thanksemail.php?Pickle";
    $urls->OnFaxPending = 'https://DFWMS01.initiativelegal.com/thanksemail.php?uniqueid='.$uniqueid.'&statuslevel=Faxpending';
    $urls->OnIdCheckFailed = "https://DFWMS01.initiativelegal.com/thanksemail.php?Elephant";
    $urls->OnSessionTimeout = "https://DFWMS01.initiativelegal.com/thanksemail.php?Chocolate";
    $urls->OnTTLExpired = "https://DFWMS01.initiativelegal.com/thanksemail.php?WAFFLE";
    $urls->OnViewingComplete = "https://DFWMS01.initiativelegal.com/thanksemail.php?Bluetooth";
    if ($_oneSigner) {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/thanksemail.php?uniqueid='.$uniqueid.'&statuslevel=Signed';
    }
    else {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/thanksemail.php?uniqueid='.$uniqueid.'&statuslevel=Signed';
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

loginCheck();

	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_oneSigner = isset($_POST['OneSigner']);
	$_oneSigner = isset($_REQUEST['OneSigner']);
    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$Email,$RecipientName2,$RecipientEmail2,$phone1);
		if(!$_oneSigner){
			$_showTwoSignerMessage = true;
		}
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['envelopeID'])) {

    		if(isset($_GET['from_gsad'])){
    			getToken(getStatus($_GET['envelopeID']),$_GET['clientID'], $uniqueid, $brandid, $brand, $tenantid);
    		} else {
    			$_showTransitionMessage = true;
        	getToken(getStatus($_GET['envelopeID']), 2, $uniqueid, $brandid, $brand, $tenantid);
        }
    } else {
        $_SESSION['embedToken'] = "";
    }
}
?>

<!DOCTYPE html>
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
$link = $_SESSION['embedToken'];

	    		?>