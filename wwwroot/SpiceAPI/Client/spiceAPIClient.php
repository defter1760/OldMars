<?php
/*!
* SpiceCSM Library 2.0
* Copyright (C) 2008-2010 SpiceCSM LLC. All rights reserved.
* http://www.spicecsm.com
 */

require_once 'instrumentation.php';
/*
if (get_magic_quotes_gpc()) {
  function stripslashes_deep($value){
    $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
    return $value;
  }
  $_POST = array_map('stripslashes_deep', $_POST);
  $_GET = array_map('stripslashes_deep', $_GET);
  $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
  $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}
//$magic_quotes_runtime = Off;
*/
function strip_slashes($str) { return $str; }
if (!isset($_SESSION)) {
  session_start();
};

$_SESSION['local']=true;
if(!@include('spiceAPIServer/spiceAPIServer.php')){
	require_once 'jsonRPCC.php';
	require_once 'spiceUrl.php';
	$_SESSION['local']=false;
}
require_once 'spiceErrorObj.php';
require_once 'spiceAPIObj.php';

class spiceAPIClient{
	/**
	* server url class
	**/
	private $server;
	/** private connection property **/
	private $apiserver;
	/** public session property **/
	public $session;
	
	/**
	* public method for error checking of return data
	**/
	 public static function isError($obj){
                 $ret=false;
                 if(isset($obj->type) && $obj->type=='Error'){
                         $ret=true;
                 }
                 return $ret;
         }
	 
	 //format function
	 private function format($ret){
		if($_SESSION['local'] && $ret->type!='Error'){
			return json_decode(json_encode($ret));
		}else{
			return $ret;
		}
	 }
	
	/**
	* method for connection to the API server
	**/
	public function __construct(){
		if($_SESSION['local']){
			$this->apiserver=new spiceAPIServer();
		}else{
			$this->server=new spiceUrl();
			$this->apiserver=new jsonRPCC($this->server->url);
		}
		try{
			$this->apiserver->testConnection();
		}catch(Exception $e){
			die($e->getMessage());
		}
		if (isset($_SESSION["spice_session"])){
			$this->session = $_SESSION["spice_session"];
		}
	}
	
