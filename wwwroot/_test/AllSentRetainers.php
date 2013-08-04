<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );

if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];

if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}


$date = date('Y').'-'.date('m').'-'.date('d');
if( $conn === false ) {

    die('{"data":'.json_encode(sqlsrv_errors()).'}');

}

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND status.tenantid='4'";
#$query = "SELECT * from status WHERE status.retainerSent='Yes' AND status.tenantid='4'";
$results = sqlsrv_query($conn,$query);



?>

<title>Retainer Sent = Yes</title>
Showing rows where Retainer Sent = Yes
<br><br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='2' cellspacing='0'>
  <tr>
  <th><font size=2>Case ID</th>
  <th><font size=2>Unique ID</th>  
  <th><font size=2>Interview Date</th>
  <th><font size=2>Interview Time</th>
  <th><font size=2>Brand</th>
  <th><font size=2>First Name</th>
  <th><font size=2>Last Name</th>
  <th><font size=2>Sent Rtnr</th>
  <th><font size=2>Sent Date</th>
  <th><font size=2>Rtnr Rcvd</th>  
  <th><font size=2>Rtnr Status</th>  
  <th><font size=2>Street 1</th>
  <th><font size=2>Street 2</th>
  <th><font size=2>City</th>
  <th><font size=2>State</th>
  <th><font size=2>Zipcode</th>
  <th><font size=2>Agent</th>
  <th><font size=2>Link</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['caseid'] . "</td>";
  echo "<td><font size=2>" . $row['uniqueid'] . "</td>";
  echo "<td><font size=2>" . $row['date'] . "</td>";
  echo "<td><font size=2>" . $row['time'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['FirstName'] . "</td>";
  echo "<td><font size=2>" . $row['LastName'] . "</td>";
  echo "<td><font size=2>";
  echo '<a href=';
 
  echo 'file:\\\\FILES/MASSACTION/';
  echo "" . $row['brand'] . "/";
  echo "" . $row['LastName'] . ",%20";
  echo "" . $row['FirstName'] . "%20-%20";
  echo "" . $row['uniqueid'] . "/RETAINER/ORIGINAL/";
  echo "" . $row['LastName'] . ",%20";
  echo "" . $row['FirstName'] . "%20-%20";
  echo "" . $row['uniqueid'] . ".pdf";
  
  #echo '"/'. $row['LastName'] .  $row['FirstName'] . $row['uniqueid'] . "/Retainer/Original/" . $row['LastName'] .  $row['FirstName'] . $row['uniqueid'] .".pdf"';
  echo " target='_blank'>";
  echo "<font size=2>" . $row['retainerSent'] . "</a></td>";
  echo "<td><font size=2>" . $row['retainerSentDate'] . "</td>";
  echo "<td><font size=2>" . $row['retainerRecieved'] . "</td>";
  echo "<td><font size=2>" . $row['retainerstatus'] .' '. $row['retainernote'] . "</td>";
  echo "<td><font size=2>" . $row['Street1'] . "</td>";
  echo "<td><font size=2>" . $row['Street2'] . "</td>";
  echo "<td><font size=2>" . $row['City'] . "</td>";
  echo "<td><font size=2>" . $row['State'] . "</td>";
  echo "<td><font size=2>" . $row['Zipcode'] . "</td>";
  echo "<td><font size=1>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><a href='https://my.spicecsm.com/srv_calls/print.php?caseid=" . $row['caseid'] . "&comp=MassAction&brand=" . $row['brandid'] . "' target='_blank'>Interview</a></td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>