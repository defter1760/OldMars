<?PHP
function iframemake($page,$uniqueid,$height,$name,$border)
{
echo "<iframe name='";
echo $name;
echo "' scrolling='auto' width='100%' height='";
echo $height;
echo "' frameborder='".$border."' style='margin:auto;' src='";
echo $page;
echo "?uniqueid=";
echo $uniqueid;
echo "'></iframe>";
}
function iframemakeclean($page,$height,$name,$border)
{
echo "<iframe name='";
echo $name;
echo "' scrolling='auto' width='100%' height='";
echo $height;
echo "' frameborder='".$border."' style='margin:auto;' src='";
echo $page;
echo "'></iframe>";
}
function formstart($targetpage)
{
	echo "<form action='".$targetpage."' method='post'>";
}
function formend($text)
{
	echo "<input type='submit' value='".$text."'/>";
	echo "</form>";
}  

function checkboxmake($name,$value,$displaytext,$selected)

{
if ($selected == 'Yes')
{
echo "<INPUT TYPE = 'Checkbox' Name ='".$name."' checked='checked' value= '".$value."' />".$displaytext."";
}
else
{
echo "<INPUT TYPE = 'Checkbox' Name ='".$name."'  value= '".$value."' />".$displaytext."";
}


}
function checkboxmake2($name,$value,$displaytext,$selected)

{
if ($selected == 'Yes')
{
echo "<INPUT TYPE = 'Checkbox' Name ='".$name."' id ='".$name."' checked='checked' value= '".$value."' />".$displaytext."";
}
else
{
echo "<INPUT TYPE = 'Checkbox' Name ='".$name."' id ='".$name."' value= '".$value."' />".$displaytext."";
}


}
function textfieldmake($name,$variable,$width,$fieldname)
{
//	echo "<font size='3'>";
//echo $name.":<br></font><input type='text' style='font-size:14px' size='".$width."' value='".$variable."' name='".$fieldname."'/>";
echo $name.": <input type='text' style='font-size:14px' size='".$width."' value='".$variable."' name='".$fieldname."'/>";

}
function textfieldmakelongform($name,$variable,$width,$fieldname)
{
	echo "<font size='2'>";
	if (isset($$variable))
	{
		echo $name.":<br></font><input type='text' style='font-size:14px' size='".$width."' value='".$$variable."' name='".$fieldname."'>";	
	}
	else
	{
		echo $name.":<br></font><input type='text' style='font-size:14px' size='".$width."' name='".$fieldname."'>";
	}
}
function textfieldmaketall($name,$variable,$width,$fieldname)
{
	echo "<font size='2'>";
echo $name.":<br></font><input type='text' ROWS=3 COLS=70 class='first' style='font-size:14px' size='".$width."' value='".$variable."' name='".$fieldname."'/>";
}

function radiobuttonmake($var,$val,$description)
{
	echo "<INPUT TYPE = 'Radio' Name ='".$var."'  value= '".$val."' >".$description;
}
function radiobuttonmake2($var,$val,$description)
{
	echo "<INPUT TYPE='Radio' Name='".$var."' id='".$var."' value='".$val."'>".$description;
}
function agentdropdown()
{
	echo "<font size='2'>";
echo "Case Attorney:&nbsp;&nbsp;&nbsp;&nbsp;</font>";
echo "<br>";
echo "<select name='agentlname' style='font-size:10px'>";
echo "<option name='agentlname' selected='selected'> </option>";

$radio = array(
    'agentlname' => array(
'Alvarado',
'Cox',
'Eshghieh',
'Larsen',
'Moore',
'Pinney',
'Valero',
'Yonan',
    )
);

foreach($radio as $name => &$values)
{
    //echo "<br>";
    //echo $question;
    //echo "<br>";
    foreach($values as &$value)
    {
        #$checked = isset($DidYourJobRequireStanding) && $DidYourJobRequireStanding == $value ? ' checked' : '';
	#echo "<option name='agentlname' value='Milford'>Peter Milford</option>";
        echo '<option name="'. $name .'" value="'. $value .'"/> '. $value;
	#echo "<br>";
    }
}



}

function textfieldmakenoupdate($name,$variable,$width)
{
	echo "<font size='2'>";
echo $name.":</font><br><input type='text' style='font-size:12px' size='".$width."' value='".$variable."' />";
}

function bgcolor($colorhex)
{
echo "<body bgcolor='".$colorhex."'>";
}
function bgimg($img)
{
echo "<body  background='".$img."'>";
}
function bgcolorinner()
{
echo "<body bgcolor='ffffff'>";
}

function updaterow($postvariable,$postvardata,$uniqueid,$conn)
{
if (isset($postvariable)) 
{
	$postvariable = $postvariable;
	$var = "$postvariable";
	$vardata = $postvardata;
	if(strstr($vardata,'\''))
	{
	    $vardata = str_replace('\'','\'\'',$vardata);
	}
	if(strstr($vardata,'\"'))
	{
		$vardata = str_replace('\"','\"\"',$vardata);
	}
	if (isset($varstring))
	{
		$varstring = $varstring.",[".$var."]='".$vardata."'";
	}
	else
	{
		$varstring = "[".$var."]='".$vardata."'";
	}
	$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid') UPDATE status set $varstring WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
}
}

function updaterowdata($postvariable,$postvardata,$uniqueid,$conn)
{
if (isset($postvariable)) 
{	
	$postvariable = $postvariable;
	$var = "$postvariable";
	$vardata = $postvardata;
	if(strstr($vardata,'\''))
	{
	    $vardata = str_replace('\'','\'\'',$vardata);
	}
	if(strstr($vardata,'\"'))
	{
		$vardata = str_replace('\"','\"\"',$vardata);
	}
	if (isset($varstring))
	{
		$varstring = $varstring.",[".$var."]='".$vardata."'";
	}
	else
	{
		$varstring = "[".$var."]='".$vardata."'";
	}
	$query = "IF EXISTS (SELECT * from data WHERE status.uniqueid='$uniqueid') UPDATE data set $varstring WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
}
}

