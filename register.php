<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style/style.css"/>

    </head>
    <body >
        <center><i><b><h4 style="color:green">Register Form</h4></b></i></center>
        <form method="post" action="insert.php">
  <div class="container">
      <div class="row">
          <div class="col-sm-3">
      <label for="firstname" class="text-light"> Firstname</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your Firstname" required>
               <hr class="mb-3">
      <label for="lastname" class="text-light" > Lastname</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your Lastname" required>
           <hr class="mb-3">
      <label for="dob" class="text-light"> Date of birth</label>
      <input type="date" class="form-control" id="dob" name="dob" required>
           <hr class="mb-3">
      <label for="gender" class="text-light">Gender</label>
      <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter your gender" required>
              
           <hr class="mb-3">
      <label for="inputEmail4" class="text-light"> Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder=" Enter Your Email" required>
      <span id="availability"></span>
              
              <hr class="mb-3">
  <input type="submit" name="submit" value="Register" id="register" class="btn btn-success">
    <button input type="RESET" class="btn btn-primary">Reset</button>
            </div>
      </div>
            </div>
        </form>
        </body>
</html>
<script>
$(document).ready(function(){
    $('#email').focusout(function(){
        var email = $("#email").val();
        $.ajax({    //ajax for checking the email
            url:"check.php",
            method:"POST",
            data:{email:email},
            success:function(data)
            {
                if(data!=0)
                    {  
                      $("#availability").html("<span class=text-danger><b>Email address Already exist.Try with New Email</b></span>");
                        $("#register").attr("disabled",true);
                        
                    }else if(data==0)
                        {
                         $('#availability').html("<span class=text-success><b> New Email </b> </span>"); 
                            $("#register").attr("disabled",false);
                            
                        }
            },
        });
        
    });
});
</script>

