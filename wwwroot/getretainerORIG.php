<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<style type="text/css">

body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	margin:0;
	text-align:center;
	height:100%;
}

    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding:10px;
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:650px;
        color:#000000 !important;
        font-family:Verdana;
        font-size:12px;
    }
	.HeaderRed {
	color: #900;
}

/*this centers the whole document :)*/
div#main {

  width: 1200px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
</style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/homestyle.css" />
        <link rel="stylesheet" href="css/jquery.ui.all.css" />
        <script type="text/javascript" src="js/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="js/Utils.js"></script>      
    </head>
<body>
<head>

<?PHP
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
#<input class="docusignbutton brown" name="TwoSigners" id="TwoSigners" type="hidden" value="Create an Envelope with 2 Signers" />
#<input type="hidden" Name="RecipientName2" value="Ian Hutchings">
#<input type="hidden" name="RecipientEmail2" value="ihutchings@initiativelegal.com">
if (empty($TwoSigners)) $TwoSigners = 'Create an Envelope with 2 Signers';
if (empty($RecipientEmail2)) $RecipientEmail2 = 'ihutchings@initiativelegal.com';
if (empty($RecipientName2)) $RecipientName2 = 'Ian Hutchings';
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';

if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];


?>

<?PHP 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT * FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){


		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
		$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
		$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
		$brandname = $row['brand']; if (empty($brandname)) unset($brandname);
		$phone1 = $row['phone1']; if (empty($phone1)) unset($phone1);
		$email = $row['email']; if (empty($email)) unset($email);
		$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
		$brand = $row['brand']; if (empty($brand)) unset($brand);

  }
  		$query = "IF EXISTS (SELECT * from status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid') UPDATE status set authformsent='Docusign',authformsentdate='$date',authformsentmonth='$month',authformsentweek='$week' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
		$results = sqlsrv_query($conn,$query);
$clientname = $FirstName.' '.$LastName;
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div id="main">
<?PHP
$link = "getauth.php";
if (isset($authformreceived)) if ($authformreceived == 'Yes')
{
	$link = "macysdetailedquestionnaire.php";
	#echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if (isset($completedlongformonline)) if ($completedlongformonline == 'Yes')
{
	$link = "feewaiverprequal.php";
	#echo "It looks like you've already completed our detailed questionnaire, give us a call if you have any questions.";
}
if (isset($feewaiverreceived)) if ($feewaiverreceived == 'Yes')
{
	$link = "";
	#echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if (isset($feewaiverreceived)) if ($feewaiverreceived == 'Not Qualified')
{
	$link = "";
	#echo "It looks like you've already completed the fee waiver, give us a call if you have any questions.";
}
?>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<style>

body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	margin:0;
	text-align:center;
	height:100%;
}

body, div, h1, h2, h3, h4, h5, h6, p, ul, img {
	margin:0px;
	padding:0px;
}

h1{
	font-size:22px;
	line-height:28px;
}

h2{
	font-size:20px;
	line-height:26px;
	text-decoration:underline;
	padding-top:20px;
	padding-bottom:30px;
}

h3{
	font-size:18px;
	line-height:24px;
}


p{
	font-size:16px;
	text-align:left;
	padding-bottom:10px;
}

a {
	color:#9f111b;
	font-weight:bold;
	text-decoration:none;
}

.bigText{
	font-size:20px;
	text-transform:uppercase;
}

.red{
	font-weight:bold;
	color:#9f111b;
}

#main{
	width:100%;
	margin:0 auto;
	padding:20px;
}

.container{
	width:90%;
	margin:0 auto;
}

#logo{
	width:370px;
	height:36px;
	background-image:url(https://DFWMS01.initiativelegal.com/whitelogo.png);
	background-repeat:none;
	text-indent:-9999px;
	margin:0 auto;
}

ol{
}


ol li{
	padding-bottom:10px;
}

#button{
	margin:0 auto;
	text-align:center;
	padding-top:15px;
}

