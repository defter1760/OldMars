<?php
class EchoSignApiClient {
    
    private $wdsl="https://secure.echosign.com/services/EchoSignDocumentService11?wsdl";
    private $apikey;
    private $client;
    
    public function __construct() {
        $this->client = new SoapClient($this->wdsl);  
    }
    ### Verify if EchoSign API accessable
	### testPing is a simple test method that can be used to confirm that your have the URL for a valid EchoSign Document Service gateway, 
	### are able to successfully communicate with it using SOAP, and have a valid apiKey. If all these conditions are met, you will receive a friendly success message. 
	### If you are not able to call this method successfully, all issues must be resolved before you should attempt calling any of the non-test methods described above.
	### https://secure.echosign.com/static/apiv11/apiMethods11.jsp#testPing
    public function testPing($apikey) {
        #################################################################Get input parameters
        $this->apikey=$apikey;
        #################################################################Call api method
        $pong=$this->client->testPing(array('apiKey' => $this->apikey));
        return $pong->pong->message;
    }
    
	### sendDocument is used to send a document out for signature. This is the main entry point into the EchoSign Document API. 
	### You will need to provide information about who the sender of the document is, who the recipient(s) are, the file(s) 
	### that you'd like to send, and how you want them signed. In addition, there is a variety of other optional flags that control the workflow, described below. 
	### To retrieve the signed final document, you may either poll for it using getDocumentInfo or be notified using the CallbackInfo.
	### All these fields are used for initializing DocumentCreationInfo class. For more information see this link
	### https://secure.echosign.com/static/apiv11/apiMethods11.jsp#DocumentCreationInfo
	### MergeFieldsNames and MergeFieldsValues should be passed as string with ";" delimiter 
    public function sendFile($apikey, $merge_fields_names, $merge_fields_values, $files_arr, $userkey, $email, $password, $recipients, $carbon_copies, $name, $message, $signature_type, $signature_flow, $days_until_signing_deadline, $locale, $reminder_frequency, $callback_url, $sec_opt_password, $sec_opt_protect_signature, $sec_opt_protect_open) {
        #################################################################Get input parameters
        $this->apikey=$apikey;
        $MergeFieldsNames=explode(";", $merge_fields_names);
        $MergeFieldsValues=explode(";", $merge_fields_values);
        for($i=0;$i<count($MergeFieldsNames);$i++) {
            $mergeFields[]=array('fieldName' => $MergeFieldsNames[$i], 'defaultValue' => $MergeFieldsValues[$i]);
        }
        $i=0;
        foreach ($files_arr as $file) {
            if(file_exists($file['tmp_name'])) {
                $files[$i]['fileName']=$file['name'];
                //$files[$i]['mimeType']=$file['type'];
                $files[$i]['file']=file_get_contents($file['tmp_name']);
                $i++;
            }
        }
		### Initializing sender information
		### https://secure.echosign.com/static/apiv11/apiMethods11.jsp#SenderInfo
        if ($userkey!="" || ($email!="" && $password!="")) {
                $senderInfo['email']=$email;
                $senderInfo['password']=$password;
                $senderInfo['userKey']=$userkey;
            $data['senderInfo'] = $senderInfo;
        }
        $documentCreationInfo=array(
            'tos' => explode(";",$recipients),
            'ccs' => explode(";",$carbon_copies),
            'name' => $name,
            'message' => $message,
            'fileInfos' => $files,
            'signatureType' => $signature_type,
            'signatureFlow' => $signature_flow,
            'daysUntilSigningDeadline' => $days_until_signing_deadline, 
            'locale' => $locale, 
            'mergeFieldInfo' => array(
                'mergeFields' => $mergeFields
           )
        );
        if($reminder_frequency!="") $documentCreationInfo['reminderFrequency']=$reminder_frequency;
        if($callback_url!="") $documentCreationInfo['callbackInfo']['signedDocumentUrl']=$callback_url;
        if ($sec_opt_password!="" && ($sec_opt_protect_signature==true || $sec_opt_protect_open==true)) {
            $documentCreationInfo['securityOptions']['protectOpen']=false;
            $documentCreationInfo['securityOptions']['protectSignature']=false;
            $documentCreationInfo['securityOptions']['password']=$sec_opt_password;
            if ($sec_opt_protect_open==="true") $documentCreationInfo['securityOptions']['protectOpen']=true;
            if ($sec_opt_protect_signature==="true") $documentCreationInfo['securityOptions']['protectSignature']=true;   
        }
        $data=array(
            'apiKey' => $this->apikey,
            'documentCreationInfo' => $documentCreationInfo
        );
        #################################################################Call api method
		### Sending document to the portal
        $doc=$this->client->sendDocument($data);
        return $doc->documentKeys->DocumentKey->documentKey;
    }
    
	### getDocumentInfo can be used to retrieve the up-to-date status of documents. 
	### The documentKey is tied to the apiKey and is not valid with any other API key.
	### https://secure.echosign.com/static/apiv11/apiMethods11.jsp#getDocumentInfo
	### It returns status of the document https://secure.echosign.com/static/apiv11/apiMethods11.jsp#AgreementStatus
    public function getDocumentInfo($apikey, $documentkey) {
        #################################################################Get input parameters
        $this->apikey=$apikey;
        $data=array(
            'apiKey' => $this->apikey,
            'documentKey' => $documentkey
        );
        #################################################################Call api method
        $doc=$this->client->getDocumentInfo($data);
        return $doc->documentInfo->status;
    }
    
