<?PHP

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );

$weeknow = date('Y').'-'.date('W');

if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (isset($brandname)) $brandnameurl = $_REQUEST['brandname'];

if (isset($_POST['weekchoice'])) $weekchoice = $_POST['weekchoice'];
if (empty($weekchoice)) $weekchoice = $weeknow;

if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";

#$query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";

#$query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";

#$query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";

#$query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";

$results = sqlsrv_query($conn,$query);

?> 
<?PHP    
  //echo "<tr>"; 
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' action=DemandsCreatedAgentWeekly.php?brandname=$brandnameurl&agentlname=$agentlname>";
	echo "<div align='left' class='MyFont'>";
	echo "Choose Week";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='weekchoice'  value= '$weekchoice' width='100' height='12px'>";
	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Go'>";
	echo "</div>";
	echo "</div>";

	//echo "<INPUT TYPE = 'Reset' Name = 'Submit2'  VALUE = 'Reset'>";
	echo "</FORM>";

?>
<title>Demand Created by agent Weekly</title>
Demand Created by agent per week
<?PHP
echo "Current week: ". $weeknow . "";
?>
<br><br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='400' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Retainer Received</th>
   <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Agent</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['demandcreatedweek'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>
<br>
  
<?PHP

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  demandcreatedweek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand, agentlname, agentfname ORDER BY demandcreatedweek";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  demandcreatedweek, brand, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand ORDER BY demandcreatedweek";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  demandcreatedweek, brand, Count(*) as count FROM (SELECT agentlname, demandcreatedweek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND demandcreated='Yes' and demandcreatedweek='$weekchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY demandcreatedweek, brand ORDER BY demandcreatedweek";


#$query = "SELECT  demandcreatedweek, brand, Count(*) as count FROM (SELECT demandcreatedweek, brand FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and demandcreated='Yes') AS DerivedTableB GROUP BY demandcreatedweek, brand ORDER BY demandcreatedweek";
$results = sqlsrv_query($conn,$query);

?>
Demand Created per week total
<?PHP
echo "Current week: ". $weeknow . "";
?>
<br><br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Retainer Received</th>
  <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['demandcreatedweek'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 