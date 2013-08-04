<?PHP
#require("style.php");//docutype, css
require("header.php");
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
#require("functions.php");//functions
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<?PHP
function reportRow($description,$query,$evenOrOdd,$caseattorney){
$serverName = "localhost\SPICE";
	$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );	
	$qry = "SELECT uniqueid FROM status ";
		if($query <> ""){
		$qry .= "where ".$query;
		}
		 	$results = sqlsrv_query($conn,$qry);
			while($row = sqlsrv_fetch_array($results))
			{
				$dnccount = $row['COUNT']; 
			}
	if ($evenOrOdd=="odd") {
	  $bgcolor = "#DADADA";
	}
	else {
	   $bgcolor = "#FFFFFF";
	}
	if ($query == ""){
		$value="TBD";
	}
	else{ 
	    $value=	$dnccount;
	}
?>
<tr style="<?PHP echo 'background-color:' .$bgcolor; ?>">
 	<td>
    <form action="report.php" method="post" >
    <div align="left"></div>
    <input type="hidden" name="query" value="<?PHP echo "where ".$query; ?>"/>
    <input type="hidden" name="caseattorney" value="<?PHP echo $caseattorney; ?>"/>
    <?PHP echo $description;?>
    </td><td>
    <input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; 
	<?PHP echo " background-color: ".$bgcolor; ?>" value="<?PHP  echo $value; ?>"/>
    </form>
    </td>
</tr>
<?PHP } ?>

<?PHP
Function agingReportRow($description,$query,$caseattorney,$event = 'null',$bg = 'null')
{
    //echo "<br>";
    $date = date('Y').'-'.date('m').'-'.date('d');
    $today = date_create($date);
    $serverName = "localhost\SPICE";
    $connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );
    if ($event == 'null')
    {
	$qry = "SELECT uniqueid FROM status ";
    }
    else
    {
	$qry = "SELECT uniqueid,".$event." FROM status ";
    }
    $qry .= "where ".$query;
    $results = sqlsrv_query($conn,$qry);
    $green = '0';
    $yellow = '0';
    $red = '0';
    $blue = '0';
    $one = '1';
    $greenid = array();
    $yellowid = array();
    $redid = array();
    $blueid = array();
    
    while($row = sqlsrv_fetch_array($results))
    {
        //echo $row['uniqueid'].'<br>';
        //echo $row[$event].'<br>';
	if ($event !== 'null')
	{
		$evntd = $row[$event];
	$eventdate = date_create($evntd); 
        $interval = date_diff($eventdate, $today);
	$waff =  $interval->format('%R%a');
	        switch ($waff)
        {
            case ($waff <= 6):
                $color = 'green';
                $green = $green+1;
                $greenid[] = $row['uniqueid'];
                break;
            case ($waff >=7 && $waff <= 10):
                $color = 'yellow';
                $yellow = $yellow+1;
                $yellowid[] = $row['uniqueid'];
                break;
            case ($waff >= 11):
                $color = 'red';
                $red = $red+1;
                $redid[] = $row['uniqueid'];
                break;
		
		
        }
	$blue = $green+$red+$yellow;
	}
	else
	{
		$blue = $blue+1;
		

	}
        
        $blueid[] = $row['uniqueid'];

    }
    
        foreach (array_values($blueid) as $vals)
            {
                if (empty($listblue))
                {
                    $listblue = "uniqueid='".$vals."'";
                }
                else
                {
                    $listblue = $listblue." or uniqueid='".$vals."'";
                }
            }
        
    if ($red > 0)
    {
        foreach (array_values($redid) as $vals)
    {
        if (empty($listred))
        {
            $listred = "uniqueid='".$vals."'";
        }
        else
        {
            $listred = $listred." or uniqueid='".$vals."'";
        }
    }
    $query = $listred;
    
    echo '<tr >';
    echo '<td class="red">';
    echo '<form action="report.php" method="post" target="search">';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo '<input type="Submit" ';
    echo 'PRIORITY'.$description;
    echo '  value="PRIORITY '.$description.'"/>';
    echo '</td>';
    echo '<td class="red">';
    echo '<input type="Submit" ';
    echo '  value="'.$red.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    }
    if ($yellow > 0)
    {
    foreach (array_values($yellowid) as $vals)
    {
        if (empty($listyellow))
        {
            $listyellow = "uniqueid='".$vals."'";
        }
        else
        {
            $listyellow = $listyellow." or uniqueid='".$vals."'";
        }
    }
    
    $query = $listyellow;
    
    
    echo '<tr >';
    echo '<td class="yellow">';
    echo '<form action="report.php" method="post" target="search">';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo '<input type="Submit" ';
    echo '  value="'.$description.'"/>';
	echo '</td>';
    echo '<td class="yellow">';
    echo '<input type="Submit" ';
    echo ' value="'.$yellow.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    }

        if ($green > 0)
    {
        foreach (array_values($greenid) as $vals)
    {
        if (empty($listgreen))
        {
            $listgreen = "uniqueid='".$vals."'";
        }
        else
        {
            $listgreen = $listgreen." or uniqueid='".$vals."'";
        }
    }
    
    $query = $listgreen;
    
    echo '<tr >';
    echo '<td class="green">';
    echo '<form action="report.php" method="post" target="search">';    
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo '<input type="Submit" ';
    echo '  value="'.$description.'"/>';
    echo '</td>';
    echo '<td class="green">';
    echo '<input type="Submit"  ';
    echo ' value="'.$green.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    }
	
	if (empty($listblue)) $listblue = '';
    $query = $listblue;
    echo '<tr style="background-color:white">';
	if (isset($bg))
	{
		if ($bg != 'null')
		{
			echo '<td class="'.$bg.'">';
		}
		else
		{
			echo '<td>';
		}
	}
    else 
	{
		echo '<td>';
		}
    echo '<form action="report.php" method="post" target="search">';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    if ($event == 'null')
    {
	echo '<input type="Submit" ';
	echo '  value="'.$description.'"/>';
    }
    else
    {
	echo '<input type="Submit" ';
    echo '  value="'.$description.' Total"/>';

    }
    
    echo '</td>';
    	if (isset($bg))
	{
		if ($bg != 'null')
		{
			echo '<td class="'.$bg.'">';
		}
		else
		{
			echo '<td>';
		}
	}
    else 
	{
		echo '<td>';
		}
    echo '<input type="Submit"  ';
    echo ' value="'.$blue.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    //echo "<br>";
