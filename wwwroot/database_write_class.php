<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );

 

if( $conn === false ) {

    die('{"data":'.json_encode(sqlsrv_errors()).'}');

}

$brand = $_REQUEST['brand'];
$tenantid = $_REQUEST['tenantid'];
$brandid = $_REQUEST['brandid'];
$caseid = $_REQUEST['caseid'];
$data = $_REQUEST['var'];

 

if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

}

$data = str_replace('\'','\'\'',$data);

#$new_array = str_replace('\'','\'\'',$data);

$new_array = json_decode($data,true);

$date = date('Y').'-'.date('m').'-'.date('d');

$time = date('H').':'.date('i').':'.date('s');

 

foreach($new_array as $key => $val){

 

    $query = "IF NOT EXISTS (SELECT * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'ClassData' and COLUMN_NAME = '$key' ) ALTER TABLE ClassData ADD [$key] varchar(max) NULL";

 

    $results = sqlsrv_query($conn,$query);

 

    $query = "IF EXISTS(SELECT * FROM classdata WHERE caseid=$caseid AND tenantid=$tenantid ) UPDATE classdata SET [$key]='$val' WHERE caseid=$caseid AND tenantid=$tenantid ELSE INSERT INTO classdata ([$key],caseid,brandid,tenantid,date,time,data,brand) VALUES ('$val','$caseid','$brandid','$tenantid','$date','$time','$data','$brand')";

 

    $results = sqlsrv_query($conn,$query);

}

$query = "IF EXISTS(SELECT * FROM classdata WHERE caseid=$caseid AND tenantid=$tenantid ) UPDATE classdata SET data='$data' WHERE caseid=$caseid AND tenantid=$tenantid";

 

    $results = sqlsrv_query($conn,$query);
 

 

 

if(sqlsrv_errors()){

    echo '{"data":'.json_encode(sqlsrv_errors()).'}';

}

 

if($results){

    echo '{"data":'.json_encode('Success').'}';

}

 

 

?>
