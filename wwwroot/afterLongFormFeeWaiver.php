<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/style.css" rel="stylesheet" type="text/css" />
</head>

<?PHP
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

if (isset($_GET['uniqueid'])) $uniqueid = $_GET['uniqueid'];


$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT authformreceived,retainerRecieved,feewaiverreceived,completedlongformonline,FirstName,LastName,brand,email,brandid ,brand,Street1,Street2,City,Zipcode,State,feewaiverqualified FROM Status WHERE uniqueid='".$uniqueid."'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){

		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
		$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
		$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
		$brandname = $row['brand']; if (empty($brandname)) unset($brandname);
		$email = $row['email']; if (empty($email)) unset($email);
		$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
		$brand = $row['brand']; if (empty($brand)) unset($brand);
		$Address = $row['Street1'].' '.$row['Street2'].', '.$row['City'].', '.$row['State'].' '.$row['Zipcode'];
                $feewaivequal = $row['feewaiverqualified']; if (empty($feewaivequal)) unset($feewaivequal);
  }

if ($feewaivequal == 'Yes')
{
$clientname = $FirstName." ". $LastName;
if (empty($TwoSigners)) $TwoSigners = 'Create an Envelope with 2 Signers';
if (empty($RecipientEmail2)) $RecipientEmail2 = 'ihutchings@initiativelegal.com';
if (empty($RecipientName2)) $RecipientName2 = 'Ian Hutchings';

define('FPDF_FONTPATH', 'font/');
require('fpdf.php');
$date = date('Y').'-'.date('m').'-'.date('d');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');

class PDF_Code128 extends FPDF {

var $T128;                                             // tableau des codes 128
var $ABCset="";                                        // jeu des caract�res �ligibles au C128
var $Aset="";                                          // Set A du jeu des caract�res �ligibles
var $Bset="";                                          // Set B du jeu des caract�res �ligibles
var $Cset="";                                          // Set C du jeu des caract�res �ligibles
var $SetFrom;                                          // Convertisseur source des jeux vers le tableau
var $SetTo;                                            // Convertisseur destination des jeux vers le tableau
var $JStart = array("A"=>103, "B"=>104, "C"=>105);     // Caract�res de s�lection de jeu au d�but du C128
var $JSwap = array("A"=>101, "B"=>100, "C"=>99);       // Caract�res de changement de jeu

//____________________________ Extension du constructeur _______________________
function PDF_Code128($orientation='P', $unit='mm', $format='A4') {

    parent::FPDF($orientation,$unit,$format);

    $this->T128[] = array(2, 1, 2, 2, 2, 2);           //0 : [ ]               // composition des caract�res
    $this->T128[] = array(2, 2, 2, 1, 2, 2);           //1 : [!]
    $this->T128[] = array(2, 2, 2, 2, 2, 1);           //2 : ["]
    $this->T128[] = array(1, 2, 1, 2, 2, 3);           //3 : [#]
    $this->T128[] = array(1, 2, 1, 3, 2, 2);           //4 : [$]
    $this->T128[] = array(1, 3, 1, 2, 2, 2);           //5 : [%]
    $this->T128[] = array(1, 2, 2, 2, 1, 3);           //6 : [&]
    $this->T128[] = array(1, 2, 2, 3, 1, 2);           //7 : [']
    $this->T128[] = array(1, 3, 2, 2, 1, 2);           //8 : [(]
    $this->T128[] = array(2, 2, 1, 2, 1, 3);           //9 : [)]
    $this->T128[] = array(2, 2, 1, 3, 1, 2);           //10 : [*]
    $this->T128[] = array(2, 3, 1, 2, 1, 2);           //11 : [+]
    $this->T128[] = array(1, 1, 2, 2, 3, 2);           //12 : [,]
    $this->T128[] = array(1, 2, 2, 1, 3, 2);           //13 : [-]
    $this->T128[] = array(1, 2, 2, 2, 3, 1);           //14 : [.]
    $this->T128[] = array(1, 1, 3, 2, 2, 2);           //15 : [/]
    $this->T128[] = array(1, 2, 3, 1, 2, 2);           //16 : [0]
    $this->T128[] = array(1, 2, 3, 2, 2, 1);           //17 : [1]
    $this->T128[] = array(2, 2, 3, 2, 1, 1);           //18 : [2]
    $this->T128[] = array(2, 2, 1, 1, 3, 2);           //19 : [3]
    $this->T128[] = array(2, 2, 1, 2, 3, 1);           //20 : [4]
    $this->T128[] = array(2, 1, 3, 2, 1, 2);           //21 : [5]
    $this->T128[] = array(2, 2, 3, 1, 1, 2);           //22 : [6]
    $this->T128[] = array(3, 1, 2, 1, 3, 1);           //23 : [7]
    $this->T128[] = array(3, 1, 1, 2, 2, 2);           //24 : [8]
    $this->T128[] = array(3, 2, 1, 1, 2, 2);           //25 : [9]
    $this->T128[] = array(3, 2, 1, 2, 2, 1);           //26 : [:]
    $this->T128[] = array(3, 1, 2, 2, 1, 2);           //27 : [;]
    $this->T128[] = array(3, 2, 2, 1, 1, 2);           //28 : [<]
    $this->T128[] = array(3, 2, 2, 2, 1, 1);           //29 : [=]
    $this->T128[] = array(2, 1, 2, 1, 2, 3);           //30 : [>]
    $this->T128[] = array(2, 1, 2, 3, 2, 1);           //31 : [?]
    $this->T128[] = array(2, 3, 2, 1, 2, 1);           //32 : [@]
    $this->T128[] = array(1, 1, 1, 3, 2, 3);           //33 : [A]
    $this->T128[] = array(1, 3, 1, 1, 2, 3);           //34 : [B]
    $this->T128[] = array(1, 3, 1, 3, 2, 1);           //35 : [C]
    $this->T128[] = array(1, 1, 2, 3, 1, 3);           //36 : [D]
    $this->T128[] = array(1, 3, 2, 1, 1, 3);           //37 : [E]
    $this->T128[] = array(1, 3, 2, 3, 1, 1);           //38 : [F]
    $this->T128[] = array(2, 1, 1, 3, 1, 3);           //39 : [G]
    $this->T128[] = array(2, 3, 1, 1, 1, 3);           //40 : [H]
    $this->T128[] = array(2, 3, 1, 3, 1, 1);           //41 : [I]
    $this->T128[] = array(1, 1, 2, 1, 3, 3);           //42 : [J]
    $this->T128[] = array(1, 1, 2, 3, 3, 1);           //43 : [K]
    $this->T128[] = array(1, 3, 2, 1, 3, 1);           //44 : [L]
    $this->T128[] = array(1, 1, 3, 1, 2, 3);           //45 : [M]
    $this->T128[] = array(1, 1, 3, 3, 2, 1);           //46 : [N]
    $this->T128[] = array(1, 3, 3, 1, 2, 1);           //47 : [O]
    $this->T128[] = array(3, 1, 3, 1, 2, 1);           //48 : [P]
    $this->T128[] = array(2, 1, 1, 3, 3, 1);           //49 : [Q]
    $this->T128[] = array(2, 3, 1, 1, 3, 1);           //50 : [R]
    $this->T128[] = array(2, 1, 3, 1, 1, 3);           //51 : [S]
    $this->T128[] = array(2, 1, 3, 3, 1, 1);           //52 : [T]
    $this->T128[] = array(2, 1, 3, 1, 3, 1);           //53 : [U]
    $this->T128[] = array(3, 1, 1, 1, 2, 3);           //54 : [V]
    $this->T128[] = array(3, 1, 1, 3, 2, 1);           //55 : [W]
    $this->T128[] = array(3, 3, 1, 1, 2, 1);           //56 : [X]
    $this->T128[] = array(3, 1, 2, 1, 1, 3);           //57 : [Y]
    $this->T128[] = array(3, 1, 2, 3, 1, 1);           //58 : [Z]
    $this->T128[] = array(3, 3, 2, 1, 1, 1);           //59 : [[]
    $this->T128[] = array(3, 1, 4, 1, 1, 1);           //60 : [\]
    $this->T128[] = array(2, 2, 1, 4, 1, 1);           //61 : []]
    $this->T128[] = array(4, 3, 1, 1, 1, 1);           //62 : [^]
    $this->T128[] = array(1, 1, 1, 2, 2, 4);           //63 : [_]
    $this->T128[] = array(1, 1, 1, 4, 2, 2);           //64 : [`]
    $this->T128[] = array(1, 2, 1, 1, 2, 4);           //65 : [a]
    $this->T128[] = array(1, 2, 1, 4, 2, 1);           //66 : [b]
    $this->T128[] = array(1, 4, 1, 1, 2, 2);           //67 : [c]
    $this->T128[] = array(1, 4, 1, 2, 2, 1);           //68 : [d]
    $this->T128[] = array(1, 1, 2, 2, 1, 4);           //69 : [e]
    $this->T128[] = array(1, 1, 2, 4, 1, 2);           //70 : [f]
    $this->T128[] = array(1, 2, 2, 1, 1, 4);           //71 : [g]
    $this->T128[] = array(1, 2, 2, 4, 1, 1);           //72 : [h]
    $this->T128[] = array(1, 4, 2, 1, 1, 2);           //73 : [i]
    $this->T128[] = array(1, 4, 2, 2, 1, 1);           //74 : [j]
    $this->T128[] = array(2, 4, 1, 2, 1, 1);           //75 : [k]
    $this->T128[] = array(2, 2, 1, 1, 1, 4);           //76 : [l]
    $this->T128[] = array(4, 1, 3, 1, 1, 1);           //77 : [m]
    $this->T128[] = array(2, 4, 1, 1, 1, 2);           //78 : [n]
    $this->T128[] = array(1, 3, 4, 1, 1, 1);           //79 : [o]
    $this->T128[] = array(1, 1, 1, 2, 4, 2);           //80 : [p]
    $this->T128[] = array(1, 2, 1, 1, 4, 2);           //81 : [q]
    $this->T128[] = array(1, 2, 1, 2, 4, 1);           //82 : [r]
    $this->T128[] = array(1, 1, 4, 2, 1, 2);           //83 : [s]
    $this->T128[] = array(1, 2, 4, 1, 1, 2);           //84 : [t]
    $this->T128[] = array(1, 2, 4, 2, 1, 1);           //85 : [u]
    $this->T128[] = array(4, 1, 1, 2, 1, 2);           //86 : [v]
    $this->T128[] = array(4, 2, 1, 1, 1, 2);           //87 : [w]
    $this->T128[] = array(4, 2, 1, 2, 1, 1);           //88 : [x]
    $this->T128[] = array(2, 1, 2, 1, 4, 1);           //89 : [y]
    $this->T128[] = array(2, 1, 4, 1, 2, 1);           //90 : [z]
    $this->T128[] = array(4, 1, 2, 1, 2, 1);           //91 : [{]
    $this->T128[] = array(1, 1, 1, 1, 4, 3);           //92 : [|]
    $this->T128[] = array(1, 1, 1, 3, 4, 1);           //93 : [}]
    $this->T128[] = array(1, 3, 1, 1, 4, 1);           //94 : [~]
    $this->T128[] = array(1, 1, 4, 1, 1, 3);           //95 : [DEL]
    $this->T128[] = array(1, 1, 4, 3, 1, 1);           //96 : [FNC3]
    $this->T128[] = array(4, 1, 1, 1, 1, 3);           //97 : [FNC2]
    $this->T128[] = array(4, 1, 1, 3, 1, 1);           //98 : [SHIFT]
    $this->T128[] = array(1, 1, 3, 1, 4, 1);           //99 : [Cswap]
    $this->T128[] = array(1, 1, 4, 1, 3, 1);           //100 : [Bswap]                
    $this->T128[] = array(3, 1, 1, 1, 4, 1);           //101 : [Aswap]
    $this->T128[] = array(4, 1, 1, 1, 3, 1);           //102 : [FNC1]
    $this->T128[] = array(2, 1, 1, 4, 1, 2);           //103 : [Astart]
    $this->T128[] = array(2, 1, 1, 2, 1, 4);           //104 : [Bstart]
    $this->T128[] = array(2, 1, 1, 2, 3, 2);           //105 : [Cstart]
    $this->T128[] = array(2, 3, 3, 1, 1, 1);           //106 : [STOP]
    $this->T128[] = array(2, 1);                       //107 : [END BAR]

    for ($i = 32; $i <= 95; $i++) {                                            // jeux de caract�res
        $this->ABCset .= chr($i);
    }
    $this->Aset = $this->ABCset;
    $this->Bset = $this->ABCset;
    for ($i = 0; $i <= 31; $i++) {
        $this->ABCset .= chr($i);
        $this->Aset .= chr($i);
    }
    for ($i = 96; $i <= 126; $i++) {
        $this->ABCset .= chr($i);
        $this->Bset .= chr($i);
    }
    $this->Cset="0123456789";

    for ($i=0; $i<96; $i++) {                                                  // convertisseurs des jeux A & B  
        @$this->SetFrom["A"] .= chr($i);
        @$this->SetFrom["B"] .= chr($i + 32);
        @$this->SetTo["A"] .= chr(($i < 32) ? $i+64 : $i-32);
        @$this->SetTo["B"] .= chr($i);
    }
}

//________________ Fonction encodage et dessin du code 128 _____________________
function Header()
{
	global $title;
	$this->Ln(14);
}
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-20);
	// Arial italic 8
	$this->SetFont('Arial','I',9);
	// Text color in gray
	$this->SetTextColor(128);
	// Page number
#	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
//	$this->Cell(0,10,'1800 Century Park East, 2nd Floor - Los Angeles, California 90067 ','','','C');
//	$this->Ln(3);
//	$this->Cell(0,10,'877-515-4712 Main - 310.861.9051 Fax - www.InitiativeLegal.com ','','','C');
//	$this->Ln(4);
//	$this->Cell(0,10,'CLIENT INITIALS _______','','','R');
//	$this->Ln(9);
}


