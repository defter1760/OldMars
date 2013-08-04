<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

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
echo $FirstName." ".$LastName."<h1><br></div>";
if (isset($_REQUEST['mycolor'])) $mycolor = $_REQUEST['mycolor'];
if (empty($mycolor)) $mycolor = 'FFFFFF';
?>

<form action="client3.php">

<?PHP
	echo "<input type='hidden' name='uniqueid' value='".$uniqueid."'/>";
?>


<?PHP
	$query = "select COUNT(*) as COUNT from Status  where uniqueid='$uniqueid';";
	$results = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($results))
		{
			$existence = $row['COUNT'];
		}  
	if ($existence > '0')
	{
		echo "";
		if (isset($addressisundeliverable))
		{
		if ($addressisundeliverable == 'Yes')
		{
			echo "<br><br>";
			echo "<br><br>";
			echo "ADDRESS IS UNDELIVERABLE";
			echo "<br><br>";
			echo "<br><br>";
		}
		}
	}
	
	echo "<div id='main' class='clientProfile'>";	
		echo "<table cellspacing='0' width='100%' cellpadding='0' style='border: 1px solid #999;'>";
			
			//wrap entire page with conditional: only show if Uniqueid specified
			if (isset($uniqueid))
			{
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
				if (!isset($donotcontact))
					{
						echo "<tr>";
							echo "<td>";
								iframemake('short_form_open.php',$uniqueid,'55px','shortformopen','0');
							echo "</td>";
						echo "</tr>";
					}
				echo "<tr>";
					echo "<td>";
						echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>";
						if (!isset($donotcontact))
						{
						if (isset($retaineraccept))
						{
							iframemake('send_retainer.php',$uniqueid,'65px','retainersend','0');
					}
					else
					{
							iframemake('send_retainer.php',$uniqueid,'65px','retainersend','0');
						}
					echo "</td>";
				echo "</tr>";
			}
			
			if (!isset($donotcontact))
			{
				if (isset($retainertomailroom))
				{
					if ($retainertomailroom == 'Yes')
					{
						echo "<tr>";
							echo "<td>";
								iframemake('mailroom_confirm_retainer.php',$uniqueid,'65px','retainerconfirm','0');
							echo "</td>";
						echo "</tr>";
					}
				}
			}
			
//			if (!isset($donotcontact))
//			{
//				if (isset($retainerSent))
//				{
//					if (isset($retainerRecieved))
//					{
//						echo "<tr>";
//							echo "<td>";
//								iframemake('receive_retainer.php',$uniqueid,'85px','retainerget','0');
//							echo "</td>";
//						echo "</tr>";
//						}
//						else
//						{
//						echo "<tr>";
//							echo "<td>";	
//								iframemake('receive_retainer.php',$uniqueid,'365px','retainerget','0');
//							echo "</td>";
//						echo "</tr>";
//					}
//				}
//			}
			
			if (!isset($donotcontact))
			{
				if (isset($retainerSent))
				{
					if (isset($retaineraccept))
					{
						echo "<tr>";
							echo "<td>";	
								iframemake('review_retainer.php',$uniqueid,'65px','retainerreview','0');
							echo "</td>";
						echo "</tr>";
					}
					else
					{
						echo "<tr>";
							echo "<td>";	
								iframemake('review_retainer.php',$uniqueid,'65px','retainerreview','0');
							echo "</td>";
						echo "</tr>";
					}
				}
			}
			
			if (!isset($donotcontact))
			{
				if (isset($retainerSent))
				{
					if (isset($retaineraccept))
					{	
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
					}
				}
			}
			
//			if (!isset($donotcontact))
//			{
//				if (isset($retaineraccept))
//				{
//					if (isset($authaccept))
//					{
//						echo "<tr>";
//							echo "<td>";
//								iframemake('send_auth.php',$uniqueid,'85px','authsend','0');
//							echo "</td>";
//						echo "</tr>";
//						}
//						else
//						{
//						echo "<tr>";
//							echo "<td>";
//								iframemake('send_auth.php',$uniqueid,'85px','authsend','0');
//							echo "</td>";
//						echo "</tr>";
//					}
//				}
//			}
			
			if (!isset($donotcontact))
			{
				if (isset($authtomailroom))
				{
					if ($authtomailroom == 'Yes')
					{
					echo "<tr>";
						echo "<td>";
						iframemake('mailroom_confirm_auth.php',$uniqueid,'65px','authconfirm','0');
						echo "</td>";
					echo "</tr>";
					}
				}
			}
			
			if (!isset($donotcontact))
			{
				if (isset($retaineraccept))
				{
					echo "<tr>";
						echo "<td>";
							iframemake('sendpacket.php',$uniqueid,'200px','packetsend','0');	
						echo "</td>";
					echo "</tr>";
				}
			}
			
//			if (!isset($donotcontact))
//			{
//				if (isset($authformreceived))
//				{
//					echo "<tr>";
//						echo "<td>";
//							iframemake('receive_auth.php',$uniqueid,'65px','authget','0');
//						echo "</td>";
//					echo "</tr>";
//					}
//					else
//					{
//					echo "<tr>";
//						echo "<td>";	
//							iframemake('receive_auth.php',$uniqueid,'65px','authget','0');
//						echo "</td>";
//					echo "</tr>";
//				}
//			}
			
			if (!isset($donotcontact))
			{
//				if (isset($authaccept))
//				{
//					echo "<tr>";
//						echo "<td>";	
//							iframemake('review_auth1.php',$uniqueid,'65px','authreview','0');
//						echo "</td>";
//					echo "</tr>";
//				}
//				else
				{
					echo "<tr>";
						echo "<td>";	
							iframemake('review_auth1.php',$uniqueid,'65px','authreview','0');
						echo "</td>";
					echo "</tr>";
				}
			}
			
			if (!isset($donotcontact))
			{
				echo "<tr>";
					echo "<td>";	
						iframemake('review_auth2.php',$uniqueid,'65px','authreview2','0');
					echo "</td>";
				echo "</tr>";
			}
			
			if (!isset($donotcontact))
			{
				if (isset($feewaivertomailroom))
				{
					if ($feewaivertomailroom == 'Yes')
					{
						echo "<tr>";
							echo "<td>";
							iframemake('mailroom_confirm_feewaiver.php',$uniqueid,'65px','feewaiverconfirm','0');
							echo "</td>";
						echo "</tr>";
					}
				}
			}
			
//			if (!isset($donotcontact))
//			{
//				if (isset($feewaiveraccept))
//				{
//					echo "<tr>";
//						echo "<td>";	
//							iframemake('receive_fee_waiver.php',$uniqueid,'65px','feewaiverget','0');				
//						echo "</td>";
//					echo "</tr>";
//					}
//					else
//					{
//					echo "<tr>";
//						echo "<td>";	
//							iframemake('receive_fee_waiver.php',$uniqueid,'65px','feewaiverget','0');
//						echo "</td>";
//					echo "</tr>";
//				}
//			}
			
			if (!isset($donotcontact))
			{
				if (isset($feewaiveraccept))
				{
					echo "<tr>";
						echo "<td>";
							iframemake('review_fee_waiver.php',$uniqueid,'65px','feewaiverreview','0');				
						echo "</td>";
					echo "</tr>";
				}
				else
				{
					echo "<tr>";
						echo "<td>";	
							iframemake('review_fee_waiver.php',$uniqueid,'65px','feewaiverreview','0');	
						echo "</td>";
					echo "</tr>";
				}
				echo "<tr>";
					echo "<td>";
						echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
					echo "</td>";
				echo "</tr>";
			}
			
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
					echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
				echo "</td>";
			echo "</tr>";
			
			
		echo "</table>";
		echo "</div>";
	}
	else
	{
	echo "The uniqueid specified does not exist.";	
	}
?>

