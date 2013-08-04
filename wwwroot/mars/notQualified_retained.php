<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions


// Uncomment these to see raw $_POST array :D
//print('<pre>');
////print_r($_POST);
////print('</pre>');
////print_r(array_keys($_POST));
////echo "<br><br>";
////print_r(array_values($_POST));
#
#
## 6/7/12)-> Ian added this stuff @ 7:00PM
##
if (isset($_POST['notqualified_retained'])) 
{
	$notqualified_retainedUPDATE = $_POST['notqualified_retained'];
	if (empty($notqualified_retainedUPDATE)) unset($notqualified_retainedUPDATE);
}
if (isset($_POST['attName'])) 
{
	$attName = $_POST['attName'];
	if (empty($attName)) unset($attName);
}
if (isset($_POST['firmPhone'])) 
{
	$firmPhone = $_POST['firmPhone'];
	if (empty($attName)) unset($attName);
}
if (isset($_POST['firmName'])) 
{
	$firmName = $_POST['firmName'];
	if (empty($attName)) unset($attName);
}
if (isset($_POST['firmCity'])) 
{
	$firmCity = $_POST['firmCity'];
	if (empty($attName)) unset($attName);
}
## 6/7/12)-^ Ian added this stuff @ 7:00PM
##
?>

<?PHP
if (isset($attName))
{
	#updaterow('attorneyInfo',$attorneyInfoUPDATE,$uniqueid,$conn);
	updaterow('attName',$attName,$uniqueid,$conn);
	updaterow('firmPhone',$firmPhone,$uniqueid,$conn);
	updaterow('firmName',$firmName,$uniqueid,$conn);
	updaterow('firmCity',$firmCity,$uniqueid,$conn);
}

if (isset($notqualified_retainedUPDATE))
{
	if ($notqualified_retainedUPDATE == 'No')
	{
		$query = "SELECT notqualifiedreason FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($results))
		{
			$notqualifiedreason = $row['notqualifiedreason'];
		}
		if ($notqualifiedreason == 'Already represented')
		{
			updaterow('notqualifiedreason','',$uniqueid,$conn);
			updaterow('donotcontact','',$uniqueid,$conn);
			updaterow('notqualified','',$uniqueid,$conn);
##don't log the event without this require :o			
			require("uniqueid_row.php");
			logthisevent('Represented by another Attorney information Set to No.',$conn,$notelog,$uniqueid);
		}
#		updaterow('attorneyInfo','',$uniqueid,$conn);
		updaterow('attName','',$uniqueid,$conn);
		updaterow('firmPhone','',$uniqueid,$conn);
		updaterow('firmName','',$uniqueid,$conn);
		updaterow('firmCity','',$uniqueid,$conn);
		updaterow('notqualified_retained','No',$uniqueid,$conn);
		
	}
	else
	{
//		if ($notqualified_retainedUPDATE == 'Yes')
//		{
//			updaterow('notqualifiedreason','Already represented',$uniqueid,$conn);
//			updaterow('donotcontact','Yes',$uniqueid,$conn);
//			updaterow('notqualified',$notqualified_retained,$uniqueid,$conn);
//			updaterow('notqualified_retained','Yes',$uniqueid,$conn);
//			require("uniqueid_row.php");
//			logthisevent('Retained by another Attorney information Set to Yes:'.$attorneyInfoUPDATE,$conn,$notelog,$uniqueid);
//		}
		if ($notqualified_retainedUPDATE == 'Yes')
		{
			if (!isset($attName))
			{
				updaterow('notqualifiedreason','Already represented',$uniqueid,$conn);
				updaterow('donotcontact','Yes',$uniqueid,$conn);
				updaterow('notqualified',$notqualified_retained,$uniqueid,$conn);
				updaterow('notqualified_retained','Yes',$uniqueid,$conn);
				require("uniqueid_row.php");
			logthisevent('Represented by another Attorney information Set to Yes.',$conn,$notelog,$uniqueid);
			}
		}
		if ($notqualified_retainedUPDATE == 'Yes')
		{
			if (isset($attName))
			{
				updaterow('notqualifiedreason','Already represented',$uniqueid,$conn);
				updaterow('donotcontact','Yes',$uniqueid,$conn);
				updaterow('notqualified',$notqualified_retained,$uniqueid,$conn);
				updaterow('notqualified_retained','Yes',$uniqueid,$conn);
				require("uniqueid_row.php");
				logthisevent('Retained by another Attorney information Set to Yes: '.$attName.' '.$firmPhone.' '.$firmName.' '.$firmCity,$conn,$notelog,$uniqueid);
			}
		}
		if ($notqualified_retainedUPDATE == 'Clear')
		{
			updaterow('notqualified_retained','',$uniqueid,$conn);
			#updaterow('attorneyInfo','',$uniqueid,$conn);
			updaterow('attName','',$uniqueid,$conn);
			updaterow('firmPhone','',$uniqueid,$conn);
			updaterow('firmName','',$uniqueid,$conn);
			updaterow('firmCity','',$uniqueid,$conn);
			require("uniqueid_row.php");
			logthisevent('Represented by another Attorney information Cleared',$conn,$notelog,$uniqueid);
		}
	}
}

