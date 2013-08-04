<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
<style>
#button {
display: block;
width: 175px;
height: 45px;
margin: 0px auto;
}
#button input:hover{
background-image:url('images/bigbutton.png');
background-position:left top;
background-repeat:no-repeat;
}
.myButton {
    background:url(/images/bigbutton.png) no-repeat;
    cursor:pointer;
    width: 200px;
    height: 100px;
    border: none;
}
</style>
</head>
<body>

<?PHP
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

if (isset($_POST['GIVE1000'])) $give1000 = $_POST['GIVE1000'];
if (empty($brandname)) $brandname = 'Macys';

#$thismany = '1';
#$give1000 = '1';
$thismany = '400';
if (isset($_REQUEST['howmany'])) $thismany = $_REQUEST['howmany'];

echo '<div id="message">';

    echo '<form action="400retainers.php" method="post">';    

echo '<h4>Push button to generate '.$thismany.' retainer';
if ($thismany < 2)
{
    echo 'packet<br /><br />';
}
else
{
    echo 'packets<br /><br />';
}


echo "<div align=center>";
echo "<input type='hidden' name='GIVE1000' value=Yes />";
echo '<input type="Submit" class="myButton" style="height: 431px; width: 610px;" value=""/>';
echo "</div>";
echo "</form>";
echo '</div>';
echo '</body>';
echo '</html>';
?>

<?PHP 
 
  		

define('FPDF_FONTPATH', 'font/');
require('fpdfbulk.php');
$date = date('Y').'-'.date('m').'-'.date('d');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');

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
	$this->Ln(1);
	#$this->Ln(5);
}
function Footer($code)
{
	// Position at 1.5 cm from bottom
	$this->SetY(-25);
	// Arial italic 8
	$this->SetFont('Arial','',9);
	// Text color in gray
	$this->SetTextColor(128);
	// Page number
#	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
        if ($this->PageNo() > 1)
        {
        $this->Cell(0,10,'1800 Century Park East, 2nd Floor  -  Los Angeles, California 90067 ','','','C');
	$this->Ln(3);
	$this->Cell(0,10,'888.792.2293 Main  -  310.734.1665 Fax  -  www.MacysLawsuit.com ','','','C');
	$this->Ln(10);
        $this->SetFont('Arial','',7);
        }
        if ($this->PageNo() < 3)
        {
            
        }
        else
        {
            $this->Cell(0,10,$code,'','','C');
        }
        
        
	#$this->Cell(0,10,'CLIENT INITIALS _______','','','R');
	$this->Ln(9);
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
}                                                                              // FIN DE CLASSE


$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

