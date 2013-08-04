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
	
        $query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname,brand,retainerSent,retainerRecieved,authformsent,authformreceived,feewaiversent,feewaiverreceived,authformreceived2,authformsent2 FROM Status WHERE
        uniqueid='$outuniqueid';";
	

	$results = sqlsrv_query($conn,$query);
	
	    while($row = sqlsrv_fetch_array($results))
    {
	$feewaiverrecieved = $row['feewaiverreceived'];
	$feewaiversent = $row['feewaiversent'];
	$authformreceived = $row['authformreceived'];
	$authformsent = $row['authformsent'];
	$authformreceived2 = $row['authformreceived2'];
	$authformsent2 = $row['authformsent2'];	
	$retainerRecieved = $row['retainerRecieved'];
	$retainerSent = $row['retainerSent'];
	
#	echo $feewaiverrecieved.'feewaiverrecieved<br>';
#	echo $feewaiversent.'feewaiversent<br>';
#	echo $authformreceived.'auth received<br>';
#	echo $authformsent.'auth sent<br>';
#	echo $retainerRecieved.'retainer received<br>';
#	echo $retainerSent.'retainersent<br>';
	
	
    }
            if (isset($_POST['docutype'])) $docutype = $_POST['docutype'];
            if (!isset($docutype)) $docutype = '';
            if (isset($_POST['arrivaldate'])) $arriavaldate = $_POST['arrivaldate'];
            if (isset($_POST['sasecost'])) $sasecost = $_POST['sasecost'];
            if (!isset($sasecost)) $sasecost = '';
	    
	    if (isset($_POST['MarkReceived']))
        {
        $query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname,brand FROM Status WHERE
        uniqueid='$outuniqueid';";
	$results = sqlsrv_query($conn,$query);

    while($row = sqlsrv_fetch_array($results))
    {
	$agentlname = $row['agentlname'];
        $thisFirstName = $row['FirstName'];
        $thisLastName = $row['LastName'];
        $thisbrand = $row['brand'];
        
    }	
	if ($_POST['mediatype'] == 'Retainer Packet')
	{
	    $mediatype = $_POST['mediatype'];
	    $query = "UPDATE status set retainerRecieved='Yes',retainerRecievedDate='$date',retainerRecievedWeek='$week',retainerRecievedMonth='$month' WHERE status.uniqueid='$outuniqueid'";
            $results = sqlsrv_query($conn,$query);
	    $query = "insert into Tbl_MailRoomIn
            (FirstName,LastName,uniqueid,ReceivedDate,ReceivedTime,DocumentType,ReceivingInitials,Campaign,ReceivedWeek,ReceivedMonth,ReceivedYear,ArrivedDate)
            VALUES
            ('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$mediatype','$mrinitials','$thisbrand','$week','$month','$year','$arriavaldate')";
            $results = sqlsrv_query($conn,$query);
	}
	if ($_POST['mediatype'] == 'Feewaiver Packet')
	{
	    $mediatype = $_POST['mediatype'];
	    $query = "UPDATE status set feewaiverreceived='Yes',feewaiverreceiveddate='$date',feewaiverreceivedweek='$week',feewaiverreceivedmonth='$month' WHERE status.uniqueid='$outuniqueid'";
            $results = sqlsrv_query($conn,$query);
	    $query = "insert into Tbl_MailRoomIn
            (FirstName,LastName,uniqueid,ReceivedDate,ReceivedTime,DocumentType,ReceivingInitials,Campaign,ReceivedWeek,ReceivedMonth,ReceivedYear,ArrivedDate)
            VALUES
            ('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$mediatype','$mrinitials','$thisbrand','$week','$month','$year','$arriavaldate')";
            $results = sqlsrv_query($conn,$query);
	}
	if ($_POST['mediatype'] == 'Authorization Packet')
	{
	    $mediatype = $_POST['mediatype'];
	    $query = "UPDATE status set authformreceived='Yes',authformreceiveddate='$date',authformreceivedweek='$week',authformreceivedmonth='$month' WHERE status.uniqueid='$outuniqueid'";
            $results = sqlsrv_query($conn,$query);
	    $query = "insert into Tbl_MailRoomIn
            (FirstName,LastName,uniqueid,ReceivedDate,ReceivedTime,DocumentType,ReceivingInitials,Campaign,ReceivedWeek,ReceivedMonth,ReceivedYear,ArrivedDate)
            VALUES
            ('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$mediatype','$mrinitials','$thisbrand','$week','$month','$year','$arriavaldate')";
            $results = sqlsrv_query($conn,$query);
	}
	if ($_POST['mediatype'] == 'Authorization Packet2')
	{
	    $mediatype = $_POST['mediatype'];
	    $query = "UPDATE status set authformreceived2='Yes',authformreceiveddate2='$date',authformreceivedweek2='$week',authformreceivedmonth2='$month' WHERE status.uniqueid='$outuniqueid'";
            $results = sqlsrv_query($conn,$query);
	    $query = "insert into Tbl_MailRoomIn
            (FirstName,LastName,uniqueid,ReceivedDate,ReceivedTime,DocumentType,ReceivingInitials,Campaign,ReceivedWeek,ReceivedMonth,ReceivedYear,ArrivedDate)
            VALUES
            ('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$mediatype','$mrinitials','$thisbrand','$week','$month','$year','$arriavaldate')";
            $results = sqlsrv_query($conn,$query);
	}	
	if ($_POST['mediatype'] == 'Client Documents')
	{
	    $mediatype = $_POST['mediatype'];
	    #$query = "UPDATE status set authformreceived='Yes',authformreceiveddate='$date',authformreceivedweek='$week',authformreceivedmonth='$month' WHERE status.uniqueid='$outuniqueid'";
            #$results = sqlsrv_query($conn,$query);
	    $query = "insert into Tbl_MailRoomIn
            (FirstName,LastName,uniqueid,ReceivedDate,ReceivedTime,DocumentType,ReceivingInitials,Campaign,ReceivedWeek,ReceivedMonth,ReceivedYear,ArrivedDate)
            VALUES
            ('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$mediatype','$mrinitials','$thisbrand','$week','$month','$year','$arriavaldate')";
            $results = sqlsrv_query($conn,$query);
	}            


            
            //$query = "insert into Tbl_MailRoomIn
            //(FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,OutgoingCost,Campaign,SentWeek,SentMonth,SentYear)
            //VALUES
            //('$thisFirstName','$thisLastName','$outuniqueid','$date','$time','$docutype','$mrinitials','$thisbrand','$sasecost','$week','$month','$year')";
            //$results = sqlsrv_query($conn,$query);
            
            $query = "select notelog as notelog from status where uniqueid='$outuniqueid';";
            $results = sqlsrv_query($conn,$query);
            
            $query = "SELECT notelog FROM Status WHERE uniqueid='$outuniqueid'";
            $results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results))
        {
		$notelog = $row['notelog']; if (empty($notelog)) unset($notelog);	
            }
	    
	    
            $newnote = '<strong>Received '.$_POST['mediatype'].' via MailRoom('.$mrinitials.')</strong>';
            $dateadd = date('Y').'-'.date('m').'-'.date('d');
            $timeadd = date('H').':'.date('i').':'.date('s');
            $notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;

            $query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$outuniqueid'";
            $results = sqlsrv_query($conn,$query);
	    
	    $query = "select * from tbl_attorneyassign where attorneylname='$agentlname';";
	    $results = sqlsrv_query($conn,$query);
        
	while($row = sqlsrv_fetch_array($results))
    {
	$attorneylname = $row['attorneylname'];
	$attorneyfname = $row['attorneyfname'];
	$attorneyemail = $row['attorneyemail'];
    }
	emailattorney($_POST['mediatype'],$attorneyemail,$attorneylname,$attorneyfname,$outuniqueid);

            #echo "This is a place holder for the email function";
            if (isset($outuniqueid)) unset($outuniqueid);
            if (isset($fetch)) unset($fetch);
            if (isset($mrinitials)) unset($mrinitials);
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

        
		
		
echo "<FORM NAME ='form2' METHOD ='POST' ACTION='mr_incoming.php'>";
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
echo "<input type='hidden' name='docutype' value='".$_REQUEST['docutype']."' />";
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
        $query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname,mailroomcostsofar,agentlname FROM Status WHERE
        uniqueid='$outuniqueid';";
	$results = sqlsrv_query($conn,$query);
        

    while($row = sqlsrv_fetch_array($results))
    {
	$agentlname = $row['agentlname'];
        $thisFirstName = $row['FirstName'];
        $thisLastName = $row['LastName'];
        $thismailroomcostsofar = $row['mailroomcostsofar'];
    }

