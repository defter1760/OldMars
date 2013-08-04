<?php
require('../fpdf.php');

class PDF extends FPDF
{
function Header()
{
	global $title;

	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Calculate width of title and position
	$w = $this->GetStringWidth($title)+6;
	$this->SetX((210-$w)/2);
	// Colors of frame, background and text
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	// Thickness of frame (1 mm)
	$this->SetLineWidth(1);
	// Title
	$this->Cell($w,9,$title,1,1,'C',true);
	// Line break
	$this->Ln(10);
}

function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Text color in gray
	$this->SetTextColor(128);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
	// Arial 12
	$this->SetFont('Arial','',12);
	// Background color
	$this->SetFillColor(200,220,255);
	// Title
	$this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
	// Line break
	$this->Ln(4);
}

function ChapterBody($file)
{
	// Read text file
	$txt = file_get_contents($file);
	// Times 12
	$this->SetFont('Times','',12);
	// Output justified text
	$this->MultiCell(0,5,$txt);
	// Line break
	$this->Ln();
	// Mention in italics
	$this->SetFont('','I');
	$this->Cell(0,5,'(end of excerpt)');
}

function PrintChapter($num, $title, $file)
{
	$this->AddPage();
	$this->ChapterTitle($num,$title);
	$this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = '20000 Leagues Under the Seas';
$pdf->SetTitle($title);
$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter(1,'A RUNAWAY REEF','20k_c1.txt');
$pdf->PrintChapter(2,'THE PROS AND CONS','20k_c2.txt');

$dir='/inetpub/wwwroot/_test/Tmp/';
$filename = "20000Leagues_"; 
$ext = ".pdf";
$pdf->Output(); //pushes file to browser as a viewable PDF
#$pdf->Output("$filename$ext","D"); //pushes file to browser as save as

$pdf->Output("/inetpub/wwwroot/_test/Tmp/$filename$ext","F"); //pushes file to server for temp storage


?>

<?PHP

$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dude = '20000Leagues_';
$dir0 = '/test_folder/';
$dir1 = "$dir0" . "$dude";
$file = "$filename" . "$ext";
#$fp = fopen($file, 'r');

$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// get contents of the current directory
$contents = ftp_nlist($conn_id, ".");

#ftp_mkdir($conn_id, $dir1);
if (ftp_mkdir($conn_id, $dir1)) {
} else {
 echo "$dir1 exists";
}
ftp_chdir($conn_id, $dir1);
ftp_put($conn_id, $file, $file, FTP_BINARY);
ftp_close($conn_id);
#fclose($fp);
?>

