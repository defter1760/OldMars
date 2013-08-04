<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
?>

<?PHP

//bgcolorinner();

#echo "Inside Long_form_open.php";

require("uniqueid_row.php");

if (isset($longformcompleteonphone))
{
	if ($longformcompleteonphone == 'Yes') 
	{
		$longFormComplete = 'Yes';	
		$completedWhere = 'by phone'; 
		$longFormCompleteDate = $longformcompleteonphonedate;
	}
}

if (isset($longformcompleteonline))
{
	if ($longformcompleteonline == 'Yes') 
	{
		$longFormComplete = 'Yes';	
		$completedWhere = 'online'; 
		$longFormCompleteDate = $longformcompleteonlinedate;
	}
}

if (isset($longFormComplete))
{
	if ($longFormComplete == 'Yes')
	{
		echo "<body class='done'>";
		echo "<h6 class='small'>Long form completed ".$completedWhere.": ".$longFormCompleteDate."</h6>";
	}
}

//bgimg('./img/longformopen_white.png');

if (empty($FirstName)) $FirstName = '';
if (empty($LastName)) $LastName = '';
	
require("uniqueid_row.php");
echo "<div align='right'>";
echo "<table align='right' border='0'>";
#formstart("retainer_get.php?uniqueid=".$uniqueid);
if (!isset($retaineraccept)) 
{
	echo "<tr >";
	echo "<td >";
	echo "<div class='flag'>";
	echo "Attorney-Client Agreement from ".$FirstName.' '.$LastName.' has not been accepted. Accept the Attorney-Client Agreement to enable long form interview.';
	echo "</div>";
	echo "</td >";
}
else
{
if (isset($completedlongformonline))
{
	if ($completedlongformonline = 'Yes') 
	{
		echo "<tr >";
		echo "<td >";
		echo "<div align='left'>";
		echo "<strong>".$FirstName.' '.$LastName.' has already completed the long form interview.</strong>';
		echo "</div>";
		echo "</td >";
	}
}
else
{
	echo "&nbsp;&nbsp;&nbsp;";
	echo "</tr>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
	echo "</td>";
	echo "<td>";
	
#	echo '<A HREF="javascript:void(0)"onclick="window.open(';
#	echo "'http://sql.initiativelegal.com:35535/mars/get_long_form.php?uniqueid=".$uniqueid."','linkname','height=600, width=600,scrollbars=no')";
#	echo '">';
	
	echo '<h5><a href="javascript: void(0)" onclick="popup(';
	echo "'http://sqlsrv.domain.initiativelegal.com/mars/internalmacysdetailedquestionnaire.php?uniqueid=".$uniqueid."')";
	echo '">';
	#Centered popup window</a>

	echo "Open Long Form Interview &raquo;</a></h5>";
	
	#echo "<a href='' target='_new'><strong><font size='3' color='666666'>Hyperlink to long form here</font></strong></a>&nbsp;&nbsp;&nbsp;";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
}	
}
?>