function makeretainer($brandname,$uniqueid,$FirstName,$LastName,$clientname)
{
//open
$pdf = new PDF_Code128();




$retainerhead1 = './retainers/'. "$brandname" . 'RetainerHead1.txt';
$retainerhead2 = './retainers/'. "$brandname" . 'RetainerHead2.txt';
$retainerhead3 = './retainers/'. "$brandname" . 'RetainerHead3.txt';
$retainerhead4 = './retainers/'. "$brandname" . 'RetainerHead4.txt';
$retainerhead5 = './retainers/'. "$brandname" . 'RetainerHead5.txt';
$retainerhead6 = './retainers/'. "$brandname" . 'RetainerHead6.txt';
$retainerhead7 = './retainers/'. "$brandname" . 'RetainerHead7.txt';
$retainerhead8 = './retainers/'. "$brandname" . 'RetainerHead8.txt';
$retainerhead9 = './retainers/'. "$brandname" . 'RetainerHead9.txt';
$retainerhead10 = './retainers/'. "$brandname" . 'RetainerHead10.txt';
$retainer1 = './retainers/'. "$brandname" . 'RetainerPart1.txt';
$retainer2 = './retainers/'. "$brandname" . 'RetainerPart2.txt';
$retainer3 = './retainers/'. "$brandname" . 'RetainerPart3.txt';
$retainer4 = './retainers/'. "$brandname" . 'RetainerPart4.txt';
$retainer5 = './retainers/'. "$brandname" . 'RetainerPart5.txt';
$retainer6 = './retainers/'. "$brandname" . 'RetainerPart6.txt';
$retainer7 = './retainers/'. "$brandname" . 'RetainerPart7.txt';
$retainer8 = './retainers/'. "$brandname" . 'RetainerPart8.txt';
$retainer9 = './retainers/'. "$brandname" . 'RetainerPart9.txt';
$retainer10 = './retainers/'. "$brandname" . 'RetainerPart10.txt';
$get1 = file_get_contents($retainer1);
$get2 = file_get_contents($retainer2);
$get3 = file_get_contents($retainer3);
$get4 = file_get_contents($retainer4);
$get5 = file_get_contents($retainer5);
$get6 = file_get_contents($retainer6);
$get7 = file_get_contents($retainer7);
$get8 = file_get_contents($retainer8);
$get9 = file_get_contents($retainer9);
$get10 = file_get_contents($retainer10);
$gethead1 = file_get_contents($retainerhead1);
$gethead2 = file_get_contents($retainerhead2);
$gethead3 = file_get_contents($retainerhead3);
$gethead4 = file_get_contents($retainerhead4);
$gethead5 = file_get_contents($retainerhead5);
$gethead6 = file_get_contents($retainerhead6);
$gethead7 = file_get_contents($retainerhead7);
$gethead8 = file_get_contents($retainerhead8);
$gethead9 = file_get_contents($retainerhead9);
$gethead10 = file_get_contents($retainerhead10);
$hellocompany = 'INITIATIVE LEGAL GROUP APC';
$hellotitle = 'ATTORNEY-CLIENT AGREEMENT';
$hello = $clientname . ' ("Client") ';
#$hellophone = "$cliphone" . ' phone number';
$hello2 = '     This Attorney-Client Agreement sets forth the terms under which Initiative Legal Group APC ("Attorneys") has been retained by '.$clientname.' ("Client") to perform certain legal services.';
$printyourfullname = '________________________________[print your full name] ("Client")';
$yourbestphonenumber = '______________________[your best phone number]';
$emergencycontact = '___________________[name of Emergency Contact]____________[Relationship]_________________[phone number]';
$title = 'ATTORNEY-CLIENT AGREEMENT';
$agreed = 'AGREED AND ACCEPTED';
$space = ' ';
$printtxt = 'PRINT FIRST AND LAST NAME';
$printline = $clientname.'                                     ';
$signtxt = 'SIGN YOUR NAME                                 DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" ."$space" ."$space" ."$space" ."$space" .'             On behalf of ATTORNEYS                 DATE';
$signline = '________________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" ."$space" ."$space" ."$space" ."$space" ."$space" .' ________________________________/___________';
$pdf->AddPage();

$pdf->Image('logo.png',62,13,'','8');
#$pdf->Image('logo.png',);
#$pdf->Image('logo.png',62,13,8,0,'','');
$pdf->Ln();
#$pdf->SetFont('helvetica','B',12);
#$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln(15);
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$hellotitle,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,$hello2);
//start of form fields
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'1.               '.$gethead1);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                                                                     '.$get1,'','L');
//$pdf->SetFont('Times','B',10);
//$pdf->MultiCell(0,5,$gethead1);
//$pdf->SetFont('Times','',10);
//$pdf->MultiCell(0,5,$get1);
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'2.               '.$gethead2);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                                                    '.$get2,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'3.               '.$gethead3);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                             '.$get3);
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'4.               '.$gethead4);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                                  '.$get4,'','L');
//page1barcodeStart
$pdf->Ln();


$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'5.               '.$gethead5);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                    '.$get5,'','L');
$pdf->SetFont('Arial','',11);
//page1barcodeStart
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');

//page1barcodeEnd
// page 2 start
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'6.               '.$gethead6);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                                                                        '.$get6,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'7.               '.$gethead7);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                       '.$get7,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'8.               '.$gethead8);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                                                       '.$get8,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'9.               '.$gethead9);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                                                                          '.$get9,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'10.               '.$gethead10);
$pdf->Ln(0);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,'                                                      '.$get10,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,5,$agreed,'','','L');
$pdf->Ln(15);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,$signline);
$pdf->Ln(7);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$signtxt);
$pdf->Ln(9);
$pdf->SetFont('Times','U',12);
$pdf->Cell(0,5,$printline);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$printtxt);
#$pdf->Write('',Hello,'');

$pdf->SetFont('Arial','',10);

$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
//AUTH FORM START
/*$pdf->AddPage();
$authtitle = 'AUTHORIZATION FOR RELEASE OF';
$authtitle2 = 'PERSONNEL FILE AND WAGE RECORDS';
$authline = '_________________________________________';
$towhom = 'To Whom It May Concern:';
$authintro = 'I, ' . "$clientname" . ':';
$authtext = 'request request that ' . "$brandname" . ', Inc. and any related entities send copies of the following to Initiative Legal Group APC, located at 1800 Century Park East, 2nd Floor, Los Angeles, California 90067:';
$authtext2 = '          (a) My employee personnel file as required by California Labor Code section 432; and';
$authtext3 = '          (b) My wage stubs and time records in their entirety as set out in California Labor Code section 226(a)';
$authtext4 = '          and as required by California Labor Code section 226(b). ';
$authsignline = '__________________________________              ________________';
$authsigntext = 'SIGN YOUR FULL NAME                                               Date';

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$authtitle,'','C');
$pdf->Ln(1);
$pdf->MultiCell(0,5,$authtitle2,'','C');
$pdf->Ln(3);
$pdf->MultiCell(0,5,$authline,'','C');
$pdf->Ln();

$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,$towhom);
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$authintro);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$authtext);
$pdf->Ln();
$pdf->MultiCell(0,5,$authtext2);
$pdf->Ln();
$pdf->Cell(0,5,$authtext3);
$pdf->Ln(5);
$pdf->Cell(0,5,$authtext4);
$pdf->Ln(10);
$pdf->Cell(0,5,$authsignline);
$pdf->Ln(7);
$pdf->Cell(0,5,$authsigntext);
*/
$pdf->SetFont('Arial','',10);

$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$filename = "$LastName, " .  "$FirstName" . " - Retainer - ".$uniqueid; 
$ext = ".pdf";

$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F");

$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$filename3= "$LastName, " .  "$FirstName" . " - ".$uniqueid; 
$dir1 = "$dir0" . "$filename3";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
#$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $newdiruniquid);
}
ftp_chdir($conn_id, $newdiruniquid);
ftp_put($conn_id, $file, $file, FTP_BINARY);
ftp_close($conn_id);
unlink($file); //delete temp copy pdf stored on server

