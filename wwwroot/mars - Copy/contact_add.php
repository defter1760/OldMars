
<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

?>

<?PHP


bgimg('./img/contactadd_white.png');
#bgimg('./img/contactinfo.png');
if (isset($_POST['FirstName'])){
updaterow('FirstName',$FirstName,$uniqueid,$conn);
updaterow('LastName',$LastName,$uniqueid,$conn);
updaterow('phone1',$phone1,$uniqueid,$conn);
updaterow('phone2',$phone2,$uniqueid,$conn);
updaterow('email',$email,$uniqueid,$conn);
updaterow('Street1',$Street1,$uniqueid,$conn);
updaterow('Street2',$Street2,$uniqueid,$conn);
updaterow('City',$City,$uniqueid,$conn);
updaterow('State',$State,$uniqueid,$conn);
updaterow('Zipcode',$Zipcode,$uniqueid,$conn);
}
if (isset($_POST['agentlname'])){
updaterow('agentlname',$agentlname,$uniqueid,$conn);
}
require("uniqueid_row.php");
?>
<?PHP
echo "<br>";
echo "<table cellspacing='1px' align='right'>";
echo "<tr >";
echo "<td >";

formstart("contact.php?uniqueid=".$uniqueid);
#textfieldmakenoupdate(' Unique ID',$uniqueid,'20');
echo "&nbsp;&nbsp;&nbsp;";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table cellspacing='5px' border='0'>";
echo "<tr>";
echo "<td>";
textfieldmake('F Name',$FirstName,'7','FirstName');
echo "</td>";
echo "<td>";
textfieldmake('L Name',$LastName,'7','LastName');
echo "</td>";
echo "<td>";
textfieldmake('Phone 1',$phone1,'11','phone1');
echo "</td>";
echo "<td>";
textfieldmake('Phone 2',$phone2,'11','phone2');
echo "</td>";
echo "<td>";
textfieldmake('Email',$email,'25','email');
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table cellspacing='5px' border='0'>";
echo "<tr>";
echo "<td>";
textfieldmake(' Street 1',$Street1,'','Street1');
echo "</td>";
echo "<td>";
textfieldmake(' Street 2',$Street2,'5','Street2');
echo "</td>";
echo "<td>";
textfieldmake(' City',$City,'10','City');
echo "</td>";
echo "<td>";
textfieldmake(' State',$State,'2','State');
echo "</td>";
echo "<td>";
textfieldmake(' Zipcode',$Zipcode,'8','Zipcode');
echo "</td>";
echo "<td>";
if (empty($agentlname)){
	agentdropdown();
	}
else
	{
	textfieldmakenoupdate(' Case Attorney',$agentlname,'8');
	}
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<div align='right'>";
formend('Add contact');
echo "&nbsp;&nbsp;&nbsp;";
echo "</div>";
?>

