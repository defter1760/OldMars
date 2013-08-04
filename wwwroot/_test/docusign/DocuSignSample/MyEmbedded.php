<?php 
/**
 * @copyright Copyright (C) DocuSign, Inc.  All rights reserved.
 *
 * This source code is intended only as a supplement to DocuSign SDK
 * and/or on-line documentation.
 * This sample is designed to demonstrate DocuSign features and is not intended
 * for production use. Code and policy for a production application must be
 * developed to meet the specific data and security requirements of the
 * application.
 *
 * THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY
 * KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A
 * PARTICULAR PURPOSE.
 */

/*
 * Display embedded document for signing
 */

//========================================================================
// Includes
//========================================================================
include_once 'include/session.php'; // initializes session and provides
include_once 'api/APIService.php';
include 'include/utils.php';

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
function createAndSend() {
    global $_oneSigner;
    $status = "";
    
    // Construct basic envelope
    $env = new Envelope();
    $env->Subject = "DocuSign API SDK Sample";
    $env->EmailBlurb = "This envelope demonstrates embedded signing";
    $env->AccountId = $_SESSION['AccountID'];
    
    $env->Recipients = constructRecipients($_oneSigner);
    
    $doc = new Document();
    $doc->PDFBytes = file_get_contents("resources/THERETAINER.pdf");
    $doc->Name = $_POST['RecipientName'];
    $doc->ID = "1";
    $doc->FileExtension = "pdf";
    $env->Documents = array($doc);
    
    $env->Tabs = addTabs(count($env->Recipients));
    
    $api = getAPI();
    try {
        $csParams = new CreateAndSendEnvelope();
        $csParams->Envelope = $env;
        $status = $api->CreateAndSendEnvelope($csParams)->CreateAndSendEnvelopeResult;
        addEnvelopeID($status->EnvelopeID);
        getToken($status, 1);
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


function constructRecipients() {
    $recipients = array();
    
    $count = count($_POST['RecipientName']);
    for ($i = 1; $i <= $count; $i++) {
    	
    		// Must contain all POST parameters
    		if(empty($_POST['RecipientName']) ||
    			 empty($_POST['RecipientEmail'])){
    			 	continue;
    		}
    	
        $r1 = new Recipient();
        
        $r1->UserName = $_POST['RecipientName'];
        $r1->Email = $_POST['RecipientEmail'];
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
        
        $r2->UserName = $_POST['RecipientName2'];
        $r2->Email = $_POST['RecipientEmail2'];
        $r2->RequireIDLookup = false;
        $r2->ID = 2;
        $r2->Type = RecipientTypeCode::Signer;
        $r2->RoutingOrder = 2;
        
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


function addTabs($count) {
    $tabs[] = new Tab();
    
//first page initials at bottom right
    $init1 = new Tab();
    $init1->Type = TabTypeCode::InitialHere;
    $init1->DocumentID = "1";
    $init1->PageNumber = "1";
    $init1->RecipientID = "1";
    $init1->XPosition = "530";
    $init1->YPosition = "773";
    array_push($tabs, $init1);
    
    $sign1 = new Tab();
    $sign1->Type = TabTypeCode::SignHere;
    $sign1->DocumentID = "1";
    $sign1->PageNumber = "2";
    $sign1->RecipientID = "1";
    $sign1->XPosition = "40";
    $sign1->YPosition = "656";
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
    $date1->YPosition = "690";
    array_push($tabs, $date1);
    
//page 2 initials        
    $init2 = new Tab();
    $init2->Type = TabTypeCode::InitialHere;
    $init2->DocumentID = "1";
    $init2->PageNumber = "2";
    $init2->RecipientID = "1";
    $init2->XPosition = "530";
    $init2->YPosition = "773";
    array_push($tabs, $init2);
    
	$sign2 = new Tab();
    $sign2->Type = TabTypeCode::SignHere;
    $sign2->DocumentID = "1";
    $sign2->PageNumber = "3";
    $sign2->RecipientID = "1";
    $sign2->XPosition = "60";
    $sign2->YPosition = "328";
    array_push($tabs, $sign2);
    
	$date2 = new Tab();
    $date2->Type = TabTypeCode::DateSigned;
    $date2->DocumentID = "1";
    $date2->PageNumber = "3";
    $date2->RecipientID = "1";
    $date2->XPosition = "300";
    $date2->YPosition = "365";
    array_push($tabs, $date2);
   
//page 3 initials	
	$init3 = new Tab();
    $init3->Type = TabTypeCode::InitialHere;
    $init3->DocumentID = "1";
    $init3->PageNumber = "3";
    $init3->RecipientID = "1";
    $init3->XPosition = "530";
    $init3->YPosition = "773";
    array_push($tabs, $init3);
        
    if ($count > 1) {
        $sign2 = new Tab();
        $sign2->Type = TabTypeCode::SignHere;
        $sign2->DocumentID = "1";
        $sign2->PageNumber = "2";
        $sign2->RecipientID = "2";
        $sign2->XPosition = "273";
        $sign2->YPosition = "656";
        array_push($tabs, $sign2);

        $date3 = new Tab();
        $date3->Type = TabTypeCode::DateSigned;
        $date3->DocumentID = "1";
        $date3->PageNumber = "2";
        $date3->RecipientID = "2";
        $date3->XPosition = "400";
        $date3->YPosition = "690";
        array_push($tabs, $date3);
    }
        
    
    // eliminate 0th element
    array_shift($tabs);
    
    return $tabs;
}

function getToken($status, $clientID) {
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
    $urls->OnCancel = $urlbase . "&event=Cancel&uname=" . $recipient->UserName;
    $urls->OnDecline = $urlbase . "&event=Decline&uname=" . $recipient->UserName;
    $urls->OnException = $urlbase . "&event=Exception&uname=" . $recipient->UserName;
    $urls->OnFaxPending = $urlbase . "&event=FaxPending&uname=" . $recipient->UserName;
    $urls->OnIdCheckFailed = $urlbase . "&event=IdCheckFailed&uname=" . $recipient->UserName;
    $urls->OnSessionTimeout = $urlbase . "&event=SessionTimeout&uname=" . $recipient->UserName;
    $urls->OnTTLExpired = $urlbase . "&event=TTLExpired&uname=" . $recipient->UserName;
    $urls->OnViewingComplete = $urlbase . "&event=ViewingComplete&uname=" . $recipient->UserName;
    if ($_oneSigner) {
        $urls->OnSigningComplete = $urlbase . "&event=SigningComplete&uname=" . $recipient->UserName;
    }
    else {
        $urls->OnSigningComplete = getCallbackURL("pop2.html") . "?envelopeID=" . $status->EnvelopeID;
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

	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_oneSigner = isset($_POST['OneSigner']);
	$_oneSigner = isset($_REQUEST['OneSigner']);
    createAndSend();
		if(!$_oneSigner){
			$_showTwoSignerMessage = true;
		}
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['envelopeID'])) {
    		// Display a message that we are moving on to Signer Number 2
    		// - unless the message is suppressed (by signing from the GetStatusAndDocs page)
    		if(isset($_GET['from_gsad'])){
    			getToken(getStatus($_GET['envelopeID']),$_GET['clientID']);
    		} else {
    			$_showTransitionMessage = true;
        	getToken(getStatus($_GET['envelopeID']), 2);
        }
    } else {
        $_SESSION['embedToken'] = "";
    }
}
?>

<!DOCTYPE html">
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
    		<div class="authbox">
    			<span><?php echo $_SESSION['UserID']; ?>
    		</div>
<table class="tabs" cellspacing="0" cellpadding="0">
	
    		</table>
  <form method="post" id="EmbedDocuSignForm">
	    		<table width="100%">
	    			<tr>
	    				<td class="rightalign">
	    					<input class="docusignbutton orange" name="OneSigner" id="OneSigner" type="submit" value="Create an Envelope with 1 Signer" />
	    				</td>
	    				<td class="leftalign">
	    					<input class="docusignbutton brown" name="TwoSigners" id="TwoSigners" type="submit" value="Create an Envelope with 2 Signers" />
	    				</td>
	    			</tr>
	    		</table>
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
	    		?>
	    				
	    		<?PHP
//ian)->
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//ian)-> This is where the PDF to sign is actually presented to the end user after you build it above
 
	    			// Display the iFrame (if is needed)
	    			if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken'])){
						echo "<iframe class='embediframe' width='50%' height='70%' src='";
echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe'></iframe>";
                        }
	    		?>

  </form>
</div>
    </body>
</html>


