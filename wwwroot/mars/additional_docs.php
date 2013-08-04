<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

?>
<?PHP

//bgcolorinner();
#echo "Inside Additional_docs.php";
#bgimg('./img/documents.png');

echo "<h6>Documents</h6>";
//bgimg('./img/documents_white.png');
#echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This piece does not function as intended yet.";
require("uniqueid_row.php");

$folderpath = "\\\\FILES\\MassAction\\Macys\\".$LastName.", ".$FirstName." - ".$uniqueid."\\";
echo "<div align='right'>";
echo "<table cellspacing='0' cellpadding='0' align='right' border='0'>";
	echo "<tr >";
	echo "<td >";
#	echo "Path to documents:&nbsp;&nbsp;&nbsp;<br>";
#echo "<input size='80' value='".$folderpath."'>&nbsp;&nbsp;&nbsp;";
echo "</td>";
echo "</tr>";
echo "</table>";
//echo "<br><br>";
#require("seedocs.php");
iframemake('seedocs.php',$uniqueid,'650px','retainersend','0');
?>