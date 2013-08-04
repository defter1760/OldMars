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
	//bgimg('./img/sendretainer_grey.png');
	
#	echo 'class="done"';

echo "<body class='done'>";

}
else
{
	if (isset($retainerSent))
	{
		#bgimg('./img/sendretainer_grey2.png');
		echo "<body class='done'>";
	}
	else
	{
		#bgimg('./img/sendretainer_white.png');
	}
}

if (isset($shortFormCompleteOnline)) 
{
	if($shortFormCompleteOnline == 'Yes')
	{
		$shortFormComplete= 'Yes';
	}
}
if (isset($shortFormCompletePhone))
    {
	if($shortFormCompletePhone == 'Yes')
	{
	$shortFormComplete= 'Yes';
	}
    }

echo "<h6>Send Attorney-Client Agreement</h6>";
if(!isset($retainerRecieved))
{
	$retainerRecieved = ''; 
}

if (empty($retainersentviamail)) $retainersentviamail = '';
if (isset($shortFormComplete))
{
	if (!isset($retaineraccept))
	{//require Attorney-Client Agreement not already accepted -- wrap whole page
	echo "<div align='right'>";
	echo "<table class='clientProfileTable' cellspacing='2' cellpadding='0' align='right' border='0' width='600px'>";
	formstart("send_retainer.php?uniqueid=".$uniqueid);
	echo "<tr >";
		if ($retainerRecieved == 'Docusigned')
		{
			echo "<td align='left' valign='top'>";
			echo "<strong>Attorney-Client Agreement was docusigned by ".$FirstName.' '.$LastName.' on '.$retainerRecievedDate.'.</strong>';
			echo "</td >";
		}
		if ($retainerRecieved !== 'Docusigned')
		{
			if (isset($retainerSent)) 
			{
				if ($retainerSent == 'Docusign')
				{
					echo "<td align='left' valign='top'";
					echo "<strong>Sent via docusign on ".$retainerSentDate.".</strong>";
					echo "</td >";
				}
				if ($retainersentviamail == 'Yes')	
				{
					echo "<td align='left' valign='top'>";
					echo "<strong>Sent via mailroom on ".$retainersentviamaildate.".</strong>";
					echo "</td >";
				}
				if ($retainersentviamail != 'Yes')
				{
					if ($retainerSent != 'Docusign')
					{
						echo "<td align='left' valign='top'>";
						echo "<strong>Sent on ".$retainerSentDate.".</strong>";
						echo "</td >";
					}
				}
				
			}
			if (isset($retainertomailroom))
			{
				if ($retainertomailroom = 'Yes')
				{
					echo "<td align='left' valign='top'>";
					echo "<strong>Sent to mailroom on ".$retainertomailroomdate.".</strong>";
					echo "</td >";
				}
			}
			
		}
		
		if (!isset($agentlname))
		{//open-if no agent set
		echo "<td valign='top'>";
		echo "<div class='flag'>";
		#echo '<meta http-equiv="refresh" content="5">';
		echo "There is no Attorney set for ".$FirstName.' '.$LastName.' yet. Set an Attorney above to enable Attorney-Client Agreement sending.';
		echo "</div>";
		echo "</td >";
		}//close-no agent set but Attorney-Client Agreement sent
		else
		{//if Attorney-Client Agreement sent and aget is set
			if (isset($_POST['emailretainer'])) 
			{//-open-if you clicked send email Attorney-Client Agreement and hit GO-show the box is selected
			if ($_POST['emailretainer'] == 'Yes')
				{
					echo "<td valign='top'>";
					checkboxmake('emailretainer','Yes','Email Attorney-Client Agreement Docusign','Yes');
					echo "</td >";
				}
			}//-close-if you clicked send email Attorney-Client Agreement and hit GO-show the box is selected
			else
			{//else show the box empty
			echo "<td valign='top'>";
			if (!isset($email))
				{
				echo "Email address not set.";
				}
				else
				{		
				checkboxmake('emailretainer','Yes','Email Attorney-Client Agreement Docusign','No');
				}
			echo "</td >";
			}
			if (isset($_POST['snailretainer'])) 
			{//-open-if you clicked send snail Attorney-Client Agreement and hit GO-show the box is selected
				if ($_POST['snailretainer'] == 'Yes')
				{
					echo "<td valign='top'>";
					checkboxmake('snailretainer','Yes','Send Attorney-Client Agreement via mailroom','Yes');
					echo "</td >";
				}
			}//-close-if you clicked send snail Attorney-Client Agreement and hit GO-show the box is selected
			else
			{//else show the box empty
				echo "<td valign='top'>";
				checkboxmake('snailretainer','Yes','Send Attorney-Client Agreement via mailroom','No');
				echo "</td >";
			}
			//echo "&nbsp;&nbsp;&nbsp;";
			//echo "</tr>";
			#require("iansmakepdf.php");
			require("iansmakeproperretainer.php");
			//echo "<tr>";
	
			#makeretainer($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName);
			#require("iansmakepdf_coverletter.php");
			
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
				
	/////////////////////////////   start - added by Dr. MR to treat a broken tail :(
	if (empty($brand)) $brand = '';
	if (empty($uniqueid)) $uniqueid = '';
	if (empty($FirstName)) $FirstName = '';
	if (empty($LastName)) $LastName = '';
	if (empty($RecipientName2)) $RecipientName2 = '';
	if (empty($Street1)) $Street1 = '';
	if (empty($Street2)) $Street2 = '';
	if (empty($City)) $City = '';
	if (empty($State)) $State = '';
	if (empty($Zipcode)) $Zipcode = '';
	/////////////////////////////   end - tail all better!!! 
	
			#makeretainercoverletter($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName,$Street1,$Street2,$City,$State,$Zipcode,$RecipientName2,$RecipientEmail2);
			#makeretainercoverletterrejected($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName,$Street1,$Street2,$City,$State,$Zipcode,$RecipientName2,$RecipientEmail2);
			#makeretainerbulk($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName,$RecipientName2,$RecipientEmail2,$Street1,$Street2,$City,$State,$Zipcode);
			
	#		$Email = $email;
			if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
			{
				$RecipientName2 = "Ian Hutchings";
				$RecipientEmail2 = "ihutchings@preferredlegalsupport.com";
				echo "<td valign='top'>";
	#			require("docusign_retainer.php");
				echo "Emailed to Prospect -- OK ";
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
				$attachment  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Retainer - '.$uniqueid.'.pdf';
	#			$attachment2  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Retainer Cover Letter - '.$uniqueid.'.pdf';
			$mailroom = 'MassAction_Mailroom@initiativelegal.com';
			$mailroomname = 'Mass Action Mailroom';
				require("email_mailroom_retainer.php");
				echo "<td valign='top'>";
				echo "Emailed to Mailroom -- OK";
				echo "</td>";
			}
			else
			{
			echo "<td>";
			echo "</td>";
			}
			if (isset($_POST['snailretainer'])) if ($_POST['snailretainer'] == 'Yes') if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes')
			{
				$eventnote = 'Attorney-Client Agreement sent to Mailroom and Emailed Docusign';
				logthisevent($eventnote,$conn,$notelog,$uniqueid);
			}
			if (isset($_POST['snailretainer'])) if ($_POST['snailretainer'] == 'Yes') if (!isset($_POST['emailretainer']))
			{
				$eventnote = 'Attorney-Client Agreement sent to Mailroom';
				logthisevent($eventnote,$conn,$notelog,$uniqueid);
			}
			if (isset($_POST['emailretainer'])) if ($_POST['emailretainer'] == 'Yes') if (!isset($_POST['snailretainer']))
			{
				$eventnote = 'Attorney-Client Agreement Emailed with Docusign';
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
			echo "<td align='right' valign='top'>";
			formend('Update');
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";
				
		}
	}
	else//if the Attorney-Client Agreement is already accepted
	{
		echo "<div align='right'>";
		echo "<table class='clientProfileTable' cellspacing='2' cellpadding='0' align='right' border='0' width='600px'>";
		echo "<tr >";
		echo "<td valign='top'>";
		echo "<div class='flag'>Attorney-Client Agreement already accepted. Unable to re-send Attorney-Client Agreement if already accepted.</div";
		echo "</td>";
		echo "</tr >";
		echo "</table>";
		
	}

} // end $shortFormComplete if
else
{
	echo '<div class="flag" style="padding: 8px 14px;">Complete the short form first.</div>';
}
?>