////$pdf = new PDF_Code128();
////$retainerhead1 = './retainers/'. "$brandname" . 'RetainerHead1.txt';
////$retainerhead2 = './retainers/'. "$brandname" . 'RetainerHead2.txt';
////$retainerhead3 = './retainers/'. "$brandname" . 'RetainerHead3.txt';
////$retainerhead4 = './retainers/'. "$brandname" . 'RetainerHead4.txt';
////$retainerhead5 = './retainers/'. "$brandname" . 'RetainerHead5.txt';
////$retainerhead6 = './retainers/'. "$brandname" . 'RetainerHead6.txt';
////$retainerhead7 = './retainers/'. "$brandname" . 'RetainerHead7.txt';
////$retainerhead8 = './retainers/'. "$brandname" . 'RetainerHead8.txt';
////$retainerhead9 = './retainers/'. "$brandname" . 'RetainerHead9.txt';
////$retainerhead10 = './retainers/'. "$brandname" . 'RetainerHead10.txt';
////$retainer1 = './retainers/'. "$brandname" . 'RetainerPart1.txt';
////$retainer2 = './retainers/'. "$brandname" . 'RetainerPart2.txt';
////$retainer3 = './retainers/'. "$brandname" . 'RetainerPart3.txt';
////$retainer4 = './retainers/'. "$brandname" . 'RetainerPart4.txt';
////$retainer5 = './retainers/'. "$brandname" . 'RetainerPart5.txt';
////$retainer6 = './retainers/'. "$brandname" . 'RetainerPart6.txt';
////$retainer7 = './retainers/'. "$brandname" . 'RetainerPart7.txt';
////$retainer8 = './retainers/'. "$brandname" . 'RetainerPart8.txt';
////$retainer9 = './retainers/'. "$brandname" . 'RetainerPart9.txt';
////$retainer10 = './retainers/'. "$brandname" . 'RetainerPart10.txt';
////$get1 = file_get_contents($retainer1);
////$get2 = file_get_contents($retainer2);
////$get3 = file_get_contents($retainer3);
////$get4 = file_get_contents($retainer4);
////$get5 = file_get_contents($retainer5);
////$get6 = file_get_contents($retainer6);
////$get7 = file_get_contents($retainer7);
////$get8 = file_get_contents($retainer8);
////$get9 = file_get_contents($retainer9);
////$get10 = file_get_contents($retainer10);
////$gethead1 = file_get_contents($retainerhead1);
////$gethead2 = file_get_contents($retainerhead2);
////$gethead3 = file_get_contents($retainerhead3);
////$gethead4 = file_get_contents($retainerhead4);
////$gethead5 = file_get_contents($retainerhead5);
////$gethead6 = file_get_contents($retainerhead6);
////$gethead7 = file_get_contents($retainerhead7);
////$gethead8 = file_get_contents($retainerhead8);
////$gethead9 = file_get_contents($retainerhead9);
////$gethead10 = file_get_contents($retainerhead10);
////$hellocompany = 'INITIATIVE LEGAL GROUP APC';
////$hellotitle = 'ATTORNEY-CLIENT AGREEMENT';
////$hello = $clientname . ' ("Client") ';
////#$hellophone = "$cliphone" . ' phone number';
////$hello2 = '     This Attorney-Client Agreement sets forth the terms under which Initiative Legal Group APC ("Attorneys") has been retained by '.$clientname.' ("Client") to perform certain legal services.';
////$printyourfullname = '________________________________[print your full name] ("Client")';
////$yourbestphonenumber = '______________________[your best phone number]';
////$emergencycontact = '___________________[name of Emergency Contact]____________[Relationship]_________________[phone number]';
////$title = 'ATTORNEY-CLIENT AGREEMENT';
////$agreed = 'AGREED AND ACCEPTED';
////$space = ' ';
////$printtxt = 'PRINT FIRST AND LAST NAME';
////$printline = $clientname.'                                     ';
////$signtxt = 'SIGN YOUR NAME                                 DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" ."$space" ."$space" ."$space" ."$space" .'             On behalf of ATTORNEYS                 DATE';
////$signline = '________________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" ."$space" ."$space" ."$space" ."$space" ."$space" .' ________________________________/___________';
////$pdf->AddPage();
////
////#$pdf->Image('logo.png',62,13,8,0,'','');
////$pdf->Image('logo.png',62,13,'',8,0,'','');
////$pdf->Ln();
////$pdf->SetFont('helvetica','B',12);
////$pdf->MultiCell(0,5,$hellocompany,'','C');
////$pdf->Ln();
////$pdf->Ln();
////$pdf->SetFont('Times','B',12);
////$pdf->MultiCell(0,5,$hellotitle,'','C');
////$pdf->Ln();
////$pdf->Ln();
////$pdf->SetFont('Times','',11);
////$pdf->MultiCell(0,5,$hello2);
//////start of form fields
////$pdf->Ln();
////#$pdf->SetFont('Times','',11);
////#$pdf->MultiCell(0,5,$hello);
////#$pdf->Ln();
////#$pdf->SetFont('Times','',11);
////#$pdf->MultiCell(0,5,$yourbestphonenumber);
////#$pdf->Ln();
////#$pdf->SetFont('Times','',11);
////#$pdf->MultiCell(0,5,$emergencycontact);
////$pdf->Ln();
////#$pdf->SetFont('Times','',10);
////#$pdf->MultiCell(0,5,$hello);
////#$pdf->Ln();
////#$pdf->SetFont('Times','',10);
////#$pdf->MultiCell(0,5,$hellophone);
////#$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead1);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get1);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead2);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get2);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead3);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get3);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead4);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get4);
//////page1barcodeStart
////$pdf->Ln();
////
////
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead5);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get5);
////$pdf->SetFont('Arial','',10);
//////page1barcodeStart
////$code= "$uniqueid";
////$pdf->Code128(130,260,$code,70,10);
////$pdf->SetXY(130,270);
////$pdf->Write(5,''.$code.'');
////
//////page1barcodeEnd
////// page 2 start
////$pdf->AddPage();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead6);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get6);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead7);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get7);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead8);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get8);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead9);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get9);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->MultiCell(0,5,$gethead10);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$get10);
////$pdf->Ln();
////$pdf->SetFont('Times','B',10);
////$pdf->Cell(0,5,$agreed,'','','L');
////$pdf->Ln(15);
////$pdf->SetFont('Times','',10);
////$pdf->Cell(0,5,$signline);
////$pdf->Ln(7);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$signtxt);
////$pdf->Ln(9);
////$pdf->SetFont('Times','U',10);
////$pdf->Cell(0,5,$printline);
////$pdf->Ln(4);
////$pdf->SetFont('Times','',10);
////$pdf->MultiCell(0,5,$printtxt);
////#$pdf->Write('',Hello,'');
////
////$pdf->SetFont('Arial','',10);
////
////$code= "$uniqueid";
////$pdf->Code128(130,260,$code,70,10);
////$pdf->SetXY(130,270);
////$pdf->Write(5,''.$code.'');
//////AUTH FORM START
/////*$pdf->AddPage();
////$authtitle = 'AUTHORIZATION FOR RELEASE OF';
////$authtitle2 = 'PERSONNEL FILE AND WAGE RECORDS';
////$authline = '_________________________________________';
////$towhom = 'To Whom It May Concern:';
////$authintro = 'I, ' . "$clientname" . ':';
////$authtext = 'request request that ' . "$brandname" . ', Inc. and any related entities send copies of the following to Initiative Legal Group APC, located at 1800 Century Park East, 2nd Floor, Los Angeles, California 90067:';
////$authtext2 = '          (a) My employee personnel file as required by California Labor Code section 432; and';
////$authtext3 = '          (b) My wage stubs and time records in their entirety as set out in California Labor Code section 226(a)';
////$authtext4 = '          and as required by California Labor Code section 226(b). ';
////$authsignline = '__________________________________              ________________';
////$authsigntext = 'SIGN YOUR FULL NAME                                               Date';
////
////$pdf->Ln();
////$pdf->Ln();
////$pdf->SetFont('Times','B',12);
////$pdf->MultiCell(0,5,$authtitle,'','C');
////$pdf->Ln(1);
////$pdf->MultiCell(0,5,$authtitle2,'','C');
////$pdf->Ln(3);
////$pdf->MultiCell(0,5,$authline,'','C');
////$pdf->Ln();
////
////$pdf->SetFont('Times','',12);
////$pdf->Cell(0,5,$towhom);
////$pdf->Ln(10);
////$pdf->SetFont('Times','',12);
////$pdf->MultiCell(0,5,$authintro);
////$pdf->Ln();
////$pdf->SetFont('Times','',12);
////$pdf->MultiCell(0,5,$authtext);
////$pdf->Ln();
////$pdf->MultiCell(0,5,$authtext2);
////$pdf->Ln();
////$pdf->Cell(0,5,$authtext3);
////$pdf->Ln(5);
////$pdf->Cell(0,5,$authtext4);
////$pdf->Ln(10);
////$pdf->Cell(0,5,$authsignline);
////$pdf->Ln(7);
////$pdf->Cell(0,5,$authsigntext);
////*/
////$pdf->SetFont('Arial','',10);
////
////$code= "$uniqueid";
////$pdf->Code128(130,260,$code,70,10);
////$pdf->SetXY(130,270);
////$pdf->Write(5,''.$code.'');
////$dir='/inetpub/wwwroot/';
////$filename = "$LastName, " .  "$FirstName" . " - Retainer - ".$uniqueid; 
////$ext = ".pdf";
////
////$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F"); //pushes file to server for temp storage
////$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F");
////
////$ftp_server = '10.129.3.21';
////$ftp_user_name = 'sqlsrv';
////$ftp_user_pass = 'password';
////$dir0 = '/' . "$brandname" . '/';
////$filename3= "$LastName, " .  "$FirstName" . " - ".$uniqueid; 
////$dir1 = "$dir0" . "$filename3";
////$dir2 = "$dir1" . '/';
////$dir3 = "$dir1" . '/';
////$file = "$filename" . "$ext";
////$file2 = "$filename2" . "$ext";
////$conn_id = ftp_connect($ftp_server);
////
////// login with username and password
////$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
////
////ftp_mkdir($conn_id, $dir2);
////
////ftp_chdir($conn_id, $dir2);
////ftp_put($conn_id, $file, $file, FTP_BINARY);
////ftp_close($conn_id);
////unlink($file); //delete temp copy pdf stored on server
////
////$conn_id = ftp_connect($ftp_server);
////$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
////ftp_mkdir($conn_id, $dir3);
////ftp_chdir($conn_id, $dir3);
////ftp_put($conn_id, $file2, $file2, FTP_BINARY);
////ftp_close($conn_id);
////unlink($file2); //delete temp copy pdf stored on server
////
//////close
}

