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
if (isset($feewaiveraccept))
{
	echo "<body class='done'>";
}
else
{
}

echo "<h6>Review Fee Waiver </h6>";

if (isset($_POST['feewaiverreview'])) 
{
	if ($_POST['feewaiverreview'] == 'Accepted')
	{
		updaterow('feewaiveraccept','Yes',$uniqueid,$conn);
		updaterow('feewaiveracceptdate',$dateNOW,$uniqueid,$conn);
		updaterow('feewaiveracceptweek',$weekNOW,$uniqueid,$conn);
		updaterow('feewaiveracceptmonth',$monthNOW,$uniqueid,$conn);
	}
}

if (isset($_POST['feewaiverreview'])) 
{
	if ($_POST['feewaiverreview'] == 'Rejected')
	{
		updaterow('feewaiverreceived','',$uniqueid,$conn);
		updaterow('feewaiverreceiveddate','',$uniqueid,$conn);
		updaterow('feewaiveraccept','',$uniqueid,$conn);
		updaterow('feewaiverlastrejectdate',$dateNOW,$uniqueid,$conn);
		updaterow('feewaiveracceptdate','',$uniqueid,$conn);
	}
}
require("uniqueid_row.php");


if (isset($longformcompleteonline))
{
	if ($longformcompleteonline = 'Yes') $longformDONE = 'Yes';
}
if (isset($longformcompleteonphone))
{
	if ($longformcompleteonphone = 'Yes') $longformDONE = 'Yes';
}
require("uniqueid_row.php");

if (isset($_POST['feewaiverisrejected'])) 
{
	if ($_POST['feewaiverreview'] == 'Rejected')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Rejected Fee Waiver</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		$rejectstring = $dateadd." @ ".$timeadd.": Rejected Fee Waiver<br>".$feewaiverrejectlog2;
		$query = "UPDATE status set feewaiverrejectlog='$rejectstring' WHERE uniqueid='$uniqueid'";
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
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
	}
	
	
}
if ($_POST['feewaiverreview'] == 'Accepted')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Accepted Fee Waiver</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}

require("uniqueid_row.php");
echo "<div align='right'>";
$message = "Fee Waiver has not been received from ".$FirstName." ".$LastName." yet. Receive the Fee Waiver to enable reviewing.";
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
				if (isset($_POST['feewaiverreview'])) 
				{
					if ($_POST['feewaiverreview'] == 'Accepted')
					{
						echo "<td >";
						echo "Fee Waiver accepted: ".$feewaiveracceptdate."";
						echo "</td >";
					}
					if ($_POST['feewaiverreview'] == 'Rejected')
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
						radiobuttonmake('feewaiverreview','Accepted','Accept Fee Waiver');
						echo "</td >";
						echo "<td >";
						radiobuttonmake('feewaiverreview','Rejected','Reject Fee Waiver');
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
				if (isset ($feewaiverrejectlog))
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
				echo "Fee Waiver has not been received from ".$FirstName.' '.$LastName.' yet. Receive the Fee Waiver to enable Fee Waiver reviewing.';
				echo "</div>";
				echo "</td >";
			}
		}
		
	}
}
else if(!isset($feewaiverqualified))
{
//	if($feewaiverqualified != 'Yes')
//	{
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
//	}
}
else
{
}
echo "</tr>";
echo "</table>";
echo "</div>";

?>
