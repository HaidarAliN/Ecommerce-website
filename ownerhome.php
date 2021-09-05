<?php
  session_start();
  include "php/connection.php";
  if(empty($_SESSION["id"])){
    header('location: login.html');
  }
  if($_SESSION["type"]==0){
    header('location: customerhome.php');
  }

  $sql1="Select * from shops where user_id=?"; #Check if the email already exists in the database
  $stmt1 = $connection->prepare($sql1);
  $stmt1->bind_param("i",$_SESSION["id"]);
  $stmt1->execute();
  $result = $stmt1->get_result();
  $row = $result->fetch_assoc();
  if(empty($row)){
    header('location: createshop.php');
  }
  $_SESSION["shopid"] = $row['id'];
  $_SESSION["shopname"] = $row['name'];


?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>E-Commerce</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Ecommerce <em>Services</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="php/homenavigate.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.php">Your Products</a>
              </li>
             <li class="nav-item">
                <a class="nav-link"  id="logout">Sign out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Welcome</h4>
            <h2>Here you can upload your products</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <form method="POST" id="additemForm" action="php/additem.php" method="POST" enctype="multipart/form-data">
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Upload a new product:</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12" id="pn">
                    <span id="pnerror"></span>
                    <fieldset>
                      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12" id="c">
                    <span id="cerror"></span>
                    <fieldset>
                      <input type="text" class="form-control" id="category" name="category" placeholder="Shop Category" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12" id="q">
                    <span id="qerror"></span>
                    <fieldset>
                      <input type="text" class="form-control" id="quatity" name="quatity" placeholder="Quantity" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12" id="p">
                    <span id="perror"></span>
                    <fieldset>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Price" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-12" id="d">
                    <span id="derror"></span>
                    <fieldset>
                      <textarea name="description" rows="6" class="form-control" id="description" placeholder="Enter your product description here" required=""></textarea>
                    </fieldset>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12" id="add">
                      <div class="form-group">
                        <span class="control-fileupload">
                <label for="file1" class="text-left">Upload an image for your product.</label>
                <input type="file" id="img_file" name="img_file">
              </span>
                      </div>
                  </div>

                  <div class="col-lg-12">
                    <fieldset>
                      <button type="button" id="form-submit" class="filled-button" name="submitt">Submit</button>
                    </fieldset>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="accordion">
              <li>
                  <a>who are we?</a>
                  <div class="content">
                      <p>We are a company that lets you publish your store online if you own one. And let you find any product you desire if you are a customer.</p>
                  </div>
              </li>
              <li>
                  <a>Would you like to open an online store?</a>
                  <div class="content">
                      <p>harry up and register as a store owner and upload all your store items to let the customers see all your products.</p>
                  </div>
              </li>
              <li>
                  <a>Do you want to buy from our website?</a>
                  <div class="content">
                      <p>Don't hesitate to register as a customer in order to get full access to all the products, and get special offers.</p>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </form>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2021 Thank you for your trust.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/logout.js"></script>
    <script src="assets/js/additem.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
