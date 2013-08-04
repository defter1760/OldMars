
<?PHP

$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

$query = "SELECT uniqueid,barcode FROM this";
$results = sqlsrv_query($conn,$query);

while($row = sqlsrv_fetch_array($results))

{

$uni1 = $row['uniqueid'];
$bar1 = $row['barcode'];

$query2 = "update status set barcode='".$bar1."' where uniqueid='".$uni1."'";
$results2 = sqlsrv_query($conn,$query2);

$query3 = "SELECT barcode FROM status where uniqueid='".$uni1."'";
$results3 = sqlsrv_query($conn,$query3);

while($row3 = sqlsrv_fetch_array($results3))
{
$bar2 = $row3['barcode'];

echo "<br>";
echo $uni1;
echo " = ".$bar1." and now ".$bar2;
echo "<br>";

}



}

?>