function makeretainercoverletter($brandname,$uniqueid,$FirstName,$LastName,$clientname,$Street1,$Street2,$City,$State,$Zipcode,$agentname,$agentemail)
{
//open

$pdf = new PDF_Code128coverletter();
$subject1 = './retainers/'. "$brandname" . 'RetainerCoverSubject1.txt';
$subject2 = './retainers/'. "$brandname" . 'RetainerCoverSubject2.txt';
$body1 = './retainers/'. "$brandname" . 'RetainerCoverBody1.txt';
$get1 = file_get_contents($subject1);
$get2 = file_get_contents($subject2);
$body1 = './retainers/'. "$brandname" . 'RetainerCoverBody1.txt';
$get3 = file_get_contents($body1);
$body2 = './retainers/'. "$brandname" . 'RetainerCoverBody2.txt';
$get4 = file_get_contents($body2);
$body3 = './retainers/'. "$brandname" . 'RetainerCoverBody3.txt';
$get5 = file_get_contents($body3);
$body4 = './retainers/'. "$brandname" . 'RetainerCoverBody4.txt';
$get6 = file_get_contents($body4);
$hellocompany = 'INITIATIVE LEGAL GROUP APC';
$caseattorneyname = '                                                                                                                                          '.$agentname;
$caseattorneyphonenumber = '                                                                                                                                          888.792.2293';
$caseattorneyemail = '                                                                                                                                          '.$agentemail;
$hellotitle = 'ATTORNEY ADVERTISEMENT';
$hello = "$clientname" . ' ("Client") ';
$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
$printyourfullname = 'VIA U.S. MAIL';
$yourbestphonenumber = $FirstName.' '.$LastName;
$addressline1 = $Street1.' '.$Street2;
$addressline2 = $City.', '.$State.' '.$Zipcode;
$title = 'ATTORNEY-CLIENT AGREEMENT';
$agreed = 'AGREED AND ACCEPTED';
$space = ' ';
$printtxt = 'PRINT FIRST AND LAST NAME';
$printline = '__________________________________';
$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
$pdf->AddPage();
#$pdf->Image('logo.png',62,28,8,0,'','');
$pdf->Image('logo.png',62,18,'',8,0,'','');
$pdf->Ln(15);
$pdf->SetFont('helvetica','B',12);
#$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyname,'','L');
$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','L');
$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyemail,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$hellotitle,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$hello2);
$pdf->Ln();
$pdf->SetFont('Times','U',12);
$pdf->MultiCell(0,5,$printyourfullname);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$yourbestphonenumber);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline1);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline2);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,'Subject:');
$pdf->Ln(0);
$pdf->SetFont('Times','I',12);
$pdf->Cell(0,5,$get1);
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get2);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Dear '.$clientname.': ');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get3);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get4);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get5);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get6);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Sincerely,');
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(0,5,$agentname,'','L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Enclosed: Attorney-Client Agreement and self-addressed stamped envelope');
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$foldername = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename = "$LastName, " .  "$FirstName" . " - Retainer Cover Letter - $uniqueid"; 
$ext = ".pdf";
$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F");
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$dir1 = "$dir0" . "$foldername";
$dir2 = "$dir1" . '/';
$file = "$filename" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $newdiruniquid);
}
ftp_chdir($conn_id, $newdiruniquid);
ftp_put($conn_id, $file, $file, FTP_BINARY);
ftp_close($conn_id);
unlink($file); //delete temp copy pdf stored on server

//close
}
function makeretainercoverletterrejected($brandname,$uniqueid,$FirstName,$LastName,$clientname,$Street1,$Street2,$City,$State,$Zipcode,$agentname,$agentemail)
{
//open

$pdf = new PDF_Code128coverletter();
$subject1 = './retainers/'. "$brandname" . 'RejectRetainerCoverSubject1.txt';
$subject2 = './retainers/'. "$brandname" . 'RejectRetainerCoverSubject2.txt';
$body1 = './retainers/'. "$brandname" . 'RejectetainerCoverBody1.txt';
$get1 = file_get_contents($subject1);
$get2 = file_get_contents($subject2);
$body1 = './retainers/'. "$brandname" . 'RejectRetainerCoverBody1.txt';
$get3 = file_get_contents($body1);
$body2 = './retainers/'. "$brandname" . 'RejectRetainerCoverBody2.txt';
$get4 = file_get_contents($body2);
$body3 = './retainers/'. "$brandname" . 'RejectRetainerCoverBody3.txt';
$get5 = file_get_contents($body3);
$body4 = './retainers/'. "$brandname" . 'RejectRetainerCoverBody4.txt';
$get6 = file_get_contents($body4);
$hellocompany = 'INITIATIVE LEGAL GROUP APC';
$caseattorneyname = '                                                                                                                                          '.$agentname;
$caseattorneyphonenumber = '                                                                                                                                          888.792.2293';
$caseattorneyemail = '                                                                                                                                          '.$agentemail;
$hellotitle = 'ATTORNEY ADVERTISEMENT';
$hello = "$clientname" . ' ("Client") ';
$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
$printyourfullname = 'VIA U.S. MAIL';
$yourbestphonenumber = $FirstName.' '.$LastName;
$addressline1 = $Street1.' '.$Street2;
$addressline2 = $City.', '.$State.' '.$Zipcode;
$title = 'ATTORNEY-CLIENT AGREEMENT';
$agreed = 'AGREED AND ACCEPTED';
$space = ' ';
$printtxt = 'PRINT FIRST AND LAST NAME';
$printline = '__________________________________';
$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
$pdf->AddPage();
#$pdf->Image('logo.png',62,28,8,0,'','');
$pdf->Image('logo.png',62,28,'',8,0,'','');
$pdf->Ln(15);
$pdf->SetFont('helvetica','B',12);
$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyname,'','L');
$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','L');
$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyemail,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$hellotitle,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$hello2);
$pdf->Ln();
$pdf->SetFont('Times','U',12);
$pdf->MultiCell(0,5,$printyourfullname);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$yourbestphonenumber);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline1);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline2);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,'Subject:');
$pdf->Ln(0);
$pdf->SetFont('Times','I',12);
$pdf->Cell(0,5,$get1);
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get2);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Dear '.$clientname.': ');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get3);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get4);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get5);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get6);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Sincerely,');
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(0,5,$agentname,'','L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Enclosed: Attorney-Client Agreement and self-addressed stamped envelope');
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$foldername = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename = "$LastName, " .  "$FirstName" . " - Retainer Cover Letter Rejected - $uniqueid"; 
$ext = ".pdf";
$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F");
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$dir1 = "$dir0" . "$foldername";
$dir2 = "$dir1" . '/';
$file = "$filename" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $newdiruniquid);
}
ftp_chdir($conn_id, $newdiruniquid);
ftp_put($conn_id, $file, $file, FTP_BINARY);
ftp_close($conn_id);
unlink($file); //delete temp copy pdf stored on server