//echo "<tr><td>&nbsp</td><td>&nbsp</td></tr>";
}

Function callbackrow($description,$query,$caseattorney,$event)
{
    //echo "<br>";
    $date = date('Y').'-'.date('m').'-'.date('d');
    $today = date_create($date);
    $serverName = "localhost\SPICE";
    $connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );
    if ($event == 'null')
    {
	$qry = "SELECT uniqueid FROM status ";
    }
    else
    {
	$qry = "SELECT uniqueid,".$event." FROM Tbl_CallBack ";
    }
    $qry .= "where ".$query;
    $results = sqlsrv_query($conn,$qry);
    $green = '0';
    $yellow = '0';
    $red = '0';
    $blue = '0';
    $one = '1';
    $greenid = array();
    $yellowid = array();
    $redid = array();
    $blueid = array();
    
    while($row = sqlsrv_fetch_array($results))
    {
        //echo $row['uniqueid'].'<br>';
        //echo $row[$event].'<br>';
	if ($event !== 'null')
	{
		$evntd = $row[$event];
	$eventdate = date_create($evntd); 
        $interval = date_diff($eventdate, $today);
	$waff =  $interval->format('%R%a');
	        switch ($waff)
        {
            case ($waff <= 6):
                $color = 'green';
                $green = $green+1;
                $greenid[] = $row['uniqueid'];
                break;
            case ($waff >=7 && $waff <= 10):
                $color = 'yellow';
                $yellow = $yellow+1;
                $yellowid[] = $row['uniqueid'];
                break;
            case ($waff >= 11):
                $color = 'red';
                $red = $red+1;
                $redid[] = $row['uniqueid'];
                break;
		
		
        }
	$blue = $green+$red+$yellow;
	}
	else
	{
		$blue = $blue+1;
	}
        
        $blueid[] = $row['uniqueid'];

    }
    
        foreach (array_values($blueid) as $vals)
            {
                if (empty($listblue))
                {
                    $listblue = "uniqueid='".$vals."'";
                }
                else
                {
                    $listblue = $listblue." or uniqueid='".$vals."'";
                }
            }
        
    if ($red > 0)
    {
        foreach (array_values($redid) as $vals)
    {
        if (empty($listred))
        {
            $listred = "uniqueid='".$vals."'";
        }
        else
        {
            $listred = $listred." or uniqueid='".$vals."'";
        }
    }
    $query = $listred;
    
    echo '<tr >';
    echo '<td class="red">';
    echo '<form action="report.php" method="post" target="search">';
    echo '<input type="hidden" name="calllog" value="calllog" />';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo '<input type="Submit" ';
    echo 'PRIORITY'.$description;
    echo '  value="PRIORITY '.$description.'"/>';
    echo '</td>';
    echo '<td>';
    echo '<input type="Submit" ';
    echo '  value="'.$red.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    }
    if ($yellow > 0)
    {
    foreach (array_values($yellowid) as $vals)
    {
        if (empty($listyellow))
        {
            $listyellow = "uniqueid='".$vals."'";
        }
        else
        {
            $listyellow = $listyellow." or uniqueid='".$vals."'";
        }
    }
    
    $query = $listyellow;
    
    
    echo '<tr >';
    echo '<td class="yellow">';
    echo '<form action="report.php" method="post" target="search">';
    echo '<input type="hidden" name="calllog" value="calllog" />';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo '<input type="Submit" ';
    echo '  value="'.$description.'"/>';
	echo '</td>';
    echo '<td>';
    echo '<input type="Submit" ';
    echo ' value="'.$yellow.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    }

        if ($green > 0)
    {
        foreach (array_values($greenid) as $vals)
    {
        if (empty($listgreen))
        {
            $listgreen = "uniqueid='".$vals."'";
        }
        else
        {
            $listgreen = $listgreen." or uniqueid='".$vals."'";
        }
    }
    
    $query = $listgreen;
    
    echo '<tr >';
    echo '<td class="green">';
    echo '<form action="report.php" method="post" target="search">';
    echo '<input type="hidden" name="calllog" value="calllog" />';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo '<input type="Submit" ';
    echo '  value="'.$description.'"/>';
    echo '</td>';
    echo '<td>';
    echo '<input type="Submit"  ';
    echo ' value="'.$green.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    }
	
	if (empty($listblue)) $listblue = '';
    $query = $listblue;
    echo '<tr style="background-color:white">';
    echo "<td>";
    echo '<form action="report.php" method="post" target="search">';
    echo '<input type="hidden" name="calllog" value="calllog" />';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    if ($event == 'null')
    {
	echo '<input type="Submit" ';
	echo '  value="'.$description.'"/>';
    }
    else
    {
	echo '<input type="Submit" ';
    echo '  value="'.$description.' Total"/>';

    }
    
    echo '</td>';
    echo '<td>';
    echo '<input type="Submit"  ';
    echo ' value="'.$blue.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    //echo "<br>";
