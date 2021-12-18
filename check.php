<?php
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
if (isset($_POST["email"])){
    $sql="select email from useraccount where email='".$_POST["email"]."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
    echo json_encode($row);
}
?>
