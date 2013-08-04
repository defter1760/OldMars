
<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

?>

<?PHP


bgimg('./img/contactinfo_white.png');
#bgimg('./img/contactinfo.png');
if (isset($_POST['FirstName'])){
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
updaterow('donotcontact',$notqualified,$uniqueid,$conn);

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
if (isset($_POST['agentlname'])){
updaterow('agentlname',$agentlname,$uniqueid,$conn);
updaterowdata('agentlname',$agentlname,$uniqueid,$conn);
}
require("uniqueid_row.php");
if (isset($_POST['notqualifiedreason']))
{
    $notqualifiedreason = $_POST['notqualifiedreason'];

        if ($declinationlettersent == 'Yes')
        {
            
        }
        else
        {
        require("iansmakepdfdecline.php");
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
        makedeclinationletter($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName,$Street1,$Street2,$City,$State,$Zipcode,$RecipientName2,$RecipientEmail2);
    
        $attachment2  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Declination Letter - '.$uniqueid.'.pdf';
		$mailroom = 'MassAction_Mailroom@initiativelegal.com';
		$mailroomname = 'Mass Action Mailroom';
        #require("email_mailroom_retainer.php");
        echo "<td>";
        
        echo "</td>";
         require("email_mailroom_declination.php");
         echo "<div align=right><br>".$agentlname."Emailed to Mailroom -- OK&nbsp;&nbsp;&nbsp;</div>";
        updaterow('declinationlettersent','Yes',$uniqueid,$conn);
        }
}

?>
<?PHP
echo "<br>";
echo "<br>";
echo "<table cellspacing='1px' align='right' border='0'>";
echo "<tr >";

formstart("contact.php?uniqueid=".$uniqueid);
echo "<td align='left'>";
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

echo "<td align='left'>";

if (isset($notqualified))
{
echo "<div class='dncbody'>";
    checkboxmake('notqualified','Yes','',$notqualified);
    	echo "<font size='2'>";
echo "Not qualified:&nbsp;&nbsp;&nbsp;&nbsp;</font>";
echo "<br>";
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
    //echo "<br>";
    //echo $question;
    //echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($notqualifiedreason) && $notqualifiedreason == $value ? 'selected=selected' : '';
	#echo "<option name='agentlname' value='Milford'>Peter Milford</option>";
        echo '<option name="'. $name .'" value="'. $value .'" '. $checked .'" /> '. $value;
	#echo "<br>";
    }
}
echo "</select>";
echo "</div>";
}
else
{
    checkboxmake('notqualified','Yes',' Not qualified',$notqualified);
}

echo "</td>";

echo "</tr>";
echo "</table>";
echo "<table cellspacing='10px' border='0'>";
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
textfieldmake('Email',$email,'30','email');
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table cellspacing='10px' border='0'>";
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
if (empty($agentlname)){
	agentdropdown();
	}
else
	{
	textfieldmakenoupdate(' Case Attorney',$agentlname,'13');
	}
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<table cellspacing='1px' align='right' border='0'>";
echo "<tr >";

#formstart("contact.php?uniqueid=".$uniqueid);

echo "<td >";
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

echo "&nbsp;&nbsp;&nbsp;";
echo "</td>";
echo "<td width='418px'>";
echo "</td>";
echo "<td >";
formend('Update Contact Information');
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<div align='right'>";

echo "&nbsp;&nbsp;&nbsp;";
echo "</div>";
?>