if (isset($give1000))
{
//	    $query = "SELECT TOP $thismany
//            FirstName,LastName,uniqueid,retainerprinted,Street1,Street2,City,State,Zipcode
//            FROM MacysClassListCleaned
//            where retainerprinted!='Yes'
//            or retainerprinted is null  ORDER BY NEWID();;";

$query = "
select TOP 400 FirstName,LastName,uniqueid,Street1,Street2,City,State,Zipcode,retainerSent
 from Status where (retainerRecieved!='Docusigned' and retainerRecieved!='Yes' or retainerRecieved is null)
  and (donotcontact!='Yes' or donotcontact='' or donotcontact is null) and (notqualified!='Yes' or notqualified='' or notqualified is null)
   and (Packet09212012 is null) and (Packet09242012 is null) and (Packet400 is null) and 
   (addressisundeliverable is null or addressisundeliverable!='Yes') ORDER BY NEWID()";
            $results = sqlsrv_query($conn,$query);
            while($row = sqlsrv_fetch_array($results))
            {
                $clientname = $row['FirstName'].' '.$row['LastName']; 
		#$THISuniqueid = $row['uniqueid'];
		#$query7 = "update status set [Packet09202012]='Yes' where uniqueid='$THISuniqueid';";
		#$results7 = sqlsrv_query($conn,$query7);

$pdf = new PDF_Code128();
$subject1 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverSubject1.txt';
$subject2 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverSubject2.txt';
$body1 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody1.txt';
$get1 = file_get_contents($subject1);
$get2 = file_get_contents($subject2);
$body1 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody1.txt';
$get3 = file_get_contents($body1);
$body2 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody2.txt';
$get4 = file_get_contents($body2);
$body3 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody3.txt';
$get5 = file_get_contents($body3);
$body4 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody4.txt';
$get6 = file_get_contents($body4);

$body5 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody5.txt';
$get7 = file_get_contents($body5);
$body6 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody6.txt';
$get8 = file_get_contents($body6);
$body7 = './thousandretainers/retainers/'. "$brandname" . 'BulkRetainerCoverBody7.txt';
$get9 = file_get_contents($body7);
$hellocompany = 'INITIATIVE LEGAL GROUP APC';
$agentname = 'Pamela Ng';
$agentemail = 'MacysLawsuit@initiativelegal.com';

$caseattorneyname = '                                                                                                                                          '.$agentname;
$caseattorneyphonenumber = '                                                                                                                                          888.792.2293 ';
$caseattorneyemail = '                                                                                                                                          '.$agentemail;
$website = '                                                                                                                                          www.Macyslawsuit.com';
$hellotitle = 'Attorney Advertisement';
$hello = "$clientname" . ' ("Client") ';
$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
$printyourfullname = 'VIA U.S. MAIL';
$yourbestphonenumber = $row['FirstName'].' '.$row['LastName'];
$addressline1 = $row['Street1'].' '.$row['Street2'];
$addressline2 = $row['City'].', '.$row['State'].' '.$row['Zipcode'];
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
                $pdf->AddPage('','',$row['uniqueid']);
                #$pdf->Ln(-5);
$pdf->Ln(93);
	$pdf->SetFont('Times','',16);
	$pdf->MultiCell(0,5,'Initiative Legal Group APC','','L');
	$pdf->Ln(-1);
	$pdf->SetFont('Times','B',14);
	$pdf->MultiCell(0,5,'c/o Macy\'s Lawsuit','','L');
	$pdf->SetFont('Times','',12);
	$pdf->Ln(-1);
	$pdf->MultiCell(0,5,'9663 Santa Monica Blvd., #149','','L');
	$pdf->Ln(-1);
	$pdf->MultiCell(0,5,'Beverly Hills, CA 90210','','L');
	$pdf->Ln(-1);	
	$pdf->MultiCell(0,5,'Attorney Newsletter','','L');
	$pdf->Ln();	
	#$pdf->MultiCell(0,5,'Monica Balderrama, Esq','','L');
	#$pdf->Ln(3);            
	$pdf->Ln(20);
	$pdf->SetFont('Times','',14);
	$pdf->MultiCell(0,4,$yourbestphonenumber,'','L');
#        $pdf->MultiCell(0,5,$tenspace.''.$fiftyspace.''.$yourbestphonenumber,'','L');
	$pdf->Ln(1);
	$pdf->SetFont('Times','',14);
	$pdf->MultiCell(0,4,$addressline1,'','L');
	$pdf->Ln(1);
	$pdf->SetFont('Times','',14);
	$pdf->MultiCell(0,4,$addressline2,'','L');
	#$pdf->Ln();
	$code = $row['uniqueid'];
	$pdf->Code128(10,165,$code,55,3);
                
                $pdf->AddPage('','','');
		$pdf->Image('logo.png',60,13,'','12');
		#$pdf->Image('logo.png',);
		#$pdf->Image('logo.png',62,13,8,0,'','');
		$pdf->Ln();
		#$pdf->SetFont('helvetica','B',12);
		#$pdf->MultiCell(0,5,$hellocompany,'','C');
		$pdf->Ln(15);
$pdf->SetFont('Times','',10);
#$pdf->MultiCell(0,5,$caseattorneyname,'','L');
#$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','L');
$pdf->Ln(-1);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyemail,'','L');
$pdf->Ln(-1);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$website,'','L');
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$hellotitle,'','C');
#$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$hello2);
$pdf->Ln();
//$pdf->SetFont('Times','U',12);
//$pdf->MultiCell(0,5,$printyourfullname);
//$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$yourbestphonenumber);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline1);
$pdf->Ln(0);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$addressline2);
$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->Cell(0,5,'Subject:');
//$pdf->Ln(0);
//$pdf->SetFont('Times','I',12);
//$pdf->Cell(0,5,$get1);
//$pdf->Ln(5);
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$get2);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Dear '.$clientname.': ');
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$get3);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get4);
$pdf->Ln();
$pdf->SetFont('Times','',12);
##
##To find out more information visit www.Macyslawsuit.com or call us at 888.792.2293.
##
#$pdf->MultiCell(0,5,$get5);
$pdf->Cell(0,5,'To find out more information visit');
$pdf->Ln(0);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,'                                                         www.Macyslawsuit.com');
$pdf->SetFont('Times','',12);
$pdf->Ln(0);
$pdf->Cell(0,5,'                                                                                                    or call us at');
$pdf->Ln(0);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,'                                                                                                                        888.792.2293.');
$pdf->Ln();
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get6);
$pdf->Ln();
$pdf->SetFont('Times','B',12);

