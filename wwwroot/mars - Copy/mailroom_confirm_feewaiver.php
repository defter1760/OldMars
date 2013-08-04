<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
?>
<?PHP
#echo "Inside Retainer_send.php";
#bgimg('./img/sendretainer.png');
bgimg('./img/mailroom_confirm_white.png');

require("uniqueid_row.php");

if (!isset($feewaiveraccept))
{//require retainer not already accepted -- wrap whole page
echo "<div align='right'>";

echo "<table cellspacing='3px' align='right' border='0'>";
formstart("mailroom_confirm_feewaiver.php?uniqueid=".$uniqueid);
echo "<tr >";
	if (!isset($agentlname))
	{//open-if no agent set
	}//close-no agent set but retainer sent
	else
	{
		if (isset($_POST['emailretainer'])) 
		{//-open-if you clicked send email retainer and hit GO-show the box is selected
		if ($_POST['emailretainer'] == 'Yes')
			{
			}
		}//-close-if you clicked send email retainer and hit GO-show the box is selected
		else
		{//else show the box empty
		echo "<td >";
		checkboxmake('emailretainer','Yes','Mailed fee waiver packet','No');
		echo "</td >";
		}
		if (isset($_POST['snailretainer'])) 
		{//-open-if you clicked send snail retainer and hit GO-show the box is selected
			if ($_POST['snailretainer'] == 'Yes')
			{
			}
		}//-close-if you clicked send snail retainer and hit GO-show the box is selected
		else
		{//else show the box empty
			echo "<td >";
			textfieldmake('Initials','','15','snailretainer');
			echo "</td >";
		}
		echo "&nbsp;&nbsp;&nbsp;";

		if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
		{
			echo "<td>";
			echo "Done &nbsp;&nbsp;&nbsp;";
			echo "</td>";
			
		}
		else
		{
			echo "<td>";
			echo "</td>";
		}
		if (isset($_POST['snailretainer'])) if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
		{
			$eventnote = 'Mailroom has sent Fee waiver  ('.$_POST['snailretainer'].')';
			logthisevent($eventnote,$conn,$notelog,$uniqueid);
			$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set feewaiversent='Yes',feewaiversentviamail='Yes',feewaiversentviamaildate='$date',feewaiversentmonth='$month',feewaiversentweek='$week',feewaivertomailroom='' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";

			$results = sqlsrv_query($conn,$query);
		}
		if (!isset($_POST['snailretainer'])) if (!isset($_POST['emailretainer']))
		{
		echo "<td>";
		echo "</td>";
		echo "<td>";
		echo "</td>";	
		}
		if (!isset($_POST['emailretainer']))
		{
		echo "<td align='right'>";
		formend('Confirm');
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		}
	}
}
else//if the retainer is already accepted
{
	echo "<div align='right'>";
	echo "<table cellspacing='3px' align='right' border='0'>";
	echo "<tr >";
	echo "<td>";
	echo "<font size='3'>Retainer already accepted. Unable to re-send retainer if already accepted.</font>";
	echo "</td>";
	echo "</tr >";
	echo "</table>";
	
}
?>