//close
}
function makedeclinationletter($brandname,$uniqueid,$FirstName,$LastName,$clientname,$Street1,$Street2,$City,$State,$Zipcode,$agentname,$agentemail)
{
//open

$pdf = new PDF_Code128();
$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
$subject1 = './retainers/MacysDeclinationLetterSubject1.txt';
$subject2 = './retainers/MacysDeclinationLetterSubject2.txt';
$body1 = './retainers/'. "$brandname" . 'DeclinationLetterBody1.txt';
$get1 = file_get_contents($subject1);
$get2 = file_get_contents($subject2);
$body1 = './retainers/'. "$brandname" . 'DeclinationLetterBody1.txt';
$get3 = file_get_contents($body1);
$bodydeclined = 'We are writing in response to the questionnaire you completed on '.$hello2.'. After reviewing your responses, our law firm does not believe that you have wage and hour claims against Macy’s Inc. This letter is to inform you that our law firm does not intend to pursue any wage and hour claims on your behalf against Macy’s Inc. Please find a copy of your questionnaire enclosed.';
//#$body2 = './retainers/'. "$brandname" . 'DeclinationLetterBody2.txt';
//$get4 = file_get_contents($body2);
//$body3 = './retainers/'. "$brandname" . 'DeclinationLetterBody3.txt';
//$get5 = file_get_contents($body3);
//$body4 = './retainers/'. "$brandname" . 'DeclinationLetterBody4.txt';
//$get6 = file_get_contents($body4);
$hellocompany = 'INITIATIVE LEGAL GROUP APC';
$caseattorneyname = '                                                                                                                                          '.$agentname;
$caseattorneyphonenumber = '                                                                                                                                          888.792.2293';
$caseattorneyemail = '                                                                                                                                          '.$agentemail;
$hellotitle = 'ATTORNEY ADVERTISEMENT';
$hello = "$clientname" . ' ("Client") ';
$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
$printyourfullname = 'VIA U.S. MAIL';
$yourbestphonenumber = $FirstName.' '.$LastName;
$addressline1 = $Street1.' '.$Street2;
$addressline2 = $City.', '.$State.' '.$Zipcode;
$title = 'ATTORNEY-CLIENT AGREEMENT';
$agreed = 'AGREED AND ACCEPTED';
$space = ' ';
$printtxt = 'PRINT FIRST AND LAST NAME';
$printline = '__________________________________';
$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
$pdf->AddPage();
#$pdf->Image('logo.png',62,28,8,0,'','');
$pdf->Image('logo.png',62,28,'',8,0,'','');
$pdf->Ln(15);
$pdf->SetFont('helvetica','B',12);
$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyname,'','L');
$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','L');
$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyemail,'','L');
$pdf->Ln();
$pdf->SetFont('Times','B',12);
#$pdf->MultiCell(0,5,$hellotitle,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$hello2);
$pdf->Ln();
$pdf->SetFont('Times','U',12);
$pdf->MultiCell(0,5,$printyourfullname);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$yourbestphonenumber);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline1);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline2);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,'Subject:');
$pdf->Ln(0);
$pdf->SetFont('Times','I',12);
$pdf->Cell(0,5,$get1);
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get2);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Dear '.$clientname.': ');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$bodydeclined);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get4);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get5);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get6);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Sincerely,');
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(0,5,$agentname,'','L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
#$pdf->MultiCell(0,5,'Enclosed:  Questionnaire copy ');
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$foldername = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename = "$LastName, " .  "$FirstName" . " - Declination Letter - $uniqueid"; 
$ext = ".pdf";
$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F");
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$dir1 = "$dir0" . "$foldername";
$dir2 = "$dir1" . '/';
$file = "$filename" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $newdiruniquid);
}
ftp_chdir($conn_id, $newdiruniquid);
ftp_put($conn_id, $file, $file, FTP_BINARY);
unlink($file); //delete temp copy pdf stored on server
ftp_close($conn_id);
//close
}
function makeauth($brandname,$uniqueid,$FirstName,$LastName,$clientname)
{
	$pdf = new PDF_Code128();
	$pdf->AddPage();
	$hellocompany = 'INITIATIVE LEGAL GROUP APC';
	#$pdf->Image('logo.png',62,22,8,0,'','');
	$pdf->Image('logo.png',62,22,'',8,0,'','');
	$pdf->Ln();
	$pdf->SetFont('helvetica','B',12);
	$pdf->MultiCell(0,5,$hellocompany,'','C');
	$pdf->Ln();
	$pdf->Ln();
	//AUTH FORM START
	$clientname = "$FirstName" . " $LastName";
	$authtitle = 'AUTHORIZATION FOR RELEASE OF';
	$authtitle2 = 'PERSONNEL FILE AND WAGE RECORDS';
	$authline = '_________________________________________';
	$towhom = 'To Whom It May Concern:';
	$authintro = 'I, ' . "$clientname" . ':';
	$authtext = 'request that Macy\'s, Inc. and any related entities send copies of the following to my attorneys, Initiative Legal Group APC, located at 1800 Century Park East, 2nd Floor, Los Angeles, California 90067 as soon as practicable, but no later than 21 calendar days after the date this request has been submitted:';
	$authtext2 = '          (a) My entire employee personnel file , including any documents I signed; and';
	$authtext3 = '          (b) All of my time, wage and payroll records, including my wage stubs in their entirety.';
	$authtext4 = 'I hereby expressly authorize and appoint Initiative Legal Group, APC as my representative to act on my behalf and in my place to obtain my personnel file and time, wage and payroll records by any and all means necessary and available.';
	$authsignline = '__________________________________              ________________';
	$authsigntext = 'SIGN YOUR FULL NAME                                               Date';
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',12);
	$pdf->MultiCell(0,5,$authtitle,'','C');
	$pdf->Ln(1);
	$pdf->MultiCell(0,5,$authtitle2,'','C');
	$pdf->Ln(3);
	$pdf->MultiCell(0,5,$authline,'','C');
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,5,$towhom);
	$pdf->Ln(10);
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$authintro);
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$authtext);
	$pdf->Ln();
	$pdf->MultiCell(0,5,$authtext2);
	$pdf->Ln();
	$pdf->Cell(0,5,$authtext3);
	$pdf->Ln(10);
	$pdf->MultiCell(0,5,$authtext4);
	$pdf->Ln(10);
	$pdf->Cell(0,5,$authsignline);
	$pdf->Ln(5);
	$pdf->Cell(0,5,$authsigntext);
	$pdf->SetFont('Arial','',10);
	$code= "$uniqueid";
	$pdf->Code128(130,260,$code,70,10);
	$pdf->SetXY(130,270);
	$pdf->Write(5,''.$code.'');
	$dir='/inetpub/wwwroot/';
	$foldername = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
	$filename = "$LastName, " .  "$FirstName" . " - Retainer -".$uniqueid; 
	$filename2 = "$LastName, " .  "$FirstName" . " - Authorization - $uniqueid"; 
	$ext = ".pdf";
	$pdf->Output("/inetpub/wwwroot/mars/$filename2$ext","F"); //pushes file to server for temp storage
	$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename2$ext","F"); //pushes file to server for temp storage
	$ftp_server = '10.129.3.21';
	$ftp_user_name = 'sqlsrv';
	$ftp_user_pass = 'password';
	$dir0 = '/' . "$brandname" . '/';
	##
	###
	//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
	$newdiruniquid = $dir0."".$uniqueid;
	###
	##
	$dir1 = "$dir0" . "$foldername";
	$dir2 = "$dir1" . '/';
	$dir3 = "$dir1" . '/';
	$file = "$filename" . "$ext";
	$file2 = "$filename2" . "$ext";
	$conn_id = ftp_connect($ftp_server);
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
	{
	    
	}
	else
	{
	    ftp_mkdir($conn_id, $newdiruniquid);
	}
	ftp_chdir($conn_id, $newdiruniquid);
	ftp_put($conn_id, $file2, $file2, FTP_BINARY);
	ftp_close($conn_id);
	unlink($file2); 
}