function Code128($x, $y, $code, $w, $h) {
    $Aguid = "";                                                                      // Cr�ation des guides de choix ABC
    $Bguid = "";
    $Cguid = "";
    for ($i=0; $i < strlen($code); $i++) {
        $needle = substr($code,$i,1);
        $Aguid .= ((strpos($this->Aset,$needle)===false) ? "N" : "O"); 
        $Bguid .= ((strpos($this->Bset,$needle)===false) ? "N" : "O"); 
        $Cguid .= ((strpos($this->Cset,$needle)===false) ? "N" : "O");
    }

    $SminiC = "OOOO";
    $IminiC = 4;

    $crypt = "";
    while ($code > "") {
                                                                                    // BOUCLE PRINCIPALE DE CODAGE
        $i = strpos($Cguid,$SminiC);                                                // for�age du jeu C, si possible
        if ($i!==false) {
            $Aguid [$i] = "N";
            $Bguid [$i] = "N";
        }

        if (substr($Cguid,0,$IminiC) == $SminiC) {                                  // jeu C
            $crypt .= chr(($crypt > "") ? $this->JSwap["C"] : $this->JStart["C"]);  // d�but Cstart, sinon Cswap
            $made = strpos($Cguid,"N");                                             // �tendu du set C
            if ($made === false) {
                $made = strlen($Cguid);
            }
            if (fmod($made,2)==1) {
                $made--;                                                            // seulement un nombre pair
            }
            for ($i=0; $i < $made; $i += 2) {
                $crypt .= chr(strval(substr($code,$i,2)));                          // conversion 2 par 2
            }
            $jeu = "C";
        } else {
            $madeA = strpos($Aguid,"N");                                            // �tendu du set A
            if ($madeA === false) {
                $madeA = strlen($Aguid);
            }
            $madeB = strpos($Bguid,"N");                                            // �tendu du set B
            if ($madeB === false) {
                $madeB = strlen($Bguid);
            }
            $made = (($madeA < $madeB) ? $madeB : $madeA );                         // �tendu trait�e
            $jeu = (($madeA < $madeB) ? "B" : "A" );                                // Jeu en cours

            $crypt .= chr(($crypt > "") ? $this->JSwap[$jeu] : $this->JStart[$jeu]); // d�but start, sinon swap

            $crypt .= strtr(substr($code, 0,$made), $this->SetFrom[$jeu], $this->SetTo[$jeu]); // conversion selon jeu

        }
        $code = substr($code,$made);                                           // raccourcir l�gende et guides de la zone trait�e
        $Aguid = substr($Aguid,$made);
        $Bguid = substr($Bguid,$made);
        $Cguid = substr($Cguid,$made);
    }                                                                          // FIN BOUCLE PRINCIPALE

    $check = ord($crypt[0]);                                                   // calcul de la somme de contr�le
    for ($i=0; $i<strlen($crypt); $i++) {
        $check += (ord($crypt[$i]) * $i);
    }
    $check %= 103;

    $crypt .= chr($check) . chr(106) . chr(107);                               // Chaine Crypt�e compl�te

    $i = (strlen($crypt) * 11) - 8;                                            // calcul de la largeur du module
    $modul = $w/$i;

    for ($i=0; $i<strlen($crypt); $i++) {                                      // BOUCLE D'IMPRESSION
        $c = $this->T128[ord($crypt[$i])];
        for ($j=0; $j<count($c); $j++) {
            $this->Rect($x,$y,$c[$j]*$modul,$h,"F");
            $x += ($c[$j++]+$c[$j])*$modul;
        }
    }
}
}




