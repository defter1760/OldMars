<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
require("uniqueid_row.php");

?>
<?PHP

//bgcolorinner();



if (isset($shortFormCompletePhone))
{
	if ($shortFormCompletePhone == 'Yes') 
	{
		$shortFormComplete = 'Yes';	
		$completedWhere = 'by phone'; 
		$shortFormCompleteDate = $shortFormCompletePhoneDate;
	}
}

if (isset($shortFormCompleteOnline))
{
	if ($shortFormCompleteOnline == 'Yes') 
	{
		$shortFormComplete = 'Yes';	
		$completedWhere = 'online'; 
		$shortFormCompleteDate = $shortFormCompleteOnlineDate;
	}
}

if (isset($shortFormComplete))
{
	if ($shortFormComplete == 'Yes')
	{
		echo "<body class='done'>";
		echo "<h6 class='small'>Short form completed ".$completedWhere.": ".$shortFormCompleteDate."</h6>";
	}
}

echo "<div align='right'>";
	echo '<h5><a href="javascript: void(0)" onclick="popup(';
	//echo "'http://sqlsrv.domain.initiativelegal.com/mars/existingshortform.php?uniqueid=".$uniqueid."')";
	echo "'http://sqlsrv.domain.initiativelegal.com/elina/existingshortform.php?uniqueid=".$uniqueid."')";
	echo '">';
	echo "Open Short Form Interview &raquo;</a></h5>";
echo "</div>";

?>