function makefeewaiver($brandname,$uniqueid,$FirstName,$LastName,$clientname)
{
$pdf = new PDF_Code128();

$pdf->AddPage();
#$hellocompany = 'INITIATIVE LEGAL GROUP APC';
#$pdf->Image('logo.png',62,22,8,0,'','');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('helvetica','B',12);
#$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->Ln();
//AUTH FORM START
$clientname = "$FirstName" . " $LastName";
$authtitle = 'American Arbitration Association Affidavit For Waiver of Fees Notice';
$authtitle2 = 'For Use By California Consumers Only';
$authtitle3 = 'PERSONNEL FILE AND WAGE RECORDS';
$authline = '_________________________________________';
$nameline1 = '                     Name:   __________________________________________________________';
$nameline2 = '                     Address:   ________________________________________________________';
$nameline3 = '                     Number of persons in Household:   ____________________________________';
$nameline4 = '                     Gross Monthly Income:   ____________________________________________';
$authintro = 'I, ' . "$clientname" . ':';
$swear = '                     I hereby swear that the foregoing is a true and correct statement.';
$authtext1 = '                     Pursuant to section 1284.3 of the California Code of Civil Procedure, consumers';
$authtext2 = '                     with a gross monthly income of less than 300% of the federal poverty guidelines,';
$authtext3 = '                     are entitled to a waiver of all fees and costs, exclusive of arbitrator fees. This law';
$authtext4 = '                     applies to all consumer arbitration agreements subject to the California Arbitration';
$authtext5 = '                     Act, and to all consumer arbitrations conducted in California. If you believe that';
$authtext6 = '                     you meet these requirements, please complete this form and submit it with your';
$authtext7 = '                     demand for arbitration to the AAA\'s Western Case Management Center.';

$auth2text1 = '                     If (1) you are not a California consumer; or (2) your gross monthly income is more';
$auth2text2 = '                     than 300% of the federal poverty guidelines, you may still apply for a reduction or';
$auth2text3 = '                     deferral of AAA administrative fees by contacting the nearest AAA Case';
$auth2text4 = '                     Management Center and requesting a hardship application form.';

$authsignline = '                                                                                                 ___________________________';
$authsigntext = '                                                                                                 Signature';
$pdf->Ln();
$pdf->Ln();
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(0,5,$authtitle,'','C');
$pdf->Ln(1);
$pdf->MultiCell(0,5,$authtitle2,'','C');
$pdf->Ln(0);
$pdf->MultiCell(0,5,$authline,'','C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,$authtext1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext4,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext5,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext6,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext7,'','J');
$pdf->Ln(10);
$pdf->Cell(0,5,$auth2text1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text4,'','J');
$pdf->Ln(20);
$pdf->Cell(0,5,$nameline1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline4,'','J');
$pdf->Ln(10);
$pdf->Ln(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,$swear);
$pdf->Ln(15);
$pdf->Cell(0,5,$authsignline);
$pdf->Ln(5);
$pdf->Cell(0,5,$authsigntext);
$pdf->SetFont('Arial','',10);
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$foldername = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename2 = "$LastName, " .  "$FirstName" . " - Feewaiver - $uniqueid"; 
$ext = ".pdf";
$pdf->Output("/inetpub/wwwroot/mars/$filename2$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename2$ext","F"); //pushes file to server for temp storage
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$dir1 = "$dir0" . "$foldername";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $newdiruniquid);
}
ftp_chdir($conn_id, $newdiruniquid);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); 
}
function makefeewaiver2($brandname,$uniqueid,$FirstName,$LastName,$clientname)
{
$pdf = new PDF_Code128();

$pdf->AddPage();
#$hellocompany = 'INITIATIVE LEGAL GROUP APC';
#$pdf->Image('logo.png',62,22,8,0,'','');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('helvetica','B',12);
#$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->Ln();
//AUTH FORM START
$clientname = "$FirstName" . " $LastName";
$authtitle = 'American Arbitration Association Affidavit For Waiver of Fees Notice';
$authtitle2 = 'For Use By California Consumers Only';
$authtitle3 = 'PERSONNEL FILE AND WAGE RECORDS';
$authline = '_________________________________________';
$nameline1 = '                     Name:   __________________________________________________________';
$nameline2 = '                     Address:   ________________________________________________________';
$nameline3 = '                     Number of persons in Household:   ____________________________________';
$nameline4 = '                     Gross Monthly Income:   ____________________________________________';
$authintro = 'I, ' . "$clientname" . ':';
$swear = '                     I hereby swear that the foregoing is a true and correct statement.';
$authtext1 = '                     Pursuant to section 1284.3 of the California Code of Civil Procedure, consumers';
$authtext2 = '                     with a gross monthly income of less than 300% of the federal poverty guidelines,';
$authtext3 = '                     are entitled to a waiver of all fees and costs, exclusive of arbitrator fees. This law';
$authtext4 = '                     applies to all consumer arbitration agreements subject to the California Arbitration';
$authtext5 = '                     Act, and to all consumer arbitrations conducted in California. If you believe that';
$authtext6 = '                     you meet these requirements, please complete this form and submit it with your';
$authtext7 = '                     demand for arbitration to the AAA\'s Western Case Management Center.';

$auth2text1 = '                     If (1) you are not a California consumer; or (2) your gross monthly income is more';
$auth2text2 = '                     than 300% of the federal poverty guidelines, you may still apply for a reduction or';
$auth2text3 = '                     deferral of AAA administrative fees by contacting the nearest AAA Case';
$auth2text4 = '                     Management Center and requesting a hardship application form.';

$authsignline = '                                                                                                 ___________________________';
$authsigntext = '                                                                                                 Signature';
$pdf->Ln();
$pdf->Ln();
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(0,5,$authtitle,'','C');
$pdf->Ln(1);
$pdf->MultiCell(0,5,$authtitle2,'','C');
$pdf->Ln(0);
$pdf->MultiCell(0,5,$authline,'','C');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,$authtext1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext4,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext5,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext6,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$authtext7,'','J');
$pdf->Ln(10);
$pdf->Cell(0,5,$auth2text1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$auth2text4,'','J');
$pdf->Ln(20);
$pdf->Cell(0,5,$nameline1,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline2,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline3,'','J');
$pdf->Ln();
$pdf->Cell(0,5,$nameline4,'','J');
$pdf->Ln(10);
$pdf->Ln(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,$swear);
$pdf->Ln(15);
$pdf->Cell(0,5,$authsignline);
$pdf->Ln(5);
$pdf->Cell(0,5,$authsigntext);
$pdf->SetFont('Arial','',10);
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/';
$foldername = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
$filename = "$LastName, " .  "$FirstName" . " - Retainer - $uniqueid"; 
$filename2 = "$LastName, " .  "$FirstName" . " - Feewaiver - $uniqueid"; 
$ext = ".pdf";
$pdf->Output("/inetpub/wwwroot/$filename2$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/Retainerstmp/$filename2$ext","F"); //pushes file to server for temp storage
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$dir1 = "$dir0" . "$foldername";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $newdiruniquid);
}
ftp_chdir($conn_id, $newdiruniquid);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); 
}
function attorneyemail($agentlname)
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
                
}



function logthisevent($eventnote,$conn,$notelog,$uniqueid)
{
	$date = date('Y').'-'.date('m').'-'.date('d');
	$time = date('H').':'.date('i').':'.date('s');
	if(strstr($notelog,'\''))
	{
	
	    $notelog = str_replace('\'','\'\'',$notelog);
	}
	if(strstr($notelog,'\"'))
	{
		$newnote = str_replace('\"','\"\"',$notelog);
	}

	$newlog =   $date . ' @ ' . $time . ': <strong>'.$eventnote.'</strong><br>' . $notelog;
	$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid') UPDATE status set notelog='$newlog' WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
}
##openselect('350px','input_12','1LocCity','form-dropdown');
function openselect($width,$id,$name,$class)
{
echo '<select class="'.$class.'" style="width:'.$width.'" id="'.$id.'" name="'.$name.'">';
}

function closeselect()
{
echo '</select>';
}
##option('Antioch - County East Mall','Antioch - County East Mall','1LocCity',$LocCity);
##option('Pickle','Pickle','1LocCity',$LocCity);
function option($value,$currentloccity)
{

		if (empty($currentloccity)) unset($currentloccity);
		if (isset($currentloccity))
		{
			if ($currentloccity == $value)
			{
				echo '<option name="1LocCity" selected="selected" value="'.$value.'"> '.$value.' </option>';
			}
			else
			{
				echo '<option name="1LocCity" value="'.$value.'"> '.$value.' </option>';				
			}
		}
		else
		{
			echo '<option name="1LocCity" value="'.$value.'"> '.$value.' </option>';
		}

}


function cleansearch($var)