$pdf->MultiCell(0,5,$get7);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,$get8);
$pdf->Ln();
$pdf->SetFont('Times','',12);
##
##If you have any questions or would like to speak with one of our attorneys, please call us at 888.792.2293 or visit www.Macyslawsuit.com.
##
$pdf->Cell(0,5,'If you have any questions or would like to speak with one of our attorneys, please call us at');
$pdf->Ln(0);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,'                                                                                                                                                   888.792.2293');
$pdf->SetFont('Times','',12);
$pdf->Ln(4);
$pdf->Cell(0,5,'or visit');
$pdf->SetFont('Times','B',12);
$pdf->Ln(0);
$pdf->Cell(0,5,'             www.Macyslawsuit.com.');
#$pdf->MultiCell(0,5,$get9);
$pdf->Ln();
$pdf->Ln(0);
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'Sincerely,');
$pdf->Ln();
$pdf->Ln();
#$pdf->Image($sigFile,$sigXrej,$sigYrej,'',$sigScale);
$pdf->Image('png.png',12,226,'','26');
$pdf->Ln();
#$pdf->Ln();
$pdf->MultiCell(0,5,$agentname,'','L');
$pdf->Ln();
$pdf->SetFont('Times','IB',12);
$pdf->MultiCell(0,5,'Disclaimer:  Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.');
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',12);