require("uniqueid_row.php");

/////////////////////////////   start - added by Dr. MR to treat a broken tail :(
if (empty($notqualified_retained)) $notqualified_retained = '';
if (empty($attorneyInfo)) $attorneyInfo = '';
/////////////////////////////   end - tail all better!!! 

## whoah, an inline !important... so awesome :O -- php gremlin was here.
echo "<h6 style='width: 600px !important;'>Represented by Another Attorney</h6>";

echo "<table class='clientProfileTable clear' width='600px' cellspacing='2' cellpadding='2' align='left' >";
	echo "<tr >";
		echo "<td colspan='2'>";
			formstart("notQualified_retained.php?uniqueid=".$uniqueid);
			echo "Is this person currently represented by another attorney?";
			echo '<input type="radio" name="notqualified_retained" value="Yes"';
			if (isset($notqualified_retained))
			{
				if($notqualified_retained == "Yes") 
				{
					echo ' checked ';
				}
			}
			if (isset($notqualifiedreason))
			{
				if($notqualifiedreason == "Already represented") 
				{
					echo ' checked ';
				}
			}
			echo '/>';
			if($notqualified_retained == "Yes") 
			{
				echo "<span style='color:#c00; font-weight: bold; font-style: italic; font-size: 20px; padding-right: 10px;'>Yes</span>";
				echo "<img src='images/stop.jpg' width='150px' style='position: absolute; top: 10px; right: 10px;'>";
			}
			else
			{
				echo "Yes";			
			}
			echo '<input type="radio" name="notqualified_retained" value="No"';
			if (isset($notqualified_retained))
			{
				if($notqualified_retained == "No") 
				{
					echo ' checked ';
				}
			}
			echo '/>';
			echo "No";
//			echo '<input type="radio" name="notqualified_retained" value="Clear" />';
//			echo "Clear";
		echo "</td>";
	echo "</tr>";
	echo "<tr >";
		echo "<td width='388px'>";
		if ($notqualified_retained != 'No')
			{
				#textfieldmake('Attorney Info',$attorneyInfo,'55','attorneyInfo');
				echo "<table>";
				echo "<tr>";
				echo "<td>";
				textfieldmake('Attorney\'s Name',$attName,'20','attName');
				echo "</td>";
				echo "<td>";
				textfieldmake('Phone Number',$firmPhone,'20','firmPhone');
				echo "</td>";
				echo "<td>";
				textfieldmake('Firm Name',$firmName,'20','firmName');
				echo "</td>";
				echo "<td>";
				textfieldmake('Firm City',$firmCity,'20','firmCity');
				echo "</td>";
				echo "<tr>";
				echo "</table>";
			}
		echo "</td>";
	echo "</tr>";
	echo "<tr >";
		echo "<td valign='bottom'>";
			formend('Update');
		echo "</td>";
	echo "</tr>";
echo "</table>";

?>