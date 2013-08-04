<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
if (isset($_REQUEST['mycolor'])) $mycolor = $_REQUEST['mycolor'];
if (empty($mycolor)) $mycolor = 'FFFFFF';
?>
<form action="client.php">
<!--<input type="text" name="mycolor" min="6" size="6" max="6" -->
<?PHP 
#echo "value='".$mycolor."'"
?>
<!--pattern="[A-Za-z0-9]{6}" title="Siz character color code"/>-->
<?PHP
echo "<input type='hidden' name='uniqueid' value='".$uniqueid."'/>";

?>

<input type="Submit" value="Update"/>
<?PHP

bgcolor($mycolor);
echo "<div id='main'>";
echo "<table cellspacing='0' cellpadding='0'>";

//wrap entire page with conditional: only show if Uniqueid specified

//
// unset uniqueid so no one thinks this page is legit anymore
//
unset($uniqueid);
if (isset($uniqueid))
{
//paint contact.php	
#echo "Contact.php:<br>";
echo "<tr>";
echo "<td>";
	iframemake('contact.php',$uniqueid,'199px','contact','0');
//paint retainer_send.php
#echo "retainer_send.php:<br>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
	iframemake('retainer_send.php',$uniqueid,'92px','retainersend','0');
	//paint retainer_get.php
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "retainer_get.php:<br>";
	iframemake('retainer_get.php',$uniqueid,'88px','retainerget','0');
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "retainer_review.php:<br>";
	iframemake('retainer_review.php',$uniqueid,'87px','retainerreview','0');
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "long_form_open.php:<br>";
	iframemake('long_form_open.php',$uniqueid,'64px','longformopen','0');
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "auth_send.php:<br>";
	iframemake('auth_send.php',$uniqueid,'92px','authsend','0');
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "auth_get.php:<br>";
	iframemake('auth_get.php',$uniqueid,'87px','authget','0');
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "auth_review.php:<br>";
	iframemake('auth_review.php',$uniqueid,'87px','authreview','0');
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "fee_waiver_send.php:<br>";
	iframemake('fee_waiver_send.php',$uniqueid,'92px','feewaiversend','0');	
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "fee_waiver_get.php:<br>";
	iframemake('fee_waiver_get.php',$uniqueid,'87px','feewaiverget','0');				
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "fee_waiver_review.php:<br>";
	iframemake('fee_waiver_review.php',$uniqueid,'87px','feewaiverreview','0');				
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "additional_docs.php:<br>";
	iframemake('additional_docs.php',$uniqueid,'89px','additionaldocs','0');				
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "note_journal.php:<br>";
	iframemake('note_journal.php',$uniqueid,'400px','notejournal','0');				
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo "note_add.php:<br>";
	iframemake('note_add.php',$uniqueid,'130px','notejournal','0');				
echo "</td>";
echo "</tr>";
}
else//what to do if the uniqueid is not set
{
echo "<tr>";
echo "<td>";
	#echo "There is no Uniqueid set -- did you do something wrong?";
	echo "Legacy revision -- did you do something wrong?";
echo "</tr>";
echo "</td>";
}
echo "</table>";
echo "</div>";
?>

