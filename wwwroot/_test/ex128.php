<?php
require('code128.php');

$pdf=new PDF_Code128();






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
$hello = "$clientname" . ' ("Client") ';
#$hellophone = "$cliphone" . ' phone number';
$hello2 = '     This Attorney-Client Agreement sets forth the terms under which Initiative Legal Group APC ("Attorneys") has been retained by ' . "$hello" .' to perform certain legal services.';
$title = 'ATTORNEY-CLIENT AGREEMENT';
$agreed = 'AGREED AND ACCEPTED';
$space = ' ';
$printtxt = 'PHONE NUMBER';
$printline = '__________________________________';
$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
$pdf->AddPage();

$pdf->Image('logo.png',62,22,8,0,'','');
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
$pdf->Ln();
$pdf->Ln();
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
$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->MultiCell(0,5,$gethead5);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$get5);
$pdf->AddPage();
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
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$signtxt);
$pdf->Ln(9);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,$printline);
#$pdf->Ln(0);
#$pdf->SetFont('Times','I',12);
#$pdf->Cell(0,5,$clientname);
$pdf->Ln(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(0,5,$printtxt);


$pdf->AddPage();
$pdf->SetFont('Arial','',10);

//A set
$code='CODE 128';
$pdf->Code128(50,20,$code,80,20);
$pdf->SetXY(50,45);
$pdf->Write(5,'A set: "'.$code.'"');

//B set
$code='Code 128';
$pdf->Code128(50,70,$code,80,20);
$pdf->SetXY(50,95);
$pdf->Write(5,'B set: "'.$code.'"');

//C set
$code='12345678901234567890';
$pdf->Code128(50,120,$code,110,20);
$pdf->SetXY(50,145);
$pdf->Write(5,'C set: "'.$code.'"');

//A,C,B sets
$code='ABCDEFG1234567890AbCdEf';
$pdf->Code128(50,170,$code,125,20);
$pdf->SetXY(50,195);
$pdf->Write(5,'ABC sets combined: "'.$code.'"');

$pdf->Output();
?>