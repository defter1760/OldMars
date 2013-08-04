<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
?>

<?PHP
echo "<h6>Contact Information</h6>";
if (isset($_POST['FirstName']))
{
	updaterow('FirstName',$FirstName,$uniqueid,$conn);
	updaterow('LastName',$LastName,$uniqueid,$conn);
	if (isset($_POST['1phone']))   $phone1 = $_POST['1phone'];
	if (empty($phone1))
	{
		unset($phone1);
	}
	else
	{
		//strip single quote
		if(strstr($phone1,'\''))
		{
		    $phone1 = str_replace('\'','',$phone1);
		}
		//strip tab
		if(strstr($phone1,'	'))
		{
		    $phone1 = str_replace('	','',$phone1);
		}
		//strip double quote
		if(strstr($phone1,'\"'))
		{
		    $phone1 = str_replace('\"','',$phone1);
		}	
		//strip percentage
		if(strstr($phone1,'%'))
		{
		    $phone1 = str_replace('%','',$phone1);
		}
		//strip asterisk
		if(strstr($phone1,'*'))
		{
		    $phone1 = str_replace('*','',$phone1);
		}
		//strip underscore
		if(strstr($phone1,'_'))
		{
		    $phone1 = str_replace('_','',$phone1);
		}
		//strip ampersand
		if(strstr($phone1,'&'))
		{
		    $phone1 = str_replace('\'','',$phone1);
		}	
		//strip dash
		if(strstr($phone1,'-'))
		{
		    $phone1 = str_replace('-','',$phone1);
		}
		//strip space
		if(strstr($phone1,' '))
		{
		    $phone1 = str_replace(' ','',$phone1);
		}
		//strip comma
		if(strstr($phone1,','))
		{
		    $phone1 = str_replace(',','',$phone1);
		}
		//strip period
		if(strstr($phone1,'.'))
		{
		    $phone1 = str_replace('.','',$phone1);
		}
		//strip parenthasis open
		if(strstr($phone1,'('))
		{
			$phone1 = preg_replace('/\(|\)/','',$phone1);
		}
		//strip parenthasis close
		if(strstr($phone1,')'))
		{
			$phone1 = preg_replace('/\(|\)/','',$phone1); 
		}
	}
	updaterow('phone1',$phone1,$uniqueid,$conn);
	if (isset($_POST['2phone']))   $phone1 = $_POST['2phone'];
	if (empty($phone2))
	{
		unset($phone2);
	}
	else
	{
		//strip single quote
		if(strstr($phone2,'\''))
		{
		    $phone2 = str_replace('\'','',$phone2);
		}
		//strip tab
		if(strstr($phone2,'	'))
		{
		
		    $phone2 = str_replace('	','',$phone2);
		}
		//strip double quote
		if(strstr($phone2,'\"'))
		{
		    $phone2 = str_replace('\"','',$phone2);
		}	
		//strip percentage
		if(strstr($phone2,'%'))
		{
		    $phone2 = str_replace('%','',$phone2);
		}
		//strip asterisk
		if(strstr($phone2,'*'))
		{
		    $phone2 = str_replace('*','',$phone2);
		}
		//strip underscore
		if(strstr($phone2,'_'))
		{
		    $phone2 = str_replace('_','',$phone2);
		}
		//strip ampersand
		if(strstr($phone2,'&'))
		{
		    $phone2 = str_replace('\'','',$phone2);
		}	
		//strip dash
		if(strstr($phone2,'-'))
		{
		    $phone2 = str_replace('-','',$phone2);
		}
		//strip space
		if(strstr($phone2,' '))
		{
		    $phone2 = str_replace(' ','',$phone2);
		}
		//strip comma
		if(strstr($phone2,','))
		{
		    $phone2 = str_replace(',','',$phone2);
		}
		//strip period
		if(strstr($phone2,'.'))
		{
		    $phone2 = str_replace('.','',$phone2);
		}
		//strip parenthasis open
		if(strstr($phone2,'('))
		{
			$phone2 = preg_replace('/\(|\)/','',$phone2);
		}
		//strip parenthasis close
		if(strstr($phone2,')'))
		{
			$phone2 = preg_replace('/\(|\)/','',$phone2); 
		}
	}
	
	/////////////////////////////   start - added by Dr. MR to treat a broken tail :(
	if (empty($donotcontact)) $donotcontact = '';
	if (empty($notqualified)) $notqualified = '';
	if (empty($notqualifiedreason)) $notqualifiedreason = '';
	if (empty($addressisundeliverable)) $addressisundeliverable = '';
	if (empty($FirstName)) $FirstName = '';
	if (empty($LastName)) $LastName = '';
	if (empty($phone1)) $phone1 = '';
	if (empty($phone2)) $phone2 = '';
	if (empty($fax)) $fax = '';
	if (empty($email)) $email = '';
	if (empty($Street1)) $Street1 = '';
	if (empty($Street2)) $Street2 = '';
	if (empty($City)) $City = '';
	if (empty($State)) $State = '';
	if (empty($Zipcode)) $Zipcode = '';
	/////////////////////////////   end - tail all better!!! 
	
	updaterow('phone2',$phone2,$uniqueid,$conn);
	
	updaterow('fax',$fax,$uniqueid,$conn);
	updaterow('email',$email,$uniqueid,$conn);
	updaterow('Street1',$Street1,$uniqueid,$conn);
	updaterow('Street2',$Street2,$uniqueid,$conn);
	updaterow('City',$City,$uniqueid,$conn);
	updaterow('State',$State,$uniqueid,$conn);
	updaterow('Zipcode',$Zipcode,$uniqueid,$conn);
	updaterow('donotcontact',$donotcontact,$uniqueid,$conn);
	updaterow('notqualified',$notqualified,$uniqueid,$conn);
	updaterow('notqualifiedreason',$notqualifiedreason,$uniqueid,$conn);
	//updaterow('donotcontact',$notqualified,$uniqueid,$conn);
#	updaterow('addressisundeliverable',$addressisundeliverable,$uniqueid,$conn);
	
	updaterowdata('1WhoFirstName',$FirstName,$uniqueid,$conn);
	updaterowdata('1WhoLastName',$LastName,$uniqueid,$conn);
	updaterowdata('1CallBackNum',$phone1,$uniqueid,$conn);
	updaterowdata('3SecondaryNumber',$phone2,$uniqueid,$conn);
	updaterowdata('3Fax',$fax,$uniqueid,$conn);
	updaterowdata('3Email',$email,$uniqueid,$conn);
	updaterowdata('3StreetLine1',$Street1,$uniqueid,$conn);
	updaterowdata('3StreetLine2',$Street2,$uniqueid,$conn);
	updaterowdata('3HomeCity',$City,$uniqueid,$conn);
	updaterowdata('3HomeState',$State,$uniqueid,$conn);
	updaterowdata('3Zipcode',$Zipcode,$uniqueid,$conn);
}
if (isset($agentlname))
{
	if (isset($_POST['agentlname']))
	{
		updaterow('agentlname',$agentlname,$uniqueid,$conn);
		updaterowdata('agentlname',$agentlname,$uniqueid,$conn);
	}
}

