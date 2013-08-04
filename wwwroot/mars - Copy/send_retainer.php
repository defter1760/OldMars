<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
?>
<?PHP
#echo "Inside Retainer_send.php";
#bgimg('./img/sendretainer.png');
require("uniqueid_row.php");
if (isset($retaineraccept))
{
	bgimg('./img/sendretainer_grey.png');
}
else
{
	if (isset($retainerSent))
	{
		bgimg('./img/sendretainer_grey2.png');
	}
	else
	{
		bgimg('./img/sendretainer_white.png');
	}
}
if (!isset($retaineraccept))
{//require retainer not already accepted -- wrap whole page
echo "<div align='right'>";

echo "<table cellspacing='3px' align='right' border='0'>";
formstart("send_retainer.php?uniqueid=".$uniqueid);
echo "<tr >";
	if ($retainerRecieved == 'Docusigned')
	{
		echo "<td align='left'>";
		echo "<strong>Retainer was docusigned by ".$FirstName.' '.$LastName.' on '.$retainerRecievedDate.'.</strong>';
		echo "</td >";
	}
	if ($retainerRecieved !== 'Docusigned')
	{
		if (isset($retainerSent)) 
		{
			if ($retainerSent == 'Docusign')
			{
				echo "<td align='left'>";
				echo "<strong><br>Sent via docusign on ".$retainerSentDate.".</strong>";
				echo "</td >";
			}
			if ($retainersentviamail == 'Yes')	
			{
				echo "<td align='left'>";
				echo "<strong><br>Sent via mailroom on ".$retainersentviamaildate.".</strong>";
				echo "</td >";
			}
			if ($retainersentviamail != 'Yes')
			{
				if ($retainerSent != 'Docusign')
				{
					echo "<td align='left'>";
					echo "<strong><br>Sent on ".$retainerSentDate.".</strong>";
					echo "</td >";
				}
			}
			
		}
		if (isset($retainertomailroom))
		{
			if ($retainertomailroom = 'Yes')
			{
				echo "<td align='left'>";
				echo "<strong><br>Sent to mailroom on ".$retainertomailroomdate.".</strong>";
				echo "</td >";
			}
		}
		
	}
	
	if (!isset($agentlname))
	{//open-if no agent set
	echo "<td >";
	echo "<div align='left'>";
	#echo '<meta http-equiv="refresh" content="5">';
	echo "<strong><br>There is no Attorney set for ".$FirstName.' '.$LastName.' yet. Set an Attorney above to enable retainer sending.&nbsp;&nbsp;&nbsp;</strong>';
	echo "</div>";
	echo "</td >";
	}//close-no agent set but retainer sent
	else
	{//if retainer sent and aget is set
		if (isset($_POST['emailretainer'])) 
		{//-open-if you clicked send email retainer and hit GO-show the box is selected
		if ($_POST['emailretainer'] == 'Yes')
			{
				echo "<td >";
				checkboxmake('emailretainer','Yes','Email Retainer Docusign','Yes');
				echo "</td >";
			}
		}//-close-if you clicked send email retainer and hit GO-show the box is selected
		else
		{//else show the box empty
		echo "<td >";
		if (!isset($email))
		    {
			echo "Email address not set.";
		    }
		    else
		    {		
			checkboxmake('emailretainer','Yes','Email Retainer Docusign','No');
		    }
		echo "</td >";
		}
		if (isset($_POST['snailretainer'])) 
		{//-open-if you clicked send snail retainer and hit GO-show the box is selected
			if ($_POST['snailretainer'] == 'Yes')
			{
				echo "<td >";
				checkboxmake('snailretainer','Yes','Send Retainer via mailroom','Yes');
				echo "</td >";
			}
		}//-close-if you clicked send snail retainer and hit GO-show the box is selected
		else
		{//else show the box empty
			echo "<td >";
			checkboxmake('snailretainer','Yes','Send Retainer via mailroom','No');
			echo "</td >";
		}
		echo "&nbsp;&nbsp;&nbsp;";
		echo "</tr>";
		require("iansmakepdf.php");
		echo "<tr>";

		makeretainer($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName);
		require("iansmakepdf_coverletter.php");
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
		if ($brand == 'Macys')
		{
			$RecipientName3 = "VJ Chetty";
			$RecipientEmail3 = "VChetty@initiativelegal.com";
		}
		makeretainercoverletter($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName,$Street1,$Street2,$City,$State,$Zipcode,$RecipientName2,$RecipientEmail2);
		makeretainercoverletterrejected($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName,$Street1,$Street2,$City,$State,$Zipcode,$RecipientName2,$RecipientEmail2);
		$Email = $email;
		if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
		{
			$RecipientName2 = "Ian Hutchings";
			$RecipientEmail2 = "ihutchings@preferredlegalsupport.com";
			echo "<td>";
			require("docusign_retainer.php");
			echo "Emailed to Prospect -- OK &nbsp;&nbsp;&nbsp;";
			require("email_docusign_retainer_link.php");
			echo "</td>";
			
		}
		else
		{
			echo "<td>";
			echo "</td>";
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
			$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Retainer - '.$uniqueid.'.pdf';
			$attachment2  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Retainer Cover Letter - '.$uniqueid.'.pdf';
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
			require("email_mailroom_retainer.php");
			echo "<td>";
			echo "Emailed to Mailroom -- OK&nbsp;&nbsp;&nbsp;";
			echo "</td>";
		}
		else
		{
		echo "<td>";
		echo "</td>";
		}
		if (isset($_POST['snailretainer'])) if ($_POST['snailretainer'] == 'Yes') if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
		{
			$eventnote = 'Retainer sent to Mailroom and Emailed Docusign';
			logthisevent($eventnote,$conn,$notelog,$uniqueid);
		}
		if (isset($_POST['snailretainer'])) if ($_POST['snailretainer'] == 'Yes') if (!isset($_POST['emailretainer']))
		{
			$eventnote = 'Retainer sent to Mailroom';
			logthisevent($eventnote,$conn,$notelog,$uniqueid);
		}
		if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes') if (!isset($_POST['snailretainer']))
		{
			$eventnote = 'Retainer Emailed with Docusign';
			logthisevent($eventnote,$conn,$notelog,$uniqueid);
		}
		if (!isset($_POST['snailretainer'])) if (!isset($_POST['emailretainer']))
		{
		echo "<td>";
		echo "</td>";
		echo "<td>";
		echo "</td>";	
		}
		if (!isset($_POST['snailretainer'])) if (isset($_POST['emailretainer']))
		{
		echo "<td>";
		echo "</td>";	
		}
		if (isset($_POST['snailretainer'])) if (!isset($_POST['emailretainer']))
		{
		echo "<td>";
		echo "</td>";	
		}
		echo "<td align='right'>";
		formend('Update');
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
			
	}
}
else//if the retainer is already accepted
{
	echo "<div align='right'>";
	echo "<table cellspacing='3px' align='right' border='0'>";
	echo "<tr >";
	echo "<td>";
	echo "<font size='3'>Retainer already accepted. Unable to re-send retainer if already accepted.</font>";
	echo "</td>";
	echo "</tr >";
	echo "</table>";
	
}
?>