echo "<FORM NAME ='form2' METHOD ='POST' ACTION='mr_incoming.php'>";
echo "<input type='hidden' name='docutype' value='".$_REQUEST['docutype']."' />";
echo "<input type='hidden' name='outuniqueid' value='".$outuniqueid."' />";
echo "<input type='hidden' name='initials' value='".$mrinitials."' />";
echo "<table border='0' width='100%'>";
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
echo "<INPUT TYPE = 'Radio' Name ='mediatype'  id='retainer' value='Retainer Packet'> Retainer Packet <br>";
echo "<INPUT TYPE = 'Radio' Name ='mediatype'  id='authorization' value='Authorization Packet'> Authorization Packet <br>";
echo "<INPUT TYPE = 'Radio' Name ='mediatype'  id='authorization2' value='Authorization Packet2'> Authorization Packet2 <br>";
echo "<INPUT TYPE = 'Radio' Name ='mediatype'  id='feewaiver' value='Feewaiver Packet'> Fee Waiver Packet <br>";
echo "<INPUT TYPE = 'Radio' Name ='mediatype'  id='clientdocs' value='Client documents'> Client documents <br>";


if (isset($retainerSent))
{
    if ($retainerSent != 'Yes')
    {
	echo "<script>";
	echo 'document.getElementById(\'retainer\').disabled="true";';
	echo "</script>";
    }
    else
    {
	if ($retainerSent == 'Yes')
	{
	    if (isset($retainerRecieved))
	    {
		if ($retainerRecieved == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'retainer\').disabled="true";';
		    echo "</script>";
		}
	    }
	}
    }
}
else
{
    echo "<script>";
    echo 'document.getElementById(\'retainer\').disabled="true";';
    echo "</script>";
}