	/**
	* public method for validatin ghe user
	**/
	public function connect($user,$pass){
		$ret;
		try{
			$ret=$this->apiserver->connect($user,$pass);
			if($_SESSION['local'])
				$ret=$this->format($ret);
			$this->session=$ret->session;
			$_SESSION['spice_session']=$this->session;
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for validating portal connection 
	**/
	public function portalconnect($id){
		$ret;
		try{
			$ret=$this->apiserver->portalconnect($id);
			if($_SESSION['local'])
				$ret=$this->format($ret);
			$this->session=$ret->session;
			$_SESSION['spice_session']=$this->session;
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for abstract query building
	**/
	public function query($str){
		$ret;
		try{
			$ret=$this->apiserver->query($str,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for checking session status
	**/
	public function checkSession(){
		$ret;
		try{
			$ret=$this->apiserver->checkSession($this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for retriving an agent listing
	**/
	public function agentList($obj=null){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->agentList($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for retrieving inContact API credentials
	**/
	public function inContactCredentials($obj=null){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->inContactCredentials($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for setting inContact API credentials
	**/
	public function setinContactCredentials($obj=null){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->setinContactCredentials($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}	
	
	/**
	* public method for retriving company listing
	**/
	public function companyList(){
		$ret;
		try{
			$ret=$this->apiserver->companyList($this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return case/response data per search criteria
	**/
	public function caseLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->caseLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return aggregate case data per search criteria
	**/
	public function caseAggregate($obj){
		$ret;
		if($_SESSION['local'])
			$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->caseAggregate($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return review case listing data per search criteria
	**/
	public function reviewLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->reviewLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return global alert listing
	**/
	public function alertLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->alertLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to create a new agent
	**/
	public function createAgent($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->createAgent($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}

	/**
	* public function to change a password
	**/
	public function changePass($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->changePass($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}


	/**
	* public function to create a new alert
	**/
	public function createAlert($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->createAlert($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to remove an alert
	**/
	public function deleteAlert($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->deleteAlert($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}


	/**
	* public function to delete records
	**/
	public function delete($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->delete($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to update an agent
	**/
	public function updateAgent($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->createAgent($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to load an agent for editing
	**/
	public function loadAgent($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->loadAgent($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return event data per search criteria
	**/
	public function eventLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->eventLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return portal data per search criteria
	**/
	public function portalLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->portalLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to delete event from master list
	**/
	public function eventDelete($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->eventDelete($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to create an event
	**/
	public function eventCreate($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->eventCreate($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to update an event
	**/
	public function updateEvent($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->updateEvent($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to retrieve event categoriest
	**/
	public function eventCategory($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->eventCategory($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return match business intellegence rules
	**/
	public function businessRuleCheck($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->businessRuleCheck($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to return script file name
	**/
	public function scriptLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->scriptLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* method for loading issue/sub issue listings
	*/
	public function issueLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->issueLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	
	/**
	* public method for performing an account search
	**/
	public function accountLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->accountLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for creating a new company
	*
	*NOTE - the agent security level must be System Administrator
	**/
	public function createCompany($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->createCompany($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for deleting a company
	*
	*NOTE - the agent security level must be System Administrator
	**/
	public function deleteCompany($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->deleteCompany($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for inserting new records
	*
	*NOTE - this method expects an array of objects so that multiple records may be created at a single time
	**/
	public function create($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->create($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method for retriving busniess intelligence data
	*
	**/
	public function businessRuleLoad($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->businessRuleLoad($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	/**
	* public method to update and existing record
	*
	*NOTE - this method expects an array of objects so that multiple records may be updated at a single time

	**/
	public function update($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->update($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
	
	
	/**
	 * public function to retrieve records
	 **/
	public function recipientSearch($obj){
		$ret;
		if(is_array($obj)){
			$ret=new spiceErrorObj('Only one object may be used for the recipient search function. Arrays are not allowed');
		}else{
			if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);

			try{
				$ret=$this->apiserver->recipientSearch($obj,$this->session);
			}catch(Exception $e){
				echo "there was an error in recipient search: ".$e->getMessage();
				$ret=new spiceErrorObj($e->getMessage());
			}
		}

		return $this->format($ret);
	}

	/**
	* public function to retrieve records
	**/
	public function load($obj){
		$ret;
		if(is_array($obj)){
			$ret=new spiceErrorObj('Only one object may be used for the load function. Arrays are not allowed.');
		}else{
			if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->load($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function to retrieve billing overview records
	**/
	public function billingOverview($obj){
		$ret;
		if(is_array($obj)){
			$ret=new spiceErrorObj('Only one object may be used for the load function. Arrays are not allowed.');
		}else{
			if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->billingOverview($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		}
		
		return $this->format($ret);
	}

	/**
	* public function to get the views an agent has access to
	**/
	public function getViews($obj){
		$ret;
		if(is_array($obj)){
			$ret=new spiceErrorObj('Only one object may be used for the getViews function. Arrays are not allowed.');
		}else{
			if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->getViews($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		}
		
		return $this->format($ret);
	}
	
	/**
	* public function for running reports
	**/
	public function runReport($obj){
		$ret;
		if(is_array($obj)){
			$ret=new spiceErrorObj('Only one object may be used for the runReport function. Arrays are not allowed.');
		}else{
			if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->runReport($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		}
		
		return $this->format($ret);
	}
	
	/**
	** public method for retriving process file listing
	**/
	public function processList($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		try{
			$ret=$this->apiserver->processList($obj,$this->session);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}

	/**
	* public function for creating/updating process file issues
	**/
	public function createProcessIssue($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		/*if(is_array($obj)){*/
			/*$ret=new spiceErrorObj('Only one object may be used for the createProcessIssue function. Arrays are not allowed.');*/
		/*}else{*/
			try{
				$ret=$this->apiserver->createProcessIssue($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		/*}*/
		
		return $this->format($ret);
	}

	public function saveReaderState($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->saveReaderState($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		return $this->format($ret);
	}



	/**
	* public function for creating/updating process file issues
	**/
	public function getProcessAccessList($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
		if(is_array($obj)){
			$ret=new spiceErrorObj('Only one object may be used for the createProcessIssue function. Arrays are not allowed.');
		}else{
			try{
				$ret=$this->apiserver->getProcessAccessList($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		}
		
		return $this->format($ret);
	}

	/**
	* public function for creating a brand 
	**/
	public function createBrand($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->createBrand($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		
		return $this->format($ret);
	}

	/**
	* public function for updating a brand 
	**/
	public function updateBrand($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->updateBrand($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		
		return $this->format($ret);
	}
	
	/**
	* public function for updating a brand 
	**/
	public function deleteBrand($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->deleteBrand($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		
		return $this->format($ret);
	}
	
	/**
	* public function for copying a brand 
	**/
	public function copyBrand($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->copyBrand($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		
		return $this->format($ret);
	}

	/**
	* public function for copying a brand 
	**/
	public function getAgentAccess($obj){
		$ret;
		if($_SESSION['local'])
				$obj=json_decode(json_encode($obj),true);
			try{
				$ret=$this->apiserver->getAgentAccess($obj,$this->session);
			}catch(Exception $e){
				$ret=new spiceErrorObj($e->getMessage());
			}
		
		return $this->format($ret);
	}
	
	/**
	* public function for resetting an agent passwrod
	**/
	public function resetPass($user){
		$ret;
		try{
			$ret=$this->apiserver->resetPass($user);
		}catch(Exception $e){
			$ret=new spiceErrorObj($e->getMessage());
		}
		
		return $this->format($ret);
	}
}
?>
