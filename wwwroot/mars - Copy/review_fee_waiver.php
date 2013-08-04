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
		updaterow('feewaiveraccept','Yes',$uniqueid,$conn);
		updaterow('feewaiveracceptdate',$dateNOW,$uniqueid,$conn);
		updaterow('feewaiveracceptweek',$weekNOW,$uniqueid,$conn);
		updaterow('feewaiveracceptmonth',$monthNOW,$uniqueid,$conn);
	}
}
if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Rejected')
	{
		updaterow('feewaiverreceived','',$uniqueid,$conn);
		updaterow('feewaiverreceiveddate','',$uniqueid,$conn);
		updaterow('feewaiveraccept','',$uniqueid,$conn);
		updaterow('feewaiverlastrejectdate',$dateNOW,$uniqueid,$conn);
		updaterow('feewaiveracceptdate','',$uniqueid,$conn);
	}
}
require("uniqueid_row.php");

if (isset($feewaiveraccept))
{
bgimg('./img/feewaiverreview_grey.png');
}
else
{
bgimg('./img/feewaiverreview_white.png');
}

if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Rejected')
	{
	
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Rejected Fee waiver</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		$rejectstring = $dateadd." @ ".$timeadd.": Rejected Fee waiver<br>".$retainerrejectlog;
		$query = "UPDATE status set authrejectlog='$rejectstring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		require("uniqueid_row.php");
		if ($agentlname == 'Hutchings')
		{
			$RecipientName2 = "Ian Hutchings";
			$RecipientEmail2 = "ihutchings@preferredlegalsupport.com";
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
			$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Feewaiver - '.$uniqueid.'.pdf';
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
		
		require("email_mailroom_feewaiver.php");
		echo "<br><div align='right'>Emailed to Mailroom -- OK&nbsp;&nbsp;&nbsp;</div>";
	}
	if ($_POST['retainerreview'] == 'Accepted')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Accepted Fee waiver</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
}

#bgimg('./img/retainerreview.png');

#echo "Inside Retainer_send.php";
#echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This piece does not function as intended yet.";

require("uniqueid_row.php");
echo "<div align='right'>";
$message = "Fee waiver has not been received from ".$FirstName." ".$LastName." yet. Receive the fee waiver to enable fee waiver reviewing.";
echo "<table cellspacing='3px' align='right' border='0'>";

formstart("review_fee_waiver.php?uniqueid=".$uniqueid);
if (isset($feewaiversent)) 
{
	if (isset($feewaiverreceived)) //if retainer has been received
	{
		if ($feewaiverreceived == 'Docusigned')//-open-if retainer has been docusigned(and received)
		{
			echo "<tr >";
			echo "<td >";
			echo "<div align='left'>";
			echo "Fee waiver was docusigned on ".$feewaiverreceiveddate.".";
			echo "</div>";
			echo "</td >";
		}//-close-if retainer has been docusigned(and received)
		if (isset($_POST['retainerreview'])) 
		{
			if ($_POST['retainerreview'] == 'Accepted')
			{
				echo "<td >";
				echo "<font size='3'>Fee waiver accepted: ".$feewaiveracceptdate."</font>";
				echo "</td >";
			}
			if ($_POST['retainerreview'] == 'Rejected')
			{
				echo "<td >";
				echo "Fee waiver was last rejected: ".$feewaiverlastrejectdate."";
				echo "</td >";
			}
		}
		else
		{
			if (!isset($feewaiveraccept))
			{
				if (isset($feewaiverlastrejectdate))
				{
					echo "Fee waiver was last rejected: ".$feewaiverlastrejectdate."&nbsp;&nbsp;&nbsp;";
				}
				echo "<td >";
				radiobuttonmake('retainerreview','Accepted','Accept fee waiver');
				echo "</td >";
				echo "<td >";
				radiobuttonmake('retainerreview','Rejected','Reject fee waiver');
				echo "</td >";
				echo "&nbsp;&nbsp;&nbsp;";
				echo "</tr>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>";
				echo "</td>";
				echo "<td align='right'>";
				formend('Update');
				echo "</td>";
			}
			else
			{
				echo "<td >";
				echo "<font size='3'>Fee waiver accepted:&nbsp;&nbsp;&nbsp;&nbsp;".$feewaiveracceptdate."</font>&nbsp;&nbsp;&nbsp;";
				echo "</td >";
			}
		}
	}//-close-if retainer has been received
	else//-open-if retainer has not been received
	{
		echo "<td >";
		echo "<div align='left'>";
		if (isset ($feewaiverlastrejectdate))
		{
			echo "Fee waiver was last rejected: ".$feewaiverlastrejectdate;
		}
		echo "<br><strong>".$message."</strong>";
		if (isset ($authrejectlog))
		{
			echo "<br>".$feewaiverrejectlog;
		}
		echo "</div>";
		echo "</td >";
	}//-close-if retainer has not been received
}
else
{
		echo "<td >";
		echo "<div align='left'>";
		echo "<br><br><strong>Fee waiver has not been received from ".$FirstName.' '.$LastName.' yet. Receive the fee waiver to enable fee waiver reviewing.</strong>&nbsp;&nbsp;&nbsp;';
		echo "</div>";
		echo "</td >";
}
echo "</tr>";
echo "</table>";
echo "</div>";

?>
