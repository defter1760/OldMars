<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
  
    <!--    <link rel="stylesheet" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/homestyle.css" />
        <link rel="stylesheet" href="css/jquery.ui.all.css" />
        <script type="text/javascript" src="js/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="js/Utils.js"></script>   <!--> 

<!--<style>

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


h2{
	font-size:20px;
	line-height:26px;
	text-decoration:underline;
	padding-top:20px;
	padding-bottom:30px;
	text-transform:uppercase;
	text-align:center;
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


#main{
	width:100%;
	height:100%;
	margin:0 auto;
	padding:0;
}

#primaryContent{
	width:90%;
	text-align:left;
	margin:0 auto;
}


</style> 
        
    </head>
<body>-->
<!--<style>

body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	background:#fff;
	margin:0;
	text-align:center;
	height:100%;
}



body, div, h1, h2, h3, h4, h5, h6, p, ul, img {
	margin:0px;
	padding:0px;
}

#main{
	width:100%;
	height:100%;
	text-align:left;
}
#message{
	width:100%;
	margin:0 auto;
	padding-top:20px;
}

#message h3{
	font-weight:24px;
	line-height:28px;
	text-align:center;
	padding-bottom:30px;
	color:#a31c30;
}

#message h4{
	font-size:18px;
	line-height:32px;
	text-decoration:underline;
	color:#424242;
	text-align:center;
	font-weight:normal;
	padding-bottom:25px;
	text-transform:uppercase;
}

#message p{
	font-size:18px;
	line-height:28px;
	padding-bottom:20px;
	width:100%;
	margin:0 auto;
}

#message ul{
	width:90%;
	margin:0 auto;
	list-style-position:outside;

}

#message ul li{
	font-size:18px;
	line-height:24px;
	padding-bottom:30px;
	list-style:none;
	background:url(https://macyslawsuit.com/wp-content/uploads/2012/04/check.png) no-repeat 0 7px;
	padding-left:40px;
	
}


#message a{
	color:#a31c30;
	font-size:20px;
	text-decoration:none;
	font-weight:bold;
}

#message p.disclaimer{
	font-size:15px;
		line-height:19px;
	font-style:italic;
	font-family:Times New Roman, Times, serif;
	font-weight:bold;
	text-align:center;
	padding-top:25px;
	
}

.link{
	display:inline-block;
	background: url(https://macyslawsuit.com/wp-content/uploads/2012/04/link1.png) no-repeat 53px 0;
	width:92px;
	height:31px;
	padding-left:3px;
}
img, img a, a img, a {
   outline: none !important;
}
</style>-->
</head>
<body>

<?PHP
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

if (empty($TwoSigners)) $TwoSigners = 'Create an Envelope with 2 Signers';
if (empty($RecipientEmail2)) $RecipientEmail2 = 'massAction_Macys_Management@initiativelegal.com';
#if (empty($RecipientName2)) $RecipientName2 = 'Macys Lawsuit';
if (empty($RecipientName2)) $RecipientName2 = 'Pamela Ng';
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';

if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];

if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];


?>

<?PHP 
//$serverName = "localhost\SPICE";
//
//$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
//$conn = sqlsrv_connect( $serverName, $connectionInfo );
//$query = "SELECT authformreceived,retainerAccepted,feewaiverreceived,completedlongformonline,FirstName,LastName,brand,phone1,email,brandid,brand FROM Status WHERE uniqueid='$uniqueid'";
//$results = sqlsrv_query($conn,$query);
//
//	while($row = sqlsrv_fetch_array($results))
//	{
//
//	$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
//	$retainerAccepted = $row['retainerAccepted']; if (empty($retainerAccepted)) unset($retainerAccepted);
//	$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
//	$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
//	$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
//	$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
//	$brandname = $row['brand']; if (empty($brandname)) unset($brandname);
//	$phone1 = $row['phone1']; if (empty($phone1)) unset($phone1);
//	$email = $row['email']; if (empty($email)) unset($email);
//	$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
//	$brand = $row['brand']; if (empty($brand)) unset($brand);
//
//  }

