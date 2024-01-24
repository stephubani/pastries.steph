<?php
session_start();

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
          background-color:rgba(0, 0, 0, 0.7);
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
          <h1 class="text-center">CREATE ACCOUNT</h1>
          <?php
          require_once "session_message/success_message.php";
          require_once "session_message/error_message.php";
          ?>
            <form action="process/process_register.php" method="post">
              <div class="form-floating">
                <label for="">Fullname</label>
                <input type="text" class="form-control form-control-plaintext" name = "fullname" style="border-bottom: 1px solid lightgrey;" placeholder="Fullname">
              </div>
             <div class="form-floating">
              <label for="">Email</label>
              <input  type="email" class="form-control form-control-plaintext" name = "email" style="border-bottom: 1px solid lightgrey;"placeholder="Email">
             </div>
            
             <div class="form-floating">
              <label for="">Password</label>
              <input type="password" class="form-control form-control-plaintext" name="password" style="border-bottom: 1px solid lightgrey;"placeholder="Password">
             </div>

             <div class="form-floating">
              <label for="">Confirm Password</label>
              <input type="password" class="form-control form-control-plaintext" name="confirmpassword" style="border-bottom: 1px solid lightgrey;">
             </div>

              <div class="mt-3 d-flex ">
                  <input class="form-check-input" type="checkbox" value="" id="rememeber">
                  <label class="form-check-label text-start" for="rememeber" name = "remember">  Remember Me
                </label>
              </div>
    
                <div class="d-grid gap-2 mt-3">
                  <input type="submit" value="Sign Up" name="signup" class="btn btn-success btn-lg">
                </div>

                <div class="text-center mt-5">
                  <p>Already have an account? <a href="loginpage.php">login</a></p> 
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