//PDF CREATOR


$date = date('Y').'-'.date('m').'-'.date('d');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');


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
#$clientname = "$FirstName" . " $LastName";
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
$filename = $LastName.", ".$FirstName." - ".$uniqueid; 
$filename2 = $LastName.", ".$FirstName." - Feewaiver - ".$uniqueid; 
$ext = ".pdf";
$pdf->Output("/inetpub/wwwroot/$filename2$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/Retainerstmp/$filename2$ext","F"); //pushes file to server for temp storage
//pdf create end
//FTP
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
$dir1 = "$dir0" . "$filename";
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
//ftp end

//docusign start


////require ("include/ianSession.php"); 
////require ("api/ianCredential.php");
////require ("api/APIService.php");
////require ("include/utils.php");
////		$_SESSION["UserID"] = "ihutchings@initiativelegal.com";
////		$_SESSION["AccountID"] = "873db901-09a0-460f-933a-e0069b414d3f";
////        $_SESSION["Password"] = "siec9oanoapoeqiA";
////        $_SESSION["IntegratorsKey"] = "INIT-ec3b5acd-ad64-496b-b821-2b89ae424e82";

require ("include/prod/ianSession.php"); 
require ("api/prod/ianCredential.php");
require ("api/prod/APIService.php");
require ("include/prod/utils.php");
//prod UserID
$_SESSION["UserID"] = "4dbf6087-64d2-4584-bf04-698ce5bf24d7";
//demo UserID
#		$_SESSION["UserID"] = "ihutchings@preferredlegalsupport.com";
//this one is the production accountid		
$_SESSION["AccountID"] = "7ac3ef7c-e311-400e-a932-31f225a2e747";
//this one is the demo accountid
#		$_SESSION["AccountID"] = "c468460b-4d8f-4fd6-980c-0974de9c815a";
		$_SESSION["Password"] = "siec9oanoapoeqiA";

        $_SESSION["IntegratorsKey"] = "INIT-ec3b5acd-ad64-496b-b821-2b89ae424e82";
