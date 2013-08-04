<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
?>
<style type="text/css">

body {
	font-family: 'Open Sans', sans-serif;
	/*color:#424242;*/
	color:#000000;
	margin:0;
	/*text-align:center;*/
	height:100%;
	font-size:12px;
	background-repeat: no-repeat;

}
</style>
<?php
echo "<br><br>".$uniqueid;
echo "<br><br>This piece does not function as intended yet.<br><br>";
echo "This is a 600 by 600 window which is not resizable. Scrollbars are enabled. <br><br>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
echo "<input style='border:0' type='text' id='textbox1' size='1'> <--Your cursor should be in this box.";
		
		echo "<script>document.getElementById('textbox1').focus()</script>";
		echo " ";
		echo " <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>Nothing to see here.";
?>