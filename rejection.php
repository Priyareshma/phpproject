<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    </head></html>
<?php
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
$email=$_GET['email'];
$id=$_GET['rejectionid'];
$sql="select * from useraccount where email='$email' and id='$id'";
mysqli_query($conn,$sql);   
require_once('phpmail/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->CharSet =  "utf-8";
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;                  
$mail->Username = "reshma.zeoner@gmail.com";
$mail->Password = "Priya12345";
$mail->SMTPSecure = "ssl";  
$mail->Host = "smtp.gmail.com";
$mail->Port = "465";
$mail->From='reshma.zeoner@gmail.com';
$mail->FromName='reshma';
$mail->addAddress($email);
$mail->Subject  =  'Rejection Mail';
$mail->IsHTML(true);
$mail->Body    = '<i><center>Oops...!!! Your Registration has been rejected</center></i><br>
Thank You For your Registration.';
if($mail->Send())
{
}
else
{
echo "Mail Error - >".$mail->ErrorInfo;
}
echo "<center><p style=color:red;><b>User Mail and their Details get Rejected</b></p><center>";
echo '<a href="admin.php" class="btn btn-success">OK</a>';
?>