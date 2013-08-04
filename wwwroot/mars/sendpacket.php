<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
require("uniqueid_row.php");
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
?>

<?PHP
if (isset($_POST['Auth1']))
{
	if($_POST['Auth1'] != 'Auth1')
	{
		$auth1 = '';
	}
	else
	{
		if($_POST['Auth1'] == 'Auth1')
		{
			$auth1 = 'Auth1Set';
		}
	}
}
else
{
	$auth1 = '';
}
if (isset($_POST['Auth2']))
{
	if($_POST['Auth2'] != 'Auth2')
	{
		$auth2 = '';
	}
	else
	{
		if($_POST['Auth2'] == 'Auth2')
		{
			$auth2 = 'Auth2Set';
		}
	}
}
else
{
	$auth2 = '';
}
if (isset($_POST['Feewaiver']))
{
	if($_POST['Feewaiver'] != 'Feewaiver')
	{
		$feewaiver = '';
	}
	else
	{
		if($_POST['Feewaiver'] == 'Feewaiver')
		{
			$feewaiver = 'FeewaiverSet';
		}
	}
}
else
{
	$feewaiver = '';
}
if (isset($_POST['sendhow']))
{

	if ($_POST['sendhow'] != '')
	{
		$sendhow = $_POST['sendhow'];
		$packetcomp = $auth1.''.$auth2.''.$feewaiver;
	}
	else
	{
		$sendhow = '';
		empty($sendhow);
	}
}
?>

<?PHP
if (isset($longformcompleteonline))
{
	if ($longformcompleteonline == 'Yes')
	{
		$longformDONE = 'Yes';
	}
	else
	{
		$longformDONE = '';
	}
}
else
{
	if (isset($longformcompleteonphone))
	{
		if ($longformcompleteonphone == 'Yes')
		{
			$longformDONE = 'Yes';
		}
	}
	else
	{
		$longformDONE = '';
	}
}

echo "<h6 style='width: 500px;'>Send Authorization Packet</h6>";

/////////////////////////////   start - Update Event Log
require("uniqueid_row.php");
if (isset($_POST['Auth1']))
{
	$dateadd = date('Y').'-'.date('m').'-'.date('d');
	$timeadd = date('H').':'.date('i').':'.date('s');
	$notestring = $dateadd." @ ".$timeadd.": <strong>Authorization for Settlement sent via ".$sendhow.".</strong><br>".$notelog;
	$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
}
require("uniqueid_row.php");
if (isset($_POST['Auth2']))
{
	$dateadd = date('Y').'-'.date('m').'-'.date('d');
	$timeadd = date('H').':'.date('i').':'.date('s');
	$notestring = $dateadd." @ ".$timeadd.": <strong>Authorization for Release of Personnel Records sent via ".$sendhow.".</strong><br>".$notelog;
	$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
}
require("uniqueid_row.php");
if (isset($_POST['Feewaiver']))
{
	$dateadd = date('Y').'-'.date('m').'-'.date('d');
	$timeadd = date('H').':'.date('i').':'.date('s');
	$notestring = $dateadd." @ ".$timeadd.": <strong>Fee Waiver sent via ".$sendhow.".</strong><br>".$notelog;
	$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
}
require("uniqueid_row.php");
/////////////////////////////   end - Update Event Log

echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' width='330px' style='float: right;'";
if (isset($authformsent))
{
	if ($authformsent != '')// -open- if auth1 has been sent
	{
		echo "<tr><td>";
		echo "Authorization for Settlement sent on ".$authformsentdate.".";
		echo "</td></tr>";
	}//  -close- if auth1 has been sent
}
if (isset($authformsent2))
{
	if ($authformsent2 != '')// -open- if auth2 has been sent
	{
		echo "<tr><td>";
		echo "Authorization for Release of Personnel Records sent on ".$authformsentdate2.".";
		echo "</td></tr>";
	}//  -close- if auth2 has been sent
}
if (isset($feewaiversent))
{
	if ($feewaiversent != '')// -open- if feewaiversent has been sent
	{
		echo "<tr><td>";
		echo "Fee Waiver sent on ".$feewaiversentdate.".";
		echo "</td></tr>";
	}//  -close- if feewaiversent has been sent
}
echo "</table>";

