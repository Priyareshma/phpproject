<?php
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
        
    </head>
    <body>
        <center><h3  style=color:green;><i><b> Registered users </b></i></h3></center>
        <form method="post">
    
            <table id="table" class="table table-striped table-bordered" class="text-light">
            <thead><tr>
<td>Id</td>
<td> First Name</td>
<td> Last Name</td>
<td> Date of birth</td>
<td> Gender</td>
<td> Email Address</td>
<td>OTP Success/Failure</td>
<td>Action</td>

                </tr>
                </thead>
<?php
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
$sql= "select * from useraccount where status=1";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
    {
  echo '
  <tr>
 <td>'.$row["id"].'</td>
  <td>'.$row["firstname"].'</td>
  <td>'.$row["lastname"].'</td>
  <td>'.$row["dob"].'</td>
  <td>'.$row["gender"].'</td>
  <td>'.$row["email"].'</td>
  <td><b><p style="color:green;">OTP Success</p></b></td>
  <td><a href="approval.php?approvalid='.$row["id"].'& email='.$row["email"].'" class="btn btn-success" class="text-light" role="button"><i class="fa fa-check"></i></a>
  <a href="rejection.php?rejectionid='.$row["id"].'& email='.$row["email"].'" class="btn btn-danger" class="text-light" role="button"><i class="fa fa-remove"></i></a></td>
  </tr>
  ';
  }
 ?>
 <?php
$conn = mysqli_connect('localhost', 'newuser','password', 'sample2');
$sql= "select * from useraccount where status=0";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
    {
  echo '
  <tr>
 <td>'.$row["id"].'</td>
  <td>'.$row["firstname"].'</td>
  <td>'.$row["lastname"].'</td>
  <td>'.$row["dob"].'</td>
  <td>'.$row["gender"].'</td>
  <td>'.$row["email"].'</td>
  <td><b><p style="color:red;">OTP Failure</p></b></td>
  <td><a href="rejection.php?rejectionid='.$row["id"].'& email='.$row["email"].'" class="btn btn-danger" class="text-light" role="button"><i class="fa fa-remove"></i></a></td>
  </tr>
  ';
  }
 ?>        
            </table>
            </form>
    </body>
</html>
<script>
$(document).ready(function(){
                  $('#table').DataTable();
    });
</script>

