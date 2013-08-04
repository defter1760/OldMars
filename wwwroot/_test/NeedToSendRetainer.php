<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );




if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (isset($_REQUEST['brandid'])) $rrbrandid = $_REQUEST['brandid'];

if (isset($_POST['caseid'])) $rcaseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $rbrandid = $_POST['brandid'];
if (isset($_POST['retainerSent'])) $rretainersent = $_POST['retainerSent'];
if (isset($_POST['retainerSentDate'])) $rretainersentdate = $_POST['retainerSentDate'];
$date = date('Y').'-'.date('m').'-'.date('d');
$week = date('Y').'-'.date('W');
$month = date('Y').'-'.date('m');
if( $conn === false ) {

    die('{"data":'.json_encode(sqlsrv_errors()).'}');

}
if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

if($rcaseid){
$query = "IF EXISTS (SELECT * from status WHERE status.caseid='$rcaseid' AND status.brandid='$rbrandid' AND status.tenantid='4') UPDATE status set retainerSentDate='$date',retainerSentWeek='$week',retainerSent='$rretainersent',retainerSentMonth='$month' WHERE status.caseid='$rcaseid' AND status.brandid='$rbrandid' AND status.tenantid='4'";



$results = sqlsrv_query($conn,$query);

}
if (isset($rrbrandid)) echo "$rrbrandid";
if (isset($rrbrandid)) if (isset($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='No' and brandid='$rrbrandid' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($rrbrandid)) if (empty($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='No' and brandid='$rrbrandid' AND status.tenantid='4'";

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='No' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT * from status WHERE status.retainerSent='No' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='No' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='No' AND status.tenantid='4'";
#$query = "SELECT * from status WHERE status.retainerSent='No' AND status.tenantid='4'";


$results = sqlsrv_query($conn,$query);



?>

<title>Retainer Sent = No</title>
Showing rows where Retainer Sent = No
<br><br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='2' cellspacing='0'>
  <tr>
  <th><font size=2>Case ID</th>
  <th><font size=2>Unique ID</th>  
  <th><font size=2>Interview Date</th>
  <th><font size=2>Time</th>
  <th><font size=2>Brand</th>
  <th><font size=2>First Name</th>
  <th><font size=2>Last Name</th>
  <th><font size=2>Get Rtnr</th>
  <th><font size=2>Sent Rtnr</th>
  <th><font size=2>Street 1</th>
  <th><font size=2>Street 2</th>
  <th><font size=2>City</th>
  <th><font size=2>State</th>
  <th><font size=2>Zipcode</th>
  <th><font size=2>Agent</th>
  <th><font size=2>Link</th>
  </tr>";
 #echo '"file:///Q|/Macys/NgPamela4/Retainer/Original/NgPamela4.pdf"'; 
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
  echo " target='_blank'>Click</a></td>";
  
  
  echo "<td><form action='NeedToSendRetainer.php?brandname=$brandname&agentlname=$agentlname' method='post'><select name='retainerSent'><option value='Yes'>Yes</option><option value='No' selected='selected'>No</option><input type='hidden' name='retainerSentDate' value='" . $date . "'><input type='hidden' name='caseid' value='" . $row['caseid'] . "'><input type='hidden' name='brandid' value='" . $row['brandid'] . "'><input type='submit' value='Go'></select></form></td>";
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