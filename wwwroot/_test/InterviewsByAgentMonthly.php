<?PHP

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );

$monthnow = date('Y').'-'.date('m');
if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (isset($brandname)) $brandnameurl = $_REQUEST['brandname'];

if (isset($_POST['monthchoice'])) $monthchoice = $_POST['monthchoice'];
if (empty($monthchoice)) $monthchoice = $monthnow;

if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";


#$query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";

#$query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";

#$query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";


#$query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";

$results = sqlsrv_query($conn,$query);

?> 
<?PHP    
  //echo "<tr>"; 
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' action=InterviewsByAgentMonthly.php?brandname=$brandnameurl&agentlname=$agentlname>";
	echo "<div align='left' class='MyFont'>";
	echo "Choose Month";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='monthchoice'  value= '$monthchoice' width='100' height='12px'>";
	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Go'>";
	echo "</div>";
	echo "</div>";

	//echo "<INPUT TYPE = 'Reset' Name = 'Submit2'  VALUE = 'Reset'>";
	echo "</FORM>";

?>
<title>Interview started by agent</title>
Interviews started by agent per month
<?PHP
echo "Current month: ". $monthnow . "";
?>
<br><br>
 <?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='400' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Interview Started</th>
   <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Agent</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['interviewstartmonthyear'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>

<?PHP

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";
if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  interviewstartmonthyear, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand, agentlname, agentfname ORDER BY interviewstartmonthyear, brand";
if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartmonthyear, brand, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND brand='$brandname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand ORDER BY interviewstartmonthyear, brand";
if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartmonthyear, brand, Count(*) as count FROM (SELECT agentlname, brand, interviewstartmonthyear, agentfname FROM Status where agentlname IS NOT NULL and interviewstartmonthyear='$monthchoice' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewstartmonthyear, brand ORDER BY interviewstartmonthyear, brand";


#$query = "SELECT  interviewstartmonthyear, brand, Count(*) as count FROM (SELECT interviewstartmonthyear, brand FROM Status where agentlname IS NOT NULL) AS DerivedTableB GROUP BY interviewstartmonthyear, brand ORDER BY interviewstartmonthyear, brand";
$results = sqlsrv_query($conn,$query);
?> 
<br>
Interviews started per month total
<?PHP
echo "Current month: ". $monthnow . "";
?>
<br><br>
 <?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Interview Started</th>
  <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['interviewstartmonthyear'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";  
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 