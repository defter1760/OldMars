<?PHP
//require("style.php");//docutype, css
//require("functions.php");//functions
require("headerMailroom.php");
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<?PHP


if (isset($_REQUEST['uniqueid']))
    {
        $outuniqueid = $_REQUEST['uniqueid'];
    }
if (isset($_POST['initials']))
{
    $mrinitials = $_POST['initials'];
    if (empty($mrinitials)) unset($mrinitials);
    if (isset($_POST['outuniqueid']))
    {
        
        $outuniqueid = $_POST['outuniqueid'];
        if (empty($outuniqueid)) unset($outuniqueid);
        if (isset($_POST['send'])) unset($outuniqueid);
        $fetch = $_POST['fetch'];
        
        if (isset($_POST['MarkSent']))
        {
            if (isset($_POST['mediatyperetainer']))
	    {
		$query = "UPDATE status set retainerSent='Yes',retainersentviamail='Yes',retainersentviamaildate='$date',retainerSentMonth='$month',retainerSentWeek='$week',retainerSentDate='$date',retainertomailroom='' WHERE status.uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		if (isset($_POST['docutype'])) $docutype = $_POST['docutype'];
		if (!isset($docutype)) $docutype = '';
		if (isset($_POST['postagecost'])) $postagecost = $_POST['postagecost'];
		
		if (isset($_POST['sasecost'])) $sasecost = $_POST['sasecost'];
		if (!isset($sasecost)) $sasecost = '';
		$query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname,brand FROM Status WHERE
		uniqueid='$outuniqueid';";
		$results = sqlsrv_query($conn,$query);
	    
    
		while($row = sqlsrv_fetch_array($results))
		{
		    $thisFirstName = $row['FirstName'];
		    $thisLastName = $row['LastName'];
		    $thisbrand = $row['brand'];
		}
		
		$query = "insert into Tbl_MailRoomOut
		(FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,OutgoingCost,Campaign,IncomingCost,SentWeek,SentMonth,SentYear)
		VALUES
		('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$docutype','$mrinitials','$postagecost','$thisbrand','$sasecost','$week','$month','$year')";
		$results = sqlsrv_query($conn,$query);
		
		$query = "select notelog as notelog from status where uniqueid='$outuniqueid';";
		$results = sqlsrv_query($conn,$query);
		
		$query = "SELECT notelog FROM Status WHERE uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
    
		while($row = sqlsrv_fetch_array($results))
		{
			$notelog = $row['notelog']; if (empty($notelog)) unset($notelog);	
		}
		$newnote = 'Attorney Client Agreement mailed via MailRoom('.$mrinitials.')';
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
    
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
    
		echo "This is a place holder for the email function";

		}
	    if (isset($_POST['mediatypeauth1']))
	    {
		$query = "UPDATE status set authformsent='Yes',authsentviamail='Yes',authsentviamaildate='$date',authformsentdate='$date',authformsentmonth='$month',authformsentweek='$week',authtomailroom='' WHERE status.uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		$medianotretainer = 'Yes';
		
		$doctype = 'Auth1';    
		

	    }
	    
	    if (isset($_POST['mediatypeauth2']))
	    {
		$query = "UPDATE status set authformsent2='Yes',authsentviamail2='Yes',authsentviamaildate2='$date',authformsentdate2='$date',authformsentmonth2='$month',authformsentweek2='$week',authtomailroom2='' WHERE status.uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		$medianotretainer = 'Yes';
		if (isset($doctype))
		{
		$doctype = $doctype.' and Auth2';
		}
		else
		{
		$doctype = 'Auth2';    
		}

	    }
	    if (isset($_POST['mediatypefw']))
	    {
		$query = "UPDATE status set feewaiversent='Yes',feewaiversentviamail='Yes',feewaiversentviamaildate='$date',feewaiversentdate='$date',feewaiversentmonth='$month',feewaiversentweek='$week',feewaivertomailroom='' WHERE status.uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		$medianotretainer = 'Yes';
		if (isset($doctype))
		{
		$doctype = $doctype.' and Feewaiver';
		}
		else
		{
		$doctype = 'Feewaiver';    
		}

	    }
	    if (isset($_POST['mediatypeclientdocs']))
	    {
		$medianotretainer = 'Yes';
		$doctype = 'Client document returns';



	    }	    
		if(isset($medianotretainer))
		{
		$docutype = $doctype;
		if (!isset($docutype)) $docutype = '';
		if (isset($_POST['postagecost'])) $postagecost = $_POST['postagecost'];
		
		if (isset($_POST['sasecost'])) $sasecost = $_POST['sasecost'];
		if (!isset($sasecost)) $sasecost = '';
		$query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname,brand FROM Status WHERE
		uniqueid='$outuniqueid';";
		$results = sqlsrv_query($conn,$query);
	    
    
		while($row = sqlsrv_fetch_array($results))
		{
		    $thisFirstName = $row['FirstName'];
		    $thisLastName = $row['LastName'];
		    $thisbrand = $row['brand'];
		}
		
		$query = "insert into Tbl_MailRoomOut
		(FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,OutgoingCost,Campaign,IncomingCost,SentWeek,SentMonth,SentYear)
		VALUES
		('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$docutype','$mrinitials','$postagecost','$thisbrand','$sasecost','$week','$month','$year')";
		$results = sqlsrv_query($conn,$query);
		
		$query = "select notelog as notelog from status where uniqueid='$outuniqueid';";
		$results = sqlsrv_query($conn,$query);
		
		$query = "SELECT notelog FROM Status WHERE uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
    
		while($row = sqlsrv_fetch_array($results))
		{
			$notelog = $row['notelog']; if (empty($notelog)) unset($notelog);	
		}
		$newnote = $docutype.' mailed via MailRoom('.$mrinitials.')';
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
    
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$outuniqueid'";
		$results = sqlsrv_query($conn,$query);
    
		echo "This is a place holder for the email function";
		if (isset($outuniqueid)) unset($outuniqueid);
		if (isset($fetch)) unset($fetch);
		if (isset($mrinitials)) unset($mrinitials);
		}
		
	}
	
	
    }
}

