<?php
/*!
* SpiceCSM Library 2.0
* Copyright (C) 2008-2010 SpiceCSM LLC. All rights reserved.
* http://www.spicecsm.com
 */

//require the spiceAPIClient
require_once 'Client/spiceAPIClient.php';
//create the spi client
$spiceClient=new spiceAPIClient();
//make connection with passed credentials
$valid=$spiceClient->connect('ihutchings@preferredlegalsupport.com','siec9oanoapoeqiA');
if(spiceAPIClient::isError($valid)){
	if(strpos($valid->getMessage(),"Invalid username or password")!==false){
		die(json_encode(array("error"=>101)));
	}else{
		die($valid->getMessage());
	}
}

//set the seesion variables
$_SESSION['session_id']=$valid->session;
$_SESSION['theme']=$_POST['theme'];
$_SESSION['language']=$_POST['language'];
$_SESSION['agent_id']=$valid->agent_id;
$_SESSION['security_level']=$valid->security_level;
$_SESSION['tier']=$valid->tier;
$_SESSION['type']=$valid->type;
$_SESSION['name']=$valid->name;
$_SESSION['module']=$valid->module;
$_SESSION['agent_fname']=$valid->fname;
$_SESSION['agent_lname']=$valid->lname;
$_SESSION['authmethod']=$valid->authmethod;
$_SESSION['basefolder']=$valid->basefolder;
$_SESSION['publish']=$valid->publish;
$_SESSION['basefolderlabel']=$valid->basefolderlabel;
$_SESSION['agent_login']=$_POST['user'];
$_SESSION['ic_agent']=$valid->ic_agent;
$_SESSION['ic_super']=$valid->ic_super;
//success message
echo json_encode(array('ic_agent'=>$valid->ic_agent,'ic_super'=>$valid->ic_super,'success'=>true,'reset'=>$valid->reset,'name'=>$_SESSION['name'],'module'=>$valid->module,'agentid'=>$_SESSION['agent_id'],'security_level'=>$_SESSION['security_level'],'tier'=>$_SESSION['tier'],'type'=>$_SESSION['type'],'module'=>$_SESSION['module'],"basefolder"=>$_SESSION['basefolder'],"publish"=>$_SESSION['publish'],"basefolderlabel"=>$_SESSION['basefolderlabel']));
?>
