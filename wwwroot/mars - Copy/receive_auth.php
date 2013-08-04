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


if (isset($authaccept))
{
bgimg('./img/authget_grey.png');
}
else
{
	if (isset($authformreceived))
	{
		bgimg('./img/authget_grey2.png');
	}
	else
	{
		bgimg('./img/authget_white.png');
	}
}
if (isset($_POST['retainerget'])) if ($_POST['retainerget'] == 'Yes')
{
	updaterow('authformreceived','Yes',$uniqueid,$conn);
	updaterow('authformreceiveddate',$dateNOW,$uniqueid,$conn);
	updaterow('authformreceivedweek',$weekNOW,$uniqueid,$conn);
	updaterow('authformreceivedmonth',$monthNOW,$uniqueid,$conn);
	$eventnote = 'Authorization manually received';
	logthisevent($eventnote,$conn,$notelog,$uniqueid);
}
require("uniqueid_row.php");
echo "<div align='right'>";
echo "<table cellspacing='3px' align='right' border='0'>";
formstart("receive_auth.php?uniqueid=".$uniqueid);
if (isset($authformsent)) 
{
	if ($authformreceived == 'Docusigned')
	{
		echo "<tr >";
		echo "<td >";
		echo "<div align='left'>";
		echo "Authorization was docusigned by ".$FirstName.' '.$LastName.' on '.$authformreceiveddate.'.';
		echo "</div>";
		echo "</td >";
	}
	else
	{
		if (!isset($authformreceived))
		{
		echo "<td >";
		checkboxmake('retainerget','Yes','Receive Authorization','No');
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
			echo "<font size='3'>Authorization received:&nbsp;&nbsp;&nbsp;&nbsp;".$authformreceiveddate."&nbsp;&nbsp;&nbsp;";
			echo "</td >";
		}
	}
}
else
{
	if (!isset($authformsent)) 
	{
		if ($authformreceived !== 'Docusigned')
		{
			echo "<td >";
			echo "<div align='left'>";
			echo "<br><br><strong>Authorization has not been sent to ".$FirstName.' '.$LastName.' yet. Send the authorization to enable authorization receiving.&nbsp;&nbsp;&nbsp;</strong>';
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
