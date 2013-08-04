<?PHP // credential api service proxy classes and soapclient
include("docusign/CodeSnippets/api/CredentialService.php");
// transaction api service proxy classes and soapclient
include("docusign/CodeSnippets/api/APIService.php");
 
// TODO: Use Integrator's Key from Docusign DevCenter Account Preferences API
$IntegratorsKey = "PREF-7a494820-fcfd-4a5a-88dd-90402a914ce9";
// TODO: Use your Docusign DevCenter Account email
$UserID = "dbc1a2b2-088b-4825-a489-c71503e498cf";
// TODO: Use your Docusign DevCenter Account password
$Password = "siec9oanoapoeqiA";
// TODO: Use API Account ID from Docusign DevCenter Account Preferences API
$AccountID = "dbc1a2b2-088b-4825-a489-c71503e498cf";
// TODO: put in your timezone or make it null
$TimeZone = 'America/Los_Angeles';
 
//=============================================================================
// Set up the API
//=============================================================================

$api_endpoint = "https://demo.docusign.net/api/3.0/api.asmx";
$api_wsdl = "docusign/CodeSnippets/api/APIService.wsdl";
$api_options = array('location'=>$api_endpoint,'trace'=>true,'features' =>
     SOAP_SINGLE_ELEMENT_ARRAYS);
$api = new APIService($api_wsdl, $api_options);
$api->setCredentials("[" . $IntegratorsKey . "]" . $UserID, $Password);
	
$Recipient1Email = "defter@gmail.com";
// Create the recipient
$rcp1 = new Recipient();// First recipient to put in recipient array
$rcp1->UserName = "John Doe";
$rcp1->Email = $Recipient1Email;
$rcp1->Type = RecipientTypeCode::Signer;
$rcp1->ID = "1";
$rcp1->RoutingOrder = 1;
$rcp1->RequireIDLookup = FALSE;
 
// Create the envelope contents
$env = new Envelope();
$env->AccountId = $AccountID; // Note: GUID should be used here rather than email
$env->Subject = "Subject";
$env->EmailBlurb = "testing docusign creation services";
$env->Recipients = array($rcp1);
 
// Attach the document
$doc = new Document();
$doc->ID = "1";
$doc->Name = "Picture PDF";
$doc->PDFBytes = file_get_contents("packaged.pdf");
$env->Documents = array($doc);
 
// Create a new signature tab
$tab = new Tab();
$tab->DocumentID = "1";
$tab->RecipientID = "1";
$tab->Type = TabTypeCode::SignHere;
$tab->PageNumber = "1";
$tab->XPosition = "100";
$tab->YPosition = "100";
$env->Tabs = array($tab);
 
// Create a draft envelope on the account
$createEnvelopeparams = new CreateEnvelope();
$createEnvelopeparams->Envelope = $env;
$response = $api->CreateEnvelope($createEnvelopeparams);

$envStatus = $response->CreateEnvelopeResult;
 
// Send
$sendEnvelopeparams = new SendEnvelope();
$sendEnvelopeparams->AccountId = $AccountID;
$sendEnvelopeparams->EnvelopeId = $envStatus->EnvelopeID;
$response = $api->SendEnvelope($sendEnvelopeparams);
?>