.startButton{
	display:block;
	background:url(http://www.yourlawsuit.com/macys/wp-content/uploads/2012/03/start_button1.png) no-repeat 0 0;
	width:187px;
	height:61px;
	text-indent:-9999px;
	margin:0 auto;
	
	
}

.startButton:hover{
	background-position:bottom;
}

</style> 
<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');
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
	$this->Ln(5);
}
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-20);
	// Arial italic 8
	$this->SetFont('Arial','',9);
	// Text color in gray
	$this->SetTextColor(128);
	// Page number
#	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	$this->Cell(0,10,'1800 Century Park East, 2nd Floor - Los Angeles, California 90067 ','','','C');
	$this->Ln(3);
	$this->Cell(0,10,'877-515-4712 Main - 310.734.1665 Fax - www.MacysLawsuit.com ','','','C');
	$this->Ln(4);
	$this->Cell(0,10,'CLIENT INITIALS _______','','','R');
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
$retainer1 = './retainers/'. "$brandname" . 'RetainerPart1.txt';
$retainer2 = './retainers/'. "$brandname" . 'RetainerPart2.txt';
$retainer3 = './retainers/'. "$brandname" . 'RetainerPart3.txt';
$retainer4 = './retainers/'. "$brandname" . 'RetainerPart4.txt';
$retainer5 = './retainers/'. "$brandname" . 'RetainerPart5.txt';
$retainer6 = './retainers/'. "$brandname" . 'RetainerPart6.txt';
$retainer7 = './retainers/'. "$brandname" . 'RetainerPart7.txt';
$retainer8 = './retainers/'. "$brandname" . 'RetainerPart8.txt';
$retainer9 = './retainers/'. "$brandname" . 'RetainerPart9.txt';
$get1 = file_get_contents($retainer1);
$get2 = file_get_contents($retainer2);
$get3 = file_get_contents($retainer3);
$get4 = file_get_contents($retainer4);
$get5 = file_get_contents($retainer5);
$get6 = file_get_contents($retainer6);
$get7 = file_get_contents($retainer7);
$get8 = file_get_contents($retainer8);
$get9 = file_get_contents($retainer9);
$gethead1 = file_get_contents($retainerhead1);
$gethead2 = file_get_contents($retainerhead2);
$gethead3 = file_get_contents($retainerhead3);
$gethead4 = file_get_contents($retainerhead4);
$gethead5 = file_get_contents($retainerhead5);
$gethead6 = file_get_contents($retainerhead6);
$gethead7 = file_get_contents($retainerhead7);
$gethead8 = file_get_contents($retainerhead8);
$gethead9 = file_get_contents($retainerhead9);

$hellocompany = 'INITIATIVE LEGAL GROUP APC';
$hellotitle = 'ATTORNEY-CLIENT AGREEMENT';
$hello = $clientname . ' ("Client") ';
#$hellophone = "$cliphone" . ' phone number';
$hello2 = '     This Attorney-Client Agreement sets forth the terms under which Initiative Legal Group APC ("Attorneys") has been retained by you ("Client") to perform certain legal services.';
$printyourfullname = '________________________________[print your full name] ("Client")';
$yourbestphonenumber = '______________________[your best phone number]';
$emergencycontact = '___________________[name of Emergency Contact]____________[Relationship]_________________[phone number]';
$title = 'ATTORNEY-CLIENT AGREEMENT';
$agreed = 'AGREED AND ACCEPTED';
$space = ' ';
$printtxt = 'PRINT FIRST AND LAST NAME';
$printline = $clientname.'                                     ';
$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
$pdf->AddPage();

