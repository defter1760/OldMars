<html>
<head>
<style>
}
.MyFont { /*  */
	font-size: 11px;
	
}
.SmallFont { /*  */
	font-size: 9px;

	
}
-->
</style>
<title>Radio Buttons</title>
</head>

<?PHP
//
//$male_status = 'unchecked';
//$female_status = 'unchecked';
//
//
//if (isset($_POST['Submit1'])) {
//
//	$selected_radio = $_POST['gender'];
//	
//		if ($selected_radio == 'male') {
//			$male_status = 'checked';
//
//		}
//		else if ($selected_radio == 'female') {
//			$female_status = 'checked';
//		}
//}
//
?>

<body>
<div class="MyFont" width="200">
<FORM NAME ="form1" METHOD ="POST" ACTION ="http://dfwms01.initiativelegal.com/database_write_Long_FirstTransit.php?case=Firsttransit" >

<INPUT TYPE = 'Radio' Name ='gender'  value= 'male' <?PHP #print $male_status; ?>>Male

<INPUT TYPE = 'Radio' Name ='gender'  value= 'female' <?PHP #print $female_status; ?>>Female

<INPUT TYPE = 'Radio' Name ='color'  value= 'red' <?PHP #print $male_status; ?>>red

<INPUT TYPE = 'Radio' Name ='color'  value= 'blue' <?PHP #print $female_status; ?>>blue
<INPUT TYPE = 'hidden' Name ='source_url'  value= 'http://10.129.3.208/FirstTransit_WP/questionnaire/' >

<P>
<INPUT TYPE = "Submit"   VALUE = "Select a Radio Button">
</FORM>
