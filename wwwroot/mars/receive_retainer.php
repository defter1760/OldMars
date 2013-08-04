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

if (!isset($DeclinedToSignRetainer))
{
	if (isset($retaineraccept))
	{
		echo "<body class='done'>";
		#bgimg('./img/retainerget_grey.png');
	}

	else
	{
		if (isset($retainerRecieved))
		{
			echo "<body class='grey'>";
			#bgimg('./img/retainerget_grey2.png');
		}
		else
		{
			#bgimg('./img/retainerget_white.png');
		}
	}
}
else
{
	echo "<body class='decline'>";
}

if (isset($DeclinedToSignRetainer))
{
	echo "<h6>Declined to Sign Attorney-Client Agreement  ".$DeclinedToSignRetainerDate."</h6>";
}
else
{
	echo "<h6>Receive Attorney-Client Agreement</h6>";
}

#echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This piece does not function as intended yet.";

if (isset($_POST['retainerget'])) if ($_POST['retainerget'] == 'Yes')
{
	updaterow('retainerRecieved','Yes',$uniqueid,$conn);
	updaterow('retainerRecievedDate',$dateNOW,$uniqueid,$conn);
	updaterow('retainerRecievedWeek',$weekNOW,$uniqueid,$conn);
	updaterow('retainerRecievedMonth',$monthNOW,$uniqueid,$conn);
	$eventnote = 'Attorney-Client Agreement manually received';
	logthisevent($eventnote,$conn,$notelog,$uniqueid);
}
require("uniqueid_row.php");

echo "<div align='left'>";
echo "<table class='clientProfileTable' cellpadding='2' cellspacing='2px' align='left' width='100%'>";
formstart("receive_retainer.php?uniqueid=".$uniqueid);
if (isset($retainerSent)) 
{
	if ($retainerRecieved == 'Docusigned')
	{
		echo "<tr >";
		echo "<td >";
		echo "<div align='left'>";
		echo "Attorney-Client Agreement was docusigned by ".$FirstName.' '.$LastName.' on '.$retainerRecievedDate.'.';
		echo "</div>";
		echo "</td >";
	}
	else
	{
		if (!isset($retainerRecieved))
		{
		$rento = "".$LastName.", ".$FirstName." - Attorney-Client Agreement Received - ".$dateNOW." - ".$uniqueid.".pdf";
		echo "</tr >";
		echo "<tr >";
		echo "<td>";
		echo 'Rename to: ';
		echo "<br>";
		echo "<INPUT TYPE = 'text' Name='brand' value='$rento' style='width:89%; height:25px'>";
		echo "</td>";
		echo "</tr >";
		echo "<tr >";
		echo "<td >";
		iframemake('upload_retainer.php',$uniqueid,'145px','retainersend','0');
		#require("upload_retainer.php");
		echo "</td >";
		echo "</tr >";
		echo "<tr >";
		echo "<td>";
		checkboxmake('retainerget','Yes','Receive Attorney-Client Agreement','No');
		echo "</td >";
		echo "</tr>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='left'>";
		formend('Update');
		echo "</td>";
		}
		else
		{
			echo "<td align='right'>";
			echo "Attorney-Client Agreement received:&nbsp;&nbsp;".$retainerRecievedDate."";
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
			echo "<strong>Attorney-Client Agreement has not been sent to ".$FirstName.' '.$LastName.' yet. Send the Attorney-Client Agreement to enable receiving.</strong>';
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
				echo "Attorney-Client Agreement received:&nbsp;&nbsp;".$retainerRecievedDate."";

				echo "</td >";
			}
		}
		echo "</tr>";
		echo "</table>";
		echo "</div>";
	}
}

?>
