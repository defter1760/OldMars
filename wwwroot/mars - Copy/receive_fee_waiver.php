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

if (isset($feewaiveraccept))
{
bgimg('./img/feewaiverget_grey.png');
}
else
{
	if (isset($feewaiverreceived))
	{
		bgimg('./img/feewaiverget_grey2.png');
	}
	else
	{
		bgimg('./img/feewaiverget_white.png');
	}
}
if (isset($_POST['retainerget'])) if ($_POST['retainerget'] == 'Yes')
{
	updaterow('feewaiverreceived','Yes',$uniqueid,$conn);
	updaterow('feewaiverreceiveddate',$dateNOW,$uniqueid,$conn);
	updaterow('feewaiverreceivedweek',$weekNOW,$uniqueid,$conn);
	updaterow('feewaiverreceivedmonth',$monthNOW,$uniqueid,$conn);
	$eventnote = 'Fee waiver manually received';
	logthisevent($eventnote,$conn,$notelog,$uniqueid);
}
require("uniqueid_row.php");
echo "<div align='right'>";
echo "<table cellspacing='3px' align='right' border='0'>";
formstart("receive_fee_waiver.php?uniqueid=".$uniqueid);
if (isset($feewaiversent)) 
{
	if ($feewaiverreceived == 'Docusigned')
	{
		echo "<tr >";
		echo "<td >";
		echo "<div align='left'>";
		echo "Fee waiver was docusigned by ".$FirstName.' '.$LastName.' on '.$feewaiverreceiveddate.'.';
		echo "</div>";
		echo "</td >";
	}
	else
	{
		if (!isset($feewaiverreceived))
		{
			echo "<td >";
			checkboxmake('retainerget','Yes','Receive Fee waiver','No');
			echo "</td >";
			echo "&nbsp;&nbsp;&nbsp;";
			echo "</tr>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "</td>";
			echo "<td>";
			formend('Update');
			echo "</td>";
		}
		else
		{
			echo "<td >";
			echo "<font size='3'>Fee waiver received:&nbsp;&nbsp;&nbsp;&nbsp;".$feewaiverreceiveddate."&nbsp;&nbsp;&nbsp;";
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
			echo "<br><br><strong>Fee waiver has not been sent to ".$FirstName.' '.$LastName.' yet. Send the Fee waiver to enable fee waiver receiving.&nbsp;&nbsp;&nbsp;</strong>';
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
