<title>Retainer intake</title>

<?PHP    

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );


$date = date('Y').'-'.date('m').'-'.date('d');
$week = date('Y').'-'.date('W');
$month = date('Y').'-'.date('m');

if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_POST['brandname'])) $brandname = $_POST['brandname'];

if (isset($_REQUEST['authstatus'])) $authstatus = $_REQUEST['authstatus'];
if (isset($_POST['authstatus'])) $authstatus = $_POST['authstatus'];

if (isset($_REQUEST['retainerstatus'])) $retainerstatus = $_REQUEST['retainerstatus'];
if (isset($_POST['retainerstatus'])) $retainerstatus = $_POST['retainerstatus'];

if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];

if (isset($_REQUEST['retainernote'])) $retainernote = $_REQUEST['retainernote'];
if (isset($_POST['retainernote'])) $retainernote = $_POST['retainernote'];

if (isset($_REQUEST['authnote'])) $authnote = $_REQUEST['authnote'];
if (isset($_POST['authnote'])) $authnote = $_POST['authnote'];

if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}
if($uniqueid){
	if($retainerstatus){
	
		if ( $retainerstatus == "Received SIGNED" ) 
	
		{
			$retainerRecieved = "Yes";
			$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set retainernote='$retainernote',retainerRecievedDate='$date',retainerRecievedWeek='$week',retainerRecieved='$retainerRecieved',retainerRecievedMonth='$month' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
			$results = sqlsrv_query($conn,$query);
		}
		#if ( $retainerstatus == "InpacketNOTSIGNED" ) 
	    #
		#{
		#	$retainerRecieved = "Yes";
		#	$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set retainernote='$retainernote',retainerRecievedDate='$date',retainerRecievedWeek='$week',retainerRecieved='$retainerRecieved',retainerRecievedMonth='$month' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
		#	$results = sqlsrv_query($conn,$query);
		#}
		if ( $retainerstatus == "Received NEEDSATTN" ) 
	
		{
			$retainerRecieved = "Yes";
			$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set retainernote='$retainernote',retainerRecievedDate='$date',retainerRecievedWeek='$week',retainerRecieved='$retainerRecieved',retainerRecievedMonth='$month' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
			$results = sqlsrv_query($conn,$query);
		}
		#if ( $retainerstatus == "NOTINPACKET" ) 
	    #
		#{
		#	$retainerRecieved = "No";
		#	$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set retainernote='$retainernote',retainerRecieved='$retainerRecieved' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
		#	$results = sqlsrv_query($conn,$query);
		#}
	}
	if($authstatus){
	
		if ( $authstatus == "Received SIGNED" ) 
	
		{
			$authformreceived = "Yes";
			$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set authnote='$authnote', authformreceiveddate='$date',authformreceivedweek='$week',authformreceived='$authformreceived',authformreceivedmonth='$month' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
			$results = sqlsrv_query($conn,$query);
		}
		#if ( $authstatus == "InpacketNOTSIGNED" ) 
        #	
		#{
		#	$authformreceived = "Yes";
		#	$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set authnote='$authnote', authformreceiveddate='$date',authformreceivedweek='$week',authformreceived='$authformreceived',authformreceivedmonth='$month' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
	    #    $results = sqlsrv_query($conn,$query);
        #
		#}
		if ( $authstatus == "Received NEEDSATTN" ) 
	
		{
			$authformreceived = "Yes";
			$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set authnote='$authnote', authformreceiveddate='$date',authformreceivedweek='$week',authformreceived='$authformreceived',authformreceivedmonth='$month' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
			$results = sqlsrv_query($conn,$query);

		}
		#if ( $authstatus == "NOTINPACKET" ) 
	    #
		#{
		#	$authformreceived = "No";
		#				$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4') UPDATE status set authnote='$authnote',authformreceived='$authformreceived' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4'";
		#	$results = sqlsrv_query($conn,$query);
        #
		#}
	}
}
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' ACTION ='retainerIntake.php'>";
	echo "<div align='left' class='MyFont'>";
	echo "Unique ID";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='uniqueid'  value= '' width='100' height='12px'>";
	echo "</div>";
	echo "<br>";
	echo "<div align='left' class='MyFont'>";
	#echo "Retainer Intake Disposition";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	//retainer status drop down
	echo "<div align='left' class='MyFont'>";
	echo "Retainer status";
	echo "</div>";
	echo "<select name='retainerstatus'>";
	echo "<option selected='selected'> </option>";
	echo "<option value='Received SIGNED' >SIGNED</option>";
	#echo "<option value='Received NOTSIGNED'>NOTSIGNED:In packet</option>";
	echo "<option value='Received NEEDSATTN'>NEEDSATTN</option>";
	#echo "<option value='NOTINPACKET'>MISSING:Not returned</option>";
	echo "</select>";
	//auth status drop down
	echo "<div align='left' class='MyFont'>";
	echo "Auth status";
	echo "</div>";
	echo "<select name='authstatus'>";
	echo "<option selected='selected'> </option>";
	echo "<option value='Received SIGNED' >SIGNED</option>";
	#echo "<option value='Received NOTSIGNED'>NOTSIGNED:In packet</option>";
	echo "<option value='Received NEEDSATTN'>NEEDSATTN</option>";
	#echo "<option value='NOTINPACKET'>MISSING:Not returned</option>";
	echo "</select>";
	

	//retainer note
	echo "<div align='left' class='MyFont'>";
	echo "Retainer note";
	echo "</div>";
	echo "<INPUT TYPE = 'text' Name ='retainernote'  value= '$retainernote' width='100' height='12px'>";
	//auth form note
	echo "<div align='left' class='MyFont'>";
	echo "Auth form note";
	echo "</div>";
	echo "<INPUT TYPE = 'text' Name ='authnote'  value= '$authnote' width='100' height='12px'>";
	echo "</div>";
	echo "<br>";
	echo "<input type='hidden' name='retainerReceivDate' value='" . $date . "'>";
	echo "<input type='hidden' name='brandid' value='" . $row['brandid'] . "'>";
	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Go'>";
	echo "</FORM>";



?>