$pdf->Image('logo.png',62,13,8,0,'','');
$pdf->Ln();
$pdf->SetFont('helvetica','B',12);
$pdf->MultiCell(0,5,$hellocompany,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(0,5,$hellotitle,'','C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,$hello2);
//start of form fields
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,$hello);
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,$yourbestphonenumber);
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,5,$emergencycontact);
$pdf->Ln();
#$pdf->SetFont('Times','',10);
#$pdf->MultiCell(0,5,$hello);
#$pdf->Ln();
#$pdf->SetFont('Times','',10);
#$pdf->MultiCell(0,5,$hellophone);
#$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead1);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get1);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead2);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get2);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead3);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get3);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get4);
//page1barcodeStart
$code= "$uniqueid";
$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
$pdf->Write(5,''.$code.'');
//page1barcodeEnd
// page 2 start
$pdf->AddPage();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead5);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get5);
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead6);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get6);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead7);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get7);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead8);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get8);
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead9);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get9);
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
$pdf->SetFont('Times','U',10);
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

$pdf->Output("/inetpub/wwwroot/$filename$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/Retainerstmp/$filename$ext","F");

$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$filename3= "$LastName, " .  "$FirstName" . " - ".$uniqueid; 
$dir1 = "$dir0" . "$filename3";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

ftp_mkdir($conn_id, $dir2);

ftp_chdir($conn_id, $dir2);
ftp_put($conn_id, $file, $file, FTP_BINARY);
ftp_close($conn_id);
unlink($file); //delete temp copy pdf stored on server

$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_mkdir($conn_id, $dir3);
ftp_chdir($conn_id, $dir3);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); //delete temp copy pdf stored on server


//if (isset($uniqueid))
//	{	
//		$query = "IF NOT EXISTS(SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO status (uniqueid,notelog,email,phone1,phone2,currentstatus,currentstatusdate,brandid,tenantid,date,time,brand,completedonline,onlinecompleteday,onlinecompleteweek,onlinecompletemonth,onlinecompletetime,FirstName,LastName,Street1,Street2,City,State,Zipcode,interviewstarted,reachedretainerdiscussion,interviewstartmonthyear,interviewstartday,interviewcompletemonthyear,interviewcompleteday,interviewstarttime,interviewcompletetime,interviewstartweek,interviewcompleteweek) VALUES ('$uniqueid','$date @ $time : <strong>Retainer passed to docusign</strong><br>$date @ $time : <strong>Shortform Complete</strong><br>','$email','$callbacknum','$secondarynumber','Shortform Complete','$date','$brandid','$tenantid','$date','$time','$brand','Yes','$date','$week','$month','$time','$whofirstname','$wholastname','$streetline1','$streetline2','$homecity','$homestate','$zipcode','Yes','Yes','$month','$date','$month','$date','$time','$time','$week','$week')";
//		$results = sqlsrv_query($conn,$query);
//	
//		$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday=$date,interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week',retainerSent='Docusign',retainerSentDate='$date',retainerSentMonth='$month',retainerSentWeek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
//		$results = sqlsrv_query($conn,$query);
//			
//}


