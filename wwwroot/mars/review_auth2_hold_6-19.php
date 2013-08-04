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


//if (isset($authaccept2))
//{
//	echo "<body class='done'>";
//}
//else
//{
//}

echo "<h6>Review Authorization to Release </h6>";

if (isset($_POST['authreview2'])) 
{
	if ($_POST['authreview2'] == 'Accepted')
	{
		updaterow('authaccept2','Yes',$uniqueid,$conn);
		updaterow('authacceptdate2',$dateNOW,$uniqueid,$conn);
		updaterow('authacceptweek2',$weekNOW,$uniqueid,$conn);
		updaterow('authacceptmonth2',$monthNOW,$uniqueid,$conn);
	}
}

if (isset($_POST['authreview2'])) 
{
	if ($_POST['authreview2'] == 'Rejected')
	{
		updaterow('authformreceived2','',$uniqueid,$conn);
		updaterow('authformsent2','',$uniqueid,$conn);
		updaterow('authformreceiveddate2','',$uniqueid,$conn);
		updaterow('authaccept2','',$uniqueid,$conn);
		updaterow('authlastrejectdate2',$dateNOW,$uniqueid,$conn);
		updaterow('authacceptdate2','',$uniqueid,$conn);
	}
}

require("uniqueid_row.php");

if (isset($_POST['authreview2'])) 
{
	if ($_POST['authreview2'] == 'Rejected')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Rejected Authorization for Release</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		$rejectstring = $dateadd." @ ".$timeadd.": Rejected Authorization for Release<br>".$authrejectlog2;
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
		$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Authorization for Release - '.$uniqueid.'.pdf';
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
	
//		require("email_mailroom_auth.php");
//		echo "<div align='right'><br>Emailed to Mailroom -- OK</div>";
	}
	
	if ($_POST['authreview2'] == 'Accepted')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Accepted Authorization for Release</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
}


require("uniqueid_row.php");
echo "<div align='right'>";
$message = "Authorization for Release has not been received from ".$FirstName." ".$LastName." yet. Receive the Authorization for Release to enable Authorization reviewing.";
echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";

formstart("review_auth.php?uniqueid=".$uniqueid);
if (isset($authformsent2)) 
{
	if (isset($authformreceived2)) //if Authorization for Release has been received
	{
		echo "<body class='done'>";
		if ($authformreceived2 == 'Docusigned')//-open-if Authorization for Release has been docusigned(and received)
		{
			echo "<tr >";
			echo "<td >";
			echo "<div align='left'>";
			echo "Authorization for Release docusigned: ".$authformreceiveddate2.".";
			echo "</div>";
			echo "</td >";
		}//-close-if Authorization for Release has been docusigned(and received)
		if (isset($_POST['authreview2'])) 
		{
			if ($_POST['authreview2'] == 'Accepted')
			{
				echo "<td >";
				echo "Authorization for Release accepted: ".$authformacceptdate2."";
				echo "</td >";
			}
			if ($_POST['authreview2'] == 'Rejected')
			{
				echo "<td >";
				echo "Authorization for Release last rejected: ".$authlastrejectdate2."";
				echo "</td >";
			}
		}
		else
		{
			if (!isset($authaccept2))
			{
				if (isset($authlastrejectdate2))
				{
					echo "Authorization for Release last rejected: ".$authlastrejectdate2."";
				}
				echo "<td >";
					radiobuttonmake('authreview2','Accepted','Accept Authorization for Release');
				echo "</td >";
				echo "<td >";
					radiobuttonmake('authreview2','Rejected','Reject Authorization for Release');
				echo "</td >";
				echo "<td align='right'>";
					formend('Update');
				echo "</td>";
			}
			else
			{
				if (isset($authacceptdate2))
				{
					echo "<td >";
					echo "Authorization for Release accepted:&nbsp;&nbsp;".$authacceptdate2."";
					echo "</td >";
				}
			}
		}
	}//-close-if Authorization for Release has been received
	else//-open-if Authorization for Release has not been received
	{
		echo "<td >";
		echo "<div align='left'>";
		if (isset ($authlastrejectdate2))
		{
			echo "Authorization for Release last rejected: ".$authlastrejectdate2;
		}
		echo "<strong>".$message."</strong>";
		if (isset ($authrejectlog2))
		{
			echo "<br>".$authrejectlog2;
		}
		echo "</div>";
		echo "</td >";
	}//-close-if Authorization for Release has not been received
}
else
{
		echo "<td >";
		echo "<div class='flag'>";
		echo "Authorization for Release has not been received from ".$FirstName.' '.$LastName.' yet. Receive the Authorization for Release to enable Authorization reviewing.';
		echo "</div>";
		echo "</td >";
}
echo "</tr>";
echo "</table>";
echo "</div>";

?>
