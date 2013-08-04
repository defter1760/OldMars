<title>Generate Retainer</title>
Fill out form to generate retainer in PDF and create client folder on M drive.

<?PHP    
if (isset($_REQUEST['brandname'])) $brandname = $_REQUEST['brandname'];
if (isset($_POST['brandname'])) $brandname = $_POST['brandname'];

if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

if (isset($_REQUEST['FirstName'])) $FirstName = $_REQUEST['FirstName'];
if (isset($_POST['FirstName'])) $FirstName = $_POST['FirstName'];


if (isset($_REQUEST['LastName'])) $LastName = $_REQUEST['LastName'];
if (isset($_POST['LastName'])) $LastName = $_POST['LastName'];

  //echo "<tr>"; 
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' ACTION ='retainerWrite2.php'>";
	echo "<div align='left' class='MyFont'>";
	echo "Last Name";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='LastName'  value= '$LastName' width='100' height='12px'>";
	echo "</div><br>";
	
	echo "<div align='left' class='MyFont'>";
	echo "First Name";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='FirstName'  value= '$FirstName' width='100' height='12px'>";
	echo "</div><br>";

	echo "<div align='left' class='MyFont'>";
	echo "Brand";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='brandname'  value= '$brandname' width='100' height='12px'>";
	echo "</div><br>";


	echo "<div align='left' class='MyFont'>";
	echo "Unique ID";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='uniqueid'  value= '$uniqueid' width='100' height='12px'>";
	echo "</div><br>";
	echo "</div>";
	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Go'>";
	//echo "<INPUT TYPE = 'Reset' Name = 'Submit2'  VALUE = 'Reset'>";
	echo "</FORM>";



?>