$code= $row['uniqueid'];
#$pdf->Code128(130,260,$code,70,10);
#$pdf->SetXY(130,270);
#$pdf->Write(5,''.$code.'');
$retainerhead1 = './retainers/'. "$brandname" . 'RetainerHead1.txt';
		$retainerhead2 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead2.txt';
		$retainerhead3 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead3.txt';
		$retainerhead4 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead4.txt';
		$retainerhead5 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead5.txt';
		$retainerhead6 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead6.txt';
		$retainerhead7 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead7.txt';
		$retainerhead8 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead8.txt';
		$retainerhead9 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead9.txt';
		$retainerhead10 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead10.txt';
		$retainerhead11 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead11.txt';
		$retainerhead12 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead12.txt';
		$retainerhead13 = './thousandretainers/retainers/'. "$brandname" . 'RetainerHead13.txt';		
		$retainer1 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart1.txt';
		$retainer2 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart2.txt';
		$retainer3 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart3.txt';
		$retainer4 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart4.txt';
		$retainer5 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart5.txt';
		$retainer6 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart6.txt';
		$retainer7 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart7.txt';
		$retainer8 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart8.txt';
		$retainer9 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart9.txt';
		$retainer10 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart10.txt';
		
		$retainer11 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart11.txt';
		$retainer12 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart12.txt';
		$retainer13 = './thousandretainers/retainers/'. "$brandname" . 'RetainerPart13.txt';
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
		$get11 = file_get_contents($retainer11);
		$get12 = file_get_contents($retainer12);
		$get13 = file_get_contents($retainer13);
		
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
		
		$gethead11 = file_get_contents($retainerhead11);
		$gethead12 = file_get_contents($retainerhead12);
		$gethead13 = file_get_contents($retainerhead13);
		$hellocompany = 'INITIATIVE LEGAL GROUP APC';
		$hellotitle = 'ATTORNEY-CLIENT AGREEMENT';
		$hello = $clientname . ' ("Client") ';
		#$hellophone = "$cliphone" . ' phone number';
		$hello2 = '     Initiative Legal Group APC ("Attorneys") and  '.$clientname.' ("Client") agree that Attorneys will provide legal services to Client on the terms set forth below:';
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
                
                $pdf->AddPage('','',$row['uniqueid']);

		$pdf->Image('logo.png',60,13,'','12');
		#$pdf->Image('logo.png',);
		#$pdf->Image('logo.png',62,13,8,0,'','');
		#$pdf->Ln();
		#$pdf->SetFont('helvetica','B',12);
		#$pdf->MultiCell(0,5,$hellocompany,'','C');
		$pdf->Ln(12);
		$pdf->SetFont('Times','B',10);
		$pdf->MultiCell(0,4.5,$hellotitle,'','C');
		$pdf->Ln();
		#$pdf->Ln();
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,$hello2);
		//start of form fields
		$pdf->Ln();
		#$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'1.               '.$gethead1);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                               '.$get1,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->MultiCell(0,4.5,'2.               '.$gethead2);
		$pdf->Ln(-4);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                                                                         '.$get2,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'(A)               '.$gethead3);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                        '.$get3);
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'(B)               '.$gethead4);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                                                 '.$get4,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'(C)               '.$gethead5);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                 '.$get5,'','J');
		$pdf->SetFont('Arial','B',10);
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'3.               '.$gethead6);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                      '.$get6,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'4.               '.$gethead7);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                '.$get7,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'5.               '.$gethead8);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                     '.$get8,'','J');
		$code= $row['uniqueid'];
		$pdf->SetXY(70,264);
		$pdf->SetFont('Arial','B',11);
                $pdf->Cell(0,10,'CLIENT INITIALS _______','','','R');
                $pdf->SetFont('Arial','',6);
                #$pdf->Write(5,''.$code.'');                
		$pdf->Code128(70,286,$code,70,2);
		$pdf->AddPage('','',$row['uniqueid']);
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'6.               '.$gethead9);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                             '.$get9,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'7.               '.$gethead10);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                             '.$get10,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'8.               '.$gethead11);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                          '.$get11,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'9.               '.$gethead12);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                                                         '.$get12,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'10.               '.$gethead13);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                           '.$get13,'','J');		
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,$agreed,'','','J');
		$pdf->Ln(15);
		$pdf->SetFont('Times','',10);
		$pdf->Cell(0,4.5,$signline);
		$pdf->Ln(7);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,$signtxt);
		$pdf->Ln(9);
		$pdf->SetFont('Times','U',12);
		$pdf->Cell(0,4.5,$printline);
		$pdf->Ln(4);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,$printtxt);
		$pdf->SetFont('Arial','',10);
		$code= $row['uniqueid'];
		#$pdf->Code128(10,260,$code,70,10);
		$pdf->SetXY(130,270);
		#$pdf->Write(5,''.$code.'');
		$pdf->SetFont('Arial','B',11);
		$code= $row['uniqueid'];
		#$pdf->Code128(130,260,$code,70,10);
                $pdf->Code128(70,286,$code,70,2);
		#$pdf->SetXY(130,270);
		#$pdf->Write(5,''.$code.'');
		$pdf->SetXY(70,264);
                $pdf->Cell(0,10,'CLIENT INITIALS _______','','','R');
		
		$pdf->AddPage('','',$row['uniqueid']);
		$pdf->Image('logo.png',60,13,'','12');
		#$pdf->Image('logo.png',);
		#$pdf->Image('logo.png',62,13,8,0,'','');
		$pdf->Ln();
		#$pdf->SetFont('helvetica','B',12);
		#$pdf->MultiCell(0,5,$hellocompany,'','C');
		$pdf->Ln(5);
