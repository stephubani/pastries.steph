<?php
error_reporting(E_ALL);
require_once "classes/Product.php";
$all_products = $products->view_products();

// $product_id = $products->fetch_product_byid($id);

// echo "<pre>";
// print_r($all_products);
// echo "</pre>";
// die();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="animate.css"> -->
    <link href='../fa/css/all.min.css' rel='stylesheet'>
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
        <div class="col-md-10 mx-auto">
          <div class="row stylecol">
            <div class="col-md">
             
            
              <h1>All Products</h1>
                <?php
                      require_once '../session_message/error_message.php';
                      require_once '../session_message/success_message.php';
                ?>

              <hr>
              <div class="col-md-10">
                <table class=" table table-striped">
                  <thead>
                    <tr>
                      <th>Product </th>
                      <th>Flavour</th>
                      <th>Description</th>
                      <th> Price</th>
                      <th> Product Image</th>
                    
                    </tr>
                  </thead>
                 
                    <tbody>
                    <?php
                    foreach($all_products as $value){
                      
                    ?> 
                      <form action='process/process_delete.php' method="post">
                        <tr>
                        <td id="product_name"><?php echo $value['product_name']?></td>
                        <td id="flavour_name"><?php echo $value['flavour_name']?></td>
                        <td id="product_desc"><?php echo $value['products_description']?></td>
                        <td id="product_price"><?php echo $value ['product_price']?></td>
                        <td><img src="uploads/<?php echo $value['product_img_name']?>" id="product_img" alt="" height="50"></td>
                        <td><input type="hidden" name="product_id" id="product_id" value="<?php echo $value['product_id']?>"></td>
                        <td><button type="submit" name="delete_btn" class="btn "><i class="fa fa-trash text-danger"></i></button></td>
                        <td>
                         <a href="edit_product.php"><button type="button" name="edit_products " class="btn btn-warning  edit">Edit</button></a> 
                        </td>
                      
                        </tr>
                      </form>
                    <?php  
                    }
                    ?>
                  </tbody>
                  
                  
                </table>
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
    // function confirm_edit(){
    //  var confirm_message = confirm('Do you want to edit this message')

    //  if(confirm_message == true ){
    //     var product_id = $('#product_id').val();
    //     var data = 'product_id='+ product_id;
    //     $.get('process/process_edit.php?', data);
    //     ;

    //  }else{

    //   return false
    //  }
    // }

    $(document).ready(function(){
    $(".edit").click(function(){
        var confirm_message = confirm('Do you want to edit this message');

        if(confirm_message == true){
            var product_id = $(this).closest("tr").find('#product_id').val();
            $.ajax({
            type: 'GET',
            url: 'process/process_edit.php',
            data: {'product_id': product_id},
            success: function(response) {
                console.log(response);
            }
        });


            // Pass the product_id to the server using an AJAX request
           
        } else {
            return false;
        }
    });

    // $(".delete_btn").click(function(){
    //     var delete_message = confirm('Do you want to delete this product');

    //     if(delete_message == true){

    //       return true;
    //         var product_id = $(this).closest("tr").find('#product_id').val();
    //         $.ajax({
    //         type: 'POST',
    //         url: 'process/process_delete.php',
    //         data: {'product_id': product_id},
    //         success: function(response) {
    //             console.log(response);
    //         }
    //     });


    //         // Pass the product_id to the server using an AJAX request
           
    //     } else {
    //         return false;
    //     }
    // });
});

</script>
</body>
</html>