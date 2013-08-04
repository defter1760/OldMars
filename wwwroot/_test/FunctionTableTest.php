<?PHP
#style='background-color:#FFFF99'
function _sorttablemakertableopen($actiontarget,$color)
{
echo "<table border='1' bordercolor='#000000' style='background-color:#$color' width='100%' cellpadding='2' cellspacing='0'>";
echo "<form action='$actiontarget?brandname=$brandname&agentlname=$agentlname' method='post'>";
}
function _sorttablemakercell($header)
{
	  echo "<td><font size=2>" . $row['$header'] . "</td>";
}

	function _sorttablemakerheaders($width,$name,$description)
{
		echo "<th width='$width'>";

		echo "<select name='$name'>";
		if (isset($name)) 
		{
			if ( $name == "YesAsc" ) 
			{
			echo "<option value='YesAsc' selected='selected'>$description &uarr;</option>";
			}
			else
			{
			echo "<option value='YesAsc'>$description &uarr;</option>";
		}
			if ( $name == "YesDesc" ) 
			{
			echo "<option value='YesDesc' selected='selected'>$description &darr;</option>";
			}
			else
			{
			echo "<option value='YesDesc'>$description &darr;</option>";
			}
		
		if ( $name == "No" ) 
		{
			echo "<option value='No' selected='selected'>$description</option>";
			}
			else
			{
			echo "<option value='No'>$description</option>";
			}
		}
	else
	{
		echo "<option value='No' selected='selected'>$description</option>";
		echo "<option value='YesAsc'>$description &uarr;</option>";
		echo "<option value='YesDesc'>$description &darr;</option>";
	}
	echo "</select>"; 
	echo "</th>";
}
	
//----------------------------------------------------------//
//	//	//		//	//	//	//	//	//	//	//		//	//	//	
//	//	\\		//	//	//	//	//	//	//	//		\\	//	//
//	//	//		//	//	//	//	//	//	//	//		//	//	//
//	//	\\		-MAKE A TABLE WITH FUNCTIONS-		\\	//	//
//	//	//		//	//	//	//	//	//	//	//		//	//	//
//	//	\\		//	//	//	//	//	//	//	//		\\	//	//
//	//	//		//	//	//	//	//	//	//	//		//	//	//
//----------------------------------------------------------//

_sorttablemakertableopen('FunctionTableTest.php','ffffff');
echo "<tr>";
_sorttablemakerheaders('100','caseid','Case ID');
_sorttablemakerheaders('100','BBQ','BBQ');
echo "</tr>";
echo "<tr>";
_sorttablemakercell('caseid');
_sorttablemakercell('BBQ');
echo "</tr>";

?>