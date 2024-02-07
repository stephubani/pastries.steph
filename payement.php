<?php
session_start();
require_once "classes/Customer.php";
require_once 'classes/Product.php';
require_once 'classes/Lga.php';

if(isset($_SESSION['customer_active'])){
  $customer_active = $customer->get_userbyid( $_SESSION['customer_active']);
}

$lga = new Lga();
$lga_name = $lga->fetch_lga();


// echo '<pre>';
// print_r($lga_name);
// echo '</pre>';
// die();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="animate.css">
    <link href='fa/css/all.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<style>
      @font-face {
        font-family:Poppins;
        src: url("Poppins/Poppins-Light.ttf");
    }
    /* .overlay{
        background-color: rgba(0, 0, 0, 0.5);
        height: 500px; 
        color: white;
    } */
   
    div{
        font-family: Poppins;
    }
    .redesigned{
      color:#f1f179 !important;
    }
    .stylecol{
      height : 500px;
      
      
      
    }
</style>
<body>
    <div class="container-fluid">
      <!-- nav bar starts here -->
        <div class="row">
            <div class="col-md ">
             <nav class="navbar navbar-expand-lg " style="background-color: #000000;">
                <div class="container-fluid">
                  <img src="images/pastry.png" alt="" width='100px;' height="100px;">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active redesigned" aria-current="page" href="index.php" style="font-size: 15px;">Home</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active redesigned" aria-current="page" href="#" style="font-size: 15px;">Contact Us</a>
                      </li>
                        <button class=" btn btn-md rounded-0" style="color: #f1f179;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                          Profile
                        </button>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
        </div>
        <!-- nav bar ends here -->
        <div>
          <div class="col-md mb-5" style="text-align: center;">
            <h3>Please put in all neccessary information</h3>
            <hr>
          </div>
          <div class="row">
            <div>
              <form action="process/process_pay2.php" method="post">
                <div class="col-md mb-5">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="John Doe" name="fullname" value="<?php echo $customer_active['customer_fullname']?>" required>
                    <label for="floatingInput">FullName</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="John Doe" name="email" value="<?php echo $customer_active['customer_email']?>" required>
                    <label for="floatingInput">Email</label>
                  </div>

                  <div class="mb-3"> 
                    <label for="">Contact</label>
                    <input type="text" name="contact" id="" class="form-control" placeholder="+234-000-00" required>
                  </div>

                  <div class="row">
                    <div class="col-md-6 form-floating mb-3">
                      <input type="text" name="address" id="floatingInput" class="form-control" placeholder="1234, Whitehouse Alagb Str" required>
                      <label for="floatingInput">Address</label>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="">L.G.A</label>
                      <select name="lga[]" id="" class="form-select">
                        <?php
                        foreach($lga_name as $lga){
                          ?>
                          <option value="<?php echo $lga['lga_id']?>"><?php echo$lga['lga_name']?></option>
                        <?php
                        } 
                        ?>
                        
                      </select>
                    </div>

                    <div class="col-md-4 m-auto d-flex justify-content-between">
                    <label>Total</label>
                   <?php 
                        $totalQuantity = 0; 
                        if (isset($_SESSION['cart'])) {
                          foreach ($_SESSION['cart'] as $product_id => $quantity) {
                            $product = $products->fetch_product_byid($product_id);
                            $totalQuantity = $totalQuantity+($quantity * $product[0]['product_price']);                                            
                          }
                        }
                        echo "<input class ='form-control'name='tot_price' type='text'value='$totalQuantity'>";
                      ?> 
                      <button type="submit" name="payment" class="btn btn-warning btn-lg">Pay!</button>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            
           
          </div>

        </div>
        
        <!-- 
        footer starts here -->
        <div class="row bg-light" >
          <div class="col-md-2">
              <ul style="color:rgb(241, 241, 121); font-size: 10px; margin-top: 10px;">
                  <li><a href="" style="text-decoration: none;">Contact Us</a></li>
                  <li><a href="" style="text-decoration: none;">Send A Feedback</a></li>
                  <li><a href="" style="text-decoration: none;">Contact Us</a></li>
              </ul>
          </div>

          <div class="col-md-2">
              <ul style="color:rgb(241, 241, 121); font-size: 10px;  margin-top: 10px;">
                  <li><a href="" style="text-decoration: none;">Contact Us</a></li>
                  <li><a href="" style="text-decoration: none;">Send A Feedback</a></li>
                  <li><a href="" style="text-decoration: none;">Contact Us</a></li>
              </ul>
          </div>

          <div class="col-2">
            <i class="fa-brands fa-instagram" style="color:black;"></i>
            <i class="fa-brands fa-whatsapp" style="color: black;"></i>
            <i class="fa-brands fa-facebook" style="color:black;"></i>
          </div>
              <hr style="color:black;" width="50px;">
          <div class="row bg-light">
              <div class="col-md-12">
                      <p style="color:black; text-align: center; font-size: 15px;"> &#169 Copyright By PASTRIES.BY.STEPH Design by Stephanie.dev</p>
              </div>
          </div>
      </div>
        
        
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jquery.min.js"></script>

    <!-- offcanvas starts here -->
<div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
   <img src="images/pastry.png" alt="" width='100px;' height="100px;">
   <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
 </div>
 <div class="offcanvas-body">
      <div class="animate__animated animate__backInLeft animate__delay-0.5s ">
            <ul>
              <hr width="400px" style="color:rgb(241, 241, 121); ">
              <li><a href="dashboard.html" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px; ">Edit Profile</a></li>
              <hr width="400px" style="color:rgb(241, 241, 121);">
              <li><a href="landingpage.html" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px;">Sign Out</a></li>
             
            </ul>
      </div>
  </div>
</div>
<!-- offcanvas ends here -->
</body>
</html>