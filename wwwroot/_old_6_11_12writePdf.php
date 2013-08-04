<?PHP
//define('FPDF_FONTPATH', 'font/');
//require('fpdf.php');
//$date = date('Y').'-'.date('m').'-'.date('d');
//$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');
//$grossincomeDisplay="";
//
//class PDF_Code128 extends FPDF {
//
//var $T128;                                             // tableau des codes 128
//var $ABCset="";                                        // jeu des caractères éligibles au C128
//var $Aset="";                                          // Set A du jeu des caractères éligibles
//var $Bset="";                                          // Set B du jeu des caractères éligibles
//var $Cset="";                                          // Set C du jeu des caractères éligibles
//var $SetFrom;                                          // Convertisseur source des jeux vers le tableau
//var $SetTo;                                            // Convertisseur destination des jeux vers le tableau
//var $JStart = array("A"=>103, "B"=>104, "C"=>105);     // Caractères de sélection de jeu au début du C128
//var $JSwap = array("A"=>101, "B"=>100, "C"=>99);       // Caractères de changement de jeu
//
////____________________________ Extension du constructeur _______________________
//function PDF_Code128($orientation='P', $unit='mm', $format='A4') {
//
//    parent::FPDF($orientation,$unit,$format);
//
//    $this->T128[] = array(2, 1, 2, 2, 2, 2);           //0 : [ ]               // composition des caractères
//    $this->T128[] = array(2, 2, 2, 1, 2, 2);           //1 : [!]
//    $this->T128[] = array(2, 2, 2, 2, 2, 1);           //2 : ["]
//    $this->T128[] = array(1, 2, 1, 2, 2, 3);           //3 : [#]
//    $this->T128[] = array(1, 2, 1, 3, 2, 2);           //4 : [$]
//    $this->T128[] = array(1, 3, 1, 2, 2, 2);           //5 : [%]
//    $this->T128[] = array(1, 2, 2, 2, 1, 3);           //6 : [&]
//    $this->T128[] = array(1, 2, 2, 3, 1, 2);           //7 : [']
//    $this->T128[] = array(1, 3, 2, 2, 1, 2);           //8 : [(]
//    $this->T128[] = array(2, 2, 1, 2, 1, 3);           //9 : [)]
//    $this->T128[] = array(2, 2, 1, 3, 1, 2);           //10 : [*]
//    $this->T128[] = array(2, 3, 1, 2, 1, 2);           //11 : [+]
//    $this->T128[] = array(1, 1, 2, 2, 3, 2);           //12 : [,]
//    $this->T128[] = array(1, 2, 2, 1, 3, 2);           //13 : [-]
//    $this->T128[] = array(1, 2, 2, 2, 3, 1);           //14 : [.]
//    $this->T128[] = array(1, 1, 3, 2, 2, 2);           //15 : [/]
//    $this->T128[] = array(1, 2, 3, 1, 2, 2);           //16 : [0]
//    $this->T128[] = array(1, 2, 3, 2, 2, 1);           //17 : [1]
//    $this->T128[] = array(2, 2, 3, 2, 1, 1);           //18 : [2]
//    $this->T128[] = array(2, 2, 1, 1, 3, 2);           //19 : [3]
//    $this->T128[] = array(2, 2, 1, 2, 3, 1);           //20 : [4]
//    $this->T128[] = array(2, 1, 3, 2, 1, 2);           //21 : [5]
//    $this->T128[] = array(2, 2, 3, 1, 1, 2);           //22 : [6]
//    $this->T128[] = array(3, 1, 2, 1, 3, 1);           //23 : [7]
//    $this->T128[] = array(3, 1, 1, 2, 2, 2);           //24 : [8]
//    $this->T128[] = array(3, 2, 1, 1, 2, 2);           //25 : [9]
//    $this->T128[] = array(3, 2, 1, 2, 2, 1);           //26 : [:]
//    $this->T128[] = array(3, 1, 2, 2, 1, 2);           //27 : [;]
//    $this->T128[] = array(3, 2, 2, 1, 1, 2);           //28 : [<]
//    $this->T128[] = array(3, 2, 2, 2, 1, 1);           //29 : [=]
//    $this->T128[] = array(2, 1, 2, 1, 2, 3);           //30 : [>]
//    $this->T128[] = array(2, 1, 2, 3, 2, 1);           //31 : [?]
//    $this->T128[] = array(2, 3, 2, 1, 2, 1);           //32 : [@]
//    $this->T128[] = array(1, 1, 1, 3, 2, 3);           //33 : [A]
//    $this->T128[] = array(1, 3, 1, 1, 2, 3);           //34 : [B]
//    $this->T128[] = array(1, 3, 1, 3, 2, 1);           //35 : [C]
//    $this->T128[] = array(1, 1, 2, 3, 1, 3);           //36 : [D]
//    $this->T128[] = array(1, 3, 2, 1, 1, 3);           //37 : [E]
//    $this->T128[] = array(1, 3, 2, 3, 1, 1);           //38 : [F]
//    $this->T128[] = array(2, 1, 1, 3, 1, 3);           //39 : [G]
//    $this->T128[] = array(2, 3, 1, 1, 1, 3);           //40 : [H]
//    $this->T128[] = array(2, 3, 1, 3, 1, 1);           //41 : [I]
//    $this->T128[] = array(1, 1, 2, 1, 3, 3);           //42 : [J]
//    $this->T128[] = array(1, 1, 2, 3, 3, 1);           //43 : [K]
//    $this->T128[] = array(1, 3, 2, 1, 3, 1);           //44 : [L]
//    $this->T128[] = array(1, 1, 3, 1, 2, 3);           //45 : [M]
//    $this->T128[] = array(1, 1, 3, 3, 2, 1);           //46 : [N]
//    $this->T128[] = array(1, 3, 3, 1, 2, 1);           //47 : [O]
//    $this->T128[] = array(3, 1, 3, 1, 2, 1);           //48 : [P]
//    $this->T128[] = array(2, 1, 1, 3, 3, 1);           //49 : [Q]
//    $this->T128[] = array(2, 3, 1, 1, 3, 1);           //50 : [R]
//    $this->T128[] = array(2, 1, 3, 1, 1, 3);           //51 : [S]
//    $this->T128[] = array(2, 1, 3, 3, 1, 1);           //52 : [T]
//    $this->T128[] = array(2, 1, 3, 1, 3, 1);           //53 : [U]
//    $this->T128[] = array(3, 1, 1, 1, 2, 3);           //54 : [V]
//    $this->T128[] = array(3, 1, 1, 3, 2, 1);           //55 : [W]
//    $this->T128[] = array(3, 3, 1, 1, 2, 1);           //56 : [X]
//    $this->T128[] = array(3, 1, 2, 1, 1, 3);           //57 : [Y]
//    $this->T128[] = array(3, 1, 2, 3, 1, 1);           //58 : [Z]
//    $this->T128[] = array(3, 3, 2, 1, 1, 1);           //59 : [[]
//    $this->T128[] = array(3, 1, 4, 1, 1, 1);           //60 : [\]
//    $this->T128[] = array(2, 2, 1, 4, 1, 1);           //61 : []]
//    $this->T128[] = array(4, 3, 1, 1, 1, 1);           //62 : [^]
//    $this->T128[] = array(1, 1, 1, 2, 2, 4);           //63 : [_]
//    $this->T128[] = array(1, 1, 1, 4, 2, 2);           //64 : [`]
//    $this->T128[] = array(1, 2, 1, 1, 2, 4);           //65 : [a]
//    $this->T128[] = array(1, 2, 1, 4, 2, 1);           //66 : [b]
//    $this->T128[] = array(1, 4, 1, 1, 2, 2);           //67 : [c]
//    $this->T128[] = array(1, 4, 1, 2, 2, 1);           //68 : [d]
//    $this->T128[] = array(1, 1, 2, 2, 1, 4);           //69 : [e]
//    $this->T128[] = array(1, 1, 2, 4, 1, 2);           //70 : [f]
//    $this->T128[] = array(1, 2, 2, 1, 1, 4);           //71 : [g]
//    $this->T128[] = array(1, 2, 2, 4, 1, 1);           //72 : [h]
//    $this->T128[] = array(1, 4, 2, 1, 1, 2);           //73 : [i]
//    $this->T128[] = array(1, 4, 2, 2, 1, 1);           //74 : [j]
//    $this->T128[] = array(2, 4, 1, 2, 1, 1);           //75 : [k]
//    $this->T128[] = array(2, 2, 1, 1, 1, 4);           //76 : [l]
//    $this->T128[] = array(4, 1, 3, 1, 1, 1);           //77 : [m]
//    $this->T128[] = array(2, 4, 1, 1, 1, 2);           //78 : [n]
//    $this->T128[] = array(1, 3, 4, 1, 1, 1);           //79 : [o]
//    $this->T128[] = array(1, 1, 1, 2, 4, 2);           //80 : [p]
//    $this->T128[] = array(1, 2, 1, 1, 4, 2);           //81 : [q]
//    $this->T128[] = array(1, 2, 1, 2, 4, 1);           //82 : [r]
//    $this->T128[] = array(1, 1, 4, 2, 1, 2);           //83 : [s]
//    $this->T128[] = array(1, 2, 4, 1, 1, 2);           //84 : [t]
//    $this->T128[] = array(1, 2, 4, 2, 1, 1);           //85 : [u]
//    $this->T128[] = array(4, 1, 1, 2, 1, 2);           //86 : [v]
//    $this->T128[] = array(4, 2, 1, 1, 1, 2);           //87 : [w]
//    $this->T128[] = array(4, 2, 1, 2, 1, 1);           //88 : [x]
//    $this->T128[] = array(2, 1, 2, 1, 4, 1);           //89 : [y]
//    $this->T128[] = array(2, 1, 4, 1, 2, 1);           //90 : [z]
//    $this->T128[] = array(4, 1, 2, 1, 2, 1);           //91 : [{]
//    $this->T128[] = array(1, 1, 1, 1, 4, 3);           //92 : [|]
//    $this->T128[] = array(1, 1, 1, 3, 4, 1);           //93 : [}]
//    $this->T128[] = array(1, 3, 1, 1, 4, 1);           //94 : [~]
//    $this->T128[] = array(1, 1, 4, 1, 1, 3);           //95 : [DEL]
//    $this->T128[] = array(1, 1, 4, 3, 1, 1);           //96 : [FNC3]
//    $this->T128[] = array(4, 1, 1, 1, 1, 3);           //97 : [FNC2]
//    $this->T128[] = array(4, 1, 1, 3, 1, 1);           //98 : [SHIFT]
//    $this->T128[] = array(1, 1, 3, 1, 4, 1);           //99 : [Cswap]
//    $this->T128[] = array(1, 1, 4, 1, 3, 1);           //100 : [Bswap]                
//    $this->T128[] = array(3, 1, 1, 1, 4, 1);           //101 : [Aswap]
//    $this->T128[] = array(4, 1, 1, 1, 3, 1);           //102 : [FNC1]
//    $this->T128[] = array(2, 1, 1, 4, 1, 2);           //103 : [Astart]
//    $this->T128[] = array(2, 1, 1, 2, 1, 4);           //104 : [Bstart]
//    $this->T128[] = array(2, 1, 1, 2, 3, 2);           //105 : [Cstart]
//    $this->T128[] = array(2, 3, 3, 1, 1, 1);           //106 : [STOP]
//    $this->T128[] = array(2, 1);                       //107 : [END BAR]
//
//    for ($i = 32; $i <= 95; $i++) {                                            // jeux de caractères
//        $this->ABCset .= chr($i);
//    }
//    $this->Aset = $this->ABCset;
//    $this->Bset = $this->ABCset;
//    for ($i = 0; $i <= 31; $i++) {
//        $this->ABCset .= chr($i);
//        $this->Aset .= chr($i);
//    }
//    for ($i = 96; $i <= 126; $i++) {
//        $this->ABCset .= chr($i);
//        $this->Bset .= chr($i);
//    }
//    $this->Cset="0123456789";
//
//    for ($i=0; $i<96; $i++) {                                                  // convertisseurs des jeux A & B  
//        @$this->SetFrom["A"] .= chr($i);
//        @$this->SetFrom["B"] .= chr($i + 32);
//        @$this->SetTo["A"] .= chr(($i < 32) ? $i+64 : $i-32);
//        @$this->SetTo["B"] .= chr($i);
//    }
//}
//
////________________ Fonction encodage et dessin du code 128 _____________________
//function Header()
//{
//	global $title;
//	$this->Ln(14);
//}
//function Footer()
//{
//	// Position at 1.5 cm from bottom
//	$this->SetY(-20);
//	// Arial italic 8
//	$this->SetFont('Arial','I',9);
//	// Text color in gray
//	$this->SetTextColor(128);
//	// Page number
//#	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
////	$this->Cell(0,10,'1800 Century Park East, 2nd Floor - Los Angeles, California 90067 ','','','C');
////	$this->Ln(3);
////	$this->Cell(0,10,'877-515-4712 Main - 310.861.9051 Fax - www.InitiativeLegal.com ','','','C');
////	$this->Ln(4);
////	$this->Cell(0,10,'CLIENT INITIALS _______','','','R');
////	$this->Ln(9);
//}
//
//
//function Code128($x, $y, $code, $w, $h) {
//    $Aguid = "";                                                                      // Création des guides de choix ABC
//    $Bguid = "";
//    $Cguid = "";
//    for ($i=0; $i < strlen($code); $i++) {
//        $needle = substr($code,$i,1);
//        $Aguid .= ((strpos($this->Aset,$needle)===false) ? "N" : "O"); 
//        $Bguid .= ((strpos($this->Bset,$needle)===false) ? "N" : "O"); 
//        $Cguid .= ((strpos($this->Cset,$needle)===false) ? "N" : "O");
//    }
//
//    $SminiC = "OOOO";
//    $IminiC = 4;
//
//    $crypt = "";
//    while ($code > "") {
//                                                                                    // BOUCLE PRINCIPALE DE CODAGE
//        $i = strpos($Cguid,$SminiC);                                                // forçage du jeu C, si possible
//        if ($i!==false) {
//            $Aguid [$i] = "N";
//            $Bguid [$i] = "N";
//        }
//
//        if (substr($Cguid,0,$IminiC) == $SminiC) {                                  // jeu C
//            $crypt .= chr(($crypt > "") ? $this->JSwap["C"] : $this->JStart["C"]);  // début Cstart, sinon Cswap
//            $made = strpos($Cguid,"N");                                             // étendu du set C
//            if ($made === false) {
//                $made = strlen($Cguid);
//            }
//            if (fmod($made,2)==1) {
//                $made--;                                                            // seulement un nombre pair
//            }
//            for ($i=0; $i < $made; $i += 2) {
//                $crypt .= chr(strval(substr($code,$i,2)));                          // conversion 2 par 2
//            }
//            $jeu = "C";
//        } else {
//            $madeA = strpos($Aguid,"N");                                            // étendu du set A
//            if ($madeA === false) {
//                $madeA = strlen($Aguid);
//            }
//            $madeB = strpos($Bguid,"N");                                            // étendu du set B
//            if ($madeB === false) {
//                $madeB = strlen($Bguid);
//            }
//            $made = (($madeA < $madeB) ? $madeB : $madeA );                         // étendu traitée
//            $jeu = (($madeA < $madeB) ? "B" : "A" );                                // Jeu en cours
//
//            $crypt .= chr(($crypt > "") ? $this->JSwap[$jeu] : $this->JStart[$jeu]); // début start, sinon swap
//
//            $crypt .= strtr(substr($code, 0,$made), $this->SetFrom[$jeu], $this->SetTo[$jeu]); // conversion selon jeu
//
//        }
//        $code = substr($code,$made);                                           // raccourcir légende et guides de la zone traitée
//        $Aguid = substr($Aguid,$made);
//        $Bguid = substr($Bguid,$made);
//        $Cguid = substr($Cguid,$made);
//    }                                                                          // FIN BOUCLE PRINCIPALE
//
//    $check = ord($crypt[0]);                                                   // calcul de la somme de contrôle
//    for ($i=0; $i<strlen($crypt); $i++) {
//        $check += (ord($crypt[$i]) * $i);
//    }
//    $check %= 103;
//
//    $crypt .= chr($check) . chr(106) . chr(107);                               // Chaine Cryptée complète
//
//    $i = (strlen($crypt) * 11) - 8;                                            // calcul de la largeur du module
//    $modul = $w/$i;
//
//    for ($i=0; $i<strlen($crypt); $i++) {                                      // BOUCLE D'IMPRESSION
//        $c = $this->T128[ord($crypt[$i])];
//        for ($j=0; $j<count($c); $j++) {
//            $this->Rect($x,$y,$c[$j]*$modul,$h,"F");
//            $x += ($c[$j++]+$c[$j])*$modul;
//        }
//    }
//}
//}
$pdf = new PDF_Code128();
$pdf->AddPage();
$questiontitle = "$clientname" . ':' . "$brandname" .' Long Questionnare questions and answers - ' . "$date";

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$questiontitle,'','C');
$pdf->Ln();
$pdf->Ln();
	if (isset($_POST['WhoFirstName']) && $_POST['WhoFirstName'] !="") 
	{
		$question = "Please type in your First Name:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['WhoFirstName']);
		$pdf->Ln();
	}
	if (isset($_POST['WhoLastName']) && $_POST['WhoLastName']!="")  
	{
		$question = "Please type in your Last Name:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['WhoLastName']);
		$pdf->Ln();
	}
	if (isset($_POST['CallbackNum']) && $_POST['CallbackNum'] !="")  
	{
		$question = "What is the best number to reach you:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['CallbackNum']);
		$pdf->Ln();
	}
	if (isset($_POST['SecondaryNum']) && $_POST['SecondaryNum'] !="") 
	{
		$question = "Do you have a secondary phone number:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['SecondaryNum']);
		$pdf->Ln();
	}
	if (isset($_POST['Email']) && $_POST['Email'] !="") 
	{
		$question = "What is your email address?:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$email);
		$pdf->Ln();
	}
	if (isset($_POST['StreetLine1']) && $_POST['StreetLine1']!= "")  
	{
		$question = "What is your home address? Street 1:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['StreetLine1']);
		$pdf->Ln();
	}
	if (isset($_POST['StreetLine2'])&& $_POST['StreetLine2'] !="")  
	{
		$question = "Street 2:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['StreetLine2']);
		$pdf->Ln();
	}
	if (isset($_POST['HomeCity']) && $_POST['HomeCity'] != "")  
	{
		$question = "City:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['HomeCity']);
		$pdf->Ln();
	}
	if (isset($_POST['HomeState']) && $_POST['HomeState'] != "")  
	{
		$question = "State:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['HomeState']);
		$pdf->Ln();
	}
	if (isset($_POST['Zipcode']) && $_POST['Zipcode'] !="") 
	{
		$question = "Zipcode:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['Zipcode']);
		$pdf->Ln();
	}
	/*session 2*/
	if (isset($_POST['recentPosition']) && $_POST['recentPosition'] !="")  
	{
		$question = "What was your most recent position during your employment at Macy's?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['recentPosition']);
		$pdf->Ln();
	}
	if (isset($_POST['recentPositionExplain']) && $_POST['recentPositionExplain'] !="")  
	{
		$question = "What was your most recent position during your employment at Macy's? Please explain";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['recentPositionExplain']);
		$pdf->Ln();
	}
	if (isset($_POST['1LocCity2'])|| isset($_POST['1LocCity']))  
	{
			if ($_POST['1LocCity']!="Other" && $_POST['1LocCity']!="" || ($_POST['1LocCity2'] !="" && $_POST['1LocCity']=="Other"))  {
			$question = "What city was the last Macy's you worked in?";
			$pdf->SetFont('Times','B',11);
			$pdf->MultiCell(0,5,$question);
			$pdf->SetFont('Times','',11);
			if ($_POST['1LocCity']=="Other"){
			$pdf->MultiCell(0,5,$_POST['1LocCity2']);
			}
			else{
			$pdf->MultiCell(0,5,$_POST['1LocCity']);	
				}
			$pdf->Ln();
		}
	}
	
	if (isset($_POST['EmployeeHourly']) && $_POST['EmployeeHourly'] !="")  
	{
		$question = "When you worked for Macy's, how were you paid?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['EmployeeHourly']);
		$pdf->Ln();
	}
	if (isset($_POST['PaidExplain']) && $_POST['PaidExplain'] !="")  
	{
		$question = "When you worked for Macy's, how were you paid? Please explain:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['PaidExplain']);
		$pdf->Ln();
	}
	if (isset($_POST['4CurrentlyEmployed']) && $_POST['4CurrentlyEmployed'] !="")  
	{
		$question = "Are you currently employed at Macy's?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['4CurrentlyEmployed']);
		$pdf->Ln();
	}
	if ((isset($_POST['startdaymonth'])  && $_POST['startdaymonth'] !="")|| (isset($_POST['startdayyear'])&& $_POST['startdayyear'] !=""))  
	{
		$question = "What are the dates of your most recent employment at Macy's?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,"Start date");	
		$pdf->MultiCell(0,5,$_POST['startdaymonth'].'/'.$_POST['startdayyear']);
		$pdf->Ln();		
		if ($_POST['4CurrentlyEmployed'] =="No" && (isset($_POST['formerlastdaymonth'])  && $_POST['formerlastdaymonth'] !="")|| (isset($_POST['formerlastdayyear'])&& $_POST['formerlastdayyear'] !="") ){
		$pdf->MultiCell(0,5,"End Date");
		$pdf->MultiCell(0,5,$_POST['formerlastdaymonth'].'/'.$_POST['formerlastdayyear']);
		$pdf->Ln();
		}
	}
	if (isset($_POST['identifypeople']) && $_POST['identifypeople'] !="")  
	{
		$question = "Please identify the names and contact information for any of your friends or co-workers who also worked at Macy's. ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['identifypeople']);
		$pdf->Ln();
	}

		/*session 3*/
	if (isset($_POST['4Category']) && $_POST['4Category'] !="")  
	{
		$question = "In your most recent position at Macy's, on average, how many hours was your typical shift?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['4Category']);
		$pdf->Ln();
	}
	if (isset($_POST['7Cat1MealBreakWaived']) && $_POST['7Cat1MealBreakWaived'] !="")  
	{
		$question = "Did you ever agree to waive your meal breaks in your most recent position at Macy's? In other words, did you ever agree to not take your meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7Cat1MealBreakWaived']);
		$pdf->Ln();
	}
	if (isset($_POST['7MealWhenWorkingBetween5and6hours']) && $_POST['7MealWhenWorkingBetween5and6hours'] !="")  
	{
		$question = "In your most recent position at Macy's, were you ever NOT able to take at least a 30-minute uninterrupted meal break when you worked shifts of more than 5 hours? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7MealWhenWorkingBetween5and6hours']);
		$pdf->Ln();
	}
	if (isset($_POST['7MealBreakMissedCat1Freq']) && $_POST['7MealBreakMissedCat1Freq'] !="")  
	{
		$question = "In your most recent position at Macy's, how often were you NOT able to take an uninterrupted 30-minute meal break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7MealBreakMissedCat1Freq']);
		$pdf->Ln();
	}
	if (isset($_POST['7MealBreakMissedCat1Why']) && $_POST['7MealBreakMissedCat1Why'] !="")  
	{
		$question = "In your most recent position at Macy's, in general, why did you NOT take meal breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7MealBreakMissedCat1Why']);
		$pdf->Ln();
	}
	if (isset($_POST['missMealBreakrExplain']) && $_POST['missMealBreakrExplain'] !="")  
	{
		$question = "In your most recent position at Macy's, in general, why did you NOT take meal breaks? Please explain:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['missMealBreakrExplain']);
		$pdf->Ln();
	}
	if (isset($_POST['7EverMoreThan10']) && $_POST['7EverMoreThan10'] !="")  
	{
		$question = "In your most recent position at Macy's, did you ever work shifts of more than 10 hours?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7EverMoreThan10']);
		$pdf->Ln();
	}
	if (isset($_POST['7Cat3DidGetSecondMealBreak']) && $_POST['7Cat3DidGetSecondMealBreak'] !="")  
	{
		$question = "In your most recent position at Macy's, were you ever NOT able to take 2 uninterrupted 30-minute meal breaks when you worked shifts of more than 10 hours? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7Cat3DidGetSecondMealBreak']);
		$pdf->Ln();
	}
	if (isset($_POST['7Cat3Missed2ndMealBreakOften']) && $_POST['7Cat3Missed2ndMealBreakOften'] !="")  
	{
		$question = "How often were you NOT able to take both of your 30-minute meal breaks when you worked more than 10 hours in a day? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7Cat3Missed2ndMealBreakOften']);
		$pdf->Ln();
	}
	if (isset($_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay']) && $_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay'] !="")  
	{
		$question = "Did you receive an additional hour of pay on those occasions you were NOT able to take an uninterrupted 30-minute meal break?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay']);
		$pdf->Ln();
	}
	if (isset($_POST['session3Explain']) && $_POST['session3Explain'] !="")  
	{
		$question = "If you would like, please explain any of your meal breaks answers:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['session3Explain']);
		$pdf->Ln();
	}	
	
	/*session 4*/
	if (isset($_POST['8RestEverMissed']) && $_POST['8RestEverMissed'] !="")  
	{
		$question = "In your most recent position at Macy's, were you ever NOT able to take at least a 10-minute uninterrupted rest break for every 4 hours worked in a day?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['8RestEverMissed']);
		$pdf->Ln();
	}
	if (isset($_POST['8HowOftenMissRest']) && $_POST['8HowOftenMissRest'] !="")  
	{
		$question = "In your most recent position at Macy's, how often were you NOT able to take at least a 10-minute uninterrupted rest break after working 4 hours?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['8HowOftenMissRest']);
		$pdf->Ln();
	}
	if (isset($_POST['8WhyMiss10MinRest']) && $_POST['8WhyMiss10MinRest'] !="")  
	{
		$question = "In your most recent position at Macy's, why would you miss your rest breaks?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['8WhyMiss10MinRest']);
		$pdf->Ln();
	}
	if (isset($_POST['missRestBreakExplain']) && $_POST['missRestBreakExplain'] !="")  
	{
		$question = "In your most recent position at Macy's, why would you miss your rest breaks? Please explain:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['missRestBreakExplain']);
		$pdf->Ln();
	}
	if (isset($_POST['8ExtraHourPay']) && $_POST['8ExtraHourPay'] !="")  
	{
		$question = "If you were ever NOT able to take a 10-minute uninterrupted rest break, were you paid an additional hour of pay on each occasion that this occurred?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['8ExtraHourPay']);
		$pdf->Ln();
	}
	if (isset($_POST['session4Explain']) && $_POST['session4Explain'] !="")  
	{
		$question = "If you would like, please explain any of your rest breaks answers:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['session4Explain']);
		$pdf->Ln();
	}
	
	/*session 5*/
	if (isset($_POST['9BagsChecksYesNo']) && $_POST['9BagsChecksYesNo'] !="")  
	{
		$question = "In your most recent position at Macy's, when you were leaving the store for a meal break or at the end of your shift, were you required to have your personal bag checked before you could leave? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['9BagsChecksYesNo']);
		$pdf->Ln();
	}
	if (isset($_POST['9BagsCheckedEverytimeLeaving']) && $_POST['9BagsCheckedEverytimeLeaving'] !="")  
	{
		$question = "How often was your bag checked?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['9BagsCheckedEverytimeLeaving']);
		$pdf->Ln();
	}
	if (isset($_POST['9BagsCheckedWait']) && $_POST['9BagsCheckedWait'] !="")  
	{
		$question = "Did you have to wait for your co-workers to have their belongings checked before you could leave?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['9BagsCheckedWait']);
		$pdf->Ln();
	}
	if ((isset($_POST['bagCheckWaitHour']) && $_POST['bagCheckWaitHour'] !="00") ||(isset($_POST['bagCheckWaitMinute']) && $_POST['bagCheckWaitMinute'] !="00"))  
	{
		$question = "In general, approximately how long would you have to wait to complete the entire bag check process before you could leave the store?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['bagCheckWaitHour']." Hour ".$_POST['bagCheckWaitMinute']." Minute");
		$pdf->Ln();
	}
	if (isset($_POST['10EverWorkClosingShift']) && $_POST['10EverWorkClosingShift'] !="")  
	{
		$question = "In your most recent position at Macy's, did you ever work the closing shift?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['10EverWorkClosingShift']);
		$pdf->Ln();
	}
	if (isset($_POST['9BagsCheckedEverytimeWaitToLeaving']) && $_POST['9BagsCheckedEverytimeWaitToLeaving'] !="")  
	{
		$question = "If you worked the closing shift, did you ever have to wait to leave the store after you clocked out?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['9BagsCheckedEverytimeWaitToLeaving']);
		$pdf->Ln();
	}
	if ((isset($_POST['generalWaitHour']) && $_POST['generalWaitHour'] !="00")||(isset($_POST['generalWaitMinute']) && $_POST['generalWaitMinute'] !="00"))  
	{
		$question = "In general, approximately how long would you have to wait?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['generalWaitHour'] ." Hour ".$_POST['generalWaitMinute']." Minute");
		$pdf->Ln();
	}
	if (isset($_POST['workOutClock']) && $_POST['workOutClock'] !="")  
	{
		$question = "In your most recent position at Macy's, did you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['workOutClock']);
		$pdf->Ln();
	}
	if (isset($_POST['afterBeforeClockExplain']) && $_POST['afterBeforeClockExplain'] !="")  
	{
		$question = "If you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid, Please explain";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['afterBeforeClockExplain']);
		$pdf->Ln();
	}
	if ((isset($_POST['offClockHour']) && $_POST['offClockHour'] !="00") || (isset($_POST['offClockMinute']) && $_POST['offClockMinute'] !="00"))  
	{
		$question = "On average, how much time a week would you perform work-related tasks while you were off the clock?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['offClockHour']." Hour ".$_POST['offClockMinute']." Minute");
		$pdf->Ln();
	}
	if (isset($_POST['session5Explain']) && $_POST['session5Explain'] !="")  
	{
		$question = "If you would like, please explain any of your compensated for off the clock work and overtime answers:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['session5Explain']);
		$pdf->Ln();
	}
	
	/*session6*/
	if (isset($_POST['12TermType']) && $_POST['12TermType'] !="")  
	{
		$question = "In your most recent position at Macy's, were you terminated (laid-off or fired) or did you quit your employment?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['12TermType']);
		$pdf->Ln();
	}
	if (isset($_POST['12SeventyTwoHoursOrLess']) && $_POST['12SeventyTwoHoursOrLess'] !="")  
	{
		$question = "If you quit, did you provide at least 72 hours notice before quitting?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['12SeventyTwoHoursOrLess']);
		$pdf->Ln();
	}
	if (isset($_POST['12DidYouGetFinalCheckOnLastDay']) && $_POST['12DidYouGetFinalCheckOnLastDay'] !="")  
	{
		$question = "If you were terminated or you quit after giving at least 72 hours notice, did you receive all your final paycheck on your last day of work?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['12DidYouGetFinalCheckOnLastDay']);
		$pdf->Ln();
	}
	if (isset($_POST['12withoutSeventyTwoHoursOrLess']) && $_POST['12withoutSeventyTwoHoursOrLess'] !="")  
	{
		$question = "If you quit without providing at least 72 hours notice, did you receive your final paycheck within 72 hours of quitting?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['12withoutSeventyTwoHoursOrLess']);
		$pdf->Ln();
	}
	if (isset($_POST['12HowLongAfterTermRecieveCheckGreaterThan72']) && $_POST['12HowLongAfterTermRecieveCheckGreaterThan72'] !="")  
	{
		$question = "How long after you stopped working for Macy's did you receive your final paycheck?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['12HowLongAfterTermRecieveCheckGreaterThan72']);
		$pdf->Ln();
	}
	if (isset($_POST['finalcheckincludeallcommissions']) && $_POST['finalcheckincludeallcommissions'] !="")  
	{
		$question = "In your most recent position at Macy's, did your final paycheck include all commissions owed to you?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['finalcheckincludeallcommissions']);
		$pdf->Ln();
	}
	if (isset($_POST['howlongdidittakeformacystopayallcommissions']) && $_POST['howlongdidittakeformacystopayallcommissions'] !="")  
	{
		$question = "How long did it take for Macy's to pay you all commissions owed to you? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['howlongdidittakeformacystopayallcommissions']);
		$pdf->Ln();
	}
	if (isset($_POST['session6Explain']) && $_POST['session6Explain'] !="")  
	{
		$question = "If you would like, please explain any of your final wages answers:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['session6Explain']);
		$pdf->Ln();
	}
	
	/*session7*/
	if (isset($_POST['14DidYourJobRequireStanding']) && $_POST['14DidYourJobRequireStanding'] !="")  
	{
		$question = "In your most recent position working at Macy's, did the nature of your job require you to stand?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['14DidYourJobRequireStanding']);
		$pdf->Ln();
	}
	if (isset($_POST['14PermittedToSit']) && $_POST['14PermittedToSit'] !="")  
	{
		$question = "When you weren't engaged in your work duties, did Macy's ever let you sit in a seat during your work shift?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['14PermittedToSit']);
		$pdf->Ln();
	}
	if ((isset($_POST['timeBeforeSitHour']) && $_POST['timeBeforeSitHour'] !="00") || (isset($_POST['timeBeforeSitMinute']) && $_POST['timeBeforeSitMinute'] !="00"))  
	{
		$question = "On average, how long were you required to work during a normal shift until you were permitted to sit down?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['timeBeforeSitHour']." Hour ".$_POST['timeBeforeSitMinute']." Minute");
		$pdf->Ln();
	}
	if (isset($_POST['14Consequences']) && $_POST['14Consequences'] !="")  
	{
		$question = "Were there any disciplinary consequences if you were to have a seat during your work shift?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['14Consequences']);
		$pdf->Ln();
	}
	if (isset($_POST['jobListSeated']) && $_POST['jobListSeated'] !="")  
	{
		$question = "Were there any disciplinary consequences if you were to have a seat during your work shift? Please explain:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['jobListSeated']);
		$pdf->Ln();
	}
	if (isset($_POST['14SittingWouldInterfere']) && $_POST['14SittingWouldInterfere'] !="")  
	{
		$question = "Do you think you could have performed your job duties while you were seated?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['14SittingWouldInterfere']);
		$pdf->Ln();
	}
	if (isset($_POST['jobSeatedExplain']) && $_POST['jobSeatedExplain'] !="")  
	{
		$question = "Do you think you could have performed your job duties while you were seated? Please explain:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['jobSeatedExplain']);
		$pdf->Ln();
	}
	if (isset($_POST['session7Explain']) && $_POST['session7Explain'] !="")  
	{
		$question = "If you would like, please explain any of your answers of providing with a seat during your work shift:";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['session7Explain']);
		$pdf->Ln();
	}
	
