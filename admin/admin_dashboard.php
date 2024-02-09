<?php
error_reporting(E_ALL);
session_start();
// require_once '../classes/Customer.php';
require_once "classes/Admin.php";
require_once "classes/Product.php";

if(isset($_SESSION['admin'])){
  $admins = $admin->get_adminbyid($_SESSION['admin']);

  $fullname = $admins['staff_fullname'];

 $firstname = explode(" ", $fullname);
}
if(isset($_SESSION['customer_active'])){
  $customer_active = $admin->get_userbyid( $_SESSION['customer_active']);
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../animate.css">
    <link href='../fa/css/all.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<style>
      @font-face {
        font-family:Poppins;
        src: url("../Poppins/Poppins-Light.ttf");
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
                  <img src="../images/pastry.png" alt="" width='100px;' height="100px;">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active redesigned" aria-current="page" href="../index.php" style="font-size: 15px;">Home</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active redesigned" aria-current="page" href="customer_details.php" style="font-size: 15px;">Customer Details</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active redesigned" aria-current="page" href="add_products.php" style="font-size: 15px;">Add Products</a>
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
        <div class="col-md-11 mx-auto">
          <div class="row stylecol">
            <div class="col-md">
                 <div class="col-md">
                <h1>Welcome Staff <?php 
                if(isset($_SESSION['admin'])){
                  echo $firstname[1];
                }
                
             
                
                ?></h1>
                <hr>
                <h4>Please process these orders</h4>
              </div>
  
              <div class="col-md-12">
                <?php
                if(isset($_SESSION['customer_active'])){
                  ?>
                  <p>Your Customer name  is <?php echo $customer_active['customer_fullname'] ?></p>
                  <?php
                }
                
                ?>
                
                <table class=" table table-striped">
                  <thead>
                    <tr>
                      <th>Product </th>
                      <th>Category</th>
                      <th> Price</th>
                      <th>Description</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $product_id => $quantity){
                          $product = $products->fetch_product_byid($product_id);
                         
                      ?>
                      <tr>
                         <td><?php echo $product['product_name']?></td>
                        <td><?php echo $product['flavour_name']?></td>
                        <td><?php echo $product['product_price']?></td>
                        <td><?php echo $product['products_description']?></td>
                        <td> <button class="btn "><i class="fa fa-trash text-danger"></i></button></td>
                        <td><?php echo $quantity?></td>
                        <td><button class="btn btn-success">+</button></td>
                        <td><button class="btn btn-success">-</button></td>
                      </tr>
                       

                      <?php
                        }
                      }else{
                      ?>
                        <div class="alert alert-danger">Nothing In This Users Cart</div>
                       <?php
                      }
                      ?>
    
                  </tbody>
                </table>
              </div>
              
              <div class="col-md d-flex  justify-content-between">
                <div class="col-md-4">
                <h5>Total <?php 
                    $totalQuantity = 0; 
                    if (isset($_SESSION['cart'])) {
                      foreach ($_SESSION['cart'] as $product_id => $quantity) {
                        $product = $products->fetch_product_byid($product_id);
                        $totalQuantity = $totalQuantity+($quantity * $product['product_price']);                                            
                      }
                    }
                    echo $totalQuantity;
                  ?> </h5>
                </div>

                <div class="col-md-4">
                  <button class="btn btn-warning btn-md rounded-0" id="confirm_pay">Confirm Order</button>
                </div>

            </div>

          </div>
        </div>


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
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jquery.min.js"></script>
    
    <!-- offcanvas starts here -->
<div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
   <img src="../images/pastry.png" alt="" width='100px;' height="100px;">
   <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
 </div>
 <div class="offcanvas-body">
      <div class="animate__animated animate__backInLeft animate__delay-0.5s ">
            <ul>
              <hr width="400px" style="color:rgb(241, 241, 121); ">
              <li><a href="profile.php" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px; ">Edit Profile</a></li>
              <hr width="400px" style="color:rgb(241, 241, 121);">
              <li><a href="admin_logout.php" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px;">Sign Out</a></li>
             
            </ul>
      </div>
  </div>
</div>
<!-- offcanvas ends here -->
<script src="../jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#confirm_pay').click(function(){
      
       $('#confirm_pay').text('Done');
    })
   
  })
</script>
</body>
</html>