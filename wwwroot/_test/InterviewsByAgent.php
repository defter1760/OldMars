<?PHP

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
if (!isset($_POST['date1'])) $dateSelected = $date;
if (isset($_POST['date1'])) $dateSelected = $_POST['date1'];

if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (isset($brandname)) $brandnameurl = $_REQUEST['brandname'];

if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  interviewstartday, brand, agentlname, agentfname, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' and brand='$brandname' and agentlname='$agentlname' and tenantid=4) AS DerivedTableB GROUP BY interviewstartday, brand, agentfname,  agentlname ORDER BY interviewstartday, brand";

if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  interviewstartday, brand, agentlname, agentfname, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' and agentlname='$agentlname' and tenantid=4) AS DerivedTableB GROUP BY interviewstartday, brand, agentfname, agentlname ORDER BY interviewstartday, brand";

if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartday, brand, agentlname, agentfname, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' and brand='$brandname' and tenantid=4) AS DerivedTableB GROUP BY interviewstartday, brand, agentfname,  agentlname ORDER BY interviewstartday, brand";

if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' AND agentlname IS NOT NULL and tenantid=4) AS DerivedTableB GROUP BY interviewstartday, agentlname, agentfname, brand ORDER BY interviewstartday, brand";

#$query = "SELECT  interviewstartday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' AND agentlname<>'NULL') AS DerivedTableB GROUP BY interviewstartday, agentlname, agentfname, brand ORDER BY interviewstartday, brand";

$results = sqlsrv_query($conn,$query);


?> 
<?php
require('calendar/tc_calendar.php');
?>
<title>Interview started by agent</title>
<?PHP

echo "<form name='calendar' method='post' action=InterviewsByAgent.php?brandname=$brandnameurl&agentlname=$agentlname>"

?>
<table>
	<tr>
		<td>
<?php
	  $myCalendar = new tc_calendar("date1", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2015);
	  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->writeScript();
	  ?>  <INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Go!">
<?PHP 
echo "$dateSelected"
?>	  
		</td>
	<tr/>
</table>

</form>
Interviews started by agent per day
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
  echo "<td><font size=2>" . $row['interviewstartday'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 
<br>
  Interviews started by agent per day
<br><br>
<?PHP
if (isset($brandname)) if (isset($agentlname)) $query = "SELECT  interviewstartday, brand, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' and brand='$brandname' and agentlname='$agentlname' ) AS DerivedTableB GROUP BY interviewstartday, brand ORDER BY interviewstartday, brand";

if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  interviewstartday, brand, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' AND agentlname='$agentlname') AS DerivedTableB GROUP BY interviewstartday, brand ORDER BY interviewstartday, brand";

if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartday, brand, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' AND agentlname IS NOT NULL and brand='$brandname') AS DerivedTableB GROUP BY interviewstartday, brand ORDER BY interviewstartday, brand";

if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  interviewstartday, brand, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' AND agentlname IS NOT NULL) AS DerivedTableB GROUP BY interviewstartday, brand ORDER BY interviewstartday, brand";

#$query = "SELECT  interviewstartday, brand, Count(*) as count FROM (SELECT brand, agentlname, interviewstartday, agentfname FROM Status where interviewstartday='$dateSelected' AND agentlname<>'NULL') AS DerivedTableB GROUP BY interviewstartday, brand ORDER BY interviewstartday, brand";


$results = sqlsrv_query($conn,$query);
?>
 
 <?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Interview Started</th>
  <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['interviewstartday'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 
