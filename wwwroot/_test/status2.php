<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );


$rcaseid = $_POST['caseid'];
$rbrandid = $_POST['brandid'];
$rretainersent = $_POST['retainerSent'];
$rretainersentdate = $_POST['retainerSentDate'];

$date = date('Y').'-'.date('m').'-'.date('d');
if( $conn === false ) {

    die('{"data":'.json_encode(sqlsrv_errors()).'}');

}
if($rcaseid){
$query = "IF EXISTS (SELECT * from status WHERE status.caseid='$rcaseid' AND status.brandid='$rbrandid' AND status.tenantid='4') UPDATE status set retainerSent='$rretainersent' WHERE status.caseid='$rcaseid' AND status.brandid='$rbrandid' AND status.tenantid='4'";



$results = sqlsrv_query($conn,$query);

}
if($rcaseid){
$query = "IF EXISTS (SELECT * from status WHERE status.caseid='$rcaseid' AND status.brandid='$rbrandid' AND status.tenantid='4') UPDATE status set retainerSentDate='$rretainersentdate' WHERE status.caseid='$rcaseid' AND status.brandid='$rbrandid' AND status.tenantid='4'";



$results = sqlsrv_query($conn,$query);

}

#$query = "SELECT * from status WHERE status.retainerSent='No' AND status.tenantid='4'";
$query = "SELECT * from status WHERE status.retainerSent='Yes' status.retainerRecieved='No' AND status.tenantid='4'";
$results = sqlsrv_query($conn,$query);



?>

<title>Retainer Sent = Yes and Retainer Recieved = No</title>
Showing rows where Retainer Sent = Yes and Retainer Recieved = No
<br>
<br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='4' cellspacing='1'>
  <tr>
  <th><font size=2>Case ID</th>
  <th><font size=2>Brand ID</th>
  <th><font size=2>Date</th>
  <th><font size=2>Time</th>
  <th><font size=2>Brand</th>
  <th><font size=2>First Name</th>
  <th><font size=2>Last Name</th>
  <th><font size=2>Sent Retainer</th>
  <th><font size=2>Sent Date</th>
  <th><font size=2>Street 1</th>
  <th><font size=2>Street 2</th>
  <th><font size=2>City</th>
  <th><font size=2>State</th>
  <th><font size=2>Zipcode</th>
  <th><font size=2>Agent</th>
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

  //echo "<td><form action='status2.php' method='post'><select name='retainerSent'><option value='Yes'>Yes</option><option value='No' selected='selected'>No</option><input type='hidden' name='retainerSentDate' value='" . $date . "'><input type='hidden' name='caseid' value='" . $row['caseid'] . "'><input type='hidden' name='brandid' value='" . $row['brandid'] . "'><input type='submit' value='Go'></select></form></td>";
  echo "<td><font size=2>" . $row['retainerSent'] . "</td>";
  echo "<td><font size=2>" . $row['retainerSentDate'] . "</td>";
  echo "<td><font size=2>" . $row['retainerRecieved'] . "</td>";
  echo "<td><font size=2>" . $row['Street1'] . "</td>";
  echo "<td><font size=2>" . $row['Street2'] . "</td>";
  echo "<td><font size=2>" . $row['City'] . "</td>";
  echo "<td><font size=2>" . $row['State'] . "</td>";
  echo "<td><font size=2>" . $row['Zipcode'] . "</td>";
  echo "<td><font size=1>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>