//  		$query = "IF EXISTS (SELECT uniqueid from status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid') UPDATE status set retainerSent='Docusign',retainerSentdate='$date',retainerSentmonth='$month',retaineSentweek='$week' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
//		$results = sqlsrv_query($conn,$query);
//$clientname = $FirstName.' '.$LastName;
$LastName = $_GET['LastName'];
$FirstName = $_GET['FirstName'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
$email = $_GET['Email'];
$brand = 'Macys';
$brandname = $brand;
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--<div id="main">-->
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
	$this->SetY(-25);
	// Arial italic 8
	$this->SetFont('Arial','',9);
	// Text color in gray
	$this->SetTextColor(128);
	// Page number
#	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	$this->Cell(0,10,'1800 Century Park East, 2nd Floor  -  Los Angeles, California 90067 ','','','C');
	$this->Ln(3);
	$this->Cell(0,10,'888.792.2293 Main  -  310.734.1665 Fax  -  www.MacysLawsuit.com ','','','C');
	$this->Ln(1);
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
		$retainerhead10 = './retainers/'. "$brandname" . 'RetainerHead10.txt';
		$retainerhead11 = './retainers/'. "$brandname" . 'RetainerHead11.txt';
		$retainerhead12 = './retainers/'. "$brandname" . 'RetainerHead12.txt';
		$retainerhead13 = './retainers/'. "$brandname" . 'RetainerHead13.txt';		
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
		$retainer11 = './retainers/'. "$brandname" . 'RetainerPart11.txt';
		$retainer12 = './retainers/'. "$brandname" . 'RetainerPart12.txt';
		$retainer13 = './retainers/'. "$brandname" . 'RetainerPart13.txt';		
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
		$hello2 = 'Initiative Legal Group APC ("Attorneys") and '.$clientname.' ("Client") agree that Attorneys will provide legal services to Client on the terms set forth below:';
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
$pdf->Image('logo.png',60,13,'','12');
		#$pdf->Image('logo.png',);
		#$pdf->Image('logo.png',62,13,8,0,'','');
		#$pdf->Ln();
		#$pdf->SetFont('helvetica','B',12);
		#$pdf->MultiCell(0,5,$hellocompany,'','C');
		$pdf->Ln(8);
		$pdf->SetFont('Times','B',10);
		$pdf->MultiCell(0,5,$hellotitle,'','C');
		$pdf->Ln();
		#$pdf->Ln();
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4,$hello2);
		//start of form fields
		$pdf->Ln();
		#$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'1.               '.$gethead1);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                              '.$get1,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->MultiCell(0,4.5,'2.            '.$gethead2);
		$pdf->Ln(-4);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                                                   '.$get2,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'(A)               '.$gethead3);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                     '.$get3,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'(B)               '.$gethead4);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                                                '.$get4,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'(C)               '.$gethead5);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                           '.$get5,'','J');
		$pdf->Ln();
		#$pdf->SetFont('Arial','B',11);
//page1barcodeStart
		
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'3.               '.$gethead6);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                     '.$get6,'','J');
		
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'4.               '.$gethead7);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                               '.$get7,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'5.               '.$gethead8);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                  '.$get8,'','J');
		
		$code= $uniqueid;
		$pdf->SetXY(70,264);
                $pdf->SetFont('Arial','B',11);
		#$pdf->Cell(0,10,'CLIENT INITIALS _______','','','R');
                $pdf->SetFont('Arial','',6);
                #$pdf->Write(5,''.$code.'');                
		$pdf->Code128(70,286,$code,70,2);
$pdf->AddPage();
#$pdf->Ln(5);
		#$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'6.               '.$gethead9);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                            '.$get9,'','J');
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'7.               '.$gethead10);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                        '.$get10,'','J');

		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,4.5,'8.               '.$gethead11);
		$pdf->Ln(0);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,4.5,'                                                                                     '.$get11,'','J');

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
		$pdf->MultiCell(0,4.5,'                                                      '.$get13,'','J');
								
		$pdf->Ln(9);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(0,5,$agreed,'','','L');
		$pdf->Ln(15);
		$pdf->SetFont('Times','',10);
		$pdf->Cell(0,5,$signline);
		$pdf->Ln(7);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,5,$signtxt);
		$pdf->Ln(3);
		$pdf->SetFont('Times','U',12);
		$pdf->Cell(0,5,$printline);
		$pdf->Ln(4);
		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,5,$printtxt);
		$pdf->SetFont('Arial','',10);
		$code= $row['uniqueid'];
		#$pdf->Code128(10,260,$code,70,10);
		$pdf->SetXY(130,270);
		#$pdf->Write(5,''.$code.'');
		$pdf->SetFont('Arial','B',11);
		$code= $uniqueid;
		#$pdf->Code128(130,260,$code,70,10);
                $pdf->Code128(70,286,$code,70,2);
		#$pdf->SetXY(130,270);
		#$pdf->Write(5,''.$code.'');
		#$pdf->SetXY(70,264);
                #$pdf->Cell(0,10,'CLIENT INITIALS _______','','','R');

