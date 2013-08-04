<?php 
// below $option=array('trace',1); 
// correct one is below 
$option=array('trace'=>1); 

$client=new SoapClient('api/APIService.wsdl',$option); 

try{ 
  $client->classmap();
    //$client->aMethodAtRemote(); 
}catch(SoapFault $fault){ 
  // <xmp> tag displays xml output in html 
  echo 'Request : <br/><xmp>', 
  $client->__getLastRequest(), 
  '</xmp><br/><br/> Error Message : <br/>', 
  $fault->getMessage(); 
} 
?> 