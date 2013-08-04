<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

 
 
#$serverName = "SHAREPOINT\SHAREPOINTSQL";
#
#$connectionInfo = array( "Database"=>"Status", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );

 

if( $conn === false ) {

    die('{"data":'.json_encode(sqlsrv_errors()).'}');

}
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_REQUEST['caseid'])) $caseid = $_REQUEST['caseid'];
if (isset($_REQUEST['retainerSent'])) $retainersent = $_REQUEST['retainerSent'];
if (isset($_REQUEST['retainerRecieved'])) $retainerrecieved = $_REQUEST['retainerRecieved'];
if (isset($_REQUEST['ProcessProgress'])) $processprogress = $_REQUEST['ProcessProgress'];
if (isset($_REQUEST['FirstName'])) $firstname = $_REQUEST['FirstName'];
if (isset($_REQUEST['LastName'])) $lastname = $_REQUEST['LastName'];
if (isset($_REQUEST['Street1'])) $street1 = $_REQUEST['Street1'];
if (isset($_REQUEST['Street2'])) $street2 = $_REQUEST['Street2'];
if (isset($_REQUEST['City'])) $city = $_REQUEST['City'];
if (isset($_REQUEST['State'])) $state = $_REQUEST['State'];
if (isset($_REQUEST['Zipcode'])) $zipcode = $_REQUEST['Zipcode'];
if (isset($_REQUEST['agentfname'])) $agfname = $_REQUEST['agentfname'];
if (isset($_REQUEST['agentlname'])) $aglname = $_REQUEST['agentlname'];
if (isset($_REQUEST['interviewstarted'])) $interviewstarted = $_REQUEST['interviewstarted'];
if (isset($_REQUEST['reachedretainerdiscussion'])) $reachedretainerdiscussion = $_REQUEST['reachedretainerdiscussion'];
if (isset($_REQUEST['authformreceived'])) $authformreceived = $_REQUEST['authformreceived'];
#$accountid = $_REQUEST['AccountID'];
if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

}


#$new_array = str_replace('\'','\'\'',$data);

#$new_array = json_decode($data,true);

$date = date('Y').'-'.date('m').'-'.date('d');
$month = date('Y').'-'.date('m');
$time = date('H').':'.date('i').':'.date('s');
$week = date('Y').'-'.date('W');

 

#foreach($accountid){

 

#    $query = "IF NOT EXISTS (SELECT * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'Status' and COLUMN_NAME = '$key' ) ALTER TABLE Data ADD [$key] varchar(max) NULL";

 

#    $results = sqlsrv_query($conn,$query);
//Update existing record start - Only if not yet sent retainer
	$query = "IF EXISTS(SELECT * FROM status WHERE caseid=$caseid AND tenantid=$tenantid AND retainerSent IS NULL) UPDATE  status set caseid='$caseid',uniqueid='$uniqueid',brandid='$brandid',tenantid='$tenantid',date='$date',time='$time',brand='$brand',retainerSent='$retainersent',authformreceived='$authformreceived',retainerRecieved='$retainerrecieved',FirstName='$firstname',LastName='$lastname',Street1='$street1',Street2='$street2',City='$city',State='$state',Zipcode='$zipcode',agentfname='$agfname',agentlname='$aglname',reachedretainerdiscussion='Yes',interviewcompletemonthyear='$month',interviewcompleteday='$date',interviewcompletetime='$time',interviewcompleteweek='$week' WHERE caseid=$caseid AND tenantid=$tenantid";
    $results = sqlsrv_query($conn,$query);
//Update existing record End - Only if not yet sent retainer

//Update existing record start - Always	
	$query = "IF EXISTS(SELECT * FROM status WHERE caseid=$caseid AND tenantid=$tenantid) UPDATE  status set caseid='$caseid',uniqueid='$uniqueid',brandid='$brandid',tenantid='$tenantid',date='$date',time='$time',brand='$brand',FirstName='$firstname',LastName='$lastname',Street1='$street1',Street2='$street2',City='$city',State='$state',Zipcode='$zipcode',reachedretainerdiscussion='Yes' WHERE caseid=$caseid AND tenantid=$tenantid";
    $results = sqlsrv_query($conn,$query);
//Update existing record End - Always
//New record start 

    $query = "IF NOT EXISTS(SELECT * FROM status WHERE caseid=$caseid AND tenantid=$tenantid ) INSERT INTO  status (caseid,brandid,tenantid,date,time,brand,FirstName,LastName,Street1,Street2,City,State,Zipcode,agentfname,agentlname,interviewstarted,interviewstartday,interviewstarttime,interviewstartmonthyear,interviewstartweek,uniqueid) VALUES ('$caseid','$brandid','$tenantid','$date','$time','$brand','$firstname','$lastname','$street1','$street2','$city','$state','$zipcode','$agfname','$aglname','$interviewstarted','$date','$time','$month','$week','$uniqueid')";
    $results = sqlsrv_query($conn,$query);
	
//New record end




	
#$query = "IF EXISTS(SELECT * FROM data WHERE caseid=$caseid AND tenantid=$tenantid ) UPDATE data SET data='$data' WHERE caseid=$caseid AND tenantid=$tenantid";	
#UPDATE data SET data='$data' WHERE caseid=$caseid AND tenantid=$tenantid"

#$results = sqlsrv_query($conn,$query);

#}

 

 

 

if(sqlsrv_errors()){

    echo '{"data":'.json_encode(sqlsrv_errors()).'}';

}

 

if($results){

    echo '{"data":'.json_encode('Success').'}';

}

 

 

?>
