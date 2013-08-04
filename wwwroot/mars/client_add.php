<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
if (isset($_REQUEST['mycolor'])) $mycolor = $_REQUEST['mycolor'];
if (empty($mycolor)) $mycolor = 'FFFFFF';
?>
<br />

<!--<input type="text" name="mycolor" min="6" size="6" max="6" -->
<?PHP 
#echo "value='".$mycolor."'"
?>
<!--pattern="[A-Za-z0-9]{6}" title="Siz character color code"/>-->
<?PHP
echo "<input type='hidden' name='uniqueid' value='".$uniqueid."'/>";

?>


<?PHP

bgcolor($mycolor);
echo "<div id='main'>";
echo "<table cellspacing='0' cellpadding='0'>";

//paint contact.php	
#echo "Contact.php:<br>";
echo "<tr>";
echo "<td>";
	iframemake('contact_add.php',$uniqueid,'190px','contact','0');
//paint retainer_send.php
#echo "retainer_send.php:<br>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
?>

