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
#echo "Inside Auth_review.php";

require("uniqueid_row.php");
#bgimg('./img/authreview.png');


if (isset($authaccept))
{
	echo "<body class='done'>";
	#bgimg('./img/authreview_grey.png');
}
else
{
	#bgimg('./img/authreview_white.png');
}
#echo "Inside Retainer_send.php";
echo "<h6>Review Authorizations</h6>";
if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Accepted')
	{
		updaterow('authaccept','Yes',$uniqueid,$conn);
		updaterow('authacceptdate',$dateNOW,$uniqueid,$conn);
		updaterow('authacceptweek',$weekNOW,$uniqueid,$conn);
		updaterow('authacceptmonth',$monthNOW,$uniqueid,$conn);
	}
}
if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Rejected')
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
if (isset($_POST['retainerreview'])) 
{
	if ($_POST['retainerreview'] == 'Rejected')
	{
	
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Rejected Authorization</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		
		$rejectstring = $dateadd." @ ".$timeadd.": Rejected Authorization<br>".$retainerrejectlog;
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
			$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Authorization - '.$uniqueid.'.pdf';
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
	
		require("email_mailroom_auth.php");
		echo "<div align='right'><br>Emailed to Mailroom -- OK</div>";
	}
	if ($_POST['retainerreview'] == 'Accepted')
	{
		$dateadd = date('Y').'-'.date('m').'-'.date('d');
		$timeadd = date('H').':'.date('i').':'.date('s');
		$notestring = $dateadd." @ ".$timeadd.": <strong>Accepted Authorization</strong><br>".$notelog;
		$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
}

#bgimg('./img/retainerreview.png');

#echo "Inside Retainer_send.php";
#echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This piece does not function as intended yet.";

require("uniqueid_row.php");
echo "<div align='right'>";
$message = "Authorization has not been received from ".$FirstName." ".$LastName." yet. Receive the authorization to enable authorization reviewing.";
echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";

formstart("review_auth.php?uniqueid=".$uniqueid);
if (isset($authformsent)) 
{
	if (isset($authformreceived)) //if Attorney-Client Agreement has been received
	{
		if ($authformreceived == 'Docusigned')//-open-if Attorney-Client Agreement has been docusigned(and received)
		{
			echo "<tr >";
			echo "<td >";
			echo "<div align='left'>";
			echo "Authorization was docusigned on ".$authformreceiveddate.".";
			echo "</div>";
			echo "</td >";
		}//-close-if Attorney-Client Agreement has been docusigned(and received)
		if (isset($_POST['retainerreview'])) 
		{
			if ($_POST['retainerreview'] == 'Accepted')
			{
				echo "<td >";
				echo "Authorization accepted: ".$authformacceptdate."";
				echo "</td >";
			}
			if ($_POST['retainerreview'] == 'Rejected')
			{
				echo "<td >";
				echo "Authorization was last rejected: ".$authlastrejectdate."";
				echo "</td >";
			}
		}
		else
		{
			if (!isset($authaccept))
			{
				if (isset($authlastrejectdate))
				{
					echo "Attorney-Client Agreement was last rejected: ".$authlastrejectdate."";
				}
				echo "<td >";
				radiobuttonmake('retainerreview','Accepted','Accept authorization');
				echo "</td >";
				echo "<td >";
				radiobuttonmake('retainerreview','Rejected','Reject authorization');
				echo "</td >";
				//echo "&nbsp;&nbsp;&nbsp;";
				//echo "</tr>";
//				echo "</tr>";
//				echo "<tr>";
//				echo "<td>";
//				echo "</td>";
				echo "<td align='right'>";
				formend('Update');
				echo "</td>";
			}
			else
			{
				echo "<td >";
				echo "Authorization accepted:&nbsp;&nbsp;".$authacceptdate."";
				echo "</td >";
			}
		}
	}//-close-if Attorney-Client Agreement has been received
	else//-open-if Attorney-Client Agreement has not been received
	{
		echo "<td >";
		echo "<div align='left'>";
		if (isset ($authlastrejectdate))
		{
			echo "Authorization was last rejected: ".$authlastrejectdate;
		}
		echo "<br><strong>".$message."</strong>";
		if (isset ($authrejectlog))
		{
			echo "<br>".$authrejectlog;
		}
		echo "</div>";
		echo "</td >";
	}//-close-if Attorney-Client Agreement has not been received
}
else
{
		echo "<td >";
		echo "<div align='left'>";
		echo "<strong>Authorization has not been received from ".$FirstName.' '.$LastName.' yet. Receive the authorization to enable authorization reviewing.</strong>';
		echo "</div>";
		echo "</td >";
}
echo "</tr>";
echo "</table>";
echo "</div>";

?>