if (isset($authformsent))
{
    if ($authformsent != 'Yes')
    {
	echo "<script>";
	echo 'document.getElementById(\'authorization\').disabled="true";';
	echo "</script>";
    }
    else
    {
	if ($authformsent == 'Yes')
	{
	    if (isset($authformreceived))
	    {
		if ($authformreceived == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'authorization\').disabled="true";';
		    echo "</script>";
		}
	    }
	}
    }
}
else
{
    echo "<script>";
    echo 'document.getElementById(\'authorization\').disabled="true";';
    echo "</script>";
}

if (isset($authformsent2))
{
    if ($authformsent2 != 'Yes')
    {
	echo "<script>";
	echo 'document.getElementById(\'authorization2\').disabled="true";';
	echo "</script>";
    }
    else
    {
	if ($authformsent2 == 'Yes')
	{
	    if (isset($authformreceived2))
	    {
		if ($authformreceived2 == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'authorization2\').disabled="true";';
		    echo "</script>";
		}
	    }
	}
    }
}
else
{
    echo "<script>";
    echo 'document.getElementById(\'authorization2\').disabled="true";';
    echo "</script>";
}

if (isset($feewaiversent))
{
    if ($feewaiversent != 'Yes')
    {
	echo "<script>";
	echo 'document.getElementById(\'feewaiver\').disabled="true";';
	echo "</script>";
    }
    else
    {
	if ($feewaiversent == 'Yes')
	{
	    if (isset($feewaiverrecieved))
	    {
		if ($feewaiverrecieved == 'Yes')
		{
		    echo "<script>";
		    echo 'document.getElementById(\'feewaiver\').disabled="true";';
		    echo "</script>";
		}
	    }
	}
    }

}
else
{
    echo "<script>";
    echo 'document.getElementById(\'feewaiver\').disabled="true";';
    echo "</script>";
}
//            echo "<script>";
//            echo 'document.getElementById(\'authorization\').disabled="true";';
//            echo 'document.getElementById(\'feewaiver\').disabled="true";';
//            echo 'document.getElementById(\'clientdocs\').disabled="true";';
//
//    }
//    
//}
	$today = mktime(0, 0, 0, date("m"), date("d"), date("y"));
	$today= date("m-d-y", $today);