?>
<div id="main" width="100%" align="center">
<?PHP
//echo "<div align=left>"; 
//echo "<a href='mr_outlist.php' > Outstanding requests </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='mr_incoming.php' > Receive Documents </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='mr_outgoing.php' > Send a document </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='undeliverable.php' > Receive undeliverables </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='mr_outgoing.php' > Refresh </a>";
//echo "<br>";
//echo "</div>";
//echo "<img src='/mars/test/img/MARS_Search_50_percent.png'><Br><h1>Mailroom</h1>";

echo "<FORM NAME ='form2' METHOD ='POST' ACTION='mr_outgoing.php'>";
echo "<table cellspacing='2' cellpadding='2' width='100%' height='60px' align='center' >";
echo "<tr>";
echo "<td width='380px' valign='top'>";
echo "Scan uniqueid: &nbsp;";
if (isset($outuniqueid))
{
    echo "<INPUT TYPE = 'text' Name='outuniqueid' id='outuniqueid' value='".$outuniqueid."' style='width:200px; height:25px'>";
}
else
{
    echo "<INPUT TYPE = 'text' Name='outuniqueid' id='outuniqueid' value='' style='width:200px; height:25px'>";
}
echo "</td>";

echo "<td width='350px' valign='top'>";
echo "First three letters of last name: &nbsp;";
if (isset($mrinitials))
{
    echo "<INPUT TYPE = 'text' Name='initials' id='initiatls' value='".$mrinitials."' style='width:50px; height:25px'>";
}
else
{
    echo "<INPUT TYPE = 'text' Name='initials' id='initiatls' value='' style='width:50px; height:25px'>";
}
echo "</td>";
echo "<td width='400px' valign='top'>";
        if (!isset($mrinitials)) if (!isset($outuniqueid))
        {
            echo "<INPUT TYPE = 'Submit' Name = 'fetch' style='width:60px; height:25px; font-size:16px' VALUE = 'Fetch' />";
        }
        
        if (isset($mrinitials)) if (!isset($outuniqueid))
        {
            echo "<INPUT TYPE = 'Submit' Name = 'fetch' style='width:60px; height:25px; font-size:16px' VALUE = 'Fetch' />";
        }
        
        if (!isset($mrinitials)) if (isset($outuniqueid))
        {
            echo "<INPUT TYPE = 'Submit' Name = 'fetch' style='width:60px; height:25px; font-size:16px' VALUE = 'Fetch' />";
        }
        