//========================================================================
// globals
//========================================================================
$_oneSigner = true; // Do we want One Signer (=true) or Two (=false)
$_showTwoSignerMessage = false; // Display (or not display) a message before Signer One has signed (only for Two Signer mode)
$_showTransitionMessage = false; // Display (or not display) a message after Signer One has signed (only for Two Signer mode)
//========================================================================
// Functions
//========================================================================

/**
 * Creates an embedded signing experience.
 */
$chewypdf = './Retainerstmp/'."$filename2".'.pdf';
$pdfname = "$filename2";
$chewonthis = "PDFBytes = file_get_contents($chewypdf)";
function createAndSend($pdffilename,$subject,$name,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$grossincomeprint,$HouseHoldCount,$Address,$clientname) {
    global $_oneSigner;
    $status = "";
    
    // Construct basic envelope
    $env = new Envelope();
    $env->Subject = $subject;
    $env->EmailBlurb = "This envelope demonstrates embedded signing";
    $env->AccountId = $_SESSION['AccountID'];
    $env->Recipients = constructRecipients($FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2);
    
    $doc = new Document();
    $doc->PDFBytes = file_get_contents($pdffilename);
	$doc->Name = $name;

    $doc->ID = "1";
    $doc->FileExtension = "pdf";
    $env->Documents = array($doc);
    
    $env->Tabs = addTabs(count($env->Recipients),$grossincomeprint,$HouseHoldCount,$Address,$clientname);
    
    $api = getAPI();
    try {
        $csParams = new CreateAndSendEnvelope();
        $csParams->Envelope = $env;
        $status = $api->CreateAndSendEnvelope($csParams)->CreateAndSendEnvelopeResult;
        addEnvelopeID($status->EnvelopeID);
        getToken($status, 1, $uniqueid, $brandid, $brand, $tenantid);
    } catch (SoapFault $e) {
        $_SESSION['errorMessage'] = $e;
        header("Location: error.php");
    }
}

