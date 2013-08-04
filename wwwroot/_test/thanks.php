
<head>
<style>
.Header { /*  */
	font-size: 14px;
	
}
.Other { /*  */
	font-size: 14px;
	
}


        </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>THANK YOU!</title>
</head>
<?PHP 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');


if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];

if (isset($_POST['tenantid'])) $tenantid = $_POST['tenantid'];
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';

if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];

if (isset($_POST['statuslevel'])) $statuslevel = $_POST['statuslevel'];
if (isset($_REQUEST['statuslevel'])) $statuslevel = $_REQUEST['statuslevel'];






?>
<body>
</body>
</html>
<?PHP 
if ($statuslevel == 'Signed'){

	if (isset($uniqueid))
		{	
			$query = "IF EXISTS (SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid') select notelog from status  WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$currentlog = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($currentlog)){
	$newlog =   $date . ' @ ' . $time . ': <strong>Retainer and Auth Docusigned</strong><br>' . $row['notelog'];
}
	$currentstatus = 'Ready to Counter-sign via Docusign';		
		
			$query = "IF EXISTS (SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
#echo "Thanks for signing the retainer and authorization!<br><br>";
#echo "We'll be sending you some detailed follow up questions about this case shortly, keep an eye out for an email from us.<br><br>";

echo "<div class='Header'>";
echo "<strong>Thank you for completing the Macy's Employee Experience Questionnaire!</strong>";
echo "</div><div class='Other'>";
echo "<br><br>";
echo "You will receive an email shortly with a link to complete additional information about your potential case.";
echo "<br><br>";
echo "Or you can ";
echo "<a href='http://www.yourlawsuit.com/macys/questionnaire-3/'>CLICK HERE</a> to complete the survey now.  It should take approximately 15 minutes.";
echo "<br><br>";
echo "If you prefer, call Monday thru Friday 8:30am-6:30pm at 888.792.2293 to speak with one of our representatives.";
echo "</div>";

		}

}

if ($statuslevel == 'Faxpending'){

	if (isset($uniqueid))
		{	
			$query = "IF EXISTS (SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid') select notelog from status  WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$currentlog = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($currentlog)){
	$newlog =   $date . ' @ ' . $time . ': <strong>Opted to fax or upload the retainer</strong><br>' . $row['notelog'];
}
	$currentstatus = 'Waiting for retainer via Docusign Fax or upload';		
		
			$query = "IF EXISTS (SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
echo "We'll look for the signed retainer in the fax machine...thanks";
	
		}

}
?>