{
	$usethis = $$var;
	//strip single quote
	if(strstr($usethis,'\''))
	{
	
	    $usethis = str_replace('\'','',$usethis);
	}
	
	//strip double quote
	if(strstr($usethis,'\"'))
	{
	
	    $usethis = str_replace('\"','',$usethis);
	}	
	//strip percentage
	if(strstr($usethis,'%'))
	{
	
	    $usethis = str_replace('%','',$usethis);
	}
	//strip asterisk
	if(strstr($usethis,'*'))
	{
	
	    $usethis = str_replace('*','',$usethis);
	}
	//strip underscore
	if(strstr($usethis,'_'))
	{
	
	    $usethis = str_replace('_','',$usethis);
	}
	//strip ampersand
	if(strstr($usethis,'&'))
	{
	
	    $usethis = str_replace('\'','',$usethis);
	}	
	//strip dash
	if(strstr($usethis,'-'))
	{
	
	    $usethis = str_replace('-','',$usethis);
	}
	
	//strip space
	if(strstr($usethis,' '))
	{
	
	    $usethis = str_replace(' ','',$usethis);
	}
	//strip comma
	if(strstr($usethis,','))
	{
	
	    $usethis = str_replace(',','',$usethis);
	}

	//strip period
	if(strstr($usethis,'.'))
	{
	
	    $usethis = str_replace('.','',$usethis);
	}
	
	
	//strip parenthasis open
	if(strstr($usethis,'('))
	{
	
		$usethis = preg_replace('/\(|\)/','',$usethis);
	}
	
	//strip parenthasis close
	if(strstr($usethis,')'))
	{
		$usethis = preg_replace('/\(|\)/','',$usethis); 
	}
}
function report_dnc()
{
	
	$query = "SELECT COUNT(*) as COUNT FROM status where donotcontact='yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$dnccount = $row['COUNT'];
	}
}

function emailattorney($docutype,$attorneyemail,$attorneylname,$attorneyfname,$uniqueid)
{
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');

$message = '
<html>
<head>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
	<tbody>
        <tr>
		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
			  <tr>
			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%"><p>Dear '.$attorneyfname.' '.$attorneylname.':</p>
				<p>New documents from your client have been received. <br /><br />

				Uniqueid: '.$uniqueid.'
				<br />
<br />

MARS: <a href="http://sqlsrv.domain.initiativelegal.com/mars/client3.php?uniqueid='.$uniqueid.'">CLICK HERE</a>

<br>

</p></td>
		      </tr>
		    </table></td>
		</tr>
		
		<tr>
			
</table>
</body>
</html>


';
require_once('class.phpmailer.php');
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "macyslawsuit"; // SMTP account username
  $mail->Password   = "PLS1234!";        // SMTP account password
  $mail->AddAddress($attorneyemail,$attorneyfname.' '.$attorneylname);
  $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
  $mail->AddCC('hcox@initiativelegal.com','Heather Cox');
  $mail->AddCC('vchetty@initiativelegal.com','VJ Chetty');

  $mail->Subject = 'New documents have been received from your client! - '.$docutype.' - '.$uniqueid;
  
  $mail->MsgHTML($message);
  $mail->Send();
  
  #echo "</p>\n";
} 
catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}

}


function makeretainerbulk($brandname,$uniqueid,$FirstName,$LastName,$clientname,$agentname,$agentemail,$Street1,$Street2,$City,$State,$Zipcode)
{
	$pdf = new PDF_Code128();
	$subject1 = './retainers/'. "$brandname" . 'BulkRetainerCoverSubject1.txt';
	$subject2 = './retainers/'. "$brandname" . 'BulkRetainerCoverSubject2.txt';
	$body1 = './retainers/'. "$brandname" . 'BulkRetainerCoverBody1.txt';
	$get1 = file_get_contents($subject1);
	$get2 = file_get_contents($subject2);
	$body1 = './retainers/'. "$brandname" . 'BulkRetainerCoverBody1.txt';
	$get3 = file_get_contents($body1);
	$body2 = './retainers/'. "$brandname" . 'BulkRetainerCoverBody2.txt';
	$get4 = file_get_contents($body2);
	$body3 = './retainers/'. "$brandname" . 'BulkRetainerCoverBody3.txt';
	$get5 = file_get_contents($body3);
	$body4 = './retainers/'. "$brandname" . 'BulkRetainerCoverBody4.txt';
	$get6 = file_get_contents($body4);
	$hellocompany = 'INITIATIVE LEGAL GROUP APC';
	#$agentname = 'Ian Hutchings';
	#$agentemail = 'ihutchings@initiativelegal.com';
	
	$caseattorneyname = '                                                                                                                                          '.$agentname;
	$caseattorneyphonenumber = '                                                                                                                                          888.792.2293';
	$caseattorneyemail = '                                                                                                                                          '.$agentemail;
	$hellotitle = 'ATTORNEY ADVERTISEMENT';
	$hello = "$clientname" . ' ("Client") ';
	$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
	$printyourfullname = 'VIA U.S. MAIL';
	$yourbestphonenumber = $FirstName.' '.$LastName;
	$addressline1 = $Street1.' '.$Street2;
	$addressline2 = $City.', '.$State.' '.$Zipcode;
	$title = 'ATTORNEY-CLIENT AGREEMENT';
	$agreed = 'AGREED AND ACCEPTED';
	$space = ' ';
	$doublespace = '  ';
	$tenspace = $doublespace.''.$doublespace.''.$doublespace.''.$doublespace.''.$doublespace;
	$fiftyspace = $tenspace.''.$tenspace.''.$tenspace.''.$tenspace.''.$tenspace;
	$twofiftyspace = $fiftyspace.''.$fiftyspace.''.$fiftyspace.''.$fiftyspace.''.$fiftyspace;
	$printtxt = 'PRINT FIRST AND LAST NAME';
	$printline = '__________________________________';
	$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
	$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
	$pdf->AddPage('L','',$uniqueid);
	#$pdf->Ln(3);
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$tenspace.$tenspace.'Initiative Legal Group APC','','L');
	$pdf->Ln(-1);
	$pdf->MultiCell(0,5,$tenspace.$tenspace.'c/o Macy\'s Lawsuit','','L');
	$pdf->Ln(-1);
	$pdf->MultiCell(0,5,$tenspace.$tenspace.'9663 Santa Monica Blvd., #149','','L');
	$pdf->Ln(-1);
	#$pdf->MultiCell(0,5,$tenspace.$tenspace.'2nd Floor','','L');
	#$pdf->Ln(-1);
	
	$pdf->MultiCell(0,5,$tenspace.$tenspace.'Beverly Hills, CA 90210','','L');
	$pdf->Ln(2);
	$pdf->SetFont('Times','B',12);
	$pdf->MultiCell(0,5,$tenspace.$tenspace.'ATTORNEY ADVERTISEMENT','','L');                
	$pdf->Ln(95);
	$pdf->SetFont('Times','',18);
	$pdf->MultiCell(0,5,$tenspace.''.$fiftyspace.''.$yourbestphonenumber,'','L');
	$pdf->Ln(0);
	$pdf->SetFont('Times','',18);
	$pdf->MultiCell(0,5,$tenspace.''.$fiftyspace.''.$addressline1,'','L');
	$pdf->Ln(0);
	$pdf->SetFont('Times','',18);
	$pdf->MultiCell(0,5,$tenspace.''.$fiftyspace.''.$addressline2,'','L');
	$pdf->Ln();
	$code = $uniqueid;
	$pdf->Code128(35,40,$code,50,3);
	
	$pdf->AddPage('','','');
	$pdf->Image('logo.png',62,13,'','8');
	#$pdf->Image('logo.png',);
	#$pdf->Image('logo.png',62,13,8,0,'','');
	$pdf->Ln();
	#$pdf->SetFont('helvetica','B',12);
	#$pdf->MultiCell(0,5,$hellocompany,'','C');
	$pdf->Ln(15);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$caseattorneyname,'','L');
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','L');
	$pdf->Ln(0);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$caseattorneyemail,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',12);
	$pdf->MultiCell(0,5,$hellotitle,'','C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$hello2);
	$pdf->Ln();
	$pdf->SetFont('Times','U',12);
	$pdf->MultiCell(0,5,$printyourfullname);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$yourbestphonenumber);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$addressline1);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$addressline2);
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,5,'Subject:');
	$pdf->Ln(0);
	$pdf->SetFont('Times','I',12);
	$pdf->Cell(0,5,$get1);
	$pdf->Ln(5);
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$get2);
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,'Dear '.$clientname.': ');
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$get3);
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$get4);
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$get5);
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,$get6);
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,'Sincerely,');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->MultiCell(0,5,$agentname,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,5,'Enclosed: Attorney-Client Agreement Agreement and self-addressed stamped envelope');
	$code= $uniqueid;
	#$pdf->Code128(130,260,$code,70,10);
	#$pdf->SetXY(130,270);
	#$pdf->Write(5,''.$code.'');