/**
 * Construct recipients
 * 
 * @param boolean $oneSigner
 * 	true - create one recipient
 * 	false = create two recipient
 * 
 * @return Recipient[]
 */


function constructRecipients($FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2) 
{
    $recipients = array();
    
    $count = count($FirstName);
    for ($i = 1; $i <= $count; $i++) {
    	
    		// Must contain all POST parameters
    		if(empty($FirstName) ||
    			 empty($email)){
    			 	continue;
    		}
    	
        $r1 = new Recipient();
        
        $r1->UserName = $FirstName. ' ' .$LastName;
        $r1->Email = $email;
        $r1->RequireIDLookup = false;
        $r1->ID = 1;
        $r1->Type = RecipientTypeCode::Signer;
        $r1->RoutingOrder = 1;    
        if(!isset($_POST['RecipientInviteToggle'][1])){
        	$r1->CaptiveInfo = new RecipientCaptiveInfo();
        	$r1->CaptiveInfo->ClientUserId = 1;
        }
        
        array_push($recipients, $r1);
		
        $r2 = new Recipient();
        
        $r2->UserName = $RecipientName2;
        $r2->Email = $RecipientEmail2;
        $r2->RequireIDLookup = false;
        $r2->ID = 2;
        $r2->Type = RecipientTypeCode::CarbonCopy;
        $r2->RoutingOrder = 2;
        
		//ian)-> comment next three lines to set 2nd recipient to recieve email when recipient 1 is done signing
#        if(!isset($_POST['RecipientInviteToggle'][$i])){
#        	$r1->CaptiveInfo = new RecipientCaptiveInfo();
#        	$r1->CaptiveInfo->ClientUserId = $i;
#       }
        
        array_push($recipients, $r2);

    }
    
    if(empty($recipients)){
	    $_SESSION['errorMessage'] = "You must include at least 1 Recipient";
	    header("Location: error.php");
	    exit;
    }
    
    return $recipients;
}