$pdf->SetFont('Times','',10);
#$pdf->MultiCell(0,5,$caseattorneyname,'','L');
#$pdf->Ln(0);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','L');
$pdf->Ln(-1);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$caseattorneyemail,'','L');
$pdf->Ln(-1);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$website,'','L');
$pdf->SetFont('Times','',12);
$pdf->Ln(15);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(0,5,'Updated Contact Information Form','','','C');
		$pdf->Ln(5);
		$pdf->SetFont('Times','B',12);
		$pdf->Ln(15);
		$pdf->Cell(0,5,'First Name: ___________________________________________________________________________','','','L');
		$pdf->Ln(15);
		$pdf->Cell(0,5,'Last Name: ___________________________________________________________________________','','','L');
		$pdf->Ln(15);
		$pdf->Cell(0,5,'Phone Number: _______________________________________________________________________','','','L');
		$pdf->Ln(15);
		$pdf->Cell(0,5,'Street Address: ________________________________________________________   Apt # _________','','','L');
		$pdf->Ln(15);
		$pdf->Cell(0,5,'City: _____________________________________   State: ____________   Zip Code: ___________','','','L');
		$pdf->Ln(15);
		$pdf->Cell(0,5,'Email: _______________________________________________________________________________','','','L');		
		$pdf->Ln(15);
		$pdf->Cell(0,5,'If you would like to share your experience working at a company other than Macy\'s please explain below.','','','L');		
		$pdf->SetFont('Arial','',10);
		$code= $row['uniqueid'];
		#$pdf->Code128(10,260,$code,70,10);
		$pdf->SetXY(130,270);
		#$pdf->Write(5,''.$code.'');
		$pdf->SetFont('Arial','B',11);
		$code= $row['uniqueid'];
		#$pdf->Code128(130,260,$code,70,10);
                $pdf->Code128(70,286,$code,70,2);		
		
		
		
		$dir='/inetpub/wwwroot/';
		$filename = $row['LastName'].", ".$row['FirstName']."  - Attorney Client Agreement - ".$row['uniqueid']; 
		$ext = ".pdf";
if(!is_dir("\\\\SQLSRV\\c$\\inetpub\\wwwroot\\thousandretainers\\$date\\"))
{
    mkdir("/inetpub/wwwroot/thousandretainers/$date/");		
}
$pdf->Output("/inetpub/wwwroot/thousandretainers/$date/$filename$ext","F",$row['uniqueid']);
$pdf->Output("/inetpub/wwwroot/$filename$ext","F",$row['uniqueid']); //pushes file to server for temp storage
//##     start            ##//
##      <-(ian)->           ##  
##   commented out the ftp  ##
##                          ##
//##                      ##//


$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = "/".$brandname."/";
$filename3 = $row['LastName'].", ".$row['FirstName']." - ".$row['uniqueid']; 
$dir1 = $dir0."".$filename3;
$dir2 = $dir1."/";
$dirpak = "/400retainers/".$date."/";
$dir3 = $dir1."/";
$file = $filename."".$ext;
#$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

//if (is_dir('ftp://sqlsrv:password@10.129.3.21/'.$dir2.''))
//{
//    
//}
//else
//{
    ftp_mkdir($conn_id, $dirpak);
//}
ftp_chdir($conn_id, $dirpak);
ftp_put($conn_id, $file, $file, FTP_BINARY);
unlink($file); //delete temp copy pdf stored on server
ftp_close($conn_id);
//##     done             ##//
##      <-(ian)->           ##  
##   commented out the ftp  ##
##                          ##
//##                      ##//

$uid = $row['uniqueid'];

#$query2 = "update MacysClassListCleaned set retainerprinted='Yes'
$query2 = "update status set retainertomailroom='Yes',retainertomailroomdate='$date',Packet400='$date'
            where uniqueid='$uid';";
$results2 = sqlsrv_query($conn,$query2);

            
//$query2 = "update status set retainertomailroom='Yes',retainertomailroomdate='$date',Packet400='$date' where uniqueid='$uid';";
//$results2 = sqlsrv_query($conn,$query2);


echo "<br>";
echo $filename.".pdf Created";            
echo "<br>";
}
}


?>
