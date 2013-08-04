<?PHP
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');
$date = date('Y').'-'.date('m').'-'.date('d');
$datefilename = date('Y').'-'.date('m').'-'.date('d');
$timefilename = date('H').' '.date('i').' '.date('s');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');
$grossincomeDisplay="";

class PDF_Code128 extends FPDF {

var $T128;                                             // tableau des codes 128
var $ABCset="";                                        // jeu des caractères éligibles au C128
var $Aset="";                                          // Set A du jeu des caractères éligibles
var $Bset="";                                          // Set B du jeu des caractères éligibles
var $Cset="";                                          // Set C du jeu des caractères éligibles
var $SetFrom;                                          // Convertisseur source des jeux vers le tableau
var $SetTo;                                            // Convertisseur destination des jeux vers le tableau
var $JStart = array("A"=>103, "B"=>104, "C"=>105);     // Caractères de sélection de jeu au début du C128
var $JSwap = array("A"=>101, "B"=>100, "C"=>99);       // Caractères de changement de jeu

//____________________________ Extension du constructeur _______________________
function PDF_Code128($orientation='P', $unit='mm', $format='A4') {

    parent::FPDF($orientation,$unit,$format);

    $this->T128[] = array(2, 1, 2, 2, 2, 2);           //0 : [ ]               // composition des caractères
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

    for ($i = 32; $i <= 95; $i++) {                                            // jeux de caractères
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
    $Aguid = "";                                                                      // Création des guides de choix ABC
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
        $i = strpos($Cguid,$SminiC);                                                // forçage du jeu C, si possible
        if ($i!==false) {
            $Aguid [$i] = "N";
            $Bguid [$i] = "N";
        }

        if (substr($Cguid,0,$IminiC) == $SminiC) {                                  // jeu C
            $crypt .= chr(($crypt > "") ? $this->JSwap["C"] : $this->JStart["C"]);  // début Cstart, sinon Cswap
            $made = strpos($Cguid,"N");                                             // étendu du set C
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
            $madeA = strpos($Aguid,"N");                                            // étendu du set A
            if ($madeA === false) {
                $madeA = strlen($Aguid);
            }
            $madeB = strpos($Bguid,"N");                                            // étendu du set B
            if ($madeB === false) {
                $madeB = strlen($Bguid);
            }
            $made = (($madeA < $madeB) ? $madeB : $madeA );                         // étendu traitée
            $jeu = (($madeA < $madeB) ? "B" : "A" );                                // Jeu en cours

            $crypt .= chr(($crypt > "") ? $this->JSwap[$jeu] : $this->JStart[$jeu]); // début start, sinon swap

            $crypt .= strtr(substr($code, 0,$made), $this->SetFrom[$jeu], $this->SetTo[$jeu]); // conversion selon jeu

        }
        $code = substr($code,$made);                                           // raccourcir légende et guides de la zone traitée
        $Aguid = substr($Aguid,$made);
        $Bguid = substr($Bguid,$made);
        $Cguid = substr($Cguid,$made);
    }                                                                          // FIN BOUCLE PRINCIPALE

    $check = ord($crypt[0]);                                                   // calcul de la somme de contrôle
    for ($i=0; $i<strlen($crypt); $i++) {
        $check += (ord($crypt[$i]) * $i);
    }
    $check %= 103;

    $crypt .= chr($check) . chr(106) . chr(107);                               // Chaine Cryptée complète

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
$pdf = new PDF_Code128();
$pdf->AddPage();
$questiontitle = "$clientname" . ':' . "$brandname" .' Short Questionnare questions and answers - ' . "$date";

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$questiontitle,'','C');
$pdf->Ln();
$pdf->Ln();


////#	if (isset($_POST['attName']) && $_POST['attName'] !="") 
////#	{
////		$question = "What is your Attorney's name?";
////		$pdf->SetFont('Times','B',11);
////		$pdf->MultiCell(0,5,$question);
////		$pdf->SetFont('Times','',11);
////		$pdf->MultiCell(0,5,$_POST['attName']);
////		$pdf->Ln();
////#	}
////#	if (isset($_POST['firmPhone']) && $_POST['firmPhone'] !="") 
////#	{
////		$question = "What is your Attorney's phone number?";
////		$pdf->SetFont('Times','B',11);
////		$pdf->MultiCell(0,5,$question);
////		$pdf->SetFont('Times','',11);
////		$pdf->MultiCell(0,5,$_POST['firmPhone']);
////		$pdf->Ln();
////#	}
////#	if (isset($_POST['firmName']) && $_POST['firmName'] !="") 
////#	{
////		$question = "What is your Attorney's firm name?";
////		$pdf->SetFont('Times','B',11);
////		$pdf->MultiCell(0,5,$question);
////		$pdf->SetFont('Times','',11);
////		$pdf->MultiCell(0,5,$_POST['firmName']);
////		$pdf->Ln();
////#	}
////
////#	if (isset($_POST['firmCity']) && $_POST['firmCity'] !="") 
////#	{
////		$question = "What city is your Attorney in?";
////		$pdf->SetFont('Times','B',11);
////		$pdf->MultiCell(0,5,$question);
////		$pdf->SetFont('Times','',11);
////		$pdf->MultiCell(0,5,$_POST['firmCity']);
////		$pdf->Ln();
////#	}
#	if (isset($_POST['1WhoFirstName']) && $_POST['1WhoFirstName'] !="") 
#	{
		$question = "What is your first name?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['WhoFirstName']);
		$pdf->Ln();
#	}
#	if (isset($_POST['1WhoLastName']) && $_POST['1WhoLastName']!="")  
#	{
		$question = "What is your last name?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['WhoLastName']);
		$pdf->Ln();
#	}
#	if (isset($_POST['1CallbackNum']) && $_POST['1CallbackNum']!="")  
#	{
		$question = "What is the best phone number to reach you?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['CallbackNum']);
		$pdf->Ln();
#	}
#	if (isset($_POST['3SecondaryNumber']) && $_POST['3SecondaryNumber']!="")  
#	{
		$question = "Do you have a secondary phone number?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['SecondaryNumber']);
		$pdf->Ln();
#	}
#	if (isset($_POST['Fax']) && $_POST['Fax']!="")  
#	{
		$question = "What is your fax number?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['Fax']);
		$pdf->Ln();
#	}
#	if (isset($_POST['3Email']) && $_POST['3Email']!="")  
#	{
		$question = "What is your email address?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['Email']);
		$pdf->Ln();
#	}
#	if (isset($_POST['3StreetLine1']) && $_POST['3StreetLine1']!="")  
#	{
		$question = "What is your home street address?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['StreetLine1']);
		$pdf->Ln();
#	}
#	if (isset($_POST['3StreetLine2']) && $_POST['3StreetLine2']!="")  
#	{
		$question = "What is your home street address (line 2)?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['StreetLine2']);
		$pdf->Ln();
#	}
#	if (isset($_POST['3HomeCity']) && $_POST['3HomeCity']!="")  
#	{
		$question = "City?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['HomeCity']);
		$pdf->Ln();
#	}
#	if (isset($_POST['3HomeState']) && $_POST['3HomeState']!="")  
#	{
		$question = "State?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['HomeState']);
		$pdf->Ln();
#	}
#	if (isset($_POST['3Zipcode']) && $_POST['3Zipcode']!="")  
#	{
		$question = "Zip code?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['Zipcode']);
		$pdf->Ln();
#	}     

#	if (isset($_POST['didyouworkatmacysretail']) && $_POST['didyouworkatmacysretail']!="")  
#	{
		$question = "Did you ever work at a Macy's retail store?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['didyouworkatmacysretail']);
		$pdf->Ln();
#	}
#	if (isset($_POST['areyoucurrentmacysemployee']) && $_POST['areyoucurrentmacysemployee']!="")  
#	{
		$question = "Are you currently employed at Macy's?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['areyoucurrentmacysemployee']);
		$pdf->Ln();
#	}
#	if (isset($_POST['formerlastdaymonth']) && $_POST['formerlastdaymonth']!="")  
#	{
		$question = "If you no longer work at Macy's, when did you stop working at Macy's? (Best Estimate): Month";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['formerlastdaymonth']);
		$pdf->Ln();