if (isset($notqualified))   // OPEN - update DNC based on not qualified reason
{
	if ($notqualified == 'Yes')
	{
		if ($notqualifiedreason == 'Already represented')
		{
			updaterow('donotcontact','Yes',$uniqueid,$conn);
			updaterow('notqualified_retained','Yes',$uniqueid,$conn);
			require("uniqueid_row.php");
		}
                if ($notqualifiedreason == 'Does not want to participate')
		{
			updaterow('donotcontact','Yes',$uniqueid,$conn);
			updaterow('notqualified_retained','Yes',$uniqueid,$conn);
			require("uniqueid_row.php");
		}
	}
}   // CLOSE - update DNC based on not qualified reason

require("uniqueid_row.php");

?>

<?PHP
$dateadd = date('Y').'-'.date('m').'-'.date('d');
$timeadd = date('H').':'.date('i').':'.date('s');
   
/////////////////////////////   start - added by Dr. MR to treat a broken tail :(
if (empty($donotcontact)) $donotcontact = '';
if (empty($notqualified)) $notqualified = '';
if (empty($notqualifiedreason)) $notqualifiedreason = '';
if (empty($addressisundeliverable)) $addressisundeliverable = '';
if (empty($FirstName)) $FirstName = '';
if (empty($LastName)) $LastName = '';
if (empty($phone1)) $phone1 = '';
if (empty($phone2)) $phone2 = '';
if (empty($fax)) $fax = '';
if (empty($email)) $email = '';
if (empty($Street1)) $Street1 = '';
if (empty($Street2)) $Street2 = '';
if (empty($City)) $City = '';
if (empty($State)) $State = '';
if (empty($Zipcode)) $Zipcode = '';
/////////////////////////////   end - tail all better!!! 


