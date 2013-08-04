
<?PHP

$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

$query = "SELECT LastName,City,State,Zip,Phone1,Phone2,Phone3,Phone4,Phone5,Phone6 FROM phones";
$results = sqlsrv_query($conn,$query);

while($row = sqlsrv_fetch_array($results))

{

$lname1 = $row['LastName'];
$city1 = $row['City'];
$zip1 = $row['Zip'];
$Phone1_1 = $row['Phone1'];
$Phone2_1 = $row['Phone2'];
$Phone3_1 = $row['Phone3'];
$Phone4_1 = $row['Phone4'];
$Phone5_1 = $row['Phone5'];
$Phone6_1 = $row['Phone6'];
#$Phone7_1 = $row['Phone7'];

$query4 = "SELECT LastName,City,State,Zipcode,Phone1,Phone2,Phone3,Phone4,Phone5,Phone6 FROM status where LastName='".$lname1."' and city='".$city1."' and zipcode='".$zip1."' and imported='8172012'";

$results4 = sqlsrv_query($conn,$query4);

while($row4 = sqlsrv_fetch_array($results4))
{
    $Phone1_2 = $row3['phone1'];
}
$query2 = "update status set phone1='".$Phone1_1."',phone2='".$Phone2_1."',phone3='".$Phone3_1."',phone4='".$Phone4_1."',phone5='".$Phone5_1."',phone6='".$Phone6_1."' where LastName='".$lname1."' and city='".$city1."' and zipcode='".$zip1."' and imported='8172012'";
$results2 = sqlsrv_query($conn,$query2);

$query3 = "update status set phone1='".$Phone1_1."',phone2='".$Phone2_1."',phone3='".$Phone3_1."',phone4='".$Phone4_1."',phone5='".$Phone5_1."',phone6='".$Phone6_1."' where LastName='".$lname1."' and city='".$city1."' and zipcode='".$zip1."' and imported='8172012'";
$results3 = sqlsrv_query($conn,$query3);

while($row3 = sqlsrv_fetch_array($results3))
{
$Phone1_3 = $row3['phone1'];

echo "<br>";
echo $lname1;
echo " ".$city1." = ".$Phone1_3." and now ".$bar2;
echo "<br>";

}



}

?>