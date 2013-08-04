<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );

#$brand = $_REQUEST['brand'];
#$tenantid = $_REQUEST['tenantid'];
#$brandid = $_REQUEST['brandid'];
#$caseid = $_REQUEST['caseid'];
#$data = $_REQUEST['var'];

//REQUIRED START
if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (isset($_POST['tenantid'])) $tenantid = $_POST['tenantid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
//REQUIRED DONE

// Contact questions
if (isset($_POST['1WhoFirstName'])) $whofirstname = $_POST['1WhoFirstName'];
if (isset($_POST['1WhoLastName'])) $wholastname = $_POST['1WhoLastName'];
if (isset($_POST['1CallbackNum'])) $callbacknum = $_POST['1CallbackNum'];
if (isset($_POST['3SecondaryNumber'])) $secondarynumber = $_POST['3SecondaryNumber'];
if (isset($_POST['3Email'])) $email = $_POST['3Email'];
if (isset($_POST['3StreetLine1'])) $streetline1 = $_POST['3StreetLine1'];
if (isset($_POST['3StreetLine2'])) $streetline2 = $_POST['3StreetLine2'];
if (isset($_POST['3HomeCity'])) $homecity = $_POST['3HomeCity'];
if (isset($_POST['3HomeState'])) $homestate = $_POST['3HomeState'];
if (isset($_POST['3Zipcode'])) $zipcode = $_POST['3Zipcode'];
//contact questions done
if (isset($_REQUEST['1WhoFirstName'])) $whofirstname = $_REQUEST['1WhoFirstName'];
echo "$whofirstname";

if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];


#if( $conn === false ) {
#
#    die('{"data":'.json_encode(sqlsrv_errors()).'}');
#
#}


 

if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

}

#$data = str_replace('\'','\'\'',$data);

#$new_array = str_replace('\'','\'\'',$data);

#$new_array = json_decode($data,true);

$date = date('Y').'-'.date('m').'-'.date('d');

$time = date('H').':'.date('i').':'.date('s');

 

#foreach($new_array as $key => $val){

 

#    $query = "IF NOT EXISTS (SELECT * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'Data' and COLUMN_NAME = '$key' ) ALTER TABLE Data ADD [$key] varchar(max) NULL";

 

#    $results = sqlsrv_query($conn,$query);

 

#    $query = "IF EXISTS(SELECT * FROM data WHERE caseid=$caseid AND tenantid=$tenantid ) UPDATE data SET [$key]='$val' WHERE caseid=$caseid AND tenantid=$tenantid ELSE INSERT INTO data ([$key],caseid,brandid,tenantid,date,time,data,brand) VALUES ('$val','$caseid','$brandid','$tenantid','$date','$time','$data','$brand')";

 

#    $results = sqlsrv_query($conn,$query);

}

#$query = "IF EXISTS(SELECT * FROM data WHERE caseid=$caseid AND tenantid=$tenantid ) UPDATE data SET data='$data' WHERE caseid=$caseid AND tenantid=$tenantid";

 

#    $results = sqlsrv_query($conn,$query);
 

 

 

#if(sqlsrv_errors()){

#    echo '{"data":'.json_encode(sqlsrv_errors()).'}';

#}

 

#if($results){

#    echo '{"data":'.json_encode('Success').'}';

#}

 

 

?>