function addTabs($count,$grossincomeprint,$HouseHoldCount,$Address,$clientname) {
    $tabs[] = new Tab();
    
//first page initials at bottom right
	$sign2 = new Tab();
    $sign2->Type = TabTypeCode::SignHere;
    $sign2->DocumentID = "1";
    $sign2->PageNumber = "1";
    $sign2->RecipientID = "1";
    $sign2->XPosition = "330";//left right
    $sign2->YPosition = "475";//up down
    array_push($tabs, $sign2);

$data1 = new Tab();
$data1->Type = TabTypeCode::Custom;
$data1->CustomTabType = CustomTabType::Text;
$data1->CustomTabWidth = "120";
$data1->CustomTabHeight = "21";
$data1->CustomTabRequired = "0";
$data1->Value = $clientname;
$data1->TabLabel = "Your name";
$data1->Name = "Your name";
$data1->DocumentID = "1";
$data1->PageNumber = "1";
$data1->RecipientID = "1";
$data1->XPosition = "147";
$data1->YPosition = "382";
array_push($tabs, $data1);


$data2 = new Tab();
$data2->Type = TabTypeCode::Custom;
$data2->CustomTabType = CustomTabType::Text;
$data2->CustomTabWidth = "120";
$data2->CustomTabHeight = "21";
$data2->CustomTabRequired = "0";
$data2->Value = $Address;
$data2->TabLabel = "address";
$data2->Name = "address";
$data2->DocumentID = "1";
$data2->PageNumber = "1";
$data2->RecipientID = "1";
$data2->XPosition = "150";
$data2->YPosition = "395";
array_push($tabs, $data2);

$data3 = new Tab();
$data3->Type = TabTypeCode::Custom;
$data3->CustomTabType = CustomTabType::Text;
$data3->CustomTabWidth = "120";
$data3->CustomTabHeight = "21";
$data3->CustomTabRequired = "1";
#$data3->Value = "".$grossincomeprint;
$data3->TabLabel = "Gross monthly income";
$data3->Name = "Gross monthly income";
$data3->DocumentID = "1";
$data3->PageNumber = "1";
$data3->RecipientID = "1";
$data3->XPosition = "220";
$data3->YPosition = "425";
array_push($tabs, $data3);

	
$data4 = new Tab();
$data4->Type = TabTypeCode::Custom;
$data4->CustomTabType = CustomTabType::Text;
$data4->CustomTabWidth = "120";
$data4->CustomTabHeight = "21";
$data4->CustomTabRequired = "0";
$data4->Value = "".$HouseHoldCount;
$data4->TabLabel = "number of persons in household";
$data4->Name = "number of persons in household";
$data4->DocumentID = "1";
$data4->PageNumber = "1";
$data4->RecipientID = "1";
$data4->XPosition = "268";
$data4->YPosition = "408";
array_push($tabs, $data4);

    
    // eliminate 0th element
    array_shift($tabs);
    
    return $tabs;
}
function getToken($status, $clientID, $uniqueid, $brandid, $brand, $tenantid) {
    global $_oneSigner;
    $token = null;
    $_SESSION['embedToken'];
       
    // get recipient token
    $assertion = new RequestRecipientTokenAuthenticationAssertion();
    $assertion->AssertionID = guid();
    $assertion->AuthenticationInstant = todayXsdDate();
    $assertion->AuthenticationMethod = RequestRecipientTokenAuthenticationAssertionAuthenticationMethod::Password;
    $assertion->SecurityDomain = "DocuSign2011Q1Sample";
    
    // Get Recipient fro ClientID
    $recipient = false;
		foreach($status->RecipientStatuses->RecipientStatus as $rs){
			if($rs->ClientUserId == $clientID){
    		$recipient = $rs;
    	}
    }
    
    if($recipient == false){
	    $_SESSION['errorMessage'] = "Unable to find Recipient";
	    header("Location: error.php");
    }
    
    $urls = new RequestRecipientTokenClientURLs();
    $urlbase = getCallbackURL("pop.html") . "?source=Embedded";
    
    $urls->OnAccessCodeFailed = $urlbase . "&event=AccessCodeFailed&uname=" . $recipient->UserName;
    $urls->OnCancel = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnDecline = 'https://DFWMS01.initiativelegal.com/declineToSign.php?uniqueid='.$uniqueid.'&statuslevel=Decline&document=FeeWaiver';
    $urls->OnException = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnFaxPending = 'https://DFWMS01.initiativelegal.com/AfterLongForm1.php?uniqueid=' . "$uniqueid".'&statuslevel=Faxpending';
    $urls->OnIdCheckFailed = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnSessionTimeout = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnTTLExpired = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    $urls->OnViewingComplete = "https://DFWMS01.initiativelegal.com/AfterLongForm1.php";
    if ($_oneSigner) {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/AfterLongForm1.php?uniqueid=' . "$uniqueid".'&statuslevel=Signed';
    }
    else {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/AfterLongForm1.php?uniqueid=' . "$uniqueid".'&statuslevel=Signed';
    }
    
    $api = getAPI();
    $rrtParams = new RequestRecipientToken();
    $rrtParams->AuthenticationAssertion = $assertion;
    $rrtParams->ClientURLs = $urls;
    $rrtParams->ClientUserID = $recipient->ClientUserId;
    $rrtParams->Email = $recipient->Email;
    $rrtParams->EnvelopeID = $status->EnvelopeID;
    $rrtParams->Username = $recipient->UserName;
    
    try {
        $token = $api->RequestRecipientToken($rrtParams)->RequestRecipientTokenResult;
    } catch (SoapFault $e) {
        $_SESSION['errorMessage'] = $e;
        header("Location: error.php");
    }
    
     $_SESSION["embedToken"] = $token;
}
function getStatus($envelopeID) {
    $status = null;
    
    $api = getAPI();
    
    $rsParams = new RequestStatus();
    $rsParams->EnvelopeID = $envelopeID;
    
    try {
        $status = $api->RequestStatus($rsParams)->RequestStatusResult;
    } catch (SoapFault $e) {
        $_SESSION['errorMessage'] = $e;
        header("Location: error.php");
    }
    
    return $status;
}

