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
 * Lists status of all envelopes in an account
 */

//========================================================================
// Includes
//========================================================================
include_once 'include/session.php'; // initializes session and provides
include_once 'api/APIService.php';
include 'include/utils.php';

//========================================================================
// Functions
//========================================================================
function createStatusTable() 
{//open
    $count = count($_SESSION["EnvelopeIDs"]);
    if (isset($_SESSION["EnvelopeIDs"]) && count($_SESSION["EnvelopeIDs"]) > 0) 
	{//open
		$api = getAPI();
		$filter = new EnvelopeStatusFilter();
		$filter->AccountId = $_SESSION["AccountID"];
		$filter->EnvelopeIds = $_SESSION["EnvelopeIDs"];
		try 
			{//open
			$rsexParams = new RequestStatusesEx();
			$rsexParams->EnvelopeStatusFilter = $filter;
			$statuses = $api->RequestStatusesEx($rsexParams)->RequestStatusesExResult;
			}//close 
		catch (SoapFault $e) 
			{//open
			$_SESSION["errorMessage"] = $e;
			header("Location: error.php");
			}//close
        
		if (isset($statuses)) 
			{//open
			echo "<ul class=''>";
			foreach ($statuses->EnvelopeStatuses->EnvelopeStatus as $status) 
				{//open
				echo "<li>";
				echo "<span><u>";
				echo $status->Subject;
				echo "</u>"; 
				echo "".$status->Status; 
				echo "".$status->EnvelopeID;  
				echo "<a href='getstatusofenvelope.php?envelopeid=".$status->EnvelopeID."' target='_blank' title='Click to see a RequestStatus SOAP return for this Envelope'>View RequestStatus</a>";
				echo "&nbsp;&nbsp;<a href='getpdf.php?envelopeid=".$status->EnvelopeID."' target='_blank' title='Click to download PDF for this Envelope'>Download PDF</a></span>";
				echo "<ul>";
				echo "<!-- Recipients -->";
				echo "<li>";
				echo '<span>Recipients '.(count($status->RecipientStatuses->RecipientStatus) ).'</span>';
				echo "<ul id=".$status->EnvelopeID.">";
				foreach($status->RecipientStatuses->RecipientStatus as $rcpStatus)
				{//open 
				echo "<li>";
				echo "<!-- Recipient Name and Start Signing -->";
				echo ''.$rcpStatus->UserName.'';
				echo "<a href='embeddocusign.php?from_gsad=1&envelopeID=".$status->EnvelopeID."&clientID=".$rcpStatus->ClientUserId.">Start Signing</a>";
				echo "</li>";
				}//close
			echo "</ul>";
			echo "</li>";
			echo "<!-- Documents -->";
			echo "<li>";
			echo "<span>Documents ".(count($status->DocumentStatuses->DocumentStatus))."</span>";
			echo "<ul>";
			foreach($status->DocumentStatuses->DocumentStatus as $docStatus)
				{//open
				echo "<li>";
				echo $docStatus->Name;
				echo "</li>";
				}//close
			echo "</ul>";
			echo "</li>";     		
			echo "</ul>";
			echo "</li>";
			}//close
			echo "</ul>";
		}//close
		}//close
		else 
			{//open
			// No Envelopes created yet
			echo '<tr><td><div class="sampleMessage">';
			echo '	No envelopes created, yet. Use the tabs to create an Envelope.';
			echo '</div></td></tr>';
			}
}

//========================================================================
// Main
//========================================================================
loginCheck();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
}
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
	
}
echo '<!DOCTYPE html">';
echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" href="css/default.css" />';
echo '<link rel="stylesheet" type="text/css" href="css/GetStatusAndDocs.css" />';
echo '<script type="text/javascript" src="js/Utils.js"></script>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
echo '</head>';
echo '<body>';
echo '<script type="text/javascript">';
    			// Invert rows when clicking (not implemented, simple enough to view without deep-clicking)
echo "</script>";
echo '<div class="container">';
echo '<div class="authbox">';
echo '<span>';
echo $_SESSION["UserID"];
echo '</span>'; 
echo '(<a href="index.php?logout">logout</a>)';
echo '</div>';
echo '<table class="tabs" cellspacing="0" cellpadding="0">';
echo '<tr>';
echo '<td><a href="senddocument.php">Send Document</a></td>';
echo '<td><a href="sendatemplate.php">Send a Template</a></td>';
echo '<td><a href="embeddocusign.php">Embed Docusign</a></td>';
echo '<td class="current">Get Status and Docs</td>';
echo '</tr>';
echo '</table>';
echo '<div id="statusDiv">';
createStatusTable(); 
echo '</div>';
include 'include/footer.html';
echo "</div>";
echo "</body>";
echo "</html>";


