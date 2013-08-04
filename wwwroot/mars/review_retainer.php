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

if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Accepted')
	{
		updaterow('retaineraccept','Yes',$uniqueid,$conn);
		updaterow('retaineracceptdate',$dateNOW,$uniqueid,$conn);
		updaterow('retaineracceptweek',$weekNOW,$uniqueid,$conn);
		updaterow('retaineracceptdatemonth',$monthNOW,$uniqueid,$conn);
	}
}

if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Rejected')
	{
		updaterow('retainerRecieved','',$uniqueid,$conn);
		updaterow('retainerSent','',$uniqueid,$conn);
		updaterow('retainerRecievedDate','',$uniqueid,$conn);
		updaterow('retaineraccept','',$uniqueid,$conn);
		updaterow('retainerlastrejectdate',$dateNOW,$uniqueid,$conn);
		updaterow('retaineracceptdate','',$uniqueid,$conn);
	}
}

require("uniqueid_row.php");
if (isset($retaineraccept))
{
	echo "<body class='done'>";
}
else
{
	echo "<body class=''>";
}

echo "<h6>Review Attorney-Client Agreement</h6>";

if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Rejected')
	{
	
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Rejected Attorney-Client Agreement</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		$rejectstring = $dateadd." @ ".$timeadd.": Rejected Attorney-Client Agreement<br>".$retainerrejectlog;
		$query = "UPDATE status set retainerrejectlog='$rejectstring' WHERE uniqueid='$uniqueid'";
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
	//if ($agentlname == 'Martinez')
	//	{
	//	$RecipientName2 = "Marlene Martinez";
	//	$RecipientEmail2 = "mmartinez@initiativelegal.com";
	//	}
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
		
	if ($agentlname == 'Chang')
		{
		$RecipientName2 = "Mercy Chang";
		$RecipientEmail2 = "MChang@initiativelegal.com";
		}
	if ($agentlname == 'Grether')
		{
		$RecipientName2 = "Nicholas Grether";
		$RecipientEmail2 = "NGrether@initiativelegal.com";
		}
	if ($agentlname == 'Lee')
		{
		$RecipientName2 = "Michelle Lee";
		$RecipientEmail2 = "MLee@initiativelegal.com";
		}
	if ($agentlname == 'Trejo')
		{
		$RecipientName2 = "Jose Trejo";
		$RecipientEmail2 = "JTrejo@initiativelegal.com";
		}
	if ($agentlname == 'Zak')
		{
		$RecipientName2 = "Heather Zak";
		$RecipientEmail2 = "HZak@initiativelegal.com";
		}
	if ($agentlname == 'Savoy')
		{
		$RecipientName2 = "Grant Savoy";
		$RecipientEmail2 = "GSavoy@initiativelegal.com";
		}		
			
		$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Retainer - '.$uniqueid.'.pdf';
		$attachment2  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Retainer Cover Letter Rejected - '.$uniqueid.'.pdf';
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
		
//		require("email_mailroom_retainer.php");
//		echo "<div align='right'>Emailed to Mailroom -- OK";
	}
	
	if ($_POST['retainerreview'] == 'Accepted')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Accepted Attorney-Client Agreement</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
}

require("uniqueid_row.php");
echo "<div align='right'>";
$message = "Attorney-Client Agreement has not been received from ".$FirstName." ".$LastName." yet. Receive the Attorney-Client Agreement to enable reviewing.";
echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";

formstart("review_retainer.php?uniqueid=".$uniqueid);
if (isset($retainerSent)) 
{
	if (isset($retainerRecieved)) //if Attorney-Client Agreement has been received
	{
		if ($retainerRecieved == 'Docusigned')//-open-if Attorney-Client Agreement has been docusigned(and received)
		{
			echo "<tr >";
				echo "<td >";
					echo "<div align='left'>";
						echo "Attorney-Client Agreement docusigned: ".$retainerRecievedDate.".";
					echo "</div>";
				echo "</td >";
		}//-close-if Attorney-Client Agreement has been docusigned(and received)
		if (isset($_POST['retainerreview'])) 
		{
			if ($_POST['retainerreview'] == 'Accepted')
			{
				echo "<td >";
					echo "Attorney-Client Agreement accepted: ".$retaineracceptdate."";
				echo "</td >";
			}
			if ($_POST['retainerreview'] == 'Rejected')
			{
				echo "<td >";
					echo "Attorney-Client Agreement last rejected: ".$retainerlastrejectdate."";
				echo "</td >";
				echo "</tr>";
			}
		}
		else
		{
			if (!isset($retaineraccept))
			{
				if (isset($retainerlastrejectdate))
				{
					echo "<td >";
					echo "Attorney-Client Agreement last rejected: ".$retainerlastrejectdate."";
					echo "</td >";
					echo "</tr>";
				}
				echo "<td >";
					radiobuttonmake('retainerreview','Accepted','Accept Attorney-Client Agreement');
				echo "</td >";
				echo "<td >";
					radiobuttonmake('retainerreview','Rejected','Reject Attorney-Client Agreement');
				echo "</td >";
				echo "<td align='right'>";
					formend('Update');
				echo "</td>";
			}
			else
			{
				echo "<td >";
					echo "Attorney-Client Agreement accepted:&nbsp;&nbsp;".$retaineracceptdate."";
				echo "</td >";
			}
		}
	}//-close-if Attorney-Client Agreement has been received
	else//-open-if Attorney-Client Agreement has not been received
	{
		echo "<td >";
		echo "<div align='left'>";
		if (isset ($retainerlastrejectdate))
		{
			echo "Attorney-Client Agreement last rejected: ".$retainerlastrejectdate;
		}
		echo "<strong>".$message."</strong>";
		if (isset ($retainerrejectlog))
		{
			echo "".$retainerrejectlog;
		}
		echo "</div>";
		echo "</td >";
	}//-close-if Attorney-Client Agreement has not been received
}
else
{
	if (!isset($retaineraccept)) 
	{
		echo "<td >";
			echo "<div class='flag'>";
				echo "Attorney-Client Agreement has not been received from ".$FirstName.' '.$LastName.' yet. Receive the Attorney-Client Agreement to enable reviewing.';
			echo "</div>";
		echo "</td >";
	}
}
echo "</tr>";
echo "</table>";
echo "</div>";

?>
