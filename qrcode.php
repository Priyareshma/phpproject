<?php
include 'phpqrcode/qrlib.php';
$email=$_GET['email'];
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
$sql="select * from useraccount where email='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$dob=$row['dob'];
$gender=$row['gender'];
$email=$row['email'];
$text = "Name:$firstname,Lastname:$lastname,DoB:$dob,Gender:$gender ";
$tempDir="pdfqrcodes/";
$fileName="$email.png";
$pngAbsoluteFilePath=$tempDir.$fileName;
$urlRelativeFilePath=$tempDir.$fileName;
if(!file_exists($pngAbsoluteFilePath))
{
  QRcode::png($text,$pngAbsoluteFilePath);  
}
require('FPDF/fpdf.php');
ob_start();
$qrcodeimage="pdfqrcodes/$email.png";
$pdf = new FPDF('P','mm','a5');
$pdf->SetTopMargin(25);
$pdf->AddPage();
$pdf->SetFont('Arial',"",14);
$pdf->Cell(0,10,"Install some QR Scanner or Online Scanner to scan this",0,0,'C');
$pdf->Image($qrcodeimage,35,50,75,75);
$pdf->Output("pdfqrcodes/$email.pdf","F");
$file = "pdfqrcodes/$email.pdf";
header("Content-type: application/pdf");    
header("Content-Length: " . filesize($file)); 
readfile($file);
ob_end_flush();
?>