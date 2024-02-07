<?php
error_reporting(E_ALL);
require_once "classes/Customer.php";
require_once "classes/Product.php";
session_start();
$all_product = $products->view_products();
if(isset($_SESSION['customer_active'])){
  $customer_active = $customer->get_userbyid( $_SESSION['customer_active']);
}
if(isset($_SESSION['cart'])){
  $cart_num =  count(array_keys($_SESSION['cart']));


  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href='fa/css/all.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="animate.css">

    <title>Document</title>
</head>
<style>
    .redesigned{
      color:#f1f179 !important;
    }
    .stylee{
      margin-top:200px;
      margin-bottom:300px;
    }
    .products{
      background-color:rgba(255,255,255,0.5);
      border: 1px solid black;
    }
   img:hover{
    box-shadow: 5px 10px 5px 10px rgba(0,0,0,0.5);
   }
   
  @font-face {
    font-family:Poppins;
    src: url("Poppins/Poppins-Light.ttf");
  }
  
  div{
    font-family: Poppins;
  }
  .butt{
   margin:auto;
   border-radius: none;
   
  }
 .navposit{
  position: fixed; 
  top: 0; 
  width: 100%;
 }
 .img3{
    background-image: url('images/pastry.png');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    height: 500px;   
    }
</style>
<body>
    <div class="container-fluid ">
      <!-- nav bar starts here -->
      <div class="row">
        <div class="col-md">
         <nav class="navbar navbar-expand-lg navposit"  style="background-color: black;">
            <div class="container-fluid">
              <img src="images/pastry.png" alt="" width='100px;' height="100px;" >
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active redesigned" aria-current="page" href="index.php" style="font-size: 20px;">Home</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active redesigned" aria-current="page" href="aboutus.php" style="font-size: 20px;">About Us</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active redesigned" aria-current="page" href="#" style="font-size: 20px;">Contact Us</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active redesigned" aria-current="page" href="dashboard.php" style="font-size: 20px;">Dashboard</a>
                  </li>
                </ul>

                <div>
                  <a href="cartpage.php" >
                    <button class="btn btn-sm">
                      <i class="fa-solid fa-cart-shopping" style="color: #f1f179; font-size: 30px;"></i>
                      <span class="badge rounded-pill bg-dark" style="color:#f1f179;" id = "cart_system">
                      <?php 
                      if(isset($_SESSION['cart'])){
                        echo $cart_num;
                      }else{
                        echo 0;
                      }
                      ?>
                      </span> 
                    </button>
                  </a>
                </div>
                <?php
                if(!isset($_SESSION['customer_active'])){
                  echo "<a href='loginpage.php'><button class='btn btn-outline-warning btn-lg '  style='margin-right: 20px;'>Login </button></a> ";
                }
                ?>
               
              </div>
            </div>
          </nav>
        </div>
      </div>
    <!-- nav bar ends here -->
      <div class="row"  style="background-color: black;">
        <div class="col-md stylee">
          <div id="" class="">
            <div class="carousel-item active" style="color:#f1f179; text-align: center;">
              <h1>Welcome <?php 
              if(isset($_SESSION['customer_active'])){
                echo $customer_active['customer_fullname'];
              }
              
              ?>  To Pastries By steph</h1>
              <p>We give you the best Product with the best quality</p>
              <?php
              if(!isset($_SESSION['customer_active'])){
                echo "<a href='registerpage.php' class='btn btn-warning btn-lg'>Sign Up</a>";
              }
              ?>
              </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-6">
        </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-4">
            <h4>Sort</h4>
            <hr width="100px">
              <select name="sort" id="sort_type" class="form-select">
                <option value="default">Default Sorting</option>
                <option value="high" >High to low</option>
                <option value="low">Low to high</option>
              </select>
          </div>
    
          <div class="col-md-4">
            <h4>Category</h4>
            <hr width="100px">
           <form action="">
            <label for="flavours">Please Select Product Type :</label>

            <input type="radio"  name="product" value="cake" id="cake" class="form-check-input js-product">
            <label for="cakes">Cakes</label>

            <input type="radio"  name="product"  value='doughnut' id="doughnut" class="form-check-input js-product">
            <label for="doughnut">Doughnut</label>
            
            <input type="radio" name="product" value="cinnamon" id="cinnamon" class="form-check-input js-product">
            <label for="cinnamon">Cinnamon</label>
          
           </form>
          </div>

          <div class="col-md-4">
            <h4>Flavours</h4>
            <hr width="100px">
           <form action="">
            <label for="flavours">Please Select Preferred Flavour :</label>

            <input type="radio"  name="flavour" value="strawberry" class="form-check-input js-flavour">
            <label for="strawberry">Strawberry</label>

             <input type="radio"  name="flavour" value="vanilla" class="form-check-input js-flavour">
            <label for="vanilla">Vanilla</label>

            <input type="radio" name="flavour" value="chocolate" class="form-check-input js-flavour">
            <label for="chocolate">Chocolate</label>
           
           </form>
          </div>
        </div>

        <center>
          <div class="row sorted_product">

          <?php
          require_once "session_message/success_message.php";
          require_once "session_message/error_message.php";

          
          ?>
          
              <?php
              foreach($all_product as $value){
                // echo "<pre>";
                //   print_r($value);
                // echo "</pre>";
                // die();
                
              ?>
             
              <div class="col-md-3 product_details">

                <input type="hidden" name="" class="product_id" value="<?php echo $value['product_id']?>">
              
                <img src="admin/uploads/<?php echo $value['product_img_name']?>" alt=""  id = "images" width="300px" height="300px">
                  <p name="" class="product_name" value=""><?php echo $value['product_name']?> </p>
                <p id="flavour_name"><?php echo $value['flavour_name']?></p>
                <p id="product_desc"><?php echo $value['products_description']?></p>
                <p id="product_price">Price :<?php echo $value['product_price']?></p>
                <div class="butt">
                  <button class="btn btn-dark  add_cart">Add To Cart 
                    <i class="fa-solid fa-cart-shopping fa-beat-fade" style=" color:rgb(241, 241, 121);"></i>
                  </button>
                </div>
              </div>
              <?php
              }
              ?>
            

            <div class="row-gd-12">
              <div class="col-md  mt-3 mb-2" style="text-align: center;">
                <form action="">
                  <label for="products">View More:</label>
      
                  <input type="radio"  name="more_products" class="form-check-input">
                  <label for="products">1</label>
      
                  <input type="radio"  name="more_products" class="form-check-input">
                  <label for="products">2</label>
                
                </form>
              </div>
          </div>
        </center>
        <input type="hidden" name="" id="hidden_cart">

        <!-- footer -->
        <div class="row bg-dark">
           

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
            <i class="fa-brands fa-instagram" style="color:rgb(241, 241, 121);"></i>
            <i class="fa-brands fa-whatsapp" style="color:rgb(241, 241, 121);"></i>
            <i class="fa-brands fa-facebook" style="color:rgb(241, 241, 121);"></i>
          </div>
              <hr style="color:rgb(241, 241, 121);" width="50px;">
          <div class="row bg-dark">
              <div class="col-md-12">
                      <p style="color:rgb(241, 241, 121); text-align: center; font-size: 10px;"> &#169 Copyright By PASTRIES.BY.STEPH Design by Stephanie.dev</p>
              </div>
          </div>
      </div>
      <!-- footer ends here -->
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
              <li><a href="dashboard.html" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px; ">Order</a></li>
              <hr width="400px" style="color:rgb(241, 241, 121);">
              <li><a href="landingpage.html" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px;"></a></li>
              <hr width="400px" style="color:rgb(241, 241, 121);">
              <li><a href="dashboard.html" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px;">Track  Order</a></li>
            </ul>
      </div>
  </div>
</div>
<!-- offcanvas ends here -->
<script src="jquery.min.js"></script>
<script src="index.js"></script>
</body>
</html>
