<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    </head>
<body></body></html>
<?php
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
$email=$_GET['email'];
$id=$_GET['approvalid'];
$sql="select * from useraccount where email='$email' and id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$dob=$row['dob'];
$gender=$row['gender'];
$email=$row['email'];
ob_start();
require_once 'FPDF/fpdf.php';
$title='USER DETAILS';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->setTitle($title);
$pdf->SetFont('Times', 'I',16);
$w=$pdf->GetStringWidth($title)+6;
$pdf->SetX((210-$w)/2);
$pdf->SetDrawColor(221,221,221,1);
$pdf->SetFillColor(10,158,0,1);
$pdf->SetTextColor(255,255,255,1);
$pdf->SetLineWidth(1);
$pdf->Cell($w,10,$title,1,1,'C',true);
$pdf->Ln(10);
$pdf->SetTextColor(0,0,0,1);
$w=$pdf->GetStringWidth($email)+46;
$pdf->SetX((170-$w)/2);
$pdf->Cell(70,10,'Firstname:',1,0,'C'); 
$pdf->Cell($w,10,$firstname,1,1,'C');

$pdf->SetX((170-$w)/2);
$pdf->Cell(70,10,'Lastname:',1,0,'C'); 
$pdf->Cell($w,10,$lastname,1,1,'C');

$pdf->SetX((170-$w)/2);
$pdf->Cell(70,10,'Date of Birth:',1,0,'C'); 
$pdf->Cell($w,10,$dob,1,1,'C');

$pdf->SetX((170-$w)/2);
$pdf->Cell(70,10,'Gender:',1,0,'C'); 
$pdf->Cell($w,10,$gender,1,1,'C');

$pdf->SetX((170-$w)/2);
$pdf->Cell(70,10,'Email:',1,0,'C'); 
$pdf->Cell($w,10,$email,1,1,'C');    
$attachment=$pdf->Output('UserDetails.pdf','S');
ob_end_flush();
require_once('phpmail/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->CharSet =  "utf-8";
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;                  
$mail->Username = "reshma.zeoner@gmail.com";
$mail->Password = "happyalways@1997";
$mail->SMTPSecure = "ssl";  
$mail->Host = "smtp.gmail.com";
$mail->Port = "465";
$mail->From='reshma.zeoner@gmail.com';
$mail->FromName='reshma';
//$mail->SMTPDebug=2;
$mail->addAddress($email);
$mail->addStringAttachment($attachment,'UserDetails.pdf');
$mail->Subject  =  'Approval Mail';
$mail->IsHTML(true);
$mail->Body    = '<i><center>Hello,This is from Registration Portal</center></i><br>Your Registeration will be completed after Verifying all your Details.<br>
Thank You For your Registration.';
if($mail->Send())
{
    echo "<center><p style=color:green;><b>Mail get Approved</b></p><center>";
}
else
{
echo "Mail Error - >".$mail->ErrorInfo;
}
echo '<a href="admin.php" class="btn btn-success">OK</a>';
?>