/////////////////////////////   start - Update Event Log
if (isset($_POST['donotcontact']))
{
	if (isset($_POST['olddonotcontact']))
	{
		if ($_POST['donotcontact'] != $_POST['olddonotcontact'])
		{
			if ($_POST['donotcontact'] == 'Yes')
			{
				$newnote = "<strong>Contact information updated.</strong> Added to Do Not Contact list.";
				$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
				$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
			}
		}
	}
}
if (!isset($_POST['donotcontact']))
{
	if (isset($_POST['olddonotcontact']))
	{

		if ($_POST['olddonotcontact'] == 'Yes')
		{
			$newnote = "<strong>Contact information updated.</strong> Removed from Do Not Contact list.";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
	}
}

$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$notelog = $row['notelog'];
	}		
if (isset($_POST['notqualified']))
{
	if (isset($_POST['oldnotqualified']))
	{		
		if ($_POST['notqualified'] != $_POST['oldnotqualified'])
		{
			if ($_POST['notqualified'] !== 'Yes')
			{
				$newnote = "<strong>Contact information updated.</strong> Removed from Not Qualified list.";
				$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
				$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
			}
		}
	}
}
$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$notelog = $row['notelog'];
	}	
if (isset($_POST['notqualifiedreason']))
{
	if (isset($_POST['oldnotqualifiedreason']))
	{		
		if ($_POST['notqualifiedreason'] != $_POST['oldnotqualifiedreason'])
		{
			if ($_POST['notqualifiedreason'] != '')
			{
				if ($_POST['notqualifiedreason'] != 'NULL')
				{
					$newnote = "<strong>Contact information updated.</strong> Added to Not Qualified list. <strong>Reason:</strong>&nbsp;" .$notqualifiedreason;
					$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
					$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
					$results = sqlsrv_query($conn,$query);
				}
			}
		}
	}
}
$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$notelog = $row['notelog'];
	}
if (isset($_POST['notqualifiedreason']))
{
	if (isset($_POST['oldnotqualifiedreason']))
	{		
		if ($_POST['notqualifiedreason'] != $_POST['oldnotqualifiedreason'])
		{
			if ($_POST['notqualifiedreason'] == 'Already represented')
			{
				$newnote = "<strong>Contact information updated.</strong> Added to Do Not Contact list.";
				$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
				$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
			}
		}
	}
}
$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$notelog = $row['notelog'];
	}
	

	if(!isset($_POST['addressisundeliverable']))
	{
		if (isset($_POST['oldaddressisundeliverable']))
		{
		$oldaddy = $_POST['oldaddressisundeliverable'];
	}
	if (isset($oldaddy))
	{
			if ($oldaddy == 'Yes')
			{
				$newnote = "<strong>Contact information updated.</strong> Removed from Undeliverable list.";
				$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
				$query = "UPDATE status set notelog='$notestring',addressisundeliverable='' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
			}
	}
}
$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$notelog = $row['notelog'];
	}
