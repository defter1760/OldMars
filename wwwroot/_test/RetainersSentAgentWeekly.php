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

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";

#$query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";

#$query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";

#$query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";


#$query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";

$results = sqlsrv_query($conn,$query);

?> 
<?PHP    
  //echo "<tr>"; 
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' action=RetainersSentAgentWeekly.php?brandname=$brandnameurl&agentlname=$agentlname>";
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
<title>Retainers Sent by agent Weekly</title>
Retainers Sent by agent per week
<?PHP
echo "Current week: ". $weeknow . "";
?>
<br><br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='400' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Retainer Sent</th>
   <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Agent</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['retainerSentWeek'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>
<br>
  
<?PHP

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  retainerSentWeek, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand, agentlname, agentfname ORDER BY retainerSentWeek";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  retainerSentWeek, brand, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand ORDER BY retainerSentWeek";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  retainerSentWeek, brand, Count(*) as count FROM (SELECT agentlname, retainerSentWeek, brand, agentfname FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND retainerSent='Yes' and retainerSentWeek='$weekchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY retainerSentWeek, brand ORDER BY retainerSentWeek";


#$query = "SELECT  retainerSentWeek, brand, Count(*) as count FROM (SELECT retainerSentWeek, brand FROM Status where agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and retainerSent='Yes') AS DerivedTableB GROUP BY retainerSentWeek, brand ORDER BY retainerSentWeek";
$results = sqlsrv_query($conn,$query);

?>
Retainers Sent per week total
<?PHP
echo "Current week: ". $weeknow . "";
?>
<br><br>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Retainer Sent</th>
  <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['retainerSentWeek'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 