
<?php
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
$email=$_GET['email'];
$sql="select  * from useraccount where email='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$email=$row['email'];
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="style/style.css"/>
<form method="post" action="otpverify.php">
    <body>
    <center>
  <div class="form-group">
      <div class="col-md-2">
    <label for="" class="text-light">Enter Your OTP number</label>
    <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter OTP">
    <small  class="form-text text-muted" class="text-light">We'll never share your Secret OTP with anyone else.</small>
      </div>
    </div> 
  <input type="hidden" name="email" value="<?php echo $row['email']; ?>" /> 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <?php echo'<a href="email.php?email='.$row['email'].'" class="btn btn-success" class="text-light" role="button">Resend otp</a>'?>
        </center>
    </body>
</form>
        </head>
    </html>
<?php
if(isset($_POST['submit']))
{
    $otp=$_POST['otp'];
    $email=$_POST['email'];
}

?>