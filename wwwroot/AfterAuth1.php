<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<style>
#main{
	font-family: 'Open Sans', sans-serif;
	color:#424242;
}

a {
	color:#9f111b;
	font-weight:bold;
	text-decoration:none;
}
div#main {

  width: 800px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
<style>


</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>THANK YOU!</title>

<?PHP 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');



if (empty($tenantid)) $tenantid = '4';

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];

if (isset($_POST['statuslevel'])) $statuslevel = $_POST['statuslevel'];
if (isset($_REQUEST['statuslevel'])) $statuslevel = $_REQUEST['statuslevel'];




?>
<?PHP 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT authformreceived,authformreceived2,retainerRecieved,feewaiverreceived,completedlongformonline,FirstName,LastName,brand,email,brandid,brand FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){


		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$authformreceived2 = $row['authformreceived2']; if (empty($authformreceived2)) unset($authformreceived2);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
		$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
		$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
		$brandname = $row['brand']; if (empty($brandname)) unset($brandname);
		$email = $row['email']; if (empty($email)) unset($email);
		$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
		$brand = $row['brand']; if (empty($brand)) unset($brand);

  }
?>
<?PHP
echo '<script type="text/javascript">';
echo 'function reloadPage()';
echo '{';
#echo 'window.top.location.replace("http://yourlawsuit.com/macys/afterauthorization/?uniqueid='.$uniqueid.'");';	
echo 'window.top.location.replace("https://macyslawsuit.com/afterauthorization/?uniqueid='.$uniqueid.'");';
echo '}';
echo '</script>';
?>
<?php
#$link = 'http://sql.initiativelegal.com:35535/getauth.php?uniqueid='.$uniqueid;
$link = 'https://macyslawsuit.com/authorization/?uniqueid='.$uniqueid;
#$link = 'http://www.yourlawsuit.com/macys/authorization/?uniqueid='.$uniqueid;
?>
<?PHP 
if ($statuslevel == 'Signed')
{
	if (isset($uniqueid))
	{	
		$query = "select notelog from status WHERE uniqueid='$uniqueid'";
		$currentlog = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($currentlog))
		{
			$newlog =   $date . ' @ ' . $time . ': <strong>Auth Docusigned</strong><br>' . $row['notelog'];
		}		
		$currentstatus = 'Authorization complete via Docusign';		
		$query = "UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date',authformsent='Yes',authformreceived='Docusigned',authaccept='Yes',authacceptdate='$date',authacceptweek='$week',authacceptmonth='$month',authformreceiveddate='$date',authformreceivedmonth='$month',authformreceivedweek='$week',authformsent2='Yes',authformreceived2='Docusigned',authaccept2='Yes',authacceptdate2='$date',authacceptweek2='$week',authacceptmonth2='$month',authformreceiveddate2='$date',authformreceivedmonth2='$month',authformreceivedweek2='$week' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		//echo "<input style='border:0' type='text' id='textbox1' size='1'>";
		//echo "<script>document.getElementById('textbox1').focus()<\/script>";
		#echo "<div id='main'>";
		#echo "<table width='650px'>";
		#echo "<tr>";
		#echo "<td align='left'>";
		#echo "<font size='5'>Our law firm has received your signed Authorization for Release of Personnel Files.</font><br /><br />";
		#echo "<font size='5'>The next step is a series of more detailed questions regarding your work experience at Macy's. Please click below to proceed.</font><br /><br />";
		#echo '<a href="'.$link.'" target="top">';
		#echo '<script type="text/javascript">';
		#echo 'top.location.reload(true);';
		#echo 'window.top.location.reload();';
		#echo '<\/script>';
		#echo "<div align='center'><font size='6'>Click Here!</font></a></div>";
		#echo "</td>";
		#echo "</tr>";
		#echo "</table>";
		#echo "</div>";
		echo '<body onload="reloadPage()">';
	}
}

if ($statuslevel == 'Faxpending')
{
	if (isset($uniqueid))
	{	
		$query = "select notelog from status WHERE uniqueid='$uniqueid'";
		$currentlog = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($currentlog)){
	$newlog =   $date . ' @ ' . $time . ': <strong>Opted to fax or upload the authorization</strong><br>' . $row['notelog'];
}
	$currentstatus = 'Waiting for authorization via Docusign Fax or upload';		
		
			$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
echo "We'll look for the signed authorization in the fax machine...thanks";
	
		}

}
?>
</head>

<!--<body>
</body>-->


<?PHP
////////////////////////////////////////////////////////////////////////////////
/////email/////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
?>



</body>
</html>