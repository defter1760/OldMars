<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

?>
<?PHP

bgcolorinner();
#echo "Inside Long_form_open.php";

require("uniqueid_row.php");

bgimg('./img/longformopen_white.png');

require("uniqueid_row.php");
echo "<div align='right'>";
echo "<table cellspacing='3px' align='right' border='0'>";
#formstart("retainer_get.php?uniqueid=".$uniqueid);
if (!isset($retaineraccept)) 
{
	echo "<tr >";
	echo "<td >";
	echo "<div align='left'>";
	echo "<strong>Retainer from ".$FirstName.' '.$LastName.' has not been accepted. Accept the retainer to enable long form questionnare.&nbsp;&nbsp;&nbsp;</strong>';
	echo "</div>";
	echo "</td >";
}
else
{
if (isset($completedlongformonline))
{
	if ($completedlongformonline = 'Yes') 
	{
		echo "<tr >";
		echo "<td >";
		echo "<div align='left'>";
		echo "<strong>".$FirstName.' '.$LastName.' has already completed the long form questionnare.</strong>';
		echo "</div>";
		echo "</td >";
	}
}
else
{
	echo "&nbsp;&nbsp;&nbsp;";
	echo "</tr>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
	echo "</td>";
	echo "<td>";
	
#	echo '<A HREF="javascript:void(0)"onclick="window.open(';
#	echo "'http://sql.initiativelegal.com:35535/mars/get_long_form.php?uniqueid=".$uniqueid."','linkname','height=600, width=600,scrollbars=no')";
#	echo '">';
	
	echo '<a href="javascript: void(0)" onclick="popup(';
	echo "'http://sqlsrv.domain.initiativelegal.com/mars/internalmacysdetailedquestionnaire.php?uniqueid=".$uniqueid."')";
	echo '">';
	#Centered popup window</a>

	echo "<font size='3' color='666FFF'>Hyperlink to long form here</font></strong></a>&nbsp;&nbsp;&nbsp;</a>";
	
	#echo "<a href='' target='_new'><strong><font size='3' color='666666'>Hyperlink to long form here</font></strong></a>&nbsp;&nbsp;&nbsp;";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
}	
}
?>