#	}
#	if (isset($_POST['formerlastdayday']) && $_POST['formerlastdayday']!="")  
#	{
		$question = "If you no longer work at Macy's, when did you stop working at Macy's? (Best Estimate): Day";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['formerlastdayday']);
		$pdf->Ln();
#	}
#	if (isset($_POST['formerlastdayyear']) && $_POST['formerlastdayyear']!="")  
#	{
		$question = "If you no longer work at Macy's, when did you stop working at Macy's? (Best Estimate): Year";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['formerlastdayyear']);
		$pdf->Ln();
#	}
#	if (isset($_POST['shortcheck1']) && $_POST['shortcheck1']!="")  
#	{
		$question = "I missed some of my meal breaks while I worked for Macy's.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortcheck1']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		else
                {
                    $pdf->MultiCell(0,5,'No');
                }
		$pdf->Ln();
                #checked = Yes ## not checked = No
#	}
#	if (isset($_POST['shortcheck2']) && $_POST['shortcheck2']!="")  
#	{
		$question = "I missed some of my rest breaks while I worked for Macy's.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortcheck2']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		else
                {
                    $pdf->MultiCell(0,5,'No');
                }
		$pdf->Ln();
                #checked = Yes ## not checked = No
#	}
#	if (isset($_POST['shortcheck3']) && $_POST['shortcheck3']!="")  
#	{
		$question = "I was required to go through a security check or search after I had clocked out.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortcheck3']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		else
                {
                    $pdf->MultiCell(0,5,'No');
                }
		$pdf->Ln();
                #checked = Yes ## not checked = No
