<?PHP
require("header.php");
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("uniqueid_row.php");
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);

echo "<div align=center>";
echo "<h1><br>Client Profile<br>";
if (isset($FirstName))
{
	if (isset($LastName))
	{
		echo $FirstName." ".$LastName."<h1><br></div>";
	}
}
if (isset($_REQUEST['mycolor'])) $mycolor = $_REQUEST['mycolor'];
if (empty($mycolor)) $mycolor = 'FFFFFF';
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<form action="client3.php">

<?PHP
if (isset($uniqueid))
{
	echo "<input type='hidden' name='uniqueid' value='".$uniqueid."'/>";
}
?>


<?PHP	
echo "<div class='clientProfile'>";	
	echo "<table cellspacing='0' width='100%' cellpadding='0' style='border: 1px solid #999;'>";
		
		if (isset($uniqueid))   //wrap entire page with conditional: only show if Uniqueid specified
		{
			echo "<tr>";
				echo "<td>";
					iframemake('notQualified_retained.php',$uniqueid,'170px','notQualified_retained','0');
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
					echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
					iframemake('contact.php',$uniqueid,'330px','contact','0');
				echo "</td>";
			echo "</tr>";
#
## 06/07/12)-> Ian added this wrapper requiring that the attorney question is answered
#
		if (isset($notqualified_retained))
		{
//			if (!isset($donotcontact))
//			{
				echo "<tr>";
					echo "<td>";
						iframemake('short_form_open.php',$uniqueid,'55px','shortformopen','0');
					echo "</td>";
				echo "</tr>";
//			}
			echo "<tr>";
				echo "<td>";
					echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
				echo "</td>";
			echo "</tr>";
			
			if (!isset($donotcontact))
			{
				if (!isset($notqualified))
				{
					echo "<tr>";
						echo "<td>";
							iframemake('send_retainer.php',$uniqueid,'85px','retainersend','0');
						echo "</td>";
					echo "</tr>";
					#echo "<tr>";
					#	echo "<td>";	
					#		iframemake('review_retainer.php',$uniqueid,'85px','retainerreview','0');
					#	echo "</td>";
					#echo "</tr>";
					echo "<tr>";
						echo "<td>";
							iframemake('long_form_open.php',$uniqueid,'55px','longformopen','0');
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
						echo "</td>";
					echo "</tr>";
				} // end $notqulified if
			} // end $donotcontact if
		
			if (!isset($donotcontact))
			{
				if (!isset($notqualified))
				{
					if (isset($retaineraccept))
					{
//						if (isset($authtomailroom))
//						{
//							if ($authtomailroom == 'Yes')
//							{
//							echo "<tr>";
//								echo "<td>";
//								iframemake('mailroom_confirm_auth.php',$uniqueid,'85px','authconfirm','0');
//								echo "</td>";
//							echo "</tr>";
//							}
//						}
						
## ian 6/13/12 )-> added this stuff to calculate how many things are supposed to be accepted and only show the sendpacket if there is something left to be sent ( not accepted )		
$countingaccepted = '0';							
if (isset($feewaiverqualified))
{
	$totalacceptable = '3';
}
else
{
	$totalacceptable = '2';
}
if (isset($authaccept))
{
	$countingaccepted++;
}
if (isset($authaccept2))
{
	$countingaccepted++;
}
if (isset($feewaiverqualified))
{
	if (isset($feewaiveraccept))
	{
		$countingaccepted++;
	}
}
if ($countingaccepted != $totalacceptable)
{
						echo "<tr>";
							echo "<td>";
								iframemake('sendpacket.php',$uniqueid,'200px','packetsend','0');	
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
}
##
							echo "<td>";	
								iframemake('review_auth1.php',$uniqueid,'85px','authreview','0');
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";	
								iframemake('review_auth2.php',$uniqueid,'85px','authreview2','0');
							echo "</td>";
						echo "</tr>";
						
//						if (isset($feewaivertomailroom))
//						{
//							if ($feewaivertomailroom == 'Yes')
//							{
//								echo "<tr>";
//									echo "<td>";
//									iframemake('mailroom_confirm_feewaiver.php',$uniqueid,'85px','feewaiverconfirm','0');
//									echo "</td>";
//								echo "</tr>";
//							}
//						}
						echo "<tr>";
							echo "<td>";	
								iframemake('review_fee_waiver.php',$uniqueid,'85px','feewaiverreview','0');	
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
							echo "</td>";
						echo "</tr>";
					} // end $retaineraccept if
				} // end $notqualified if
			} // end $donotcontact if
		} // end $notqualified_retained if
#
## close
## 06/07/12)-> Ian added this wrapper requiring that the attorney question is answered
#
			echo "<tr>";
				echo "<td>";
					iframemake('additional_docs.php',$uniqueid,'700px','additionaldocs','0');				
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
					iframemake('note_journal.php',$uniqueid,'200px','notejournal','0');				
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
					iframemake('note_add.php',$uniqueid,'130px','notejournal','0');				
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
					iframemake('costsprofile.php',$uniqueid,'630px','costsprofile','0');				
				echo "</td>";
			echo "</tr>";			
			echo "<tr>";
				echo "<td>";
					echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
				echo "</td>";
			echo "</tr>";
		}
		else
		{
		echo "The uniqueid specified does not exist.";	
		}
	echo "</table>";
echo "</div>";
?>

