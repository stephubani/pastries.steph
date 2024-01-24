<?php
error_reporting(E_ALL);
session_start();
require_once "classes/Customer.php";

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        @font-face {
        font-family:Poppins;
        src: url("Poppins/Poppins-Light.ttf");
        }
        
        div{
        font-family: Poppins;
        }
        .hero-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8); 
            z-index: 1;
        }

        .content {
             z-index: 1;
        }
        form{
          
          border: 1px solid rgb(241, 241, 121);
          border-radius: 10px;
          padding: 40px;
          color:white;
        }
       
    </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <div class="hero-section">
   
        <video class="video-background" autoplay muted loop>
            <source src="images/pastry1.mp4" type="video/mp4">
        </video>
    
        <div class="overlay"></div>
    
        <div class=" col-md-6 content">
          <h1 style="text-align: center;">Login</h1>
          <?php
          require_once "session_message/error_message.php";
          require_once "session_message/success_message.php";
          ?>
            <form action="process/process_login.php" method="post">
              <div class="mb-3">
                <label for="">Email</label>
                <input  type="email" name = "email" value="" class="form-control form-control">
              </div>
                
                <div class="mb-3">
                  <label for="">Password</label>
                  <input type="password" name='password' class="form-control form-control">
                </div>
      
                <div class="d-grid gap-2 mb-3">
                  <input type="submit" value="Login" name="login" class="btn btn-warning btn-md" >
                </div>

                <div class="text-center mt-5">
                  <p>Dont have an account? <a href="registerpage.php">Register</a></p>
                </div>
 
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>