if (isset($_POST['FirstName']))
{
	if (isset($_POST['oldfname']))
	{		
		if ($_POST['FirstName'] != $_POST['oldfname'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old FirstName:".$_POST['oldfname'].". New FirstName:".$_POST['FirstName']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		} 
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['LastName']))
{
	if (isset($_POST['oldlname']))
	{		
		if ($_POST['LastName'] != $_POST['oldlname'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old LastName:".$_POST['oldlname'].". New LastName:".$_POST['LastName']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['phone1']))
{
	if (isset($_POST['oldphone1']))
	{		
		if ($_POST['phone1'] != $_POST['oldphone1'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old Phone1:".$_POST['oldphone1'].". New Phone1:".$_POST['oldphone1']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['phone2']))
{
	if (isset($_POST['oldphone2']))
	{		
		if ($_POST['phone2'] != $_POST['oldphone2'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old Phone2:".$_POST['oldphone2'].". New Phone2:".$_POST['phone2']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['fax']))
{
	if (isset($_POST['oldfax']))
	{		
		if ($_POST['fax'] != $_POST['oldfax'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old Fax:".$_POST['oldfax'].". New Fax:".$_POST['fax']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['email']))
{
	if (isset($_POST['oldemail']))
	{		
		if ($_POST['email'] != $_POST['oldemail'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old Email:".$_POST['oldemail'].". New Email:".$_POST['email']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);        
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['Street1']))
{
	if (isset($_POST['oldstreet1']))
	{		
		if ($_POST['Street1'] != $_POST['oldstreet1'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old Street1:".$_POST['oldstreet1'].". New Street1:".$_POST['Street1']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['Street2']))
{
	if (isset($_POST['oldstreet2']))
	{		
		if ($_POST['Street2'] != $_POST['oldstreet2'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old Street2:".$_POST['oldstreet2'].". New Street2:".$_POST['Street2']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);    
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['City']))
{
	if (isset($_POST['oldcity']))
	{		
		if ($_POST['City'] != $_POST['oldcity'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old City:".$_POST['oldcity'].". New City:".$_POST['City']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);     
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['State']))
{
	if (isset($_POST['oldstate']))
	{		
		if ($_POST['State'] != $_POST['oldstate'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old State:".$_POST['oldstate'].". New State:".$_POST['State']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);     
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
if (isset($_POST['Zipcode']))
{
	if (isset($_POST['oldzipcode']))
	{		
		if ($_POST['Zipcode'] != $_POST['oldzipcode'])
		{
			$newnote = "<strong>Contact information updated.</strong> Old Zip Code:".$_POST['oldzipcode'].". New Zip Code:".$_POST['Zipcode']."";
			$notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
			$query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		}
		$query = "SELECT notelog FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
	}
}
		
/////////////////////////////   end - Update Event Log
		

						
						
echo "<table class='clientProfileTable clear' width='100%' cellspacing='2' cellpadding='4' align='left' >";
	echo "<tr >";
	formstart("contact.php?uniqueid=".$uniqueid);
	$query = "SELECT addressisundeliverable FROM Status WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$addressisundeliverableNow = $row['addressisundeliverable'];
	}
	if (isset($addressisundeliverableNow))
	{
		if ($addressisundeliverableNow == 'Yes')
		{
			echo "<td width='140px'>";
				checkboxmake('addressisundeliverable','Yes',' Undeliverable',$addressisundeliverableNow); 
			echo "</td>";
		}
	}
	
	echo "<td width='150px'>";
		if (isset($donotcontact))
		{
			echo "<div class='dncbody'>";
			    checkboxmake('donotcontact','Yes',' Do not contact',$donotcontact); 
			echo "</div>";
		}
		else
		{
		    checkboxmake('donotcontact','Yes',' Do not contact',$donotcontact);
		    
		}
	echo "</td>";
	echo "<td width='270px'>";
		if (isset($notqualified))
		{
			echo "<div class='dncbody'>";
				checkboxmake('notqualified','Yes','',$notqualified);
				echo "Not qualified:";
				echo "<div id='notQualifiedSelect' style='float: right; padding-top: 2px;'>";
					echo "<select name='notqualifiedreason' style='font-size:10px'>";
					echo "<option name='notqualifiedreason' > </option>";
					$radio = array(
					    'notqualifiedreason' => array(
					'No claims',
					'Already represented',
					'Does not want to participate',
					'Never worked at Macys',
					    )
					);
					foreach($radio as $name => &$values)
					{
					    foreach($values as &$value)
					    {
						$checked = isset($notqualifiedreason) && $notqualifiedreason == $value ? 'selected=selected' : '';
						echo '<option name="'. $name .'" value="'. $value .'" '. $checked .' /> '. $value;
					    }
					}
					echo "</select>";
				echo "</div>";
			echo "</div>";
		}
		else
		{
		    checkboxmake('notqualified','Yes',' Not qualified',$notqualified);
		}
	echo "</td>";
	echo "<td>";
	echo "</td>";
	echo "</tr>";
echo "</table>";
echo "<table class='clientProfileTable clear' cellspacing='2' cellpadding='2' border='0'>";
	echo "<tr>";
		echo "<td>";
			textfieldmake('First Name',$FirstName,'15','FirstName');
		echo "</td>";
		echo "<td>";
			textfieldmake('Last Name',$LastName,'15','LastName');
		echo "</td>";
		echo "<td>";
			textfieldmake('Phone 1',$phone1,'11','phone1');
		echo "</td>";
		echo "<td>";
			if (isset($phone2))
			{
				textfieldmake('Phone 2',$phone2,'11','phone2');
			}
			else
			{
				textfieldmake('Phone 2','','11','phone2');
			}
		echo "</td>";
		echo "<td>";
			if (isset($fax))
			{
				textfieldmake('Fax',$fax,'11','fax');
			}
			else
			{
				textfieldmake('Fax','','11','fax');
			}
		echo "</td>";
		echo "<td>";
			textfieldmake('Email',$email,'25','email');
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			textfieldmake(' Street 1',$Street1,'','Street1');
		echo "</td>";
		echo "<td>";
			textfieldmake(' Street 2',$Street2,'5','Street2');
		echo "</td>";
		echo "<td>";
			textfieldmake(' City',$City,'10','City');
		echo "</td>";
		echo "<td>";
			textfieldmake(' State',$State,'5','State');
		echo "</td>";
		echo "<td>";
			textfieldmake(' Zipcode',$Zipcode,'8','Zipcode');
		echo "</td>";
		echo "<td>";
			if (empty($agentlname))
			{
				agentdropdown();
			}
			else
			{
				textfieldmakenoupdate(' Case Attorney',$agentlname,'13');
			}
		echo "</td>";
	echo "</tr>";
	if (isset($addressisundeliverable))
	{	
		if ($addressisundeliverable == 'Yes')
		{	
			echo "<tr><td>";
			echo "<strong><em>Address is Undeliveralbe</em></strong>";
			echo "</td></tr>";
		}
	}
echo "</table>";
echo "<table class='clientProfileTable clear' cellpadding='2 cellspacing='2' align='left' width='100%'>";
	echo "<tr >";
		echo "<td width='150px'>";
			textfieldmakenoupdate(' Unique ID',$uniqueid,'20');
		echo "</td>";
		echo "<td >";
			if (isset($barcode))
			{
			    textfieldmakenoupdate(' Barcode #',$barcode,'20');    
			}
			else
			{
			    textfieldmakenoupdate(' Barcode #','','20');
			}
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td >";
			echo "<input type='hidden' name='oldinfo' value='".$donotcontact." ".$notqualified." ".$notqualifiedreason." ".$addressisundeliverable." ".$FirstName." ".$LastName." ".$phone1." ".$phone2." ".$fax." ".$email." ".$Street1." ".$Street2." ".$City." ".$State." ".$Zipcode."'>" ;
			echo "<input type='hidden' name='olddonotcontact' value='".$donotcontact."'>" ;
			echo "<input type='hidden' name='oldnotqualified' value='".$notqualified."'>" ;
			echo "<input type='hidden' name='oldnotqualifiedreason' value='".$notqualifiedreason."'>" ;
			echo "<input type='hidden' name='oldaddressisundeliverable' value='".$addressisundeliverable."'>" ;
			echo "<input type='hidden' name='oldfname' value='".$FirstName."'>" ;
			echo "<input type='hidden' name='oldlname' value='".$LastName."'>" ;
			echo "<input type='hidden' name='oldphone1' value='".$phone1."'>" ;
			echo "<input type='hidden' name='oldphone2' value='".$phone2."'>" ;
			echo "<input type='hidden' name='oldfax' value='".$fax."'>" ;
			echo "<input type='hidden' name='oldemail' value='".$email."'>" ;
			echo "<input type='hidden' name='oldstreet1' value='".$Street1."'>" ;
			echo "<input type='hidden' name='oldstreet2' value='".$Street2."'>" ;
			echo "<input type='hidden' name='oldcity' value='".$City."'>" ;
			echo "<input type='hidden' name='oldstate' value='".$State."'>" ;
			echo "<input type='hidden' name='oldzipcode' value='".$Zipcode."'>" ;

			
			formend('Update Contact Information');
		echo "</td>";
	echo "</tr>";
echo "</table>";

echo "<div align='right'>";
echo "</div>";
?>

