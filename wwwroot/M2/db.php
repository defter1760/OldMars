<?PHP
$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"Mars2", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
?>