#	echo "Today is ".$today;
	
	$tomorrow = mktime(0, 0, 0, date("m"), date("d")-1, date("y"));
	$tomorrow= date("m-d-y", $tomorrow);
#	echo " Tomorrow is ".$tomorrow;
	
	$tomorrow1 = mktime(0, 0, 0, date("m"), date("d")-2, date("y"));
	$tomorrow1 = date("m-d-y", $tomorrow1);
#	echo " Tomorrow is ".$tomorrow1;
	
	$tomorrow2 = mktime(0, 0, 0, date("m"), date("d")-3, date("y"));
	$tomorrow2 = date("m-d-y", $tomorrow2);
#	echo " Tomorrow is ".$tomorrow2;
	
	$tomorrow3 = mktime(0, 0, 0, date("m"), date("d")-4, date("y"));
	$tomorrow3 = date("m-d-y", $tomorrow3);
#	echo " Tomorrow is ".$tomorrow3;
	
	$tomorrow4 = mktime(0, 0, 0, date("m"), date("d")-5, date("y"));
	$tomorrow4 = date("m-d-y", $tomorrow4);
#	echo " Tomorrow is ".$tomorrow4;
	
	$tomorrow5 = mktime(0, 0, 0, date("m"), date("d")-6, date("y"));
	$tomorrow5 = date("m-d-y", $tomorrow5);
#	echo " Tomorrow is ".$tomorrow5;
	
	$tomorrow6 = mktime(0, 0, 0, date("m"), date("d")-7, date("y"));
	$tomorrow6 = date("m-d-y", $tomorrow6);
#	echo " Tomorrow is ".$tomorrow6;
    
echo "<td  width = '200px' valign='top'>";
    echo "Today is ".$today;
    echo "<br>";
    echo "Arrival Date &nbsp;";
    echo '<select name="arrivaldate">';

	echo '<option name="arrivaldate" value="'.$today.'">'.$today.'</option>';
	echo '<option name="arrivaldate" value="'.$tomorrow.'">'.$tomorrow.' </option>';
	echo '<option name="arrivaldate" value="'.$tomorrow1.'">'.$tomorrow1.'</option>';
	echo '<option name="arrivaldate" value="'.$tomorrow2.'">'.$tomorrow2.'</option>';
	echo '<option name="arrivaldate" value="'.$tomorrow3.'">'.$tomorrow3.'</option>';
	echo '<option name="arrivaldate" value="'.$tomorrow4.'">'.$tomorrow4.'</option>';
	echo '<option name="arrivaldate" value="'.$tomorrow5.'">'.$tomorrow5.'</option>';
	echo '<option name="arrivaldate" value="'.$tomorrow6.'">'.$tomorrow6.'</option>';
#    echo "<INPUT TYPE = 'text' Name ='arrivaldate'  value=''/> ";
#    echo "<br>SASE Postage <br>";
#    echo "<INPUT TYPE = 'text' Name ='sasecost'  value=''/> ";

echo "<div align='left'>";
echo "<br>";
echo "<INPUT TYPE = 'Submit' Name = 'MarkReceived' style='margin: 10px; display: block;' VALUE = 'Mark Received' />";
echo "</div>";

