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

if (isset($longformcompleteonline))
{
	if ($longformcompleteonline = 'Yes') $longformDONE = 'Yes';
}
if (isset($longformcompleteonphone))
{
	if ($longformcompleteonphone = 'Yes') $longformDONE = 'Yes';
}

require("uniqueid_row.php");

if (isset($feewaiveraccept))
{
	echo "<body class='done'>";
}
else
{
}

echo "<h6>Review Fee Waiver</h6>";
if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Rejected')
	{
	
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Rejected Fee Waiver</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		$rejectstring = $dateadd." @ ".$timeadd.": Rejected Fee Waiver<br>".$retainerrejectlog;
		$query = "UPDATE status set authrejectlog='$rejectstring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
	if ($_POST['retainerreview'] == 'Accepted')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Accepted Fee Waiver</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
}


require("uniqueid_row.php");
echo "<div align='right'>";
$message = "Fee Waiver has not been received from ".$FirstName." ".$LastName." yet. Receive the fee waiver to enable fee waiver reviewing.";
echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";

formstart("review_fee_waiver.php?uniqueid=".$uniqueid);


if(isset($feewaiverqualified))
{
	if($feewaiverqualified == 'Yes')
	{
				
		if (isset($feewaiversent)) 
		{
			if (isset($feewaiverreceived)) //if Attorney-Client Agreement has been received
			{
				if ($feewaiverreceived == 'Docusigned')//-open-if Attorney-Client Agreement has been docusigned(and received)
				{
					echo "<tr >";
					echo "<td >";
					echo "<div align='left'>";
					echo "Fee Waiver was docusigned on ".$feewaiverreceiveddate.".";
					echo "</div>";
					echo "</td >";
				}//-close-if Attorney-Client Agreement has been docusigned(and received)
				if (isset($_POST['retainerreview'])) 
				{
					if ($_POST['retainerreview'] == 'Accepted')
					{
						echo "<td >";
						echo "Fee Waiver accepted: ".$feewaiveracceptdate."";
						echo "</td >";
					}
					if ($_POST['retainerreview'] == 'Rejected')
					{
						echo "<td >";
						echo "Fee Waiver was last rejected: ".$feewaiverlastrejectdate."";
						echo "</td >";
					}
				}
				else
				{
					if (!isset($feewaiveraccept))
					{
						if (isset($feewaiverlastrejectdate))
						{
							echo "Fee Waiver was last rejected: ".$feewaiverlastrejectdate."";
						}
						echo "<td >";
						radiobuttonmake('retainerreview','Accepted','Accept fee waiver');
						echo "</td >";
						echo "<td >";
						radiobuttonmake('retainerreview','Rejected','Reject fee waiver');
						echo "</td >";
						//echo "&nbsp;&nbsp;&nbsp;";
						//echo "</tr>";
						//echo "</tr>";
						//echo "<tr>";
						//echo "<td>";
						//echo "</td>";
						echo "<td align='right'>";
						formend('Update');
						echo "</td>";
					}
					else
					{
						echo "<td >";
						echo "Fee Waiver accepted:&nbsp;&nbsp;".$feewaiveracceptdate."";
						echo "</td >";
					}
				}
			}//-close-if Attorney-Client Agreement has been received
			else//-open-if Attorney-Client Agreement has not been received
			{
				echo "<td >";
				echo "<div align='left'>";
				if (isset ($feewaiverlastrejectdate))
				{
					echo "Fee Waiver was last rejected: ".$feewaiverlastrejectdate;
				}
				echo "<strong>".$message."</strong>";
				if (isset ($authrejectlog))
				{
					if (isset ($feewaiverrejectlog))
					{
						echo "<br>".$feewaiverrejectlog;
					}
				}
				echo "</div>";
				echo "</td >";
			}//-close-if Attorney-Client Agreement has not been received
		}
		else
		{
			if (isset($feewaiversent))
			{
				echo "<td >";
				echo "<div class='flag'>";
				echo "Fee Waiver has not been received from ".$FirstName.' '.$LastName.' yet. Receive the fee waiver to enable fee waiver reviewing.';
				echo "</div>";
				echo "</td >";
			}
		}
		
	}
}
else if($feewaiverqualified != 'Yes')
{
	if ($longformDONE = 'Yes')
	{
		echo "<tr><td>";
			echo "<div class='flag'>";
				echo "<h3>Does not qualify for Fee Waiver.</h3>";
				echo '<script type="text/javascript">';
				echo 'document.getElementById("Feewaiver").disabled="true";';
				echo '</script>';	
			echo "</div>";
		echo "</td>";		
	}
}
else
{
}
echo "</tr>";
echo "</table>";
echo "</div>";

?>
