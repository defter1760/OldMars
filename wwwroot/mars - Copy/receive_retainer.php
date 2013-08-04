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
#echo "Inside Retainer_send.php";

require("uniqueid_row.php");
#bgimg('./img/retainerget.png');
if (isset($retaineraccept))
{
bgimg('./img/retainerget_grey.png');
}
else
{
	if (isset($retainerRecieved))
	{
		bgimg('./img/retainerget_grey2.png');
	}
	else
	{
		bgimg('./img/retainerget_white.png');
	}
}
#echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This piece does not function as intended yet.";

if (isset($_POST['retainerget'])) if ($_POST['retainerget'] == 'Yes')
{
	updaterow('retainerRecieved','Yes',$uniqueid,$conn);
	updaterow('retainerRecievedDate',$dateNOW,$uniqueid,$conn);
	updaterow('retainerRecievedWeek',$weekNOW,$uniqueid,$conn);
	updaterow('retainerRecievedMonth',$monthNOW,$uniqueid,$conn);
	$eventnote = 'Retainer manually received';
	logthisevent($eventnote,$conn,$notelog,$uniqueid);
}
require("uniqueid_row.php");

echo "<div align='right'>";
echo "<table cellspacing='3px' align='right' width='100%' border='0'>";
formstart("receive_retainer.php?uniqueid=".$uniqueid);
if (isset($retainerSent)) 
{
	if ($retainerRecieved == 'Docusigned')
	{
		echo "<tr >";
		echo "<td >";
		echo "<div align='right'>";
		echo "Retainer was docusigned by ".$FirstName.' '.$LastName.' on '.$retainerRecievedDate.'.';
		echo "</div>";
		echo "</td >";
	}
	else
	{
		if (!isset($retainerRecieved))
		{
		$rento = "".$LastName.", ".$FirstName." - Retainer Received - ".$dateNOW." - ".$uniqueid.".pdf";
		echo "<br><br>";
		echo "<div align=left>";
		echo '&nbsp&nbsp&nbspRename to: ';
		echo "<br>";
		echo "&nbsp&nbsp&nbsp<INPUT TYPE = 'text' Name='brand' value='$rento' style='width:89%; height:25px'>";
		echo "</div>";
		echo "<td >";
		iframemake('upload_retainer.php',$uniqueid,'145px','retainersend','0');
		#require("upload_retainer.php");
		echo "</td >";
		echo "<td width='30'>";
		checkboxmake('retainerget','Yes','Receive Retainer','No');
		echo "</td >";
		echo "&nbsp;&nbsp;&nbsp;";
		echo "<td>";
		echo "</td>";
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
			echo "<td align='right'>";
			echo "<font size='3'>Retainer received:&nbsp;&nbsp;&nbsp;&nbsp;".$retainerRecievedDate."&nbsp;&nbsp;&nbsp;";
			echo "</td >";
		}
	}
}
else
{
	if (!isset($retainerSent)) 
	{
		if ($retainerRecieved !== 'Docusigned')
		{
			echo "<td >";
			echo "<div align='left'>";
			echo '<meta http-equiv="refresh" content="1">';
			echo "<strong>Retainer has not been sent to ".$FirstName.' '.$LastName.' yet. Send the retainer to enable retainer receiving.&nbsp;&nbsp;&nbsp;</strong>';
			echo "</div>";
			echo "</td >";
		}
	}
	else
	{
		if (isset($_POST['retainerget'])) 
		{
			if ($_POST['retainerget'] == 'Yes')
			{
				echo "<td >";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;Retainer received:&nbsp;&nbsp;&nbsp;&nbsp;".$retainerRecievedDate."&nbsp;&nbsp;&nbsp;";

				echo "</td >";
			}
		}
		echo "</tr>";
		echo "</table>";
		echo "</div>";
	}
}

?>