/*session9*/
	if (isset($_POST['HouseHoldCount']) && $_POST['HouseHoldCount'] !="")  
	{
		$question = "How many people live in your household, including yourself? ";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$_POST['HouseHoldCount']);
		$pdf->Ln();
	}
	if (isset($_POST['GrossIncome']) && $_POST['GrossIncome'] !="") 	
	{
		if ($_POST['GrossIncome'] == 'Less than 2793') {$grossincomeDisplay = 'Less than 2793';}
		if ($_POST['GrossIncome'] == '2793to3783') {$grossincomeDisplay  = 'Between $2,793 and $3,782';}
		if ($_POST['GrossIncome'] == '3783to4773') {$grossincomeDisplay  = 'Between $3,783 and $4,772';}
		if ($_POST['GrossIncome'] == '4773to5763') {$grossincomeDisplay  = 'Between $4,773 and $5,762';}
		if ($_POST['GrossIncome'] == '5763to6753') {$grossincomeDisplay  = 'Between $5,763 and $6,752';}
		if ($_POST['GrossIncome'] == '6753to7743') {$grossincomeDisplay  = 'Between $6,753 and $7,742';}
		if ($_POST['GrossIncome'] == '7743to8733') {$grossincomeDisplay  = 'Between $7,743 and $8,732';}
		if ($_POST['GrossIncome'] == '8733to9723') {$grossincomeDisplay  = 'Between $8,733 and $9,723';}
		if ($_POST['GrossIncome'] == 'Decline') {$grossincomeDisplay  = 'Decline to answer';}

		$question = "What is your current gross monthly income?";
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(0,5,$question);
		$pdf->SetFont('Times','',11);
		$pdf->MultiCell(0,5,$grossincomeDisplay);
		$pdf->Ln();
	}
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/mars/';
$filename = $LastName.", ".$FirstName." - ".$uniqueid; 
$filename2 = $LastName.", ".$FirstName." - LongQnA - ".$uniqueid; 
$ext = ".pdf";

$pdf->Output("/inetpub/wwwroot/Retainerstmp/$filename2$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/$filename2$ext","F"); //pushes file to server for temp storage

//FTP
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$dir1 = "$dir0" . "$filename";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$dir3.''))
{
    
}
else
{
    ftp_mkdir($conn_id, $dir3);
}

ftp_chdir($conn_id, $dir3);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); 
//ftp end
?>