//========================================================================
// Main
//========================================================================

loginCheck();

if ($_SERVER['REQUEST_METHOD'] == 'GET') 	
#if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $_oneSigner = isset($_POST['OneSigner']);
    $_oneSigner = isset($_REQUEST['OneSigner']);
    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$grossincomeprint,$HouseHoldCount,$Address,$clientname);
		if(!$_oneSigner)
		{
			$_showTwoSignerMessage = true;
		}

}

if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken']))
{
	echo '<div id="main">';
		echo '<div id="message">';
			echo "<h1>Step Five</h1>";
			echo '<h4>Affidavit for Waiver of Fees Notice</h4>';
			echo "<p>Below you will find an Affidavit for Waiver of Fees Notice. This will allow us to request that the American Arbitration Association waive the filing fee. Please carefully review the information to verify that it is correct.</p>";
			echo "<p>Once you have completed your review, use your computer mouse to draw your electronic signature when prompted. Don't worry if your electronic signature does not look exactly like your real signature. All that is required is that you make an original mark on this document.</p>";
			echo "<p>Please click on the &quot;confirmed signature&quot; button once you have completed the document and you will proceed to the next step of the process.</p>";
			echo "<p>This waiver will only apply and be filed with the American Arbitration Association if our law firm elects to pursue your claims on an individual basis through arbitration.</p>";
			echo "<table align='center' width='1024px' border='0' cellpadding='0' cellspacing='0'>";
				echo "<tr>";
					echo "<td  height='1100px'   align='center'>";
					echo "<iframe  align='middle' marginheight='5%' width='99%' height='98%' src='";
					echo $_SESSION['embedToken'] . "&id='focusstealer' name='focusstealer' frameborder='0' ";
					echo 'onload="reloadPage()"';
					echo "></iframe>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
		echo "</div>";
	echo '<p class="privilege">CONFIDENTIAL/WORK PRODUCT PRIVILEGE</p>';
	echo "</div>";
}
}

if ($feewaivequal !== 'Yes')
{
	echo '<body>';
	
	echo '<div id="main">';
		echo '<div id="message">';
			echo '<h3>Thank you for providing us with additional information regarding your potential wage and hour claims against Macy\'s!</h3>';
			echo '<p><br />We will review your information and contact you directly.<br /></p>';
			echo '<h3><br />Questions?</h3>';
			echo '<p>Contact us directly by calling <strong>888.792.2293</strong> or emailing your questions to <a href="mailto:macyslawsuit@initiativelegal.com">MacysLawsuit@InitiativeLegal.com</a>.</p>';
		echo '</div>';
		echo '<p class="privilege"><br />CONFIDENTIAL/WORK PRODUCT PRIVILEGE</p>';
	echo '</div>';
	
	echo '</body>';
	echo '</html>';	
}

?>