	## getLatestDocument can be used to retrieve the latest version of documents. The documentKey is tied to the apiKey and is not valid with any other API key.
	## It returns document in PDF format
	## It uses this API call https://secure.echosign.com/static/apiv11/apiMethods11.jsp#getLatestDocument
    public function getLatestDocument($apikey, $documentkey) {
        #################################################################Get input parameters
        $this->apikey=$apikey;
        $data=array(
            'apiKey' => $this->apikey,
            'documentKey' => $documentkey
        );
        #################################################################Call api method
        $doc=$this->client->getLatestDocument($data)->pdf;
        #################################################################Headers for download
        $filename = "latestDocument.pdf";
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=$filename");
        echo $doc;
        die();
    }

	### createEmbeddedWidget will generate a snippet of Javascript that can be used to embed a signable document on your own website. 
	### When a user comes to that area of the site, they will fill out and sign the document, and then a verification email will be sent to the email address provided by them. 
	### Once they receive the email and confirm their signature, a signed copy of the document will be sent to you and them. 
	### It returns EmbeddedWidgetCreationResult class https://secure.echosign.com/static/apiv11/apiMethods11.jsp#EmbeddedWidgetCreationResult
	### It uses this API call https://secure.echosign.com/static/apiv11/apiMethods11.jsp#createEmbeddedWidget
	### Almost all passed parameters are used for initialization of WidgetCreationInfo class 
	### https://secure.echosign.com/static/apiv11/apiMethods11.jsp#WidgetCreationInfo
	### MergeFieldsNames and MergeFieldsValues should be passed as string with ";" delimiter 
    public function createEmbeddedWidget($apikey, $merge_fields_names, $merge_fields_values, $files_arr, $userkey, $email, $password, $name, $signature_flow, $locale, $callback_url, $sec_opt_password, $sec_opt_protect_signature, $sec_opt_protect_open, $wcurl, $wcdelay) {
        #################################################################Get input parameters
        $this->apikey=$apikey;
        $MergeFieldsNames=explode(";", $merge_fields_names);
        $MergeFieldsValues=explode(";", $merge_fields_values);
        for($i=0;$i<count($MergeFieldsNames);$i++) {
            $mergeFields[]=array('fieldName' => $MergeFieldsNames[$i], 'defaultValue' => $MergeFieldsValues[$i]);
        }
        $i=0;
        foreach ($files_arr as $file) {
            if(file_exists($file['tmp_name'])) {
                $files[$i]['fileName']=$file['name'];
                $files[$i]['file']=file_get_contents($file['tmp_name']);
                $i++;
            }
        }
		
		### Initializing sender information
		### https://secure.echosign.com/static/apiv11/apiMethods11.jsp#SenderInfo
        if ($userkey!="" || ($email!="" && $password!="")) {
                $senderInfo['email']=$email;
                $senderInfo['password']=$password;
                $senderInfo['userKey']=$userkey;
            $data['senderInfo'] = $senderInfo;
        }
		
		# Initializing  input parameters for API call 
        $WidgetCreationInfo=array(
            'name' => $name,
            'fileInfos' => $files,
            'signatureFlow' => $signature_flow,
            'locale' => $locale, 
            'mergeFieldInfo' => array(
                'mergeFields' => $mergeFields
            )
        );
        if($callback_url!="") $WidgetCreationInfo['callbackInfo']['signedDocumentUrl']=$callback_url;
        if ($sec_opt_password="" && ($sec_opt_protect_signature==true || $sec_opt_protect_open==true)) {
            $WidgetCreationInfo['securityOptions']['protectOpen']=false;
            $WidgetCreationInfo['securityOptions']['protectSignature']=false;
            $WidgetCreationInfo['securityOptions']['password']=$sec_opt_password;
            if ($sec_opt_protect_open==="true") $WidgetCreationInfo['securityOptions']['protectOpen']=true;
            if ($sec_opt_protect_signature==="true") $WidgetCreationInfo['securityOptions']['protectSignature']=true;   
        }
        if ($wcurl!="") {
            $WidgetCreationInfo['widgetCompletionInfo']['url']=$wcurl;
            //if ($_REQUEST['wcdeframe']!="") $WidgetCreationInfo['widgetCompletionInfo']['deframe']=$_REQUEST['wcdeframe'];
            if ($wcdelay!="") $WidgetCreationInfo['widgetCompletionInfo']['delay']=$wcdelay;
        }
        $data=array(
            'apiKey' => $this->apikey,
            'widgetInfo' => $WidgetCreationInfo
        );
        #################################################################Call api method
        $doc=$this->client->createEmbeddedWidget($data);        
        return $doc->embeddedWidgetCreationResult;
    }
    
	## getFormData can be used to retrieve data entered by the user into interactive form fields at the time they signed the document. 
	## It can be used to get data for one specific document or for a group of documents that were created from one reusable document (i.e. a form).
	## It uses this API call https://secure.echosign.com/static/apiv11/apiMethods11.jsp#getFormData
    public function getFormData($apikey, $documentkey) {
        #################################################################Get input parameters
        $this->apikey=$apikey;
        $data=array(
            'apiKey' => $this->apikey,
            'documentKey' => $documentkey
        );
        #################################################################Call api method
        $doc=$this->client->getFormData($data); 
        if ($doc->getFormDataResult->success===false) $csv=$doc->getFormDataResult->errorCode;
        else {  //if success - parse data before output
            $result=$doc->getFormDataResult->formDataCsv;
            $data=explode("\n",$result);
            $header=str_getcsv($data[0]);
            $data=str_getcsv($data[1]);
            for($i=0;$i<count($header);$i++) {
                $csv[$header[$i]]=$data[$i];
            }
        }
        return $csv;
    }
}
?>