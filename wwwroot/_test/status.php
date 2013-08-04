<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );

 

if( $conn === false ) {

    die('{"data":'.json_encode(sqlsrv_errors()).'}');

}


$query = "SELECT * from status WHERE status.retainerSent='No'";
$results = sqlsrv_query($conn,$query);



?>
<title>Retainer Sent = No</title>
Showing rows where Retainer Sent = No
<br>
<br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='4' cellspacing='1'>
  <tr>
  <th><font size=2>caseid</th>
  <th><font size=2>brandid</th>
  <th><font size=2>Date</th>
  <th><font size=2>Time</th>
  <th><font size=2>Brand</th>
  <th><font size=2>First Name</th>
  <th><font size=2>Last Name</th>
  <th><font size=2>Sent Retainer</th>
  <th><font size=2>Rcvd Retainer</th>
  <th><font size=2>Street1</th>
  <th><font size=2>Street2</th>
  <th><font size=2>City</th>
  <th><font size=2>State</th>
  <th><font size=2>Zipcode</th>

  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['caseid'] . "</td>";
  echo "<td><font size=2>" . $row['brandid'] . "</td>";
  echo "<td><font size=2>" . $row['date'] . "</td>";
  echo "<td><font size=2>" . $row['time'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['FirstName'] . "</td>";
  echo "<td><font size=2>" . $row['LastName'] . "</td>";
  echo "<td><font size=2>" . $row['retainerSent'] . "</td>";
  echo "<td><font size=2>" . $row['retainerRecieved'] . "</td>";
  echo "<td><font size=2>" . $row['Street1'] . "</td>";
  echo "<td><font size=2>" . $row['Street2'] . "</td>";
  echo "<td><font size=2>" . $row['City'] . "</td>";
  echo "<td><font size=2>" . $row['State'] . "</td>";
  echo "<td><font size=2>" . $row['Zipcode'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>