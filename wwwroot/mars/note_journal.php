<!--<meta http-equiv="refresh" content="5"> 
--><?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

?>
<?PHP

#bgcolorinner();
#echo "Inside Note_Journal.php<br>";
echo "<h6>Event Log</h6>";
#bgimg('./img/notejournal_white.png');
#bgimg('./img/notejournal.png');
#require("uniqueid_row.php");

$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){
		$notelog = $row['notelog']; if (empty($notelog)) unset($notelog);

	 }	

if (isset($notelog))
				{	
				
				#echo "<div id='main'>";
				echo "<table id='noteJournal' cellspacing='3px'  align='left' border='0'>";
				echo "<tr>";
				echo "<td >";
				echo "<br>";
//				echo "<br>";
//                                echo "Remind Ian to turn on auto refresh.";
//				echo "<br>";
//				echo "<br>";                                
				echo "".$notelog;
				echo "</td >";
				echo "</tr >";
	
				#echo "</div>";
				}
				else
				{
				}
?>
