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
  margin :0 auto;
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
        <img src="../images/pastry.png" alt="" height="200px" class="shift_content">
          <h1 style="text-align: center;">Staff Login </h1>
            <form action="process/process_login_ad.php" method="post">
              <div>
                <label for="">Email</label>
                <input  type="email" name="email" class="form-control form-control">
              </div>
            
              <div>
                <label for="">Password</label>
                <input type="password" name="password" class="form-control form-control">
              </div>
              
              <div>
                <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember Me
                </label>
              </div>
              
    
                <div class="d-grid gap-2 mb-3">
                  <input type="submit" value="Login" name="login" class="btn btn-warning btn-md">
                </div>
    
              <p style="text-align: center;">New Staff? <a href="staffregister_page.html">Register</a></p> 
            </form>
        </div>
    </div>
</div>
   
</body>
</html>