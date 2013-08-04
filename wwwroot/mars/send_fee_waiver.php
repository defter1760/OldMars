<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

?>
<?PHP

bgcolorinner();

require("uniqueid_row.php");



if (isset($feewaiveraccept))
{
	echo "<body class='done'>";
#bgimg('./img/sendfeewaiver_grey.png');
}
else
{
	if (isset($feewaiversent))
	{
		echo "<body class='grey'>";
	#bgimg('./img/sendfeewaiver_grey2.png');
	}
	else
	{
	#bgimg('./img/sendfeewaiver_white.png');	
	}
}	
echo "<h6>Send Fee Waiver</h6>";
if (isset($retaineraccept))
{
	if (!isset($feewaiveraccept))
	{//require auth not already accepted and require Fee Waiver already be accepted -- wrap whole page
		echo "<div align='right'>";
		
		echo "<table class='clientProfileTable' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";
		formstart("send_fee_waiver.php?uniqueid=".$uniqueid);
		echo "<tr >";
		
				
		if (isset($feewaiverreceived)) if ($feewaiverreceived == 'Docusigned')
		{
			echo "<td align='left'>";
			echo "<strong>Fee Waiver was docusigned by ".$FirstName.' '.$LastName.' on '.$retainerRecievedDate.'.</strong>';
			echo "</td >";
		}
		if ($feewaiverreceived !== 'Docusigned')
		{
			if (isset($feewaiversent)) 
			{
				if ($feewaiversent == 'Docusign')
				{
					echo "<td align='left'>";
					echo "<strong><br>Sent via docusign on ".$feewaiversentdate.".</strong>";
					echo "</td >";
				}
				if ($feewaiversentviamail == 'Yes')	
				{
					echo "<td align='left'>";
					echo "<strong><br>Sent via mailroom on ".$feewaiversentviamaildate.".</strong>";
					echo "</td >";
				}
				if ($feewaiversentviamail != 'Yes')
				{
					if ($feewaiversent != 'Docusign')
					{
						echo "<td align='left'>";
						echo "Sent on ".$feewaiversentdate.".";
						echo "</td >";
					}
				}
				
			}
			if (isset($feewaivertomailroom))
			{
				if ($feewaivertomailroom = 'Yes')
				{
					echo "<td align='left'>";
					echo "<strong><br>Sent to mailroom on ".$feewaivertomailroomdate.".</strong>";
					echo "</td >";
				}
			}
			
		}
	
		
		//if (isset($feewaiversent)) 
		//{//-open-if auth sent	
		//	echo "<td >";
		//	echo "<div align='left'>";
		//	echo "<br><strong>Fee Waiver was sent to ".$FirstName.' '.$LastName.' on '.$feewaiversentdate.'.</strong>';
		//	if (isset($authformreceived)) if ($authformreceived == 'Docusigned')
		//	{//open-if auth docusigned
		//		echo "<br><strong>Fee Waiver was docusigned by ".$FirstName.' '.$LastName.' on '.$feewaiverreceiveddate.'.</strong>';
		//		echo "</div>";
		//		echo "</td >";
		//	}//close-if auth docusigned
		//}
	}
	if (!isset($feewaiveraccept))
	{
		if (!isset($agentlname))
		{//open-if no agent set
			if (isset ($feewaiversent))
			{//-open-no agent set but auth sent
				"<div align='left'>";
				echo "<strong>Fee Waiver was sent to ".$FirstName.' '.$LastName.' on '.$feewaiversentdate.'.</strong>';
				echo "</div>";
			}//-close-no agent set but auth sent
		echo "<td >";
		echo "<div align='left'>";
		echo "<strong>There is no Attorney set for ".$FirstName.' '.$LastName.' yet. Set an Attorney above to enable Fee Waiver sending.</strong>';
		echo "</div>";
		echo "</td >";
		}//close-no agent set but auth sent
		else
		{//if auth sent and aget is set
			if (isset($_POST['emailretainer'])) 
			{//-open-if you clicked send email auth and hit GO-show the box is selected
			if ($_POST['emailretainer'] == 'Yes')
				{
					echo "<td >";
					checkboxmake('emailretainer','Yes','Email Fee Waiver Docusign','Yes');
					echo "</td >";
				}
			}//-close-if you clicked send email auth and hit GO-show the box is selected
			else
			{//else show the box empty
			echo "<td >";
			if (!isset($email))
			    {
				echo "Email address not set.";
			    }
			    else
			    {				
				checkboxmake('emailretainer','Yes','Email Fee Waiver Docusign','No');
			    }
			echo "</td >";
			}
			if (isset($_POST['snailretainer'])) 
			{//-open-if you clicked send snail auth and hit GO-show the box is selected
				if ($_POST['snailretainer'] == 'Yes')
				{
					echo "<td >";
					checkboxmake('snailretainer','Yes','Send Fee Waiver via mailroom','Yes');
					echo "</td >";
				}
			}//-close-if you clicked send snail auth and hit GO-show the box is selected
			else
			{//else show the box empty
				echo "<td >";
				checkboxmake('snailretainer','Yes','Send Fee Waiver via mailroom','No');
				echo "</td >";
			}
			//echo "&nbsp;&nbsp;&nbsp;";
			echo "<td >";
			echo "</td >";
			//echo "</tr>";
			require("iansmakepdf_feewaiver.php");
			//echo "<tr>";
			makefeewaiver($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName);
			if (isset($email))
			{
				$Email = $email;
			}
			
			if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
			{
				$RecipientName2 = "Ian Hutchings";
				$RecipientEmail2 = "ihutchings@preferredlegalsupport.com";
				#require("docusign_retainer.php");
				echo "<td>";
				echo "Emailed to Prospect -- OK";
				echo "</td>";
				require("email_docusign_feewaiver_link.php");
			}
			if (isset($_POST['snailretainer'])) if ($_POST['snailretainer'] == 'Yes')
			{
if ($agentlname == 'Hutchings')
		{
		$RecipientName2 = "Ian Hutchings";
		$RecipientEmail2 = "ihutchings@initiativelegal.com";
		}
	if ($agentlname == 'Levy')
		{
		$RecipientName2 = "Sam Levy";
		$RecipientEmail2 = "slevy@initiativelegal.com";
		}
	if ($agentlname == 'Milford')
		{
		$RecipientName2 = "Peter Milford";
		$RecipientEmail2 = "pmilford@preferredlegalsupport.com";
		}
	if ($agentlname == 'Yonan')
		{
		$RecipientName2 = "Steven Yonan";
		$RecipientEmail2 = "syonan@initiativelegal.com";
		}
	if ($agentlname == 'Moore')
		{
		$RecipientName2 = "Amanda Moore";
		$RecipientEmail2 = "amoore@initiativelegal.com";
		}
	if ($agentlname == 'Alvarado')
		{
		$RecipientName2 = "Jaquelyn Alvarado";
		$RecipientEmail2 = "jalvarado@initiativelegal.com";
		}						
	//if ($agentlname == 'Martinez')
	//	{
	//	$RecipientName2 = "Marlene Martinez";
	//	$RecipientEmail2 = "mmartinez@initiativelegal.com";
	//	}
	if ($agentlname == 'Pinney')
		{
		$RecipientName2 = "Tiffany Pinney";
		$RecipientEmail2 = "tpinney@initiativelegal.com";
		}				
	if ($agentlname == 'Valero')
		{
		$RecipientName2 = "Joshua Valero";
		$RecipientEmail2 = "jvalero@initiativelegal.com";
		}
	if ($agentlname == 'Larsen')
		{
		$RecipientName2 = "Neil Larsen";
		$RecipientEmail2 = "nlarsen@initiativelegal.com";
		}
	if ($agentlname == 'Eshghieh')
		{
		$RecipientName2 = "Tina Eshghieh";
		$RecipientEmail2 = "teshghieh@initiativelegal.com";
		}
	if ($agentlname == 'Cox')
		{
		$RecipientName2 = "Heather Cox";
		$RecipientEmail2 = "hcox@initiativelegal.com";
		}
	if ($agentlname == 'Kelly')
		{
		$RecipientName2 = "Perris Kelly";
		$RecipientEmail2 = "PKelly@initiativelegal.com";
		}
	if ($agentlname == 'Bonas')
		{
		$RecipientName2 = "Kerry Bonas";
		$RecipientEmail2 = "KBonas@initiativelegal.com";
		}
		
	if ($agentlname == 'Chang')
		{
		$RecipientName2 = "Mercy Chang";
		$RecipientEmail2 = "MChang@initiativelegal.com";
		}
	if ($agentlname == 'Grether')
		{
		$RecipientName2 = "Nicholas Grether";
		$RecipientEmail2 = "NGrether@initiativelegal.com";
		}
	if ($agentlname == 'Lee')
		{
		$RecipientName2 = "Michelle Lee";
		$RecipientEmail2 = "MLee@initiativelegal.com";
		}
	if ($agentlname == 'Trejo')
		{
		$RecipientName2 = "Jose Trejo";
		$RecipientEmail2 = "JTrejo@initiativelegal.com";
		}
	if ($agentlname == 'Zak')
		{
		$RecipientName2 = "Heather Zak";
		$RecipientEmail2 = "HZak@initiativelegal.com";
		}
	if ($agentlname == 'Savoy')
		{
		$RecipientName2 = "Grant Savoy";
		$RecipientEmail2 = "GSavoy@initiativelegal.com";
		}		
				$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Feewaiver - '.$uniqueid.'.pdf';
				$mailroom = 'MassAction_Mailroom@initiativelegal.com';
				$mailroomname = 'MassAction_Mailroom';
				require("email_mailroom_feewaiver.php");
				echo "<td>";
				echo "Emailed to Mailroom -- OK<br>";
				echo "</td>";
			}
			if (isset($_POST['snailretainer'])) if ($_POST['snailretainer'] == 'Yes') if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
			{
				$eventnote = 'Fee Waiver sent to Mailroom and Emailed Docusign';
				logthisevent($eventnote,$conn,$notelog,$uniqueid);
			}
			if (isset($_POST['snailretainer'])) if ($_POST['snailretainer'] == 'Yes') if (!isset($_POST['emailretainer']))
			{
				$eventnote = 'Fee Waiver sent to Mailroom';
				logthisevent($eventnote,$conn,$notelog,$uniqueid);
			}
			if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes') if (!isset($_POST['snailretainer']))
			{
				$eventnote = 'Fee Waiver Emailed with Docusign';
				logthisevent($eventnote,$conn,$notelog,$uniqueid);
			}
			//echo "</tr>";
			//echo "<tr>";
			//echo "<td>";
			//echo "</td>";
			//echo "<td>";
			//echo "</td>";
			echo "<td>";
			echo "<div align='right'>";
			formend('Update');
			echo "</div>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";
		}
	}
	else
	{
	echo "<div align='right'>";
	echo "<table class='client3Table' cellspacing='2' cellpadding='2' align='right' border='0' width='600px'>";
	echo "<tr >";
	echo "<td>";
	echo "Fee Waiver already accepted. Unable to re-send Fee Waiver if already accepted.";
	echo "</td>";
	echo "</tr >";
	echo "</table>";
	}

}
else//if the Fee Waiver is already accepted
{
echo "<td >";
echo "<div align='right'>";
//echo "<br><br>";
echo "<strong>Fee Waiver from ".$FirstName.' '.$LastName.' has not been accepted yet. Accept the Fee Waiver to enable sending.</strong>';
echo "</div>";
echo "</td >";
}
echo "</tr >";
echo "</table>";
?>