$code= "$uniqueid";
#$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
#$pdf->Write(5,''.$code.'');

$pdf->SetFont('Arial','',10);

$code= "$uniqueid";
#$pdf->Code128(130,260,$code,70,10);
$pdf->SetXY(130,270);
#$pdf->Write(5,''.$code.'');
$dir='/inetpub/wwwroot/GitHub/OldMars/wwwroot/';
$filename = "$LastName, " .  "$FirstName" . " - Attorney-Client Agreement - ".$uniqueid; 
$ext = ".pdf";

$pdf->Output("/inetpub/wwwroot/GitHub/OldMars/wwwroot/$filename$ext","F"); //pushes file to server for temp storage
$pdf->Output("/inetpub/wwwroot/GitHub/OldMars/wwwroot/Retainerstmp/$filename$ext","F");

$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$filename3= "$LastName, " .  "$FirstName" . " - ".$uniqueid; 
$dir1 = "$dir0" . "$filename3";
##
###
//6/27/12)-> Added this code to modify the way the folders are created on the internal file server to be just the uniqueid instead of the first and lastname and the unqiueid 
$newdiruniquid = $dir0."".$uniqueid;
###
##
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
#$file2 = "$filename2" . "$ext";
#$conn_id = ftp_connect($ftp_server);

// login with username and password
#$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

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


require ("include/prod/ianSession.php"); 
require ("api/prod/ianCredential.php");
require ("api/prod/APIService.php");
require ("include/prod/utils.php");
//prod UserID
$_SESSION["UserID"] = "4dbf6087-64d2-4584-bf04-698ce5bf24d7";
//demo UserID
#		$_SESSION["UserID"] = "ihutchings@preferredlegalsupport.com";
//this one is the production accountid		
$_SESSION["AccountID"] = "71d4b945-2ef2-41db-a4b4-9e509d505d39";
//this one is the demo accountid
#		$_SESSION["AccountID"] = "c468460b-4d8f-4fd6-980c-0974de9c815a";
		$_SESSION["Password"] = "siec9oanoapoeqiA";

        $_SESSION["IntegratorsKey"] = "PREF-7a494820-fcfd-4a5a-88dd-90402a914ce9";
//========================================================================
// globals
//========================================================================
#$_oneSigner = true; // Do we want One Signer (=true) or Two (=false)
$_oneSigner = false; // Do we want One Signer (=true) or Two (=false)
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
    $env->EmailBlurb = "";
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
        header("Location: errorpretty.php");
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
        $r2->Type = RecipientTypeCode::Signer;
        $r2->RoutingOrder = 2;
        
		//ian)-> comment next three lines to set 2nd recipient to recieve email when recipient 1 is done signing
        if(!isset($_POST['RecipientInviteToggle'][$i])){
        	$r1->CaptiveInfo = new RecipientCaptiveInfo();
        	$r1->CaptiveInfo->ClientUserId = $i;
       }
        
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
    $init1->XPosition = "525";
    $init1->YPosition = "752";
    array_push($tabs, $init1);
    
    $sign1 = new Tab();
    $sign1->Type = TabTypeCode::SignHere;
    $sign1->DocumentID = "1";
    $sign1->PageNumber = "2";
    $sign1->RecipientID = "1";
    $sign1->XPosition = "18"; #was 29
    $sign1->YPosition = "606"; #was 643
    array_push($tabs, $sign1);
        

    $date1 = new Tab();
    $date1->Type = TabTypeCode::DateSigned;
    $date1->DocumentID = "1";
    $date1->PageNumber = "2";
    $date1->RecipientID = "1";
    $date1->XPosition = "200"; #was 200
    $date1->YPosition = "640"; #was 680
    array_push($tabs, $date1);




