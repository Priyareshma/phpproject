<?php
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
if(isset($_POST['submit'])) //submitting the form page using post request
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $sql="insert into useraccount (firstname,lastname,dob,gender,email) values('$firstname','$lastname','$dob','$gender','$email')";
mysqli_query($conn,$sql);
header('location:email.php?email='.$email);
}
?>