//echo "<tr><td>&nbsp</td><td>&nbsp</td></tr>";
}

?>
<?PHP

//if (isset($_POST['caseattorney']))
//{
//reportRow("Attorney-Client Agreement sent via mail and not returned","retainerSent='Yes' and retainerRecieved!='Yes'",'Odd',$_POST['caseattorney']); 
//}

//echo "<br><br>";

echo "<FORM NAME ='form2' METHOD ='POST' ACTION='caseattorneyview.php'>";
echo "<div  id='caseAttorneySearch'>";
echo "Input case attorney last name:&nbsp;&nbsp;<input type='text' name='caseattorney' value='";
if (isset($_POST['caseattorney']))
{
    if (!empty($_POST['caseattorney']))
    {
        $caseattorney = $_POST['caseattorney'];
        echo $caseattorney;
    }
}
else
{
if (isset($_GET['caseattorney']))
{
    if (!empty($_GET['caseattorney']))
    {
        $caseattorney = $_GET['caseattorney'];
        echo $caseattorney;
    }
}
}
echo "'/>";

echo "&nbsp;&nbsp;<INPUT TYPE = 'Submit' Name = 'fetch' class='button' style='width:60px; height:25px; font-size:16px' VALUE = 'Fetch' />";
echo "</form>";
echo "</div>";
if (isset($caseattorney))
{
//
//PROSPECTS
//
echo "<table id='caseAttorneyTable' class='tableWrapper' cellpadding='2' cellspacing='2' width='100%' valign=top>";
	echo "<tr>";
		echo "<td width='50%' valign='top'>";
			echo "<h2>Prospects</h2>";
			
			echo "<table width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='titleRow top'><td><h3>Attorney-Client Agreements</h3></td><td width='40px'>&nbsp</td></tr>";
			echo "</table>";
			
			echo "<table class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='subtitleRow'><td><h4>These are prospective clients who have been mailed a Attorney-Client Agreement and it has not been returned to us with a signature</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Attorney-Client Agreement sent not returned',"retainerSent='Yes' and retainerRecieved!='Yes' and  agentlname='$caseattorney' or retainerSent='Yes' and retainerRecieved is null and agentlname='$caseattorney'",$caseattorney,'retainerSentDate','null');
					
				echo "<tr class='subtitleRow'><td><h4>These are Attorney-Client Agreements which have been received via mail and have not been reviewed and approved by the Case Attorney</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Attorney-Client Agreements received and needs approval',"retainerSent='Yes' and retainerRecieved='Yes' and  retainerAccepted!='Yes' and  agentlname='$caseattorney' or retainerSent='Yes' and retainerRecieved='Yes' and retainerAccepted is null and  agentlname='$caseattorney'",$caseattorney,'null','null');

				echo "<tr class='subtitleRow'><td><h4>These are Attorney-Client Agreements which the client has declined to sign</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Declined to Sign Attorney-Client Agreement',"DeclinedToSignRetainerDate!='' and agentlname='$caseattorney' or DeclinedToSignRetainerDate is not null and agentlname='$caseattorney'",$caseattorney,'null','declineBg');	
			echo "</table>";
		echo "</td>";
//
//CLIENTS
//
		echo "<td width='50%' valign='top'>";
			echo "<h2>Clients</h2>";
			
			echo "<table width=25% cellpadding='2' cellspacing='2' valign='top' style='float: right; margin-top: -35px;'>";
					agingReportRow('Total Clients',"agentlname='$caseattorney' and retaineracceptdate is not null",$caseattorney,'null','declineBg');
			echo "</table>";
			
			echo "<table width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='titleRow top'><td><h3>Long Form</h3></td><td width='40px'>&nbsp</td></tr>";
			echo "</table>";
			
			echo "<table class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='subtitleRow'><td><h4>These are clients who have not completed the long form over the phone or online</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Long form not complete',"onlinecompleteday is null and agentlname='$caseattorney' and retaineracceptdate is not null or longformcompleteonphonedate is null and agentlname='$caseattorney' and retaineracceptdate is not null",$caseattorney,'retaineracceptdate','null');

				echo "<tr class='subtitleRow'><td><h4>These are clients who completed the long form over the phone but were not sent Authorization forms</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Long Form completed but Authorizations not sent ',"onlinecompleteday!='' and agentlname='$caseattorney' and retaineracceptdate is not null and authformsentdate is null and authformreceiveddate is null or longformcompleteonphonedate!='' and agentlname='$caseattorney' and retaineracceptdate is not null and authformsentdate is null and authformreceiveddate is null or longformcompleteonphonedate is not null and agentlname='$caseattorney' and retaineracceptdate is not null and authformsentdate is null and authformreceiveddate is null or onlinecompleteday is not null and agentlname='$caseattorney' and retaineracceptdate is not null and authformsentdate is null and authformreceiveddate is null",$caseattorney,'retaineracceptdate','null');
			echo "</table>";
			
			echo "<table width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='titleRow'><td><h3>Authorization</h3></td><td>&nbsp</td></tr>";
			echo "</table>";
			echo "<table class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='subtitleRow'><td><h4>These are clients who were sent an Authorization by mail or email and it has not been returned</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Authorization sent but not received ',"agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived is null and authaccept is null and authformsentdate is not null or agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived!='' and authaccept is null and authformsentdate is not null",$caseattorney,'authformsentdate','null');
					
				echo "<tr class='subtitleRow'><td><h4>These are clients whose Authorization has been received and has not been reviewed and approved by the Case Attorney</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Authorization received and not approved',"agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived is not null and authaccept is null and authformsentdate is not null",$caseattorney,'null');
					
//				echo "<tr class='subtitleRow'><td><h4>These are authorizations which the client has declined to sign</h4></td><td>&nbsp</td></tr>";
				echo "<tr class='subtitleRow'><td><h4>These are clients who have declined to sign the Authorization</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Declined to Sign Authorization',"DeclinedToSignAuthorizationDate!='' and agentlname='$caseattorney' or DeclinedToSignAuthorizationDate is not null and agentlname='$caseattorney'",$caseattorney,'null','declineBg');	
			echo "</table>";
			
			echo "<table width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='titleRow'><td><h3>Fee Waivers</h3></td><td>&nbsp</td></tr>";
			echo "</table>";
			echo "<table class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr class='subtitleRow'><td><h4>These are clients who qualify for a Fee Waiver but have not been sent one</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Fee Waivers not sent',"feewaiversent is null and feewaiverqualified = 'Yes' and agentlname = '$caseattorney' or feewaiversent = '' and feewaiverqualified = 'Yes' and agentlname = '$caseattorney'",$caseattorney,'feewaiversentdate','null');
						 
				echo "<tr class='subtitleRow'><td><h4>These are clients who were sent a Fee Waiver by mail or email and it has not been returned</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Fee Waivers sent and not received',"agentlname='$caseattorney' and retaineracceptdate is not null and feewaiverreceived is null and feewaiveraccept is null and feewaiversentdate is not null or agentlname='$caseattorney' and retaineracceptdate is not null and feewaiverreceived!='' and feewaiveraccept is null and feewaiversentdate is not null",$caseattorney,'retaineracceptdate','null');
					agingReportRow('Fee Waiver received and not approved',"agentlname='$caseattorney' and retaineracceptdate is not null and feewaiverreceived is not null and feewaiveraccept is null",$caseattorney,'null');
				echo "<tr class='subtitleRow'><td><h4>These are Fee Waivers which the client has declined to sign</h4></td><td>&nbsp</td></tr>";
					agingReportRow('Declined to Sign Fee Waiver',"DeclinedToSignFeeWaiverDate!='' and agentlname='$caseattorney' or DeclinedToSignFeeWaiverDate is not null and agentlname='$caseattorney'",$caseattorney,'null','declineBg');	
			echo "</table>";
//			echo "<table class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
//				echo "<tr class='subtitleRow'><td><h4>These are clients who qualify for a Fee Waiver but have not been sent one</h4></td><td>&nbsp</td></tr>";
//					agingReportRow('Fee Waivers not sent --this doesnt work yet--',"agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived is null and authaccept is null and authformsentdate is not null or agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived!='' and authaccept is null and authformsentdate is not null",$caseattorney,'authformsentdate','null');
//				echo "<tr class='subtitleRow'><td><h4>These are clients who were sent a Fee Waiver by mail or email and it has not been returned</h4></td><td>&nbsp</td></tr>";
//					agingReportRow('Fee Waivers sent and not received',"agentlname='$caseattorney' and retaineracceptdate is not null and feewaiverreceived is null and feewaiveraccept is null and feewaiversentdate is not null or agentlname='$caseattorney' and retaineracceptdate is not null and feewaiverreceived!='' and feewaiveraccept is null and feewaiversentdate is not null",$caseattorney,'feewaiversentdate','null');
//					agingReportRow('Fee Waiver received and not approved',"agentlname='$caseattorney' and retaineracceptdate is not null and feewaiverreceived is not null and feewaiveraccept is null",$caseattorney,'null');
//				echo "<tr class='subtitleRow'><td><h4>These are Fee Waivers which the client has declined to sign</h4></td><td>&nbsp</td></tr>";
//					agingReportRow('Declined to Sign Fee Waiver',"DeclinedToSignFeeWaiverDate!='' and agentlname='$caseattorney' or DeclinedToSignFeeWaiverDate is not null and agentlname='$caseattorney'",$caseattorney,'null','declineBg');	
//			echo "</table>";
		echo "</td>";
	echo "</tr>";
echo "</table>";

echo "<table width='920px'>";
	echo "<tr class='titleRow top'>";
		echo "<td><h3>Call Backs</h3></td><td width='40px'>&nbsp</td>";
	echo "</tr>";
		echo "<td>";
			echo "<table id='caseAttorneyTable' class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
				echo "<tr>";
					echo "<td style='border: none !important;'";
					echo "</td>";
					echo "<td style='border: none !important;' width='55px'>";
					echo "</td>";
				echo "</tr>";
						callbackrow('Promises to keep',"agentlname='$caseattorney' and promisekept is null",$caseattorney,'datepromised');
				echo "</tr>";
				echo "<tr>";
					echo "<td style='border: none !important;'";
					echo "</td>";
					echo "<td style='border: none !important;' width='55px'>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
		echo "</td>";
		
//		echo "<td width='50%' valign='top'>";
//			echo "<table width=100% cellpadding='2' cellspacing='2' valign='top'>";
//				echo "<tr class='titleRow top'>";
//					echo "<td valign='top'>";
//					echo "<h3>Prospects</h3>";
//					echo "</td><td>&nbsp</td>";
//				echo "</tr>";
//			echo "</table>";
//			echo "<table class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
//			callbackrow('Promises to keep',"agentlname='$caseattorney' and promisekept is null",$caseattorney,'datepromised');
//			#agingReportRow('Fee Waivers not sent --this doesnt work yet--',"agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived is null and authaccept is null and authformsentdate is not null or agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived!='' and authaccept is null and authformsentdate is not null",$caseattorney,'authformsentdate');
//			echo "</table>";
//		echo "</td>";
		
//		echo "<td width='50%' valign='top'>";
//			echo "<table width=100% cellpadding='2' cellspacing='2' align='left' valign='top'>";
//				echo "<tr class='titleRow top'>";
//					echo "<td valign='top'>";
//					echo "<h3>Clients</h3>";
//					echo "</td><td>&nbsp</td>";
//				echo "</tr>";
//			echo "</table>";
//			echo "<table class='table' width=100% cellpadding='2' cellspacing='2' valign='top'>";
//			callbackrow('Promises to keep',"agentlname='$caseattorney' and promisekept is null ",$caseattorney,'datepromised');
//			#agingReportRow('Fee Waivers not sent --this doesnt work yet--',"agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived is null and authaccept is null and authformsentdate is not null or agentlname='$caseattorney' and retaineracceptdate is not null and authformreceived!='' and authaccept is null and authformsentdate is not null",$caseattorney,'authformsentdate');
//			echo "</table>";
//		echo "</td>";
	echo "</tr>";
echo "</table>";
}

?>
<?PHP
//this code was added and typed manually by ian hutchings at 11:29 from Melaina's computer in KOMODO IDE
//echo "Hello World";

?>
<?PHP
if (empty($_REQUEST['brand'])) $_REQUEST['brand'] = '';
if (empty($_REQUEST['ani'])) $_REQUEST['ani'] = '';
$page = "search.php?brand=".$_REQUEST['brand']."&ani=".$_REQUEST['ani'];
$border = "0";
$name = "search";
$height = "800px";

echo "<iframe name='";
echo $name;
echo "' scrolling='auto' width='100%' height='";
echo $height;
echo "' frameborder='".$border."' src='";
echo $page;
echo "'></iframe>";
?>