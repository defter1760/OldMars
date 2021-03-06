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

if (!isset($authaccept))
{//require Attorney-Client Agreement not already accepted -- wrap whole page
echo "<div align='right'>";

echo "<table cellspacing='3px' align='right' border='0'>";
formstart("mailroom_confirm_auth.php?uniqueid=".$uniqueid);
echo "<tr >";
	if (!isset($agentlname))
	{//open-if no agent set
	}//close-no agent set but Attorney-Client Agreement sent
	else
	{
		if (isset($_POST['emailretainer'])) 
		{//-open-if you clicked send email Attorney-Client Agreement and hit GO-show the box is selected
		if ($_POST['emailretainer'] == 'Yes')
			{
			}
		}//-close-if you clicked send email Attorney-Client Agreement and hit GO-show the box is selected
		else
		{//else show the box empty
		echo "<td >";
		checkboxmake('emailretainer','Yes','Mailed Auth packet','No');
		echo "</td >";
		}
		if (isset($_POST['snailretainer'])) 
		{//-open-if you clicked send snail Attorney-Client Agreement and hit GO-show the box is selected
			if ($_POST['snailretainer'] == 'Yes')
			{
			}
		}//-close-if you clicked send snail Attorney-Client Agreement and hit GO-show the box is selected
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
			echo "Done! &nbsp;&nbsp;&nbsp;";
			echo "</td>";
			
		}
		else
		{
			echo "<td>";
			echo "</td>";
		}
		if (isset($_POST['snailretainer'])) if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
		{
			$eventnote = 'Mailroom has sent Authorization  ('.$_POST['snailretainer'].')';
			logthisevent($eventnote,$conn,$notelog,$uniqueid);
			$query = "IF EXISTS (SELECT uniqueid from status WHERE uniqueid='$uniqueid') UPDATE status set authformsent='Yes',authsentviamail='Yes',authsentviamaildate='$date',authformsentdate='$date',authformsentmonth='$month',authformsentweek='$week',authtomailroom='' WHERE uniqueid='$uniqueid'";
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
else//if the Attorney-Client Agreement is already accepted
{
	echo "<div align='right'>";
	echo "<table cellspacing='3px' align='right' border='0'>";
	echo "<tr >";
	echo "<td>";
	echo "<font size='3'>Attorney-Client Agreement already accepted. Unable to re-send Attorney-Client Agreement if already accepted.</font>";
	echo "</td>";
	echo "</tr >";
	echo "</table>";
	
}
?>