#        echo "<INPUT TYPE = 'Submit' Name = 'fetch' style='width:60px; height:25px; font-size:16px' VALUE = 'Fetch' />";
if (isset($_REQUEST['docutype']))
{
echo "<input type='hidden' name='docutype' value='".$_REQUEST['docutype']."' />";
}
else
{
   echo "<input type='hidden' name='docutype' value='' />"; 
}
echo "</form>";
echo "</td>";
echo "<td>";
echo "</td>";
echo "</tr>";
echo "</table>";
?>

<?PHP

if (isset($mrinitials))
{//require initials be set, start
   if (isset($outuniqueid))
   {//require uniqueid be set, start
        $query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname,mailroomcostsofar FROM Status WHERE
        uniqueid='$outuniqueid';";
	$results = sqlsrv_query($conn,$query);
        

    while($row = sqlsrv_fetch_array($results))
    {
        $thisFirstName = $row['FirstName'];
        $thisLastName = $row['LastName'];
        $thismailroomcostsofar = $row['mailroomcostsofar'];
    }
echo "<FORM NAME ='form2' METHOD ='POST' ACTION='mr_outgoing.php'>";
echo "<input type='hidden' name='docutype' value='".$_REQUEST['docutype']."' />";
echo "<input type='hidden' name='outuniqueid' value='".$outuniqueid."' />";
echo "<input type='hidden' name='initials' value='".$mrinitials."' />";
echo "<table class='tableWrapper' cellspacing='2' cellpadding='2' width='100%' align='center' >";
echo "<tr>";
echo "<td align='center'>";
echo "<h1>".$thisFirstName."  ".$thisLastName."</h1>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table class='table' cellspacing='2' cellpadding='2' width='100%' align='center' >";
echo "<tr>";
echo "<td  width = '200px' align='left'>";
echo "Media type:<br>";
echo "<INPUT TYPE = 'Radio' Name ='mediatyperetainer'  id='retainer' value='Retainer Packet' ";
if (isset($_POST['docutype']))
{
    if($_POST['docutype'] == 'Retainer')
    {
	echo "checked> Attorney-Client Agreement Packet <br>";
    }
    else
    {
	echo "> Attorney-Client Agreement Packet <br>";
    }
    }
else
{
    echo "> Attorney-Client Agreement Packet <br>";
}
echo "<INPUT TYPE = 'checkbox' Name ='mediatypeauth1'  id='authorization' value='Authorization Packet'> Authorization Packet <br>";
echo "<INPUT TYPE = 'checkbox' Name ='mediatypeauth2'  id='authorization2' value='Authorization Packet2'> Authorization Packet2 <br>";
echo "<INPUT TYPE = 'checkbox' Name ='mediatypefw'  id='feewaiver' value='Feewaiver Packet'> Fee Waiver Packet <br>";
echo "<INPUT TYPE = 'Radio' Name ='mediatypeclientdocs'  id='clientdocs' value='Client document returns'> Client document returns <br>";

if (isset($_POST['docutype']))
{
    switch ($_POST['docutype']) {
        case 'Authorizations':
            echo "<script>";
            echo 'document.getElementById(\'retainer\').disabled="true";';
            echo "</script>";
            break;
        case 'Retainer':
            echo "<script>";
            echo 'document.getElementById(\'authorization\').disabled="true";';
	    echo 'document.getElementById(\'authorization2\').disabled="true";';
            echo 'document.getElementById(\'feewaiver\').disabled="true";';
            echo 'document.getElementById(\'clientdocs\').disabled="true";';
            echo "</script>";
            break;
    }
}
$query = "SELECT retaineraccept,authaccept,authaccept2,feewaiveraccept,authtomailroom,authtomailroom2,feewaivertomailroom,retainertomailroom FROM Status WHERE
uniqueid='$outuniqueid';";
$results = sqlsrv_query($conn,$query);
        

    while($row = sqlsrv_fetch_array($results))
    {
        $retaineraccept = $row['retaineraccept'];
        $authaccept = $row['authaccept'];
        $authaccept2 = $row['authaccept2'];
	$feewaiveraccept = $row['feewaiveraccept'];
	$authtomailroom = $row['authtomailroom'];
	$authtomailroom2 = $row['authtomailroom2'];
	$feewaivertomailroom = $row['feewaivertomailroom'];
	$retainertomailroom = $row['retainertomailroom'];
    }
    
    if (isset($retainertomailroom))
    {
	if($retainertomailroom == 'Yes')
	{
	    if(isset($retaineraccept))
	    {
		if($retaineraccept == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'retainer\').disabled="true";';
		    echo "</script>";
		}
	    }
	}
	if($retainertomailroom != 'Yes')
	{
	    echo "<script>";
	    echo 'document.getElementById(\'retainer\').disabled="true";';
	    echo "</script>";    
	}
    }
    else
    {
	echo "<script>";
	echo 'document.getElementById(\'retainer\').disabled="true";';
	echo "</script>";    
    }
    
    if(isset($retaineraccept))
    {
	if($retaineraccept == 'Yes')
	{
	    echo "<script>";
            echo 'document.getElementById(\'retainer\').disabled="true";';
            echo "</script>";
	}
    }
    
    if (isset($authtomailroom))
    {
	if($authtomailroom == 'Yes')
	{
	    if(isset($authaccept))
	    {
		if($authaccept == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'authorization\').disabled="true";';
		    echo "</script>";
		    $auth1disabled = 'Yes';
		}
	    }
	}
	if($authtomailroom != 'Yes')
	{
	    echo "<script>";
	    echo 'document.getElementById(\'authorization\').disabled="true";';
	    echo "</script>";
	    $auth1disabled = 'Yes';
	}
    }
    else
    {
	echo "<script>";
	echo 'document.getElementById(\'authorization\').disabled="true";';
	echo "</script>";
	$auth1disabled = 'Yes';
    }
    
    if(isset($authaccept))
    {
	if($authaccept == 'Yes')
	{
	    echo "<script>";
            echo 'document.getElementById(\'authorization\').disabled="true";';
            echo "</script>";
	    $auth1disabled = 'Yes';
	}
    }

    if (isset($authtomailroom2))
    {
	if($authtomailroom2 == 'Yes')
	{
	    if(isset($authaccept2))
	    {
		if($authaccept2 == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'authorization2\').disabled="true";';
		    echo "</script>";
		    $auth2disabled = 'Yes';
		}
	    }
	}
	if($authtomailroom2 != 'Yes')
	{
	    echo "<script>";
	    echo 'document.getElementById(\'authorization2\').disabled="true";';
	    echo "</script>";
	    $auth2disabled = 'Yes';
	}
    }
    else
    {
	echo "<script>";
	echo 'document.getElementById(\'authorization2\').disabled="true";';
	echo "</script>";
	$auth2disabled = 'Yes';
    }
    
    if(isset($authaccept2))
    {
	if($authaccept2 == 'Yes')
	{
	    echo "<script>";
            echo 'document.getElementById(\'authorization2\').disabled="true";';
            echo "</script>";
	    $auth2disabled = 'Yes';
	}
    }

    if (isset($feewaivertomailroom))
    {
	if($feewaivertomailroom == 'Yes')
	{
	    if(isset($feewaiveraccept))
	    {
		if($feewaiveraccept == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'feewaiver\').disabled="true";';
		    echo "</script>";
		    $fwdisabled = 'Yes';
		}
	    }
	}
	if($feewaivertomailroom != 'Yes')
	{
	    echo "<script>";
	    echo 'document.getElementById(\'feewaiver\').disabled="true";';
	    echo "</script>";
	    $fwdisabled = 'Yes';
	}
    }
    else
    {
	echo "<script>";
	echo 'document.getElementById(\'feewaiver\').disabled="true";';
	echo "</script>";
	$fwdisabled = 'Yes';
    }
    
    if(isset($feewaiveraccept))
    {
	if($feewaiveraccept == 'Yes')
	{
	    echo "<script>";
            echo 'document.getElementById(\'feewaiver\').disabled="true";';
            echo "</script>";
	    $fwdisabled = 'Yes';
	}
    }
    
if (!isset($auth1disabled))
{
    $drawsomething = 'Yes';
}
if (!isset($auth2disabled))
{
    $drawsomething = 'Yes';
}
if (!isset($fwdisabled))
{
    $drawsomething = 'Yes';
}
    
    
echo "<td  width = '200px' align='left'>";
    echo "Outgoing Postage <br>";
    echo "<INPUT TYPE = 'text' Name ='postagecost'  value=''/> ";
    echo "<br>SASE Postage <br>";
    echo "<INPUT TYPE = 'text' Name ='sasecost'  value=''/> ";

echo "<br>";
echo "<div align=right>";
echo "<INPUT TYPE = 'Submit' Name = 'MarkSent' style='width:3em; height:2em; font-size:16px' VALUE = 'Mark Sent' />";
echo "</div>";

echo "</table>";
if (isset($_POST['docutype']))
{
    if ($_POST['docutype'] == 'Retainer')
    {
	echo "<table cellspacing='3px'  width='80%' align='center' border='0' bgcolor='#DADADA'>";
	echo "<tr>";
	echo "<td>";
	iframemake('mr_drawretainerpkt.php',$outuniqueid,'400px','retainersend','0');    
	echo "</td>";
	echo "</tr>";
	echo "</table>";	
    }
    else
    {
	if (isset($drawsomething))
	{
	    if($drawsomething == 'Yes')
	    {	
		echo "<table cellspacing='3px'  width='80%' align='center' border='0' bgcolor='#DADADA'>";
		echo "<tr>";
		echo "<td>";
		iframemake('mr_drawdocumentpacket.php',$outuniqueid,'400px','retainersend','0');    
		echo "</td>";
		echo "</tr>";
		echo "</table>";
	    }
	}	
    }
}

echo "<br><br>";
iframemake('seedocs.php',$outuniqueid,'710px','retainersend','0');
#http://sqlsrv.domain.initiativelegal.com/mars/mr_drawretainerpkt.php?uniqueid=98763R5ETULVD24SW
///->Start note journal//

$query = "SELECT notelog FROM Status WHERE uniqueid='$outuniqueid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){
		$notelog = $row['notelog']; if (empty($notelog)) unset($notelog);

	 }	

if (isset($notelog))
				{	
				
				#echo "<div id='main'>";
				echo "<table cellspacing='2px'  width='100%' align='left' border='0' bgcolor='#DADADA'>";
				echo "<h3>Log:</h3>";
                                echo "<tr style='font-family:Open Sans;font-size:10'>";
				echo "<td height='100%'>";
				echo "<br>";
				echo "<br>";
				echo "<font size='2'>.$notelog </font>";
				echo "</td >";
				echo "</tr >";
                                echo "</table>";
				#echo "</div>";
				}
				else
				{
				}

///->Stop note journal//

   }
   else
    {
        echo 'No uniqueid is set';
    }//require uniqueid be set, end
}//require initials be set, end
else
{
    echo 'No initials are set.';
}
?>