//page 2 initials        
    $init2 = new Tab();
    $init2->Type = TabTypeCode::InitialHere;
    $init2->DocumentID = "1";
    $init2->PageNumber = "2";
    $init2->RecipientID = "1";
    $init2->XPosition = "525";
    $init2->YPosition = "752";
    array_push($tabs, $init2);
    

    if ($count > 1) {
        $sign2 = new Tab();
        $sign2->Type = TabTypeCode::SignHere;
        $sign2->DocumentID = "1";
        $sign2->PageNumber = "2";
        $sign2->RecipientID = "2";
        $sign2->XPosition = "280";
        $sign2->YPosition = "607";
        array_push($tabs, $sign2);

    $date2 = new Tab();
    $date2->Type = TabTypeCode::DateSigned;
    $date2->DocumentID = "1";
    $date2->PageNumber = "2";
    $date2->RecipientID = "2";
    $date2->XPosition = "470";
    $date2->YPosition = "640";
    array_push($tabs, $date2);
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
    $urls->OnCancel = "https://DFWMS01.initiativelegal.com/thanksemail1.php?Monkey";
    $urls->OnDecline = 'https://DFWMS01.initiativelegal.com/declineToSign.php?uniqueid='.$uniqueid.'&statuslevel=Decline&document=Retainer';
    $urls->OnException = "https://DFWMS01.initiativelegal.com/thanksemail1.php?Pickle";
    $urls->OnFaxPending = 'https://DFWMS01.initiativelegal.com/thanksemail1.php?uniqueid='.$uniqueid.'&statuslevel=Faxpending';
    $urls->OnIdCheckFailed = "https://DFWMS01.initiativelegal.com/thanksemail1.php?Elephant";
    $urls->OnSessionTimeout = "https://DFWMS01.initiativelegal.com/thanksemail1.php?Chocolate";
    $urls->OnTTLExpired = "https://DFWMS01.initiativelegal.com/thanksemail1.php?WAFFLE3";
    $urls->OnViewingComplete = "https://DFWMS01.initiativelegal.com/thanksemail1.php?Bluetooth";
    if ($_oneSigner) {
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/thanksemail1.php?uniqueid='.$uniqueid.'&statuslevel=Signed';
    }
    else {
#some other link# $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/2ndsignplz.php';
        $urls->OnSigningComplete = 'https://DFWMS01.initiativelegal.com/thanksemail1.php?uniqueid='.$uniqueid.'&statuslevel=Signed';
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
        header("Location: errorpretty.php");
    }
    
     $_SESSION["embedToken"] = $token;
     
     ##ian --)> uncomment this line to allow for SOAP trace, also uncomment the last couple lines of the file that refer to piping arrays into xml
     #print_r($api);

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
$query = "select retaineraccept from Status where uniqueid='$uniqueid' and retaineraccept IS NOT NULL";
$results = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($results))
{
    $retaineraccepted = $row['retaineraccept'];
}
if (isset($retaineraccepted)) if (empty($retaineraccepted)) unset($retaineraccepted);
if (!isset($retaineraccepted))
{
echo '<div id="main">';
echo '<div id="message">';
#echo "<input style='border:0' type='text' id='textbox1' size='1'>";
echo "<script>document.getElementById('textbox1').focus()</script>";
echo '<h4><br /> CONFIDENTIAL/WORK PRODUCT PRIVILEGE<br /><br />';
echo '<strong>ATTORNEY-CLIENT AGREEMENT</strong></h4><br />';
echo '<ul>';
echo '<li>Please review this document carefully. If you choose, after you have completed your review, you will be prompted to electronically initial and sign the Agreement by clicking on the "sign here" tabs. You may choose to use your computer\'s mouse to draw your electronic signature on the Agreement. When drawing your electronic signature, do not worry if the electronic version does not look exactly like your regular signature. All that is required is that you input an original mark that you created on the Agreement.</li>';
echo '<li>Once you have initialed and signed the Attorney-Client Agreement, you will have the opportunity to review and confirm your signature. By clicking on "confirm signing" you will submit the Attorney-Client Agreement to our law firm, and hire us as your attorneys for your potential wage and hour claims against Macy\'s. If you have any questions, please contact us at 888.792.2293.</li>';
echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
echo '</ul>';

		echo "<table align='center' width='1100px' border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<td  height='2600px'   align='center'>";
		echo "<iframe  align='middle' marginheight='5%' width='99%' height='98%' src='";
		echo $_SESSION['embedToken'] . "&id='focusstealer' name='focusstealer' frameborder='0' ";
		echo 'onload="reloadPage()"';
		echo "></iframe>";
#		echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe' frameborder='0'></iframe>";
		
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";

echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';
	
	//}
	//}
}
else
{
require('3step.php');
}      
?>
<?php

#echo '[__last_response_headers] => <?xml version=”1.0 encoding=”UTF-8”\?\>';
#echo '[__lastRequest] => <?xml version=”1.0 encoding=”UTF-8”\?\>';

?>
</div>
</html>