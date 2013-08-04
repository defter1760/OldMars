<?PHP

$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

if( $conn === false ) {
    die('{"data":'.json_encode(sqlsrv_errors()).'}');
}

$tenantid = $_REQUEST['tenantid'];
$caseid = $_REQUEST['caseid'];

$query = "SELECT * FROM data WHERE caseid=$caseid AND tenantid=$tenantid";

$results = sqlsrv_query($conn,$query);

$row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);

foreach($row as $key => $val){
	echo $key.'='.$val;
	echo '<br>';
}

?>