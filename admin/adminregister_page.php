<?php
error_reporting(E_ALL);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href='../fa/css/all.min.css' rel='stylesheet'>
    <title>Staff Login</title>
</head>
<style>
.shift_content{
  margin : 0 auto;
  color: white;
}


@font-face {
  font-family:Poppins;
  src: url("../Poppins/Poppins-Light.ttf");
  }
  
div{
font-family: Poppins;
}

</style>
<body style="background-color: black;">
<div class="container-fluid">
    <div class="row">
      <div class=" col-md-6 shift_content">
        <img src="../images/pastry.png" alt="" height="200px" style="margin-left: 200px;">
          <h1 style="text-align: center;">Staff Register</h1>
            <form action="process/process_register_ad.php" method="post">

              <?php
              require_once "session_message/error_message.php";
              require_once "session_message/success_message.php";
              
              ?>
              <div>
                <label for="">FullName</label>
                <input  type="text" class="form-control form-control" name="fullname"> 
              </div>
            
               <div>
                 <label for="">Email</label>
                  <input  type="email" class="form-control form-control" name="email">
               </div>
             
              <div>
                <label for="">Password</label>
                <input type="password" class="form-control form-control" name="password">
              </div>
             

              <label for="">Confirm Password</label>
              <input type="password" class="form-control form-control" name="confirm_password">
    
              <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember Me
                </label>
    
                <div class="d-grid gap-2 mb-3">
                  <input type="submit" value="Register" class="btn btn-warning btn-md" name="register">
                </div> 
            </form>
        </div>
    </div>
</div>
   
</body>
</html>