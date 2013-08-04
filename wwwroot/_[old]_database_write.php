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

 

$data = explode(",",$data);

 

$new_array = array();

 

foreach($data as $a){

    $a = explode("=",$a);

    $key = trim($a[0]);

    $val = trim($a[1]);

    $new_array[$key] = $val;

}

 

$data = json_encode($new_array);

$data = str_replace('\'','\'\'',$data);

 

$new_array['data'] = $data;  //This adds the json string to the associate array

$new_array['caseid'] = $caseid;

$new_array['brandid'] = $brandid;

$new_array['tenantid'] = $tenantid;

$new_array['brand'] = $brand;

 

$date = date('Y').'-'.date('m').'-'.date('d');

$time = date('H').':'.date('i').':'.date('s');

 

foreach($new_array as $key => $val){

 

    $query = "IF NOT EXISTS (SELECT * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'Data' and COLUMN_NAME = '$key' ) ALTER TABLE Data ADD [$key] varchar(max) NULL";

 

    $results = sqlsrv_query($conn,$query);

 

    $query = "IF EXISTS(SELECT * FROM data WHERE caseid=$caseid AND brandid=$brandid ) UPDATE data SET [$key]='$val' WHERE caseid=$caseid AND brandid=$brandid ELSE INSERT INTO data ([$key],caseid,brandid,tenantid,date,time) VALUES ('$val','$caseid','$brandid','$tenantid','$date','$time')";

 

    $results = sqlsrv_query($conn,$query);

}

 

 

 

if(sqlsrv_errors()){

    echo '{"data":'.json_encode(sqlsrv_errors()).'}';

}

 

if($results){

    $data2 = '<br>'.$data;

    $data2 = str_replace(',','<br>',$data2);

    $data2 = str_replace('{','',$data2);

    $data2 = str_replace('}','',$data2);

    $data2 = str_replace('[','',$data2);

    $data2 = str_replace(']','',$data2);

    $data2 = str_replace(':',' = ',$data2);

    $data2 = str_replace('\\','',$data2);

    $data2 = str_replace('"','',$data2);

    echo '{"data":'.json_encode($data2).'}';

}

 

 

?>
