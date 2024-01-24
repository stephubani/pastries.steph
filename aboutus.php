<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="animate.css">
    <link href='fa/css/all.min.css' rel='stylesheet'>
    <title>Homepage</title>
    <style>
     .img{
        background-image: url("images/uunknown.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        height:783px;
     }

     .content1{
        text-align: center;
        color:rgb(241, 241, 121);
     }

     .img2{
        background-image:linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/img3.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        height: 300px;   
     }
    .content2{
        display: flex;
        justify-content: space-evenly;
    }

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
   
    .img3{
        background-image: url('images/img3.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        height: 500px;   
    }
    .shift_content{
       display: flex;
       justify-content: center;
       align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .navposit{
        position: fixed; 
        top: 0; 
        width: 100%;
    }

    .redesigned{
      color:#f1f179 !important;
    }
    </style>
</head>
<body>
   <div class="container-fluid">
    <div class="row img">
        <div class="col-md content1">
         <nav class="navbar navbar-expand-lg navposit"  style="background-color: black;">
            <div class="container-fluid">
              <img src="images/pastry.png" alt="" width='100px;' height="100px;">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <button class="btn btn-warning btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    Menu
                  </button>
                  <li class="nav-item">
                    <a class="nav-link active redesigned" aria-current="page" href="landingpage.html" style="font-size: 20px;">Home</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active redesigned" aria-current="page" href="aboutus.html" style="font-size: 20px;">About Us</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active redesigned" aria-current="page" href="#" style="font-size: 20px;">Contact Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <img src="images/pastry.png" alt="" class="img-fluid   animate__animated  animate__fadeInDownBig">
                    <h1 id="myhead" class = " animate__animated animate__backInUp ">Discover an endless possibility of sweetness</h1>
                    <p class="stylethis animate__animated animate__backInUp">Here in our bakery we give you the best products with the best quality</p>
                    <button class="btn btn-outline-warning btn-md  animate__animated animate__backInUp">Get Started</button>
        </div>
    </div>
    

        <!-- how to use -->

        <div class="row">
            <div class="col-md-6 animate__animated animate__fadeInUp"  style="text-align: center;">
               <h1>Our History</h1>
               <p>Pastries.By.Steph was founded on the 13th of february during the covid</p>
               <p>Not being able to leave the house but craving some pastries. we took to the kitchen</p>
               <p>What started of as a home bakery became one of the best bakery the coutry has ever nown</p>
               <p>Our goal now and has always been is to bring uniqueness to you through pastry</p>
            </div>
            <div class="col-md-6 ">
                <img src="images/history.jpg" alt="" class="img-fluid">          
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <img src="images/bakedwithlove.jpg" alt="" class="img-fluid">
            </div>

            <div class="col-md-6 animate__animated animate__fadeInUp"  style="text-align: center;">
                <h1>Baked With Love</h1>
                <p>From the ingredients to the preparation to the baking.</p>
                <p>We bake with the best quality of products, ensuring that they all meet neccesry standards</p>
                <p>We make sure to hire the most cheerful bakers because as the saying goes....</p>
                <p>"A happy heart makes a happy pastry"</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 animate__animated animate__fadeInUp" style="text-align: center;">
                <h1>Swift Delivery</h1>
                <p>We value your time!</p>
                <p>We understand the importance of keeping to time,</p>
                <p>because of this we make sure to deliever your order as swifly as possible</p>
                <p>Making sure your orders are delivered in the form they were made!</p>
            </div>

            <div class="col-md-6">
                <img src="images/swiftdelivery.jpg" alt="" class="img-fluid">
            </div>
        </div>

        <div class="row img2">
            <div class="col-md-3 d-flex justify-content-center">
                <form action="">
                    <label for="" style="color: white;">Subscribe To Our Newsletter</label>
                    <input type="email" placeholder="Your email" class="form-control">
                    <label for="" style="color: white;">Send Us A Message</label>
                    <textarea name="" id="" cols="5" rows="5" class="form-control"></textarea>
    
                    <input type="submit" value="Subscribe" class="btn btn-warning">
                </form>
            </div>
        </div>

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
   </div>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="jquery.min.js"></script>
</body>
</html>