if (!empty($sendhow))
{
//	echo "<div class='update'>";
//	echo "Packet: ".$packetcomp."<br>";
//	echo "Method: ".$sendhow;
//	echo "</div>";

	if ($sendhow == 'Mailroom')
	{
		require("makepacketmailroom.php");
		if ($auth1 == 'Auth1Set')
		{
			$qry = "authtomailroom='Yes',authtomailroomdate='$dateNOW'";
		}
		if ($auth2 == 'Auth2Set')
		{
			if (isset($qry))
			{
				$qry = $qry.",authtomailroom2='Yes',authtomailroomdate2='$dateNOW'";
			}
			else
			{
				$qry = "authtomailroom2='Yes',authtomailroomdate2='$dateNOW'";	
			}
		}
		if ($feewaiver == 'FeewaiverSet')
		{
			if (isset($qry))
			{
				$qry = $qry.",feewaivertomailroom='Yes',feewaivertomailroomdate='$dateNOW'";
			}
			else
			{
				$qry = "feewaivertomailroom='Yes',feewaivertomailroomdate='$dateNOW'";
			}
		}
		if (isset($qry))
		{
			$query = "UPDATE status set $qry WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
	}
	if ($sendhow == 'Docusign')
	{
		
		if ($auth1 == 'Auth1Set')
		{
			$qry = "authformsent='Docusign',authformsentdate='$dateNOW',authformsentmonth='$monthNOW',authformsentweek='$weekNOW'";
		}
		if ($auth2 == 'Auth2Set')
		{
			if (isset($qry))
			{
				$qry = $qry.",authformsent2='Docusign',authformsentdate2='$dateNOW',authformsentmonth2='$monthNOW',authformsentweek2='$weekNOW'";
			}
			else
			{
				$qry = "authformsent2='Docusign',authformsentdate2='$dateNOW',authformsentmonth2='$monthNOW',authformsentweek2='$weekNOW'";	
			}
		}
		if ($feewaiver == 'FeewaiverSet')
		{
			if (isset($qry))
			{
				$qry = $qry.",feewaiversent='Docusign',feewaiversentdate='$dateNOW',feewaiversentmonth='$monthNOW',feewaiversentweek='$weekNOW'";
			}
			else
			{
				$qry = "feewaiversent='Docusign',feewaiversentdate='$dateNOW',feewaiversentmonth='$monthNOW',feewaiversentweek='$weekNOW'";
			}
		}
		if (isset($qry))
		{
			$query = "UPDATE status set $qry WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
		if(!isset($qry))
		{
		}
		else
		{
		require("email_docusign_packet_link.php");
		}
	}
}

/////////////////////////////   start - added by Dr. MR to treat a broken tail :(
if (empty($authformsent)) $authformsent = '';
if (empty($authformsent2)) $authformsent2 = '';
if (empty($feewaiversent)) $feewaiversent = '';
/////////////////////////////   end - tail all better!!! 

if ($longformDONE == 'Yes')
{	
	echo "<table class='clientProfileTable' cellspacing='6' cellpadding='2' align='left' border='0'>";
		echo "<tr>";
			echo "<td colspan='3'>";
				formstart('sendpacket.php?uniqueid='.$uniqueid);
			//		echo "<p>";
					if(!isset($email))
					{
						echo "Email address is not set.";
					}
					else
					{
						if(($email != ''))
						{
							radiobuttonmake2('sendhow','Docusign','Docusign');
						}
						else
						{
							echo "Email address is not set.";
						}
					}
					radiobuttonmake2('sendhow','Mailroom','Mailroom');
			//		echo "</p>";
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				checkboxmake2('Auth1','Auth1','Authorization for Settlement','');
			echo "</td>";
			echo "<td style='text-align: center;'>";
				checkboxmake2('Auth2','Auth2','Authorization for Release of Personnel Records','');
			echo "</td>";
			echo "<td style='text-align: right;'>";
				checkboxmake2('Feewaiver','Feewaiver','Fee Waiver','');
				if(isset($authaccept))
				{
					echo '<script type="text/javascript">';
					echo 'document.getElementById("Auth1").disabled="true";';
					echo '</script>';
				}
				if(isset($authaccept2))
				{
					echo '<script type="text/javascript">';
					echo 'document.getElementById("Auth2").disabled="true";';
					echo '</script>';
				}
				if(isset($feewaiveraccept))
				{
					echo '<script type="text/javascript">';
					echo 'document.getElementById("Feewaiver").disabled="true";';
					echo '</script>';
				}
				if (isset($feewaivequal))
				{
					if ($feewaivequal != 'Yes')
					{
						echo '<script type="text/javascript">';
						echo 'document.getElementById("Feewaiver").disabled="true";';
						echo '</script>';
					}
				}
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
//				echo "<input type='hidden' name='oldinfo' value='".$authformsent." ".$authformsent2." ".$feewaiversent."'>" ;
//				echo "<input type='hidden' name='oldauthformsent' value='".$authformsent."'>" ;
//				echo "<input type='hidden' name='oldauthformsent' value='".$authformsent2."'>" ;
//				echo "<input type='hidden' name='oldauthformsent' value='".$feewaiversent."'>" ;
				formend('Submit');
			echo "</td>";
			echo "<td colspan='2' style='text-align: right;'>";
				if(isset($feewaiverqualified))
				{
					if($feewaiverqualified == 'Yes')
					{
						echo "<h3>Qualified for Fee Waiver.</h3>";
					}
				}
				else
				{
					echo "<h3>Does not qualify for Fee Waiver.</h3>";
					echo '<script type="text/javascript">';
					echo 'document.getElementById("Feewaiver").disabled="true";';
					echo '</script>';				
				}
			echo "</td>";
		echo "</tr>";
	echo "</table>";


}
else
{
	echo '<div class="flag" style="padding: 8px 14px;">Complete the long form first.</div>';
}
?>
