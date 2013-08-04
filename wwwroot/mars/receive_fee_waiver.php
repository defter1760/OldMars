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
#echo "Inside Fee_waiver_get.php";


require("uniqueid_row.php");

if (!isset($DeclinedToSignFeeWaiver))
{
	if (isset($feewaiveraccept))
	{
		echo "<body class='done'>";
	}

	else
	{
		if (isset($feewaiverreceived))
		{
			echo "<body class='grey'>";
		}
		else
		{
		}
	}
}
else
{
	echo "<body class='decline'>";
}

if (isset($DeclinedToSignFeeWaiver))
{
	echo "<h6>Declined to Sign Fee Waiver  ".$DeclinedToSignFeeWaiverDate."</h6>";
}
else
{
	echo "<h6>Receive Fee Waiver</h6>";
}


if (isset($_POST['retainerget'])) if ($_POST['retainerget'] == 'Yes')
{
	updaterow('feewaiverreceived','Yes',$uniqueid,$conn);
	updaterow('feewaiverreceiveddate',$dateNOW,$uniqueid,$conn);
	updaterow('feewaiverreceivedweek',$weekNOW,$uniqueid,$conn);
	updaterow('feewaiverreceivedmonth',$monthNOW,$uniqueid,$conn);
	$eventnote = 'Fee Waiver manually received';
	logthisevent($eventnote,$conn,$notelog,$uniqueid);
}
require("uniqueid_row.php");
echo "<div align='right'>";
echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";
formstart("receive_fee_waiver.php?uniqueid=".$uniqueid);
if (isset($feewaiversent)) 
{
	if ($feewaiverreceived == 'Docusigned')
	{
		echo "<tr >";
		echo "<td >";
		echo "<div align='right'>";
		echo "Fee Waiver was docusigned by ".$FirstName.' '.$LastName.' on '.$feewaiverreceiveddate.'.';
		echo "</div>";
		echo "</td >";
	}
	else
	{
		if (!isset($feewaiverreceived))
		{
			echo "<td >";
			checkboxmake('retainerget','Yes','Receive Fee Waiver','No');
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
			echo "Fee Waiver received:&nbsp;&nbsp;".$feewaiverreceiveddate."";
			echo "</td >";
		}
	}
}
else
{
	if (!isset($feewaiversent)) 
	{
		if ($feewaiverreceived !== 'Docusigned')
		{
			echo "<td >";
			echo "<div align='left'>";
			//echo "<br><br>";
			echo "<strong>Fee Waiver has not been sent to ".$FirstName.' '.$LastName.' yet. Send the Fee Waiver to enable Fee Waiver receiving.</strong>';
			echo "</div>";
			echo "</td >";
		}
	}
	else
	{
		echo "</tr>";
		echo "</table>";
		echo "</div>";
	}
}

?>
