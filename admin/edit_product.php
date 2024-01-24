<?php
error_reporting(E_ALL);
session_start();

require_once "classes/Product.php";
$product_id = $_SESSION['product_id'];

$product_details = $products->fetch_product_byid($product_id);

$_SESSION['product_img_id']= $product_details['product_img_id'];
$product_img_name =   $products->fetch_image_byid($_SESSION['product_img_id']);








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
       min-height: 600px;
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
                        <a class="nav-link active redesigned" aria-current="page" href="admin_dashboard.php" style="font-size: 15px;">Home</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active redesigned" aria-current="page" href="#" style="font-size: 15px;">Orders Handled</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active redesigned" aria-current="page" href="#" style="font-size: 15px;">Customer Details</a>
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
        <div class="col-md-11 mx-auto stylecol">
          <div class="row">
            <div class="mb-2">
                <h1>Edit Product</h1>
                <hr>
            </div>
            <div class="col-md-6">
              <?php
                require_once '../session_message/error_message.php';
                require_once '../session_message/success_message.php';
              ?>
                <form action="process/process_edit2.php" method="post" enctype="multipart/form-data">
                    <label for="" class="mb-2">Type Products Name</label>
                    <input type="text" class="form-control mb-4" name="product" id="" value="<?php echo $product_details['product_name']?>">

                    <label for="" class="mb-2">Select Flavour</label>
                    <select name="" id="" class="form-control">
                      <?php
                      ?>
                        <option value="<?php echo $product_details['flavour_id']?>" readonly><?php echo $product_details['flavour_name']?></option>
                      <?php
               
                      ?>
                    </select>

                    <input type="hidden" name="product_id" value="<?php echo $product_details['product_id']?>">

                

                   
                    <label for="" class="mb-2">Price</label>
                    <input type="number" class="form-control mb-4" name="price" id="" value="<?php echo $product_details['product_price']?>">

                    <label for="" class="mb-2">Add Product Description</label>
                    <textarea name="description"  class="form-control mb-4" cols="10" rows="5"><?php echo $product_details['products_description']?></textarea>

                    <div class="d-flex justify-content-between">
                      <input type="submit" class= 'btn btn-warning' name = "edit_products"value="Edit Products!">

                      <a href="all_products.php">
                        <button class= 'btn btn-warning' name ="view_products">View All Products!</button>
                      </a>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
              <form action="process/process_edit2.php"  method="post" enctype="multipart/form-data">
              <input type="hidden" name="product_img_id" value="<?php echo $product_details['product_img_id']?>">
                <img src="uploads/<?php echo $product_img_name['product_img_name']?>" alt="" width="200px" class="img-fluid mb-3">
                <br>
                <input type="file" name="new_image" id="" class="form-control">
                <button class="btn btn-outline-warning" name="edit_image" type="submit">Edit Image</button>
              </form>
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
<script src="jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('')
  })
</script>
</body>
</html>