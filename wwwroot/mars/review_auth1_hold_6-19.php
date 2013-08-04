<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
?>
<?PHP

bgcolorinner();

require("uniqueid_row.php");


if (isset($authaccept))
{
	echo "<body class='done'>";
}
else
{
}

echo "<h6>Review Authorization for Settlement</h6>";

if (isset($_POST['authreview'])) 
{
	if ($_POST['authreview'] == 'Accepted')
	{
		updaterow('authaccept','Yes',$uniqueid,$conn);
		updaterow('authacceptdate',$dateNOW,$uniqueid,$conn);
		updaterow('authacceptweek',$weekNOW,$uniqueid,$conn);
		updaterow('authacceptmonth',$monthNOW,$uniqueid,$conn);
	}
}

if (isset($_POST['authreview'])) 
{
	if ($_POST['authreview'] == 'Rejected')
	{
		updaterow('authformreceived','',$uniqueid,$conn);
		updaterow('authformsent','',$uniqueid,$conn);
		updaterow('authformreceiveddate','',$uniqueid,$conn);
		updaterow('authaccept','',$uniqueid,$conn);
		updaterow('authlastrejectdate',$dateNOW,$uniqueid,$conn);
		updaterow('authacceptdate','',$uniqueid,$conn);
	}
}

require("uniqueid_row.php");

if (isset($_POST['authreview'])) 
{
	if ($_POST['authreview'] == 'Rejected')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Rejected Authorization for Settlement</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		$rejectstring = $dateadd." @ ".$timeadd.": Rejected Authorization for Settlement<br>".$authrejectlog;
		$query = "UPDATE status set authrejectlog='$rejectstring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		require("uniqueid_row.php");
		
		if ($agentlname == 'Hutchings')
			{
			$RecipientName2 = "Ian Hutchings";
			$RecipientEmail2 = "ihutchings@initiativelegal.com";
			}
		if ($agentlname == 'Levy')
			{
			$RecipientName2 = "Sam Levy";
			$RecipientEmail2 = "slevy@initiativelegal.com";
			}
		if ($agentlname == 'Milford')
			{
			$RecipientName2 = "Peter Milford";
			$RecipientEmail2 = "pmilford@preferredlegalsupport.com";
			}
		if ($agentlname == 'Yonan')
			{
			$RecipientName2 = "Steven Yonan";
			$RecipientEmail2 = "syonan@initiativelegal.com";
			}
		if ($agentlname == 'Moore')
			{
			$RecipientName2 = "Amanda Moore";
			$RecipientEmail2 = "amoore@initiativelegal.com";
			}
		if ($agentlname == 'Alvarado')
			{
			$RecipientName2 = "Jaquelyn Alvarado";
			$RecipientEmail2 = "jalvarado@initiativelegal.com";
			}						
		if ($agentlname == 'Pinney')
			{
			$RecipientName2 = "Tiffany Pinney";
			$RecipientEmail2 = "tpinney@initiativelegal.com";
			}				
		if ($agentlname == 'Valero')
			{
			$RecipientName2 = "Joshua Valero";
			$RecipientEmail2 = "jvalero@initiativelegal.com";
			}
		if ($agentlname == 'Larsen')
			{
			$RecipientName2 = "Neil Larsen";
			$RecipientEmail2 = "nlarsen@initiativelegal.com";
			}
		if ($agentlname == 'Eshghieh')
			{
			$RecipientName2 = "Tina Eshghieh";
			$RecipientEmail2 = "teshghieh@initiativelegal.com";
			}
		if ($agentlname == 'Cox')
			{
			$RecipientName2 = "Heather Cox";
			$RecipientEmail2 = "hcox@initiativelegal.com";
			}
		if ($agentlname == 'Kelly')
			{
			$RecipientName2 = "Perris Kelly";
			$RecipientEmail2 = "PKelly@initiativelegal.com";
			}
		if ($agentlname == 'Bonas')
			{
			$RecipientName2 = "Kerry Bonas";
			$RecipientEmail2 = "KBonas@initiativelegal.com";
			}		
		$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Authorization for Settlement - '.$uniqueid.'.pdf';
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
	
//		require("email_mailroom_auth.php");
//		echo "<div align='right'><br>Emailed to Mailroom -- OK</div>";
	}
	
	if ($_POST['authreview'] == 'Accepted')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Accepted Authorization for Settlement</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
}


require("uniqueid_row.php");
echo "<div align='right'>";
$message = "Authorization for Settlement has not been received from ".$FirstName." ".$LastName." yet. Receive the Authorization for Settlement to enable Authorization reviewing.";
echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";

formstart("review_auth.php?uniqueid=".$uniqueid);
if (isset($authformsent)) 
{
	if (isset($authformreceived)) //if Authorization for Settlement has been received
	{
		if ($authformreceived == 'Docusigned')//-open-if Authorization for Settlement has been docusigned(and received)
		{
			echo "<tr >";
			echo "<td >";
			echo "<div align='left'>";
			echo "Authorization for Settlement docusigned: ".$authformreceiveddate.".";
			echo "</div>";
			echo "</td >";
		}//-close-if Authorization for Settlement has been docusigned(and received)
		if (isset($_POST['authreview'])) 
		{
			if ($_POST['authreview'] == 'Accepted')
			{
				echo "<td >";
				echo "Authorization for Settlement accepted: ".$authformacceptdate."";
				echo "</td >";
			}
			if ($_POST['authreview'] == 'Rejected')
			{
				echo "<td >";
				echo "Authorization for Settlement last rejected: ".$authlastrejectdate."";
				echo "</td >";
			}
		}
		else
		{
			if (!isset($authaccept))
			{
				if (isset($authlastrejectdate))
				{
					echo "Authorization for Settlement last rejected: ".$authlastrejectdate."";
				}
				echo "<td >";
					radiobuttonmake('authreview','Accepted','Accept Authorization for Settlement');
				echo "</td >";
				echo "<td >";
					radiobuttonmake('authreview','Rejected','Reject Authorization for Settlement');
				echo "</td >";
				echo "<td align='right'>";
					formend('Update');
				echo "</td>";
			}
			else
			{
				echo "<td >";
				echo "Authorization for Settlement accepted:&nbsp;&nbsp;".$authacceptdate."";
				echo "</td >";
			}
		}
	}//-close-if Authorization for Settlement has been received
	else//-open-if Authorization for Settlement has not been received
	{
		echo "<td >";
		echo "<div align='left'>";
		if (isset ($authlastrejectdate))
		{
			echo "Authorization for Settlement last rejected: ".$authlastrejectdate;
		}
		echo "<strong>".$message."</strong>";
		if (isset ($authrejectlog))
		{
			echo "<br>".$authrejectlog;
		}
		echo "</div>";
		echo "</td >";
	}//-close-if Authorization for Settlement has not been received
}
else
{
		echo "<td >";
		echo "<div class='flag'>";
		echo "Authorization for Settlement has not been received from ".$FirstName.' '.$LastName.' yet. Receive the Authorization for Settlement to enable Authorization reviewing.';
		echo "</div>";
		echo "</td >";
}
echo "</tr>";
echo "</table>";
echo "</div>";

?>