require ("include/ianSession.php"); 
require ("api/ianCredential.php");
require ("api/APIService.php");
require ("include/utils.php");
		$_SESSION["UserID"] = "ihutchings@preferredlegalsupport.com";
		$_SESSION["AccountID"] = "c468460b-4d8f-4fd6-980c-0974de9c815a";
        $_SESSION["Password"] = "siec9oanoapoeqiA";
        $_SESSION["IntegratorsKey"] = "PREF-7a494820-fcfd-4a5a-88dd-90402a914ce9";
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
$chewypdf = './Retainerstmp/'."$filename".'.pdf';
$pdfname = "$filename";
$chewonthis = "PDFBytes = file_get_contents($chewypdf)";
function createAndSend($pdffilename,$subject,$name,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$phone1) {
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
    
    $env->Tabs = addTabs(count($env->Recipients),$phone1);
    
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


function addTabs($count,$phone1) {
    $tabs[] = new Tab();
    
//first page initials at bottom right
    $init1 = new Tab();
    $init1->Type = TabTypeCode::InitialHere;
    $init1->DocumentID = "1";
    $init1->PageNumber = "1";
    $init1->RecipientID = "1";
    $init1->XPosition = "530";
    $init1->YPosition = "778";
    array_push($tabs, $init1);
    
    $sign1 = new Tab();
    $sign1->Type = TabTypeCode::SignHere;
    $sign1->DocumentID = "1";
    $sign1->PageNumber = "2";
    $sign1->RecipientID = "1";
    $sign1->XPosition = "60";
    $sign1->YPosition = "659";
    array_push($tabs, $sign1);
        
    //$fullAnchor = new Tab();
    //$fullAnchor->Type = TabTypeCode::FullName;
    //$anchor = new AnchorTab();
    //$anchor->AnchorTabString = "Client Name (printed)";
    //$anchor->XOffset = -123;
    //$anchor->YOffset = 31;
    //$anchor->Unit = UnitTypeCode::Pixels;
    //$anchor->IgnoreIfNotPresent = true;
    //$fullAnchor->AnchorTabItem = $anchor;
    //$fullAnchor->DocumentID = "1";
    //$fullAnchor->PageNumber = "2";
    //$fullAnchor->RecipientID = "1";
    //array_push($tabs, $fullAnchor);
        
    $date1 = new Tab();
    $date1->Type = TabTypeCode::DateSigned;
    $date1->DocumentID = "1";
    $date1->PageNumber = "2";
    $date1->RecipientID = "1";
    $date1->XPosition = "170";
    $date1->YPosition = "695";
    array_push($tabs, $date1);


$data1 = new Tab();
$data1->Type = TabTypeCode::Custom;
$data1->CustomTabType = CustomTabType::Text;
$data1->CustomTabWidth = "110";
$data1->CustomTabHeight = "21";
$data1->CustomTabRequired = "0";
$data1->TabLabel = "Emergency Contact";
$data1->Name = "Emergency Contact Name";
$data1->DocumentID = "1";
$data1->PageNumber = "1";
$data1->RecipientID = "1";
$data1->XPosition = "28";
$data1->YPosition = "222";
array_push($tabs, $data1);

//$data3 = new Tab();
//$data3->Type = TabTypeCode::Custom;
//$data3->CustomTabType = CustomTabType::Text;
//$data3->CustomTabWidth = "120";
//$data3->CustomTabHeight = "21";
//$data3->CustomTabRequired = "0";
//$data3->Value = "".$_POST['1WhoFirstName']." ".$_POST['1WhoLastName'];
//$data3->TabLabel = "Full name";
//$data3->Name = "Full name";
//$data3->DocumentID = "1";
//$data3->PageNumber = "1";
//$data3->RecipientID = "1";
//$data3->XPosition = "28";
//$data3->YPosition = "168";
//array_push($tabs, $data3);

$data5 = new Tab();
$data5->Type = TabTypeCode::Custom;
$data5->CustomTabType = CustomTabType::Text;
$data5->CustomTabWidth = "60";
$data5->CustomTabHeight = "21";
$data5->CustomTabRequired = "0";
$data5->TabLabel = "Relationship";
$data5->Name = "Relationship";
$data5->DocumentID = "1";
$data5->PageNumber = "1";
$data5->RecipientID = "1";
$data5->XPosition = "267";
$data5->YPosition = "222";
array_push($tabs, $data5);

$data6 = new Tab();
$data6->Type = TabTypeCode::Custom;
$data6->CustomTabType = CustomTabType::Text;
$data6->CustomTabWidth = "95";
$data6->CustomTabHeight = "21";
$data6->CustomTabRequired = "0";
#$data6->Value = "".$_POST['1WhoFirstName']." ".$_POST['1WhoLastName'];
$data6->TabLabel = "Phone";
$data6->Name = "Phone";
$data6->DocumentID = "1";
$data6->PageNumber = "1";
$data6->RecipientID = "1";
$data6->XPosition = "396";
$data6->YPosition = "222";
array_push($tabs, $data6);


//$data4 = new Tab();
//$data4->Type = TabTypeCode::Custom;
//$data4->CustomTabType = CustomTabType::Text;
//$data4->CustomTabWidth = "120";
//$data4->CustomTabHeight = "21";
//$data4->CustomTabRequired = "0";
//$data4->Value = "".$_POST['1WhoFirstName']." ".$_POST['1WhoLastName'];
//$data4->TabLabel = "Full name";
//$data4->Name = "Full name";
//$data4->DocumentID = "1";
//$data4->PageNumber = "2";
//$data4->RecipientID = "1";
//$data4->XPosition = "28";
//$data4->YPosition = "751";
//array_push($tabs, $data4);

$data2 = new Tab();
$data2->Type = TabTypeCode::Custom;
$data2->CustomTabType = CustomTabType::Text;
$data2->CustomTabWidth = "120";
$data2->CustomTabHeight = "21";
$data2->CustomTabRequired = "0";
#$data2->Value = "".$_POST['1CallbackNumArea']."-".$_POST['1CallbackNum'];
$data2->Value = $phone1;
$data2->TabLabel = "Your best phone number";
$data2->Name = "Your best phone number";
$data2->DocumentID = "1";
$data2->PageNumber = "1";
$data2->RecipientID = "1";
$data2->XPosition = "28";
$data2->YPosition = "195";
array_push($tabs, $data2);


//page 2 initials        
    $init2 = new Tab();
    $init2->Type = TabTypeCode::InitialHere;
    $init2->DocumentID = "1";
    $init2->PageNumber = "2";
    $init2->RecipientID = "1";
    $init2->XPosition = "530";
    $init2->YPosition = "778";
    array_push($tabs, $init2);
    
/*	$sign2 = new Tab();
    $sign2->Type = TabTypeCode::SignHere;
    $sign2->DocumentID = "1";
    $sign2->PageNumber = "3";
    $sign2->RecipientID = "1";
    $sign2->XPosition = "60";
    $sign2->YPosition = "328";
    array_push($tabs, $sign2);
    */
/*	$date2 = new Tab();
    $date2->Type = TabTypeCode::DateSigned;
    $date2->DocumentID = "1";
    $date2->PageNumber = "3";
    $date2->RecipientID = "1";
    $date2->XPosition = "300";
    $date2->YPosition = "365";
    array_push($tabs, $date2);
   */
//page 3 initials	
/*	$init3 = new Tab();
    $init3->Type = TabTypeCode::InitialHere;
    $init3->DocumentID = "1";
    $init3->PageNumber = "3";
    $init3->RecipientID = "1";
    $init3->XPosition = "530";
    $init3->YPosition = "773";
    array_push($tabs, $init3);
        */
    if ($count > 1) {
        $sign2 = new Tab();
        $sign2->Type = TabTypeCode::SignHere;
        $sign2->DocumentID = "1";
        $sign2->PageNumber = "2";
        $sign2->RecipientID = "2";
        $sign2->XPosition = "273";
        $sign2->YPosition = "660";
        array_push($tabs, $sign2);

        $date3 = new Tab();
        $date3->Type = TabTypeCode::DateSigned;
        $date3->DocumentID = "1";
        $date3->PageNumber = "2";
        $date3->RecipientID = "2";
        $date3->XPosition = "400";
        $date3->YPosition = "500";
        array_push($tabs, $date3);
    }
        
    
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
    $urls->OnCancel = "http://sql.initiativelegal.com:35535/thanksemail1.php?Monkey";
    $urls->OnDecline = "http://sql.initiativelegal.com:35535/thanksemail1.php?Mouse";
    $urls->OnException = "http://sql.initiativelegal.com:35535/thanksemail1.php?Pickle";
    $urls->OnFaxPending = 'http://sql.initiativelegal.com:35535/thanksemail1.php?uniqueid=' . "$uniqueid" . '&brandid=' . "$brandid" . '&brand=' . "$brand" . '&tenantid=' . "$tenantid" . '&statuslevel=Faxpending';
    $urls->OnIdCheckFailed = "http://sql.initiativelegal.com:35535/thanksemail1.php?Elephant";
    $urls->OnSessionTimeout = "http://sql.initiativelegal.com:35535/thanksemail1.php?Chocolate";
    $urls->OnTTLExpired = "http://sql.initiativelegal.com:35535/thanksemail1.php?WAFFLE3";
    $urls->OnViewingComplete = "http://sql.initiativelegal.com:35535/thanksemail1.php?Bluetooth";
    if ($_oneSigner) {
        $urls->OnSigningComplete = 'http://sql.initiativelegal.com:35535/thanksemail1.php?uniqueid=' . "$uniqueid" . '&brandid=' . "$brandid" . '&brand=' . "$brand" . '&tenantid=' . "$tenantid" . "&statuslevel=Signed&3email=".$_POST['3Email'].'&FirstName='.$_POST['1WhoFirstName'].'&LastName='.$_POST['1WhoLastName'];
    }
    else {
        $urls->OnSigningComplete = 'http://sql.initiativelegal.com:35535/thanksemail1.php?uniqueid=' . "$uniqueid" . '&brandid=' . "$brandid" . '&brand=' . "$brand" . '&tenantid=' . "$tenantid" . "&statuslevel=Signed&3email=".$_POST['3Email'].'&FirstName='.$_POST['1WhoFirstName'].'&LastName='.$_POST['1WhoLastName'];
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
    createAndSend($chewypdf,$pdfname,$pdfname,$uniqueid,$brandid,$brand,$tenantid,$FirstName,$LastName,$email,$RecipientName2,$RecipientEmail2,$phone1);
		if(!$_oneSigner)
		{
			$_showTwoSignerMessage = true;
		}

}
if (!isset($retainerRecieved))
{
if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken']))
{

#echo "<div id='main2'>";

//echo "<div id='logo'>";
//echo "<h1>INITIATIVE LEGAL GROUP, APC</h1>";
//echo "</div>";

#echo "<div class='container'>";
echo "<table width='1100px' border=0>";
echo "<tr>";
echo "<td width='20%'>";
echo "</td>";
echo "<td align=center>";
echo "<h2>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h2>";
echo "</td>";
echo "<td width='20%'>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "</td>";
echo "<td width='20%'>";
echo "</td>";
echo "<td>";
echo "<p>On the next page, you will find an Authorization for Release of Personnel File and Wage Records to sign. This will allow us to instruct Macy's to release your employee file and other documents related to your potential claims to our law firm. These documents may be useful in supporting any claims you may have against Macy's.</p>";
echo "<p>Please carefully review the document and verify the spelling of your full name at the top of the document. When prompted, use your computer mouse to draw your electronic signature. Don't worry if your electronic signature does not look exactly like your real signature. All that is required is that you make an original mark on this document.</p>";
echo "<p>Please click on the &quot;confirmed signature&quot; button once you have completed the document and you will proceed to the next step of the process.</p>";
echo "</td>";
echo "<td width='20%'>";
echo "</td>";
echo "</tr>";
echo "</table>";
#echo "</div>";
#echo "</div>";
#echo "<div id='main'>";
#echo "<div class='container'>";
echo "<table width='1100px' border=0>";
echo "<tr>";

echo "<td  height='2600px'   align='center'>";
echo "<iframe  align='middle' marginheight='5%' width='99%' height='98%' src='";
echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe' frameborder='0'></iframe>";
echo "</td>";
echo "</tr>";
echo "</table>";

#echo "</div>";
}
}
else
{
	if (isset($authformreceived)) if (!isset($completedlongformonline))
	{//wrap this in conditional -- only if never completed the long form
		require('macysdetailedquestionnaire.php');
	
	}//wrap end--If they've completed the long form already they wont see the above
}      
?>

</div>
</html>