echo "</table>";
//if (isset($_POST['docutype']))
//{
//    //if ($_POST['docutype'] == 'Retainer')
//    //{
//    //    echo "<table cellspacing='3px'  width='80%' align='center' border='0' bgcolor='#DADADA'>";
//    //    echo "<tr>";
//    //    echo "<td>";
//    //    iframemake('mr_drawretainerpkt.php',$outuniqueid,'400px','retainersend','0');    
//    //    echo "</td>";
//    //    echo "</tr>";
//    //    echo "</table>";
//    //}
//}
echo "<br><br>";
echo "Retainer name:<br>";
echo "<input size='150' value='Retainer_Returned_".$date."_".$thisLastName.", ".$thisFirstName." - ".$outuniqueid.".pdf'>";
echo "<br><br>";
echo "Authorization for settlement name:<br>";
echo "<input size='150' value='AuthForSettlement_Returned_".$date."_".$thisLastName.", ".$thisFirstName." - ".$outuniqueid.".pdf'>";
echo "<br><br>";
echo "Authorization for release name:<br>";
echo "<input size='150' value='AuthForRelease_Returned_".$date."_".$thisLastName.", ".$thisFirstName." - ".$outuniqueid.".pdf'>";
echo "<br><br>";
echo "Fee Waiver name:<br>";
echo "<input size='150' value='FeeWaiver_Returned_".$date."_".$thisLastName.", ".$thisFirstName." - ".$outuniqueid.".pdf'>";
echo "<br><br>";
iframemake('seedocs.php',$outuniqueid,'750px','retainersend','0');
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
				echo "<table cellspacing='2' cellpadding='2'  width='100%' align='left' border='0'>";
                echo "<tr style='font-family:Open Sans;font-size:10'>";
				echo "<td height='100%'>";
				echo "<h3>Log:</h3>";
				echo "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td bgcolor='#DADADA'>";
				echo "<font size='2'>$notelog </font>";
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
//echo "<br><br><br><br>";
echo "<table class='tableWrapper' cellspacing='2' cellpadding='2' width='100%' align='center' >";
echo "<tr>";
echo "<td align='center'>";

$query = "select FirstName,LastName,uniqueid,ReceivedDate,ReceivedTime,DocumentType,ReceivingInitials,Campaign from Tbl_MailRoomIn where ReceivedDate='$date' order by ReceivedTime desc;";
$results = sqlsrv_query($conn,$query);

$qry2 = "select COUNT(*) as COUNT from Tbl_MailRoomIn where ReceivedDate='$date';";
$results2 = sqlsrv_query($conn,$qry2);
    while($row2 = sqlsrv_fetch_array($results2))
    {
        $rowcount = $row2['COUNT']; 
    }
		echo "<table class='table' cellspacing='2' cellpadding='2' width='100%' align='center' >";
        echo "<tr>";
        echo "The time is now ".$time.". Total recieved today: ".$rowcount;
        echo "<th>Received Time</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        #echo "<th>Barcode</th>";
        echo "<th>Unique ID</th>";
        //echo "<th>Phone1</th>";
        //echo "<th>Phone2</th>";
        //echo "<th>Email</th>";
        //echo "<th>Street 1</th>";
        //echo "<th>Street 2</th>";
        //echo "<th>City</th>";        
        //echo "<th>State</th>";        
        //echo "<th>Zipcode</th>";        
        echo "<th>Sender</th>";
#        echo "<th>Cost</th>";
        echo "<th>Document type</th>";
        echo "<th>Campaign</th>";
        echo "</tr>";

    while($row = sqlsrv_fetch_array($results))
    {
        echo "<tr>";
        echo "<td><font size=2>" . $row['ReceivedTime'] . "</td>";        
        echo "<td><font size=2>" . $row['FirstName'] . "</td>";
        echo "<td><font size=2>" . $row['LastName'] . "</td>";
        #echo "<td><font size=2>" . $row['barcode'] . "</td>";
        echo "<td><font size=2>";
        echo '<a href="javascript: void(0)" onclick="popup(';
        echo "'http://sqlsrv.domain.initiativelegal.com/mars/client3.php?uniqueid=".$row['uniqueid']."')";
        echo '">';
        echo $row['uniqueid']."</a></td>";
        //echo "<td><font size=2>" . $row['phone1'] . "</td>";
        //echo "<td><font size=2>" . $row['phone2'] . "</td>";
        //echo "<td><font size=2>" . $row['email'] . "</td>";
        //echo "<td><font size=2>" . $row['Street1'] . "</td>";
        //echo "<td><font size=2>" . $row['Street2'] . "</td>";
        //echo "<td><font size=2>" . $row['City'] . "</td>";
        //echo "<td><font size=2>" . $row['State'] . "</td>";
        
        echo "<td><font size=2>" . $row['ReceivingInitials'] . "</td>";
        #echo "<td><font size=2>" . $row['OutgoingCost'] . " + " . $row['IncomingCost'] . "</td>";
        echo "<td><font size=2>" . $row['DocumentType'] . "</td>";
        echo "<td><font size=2>" . $row['Campaign'] . "</td>";
        echo "</tr>";
      }
    echo "</div>";
    echo "</table>";  
echo "</td>";
echo "</tr>";
echo "</table>";
?>
</div>