$retainerhead1 = './retainers/'. "$brandname" . 'RetainerHead1.txt';
	$retainerhead2 = './retainers/'. "$brandname" . 'RetainerHead2.txt';
	$retainerhead3 = './retainers/'. "$brandname" . 'RetainerHead3.txt';
	$retainerhead4 = './retainers/'. "$brandname" . 'RetainerHead4.txt';
	$retainerhead5 = './retainers/'. "$brandname" . 'RetainerHead5.txt';
	$retainerhead6 = './retainers/'. "$brandname" . 'RetainerHead6.txt';
	$retainerhead7 = './retainers/'. "$brandname" . 'RetainerHead7.txt';
	$retainerhead8 = './retainers/'. "$brandname" . 'RetainerHead8.txt';
	$retainerhead9 = './retainers/'. "$brandname" . 'RetainerHead9.txt';
	$retainerhead10 = './retainers/'. "$brandname" . 'RetainerHead10.txt';
	$retainer1 = './retainers/'. "$brandname" . 'RetainerPart1.txt';
	$retainer2 = './retainers/'. "$brandname" . 'RetainerPart2.txt';
	$retainer3 = './retainers/'. "$brandname" . 'RetainerPart3.txt';
	$retainer4 = './retainers/'. "$brandname" . 'RetainerPart4.txt';
	$retainer5 = './retainers/'. "$brandname" . 'RetainerPart5.txt';
	$retainer6 = './retainers/'. "$brandname" . 'RetainerPart6.txt';
	$retainer7 = './retainers/'. "$brandname" . 'RetainerPart7.txt';
	$retainer8 = './retainers/'. "$brandname" . 'RetainerPart8.txt';
	$retainer9 = './retainers/'. "$brandname" . 'RetainerPart9.txt';
	$retainer10 = './retainers/'. "$brandname" . 'RetainerPart10.txt';
	$get1 = file_get_contents($retainer1);
	$get2 = file_get_contents($retainer2);
	$get3 = file_get_contents($retainer3);
	$get4 = file_get_contents($retainer4);
	$get5 = file_get_contents($retainer5);
	$get6 = file_get_contents($retainer6);
	$get7 = file_get_contents($retainer7);
	$get8 = file_get_contents($retainer8);
	$get9 = file_get_contents($retainer9);
	$get10 = file_get_contents($retainer10);
	$gethead1 = file_get_contents($retainerhead1);
	$gethead2 = file_get_contents($retainerhead2);
	$gethead3 = file_get_contents($retainerhead3);
	$gethead4 = file_get_contents($retainerhead4);
	$gethead5 = file_get_contents($retainerhead5);
	$gethead6 = file_get_contents($retainerhead6);
	$gethead7 = file_get_contents($retainerhead7);
	$gethead8 = file_get_contents($retainerhead8);
	$gethead9 = file_get_contents($retainerhead9);
	$gethead10 = file_get_contents($retainerhead10);
	$hellocompany = 'INITIATIVE LEGAL GROUP APC';
	$hellotitle = 'ATTORNEY-CLIENT AGREEMENT';
	$hello = $clientname . ' ("Client") ';
	$hello2 = '     This Attorney-Client Agreement sets forth the terms under which Initiative Legal Group APC ("Attorneys") has been retained by '.$clientname.' ("Client") to perform certain legal services.';
	$printyourfullname = '________________________________[print your full name] ("Client")';
	$yourbestphonenumber = '______________________[your best phone number]';
	$emergencycontact = '___________________[name of Emergency Contact]____________[Relationship]_________________[phone number]';
	$title = 'ATTORNEY-CLIENT AGREEMENT';
	$agreed = 'AGREED AND ACCEPTED';
	$space = ' ';
	$printtxt = 'PRINT FIRST AND LAST NAME';
	$printline = $clientname.'                                     ';
	$signtxt = 'SIGN YOUR NAME                                 DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" ."$space" ."$space" ."$space" ."$space" .'             On behalf of ATTORNEYS                 DATE';
	$signline = '________________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" ."$space" ."$space" ."$space" ."$space" ."$space" .' ________________________________/___________';               
	
	$pdf->AddPage('','',$uniqueid);
	$pdf->Image('logo.png',62,13,'','8');
	$pdf->Ln();
	$pdf->Ln(9);
	$pdf->SetFont('Times','B',12);
	$pdf->MultiCell(0,5,$hellotitle,'','C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,$hello2);
	//start of form fields
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'1.               '.$gethead1);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                                                                     '.$get1,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'2.               '.$gethead2);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                                                    '.$get2,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'3.               '.$gethead3);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                             '.$get3);
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'4.               '.$gethead4);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                                  '.$get4,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'5.               '.$gethead5);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                    '.$get5,'','L');
	$pdf->SetFont('Arial','B',11);
//page1barcodeStart
	$code= $uniqueid;
	$pdf->SetXY(70,264);
	$pdf->Cell(0,10,'CLIENT INITIALS _______','','','R');
	$pdf->SetFont('Arial','',6);            
	$pdf->Code128(70,286,$code,70,2);

	//page1barcodeEnd
	// page 2 start
	$pdf->AddPage('','',$uniqueid);;
	$pdf->Ln(5);
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'6.               '.$gethead6);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                                                                        '.$get6,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'7.               '.$gethead7);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                       '.$get7,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'8.               '.$gethead8);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                                                       '.$get8,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'9.               '.$gethead9);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                                                                          '.$get9,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(0,5,'10.               '.$gethead10);
	$pdf->Ln(0);
	$pdf->SetFont('Times','',11);
	$pdf->MultiCell(0,5,'                                                      '.$get10,'','L');
	$pdf->Ln();
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(0,5,$agreed,'','','L');
	$pdf->Ln(15);
	$pdf->SetFont('Times','',10);
	$pdf->Cell(0,5,$signline);
	$pdf->Ln(7);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$signtxt);
	$pdf->Ln(9);
	$pdf->SetFont('Times','U',12);
	$pdf->Cell(0,5,$printline);
	$pdf->Ln(4);
	$pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,5,$printtxt);
	$pdf->SetFont('Arial','',10);
	$code= $uniqueid;
	#$pdf->Code128(10,260,$code,70,10);
	$pdf->SetXY(130,270);
	#$pdf->Write(5,''.$code.'');
	$pdf->SetFont('Arial','B',11);
	$code= $uniqueid;
	#$pdf->Code128(130,260,$code,70,10);
	$pdf->Code128(70,286,$code,70,2);
	#$pdf->SetXY(130,270);
	#$pdf->Write(5,''.$code.'');
	$pdf->SetXY(70,264);
	$pdf->Cell(0,10,'CLIENT INITIALS _______','','','R');
	$dir='/inetpub/wwwroot/';
	$filename = "$LastName, " .  "$FirstName" . " - Retainer - ".$uniqueid; 
	$ext = ".pdf";
	
	$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F",$uniqueid); //pushes file to server for temp storage
	$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F",$uniqueid);
	
	$ftp_server = '10.129.3.21';
	$ftp_user_name = 'sqlsrv';
	$ftp_user_pass = 'password';
	$dir0 = '/' . "$brandname" . '/';
	##
	###
	//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
	$newdiruniquid = $dir0."".$uniqueid;
	###
	##
	$filename3= "$LastName, " .  "$FirstName" . " - ".$uniqueid; 
	$dir1 = "$dir0" . "$filename3";
	$dir2 = "$dir1" . '/';
	$dir3 = "$dir1" . '/';
	$file = "$filename" . "$ext";
	#$file2 = "$filename2" . "$ext";
	$conn_id = ftp_connect($ftp_server);
	
	// login with username and password
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	
	if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$newdiruniquid.''))
	{
	    
	}
	else
	{
	    ftp_mkdir($conn_id, $newdiruniquid);
	}
	ftp_chdir($conn_id, $newdiruniquid);
	ftp_put($conn_id, $file, $file, FTP_BINARY);
	ftp_close($conn_id);
	unlink($file); //delete temp copy pdf stored on server
}


?>