#	}
#	if (isset($_POST['shortcheck4']) && $_POST['shortcheck4']!="")  
#	{
		$question = "I wasn't paid for all my overtime work.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortcheck4']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		else
                {
                    $pdf->MultiCell(0,5,'No');
                }
		$pdf->Ln();
                #checked = No ## not checked = Yes
#	}
#	if (isset($_POST['shortcheck5']) && $_POST['shortcheck5']!="")  
#	{
		$question = "When I stopped working for Macy's, I was not given my final paycheck within 3 days.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortcheck5']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		else
                {
                    $pdf->MultiCell(0,5,'No');
                }
		$pdf->Ln();
                #checked = No ## not checked = Yes
#	}
#	if (isset($_POST['shortcheck6']) && $_POST['shortcheck6']!="")  
#	{
		$question = "I was fired from Macy's and was not given my final paycheck on my last day of work.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortcheck6']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		else
                {
                    $pdf->MultiCell(0,5,'No');
                }
		$pdf->Ln();
                #checked = No ## not checked = Yes
#	}
#	if (isset($_POST['shortcheck7']) && $_POST['shortcheck7']!="")  
#	{
		$question = "I wasn't paid for all the work I did.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortcheck7']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		else
                {
                    $pdf->MultiCell(0,5,'No');
                }
		$pdf->Ln();
                #checked = No ## not checked = Yes
#	}
#	if (isset($_POST['shortnoneoftheabove']) && $_POST['shortnoneoftheabove']!="")  
#	{
		$question = "None of the above apply to my work experience at Macy's.";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortnoneoftheabove']))
                {
                    $pdf->MultiCell(0,5,'Yes');
                }
		$pdf->Ln();
                #checked = Yes
#	}
#	if (isset($_POST['shortanythingelse']) && $_POST['shortanythingelse']!="")  
#	{
		$question = "I wasn't paid for all the work I did. Explain:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
                if (isset($_POST['shortanythingelse']))
                {
                    $pdf->MultiCell(0,5,$_POST['shortanythingelse']);
                }
		$pdf->Ln();
                #checked = Yes
#	}
#	if (isset($_POST['wantstoshare1']) && $_POST['wantstoshare1']!="")  
#	{
		$question = "Would you like to share your work experience at other companies?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['wantstoshare1']);
		$pdf->Ln();
#	}
#	if (isset($_POST['wantstoshare']) && $_POST['wantstoshare']!="")  
#	{
		$question = "Can one of our attorneys contact you about your work experience at other companies?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['wantstoshare']);
		$pdf->Ln();
#	}
#	if (isset($_POST['additionalInfo']) && $_POST['additionalInfo']!="")  
#	{
		$question = "Do you have any questions for me?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['additionalInfo']);
		$pdf->Ln();
#	}

#	if (isset($_POST['barcode']) && $_POST['barcode']!="")  
#	{
		$question = "Barcode number?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['barcode']);
		$pdf->Ln();
#	}
##complete

$code = $uniqueid;
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/mars/';
$filename = $uniqueid; 
#$filename2 = "Short Form - ".$uniqueid." - ".$date." - ".$time;
$filename2 = "Short form - ".$uniqueid." - ".$datefilename." - ".$timefilename; 
$ext = ".pdf";
//$pdf->Output("/inetpub/wwwroot/Elina/test.pdf","F");
$pdf->Output("/inetpub/wwwroot/Retainerstmp/".$filename2."".$ext,"F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/".$filename2."".$ext,"F"); //pushes file to server for temp storage

//FTP
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/'.$brandname.'/';
$dir1 = $dir0."".$filename;
$dir2 = $dir1.'/';
$dir3 = $dir1.'/';
$file = $filename."".$ext;
$file2 = $filename2."".$ext;
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
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
?>