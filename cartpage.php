<?php
session_start();
require_once("classes/Customer.php");
require_once 'classes/Product.php';

if(isset($_SESSION['customer_active'])){
  $customer_active = $customer->get_userbyid( $_SESSION['customer_active']);
}
// $_SESSION['cart']=[];

;




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
        <div class="col-md-10 mx-auto">
          <div class="row stylecol">
            <div class="col-md">
            
              <h1>Cart Summary</h1>
              <hr>
  
              <div class="col-md">
                <h1>Welcome <?php  if(isset($_SESSION['customer_active'])){
                echo $customer_active['customer_fullname'];
              };?></h1>
                <p>Your Cart Summary</p>
              </div>
  
              <div class="col-md-10">
                <table class=" table table-striped">
                  <thead>
                    <tr>
                      <th>Product </th>
                      <th>Flavour Name</th>
                      <th> Price</th>
                      <th> Quantity</th>
                      <th>Total Price</th>
                      <!-- <th>Total Price</th> -->
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $product_id => $quantity){
                          $product = $products->fetch_product_byid($product_id);
              
                          // echo '<pre>';
                          // print_r($product[0]);
                          // die();
                          // echo '</pre>';
                      ?>
                      <form action="" method="">
                        <tr class="cart">
                        <input type="hidden"class='product_id' value ='<?php echo $product[0]['product_id']?>'>
                        <td><?php echo $product[0]['product_name']?></td>
                        <td><?php echo $product[0]['flavour_name']?></td>
                        <td class="product_price"><?php echo $product[0]['product_price']?></td>
                        <td>
                          <div class="input-group mb-3" style="width:120px">
                            <button class="input-group-text update-qty decrement_btn" >-</button>
                            <input type="text" class="form-control bg-white text-center qty-input" value="<?php echo $quantity?>">
                            <button class="input-group-text update-qty increment_btn" >+</button>
                          </div>
                        </td>
                        <td class="new_quantity"><?php 
                         echo $product[0]['product_price'];
                        ?>
                        </td>
                      </tr> 
                      </form>
                      

                      <?php
                        }
                      }else{
                        echo "Nothing in Cart";
                      }
                      ?>
                 
    
                  </tbody>
                </table>
               
              </div>
              <div class="col-md d-flex  justify-content-between">
                <div class="col-md-4">
                  <a href="index.php"><button class="btn btn-warning btn-md rounded-0 ">Add More Orders</button></a>
                </div>
    
                <div class="col-md-4">
                  <!-- <h5>Total <?php 
                  $total = 0;
                  $total = $total +($quantity * $product[0]['product_price']);
                  echo $total;
                  ?> </h5> -->
                </div>

                <div class="col-md-4">
                  <a href="process/process_pay.php"><button class="btn btn-warning btn-md rounded-0">Check Out</button></a>
                </div>
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
              <li><a href="logout.php" style="text-decoration: none;  color:rgb(241, 241, 121); padding: 10px;">Sign Out</a></li>
             
            </ul>
      </div>
  </div>
</div>
<!-- offcanvas ends here -->

<script src="jquery.min.js"></script>
<script>
$(document).ready(function(){
   
    $('.increment_btn').click(function(e){
        var container = $(this).closest('.cart');
        var product_id = container.find('.product_id').val();
        var quantityInput = container.find('.qty-input');
        var quantity = parseInt(quantityInput.val());
        var newQuantity = quantity + 1;
        var Total_price = container.find('.new_quantity');

        var product_price = parseFloat(container.find('td:eq(2)').text());;

        new_price = product_price * newQuantity;
        Total_price.text(new_price.toFixed(2));

        quantityInput.val(newQuantity);
        
        e.preventDefault()
        $.ajax({
        type: 'POST',
        url:'process/process_addcart2.php',
        data: {
          'new_quantity': newQuantity,
          'product_id':product_id,
        },
        success : function(response){
          console.log(response);
         quantityInput.val(response);
        }
      });

    });

    $('.decrement_btn').click(function(e){
        var container = $(this).closest('.cart');
        var product_id = container.find('.product_id').val()
        var quantityInput = container.find('.qty-input');
        var quantity = parseInt(quantityInput.val());
        var newQuantity2 = Math.max(quantity - 1, 1);
        
        var Total_price = container.find('.new_quantity');
        var product_price = parseFloat(container.find('td:eq(2)').text());;

        new_price = product_price * newQuantity2;
        Total_price.text(new_price.toFixed(2))

        quantityInput.val(newQuantity2);
        e.preventDefault();
        $.ajax({
        type: 'POST',
        url:'process/process_addcart2.php',
        data: {
          'new_quantity2': newQuantity2,
          'product_id':product_id,
        },
        success : function(response){
          console.log(response);
          quantityInput.val(response);
        } 
       

      });
 
      
        

    });

    
});


</script>
</body>
</html>