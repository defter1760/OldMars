<?php
// Request selected language
$dateSelected = $_POST['date1'];

// Note: this sample doesn't show you how to use the $mydate variable with your database, but you can handle it as any other php variable in your script!
?>
<?php
require('calendar/tc_calendar.php');
?>
Your page content to the point you want to insert the calendar form
<form name="calendar" method="post" action="sample.php">
<table>
	<tr>
		<td>
<?php
	  $myCalendar = new tc_calendar("date1");
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1970, 2020);
	  $myCalendar->dateAllow('2008-05-13', '2015-03-01', false);
	  $myCalendar->startMonday(false);
	  $myCalendar->writeScript();
	  ?>
		</td>
	<tr/>
</table>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Go!">
</form>
<br>
<br>
<?PHP
  echo "$dateSelected";
?>
</body>
</html>