<?PHP
echo "<br>";
echo "<table class='tableWrapper' cellspacing='2' cellpadding='2' width='100%' align='center' >";
echo "<tr>";
echo "<td align='center'>";

$query = "select FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,OutgoingCost,Campaign,IncomingCost from Tbl_MailRoomOut order by num desc;";
$results = sqlsrv_query($conn,$query);

$qry2 = "select COUNT(*) as COUNT from Tbl_MailRoomOut where SentDate='$date';";
$results2 = sqlsrv_query($conn,$qry2);
    while($row2 = sqlsrv_fetch_array($results2))
    {
        $rowcount = $row2['COUNT']; 
    }
		echo "<table class='table' cellspacing='2' cellpadding='2' width='100%' align='center' >";
        echo "<tr>";
        echo "The time is now ".$time.". Total sent today: ".$rowcount;
        echo "<th><font size=1>Sent Time</font></th>";
        echo "<th><font size=1>First Name</font></th>";
        echo "<th><font size=1>Last Name</font></th>";
        #echo "<th><font size=1>Barcode</font></th>";
        echo "<th><font size=1>Unique ID</font></th>";
        //echo "<th><font size=1>Phone1</font></th>";
        //echo "<th><font size=1>Phone2</font></th>";
        //echo "<th><font size=1>Email</font></th>";
        //echo "<th><font size=1>Street 1</font></th>";
        //echo "<th><font size=1>Street 2</font></th>";
        //echo "<th><font size=1>City</font></th>";        
        //echo "<th><font size=1>State</font></th>";        
        //echo "<th><font size=1>Zipcode</font></th>";        
        echo "<th><font size=1>Sender</font></th>";
        echo "<th><font size=1>Cost</font></th>";
        echo "<th><font size=1>Document type</font></th>";
        echo "<th><font size=1>Campaign</font></th>";
        echo "</tr>";

    while($row = sqlsrv_fetch_array($results))
    {
        echo "<tr>";
        echo "<td><font size=2>".$row['SentDate']."  ".$row['SentTime']."</font></td>";        
        echo "<td><font size=2>" . $row['FirstName'] . "</font></td>";
        echo "<td><font size=2>" . $row['LastName'] . "</font></td>";
        #echo "<td><font size=2>" . $row['barcode'] . "</font></td>";
        echo "<td><font size=2>";
        echo '<a href="javascript: void(0)" onclick="popup(';
        echo "'http://sqlsrv.domain.initiativelegal.com/mars/client3.php?uniqueid=".$row['uniqueid']."')";
        echo '">';
        echo $row['uniqueid']."</a></td>";
        //echo "<td><font size=2>" . $row['phone1'] . "</font></td>";
        //echo "<td><font size=2>" . $row['phone2'] . "</font></td>";
        //echo "<td><font size=2>" . $row['email'] . "</font></td>";
        //echo "<td><font size=2>" . $row['Street1'] . "</font></td>";
        //echo "<td><font size=2>" . $row['Street2'] . "</font></td>";
        //echo "<td><font size=2>" . $row['City'] . "</font></td>";
        //echo "<td><font size=2>" . $row['State'] . "</font></td>";
        
        echo "<td><font size=2>" . $row['SendingInitials'] . "</font></td>";
        echo "<td><font size=2>" . $row['OutgoingCost'] . " + " . $row['IncomingCost'] . "</font></td>";
        echo "<td><font size=2>" . $row['DocumentType'] . "</font></td>";
        echo "<td><font size=2>" . $row['Campaign'] . "</font></td>";
        echo "</tr>";
      }
    echo "</div>";
    echo "</table>";  
echo "</td>";
echo "</tr>";
echo "</table>";
?>
</div>