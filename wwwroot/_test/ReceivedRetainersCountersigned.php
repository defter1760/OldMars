<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );

if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_POST['retainercountersignsent'])) $retainercountersignsent = $_POST['retainercountersignsent'];

$date = date('Y').'-'.date('m').'-'.date('d');
$week = date('Y').'-'.date('W');
$month = date('Y').'-'.date('m');
if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

if($caseid)
{


			$query = "
			IF EXISTS (SELECT * from status WHERE status.caseid='$caseid' AND status.tenantid='4' AND status.brandid='$brandid') UPDATE status set retainercountersignsent='$retainercountersignsent',retainercountersignsentdate='$date',retainercountersignsentweek='$week',retainercountersignsentmonth='$month' WHERE status.caseid='$caseid' AND status.tenantid='4' AND status.brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
	}

#if (isset($brandname)) if (isset($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND status.retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";

#if (isset($agentlname)) if (empty($brandname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND status.retainerRecieved='Yes' AND agentlname='$agentlname' AND status.tenantid='4'";
#if (isset($brandname)) if (empty($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND status.retainerRecieved='Yes' AND brand='$brandname' AND status.tenantid='4'";
#if (empty($brandname)) if (empty($agentlname)) $query = "SELECT * from status WHERE status.retainerSent='Yes' AND status.retainerRecieved='Yes' AND status.tenantid='4'";
#$query = "SELECT * from status WHERE status.retainerSent='Yes' AND status.retainerRecieved='Yes' AND status.tenantid='4'";

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT * from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainercountersignsent='Yes'";

if (isset($agentlname)) if (empty($brandname)) $query = "SELECT * from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainercountersignsent='Yes'";

if (isset($brandname)) if (empty($agentlname)) $query = "SELECT * from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainercountersignsent='Yes'";

if (empty($brandname)) if (empty($agentlname)) $query = "SELECT * from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainercountersignsent='Yes'";


$results = sqlsrv_query($conn,$query);



?>

<title>Retainer Sent = Yes and Retainer Received = Yes and Retainer countersign sent = No</title>
Showing rows where Retainer Sent = Yes and Retainer Received = Yes and Retainer countersign sent = No
<br><br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='2' cellspacing='0'>";
  echo "<tr>";
  echo "<th><font size=2>Case ID</th>";
  echo "<th><font size=2>Unique ID</th>";
  echo "<th><font size=2>Interview Date</th>";
  echo "<th><font size=2>Interview Time</th>";
  echo "<th><font size=2>Brand</th>";
  echo "<th><font size=2>First Name</th>";
  echo "<th><font size=2>Last Name</th>";
  echo "<th><font size=2>Sent Rtnr</th>";
  echo "<th><font size=2>Sent Date</th>";
  echo "<th><font size=2>Rtnr Rcvd</th>";
  echo "<th><font size=2>Rtnr Rcvd Date</th>";  
  echo "<th><font size=2>Rtnr Status</th>";
  echo "<th><font size=2>Countersign sent</th>";
  echo "<th><font size=2>Street 1</th>";
  echo "<th><font size=2>Street 2</th>";
  echo "<th><font size=2>City</th>";
  echo "<th><font size=2>State</th>";
  echo "<th><font size=2>Zipcode</th>";
  echo "<th><font size=2>Agent</th>";
  echo "<th><font size=2>Link</th>";
  echo "</tr>";


#while($countresults){
#echo "" . $countresults . "";
#}
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
  echo " target='_blank'>";
  echo "<font size=2>" . $row['retainerSent'] . "</a></td>";
  echo "<td><font size=2>" . $row['retainerSentDate'] . "</td>";
  echo "<td><font size=2>" . $row['retainerRecieved'] . "</td>";
  echo "<td><font size=2>" . $row['retainerRecievedDate'] . "</td>";
  echo "<td><font size=2>" . $row['retainerstatus'] .' '. $row['retainernote'] . "</td>";
  echo "<td><font size=2>" . $row['retainercountersignsent'] . "</td>";
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