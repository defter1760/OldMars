<?PHP

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (isset($brandname)) $brandnameurl = $_REQUEST['brandname'];
if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

if (!isset($_POST['date1'])) $dateSelected = $date;
if (isset($_POST['date1'])) $dateSelected = $_POST['date1'];


if (isset($brandname)) if (isset($agentlname)) $query = "SELECT * from status WHERE  AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";

if (isset($agentlname)) if (empty($brandname)) $query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND and reachedretainerdiscussion='Yes' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname ORDER BY interviewcompleteday, brand";

if (isset($brandname)) if (empty($agentlname)) $query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' AND brand='$brandname' AND status.tenantid='4' AND reachedretainerdiscussion='Yes') AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname, agentfname ORDER BY interviewcompleteday, brand";

if (empty($brandname)) if (empty($agentlname)) $query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' AND status.tenantid='4' and reachedretainerdiscussion='Yes') AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname, agentfname ORDER BY interviewcompleteday, brand";

#$query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' and reachedretainerdiscussion='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'") AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname, agentfname ORDER BY interviewcompleteday, brand";

#$query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' and reachedretainerdiscussion='Yes' AND agentlname='$agentlname' AND status.tenantid='4') AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname, agentfname ORDER BY interviewcompleteday, brand";

#$query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' and reachedretainerdiscussion='Yes') AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname, agentfname ORDER BY interviewcompleteday, brand";

#$query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' AND brand='$brandname' AND and reachedretainerdiscussion='Yes') AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname, agentfname ORDER BY interviewcompleteday, brand";

#$query = "SELECT  interviewcompleteday, brand, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewcompleteday, brand, agentfname FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' and reachedretainerdiscussion='Yes') AS DerivedTableB GROUP BY interviewcompleteday, brand, agentlname, agentfname ORDER BY interviewcompleteday, brand";

$results = sqlsrv_query($conn,$query);

?> 
<?php
require('calendar/tc_calendar.php');
?>
<?PHP
#echo "<form name='calendar' method='post' action='InterviewsByAgent.php?brandname=$brandname&agentlname=$agentlname'>";
#echo '<a href=DemandsCreatedAgentMonthly.php?brandname=';  
#echo "$brandnameurl"; 
#echo '&agentlname=';
#echo "$agentlname"; 
#echo ' target=\'iframe_content\'>';


echo "<form name='calendar' method='post' action=InterviewsClosedByAgent.php?brandname=$brandnameurl&agentlname=$agentlname>"
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
echo "$dateSelected";

?>	  
		</td>
	<tr/>
</table>

</form>
<title>Interview complete by agent</title>
Interviews complete by agent per day
<br><br>
 <?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='400' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Interview Cmplte</th>
   <th width='100'><font size=2>Brand</th>
   <th width='100'><font size=2>Agent</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['interviewcompleteday'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 
  
<?PHP
  $query = "SELECT  interviewcompleteday, brand, Count(*) as count FROM (SELECT interviewcompleteday, brand FROM Status where interviewcompleteday='$dateSelected' AND agentlname<>'NULL' and reachedretainerdiscussion='Yes') AS DerivedTableB GROUP BY interviewcompleteday, brand ORDER BY interviewcompleteday, brand";
$results = sqlsrv_query($conn,$query);

?> 
<br>
Interviews complete per day total
<br><br>
 <?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='2' cellspacing='0'>
  <tr>
  <th width='100'><font size=2>Interview Cmplte</th>
  <th width='100'><font size=2>Brand</th>
  <th width='100'><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['interviewcompleteday'] . "</td>";
  echo "<td><font size=2>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 
