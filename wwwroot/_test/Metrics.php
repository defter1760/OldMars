<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );




#$query = "SELECT * from status WHERE status.retainerSent='No' AND status.tenantid='4'";

#$countquery = "SELECT count(*) from status WHERE status.retainerSent='Yes' AND status.retainerRecieved='Yes' AND status.tenantid='4'";
#$countresults = sqlsrv_query($conn,$countquery);


?>
<?PHP
//Retainers waiting to send //
$querynum = "SELECT count(*) from status where retainerSent='No' and retainerRecieved='No'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
echo "<br><br>";
echo "<a href=NeedToSendRetainer.php>";
echo "" . $data . " total retainers not sent";
echo "</a>";
// end //

//Total Retainers Sent //
$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
echo "<br><br>";
echo "" . $data . " total retainers sent";
// end //

//Retainers waiting to come back //
$querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='No' ";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
echo "<br><br>";
echo "<a href='NeedToReceiveRetainer.php'>";
echo "" . $data . " total retainers sent but not returned";
echo "</a>";
//total end //

//Retainers returned //
$querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes' ";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
echo "<br><br>";
echo "<a href='ReceivedRetainers.php'>";
echo "" . $data . " total retainers returned";
echo "</a>";
//total end //

//total start //
$querynum = "SELECT count(*) from status where interviewstarted='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
echo "<br><br>";
echo "" . $data . " total interviews started";
//total end //

//total start //
$querynum = "SELECT count(*) from status where reachedretainerdiscussion='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
echo "<br><br>";
echo "" . $data . " total interviews reached retainer discussion";
//total end //

?>
<title>Mass Action Metrics</title>
<br>
<br>

</* Mmmm Metrics />

<br>
<br>

<?PHP
//query for first metric set
$query = "SELECT interviewstartday, Count(*) as counts FROM Status where agentlname<>'NULL' GROUP BY interviewstartday ";
$results = sqlsrv_query($conn,$query);
?>
<?PHP
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='4' cellspacing='1'>
  <tr>
  <th width='200'><font size=2>Interview Date</th>
  <th><font size=2>Count</th>
  </tr>";


#while($countresults){
#echo "" . $countresults . "";
#}
while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['interviewstartday'] . "</td>";
  echo "<td><font size=2>" . $row['counts'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>

<?PHP
//query for first metric set
$query = "SELECT retainerSentDate, Count(*) as counts FROM Status where agentlname<>'NULL' and retainerSent='Yes' GROUP BY retainerSentDate";
$results = sqlsrv_query($conn,$query);
?>
<?PHP
 echo "<br>";
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='4' cellspacing='1'>
  <tr>
  <th width='200'><font size=2>Retainer Sent Date</th>
  <th><font size=2>Count</th>
  </tr>";


#while($countresults){
#echo "" . $countresults . "";
#}
while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['retainerSentDate'] . "</td>";
  echo "<td><font size=2>" . $row['counts'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?>
<?PHP
$query = "SELECT retainerRecievedDate, Count(*) as counts FROM Status where agentlname<>'NULL' and retainerSent='Yes' and retainerRecieved='Yes' GROUP BY retainerRecievedDate";
$results = sqlsrv_query($conn,$query);

?>  
 <?PHP
 echo "<br>";
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='4' cellspacing='1'>
  <tr>
  <th width='200'><font size=2>Retainer Rcvd Date</th>
  <th><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['retainerRecievedDate'] . "</td>";
  echo "<td><font size=2>" . $row['counts'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 
<br>
<br>
<?PHP
$query = "SELECT  interviewstartday, agentfname, agentlname, Count(*) as count FROM (SELECT agentlname, interviewstartday, agentfname FROM Status where agentlname<>'NULL') AS DerivedTableB GROUP BY interviewstartday, agentlname, agentfname ORDER BY interviewstartday";
$results = sqlsrv_query($conn,$query);

?>  
 <?PHP
 echo "<br>";
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='300' cellpadding='4' cellspacing='1'>
  <tr>
  <th width='200'><font size=2>Interview Start Date</th>
   <th><font size=2>Agent</th>
  <th><font size=2>Count</th>
  </tr>";

while($row = sqlsrv_fetch_array($results)){
  echo "<tr>";
  echo "<td><font size=2>" . $row['interviewstartday'] . "</td>";
  echo "<td><font size=2>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><font size=2>" . $row['count'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  ?> 

<?php
#$query = 'SELECT count(*) from status WHERE status.retainerSent='No' AND status.retainerRecieved='No' AND status.tenantid='4';
#$querynum = 'SELECT count(*) from status ';
#$numberofresults = sqlsrv_query($conn,$querynum);
#print $numberofresults




?>
 