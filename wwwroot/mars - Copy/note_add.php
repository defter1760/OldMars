<?PHP


require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

?>
<?PHP

bgcolorinner();
#echo "Inside Note_add.php<br>";
bgimg('./img/addnote_white.png');
#bgimg('./img/addnote.png');

if (isset($_POST['noteadd'])) $noteadd = $_POST['noteadd'];
#if (empty($noteadd)) unset($noteadd);
require("uniqueid_row.php");

formstart("note_add.php?uniqueid=".$uniqueid);
echo "<table cellspacing='3px' align='center' border='0'>";
echo "<tr>";
echo "<td>";
echo "<TEXTAREA class=first NAME=noteadd ROWS=3 COLS=70>";
#textfieldmaketall('',' ','70','noteadd');
echo "</TEXTAREA>";
echo "</td>";
echo "<td valign='bottom' align='right'>";
echo "<br>";
formend('Add Note');
echo "</td>";
echo "</tr>";
if (isset($_POST['noteadd'])) 
{

$newnote = 	$_POST['noteadd'];
if(strstr($newnote,'\'')){

    $newnote = str_replace('\'','\'\'',$newnote);
}
if(strstr($newnote,'\"')){
	$newnote = str_replace('\"','\"\"',$newnote);

}


$notelog = str_replace('\'','\'\'',$notelog);

$dateadd = date('Y').'-'.date('m').'-'.date('d');
$timeadd = date('H').':'.date('i').':'.date('s');
$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;

	$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";

    $results = sqlsrv_query($conn,$query);
}
?>
